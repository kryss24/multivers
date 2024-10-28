<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('../php/config.php');
if (empty($_SESSION['user']))
    header("location: connexion.php");
$house = $_GET['house'];

$piece = mysqli_query($conn, "SELECT * FROM house WHERE id=$house");
$piece = mysqli_fetch_assoc($piece);

$houseBd = mysqli_query($conn, "SELECT * FROM house WHERE id = $house");
$houseBd = mysqli_fetch_assoc($houseBd)
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="../style/immob.css">
    <style>

        .maincontainer {
            width: 100% !important;
        }
        input[type="button"] {
            width: 40% !important;
            height: 4vh;
            border-radius: 20px;
            border: none;
        }

        #confirmerLoca {
            background-color: #FFC107;
        }

        #annulerLoca {
            background-color: red;
        }

        .localisation {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: transparent;
            position: relative;

            background: rgba(255, 255, 255, 0.2);
            /* Légèrement transparent */
            backdrop-filter: blur(5px);
            /* Effet de flou */
            border-radius: 15px;
            /* color: white; */
            text-align: center;

            display: none;
        }

        .localisation>div {
            width: 80%;
            border-radius: 20px;
            box-shadow: 2px 4px 5px 1px black;
            padding: 30px 15px;
            height: auto;
            background-color: white;
            /* display: flex;
            flex-direction: column;
            align-items: center; */
        }

        .control-event {
            display: flex;
            justify-content: space-around;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <div class="maincontainer" style="position: absolute">
        <?php include("../php/headerImmob.php") ?>
        <center>
            <div class="profile" style="background-image: url('../assets/<?php echo $houseBd["image"]; ?>');"></div>
        </center>

        <div class="immob-title">
            <div class="title"><?php echo $houseBd['title'] ?></div>
            <p> <?php echo $houseBd['price'] ?> <span>Fcfa</span></p>
        </div>
        <div class="star">
            <?php
            for ($index = 0; $index < 5; $index++) {
                if ($index < $houseBd['note']) {
            ?>
                    <i class="fas fa-star" style="color: #FFC107;"></i>
                <?php
                } else {
                ?>
                    <i class="far fa-star"></i>
            <?php
                }
            }
            ?>
        </div>
        <div class="subs-title">
            <div class="subs-title-item">
                <i class="fa-solid fa-city"></i>
                <div>Cameroun</div>
            </div>
            <div class="subs-title-item">
                <i class="fa-solid fa-house-crack"></i>
                <div>5 Pieces</div>
            </div>
            <div class="subs-title-item">
                <i class="fa-solid fa-share-nodes"></i>
                <div>Partager</div>
            </div>
        </div>
        <div class="voir">
            <div class="carousel-container">
                <div class="carousel-slide">
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM pieces WHERE id_house = $house");
                    while ($ligne = mysqli_fetch_assoc($query)) {
                    ?>
                        <div class="carousel-item">
                            <img src="../assets/image_multivers/<?php echo $ligne['images']; ?>" alt="pieces">
                        </div>
                    <?php
                    }
                    ?>
                </div>

                <div class="carousel-navigation">
                    <button id="prevBtn">&#10094;</button>
                    <div id="nothing"></div>
                    <button id="nextBtn">&#10095;</button>
                </div>
            </div>
        </div>
        <div class="description">
            <div class="description-title">
                Description
            </div>
            <div class="description-content">
                <?php echo $houseBd['description'] ?>
            </div>
        </div>
        <center>
            <div style="width: 50%;display: flex;justify-content: space-between;margin: 5% 0;">
                <img src="../assets/icons/icons8_comments_24px.png" alt="">
                <img src="../assets/icons/icons8_ringer_volume_30px.png" alt="" srcset="">
            </div>
            <button type="button" id="reservez" style="width: 85%;" onclick="reserver(<?php echo $house; ?>)">
                Reservez maintenant
            </button>
            <p style="width: 85%; margin: 5px 0;"> - Ou -</p>
            <button type="button" style="width: 85%;margin-bottom: 20px;" id="localisation">
                Obtenir La Localisation
            </button>
        </center>
    </div>
    <div class="localisation">
        <div>
            <i class="fa-regular fa-circle-check fa-5x" style="color: #63E6BE;"></i>
            <p>Pour avoir acces a la localisation exact et debloquer l'option de vistite,</p>
            <p>vous devrez deverser une somme de <span>15000 FCFA</span></p>
            <div class="control-event">
                <input type="button" value="Confirmer" id="confirmerLoca">
                <input type="button" value="Annuler" id="annulerLoca">
            </div>
        </div>
    </div>
</body>
<script src="../js/script.js"></script>
<script src="../js/jquery.js"></script>
<!-- <script src="../js/immob.js"></script> -->
<script>
    document.querySelector("#localisation").addEventListener("click", (e) => {
        const localisatioDiv = document.querySelector(".localisation");
        localisatioDiv.style.display = "flex";
    })
    document.querySelector("#confirmerLoca").addEventListener("click", (e) => {
        e.preventDefault();
        maskLoca();
        var idUser = <?php echo $_SESSION["user"] ?>;
        var type = "localisation";
        var idHouse = <?php echo $_GET['house']; ?>;
        insererLaReservation(idUser, idHouse, type);
        // console.log(idHouse + " " + idUser + " " + type)
    })
    document.querySelector("#annulerLoca").addEventListener("click", (e) => {
        maskLoca();
    })

    function maskLoca() {
        const localisatioDiv = document.querySelector(".localisation");
        localisatioDiv.style.display = "none";
    }
    
    // Fonction pour effectuer une requête AJAX
    function effectuerRequeteAjax(url, methode, donnees, callback) {
        var xhr = new XMLHttpRequest();
        // Définition de la fonction de rappel pour gérer la réponse de la requête AJAX
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    callback(xhr.responseText);
                } else {
                    console.error('Une erreur s\'est produite : ' + xhr.status);
                }
            }
        };
        xhr.open(methode, url, true);
        if (methode === 'POST') {
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        }
        xhr.send(donnees);
    }

    // Recuperation des donnee lier a la Maison
    function insererLaReservation(userId, houseId, detail) {
        const date = (new Date()).toLocaleString();
        effectuerRequeteAjax('../php/enregistreDemande.php?idUser=' + userId + '&idHouse=' + houseId + '&detail=' + detail + '&date=' + date, 'GET', null, function(response) {
            if (response != 0) {
                let number = "+237697102596"
                const msg = encodeURIComponent('Hello, je viens pour avoir acces a la localisation de l\'appartement. Je suis pres a payer les frais exiger de 15000FCFA. \n\n\n Code d\'identificationd de la demande: ' + response);
                const url = "https://wa.me/" + number + "?text=" + msg;
                window.open(url);
            }
        });
    }
</script>

</html>