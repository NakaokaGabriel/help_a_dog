export default function initValidaDoacao()
{
    const moneySelect = document.querySelector('.valors');
    const money = document.querySelector('.money');
    const valores = document.querySelector('.valores');
    
    if(moneySelect && money && valores)
    {
        money.value = '00.00'.replace('.', ',');
        const moneyTransfer = (event) => {
            if(event.target.checked)
            {
                money.value = event.target.value;
                money.setAttribute('disabled', '');
                if(money.value === event.target.value)
                {
                    const createbutton = document.createElement('span');
                    createbutton.classList.add('enable-button');
                    createbutton.innerText = '+';
                    valores.appendChild(createbutton);

                    const numberButton = document.querySelectorAll('.enable-button');
                    if(numberButton.length > 1)
                    {
                        createbutton.remove();
                    }
        
                    const openInputMoney = () => {
                        money.removeAttribute('disabled');
                        createbutton.remove();
                    }
        
                    createbutton.addEventListener('click', openInputMoney);
                }
            }
        }
        
        moneySelect.addEventListener('click', moneyTransfer);
    }
}