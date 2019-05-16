'use strict';

// Importações de funções que uso em todo o site
import initAnimaMenu from './modules/animaMenu.js';
import initAtivaMenu from './modules/ativaMenu.js';
import initScrollSuave from './modules/scroll-suave.js';
import functionValidity from './modules/validity-function.js';

initAnimaMenu();
initAtivaMenu();
initScrollSuave();
functionValidity();

// Classe para a utilização de mascara de telefone
import MaskPhone from './modules/mascara.js';

// Seleciona todos os inputs que estiverem o ID de telefone
// Inicia um object constructor 
const selectIdCel = document.getElementById('telefone');
const objectMask = new MaskPhone(selectIdCel).init();