<?php

require("config.php");

$command = mysqli_query($conn, "SELECT * FROM house");
$resultats = mysqli_fetch_all($command);


// Conversion des résultats en format JSON et envoi de la réponse
header('Content-Type: application/json');
echo json_encode($resultats);