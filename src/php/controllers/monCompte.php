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
$ValidationMdp = true;
$ValidationMail = true;
$validationAvatar = true;
$Password_Confirmation = "";
$Alerte_Password = "";
$Tel_Message = "";
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

            case 'modifInfos' :

                if (isset($_POST_SEC['newUser_name']) and !empty($_POST_SEC['newUser_name']) and $_POST_SEC['newUser_name'] != $_SESSION['user_name']) {
                    modification($bdd, $_POST_SEC['newUser_name'], 'user_name', $_SESSION['user_id'],'users');
                    $data = Update_User_Data($bdd, 'users', $_SESSION['user_id']);
                    $_SESSION['user_name'] = $data['user_name'];
                    header('Location: index.php?cible=monCompteAdmin');
                }

                if (isset($_POST_SEC['newUser_firstname']) and !empty($_POST_SEC['newUser_firstname']) and $_POST_SEC['newUser_firstname'] != $_SESSION['user_firstname']) {
                    modification($bdd, $_POST_SEC['newUser_firstname'], 'user_firstname', $_SESSION['user_id'],'users');
                    $data = Update_User_Data($bdd, 'users', $_SESSION['user_id']);
                    $_SESSION['user_firstname'] = $data['user_firstname'];
                    header('Location: index.php?cible=monCompteAdmin');
                }

                if (isset($_POST_SEC['newAdress']) and !empty($_POST_SEC['newAdress']) and $_POST_SEC['newAdress'] != $_SESSION['adress']) {
                    modification($bdd, $_POST_SEC['newAdress'], 'adress', $_SESSION['user_id'],'users');
                    modification($bdd, $_POST_SEC['newCity'], 'city', $_SESSION['user_id'],'users');
                    modification($bdd, $_POST_SEC['newZip_code'], 'zip_code', $_SESSION['user_id'],'users');
                    $data = Update_User_Data($bdd, 'users', $_SESSION['user_id']);
                    $_SESSION['adress'] = $data['adress'];
                    $_SESSION['city'] = $data['city'];
                    $_SESSION['zip_code'] = $data['zip_code'];
                    header('Location: index.php?cible=monCompteAdmin');
                }

                if (isset($_POST_SEC['newTel']) and !empty($_POST_SEC['newTel']) and $_POST_SEC['newTel'] != $_SESSION['tel']) {
                    modification($bdd, $_POST_SEC['newTel'], 'user_name', $_SESSION['user_id'],'users');
                    $data = Update_User_Data($bdd, 'users', $_SESSION['user_id']);
                    $_SESSION['tel'] = $data['tel'];
                    header('Location: index.php?cible=monCompteAdmin');
                }

                $vue = "modif_profil";
                break;

            case 'modifAvatar' :

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
                        $file = $_SESSION['user_firstname'] . '_' . $_SESSION['user_name'] . '_' . uniqid().'.'.$ext;
                        $avatar = $dir.$file;
                        move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar);
                    } else {
                        $validationAvatar = false;
                    }

                }

                if (isset($_POST_SEC['Supprimer'])) {
                    $_SESSION['avatar'] = $avatar;
                    $req-> execute(array('avatar' => $_SESSION['avatar'], 'id' => $_SESSION['user_id']));
                    header('Location: index.php?cible=monCompteAdmin');
                } elseif ($validationAvatar and isset($_POST_SEC['Valider'])) {
                    $_SESSION['avatar'] = $avatar;
                    $req-> execute(array('avatar' => $_SESSION['avatar'], 'id' => $_SESSION['user_id']));
                    header('Location: index.php?cible=monCompteAdmin');
                } else {
                    $vue = "modif_profil";
                }

                header('Location: index.php?cible=monCompte');
                break;

            case 'modifMdp' :

                $data = Update_User_Data($bdd, 'users', $_SESSION['user_id']);

                if (password_verify($_POST_SEC['password'], $data['password'])) {
                    // Verifie le mot de passe -> doit comporter au moins 8 caractère, un chiffre et une majuscule
                    if (!isAPassword($_POST_SEC['newMdp'])) {
                        $Alerte_Password = "Alerte_Message";
                        $ValidationMdp = false;
                        $vue = "modif_profil";
                    }

                    // Verifie si le mot de passe et la confirmation sont les mêmes
                    if ($_POST_SEC['confirmation_newMdp'] != $_POST_SEC['newMdp']) {
                        $Password_Confirmation = "Les mots de passe ne sont pas identiques";
                        $ValidationMdp = false;
                    }

                    if ($ValidationMdp) {
                        modification($bdd, crypterMdp($_POST_SEC['newMdp']), 'password', $_SESSION['user_id'], 'users');
                        $data = Update_User_Data($bdd, 'users', $_SESSION['user_id']);
                        $_SESSION['password'] = $data['password'];
                        header('Location: index.php?cible=monCompteAdmin');
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

            case 'modifMail':

                // Vérifie si l'email existe dans la base
                if(Is_Email_Exists($bdd, 'users', $_POST_SEC['email'])){
                    //Verifie l'email
                    if(isAnEmail($_POST_SEC['newMail'])){
                        $Email_Message = "Adresse mail non valide";
                        $ValidationMail = false;
                    }
                    if(Is_Email_Exists($bdd, 'users', $_POST_SEC['newMail'])){
                        $Email_Message = "Adresse mail déjà existante";
                        $ValidationMail = false;
                    }
                    if ($ValidationMail == true) {
                        modification($bdd, $_POST_SEC['newMail'], 'email', $_SESSION['user_id'], 'users');
                        $data = Update_User_Data($bdd, 'users', $_SESSION['user_id']);
                        $_SESSION['email'] = $data['email'];
                        header('Location: index.php?cible=monCompteAdmin');
                    } else {
                        $vue = "modif_profil";
                    }

                } else {

                    // Adresse inexistante
                    $vue = "modif_profil";
                    $Connexion_Message = "Adresse mail incorrecte";

                }

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

            case 'modifInfos' :

                if (isset($_POST_SEC['newUser_name']) and !empty($_POST_SEC['newUser_name']) and $_POST_SEC['newUser_name'] != $_SESSION['user_name']) {
                    modification($bdd, $_POST_SEC['newUser_name'], 'user_name', $_SESSION['user_id'],'users');
                    $data = Update_User_Data($bdd, 'users', $_SESSION['user_id']);
                    $_SESSION['user_name'] = $data['user_name'];
                    header('Location: index.php?cible=monCompte');
                }

                if (isset($_POST_SEC['newUser_firstname']) and !empty($_POST_SEC['newUser_firstname']) and $_POST_SEC['newUser_firstname'] != $_SESSION['user_firstname']) {
                    modification($bdd, $_POST_SEC['newUser_firstname'], 'user_firstname', $_SESSION['user_id'],'users');
                    $data = Update_User_Data($bdd, 'users', $_SESSION['user_id']);
                    $_SESSION['user_firstname'] = $data['user_firstname'];
                    header('Location: index.php?cible=monCompte');
                }

                if (isset($_POST_SEC['newAdress']) and !empty($_POST_SEC['newAdress']) and $_POST_SEC['newAdress'] != $_SESSION['adress']) {
                    modification($bdd, $_POST_SEC['newAdress'], 'adress', $_SESSION['user_id'],'users');
                    modification($bdd, $_POST_SEC['newCity'], 'city', $_SESSION['user_id'],'users');
                    modification($bdd, $_POST_SEC['newZip_code'], 'zip_code', $_SESSION['user_id'],'users');
                    $data = Update_User_Data($bdd, 'users', $_SESSION['user_id']);
                    $_SESSION['adress'] = $data['adress'];
                    $_SESSION['city'] = $data['city'];
                    $_SESSION['zip_code'] = $data['zip_code'];
                    header('Location: index.php?cible=monCompte');
                }

                if (isset($_POST_SEC['newTel']) and !empty($_POST_SEC['newTel']) and $_POST_SEC['newTel'] != $_SESSION['tel']) {
                    modification($bdd, $_POST_SEC['newTel'], 'user_name', $_SESSION['user_id'],'users');
                    $data = Update_User_Data($bdd, 'users', $_SESSION['user_id']);
                    $_SESSION['tel'] = $data['tel'];
                    header('Location: index.php?cible=monCompte');
                }

                $vue = "modif_profil";
                break;

            case 'modifAvatar' :

                $req = $bdd->prepare('UPDATE users SET avatar= :avatar WHERE id = :id');

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
                        $file = $_SESSION['user_firstname'] . '_' . $_SESSION['user_name'] . '_' . uniqid().'.'.$ext;
                        $avatar = $dir.$file;
                        move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar);
                    } else {
                        $validationAvatar = false;
                    }

                }

                if (isset($_POST_SEC['Supprimer'])) {
                    $_SESSION['avatar'] = $avatar;
                    $req-> execute(array('avatar' => $_SESSION['avatar'], 'id' => $_SESSION['user_id']));
                    header('Location: index.php?cible=monCompte');
                } elseif ($validationAvatar and isset($_POST_SEC['Valider'])) {
                    $_SESSION['avatar'] = $avatar;
                    $req-> execute(array('avatar' => $_SESSION['avatar'], 'id' => $_SESSION['user_id']));
                    header('Location: index.php?cible=monCompte');
                } else {
                    $vue = "modif_profil";
                }

                header('Location: index.php?cible=monCompte');
                break;

            case 'modifMdp' :

                $data = Update_User_Data($bdd, 'users', $_SESSION['user_id']);

                if (password_verify($_POST_SEC['password'], $data['password'])) {
                    // Verifie le mot de passe -> doit comporter au moins 8 caractère, un chiffre et une majuscule
                    if (!isAPassword($_POST_SEC['newMdp'])) {
                        $Alerte_Password = "Alerte_Message";
                        $ValidationMdp = false;
                        $vue = "modif_profil";
                    }

                    // Verifie si le mot de passe et la confirmation sont les mêmes
                    if ($_POST_SEC['confirmation_newMdp'] != $_POST_SEC['newMdp']) {
                        $Password_Confirmation = "Les mots de passe ne sont pas identiques";
                        $ValidationMdp = false;
                    }

                    if ($ValidationMdp) {
                        modification($bdd, crypterMdp($_POST_SEC['newMdp']), 'password', $_SESSION['user_id'], 'users');
                        $data = Update_User_Data($bdd, 'users', $_SESSION['user_id']);
                        $_SESSION['password'] = $data['password'];
                        header('Location: index.php?cible=monCompte');
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

            case 'modifMail':

                // Vérifie si l'email existe dans la base
                if(Is_Email_Exists($bdd, 'users', $_POST_SEC['email'])){
                    //Verifie l'email
                    if(isAnEmail($_POST_SEC['newMail'])){
                        $Email_Message = "Adresse mail non valide";
                        $ValidationMail = false;
                    }
                    if(Is_Email_Exists($bdd, 'users', $_POST_SEC['newMail'])){
                        $Email_Message = "Adresse mail déjà existante";
                        $ValidationMail = false;
                    }
                    if ($ValidationMail == true) {
                        modification($bdd, $_POST_SEC['newMail'], 'email', $_SESSION['user_id'], 'users');
                        $data = Update_User_Data($bdd, 'users', $_SESSION['user_id']);
                        $_SESSION['email'] = $data['email'];
                        header('Location: index.php?cible=monCompte');
                    } else {
                        $vue = "modif_profil";
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

            case 'dellAll' :
                $homes = recupereTous($bdd, 'homes');
                $own_home = recupereTous($bdd, 'own_home');
                $rooms = recupereTous($bdd, 'rooms');
                $capteurs = recupereTous($bdd, 'devices');
                $id=$_SESSION['user_id'];

                foreach($own_home as $donnees) {
                    if ($id == $donnees['user_id']) {
                        foreach ($homes as $donnees2) {
                            if ($donnees['house_id'] == $donnees2['id']) {
                                foreach ($rooms as $donnees3) {
                                    if ($donnees3['home_id'] == $donnees2['id']) {
                                        foreach ($capteurs as $donnees4) {
                                            if ($donnees4['room_id'] == $donnees3['id']) {
                                                $req = $bdd->prepare('DELETE FROM devices WHERE room_id =' . $donnees4['room_id']);
                                                $req->execute();
                                            }
                                        }
                                        $req = $bdd->prepare('DELETE FROM rooms WHERE home_id =' . $donnees2['id']);
                                        $req->execute();
                                    }
                                }
                                $req = $bdd->prepare('DELETE FROM homes WHERE id =' . $donnees['house_id']);
                                $req->execute();
                            }
                        }
                        $req = $bdd->prepare('DELETE FROM own_home WHERE user_id=' . $id);
                        $req->execute();
                    }
                }

                $req = $bdd->prepare('DELETE FROM users WHERE id=' . $id);
                $req->execute();

                session_destroy();
                header('Location: index.php');

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