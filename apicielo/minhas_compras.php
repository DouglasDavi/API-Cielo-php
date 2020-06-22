<?php

$select_produtos = select_produtos();

if(isset($_SESSION['msg'])){?>
    <div class="container col-xs-12 col-md-6 text-center mt-3">
        <div class="alert <?=$_SESSION['alertNivel']?> alert-dismissible fade show" role="alert">
            <strong><?=$_SESSION['msg']?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
<?php } 
    unset($_SESSION['msg']);
    unset($_SESSION['alertNivel']);
?>
<div class="container">
    <div class="card border-secondary mt-5">
        <div class="card-header text-center"><h4><strong>Minhas Compras</strong></h4></div>
        <div class="card-body text-secondary">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Produto</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if(!empty($select_produtos)){
                            foreach ($select_produtos as $key => $value) {?>
                                <tr>
                                    <td><?=$value['id']?></td>
                                    <td><?=$value['produto']?></td>
                                    <td><?=$value['nome']?></td> 
                                    <td>
                                        <form action="index.php" method="POST">
                                            <input type="hidden" name="page" value="detalhes">
                                            <input type="hidden" name="paymentId" value="<?=$value['paymentId']?>">
                                            <button type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i></button>                                    
                                        </form>
                                    </td>
                                </tr>  
                    <?php
                            }
                        }
                    ?>                                             
                    </tbody>                       
                </table>
                <?php
                    if(empty($select_produtos)){?>
                        <div class="text-center">Seu carrinho ainda está vazio </div>
                <?php
                    }
                ?>     
            </div>
        </div>
    </div>
    <a class="btn btn-danger mt-2" href="index.php"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar </a>
</div>
