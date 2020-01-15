<?php

$mysqli = new mysqli("localhost", "site", "vermelho", "encomendas", "3307");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    die();
}


function verificarLogin($user,$pass){
    global $mysqli;

    $consulta = mysqli_query($mysqli, "SELECT * FROM utilizadores WHERE nome='".$user."' AND passe='".$pass."' ");

    if($consulta->num_rows > 0){
        return $consulta->fetch_assoc();
    }else{
        return false;
    }


}

?>