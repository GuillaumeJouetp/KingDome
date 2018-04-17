<?php

// si la fonction n'est pas définie ou est vide, on choisit d'afficher la vue par default
if (!isset($_GET['function']) || empty($_GET['function'])) {
    $function = "notdone";
} else {
    $function = $_GET['function'];
}

switch ($function) {
    case 'notdone':
        //cas ou le formulaire n'est pas encore rempli, On affiche le formulaire
        $vue = "contact";
        $title = "notdone";
        $message = "";
        break;


    case 'done':
        //Cas ou le formulaire est rempli, On affiche que le formulaire a bien été envoyé
        $vue = "contact";
        $title = "done";
        $message = "Votre message a bien été envoyé";
        //insertion($bdd,$_POST,'infos'); à decommenter quand j'aurais finis de creer la bdd
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

<?php


?>