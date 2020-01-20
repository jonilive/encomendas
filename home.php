<?php
include 'header.php';

$SYSTEM_SCRIPTS = '
<script>
$(document).ready(function() {
    $(\'#tabelaencomendas\').DataTable({
        "order": [[ 0, "desc" ]],
        "language": {
            "url": "DataTables/Portuguese.json"
        },
        "fnInitComplete":function(){
            $(\'#tabelaencomendas\').show();
        }
    });
    
} );
</script>
';

?>
<main role="main" class="container">

    <div class="mt-3">
        <h1>Encomendas</h1>
    </div>
    <hr>

    <div class="tabela">
        <table id="tabelaencomendas" class="display table table-striped" style="width:100%;display:none">
            <thead>
                <tr>
                    <th>Encomenda</th>
                    <th>Produto</th>
                    <th>Registo/Pedido</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach(getEncomendas() as $encomenda){

                    echo '<tr>';
                    echo '<td>'.$encomenda[0].'</td>';
                    echo '<td><b>'.$encomenda[3].'</b><br><small>'.$encomenda[4].' '.$encomenda[5].' | '.id2Fornecedor($encomenda[1]).'</small></td>';
                    echo '<td>'.$encomenda[6].'</td>';
                    echo '<td>'.$encomenda[8].'</td>';
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