import cliqueFora from './outside.js';

export default class AtivaMenu
{
    constructor (button, list)
    {
        this.button = document.querySelector(button);
        this.list = document.querySelector(list);

        this.activeMenu = this.activeMenu.bind(this);
    }
    
    activeMenu(event)
    {
        const element = event.currentTarget;
        this.list.classList.toggle('activeMenu');
        element.classList.toggle('activeIcon');
        cliqueFora(element, () => {
            this.list.classList.remove('activeMenu');
            element.classList.remove('activeIcon');
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
        }
        return this; 
    }
} 
