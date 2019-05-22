// --------------------------------------------
// Importações de classes que uso em todo o site
// --------------------------------------------
import ScrollMenu from './modules/animaMenu.js';
import ScrollSuave from './modules/scroll-suave.js';
import Loading from './modules/loading.js';
import MaskPhone from './modules/mascara.js';
import AtivaMenu from './modules/ativaMenu.js';
import ValidaForms from './modules/valida-forms.js';

// Evento de animação ao menu ao dar scroll
const scrollmenu = new ScrollMenu('[data-menu="mainMenu"]');
scrollmenu.init();

// Evento de scroll mais suave ao clickar alguma tag com a
const scrollsuave = new ScrollSuave('[data-animacao]', );
scrollsuave.init();

// Evento de carregamento de página
const loading = new Loading('.loader', 'body');
loading.init();

// Mascara de telefone com todos os inputs que
// possuirem o input com o id de telefone
const objectMask = new MaskPhone('#telefone');
objectMask.init();

// Evento para ativar animação do menu
const ativaMenu = new AtivaMenu('[data-menu="button"]', '[data-menu="list"]');
ativaMenu.init();

// Estilização de validação de formulario
const validaForms = new ValidaForms('#contato');
validaForms.init();