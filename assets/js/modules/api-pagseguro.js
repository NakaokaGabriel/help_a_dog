import { log } from "util";

export default function initPagseguro()
{

}

const url = './dev-recuperar-id.php';
const metodos = {
    method: 'POST'
}  

fetch(url, metodos)
.then((response) => response.json())
.then((body) => {
    PagSeguroDirectPayment.setSessionId(body.id);
    const numeroCartao = document.querySelector('#cartao');
    const brandCart = document.querySelector('.brand-cart');
    const allBands = document.querySelector('.bandeiras');
    const selectBands = document.querySelector('#bandeiras');

    PagSeguroDirectPayment.getPaymentMethods({
        success: function(body) {
            const optionsCards = body.paymentMethods.CREDIT_CARD.options;

            for(let key in optionsCards)
            {
                // Mostra as bandeiras disponiveis para o usuário
                const bandImage = document.createElement('img');
                bandImage.setAttribute('src', `https://stc.pagseguro.uol.com.br${optionsCards[key].images.MEDIUM.path}`);
                allBands.appendChild(bandImage);

                // Coloca qual bandeira o usuário vai escolher
                const selectBand = document.createElement('option');
                selectBand.setAttribute('value', optionsCards[key].name);
                selectBand.innerText = optionsCards[key].displayName;
                selectBands.appendChild(selectBand);
            }
        },
        error: function(body) {
            // Callback para chamadas que falharam.
        },
        complete: function(body) {
            // Callback para todas chamadas.
        }
    });

    const eventoCartao = (event) => {
        const target = event.target.value;
        const transformingCart = target.replace(/\s/g, '');

        PagSeguroDirectPayment.getBrand({
            cardBin: transformingCart,
            success: function(body) {
                const img = document.createElement('img');
                if((!img.hasAttribute('src')))
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

    numeroCartao.addEventListener('change', eventoCartao);

    const form = document.forms.doacao;

    const PegaInfo = (event) => {
        event.preventDefault();

        const cartaoNumero = event.target[2].value;
        const cvv = event.target[3].value;
        const positionBand = event.target[4].value;
        const mes = event.target[6].value;
        const ano = event.target[7].value;

        // Token do cartão do usuário
        // IMPORTANTE
        PagSeguroDirectPayment.createCardToken({
            cardNumber: cartaoNumero, // Número do cartão de crédito
            positionBand, // Bandeira do cartão
            cvv: cvv, // CVV do cartão
            expirationMonth: mes, // Mês da expiração do cartão
            expirationYear: ano, // Ano da expiração do cartão, é necessário os 4 dígitos.
            success: function(body) {
            },
            error: function(body) {
                console.log(body);
            },
            complete: function(body) {
                // Hash do cartão do usuário
                // IMPORTANTE
                PagSeguroDirectPayment.onSenderHashReady(function(body){
                    if (body.status == 'error') 
                    {
                        console.log(body.message);
                        return false;
                    }
                    else
                    {
                        const dados = new FormData(form);
                        console.log(dados);
                    }
                    // var hash = body.senderHash;
                });
            }
        });
    }

    form.addEventListener('submit', PegaInfo);
})
.catch((error) => {
    console.log(error);
});