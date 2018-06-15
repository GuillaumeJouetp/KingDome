<?php

// si la fonction n'est pas définie ou est vide, on choisit d'afficher la vue par default
if (!isset($_GET['function']) || empty($_GET['function'])) {
    $function = "notdone";
} else {
    $function = $_GET['function'];
}



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
                
                $new_values = array(
                		'mail' => $_POST_SEC['mail'],
                		'content' => $_POST_SEC['content'],
                		'nom_capt' => $_POST_SEC['select'] );
                
                insertion($bdd, $new_values, 'incoming_messages_panne');
                

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
