<?php
include("../php/config.php");
session_start();
$_SESSION['pages'] = "Accueil";

// Handle search
$search_query = "";
if (isset($_GET['search'])) {
  $search_query = mysqli_real_escape_string($conn, $_GET['search']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Immob Page</title>
  <!-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="../style/tailwind.min.css">
  <link rel="stylesheet" href="../style/fontawesome/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet" />
  <style>
    img {
      object-fit: cover;
      border-radius: 15px;
      /* Rounded corners for images */
    }

    @media (max-width: 400px) {

      h1,
      h2,
      h3,
      h4,
      h5,
      h6,
      p,
      span,
      button {
        font-size: 50%;
      }

      .search-section {
        margin-left: 0;
        margin-right: 0;
      }

      .toggle-buttons {
        display: none;
      }

      .toggle-select {
        display: block;
      }
    }

    .toggle-select {
      display: none;
    }

    .active {
      background-color: #fbbf24;
      /* Tailwind yellow-500 */
      color: white;
    }

    .custom-button {
      color: #1a202c;
      /* Tailwind gray-900 */
      border-radius: 50px;
      /* More rounded shape */
    }

    .search-form {
      display: flex;
      align-items: center;
    }

    .container-search {
      border-radius: 50px;
      border: 2px solid #e2e8f0;
      /* Tailwind gray-200 */
      padding: 5px;
      display: flex;
      align-items: center;
      justify-content: center;
      max-width: fit-content;
      margin: 0 auto;
    }

    .search-form input {
      flex: 1;
      min-width: 100px;
      border: none;
      border-right: 1px solid #e2e8f0;
      /* Tailwind gray-200 */
    }

    .search-form input:focus {
      outline: none;
      border-right: 1px solid #e2e8f0;
      /* Tailwind gray-200 */
    }

    .search-form input:last-child {
      border-right: none;
    }

    .search-button {
      height: 50px;
      width: 50px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-left: 5px;
    }

    .carousel {
      position: relative;
    }

    .carousel img {
      display: none;
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .carousel img.active {
      display: block;
    }

    .carousel-dots {
      position: absolute;
      bottom: 10px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      gap: 5px;
    }

    .carousel-dot {
      width: 10px;
      height: 10px;
      background-color: white;
      border-radius: 50%;
      cursor: pointer;
    }

    .carousel-dot.active {
      background-color: #fbbf24;
      /* Tailwind yellow-500 */
    }

    .card {
      width: 90%;
      /* Reduce width by 10% */
      height: 95%;
      /* Reduce height by 5% */
      position: relative;
    }

    .heart-icon {
      position: absolute;
      top: 10px;
      right: 10px;
      color: red;
      font-size: 24px;
      cursor: pointer;
    }

    .animate-fadeIn {
      animation: fadeIn 1.5s ease-in-out forwards;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(40px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
  <script>
    function toggleActive(event) {
      const buttons = document.querySelectorAll('.toggle-button');
      buttons.forEach(button => button.classList.remove('active'));
      event.currentTarget.classList.add('active');
    }

    function filterByCategory(category) {
      const urlParams = new URLSearchParams(window.location.search);
      urlParams.set('categories', category);
      window.location.search = urlParams.toString();
    }

    document.addEventListener('DOMContentLoaded', function() {
      const carousels = document.querySelectorAll('.carousel');
      carousels.forEach(carousel => {
        const images = carousel.querySelectorAll('img');
        const dots = carousel.querySelectorAll('.carousel-dot');
        if (dots.length > 0) {
          let currentIndex = 0;

          function showImage(index) {
            images.forEach((img, i) => {
              img.classList.toggle('active', i === index);
              dots[i].classList.toggle('active', i === index);
            });
          }

          dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
              currentIndex = index;
              showImage(index);
            });
          });

          showImage(currentIndex);
        }
      });

      // Scroll animation for cards
      const cards = document.querySelectorAll('.card');
      const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('animate-fadeIn');
            observer.unobserve(entry.target);
          }
        });
      }, { threshold: 0.1 });

      cards.forEach(card => {
        observer.observe(card);
      });

      // Scroll to container section if URL contains 'categories' parameter
      const urlParams = new URLSearchParams(window.location.search);
      if (urlParams.has('categories')) {
        document.querySelector('.listings-section').scrollIntoView({ behavior: 'smooth' });
      }
    });
  </script>
