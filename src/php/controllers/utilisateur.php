<?php

// Définit le fuseau horaire par défaut à utiliser. Disponible depuis PHP 5.1
date_default_timezone_set('UTC');

// Si l'utilisateur n'a rien fait, on affiche la vue par default
if (!isset($_GET['function']) || empty($_GET['function'])) {
    $function = "notdone";
} else {
    // L'utilisateur a soit rempli le formulaire d'inscription, soit de connexion
    $function = $_GET['function'];
}

$Connexion_Message = "";
$Email_Message = "";
$Validation = true;
$Password_Confirmation = "";
$Alerte_Password = "";
$Tel_Message = "";

switch ($function) {
    case 'notdone':
        // formulaire pas encore rempli -> on affiche le formulaire
        $vue = "inscription";
        $title = "notdone";
        break;

    case 'inscription':
        // formulaire inscription rempli -> verification des données

        //Verifie l'email
        $_POST['email'] = htmlspecialchars($_POST['email']);
        if(isAnEmail($_POST['email'])){
            $Email_Message = "Adresse mail non valide";
            $Validation = false;
        }
        if(Is_Email_Exists($bdd, 'users', $_POST['email'])){
            $Email_Message = "Adresse mail déjà existante";
            $Validation = false;
        }

        // Verifie le mot de passe -> doit comporter au moins 8 caractère, un chiffre et une majuscule
        if(!isAPassword(htmlspecialchars($_POST['password']))){
            $Alerte_Password = "Alerte_Message";
            $Validation = false;
        }

        // Verifie si le mot de passe et la confirmation sont les mêmes
        if(htmlspecialchars($_POST['password_confirmation']) != htmlspecialchars($_POST['password'])){
            $Password_Confirmation = "Les mots de passe ne sont pas identiques";
            $Validation = false;
        }

        // Verifie le numéro de téléphone
        if(!isATel(htmlspecialchars($_POST['tel']))){
            $Tel_Message = "Numéro de téléphone non valide";
            $Validation = false;
        }

        // Tous les champs sont validés ou non
        if($Validation){
            // Bonne creation compte -> creation de la session et redirection vers l'index

            $Data_Inscription = array(
                'user_firstname' => htmlspecialchars($_POST['first_name']),
                'user_name' => htmlspecialchars($_POST['last_name']),
                'civility' => htmlspecialchars($_POST['civil']),
                'birth_date' => htmlspecialchars($_POST['date_naissance']),
                'adress' => htmlspecialchars($_POST['adress']),
                'city' => htmlspecialchars($_POST['city']),
                'zip_code' => htmlspecialchars($_POST['zip_code']),
                'email' => $_POST['email'],
                'password' => crypterMdp(htmlspecialchars($_POST['password'])),
                'tel' => htmlspecialchars($_POST['tel']),
                'registration_state' => 0,
                'registration_date' => date("Y-m-d H:i:s"),
                'user_type_id' => 2);

            insertion($bdd, $Data_Inscription, 'users');
            session_start();
            $_SESSION['prénom'] = $Data_Inscription['prénom'];
            $_SESSION['nom'] = $Data_Inscription['nom'];
            $_SESSION['password'] = $Data_Inscription['password'];
            $_SESSION['email'] = $_POST['email'];
            header('location: index.php');

        } else {
            $vue = "inscription";
            $title = "insciption_fail";
        }
        break;

    case 'connexion':
        // formulaire connexion rempli -> verification des données;

        // Vérifie si l'email existe dans la base
        $_POST['email'] = htmlspecialchars($_POST['email']);
        $_POST['password'] = htmlspecialchars($_POST['password']);
        if(Is_Email_Exists($bdd, 'users', $_POST['email'])){

            $data = Get_Id($bdd, 'users', $_POST['email']);

            if(password_verify($_POST['password'], $data['password'])) {

                // Bonne identifacation -> creation de la session et redirection vers l'index
                session_start();
                $_SESSION['prenom'] = $data['prenom'];
                $_SESSION['nom'] = $data['nom'];
                $_SESSION['password'] = $data['password'];
                $_SESSION['email'] = $_POST['email'];
                header('location: index.php');

            } else {

                // Mauvais mot de passe
                $vue = "inscription";
                $title = "connexion_fail";
                $Connexion_Message = "Adresse mail ou mot de passe incorrect";

            }

        } else {

            // Adresse inexistante
            $vue = "inscription";
            $title = "connexion_fail";
            $Connexion_Message = "Adresse mail ou mot de passe incorrect";

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

