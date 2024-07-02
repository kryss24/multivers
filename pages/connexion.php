<?php 
    session_start();
    include("../php/config.php");
    if(isset($_SESSION['user']))
        header('location: ../');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connect</title>
    <link rel="stylesheet" href="../style/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <a href="immob.php">Back</a>
    <h1>Se Connecter</h1>
    <p>Bienvenue sur <span>immob</span></p>
    <form action="" method="post">
        <?php
            if(isset($_POST["nom"]) && isset($_POST["psw"])){
                $query = $conn->prepare('SELECT user_id FROM users WHERE matricule = ? AND password = ?');
                $query->bind_param('ss',$_POST["nom"],$_POST["psw"]);
                $query->execute();
                $result = $query->get_result();
        
                if ($result->num_rows === 1) {
                    $_SESSION['user'] = $result->fetch_assoc()['user_id'];
                    header('location: ../');
                }else{
                    echo "<div class=\"error\"> Le nom d'utilisateur ou le mot de passe est incorrect </div>";
                }
                  
                  // Fermer la requête et la connexion
                $query->close();
                $conn->close();
            }
        ?>
        <div class="input-group">
            <label for="nom">Nom d'utilisateur</label>
            <div class="input-item">
                <i class="fas fa-user x3"></i>
                <input type="text" name="nom" value="<?php
                    if(isset($_POST['nom']))
                        echo $_POST['nom'] 
                 ?>" >
            </div>
        </div>
        <div class="input-group">
            <label for="psw">Mot de passe</label>
            <div class="input-item">
                <i class="fas fa-lock"></i>
                <input type="password" name="psw">
            </div>
            
        </div>
        <div class="chek"><input type="checkbox" name="show" id="" disabled>Afficher le mot de passe</div>
        <div class="google forget">
            <a href="#">Mot de passe oublier ?</a>
        </div>
        <div class="btn-group">
            <button type="submit">Se Connecter</button>
        </div>
        <div class="redirect">
            vous n'avez pas de compte ? <a href="inscription.php">Creer un compte</a>
        </div>
    </form>
</body>
<?php /*}else{
    header('location: php/config.php');
}*/ ?>
<script>
    document.querySelector('.chek').addEventListener('click', (e)=>{
        e = e.target;
        e = e.querySelector('input[name=\'show\']');
        if(e.checked === false){
            document.querySelector('input[name="psw"]').type = "text";
            e.checked = true;
        }else{
            document.querySelector('input[name="psw"]').type = "password";
            e.checked = false;
        }
    })
</script>
</html>