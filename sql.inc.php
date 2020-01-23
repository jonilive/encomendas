<?php

$mysqli = new mysqli($SYSTEM_MYSQL[0], $SYSTEM_MYSQL[1], $SYSTEM_MYSQL[2], $SYSTEM_MYSQL[3], $SYSTEM_MYSQL[4]);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    die();
}
$mysqli->set_charset("utf8");


function verificarLogin($user,$pass){
    global $mysqli;

    $consulta = mysqli_query($mysqli, "SELECT * FROM utilizadores WHERE nome='".$user."' AND passe='".$pass."' ");

    if($consulta->num_rows > 0){
        return $consulta->fetch_assoc();
    }else{
        return false;
    }


}

function getUser($id){
    global $mysqli;

    $consulta = mysqli_query($mysqli, "SELECT * FROM utilizadores WHERE id=$id ");

    if($consulta->num_rows > 0){
        return $consulta->fetch_assoc()['nome'];
    }else{
        return "";
    }


}

function countFornecedores($id){
    global $mysqli;

    $consulta = mysqli_query($mysqli, "SELECT * FROM pedidos WHERE id_fornecedor=$id ");

    return $consulta->num_rows;
}

function delEncomenda($id){
    global $mysqli;

    $delete = mysqli_query($mysqli, "DELETE FROM `pedidos` WHERE `pedidos`.`id` = $id ");

    if($delete){
        return true;
    }else{
        return ("Error: ".$mysqli->error);
    }


}

function delFornecedor($id){
    global $mysqli;

    $delete = mysqli_query($mysqli, "DELETE FROM `fornecedores` WHERE `fornecedores`.`id` = $id ");

    if($delete){
        return true;
    }else{
        return ("Error: ".$mysqli->error);
    }


}

function getFornecedores(){
    global $mysqli;

    $consulta = mysqli_query($mysqli, "SELECT * FROM fornecedores ORDER BY fornecedor ASC");

    if($consulta->num_rows > 0){
        return $consulta->fetch_all();
    }else{
        return array();
    }


}

function getEncomendas(){
    global $mysqli;

    $consulta = mysqli_query($mysqli, "SELECT * FROM pedidos ");

    if($consulta->num_rows > 0){
        return $consulta->fetch_all();
    }else{
        return array();
    }


}

function getEncomendasForn($id, $soporpedir = false){
    global $mysqli;

    $where = $soporpedir ?" AND data_pedido IS NULL":"";
    $consulta = mysqli_query($mysqli, "SELECT * FROM pedidos WHERE id_fornecedor = $id $where");

    if($consulta->num_rows > 0){
        return $consulta->fetch_all();
    }else{
        return array();
    }


}


function insEncomenda($fornecedor, $utilizador, $produto, $quantidade, $quantidadeTipo, $data_registo, $data_pedido, $data_prev, $obs){
    global $mysqli;

    $insert = mysqli_query($mysqli, "INSERT INTO pedidos 
    (id_fornecedor, id_utilizador, pedido, quantidade, quantidade_type, data_registo, data_pedido, data_prevista, obs)
     VALUES 
    ('$fornecedor', '$utilizador', '$produto', '$quantidade', '$quantidadeTipo', '$data_registo', ".(empty($data_pedido)?"NULL":"'$data_pedido'").", ".(empty($data_prev)?"NULL":"'$data_prev'").", '$obs') ");

    if($insert){
        return true;
    }else{
        return ("Error: ".$mysqli->error);
    }


}

function editEncomenda($id, $fornecedor, $utilizador, $produto, $quantidade, $quantidadeTipo, $data_registo, $data_pedido, $data_prev, $obs){
    global $mysqli;

    $update = mysqli_query($mysqli, "UPDATE `pedidos` 
    SET `pedido` = '$produto',
    `id_fornecedor` = '$fornecedor',
    `quantidade` = '$quantidade',
    `quantidade_type` = '$quantidadeTipo',
    `data_pedido` = ".(empty($data_pedido)?"NULL":"'$data_pedido'").",
    `data_prevista` = ".(empty($data_prev)?"NULL":"'$data_prev'").",
    `obs` = '$obs'
    WHERE `pedidos`.`id` = $id ");

    if($update){
        return true;
    }else{
        return ("Error: ".$mysqli->error);
    }


}

function setEncomendaPedida($id_fornecedor){
    global $mysqli;
    $data_pedido = date("Y-m-d", time());

    $update = mysqli_query($mysqli, "UPDATE `pedidos` 
    SET `data_pedido` = '$data_pedido'
    WHERE `pedidos`.`id_fornecedor` = $id_fornecedor ");

    if($update){
        return true;
    }else{
        return ("Error: ".$mysqli->error);
    }


}


function id2Fornecedor($id){
    global $mysqli;

    $consulta = mysqli_query($mysqli, "SELECT * FROM fornecedores WHERE id=".$id." ");

    if($consulta->num_rows > 0){
        return $consulta->fetch_assoc()['fornecedor'];
    }else{
        return "";
    }


}

function getEncomenda($id){
    global $mysqli;

    $consulta = mysqli_query($mysqli, "SELECT * FROM pedidos WHERE id=".$id." ");

    if($consulta->num_rows > 0){
        return $consulta->fetch_assoc();
    }else{
        return array();
    }


}


function insFornecedor($fornecedor){
    global $mysqli;

    $insert = mysqli_query($mysqli, "INSERT INTO fornecedores (fornecedor) VALUES ('$fornecedor') ");

    if($insert){
        return true;
    }else{
        return ("Error: ".$mysqli->error);
    }


}


?>