export default class FetchContato{
    constructor(formulario, url)
    {
        this.formulario = document.querySelector(formulario);
        this.url = url;
        this.msg = document.querySelector('.msg-enviada');

        this.fetchForm = this.fetchForm.bind(this);
    }

    // Previnir o padrão
    // Colocar os valores do formulario com o objeto construtor form data
    // Fazendo uma requisição promisse para enviar meus dados para o servidor em php
    fetchForm(event)
    {
        event.preventDefault();
        let dados = new FormData(this.formulario);
        const metodos = {
            method: 'POST',
            body: dados
        }
        fetch(this.url, metodos)
        .then((response) => response.json())
        .then((body) => {            
            if (body.Resposta === 'ok')
            {
                this.formulario.button.classList.add('loading-button');                        
                this.formulario.button.setAttribute('disabled', '');                        
                this.formulario.button.innerText = '';     
                this.msg.innerText = '';
            }
            setTimeout(() => {
                this.formulario.button.classList.remove('loading-button');
                this.formulario.button.removeAttribute('disabled');   
                this.formulario.button.innerText = 'ENVIAR';                        
                this.formulario.reset();   
                this.msg.innerText = 'Mensagem Enviada com sucesso.';
                setTimeout(() => {
                    this.msg.innerText = '';
                }, 5000)
            }, 3000);
        })
        .catch((error) => {
            console.log(error);
        })
    }

    // Evento de submit
    eventFormSubmit()
    {
        this.formulario.addEventListener('submit', this.fetchForm);
    }

    init()
    {
        if(this.formulario && this.url && this.msg)
        {
            this.eventFormSubmit();
        }
        return this;
    }

} 