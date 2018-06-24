// Requetes ajax pour vérification email si déjà utilisé

function verifEmail(str)
{
    if (str == "")
    {
        document.getElementById("txtHint").innerHTML = "";
        return;
    }
    if (window.XMLHttpRequest) {
        xmlhttp= new XMLHttpRequest();
    } else {
        if (window.ActiveXObject)
            try {
                xmlhttp= new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {
                    return null;
                }
            }
    }

    xmlhttp.onreadystatechange = function ()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "php/models/ajax_verifemail.php?email=" + str, true);
    xmlhttp.send();
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

check['newMail'] = function() {

    var newMail = document.getElementById('newMail'),
        tooltipStyle = getTooltip(newMail).style,
        regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;

    if (regex.test(newMail.value)) {
        newMail.className = 'correct';
        tooltipStyle.display = 'none';
        return true;
    } else {
        newMail.className = 'incorrect';
        tooltipStyle.display = 'inline-block';
        return false;
    }

};

// Mise en place des événements

(function() { // Utilisation d'une IIFE pour éviter les variables globales.

    var formMail = document.getElementById('formMail');
        inputs = document.querySelectorAll('input[type=email]'),
        inputsLength = inputs.length;

    for (var i = 0; i < inputsLength; i++) {
        inputs[i].addEventListener('keyup', function(e) {
            check[e.target.id](e.target.id); // "e.target" représente l'input actuellement modifié
        });
    }

    formMail.addEventListener('submit', function(e) {

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