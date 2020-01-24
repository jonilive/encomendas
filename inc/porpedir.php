<?php
include 'inc/header.php';

$SYSTEM_SCRIPTS = '
<script>
$(document).ready(function() {
    $(\'#tabelaencomendas\').DataTable({
        "order": [[ 0, "desc" ]],
        "language": {
            "url": "lib/DataTables/Portuguese.json"
        },
        "fnInitComplete":function(){
            $(\'#tabelaencomendas\').show();
        }
    });

    $( "#tipoView" ).change(function() {
        if($(this).val() == "todas"){ window.location.href = "'.$SYSTEM_URL.'"; }
        if($(this).val() == "porpedir"){ window.location.href = "'.$SYSTEM_URL.'?porpedir"; }
        if($(this).val() == "pedidas"){ window.location.href = "'.$SYSTEM_URL.'?pedidas"; }
        if($(this).val() == "jaconcluidas"){ window.location.href = "'.$SYSTEM_URL.'?jaconcluidas"; }
        if($(this).val() == "min"){ window.location.href = "'.$SYSTEM_URL.'?min"; }
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
                        <h2>Encomendas</h2>
                    </div>
                    <div class="col-4">
                        <select class="form-control form-control-lg" id="tipoView">
                            <option value="todas">Mostrar todas as encomendas</option>
                            <option value="porpedir" selected>Mostrar encomendas por pedir</option>
                            <option value="pedidas">Mostrar encomendas pedidas</option>
                            <option value="jaconcluidas">Mostrar encomendas já concluidas</option>
                            <option value="min">Mostrar vista minimizada</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
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
                foreach(getEncomendas("porpedir") as $encomenda){

                    $estadoPedido = empty($encomenda[7])?'<span class="text-danger">Por pedir</span>':'<span class="text-info">Pedido em '.$encomenda[7].'</span>';
                    $previsao = empty($encomenda[8])?'':' | <span class="text-success">Prev. entrega em '.$encomenda[8].'</span>';
                    echo '<tr style="cursor: pointer;" onclick="window.location.href=\''.$SYSTEM_URL.'?editar='.$encomenda[0].'\' ">';
                    echo '<td>'.$encomenda[0].'</td>';
                    echo '<td><b>'.$encomenda[3].'</b><br><small>'.$encomenda[4].' '.$encomenda[5].' | '.id2Fornecedor($encomenda[1]).'</small></td>';
                    echo '<td><small>'.$encomenda[6].'<br>'.$estadoPedido.''.$previsao.'</small></td>';
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