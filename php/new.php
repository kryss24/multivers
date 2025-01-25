<header class="flex justify-between items-center p-5 bg-white border-b border-gray-200 flex-wrap">
   <div class="logo text-2xl font-bold text-red-500">
      <img src="../assets/image_multivers/multivers.jpg" alt="" srcset="">
   </div>
   <div class="menu-toggle">
      <i class="fas fa-bars">
      </i>
   </div>
   <nav>
      <ul class="hidden md:flex gap-5">
         <li class="<?php if ($curentPages == "Accueil") echo "active"; ?>">
            <a href="immob.php"><i class="fa-solid fa-house"></i>Accueil
            </a>
         </li>
         <li class="<?php if ($curentPages == "Profil") echo "active"; ?>">
            <a href="profil.php">
               <i class="fa-regular fa-address-card"></i>Profil
            </a>
         </li>
         <li class="<?php if ($curentPages == "Nos services") echo "active"; ?>">
            <a href="#services">
               <i class="fa-solid fa-bell-concierge"></i>Nos services
            </a>
         </li>
         <li class="<?php if ($curentPages == "Notifications") echo "active"; ?>">
            <a href="notifications.php">
               <i class="fa-solid fa-bell"></i>Notificatio
            </a>
         </li>
         <li class="<?php if ($curentPages == "Message") echo "active"; ?>">
            <a href="message.php">
               <i class="fa-solid fa-message"></i>Message
            </a>
         </li>
         <li class="<?php if ($curentPages == "Louer Une Maison") echo "active"; ?>">
            <a href="sellYourBuild.php">
               <i class="fa-solid fa-coins"></i>Louer Une Maison
            </a>
         </li>
         <li class="<?php if ($curentPages == "Aide") echo "active"; ?>">
            <a href="#">
               <i class="fa-solid fa-circle-question"></i>Aide
            </a>
         </li>
      </ul>
   </nav>
</header>