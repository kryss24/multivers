<?php include("../php/config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="../style/immob.css">
</head>

<body>
    <?php include("../php/headerImmob.php") ?>

    <div class="profile profile-imob">
    </div>
    <div class="immob">
        <center>
            <hr style="background-color: black; height: 1px; width: 25%;">
        </center>
        <div class="immob-title">
            <div class="title">TITRE MAISON</div>
            <p>4500 <span>Fcfa</span></p>
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
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rerum voluptatem explicabo animi vitae optio
                provident et cupiditate temporibus? Quas, dignissimos.
            </div>
        </div>
        <div class="voir">
            <div class="description-title">
                Voir <span>+</span>
            </div>
            <div class="carousel-container">
                <div class="carousel-slide">
                    <div class="carousel-item" style="display: none;"></div>
                </div>

                <div class="carousel-navigation">
                    <button id="prevBtn">&#10094;</button>
                    <div id="nothing"></div>
                    <button id="nextBtn">&#10095;</button>
                </div>
            </div>
        </div>
        <button type="button" id="reservez">
            Reservez maintenant
        </button>
        <center>
            <h1>CATEGORIES DES SALLES</h1>
        </center>
        <div class=" others apartement">
            <h3>appartement</h3>
            <div class="carousel-container">
                <div class="carousel-slide">
                    <?php 
                        $query = mysqli_query($conn, "SELECT * FROM house WHERE categories = 'Apartement'");
                        while($ligne = mysqli_fetch_assoc($query)){
                    ?>
                        <div class="carousel-item">
                            <div class="item-top">
                                <div class="caroussel-img"><img src="../assets/<?php echo $ligne['image'] ?>"
                                        alt="Image 1"></div>
                                <div class="item-desc">
                                    <div class="item-title"><?php echo $ligne['title'] ?></div>
                                    <div class="pieces"> <?php echo $ligne['pieces'] ?> <span>pièces</span></div>
                                </div>
                            </div>
                            <div class="item-bottom">
                                <a href="presentation.php?house=<?php echo $ligne['id'] ?>"><div>voir +</div></a>
                                <button type="button"><i class="fa-solid fa-share-nodes fa-2x"></i></button>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                
                <div class="carousel-navigation">
                    <div id="nothing"></div>
                    <button id="prevBtn">&#10094;</button>
                    <button id="nextBtn">&#10095;</button>
                </div>
            </div>
        </div>
        
        <div class="others studios-chambres">
            <h3>studios  &  chambres</h3>
            <div class="carousel-container">
                <div class="carousel-slide">
                    <?php 
                        $query = mysqli_query($conn, "SELECT * FROM house WHERE categories = 'Studios' OR  categories = 'Chambre'");
                        while($ligne = mysqli_fetch_assoc($query)){
                    ?>
                        <div class="carousel-item">
                            <div class="item-top">
                                <div class="caroussel-img"><img src="../assets/<?php echo $ligne['image'] ?>"
                                        alt="Image 1"></div>
                                <div class="item-desc">
                                    <div class="item-title"><?php echo $ligne['title'] ?></div>
                                    <div class="pieces"> <?php echo $ligne['pieces'] ?> <span>pièces</span></div>
                                </div>
                            </div>
                            <div class="item-bottom">
                                <a href="presentation.php?house=<?php echo $ligne['id'] ?>"><div>voir +</div></a>
                                <button type="button"><i class="fa-solid fa-share-nodes fa-2x"></i></button>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                
                <div class="carousel-navigation">
                    <div id="nothing"></div>
                    <button id="prevBtn">&#10094;</button>
                    <button id="nextBtn">&#10095;</button>
                </div>
            </div>
        </div>

        <div class="others bureaux">
            <h3>studios  &  chambres</h3>
            <div class="carousel-container">
                <div class="carousel-slide">
                    <?php 
                        $i = 0;
                        $query = mysqli_query($conn, "SELECT * FROM house WHERE categories = 'Bureaux'");
                        while($ligne = mysqli_fetch_assoc($query)){
                            $i++;
                    ?>
                        <div class="carousel-item">
                            <div class="item-top">
                                <div class="caroussel-img"><img src="../assets/<?php echo $ligne['image'] ?>"
                                        alt="Image 1"></div>
                                <div class="item-desc">
                                    <div class="item-title"><?php echo $ligne['title'] ?></div>
                                    <div class="pieces"> <?php echo $ligne['pieces'] ?> <span>pièces</span></div>
                                </div>
                            </div>
                            <div class="item-bottom">
                                <a href="#"><div>voir +</div></a>
                                <button type="button"><i class="fa-solid fa-share-nodes fa-2x"></i></button>
                            </div>
                        </div>
                    <?php 
                        } 
                        if($i === 0){
                            ?><h4>Empty house</h4><?php
                        }
                    ?>
                </div>
                
                <div class="carousel-navigation">
                    <div id="nothing"></div>
                    <button id="prevBtn">&#10094;</button>
                    <button id="nextBtn">&#10095;</button>
                </div>
            </div>
        </div>
    </div>
    <!-- <a href="?" onClick="window.open('test.html','','width=120,height=50, scrollbars=yes,resizable=yes,left=100,top=300')">fenêtre</a> -->
</body>
<script src="../js/script.js"></script>
<script src="../js/jquery.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<script src="../js/immob.js"></script>


</html>