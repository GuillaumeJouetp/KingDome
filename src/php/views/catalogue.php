<head>
    <link rel="stylesheet" href="../src/css/catalogue.css" />

    <title>Test</title>
</head>

<div id="corps">

    <h1>Catalogue</h1>

    <?php
    $reponse_texte = $bdd->query('SELECT * FROM updatable_content WHERE id = 1');
    $texte = $reponse_texte->fetch();
    ?>

    <div class="centrer"><?php echo $texte['content'] ?></div>

    <?php
    $reponse_types = $bdd->query('SELECT * FROM device_types');
    $catalog=recupereTous($bdd, 'catalog');
    $compteur=0;
    while ($types = $reponse_types->fetch())
    {
        echo("<div class='trait_dessus'></div><h2>" . $types['name'] . "</h2>");
        $compteur++;
        echo ("<div class='carrousel' id='carrousel$compteur'><ul>") ;
        foreach($catalog as $catalogue_image)
        {
            if ($catalogue_image['device_type_name']==$types['name']){
                $cata_img = $catalogue_image['url'];
                echo("<li><img src='$cata_img' class='imgborder'/></li>");
            }
        }
        echo("</ul></div>");
    }
    ?>

    <script src="../src/js/catalogue.js"></script>

</div>


