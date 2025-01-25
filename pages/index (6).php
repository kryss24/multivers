<?php
include("../php/config.php");
session_start();
$_SESSION['pages'] = "Accueil";
?>

<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        Airbnb
    </title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../style/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="../style/new.css">
    <script src="https://cdn.tailwindcss.com">
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.querySelector('.menu-toggle');
            const nav = document.querySelector('nav ul');

            menuToggle.addEventListener('click', function() {
                nav.classList.toggle('hidden');
                if (nav.style.display == 'flex') {
                    nav.parentElement.style.display = 'none';
                    nav.style.display = "none";
                } else {
                    nav.parentElement.style.display = 'block';
                    nav.style.display = "flex";
                }
            });

            const carouselItems = document.querySelectorAll('.carousel-item');
            // const indicators = document.querySelectorAll('.carousel-indicators div');
            // let currentIndex = 0;
            const carouselInners = document.querySelectorAll('.carousel');

            function updateCarousel(currentIndex, indicatorTrue, carouselInner) {
                carouselInner.style.transform = `translateX(-${currentIndex * 100}%)`;
                const indicators = carouselInner.parentElement.querySelectorAll('.carousel-indicators div');
                indicators.forEach((indicator, index) => {
                    if (index === currentIndex) {
                        indicator.classList.toggle('active', true);
                    } else {
                        indicator.classList.toggle('active', false);
                    }
                });
            }

            carouselInners.forEach(carouselInner => {
                const indicators = carouselInner.querySelectorAll('.carousel-indicators div');

                indicators.forEach((indicator, index) => {
                    indicator.addEventListener('click', (e) => {
                        e.preventDefault();
                        const dive = e.target.parentElement.parentElement.querySelector('.carousel-inner');
                        updateCarousel(index, e.target, dive);
                    });
                });

            });

            // setInterval(() => {
            //     currentIndex = (currentIndex + 1) % carouselItems.length;
            //     updateCarousel();
            // }, 3000);
        });
    </script>
</head>

