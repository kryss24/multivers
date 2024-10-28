<header>
    <?php $curentPages = $_SESSION['pages']; ?>
        <img src="../assets/image_multivers/multivers.jpg" alt="logo">
        <div class="main">
            <i class=" fa fa-solid fa-bars fa-2x"></i>
            <div id="sidebar" class="sidebar">
                <a href="immob.php">
                    <div class="<?php if($curentPages == "Accueil") echo "active"; ?>"><i class="fa-solid fa-house"></i>Accueil</div>
                </a>
                <a href="profil.php">
                    <div class="<?php if($curentPages == "Profil") echo "active"; ?>"><i class="fa-regular fa-address-card"></i></i>Profil</div>
                </a>
                <a href="#services">
                    <div class="<?php if($curentPages == "Nos services") echo "active"; ?>"><i class="fa-solid fa-bell-concierge"></i></i>Nos services</div>
                </a>
                <hr style="width: 200px;height: 1.5px;background-color: white;">
                <a href="notifications.php">
                    <div class="<?php if($curentPages == "Notifications") echo "active"; ?>" ><i class="fa-solid fa-bell"></i>Notification</div>
                    <script>
                        // alert("<?php echo "$curentPages" ?>")
                    </script>
                </a>
                <a href="message.php">
                    <div class="<?php if($curentPages == "Message") echo "active"; ?>"><i class="fa-solid fa-message"></i>Message</div>
                </a>
                <hr style="width: 200px;height: 1.5px;background-color: white;">
                <a href="#">
                    <div class="<?php if($curentPages == "Aide") echo "active"; ?>"><i class="fa-solid fa-circle-question"></i>Aide</div>
                </a>
                <a href="sellYourBuild.php">
                    <div class="<?php if($curentPages == "Louer Une Maison") echo "active"; ?>"><i class="fa-solid fa-coins"></i>Louer Une Maison</div>
                </a>
            </div>
        </div>
    </header>