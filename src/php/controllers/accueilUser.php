<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

<?php
//include 'consoCapteurs.php';

if(isset($_POST['duree'])){
	$duree = $_POST['duree'];

	switch ($duree){

		case 1:
			$mois = $bdd->query('SELECT date FROM conso_mois WHERE date >= NOW() - INTERVAL 1 MONTH');
			$mois = $mois->fetch();
			$mois = array($mois['date']);
			$conso = $bdd->query('SELECT conso FROM conso_mois WHERE date >= NOW() - INTERVAL 1 MONTH');
			$conso = $conso->fetch();
			$conso=array($conso['0']);
			break;
			
		case 3 :
			$mois = $bdd->query('SELECT date FROM conso_mois WHERE date >= NOW() - INTERVAL 3 MONTH');
			$mois = $mois->fetchAll();
			$mois= array ($mois[0][0], $mois[1][0], $mois[2][0]);
			$conso = $bdd->query('SELECT conso FROM conso_mois WHERE date >= NOW() - INTERVAL 3 MONTH');
			$conso = $conso->fetchAll();
			$conso=array($conso[0][0], $conso[1][0], $conso[2][0]);
			break;
			
		case 6 :
			$mois = $bdd->query('SELECT date FROM conso_mois WHERE date >= NOW() - INTERVAL 6 MONTH');
			$mois = $mois->fetchAll();
			$mois= array ($mois[0][0], $mois[1][0], $mois[2][0], $mois[3][0], $mois[4][0], $mois[5][0]);
			$conso = $bdd->query('SELECT conso FROM conso_mois WHERE date >= NOW() - INTERVAL 6 MONTH');
			$conso = $conso->fetchAll();
			$conso=array($conso[0][0], $conso[1][0], $conso[2][0], $conso[3][0], $conso[4][0], $conso[5][0]);
			break;
			
		case 12 :
			$mois = $bdd->query('SELECT date FROM conso_mois WHERE date >= NOW() - INTERVAL 12 MONTH');
			$mois = $mois->fetchAll();
			$mois= array ($mois[0][0], $mois[1][0], $mois[2][0], $mois[3][0], $mois[4][0], $mois[5][0], $mois[6][0], $mois[7][0], $mois[8][0], $mois[9][0], $mois[10][0], $mois[11][0]);
			$conso = $bdd->query('SELECT conso FROM conso_mois WHERE date >= NOW() - INTERVAL 12 MONTH');
			$conso = $conso->fetchAll();
			$conso=array($conso[0][0], $conso[1][0], $conso[2][0], $conso[3][0], $conso[4][0], $conso[5][0],$conso[6][0], $conso[7][0], $conso[8][0], $conso[9][0], $conso[10][0], $conso[11][0]);
			break;
	}
}


include "php/views/header.php";
include "php/views/accueilUser.php";
include "php/views/footer.php";
?>