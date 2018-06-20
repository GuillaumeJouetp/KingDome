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

if (isUserConnected()) {
    if (isAnAdmin($bdd)) {
        switch ($function) {
            case 'notdone' :
                $vue = "monCompteAdmin";
                $title = "Mon Compte | Kingdome";
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
    else {
        switch ($function) {
            case 'notdone' :
                // On affiche la vue du compte utilisateur
                $vue = "monCompte";
                $title = $_SESSION['user_firstname'] . ' ' . $_SESSION['user_name'] . " | KingDome";
                break;

            case 'modificationInfos' :

                if (!isATel($_POST_SEC['tel'])) {
                    $Tel_Message = "Numéro de téléphone non valide";
                    $Validation = false;
                }

                if (isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
                    $tailleMax = 250000;
                    $ext_Valides = array('jpg', 'jpeg', 'gif', 'png');
                    if ($_FILES['avatar']['size'] <= $tailleMax) {
                        $ext_Upload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
                        if (in_array($ext_Upload, $ext_Valides)) {
                            $chemin = '../res/images/Avatar/'.$_SESSION['user_id'].'.'.$ext_Upload;
                            $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
                            if ($resultat) {
                                $updateavatar = $bdd->prepare('UPDATE users SET avatar = :avatar WHERE id = :id');
                                $updateavatar->execute(array(
                                    'avatar' => $_SESSION['user_id'].".".$ext_Upload,
                                    'id' => $_SESSION['user_id']));
                            }
                            else {
                                $msg = "Erreur durant l'importation de la photo";
                                $Validation = false;
                            }
                        }
                        else {
                            $msg = "Votre photo doit être au format jpg, jpeg, gif, png";
                            $Validation = false;
                        }
                    }
                    else {
                        $msg = "Votre photo ne doit pas dépasser 2Mo";
                        $Validation = false;
                    }
                }

                if ($Validation) {

                    modification($bdd, $_POST_SEC['user_name'], 'user_name', $_SESSION['user_id'], 'users');
                    modification($bdd, $_POST_SEC['user_firstname'], 'user_firstname', $_SESSION['user_id'], 'users');
                    modification($bdd, $_POST_SEC['adress'], 'adress', $_SESSION['user_id'], 'users');
                    modification($bdd, $_POST_SEC['zip_code'], 'zip_code', $_SESSION['user_id'], 'users');
                    modification($bdd, $_POST_SEC['city'], 'city', $_SESSION['user_id'], 'users');
                    modification($bdd, $_POST_SEC['tel'], 'tel', $_SESSION['user_id'], 'users');

                    session_destroy();
                    header('location:index.php?cible=utilisateur');
                } else {
                    $vue = "modif_profil";
                }
                break;

            case 'modificationMdp' :

                if (password_verify($_POST_SEC['password'], $_SESSION['password'])) {
                    // Verifie le mot de passe -> doit comporter au moins 8 caractère, un chiffre et une majuscule
                    if (!isAPassword($_POST_SEC['newmdp'])) {
                        $Alerte_Password = "Alerte_Message";
                        $Validation = false;
                        $vue = "modif_profil";
                    }

                    // Verifie si le mot de passe et la confirmation sont les mêmes
                    if ($_POST_SEC['confirmation_newmdp'] != $_POST_SEC['newmdp']) {
                        $Password_Confirmation = "Les mots de passe ne sont pas identiques";
                        $Validation = false;
                    }
                    if ($Validation == true) {
                        modification($bdd, crypterMdp($_POST_SEC['newmdp']), 'password', $_SESSION['user_id'], 'users');
                        session_destroy();
                        header('location: index.php?cible=utilisateur');
                    }
                    else {
                        $vue = "modif_profil";
                    }
                } else {

                    // Mauvais mot de passe
                    $vue = "modif_profil";
                    $Connexion_Message = "Mot de passe incorrect";

                }
                break;

            case 'modificationMail':

                // Vérifie si l'email existe dans la base
                if(Is_Email_Exists($bdd, 'users', $_POST_SEC['email'])){
                    //Verifie l'email
                    if(isAnEmail($_POST_SEC['newMail'])){
                        $Email_Message = "Adresse mail non valide";
                        $Validation = false;
                    }
                    if(Is_Email_Exists($bdd, 'users', $_POST_SEC['newMail'])){
                        $Email_Message = "Adresse mail déjà existante";
                        $Validation = false;
                    }
                    if ($Validation == true) {
                        modification($bdd, $_POST_SEC['newMail'], 'email', $_SESSION['user_id'], 'users');
                        session_destroy();
                        header('location: index.php?cible=utilisateur');
                    }

                } else {

                    // Adresse inexistante
                    $vue = "modif_profil";
                    $Connexion_Message = "Adresse mail incorrecte";

                }

                break;

            case 'ajouter':

                $Data_ajoutMaison = array(
                    'name_home' => $_POST_SEC['name_home'],
                    'superficie' => $_POST_SEC['superficie'],
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
                header('location: index.php?cible=monCompte');

                break;

            case 'delHome' :
                $id1 = $_POST_SEC['id1'];
                $req = $bdd->prepare('DELETE FROM rooms WHERE home_id=' . $id1);
                $req->execute();
                $req2 = $bdd->prepare('DELETE FROM own_home WHERE house_id=' . $id1);
                $req2->execute();
                supprimer($bdd, $id1, 'homes');
                header('location: index.php?cible=monCompte');
                break;

            case 'delRoom' :
                supprimer($bdd, $_POST_SEC['id2'], 'rooms');
                header('location: index.php?cible=monCompte');
                break;

            default :
                // si aucune fonction ne correspond au paramètre function passé en GET
                $vue = "error404";
                $title = "error404";
        }
    }
}
else {
    // formulaire pas encore rempli -> on affiche le formulaire
    $vue = "inscription";
    $title = "Connexion / Inscription";
}


include "php/views/header.php";
include ('php/views/' . $vue . '.php');
include "php/views/footer.php";