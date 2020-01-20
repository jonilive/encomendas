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
        return false;
    }


}


?>