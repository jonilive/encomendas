<?php
session_start();
include 'sql.inc.php';


$_SESSION['loggedin'] = array();


if(!empty($_SESSION['loggedin'])){

}else{
    include 'login.php';
}



?>