<?php
    // CONFIGURAÇÕES DO PROJETO
    require('includes/config.php');

    // CONEXÃO COM O SEVIDOR
    require('includes/conexao.php');

    // SELECIONA OS ULTIMOS 3 CACHORROS
    $oSelecionaUltimosCachorros = $conn->prepare("SELECT * FROM cachorros ORDER BY id DESC LIMIT 3");
    $oSelecionaUltimosCachorros->execute();
    $aUltimosCachorros = $oSelecionaUltimosCachorros->fetchAll(PDO::FETCH_ASSOC);
    $iQtdsCachorros = $oSelecionaUltimosCachorros->rowCount();
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

    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="content">
                        <h1>AJUDE QUEM <br>PRECISA!</h1>
                        <p>Ajude cães abandonados que nunca receberam carinho.</p>
                        <a href="#quem-somos" data-animacao class="button">SABER MAIS</a>
                    </div>
                </div>
                <div class="col-6">
                </div>
            </div>
        </div>
    </header>
    <?php
        // MENU
        require('includes/menu.php');  
    ?>
    <section id="quem-somos">
        <div class="container">
            <div class="center-box">
                <div class="col-3">
                    <img src="assets/images/background/quem-somos.png" alt="dog">
                </div>
                <h2>QUEM SOMOS</h2>
                <div class="col-5">
                    <p>
                      Help a dog é uma instituição, onde tem como objetivo de ajudar cachorros de casos de abandono e maus-tratos, tanto fisícos quanto psicólogicos. E adoção de cachorros que estão precisando de um novo lar.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section id="donation">
        <div class="container">
            <h2>DOAÇÕES</h2>
            <div class="row">
                <div class="col-6">
                    <img src="assets/images/background/doacao.png" alt="doação">
                </div>
                <div class="col-6 col-align">
                    <h3>Por que ajudar com <br>doações ?</h3>
                    <p>
                        Com doações você ajuda nossa instituição a dâr o melhor para os 
                        nossos cachorros a crescer e se desenvolver. Com doações você 
                        estara ajudando a mantermos nossas dispesas para continuar 
                        trabalhando e evoluindo para salvarmos e continuar crescendo 
                        mais e mais.
                    </p>
                    <a href="doacao" class="button">FAZER DOAÇÃO</a>
                </div>
            </div>
        </div>
    </section>
    <section id="adoption">
        <div class="container">
            <h2>ADOÇÃO</h2>
            <div class="row">
                <div class="col-6 col-align">
                    <h3>Por que adotar um <br>cachorro ?</h3>
                    <p>
                        Ao escolher adotar, você vai oferecer a ele um lar ou seja, uma 
                        nova oportunidade de viver bem e feliz, além de ganhar um 
                        companheiro por muitos e muitos anos.
                    </p>
                    <a href="adocao" class="button">FAZER ADOÇÃO</a>
                </div>
                <div class="col-6">
                    <img src="assets/images/background/adocao.png" alt="adoção">
                </div>
            </div>
        </div>
    </section>
    <section id="last-dogs">
        <div class="container">
            <h2>ULTIMOS PELUDINHOS Á CHEGAR</h2>
            <div class="row">
                <?php
                    if($iQtdsCachorros > 0)
                    {
                        foreach($aUltimosCachorros as $key => $value)
                        {
                            echo '<div class="col-4">';
                            echo '  <div class="box-dogs">';
                            echo '      <img src="assets/images/cachorros/'.$value['imagem'].'">';
                            echo '      <div class="info-dogs">';
                            echo '          <p>'.$value['nome'].'</p>';
                            echo '          '.(($value['genero'] == 'Macho' OR $value['genero'] == 'macho') ? '<svg data-name="Camada 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 290 290"><path d="M276.65.1l-75.84 9.81A11.84 11.84 0 0 0 193.97 30l17 17-53 53a102.92 102.92 0 1 0 32.07 32.07l53-53 17 17a11.83 11.83 0 0 0 20.1-6.85l9.81-75.83A11.83 11.83 0 0 0 276.65.1zM141.17 225.31a54.08 54.08 0 1 1 0-76.48 54.08 54.08 0 0 1 0 76.48zm0 0" fill="#3f3e3e"/></svg>' : '<svg data-name="Camada 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 299.23 299.23"><path d="M121.19 30.55a104.33 104.33 0 0 0-14.45 129.44l-23.26 23.24-18.6-18.59a10.23 10.23 0 0 0-14.47 0l-17.73 17.75a10.24 10.24 0 0 0 0 14.47l18.6 18.59-48.32 48.3a10.19 10.19 0 0 0 0 14.4l18.12 18.08a10.17 10.17 0 0 0 14.4 0l48.29-48.29 18.6 18.59a10.24 10.24 0 0 0 14.47 0l17.74-17.73a10.24 10.24 0 0 0 0-14.47l-18.62-18.58 23.26-23.26a104.3 104.3 0 1 0-18.03-161.94zm112.49 112.49a54.8 54.8 0 1 1 0-77.49 54.8 54.8 0 0 1 0 77.49zm0 0" fill="#3f3e3e"/></svg>
                            ').' ';
                            echo '      </div>';
                            echo '  </div>';
                            echo '</div>';
                        }
                    }  
                ?>
            </div>
            <div class="row">
                <div class="col-align">
                    <a href="adocao">VER TODOS</a>
                </div>
            </div>
        </div>
    </section>
    <section id="contact">
        <div class="container">
            <h2>CONTATO</h2>
            <form action="dev-contato.php" method="POST">
                <div class="row">
                    <div class="col-6">
                        <label for="nome">Nome</label>
                        <input type="text" required placeholder="Digite seu nome" name="nome">
                    </div>
                    <div class="col-6">
                        <label for="sobrenome">Sobrenome</label>
                        <input type="text" required placeholder="Digite seu sobrenome" name="sobrenome">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="email">E-mail</label>
                        <input type="email" required placeholder="Digite seu E-mail" name="email">
                    </div>
                    <div class="col-6">
                        <label for="telefone">Telefone ou Celular</label>
                        <input type="tel" required placeholder="(DDD) xxxxx-xxxx" pattern="(\([0-9]{2}\)[\s])([0-9]{4,5}[-])([0-9]{4})" id="telefone" maxlength="15" name="telefone">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="mensagem">Mensagem</label>
                        <textarea name="mensagem" required placeholder="Digite alguma mensagem, para sabermos o que você necessita"></textarea>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-12">
                        <button class="button">ENVIAR</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <?php
        // RODAPÉ
        require('includes/footer.php');
    ?>

    <script src="assets/js/style.js" type="module"></script>
</body>
</html>