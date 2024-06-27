<?php
session_start();
include("php/config.php");

$date = "14/15/2024";
$choice = "12";
$paymentMode = "12";
$houseId = "1";
$price = "2055";

// Update house status
$query = mysqli_query($conn, "UPDATE house SET etat = 1 WHERE id = $houseId");

// Insert reservation (MySQL will assign a new ID)
$query = mysqli_query($conn, "INSERT INTO reservations VALUES(0,'$date','$choice', ".$_SESSION['user'].", $price, 0, $houseId)");

// Check if insertion was successful
if ($query) {
  // Get the ID of the last inserted row (assuming auto-increment)
  $lastId = mysqli_insert_id($conn);
  echo "Reservation created successfully! ID: $lastId";
} else {
  echo "Error creating reservation: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
