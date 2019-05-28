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

    // PEGAR A PÁGINA ATUAL
    $sPaginaAtual = basename($_SERVER['PHP_SELF'],'.php');
    // PEGAR SE É HTTP OU HTTPS
    define("URL_PROJETO", (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') ? 'http' : 'https');

    // TRUE SERVIDOR REMOTO, FALSE SERVIDOR LOCAL;
    $bAtivaServer = false;
    if($bAtivaServer)
    {
        // DADOS SERVIDOR ONLINE
        define('HOST', 'mysql.hostinger.com');
        define('BANCO', 'u867974294_help');
        define('USUARIO', 'u867974294_dog');
        define('SENHA', 'gabriel');

        // URL AMIGAVEL PARA O SERVIDOR ONLINE
        define("URL_AMIGAVEL", URL_PROJETO."://{$_SERVER['HTTP_HOST']}/");

        // TITULO DAS PÁGINAS
        define("TITULO", 'Help a Dog');
    }
    else
    {
        // DADOS SERVIDOR LOCAL DO COMPUTADOR
        define('HOST', 'localhost');
        define('BANCO', 'help_a_dog');
        define('USUARIO', 'root');
        define('SENHA', '');

        // URL AMIGAVEL PARA O SERVIDOR REMOTO
        define("URL_AMIGAVEL", URL_PROJETO."://{$_SERVER['HTTP_HOST']}/help_a_dog/");

        // TITULO DAS PÁGINAS
        define("TITULO", 'Help a Dog');
    }

    // API DO PAGSEGURO PARA TESTE
    // CONFIGURAÇÃO DO PAGSEGURO
    $bAtivaSandbox = true;
    if ($bAtivaSandbox)
    {
        define('URL_PAGSEGURO', 'https://ws.sandbox.pagseguro.uol.com.br/v2/');
        define('JS_PAGSEGURO', 'https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js');
        define('EMAIL_PAGSEGURO', 'gabrielnakaoka_99@hotmail.com');
        define('TOKEN_PAGSEGURO', '051DF99C7DCA494FA5CC305E1BF0DD65');
    }
    else
    {
        define('URL_PAGSEGURO', 'https://ws.pagseguro.uol.com.br/v2/');
        define('JS_PAGSEGURO', 'https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js');
        define('EMAIL_PAGSEGURO', 'gabrielnakaoka_99@hotmail.com');
        define('TOKEN_PAGSEGURO', 'b9896fd2-cfbe-445d-bb62-6a7a8a5dc56f4ad41ffe4790ad2de6eb3e685056d17fdfdb-343f-404b-8f41-4efc57243a9b');
    }
?>