export default function initAnimaMenu()
{
    const $menu = document.querySelector('[data-menu="mainMenu"]');

    function animaMenu(event)
    {
        console.log();
        if(event.currentTarget.pageYOffset > 10)
        {
            $menu.classList.add('animaMenu');
        }
        else
        {
            $menu.classList.remove('animaMenu');
        }
    }

    window.addEventListener('scroll', animaMenu);
}