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
            if (isAnAdmin($bdd)){
                $vue = "monCompteAdmin";
                $title = "Mon Compte | Kingdome";
            }
            else {
                // On affiche la vue du compte utilisateur
                $vue = "monCompte";
                $title = $_SESSION['user_firstname'] . ' ' . $_SESSION['user_name'] . " | KingDome";
            }
        }
        else {
            // formulaire pas encore rempli -> on affiche le formulaire
            $vue = "inscription";
            $title = "Connexion / Inscription";
        }
        break;

    case 'modificationInfos' :

        if (!isATel($_POST_SEC['tel'])) {
            $Tel_Message = "Numéro de téléphone non valide";
            $Validation = false;
        }

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
                $Validation = false;
            }

        }

        if($Validation){

            modification($bdd, $_POST_SEC['user_name'], 'user_name', $_SESSION['user_id'], 'users');
            modification($bdd, $_POST_SEC['user_firstname'], 'user_firstname', $_SESSION['user_id'], 'users');
            modification($bdd, $_POST_SEC['adress'], 'adress', $_SESSION['user_id'], 'users');
            modification($bdd, $_POST_SEC['zip_code'], 'zip_code', $_SESSION['user_id'], 'users');
            modification($bdd, $_POST_SEC['city'], 'city', $_SESSION['user_id'], 'users');
            modification($bdd, $_POST_SEC['tel'], 'tel', $_SESSION['user_id'], 'users');

            // Ajoute la date de naissance si elle est renseigné
            if($_POST_SEC['date_naissance'] != ''){
               modification($bdd, $_POST_SEC['birth_date'], 'birth_date', $_SESSION['user_id'], 'users');
            }

            $data=recupereTous($bdd, 'users');

            $_SESSION['user_firstname'] = $data['user_firstname'];
            $_SESSION['user_name'] = $data['user_name'];
            $_SESSION['avatar'] = $data['avatar'];

            session_destroy();
            header('location:index.php?cible=utilisateur');
        }
        break;

    case 'modificationMdp' :

        if(password_verify($_POST_SEC['password'], $_SESSION['password'])) {
            // Verifie le mot de passe -> doit comporter au moins 8 caractère, un chiffre et une majuscule
            if(!isAPassword($_POST_SEC['newmdp1'])){
                $Alerte_Password = "Alerte_Message";
                $Validation = false;
            }

            // Verifie si le mot de passe et la confirmation sont les mêmes
            if($_POST_SEC['password_confirmation'] != $_POST_SEC['newmdp2']){
                $Password_Confirmation = "Les mots de passe ne sont pas identiques";
                $Validation = false;
            }
            modification($bdd, crypterMdp($_POST_SEC['newmdp2']), 'password', $_SESSION['user_id'], users);
        }
        else {

            // Mauvais mot de passe
            $vue = "monCompte";
            $Connexion_Message = "Adresse mail ou mot de passe incorrect";

        }

        header('location: index?cible=monCompte');
        break;

    case 'ajouter':

        $Data_ajoutMaison = array(
            'name_home' => $_POST_SEC['name_home'],
            'adress' => $_POST_SEC['adress'],
            'city' => $_POST_SEC['city'],
            'zip_code' => $_POST_SEC['zip_code']);

        insertion($bdd, $Data_ajoutMaison, 'homes');
        $_SESSION['name_home'] = $Data_ajoutMaison['name_home'];

        $home_id = $bdd->lastInsertId();

        $Data_ownHome = array(
            'house_id' => $home_id,
            'user_id' => $_SESSION['user_id']);
        insertion($bdd, $Data_ownHome, 'own_home');
        $_SESSION['home_id'] = $Data_ownHome['home_id'];

        header('location: index.php?cible=monCompte');
        break;

    case 'deconnexion':
        // On détruit la session utilisateur
        session_destroy();
        header('Location: index.php?cible=utilisateur');
        break;

    case 'addRoom' :

        /*if (empty($name)) {
            $errors = "Veuillez indiquer le nom de la pièce";
            $vue = 'monCompte';
        }
        else { */
        $dataRooms = array();
        $dataRooms['name'] = $_POST['name'];
        $dataRooms['home_id'] = $_POST['home_id'];
        insertion($bdd, $dataRooms, 'rooms');
        header ('location: index.php?cible=monCompte');

        break;

    case 'delHome' :
        $id1 = $_POST_SEC['id1'];
        $req = $bdd->prepare('DELETE FROM rooms WHERE home_id='.$id1);
        $req->execute();
        $req2 = $bdd->prepare('DELETE FROM own_home WHERE house_id='.$id1);
        $req2->execute();
        supprimer($bdd,$id1,'homes');
        header('location: index.php?cible=monCompte');
        break;

    case 'delRoom' :
        supprimer($bdd,$_POST_SEC['id2'],'rooms');
        header('location: index.php?cible=monCompte');
        break;

    default :
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "error404";
        $title = "error404";
}


include "php/views/header.php";
include ('php/views/' . $vue . '.php');
include "php/views/footer.php";