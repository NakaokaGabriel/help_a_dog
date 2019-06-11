<?php
    // CONFIGURAÇÕES DO PROJETO
    require('includes/config.php');

    $token_card = $_POST['senderToken'];
    $hash_card = $_POST['senderHash'];

    $doacao_preco = $_POST['price'];
    $preco_total = str_replace(',', '.', $doacao_preco);

    $aDadosArray['email'] = EMAIL_PAGSEGURO;
    $aDadosArray['token'] = TOKEN_PAGSEGURO;

    $aDadosArray['paymentMode'] = 'default';
    $aDadosArray['paymentMethod'] = 'creditCard';
    $aDadosArray['receiverEmail'] = EMAIL_PAGSEGURO;
    $aDadosArray['currency'] = 'BRL';

    $aDadosArray['itemId1'] = '1';
    $aDadosArray['itemDescription1'] = 'Doação';
    $aDadosArray['itemAmount1'] = $preco_total;
    $aDadosArray['itemQuantity1'] = '1';

    $aDadosArray['notificationURL'] = 'https://sualoja.com.br/notifica.html';

    $aDadosArray['reference'] = '1001';
    $aDadosArray['senderName'] = $_POST['nome'] . ' ' . $_POST['sobrenome'];
    $aDadosArray['senderCPF'] = $_POST['cpf'];
    $aDadosArray['senderAreaCode'] = '11';
    $aDadosArray['senderPhone'] = '56273440';
    $aDadosArray['senderEmail'] = 'c00430386760712969645@sandbox.pagseguro.com.br';
    $aDadosArray['senderHash'] = $hash_card;

    $aDadosArray['shippingAddressRequired'] = true;

    $aDadosArray['creditCardToken'] = $token_card;
    $aDadosArray['installmentQuantity'] = '1';
    $aDadosArray['installmentValue'] = $preco_total;
    $aDadosArray['noInterestInstallmentQuantity'] = 2;

    $aDadosArray['creditCardHolderName'] = $_POST['nome_titular'];
    $aDadosArray['creditCardHolderCPF'] = $_POST['cpf_titular'];
    $aDadosArray['creditCardHolderBirthDate'] = '27/10/1987';
    $aDadosArray['creditCardHolderAreaCode'] = '11';
    $aDadosArray['creditCardHolderPhone'] = '56273440';
    $aDadosArray['billingAddressStreet'] = 'Av. Brig. Faria Lima';
    $aDadosArray['billingAddressNumber'] = '1384';
    $aDadosArray['billingAddressComplement'] = '5o andar';
    $aDadosArray['billingAddressDistrict'] = 'Jardim Paulistano';
    $aDadosArray['billingAddressPostalCode'] = '01452002';
    $aDadosArray['billingAddressCity'] = 'Sao Paulo';
    $aDadosArray['billingAddressState'] = 'SP';
    $aDadosArray['billingAddressCountry'] = 'BRA';

    $buildQuery = http_build_query($aDadosArray);
    $url = URL_PAGSEGURO . 'transactions';

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded; charset=UTF-8'));
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $buildQuery);
    $retorno = curl_exec($curl);
    curl_close($curl);

    $xml = simplexml_load_string($retorno);

    $retorno = ['erro' => true, 'dados' => $xml];
    echo json_encode($retorno);
    exit;
?>