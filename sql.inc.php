<?php

$mysqli = new mysqli("localhost", "site", "vermelho", "encomendas", "3307");
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

function getFornecedores(){
    global $mysqli;

    $consulta = mysqli_query($mysqli, "SELECT * FROM fornecedores ");

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

function id2Fornecedor($id){
    global $mysqli;

    $consulta = mysqli_query($mysqli, "SELECT * FROM fornecedores WHERE id=".$id." ");

    if($consulta->num_rows > 0){
        return $consulta->fetch_assoc()['fornecedor'];
    }else{
        return "";
    }


}


?>