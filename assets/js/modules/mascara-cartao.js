export default class CartMask{
    constructor(cartao)
    {
        this.cartao = document.querySelector(cartao);
    }

    limpaCartao(numberCart)
    {
        return numberCart.replace(/\D/g, '');
    }

    transformaCartao(numberCart)
    {
        return numberCart.replace(/(\d{4})(\d{4})(\d{4})(\d{4})/g, '$1 $2 $3 $4');
    }

    formataCartao(numberCart)
    {
        const limpa = this.limpaCartao(numberCart);
        return this.transformaCartao(limpa);
    }

    validaMascara(element)
    {
        const validaCartao = element.match(/(\d{4}\s?)(\d{4}\s?)(\d{4}\s?)(\d{4}\s?)/g);
        return (validaCartao && validaCartao[0] === element);
    }

    validaCartao(event)
    {
        if(this.validaMascara(event.value))
        {
            event.value = this.formataCartao(event.value);
            event.removeAttribute('class');
        }
        else
        {
            event.value = this.formataCartao(event.value);
            event.classList.add('vermelho');
        }
    }

    formEvents(element)
    {
        const events = ['keyup', 'change', 'keydown'];
        events.forEach(event => {
            this.cartao.addEventListener(event, () => {
                this.validaCartao(this.cartao);
            });
        })
    }
    init()
    {
        if(this.cartao)
        {
            this.formEvents();
            return this;
        }
    }
}