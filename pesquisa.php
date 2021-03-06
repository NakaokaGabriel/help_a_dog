<?php
    // CONFIGURAÇÕES DO PROJETO
    require('includes/config.php');

    // CONEXÃO COM O SEVIDOR
    require('includes/conexao.php');

    if(!empty($_GET['p']))
    {
        $pesquisa = addslashes($_GET['p']);
        $resultadoPesquisa = '%'.$pesquisa.'%';

        $iPaginaAtual = ((!empty($_GET['pagina_atual'])) ? $_GET['pagina_atual'] - 1 : 0);
        $iQtdsRegistro = 9;
        $iPrimeiraPagina = ($iPaginaAtual * $iQtdsRegistro);

        // CONTA QUANTOS REGISTRO RETORNOU
        $oCountRegistros = $conn->prepare('SELECT COUNT(*) as pages FROM cachorros WHERE nome LIKE :tResultado');
        $oCountRegistros->execute([':tResultado' => $resultadoPesquisa]);
        $iTotalRegistros = $oCountRegistros->fetch(PDO::FETCH_ASSOC);
        $iQtdsTotal = $iTotalRegistros['pages'];

        // PEGA NO BANCO DE DADOS A PESQUISA MAIS PERTA DO QUE O USUÁRIO DIGITOU
        $oBuscaRegistro = $conn->prepare('SELECT * FROM cachorros WHERE nome LIKE :tResultado ORDER BY id DESC LIMIT '.$iPrimeiraPagina.', '.$iQtdsRegistro.'');
        $oBuscaRegistro->execute([':tResultado' => $resultadoPesquisa]);
        $aResultados = $oBuscaRegistro->fetchAll(PDO::FETCH_ASSOC);
        $iQtdsPesquisa = $oBuscaRegistro->rowCount();

        $iQtdsPaginas = ceil($iQtdsTotal / $iQtdsRegistro);
        $iQtdsPaginas++;

        $iLimite = 1;

        $iLimiteEsquerda = ((($iPaginaAtual - $iLimite) > 1) ? $iPaginaAtual - $iLimite : 1);
        $iLimiteDireita = ((($iPaginaAtual + $iLimite) < ($iQtdsPaginas - 2)) ? $iPaginaAtual + ($iLimite + 3) : $iQtdsPaginas);
    }
    else
    {
        header('Location: adocao');
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
    <header id="title">
        <div class="container">
            <h1><?= (($iQtdsPesquisa > 0) ? 'Resultados da pesquisa: '.$_GET['p'].' ( '.$iQtdsPesquisa.' )' : 'Nenhum resultado encontrado') ?></h1>
        </div>
    </header>
    <?php
        // MENU
        require('includes/menu.php');  
    ?>
    <section id="search">
        <div class="container">
            <form action="pesquisa" method="get">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <input type="text" name="p" value="<?= $_GET['p'] ?>" placeholder="pesquisar nome">
                            <button>
                                <svg viewBox="0 0 25 25">
                                  <path d="M23.8 20.7l-5.4-5.4c.9-1.4 1.3-3.1 1.3-4.8 0-2.5-1-4.9-2.8-6.7C15.2 2 12.8 1 10.3 1c-2.6 0-5 1-6.8 2.8C1.7 5.6.8 8 .8 10.5s1 4.9 2.8 6.7C5.3 19 7.7 20 10.3 20c1.7 0 3.4-.5 4.8-1.3l5.4 5.4c.4.4 1 .7 1.7.7.6 0 1.2-.2 1.7-.7.8-1 .8-2.5-.1-3.4zm-13.5-3.6c-3.6 0-6.5-2.9-6.5-6.5S6.7 4 10.3 4s6.5 2.9 6.5 6.5-2.9 6.6-6.5 6.6z" fill="#2d2b2b"/>
                                </svg>
                            </button>
                        </div>
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
                <?= $_GET['p']; ?>
            </div>
            <div class="row">
                <?php
                    foreach($aResultados as $key => $value)
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
                        echo '          <a href="detalhe/'.$value['url'].'" class="button">Conhecer</a>';
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
                                echo '      <a href="pesquisa?p='.$_GET['p'].'&pagina_atual='.((($iPaginaAtual - 1) == 0) ? '' : $iPaginaAtual).'#lista"><</a>';
                                echo '  </li>';
                            }
                            else
                            {
                                echo '<ul>';
                                echo '  <li>';
                                echo '      <a href="javascript:void();"><</a>';
                                echo '  </li>';
                            }
                            for($iNumeroPagina = $iLimiteEsquerda; $iNumeroPagina < $iLimiteDireita; $iNumeroPagina++)
                            {
                                if($iPaginaAtual == ($iNumeroPagina - 1))
                                {
                                    echo '  <li>';
                                    echo '      <a href="javascript:void();" class="active-pag">'.$iNumeroPagina.'</a>';
                                    echo '  </li>';
                                }
                                else
                                {
                                    $iNextPage = $iNumeroPagina - 1;
                                    echo '  <li><a href="pesquisa?p='.$_GET['p'].'&pagina_atual='.(($iNextPage == 0) ? '' : $iNextPage + 1).'#lista">'.$iNumeroPagina.'</a></li>';
                                }
                            }
                            if(($iPaginaAtual + 2) < $iQtdsPaginas)
                            {
                                echo '  <li>';
                                echo '      <a href="pesquisa?p='.$_GET['p'].'&pagina_atual='.($iPaginaAtual + 2).'#lista">></a>';
                                echo '  </li>';
                                echo '</ul>';
                            }
                            else
                            {
                                echo '  <li>';
                                echo '      <a href="javascript:void();">></a>';
                                echo '  </li>';
                                echo '</ul>';
                            }
                            echo '<p>Total de páginas <span>'.($iQtdsPaginas - 1).'</span></p>';
                        ?>
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