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
    <div class="loader">
        <div class="spinner"></div>
    </div>
    <header id="title">
        <div class="container">
            <h1>DOAÇÕES</h1>
            <div class="row">
                <div class="col-12 col-align">
                    <p>
                        Quer ajudar os nossos cãezinhos?
                        <br>Doe a quantidade que você puder nos ajudara muito.
                        <br>Obrigado!
                    </p>
                </div>
            </div>
        </div>
    </header>
    <?php
        // MENU
        require('includes/menu.php');  
    ?>
    <section id="donations-page">
        <div class="container">
        <div class="valors">
            <p><span></span> Valores de pagamento</p>
                <div class="row">
                    <div class="col-3">
                        <div class="box">
                            <input type="radio" name="valor" id="10" value="10,00">
                            <label for="10"><span>R$</span> 10,00</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="box">
                            <input type="radio" name="valor" id="20" value="20,00">
                            <label for="20"><span>R$</span> 20,00</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="box">
                            <input type="radio" name="valor" id="30" value="30,00">
                            <label for="30"><span>R$</span> 30,00</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="box">
                            <input type="radio" name="valor" id="40" value="40,00">
                            <label for="40"><span>R$</span> 40,00</label>
                        </div>
                    </div>
                </div>                          
                <div class="row">
                    <div class="col-3">
                        <div class="box">
                            <input type="radio" name="valor" id="80" value="80,00">
                            <label for="80"><span>R$</span> 80,00</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="box">
                            <input type="radio" name="valor" id="90" value="90,00">
                            <label for="90"><span>R$</span> 90,00</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="box">
                            <input type="radio" name="valor" id="100" value="100,00">
                            <label for="100"><span>R$</span> 100,00</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="box">
                            <input type="radio" name="valor" id="110" value="110,00">
                            <label for="110"><span>R$</span> 110,00</label>
                        </div>
                    </div>
                </div>
        </div>
            <form name="doacao" action="dev-pagar.php" method="POST">
                <div class="tips">
                    <div class="row">
                        <div class="col-12">
                            <div class="valores">
                                <label for="valors">R$</label>
                                <input type="text" name="price" value="600.00" disabled  class="money">
                            </div>
                        </div>
                    </div>                         
                    <div class="tips-payments">
                        <p class="active">Cartão de credito</p>
                        <p>Boleto</p>
                    </div>
                    <fieldset name="info-payments" class="info-payments">
                        <div class="cart">
                            <p><span></span> Informações do pagamento</p>
                            <div class="row">
                                <div class="col-8">
                                    <label for="numero">Número do cartão</label>
                                    <input type="text" name="numeroCartao" maxlength="19" placeholder="xxxx xxxx xxxx xxxx" id="cartao">
                                </div>
                                <div class="col-2">
                                    <label for="numero">CVV</label>
                                    <input type="text" name="cvv" maxlength="3" placeholder="xxx">
                                </div>
                                <div class="col-2">
                                    <label for="numero">Bandeira</label>
                                    <select name="bandeiras" id="bandeiras">
                                        <option value="" selected disabled>Bandeiras</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="nome">Nome do titular</label>
                                    <input type="text" name="nome_titular" placeholder="Digite o nome completo">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <label for="nome">CPF do titular</label>
                                    <input type="text" name="cpf_titular" placeholder="Digite o CPF do cartão">
                                </div>
                                <div class="col-2">
                                    <label for="mes-expiração">Mês de validade</label>
                                    <input type="text" name="mes" maxlength="2" placeholder="12">
                                </div>
                                <div class="col-2">
                                    <label for="ano-expiração">Ano de validade</label>
                                    <input type="text" name="ano" maxlength="4" placeholder="2030">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset name="personal-info" class="personal-info">
                        <p><span></span> Informações pessoais</p>
                        <div class="row">
                            <div class="col-6">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" placeholder="Digite seu nome">
                            </div>
                            <div class="col-6">
                                <label for="sobrenome">Sobrenome</label>
                                <input type="text" name="sobrenome" placeholder="Digite seu sobrenome">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="nome">CPF</label>
                                <input type="text" name="cpf" placeholder="Digite seu CPF">
                            </div>
                            <div class="col-6">
                                <label for="telefone">Telefone</label>
                                <input type="text" placeholder="(xx) xxxxx-xxxx" pattern="(\([0-9]{2}\)[\s])([0-9]{4,5}[-])([0-9]{4})" id="telefone" maxlength="15" name="telefone" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" placeholder="Digite seu e-mail">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="cep">CEP</label>
                                <input type="text" name="cep" placeholder="Digite o CEP">
                            </div>
                            <div class="col-2">
                                <label for="estado">Estado</label>
                                <select name="estado" id="">
                                    <option value="" disabled selected>Selecione um estado</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="cidade">Cidade</label>
                                <input type="text" name="cidade" placeholder="Digite a cidade">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label for="bairro">Bairro</label>
                                <input type="text" name="bairro" placeholder="Digite o bairro">
                            </div>
                            <div class="col-4">
                                <label for="endereco">Endereço</label>
                                <input type="text" name="endereco" placeholder="Av.rua">
                            </div>
                            <div class="col-2">
                                <label for="numero">Número</label>
                                <input type="text" name="numero" placeholder="Digite o número">
                            </div>
                            <div class="col-2">
                                <label for="complemento">Complemento</label>
                                <input type="text" name="complemento" placeholder="Digite o complemento">
                            </div>
                        </div>
                    </fieldset>
                    <input type="hidden" name="senderToken" class="tokenCartao">
                    <input type="hidden" name="senderHash" class="hashCartao">
                    <div class="row">
                        <div class="col-12 col-align">
                            <button class="button">DOAR</button>
                        </div>
                    </div>
                </div>
            </form>
    </section>
    <?php
        // RODAPÉ
        require('includes/footer.php');
    ?>

    <script src="assets/js/style-min.js"></script>
    <script type="text/javascript" src="<?= JS_PAGSEGURO; ?>"></script>
</body>
</html>