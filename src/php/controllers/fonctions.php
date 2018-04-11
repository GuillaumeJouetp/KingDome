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