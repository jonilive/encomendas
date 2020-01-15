<?php
session_start();
include 'sql.inc.php';

$SYSTEM_NAME = "Gestão de encomendas";

$_SESSION['loggedin'] = !isset($_SESSION['loggedin']) ? array() : $_SESSION['loggedin'];

if(!empty($_SESSION['loggedin'])){

    //com sessao iniciada

    echo "Bem vindo ".$_SESSION['loggedin']['nome'];


}else{
    //nao tem sessao
    include 'login.php';
}



?>