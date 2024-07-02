<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/fontawesome/css/all.min.css">
    <style>
        input[type='text'],
        input[type='number'],
        input[type='email'],
        input[type='password'] {
            /* border: 7px solid red; */
        }

        .inputError {
            outline: 1px solid red !important;
            border: 1px solid red !important;
        }

        .inputSucced {
            outline: 1px solid rgb(12, 208, 12) !important;
            border: 1px solid rgb(12, 208, 12) !important;
        }

        .label_up {
            justify-content: flex-start !important;
            font-size: 12px;
        }

        .forms {
            display: flex;
            align-items: center;
            justify-content: center
        }

        .label-grp {
            font-size: 100%;
            display: flex;
            align-items: center;
            gap: .5em;
        }

        .label-grp>i {
            font-size: 50%;
        }

        .title {
            width: 100%;
            height: 10vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        h1 {
            font-size: 150%;
            text-align: center;
            color: #FFC107;
        }

        .first,
        .second,
        .third {
            height: 350px;
            width: 90%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-direction: column;
            box-shadow: 0px 0px 5px 1px rgba(0, 1, 2, .3);
        }

        .contain {
            height: 100%;
            width: 100%;
            display: flex;
            align-items: center;
            /* justify-content: center; */
            flex-direction: column;
            gap: 4%;
        }

        .input-groupe {
            height: 20%;
        }

        .input-groupe input {
            border: none;
            border-bottom: 2px solid black;
            height: 50%;
            font-size: 18px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        .btn-div {
            display: flex;
            justify-content: space-evenly;
            width: 100%;
        }

        button[type="button"] {
            border: none;
            padding: 2% 5%;
        }

        .second {
            animation: shows2 1s linear;
        }

        .third {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 100%;
        }

        h3 {
            text-align: center;
        }

        .display-none {
            display: none !important;
        }

        @keyframes shows2 {
            from {
                transform: translateX(50%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .first * {
            animation: shows1 1s linear;
        }

        @keyframes shows1 {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        span {
            color: #FFC107;
        }
        a {
            text-decoration: none;
        }
        body > a > div {
            padding: 3%;
            background-color: #FFC107;
            width: max-content;
            
        }
        body > a > div:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <a href="immob.php">
        <div>Back Home</div>
    </a>
    <div class="title">
        <h1>Information sur la maison</h1>
    </div>
    <div class="forms">
        <div class="first">
            <h3>Information Personnel</h3>
            <div class="contain">
                <div class="input-groupe">
                    <div class="label-grp">
                        <label for="">Votre nom Complet</label>
                        <i class="fa-solid fa-star-of-life" style="color: #ff0000;"></i>
                    </div>
                    <input type="text" name="nom">
                </div>
                <div class="input-groupe">
                    <div class="label-grp">
                        <label for="">Votre Contact</label>
                        <i class="fa-solid fa-star-of-life" style="color: #ff0000;"></i>
                    </div>
                    <input type="number" name="phone">
                </div>
                <button type="button" class="btn-first">Suivant</button>
            </div>
            <div class="position">
                <span>1</span>/2
            </div>
        </div>
        <div class="second display-none">
            <h3>Information sur la Localisation de la maison</h3>
            <div class="contain">
                <div class="input-groupe">
                    <div class="label-grp">
                        <label for="">Longitude</label>
                        <i class="fa-solid fa-star-of-life" style="color: #ff0000;"></i>
                    </div>
                    <input type="text" name="long">
                </div>
                <div class="input-groupe">
                    <div class="label-grp">
                        <label for="">Latitude</label>
                        <i class="fa-solid fa-star-of-life" style="color: #ff0000;"></i>
                    </div>
                    <input type="text" name="larg">
                </div>
                <div class="btn-div">
                    <button type="button" class="btn-first">Retour</button>
                    <button type="button" class="btn-first">Presenter</button>
                </div>
            </div>
            <div class="position">
                <span>2</span>/2
            </div>
        </div>
        <div class="third display-none">
            <h3>VOTRE REQUETE A BIEN ETE ENREGISTRER</h3>
            <button type="button">Ok</button>
        </div>
        <div class="third display-none">
            <h3 style="color: red;">Une Erreur Est Survenu</h3>
            <button type="button">Ok</button>
        </div>
    </div>
    <script>
        const first = document.querySelector(".first button");
        const seconds = document.querySelectorAll(".second button");
        const third = document.querySelector(".third button");
        const form1 = document.querySelector(".first");
        const form2 = document.querySelector(".second");
        const form3 = document.querySelectorAll(".third");
        first.addEventListener("click", (e) => {
            e.preventDefault();
            if (verified(e.target.parentElement) === true) {
                form2.classList.remove("display-none");
                form1.classList.add("display-none");
            }
        });
        seconds[0].addEventListener("click", (e) => {
            e.preventDefault();
            form2.classList.add("display-none");
            form1.classList.remove("display-none");
        });
        seconds[1].addEventListener("click", (e) => {
            e.preventDefault();
            if (verified(e.target.parentElement.parentElement) === true) {
                const nom = document.querySelectorAll(".first input")[0].value;
                const numero = document.querySelectorAll(".first input")[1].value;
                const longitude = document.querySelectorAll(".second input")[0].value;
                const latitude = document.querySelectorAll(".second input")[1].value;

                effectuerRequeteAjax('../php/ajouterHouse.php?nom=' + nom + '&numero=' + numero + '&longitude=' + longitude + '&latitude=' + latitude, 'GET', null, function (response) {
                    // code...
                    if (response != 0 && response != null) {
                        form3[0].classList.remove("display-none");
                    } else {
                        form3[1].classList.remove("display-none");
                    }
                });

                
                form2.classList.add("display-none");
            }
        });
        third.addEventListener("click", (e) => {
            window.location.reload();
        })
        //Verification de formulaire
        function verified(thems) {
            var inputs = thems.querySelectorAll("input[type='text'],input[type='number'],input[type='email'],input[type='password']");
            inputs.forEach(input => {
                if (!input.classList.contains("inputSucced")) {
                    input.classList.add("inputSucced")
                }
            })
            var verified = "";
            specialChars = /[!"#$%&'()*+,-./:;<=>?@\[\]^_{|}~]/;

            for (let index = 0; index < inputs.length; index++) {
                const input = inputs[index];
                if (input.name == "nom") {
                    if (!/[a-zA-Z]/.test(input.value) || input.value == " " || input.value == "") {
                        input.classList.add("inputError");
                        input.classList.remove("inputSucced");
                        verified = "name";
                        input.focus();
                    }
                } else if (input.name == "long") {
                    if (input.value == " ") {
                        input.classList.add("inputError");
                        input.classList.remove("inputSucced");
                        if (verified == "") {
                            verified = "email";
                            input.focus();
                        }
                    }
                } else if (input.name == "larg") {
                    if (input.value == " ") {
                        input.classList.add("inputError");
                        input.classList.remove("inputSucced");
                        if (verified == "") {
                            verified = "email";
                            input.focus();
                        }
                    }
                } else if (input.name == "email") {
                    if (!/^([a-zA-Z0-9._-]+)@([a-zA-Z0-9.-]+)\.([a-zA-Z]{2,6})$/.test(input.value) || input.value == " ") {
                        input.classList.add("inputError");
                        input.classList.remove("inputSucced");
                        if (verified == "") {
                            verified = "email";
                            input.focus();
                        }
                    }
                } else if (input.name == "password") {
                    if (!/[a-z]/.test(input.value) || !/[A-Z]/.test(input.value) || !/[0-9]/.test(input.value) || !specialChars.test(input.value) || input.value.length < 5) {
                        input.classList.add("inputError");
                        input.classList.remove("inputSucced");
                        if (verified == "") {
                            verified = "password";
                            input.focus();
                        }
                    }
                } else if (input.name == "confirm-password") {
                    if (input.value != document.querySelector("input[name='password'").value || input.value.length < 5) {
                        input.classList.add("inputError");
                        input.classList.remove("inputSucced");
                        if (verified == "") {
                            verified = "password";
                            input.focus();
                        }
                    }
                } else if (input.type == "number") {
                    if (!/^6\d{8}$/.test(input.value) || input.value == " ") {
                        input.classList.add("inputError");
                        input.classList.remove("inputSucced");
                        if (verified == "") {
                            verified = "phone";
                            input.focus();
                        }
                    }
                } else if (input.name == "username") {
                    if (!/[a-z]/.test(input.value) || /[A-Z]/.test(input.value) || input.value == " ") {
                        input.classList.add("inputError");
                        input.classList.remove("inputSucced");
                        if (verified == "") {
                            verified = "name";
                            input.focus();
                        }
                    }
                }
            }
            if (verified != "")
                return false;
            return true;
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
    </script>
</body>

</html>