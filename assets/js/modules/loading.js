export default function initLoading()
{
    const loading = document.querySelector('.loader');
    const body = document.querySelector('body');
    
    const loadingPag = (() => {
        setTimeout(() => {
            loading.removeAttribute('class');
        }, 500);
    });
    
    window.addEventListener('load', loadingPag);
}
