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
    <header id="title">
        <div class="container">
            <h1>CONTATO</h1>
            <p>Precisa de alguma informação ?</p>
        </div>
    </header>
    <?php
        // MENU
        require('includes/menu.php');  
    ?>
    <section id="contact">
        <div class="container">
            <div class="row" id="page-contact">
                <div class="col-6">
                    <p>Quer entrar em contato ?</p>
                    <p>Nos mande mensagem ou nos ligue para saber o que você precisa</p>
                    <ul>
                        <li><img src="assets/images/icones/celular.png" alt="celular"><a href="tel:11999999999">(11) 99999-9999</a></li>
                        <li><img src="assets/images/icones/telefone.png" alt="telefone"><a href="tel:1177777777">(11) 7777-7777</a></li>
                        <li><img src="assets/images/icones/email.png" alt="email"><a href="mailto:contato@helpadog.com">contato@helpadog.com</a></li>
                        <li><img src="assets/images/icones/local.png" alt="local">São paulo, Guarulhos</li>
                    </ul>
                </div>
                <div class="col-6">
                    <form action="dev-email-enviar.php" method="post">
                        <label for="nome">Nome</label>
                        <input type="text" placeholder="Digite seu nome" name="nome">
                        <label for="nome">Sobrenome</label>
                        <input type="text" placeholder="Digite seu sobrenome" name="sobrenome">
                        <label for="nome">E-mail</label>
                        <input type="email" placeholder="Digite seu e-mail" name="email">
                        <label for="nome">Telefone</label>
                        <input type="text" placeholder="Digite seu telefone" name="telefone">
                        <label for="mensagem">Mensagem</label>
                        <textarea name="mensagem" placeholder="Nos mande uma mensagem para entrarmos em contato"></textarea>
                        <div class="col-6 col-align">
                            <button class="button">ENVIAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
        // RODAPÉ
        require('includes/footer.php');
    ?>

    <script src="assets/js/style.js" type="module"></script>
</body>
</html>