		<head>
			<link rel="stylesheet" href="css/accueil.css">
		</head>

<div id="corps">


    <?php
    $reponse_accueil = $bdd->query('SELECT * FROM accueil');
    $accueil = $reponse_accueil->fetch();
    ?>
    
    <!-- Premiere section : nouveaute -->
    <section id="section1">
	    <h1> KingDome - devenez le roi de votre maison !</h1>
		<img src="../res/images/maison_accueil.jpg" id="img_accueil">

        <img src=" <?php echo $_SESSION['avatar'];?>" id="avatar">
    </section>
    
    <!-- Deuxieme section : presentation -->
    <section id="section2">
    	<h1>KingDome, qu'est ce que c'est ?</h1>
        <p> <?php echo $accueil['content'] ?></p></section>
    
    <!-- Troisieme section : video -->
    <section id="section3">
         <iframe width="560" height="315" src="<?php echo $accueil['url'] ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </section>
   
</div>