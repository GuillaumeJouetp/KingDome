<?php
/**
 * Created by PhpStorm.
 * User: PC-Adrien
 * Date: 23/04/2018
 * Time: 11:29
 */
session_start();

// si la fonction n'est pas définie ou est vide, on choisit d'afficher la vue par default
if (!isset($_GET['function']) || empty($_GET['function'])) {
    $function = "notdone";
} else {
    $function = $_GET['function'];
}

// Définit le fuseau horaire par défaut à utiliser. Disponible depuis PHP 5.1
date_default_timezone_set('UTC');


switch ($function) {
    case 'notdone':
        if (isUserConnected()){
            // On affiche la vue du compte utilisateur
            $vue = "profil";
            $title = "profil";
        }
        else {
            // formulaire pas encore rempli -> on affiche le formulaire
            $vue = "inscription";
            $title = "notdone";
        }
        break;

    case 'inscription':
        // formulaire inscription rempli -> verification des données

        // Tous les champs sont validés ou non
        if($Validation){
            // Bonne creation compte -> creation de la session et redirection vers l'index

            $Data_Ajout = array(
                'id_maison' => htmlspecialchars($_POST['nom_maison']),
                'type_maison' => htmlspecialchars($_POST['type']),
                'nb_chambre' => htmlspecialchars($_POST['chambre']),
                'nb_sdb' => htmlspecialchars($_POST['bain']),
                'nb_bureau' => htmlspecialchars($_POST['bureau']),
                'nb_cuisine' => htmlspecialchars($_POST['cuisine']),
                'nb_sam' => htmlspecialchars($_POST['manger']),
                'nb_salon' => htmlspecialchars($_POST['salon']),
                'nb_garage' => htmlspecialchars($_POST['garage']),
                'registration_date' => date("Y-m-d H:i:s"),);

            insertion($bdd, $Data_Ajout, 'maison');
            $_SESSION['id_maison'] = $Data_Ajout['id_maison'];
            $_SESSION['type_maison'] = $Data_Ajout['type_maison'];
            $_SESSION['nb_chambre'] = $Data_Ajout['nb_chambre'];
            $_SESSION['nb_sdb'] = $Data_Ajout['nb_sdb'];
            $_SESSION['nb_bureau'] = $Data_Ajout['nb_bureau'];
            $_SESSION['nb_cuisine'] = $Data_Ajout['nb_cuisine'];
            $_SESSION['nb_sam'] = $Data_Ajout['nb_sam'];
            $_SESSION['nb_salon'] = $Data_Ajout['nb_salon'];
            $_SESSION['nb_garage'] = $_POST['nb_garage'];
            $_SESSION['connected'] = true;
            $_SESSION['type'] = getCurrentUserType($bdd);
            header('location: index.php?cible=profil');

        } else {
            $vue = "profil";
            $title = "Ajout_fail";
        }
        break;

    case 'deconnexion':
        // On détruit la session utilisateur
        session_destroy();
        header('Location: index.php?cible=progil');
        break;

    default :
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "error404";
        $title = "error404";
}

include "php/views/header.php";
include ('php/views/' . $vue . '.php');
include "php/views/footer.php";