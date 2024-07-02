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
function insererRervation(option, date, price, houseName, payementMode, houseId) {
    effectuerRequeteAjax('../php/ajouterReservation.php?date=' + date + '&choice=' + option + '&price=' + price + '&houseId=' + houseId + '&payementMode=' + payementMode, 'GET', null, function (response) {

        if (response != 0) {
            let number = "+237697102596"
            const msg = encodeURIComponent('Hello, je viens reserver l\'appartement au nom de *' + houseName + '* et j\'accepte le prix de *' + price + '* FCFA via le mode de paiement suivant: *' + payementMode + '* le *' + date + '*\n\n Numero ID: Reservation'+response);
            const url = "https://wa.me/" + number + "?text=" + msg;
            window.open(url);
            // removeAll();
            // window.location.href = "../ ";
        }else{
            alert("Something went wrong");
        }

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


    // if (!/[a-zA-Z]/.test(nameInput.value) || nameInput.value == " ") {
    //     nameInput.classList.add("isFaild");
    //     nameInput.classList.remove("isSucced");
    //     verified = "name";
    // }
    // if (!/^([a-zA-Z0-9._-]+)@([a-zA-Z0-9.-]+)\.([a-zA-Z]{2,6})$/.test(mailInput.value) || mailInput.value == " ") {
    //     mailInput.classList.add("isFaild");
    //     mailInput.classList.remove("isSucced");
    //     if (verified == "")
    //         verified = "mail"
    // }
    // if (!/^6\d{8}$/.test(telInput.value) || nameInput.value == " ") {
    //     telInput.classList.add("isFaild");
    //     telInput.classList.remove("isSucced");
    //     if (verified == "")
    //         verified = "tel";
    // }
    if (reservationInput.value == "") {
        reservationInput.classList.add("isFaild");
        reservationInput.classList.remove("isSucced");
        if (verified == "")
            verified = "date";
    }

    switch (verified) {
        // case "name":
        //     nameInput.focus();
        //     break;
        // case "mail":
        //     mailInput.focus();
        //     break;
        // case "tel":
        //     telInput.focus();
        //     break;
        case "date":
            reservationInput.focus();
            break;
        case "pay":
            payementMode.focus();
            break;
        default:
            let housePrice = document.querySelector(".informationHouse .price");
            let houseName = document.querySelector(".informationHouse .name");
            let paymentMode = document.getElementById("moyen_paiement");
            let houseId = document.querySelector(".informationHouse .id");
            insererRervation(payementMode.value, reservationInput.value, housePrice.innerText, houseName.innerText, paymentMode.value, houseId.innerText);
            break;
    }
});