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
						"<div class='ecriture1'>"      /*on affiche la maison avec son num*/
						.'<img class="fleche" src="..\res\icones\fleche_bas.png">'
						."Maison $cpt"
						."</div>"
						);
				
	?>
			
		<div id="conteneur">
			
		<?php
		
			echo(
					"<a href='#masque$cpt'>"    /*on affiche le lien pour pouvoir ajouter un capteur */
					."<div class='element , ecriture2'> Ajouter un capteur </div>"
					."</a>"
					
					
					."<div id='masque$cpt'>" 
					
					);
        	
				
       ?>
			
			<div class="fenetre-modale">      <!--fenetre modale qui s'affiche pour pouvoir ajouter un capteur son nom et sa pièce -->
			    <a class="fermer" href="#nullepart"><img src="..\res\icones\bouton-fermer.png"class="btn-fermer"/></a>
			    <div class="capt"><br>Ajouter un capteur<br><br></div>
					    
					    
					<form method="post" action="index.php?cible=dashboard&function=ajouter" enctype="multipart/form-data">  <!--form pour ajouter un capteur -->
					    	       
					   	<label> Nom :  <br><br> <input type="text" name="nom" required/> </label>  <br><br>  <!--nom du capteur -->
					   	
					   	<?php 
					   						$a=$donnees['house_id'];     /*on suavegarde l'id de la maison qui va etre envoyé dans le formulaire  */

											echo("<input type='hidden'"
												."name='maison'" 
												."value='"
												."$a'/>"
												);
											?>
					    	      	
					   	<label> Pièce :  <br><br> </label>
					    	      	
					   	<select class="custom-dropdown__select custom-dropdown__select--white" name="piece">
									   	
					   		<?php																					/*num de a piece */
							$list_id_room=array();	   		
					   		foreach($rooms as $donnees2){ //boucle pour avoir le nombre de piece
					   			if($donnees['house_id'] == $donnees2['home_id']){
									$cpt2++;
									$list_id_room[]=$donnees2['id'];
									echo(
						   				
										"<option>"
										."Pièce $cpt2"
										."</option>"
									);

								}
					   		}
							
							$cpt2=0;
									   		
					  		?>					
																	       		
					 	</select><br><br>

						<?php
								$b=implode(',',$list_id_room);   /*on suavegarde une liste de l'id de chaque piece dans le deroulant qui va etre envoyé dans le formulaire  */
								echo("<input type='hidden'"
									."name='id_piece'" 
									."value='"
									."$b'/>"
									);
							
											
						?>
							
						<label> Type de capteur :  <br><br> </label>
					
						   	<select class="custom-dropdown__select custom-dropdown__select--white" name="type_capteur">

							<?php 														/*quel type de capteur*/
								   		
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
								
								$cpt5=0;
								foreach($cemacs as $donnees5){  //boucle pour savoir si l'id dans room correspond avec l'id room dans cemac
									
									
									if($donnees2['id']==$donnees5['room_id'] ){
										
										foreach($devices as $donnees4){  //boucle pour savoir si l'id dans cemac correspond avec l'id cemac dans device
											
											
											if($donnees4['cemac_id']==$donnees5['id']){
												$cpt5=1;
												?>
										
										<div class="element , ecriture3">
										<form method="post" action="index.php?cible=dashboard&function=supprimer" enctype="multipart/form-data">   <!--form pour supprimer un capteur -->
										
										
										
											<?php 
											$id1=$donnees4['id'];					/*on sauvegarde l'id de device qui est à supprimer  */
											echo("<input type='hidden'"
												."name='id1'" 
												."value='"
												."$id1.'/>"
												);
											?>
		   			
		   									<div class="capteur_ecriture"><?php echo $donnees4['name']; ?></div>     <!--affichage des capteurs -->
		   			
		   									<img class="capteur" src="..\res\icones\<?php echo $donnees4['device_type_id']; ?>.png">
		   				
		   									<div class="capteur_ecriture"> --- </div>
		   				
		   								
		   								<input class="capteur_ecriture" href="#nullepart" type="submit" name="creation_submit" value="Supprimer" /><br><br>
					   
		   								</form>
		   								</div>

									
										<?php
										
										}
									}
								}
							}
							if($cpt5==0){
								echo(
										"<div class='capt'><br>"					/*s'il n'y a pas de capteur   */
										."Pas de capteur"
										."</div>"
										);
								
							}
							 echo "</div>";					
							}		
						}
						
						
					
						
						if($cpt2==0){
							echo(
									"<div class='piece'>"		/*s'il n'y a pas de piece   */
									."Pas de pièce"
									."</div>"
									);
						}
						$cpt2=0;
					
		echo "</div>"; 

			}
		}
		
		
		
		if($cpt==0){
			echo(
					"<div class='ecriture1'>"		/*s'il n'y a pas de maison   */
					."Pas de maison"
					."</div>"
					);
		}
		?>
</div> 
		
