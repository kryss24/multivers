<?php

    session_start();
    include ("config.php");
    $nom = $_GET["nom"];
    $tel = $_GET["numero"];
    $long = $_GET["longitude"];
    $lat = $_GET["latitude"];

    $query = mysqli_query($conn, "INSERT INTO housesubmited VALUES(0, '$nom', '$tel', '$long', '$lat')");

    $query = mysqli_insert_id($conn);
    header('Content-Type: application/json');
    echo json_encode($query);