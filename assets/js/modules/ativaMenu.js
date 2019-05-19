import cliqueFora from './outside.js';

export default function initAtivaMenu()
{
    const $menuButton = document.querySelector('[data-menu="button"]');
    const $menuList = document.querySelector('[data-menu="list"]');

    $menuButton.addEventListener('click', ativaMenu);
    
    function ativaMenu()
    {
        $menuList.classList.toggle('activeMenu');
        $menuButton.classList.toggle('activeIcon');
        cliqueFora(this, () => {
            $menuList.classList.remove('activeMenu');
            $menuButton.classList.remove('activeIcon');
        });
    }
} 
