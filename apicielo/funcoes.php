<?php
function inserir_dados($id_pagamento, $nome, $produto){
    $sql = "INSERT INTO  dados_usuario 
                (
                    paymentId, 
                    nome,
                    produto
                ) 
            VALUES
                (
                    '".$id_pagamento."',
                    '".addslashes($nome)."',
                    '".addslashes($produto)."'
                ) ";
    $rs = db_query($sql) or die("Erro DataBase");       
}

function select_produtos(){     
    $sql = "SELECT id, produto, nome, paymentId FROM dados_usuario ORDER BY id Desc";
    $rs = db_query($sql) or die(); 
    while($row = mysqli_fetch_array($rs)){
        $array[] = $row;
    }    
    if(!empty($array)){
        return $array;
    }else{
        return NULL;
    }
}

function consultaApi($paymentId){
    $curl = curl_init ();

    curl_setopt_array (
        $curl , array ( CURLOPT_URL => "https://apiquerysandbox.cieloecommerce.cielo.com.br//1/sales/".$paymentId ,
        CURLOPT_RETURNTRANSFER => true ,
        CURLOPT_ENCODING => "" ,
        CURLOPT_MAXREDIRS => 10 ,
        CURLOPT_TIMEOUT => 0 ,
        CURLOPT_FOLLOWLOCATION => true ,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1 ,
        CURLOPT_CUSTOMREQUEST => "GET" ,
        CURLOPT_HTTPHEADER => array ( "MerchantId: 46d132e7-7829-40bb-b45a-66b7efe84d16" ,
            "Content-Type: text/json" ,
            "MerchantKey: SMSFPBSLVHVXAZGTHENWFBXRLUEGCRHAWBJHMEXV" ) , ) );

    $response = curl_exec ( $curl );

    curl_close ( $curl );
    return $response;

}

?>