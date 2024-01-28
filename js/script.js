var menue = document.querySelector(".fa-bars");
var mynav = document.getElementById("sidebar");
var buttons = document.querySelectorAll("button");

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

function redirect(a) {
  if (a === 1) {
    window.location.href = "./immob.html";
  }
};