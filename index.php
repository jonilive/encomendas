<?php
session_start();

$_SESSION['loggedin'] = array();


if(!empty($_SESSION['loggedin'])){

}else{
    header('Location: login.php');
}



?>