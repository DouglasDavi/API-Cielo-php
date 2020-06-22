
</div>
  <div class="container mt-5">   
    <div class="row card border-secondary">
        <div class="card-header text-center"><strong> Fazer Pagamento</strong> </div>  
        <div class="card-body">
            <div class="order-md-1">
                <form class="needs-validation" novalidate action="index.php" method="POST">
                    <input type="hidden" name="page" value="pagamento">
                    <input type="hidden" name="total" id="total" value="<?=$_POST['valor']?>">
                    <input type="hidden" name="produto" id="produto" value="<?=$_POST['produto']?>">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" required>
                            <div class="invalid-feedback">
                                Digite o seu Nome!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" name="cpf" id="cpf" placeholder="000.000.000-00" required >
                            <div class="invalid-feedback">
                                Digite o seu CPF!
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="exemplo@exemplo.com" required>
                            <div class="invalid-feedback">
                                Digite o seu E-mail!
                            </div>
                        </div>
                    </div>                       
                    <hr class="mb-4">
                    <h4 class="mb-3">Dados do cartão</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nome_cartao">Nome do Cartão</label>
                            <input type="text" class="form-control" name="nome_cartao" id="nome_cartao" placeholder="Nome do Cartão" required>
                            <div class="invalid-feedback">
                                Digite o nome escrito no cartão!
                            </div>
                        </div>                        
                        <div class="col-md-6 mb-3">
                            <label for="num_cartao">Número do cartão de crédito</label>
                            <input type="text" class="form-control" name="num_cartao" id="num_cartao" placeholder="0000 0000 0000 0000" required>
                            <div class="invalid-feedback">
                                Digite o número do cartão
                            </div>
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="bandeira">Bandeira</label>
                            <select name="bandeira" id="bandeira" class="form-control custom-select" required>
                                <option value="Visa">Visa</option>
                                <option value="Master">Master Card</option>
                                <option value="AMEX">American Express</option>
                                <option value="Elo">Elo</option>
                                <option value="Diners">Diners Club</option>
                                <option value="Discover">Discover</option>
                                <option value="JCB">JCB</option>
                                <option value="Aura">Aura</option>
                            </select>
                            <div class="invalid-feedback">
                                Selecione a Bandeira
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="vencimento">Data de vencimento</label>
                            <input type="text" class="form-control" name="vencimento" id="vencimento" placeholder="MM/AAAA" required>
                            <div class="invalid-feedback">
                                Digite a data de vencimento
                            </div>
                        </div>                         
                        <div class="col-md-3 mb-3">
                            <label for="cvv">CVV</label>
                            <input type="text" class="form-control" name="cvv" id="cvv" placeholder="CVV" required>
                            <div class="invalid-feedback">
                                Security code required
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Efetuar Pagamento</button>
                </form>
                <form action="index.php" method="POST">              
                    <button class="btn btn-danger btn-lg btn-block mt-3" type="submit">Cancelar Compra</button>                    
                </form>
            </div>
        </div>
    </div>
</div>
 <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2020-2020 Douglas Romano</p>
    
  </footer>
 
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	
<script src="js/jqueryMask.js"></script>
<script>

$(document).ready(function(){
    $('#vencimento').mask('00/0000');
    $('#cvv').mask('000');
    $('#num_cartao').mask('0000 0000 0000 0000');
    $('#cpf').mask('000.000.000-00', {reverse: true});
});


(function() {
    'use strict';

    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');

        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

</script>