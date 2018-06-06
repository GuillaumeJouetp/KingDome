<!-- Graphique de consommation -->

<head><link rel="stylesheet" href="css/accueil.css"></head>

<div id="corps">

	<h1>Votre consommation</h1>


<!-- Formulaire : sélection de la durée en abscisse -->
	<form method="post" action="index.php?cible=accueilUser" enctype="multipart/form-data">
		<label for="duree">Sélectionner la durée</label>
		<select name="duree">
			<option value="1">1 mois</option>
			<option value="3">3 mois</option>
			<option value="6">6 mois</option>
			<option value="12" selected="selected">1 an</option>
		</select>
		<button type="submit" class="submit_button">Sélectionner</button>
	</form>
	
	<!-- Graphique de consommation -->
	
	<?php 
	include 'js/chartUser.php' ;
	include 'C:\wamp64\www\dHomeTech\src\php\controllers\consoCapteurs.php';
	echo nombre_heures($bdd);
	?>

</div>