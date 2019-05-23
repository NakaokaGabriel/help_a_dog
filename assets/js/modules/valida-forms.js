export default class ValidaForms{
    constructor(formulario)
    {
        this.formulario = document.querySelector(formulario);
        this.events = ['keyup', 'change'];

        this.validaFormulario = this.validaFormulario.bind(this);
    }

    // Pega onde o usuário esta digitando para fazer a validação
    validaFormulario(event)
    {
        const target = event.target;
        if (!target.checkValidity()) 
        {
            target.classList.add('invalido');
            target.nextElementSibling.innerText = target.validationMessage;
        }
        else
        {
            target.classList.remove('invalido');
            target.nextElementSibling.innerText = '';
        }
    }

    // adiciona os eventos passados por um array
    eventValidation()
    {
        this.events.forEach((events) => {
            this.formulario.addEventListener(events, this.validaFormulario)
        });
    }

    init()
    {
        if(this.formulario)
        {
            this.eventValidation();
        }
        return this;
    }
}