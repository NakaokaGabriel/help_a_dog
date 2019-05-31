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
    const selectBands = document.querySelector('#bandeiras');

    PagSeguroDirectPayment.getPaymentMethods({
        success: function(body) {
            const optionsCards = body.paymentMethods.CREDIT_CARD.options;

            for(let key in optionsCards)
            {
                // Coloca qual bandeira o usuário vai escolher
                const selectBand = document.createElement('option');
                selectBand.setAttribute('value', optionsCards[key].name);
                selectBand.innerText = optionsCards[key].displayName;
                selectBands.appendChild(selectBand);
            }
        },
        error: function(body) {
            console.log(body);
        }
    });

    PagSeguroDirectPayment.getInstallments({
        amount: 600.80,
        maxInstallmentNoInterest: 1,
        brand: 'visa',
        success: function(body){
       	    console.log(body);
       },
        error: function(body) {
       	    // callback para chamadas que falharam.
       },
        complete: function(body){
            // Callback para todas chamadas.
       }
    });

    const form = document.forms.doacao;
    const PegaInfo = (event) => {
        event.preventDefault();

        let cartaoNumero = event.target[2].value;
        let cvv = event.target[3].value;
        let positionBand = event.target[4].value;
        let mes = event.target[6].value;
        let ano = event.target[7].value;

        let modificaNumCartao = cartaoNumero.replace(/\D/g, '');
        let lowerCaseBand = positionBand.toLowerCase();

        // Token do cartão do usuário
        // IMPORTANTE
        PagSeguroDirectPayment.createCardToken({
            cardNumber: modificaNumCartao, // Número do cartão de crédito
            brand: lowerCaseBand, // Bandeira do cartão
            cvv: cvv, // CVV do cartão
            expirationMonth: mes, // Mês da expiração do cartão
            expirationYear: ano, // Ano da expiração do cartão, é necessário os 4 dígitos.
            success: function(body) {
                const inputToken = document.querySelector('.tokenCartao');
                inputToken.setAttribute('value', body.card.token);
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
                        console.log(body.message, 'cu');
                        return false;
                    }
                    else
                    {
                        const inputHash = document.querySelector('.hashCartao');
                        inputHash.setAttribute('value', body.senderHash);
                        const dados = new FormData(form);
                        const url = 'dev-pagar.php';
                        const methods = {
                            method: 'POST',
                            body: dados
                        }

                        fetch(url, methods)
                        .then((response) => response.json())
                        .then((body) => {
                            console.log(body);
                        })
                        .catch((e) => {
                            console.log(e);
                        })
                    }
                });
            }
        });
    }

    form.addEventListener('submit', PegaInfo);
})
.catch((error) => {
    console.log(error);
});