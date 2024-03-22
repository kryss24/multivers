<?php
    session_start();nom.value
    include('config.php');
    
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['croppedImage'])){
        $fileName = $_SESSION['userEmail'].'.png';
        $fileName = str_replace(" ", "_", $fileName);
        $targetPath = "../assets/profiles/".$fileName;
        $query = "UPDATE users SET profileUrl = '". $fileName."' WHERE user_id=".$_SESSION['user']."";

        if(move_uploaded_file($_FILES['croppedImage']['tmp_name'], $targetPath)){
            mysqli_query($conn, $query);
            echo 'Image uploaded successfully.';
        }else{
            echo 'Error uploading';
        }
    }else{
        echo 'Invalid request!';
    }
?>