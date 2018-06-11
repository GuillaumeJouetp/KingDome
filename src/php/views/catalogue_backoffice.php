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

    <a href="#masque0" class="modif">
        <button type="button" class="button_modif">Modifier texte</button>
    </a>

    <div id="masque0">
        <div class="fenetre-modale">
            <a class="fermer" href="#nullepart"><img src="..\res\icones\bouton-fermer.png"class="btn-fermer"/></a>
            <form method="post" action="index.php?cible=catalogue&function=modifier_texte">
                <label>Texte du catalogue :<br><br><textarea rows="25" cols="30" name="texte_catalogue"><?php echo $texte['content'] ?> </textarea> </label><br>
                <button type="submit" class="button_catalogue">Modifier</button>
            </form>

        </div>
    </div>

    <div class="trait_dessus2"></div>

    <div class="acote">

        <?php
        $device_types=recupereTous($bdd, 'device_types');
        $catalog=recupereTous($bdd, 'catalog');
        ?>

        <a href="#masque1" class="modif">
            <button type="button" class="button_modif">Ajouter capteur</button>
        </a>

        <div id="masque1">
            <div class="fenetre-modale">
                <a class="fermer" href="#nullepart"><img src="..\res\icones\bouton-fermer.png"class="btn-fermer"/></a>
                <form method="post" action="index.php?cible=catalogue&function=ajouter_capteur" enctype="multipart/form-data">
                    <label>Image : <input type="file" name="file_image_catalogue"></label> <br>
                    <label>Type de capteur : <select name="type_capteur_catalogue"><?php
                            foreach($device_types as $type_capteur){
                                echo("<option>" .$type_capteur['name'] ."</option>");
                            }
                            ?></select></label><br>
                    <label>Nom : <input type="text" name="nom_capteur" </label><br>
                    <button type="submit" class="button_catalogue">Ajouter</button>
                </form>

            </div>
        </div>

        <a href="#masque2" class="modif">
            <button type="button" class="button_modif">Supprimer capteur</button>
        </a>

        <div id="masque2">
            <div class="fenetre-modale">
                <a class="fermer" href="#nullepart"><img src="..\res\icones\bouton-fermer.png"class="btn-fermer"/></a>
                <form method="post" action="index.php?cible=catalogue&function=supprimer_capteur">
                    <label>Nom du capteur : <select name="nom_capteur_catalogue"><?php
                            foreach ($device_types as $nom_type) {
                                echo("<optgroup label=" . $nom_type['name'] . "></optgroup>");
                                foreach ($catalog as $nom_capteur) {
                                    if ($nom_capteur['device_type_name']==$nom_type['name']){
                                        echo("<option>" . $nom_capteur['name'] . "</option>");
                                    }
                                }
                            }
                            ?></select></label><br><br>
                    <button type="submit" class="button_catalogue">Supprimer</button>
                </form>

            </div>
        </div>

    </div>

    <?php
    $reponse_types = $bdd->query('SELECT * FROM device_types');
    $catalog=recupereTous($bdd, 'catalog');
    $compteur=0;
    while ($types = $reponse_types->fetch())
    {
        echo("<div class='trait_dessus'></div><h2>" . $types['name'] . "</h2>");
        $compteur++;
        echo ("<div id='carrousel$compteur' class='carrousel'><ul>") ;
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


    <div class="trait_dessus"></div>

    <div class="acote">

        <a href="#masque3" class="modif">
            <button type="button" class="button_modif_type">Ajouter type</button>
        </a>

        <div id="masque3">
            <div class="fenetre-modale">
                <a class="fermer" href="#nullepart"><img src="..\res\icones\bouton-fermer.png"class="btn-fermer"/></a>
                <form method="post" action="index.php?cible=catalogue&function=ajouter_type">
                    <label>Nom du type : <input type="text" name="nom_type"> </label> <br>
                    <label>Catégorie : <select name="categorie_type"><option>Capteur</option> <option>Effecteur</option> </select></label><br>
                    <button type="submit" class="button_catalogue">Ajouter</button>
                </form>

            </div>
        </div>

        <a href="#masque4" class="modif">
            <button type="button" class="button_modif_type">Supprimer type</button>
        </a>

        <div id="masque4">
            <div class="fenetre-modale">
                <a class="fermer" href="#nullepart"><img src="..\res\icones\bouton-fermer.png"class="btn-fermer"/></a>
                <form method="post" action="index.php?cible=catalogue&function=supprimer_type">
                    <label>Nom du type : <select name="type_capteur_catalogue"><?php
                            foreach($device_types as $type_capteur){
                                echo("<option>" .$type_capteur['name'] ."</option>");
                            }
                            ?></select></label>
                    <button type="submit" class="button_catalogue">Supprimer</button>
                </form>

            </div>
        </div>

    </div>


    <br><br><br>









