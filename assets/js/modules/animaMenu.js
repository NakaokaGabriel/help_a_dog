export default class AnimaMenu
{
    constructor(menu)
    {
        this.menu = document.querySelector(menu);
    }
    animaMenu(event)
    {
        if(event.currentTarget.pageYOffset > 10)
        {
            this.menu.classList.add('animaMenu');
        }
        else
        {
            this.menu.classList.remove('animaMenu');
        }
    }
    eventScroll()
    {
        window.addEventListener('scroll', this.animaMenu);
    }
    init()
    {
        if (this.menu)
        {
            this.eventScroll();
            return this;
        }
    }
}
