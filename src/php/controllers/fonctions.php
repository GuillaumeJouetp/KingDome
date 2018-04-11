<?php
include "php/models/requetes.php";

function displayTable($bdd,$table){
    var_dump(recupereTous($bdd,$table));
}

function addUserExample($bdd){
    $myDic = array(
        "id"=>null,
        "nom"=> 'JOUET-PASTRE',
        "prénom"=> 'Guillaume',
        "civilité"=> 'Mr',
        "date de naissance"=>null,
        "adresse"=>null,
        "ville"=>null,
        "code postal"=>null,
        "email"=>null,
        "mot de passe"=>null,
        "numéro de tel"=>null,
        "état d'inscription"=>null,
        "avatar"=>null);
    insertion($bdd,$myDic,'users');
}

function test($bdd){
    addUserExample($bdd);
    displayTable($bdd,'users') ;
}

function crypterMdp($password) {
    //return sha1($password);
    return password_hash($password, PASSWORD_BCRYPT);
}