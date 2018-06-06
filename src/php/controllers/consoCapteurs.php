<?php

/**
 * Renvoie le nombre total d'heures d'activation et modifie last_activation_date et on_time
 * @param $bdd
 * @return boolean
**/


function nombre_heures($bdd){
	$capteurs = recupereTous($bdd, 'devices');
	$nb_heures = 0;
	foreach($capteurs as $donnees){
		$nb_heures = $nb_heures + $donnees['on_time'];
		if($donnees['state']==1){
			$id = $donnees['id'];
			$requete = $bdd->query('SELECT DATEDIFF( now(), last_activation_date) FROM devices WHERE devices.id='.$id);	// DATEFIFF renvoie un nb de jours, entier
			$requete = $requete->fetch();
			$requete = floatval ( $requete );
			$intervalle = $requete*24-24;
			$nb_heures = $nb_heures + $intervalle ;
			$new_on_time = $donnees['on_time'] + $intervalle;
			modification($bdd, $new_on_time, 'on_time', $id, 'devices');
			modification($bdd, date('Y-m-d H:i:s'), 'last_activation_date', $id, 'devices');
		}
	}
	return $nb_heures;
}


/**
 * 
 * 
 * 
 * 
**/