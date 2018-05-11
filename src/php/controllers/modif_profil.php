<?php
/**
 * Created by PhpStorm.
 * User: PC-Adrien
 * Date: 30/04/2018
 * Time: 11:08
 */

// si la fonction n'est pas définie ou est vide, on choisit d'afficher la vue par default
if (!isset($_GET['function']) || empty($_GET['function'])) {
    $function = "notdone";
} else {
    $function = $_GET['function'];
}

// Définit le fuseau horaire par défaut à utiliser. Disponible depuis PHP 5.1
date_default_timezone_set('UTC');

switch ($function){
    case 'modifier' :
        $vue = "modif_profil";
        break;
}

include "php/views/header.php";
include ('php/views/' . $vue . '.php');
include "php/views/footer.php";
?>