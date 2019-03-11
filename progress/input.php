<?php

include_once 'db_connection.php';
include_once 'connect.php';

$nome = $_POST["name"];
$quantity = $_POST["address"];

mysqli_real_escape_string($conn, $nome);
mysqli_real_escape_string($conn, $quantity);

$toinsert = "INSERT INTO soldi
			(nome_utente, quantita)
			VALUES
			('$nome', '$quantity');";

mysqli_query($conn, $toinsert);

header("location: progress.php");
?>