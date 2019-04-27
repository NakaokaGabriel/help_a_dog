<?php
    // CONFIGURAÇÕES DO PROJETO
    require('includes/config.php');

    // CONEXÃO COM O SEVIDOR
    require('includes/conexao.php');

    $iPaginaAtual = ((!empty($_GET['pagina_atual'])) ? $_GET['pagina_atual'] - 1 : 0);
    $iQtdsRegistro = 9;
    $iPrimeiraPagina = ($iPaginaAtual * $iQtdsRegistro);

    // AS QUERYS SELECIONA CADA CATEGORIA VENDO SE ENCONTRA ALGO PELO QUE O USUÁRIO COLOCOU NO FILTRO ENTÃO EU FAÇO UM SELECIONAMENTO DO QUE ELE COLOCOU PARA QUE NÃO HAJA ERRO PELA PARTE DO SISTEMA
    // SE ENCONTRAR ALGO ELA EXIBE SE NÃO APENAS MOSTRA QUE NENHUM RESULTADO FOI ENCONTRADO
    switch(true)
    {
        // FILTRA TODAS AS CATEGORIAS
        case(!empty($_GET['genero']) AND !empty($_GET['porte']) AND !empty($_GET['idade'])):
            $genero = $_GET['genero'];
            $porte = $_GET['porte'];
            $idade = $_GET['idade'];
            $generoFiltro = '%'.$genero.'%';
            $porteFiltro = '%'.$porte.'%';
            $idadeFiltro = '%'.$idade.'%';

            $oCountRegistro = $conn->prepare('SELECT COUNT(*) as pages FROM cachorros WHERE genero LIKE :resultadoGenero AND porte LIKE :resultadoPorte AND idade LIKE :resultadoIdade');
            $oCountRegistro->execute([
                ':resultadoGenero'  => $generoFiltro,
                ':resultadoPorte'   => $porteFiltro,
                ':resultadoIdade'   => $idadeFiltro,
            ]);
            $iQtdsTotalRegistro = $oCountRegistro->fetch(PDO::FETCH_ASSOC);
            $iTotalRegistro = $iQtdsTotalRegistro['pages'];

            $oFiltraRegistros = $conn->prepare('SELECT * FROM cachorros WHERE genero LIKE :resultadoGenero AND porte LIKE :resultadoPorte AND idade LIKE :resultadoIdade ORDER BY id DESC LIMIT '.$iPrimeiraPagina.', '.$iQtdsRegistro.'');
            $oFiltraRegistros->execute([
                ':resultadoGenero'  => $generoFiltro,
                ':resultadoPorte'   => $porteFiltro,
                ':resultadoIdade'   => $idadeFiltro,
            ]);
        break;
        // FILTRA GENERO E PORTE
        case(!empty($_GET['genero']) AND !empty($_GET['porte'])):
            $genero = $_GET['genero'];
            $porte = $_GET['porte'];
            $generoFiltro = '%'.$genero.'%';
            $porteFiltro = '%'.$porte.'%';

            $oCountRegistro = $conn->prepare('SELECT COUNT(*) as pages FROM cachorros WHERE genero LIKE :resultadoGenero AND porte LIKE :resultadoPorte');
            $oCountRegistro->execute([
                ':resultadoGenero'  => $generoFiltro,
                ':resultadoPorte'   => $porteFiltro,
            ]);
            $iQtdsTotalRegistro = $oCountRegistro->fetch(PDO::FETCH_ASSOC);
            $iTotalRegistro = $iQtdsTotalRegistro['pages'];

            $oFiltraRegistros = $conn->prepare('SELECT * FROM cachorros WHERE genero LIKE :resultadoGenero AND porte LIKE :resultadoPorte ORDER BY id DESC LIMIT '.$iPrimeiraPagina.', '.$iQtdsRegistro.'');
            $oFiltraRegistros->execute([
                ':resultadoGenero'  => $generoFiltro,
                ':resultadoPorte'   => $porteFiltro,
            ]);
        break;
        // FILTRA PORTE E IDADE
        case(!empty($_GET['porte']) AND !empty($_GET['idade'])):
            $porte = $_GET['porte'];
            $idade = $_GET['idade'];
            $porteFiltro = '%'.$porte.'%';
            $idadeFiltro = '%'.$idade.'%';

            $oCountRegistro = $conn->prepare('SELECT COUNT(*) as pages FROM cachorros WHERE porte LIKE :resultadoPorte AND idade LIKE :resultadoIdade');
            $oCountRegistro->execute([
                ':resultadoPorte'   => $porteFiltro,
                ':resultadoIdade'   => $idadeFiltro,
            ]);
            $iQtdsTotalRegistro = $oCountRegistro->fetch(PDO::FETCH_ASSOC);
            $iTotalRegistro = $iQtdsTotalRegistro['pages'];

            $oFiltraRegistros = $conn->prepare('SELECT * FROM cachorros WHERE porte LIKE :resultadoPorte AND idade LIKE :resultadoIdade ORDER BY id DESC LIMIT '.$iPrimeiraPagina.', '.$iQtdsRegistro.'');
            $oFiltraRegistros->execute([
                ':resultadoPorte'   => $porteFiltro,
                ':resultadoIdade'   => $idadeFiltro,
            ]);
        break;
        // FILTRA GENERO E IDADE
        case(!empty($_GET['genero']) AND !empty($_GET['idade'])):
            $genero = $_GET['genero'];
            $idade = $_GET['idade'];
            $generoFiltro = '%'.$genero.'%';
            $idadeFiltro = '%'.$idade.'%';

            $oCountRegistro = $conn->prepare('SELECT COUNT(*) as pages FROM cachorros WHERE genero LIKE :resultadoGenero AND idade LIKE :resultadoIdade');
            $oCountRegistro->execute([
                ':resultadoGenero'  => $generoFiltro,
                ':resultadoIdade'   => $idadeFiltro,
            ]);
            $iQtdsTotalRegistro = $oCountRegistro->fetch(PDO::FETCH_ASSOC);
            $iTotalRegistro = $iQtdsTotalRegistro['pages'];

            $oFiltraRegistros = $conn->prepare('SELECT * FROM cachorros WHERE genero LIKE :resultadoGenero AND idade LIKE :resultadoIdade ORDER BY id DESC LIMIT '.$iPrimeiraPagina.', '.$iQtdsRegistro.'');
            $oFiltraRegistros->execute([
                ':resultadoGenero'  => $generoFiltro,
                ':resultadoIdade'   => $idadeFiltro,
            ]);
        break;
        // FILTRA GENERO
        case(!empty($_GET['genero'])):
            $genero = $_GET['genero'];
            $generoFiltro = '%'.$genero.'%';

            $oCountRegistro = $conn->prepare('SELECT COUNT(*) as pages FROM cachorros WHERE genero LIKE :resultadoGenero');
            $oCountRegistro->execute([
                ':resultadoGenero'  => $generoFiltro,
            ]);
            $iQtdsTotalRegistro = $oCountRegistro->fetch(PDO::FETCH_ASSOC);
            $iTotalRegistro = $iQtdsTotalRegistro['pages'];

            $oFiltraRegistros = $conn->prepare('SELECT * FROM cachorros WHERE genero LIKE :resultadoGenero ORDER BY id DESC LIMIT '.$iPrimeiraPagina.', '.$iQtdsRegistro.'');
            $oFiltraRegistros->execute([
                ':resultadoGenero'  => $generoFiltro,
            ]);
        break;
        // FILTRA PORTE
        case(!empty($_GET['porte'])):
            $porte = $_GET['porte'];
            $porteFiltro = '%'.$porte.'%';

            $oCountRegistro = $conn->prepare('SELECT COUNT(*) as pages FROM cachorros WHERE porte LIKE :resultadoPorte');
            $oCountRegistro->execute([
                ':resultadoPorte'   => $porteFiltro,
            ]);
            $iQtdsTotalRegistro = $oCountRegistro->fetch(PDO::FETCH_ASSOC);
            $iTotalRegistro = $iQtdsTotalRegistro['pages'];

            $oFiltraRegistros = $conn->prepare('SELECT * FROM cachorros WHERE porte LIKE :resultadoPorte ORDER BY id DESC LIMIT '.$iPrimeiraPagina.', '.$iQtdsRegistro.'');
            $oFiltraRegistros->execute([
                ':resultadoPorte'   => $porteFiltro,
            ]);
        break;
        // FILTRA IDADE
        case(!empty($_GET['idade'])):
            $idade = $_GET['idade'];
            $idadeFiltro = '%'.$idade.'%';

            $oCountRegistro = $conn->prepare('SELECT COUNT(*) as pages FROM cachorros WHERE idade LIKE :resultadoIdade');
            $oCountRegistro->execute([
                ':resultadoIdade'   => $idadeFiltro,
            ]);
            $iQtdsTotalRegistro = $oCountRegistro->fetch(PDO::FETCH_ASSOC);
            $iTotalRegistro = $iQtdsTotalRegistro['pages'];

            $oFiltraRegistros = $conn->prepare('SELECT * FROM cachorros WHERE idade LIKE :resultadoIdade ORDER BY id DESC LIMIT '.$iPrimeiraPagina.', '.$iQtdsRegistro.'');
            $oFiltraRegistros->execute([
                ':resultadoIdade'   => $idadeFiltro,
            ]);
        break;
        // CASO VIER EM BRANCO REDIRECIONE PARA Á PÁGINA DE ADOÇÃO
        default:
            header('Location: adocao');
            exit;
        break;
    }
    $aDadosFiltrados = $oFiltraRegistros->fetchAll(PDO::FETCH_ASSOC);
    $iQtdsFiltro = $oFiltraRegistros->rowCount();

    $iQtdsTotalPaginas = ceil($iTotalRegistro / $iQtdsRegistro);
    $iQtdsTotalPaginas++;
    
    $iLimite = 1;

    $iLimiteEsquerda = ((($iPaginaAtual - $iLimite) > 1) ? $iPaginaAtual - $iLimite : 1);
    $iLimiteDireita = ((($iPaginaAtual + $iLimite) < ($iQtdsTotalPaginas - 2)) ? $iPaginaAtual + ($iLimite + 3) : $iQtdsTotalPaginas);
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
            <h1>
              <?php 
              if($iQtdsFiltro > 0)
              {
                  echo 'Resultado do filtro: ' . ((!empty($_GET['genero']) ? (($_GET['genero'] == 'macho') ? 'Macho' : 'Fêmea') . ((!empty($_GET['porte']) ? ', ' : '')) : '')) . ((!empty($_GET['porte']) ? (($_GET['porte'] == 'pequeno') ? 'Pequeno' : (($_GET['porte'] == 'medio') ? 'Médio' : 'Grande')) . ((!empty($_GET['idade']) ? ', ' : '')) : '')) . ((!empty($_GET['idade']) ? (($_GET['idade'] == 'filhote') ? 'Filhote' : (($_GET['idade'] == 'adulto') ? 'Adulto' : 'Idoso')) : ''));
              }
              else
              {
                  echo 'Nenhum resultado encontrado';
              }
              ?>
            </h1>
        </div>
    </header>
    <?php
        // MENU
        require('includes/menu.php');  
    ?>
    <section id="filter">
        <div class="container">
            <form action="filtro" method="get">
                <div class="row">
                    <div class="col-3">
                        <p>Gênero</p>
                        <div class="filter">
                            <input type="radio" value="macho" name="genero" id="macho">
                            <label for="macho">Macho</label>
                            <input type="radio" value="femea" name="genero" id="femea">
                            <label for="femea">Fêmea</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <p>Porte</p>
                        <div class="filter">
                            <input type="radio" value="pequeno" name="porte" id="pequeno">
                            <label for="pequeno">Pequeno</label>
                            <input type="radio" value="medio" name="porte" id="medio">
                            <label for="medio">Médio</label>
                            <input type="radio" value="grande" name="porte" id="grande">
                            <label for="grande">Grande</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <p>Idade</p>
                        <div class="filter">
                            <input type="radio" value="filhote" name="idade" id="filhote">
                            <label for="filhote">Filhote</label>
                            <input type="radio" value="adulto" name="idade" id="adulto">
                            <label for="adulto">Adulto</label>
                            <input type="radio" value="idoso" name="idade" id="idoso">
                            <label for="idoso">Idoso</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <button class="button" submit>FILTRAR</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section id="list-dogs">
        <div class="container" id="lista">
            <div class="pags">
                <a href="adocao">Adoção</a>
                >
                <?= ((!empty($_GET['genero']) ? (($_GET['genero'] == 'macho') ? 'Macho' : 'Fêmea') . ((!empty($_GET['porte']) ? ', ' : '')) : '')) . ((!empty($_GET['porte']) ? (($_GET['porte'] == 'pequeno') ? 'Pequeno' : (($_GET['porte'] == 'medio') ? 'Médio' : 'Grande')) . ((!empty($_GET['idade']) ? ', ' : '')) : '')) . ((!empty($_GET['idade']) ? (($_GET['idade'] == 'filhote') ? 'Filhote' : (($_GET['idade'] == 'adulto') ? 'Adulto' : 'Idoso')) : '')); ?>
            </div>
            <div class="row">
                <?php
                    foreach($aDadosFiltrados as $key => $value)
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
                ?>
            </div>
            <div class="row">
                <div class="paginacao">
                    <?php
                        if($iPaginaAtual > 0)
                        {
                            echo '<ul>';
                            echo '  <li>';
                            echo '      <a href="filtro?'.((!empty($_GET['genero'])) ? 'genero='.$_GET['genero'].'&' : '').((!empty($_GET['porte'])) ? 'porte='.$_GET['porte'].'&' : '').((!empty($_GET['idade'])) ? 'idade='.$_GET['idade'].'&' : '').'pagina_atual='.((($iPaginaAtual - 1) == 0) ? '' : $iPaginaAtual).'#lista"><</a>';
                            echo '  </li>';
                        }
                        else
                        {
                            echo '<ul>';
                            echo '  <li>';
                            echo '      <a href="javascript:void(0);"><</a>';
                            echo '  </li>';
                        }
                        for($iNumeroPagina = $iLimiteEsquerda; $iNumeroPagina < $iLimiteDireita; $iNumeroPagina++)
                        {
                            if($iPaginaAtual == ($iNumeroPagina - 1))
                            {
                                echo '  <li>';
                                echo '      <a href="javascript:void(0);" class="active-pag">'.$iNumeroPagina.'</a>';
                                echo '  </li>';
                            }
                            else
                            {
                                $iNextPage = $iNumeroPagina - 1;
                                echo '  <li><a href="filtro?'.((!empty($_GET['genero'])) ? 'genero='.$_GET['genero'].'&' : '').((!empty($_GET['porte'])) ? 'porte='.$_GET['porte'].'&' : '').((!empty($_GET['idade'])) ? 'idade='.$_GET['idade'].'&' : '').'pagina_atual='.(($iNextPage == 0) ? '' : $iNextPage + 1).'#lista">'.$iNumeroPagina.'</a></li>';
                            }
                        }
                        if(($iPaginaAtual + 2) < $iQtdsTotalPaginas)
                        {
                            echo '  <li>';
                            echo '      <a href="filtro?'.((!empty($_GET['genero'])) ? 'genero='.$_GET['genero'].'&' : '').((!empty($_GET['porte'])) ? 'porte='.$_GET['porte'].'&' : '').((!empty($_GET['idade'])) ? 'idade='.$_GET['idade'].'&' : '').'pagina_atual='.($iPaginaAtual + 2).'#lista">></a>';
                            echo '  </li>';
                            echo '</ul>';
                        }
                        else
                        {
                            echo '  <li>';
                            echo '      <a href="javascript:void(0);">></a>';
                            echo '  </li>';
                            echo '</ul>';
                        }
                        echo '<p>Total de páginas <span>'.($iQtdsTotalPaginas - 1).'</span></p>';
                    ?>
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