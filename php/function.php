<?php

require("config.php");
$command = mysqli_query($conn, "SELECT * FROM enspd_bd");
$resultats = mysqli_fetch_all($command);


// Conversion des résultats en format JSON et envoi de la réponse
header('Content-Type: application/json');
echo json_encode($resultats);

// try {
//     // Connexion à la base de données
// $connexion = new PDO('mysql:host=localhost;dbname=csv_db 6', 'root', '');

// // Requête pour récupérer les données
// $requete = $connexion->prepare('SELECT * FROM enspd_bd');
// $requete->execute();
// $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);

// // Fermeture de la connexion
// $connexion = null;

// // Conversion des résultats en format JSON et envoi de la réponse
// header('Content-Type: application/json');
// echo json_encode($resultats);
// } catch (PDOException $e) {
//     echo 'Erreur : ' . $e->getMessage();
// }

?>