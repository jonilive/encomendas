<?php
include 'header.php';


?>
<main role="main" class="container">

    <div class="mt-3">
        <h1>Nova encomenda</h1>
    </div>
    <hr>

    <div class="formulario">
        <form method="POST" action="">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="fProduto">Produto</label>
                        <input type="text" name="fProduto" id="fProduto" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="fFornecedor">Fornecedor</label>
                        <select name="fFornecedor" id="fFornecedor" class="form-control">
                            <option></option>
                            <?php 
                            foreach(getFornecedores() as $fornecedor){
                                echo '<option value="'.$fornecedor[0].'">'.$fornecedor[1].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="fDataPedido">Data pedido</label>
                        <input type="date" name="fDataPedido" id="fDataPedido" class="form-control">
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