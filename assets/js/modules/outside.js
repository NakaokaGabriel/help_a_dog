export default function cliqueFora(element, callback)
{
    const html = document.documentElement;
    const outside = 'data-outside';
    if(!element.hasAttribute(outside))
    {
        html.addEventListener('click', indicaClique);
        element.setAttribute(outside, '');
    }
    function indicaClique(event)
    {
        if(!element.contains(event.target))
        {
            element.removeAttribute(outside);
            html.removeEventListener('click', indicaClique);
            callback(); 
        }
    }
}