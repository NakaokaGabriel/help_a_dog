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