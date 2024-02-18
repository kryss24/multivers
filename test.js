function confirmation() {
  // Afficher la boîte de confirmation
  document.getElementById("confirmation").classList.remove("hidden");
  document.getElementById("confirmation").style.display = "block";

  // Empêcher la soumission du formulaire
  return false;
}

function redirection() {
  // Rediriger vers une autre page
  window.location.href = "autre_page.html";
}
