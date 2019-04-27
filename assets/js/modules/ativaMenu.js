export default function initAtivaMenu()
{
    const $menuButton = document.querySelector('[data-menu="button"]');
    const $menuList = document.querySelector('[data-menu="list"]');
    
    function ativaMenu()
    {
        $menuList.classList.toggle('activeMenu');
        $menuButton.classList.toggle('activeIcon');
    }
    
    $menuButton.addEventListener('click', ativaMenu);
}  