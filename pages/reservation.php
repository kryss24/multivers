<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="../style/immob.css">
    <link rel="stylesheet" href="../style/reservation.css">
    <?php
        session_start();
        if(!isset($_SESSION['user']))
            header("location: ../pages/connexion.php");
        include("../php/config.php");
        $houseId = $_GET['house'];
    
        $house = mysqli_query($conn,"SELECT * FROM house WHERE id=$houseId");
        $house = mysqli_fetch_assoc($house);
    ?>
</head>

    <div class="informationHouse" style="display: none">
        <div class="id"><?php echo $houseId; ?></div>
        <div class="name"><?php echo $house['title'];?></div>
        <div class="price"><?php echo $house['price'];?></div>
    </div>

<body>
    <?php include("../php/headerImmob.php") ?>

    <div class="container">
        <h1>Entrez vos informations</h1>
        <form action="reservation.php?house=<?php echo $house; ?>" method="post">
            <div class="input">
                <!-- <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" required>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                <label for="tel">Téléphone</label>
                <input type="tel" id="tel" name="tel" required> -->
                <label for="date_reservation">Date de réservation</label>
                <input type="date" id="date_reservation" name="date_reservation" required>
            </div>
            <div class="pay">
                <label for="moyen_paiement">Moyen de paiement</label>
                <div class="select">
                    <select id="moyen_paiement" name="moyen_paiement">
                        <option value="mtn_money">MTN Money</option>
                        <option value="orange_money">Orange Money</option>
                        <option value="visa">VISA</option>
                    </select>
                    <i class="fas fa-chevron-down"></i>
                </div>
            </div>
            <center><button type="button">Envoyer</button></center>
        </form>
        <div id="confirmation" class="hidden">
            <h2>Votre réservation a été effectuée</h2>
            <p>Cliquez sur "OK" pour continuer.</p>
            <button type="button" onclick="redirection()">OK</button>
        </div>
    </div>
</body>
<script src="../js/script.js"></script>
<script src="../js/reservation.js"></script>

</html>