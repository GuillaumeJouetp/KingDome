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

<body>
	<div id=corps>
			<div class="ecriture1">
				<img class="fleche" src="..\res\icones\fleche_bas.png">
	    		Maison 1
	    	</div>
			<div id="conteneur">
		   		<div class="element , ecriture2">Ajouter un capteur</div>
		   		
							   		<p><a href="#masque">Afficher la fenêtre modale</a></p>
					<div id="masque">
					  <div class="fenetre-modale">
					    <a class="fermer" href="#nullepart"><img alt="Bouton fermer la fenêtre" 
						  title="Fermer la fenêtre" class="btn-fermer" 
						  src="images/fmodale_fermer.png" /></a>
					    <img alt="Logo CSS3" class="bombe" src="images/css3.jpg" />
					    <h2>Fenêtre modale</h2>
					    <p>Voici ... </p>
					    <p>Remarquez ... </p>
					  </div> <!-- .fenetre-modale -->
					</div> <!-- #masque -->
		   		
		   		
		   		
		   		
		   		
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
	        	<div class="piece">
	        		Pièce 1
	        	</div>
	        	
	        	<div id="conteneur">
	        	
		   		<div class="element , ecriture3">Texte</div>
	 			<div class="element , ecriture3">Texte</div>
	 			<div class="element , ecriture3">Texte</div>
	 			
	    		</div>
	        	
	        	<div class="piece">
	        		Pièce 2
	        	</div>
	        	
	        	<div id="conteneur">
	        	
		   		<div class="element , ecriture3">Texte</div>
	 			<div class="element , ecriture3">Texte</div>
	 			<div class="element , ecriture3">Texte</div>
	 			
	    		</div>
	        	
	        </div>
	        
					 

	     </div>

</body>
</html>