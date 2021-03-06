<head>
    <link rel="stylesheet" href="css/accueil.css">
</head>


<div id="corps">

    <h1> Tableau de bord </h1>


    <!-- Graphique : nombres de connexions -->
    <?php include 'js/graphiqueAdmin.php' ?>
    <div class="wrapper">
        <div class="dataWrapper">
            <span class="prefixe"> Trafic d'aujourd'hui </span>
            <span class="data"> <?= getNumConsultedPages($bdd) ?> </span>
        </div>
        <div class="dataWrapper">
            <span class="prefixe"> Trafic record </span>
            <span class="data"> <?= getMaxConnec($bdd)['visites'] ?> </span>
            <span class="petit"> le <?= dateFr(getMaxConnec($bdd)['date']) ?> </span>
        </div>
        <div class="dataWrapper">
            <span class="prefixe"> Trafic moyen </span>
            <span class="data">  <?= round(getMoy($bdd),1) ?> </span>
        </div>
    </div>
    <span class="comment"> Le trafic est exprimé en nombre de pages consultées</span> <br>

    <div class="wrapper2">
        <span class="data2">  <?= getNumInscrits($bdd)[0] ?> </span>
        <span class="prefixe2"> personnes utilisent KingDome !</span>
    </div>

    <button class="showLogs"><a href="index.php?cible=logs"> Show logs </a></button>

</div>