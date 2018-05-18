<head>
    <link rel="stylesheet" href="../src/css/catalogue.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

    <title>Test</title>
</head>

<div id="corps">

    <h1>Catalogue</h1>

    <?php
    $reponse_texte = $bdd->query('SELECT * FROM updatable_content WHERE id = 1');
    $texte = $reponse_texte->fetch()
 ?>
    <div class="centrer"><?php echo $texte['content'] ?></div>



    <a href="#masque" class="modif">
        <button type="button" class="button_modif_texte">Modifier le texte</button>
    </a>

    <div id="masque">
        <div class="fenetre-modale">
            <a class="fermer" href="#nullepart"><img src="..\res\icones\bouton-fermer.png"class="btn-fermer"/></a>
            <form method="post" action="index.php?cible=catalogue&function=modifier_texte">
                <label>Texte du catalogue : <br> <br> <textarea rows="30" cols="35" name="texte_catalogue"><?php echo $texte['content'] ?> </textarea> </label>
                <button type="submit" class="button">Modifier</button>
            </form>

        </div>
    </div>

<?php
    $reponse_types = $bdd->query('SELECT * FROM device_types');
    $numero_device = 0;

    while ($types = $reponse_types->fetch())
    {
        $numero_device ++;
?>
        <div class="trait_dessus"></div>

        <h2> <?php echo $types['name']; ?> </h2>

        <?php /*
            $reponse_liste_images = $bdd->query('SELECT * FROM devices WHERE device_type_id = $numero_device');
            while ($liste_images = $reponse_liste_images->fetch())
            {

            }

        */?>

        <a href="#masque1" class="modif">
            <button type="button" class="button_modif_capteur">Ajouter un capteur</button>
        </a>

        <div id="masque1">
            <div class="fenetre-modale">
                <a class="fermer" href="#nullepart"><img src="..\res\icones\bouton-fermer.png"class="btn-fermer"/></a>
                <form method="post" action="../src/php/controllers/catalogue.php">
                    <label>Lien de l'image : <br><br> <input type="file"></label> <br>
                    <button type="button" class="button">Ajouter</button>
                </form>

            </div>
        </div>


        <?php
    }
