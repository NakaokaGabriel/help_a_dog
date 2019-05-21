import cliqueFora from './outside.js';

export default class AtivaMenu
{
    constructor (button, list)
    {
        this.button = document.querySelector(button);
        this.list = document.querySelector(list);

        this.activeMenu = this.activeMenu.bind(this);
    }
    
    activeMenu()
    {
        this.list.element.classList.toggle('activeMenu');
        this.button.element.classList.toggle('activeIcon');
        cliqueFora(this, () => {
            this.list.element.classList.remove('activeMenu');
            this.button.element.classList.remove('activeIcon');
        });
    }

    clickEvent()
    {
        this.button.addEventListener('click', this.activeMenu);
    }

    init()
    {
        if (this.list && this.button)
        {
            this.clickEvent();
            return this; 
        }
    }
} 
