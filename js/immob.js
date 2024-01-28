var menue = document.querySelector(".fa-bars");
var mynav = document.getElementById("sidebar");
var images = ["assets/image-multivers/IMG-20231223-WA0007.jpg", "assets/image-multivers/IMG-20231223-WA0008.jpg",
  "assets/image-multivers/IMG-20231223-WA0009.jpg", "assets/image-multivers/IMG-20231223-WA0007.jpg",
  "assets/image-multivers/IMG-20231223-WA0008.jpg", "assets/image-multivers/IMG-20231223-WA0009.jpg"];



var donnees;
// Fonction pour effectuer une requête AJAX
function effectuerRequeteAjax(url, methode, donnees, callback) {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
              callback(xhr.responseText);
          } else {
            console.error('Une erreur s\'est produite : ' + xhr.status);
          }
      }
  };
  xhr.open(methode, url, true);
  if (methode === 'POST') {
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  }
  xhr.send(donnees);
}

// Exemple d'utilisation pour récupérer les données de la base de données
function recupererDonnees() {
  effectuerRequeteAjax('php/function.php', 'GET', null, function(response) {
      // Traitement des données reçues
      donnees = JSON.parse(response);
      // Affichage des données
      // for (var i = 0; i < donnees.length; i++) {
      //   for (let j = 0; j < donnees[i].length; j++) {
      //     console.log(donnees[i][j]);
          
      //   }
          
          // console.log(donnees[i].age);
          // ...
      // }
  });
}
// Appel de la fonction pour récupérer les données
recupererDonnees();
//modifier la maison par defaut
var curentHouse = 0;
function Maison() {
  if(curentHouse >= images.length){
    curentHouse = 0;
  }
  document.getElementsByClassName("profile")[0].style.backgroundImage = "url('"+images[curentHouse]+"'  )";
  document.querySelector(".immob-title .title").innerText = ""+donnees[curentHouse][1] 
  document.querySelector(".immob-title p").innerHTML = donnees[curentHouse][5]+ "<span> Fcfa</span>"
  document.querySelectorAll(".subs-title-item div")[1].innerText = donnees[curentHouse][6]+" Pieces"
  document.querySelector(".description-content").innerText = donnees[curentHouse][7]
  curentHouse++;
}




document.addEventListener('click', (event) => {
  if (!mynav.contains(event.target) && mynav.style.display === "block" && !menue.contains(event.target)) {
    // Le clic a eu lieu en dehors de la zone autorisée
    mynav.style.display = "none";
    menue.style.color = "black";
    mynav.style.transform = "translateX(0%)";
    mynav.style.transition = "transform 0.3s ease 0s";
  }
});

menue.addEventListener("click", () => {
  if (mynav.style.display === "none") {
    mynav.style.display = "block";
    mynav.style.transition = "transform 0.6s ease";
    mynav.style.transform = "translateX(0%)";
    menue.style.color = "white";
  } else {
    mynav.style.transform = "translateX(100%)";
    mynav.style.transitionDuration = "0.8s";
    mynav.style.display = "none";
    menue.style.color = "black";
  }
  window.addEventListener('scroll', () => {
    mynav.style.transform = "translateX(100%)";
    mynav.style.transitionDuration = "0.8s";
    mynav.style.display = "none";
    menue.style.color = "black";
  });
});

//caroussel
let currentPosition = 0;
var slideWidth;
var slidesToShow; // Nombre d'images affichées à la fois
const prevButton = document.getElementById('prevBtn');
const nextButton = document.getElementById('nextBtn');
const carouselSlide = document.querySelector('.voir .carousel-slide');

var images = ["assets/image-multivers/IMG-20231223-WA0007.jpg", "assets/image-multivers/IMG-20231223-WA0008.jpg",
  "assets/image-multivers/IMG-20231223-WA0009.jpg", "assets/image-multivers/IMG-20231223-WA0007.jpg",
  "assets/image-multivers/IMG-20231223-WA0008.jpg", "assets/image-multivers/IMG-20231223-WA0009.jpg"];
function addImage(images) {
  for (let index = 0; index < images.length; index++) {
    const element = images[index];
    const newImage = document.createElement('div');
    newImage.classList.add('carousel-item');
    newImage.innerHTML = "<img src=" + element + " alt='New Image'>";
    carouselSlide.appendChild(newImage);
  }
}
addImage(images);

const carouselItems = Array.from(carouselSlide.getElementsByClassName('carousel-item'));
slideWidth = carouselItems[0].offsetWidth
slidesToShow = Math.floor(carouselSlide.offsetWidth / slideWidth)

function slideToNext() {
  currentPosition -= slideWidth;
  if (currentPosition < -((carouselItems.length - slidesToShow) * slideWidth)) {
    currentPosition += slideWidth;
  }
  carouselSlide.style.transform = `translateX(${currentPosition}px)`;
  if(currentPosition != 0){
    document.getElementById("prevBtn").style.display = "block";
    document.getElementById("nothing").style.display = "none";
  }
  if(currentPosition == -((carouselItems.length - slidesToShow) * slideWidth)){
    document.getElementById("nextBtn").style.display = "none";
    document.getElementById("nothing").style.display = "block";
  }
}

function slideToPrev() {
  if (currentPosition < 0) {
    currentPosition += slideWidth;
    carouselSlide.style.transform = `translateX(${currentPosition}px)`;
    if(currentPosition == 0){
      document.getElementById("prevBtn").style.display = "none";
      document.getElementById("nothing").style.display = "block";
    }
    if(currentPosition != 0){
      document.getElementById("nextBtn").style.display = "block";
      document.getElementById("nothing").style.display = "none";
    }
  }
}

nextButton.addEventListener('click', slideToNext);
prevButton.addEventListener('click', slideToPrev);




//set interval
setInterval(Maison, 60000);