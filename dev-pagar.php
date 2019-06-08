<?php
    // CONFIGURAÇÕES DO PROJETO
    require('includes/config.php');

    $token_card = $_POST['senderToken'];
    $hash_card = $_POST['senderHash'];

    echo $token_card;

    $aDadosArray['email'] = EMAIL_PAGSEGURO;
    $aDadosArray['token'] = TOKEN_PAGSEGURO;


    $aDadosArray['paymentMode'] = 'default';
    $aDadosArray['paymentMethod'] = 'creditCard';
    $aDadosArray['receiverEmail'] = EMAIL_PAGSEGURO;
    $aDadosArray['currency'] = 'BRL';

    $aDadosArray['itemId1'] = '1';
    $aDadosArray['itemDescription1'] = 'Doação';
    $aDadosArray['itemAmount1'] = '500.00';
    $aDadosArray['itemQuantity1'] = '1';

    $aDadosArray['notificationURL'] = 'https://sualoja.com.br/notifica.html';

    $aDadosArray['reference'] = '1001';
    $aDadosArray['senderName'] = 'Jose Comprador';
    $aDadosArray['senderCPF'] = '22111944785';
    $aDadosArray['senderAreaCode'] = '11';
    $aDadosArray['senderPhone'] = '56273440';
    $aDadosArray['senderEmail'] = 'c00430386760712969645@sandbox.pagseguro.com.br';
    $aDadosArray['senderHash'] = $hash_card;

    $aDadosArray['shippingAddressRequired'] = true;
    $aDadosArray['shippingAddressStreet'] = 'Av. Brig. Faria Lima';
    $aDadosArray['shippingAddressNumber'] = '1384';
    $aDadosArray['shippingAddressComplement'] = '5o andar';
    $aDadosArray['shippingAddressDistrict'] = 'Jardim Paulistano';
    $aDadosArray['shippingAddressPostalCode'] = '01452002';
    $aDadosArray['shippingAddressCity'] = 'Sao Paulo';
    $aDadosArray['shippingAddressState'] = 'SP';

    $aDadosArray['shippingAddressCountry'] = 'BRA';
    $aDadosArray['shippingType'] = '1';
    $aDadosArray['creditCardToken'] = $token_card;
    $aDadosArray['installmentQuantity'] = '1';
    $aDadosArray['installmentValue'] = '0.00';
    $aDadosArray['noInterestInstallmentQuantity'] = 1;

    $aDadosArray['creditCardHolderName'] = 'Jose Comprador';
    $aDadosArray['creditCardHolderCPF'] = '22111944785';
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