<?php 
    session_start();
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
<div id="modal-photo">
            <h2>Choisir votre photo de profil</h2>
            <form action="#" enctype="multipart/form-data" method="post">
                <input type="file" id="photo-input" accept="image/png, image/jpeg" name="image">
                <img id="apercu-image">
                <div class="boutons">
                    <button type="button" id="enregistrer-image">Enregistrer</button>
                    <button type="submit">Valider</button>
                    <button type="button" id="fermer-modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>


    <?php
    // Si le formulaire a été soumis
    if (isset($_FILES['image'])) {

        // Vérifier si le fichier a été correctement uploadé
        if ($_FILES['image']['error'] === 0) {

            // Définir le nom et le chemin du fichier source
            $source_file = $_FILES['image']['tmp_name'];
            $source_name = $_FILES['image']['name'];

            // Définir le chemin du répertoire cible
            $target_directory = "../temp";

            // Définir le nom du fichier copié
            $target_name = $source_name;

            // Copier le fichier
            if (move_uploaded_file($source_file, $target_directory . "/" . $target_name)) {
                echo "<p>L'image a été copiée avec succès!</p>";
                echo "<script>  document.getElementById('apercu-image').src ='../temp/".$target_name."  '</script>";
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
        const fileInput = document.getElementById("photo-input");
        const icon = document.createElement("i");
        icon.classList.add("fa", "fa-file");
        fileInput.parentNode.insertBefore(icon, fileInput);

        const modalPhoto = document.getElementById('modal-photo');
        const ouvrirModal = document.getElementById('ouvrir-modal');
        const fermerModal = document.getElementById('fermer-modal');
        const photoInput = document.getElementById('photo-input');
        const apercuImage = document.getElementById('apercu-image');

        fermerModal.addEventListener('click', () => {
            window.location.href = "profil.php";
        });
        var crooper;
        function Mycropper() {
            const apercuImage = document.getElementById('apercu-image');
                cropper = new Cropper(apercuImage, {  
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



        // Fonction pour enregistrer l'image rognée en PNG
        function enregistrerImage(crooper) {
        const canvas = cropper.getCroppedCanvas();
        canvas.toBlob(async (blob) => {
            const formData = new FormData();
            formData.append('croppedImage', blob);

            try{
                const response = await fetch('../php/savedCropper.php',{
                    method: 'POST',
                    body: formData
                });
                if (response.ok) {
                    console.log('Image Upload');
                    window.location.href = "profil.php";
                }else{
                    console.error('Error uploading', response.statusText);
                }
            }catch(error){
                console.error('Error :', error);
            }
        });
        }

        // Bouton pour enregistrer l'image
        const boutonEnregistrer = document.getElementById('enregistrer-image');
        boutonEnregistrer.addEventListener('click', enregistrerImage);
        if(document.getElementById('apercu-image').src != ""){
            document.querySelector('button[type="submit"]').style.display = "none";
            document.querySelector('#enregistrer-image').style.display = "block";
            Mycropper();
            
        }

        document.querySelector('#photo-input').addEventListener('change',(e) =>{
            e.preventDefault();
            document.querySelector('button[type="submit"]').style.display = "block";
            document.querySelector('#enregistrer-image').style.display = "none";
        })

    </script>
</body>
</html>