export default function initLoading()
{
    const loading = document.querySelector('.loader');
    const body = document.querySelector('body');
    
    const loadingPag = (() => {
        setTimeout(() => {
            loading.removeAttribute('class');
        }, 2000);
    });
    
    window.addEventListener('load', loadingPag);
}
