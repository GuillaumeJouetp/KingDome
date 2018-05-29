<?php
/**
 * Created by PhpStorm.
 * User: PC-Adrien
 * Date: 23/04/2018
 * Time: 11:29
 */

// si la fonction n'est pas définie ou est vide, on choisit d'afficher la vue par default
if (!isset($_GET['function']) || empty($_GET['function'])) {
    $function = "notdone";
} else {
    $function = $_GET['function'];
}

// Définit le fuseau horaire par défaut à utiliser. Disponible depuis PHP 5.1
date_default_timezone_set('UTC');

if (isAnAdmin($bdd)){
    $vue = "monCompteAdmin";
}
else {
    if (isUserConnected()){
        switch ($function) {

            case 'ajouter':

                $Data_ajoutMaison = array(
                    'name_home' => $_POST_SEC['name_home'],
                    'adress' => $_POST_SEC['adress'],
                    'town' => $_POST_SEC['town'],
                    'zip_code' => $_POST_SEC['zip_code'],
                    'country' => $_POST_SEC['country'],
                    'registration_state' => 0,
                    'registration_date' => date("Y-m-d H:i:s"));

                    insertion($bdd, $Data_ajoutMaison, 'homes');
                    $_SESSION['name_home'] = $Data_ajoutMaison['name_home'];
                header('location: index.php');
                break;

            case 'deconnexion':
                // On détruit la session utilisateur
                session_destroy();
                header('Location: index.php?cible=utilisateur');
                break;

            default :
                // si aucune fonction ne correspond au paramètre function passé en GET
                $vue = "error404";
                $title = "error404";
        }
    }
}


include "php/views/header.php";
include ('php/views/' . $vue . '.php');
include "php/views/footer.php";