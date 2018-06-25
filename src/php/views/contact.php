<head><link rel="stylesheet" href="css/contact.css"></head>

<div id ='corps'>

<h1>Nous contacter</h1>

    <?php if(isUserConnected()) { ?>
	
	<button id="jobutton">
            <a href="index.php?cible=panne">
            Signaler une panne
            </a>
    </button>

     <?php } ?>
	

    <form id="f1" action="index.php?cible=contact&function=done" method="post">
        <label> Adresse mail <input type="text" name="mail" required /> </label>
        <?php echo "<span class='errormessage'>".$mail_message."</span>"; ?>
        <label> Objet du message <input type="text" name="object" required /> </label>
        <label> <textarea rows = "6" cols = "100" name = "content" placeholder="Veuillez nous exposer votre requête<?php if(isUserConnected()) { ?>, dans le cas d'une panne, référez-vous à l'onglet 'Signaler une panne'<?php } ?> "></textarea>  </label>
        <button type="submit"> Envoyer </button>
    </form>

<?php echo "<span class='message'>".$form_message."</span>";

?>

</div>

