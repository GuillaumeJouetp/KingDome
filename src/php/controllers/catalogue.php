<?php

if (!isset($_GET['function']) || empty($_GET['function'])) {
    $function = "default";
} else {
    $function = $_GET['function'];
}

if( ! isAnAdmin($bdd)) {
    switch ($function) {
        case 'default':
            $vue = "catalogue_backoffice";
            break;
        case 'modifier_texte':
            $req = $bdd->prepare('UPDATE updatable_content SET content= :nouveau_texte, date= :nouvelle_date WHERE id = 1');
            $req->execute(array('nouveau_texte' => $_POST['texte_catalogue'], 'nouvelle_date' => date("Y-m-d")));
            $vue = "catalogue_backoffice";
            break;
        case 'ajouter_type':
            $req = $bdd->prepare('INSERT INTO device_types(name) VALUES( :nom)');
            $req->execute(array('nom' => $_POST['nom_type']));
            $vue = "catalogue_backoffice";
            break;
        case 'supprimer_type':
            $req1 = $bdd->prepare('DELETE FROM device_types WHERE name= :nom_type');
            $req1->execute(array('nom_type' => $_POST['type_capteur_catalogue']));
            $req2 = $bdd->prepare('DELETE FROM catalog WHERE device_type_name= :nom_type');
            $req2->execute(array('nom_type' => $_POST['type_capteur_catalogue']));
            $vue = "catalogue_backoffice";
            break;
        case 'ajouter_capteur':
            $req = $bdd->prepare('INSERT INTO catalog(url, device_type_name, name) VALUES( :lien_image, :nom_type, :nom_capteur)');

            if(isset($_FILES['file_image_catalogue'])) {
                $Avatar_Message = isAnAvatar($_FILES['file_image_catalogue']['name'], $_FILES['file_image_catalogue']['size'], $_FILES['file_image_catalogue']['tmp_name'], $_FILES['file_image_catalogue']['error']);
                $dir = '../res/images/Catalogue/';
                $ext = strtolower(pathinfo($_FILES['file_image_catalogue']['name'],PATHINFO_EXTENSION));
                $file = $_POST['type_capteur_catalogue'] . '_' . uniqid().'.'.$ext;
                $img = $dir.$file;
                move_uploaded_file($_FILES['file_image_catalogue']['tmp_name'], $img);
            }

            $req->execute(array('lien_image' => $img, 'nom_type' => $_POST['type_capteur_catalogue'], 'nom_capteur' => $_POST['nom_capteur']));
            $vue = "catalogue_backoffice";
            break;
        case 'supprimer_capteur':
            $req = $bdd->prepare('DELETE FROM catalog WHERE name = :nom_capteur');
            $req->execute(array('nom_capteur' => $_POST['nom_capteur_catalogue']));
            $vue = "catalogue_backoffice";
            break;


    }
}

else{
    switch ($function) {
        case 'default':
            $vue = "catalogue";
            break;
    }
}

include "php/views/header.php";
include ('php/views/' . $vue . '.php');
include "php/views/footer.php";

?>