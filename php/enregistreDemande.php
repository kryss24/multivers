<?php
session_start();
include("config.php");
$idUser = $_GET["idUser"];
$idHouse = $_GET["idHouse"];
$type = $_GET["detail"];
$dates = $_GET["date"];

$command = mysqli_query($conn, "INSERT INTO messages VALUES(0,'" . $idUser . "','" . $type . "', '" . $idHouse . "', 0, '". $dates ."')");

$query = mysqli_insert_id($conn);
header('Content-Type: application/json');
echo json_encode($query);
