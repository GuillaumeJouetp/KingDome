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