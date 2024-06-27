var menue = document.querySelector(".fa-bars");
var mynav = document.getElementById("sidebar");
var images;
var images_lenght = 0;
var donnees;

//Evenement Reserver
function reserver(a) {
  window.location.href = "../pages/reservation.php?house=" + a
}

// Fonction pour effectuer une requête AJAX
function effectuerRequeteAjax(url, methode, donnees, callback) {
  var xhr = new XMLHttpRequest();
  // Définition de la fonction de rappel pour gérer la réponse de la requête AJAX
  xhr.onreadystatechange = function () {
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

// Recuperation des donnee lier a la Maison
function recupererMaison(a) {
  switch (a) {
    case 0:
      effectuerRequeteAjax('../php/function.php', 'GET', null, function (response) {
        // Traitement des données reçues
        donnees = JSON.parse(response);
        var nombreAleatoire = Math.floor(Math.random() * (donnees.length - 0));
        document.getElementById("reservez").setAttribute("onclick", "reserver(" + donnees[nombreAleatoire][0] + ")");
        document.getElementsByClassName("profile-imob")[0].style.backgroundImage = "url('../assets/" + donnees[nombreAleatoire][4] + "'  )";
        document.querySelector(".immob-title .title").innerText = "" + donnees[nombreAleatoire][1];
        document.querySelector(".immob-title p").innerHTML = donnees[nombreAleatoire][3] + "<span> Fcfa</span>";
        document.querySelectorAll(".subs-title-item div")[0].innerText = donnees[nombreAleatoire][9];
        document.querySelectorAll(".subs-title-item div")[1].innerText = donnees[nombreAleatoire][2] + " Pieces";
        document.querySelector(".description-content").innerText = donnees[nombreAleatoire][5];
        for (let index = 0; index < 5; index++) {
          const star = document.createElement("i");
          if (index < donnees[nombreAleatoire][12]) {
            star.classList.add("fas");
            star.style.color = "#FFC107";
          } else {
            star.classList.add("far");
          }
          star.classList.add("fa-star");
          document.querySelector(".star").appendChild(star)
        }
        // document.querySelector(".star")
        effectuerRequeteAjax('../php/pieces.php?id=' + donnees[nombreAleatoire][0], 'GET', null, function (response) {
          // Traitement des données reçues
          images = JSON.parse(response);
          document.querySelectorAll('.voir .carousel-item').forEach(element => {
            element.remove();
          });
          addImage(images);
          images_lenght = images.length
        });

      });
      break;

    case 1:
      effectuerRequeteAjax('../php/pieces.php?id=' + donnees[curentHouse][0], 'GET', null, function (response) {
        // Traitement des données reçues
        images = JSON.parse(response);
        document.querySelectorAll('.voir .carousel-item').forEach(element => {
          element.remove();
        });
        addImage(images);
        images_lenght = images.length;
      });
      break

    default:
      break;
  }
}
// Appel de la fonction pour récupérer les données
recupererMaison(0);


//modifier la maison par defaut
var curentHouse = 1;
function Maison() {
  if (curentHouse >= donnees.length) {
    curentHouse = 0;
  }
  document.querySelectorAll('.star i').forEach(element => {
    element.remove();
  });
  // Modification des éléments HTML avec les données de la maison actuelle
  document.getElementById("reservez").setAttribute("onclick", "reserver(" + donnees[curentHouse][0] + ")")
  document.getElementsByClassName("profile")[0].style.backgroundImage = "url('../assets/" + donnees[curentHouse][4] + "'  )";
  document.querySelector(".immob-title .title").innerText = "" + donnees[curentHouse][1];
  document.querySelector(".immob-title p").innerHTML = donnees[curentHouse][3] + "<span> Fcfa</span>";
  document.querySelectorAll(".subs-title-item div")[0].innerText = donnees[curentHouse][9];
  document.querySelectorAll(".subs-title-item div")[1].innerText = donnees[curentHouse][2] + " Pieces";
  document.querySelector(".description-content").innerText = donnees[curentHouse][5];
  for (let index = 0; index < 5; index++) {
    const star = document.createElement("i");
    if (index < donnees[curentHouse][12]) {
      star.classList.add("fas");
      star.style.color = "#FFC107";
    } else {
      star.classList.add("far");
    }
    star.classList.add("fa-star");
    document.querySelector(".star").appendChild(star)
  }
  recupererMaison(1);// Appel pour récupérer les images de la maison actuelle
  curentHouse++;
}


// Carrousel pour afficher les images des pièces de la maison
let currentPosition = 0;
var slideWidth;
var slidesToShow; // Nombre d'images affichées à la fois
const carouselSlide = document.querySelector('.voir .carousel-slide');

// Fonction pour ajouter les images au carrousel
function addImage(images) {
  for (let index = 0; index < images.length; index++) {
    const element = images[index][0];
    const newImage = document.createElement('div');
    newImage.classList.add('carousel-item');
    newImage.innerHTML = "<img src='../assets/image_multivers/" + element + "' alt='New Image'>";
    carouselSlide.appendChild(newImage);
    slidesToShow = 0
  }
}

// Gestion du clic sur le bouton suivant du carrousel
document.getElementById('nextBtn').addEventListener('click', () => {
  const carouselItems = Array.from(carouselSlide.getElementsByClassName('carousel-item'));
  slideWidth = carouselItems[0].offsetWidth
  slidesToShow = Math.floor(carouselSlide.offsetWidth / slideWidth)
  currentPosition -= slideWidth;
  if (currentPosition < -((carouselItems.length - slidesToShow) * slideWidth)) {
    currentPosition += slideWidth;

  }
  carouselSlide.style.transform = `translateX(${currentPosition}px)`;
  if (currentPosition != 0) {
    document.getElementById("prevBtn").style.display = "block";
    document.getElementById("nothing").style.display = "none";
  }
  if (currentPosition == -((carouselItems.length - slidesToShow) * slideWidth)) {
    document.getElementById("nextBtn").style.display = "none";
    document.getElementById("nothing").style.display = "block";
  }
});

// Gestion du clic sur le bouton précédent du carrousel principal
document.getElementById('prevBtn').addEventListener('click', () => {
  const carouselItems = Array.from(carouselSlide.getElementsByClassName('carousel-item'));
  slideWidth = carouselItems[0].offsetWidth
  slidesToShow = Math.floor(carouselSlide.offsetWidth / slideWidth)
  if (currentPosition < 0) {
    currentPosition += slideWidth;
    carouselSlide.style.transform = `translateX(${currentPosition}px)`;
    if (currentPosition == 0) {
      document.getElementById("prevBtn").style.display = "none";
      document.getElementById("nothing").style.display = "block";
      document.getElementById("nextBtn").style.display = "block";
    }
    if (currentPosition != 0) {
      document.getElementById("nextBtn").style.display = "block";
      document.getElementById("nothing").style.display = "none";
    }
  }
});


// Carrousel pour afficher les cartes des apartement
// let currentApartPosition = 0;
// var slideApartWidth; //la largeur d'un seul élément d'appartement dans le carousel.
// var slidesApartToShow; // Nombre d'apartement affichées à la fois
// const carouselApartSlide = document.querySelector('.apartement .carousel-slide'); 
// const carouselApartItems = Array.from(carouselApartSlide.getElementsByClassName('carousel-item'));
// slideApartWidth = carouselApartItems[0].offsetWidth 
// slidesApartToShow = Math.floor(carouselApartSlide.offsetWidth / slideApartWidth)

var currentsPosition = [0, 0];
var carouselsSlide = [document.querySelector('.apartement .carousel-slide'), document.querySelector('.studios-chambres .carousel-slide')];
var carouselsItems = [Array.from(carouselsSlide[0].getElementsByClassName('carousel-item')), Array.from(carouselsSlide[1].getElementsByClassName('carousel-item'))]
var slidesWidth = [carouselsItems[0][0].offsetWidth, carouselsItems[1][0].offsetWidth]
var slidesToShows = [Math.floor(carouselsSlide[0].offsetWidth / slidesWidth[0]), Math.floor(carouselsSlide[1].offsetWidth / slidesWidth[1])]


// Gestion du clic sur le bouton suivant du carrousel des départements
document.querySelector(".apartement #nextBtn").addEventListener('click', (e) => {
  nextImage(0, e)
})

// Gestion du clic sur le bouton précédent du carrousel des départements
document.querySelector('.apartement #prevBtn').addEventListener('click', (e) => {
  previousImage(0, e)
});

//Gestion du clic
document.querySelector(".studios-chambres #nextBtn").addEventListener('click', (e) => {
  nextImage(1, e)
})

// Gestion du clic sur le bouton précédent du carrousel des départements
document.querySelector('.studios-chambres #prevBtn').addEventListener('click', (e) => {
  previousImage(1, e)
});

function nextImage(a, e) {
  var btn = e.target;
  var div = (btn.parentElement);
  currentsPosition[a] -= slidesWidth[a];
  if (currentsPosition[a] < -((carouselsItems[a].length - slidesToShows[a]) * (slidesWidth[a]))) {
    currentsPosition[a] += slidesWidth[a];
    div.querySelector("#nextBtn").style.display = "none";
    div.querySelector("#nothing").style.display = "block";
  }

  carouselsSlide[a].style.transform = `translateX(${currentsPosition[a]}px)`;
  if (currentsPosition[a] != 0) {
    div.querySelector("#prevBtn").style.display = "block";
    div.querySelector("#nothing").style.display = "none";
  }
}

function previousImage(a, e) {
  var btn = e.target;
  var div = (btn.parentElement);
  if (currentsPosition[a] < 0) {
    currentsPosition[a] += slidesWidth[a];
    carouselsSlide[a].style.transform = `translateX(${currentsPosition[a]}px)`;
    if (currentsPosition[a] == 0) {
      div.querySelector("#prevBtn").style.display = "none";
      div.querySelector("#nothing").style.display = "block";
    }
    if (currentsPosition[a] != 0) {
      div.querySelector("#nextBtn").style.display = "block";
      div.querySelector("#nothing").style.display = "none";
    }
  }
}

document.querySelectorAll(".filtre i").forEach(city => {
  city.addEventListener("click", (e) => {
    e.preventDefault();
    document.querySelector(".profile-imob").classList.add("displayNone");
    document.querySelector(".filter-imob").classList.remove("displayNone");

    const showFilterItems = document.querySelectorAll(".show-filter > *:not(.close)");
    if(showFilterItems != null) {
      showFilterItems.forEach(item => {
        item.remove();
      });
    }


    filterCategories(e.target.parentElement.querySelector("div").innerText);
  })
});
function filterCategories(categorie) {
  effectuerRequeteAjax('../php/filter.php?Cat=' + categorie, 'GET', null, function (response) {
    // Traitement des données reçues
    const showFilter = document.querySelector(".show-filter");
    var info = JSON.parse(response);
    for (let index = 0; index < info.length; index++) {
      const Item = document.createElement("div");
      Item.classList.add("filter-item");
      const itemTop = document.createElement("item-top");
      const carousselImg = document.createElement("div");
      carousselImg.classList.add("caroussel-img");
      const itemImg = document.createElement("img");
      const itemDesc = document.createElement("div");
      itemDesc.classList.add("item-desc");
      const itemTitle = document.createElement("item-title");
      itemTitle.classList.add("item-title");
      const pieces = document.createElement("div");
      pieces.classList.add("pieces");
      const spanPieces = document.createElement("span");
      spanPieces.innerText = "pièces";
      const itemBottom = document.createElement("div");
      itemBottom.classList.add("item-bottom");
      const link = document.createElement("a");
      const voirPlus = document.createElement("div");
      voirPlus.innerText = "voir +";
      link.href = "presentation.php?house=" + info[0][0];
      link.appendChild(voirPlus);


      itemImg.src = "../assets/" + info[index][4];
      carousselImg.appendChild(itemImg);
      itemTop.appendChild(carousselImg);
      itemTitle.innerText = info[index][1];
      itemDesc.appendChild(itemTitle);
      pieces.innerText = info[index][2] + " ";
      pieces.appendChild(spanPieces);
      itemDesc.appendChild(pieces);
      itemTop.appendChild(itemDesc);
      itemBottom.appendChild(link);

      Item.appendChild(itemTop);

      Item.appendChild(itemBottom)
      showFilter.appendChild(Item);

    }
  });
}

document.querySelector(".fa-xmark").addEventListener("click", (e) => {
  // document.querySelector(".close").classList.add("displayNone");

  window.location.reload();
})
//set interval
setInterval(Maison, 6000);
