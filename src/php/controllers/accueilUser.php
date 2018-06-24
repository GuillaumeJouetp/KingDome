<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

<?php
//include 'consoCapteurs.php';

if(isset($_POST['duree'])){
	$duree = $_POST['duree'];

	switch ($duree){

		case 1:
			$conso = $bdd->query('SELECT conso FROM conso_mois WHERE date >= NOW() - INTERVAL 1 MONTH AND id_user='.$_SESSION['user_id']);
			$conso = $conso->fetch();
			$conso=array($conso[0]);
			break;
			
		case 3 :
			$conso = $bdd->query('SELECT conso FROM conso_mois WHERE date >= NOW() - INTERVAL 3 MONTH AND id_user='.$_SESSION['user_id']);
			$conso = $conso->fetchAll();
			$conso=array($conso[0][0], $conso[1][0], $conso[2][0]);
			break;
			
		case 6 :
			$conso = $bdd->query('SELECT conso FROM conso_mois WHERE date >= NOW() - INTERVAL 6 MONTH AND id_user='.$_SESSION['user_id']);
			$conso = $conso->fetchAll();
			$conso=array($conso[0][0], $conso[1][0], $conso[2][0], $conso[3][0], $conso[4][0], $conso[5][0]);
			break;
			
		case 12 :
			$conso = $bdd->query('SELECT conso FROM conso_mois WHERE date >= NOW() - INTERVAL 1 YEAR AND id_user='.$_SESSION['user_id']);
			$conso = $conso->fetchAll();
			$conso=array($conso[0][0], $conso[1][0], $conso[2][0], $conso[3][0], $conso[4][0], $conso[5][0],$conso[6][0], $conso[7][0], $conso[8][0], $conso[9][0], $conso[10][0], $conso[11][0]);
			break;
	}
}


include "php/views/header.php";
include "php/views/accueilUser.php";
include "php/views/footer.php";
?>