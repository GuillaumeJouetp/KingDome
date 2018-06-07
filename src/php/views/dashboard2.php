<?php
/**
 * VUE DE LA PAGE DASHBOARD
 * User: Olfa
 * En cours
 */
?>


<head>
    <link rel="stylesheet" href="..\src\css\dashboard.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

		function AfficheCache(Id)
			  {
				if (document.getElementById && document.getElementById(Id) != null)
			    {
					if(document.getElementById(Id).style.display=='none') document.getElementById(Id).style.display='block';
					else document.getElementById(Id).style.display='none';
			    }
			  }



		

		</script>
	
	
</head>


<div id=corps>

				
				
										<?php
										
											$own_home = recupereTous($bdd, 'own_home');              /*variables pour recuperer les données de la bdd de own_home, rooms, devices_types, devices, cemacs*/
											$rooms = recupereTous($bdd, 'rooms');
											$device_types = recupereTous($bdd, 'device_types');
											$devices = recupereTous($bdd, 'devices');
											$cemacs = recupereTous($bdd, 'cemacs');
											$homes = recupereTous($bdd, 'homes');
											$datas = recupereTous($bdd, 'datas');
											$cpt=0;													/*compteur utilisés pour les boucles for*/
											$cpt2=0;
											$cpt6=0;
											$id=$_SESSION['user_id'];
											$info=0;
											
											foreach($own_home as $donnees){ /*boucle for 1 pour avoir le nombre de maison*/
												
												if($id == $donnees['user_id']){ /*if 1 on chercher les maisons dans lequelle user_id coorespond a l'id de l'user connecté*/
													$cpt++;
													foreach($homes as $donneesbis ){ /*boucle for 2 pour avoir le nom de la maison*/
														
														if ($donnees['house_id'] == $donneesbis['id']){ /*if 2 on chercher les nom des maisons dans lequelle l'id dans homes correspond a l'house_id dans own_homes*/
															
															$a = $donneesbis['name_home'];

											?>
											

								
											<div class='ecriture1' >     
												<a href='javascript:AfficheCache("Identifiant<?php echo $a;?>")'>
													<?php echo $a; ?>
												</a>
											</div>
											<div id="Identifiant<?php echo $a; ?>">
												<div id='conteneur'>
																	
															
												
											<?php
			
															echo(
																	"<a href='#masque$cpt'>"    /*on affiche le lien pour pouvoir ajouter un capteur dans chaque maison */
																	."<div class='element , ecriture2'> Ajouter un capteur </div>"
																	."</a>"
																	."<div id='masque$cpt'>" 
																	
																	);
									        														
									       ?>
				       
				       
			
			<div class="fenetre-modale">      <!--fenetre modale qui s'affiche pour pouvoir ajouter un capteur son nom et sa pièce -->
			    <a class="fermer" href="#nullepart"><img src="..\res\icones\bouton-fermer.png"class="btn-fermer"/></a>
			    <div class="capt"><br>Ajouter un capteur<br><br></div>
					    
					    
					<form method="post" action="index.php?cible=dashboard&function=ajouter" enctype="multipart/form-data">  <!--form pour ajouter un capteur -->
					    	       
					   	<label> <span class="blanc">Nom :</span>   <br><br> <input type="text" name="nom" required/> </label>  <br><br>  <!--nom du capteur -->
					   	
					   						
					   						
					   						<?php 
					   						
					   						$a=$donnees['house_id'];     /*on sauvegarde l'id de la maison qui n'est pas visible das la page et va etre envoyé dans le formulaire  */
											echo("<input type='hidden'"
												."name='maison'" 
												."value='"
												."$a'/>"
												);
											
											?>
											
											
					    	      	
					   	<label> <span class="blanc">Pièce :</span>  <br><br> </label>   <!--choix de la pièce -->
					    	      	
					   	<select class="custom-dropdown__select custom-dropdown__select--white" name="piece">
					   	
					   	
									   	
									   		<?php						
									   		
									   		$list_id_room=array();	/*array où il y aura les id des pieces de chaque miason  */
									   		foreach($rooms as $donnees2){ /*boucle for 3  pour avoir le nom des pièces */
									   			
									   			if($donnees['house_id'] == $donnees2['home_id']){  /*if 3 on chercher les nom des pièces dans lequelle l'house_id dans own_homes correspond a l'home_id dans rooms*/
													
									   				$cpt2++;
													$list_id_room[]=$donnees2['id']; /*on ajoute alors l'id de la pièce dans l'array */
													$a=$donnees2['name'];
													echo(
														"<span class='blanc'>"    /*on affiche le nom des pièces dans le menu déroulant de la fenêtre modale ajouter un capteur*/
														."<option value='$cpt2'>"
														."$a"
														."</option>"
														."</span>"
													);
				
												} /*fin for 3*/
									   		} /*fin if 3*/
											
											$cpt2=0;
													   		
									  		?>	
					  		
					  						
																	       		
					 	</select><br><br>
					 	
					 	

											<?php      
										
													$b=implode(',',$list_id_room);  
													echo("<input type='hidden'"  /*on sauvegarde l'array avec les id des pièces qui n'est pas visible dans la page et va etre envoyé dans le formulaire  */
														."name='id_piece'" 
														."value='"
														."$b'/>"
														);
																											
											?>
						
						
							
						<label> <span class='blanc'>Type de capteur / effecteur : </span><br><br> </label>    <!--choix du type de capteur -->
					
						   	<select class="custom-dropdown__select custom-dropdown__select--white" name="type_capteur">



											<?php 														/*quel type de capteur*/
												   		
									   		foreach($device_types as $donnees3){  /*boucle for 4 qui va parcourir la table device_types*/
									   			
									   			echo(
									   				"<span class='blanc'>"     /*on affiche le nom capteurs ,qui sont dans la table device_type, dans le menu déroulant de la fenêtre modale ajouter un capteur*/
													."<option>"
													.$donnees3['name']
													."</option>"
									   				."</span>"
													);
									   		}/*fin for 4*/
													   		
									  		?>	
									  		
									  		
									  			       		
							</select><br><br><br>        
							<input id="sendmod" class="fermer" href="#nullepart" type="submit" name="creation_submit" value="Ajouter" /><br><br>
					   
					    </form>								
				</div> <!-- .fenetre-modale -->
			</div> <!-- #masque -->
			
			
			
			      
	    </div>
	    
	    
	    
	   										<?php
	   										
						   					echo "<div class='pieces'>";   /*div qui va permettre d'afficher chaque détail de chaque piece (nom pièce + données de chaque capteur ajoutés */
											$cpt2=0;
											foreach($rooms as $donnees2){   /*boucle for 5  pour avoir le nom des pièces */
												
												if($donnees['house_id'] == $donnees2['home_id']){   /*if 4 on chercher les nom des pièces dans lequelle l'house_id dans own_homes correspond a l'home_id dans rooms*/
													
													$cpt2++;
													$a = $donnees2['name'];
													echo(
															
															"<div class='piece'> $a </div>"  /*on affiche le nom de la pièce*/			
															."<div id='conteneur2'>"
																								
														);
													
													
													//foreach($cemacs as $donnees5){  /*boucle for 6 pour savoir si l'id dans room correspond avec l'id room dans cemac*/	
														
														//if($donnees2['id']==$donnees5['room_id'] ){ /*if 5*/
															$cpt5=0;
															foreach($devices as $donnees4){  //boucle for 7 pour savoir si l'id dans cemac correspond avec l'id cemac dans device
																$cpt5++;
																$cpt6++;
																if($donnees4['room_id']==$donnees2['id']){/*if 6*/
																	
																	
											?>
										
			<div class="element , ecriture3">	 <!-- div de chaque données qui va être afficher -->							
										
				<form method="post" action="index.php?cible=dashboard&function=supprimer" enctype="multipart/form-data">   <!--form pour supprimer un capteur -->
										
										
										
											<?php 
											
											$id1=$donnees4['id'];					/*on sauvegarde l'id de device  qui n'est pas visible das la page et va etre envoyé dans le formulaire  */
											echo("<input type='hidden'"
												."id='id1'"
												."name='id1'" 
												."value='"
												."$id1'/>"
												);
											
											?>										
											
		   			
		   		<input  type="image" src="../res/icones/bouton-fermer.png" class="btn-fermer2" onclick="SubmitFormDataSupprimer();"><br><br> 
				</form>	
											<div class="capteur_ecriture"><?php echo $donnees4['name']; ?></div>     <!--affichage de nom du capteur donné par l'user -->
		   			
		   									<img class="capteur" src="..\res\icones\<?php echo $donnees4['device_type_id']; ?>.png">  <!--affichage de l'image correspondant au capteur-->
		   		  									
		   									
		   									<?php 
		   									foreach($datas as $donnees8){  /*boucle for 7.2 */
		   										if($donnees4['device_type_id']==$donnees8['device_id']){/*if 6.2*/ 
		   											$info=$donnees8['value'];
		   										
		   										}}
											
		   									   									
		   									switch (recherche_device($bdd, $donnees4['device_type_id'])[0]['name']) {    
										            case 'Humidité':
										            	$chaineinfo = (string)$info;
										            	?>
										            	<div class="capteur_ecriture2">  <?php echo substr( $chaineinfo , 0,2).','.substr( $chaineinfo , 2,2); ?> % </div>
														<a href='#masqueA<?php echo $cpt6; ?>'> <div><img class='btn-modifier' src='..\res\icones\modifier.png'/> </div> </a>
										            	<div id='masqueA<?php echo $cpt6; ?>'>
														<?php
															            																												
										            	break;

													 case 'Lampe':
										            	
										            	?>
														
														<form method="post" action="index.php?cible=dashboard&function=donnees" enctype="multipart/form-data" >   <!--form pour supprimer un capteur -->
				
														<div id = "lampe">
																<input href="#nullepart" type="submit" name="lampe" class="lampe" value="ON"><br><br> 
																<input href="#nullepart" type="submit" name="lampe" class="lampe" value="OFF"><br><br>
														</div>

														</form>									
														<a href='#masqueA<?php echo $cpt6; ?>'> <div><img class='btn-modifier' src='..\res\icones\modifier.png'/> </div> </a>
										            	<div id='masqueA<?php echo $cpt6; ?>'>					
										           		<?php
										            	
										            	break;

 													case 'Moteur':
										            	
										            	?>													
										            		<form method="post" action="index.php?cible=dashboard&function=donnees" enctype="multipart/form-data" >   <!--form pour supprimer un capteur -->
															<div id = "moteur">
																<input href="#nullepart" type="image" name="moteur" src="../res/icones/haut.png" class="moteur" value="haut"><br><br> 
																<input href="#nullepart" type="image" name="moteur" src="../res/icones/bas.png" class="moteur" value="bas"><br><br> 
																<input href="#nullepart" type="image" name="moteur" src="../res/icones/stop.png" class="moteur" value="stop"><br><br> 
															</div>															
															</form>	

															<a href='#masqueA<?php echo $cpt6; ?>'> <div><img class='btn-modifier3' src='..\res\icones\modifier.png'/> </div> </a>
										            	<div id='masqueA<?php echo $cpt6; ?>'>

														<?php
										            	
										            	break;

													 case 'Présence':
													 	$chaineinfo = (string)$info;
										            	?>
										            	<div class="capteur_ecriture2"> <?php echo $info; ?> </div>
														<a href='#masqueA<?php echo $cpt6; ?>'> <div><img class='btn-modifier' src='..\res\icones\modifier.png'/> </div> </a>
										            	<div id='masqueA<?php echo $cpt6; ?>'>
														<?php
										            
										            	break;
																							                										                
										            case 'Température':
										            	$chaineinfo = (string)$info;
										            	?>
										            	
										              	<div class="capteur_ecriture2"> <?php echo substr( $chaineinfo , 0,2).','.substr( $chaineinfo , 2,2); ?>  °C </div>
														<a href='#masqueA<?php echo $cpt6; ?>'> <div><img class='btn-modifier' src='..\res\icones\modifier.png'/> </div> </a>
										            	<div id='masqueA<?php echo $cpt6; ?>'>
														<?php
										              
										                break;
										            											            	
										            case 'Luminosité':
										            	$chaineinfo = (string)$info;
										            	?>
										            	
										            	<div class="capteur_ecriture2"> <?php echo substr( $chaineinfo , 0,2).','.substr( $chaineinfo , 2,2); ?>  % </div>
														<a href='#masqueA<?php echo $cpt6; ?>'> <div><img class='btn-modifier' src='..\res\icones\modifier.png'/> </div> </a>
										            	<div id='masqueA<?php echo $cpt6; ?>'>
										            	<?php
										            	
										                break;							
										
										            default :
										            	$chaineinfo = (string)$info;
										            	?>
										            	<div class="capteur_ecriture2"> <?php substr( $chaineinfo , 0,2).','.substr( $chaineinfo , 2,2); ?> </div>
										            	<a href='#masqueA<?php echo $cpt6; ?>'> <div><img class='btn-modifier' src='..\res\icones\modifier.png'/> </div> </a>				
								   							<div id='masqueA<?php echo $cpt6; ?>'>
										            	<?php 
															
										        
		   									}
												?>
													
	
											
								   							
								   							
		   			
			<div class="fenetre-modale">      <!--fenetre modale qui s'affiche pour pouvoir moidifier le nom d'un capteur -->

			    <a class="fermer" href="#nullepart"><img src="..\res\icones\bouton-fermer.png"class="btn-fermer"/></a>
			    <div class="capt"><br>Modifier le capteur<br><br></div>
			    
					    
					<form method="post" action="index.php?cible=dashboard&function=modifier" enctype="multipart/form-data">  <!--form pour modifier un capteur -->
					    	       
					   	<label> <span class="blanc">Nom :</span>   <br><br> <input type="text" name="nom" required/> </label>  <br><br>  <!--nom du capteur -->
					   	
					   	
					   	
					   					  <?php
					   					  
					   					  $id1=$donnees4['id'];					/*on sauvegarde l'id de device  qui n'est pas visible das la page et va etre envoyé dans le formulaire  */
					   					  echo("<input type='hidden'"
					   					  		."id='id1'"
												."name='id1'"
												."value='"
										  		."$id1'/>"
										  		);
											
											?>
					    	      						
						       
						       
						<input class="fermer" href="#nullepart" type="submit" name="creation_submit" value="Modifier"/><br><br>
					   
					 </form>			
				</div> <!-- .fenetre-modale -->
			</div> <!-- #masque -->  								
		</div>	
		
		
		
										   <?php
		   										
										
																}/*fin if 6*/
															}   /*fin for 7*/
																
														//}  /*fin if 5*/
													//}  /*fin for 6*/
													
													if($cpt5==0){  /* if 7 */
														echo(
																"<div class='capt'><br>"					/*s'il n'y a pas de capteur   */
																."Vous n'avez pas encore de capteurs dans cette pièce :-)"
																."</div>"
																);
														
													} /*fin if 7*/
													 echo "</div>";					
												}	/*fin if 4*/
											}  /*fin for 5*/
						
												
					
						
												if($cpt2==0){ /* if 8 */
												echo(
														"<div class='piece'>"		/*s'il n'y a pas de piece   */
														."Pas de pièce"
														."</div>"
														);
											}/*fin if 8*/
											$cpt2=0;
					
											echo "</div>";
											echo "</div>";
															}/*fin if 2*/
														}/*fin for 2*/
													} /*fin if 1*/
												}/*fin for 1*/
											
												
											
											if($cpt==0){
												echo(
														"<div class='ecriture1'>"		/*s'il n'y a pas de maison   */
														."Pas de maison"
														."</div>"
														);
											}
											echo "</div>"
											
											?>
				
		<script>
			setInterval(actualiser(),2000);
			function actualiser(){
				$('.capteurecriture2').load('actualiser.php')
			}

		
		</script>
		
</div> 
		
