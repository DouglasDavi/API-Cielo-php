<?php

/*
// SDK com creditcard 


// MerchantId 46d132e7-7829-40bb-b45a-66b7efe84d16
// MerchantKey SMSFPBSLVHVXAZGTHENWFBXRLUEGCRHAWBJHMEXV


//merchanId 28279d62-9617-44ce-9534-ae0d85731327
// merchantKey NOZYDUJUHEICQZNLGNEYVCDLWNQJWUAHMBFDISZZ


require 'vendor/autoload.php';


use Cielo\API30\Ecommerce\RecurrentPayment;

use Cielo\API30\Merchant;

use Cielo\API30\Ecommerce\Environment;
use Cielo\API30\Ecommerce\Sale;
use Cielo\API30\Ecommerce\CieloEcommerce;
use Cielo\API30\Ecommerce\Payment;
use Cielo\API30\Ecommerce\CreditCard;

use Cielo\API30\Ecommerce\Request\CieloRequestException;
use Cielo\API30\Ecommerce\Request\AbstractRequest;






// Configure o ambiente
$environment = $environment = Environment::sandbox();

// Configure seu merchant
$merchant = new Merchant('46d132e7-7829-40bb-b45a-66b7efe84d16', 'SMSFPBSLVHVXAZGTHENWFBXRLUEGCRHAWBJHMEXV');

// Crie uma instância de Sale informando o ID do pedido na loja
$sale = new Sale('123');

// Crie uma instância de Customer informando o nome do cliente
$customer = $sale->customer($_POST['nome']);

// Crie uma instância de Payment informando o valor do pagamento
$payment = $sale->payment(15700);


// Crie uma instância de Credit Card utilizando os dados de teste
// esses dados estão disponíveis no manual de integração
$payment->setType(Payment::PAYMENTTYPE_CREDITCARD)
        ->creditCard($_POST['cvv'], $_POST['bandeira'])
        ->setExpirationDate($_POST['vencimento'])
        ->setCardNumber(str_replace(" ", '', $_POST['num_cartao']))
        ->setHolder($_POST['nome']);

// Crie o pagamento na Cielo
try {
    // Configure o SDK com seu merchant e o ambiente apropriado para criar a venda
    $sale = (new CieloEcommerce($merchant, $environment))->createSale($sale);

    // Com a venda criada na Cielo, já temos o ID do pagamento, TID e demais
    // dados retornados pela Cielo
    $paymentId = $sale->getPayment()->getPaymentId();

    // Com o ID do pagamento, podemos fazer sua captura, se ela não tiver sido capturada ainda
    //$sale = (new CieloEcommerce($merchant, $environment))->captureSale($paymentId, 15700, 0);

    // E também podemos fazer seu cancelamento, se for o caso
    //$sale = (new CieloEcommerce($merchant, $environment))->cancelSale($paymentId, 15700);
} catch (CieloRequestException $e) {
    // Em caso de erros de integração, podemos tratar o erro aqui.
    // os códigos de erro estão todos disponíveis no manual de integração.
    $error = $e->getCieloError();
}


echo "<pre>";
print_r($sale);
echo "</pre>";


echo "<pre>";
print_r($paymentId);
echo "</pre>";
exit();

$result = json_decode($retorno_da_cielo, true);

var_dump($result['sale']['merchantOrderId']);

exit();
if($resposta['Payment']['Status'] == "1"){   
    $_SESSION['msg'] = "Compra Realizada Com Sucesso!";
    $_SESSION['alertNivel'] = "alert-success";
}else{    
    $_SESSION['msg'] = "Algo deu errado aconteceu com sua compra!";
    $_SESSION['alertNivel'] = "alert-danger";
}
Header('Location: index.php?page=form_pagamento');
*/




$body = '{  
   "MerchantOrderId":"'.rand(0,99999999).'",
    "Customer":{  
      "Name":"'.$_POST['nome'].'",
      "Identity":"'.preg_replace('/[^0-9]/', '', $_POST['cpf']).'",
      "IdentityType":"CPF",
      "Email":"'.$_POST['email'].'",
    },
   "Payment":{  
     "Type":"CreditCard",
     "Amount":'.(int)$_POST['total'].',
     "Currency":"BRL",
     "Country":"BRA",
     "ServiceTaxAmount":0,
     "Installments":1,
     "Interest":"ByMerchant",
     "Capture":false,
     "Authenticate":false,    
     "Recurrent": false,
     "SoftDescriptor":"",
     "CreditCard":{  
         "CardNumber":"'.str_replace(" ", '', $_POST['num_cartao']).'",
         "Holder":"'.$_POST['nome_cartao'].'",
         "ExpirationDate":"'.$_POST['vencimento'].'",
         "SecurityCode":"'.$_POST['cvv'].'",
         "SaveCard":"false",
         "Brand":"'.$_POST['bandeira'].'"
     }
   }
}';
 $curl = curl_init ();
 curl_setopt_array (
     $curl , array ( CURLOPT_URL => "https://apisandbox.cieloecommerce.cielo.com.br/1/sales" ,
     CURLOPT_RETURNTRANSFER => true ,
     CURLOPT_ENCODING => "" ,
     CURLOPT_MAXREDIRS => 10 ,
     CURLOPT_TIMEOUT => 0 ,
     CURLOPT_FOLLOWLOCATION => true ,
     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1 ,
     CURLOPT_CUSTOMREQUEST => "POST" ,
     CURLOPT_POSTFIELDS=> $body,
     CURLOPT_HTTPHEADER => array ( "Content-Type: application/json" ,
         "MerchantId: 46d132e7-7829-40bb-b45a-66b7efe84d16" ,
         "MerchantKey: SMSFPBSLVHVXAZGTHENWFBXRLUEGCRHAWBJHMEXV" ) , ) );
 
 $response = curl_exec ( $curl );
 
 curl_close ( $curl );
 

 $resposta = json_decode($response,true);

$page = "form_pagamento";
if (isset($resposta[0]['Code'])){
    $_SESSION['msg'] = "Erro: ".$resposta[0]['Message'];
    $_SESSION['alertNivel'] = "alert-danger";
} else {
    if ($resposta['Payment']['Status'] == "1"){
        inserir_dados($resposta['Payment']['PaymentId'],$_POST['nome'],$_POST['produto']);
        $_SESSION['msg'] = "Compra Realizada Com Sucesso!";
        $_SESSION['alertNivel'] = "alert-success";
        $page = "minhas_compras";
    } else {
        $_SESSION['msg'] = "Erro: ".$resposta['Payment']['ReturnMessage'];
        $_SESSION['alertNivel'] = "alert-danger";
    }
}
Header('Location: index.php?page='.$page);
?>
