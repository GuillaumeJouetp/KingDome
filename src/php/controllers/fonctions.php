<?php
include "php/models/requetes.php";
include "php/models/logs.php";
include "php/models/stats.php";

function displayTable($bdd, $table){
    debug(recupereTous($bdd, $table));
}

function addUserExample($bdd){
    $myDic = array(
        "user_firstname" => 'JOUET-PASTRE',
        "user_name" => 'Guillaume',
        "civility" => 'Mr',
        "birth_date" => '2018-04-09',
        "adresse" => null,
        "ville" => null,
        "zip_code" => null,
        "email" => 'coucou',
        "password" => 'yeisdf',
        "phone" => null,
        "registration_state" => null,
        "avatar" => null);
    insertion($bdd, $myDic, 'users');
}

function test($bdd){
    addUserExample($bdd);
    displayTable($bdd, 'users');
}


function debug1($legende,$data){
    echo $legende;
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function debug2($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

function crypterMdp($password){
    //return sha1($password);
    return password_hash($password, PASSWORD_BCRYPT);
}

function isAnEmail($mail){
    if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail)) {
        return true;
    }
}

function isAPassword($password){
    if (empty($password) || strlen($password) < 8 || !preg_match('/(?=.*[0-9])[A-Z]|(?=.*[A-Z])[0-9]/', $password)) {
        return false;
    } else {
        return is_string($password);
    }
}

function isATel($tel){
    return preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $tel);
}

function isAnAvatar($name, $size, $data, $error){

    // Vérifie si le fichier s'upload sans erreur
    if(!is_uploaded_file($data) || $error > 0){
        return 'Erreur lors du transfert';
    }

    // Vérifie si le fichier est bien une image
    $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
    $extension_upload = strtolower(substr(strrchr($name, '.'),1));
    if (!in_array($extension_upload,$extensions_valides)){
        return 'Le fichier n\'est pas une image valide';
    }

    // Vérifie que le fichier n'est pas trop lourd
    if($size > 250000) {
        return 'Fichier trop lourd';
    }

    return '';

}

function getCurrentUserType($bdd){ // renvoie le type de l'utilisateur actuellement connecté
    if (isUserConnected()) {
        $array_type = getUserType($bdd, $_SESSION['user_id']);
        return $array_type[0];
    }
    return false;
}

function isAnAdmin($bdd){
    if (getCurrentUserType($bdd) == 1)
        return true;
    else
        return false;
}

function testTemp($bdd){
    if (getCurrentUserType($bdd) == 1)
        return 'vous êtes un admin et vous avez accès au back office';
    else if (getCurrentUserType($bdd) == 2)
        return 'Vous êtes un utilisateur principale';
    else if (getCurrentUserType($bdd) == 3)
        return 'Vous êtes un utilisateur secondaire';
    else
        return "Votre type d'utilisateur n'est pas répertorié";
}


function displayBienvenue(){

    if (isset($_SESSION['connected']) && $_SESSION['connected'] == true) {
        $prenom = $_SESSION['user_firstname'];
        $nom = $_SESSION['user_name'];
        return 'Bienvenue ' . $prenom . ' ' . $nom . ' !';
    }
}

function isUserConnected(){
    if (isset($_SESSION['connected']) && !empty($_SESSION['connected']) && $_SESSION['connected'])
        return true;
}

function get_id_device_types($bdd,string $type_capteur){
	
	$device_type_id=0;
	$device_types = recupereTous($bdd, 'device_types');
	
	foreach($device_types as $donnees){
		
		if($type_capteur==$donnees['name']){
			
			$device_type_id = $donnees['id'];
		}
	}
	
	return $device_type_id;	
}

function get_id_room(array $id_piece, string $num_piece){
	
	$room_id=$id_piece[$num_piece-1];
	
	return $room_id;
	
}


function get_id_cemac($bdd,string $num_maison, string $num_piece){
	
	$cemac_id=0;
	$rooms = recupereTous($bdd, 'rooms');
	
	foreach($rooms as $donnees){
		
		if($num_maison==$donnees['home_id'] && $num_piece == $donnees['id']){
			
			$cemac_id = $donnees['id'];
		}
	}
	
	return $cemac_id;
	
}

/**
 * Sécurise un string à la faille POST
 * @param array tab
 * @return string
 */
