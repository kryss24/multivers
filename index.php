<?php session_start();?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="style/index.css">
</head>

<body>
    <header>
        <img src="assets/image_multivers/multivers.jpg" alt="logo">
        <div class="main">
            <i class=" fa fa-solid fa-bars fa-3x"></i>
            <!-- <img src="assets/icons/icons8_menu_32px.png" alt="" style="width: 5%;height: 5vh;"> -->
            <div id="sidebar" class="sidebar">
                <a href="#desc">
                    <div class="active"><i class="fa-solid fa-house"></i>Accueil</div>
                </a>
                <a href="./pages/profil.php">
                    <div><i class="fa-regular fa-address-card"></i></i>Profil</div>
                </a>
                <a href="#services">
                    <div><i class="fa-solid fa-bell-concierge"></i></i>Nos services</div>
                </a>
                <hr style="width: 200px;height: 1.5px;background-color: white;">
                <a href="#">
                    <div><i class="fa-solid fa-bell"></i>Notification</div>
                </a>
                <a href="#">
                    <div><i class="fa-solid fa-message"></i>Message</div>
                </a>
                <hr style="width: 200px;height: 1.5px;background-color: white;">
                <a href="#">
                    <div><i class="fa-solid fa-circle-question"></i>Aide</div>
                </a>
            </div>
        </div>
    </header>
    <div class="profile">
        <button class="rounded-button">NOS SERVICES</button>
    </div>
    <div class="description" id="desc">
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorum velit, neque nihil laudantium incidunt
            aliquam facilis explicabo accusantium excepturi maiores architecto et quisquam doloribus sapiente similique
            atque aperiam, sed sint illo sit optio magni soluta perferendis reprehenderit! Minima, itaque. Incidunt
            voluptatem ipsa, laboriosam, doloremque accusamus voluptate, laudantium recusandae cupiditate debitis quod
            officia excepturi? Ad adipisci velit voluptate perferendis quas veniam, dolore perspiciatis placeat,
            reprehenderit aliquam, laudantium exercitationem eaque quia obcaecati quis quod minus qui asperiores est
            iste fugiat deserunt dignissimos corporis iure. Vitae molestiae accusantium recusandae, maiores earum
            debitis nobis odit saepe autem ipsam libero? Ratione architecto voluptatum facilis eius.</p>
    </div>
    <div class="card-list" id="services">
        <div class="card">
            <div class="card-image"><img src="assets\image_multivers\multivers.jpg" alt=""></div>
            <div class="card-desc">
                <center><h2><a href="#" onclick="redirect(1)">immob</a></h2></center>
                <p>Service immobilier</p>
                <!-- <center><button ">voir +</button></center> -->
            </div>
        </div>
        <div class="card">
            <div class="card-image"><img src="assets\image_multivers\IMG-20231223-WA0010.jpg" alt=""></div>
            <div class="card-desc">
                <center><h2><a href="#" onclick="redirect(2)">Eazy Way</a></h2></center>
                <p>Système de paiement
                    et d'espace virtuel
                </p>
            </div>
        </div>
        <div class="card">
            <div class="card-image"><img src="assets/image_multivers/IMG-20231223-WA0011.jpg" alt=""></div>
            <div class="card-desc">
                <center><h2><a href="#" onclick="redirect(3)">overview</a></h2></center>
                <p>Service d'analyse de
                    stratégie commerciale</p>
            </div>
        </div>
    </div>
</body>
<script src="js/script.js"></script>

</html>