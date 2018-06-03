<?php
/**
 * VUE DE LA PAGE DASHBOARD
 * User: Olfa
 * En cours
 */
?>

<head>
    <link rel="stylesheet" href="..\src\css\dashboard.css">
    
    
   <SCRIPT language="Javascript">
	<!--
	 

	function AfficheCache(Id)
	  {
		if (document.getElementById && document.getElementById(Id) != null)
	    {
			if(document.getElementById(Id).style.display=='none') document.getElementById(Id).style.display='block';
			else document.getElementById(Id).style.display='none';
	    }
	  }
	 
	//-->
	</SCRIPT>
    
    

</head>




	<div id=corps>
	
		<div class="ecriture1">
	    	<a href='javascript:AfficheCache("Identifiant")'>	Maison 1  </a>
	    
	    </div>
	    <div id="Identifiant">
		<div id="conteneur">
			<a href="#masque">
				<div> Ajouter un capteur </div>
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
			      
	    </div>
	    
	    <div class="pieces">
	        <div class="piece"> Pièce 1 </div>
	        	
	        
	        		
	        		<div id="conteneur2">
		   			<div class="element , ecriture3">
		   			
		   				<div class="capteur_ecriture">Humidité</div>
		   			
		   				<img class="capteur" src="..\res\icones\humidité.png">
		   				
		   				<div class="capteur_ecriture">30%</div>
		   				
		   			</div>
		   			
		   			
	 				<div class="element , ecriture3">
		   			
		   				<div class="capteur_ecriture">Luminosité</div>
		   			
		   				<img class="capteur" src="..\res\icones\luminosité.png">
		   				
		   				<div class="capteur_ecriture">30%</div>
		   				
		   			</div>
		   			
		   			<div class="element , ecriture3">
		   			
		   				<div class="capteur_ecriture">Température</div>
		   			
		   				<img class="capteur" src="..\res\icones\température.png">
		   				
		   				<div class="capteur_ecriture">15°C</div>
		   				
		   			</div>
		   			
		   			<div class="element , ecriture3">
		   			
		   				<div class="capteur_ecriture">Température</div>
		   			
		   				<img class="capteur" src="..\res\icones\température.png">
		   				
		   				<div class="capteur_ecriture">15°C</div>
		   				
		   			</div>
	 			
	   </div>
	        	
	        	<div class="piece"> Pièce 2 </div>
	        	
	        	<div id="conteneur2">
	        	
		   			<div class="element , ecriture3">Texte</div>
	 				<div class="element , ecriture3">Texte</div>
	 				<div class="element , ecriture3">Texte</div>
	 				<div class="element , ecriture3">Texte</div>
	 				<div class="element , ecriture3">Texte</div>
	 				
	 				<div class="element , ecriture3">Texte</div>
	 			
	    		</div>
	    </div>   
	    		
       	
	    </div>
	    
	    
	    
	    
	    
	    
	    
	    
	    <div class="ecriture1">
	    	<a href='javascript:AfficheCache("Identifiant2")'>	Maison 1  </a>
	    
	    </div>
	    <div id="Identifiant2">
		<div id="conteneur">
			<a href="#masque">
				<div> Ajouter un capteur </div>
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
			      
	    </div>
	    
	    <div class="pieces">
	        <div class="piece"> Pièce 1 </div>
	        	
	        
	        		
	        		<div id="conteneur2">
		   			<div class="element , ecriture3">
		   			
		   				<div class="capteur_ecriture">Humidité</div>
		   			
		   				<img class="capteur" src="..\res\icones\humidité.png">
		   				
		   				<div class="capteur_ecriture">30%</div>
		   				
		   			</div>
		   			
		   			
	 				<div class="element , ecriture3">
		   			
		   				<div class="capteur_ecriture">Luminosité</div>
		   			
		   				<img class="capteur" src="..\res\icones\luminosité.png">
		   				
		   				<div class="capteur_ecriture">30%</div>
		   				
		   			</div>
		   			
		   			<div class="element , ecriture3">
		   			
		   				<div class="capteur_ecriture">Température</div>
		   			
		   				<img class="capteur" src="..\res\icones\température.png">
		   				
		   				<div class="capteur_ecriture">15°C</div>
		   				
		   			</div>
		   			
		   			<div class="element , ecriture3">
		   			
		   				<div class="capteur_ecriture">Température</div>
		   			
		   				<img class="capteur" src="..\res\icones\température.png">
		   				
		   				<div class="capteur_ecriture">15°C</div>
		   				
		   			</div>
	 			
	   </div>
	        	
	        	<div class="piece"> Pièce 2 </div>
	        	
	        	<div id="conteneur2">
	        	
		   			<div class="element , ecriture3">Texte</div>
	 				<div class="element , ecriture3">Texte</div>
	 				<div class="element , ecriture3">Texte</div>
	 				<div class="element , ecriture3">Texte</div>
	 				<div class="element , ecriture3">Texte</div>
	 				
	 				<div class="element , ecriture3">Texte</div>
	 			
	    		</div>
	    </div>   
	    		
       	
	    </div>
	</div>

	
	
	

