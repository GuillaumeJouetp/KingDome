<head>
	<link rel="stylesheet" href="css/panne.css">
</head>
	
	<div id='corps'>
		<h1>Signaler une panne</h1>
		<br>

			
		    			<form id="panne" action="index.php?cible=panne&function=done" method="post">
							<input type="hidden" name="mail" required value="<?php echo $_SESSION['email'];?>"/>
							<label for="Capteur">Sélectionner la référence de votre capteur défaillant :</label>
							<label>
								<select id="Capteur" name='select'>
									<?php 
									$donnees=recupereTous($bdd, 'devices');
									foreach ($donnees as $d){
									    $nom_capt=$d['ref'];
										echo "<option>" . $nom_capt . "</option>";
									}?>
								</select>
							</label>
							<label><textarea rows="6" cols="131" name="content" placeholder="Veuillez nous décrire votre panne."></textarea></label>
							<button  type="submit">Envoyer</button>
		   				</form>

		   			<?php echo "<span class='message'>".$form_message."</span>";?>
		   		
	</div>

	
			

