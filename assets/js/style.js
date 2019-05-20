// Importações de classes que uso em todo o site
import ScrollMenu from './modules/animaMenu.js';

const scrollmenu = new ScrollMenu('[data-menu="mainMenu"]');
scrollmenu.init();

import AtivaMenu from './modules/ativaMenu.js';

const ativamenu = new AtivaMenu('[data-menu="button"]', '[data-menu="list"]');
ativamenu.init();

import initScrollSuave from './modules/scroll-suave.js';
import initLoading from './modules/loading.js';

initScrollSuave();
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