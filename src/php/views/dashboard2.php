<?php
/**
 * VUE DE LA PAGE DASHBOARD
 * User: Olfa
 * En cours
 */
?>


<head>
    <link rel="stylesheet" href="..\src\css\dashboard.css"> 
	<!-- <meta http-equiv="refresh" content="10">-->
<script>

		function AfficheCache(Id)
			  {
				if (document.getElementById && document.getElementById(Id) != null)
			    {
					if(document.getElementById(Id).style.display=='none') document.getElementById(Id).style.display='block';
					else document.getElementById(Id).style.display='none';
			    }
			  }
		/*function loadNowPlaying(){
		  $("#refresh").load("index?cible=dashboard #refresh");
		}
		,
	                    
		setInterval(function(){loadNowPlaying()}, 350000);

		


		$(document).ready(function(){

		    $("#submit_ajouter").click(function{

		    	  $.post(
				    	  'index.php?cible=dashboard&function=ajouter',
		                    
	                    {
		                nom : $("#nom").val(), 
		                ref : $("#ref").val(),
		                maison : $("#maison").val(),
		                piece : $("#piece").val(),
		                id_piece : $("#id_piece").val(),
		                type_capteur : $("#type_capteur").val()
		                
		                },
		                );
		    	 return false; // permet de ne pas recharger la page 
		    });

		});		*/	



		






</script>
	
	
</head>


