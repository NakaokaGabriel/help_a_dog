export default class ScrollSuave
{     
      constructor(button, attribute, selectAttribute, options)
      {
            this.button = document.querySelector(button);
            this.attribute = this.button.getAttribute(attribute) || this.button.getAttribute('href');
            this.selectAttribute = document.querySelector(this.attribute);
            const calculoTop = window.innerHeight * 0.1;
            const topo = this.selectAttribute.offsetTop - calculoTop;

            if(options === undefined)
            {
                  this.options = {behavior: 'smooth', top: topo}
            }
            else
            {
                  this.options = options                  
            }

            this.animaScroll = this.animaScroll.bind(this);
      }

      animaScroll(event)
      {
            event.preventDefault();
            window.scrollTo(this.options);
      }

      eventScroll()
      {
            this.button.addEventListener('click', this.animaScroll);
      }
      
      init()
      {
            this.eventScroll();
            return this;
      }
}