</head>

<body>
  <!-- Header -->
  <header>
    <div class="container mx-auto flex flex-wrap justify-between items-center p-4">
      <img alt="Immob logo" class="h-15 w-20 rounded-full" height="50" src="../assets/icons/logo.jpg" width="50" />
      <div class="flex items-center space-x-4">
        <i class="fas fa-globe text-gray-600"></i>
        <button class="text-sm bg-orange-600 text-white p-2 rounded-full custom-button">Mettre mon bien sur immob</button>
        <div class="flex items-center space-x-2 bg-gray-200 p-2 rounded-full">
          <svg class="w-6 h-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <i class="fa-regular fa-user"></i>
        </div>
      </div>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="relative sect1">
    <center class="w-full"><img src="../assets/image_multivers/IMG-20231223-WA0009.jpg" alt="Hero Image" class="h-96 object-cover" style="width: 95% !important;"></center>
    <div class="absolute inset-0">
      <div class="container mx-auto px-4 py-8">
        <h2 class="ml-10 text-white text-4xl font-semibold">Trouvez votre prochaine destination</h2>
      </div>
    </div>
  </section>

  <!-- Search Section -->
  <section class="search-section bg-white shadow-md rounded-lg p-6 -mt-16 relative z-10 mx-12 sm:mx-16 md:mx-20 lg:mx-24 xl:mx-32">
    <div class="container mx-auto">
      <form action="" method="GET">
        <div class="flex flex-wrap items-center justify-between space-y-4 sm:space-y-0">
          <div class="flex items-center space-x-4">
            <img alt="Immob logo" class="h-10 w-10" height="50" src="../assets/icons/logo.jpg" width="50" />
            <span class="text-lg font-bold">immob</span>
          </div>
          <!-- <div class="flex space-x-4 toggle-buttons">
            <div class="px-4 py-2 rounded-lg toggle-button" onclick="toggleActive(event)">Location Courte durée</div>
            <div class="px-4 py-2 text-gray-600 rounded-lg toggle-button" onclick="toggleActive(event)">Location Longue durée</div>
            <div class="px-4 py-2 text-gray-600 rounded-lg toggle-button" onclick="toggleActive(event)">Location de bureau</div>
          </div>
          <select class="toggle-select px-4 py-2 border rounded-lg">
            <option>Location Courte durée</option>
            <option>Location Longue durée</option>
            <option>Location de bureau</option>
          </select> -->
        </div>
        <div class="mt-4 flex flex-wrap items-center justify-center space-y-4 sm:space-y-0 sm:space-x-4 container-search">
          <div class="search-form">
            <input class="px-4 py-2" name="search" placeholder="Search destinations" type="text" value="<?php echo htmlspecialchars($search_query); ?>" />
            <input class="px-4 py-2" placeholder="Add dates" type="date" name="debut" />
            <input class="px-4 py-2" placeholder="Add dates" type="date" name="fin" />
            <input class="px-4 py-2" placeholder="Add guests" type="text" />
          </div>
          <button class="bg-yellow-500 text-white search-button" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </form>
    </div>
  </section>

  <!-- Icons Section -->
  <section class="icons-section py-8">
    <div class="container mx-auto grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6 text-center" style="transform: scale(0.7);">
      <div onclick="filterByCategory('Appartement')">
        <i class="fas fa-building text-4xl text-gray-600"></i>
        <p class="mt-2 text-gray-800">Appartement</p>
      </div>
      <div onclick="filterByCategory('Maison')">
        <i class="fas fa-home text-4xl text-gray-600"></i>
        <p class="mt-2 text-gray-800">Maison</p>
      </div>
      <div onclick="filterByCategory('Entrepôt')">
        <i class="fas fa-warehouse text-4xl text-gray-600"></i>
        <p class="mt-2 text-gray-800">Entrepôt</p>
      </div>
      <div onclick="filterByCategory('Commerce')">
        <i class="fas fa-store text-4xl text-gray-600"></i>
        <p class="mt-2 text-gray-800">Commerce</p>
      </div>
      <div onclick="filterByCategory('Hôtel')">
        <i class="fas fa-hotel text-4xl text-gray-600"></i>
        <p class="mt-2 text-gray-800">Hôtel</p>
      </div>
      <div onclick="filterByCategory('Parking')">
        <i class="fas fa-parking text-4xl text-gray-600"></i>
        <p class="mt-2 text-gray-800">Parking</p>
      </div>
    </div>
  </section>

  <!-- Listings Section -->
  <section class="container mx-auto px-4 py-8 listings-section">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      <!-- Example Card -->
      <?php
      $today = date('Y-m-d');
      $category_filter = isset($_GET['categories']) ? mysqli_real_escape_string($conn, $_GET['categories']) : '';
      $debut = isset($_GET['debut']) ? mysqli_real_escape_string($conn, $_GET['debut']) : '';
      $fin = isset($_GET['fin']) ? mysqli_real_escape_string($conn, $_GET['fin']) : '';

      $query = "SELECT * FROM house";
      $conditions = [];

      if (!isset($_GET['search']) && !isset($_GET['categories']) && !isset($_GET['debut']) && !isset($_GET['fin'])) {
        $conditions[] = "id NOT IN (
                          SELECT houseId FROM reservations 
                          WHERE (dateFin > '$today')
                        )";
      }

      if ($search_query) {
        $conditions[] = "(title LIKE '%$search_query%' OR description LIKE '%$search_query%')";
      }

      if ($category_filter) {
        $conditions[] = "categories = '$category_filter'";
      }

      if ($debut && $fin) {
        $conditions[] = "id NOT IN (
                          SELECT houseId FROM reservations 
                          WHERE dateFin >= '$debut'
                          AND houseId IN (
                            SELECT houseId FROM reservations 
                            GROUP BY houseId 
                            HAVING MAX(dateFin) >= '$debut'
                          )
                        )";
      }

      if (count($conditions) > 0) {
        $query .= " WHERE " . implode(" AND ", $conditions);
      }

      $result = mysqli_query($conn, $query);
      while ($row = mysqli_fetch_assoc($result)) {
        $_id = $row['id'];
      ?>
        <div class="bg-white rounded shadow overflow-hidden card">
          <div class="carousel">
            <img src="../assets/<?php echo $row['image'] ?>" alt="Listing Image 1" class="active">
            <?php
            $pieces = mysqli_query($conn, "SELECT images FROM pieces WHERE id_house = '$_id'");
            $count = mysqli_num_rows($pieces);
            $i = 0;
            while ($ligne = mysqli_fetch_assoc($pieces)) {
              $i++;
            ?>
              <img src="../assets/image_multivers/<?php echo $ligne['images'] ?>" alt="Listing Piece <?php echo $i; ?>">
            <?php } ?>
            <div class="carousel-dots">
              <?php
              if ($count > 0) {
              ?>
                <div class="carousel-dot active"></div>
              <?php
              }
              for ($j = 0; $j < $count; $j++) {
              ?>
                <div class="carousel-dot"></div>
              <?php
              }
              ?>
            </div>
          </div>
          <img src="../assets/icons/Vector.png" alt="" srcset="" class="heart-icon">
          <div class="p-4">
            <h3 class="text-lg font-semibold"><?php echo $row['title'] ?></h3>
            <p class="text-sm text-gray-600">8.05 km away</p>
            <p class="text-orange-600 font-bold"><?php echo $row['price'] ?>FCFA</p>
          </div>
        </div>
      <?php } ?>
      <!-- Repeat other cards similarly -->
    </div>
  </section>
  <!-- <iframe class="w-full" style="border: 1px solid rgba(0, 0, 0, 0.1);" height="450" src="https://embed.figma.com/design/vGk2jsLhlxpTIaObg2nFNn/real-estate-project?node-id=0-1&embed-host=share" allowfullscreen></iframe> -->
</body>

</html>