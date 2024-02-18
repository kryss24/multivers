var selectWidth = 0;
function afficherOptions(selectElement) {
    // Ouvrir la liste d'options
    document.querySelector('.fa-chevron-down').style.display = "none";
    selectElement.classList.add('active');
    selectWidth = selectElement.size;
    selectElement.size = selectElement.options.length;
}
// Fermer la liste d'options lorsqu'on clique en dehors de la zone
document.addEventListener('click', function (event) {
    var selectElement = document.querySelector('select');
    if (!selectElement.contains(event.target) && selectElement.class == "active") {
        selectElement.classList.remove('active');
        document.querySelector('.fa-chevron-down').style.display = "block";
    }
});

document.querySelector('select').addEventListener('change', function (e) {
    var selectElement = e.target;
    this.blur();
    selectElement.size = selectWidth;
    document.querySelector('.fa-chevron-down').style.display = "block";
    selectElement.classList.remove('active');
});
// Définir la fonction sur l'icône FontAwesome
const iconElement = document.querySelector('.fa-chevron-down');
iconElement.addEventListener('click', function () {
    afficherOptions(document.querySelector('select'));
});




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
function insererRervation(name,mail,number,date,option) {
    effectuerRequeteAjax('../php/ajouterReservation.php?name='+ name +'&mail='+ mail +'&tel='+ number +'&date='+ date +'&choice='+ option, 'GET', null, function (response) {
        // Traitement des données reçues
        donnees = JSON.parse(response);
        var nombreAleatoire = Math.floor(Math.random() * (donnees.length - 0));
        document.getElementById("reservez").setAttribute("onclick", "reserver(" + donnees[nombreAleatoire][0] + ")")
        document.getElementsByClassName("profile-imob")[0].style.backgroundImage = "url('../assets/" + donnees[nombreAleatoire][4] + "'  )";
        document.querySelector(".immob-title .title").innerText = "" + donnees[nombreAleatoire][1]
        document.querySelector(".immob-title p").innerHTML = donnees[nombreAleatoire][3] + "<span> Fcfa</span>"
        document.querySelectorAll(".subs-title-item div")[1].innerText = donnees[nombreAleatoire][2] + " Pieces"
        document.querySelector(".description-content").innerText = donnees[nombreAleatoire][5]
        effectuerRequeteAjax('../php/pieces.php?id=' + donnees[nombreAleatoire][0], 'GET', null, function (response) {
            // Traitement des données reçues
            images = JSON.parse(response);
            document.querySelectorAll('.voir .carousel-item').forEach(element => {
                element.remove()
            });
            addImage(images);
            images_lenght = images.length
        });

    });
}

//Gerer la validation du formulaire
document.querySelector("form button").addEventListener("click", (e) => {
    const nameInput = document.querySelector("input[name='nom']");
    const mailInput = document.querySelector("input[name='email']");
    const telInput = document.querySelector("input[name='tel']");
    const reservationInput = document.querySelector("input[name='date_reservation']");
    const payementMode = document.querySelector("select[name='moyen_paiement']");
    var verified = "";


    document.querySelectorAll("form input").forEach(element => {
        element.classList.remove("isFaild");
        element.classList.add("isSucced");
    });


    if (/[^a-zA-Z\s]/.test(nameInput.value) || nameInput.value == " ") {
        nameInput.classList.add("isFaild");
        nameInput.classList.remove("isSucced");
        verified = "name";
    }
    if (!/^([a-zA-Z0-9._-]+)@([a-zA-Z0-9.-]+)\.([a-zA-Z]{2,6})$/.test(mailInput.value) || mailInput.value == " ") {
        mailInput.classList.add("isFaild");
        mailInput.classList.remove("isSucced");
        if (verified == "")
            verified = "mail"
    }
    if (!/^6\d{8}$/.test(telInput.value) || nameInput.value == " ") {
        telInput.classList.add("isFaild");
        telInput.classList.remove("isSucced");
        if (verified == "")
            verified = "tel";
    }

    switch (verified) {
        case "name":
            nameInput.focus();
            break;
        case "mail":
            mailInput.focus();
            break;
        case "tel":
            telInput.focus();
            break;
        case "date":
            reservationInput.focus();
            break;
        case "pay":
            payementMode.focus();
            break;
        default:
            insererRervation(nameInput.value,mailInput.value,telInput.value,reservationInput.value,payementMode.value)
            break;
    }
});