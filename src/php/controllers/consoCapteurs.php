<?php

/**
 * Renvoie le nombre total d'heures d'activation et modifie last_activation_date et on_time dans devices
 * @param $bdd
 * @return int $nb_heures
**/


function nombre_heures($bdd){
	$capteurs = recupereTous($bdd, 'devices');
	$nb_heures = 0;
	foreach($capteurs as $donnees){
		$device_user_id = $bdd->query('SELECT own_home.user_id FROM own_home INNER JOIN rooms ON own_home.house_id = rooms.home_id INNER JOIN devices ON '.$donnees['room_id'].' = rooms.id');
		$device_user_id = $device_user_id->fetch();
		$device_user_id = $device_user_id['user_id'];
		$device_user_id = intval($device_user_id);
		if($device_user_id == $_SESSION['user_id']){
			$nb_heures = $nb_heures + $donnees['on_time'];
			if($donnees['state']==1){
				$id = $donnees['id'];
				$requete = $bdd->query('SELECT DATEDIFF( now(), last_activation_date) FROM devices WHERE devices.id='.$id);	// DATEFIFF renvoie un nb de jours, entier
				$requete = $requete->fetch();
				$requete = floatval ( $requete['0'] );
				$intervalle = $requete*24;
				$nb_heures = $nb_heures + $intervalle ;
				$new_on_time = $donnees['on_time'] + $intervalle;
				modification($bdd, $new_on_time, 'on_time', $id, 'devices');
				modification($bdd, date('Y-m-d H:i:s'), 'last_activation_date', $id, 'devices');
			}
		}
	}
	
	$user_id = $_SESSION['user_id'];
	
	$last_line = $bdd->query ('SELECT MAX(id), MAX(date) FROM conso_mois WHERE id_user ='.$user_id);
	$last_line = $last_line->fetch();
	$last_date = $last_line['MAX(date)'];
	$id = $last_line['MAX(id)'];
	$id=intval($id);

	modification($bdd, $nb_heures, 'conso', $id, 'conso_mois');
}



/**
 * Ajoute une ligne à conso_mois selon la date actuelle et le dernière date du tableau  
 * @param $bdd
 * @return boolean
**/

function ajout_mois($bdd){
	
	// Récupère la dernière date de la table conso_mois et la convertie en date
	$last_date = $bdd->query ('SELECT MAX(date) FROM conso_mois');
	$last_date = $last_date->fetch();
	$last_date = $last_date['0'];
	$time = strtotime($last_date);
	$last_date =  date("Y-m-d H:i:s", $time);
	
	// Date 1 mois après la dernière date
	$next_date = date("Y-m-d", strtotime("+1 month", $time));
	
	// Date actuelle
	$current_date = date('Y-m-d');

	// Si la date actuelle est supérieur à la date du prochain mois, on ajoute une ligne à conso_mois
	if ($next_date <= $current_date){
	
		$new_values = array(
				'id_user' => $_SESSION['user_id'],
				'date' => $next_date,
				'conso' => 0 );
		
		insertion($bdd, $new_values, 'conso_mois');
	}
}


/**
 * Ajoute une ligne à conso_mois selon la date actuelle et le dernière date du tableau
 * @param $bdd
 * @return boolean
 **/

function reinit_on_time($bdd){
	
	$current_day = date('d');
	if ($current_day == '01'){
		$capteurs = recupereTous($bdd, 'devices');
		foreach ($capteurs as $donnees) {
			$id = $donnees['id'];
			modification($bdd, 0, 'on_time', $id, 'devices');
		}
	}
}

echo nombre_heures($bdd), ajout_mois($bdd), reinit_on_time($bdd);























