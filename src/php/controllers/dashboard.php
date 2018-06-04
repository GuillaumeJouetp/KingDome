<?php

// si la fonction n'est pas définie ou est vide, on choisit d'afficher la vue par default
if (!isset($_GET['function']) || empty($_GET['function'])) {
	$function = "notdone";
} else {
	$function = $_GET['function'];
}


// si l'utilisateur est un admin alors on lui affiche la dashboard
if( isAnAdmin($bdd)) {
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
    			if($_POST['id_piece']!=null){
    				$Data_devices = array(
    				'sens_or_eff' => 0,
    				'name' => htmlspecialchars($_POST['nom']),
    				'state' => 1,
    				'device_type_id' => get_id_device_types($bdd,$_POST_SEC['type_capteur']),
    				'cemac_id' => get_id_room(explode(",",$_POST_SEC['id_piece']),$_POST_SEC['piece']),
    				);
    				
    				insertion($bdd, $Data_devices, 'devices');
    				
    				header('location: index?cible=dashboard');
    			}
    
    			else{
    				header('location: index?cible=dashboard');
    			}
    			break;
    		
    		
    			
    			
    		case 'supprimer':
    			supprimer($bdd,$_POST_SEC['id1'],'devices');
    			header('location: index?cible=dashboard');
    			break;
    			
    		case 'modifier':
    			modification($bdd, $_POST_SEC['nom'],'name', $_POST_SEC['id1'],'devices');
    			header('location: index?cible=dashboard');
    			break;
    			
    		case 'donnees':
    			debug1($_POST_SEC['curseur']);
    			header('location: index?cible=dashboard');
    			break;
    			
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