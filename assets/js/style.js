// Importações de classes que uso em todo o site
import ScrollMenu from './modules/animaMenu.js';

const scrollmenu = new ScrollMenu('[data-menu="mainMenu"]');
scrollmenu.init();

import ScrollSuave from './modules/scroll-suave.js';

const scrollsuave = new ScrollSuave('[data-animacao]', );
scrollsuave.init();

import initAtivaMenu from './modules/ativaMenu.js';
import initLoading from './modules/loading.js';

initAtivaMenu();
initLoading();

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