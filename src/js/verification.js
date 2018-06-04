// Verification spéciale pour l'adresse automatiquement complétée

var good_adress = false,
    good_date = true,
    good_avatar = true;

function verifAdress() {

    var adress = document.getElementById('autocomplete'),
        tooltipStyle = getTooltip(adress).style,
        zip_code = document.getElementById('postal_code'),
        city = document.getElementById('locality');

    if (zip_code.value === "" || city.value === "") {
        adress.className = 'incorrect';
        zip_code.className = 'incorrect';
        city.className = 'incorrect';
        tooltipStyle.display = 'inline-block';
        good_adress = false;
    } else {
        adress.className = 'correct';
        zip_code.className = 'correct';
        city.className = 'correct';
        tooltipStyle.display = 'none';
        good_adress = true;
    }
}

function verifDate(){
    var date = document.getElementById('date'),
        tooltipStyle = document.getElementById('date_tooltip').style,
        date_split = date.value.split('-', 3);
    if(date_split[0] <= 1877 || date_split[0] >= 2016){
        date.className = 'button_incorrect';
        tooltipStyle.display = 'inline-block';
        good_date = false;
    } else {
        date.className = 'button_correct';
        tooltipStyle.display = 'none';
        good_date = true;
    }
}

function verifAvatar() {
    var avatar = document.getElementById('the_avatar'),
        tooltipStyle = document.getElementById('avatar_tooltip').style,
        avatar_btn = document.getElementById('myBtn'),
        regex = /.(gif|jpg|jpeg|png)$/i;
    if (regex.test(avatar.value)){
        avatar_btn.className = 'button_correct';
        tooltipStyle.display = 'none';
        avatar_btn.innerHTML = "Avatar bien ajouté!";
        good_date = true;
    } else {
        avatar_btn.className = 'button_incorrect';
        tooltipStyle.display = 'inline-block';
        avatar_btn.innerHTML = "Avatar non ajouté...";
        good_avatar = false;
    }
}

// Fonction de désactivation de l'affichage des "tooltips"
function deactivateTooltips() {

    var tooltips = document.querySelectorAll('.tooltip'),
        tooltipsLength = tooltips.length;

    for (var i = 0; i < tooltipsLength; i++) {
        tooltips[i].style.display = 'none';
    }

}


// La fonction ci-dessous permet de récupérer la "tooltip" qui correspond à notre input

function getTooltip(elements) {
    while (elements = elements.nextSibling) {
        if (elements.className === "tooltip") {
            return elements;
        }
    }
    return false;

}


// Fonctions de vérification du formulaire, elles renvoient "true" si tout est ok

var check = {}; // On met toutes nos fonctions dans un objet littéral

check['email'] = function() {

    var email = document.getElementById('email'),
        tooltipStyle = getTooltip(email).style,
        regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;

    if (regex.test(email.value)) {
        email.className = 'correct';
        tooltipStyle.display = 'none';
        return true;
    } else {
        email.className = 'incorrect';
        tooltipStyle.display = 'inline-block';
        return false;
    }

};

check['pwd1'] = function() {

    var pwd1 = document.getElementById('pwd1'),
        tooltipStyle = getTooltip(pwd1).style,
        regex = /(?=.*[0-9])[A-Z]|(?=.*[A-Z])[0-9]/;

    if (pwd1.value.length >= 8 && regex.test(pwd1.value)) {
        pwd1.className = 'correct';
        tooltipStyle.display = 'none';
        return true;
    } else {
        document.getElementById('alert_pwd1').style.color = '#832429';
        pwd1.className = 'incorrect';
        tooltipStyle.display = 'inline-block';
        return false;
    }

};

check['pwd2'] = function() {

    var pwd1 = document.getElementById('pwd1'),
        pwd2 = document.getElementById('pwd2'),
        tooltipStyle = getTooltip(pwd2).style;

    if (pwd1.value === pwd2.value && pwd2.value !== '') {
        pwd2.className = 'correct';
        tooltipStyle.display = 'none';
        return true;
    } else {
        pwd2.className = 'incorrect';
        tooltipStyle.display = 'inline-block';
        return false;
    }

};

check['civil'] = function() {

    var sex = document.getElementsByName('civil'),
        tooltipStyle = getTooltip(sex[1].parentNode).style;

    if (sex[0].checked || sex[1].checked) {
        tooltipStyle.display = 'none';
        return true;
    } else {
        tooltipStyle.display = 'inline-block';
        return false;
    }

};

check['lastName'] = function(id) {

    var name = document.getElementById(id),
        tooltipStyle = getTooltip(name).style,
        regex = /[0-9]/;

    if (name.value.length >= 2 && !regex.test(name.value)) {
        name.className = 'correct';
        tooltipStyle.display = 'none';
        return true;
    } else {
        name.className = 'incorrect';
        tooltipStyle.display = 'inline-block';
        return false;
    }

};

check['autocomplete'] = good_adress;

check['firstName'] = check['lastName']; // La fonction pour le prénom est la même que celle du nom

check['tel'] = function() {

    var tel = document.getElementById('tel'),
        tooltipStyle = getTooltip(tel).style,
        regex = /^0[1-68]([-. ]?[0-9]{2}){4}$/;

    if (regex.test(tel.value)) {
        tel.className = 'correct';
        tooltipStyle.display = 'none';
        return true;
    } else {
        tel.className = 'incorrect';
        tooltipStyle.display = 'inline-block';
        return false;
    }

};

check['date'] = good_date;

check['date'] = good_avatar;


// Mise en place des événements

(function() { // Utilisation d'une IIFE pour éviter les variables globales.

    var myForm = document.getElementById('myForm'),
        inputs = document.querySelectorAll('input[type=email], input[type=text], input[type=password], input[type=tel], input[type=radio]'),
        inputsLength = inputs.length;

    for (var i = 0; i < inputsLength; i++) {
        inputs[i].addEventListener('keyup', function(e) {
            check[e.target.id](e.target.id); // "e.target" représente l'input actuellement modifié
        });
    }

    myForm.addEventListener('submit', function(e) {

        var result = true;

        for (var i in check) {
            result = check[i](i) && result;
        }

        if (result) {
            e.submit();
        } else {
            alert('Le formulaire est mal rempli.');
        }

        e.preventDefault();

    });

    myForm.addEventListener('reset', function() {

        for (var i = 0; i < inputsLength; i++) {
            inputs[i].className = '';
        }

        deactivateTooltips();

    });

})();


// Maintenant que tout est initialisé, on peut désactiver les "tooltips"

deactivateTooltips();