<?php
include "php/models/requetes.php";

function nbr_maison(){
	$own_home = recupereTous($bdd, 'own_home');
	$cpt=0;
	$id=  $_SESSION['user_id'];
	
	foreach($own_home as $donnees){ //boucle pour avoir le nombre de maison
		
		if($id == $donnees['user_id']){
			$cpt++;
		}
	}
	return $cpt;
}

function nbr_piece(){
	

	$rooms = recupereTous($bdd, 'rooms');
	$cpt2=0;
	$id=  $_SESSION['user_id'];
	
		
	if($id == $donnees['user_id']){
			
		foreach($rooms as $donnees2){  //boucle pour avoir le nombre de piece
			if($donnees['house_id'] == $donnees2['home_id']){
			$cpt2++;	
			}
		}	
	}
	return cpt2;
}

?>