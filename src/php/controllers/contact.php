<?php

// si la fonction n'est pas définie ou est vide, on choisit d'afficher la vue par default
if (!isset($_GET['function']) || empty($_GET['function'])) {
    $function = "notdone";
} else {
    $function = $_GET['function'];
}

$title = 'Contact';
$mail_message='';
$form_message = "";

switch ($function) {
    case 'notdone':
        //cas ou le formulaire n'est pas encore rempli, On affiche le formulaire
        $vue = "contact";
        break;


    case 'done':
        //Cas ou le formulaire est rempli, On affiche que le formulaire a bien été envoyé
        if(!isAnEmail($_POST['mail'])){
            $vue = "contact";
            $form_message = "Votre message a bien été envoyé";
            insertion($bdd, $_POST, 'incoming_messages');
        }
        else{
            $vue = "contact";
            $mail_message='Veuillez entrer une adresse email valide ou nous pourrons pas vous répondre';
        }
        break;

    default :
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "error404";
        $title = "error404";
}
include "php/views/header.php";
include ('php/views/' . $vue . '.php');
include "php/views/footer.php";
?>

<?php


?>