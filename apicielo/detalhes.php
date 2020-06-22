<?php

if(isset($_POST['paymentId']) && !empty($_POST['paymentId'])){

    $consultaApi = json_decode(consultaApi($_POST['paymentId']),true);
}

?>
</div>
  <div class="container mt-5">   
    <div class="row card border-secondary">
        <div class="card-header text-center"><strong> Detalhes Pagamento </strong></div>  
        <div class="card-body">
            <div class="order-md-1">
                <form class="needs-validation" novalidate action="index.php" method="POST">
                    <input type="hidden" name="page" value="minhas_compras">  
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nome">Numero de identificação do Pedido</label>
                            <input type="text" class="form-control" disabled value="<?=$consultaApi['MerchantOrderId']?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cpf">Valor</label>
                            <input type="text" class="form-control" disabled value="R$ <?=$consultaApi['Payment']['Amount']?>,00">
                        </div>
                    </div>                 
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" disabled value="<?=$consultaApi['Customer']['Name']?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" name="cpf" id="cpf" placeholder="000.000.000-00" disabled value="<?=$consultaApi['Customer']['Identity']?>">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nome">Data de pagamento</label>
                            <input type="text" class="form-control" disabled value="<?=date('d/m/Y H:i:s',strtotime($consultaApi['Payment']['ReceivedDate']))?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cpf">Código de Autorização</label>
                            <input type="text" class="form-control" disabled value="<?=$consultaApi['Payment']['AuthorizationCode']?>">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="exemplo@exemplo.com" disabled value="<?=$consultaApi['Customer']['Email']?>">
                        </div>
                         <div class="col-md-6 mb-3">
                            <label for="email">TID</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="exemplo@exemplo.com" disabled value="<?=$consultaApi['Payment']['Tid']?>">
                        </div>
                    </div>                       
                    <hr class="mb-4">
                    <h4 class="mb-3">Dados do cartão</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nome_cartao">Nome do Cartão</label>
                            <input type="text" class="form-control" name="nome_cartao" id="nome_cartao" placeholder="Nome do Cartão" disabled value="<?=$consultaApi['Payment']['CreditCard']['Holder']?>">
                           
                        </div>                        
                        <div class="col-md-6 mb-3">
                            <label for="num_cartao">Final do cartão de crédito</label>
                            <input type="text" class="form-control" name="num_cartao" id="num_cartao" placeholder="0000 0000 0000 0000" disabled value="<?=substr ($consultaApi['Payment']['CreditCard']['CardNumber'],-4)?>">
                            
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="bandeira">Bandeira</label>
                            <input type="text" class="form-control" name="bandeira" id="bandeira"  disabled value="<?=$consultaApi['Payment']['CreditCard']['Brand']?>">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="vencimento">Data de vencimento</label>
                            <input type="text" class="form-control" name="vencimento" id="vencimento" placeholder="MM/AAAA" disabled value="<?=$consultaApi['Payment']['CreditCard']['ExpirationDate']?>">
                        </div>     
                    </div>
                    <hr class="mb-4">                    
                </form>
                <form action="index.php" method="POST">              
                    <button class="btn btn-danger btn-lg btn-block mt-3" type="submit">Voltar</button>                    
                </form>
            </div>
        </div>
    </div>
</div>