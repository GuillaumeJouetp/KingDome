<?php

// si la fonction n'est pas définie ou est vide, on choisit d'afficher la vue par default
if (!isset($_GET['function']) || empty($_GET['function'])) {
	$function = "notdone";
} else {
	$function = $_GET['function'];
}


// si l'utilisateur est un admin alors on lui affiche la dashboard
if(isAnAdmin($bdd)) {
	$vue = "dashboard_backoffice";
}
else{
    // si l'utilisateur est connecté alors on lui affiche la dashboard
    if(isUserConnected()) {
    	
    	
    	switch($function){
    		
    		case 'notdone':
    			
    			$vue = "dashboard2";
    			
    			break;
    			
    		case 'ajouter':
    			
    			debug1($_POST['maison']);
    			debug1(get_id_room(explode(",",$_POST['id_piece']),$_POST['piece']));
    			$Data_devices = array(
    			'sens_or_eff' => 0,
    			'name' => htmlspecialchars($_POST['nom']),
    			'state' => 1,
    			'device_type_id' => get_id_device_types($bdd,$_POST['type_capteur']),
    			//get_id_cemac($bdd,$_POST['maison'],get_id_room($bdd,$POST['id_piece'],$_POST['piece'])),
    			'cemac_id' => get_id_room(explode(",",$_POST['id_piece']),$_POST['piece']),
    			);
    			
    			insertion($bdd, $Data_devices, 'devices');
    			
    			$vue = "dashboard2";
    			
    		
    			

    	}
             
        
    }
    else{
        switch ($function) {
            case 'notdone':
                //si l'utilisateur n'est pas connecté alors on lui demande de se connecter
                $vue = "dashboardSansCompte";
                break;


            default :
                // si aucune fonction ne correspond au paramètre function passé en GET
                $vue = "error404";
                $title = "error404";
        }
    }
}



include "php/views/header.php";
include ('php/views/' . $vue . '.php');
include "php/views/footer.php";
?>