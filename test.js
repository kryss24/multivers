// Variables globales
const carouselSlide = document.querySelector('.carousel-slide');
const carouselImages = carouselSlide.querySelectorAll('img');

// Configuration du carrousel
const slideInterval = 3000; // Durée d'affichage de chaque image (en millisecondes)
let currentSlide = 0;

// Fonction pour afficher l'image suivante
function nextSlide() {
  currentSlide = (currentSlide + 1) % carouselImages.length;
  updateSlidePosition();
}

// Fonction pour mettre à jour la position du carrousel
function updateSlidePosition() {
  carouselSlide.style.transform = `translateX(-${currentSlide * 100}%)`;
}

// Déclencher le carrousel automatique
setInterval(nextSlide, slideInterval);