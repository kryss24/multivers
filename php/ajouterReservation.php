<?php
session_start();
    include("config.php");
    $date = $_GET["date"];
    $choice = $_GET["choice"];
    $paymentMode = $_GET["payementMode"];
    $houseId = $_GET["houseId"];
    $price = $_GET["price"];

    $query = mysqli_query($conn, "SELECT etat FROM house WHERE id = ". $houseId);
    $query = mysqli_fetch_assoc($query);
    $resultats = 0;
    if($query['etat'] == 0){
        $query = mysqli_query($conn, "UPDATE house SET etat = 1 WHERE id = $houseId and etat = 0");
        $query = mysqli_query($conn, "INSERT INTO reservations VALUES(0,'".$date."','".$choice."',".$_SESSION['user'].",".$price.",0,".$houseId.")");
        if ($query) {
            // Get the ID of the last inserted row (assuming auto-increment)
            $resultats = mysqli_insert_id($conn);
        } 
    }
    // else {
    //     $resultats = -1;
    // }

    header('Content-Type: application/json');
    echo json_encode($resultats);

    // $query = mysqli_query($conn, "INSERT INTO")
?>