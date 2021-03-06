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

if(isAnAdmin($bdd)) {
    switch ($function) {
        case 'notdone':
            $vue = "contact_backOffice";
            break;
        case  'suppr_message':
            $req = $bdd->prepare('DELETE FROM incoming_messages WHERE id= :message_id');
            $req->execute(array('message_id' => $_GET['message_id']));
            $vue = "contact_backOffice";
            break;
        case  'suppr_message_panne':
            $req = $bdd->prepare('DELETE FROM incoming_messages_panne WHERE id= :message_id');
            $req->execute(array('message_id' => $_GET['message_id_panne']));
            $vue = "contact_backOffice";
            break;
    }
}
else{
    switch ($function) {
        case 'notdone':
            //cas ou le formulaire n'est pas encore rempli, On affiche le formulaire
            $vue = "contact";
            break;


        case 'done':
            //Cas ou le formulaire est rempli, On affiche que le formulaire a bien été envoyé
            if (!isAnEmail($_POST_SEC['mail'])) {
                $vue = "contact";
                $form_message = "Votre message a bien été envoyé";
                insertion($bdd, $_POST_SEC, 'incoming_messages');
            } else {
                $vue = "contact";
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

<?php


?>