export default function functionValidity()
{
      const $iRadio = document.forms.doacao;

      if($iRadio)
      {
            function functionValidation(event)
            {
                  const valor = document.querySelector('[data-doacao]');
                  if(event.target.checked)
                  {
                        valor.setAttribute('value', event.target.value)
                  }
            }
            
            $iRadio.addEventListener('change', functionValidation);
      }
}