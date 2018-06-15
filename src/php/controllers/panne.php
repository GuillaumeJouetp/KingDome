<?php

// si la fonction n'est pas définie ou est vide, on choisit d'afficher la vue par default
if (!isset($_GET['function']) || empty($_GET['function'])) {
    $function = "notdone";
} else {
    $function = $_GET['function'];
}


<<<<<<< HEAD
$donnees=recupereTous($bdd, 'devices');
$nom_capt=$donnees['name'];
var_dump($donnees);
die();


=======
>>>>>>> fb59659bd0a4a12d46791509c61eaa0f06daad06

$title = 'Panne';
$mail_message='';
$form_message = "";

if(isAnAdmin($bdd)) {
    $vue = "panne_admin";
}
else{
    switch ($function) {
        case 'notdone':
            //cas ou le formulaire n'est pas encore rempli, On affiche le formulaire
            $vue = "panne";
            break;


        case 'done':
            //Cas ou le formulaire est rempli, On affiche que le formulaire a bien été envoyé
            if (!isAnEmail($_POST_SEC['mail'])) {
                $vue = "panne";
                $form_message = "Votre message a bien été envoyé";
                insertion($bdd, $_POST_SEC, 'incoming_messages');
            } else {
                $vue = "panne";
                $mail_message = 'Veuillez entrer une adresse email valide ou nous pourrons pas vous répondre';
            }
            break;

        default :
            // si aucune fonction ne correspond au paramètre function passé en GET
            $vue = "error404";
            $title = "error404";
    }
}
include "php/views/header.php";
include ('php/views/' . $vue . '.php');
include "php/views/footer.php";

?>
