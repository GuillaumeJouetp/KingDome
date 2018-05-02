<?php
/**
 * VUE DE LA PAGE DASHBOARD
 * User: Olfa
 * En cours
 */
?>


<head>
    <link rel="stylesheet" href="..\src\css\dashboard.css">
</head>

<div id=corps>
  

	
	<?php
	
	try
	{
		// On se connecte à MySQL
		$bdd = new PDO('mysql:host=localhost;dbname=isep_kingdome;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
		// En cas d'erreur, on affiche un message et on arrête tout
		die('Erreur : '.$e->getMessage());
	}
	
	
	$own_home = $bdd->query('SELECT * FROM own_home');
	$rooms = $bdd->query('SELECT * FROM rooms');
	$cpt=0;
	$cpt2=0;
	$id=  $_SESSION['user_id'];
	

	foreach($own_home as $donnees){ //boucle pour avoir le nombre de maison
		
		if($id == $donnees['user_id']){
			$cpt++;
			echo(
					"<div class='ecriture1'>"
					.'<img class="fleche" src="..\res\icones\fleche_bas.png">'
					."Maison $cpt"
					."</div>"
				);	
		
			foreach($rooms as $donnees2){ //boucle pour avoir le nombre de maison
				if($donnees['house_id'] == $donnees2['home_id']){
					$cpt2++;
					echo(
							"<div class='pieces'>"
							."<div class='piece'> Pièce $cpt2 </div>"
							."</div>"
						);
				}
			}
			if($cpt2==0){
				echo(
						"<div class='ecriture1'>"
						."Pas de pièce"
						."</div>"
						);
			}
			$cpt2=0;
		}
	}
	
	
	
	if($cpt==0){
		echo(
				"<div class='ecriture1'>"
				."Pas de maison"
				."</div>"
				);	
	}
	
	?>
    
</div>
		
		
		<!-- 	
	
		<div class="ecriture1">
			<img class="fleche" src="..\res\icones\fleche_bas.png">
	    		Maison 1
	    </div>
	    
		<div id="conteneur">
			<a href="#masque">
				<div class="element , ecriture2">Ajouter un capteur</div>
			</a>
		   		
			<div id="masque">
			
				<div class="fenetre-modale">
					    <a class="fermer" href="#nullepart"><img src="..\res\icones\bouton-fermer.png"class="btn-fermer"/></a>
					    <div class="capt"><br>Ajouter un capteur<br><br></div>
							<form action="traitementFormulaire.php" method="post" >
								
								<label> Nom :  <br><br> <input type="text" name="myText"/> </label>  <br><br>
									
								<label> Habitation :  <br> <br></label>
								<select class="custom-dropdown__select custom-dropdown__select--white">
							    	<option>Maison 1</option>
							    	<option>Maison 2</option>
							    	<option>Maison 3</option>
							   	</select><br><br>
							   		
							   	<label> Pièce :  <br><br> </label>
							   	<select class="custom-dropdown__select custom-dropdown__select--white">
							     	<option>Pièce 1</option>
							       	<option>Pièce 2</option>
							   		<option>Pièce 3</option>
								</select><br><br>
							   		
						   		<label> Type de capteur :  <br><br> </label>
							   	<select class="custom-dropdown__select custom-dropdown__select--white">
							   		<option>Capteur de température</option>
						       		<option>Capteur d'humidité</option>
						       		<option>Capteur de ...</option>
						   		</select><br><br><br>

							   	
								<input type="submit" value="Ajouter" /><br><br>
								
							</form>  
								
				</div> 
			</div> 
		   		
		   	
	 		<div class="element">
		   		<span class="custom-dropdown custom-dropdown--white">
		    	    <select class="custom-dropdown__select custom-dropdown__select--white">
				       	<option>Trier par : Pièce</option>
				       	<option>Type</option>
				       	<option>Favori</option>
				   	</select>
				</span>
			</div>  
			      
	    </div>    --> 