<?php
    // CONFIGURAÇÕES DO PROJETO
    require('includes/config.php');

    // CONEXÃO COM O SEVIDOR
    require('includes/conexao.php');

    $url = $_GET['url'];

    // SELECIONA A URL ATUAL QUE ESTA NA PÁGINA
    $oCachorroAtual = $conn->prepare('CALL cachorroAtual(:tUrlAtual)');
    $oCachorroAtual->execute([':tUrlAtual' => $url]);
    $oDadosAtuais = $oCachorroAtual->fetch(PDO::FETCH_ASSOC);
    $oCachorroAtual->closeCursor();

    // SELECIONA SUGESTÕES A CACHORROS COM O MESMO ASPECTOS EM IDADE E PORTE
    $oSugestaoCachorro = $conn->prepare('SELECT * FROM cachorros WHERE cachorros.porte = :porte AND cachorros.idade = :idade AND cachorros.disponibilidade = 1 AND (cachorros.id <> :iId) AND (cachorros.url <> :sUrl) AND (cachorros.disponibilidade <> 0 AND cachorros.disponibilidade IS NOT NULL) ORDER BY RAND() LIMIT 4');
    $oSugestaoCachorro->execute([':porte' => $oDadosAtuais['porte'], ':idade' => $oDadosAtuais['idade'], ':iId' => $oDadosAtuais['id'], ':sUrl' => $oDadosAtuais['url']]);
    $aDadosSugestivos = $oSugestaoCachorro->fetchAll(PDO::FETCH_ASSOC);
    $iQtdsSugestao = $oSugestaoCachorro->rowCount();

    if(!empty($oDadosAtuais['url'])){}
    else
    {
        header("Location: ../adocao");
        exit;
    }
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
    <header id="tittle-dog">
        <div class="container">
            <h1><?= $oDadosAtuais['nome'] ?></h1>
        </div>
    </header>
    <?php
        // MENU
        require('includes/menu.php');  
    ?>
    <section id="detail">
        <div class="container">
            <div class="current-pag">
                <a href="adocao">Adoção</a>
                >
                <?= $oDadosAtuais['nome'] ?>
            </div>
            <div class="row">
                <div class="col-6">
                    <?php
                        echo '<img src="assets/images/cachorros/'.$oDadosAtuais['imagem'].'" alt="'.$oDadosAtuais['nome'].'">'
                    ?>
                </div>
                <div class="col-6">
                    <div class="about">
                        <h2>SOBRE</h2>
                        <p><?= $oDadosAtuais['descricao']; ?></p>
                    </div>
                    <div class="detail">
                        <h2>DETALHES</h2>
                        <p><?= 'Gênero: '.$oDadosAtuais['genero'].' - Porte: '.$oDadosAtuais['porte'].' - Idade: '.$oDadosAtuais['idade'].'' ?></p>
                        <p>Disponibilidade: <span <?= (($oDadosAtuais['disponibilidade'] == 1) ? 'class="on"' : 'class="off"') ?>></span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="contact-detail">
        <div class="container">
            <h2>Gostou <?= (($oDadosAtuais['genero'] == 'Macho' OR $oDadosAtuais['genero'] == 'macho') ? 'do '.$oDadosAtuais['nome'].'' :  'da '.$oDadosAtuais['nome'].'') ?> ?</h2>
            <p>Entre em contato para adotár</p>
            <form id="adocao" name="adocao" method="POST">
                <div class="row">
                    <div class="col-6">
                        <label for="nome">Nome</label>
                        <input type="text" placeholder="Digite seu nome" name="nome" required>
                        <span class="erro"></span>
                    </div>
                    <div class="col-6">
                        <label for="sobrenome">Sobrenome</label>
                        <input type="text" placeholder="Digite seu sobrenome" name="sobrenome" required>
                        <span class="erro"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="email">E-mail</label>
                        <input type="email" placeholder="Digite seu E-mail" name="email" required>
                        <span class="erro"></span>
                    </div>
                    <div class="col-6">
                        <label for="telefone">Telefone ou Celular</label>
                        <input type="tel" placeholder="(xx) xxxxx-xxxx" pattern="(\([0-9]{2}\)[\s])([0-9]{4,5}[-])([0-9]{4})" id="telefone" maxlength="15" name="telefone" required>
                        <span class="erro"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="mensagem">Mensagem</label>
                        <textarea name="mensagem" placeholder="Nos mande uma mensagem para entrarmos em contato" required></textarea>
                        <span class="erro"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-align">
                        <button class="button" name="button">ENVIAR</button>
                        <span class="msg-enviada"></span>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section id="suggestion">
        <div class="container">
            <h2>Sugestões</h2>
            <p><?= (($iQtdsSugestao > 0) ? 'Talvez você se sinta interessado em alguns desses fofinhos' : 'Nenhuma sugestão no momento') ?></p>
            <div class="row">
                <?php
                    if($iQtdsSugestao > 0)
                    {
                        foreach($aDadosSugestivos as $key => $value)
                        {
                            echo '<div class="col-4">';
                            echo '  <div class="box-dogs">';
                            echo '      <img src="assets/images/cachorros/'.$value['imagem'].'">';
                            echo '      <div class="info-dogs">';
                            echo '          <p>'.$value['nome'].'</p>';
                            echo '          '.(($value['genero'] == 'Macho' OR $value['genero'] == 'macho') ? '<svg data-name="Camada 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 290 290"><path d="M276.65.1l-75.84 9.81A11.84 11.84 0 0 0 193.97 30l17 17-53 53a102.92 102.92 0 1 0 32.07 32.07l53-53 17 17a11.83 11.83 0 0 0 20.1-6.85l9.81-75.83A11.83 11.83 0 0 0 276.65.1zM141.17 225.31a54.08 54.08 0 1 1 0-76.48 54.08 54.08 0 0 1 0 76.48zm0 0" fill="#3f3e3e"/></svg>' : '<svg data-name="Camada 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 299.23 299.23"><path d="M121.19 30.55a104.33 104.33 0 0 0-14.45 129.44l-23.26 23.24-18.6-18.59a10.23 10.23 0 0 0-14.47 0l-17.73 17.75a10.24 10.24 0 0 0 0 14.47l18.6 18.59-48.32 48.3a10.19 10.19 0 0 0 0 14.4l18.12 18.08a10.17 10.17 0 0 0 14.4 0l48.29-48.29 18.6 18.59a10.24 10.24 0 0 0 14.47 0l17.74-17.73a10.24 10.24 0 0 0 0-14.47l-18.62-18.58 23.26-23.26a104.3 104.3 0 1 0-18.03-161.94zm112.49 112.49a54.8 54.8 0 1 1 0-77.49 54.8 54.8 0 0 1 0 77.49zm0 0" fill="#3f3e3e"/></svg>
                            ').' ';
                            echo '      </div>';
                            echo '      <div class="button-dogs">';
                            echo '          <a href="detalhe/'.$value['url'].'" class="button">CONHECER</a>';
                            echo '      </div>';
                            echo '  </div>';
                            echo '</div>';
                        }
                    }  
                ?>
            </div>
            <div class="row">
                <div class="col-12 col-align">
                    <a href="adocao" class="button">VER TODOS</a>
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