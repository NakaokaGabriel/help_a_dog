import cliqueFora from './outside.js';

export default class AtivaMenu
{
    constructor (button, list)
    {
        this.button = document.querySelector(button);
        this.list = document.querySelector(list);
    }
    
    activeMenu()
    {
        this.list.classList.toggle('activeMenu');
        this.button.classList.toggle('activeIcon');
        cliqueFora(this, () => {
            this.list.classList.remove('activeMenu');
            this.button.classList.remove('activeIcon');
        });
    }

    clickEvent()
    {
        this.button.addEventListener('click', () => this.activeMenu);
    }

    init()
    {
        if(this.list && this.button)
        {
            this.clickEvent();
            return this; 
        }
    }
} 
