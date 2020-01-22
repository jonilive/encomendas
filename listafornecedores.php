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

?>
<main role="main" class="container">

    <div class="row">
        <div class="col mt-3">
            <?php echo $FORM_MESSAGE; ?>
            <form id="fornecedorform">
                <div class="form-row">
                    <div class="col">
                        <h2>Listagem para fornecedor</h2>
                    </div>
                    <div class="col">
                        <select class="form-control form-control-lg" id="fornecedorSelect">
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
                <?php foreach(getEncomendasForn($fornecedoratual) as $encomenda){
                    echo '<li>'.$encomenda[4].$encomenda[5].' ...... '.$encomenda[3].'</li>';
                }
                ?>
            </ul>
        </div>
    </div>

</main>
<?php
include 'footer.php';
?>