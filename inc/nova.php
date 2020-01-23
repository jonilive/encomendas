<?php
include 'inc/header.php';

if($_POST){
    
    $inserir = insEncomenda(
        $_POST['fFornecedor'],
        $_SESSION['loggedin']['id'],
        $_POST['fProduto'],
        $_POST['fQuantidade'],
        $_POST['fTipoQuantidade'],
        date("Y-m-d H:i:s", time()),
        $_POST['fDataPedido'],
        $_POST['fDataPrev'],
        $_POST['fObs']
    );

    if($inserir === true){
        $FORM_MESSAGE = '<div class="alert alert-success">Encomenda registada com sucesso!</div>';
    }else{
        $FORM_MESSAGE = '<div class="alert alert-danger">Ocorreu um erro ao registar a encomenda.<br>'.$inserir.'</div>';
    }

    
}

?>
<main role="main" class="container">

<div class="row">
    <div class="col mt-3">
        <?php echo $FORM_MESSAGE;?>
        <h1>Nova encomenda</h1>
    </div>
</div>
    <hr>

    <div class="formulario">
        <form method="POST" action="">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="fProduto">Produto *</label>
                        <input type="text" name="fProduto" id="fProduto" class="form-control" autofocus required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <div class="form-group">
                        <label for="fQuantidade">Quantidade *</label>
                        <input type="number" name="fQuantidade" id="fQuantidade" class="form-control" min="0.01" step="0.01" required>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <label for="fTipoQuantidade">&nbsp;</label>
                        <select name="fTipoQuantidade" id="fTipoQuantidade" class="form-control" required>
                            <option value="un">un</option>
                            <option value="kg">kg</option>
                            <option value="cx">cx</option>
                            <option value="mt">mt</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="fFornecedor">Fornecedor *</label>
                        <select name="fFornecedor" id="fFornecedor" class="form-control" required>
                            <option></option>
                            <?php
                            foreach (getFornecedores() as $fornecedor) {
                                echo '<option value="' . $fornecedor[0] . '">' . $fornecedor[1] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row mt-3 mb-3">
                <div class="col"><h4>Já foi pedido ao fornecedor?</h4></div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="fDataPedido">Data pedido ao fornecedor</label>
                                <input type="date" name="fDataPedido" id="fDataPedido" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="fDataPrev">Data previsão de chegada</label>
                                <input type="date" name="fDataPrev" id="fDataPrev" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="col">
                        <div class="form-group">
                            <label for="fObs">Observações</label>
                            <textarea class="form-control" id="fObs" name="fObs" rows="5"></textarea>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-primary">Registar encomenda</button>
                </div>
            </div>

        </form>
    </div>


</main>
<?php
include 'footer.php';
?>