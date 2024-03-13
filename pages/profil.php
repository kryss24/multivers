<?php
    session_start();
    include("../php/config.php");
    if(empty($_SESSION['user'])){
        echo 'bad request';
    }
    if(!isset($_SESSION['changeProfile'])){
        $_SESSION['changeProfile'] = false;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../js/cropperjs/dist/cropper.min.css">
    <link rel="stylesheet" href="../style/profile.css">
</head>

<body>
    <div class="container">
        <div class="profile-image">
            <img src="../assets/profiles/profile.jpg" id="image" >
            <i class="fa-solid fa-camera fa-3x"></i>
        </div>

        <div id="modal-photo" class="cacher">
            <h2>Choisir votre photo de profil</h2>
            <form action="#" enctype="multipart/form-data" method="post">
                <input type="file" id="photo-input" accept="image/png, image/jpeg" name="image">
                <img id="apercu-image">
                <div class="boutons">
                    <button type="submit">Valider</button>
                    <button type="button" id="fermer-modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>


    <?php
    // Si le formulaire a été soumis
    if (isset($_FILES['image']) && $_SESSION['changeProfile'] == 0) {

        // Vérifier si le fichier a été correctement uploadé
        if ($_FILES['image']['error'] === 0) {

            // Définir le nom et le chemin du fichier source
            $source_file = $_FILES['image']['tmp_name'];
            $source_name = $_FILES['image']['name'];

            // Définir le chemin du répertoire cible
            $target_directory = "../temp";

            // Définir le nom du fichier copié
            $target_name = uniqid() . "_" . $source_name;

            // Copier le fichier
            if (move_uploaded_file($source_file, $target_directory . "/" . $target_name)) {
                echo "<p>L'image a été copiée avec succès!</p>";
                echo "<script>  document.getElementById('apercu-image').src ='../temp/".$target_name."  '</script>";
                $_FILES['image'] = "";
                $_SESSION['changeProfile'] = 1;
                echo "<script> console.log(".$_FILES['image'].")</script>";
            } else {
                echo "<p>Une erreur s'est produite lors de la copie de l'image.</p>";
            }
        } else {
            echo "<p>Une erreur s'est produite lors de l'upload de l'image.</p>";
        }
    }
    ?>

    <script src="../js/cropperjs/dist/cropper.min.js"></script>
    <script>
        const profileImage = document.querySelector(".profile-image");
        const modalPhoto = document.getElementById('modal-photo');
        const ouvrirModal = document.getElementById('ouvrir-modal');
        const fermerModal = document.getElementById('fermer-modal');
        const photoInput = document.getElementById('photo-input');
        const apercuImage = document.getElementById('apercu-image');

        profileImage.addEventListener("click", () => {
            modalPhoto.classList.add('afficher');
        })

        fermerModal.addEventListener('click', () => {
            modalPhoto.classList.remove('afficher');
        });
        
        <?php 
            if ($_SESSION['changeProfile'] == 1){
                
                ?>
                    modalPhoto.classList.add('afficher');
                    // console.log(<?php echo $_SESSION['changeProfile']; ?>)
                    Mycropper();
                <?php
                $_SESSION['changeProfile'] = 0;
            }else if ($_SESSION['changeProfile'] == 0){
                ?>
                    modalPhoto.classList.remove('afficher');
                <?php
            }
        ?>

        function Mycropper() {
            const apercuImage = document.getElementById('apercu-image');
            console.log(apercuImage);
            const cropper = new Cropper(apercuImage, {  
                aspectRatio: 1 / 1, // Ratio de l'image rognée
                viewMode: 1, // Mode de visualisation (1: normal)
                dragMode: 'move', // Mode de déplacement (move: déplacer l'image entière)
                autoCropArea: 1, // Zone de rognage automatique (1: 100%)
                cropBoxResizable: false, // Redimensionnement de la zone de rognage
                guides: true, // Affichage de guides
                center: true, // Centrage de l'image
                highlight: true, // Zone de rognage en surbrillance
            });
        }


        const fileInput = document.getElementById('photo-input');



    </script>
</body>

</html>
<!-- const image = document.getElementById('image');
            const cropper = new Cropper(image, {
                aspectRatio: 1 / 1, // Ratio de l'image rognée
                viewMode: 1, // Mode de visualisation (1: normal)
                dragMode: 'move', // Mode de déplacement (move: déplacer l'image entière)
                autoCropArea: 1, // Zone de rognage automatique (1: 100%)
                cropBoxResizable: true, // Redimensionnement de la zone de rognage
                guides: true, // Affichage de guides
                center: true, // Centrage de l'image
                highlight: true, // Zone de rognage en surbrillance
            }); 
        
        echo "<script>document.getElementById('modal-photo').classList.add('afficher');</script>";
        -->