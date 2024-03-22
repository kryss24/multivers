document.querySelector(".fa-home").addEventListener("click", (e) => {
    // window.history.back();
    e.preventDefault;
    window.location.href = "../pages/immob.php";
});

document.querySelector(".profile-image").addEventListener("click", () => {
    window.location.href = "chooseProfile.php";
});

document.querySelectorAll(".card").forEach(element => {
    element.addEventListener("click", (e) =>{
        e.preventDefault
        const element = e.target.parentElement;
        element.querySelector(".form-card").style.display = "flex";
    })
});

document.querySelectorAll("input[value='Cancel']").forEach(element => {
    element.addEventListener("click", (e) => {
        e.preventDefault
        const element = e.target.parentElement.parentElement;
        element.style.display = "none";
    })
});

window.addEventListener("load", function() {
    const loadingBar = document.getElementById("loading-bar");
    loadingBar.style.display = "none";
  });
  
  // Affichage de la barre de chargement pendant le chargement de la page
  window.addEventListener("DOMContentLoaded", function() {
    const loadingBar = document.getElementById("loading-bar");
    loadingBar.style.display = "block";
  });