// Requetes ajax pour vérification email si déjà utilisé

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

check['newMdp'] = function() {

    var newMdp = document.getElementById('newMdp'),
        tooltipStyle = getTooltip(newMdp).style,
        regex = /(?=.*[0-9])[A-Z]|(?=.*[A-Z])[0-9]/;

    if (newMdp.value.length >= 8 && regex.test(newMdp.value)) {
        newMdp.className = 'correct';
        tooltipStyle.display = 'none';
        return true;
    } else {
        document.getElementById('alert_newMdp').style.color = '#832429';
        newMdp.className = 'incorrect';
        tooltipStyle.display = 'inline-block';
        return false;
    }

};

check['confirmation_newMdp'] = function() {

    var newMdp = document.getElementById('newMdp'),
        confirmation_newMdp = document.getElementById('confirmation_newMdp'),
        tooltipStyle = getTooltip(confirmation_newMdp).style;

    if (newMdp.value === confirmation_newMdp.value && confirmation_newMdp.value !== '') {
        confirmation_newMdp.className = 'correct';
        tooltipStyle.display = 'none';
        return true;
    } else {
        confirmation_newMdp.className = 'incorrect';
        tooltipStyle.display = 'inline-block';
        return false;
    }

};

// Mise en place des événements

(function() { // Utilisation d'une IIFE pour éviter les variables globales.

    var formMDP = document.getElementById('formMDP'),
        inputs = document.querySelectorAll('input[type=password]'),
        inputsLength = inputs.length;

    for (var i = 0; i < inputsLength; i++) {
        inputs[i].addEventListener('keyup', function(e) {
            check[e.target.id](e.target.id); // "e.target" représente l'input actuellement modifié
        });
    }

    formMDP.addEventListener('submit', function(e) {

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

    formMDP.addEventListener('reset', function() {

        for (var i = 0; i < inputsLength; i++) {
            inputs[i].className = '';
        }

        deactivateTooltips();

    });

})();


// Maintenant que tout est initialisé, on peut désactiver les "tooltips"

deactivateTooltips();