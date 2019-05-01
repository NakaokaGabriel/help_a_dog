export default function initScrollSuave()
{
      const button = document.querySelector('[data-animacao]');

      if(button)
      {
            function animaScroll(event)
            {
                  event.preventDefault();
                  const atributoBotao = button.getAttribute('href');
                  const selecionaAtributo = document.querySelector(atributoBotao);
                  const calculoTop = window.innerHeight * 0.1;
            
                  const topo = selecionaAtributo.offsetTop - calculoTop;
                  window.scrollTo({
                        behavior: 'smooth',
                        top: topo
                  });
            }
            button.addEventListener('click', animaScroll);
      }
}