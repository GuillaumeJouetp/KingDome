<head><link rel="stylesheet" href="css/contact.css"></head>

<div id ='corps'>
    <form id="f1" action="index.php?cible=contact&function=done" method="post">
        <label> Adresse mail <input type="text" name="mail" required /> </label>
        <label> Objet du message <input type="text" name="objet" required /> </label>
        <label> <textarea rows = "6" cols = "100" name = "myTextArea" placeholder="Veuillez nous exposer votre requête, dans le cas d'une panne, référez-vous à l'onglet 'Signaler une panne' "></textarea>  </label>
        <button type="submit" name="mySubmit"> Envoyer </button>
    </form>

<?php
echo "<span class='message'>".$message."</span>"; ?>

</div>

