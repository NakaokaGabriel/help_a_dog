export default function initPagseguro()
{
    const url = './dev-recuperar-id.php';
    const metodos = { method: 'POST' }  
    
    if (url && metodos)
    {
        fetch(url, metodos)
        .then((response) => response.json())
        .then((body) => {
            // Inicia a sessão do pagseguro é obrigatorio
            PagSeguroDirectPayment.setSessionId(body.id);
            const formDoacao = document.forms.doacao;
            const cartao = document.querySelector('#cartao');
            const selectBands = document.querySelector('#bandeiras');
            const selectCvv = document.querySelector('#cvv');
            const selectMes = document.querySelector('#mes');
            const selectAno = document.querySelector('#ano');
        
            const quantidadePreco = document.querySelector('.money');
        
            // Seleciona os metodos de pagamento do cartão
            PagSeguroDirectPayment.getPaymentMethods({
                amount: quantidadePreco.addEventListener('submit', (event) => {
                    const preco = event.target.value;
                    const precoTotal = preco.replace(',', '.');
                    return +precoTotal;
                }),
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
                    formDoacao.addEventListener('submit', (event) => {
                        event.preventDefault();
        
                        const valorCartao = cartao.value;
                        const numeroCartao = valorCartao.replace(/\D/g, '');
                        const bandeira = selectBands.value.toLowerCase();
                        const cvv = selectCvv.value;
                        const mes = selectMes.value;
                        const ano = selectAno.value;
        
                        // Envia o token do cartão para o meu formulario
                        PagSeguroDirectPayment.createCardToken({
                            cardNumber: numeroCartao, // Número do cartão de crédito
                            brand: bandeira, // Bandeira do cartão
                            cvv: cvv, // CVV do cartão
                            expirationMonth: mes, // Mês da expiração do cartão
                            expirationYear: ano, // Ano da expiração do cartão, é necessário os 4 dígitos.
                            success: function(body) {
                                // Seleciona o formulario para preencher o token
                                const inputToken = document.querySelector('.tokenCartao');
                                inputToken.value = body.card.token;
                            },
                            error: function(body) {
                                console.log(body);
                            },
                            complete: function(body) {
                                // Seleciona o formulario para preencher o Hash
                                const inputToken = document.querySelector('.hashCartao');
                                PagSeguroDirectPayment.onSenderHashReady(function(body){
                                    if(body.status == 'error') {
                                        console.log(body.message);
                                        return false;
                                    }
                                    else {
                                        inputToken.value = body.senderHash;
                                        const dados = new FormData(formDoacao);
        
                                        const urlDados = 'dev-pagar.php';
                                        const metodos = { method: 'POST', body: dados };
        
                                        fetch(urlDados, metodos)
                                        .then((response) => response.json())
                                        .then((body) => {
                                            window.location.href = 'agradecimento';
                                        });
                                    }
                                });
                            }
                        });
                    });
                }
            });
        })
        .catch((error) => {
            console.log(error);
        });
    }
}
