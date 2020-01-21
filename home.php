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
        <table id="tabelaencomendas" class="display table table-striped table-bordered table-hover" style="width:100%;display:none">
            <thead>
                <tr>
                    <th style="width:30px">#</th>
                    <th>Produto</th>
                    <th>Registo/Pedido</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach(getEncomendas() as $encomenda){

                    $estadoPedido = empty($encomenda[7])?'<span class="text-danger">Por pedir</span>':'<span class="text-info">Pedido em '.$encomenda[7].'</span>';
                    $previsao = empty($encomenda[8])?'':'<span class="text-success">Previsão de entrega em '.$encomenda[8].'</span>';
                    echo '<tr style="cursor: pointer;" onclick="window.location.href=\''.$SYSTEM_URL.'?editar='.$encomenda[0].'\' ">';
                    echo '<td>'.$encomenda[0].'</td>';
                    echo '<td><b>'.$encomenda[3].'</b><br><small>'.$encomenda[4].' '.$encomenda[5].' | '.id2Fornecedor($encomenda[1]).'</small></td>';
                    echo '<td><small>'.$encomenda[6].'<br>'.$estadoPedido.'<br>'.$previsao.'</small></td>';
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