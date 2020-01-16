<?php
session_start();
include 'sql.inc.php';

$SYSTEM_NAME = "Gestão de encomendas";
$SYSTEM_URL = "http://192.168.1.138/encomendas/";

$_SESSION['loggedin'] = !isset($_SESSION['loggedin']) ? array() : $_SESSION['loggedin'];

if (!empty($_SESSION['loggedin'])) {

    //com sessao iniciada

    foreach ($_GET as $webpages => $webpages_val) {
        switch ($webpages) {
            case 'profile':
                include 'profile.php';
                break;
            case 'team':
                include 'team.php';
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
