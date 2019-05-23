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
                    <form action="dev-contato.php" method="post" id="contato">
                        <label for="nome">Nome</label>
                        <input type="text" placeholder="Digite seu nome" name="nome" required>
                        <span class="erro"></span>
                        <label for="nome">Sobrenome</label>
                        <input type="text" placeholder="Digite seu sobrenome" name="sobrenome" required>
                        <span class="erro"></span>
                        <label for="nome">E-mail</label>
                        <input type="email" placeholder="Digite seu e-mail" name="email" required>
                        <span class="erro"></span>
                        <label for="nome">Telefone</label>
                        <input type="text" placeholder="(xx) xxxxx-xxxx" pattern="(\([0-9]{2}\)[\s])([0-9]{4,5}[-])([0-9]{4})" id="telefone" maxlength="15" name="telefone" required>
                        <span class="erro"></span>
                        <label for="mensagem">Mensagem</label>
                        <textarea name="mensagem" placeholder="Nos mande uma mensagem para entrarmos em contato" required></textarea>
                        <span class="erro"></span>
                        <div class="col-6 col-align">
                            <button class="button" name="button">ENVIAR</button>
                            <span class="msg-enviada"></span>
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

    <script src="assets/js/style-min.js"></script>
</body>
</html>