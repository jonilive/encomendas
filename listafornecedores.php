<?php
include 'header.php';

$fornecedoratual = !empty($_GET['listafornecedores'])?$_GET['listafornecedores']:getFornecedores()[0][0];
$SYSTEM_SCRIPTS = '
<script>
$(document).ready(function() {
    
    $( "#fornecedorSelect" ).change(function() {
        window.location.href = "'.$SYSTEM_URL.'?listafornecedores="+$(this).val();
      });
    
} );
</script>
';

if($_POST){
    
    $update = setEncomendaPedida($_POST['fornecedor']);
    if ($update === true) {
        $FORM_MESSAGE = '<div class="alert alert-success">Encomenda marcada como pedida</div>';
    } else {
        $FORM_MESSAGE = '<div class="alert alert-danger">Ocorreu um erro ao concluir esta encomenda.<br>' . $update . '</div>';
    }
}


?>
<main role="main" class="container">

    <div class="row">
        <div class="col mt-3">
            <?php echo $FORM_MESSAGE; ?>
            <div class="row d-none d-print-block">
                <div class="col">
                    <img src="<?php echo $SYSTEM_URL;?>print_header.jpg" style="height:3cm;" />
                </div>
                <hr>
            </div>
            <form id="fornecedorform">
                <div class="form-row">
                    <div class="col">
                        <h2>Encomenda para fornecedor</h2>
                    </div>
                    <div class="col">
                        <select class="form-control form-control-lg" id="fornecedorSelect" autofocus>
                            <?php foreach(getFornecedores() as $fornecedor){
                                $opselected = ($fornecedor[0]==$fornecedoratual)?"selected":"";
                                echo '<option value="'.$fornecedor[0].'" '.$opselected.'>'.$fornecedor[1].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </form>
            <hr>
            <ul>
                <?php foreach(getEncomendasForn($fornecedoratual, true) as $encomenda){
                    echo '<li>'.$encomenda[4].$encomenda[5].' ...... '.$encomenda[3].'</li>';
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="row d-print-none">
        <div class="col">
            <hr>
            <form action="" method="POST">
                <input type="hidden" name="fornecedor" value="<?php echo $fornecedoratual;?>" />
                <input type="submit" value="Fiz agora esta encomenda" class="btn btn-primary" onclick="return confirm('Deseja mesmo marcar esta encomenda como pedida?\nESTA AÇÃO DÁ MUITO TRABALHO A DESFAZER!!!');" />
                <button class="btn btn-info" onclick="window.print();return false;"><i class="fas fa-print"></i> Imprimir encomenda</button>
            </form>
        </div>
    </div>

</main>
<?php
include 'footer.php';
?>