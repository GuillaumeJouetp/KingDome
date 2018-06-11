<?php


// si la fonction n'est pas définie ou est vide, on choisit d'afficher la vue par default
if (!isset($_GET['function']) || empty($_GET['function'])) {
	$function = "notdone";
} else {
	$function = $_GET['function'];
}

$Email_Message = "";
$Email_Message_conf="";
$Validation = true;

// si l'utilisateur est un admin alors on lui affiche la dashboard
if( isAnAdmin($bdd)) {
    switch($function) {

        case 'notdone':
            $vue = "dashboard_backoffice";
            break;

        case 'changer_droit':
            if( ! Is_Email_Exists($bdd, 'users', $_POST_SEC['email'])){
                $Email_Message = "Cette adresse mail n'existe pas";
                $Validation = false;
            }
            if($Validation){
                $req = $bdd->prepare('UPDATE users a JOIN user_types b SET a.user_type_id = b.id WHERE a.email = :email AND b.name = :nouveau_droit');
                $req->execute(array('nouveau_droit' => $_POST_SEC['nouveau_droit'], 'email' => $_POST_SEC['email']));
                $Email_Message_conf = "La personne avec l'adresse mail " . $_POST_SEC['email'] . " est devenue " . $_POST_SEC['nouveau_droit'] . ".";
            }
            $vue = "dashboard_backoffice";
            break;

        case 'modif_footer':
            $req = $bdd->prepare('UPDATE footer SET address= :address, phone_number= :tel, mail_address= :mail, postal_code= :cp, city= :ville');
            $req->execute(array('address' => $_POST_SEC['adress'], 'tel' => $_POST_SEC['tel'], 'mail' => $_POST_SEC['email'], 'cp' => $_POST_SEC['zip_code'], 'ville' => $_POST_SEC['city']));
            $vue = "dashboard_backoffice";
            break;
    }
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
    				'name' => htmlspecialchars($_POST['nom']),
    				'state' => 1,
    				'device_type_id' => get_id_device_types($bdd,$_POST_SEC['type_capteur']),
    				'room_id' => get_id_room(explode(",",$_POST_SEC['id_piece']),$_POST_SEC['piece']),
    				'ref' => $_POST_SEC['ref'],
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
    			modification($bdd, $_POST_SEC['ref'],'ref', $_POST_SEC['id1'],'devices');
    			if($_POST_SEC['etat']=='actif'){
    				modification($bdd, 1 ,'state', $_POST_SEC['id1'],'devices');
    			}
    			else{
    				modification($bdd, 0 ,'state', $_POST_SEC['id1'],'devices');
    			}
    			header('location: index?cible=dashboard');
    			break;
    			
    		case 'donnees':
    			debug2($_POST_SEC['moteur']);
    			debug2($_POST_SEC['lampe']);
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