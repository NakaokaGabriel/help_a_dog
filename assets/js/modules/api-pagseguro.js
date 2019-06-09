export default function initPagseguro()
{

}

const url = './dev-recuperar-id.php';
const metodos = { method: 'POST' }  

fetch(url, metodos)
.then((response) => response.json())
.then((body) => {
    // Inicia a sessão do pagseguro é obrigatorio
    PagSeguroDirectPayment.setSessionId(body.id);
    const numeroCartao = document.querySelector('#cartao');
    const selectBands = document.querySelector('#bandeiras');

    // Seleciona os metodos de pagamento do cartão
    PagSeguroDirectPayment.getPaymentMethods({
        amount: 600.00,
        success: function(body) {
            const optionsCards = body.paymentMethods.CREDIT_CARD.options;

            // Loop por um array não interavel
            for(let key in optionsCards)
            {
                // Coloca qual bandeira o usuário vai escolher
                const selectBand = document.createElement('option');
                selectBand.value = optionsCards[key].name;
                selectBand.innerText = optionsCards[key].displayName;
                selectBands.appendChild(selectBand);
            }
        },
        error: function(body) {
            console.log(body);
        },
        complete: function(body) {
            // Envia o token do cartão para o meu formulario
            PagSeguroDirectPayment.createCardToken({
                cardNumber: '4111111111111111', // Número do cartão de crédito
                brand: 'visa', // Bandeira do cartão
                cvv: '123', // CVV do cartão
                expirationMonth: '12', // Mês da expiração do cartão
                expirationYear: '2030', // Ano da expiração do cartão, é necessário os 4 dígitos.
                success: function(body) {
                    // Seleciona o formulario para preencher o token
                    const inputToken = document.querySelector('.tokenCartao');
                    inputToken.value = body.card.token;
                }
             });
        }
    });
    const formDoacao = document.forms.doacao;
    // Seleciona o formulario para preencher o Hash
    const inputToken = document.querySelector('.hashCartao');
        PagSeguroDirectPayment.onSenderHashReady(function(body){
        inputToken.value = body.senderHash;
    });
})
.catch((error) => {
    console.log(error);
});