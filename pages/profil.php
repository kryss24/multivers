<?php
    session_start();
    $_SESSION['pages'] = "Profile";
    include("../php/config.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="../style/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../style/immob.css">
    <link rel="stylesheet" href="../style/profile.css">
    <link rel="icon" href="../assets/icons/NH-logo.ico">
</head>

<body>
    <header><i class="fas fa-home fa-2x"></i></header>
    <?php 
        if(isset($_SESSION['user'])){
    ?>
            <div class="container">
            <?php 
                if(strpos($_SESSION['userProfile'], '@') == false){
            ?>
            <div class="profile-image">
                <i class="fas fa-<?php echo strtolower($_SESSION['userProfile']); ?> fa-5x letter" style = "color: white;"></i>
            <?php }else { ?>
            <div class="profile-image">
               <img src="../assets/profiles/<?php echo $_SESSION['userProfile']; ?>" id="image"> 
            <?php } ?>
            <i class="fa-solid fa-camera fa-2x"></i>
        </div>
        <div class="profile-name">
            <div class="name">
                <?php echo $_SESSION['userName']; ?>
            </div>
        </div>
        <div class="profile-mail">
            <div class="mail">
                <?php echo $_SESSION['userEmail']; ?>
            </div>
        </div>
    </div>

    <div id="section">
        <div class="">
            <div class="card-group">
                <div class="card">Change your name</div>
                <form action="profil.php" method="post" class="form-card">
                    <input type="text" name="Name" id="">
                    <div>
                        <input type="submit" value="Update" />
                        <input type="button" value="Cancel" />
                    </div>
                </form>
            </div>
            <div class="card-group">
                <div class="card">Change your User Name</div>
                <form action="profil.php" method="post" class="form-card">
                    <input type="text" name="userName" id="">
                    <div>
                        <input type="submit" value="Update" />
                        <input type="button" value="Cancel" />
                    </div>
                </form>
            </div>
            <div class="card-group">
                <div class="card">Change your Password</div>
                <form action="#" method="post" class="form-card">
                    <input type="text" name="userPsw" id="">
                    <div>
                        <input type="submit" value="Update" />
                        <input type="button" value="Cancel" />
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
        if(isset($_POST['Name'])){
            $query = "UPDATE users SET nom ='".$_POST['Name']."' WHERE user_id = ".$_SESSION['user'];
        }
        if(isset($_POST['userName'])){
            $query = "UPDATE users SET matricule ='".$_POST['userName']."' WHERE user_id = ".$_SESSION['user'];
        }
        if(isset($_POST['userPsw'])){
            $query = "UPDATE users SET password ='".$_POST['userPsw']."' WHERE user_id = ".$_SESSION['user'];
        }
        if(isset($_POST['userName']) || isset($_POST['Name']) || isset($_POST['userPsw'])){
            mysqli_query($conn, $query);
            header("Refresh: 0"); // Actualiser la page immédiatement
        }
    ?>

<div id="loading-bar">
    <div class="circle"></div>
</div>
    <footer>
       <form action="../php/disconnect.php" method="post">
            <button type="submit" >Sign out</button>
       </form>
    </footer>
    <?php
        }else{
           header("location: connexion.php");
        } 
    ?>
    <script src="../js/profile.js"></script>
</body>
<!-- http://localhost/multivers/pages/profil.php -->
</html>