<head>
	<link rel="stylesheet" href="css/panne.css">
</head>
	
	<div id='corps'>
		<h1>Signaler une panne</h1>
		<br>
				
				
			
		    			<form id="panne" action="index.php?cible=panne&function=done" method="post">
							<label> Adresse mail <input type="text" name="mail" required /> </label>
							<label for="Capteur">Sélectionner un capteur :</label>
							<label>
								<select id="Capteur">
									<?php foreach ($nom_capt as $n){
										echo "<option>" . $n . "</option>";
									}?>
								</select>
							</label>
							<label><textarea rows="6" cols="100" name="content" placeholder="Veuillez nous décrire votre panne."></textarea></label>
							<button  type="submit" id="Bouton">Envoyer</button>
		   				</form>

		   			<?php echo "<span class='message'>".$form_message."</span>";?>
		   		
	</div>

	
			

