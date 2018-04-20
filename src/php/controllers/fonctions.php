<?php
include "php/models/requetes.php";

function displayTable($bdd,$table){
    debug(recupereTous($bdd,$table));
}

function addUserExample($bdd){
    $myDic = array(
        "user_firstname"=> 'JOUET-PASTRE',
        "user_name"=> 'Guillaume',
        "civility"=> 'Mr',
        "birth_date"=>'2018-04-09',
        "adresse"=>null,
        "ville"=>null,
        "zip_code"=>null,
        "email"=>'coucou',
        "password"=>'yeisdf',
        "phone"=>null,
        "registration_state"=>null,
        "avatar"=>null);
    insertion($bdd,$myDic,'users');
}

function test($bdd){
    addUserExample($bdd);
    displayTable($bdd,'users') ;
}

//Faire une fonction qui vérifie si l'user est un admin

function debug($data)
{
    echo "<pre>";
    print_r($data);
    //var_dump($data);
    echo "</pre>";
}

function crypterMdp($password) {
    //return sha1($password);
    return password_hash($password, PASSWORD_BCRYPT);
}

function isAnEmail($mail){
    if(!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail)){
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