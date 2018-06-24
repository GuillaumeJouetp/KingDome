		<head>
			<link rel="stylesheet" href="css/accueil.css">
		</head>

<div id="corps">


    <?php
    $reponse_accueil = $bdd->query('SELECT * FROM accueil');
    $accueil = $reponse_accueil->fetch();
    $youtube=$accueil['url'];
    ?>
    
    <!-- Premiere section : nouveaute -->
    <section id="section1">
	    <h1> KingDome - devenez le roi de votre maison !</h1>
        <?php if ($accueil['image']!=null){?>
		<img src="<?php echo $accueil['image'] ?>" id="img_accueil">
        <?php } ?>

        <!-- <img src=" <?php // echo $_SESSION['avatar'];?>" id="avatar"> -->
    </section>
    
    <!-- Deuxieme section : presentation -->
    <section id="section2">
    	<h1>KingDome, qu'est ce que c'est ?</h1>
        <p> <?php echo $accueil['content'] ?></p></section>
    
    <!-- Troisieme section : video -->
    <section id="section3">
        <?php if ($youtube!=null){ ?>
         <iframe width="560" height="315" src="<?php echo Youtube_video ($youtube) ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        <?php } ?>
    </section>
   
</div>