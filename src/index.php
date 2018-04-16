<!doctype html>
<html lang=fr>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title><?php echo $title; ?></title>
</head>
<body>


<?php
/**
 * MVC :
 * - index.php : identifie le routeur à appeler en fonction de l'url
 * - Contrôleur : Crée les variables, élabore leurs contenus, identifie la vue et lui envoie les variables
 * - Modèle : contient les fonctions liées à la BDD et appelées par les contrôleurs
 * - Vue : contient ce qui doit être affiché
 * PHILOSOPHIE DU MVC : l'index appelle le bon controleur (grâce à la variable cible), qui lui appelle la bonne vue (gâce à la variable function) !toujours dans cet ordre!
 **/

// Appel des fonctions du contrôleur
include "php/controllers/fonctions.php";
// Appel des fonctions liées à l'affichage
include("php/views/fonctions.php");


// On identifie le contrôleur à appeler dont le nom est contenu dans cible passé en GET
if(isset($_GET['cible']) && !empty($_GET['cible'])) {
    // Si la variable cible est passé en GET
    $url = $_GET['cible']; //user, sensor, etc.

} else {
    // Si aucun contrôleur défini en GET, on bascule sur accueil
    $url = 'accueil';
}

// On appelle le contrôleur
include('php/controllers/' . $url . '.php');

?>


</body>
</html>