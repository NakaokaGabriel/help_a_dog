<?php
// ------------------------------------------------------------
// TODAS AS CONFIGURAÇÕES DO PROJETO CONTENDO:
// - DADOS DO SERVIDOR
// - INICIO DE UMA SESSÃO, E SAIDA
// - HORARIO LOCAL DO SERVIDOR
// - CONFIGURAÇÕES DO URL PARA URL'S AMIGAVEIS
// ------------------------------------------------------------

    // INICIO DE SESSÃO
    session_start();
    // BUFFER DE SAIDA
    ob_start();

    // HORARIO LOCAL
    date_default_timezone_set('America/Sao_Paulo');

    // TRUE SERVIDOR REMOTO, FALSE SERVIDOR LOCAL;
    $bAtivaServer = false;

    if($bAtivaServer)
    {
        // DADOS SERVIDOR ONLINE
        define('HOST', 'mysql.hostinger.com');
        define('BANCO', 'u867974294_help');
        define('USUARIO', 'u867974294_dog');
        define('SENHA', 'gabriel');
    }
    else
    {
        // DADOS SERVIDOR LOCAL DO COMPUTADOR
        define('HOST', 'localhost');
        define('BANCO', 'help_a_dog');
        define('USUARIO', 'root');
        define('SENHA', '');
    }

    // CONFIGURAÇÕES DA URL
    define("URL_PROJETO", (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') ? 'http' : 'https');
    define("URL_AMIGAVEL", URL_PROJETO."://{$_SERVER['HTTP_HOST']}/help_a_dog/");

    // TITULO DO PROJETO
    define("TITULO", 'Help a Dog');

    $sPaginaAtual = basename($_SERVER['PHP_SELF'],'.php');
?>