<?php
/**
 * Created by PhpStorm.
 * User: PC-Adrien
 * Date: 25/06/2018
 * Time: 10:54
 */

// si la fonction n'est pas définie ou est vide, on choisit d'afficher la vue par default
if (!isset($_GET['function']) || empty($_GET['function'])) {
    $function = "notdone";
} else {
    $function = $_GET['function'];
}

// Définit le fuseau horaire par défaut à utiliser. Disponible depuis PHP 5.1
date_default_timezone_set('UTC');

switch ($function) {
    default :
        $vue = "monCompteAdmin";
}

include "php/views/header.php";
include ('php/views/' . $vue . '.php');
include "php/views/footer.php";
?>