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
$Avatar_Message = "";


switch ($function) {
    case 'notdone':
        if (isUserConnected()){
            // On affiche la vue du compte utilisateur
            $vue = "monCompte";
            $title = "Mon compte";
        }
        else {
            // formulaire pas encore rempli -> on affiche le formulaire
            $vue = "inscription";
            $title = "notdone";
        }
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

        // Vérifie l'avatar
        $avatar = null;
        if(isset($_FILES['avatar'])) {

            // Retourne un message si il y a une erreur, sinon rien
            $Avatar_Message = isAnAvatar($_FILES['avatar']['name'], $_FILES['avatar']['size'], $_FILES['avatar']['tmp_name'], $_FILES['avatar']['error']);
            // L'avatar est valide
            // Si marche pas utiliser move_uploaded_file($_FILES['avatar']['tmp_name'])
            if($Avatar_Message == ''){
                $avatar = addslashes(file_get_contents($_FILES['avatar']['tmp_name']));
            } else {
                $validation = false;
            }

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
                'avatar' => $avatar,
                'user_type_id' => 2);

            insertion($bdd, $Data_Inscription, 'users');
            $_SESSION['user_firstname'] = $Data_Inscription['user_firstname'];
            $_SESSION['user_name'] = $Data_Inscription['user_name'];
            $_SESSION['password'] = $Data_Inscription['password'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['connected'] = true;
            $_SESSION['user_id'] = $Data_Inscription['user_type_id'];
            $_SESSION['type'] = getCurrentUserType($bdd);
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
                $_SESSION['user_firstname'] = $data['user_firstname'];
                $_SESSION['user_name'] = $data['user_name'];
                $_SESSION['password'] = $data['password'];
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['connected'] = true;
                $_SESSION['user_id'] = $data['id'];
                $_SESSION['type'] = getCurrentUserType($bdd);
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

    case 'deconnexion':
        // On détruit la session utilisateur
        session_destroy();
        header('Location: index.php?cible=utilisateur');
        break;

    case 'modification':
        // L'utilisateur a modifié son profil

        break;

    default :
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "error404";
        $title = "error404";
}

include "php/views/header.php";
include ('php/views/' . $vue . '.php');
include "php/views/footer.php";

