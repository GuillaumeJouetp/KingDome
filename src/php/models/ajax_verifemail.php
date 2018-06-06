<?php

include "connexionPDO.php";

$email = $_GET["email"];

$statement = $bdd->prepare('SELECT COUNT(*) FROM users WHERE email = :email');
$statement->execute(array(':email' => $email));

if($statement->fetchColumn() > 0){

    echo "Adresse mail déjà utilisée";

}