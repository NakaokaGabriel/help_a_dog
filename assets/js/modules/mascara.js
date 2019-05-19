// Mascara para telefone
export default class MaskPhone
{
    // Inicia um objeto construtor passando o parametro do elemento
    constructor(element)
    {
        this.element = element;
    }
    // Limpa qualquer retorno indevido para a mascara de telefone
    clear(cellNumber)
    {
        return cellNumber.replace(/\D/g, '');
    }
    // Tranforma o numero retornado em uma maskara de celular
    transforming(cellNumber)
    {
        return cellNumber.replace(/(\(?\d{2}\)?\s?)(\d{4,5}[-]?)(\d{4})/g, '($1) $2-$3');
    }
    // Limpa e depois tranforma o numero enviado pelo usúario
    formating(cellNumber)
    {
        const clearNumber = this.clear(cellNumber);
        return this.transforming(clearNumber);
    }
    // Validação completa
    validationForTheEvent(element)
    {
        const validaCell = element.match(/(\(?\d{2}\)?[\s]?)(\d{4,5}[-]?)(\d{4})/g);
        return (validaCell && validaCell[0] === element);
    }
    // Envia a formatação da maskara com o evento para o input
    validationOfFormatation(element)
    {
        if(this.validationForTheEvent(element.value))
        {
            element.value = this.formating(element.value);
            element.removeAttribute('class');
        }
        else
        {
            element.value = this.formating(element.value);
            element.classList.add('vermelho');
        }
    }
    // Evento que irá acionar o input
    // Evento ao digitar
    eventOnEnter(element)
    {
        const events = ['keyup', 'change', 'keydown'];
        events.forEach(event => {
            this.element.addEventListener(event, () => {
                this.validationOfFormatation(this.element);
            });
        })
    }
    init()
    {
        this.eventOnEnter();
        return this;
    }
}