function secu($myInput){
    $myInput = htmlspecialchars($myInput);
    return $myInput;
}

/**
 * Sécurise un tableau à la faille XSS
 * @param array tab
 * @return array
 */

function secuTab($tab){
    $myDic = array();
    foreach ($tab as $cle => $elt) {
        $cle = htmlspecialchars($cle);
        $elt = htmlspecialchars($elt);
        $myDic[$cle] = $elt;
    }
    return $myDic;
}


function setXDatas($bdd){
	$XDatas=[];
	foreach (getdatas($bdd) as $value) {
		$XDatas[]=dateFr($value['date']);
	}
	
	return $XDatas;
}


/**
 * Actualise les données du graphique de connexion en abscisse
 * @return array
 */
function setXDatasConso($bdd, $mois){
    $XDatas=[];
    foreach (getdatasConso($bdd, $mois) as $value) {
        $XDatas[]=dateFr($value['date']);
    }

    return $XDatas;
}


/**
 * Actualise les donnés du graphique de connexion en ordonnée
 * @return array
 */
function setYDatas($bdd){
    $YDatas=[];
    foreach (getdatas($bdd) as $value) {
        $YDatas[]=$value['visites'];
    }

    return $YDatas;
}

/**
 * Formate une date US en date FR
 * @param string $dateUS
 * @return string
 */
function dateFr($dateUS){
    $dateFR = strftime('%d-%m-%Y',strtotime($dateUS));
    $dateFRslash=str_replace (  '-' , ' / ' ,$dateFR);
    return $dateFRslash;
}

/**
 * Décode et insert les trames non existantes a la base de donnée.
 * La trames du fichiers de logs sont classés par ordre de dernier envoie en date, ainsi pour cibler les trames qu'on a pas encore ajouteé a la bdd
 * on parcours le fichier de logs et on ajoute les trames qui ont un timestamp supérieur a celui de la derniere trame ajoutée a la bdd
 * @param string $logs
 * @return void
 */
function insertTrame ($logs,$bdd){
    $data_tab =str_split(strrev($logs),33);
    $lastTrameTime1 = str_replace (' ' , '' ,get_last_trame($bdd )['maxTimestamp']);
    $lastTrameTime2 = str_replace ('-' , '' ,$lastTrameTime1);
    $lastTrameTime3 = str_replace (':' , '' ,$lastTrameTime2);
    foreach ($data_tab as $key=>$elm) {
        $trame = strrev($data_tab[$key]);

        // décodage avec sscanf
        list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
            sscanf($trame, "%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");

        $values = array(
            'type_trame' => $t,
            'objet' => $o,
            'type_requete' => $r,
            'device_id' => intval($n),
            'value' => intval($v),
            'num_trame' => $a,
            'checksum' => $x,
            'timestamp' => $year.'-'.$month.'-'.$day.' '.$hour.':'.$min.':'.$sec
        );

        /*
           debug1('Timestamp de la trame : ',$year.$month.$day.$hour.$min.$sec);
           debug1('Timestamp de la trame la plus récente de la bdd',$lastTrameTime3);
           debug1( 'test si la trame reçu est plus récente que la dernière de la bdd : ',$year.$month.$day.$hour.$min.$sec > $lastTrameTime3 ? 1:0);
           echo '<br>';
        */
        if (isDateCorrect($year,$month,$day,$hour,$min,$sec)) { // test de l'intégrité de la date
            if ($year . $month . $day . $hour . $min . $sec >= $lastTrameTime3){ // On insère la trame dans la bdd seulement si elle n'y ait pas déjà
                insertion($bdd, $values, 'datas');
            }
            else{
                break;
            }
        }
    }
}


function isDateCorrect($year,$month,$day,$hour,$min,$sec){
    if( preg_match("/[A-Za-z]/",$year.$month.$day.$hour.$min.$sec )) {
        return false;
    }

    if ($month > 12){
        return false;
    }
    if ($day > 31){
        return false;
    }
    if ($hour > 60){
        return false;
    }
    if ($min > 60){
        return false;
    }
    if ($sec > 60){
        return false;
    }
    return true;

}

function Youtube_video ($youtube){
    $beginning = 'https://www.youtube.com/embed/';
    $end = substr($youtube, 32);
    $youtube = $beginning . $end;
    return $youtube;
}

?>