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
	
		$own_home = recupereTous($bdd, 'own_home');              /*variables pour recuperer les données de la bdd de own_home, rooms, devices_types, devices, cemacs*/
		$rooms = recupereTous($bdd, 'rooms');
		$device_types = recupereTous($bdd, 'device_types');
		$devices = recupereTous($bdd, 'devices');
		$cemacs = recupereTous($bdd, 'cemacs');
		$cpt=0;													/*compteur utilisés pour les boucles for*/
		$cpt2=0;
		$id=$_SESSION['user_id'];
		
		
		foreach($own_home as $donnees){ /*boucle pour avoir le nombre de maison*/
			
			if($id == $donnees['user_id']){
				$cpt++;
				echo(
						"<div class='ecriture1'>"
						.'<img class="fleche" src="..\res\icones\fleche_bas.png">'
						."Maison $cpt"
						."</div>"
						);
				
				foreach($rooms as $donnees2){ //boucle pour avoir le nombre de piece
					if($donnees['house_id'] == $donnees2['home_id']){
						$cpt2++;
					}
				}
				
	?>
			
		<div id="conteneur">
			
		<?php
		
			echo(
					"<a href='#masque$cpt'>"
					."<div class='element , ecriture2'> Ajouter un capteur </div>"
					."</a>"
					
					
					."<div id='masque$cpt'>" 
					
					);
        	
				
       ?>
			
			<div class="fenetre-modale">
			    <a class="fermer" href="#nullepart"><img src="..\res\icones\bouton-fermer.png"class="btn-fermer"/></a>
			    <div class="capt"><br>Ajouter un capteur<br><br></div>
					    
					    
					<form method="post" action="index.php?cible=dashboard&function=ajouter" enctype="multipart/form-data">
					    	      
					   	<label> Nom :  <br><br> <input type="text" name="nom" required/> </label>  <br><br>
					   	
					   	<label> Maison :  <br><br> </label>
					    	      	
					   	<select class="custom-dropdown__select custom-dropdown__select--white" name="maison">
									   	
					   		<?php
								   		
					   		
					   			echo(
									"<option>"
									."Maison $cpt"
									."</option>"
									);
					   		
									   		
					  		?>					
																	       		
					 	</select><br><br>
					    	      	
					   	<label> Pièce :  <br><br> </label>
					    	      	
					   	<select class="custom-dropdown__select custom-dropdown__select--white" name="piece">
									   	
					   		<?php
								   		
					   		for($i = 1; $i < $cpt2+1; $i++){
					   			echo(
									"<option>"
									."Pièce $i"
									."</option>"
									);
					   		}
									   		
					  		?>					
																	       		
					 	</select><br><br>
							
						<label> Type de capteur :  <br><br> </label>
					
						   	<select class="custom-dropdown__select custom-dropdown__select--white" name="type_capteur">

							<?php
								   		
					   		foreach($device_types as $donnees3){
					   			echo(
									"<option>"
									."Capteur "
									.$donnees3['name']
									."</option>"
									);
					   		}
									   		
					  		?>		       		
							</select><br><br><br>        
							<input class="fermer" href="#nullepart" type="submit" name="creation_submit" value="Ajouter" /><br><br>
					   
					    </form>								
				</div> <!-- .fenetre-modale -->
			</div> <!-- #masque -->
			
			
			
			      
	    </div>
	    
	    
	    <?php
	   					echo "<div class='pieces'>";
						$cpt2=0;
						foreach($rooms as $donnees2){ //boucle pour avoir le nombre de piece
							if($donnees['house_id'] == $donnees2['home_id']){
								$cpt2++;
								echo(
										
										"<div class='piece'> Pièce $cpt2 </div>"
										."<div id='conteneur2'>"
																			
									);
								
								
								foreach($cemacs as $donnees5){
									
									if($donnees2['id']==$donnees5['room_id'] ){
										
										foreach($devices as $donnees4){
											
											if($donnees4['cemac_id']==$donnees5['id']){
												?>
										
										<div class="element , ecriture3">
										<form method="post" action="index.php?function=supprimer" enctype="multipart/form-data">
										
										
										
											<?php 
											$id1=$donnees4['id'];
											echo("<input type='hidden'"
												."name='id1'" 
												."value='"
												."$id1.'/>"
												);
											?>
		   			
		   									<div class="capteur_ecriture"><?php echo $donnees4['name']; ?></div>
		   			
		   									<img class="capteur" src="..\res\icones\<?php echo $donnees4['device_type_id']; ?>.png">
		   				
		   									<div class="capteur_ecriture">- C ou %</div>
		   				
		   								
		   								<input class="capteur_ecriture" href="#nullepart" type="submit" name="creation_submit" value="Supprimer" /><br><br>
					   
		   								</form>
		   								</div>
										
										
										
										
										<?php
										
										}
									}
								}
							}
							echo "</div>"; 					
							}		
						}
						echo "</div>"; 
						
						
						
						
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
		
