<?php
include 'header.php';

$encomenda = getEncomenda($_GET['editar']);

if ($_POST) {

    $update = editEncomenda(
        $encomenda['id'],
        $_POST['fFornecedor'],
        $_SESSION['loggedin']['id'],
        $_POST['fProduto'],
        $_POST['fQuantidade'],
        $_POST['fTipoQuantidade'],
        $encomenda['data_registo'],
        $_POST['fDataPedido'],
        $_POST['fDataPrev'],
        $_POST['fObs']
    );

    if ($update === true) {
        $FORM_MESSAGE = '<div class="alert alert-success">Alterações guardadas com sucesso!</div>';
    } else {
        $FORM_MESSAGE = '<div class="alert alert-danger">Ocorreu um erro ao editar a encomenda.<br>' . $update . '</div>';
    }

    $encomenda = getEncomenda($_GET['editar']);
}


?>
<main role="main" class="container">

    <div class="row">
        <div class="col mt-3"><?php echo $FORM_MESSAGE; ?></div>
    </div>
    <div class="row">
        <div class="col">
            <h1>Editar encomenda</h1>
        </div>
        <div class="col text-right">
            <span>Pedido por<br><?php echo getUser($encomenda['id_utilizador']); ?></span>
        </div>
    </div>
    <hr>

    <div class="formulario">
        <form method="POST" action="">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="fProduto">Produto *</label>
                        <input type="text" name="fProduto" id="fProduto" class="form-control" value="<?php echo $encomenda['pedido']; ?>" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <div class="form-group">
                        <label for="fQuantidade">Quantidade *</label>
                        <input type="number" name="fQuantidade" id="fQuantidade" class="form-control" min="0.01" step="0.01" value="<?php echo $encomenda['quantidade']; ?>" required>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <label for="fTipoQuantidade">&nbsp;</label>
                        <select name="fTipoQuantidade" id="fTipoQuantidade" class="form-control" required>
                            <option value="un" <?php if ($encomenda['quantidade_type'] == "un") {
                                                    echo ' selected';
                                                } ?>>un</option>
                            <option value="kg" <?php if ($encomenda['quantidade_type'] == "kg") {
                                                    echo ' selected';
                                                } ?>>kg</option>
                            <option value="cx" <?php if ($encomenda['quantidade_type'] == "cx") {
                                                    echo ' selected';
                                                } ?>>cx</option>
                            <option value="mt" <?php if ($encomenda['quantidade_type'] == "mt") {
                                                    echo ' selected';
                                                } ?>>mt</option>
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
                                $selected = $fornecedor[0] == $encomenda['id_fornecedor'] ? "selected" : "";
                                echo '<option value="' . $fornecedor[0] . '" ' . $selected . '>' . $fornecedor[1] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row mt-3 mb-3">
                <div class="col">
                    <h4>Já foi pedido ao fornecedor?</h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="fDataPedido">Data pedido ao fornecedor</label>
                                <input type="date" name="fDataPedido" id="fDataPedido" class="form-control" value="<?php echo $encomenda['data_pedido']; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="fDataPrev">Data previsão de chegada</label>
                                <input type="date" name="fDataPrev" id="fDataPrev" class="form-control" value="<?php echo $encomenda['data_prevista']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="col">
                        <div class="form-group">
                            <label for="fObs">Observações</label>
                            <textarea class="form-control" id="fObs" name="fObs" rows="5"><?php echo $encomenda['obs']; ?></textarea>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-primary">Guardar alterações</button>
                    <a class="btn btn-danger text-white" href="<?php echo $SYSTEM_URL;?>?apagarencomenda=<?php echo $encomenda['id'];?>" onclick="return confirm('Deseja mesmo apagar esta encomenda?');">Apagar encomenda</a>
                </div>
            </div>

        </form>
    </div>


</main>
<?php
include 'footer.php';
?>