<body>
    <?php include("../php/new.php"); ?>
    <!-- <div class="filtre">
        <?php
        $query = mysqli_query($conn, "SELECT categories FROM `house` GROUP BY categories");
        while ($row = mysqli_fetch_row($query)) {
        ?>
            <div class="filtre-item">
                <i class="fas fa-city"></i>
                <div><?php echo $row[0]; ?></div>
            </div>
        <?php  } ?>
    </div> -->
    <div class="main-content p-10">
        <h1 class="text-4xl mb-5">
            Bienvenue sur Immob
        </h1>
        <p class="text-lg mb-10">
            Découvrez des lieux uniques pour séjourner et des expériences inoubliables.
        </p>
        <center>
            <div class="search-bar flex items-center border border-gray-200 rounded-full p-2 w-full max-w-md mt-2 md:mt-0 mb-10">
                <input class="border-none outline-none flex-1" placeholder="Rechercher" type="text" />
                <i class="fas fa-search text-red-500">
                </i>
            </div>
        </center>
        <!-- <div class="filter flex flex-wrap gap-10 mb-10">
            <div class="flex items-center flex-wrap">
                <div class="text-center mb-5">
                    <label class="block text-gray-700 mb-2" for="price">
                        Prix
                    </label>
                    <input class="border border-gray-300 rounded p-2" id="price" placeholder="Prix max" type="number" />
                </div>
                <div class="text-center mb-5">
                    <label class="block text-gray-700 mb-2" for="city">
                        Ville
                    </label>
                    <input class="border border-gray-300 rounded p-2" id="city" list="cities" placeholder="Ville" type="text" />
                    <datalist id="cities">
                        <option value="Paris">
                        </option>
                        <option value="Lyon">
                        </option>
                        <option value="Marseille">
                        </option>
                        <option value="Bordeaux">
                        </option>
                        <option value="Nice">
                        </option>
                    </datalist>
                </div>
                <div class="text-center mb-5">
                    <label class="block text-gray-700 mb-2" for="guests">
                        Nombre de voyageurs
                    </label>
                    <input class="border border-gray-300 rounded p-2" id="guests" placeholder="Nombre de voyageurs" type="number" />
                </div>
            </div>
            <div class="flex items-center flex-wrap">
                <div class="text-center mb-5">
                    <label class="block text-gray-700 mb-2" for="wifi">
                        Wi-Fi
                    </label>
                    <input class="border border-gray-300 rounded p-2" id="wifi" type="checkbox" />
                </div>
                <div class="text-center mb-5">
                    <label class="block text-gray-700 mb-2" for="pool">
                        Piscine
                    </label>
                    <input class="border border-gray-300 rounded p-2" id="pool" type="checkbox" />
                </div>
                <div class="text-center mb-5">
                    <label class="block text-gray-700 mb-2" for="pets">
                        Animaux acceptés
                    </label>
                    <input class="border border-gray-300 rounded p-2" id="pets" type="checkbox" />
                </div>
            </div>
        </div> -->

        <?php
        $query = mysqli_query($conn, "SELECT * FROM house WHERE categories = 'Apartement'");
        $count = mysqli_num_rows($query);
        if ($count > 0) {
        ?>
            <div class="category mb-10">
                <h2 class="text-2xl mb-5">
                    Apartements
                </h2>
                <div class="card-container flex overflow-x-auto gap-5 pl-2">
                    <?php
                    while ($ligne = mysqli_fetch_assoc($query)) {
                        $pieces = mysqli_query($conn, "SELECT * FROM pieces WHERE id_house = " . $ligne['id'] . " LIMIT 4");
                    ?>
                        <div class="card flex-none w-72 border border-gray-200 rounded-lg overflow-hidden">
                            <div class="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item">
                                        <img alt="Image d'une maison moderne avec une grande piscine et un jardin verdoyant" class="w-full h-48 object-cover" height="400" src="../assets/<?php echo $ligne['image'] ?>" width="600" />
                                    </div>
                                    <?php
                                    $countImg = 0;
                                    while ($row = mysqli_fetch_assoc($pieces)) {
                                        $countImg++;
                                    ?>
                                        <div class="carousel-item">
                                            <img alt="Image d'une maison moderne avec une grande piscine et un jardin verdoyant" class="w-full h-48 object-cover" height="400" src="../assets/image_multivers/<?php echo $row['images'] ?>" width="600" />
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="carousel-indicators">
                                    <div class="active">
                                    </div>
                                    <?php
                                    for ($i = 0; $i < $countImg; $i++) {
                                        # code...
                                        echo "<div></div>";
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="card-content p-5">
                                <h3 class="text-xl mb-2">
                                    <?php echo $ligne['title'] ?>
                                </h3>
                                <p class="text-gray-600">
                                    <?php echo $ligne['description'] ?>
                                </p>
                            </div>
                            <div class="item-bottom  pl-5  m-5 b-2">
                                <a href="presentation.php?house=<?php echo $ligne['id'] ?>">
                                    <div>voir +</div>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        <?php
        $query = mysqli_query($conn, "SELECT * FROM house WHERE categories = 'Studios' OR  categories = 'Chambre'");
        $count = mysqli_num_rows($query);
        if ($count > 0) {
        ?>
            <div class="category mb-10">
                <h2 class="text-2xl mb-5">
                    Studios&Chambre
                </h2>
                <div class="card-container flex overflow-x-auto gap-5 pl-2">
                    <?php
                    while ($ligne = mysqli_fetch_assoc($query)) {
                        $pieces = mysqli_query($conn, "SELECT * FROM pieces WHERE id_house = " . $ligne['id'] . " LIMIT 4");
                    ?>
                        <div class="card flex-none w-72 border border-gray-200 rounded-lg overflow-hidden">
                            <div class="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item">
                                        <img alt="Image d'une maison moderne avec une grande piscine et un jardin verdoyant" class="w-full h-48 object-cover" height="400" src="../assets/<?php echo $ligne['image'] ?>" width="600" />
                                    </div>
                                    <?php
                                    $countImg = 0;
                                    while ($row = mysqli_fetch_assoc($pieces)) {
                                        $countImg++;
                                    ?>
                                        <div class="carousel-item">
                                            <img alt="Image d'une maison moderne avec une grande piscine et un jardin verdoyant" class="w-full h-48 object-cover" height="400" src="../assets/image_multivers/<?php echo $row['images'] ?>" width="600" />
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="carousel-indicators">
                                    <div class="active">
                                    </div>
                                    <?php
                                    for ($i = 0; $i < $countImg; $i++) {
                                        # code...
                                        echo "<div></div>";
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="card-content p-5">
                                <h3 class="text-xl mb-2">
                                    <?php echo $ligne['title'] ?>
                                </h3>
                                <p class="text-gray-600">
                                    <?php echo $ligne['description'] ?>
                                </p>
                            </div>
                            <div class="item-bottom  pl-5 pr-5 m-5 b-2">
                                <a href="presentation.php?house=<?php echo $ligne['id'] ?>">
                                    <div>voir +</div>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</body>

</html>