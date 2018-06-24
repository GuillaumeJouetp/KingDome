<head>
	<link rel="stylesheet" href="css/panne.css">
</head>
	
	<div id='corps'>
		<h1>Signaler une panne</h1>
		<br>

			
		    			<form id="panne" action="index.php?cible=panne&function=done" method="post">
							<input type="hidden" name="mail" required value="<?php echo $_SESSION['email'];?>"/>
                            <label>Veuillez indiquer la référence de votre capteur défaillant (vous pourrez la trouver sur la boîte de votre capteur) : <br><input type="text" name='select'></label>
							<label><textarea rows="6" cols="131" name="content" placeholder="Veuillez nous décrire votre panne."></textarea></label>
							<button  type="submit">Envoyer</button>
		   				</form>

		   			<?php echo "<span class='message'>".$form_message."</span>";?>
		   		
	</div>

	
			

