<?php

//Verification données

if(isset($_POST['creation_submit'])){
    // J'ai créé mon compte puis validé


} elseif(isset($_POST['connexion_submit'])){
    // Je me suis connecté puis validé
    $_POST = array (
        'email' => htmlspecialchars($_POST['mail']),
        'password' => crypterMdp(htmlspecialchars($_POST['password']))
    );

    $resultat_recherche = array(recherche($bdd, 'users', $_POST));





} else {
    // Impossible normalement
    echo 'ERROR 404';
}

foreach($_POST as $key => $value) {
    echo $key . '->' . $value . ' / ';
}
foreach($resultat_recherche as $key => $value) {
    echo $key . '->' . $value . ' / ';
}

include ('php/views/inscription.php');
?>