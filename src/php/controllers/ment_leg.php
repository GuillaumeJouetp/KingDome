<?php

if (!isset($_GET['function']) || empty($_GET['function'])) {
    $function = "default";
} else {
    $function = $_GET['function'];
}

if(isAnAdmin($bdd)) {
    switch ($function) {
        case 'default':
            $vue = "ment_leg_admin";
            break;
        case 'modifier_texte':
            $req = $bdd->prepare('UPDATE updatable_content SET content= :nouveau_texte WHERE id = 3');
            $req->execute(array(
                'nouveau_texte' => $_POST['texte_catalogue']
            ));
            $vue = "ment_leg_admin";
            break;
    }
}

else{
    switch ($function) {
        case 'default':
            $vue = "ment_leg";
            break;
    }
}

include "php/views/header.php";
include ('php/views/' . $vue . '.php');
include "php/views/footer.php";

?>