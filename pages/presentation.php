<!DOCTYPE html>
<html lang="en">
<?php
    include('../php/config.php');
    $house = $_GET['house'];
    
    $piece = mysqli_query($conn,"SELECT * FROM house WHERE id=$house");
    $piece = mysqli_fetch_assoc($piece);

    $houseBd = mysqli_query($conn, "SELECT * FROM house WHERE id = $house");
    $houseBd = mysqli_fetch_assoc($houseBd)
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="../style/immob.css">
    
</head>

<body>
    <?php include("../php/headerImmob.php") ?>
    <center><div class="profile" style="background-image: url('../assets/<?php echo $houseBd["image"]; ?>');"></div></center>
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

    <div class="immob-title">
        <div class="title"><?php echo $houseBd['title'] ?></div>
        <p> <?php echo $houseBd['price'] ?> <span>Fcfa</span></p>
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
    </center>
</body>
<script src="../js/script.js"></script>
<script src="../js/jquery.js"></script>
<script src="../js/immob.js"></script>

</html>