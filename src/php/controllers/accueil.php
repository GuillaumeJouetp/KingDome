<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

<?php
// si la fonction n'est pas définie ou est vide, on choisit d'afficher la vue par default
if (!isset($_GET['function']) || empty($_GET['function'])) {
    $function = "default";
} else {
    $function = $_GET['function'];
}

$title = 'Accueil';

switch ($function) {
    case 'default':
        if(isAnAdmin($bdd)) {
            $vue = "accueilAdmin";
        }
        else if (isUserConnected()) {
            $vue = "accueilUser";
        }
        else{
            $vue = "accueil";
        }
        break;

        default :
            // si aucune fonction ne correspond au paramètre function passé en GET
            $vue = "error404";
            $title = "error404";
}

include "php/views/header.php";
include ('php/views/' . $vue . '.php');
include "php/views/footer.php";
?>