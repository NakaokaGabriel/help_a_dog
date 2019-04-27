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
    <?php
        // MENU
        require('includes/menu.php');  
    ?>
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="logo">
                        <svg viewBox="0 0 310 290.17">
                            <path d="M153.01-.01C68.5-.01.01 65.07.01 145.35c0 48.78 25.32 91.91 64.12 118.28 7.55-11 16.21-23 25-36.71 2.15-3.36 4.44-7.38 6.73-11.78q.86-1.65 1.72-3.36l.89-1.79a217.09 217.09 0 0 0 13.31-33.6l8.64-33.15 29.93-7.3-14.64 18.18h26.45l17.14 15.6 24.16-.2 10.76 10.13-10.83 27.8h-41.23l-6.06-3.23-3 7.59-1.94 4.87-1.65 4.15 12.65 50.22 3.82 19.13c78.45-6.25 140.08-68.67 140.08-144.81C306.03 65.09 237.52-.01 153.01-.01zm42.08 91.91h-28.93v28.92h-25.15V91.91h-28.92V66.76h28.92V37.84h25.15v28.92h28.93z" fill="#3f3e3e"/>
                        </svg>
                    </div>
                </div>
                <div class="col-6">
                    <h1>SOBRE NÓS</h1>
                    <p>Help a dog é uma instituição, onde tem como objetivo de ajudar cachorros de casos de abandono e maus-tratos, tanto fisícos quanto psicólogicos.</p>
                    <p>Para isso tentamos ajudar esses cãezinhos a voltar ou ter uma vida feliz, dando todo suporte para que essa reabilitação seja um sucesso. Amamos o que fazemos, assim damos suporte pela sua vida inteira, caso não sejam adotados.</p>
                    <p>Junto com uma equipe de profissionais para que esses cães voltem a ser felizes tentamos dâr uma boa estadia para eles, sempre dando um conforto como se fosse as suas casas.</p>
                    <p>Para tudo isso ser possivel contamos com apoio de vários doadores e parceiros de nossa instituição, com eles é possivel fazer a instituição crescer cada vez mais ajudando mais cachorros que sofreram em casos de abandono ou maus-tratos.</p>
                </div>
            </div>
            <div class="about-footer">
                <h2>AVISO</h2>
                <div class="row">
                    <div class="col-12">
                        <p>Ao navegar pelo nosso site garantimos parte segurança ao fazer doações e pelos formulario de contato. Ao adotar um cachorro você tera a responsabilidade de lidar com ele, pelo seus comportamentos e sentimentos estarão em suas mãos. Adotar um cachorro sera necessraio cuidar dele e fazer com que ele sinta o carinho de sua casa. </p>
                    </div>
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