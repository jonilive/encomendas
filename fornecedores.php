<?php
include 'header.php';

$SYSTEM_SCRIPTS = '
<script>
$(document).ready(function() {
    $(\'#tabelafornecedores\').DataTable({
        "order": [[ 0, "desc" ]],
        "language": {
            "url": "DataTables/Portuguese.json"
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

    <div class="tabela">
        <table id="tabelafornecedores" class="display table table-striped table-bordered table-hover" style="width:100%;display:none">
            <thead>
                <tr>
                    <th style="width:30px">#</th>
                    <th>Fornecedor</th>
                    <th style="width:50px">Pedidos</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach(getFornecedores() as $fornecedor){

                    echo '<tr>';
                    echo '<td>'.$fornecedor[0].'</td>';
                    echo '<td>'.$fornecedor[1].'</td>';
                    echo '<td>NUM_PEDIDOS</td>';
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