<head><link rel="stylesheet" href="css/accueil.css"></head>


<div id="corps">

	<p> Page accueilAdmin </p>


	<!-- Graphique : nombres de connexions -->
    <?php include 'js/graphiqueAdmin.php' ;
    echo 'Nombre de pages consultés : '.getNumConsultedPages($bdd).'<br>';
    echo 'Nombre maximum de pages consultés en un jour : '.getMaxConnec($bdd)['visites'].'<br>';
    echo 'Date du record : '.getMaxConnec($bdd)['date'].'<br>';
    echo 'Moyenne de pages consultés depuis toujours : '.getMoy($bdd).'<br>';
    ?>

</div>