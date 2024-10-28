<?php
session_start();
$_SESSION['pages'] = "Message";
include('../php/config.php');
if (empty($_SESSION['user']))
    header("location: connexion.php");

$user = $_SESSION['user'];
$messages = mysqli_query($conn, "SELECT * FROM messages Where etat= 1 and idUser=". $user ." ORDER BY(date_ajout)");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="../style/immob.css">
    <title>Messagerie</title>
    <style>
        body {
            background-color: rgba(0, 0, 25, .3);
        }

        .card {
            min-width: 7rem;
            max-width: 15rem;
            padding: 5px 5px 2px 10px;
            background-color: bisque;
            border-top-right-radius: 15px;
            margin: 15px 5px;
        }

        .date {
            width: 100%;
            text-align: right;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <?php include("../php/headerImmob.php") ?>
    <?php
    while ($message = mysqli_fetch_assoc($messages)) {
    ?>
        <div class="card">
            <div class="message">
                <?php 
                    if($message['typeMessage'] == "localisation"){
                        echo "<p>Votre Demande d'acces a la localisation a ete accepter.<br>Acceder a la map en cliquant <a href='guideLocalisation.php?id=" . $message['detail'] ."'>Ici<a></p>";
                    } else {
                        echo $message['detail'];
                    }
                ?>
            </div>
            <div class="date">
                <?php echo $message['date_ajout']; ?>
            </div>
        </div>
    <?php
    }
    ?>
    
    <script src="../js/script.js"></script>
    <script src="../js/jquery.js"></script>
</body>

</html>