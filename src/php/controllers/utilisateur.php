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
$CGU_Message = "";
$Avatar_Message = "";


switch ($function) {
    case 'notdone':
        if (isUserConnected()){
            // On affiche la vue du compte utilisateur
            $vue = "monCompte";
            $title = $_SESSION['user_firstname'] . ' ' . $_SESSION['user_name'] . " | KingDome";
        }
        else {
            // formulaire pas encore rempli -> on affiche le formulaire
            $vue = "inscription";
            $title = "Connexion / Inscription";
        }
            break;

    case 'inscription':
        // formulaire inscription rempli -> verification des données

        //Verifie l'email
        if(isAnEmail($_POST_SEC['email'])){
            $Email_Message = "Adresse mail non valide";
            $Validation = false;
        }
        if(Is_Email_Exists($bdd, 'users', $_POST_SEC['email'])){
            $Email_Message = "Adresse mail déjà existante";
            $Validation = false;
        }

        // Verifie le mot de passe -> doit comporter au moins 8 caractère, un chiffre et une majuscule
        if(!isAPassword($_POST_SEC['password'])){
            $Alerte_Password = "Alerte_Message";
            $Validation = false;
        }

        // Verifie si le mot de passe et la confirmation sont les mêmes
        if($_POST_SEC['password_confirmation'] != $_POST_SEC['password']){
            $Password_Confirmation = "Les mots de passe ne sont pas identiques";
            $Validation = false;
        }

        // Verifie le numéro de téléphone
        if(!isATel($_POST_SEC['tel'])){
            $Tel_Message = "Numéro de téléphone non valide";
            $Validation = false;
        }

        // Vérifie l'avatar
        $avatar = null;
        if(isset($_FILES['avatar'])) {

            // Retourne un message si il y a une erreur, sinon rien
            $Avatar_Message = isAnAvatar($_FILES['avatar']['name'], $_FILES['avatar']['size'], $_FILES['avatar']['tmp_name'], $_FILES['avatar']['error']);
            // L'avatar est valide
            if($Avatar_Message == ''){
                // On renomme l'image pour la mettre dans le dossier approprié avec un id unique a la fin pour eviter tout conflit
                $dir = '../res/images/Avatar/';
                $ext = strtolower(pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION));
                $file = $_POST_SEC['first_name'] . '_' . $_POST_SEC['last_name'] . '_' . uniqid().'.'.$ext;
                $avatar = $dir.$file;
                move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar);
            } else {
                $validation = false;
            }

        }

        // Vérifie si les cgu sont cochées
        if(empty($_POST_SEC['cgu'])){
            $CGU_Message = "Vous devez accepter les conditions avant de continuer";
            $Validation = false;
        }


        // Tous les champs sont validés ou non
        if($Validation){
            // Bonne creation compte -> creation de la session et redirection vers l'index

            $Data_Inscription = array(
                'user_firstname' => $_POST_SEC['first_name'],
                'user_name' => $_POST_SEC['last_name'],
                'civility' => $_POST_SEC['civil'],
                'adress' => $_POST_SEC['adress'],
                'city' => $_POST_SEC['city'],
                'zip_code' => $_POST_SEC['zip_code'],
                'email' => $_POST_SEC['email'],
                'password' => crypterMdp($_POST_SEC['password']),
                'tel' => $_POST_SEC['tel'],
                'registration_state' => 0,
                'registration_date' => date("Y-m-d H:i:s"),
                'user_type_id' => 2);

            // Ajoute la date de naissance si elle est renseigné
            if($_POST_SEC['date_naissance'] != ''){
                $Data_Inscription['birth_date'] = $_POST_SEC['date_naissance'];
                $_SESSION['birth_date'] = $Data_Inscription['birth_date'];
            }

            // Ajoute l'avatar si il est renseingé
            if($avatar != null){
                $Data_Inscription['avatar'] = $avatar;
                $_SESSION['avatar'] = $Data_Inscription['avatar'];
            }

            insertion($bdd, $Data_Inscription, 'users');
            $_SESSION['user_firstname'] = $Data_Inscription['user_firstname'];
            $_SESSION['user_name'] = $Data_Inscription['user_name'];
            $_SESSION['adress'] = $Data_Inscription['adress'];
            $_SESSION['city'] = $Data_Inscription['city'];
            $_SESSION['zip_code'] = $Data_Inscription['zip_code'];
            $_SESSION['tel'] = $Data_Inscription['tel'];
            $_SESSION['password'] = $Data_Inscription['password'];
            $_SESSION['email'] = $_POST_SEC['email'];
            $_SESSION['connected'] = true;
            $_SESSION['user_id'] = $Data_Inscription['user_type_id'];
            $_SESSION['type'] = getCurrentUserType($bdd);

            header('location: index.php');

        } else {
            $vue = "inscription";
            $title = "Inscription";
        }
        break;

    case 'connexion':
        // formulaire connexion rempli -> verification des données;

        // Vérifie si l'email existe dans la base
        if(Is_Email_Exists($bdd, 'users', $_POST_SEC['email'])){

            $data = Get_Id($bdd, 'users', $_POST_SEC['email']);

            if(password_verify($_POST_SEC['password'], $data['password'])) {

                // Bonne identifacation -> creation de la session et redirection vers l'index
                $_SESSION['user_firstname'] = $data['user_firstname'];
                $_SESSION['user_name'] = $data['user_name'];
                $_SESSION['password'] = $data['password'];
                $_SESSION['email'] = $_POST_SEC['email'];
                $_SESSION['connected'] = true;
                $_SESSION['user_id'] = $data['id'];
                $_SESSION['type'] = getCurrentUserType($bdd);
                $_SESSION['avatar'] = $data['avatar'];
                header('location: index.php');

            } else {

                // Mauvais mot de passe
                $vue = "inscription";
                $title = "Connexion";
                $Connexion_Message = "Adresse mail ou mot de passe incorrect";

            }

        } else {

            // Adresse inexistante
            $vue = "inscription";
            $title = "Connexion";
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

