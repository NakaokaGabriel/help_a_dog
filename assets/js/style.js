'use strict';

// Importações de funções que uso em todo o site
import initAnimaMenu from './modules/animaMenu.js';
import initAtivaMenu from './modules/ativaMenu.js';
import initScrollSuave from './modules/scroll-suave.js';

initAnimaMenu();
initAtivaMenu();
initScrollSuave();

// Classe para a utilização de mascara de telefone
import MaskPhone from './modules/mascara.js';

// Seleciona todos os inputs que estiverem o ID de telefone
// Inicia um object constructor 
const selectIdCel = document.getElementById('telefone');
// Verifica se todos elementos com o id de telefone existir inicia a constructor function se não nao exibi o erro.
if(selectIdCel)
{
    const objectMask = new MaskPhone(selectIdCel).init();
}

// Importar o script mascara das doações
import MaskMoney from './modules/mask-donation.js';

// Seleciona o formulario de doação
const formDonation = document.forms.doacao;

console.log(formDonation);