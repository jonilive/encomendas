<?php
session_start();
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_SANITIZE_ENCODED);

$SYSTEM_NAME = "Gestão de encomendas";
$SYSTEM_URL = "http://192.168.1.138/encomendas/";
$SYSTEM_MYSQL = array(
    "localhost",
    "site",
    "vermelho",
    "encomendas",
    "3307"
);
$SYSTEM_ACTIVEURL = "home";
$SYSTEM_SCRIPTS = "";
$FORM_MESSAGE = "";

include 'inc/sql.inc.php';
$_SESSION['loggedin'] = !isset($_SESSION['loggedin']) ? array() : $_SESSION['loggedin'];

if (!empty($_SESSION['loggedin'])) {

    //com sessao iniciada

    foreach ($_GET as $webpages => $webpages_val) {
        switch ($webpages) {
            case 'nova':
                $SYSTEM_ACTIVEURL = "nova";
                include 'inc/nova.php';
                break;
            case 'editar':
                include 'inc/editar.php';
                break;
            case 'apagarencomenda':
                include 'inc/apagarencomenda.php';
                break;
            case 'fornecedores':
                $SYSTEM_ACTIVEURL = "fornecedores";
                include 'inc/fornecedores.php';
                break;
            case 'listafornecedores':
                $SYSTEM_ACTIVEURL = "outros";
                include 'inc/listafornecedores.php';
                break;
            case 'apagarfornecedor':
                include 'inc/apagarfornecedor.php';
                break;
            case 'logout':
                include 'inc/logout.php';
                break;
            default:
                include 'inc/404.php';
        }
    }
    if(!isset($webpages)){
        include 'inc/home.php';
    }
    
} else {
    //nao tem sessao
    include 'inc/login.php';
}
