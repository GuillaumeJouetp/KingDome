<?php
include "php/models/requetes.php";

function displayTable($bdd, $table){
    debug(recupereTous($bdd, $table));
}

function addUserExample($bdd){
    $myDic = array(
        "user_firstname" => 'JOUET-PASTRE',
        "user_name" => 'Guillaume',
        "civility" => 'Mr',
        "birth_date" => '2018-04-09',
        "adresse" => null,
        "ville" => null,
        "zip_code" => null,
        "email" => 'coucou',
        "password" => 'yeisdf',
        "phone" => null,
        "registration_state" => null,
        "avatar" => null);
    insertion($bdd, $myDic, 'users');
}

function test($bdd){
    addUserExample($bdd);
    displayTable($bdd, 'users');
}


function debug1($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function debug2($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

function crypterMdp($password){
    //return sha1($password);
    return password_hash($password, PASSWORD_BCRYPT);
}

function isAnEmail($mail){
    if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail)) {
        return true;
    }
}

function isAPassword($password){
    if (empty($password) || strlen($password) < 8 || !preg_match('/(?=.*[0-9])[A-Z]|(?=.*[A-Z])[0-9]/', $password)) {
        return false;
    } else {
        return is_string($password);
    }
}

function isATel($tel){
    return preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $tel);
}

function getCurrentUserType($bdd){ // renvoie le type de l'utilisateur actuellement connecté
    if (isUserConnected()) {
        $array_type = getUserType($bdd, $_SESSION['user_id']);
        return $array_type[0];
    }
    return false;
}

function isAnAdmin($bdd){
    if (getCurrentUserType($bdd) == 1)
        return true;
    else
        return false;
}

function testTemp($bdd){
    if (getCurrentUserType($bdd) == 1)
        return 'vous êtes un admin et vous avez accès au back office';
    else if (getCurrentUserType($bdd) == 2)
        return 'Vous êtes un utilisateur principale';
    else if (getCurrentUserType($bdd) == 3)
        return 'Vous êtes un utilisateur secondaire';
    else
        return "Votre type d'utilisateur n'est pas répertorié";
}


function displayBienvenue(){

    if (isset($_SESSION['connected']) && $_SESSION['connected'] == true) {
        $prenom = $_SESSION['user_firstname'];
        $nom = $_SESSION['user_name'];
        return 'Bienvenue ' . $prenom . ' ' . $nom . ' !';
    }
}

function isUserConnected(){
    if (isset($_SESSION['connected']) && !empty($_SESSION['connected']) && $_SESSION['connected'])
        return true;
}
