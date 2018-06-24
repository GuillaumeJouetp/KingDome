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

        case 'modif_accueil':
            $req = $bdd->prepare('UPDATE accueil SET content= :content, url= :url, image= :image');

            if(isset($_FILES['image_accueil'])) {
                $Avatar_Message = isAnAvatar($_FILES['image_accueil']['name'], $_FILES['image_accueil']['size'], $_FILES['image_accueil']['tmp_name'], $_FILES['image_accueil']['error']);
                $dir = '../res/images/';
                $ext = strtolower(pathinfo($_FILES['image_accueil']['name'],PATHINFO_EXTENSION));
                $file = uniqid().'.'.$ext;
                $img = $dir.$file;
                move_uploaded_file($_FILES['image_accueil']['tmp_name'], $img);
            }

            if($ext == null) {
                $img=null;
            }

            $req->execute(array('content' => $_POST_SEC['texte_accueil'], 'url' => $_POST_SEC['video'], 'image' => $img));
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
    			if(strlen((string)$_POST_SEC['ref_lampe'])==1){
    				if($_POST_SEC['lampe']=='ON'){
    					
    					$trame='2009A1D0'. $_POST_SEC['ref_lampe'] .'1111FF';
    					send_trame($trame.date("YmdHis"));
    				}
    				
    				if($_POST_SEC['lampe']=='OFF'){
    					$trame='2009A1D0'. $_POST_SEC['ref_lampe']. '0000FF';
    					send_trame($trame.date("YmdHis"));
    				}
    			}
    			
    			if(strlen((string)$_POST_SEC['ref_lampe'])==2){
    				if($_POST_SEC['lampe']=='on'){
    					
    					$trame='2009A1D'. $_POST_SEC['ref_lampe'] .'1111FF';
    					send_trame($trame.date("YmdHis"));
    					
    				}
    				if($_POST_SEC['lampe']=='off'){
    					$trame='2009A1D'. $_POST_SEC['ref_lampe']. '0000FF';
    					send_trame($trame.date("YmdHis"));
    				}
    			}
    			
    			header('location: index?cible=dashboard');
    			break;
    			
    		case 'donnees2':
    			if(strlen((string)$_POST_SEC['ref_mot'])==1){
    				if($_POST_SEC['moteur']=='haut'){
    					
    					$trame='1009A1D0'. $_POST_SEC['ref_mot'] .'0001FF';
    					send_trame($trame.date("YmdHis"));
    				}
    				if($_POST_SEC['moteur']=='bas'){
    					$trame='1009A1D0'. $_POST_SEC['ref_mot'] .'0002FF';
    					send_trame($trame.date("YmdHis"));
    				}
    				if($_POST_SEC['moteur']=='stop'){
    					$trame='1009A1D0'. $_POST_SEC['ref_mot'] .'0000FF';
    					send_trame($trame.date("YmdHis"));
    				}
    			}
    			if(strlen((string)$_POST_SEC['ref_mot'])==2){
    				if($_POST_SEC['moteur']=='haut'){
    					
    					$trame='1009A1D'. $_POST_SEC['ref_mot'] .'0001FF';
    					send_trame($trame.date("YmdHis"));
    				}
    				if($_POST_SEC['moteur']=='bas'){
    					$trame='1009A1D'. $_POST_SEC['ref_mot'] .'0002FF';
    					send_trame($trame.date("YmdHis"));
    				}
    				if($_POST_SEC['moteur']=='stop'){
    					$trame='1009A1D'. $_POST_SEC['ref_mot'] .'0000FF';
    					send_trame($trame.date("YmdHis"));
    				}
    			}
    			
    		
    			
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