<div id='corps'>
<div id='refresh'>		
			
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
												<a href='javascript:AfficheCache("Identifiant<?php echo $cpt;?>")'>
													<?php echo $a; ?>
												</a>
											</div>
											
											<div id="Identifiant<?php echo $cpt; ?>">
												<div id='conteneur'>
																	
														
												
											<?php
			
															echo(
																	 	
																	"<a href='#masque$cpt'>"    /*on affiche le lien pour pouvoir ajouter un capteur dans chaque maison */
																	."<div class='element , ecriture2'> Ajouter un capteur ou un effecteur </div>"
																	."</a>"
																	."<div id='masque$cpt'>" 
																	
																	);
									        														
									       ?>
				       
				       
			
			<div class="fenetre-modale">      <!--fenetre modale qui s'affiche pour pouvoir ajouter un capteur son nom et sa pièce -->
			    <a class="fermer" href="#nullepart"><img src="..\res\icones\bouton-fermer.png"class="btn-fermer"/></a>
			    <div class="capt"><br>Ajouter un capteur ou un effecteur<br><br></div>
					    
					    
					<form enctype="multipart/form-data" method="post" action="index.php?cible=dashboard&function=ajouter">  <!--form pour ajouter un capteur -->
					    	       
					   	<label> <span class="blanc">Nom :</span>   <br><br> <input type="text" name="nom" id="nom" maxlength="12" required/> </label>  <br><br>  <!--nom du capteur -->
					   	
					   	<label> <span class="blanc">Numéro capteur :</span>   <br><br> <input type="number" name="ref" id="ref" required/> </label>  <br><br>  <!--nom du capteur -->
					   						
					   						
					   						<?php 
					   						
					   						$a=$donnees['house_id'];     /*on sauvegarde l'id de la maison qui n'est pas visible das la page et va etre envoyé dans le formulaire  */
											echo("<input type='hidden'"
												."name='maison'" 
												."id='maison'"
												."value='"
												."$a'/>"
												);
											
											?>
											
											
					    	      	
					   	<label> <span class="blanc">Pièce :</span>  <br><br> </label>   <!--choix de la pièce -->
					    	      	
					   	<select class="custom-dropdown__select custom-dropdown__select--white" name="piece" id="piece">
					   	
					   	
									   	
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
														."id='id_piece'"
														."value='"
														."$b'/>"
														);
																											
											?>
						
						
							
						<label> <span class='blanc'>Type de capteur / effecteur : </span><br><br> </label>    <!--choix du type de capteur -->
					
						   	<select class="custom-dropdown__select custom-dropdown__select--white" name="type_capteur" id="type_capteur">
						   	
								</span>
								<span class='blanc'><optgroup label="CAPTEURS">
								</span>


											<?php 														/*quel type de capteur*/
												   		
									   		foreach($device_types as $donnees3){  /*boucle for 4 qui va parcourir la table device_types*/
									   			if($donnees3['sens_or_eff']==0){
									   			echo(
									   				"<span class='blanc'>"     /*on affiche le nom capteurs ,qui sont dans la table device_type, dans le menu déroulant de la fenêtre modale ajouter un capteur*/
													."<option>"
													.$donnees3['name']
													."</option>"
									   				."</span>"
													);
									   			}}/*fin for 4*/
									   			?>
						</optgroup>			   			
						<span class='blanc'><optgroup label="EFFECTEURS">
						</span>
									   			<?php								/*quel type d'effecteur*/
									   			foreach($device_types as $donnees3){  /*boucle for 4 qui va parcourir la table device_types*/
									   				if($donnees3['sens_or_eff']==1){
									   					echo(
									   							"<span class='blanc'>"     /*on affiche le nom capteurs ,qui sont dans la table device_type, dans le menu déroulant de la fenêtre modale ajouter un capteur*/
									   							."<option>"
									   							.$donnees3['name']
									   							."</option>"
									   							."</span>"
									   							);
									   				}}/*fin for 4*/
													   		
									  		?>	
							</optgroup>		  		
										  		
									  			       		
							</select><br><br><br>        
							<input id="submit_ajouter" class="fermer"  type="submit" name="submit_ajouter" value="Ajouter" /><br><br>
					   
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
																
																$cpt6++;
																if($donnees4['room_id']==$donnees2['id']){/*if 6*/
																	$cpt5++;
																	
																	
											?>
										
			<div class="element , ecriture3">	 <!-- div de chaque données qui va être afficher -->							
				<form method="post"  action="index.php?cible=dashboard&function=supprimer" enctype="multipart/form-data" >   <!--form pour supprimer un capteur -->
										
										
										
											<?php 
											
											$id1=$donnees4['id'];					/*on sauvegarde l'id de device  qui n'est pas visible das la page et va etre envoyé dans le formulaire  */
											echo("<input type='hidden'"
												."id='id1'"
												."name='id1'" 
												."value='"
												."$id1'/>"
												);
											
											?>										
											
		   			
		   		<input  type="image" src="../res/icones/bouton-fermer.png" class="btn-fermer2"><br><br> 
				</form>	
											<div class="divent">
											<div class="capteur_ecriture"><?php echo $donnees4['name']; ?></div>     <!--affichage de nom du capteur donné par l'user -->
		   			
		   									<img class="capteur" src="..\res\icones\<?php echo $donnees4['device_type_id']; ?>.png">  <!--affichage de l'image correspondant au capteur-->
		   									
		   									<?php 
		   									
		   									if($donnees4['state']==0){
		   										?>
		   										<div class="capteur_ecriture2">Capteur non actif</div>
		   										<a href='#masqueA<?php echo $cpt6; ?>'> <div><img class='btn-modifier' src='..\res\icones\modifier.png'/> </div> </a>
										        <div id='masqueA<?php echo $cpt6; ?>'>
		   										<?php
		   										
		   									}
		   									else{
		   									switch (recherche_device($bdd, $donnees4['device_type_id'])[0]['name']) {    
										            case 'Humidité': 	
														foreach($datas as $donnees8){  /*boucle for 7.2 */
															if($donnees4['ref']==$donnees8[3]){/*if 6.2*/
																	$resultat="Non connecté";
																	break;
																	
																
																
					   										}
															else{
																$resultat="Non connecté";
															}
					   									}
													    
										            	?>
										            	<div class="capteur_ecriture2">  <?php echo $resultat; ?> </div>
														<a href='#masqueA<?php echo $cpt6; ?>'> <div><img class='btn-modifier' src='..\res\icones\modifier.png'/> </div> </a>
										            	<div id='masqueA<?php echo $cpt6; ?>'>
														<?php
															            																												
										            	break;

													 case 'Lampe':
										            	
										            	?>
														<a name='formulaire_donnes<?php echo $cpt6; ?>' ></a>
														<form method="post" action="index.php?cible=dashboard&function=donnees#formulaire_donnes<?php echo $cpt6; ?>" enctype="multipart/form-data" >   <!--form pour supprimer un capteur -->
				
														<div id = "lampe">
																<input href="#nullepart" type="submit" name="lampe" class="lampe" value="ON"><br><br> 
																<input href="#nullepart" type="submit" name="lampe" class="lampe" value="OFF"><br><br>
														</div>
														
																		<?php 
															
															$ref_lampe=$donnees4['device_type_id'];					/*on sauvegarde l'id de device  qui n'est pas visible das la page et va etre envoyé dans le formulaire  */
															echo("<input type='hidden'"
																."id='ref_lampe'"
																."name='ref_lampe'" 
																."value='"
																."$ref_lampe'/>"
																);
															
															?>	

														</form>									
														<a href='#masqueA<?php echo $cpt6; ?>'> <div><img class='btn-modifier' src='..\res\icones\modifier.png'/> </div> </a>
										            	<div id='masqueA<?php echo $cpt6; ?>'>					
										           		<?php
										            	
										            	break;

 													case 'Moteur':
										            	
										            	?>	
										            		<a name='formulaire_donnees2<?php echo $cpt6; ?>' ></a>												
										            		<form method="post" action="index.php?cible=dashboard&function=donnees2#formulaire_donnees2<?php echo $cpt6; ?>" enctype="multipart/form-data" >   <!--form pour supprimer un capteur -->
															<div id = "moteur">
																<input href="#nullepart" type="image" name="moteur" src="../res/icones/haut.png" class="moteur" value="haut"><br><br> 
																<input href="#nullepart" type="image" name="moteur" src="../res/icones/bas.png" class="moteur" value="bas"><br><br> 
																<input href="#nullepart" type="image" name="moteur" src="../res/icones/stop.png" class="moteur" value="stop"><br><br> 
															</div>
																<?php 
															
															$ref_mot=$donnees4['device_type_id'];					/*on sauvegarde l'id de device  qui n'est pas visible das la page et va etre envoyé dans le formulaire  */
															echo("<input type='hidden'"
																."id='ref_mot'"
																."name='ref_mot'" 
																."value='"
																."$ref_mot'/>"
																);
															
															?>	
																														
															</form>	

															<a href='#masqueA<?php echo $cpt6; ?>'> <div><img class='btn-modifier3' src='..\res\icones\modifier.png'/> </div> </a>
										            	<div id='masqueA<?php echo $cpt6; ?>'>

														<?php
										            	
										            	break;

													 case 'Présence':
										
													 	foreach($datas as $donnees8){  /*boucle for 7.2 */
													 		if($donnees4['ref']==$donnees8[3]){/*if 6.2*/
													 			if(val_trame($bdd,$donnees4['ref'])[1]<10){
													 				$info=val_trame($bdd,$donnees4['ref'])[0];
													 				if($info>700 && $info<=1000){
													 				$resultat="Il y a quelqu'un";
													 				break;
													 			}
													 			if ($info>1000 && $info<3000){
													 				$resultat="Il n'y a personne";
													 				break;
													 			}
													 			
													 			
													 			}}
													 		else{
													 			$resultat="Non connecté";
													 		}
													 	}
													 	
													 	?>
										            	<div class="capteur_ecriture2">  <?php echo $resultat; ?> </div>
														<a href='#masqueA<?php echo $cpt6; ?>'> <div><img class='btn-modifier' src='..\res\icones\modifier.png'/> </div> </a>
										            	<div id='masqueA<?php echo $cpt6; ?>'>
														<?php
															            																												
										            	break;
																							                										                
										            case 'Température':

										            	foreach($datas as $donnees8){  /*boucle for 7.2 */
										            		if($donnees4['ref']==$donnees8[3]){/*if 6.2*/
										            			$resultat="Non connecté";
										            			break;
										            			
										            			
										            			
										            		}
										            		else{
										            			$resultat="Non connecté";
										            		}
										            	}
										            	
										            	?>
										            	<div class="capteur_ecriture2">  <?php echo $resultat; ?> </div>
														<a href='#masqueA<?php echo $cpt6; ?>'> <div><img class='btn-modifier' src='..\res\icones\modifier.png'/> </div> </a>
										            	<div id='masqueA<?php echo $cpt6; ?>'>
														<?php
															            																												
										            	break;
										            											            	
										            case 'Luminosité':
										            	foreach($datas as $donnees8){  /*boucle for 7.2 */
										            		if($donnees4['ref']==$donnees8[3]){/*if 6.2*/
										            			if(val_trame($bdd,$donnees4['ref'])[1]<10){
										            			$info=val_trame($bdd,$donnees4['ref'])[0];
										            			$info2=number_format(100*$info/3000,1);
										            			$resultat = $info2. '%';
										            			break;
										            			
										            			}}
										            		else{
										            			$resultat="Non connecté";
										            		}
										            	}
										            	
										            	?>
										            	<div class="capteur_ecriture2">  <?php echo $resultat; ?> </div>
														<a href='#masqueA<?php echo $cpt6; ?>'> <div><img class='btn-modifier' src='..\res\icones\modifier.png'/> </div> </a>
										            	<div id='masqueA<?php echo $cpt6; ?>'>
														<?php
															            																												
										            	break;
										
										            default :
										            	foreach($datas as $donnees8){  /*boucle for 7.2 */
										            		if($donnees4['ref']==$donnees8[3]){/*if 6.2*/
										            			$resultat="Non connecté";
										            			break;
										            			
										            			
										            			
										            		}
										            		else{
										            			$resultat="Non connecté";
										            		}
										            	
					   									}
													    
										            	?>
										            	<div class="capteur_ecriture2">  <?php echo $resultat; ?> </div>
														<a href='#masqueA<?php echo $cpt6; ?>'> <div><img class='btn-modifier' src='..\res\icones\modifier.png'/> </div> </a>
										            	<div id='masqueA<?php echo $cpt6; ?>'>
														<?php 
															
										        
		   									}}
		 												?>
							   							
		   	<a name='formulaire_modifier<?php echo $cpt6; ?>' ></a>		
			<div class="fenetre-modale">      <!--fenetre modale qui s'affiche pour pouvoir moidifier le nom d'un capteur -->

			    <a class="fermer" href="#nullepart"><img src="..\res\icones\bouton-fermer.png"class="btn-fermer"/></a>
			    <div class="capt"><br>Modifier le capteur<br><br></div>
			    
					    
					<form method="post" action="index.php?cible=dashboard&function=modifier#formulaire_modifier<?php echo $cpt6; ?>" enctype="multipart/form-data">  <!--form pour modifier un capteur -->
					    	       
					   	<label> <span class="blanc">Nom :</span>   <br><br> <input type="text" name="nom" maxlength="12" value="<?php echo $donnees4['name']; ?>" required/> </label>  <br><br>  <!--nom du capteur -->
					   	
					   	
					   	
					   					  <?php
					   					  
					   					  $id1=$donnees4['id'];					/*on sauvegarde l'id de device  qui n'est pas visible das la page et va etre envoyé dans le formulaire  */
					   					  echo("<input type='hidden'"
					   					  		."id='id1'"
												."name='id1'"
												."value='"
										  		."$id1'/>"
										  		);
											
											?>
					    <label> <span class="blanc">Numéro capteur :</span>   <br><br> <input type="number" name="ref" value="<?php echo $donnees4['ref']; ?>" required/> </label>  <br><br>  <!--nom du capteur -->
					   	
					    	      						
						 <label> <span class="blanc">Etat du capteur :</span>  <br><br>  

							<input type="radio" name="etat" value="actif" checked="checked" required> Actif
							<input type="radio" name="etat" value="non_actif" required> Non actif  </label>  <br><br>  
						       
						<input class="fermer" href="#nullepart" type="submit" name="creation_submit" value="Modifier"/><br><br>
				   
					 </form>			
				</div> <!-- .fenetre-modale -->
			</div> <!-- #masque -->
							
		 	</div>							
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
														."Vous n'avez pas encore de pièces dans cette maison, <a class='lien' href='index?cible=monCompte'> cliquez ici</a>  pour en ajouter :-)"
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
														."Vous n'avez pas encore de maisons, <a class='lien' href='index?cible=monCompte'>cliquez ici</a> pour en ajouter :-)"
														."</div>"
														);
											}
											echo "</div>"
											
											?>
				

		
</div>
</div>

	
