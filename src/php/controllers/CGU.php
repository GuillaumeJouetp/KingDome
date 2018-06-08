<?php

if (!isset($_GET['function']) || empty($_GET['function'])) {
    $function = "default";
} else {
    $function = $_GET['function'];
}

if(isAnAdmin($bdd)) {
    switch ($function) {
        case 'default':
            $vue = "CGU_admin";
            break;
        case 'modifier_texte':
            $req = $bdd->prepare('UPDATE updatable_content SET content= :nouveau_texte WHERE id = 1');
            $req->execute(array(
                'nouveau_texte' => $_POST['texte_catalogue']
            ));
            $vue = "CGU_admin";
            break;
    }
}

else{
    switch ($function) {
        case 'default':
            $vue = "CGU";
            break;
    }
}

include "php/views/header.php";
include ('php/views/' . $vue . '.php');
include "php/views/footer.php";

?>