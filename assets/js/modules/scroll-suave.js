export default class ScrollSuave
{     
      constructor(button)
      {
            this.button = document.querySelector(button);

            this.animaScroll = this.animaScroll.bind(this);
      }

      // Evento que previni o padrão do scroll e ainda da um scroll mais suave para o elemento do botão
      animaScroll(event)
      {
            event.preventDefault();
            const attribute = this.button.getAttribute('href');
            const selectAttribute = document.querySelector(attribute);
            const calculoTop = window.innerHeight * 0.1;
            const topo = selectAttribute.offsetTop - calculoTop;
            window.scrollTo({
                  behavior: 'smooth', 
                  top: topo,
            });
      }

      // inicia o evento de scroll ao clickar no botão
      eventScroll()
      {
            this.button.addEventListener('click', this.animaScroll);
      }
      
      init()
      {
            if (this.button)
            {
                  this.eventScroll();
            }
            return this;
      }
}