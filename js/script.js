// Sélectionne l'élément avec la classe "fa-bars" et le stocke dans la variable menue
var menue = document.querySelector(".fa-bars");

// Sélectionne l'élément avec l'ID "sidebar" et le stocke dans la variable mynav
var mynav = document.getElementById("sidebar");

// Sélectionne tous les boutons de la page et les stocke dans la variable buttons
var buttons = document.querySelectorAll("button");

// Ajoute un écouteur d'événements pour les clics sur la page
document.addEventListener('click', (event) => {
  // Vérifie si l'élément cliqué n'est pas dans mynav et que mynav est affiché en bloc et que l'élément cliqué n'est pas menue
  if (!mynav.contains(event.target) && mynav.style.display === "block" && !menue.contains(event.target)) {
    // Si ces conditions sont remplies, masque mynav et change la couleur de menue en noir
    mynav.style.display = "none";
    menue.style.color = "black";
    mynav.style.transform = "translateX(0%)";
    mynav.style.transition = "transform 0.3s ease 0s";
    if(document.querySelector(".voir")){
      document.querySelector(".voir").style.visibility = "visible";
    }
  }
});

// Ajoute un écouteur d'événements pour les clics sur l'élément menue
menue.addEventListener("click", (e) => {
  e.preventDefault;
  // Vérifie si mynav est masqué
  if (mynav.style.display !== "block") {
    // Si c'est le cas, affiche mynav, change sa transition et sa transformation, et change la couleur de menue en blanc
    mynav.style.display = "block";
    menue.style.color = "white";
    if(document.querySelector(".voir")){
      document.querySelector(".voir").style.visibility = "hidden";
    }
    
  } else {
    // Sinon, masque mynav, change sa transition, sa transformation, sa durée de transition et la couleur de menue en noir
    mynav.style.display = "none";
    menue.style.color = "black";
    if(document.querySelector(".voir")){
      document.querySelector(".voir").style.visibility = "visible";
    }
    
  }
  // // Ajoute un écouteur d'événements pour le défilement de la fenêtre
  // window.addEventListener('scroll', () => {
  //   // Masque mynav, change sa transformation, sa durée de transition, sa visibilité et la couleur de menue en noir
  //   mynav.style.transform = "translateX(100%)";
  //   mynav.style.transitionDuration = "0.8s";
  //   mynav.style.display = "none";
  //   menue.style.color = "black";
  //   if(document.querySelector(".voir")){
  //     document.querySelector(".voir").style.visibility = "visible";
  //   }
  // });
});

// Fonction pour rediriger l'utilisateur vers une page spécifique en fonction de la valeur de a
function redirect(a) {
  if (a === 1) {
    window.location.href = "./pages/immob.php"; // Redirige vers la page immob.php si a vaut 1
  }
};
