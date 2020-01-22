<?php
include 'header.php';

$SYSTEM_SCRIPTS = '
<script>
$(document).ready(function() {
    

    

    
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
                                echo '<option value="'.$fornecedor[0].'">'.$fornecedor[1].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </form>
            <hr>
            <ul>
                <?php foreach(getEncomendasForn(24) as $encomenda){
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