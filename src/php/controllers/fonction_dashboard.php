<?php
include "php/models/requetes.php";

function get_id_device_types(PDO $bdd,string $type_capteur){
	
	$device_type_id=0;
	$device_types = recupereTous($bdd, 'device_types');
	
	foreach($device_types as $donnees){
		
		if($type_capteur=="Capteur " .$donnees['name']){
			
			$device_type_id = $donnees['id'];
		}
	}
	
	return $device_type_id;
	
	
	
}

?>