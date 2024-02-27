<?php 
    include("../php/config.php");    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connect</title>
    <link rel="stylesheet" href="../style\fontawesome\css\all.min.css">
    <link rel="stylesheet" href="../style/index.css">
</head>
<body>
    <div class="cross">&cross;</div>
    <h1>Se Connecter</h1>
    <p>Bienvenue sur <span>immob</span></p>
    <form action="" method="post">
        <div class="input-group">
            <label for="nom">Nom</label>
            <div class="input-item">
                <i class="fas fa-user x3"></i>
                <input type="text" name="nom" id="">
            </div>
        </div>
        <div class="input-group">
            <label for="nom">Nom d'utilisateur</label>
            <div class="input-item">
                <i class="fas fa-user x3"></i>
                <input type="text" name="user" id="">
            </div>
        </div>
        <div class="input-group">
            <label for="psw">Mot de passe</label>
            <div class="input-item">
                <i class="fas fa-lock"></i>
                <input type="password" name="psw" id="">
            </div>
        </div>
        <div class="input-group">
            <label for="cpsw">Confirmer Mot de passe</label>
            <div class="input-item">
                <i class="fas fa-lock"></i>
                <input type="password" name="cpsw" id="">
            </div>
        </div> 
        <div class="google">
            <a href="#">Se connecter avec <img src="../assets/icons/icons8_google_48px.png" alt="" srcset=""></a>
        </div>
        <div class="btn-group">
            <button type="button">S'inscrire</button>
        </div>
    </form>
</body>
<?php /*}else{
    header('location: php/config.php');
}*/ ?>
<script>
    var cross = document.querySelector('.cross');
    cross.addEventListener('click', ()=>{
        history.back();
    })
</script>
</html>