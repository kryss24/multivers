<?php

require("config.php");
$id = (int)$_GET['id'];

$command = mysqli_query($conn, "SELECT images FROM pieces WHERE id_house = $id");
$resultats = mysqli_fetch_all($command);


// Conversion des résultats en format JSON et envoi de la réponse
header('Content-Type: application/json');
echo json_encode($resultats);
?>