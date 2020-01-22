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

include 'sql.inc.php';
$_SESSION['loggedin'] = !isset($_SESSION['loggedin']) ? array() : $_SESSION['loggedin'];

if (!empty($_SESSION['loggedin'])) {

    //com sessao iniciada

    foreach ($_GET as $webpages => $webpages_val) {
        switch ($webpages) {
            case 'nova':
                $SYSTEM_ACTIVEURL = "nova";
                include 'nova.php';
                break;
            case 'editar':
                include 'editar.php';
                break;
            case 'apagarencomenda':
                include 'apagarencomenda.php';
                break;
            case 'fornecedores':
                $SYSTEM_ACTIVEURL = "fornecedores";
                include 'fornecedores.php';
                break;
            case 'listafornecedores':
                $SYSTEM_ACTIVEURL = "outros";
                include 'listafornecedores.php';
                break;
            case 'apagarfornecedor':
                include 'apagarfornecedor.php';
                break;
            case 'logout':
                include 'logout.php';
                break;
            default:
                include '404.php';
        }
    }
    if(!isset($webpages)){
        include 'home.php';
    }
    
} else {
    //nao tem sessao
    include 'login.php';
}
