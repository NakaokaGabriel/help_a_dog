<?php
    // CONFIGURAÇÕES DO PROJETO
    require('includes/config.php');

    // CONEXÃO COM O SEVIDOR
    require('includes/conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
        // META NAMES E LINKS
        require('includes/script-header.php');
    ?>
    <title><?= TITULO; ?></title>
    <!-- SEO -->
    <meta name="keyword" content="help a dog, ajude um cachorro, Instituição de caridade, cachorros, doações, parcerias">
    <meta name="description" content="Instituição de caridade para cachorros carentes e que sofreram maus-tratos">
    <meta name="author" content="Gabriel Lavigne Nakaoka">
    <meta name="robots" content="index, follow">
</head>
<body>
    <div class="loader">
        <div class="spinner"></div>
    </div>
    <?php
        // MENU
        require('includes/menu.php');  
    ?>
    <div class="congratulations">
        <div class="center-box">
            <img src="assets/images/icones/cachorro.png" alt="">
            <h1>Obrigado, pela doação.</h1>
            <p>A equipe Help a Dog te agradece imensamente pela sua contribuição, <br>esperamos que você venha nos visitar algum dia para ver nossos fofinhos</p>
            <a href="./">Voltar para página principal</a>
        </div>
    </div>

    <script src="assets/js/style-min.js"></script>
    <script type="text/javascript" src="<?= JS_PAGSEGURO; ?>"></script>
</body>
</html>