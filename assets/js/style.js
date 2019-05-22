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

const objectMask = new MaskPhone('#telefone');
objectMask.init();