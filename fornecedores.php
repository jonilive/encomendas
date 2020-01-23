<?php
include 'header.php';


if ($_POST) {
    $inserir = insFornecedor($_POST['inFornecedor']);

    if ($inserir === true) {
        $FORM_MESSAGE = '<div class="alert alert-success">Fornecedor inserido com sucesso!</div>';
    } else {
        $FORM_MESSAGE = '<div class="alert alert-danger">Ocorreu um erro ao criar o fornecedor.<br>' . $inserir . '</div>';
    }
}


$SYSTEM_SCRIPTS = '
<script>
$(document).ready(function() {
    $(\'#tabelafornecedores\').DataTable({
        "order": [[ 0, "desc" ]],
        "language": {
            "url": "lib/DataTables/Portuguese.json"
        },
        "fnInitComplete":function(){
            $(\'#tabelafornecedores\').show();
        }
    });
    
} );
</script>
';

?>
<main role="main" class="container">

    <div class="mt-3">
        <h1>Fornecedores</h1>
    </div>
    <hr>
    <form action="" method="POST">
        <div class="row">
            <div class="col"><?php echo $FORM_MESSAGE; ?></div>
        </div>
        <div class="row">
            <div class="col-10">
                <div class="form-group">
                    <input type="text" name="inFornecedor" id="inFornecedor" class="form-control" placeholder="Inserir novo fornecedor" required>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <input type="submit" value="Novo" class="btn btn-block btn-primary" />
                </div>
            </div>
        </div>
    </form>
    <hr>

    <div class="tabela">
        <table id="tabelafornecedores" class="display table table-striped table-bordered table-hover" style="width:100%;display:none">
            <thead>
                <tr>
                    <th style="width:30px">#</th>
                    <th>Fornecedor</th>
                    <th style="width:50px">#</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach (getFornecedores() as $fornecedor) {

                    echo '<tr>';
                    echo '<td>' . $fornecedor[0] . '</td>';
                    echo '<td>' . $fornecedor[1] . '</td>';
                    if(countFornecedores($fornecedor[0]) > 0){
                        echo '<td><a href="" class="btn btn-danger disabled">Apagar</a></td>';
                    }else{
                        echo '<td><a href="'.$SYSTEM_URL.'?apagarfornecedor='.$fornecedor[0].'" class="btn btn-danger" onclick="return  confirm(\'Deseja mesmo apagar este fornecedor?\');">Apagar</a></td>';
                    }
                    
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>


</main>
<?php
include 'footer.php';
?>