$reponse_types->closeCursor();
        ?>



    <br><br><br><br>










    <div class="trait_dessus"></div>

    <h2>Capteur de température</h2>

    <div class="conteneur">

        <div id="carrousel">
            <ul>
                <li><img src="../res/images/Catalogue/Température/Capteur1.png"  class="imgborder" /></li>
                <li><img src="../res/images/Catalogue/Température/Capteur2.png"  class="imgborder" /></li>
                <li><img src="../res/images/Catalogue/Température/Capteur3.png"  class="imgborder" /></li>
            </ul>
        </div>

        <script src="../src/js/Catalogue.js"></script>

        <a href="#masque1" class="modif">
            <button type="button" class="button_modif_capteur">Ajouter un capteur</button>
        </a>

        <div id="masque1">
            <div class="fenetre-modale">
                <a class="fermer" href="#nullepart"><img src="..\res\icones\bouton-fermer.png"class="btn-fermer"/></a>
                <form>
                    <label>Lien de l'image : <br><br> <input type="file"></label> <br>
                    <button type="button" class="button">Ajouter</button>
                </form>

            </div>
        </div>

    </div>

    <div class="trait_dessus"></div>

    <h2>Capteur d'humidité</h2>

    <div class="conteneur2">

        <div id="carrousel2">
            <ul>
                <li><img src="../res/images/Catalogue/Humidité/Capteur1.png"  class="imgborder" /></li>
                <li><img src="../res/images/Catalogue/Humidité/Capteur2.png"  class="imgborder" /></li>
                <li><img src="../res/images/Catalogue/Humidité/Capteur3.png"  class="imgborder" /></li>
            </ul>
        </div>

        <script src="../src/js/Catalogue2.js"></script>

        <a href="#masque12" class="modif">
            <button type="button" class="button_modif_capteur">Ajouter un capteur</button>
        </a>

        <div id="masque2">
            <div class="fenetre-modale">
                <a class="fermer" href="#nullepart"><img src="..\res\icones\bouton-fermer.png"class="btn-fermer"/></a>
                <form>
                    <label>Lien de l'image : <br><br> <input type="file"></label> <br>
                    <button type="button" class="button">Ajouter</button>
                </form>

            </div>
        </div>
    </div>

    <div class="trait_dessus"></div>

    <h2>Capteur de luminosité</h2>

    <div class="conteneur3">

        <div id="carrousel3">
            <ul>
                <li><img src="../res/images/Catalogue/Luminosité/Capteur1.png"  class="imgborder" /></li>
                <li><img src="../res/images/Catalogue/Luminosité/Capteur2.png"  class="imgborder" /></li>
                <li><img src="../res/images/Catalogue/Luminosité/Capteur3.png"  class="imgborder" /></li>
            </ul>
        </div>

        <script src="../src/js/Catalogue3.js"></script>

        <a href="#masque13" class="modif">
            <button type="button" class="button_modif_capteur">Ajouter un capteur</button>
        </a>

        <div id="masque3">
            <div class="fenetre-modale">
                <a class="fermer" href="#nullepart"><img src="..\res\icones\bouton-fermer.png"class="btn-fermer"/></a>
                <form>
                    <label>Lien de l'image : <br><br> <input type="file"></label> <br>
                    <button type="button" class="button">Ajouter</button>
                </form>

            </div>
        </div>
    </div>

    <div class="trait_dessus"></div>

    <h2>Capteur de fumée</h2>

    <div class="conteneur4">

        <div id="carrousel4">
            <ul>
                <li><img src="../res/images/Catalogue/Fumée/Capteur1.png"  class="imgborder" /></li>
                <li><img src="../res/images/Catalogue/Fumée/Capteur2.png"  class="imgborder" /></li>
            </ul>
        </div>

        <script src="../src/js/Catalogue4.js"></script>

        <a href="#masque4" class="modif">
            <button type="button" class="button_modif_capteur">Ajouter un capteur</button>
        </a>

        <div id="masque4">
            <div class="fenetre-modale">
                <a class="fermer" href="#nullepart"><img src="..\res\icones\bouton-fermer.png"class="btn-fermer"/></a>
                <form>
                    <label>Lien de l'image : <br><br> <input type="file"></label> <br>
                    <button type="button" class="button">Ajouter</button>
                </form>

            </div>
        </div>
    </div>

    <div class="trait_dessus"></div>

    <h2>Caméra</h2>

    <div class="conteneur5">

        <div id="carrousel5">
            <ul>
                <li><img src="../res/images/Catalogue/Caméra/Capteur1.png"  class="imgborder" /></li>
                <li><img src="../res/images/Catalogue/Caméra/Capteur2.png"  class="imgborder" /></li>
            </ul>
        </div>

        <script src="../src/js/Catalogue5.js"></script>

        <a href="#masque5" class="modif">
            <button type="button" class="button_modif_capteur">Ajouter un capteur</button>
        </a>

        <div id="masque5">
            <div class="fenetre-modale">
                <a class="fermer" href="#nullepart"><img src="..\res\icones\bouton-fermer.png"class="btn-fermer"/></a>
                <form>
                    <label>Lien de l'image : <br><br> <input type="file"></label> <br>
                    <button type="button" class="button">Ajouter</button>
                </form>

            </div>
        </div>
    </div>

    <a href="#masque6" class="modif">
        <button type="button" class="button_modif_type">Ajouter un type</button>
    </a>

    <div id="masque6">
        <div class="fenetre-modale">
            <a class="fermer" href="#nullepart"><img src="..\res\icones\bouton-fermer.png"class="btn-fermer"/></a>
            <form>
                <label>Nom du type : <br> <input type="text"> </label>
                <button type="button" class="button">Ajouter</button>
            </form>

        </div>
    </div>

</div>