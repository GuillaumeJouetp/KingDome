<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

<?php
//include 'consoCapteurs.php';

if(isset($_POST['duree'])){
	$duree = $_POST['duree'];

	switch ($duree){

		case 1:
			$mois = array('Janvier');
			$conso = array('20');
			break;
			
		case 3 :
			$mois = array('Janvier', 'Février', 'Mars');
			$conso = array('20','32','45');
			break;
			
		case 6 :
			$mois = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin');
			$conso = array('20','32','45','59','67','74');
			break;
			
		case 12 :
			$mois = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre' ,'Décembre');
			$conso = array('20','32','45','59','67','74','85','93','102','110','122','133');
			break;
	}
}


include "php/views/header.php";
include "php/views/accueilUser.php";
include "php/views/footer.php";
?>