<?php

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
        if(!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])){
            $Email_Message = "Adresse mail non valide";
            $Validation = false;
        }
        if(Is_Email_Exists($bdd, 'users', $_POST['email'])){
            $Email_Message = "Adresse mail déjà existante";
            $Validation = false;
        }

        // Verifie le mot de passe -> doit comporter au moins 8 caractère, un chiffre et une majuscule
        if(!estUnMotDePasse(htmlspecialchars($_POST['password']))){
            $Alerte_Password = "Alerte_Message";
            $Validation = false;
        }

        // Verifie si le mot de passe et la confirmation sont les mêmes
        if(htmlspecialchars($_POST['password_confirmation']) != htmlspecialchars($_POST['password'])){
            $Password_Confirmation = "Les mots de passe ne sont pas identiques";
            $Validation = false;
        }

        // Verifie le numéro de téléphone
        if(!preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", htmlspecialchars($_POST['tel']))){
            $Tel_Message = "Numéro de téléphone non valide";
            $Validation = false;
        }

        // Tous les champs sont validés ou non
        if($Validation){
            // Bonne creation compte -> creation de la session et redirection vers l'index

            $Data_Inscription = array(
                'prenom' => htmlspecialchars($_POST['first_name']),
                'nom' => htmlspecialchars($_POST['last_name']),
                'civilite' => htmlspecialchars($_POST['civil']),
                'date_naissance' => htmlspecialchars($_POST['date_naissance']),
                'adresse' => htmlspecialchars($_POST['adress']),
                'ville' => htmlspecialchars($_POST['city']),
                'code_postal' => htmlspecialchars($_POST['zip_code']),
                'email' => $_POST['email'],
                'password' => crypterMdp(htmlspecialchars($_POST['password'])),
                'tel' => htmlspecialchars($_POST['tel']));

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

            // Enlever le cryptermdp lorsque mdp seront deja crypter dans base (pas ajoute a la main)
            if(password_verify($_POST['password'], crypterMdp($data['password']))) {

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

