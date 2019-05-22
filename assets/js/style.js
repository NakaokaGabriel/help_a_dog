// --------------------------------------------
// Importações de classes que uso em todo o site
// --------------------------------------------

// Evento de animação ao menu ao dar scroll
import ScrollMenu from './modules/animaMenu.js';
const scrollmenu = new ScrollMenu('[data-menu="mainMenu"]');
scrollmenu.init();

// Evento de scroll mais suave ao clickar 
// alguma tag a
import ScrollSuave from './modules/scroll-suave.js';
const scrollsuave = new ScrollSuave('[data-animacao]', );
scrollsuave.init();

// Evento de carregamento de página
import Loading from './modules/loading.js';
const loading = new Loading('.loader', 'body');
loading.init();

// Mascara de telefone com todos os inputs que
// possuirem o input com o id de telefone
import MaskPhone from './modules/mascara.js';
const objectMask = new MaskPhone('#telefone');
objectMask.init();

import AtivaMenu from './modules/ativaMenu.js';
const ativaMenu = new AtivaMenu('[data-menu="button"]', '[data-menu="list"]');
ativaMenu.init();