<?php

$mysqli = new mysqli("localhost", "site", "vermelho", "encomendas", "3307");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    die();
}

$res = mysqli_query($mysqli, "SELECT * FROM utilizadores");
if (!$res) {
    echo "Failed to run query: (" . $mysqli->errno . ") " . $mysqli->error;
}

if ($row = $res->fetch_assoc()) {
    echo "| ".$row['nome']." | ".$row['passe']." <br>";
}

?>