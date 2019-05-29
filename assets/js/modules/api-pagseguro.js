export default function initPagseguro()
{

}

const url = './dev-pagamento.php';
const metodos = {
    method: 'POST'
}  

fetch(url, metodos)
.then((response) => response.json())
.then((body) => {
    PagSeguroDirectPayment.setSessionId(body.id);
    const numeroCartao = document.querySelector('#cartao');
    const brandCart = document.querySelector('.brand-cart');

    const eventoCartao = (event) => {
        const target = event.target.value;
        const transformingCart = target.replace(/\s/g, '');

        PagSeguroDirectPayment.getBrand({
            cardBin: transformingCart,
            success: function(body) {
                const img = document.createElement('img');
                img.classList.add('brands');
                const numeroClasse = document.querySelectorAll('.brands');
                if((!img.hasAttribute('src')) && target >= 6 || numeroClasse <= 1)
                {
                    img.innerHtml = img.setAttribute('src', `https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/68x30/${body.brand.name}.png`);
                    brandCart.appendChild(img);
                }
            },
            error: function(body) {
                console.log(numeroClasse);
            },
            complete: function(body) {
              //tratamento comum para todas chamadas
            }
        });
    };

    numeroCartao.addEventListener('keyup', eventoCartao);

    PagSeguroDirectPayment.getPaymentMethods({
        amount: 500.00,
        success: function(body) {
            const bodyReturn = body.paymentMethods.CREDIT_CARD.options;
            const cartArea = document.querySelector('.carts');
            for (let key in bodyReturn) {
                const img = document.createElement('img');
                img.innerHtml = img.setAttribute('src', `https://stc.pagseguro.uol.com.br${bodyReturn[key].images.MEDIUM.path}`);
                img.classList.add('carts-icon');
                cartArea.appendChild(img);
            }
        },
        error: function(body) {
            console.log(body);
        },
        complete: function(body) {
        }
    });
})
.catch((error) => {
    console.log(error);
});