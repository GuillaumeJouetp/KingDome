<?php

// si la fonction n'est pas définie ou est vide, on choisit d'afficher la vue par default
if (!isset($_GET['function']) || empty($_GET['function'])) {
	$function = "notdone";
} else {
	$function = $_GET['function'];
}


include "php/views/header.php";
include('php/views/consommation.php');
include "php/views/footer.php";
?>