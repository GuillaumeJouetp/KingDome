<?php
/**
 * VUE DE LA PAGE MON PROFIL
 * User: Adrien
 * En cours
 */
?>

<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASX0Eevc77t1rhFySVK7xfMuUV9dUi-30&libraries=places"></script>
    <link rel="stylesheet" href="css/monCompte.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<div id="corps">

    <div id="profil">
        <h1 style="text-align: left">Mon profil - Utilisateur </h1></br>

        <h2>Informations personnelles</h2>
        <div id="info_perso">
            <div id="info_persop">
                <p>Nom : <?php echo $_SESSION['user_name']; ?>
                    <?php if ($_SESSION['avatar']!=null){ ?>
                    <img src="<?php echo $_SESSION['avatar']; ?>"
                    alt="Photo de profil" style="float: right; width: 200px; height: 200px;">
                    <?php } ?>
                </p>
                <p>Prénom : <?php echo $_SESSION['user_firstname']; ?></p>
                <p>Adresse mail : <?php echo $_SESSION['email']; ?></p>
                <p style="text-align: center">
                    <button type="button">
                        <a href="index.php?cible=modif_profil&function=modifier">Modifier le profil</a>
                    </button>
                </p>
            </div>
        </div>
    </div>
    <br><br>

    <!--Gestion des résidences-->
    <div>
        <h2>Mes résidences</h2>

        <?php
        $homes = recupereTous($bdd, 'homes');
        $own_home = recupereTous($bdd, 'own_home');
        $id=$_SESSION['user_id'];

        foreach($own_home as $donnees) {
            if ($id == $donnees['user_id']) {
                foreach($homes as $donnees2 ) {
                    if ($donnees['house_id'] == $donnees2['id']) { ?>
                        <button class='collapsible' onclick='collapse()'>
                            <?php echo $donnees2['name_home']; ?>
                            <!--<label class='switch' style='margin-left: 2%'>
                                <input type='checkbox'>
                                <span class='slider round'></span>
                            </label>-->
                        </button>
                    <?php $home_id = $donnees2['id']; ?>

                        <div class="content">
                            <?php
                            $var3 = $bdd->query('SELECT * FROM rooms');
                            while ($room = $var3->fetch()) {
                                $room['home_id'] = $home_id;
                                ?>
                                <form method="post" action="index.php?cible=monCompte&function=addRoom" class="addRoom">
                                    <?php if (isset($errors)) { ?>
                                        <p><?php echo $errors; ?></p>
                                    <?php } ?>
                                    <input type="text" name="home_id" value="<?php echo $room['home_id']; ?>"
                                           style="display: none">
                                    <input type="text" name="name" class="room_input"
                                           placeholder="Entrer le nom de la pièce">
                                    <button type="submit" class="room_btn" name="submit">Ajouter</button>
                                </form>

                                <section class="room">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th>Pièces</th>
                                            <th>Supprimer</th>
                                        </tr>
                                        </thead>

                                        <?php while ($donnees3 = $var3->fetch()) { ?>
                                            <tbody>
                                            <?php if ($donnees3['home_id'] == $home_id) { ?>
                                                <tr>
                                                    <td class="room">
                                                        <?php echo $donnees3['name']; ?>
                                                    </td>
                                                    <td class="delete">
                                                        <form method="post" action="index.php?cible=monCompte&function=delRoom" name="formsupp">
                                                            <?php
                                                            $id2=$donnees3['id'];					/*on sauvegarde l'id de device  qui n'est pas visible das la page et va etre envoyé dans le formulaire  */
                                                            echo("<input type='hidden'"
                                                                ."name='id2'"
                                                                ."value='"
                                                                ."$id2'/>"
                                                            ); ?>
                                                            <input href="#" type="image" name="creation_submit" src="..\res\icones\bouton-fermer.png" class="btn-fermer2"
                                                                   onclick="return(confirm('Êtes-vous sûr de bien vouloir supprimer la résidence ?'));">
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        <?php } ?>
                                    </table>
                                    <p style="text-align: center">
                                    <form method="post" action="index.php?cible=monCompte&function=delHome" name="formsupp">
                                        <?php
                                        $id1=$donnees2['id'];
                                        echo("<input type='hidden'"
                                            ."name='id1'"
                                            ."value='"
                                            ."$id1'/>"); ?>
                                        <button type="submit" name="delhome"
                                                onclick="return(confirm('Êtes-vous sûr de bien vouloir supprimer la résidence ?'));">
                                            Supprimer résidence
                                        </button>
                                    </form>
                                    </p>
                                </section>
                            <?php } ?>
                        </div>
                        <script src="../src/js/Collapse.js"></script>
                        <?php
                    }
                }
            }
        } ?><br>

        <!-- Consommation
        <button>
            <a href="index.php?cible=consommation">
                <img src="../res/icones/consommation.png" alt="icone compte" class="icone">Consommation
            </a>
        </button>-->

        <!-- Ajout de maison -->
        <a href='#masque' style="float: right; color: #832429;">
            <div class='element , ecriture2'> Ajouter une residence </div>
        </a>
        <div id='masque'>
        <button id="myBt" onclick="AfficheCache()" href='#masque' style="float: right"><h3>Ajouter Résidence +</h3></button>
        <div id="myModel" class="fenetre-modale">
            <a class="fermer" href="#nullepart"><img src="..\res\icones\bouton-fermer.png"class="btn-fermer"/></a><br>
            <div class="titre">
                <h3>Ajouter une résidence</h3><br>
                <form method="post" action="index.php?cible=monCompte&function=ajouter"  style="margin-left: 5px; font-size: medium">

                    <label for="name_home"><br><span class="blanc">Nom de la résidence*</span><br>
                        <input type="text" name="name_home" id="name_home" placeholder="Maison principale" required/>
                    </label><br><br>

                    <label for="superficie"><br><span class="blanc">Superficie de la résidence*</span><br>
                        <input type="number" name="superficie" id="superficie" required />m²
                    </label><br><br>

                    <label><span class="blanc">Adresse*</span><br>
                        <input type="text" name="adress" id="autocomplete" placeholder="Entrez votre adresse" onmouseout="verifAdress()"/><br>

                        <input type="hidden" name="adress" id="fullAddr" disabled="true"/>
                        <input type="hidden" id="street_number" disabled="true" />
                        <input type="hidden" id="route" disabled="true" />
                        <input type="hidden" id="country" disabled="true" />
                        <input type="hidden" id="administrative_area_level_1" disabled="true" /><br><br>

                        <label for="zip_code" id="zip_label"><span class="blanc">Code postal*</span><br>
                            <input type="text" name="zip_code" id="postal_code"  disabled="true" onmouseout="verifAdress()"/><br>
                        </label><br><br>

                        <label for="ville" id="city"><span class="blanc">Ville*</span><br>
                            <input type="text" name="city" id="locality" disabled="true" onmouseout="verifAdress()">
                        </label><br><br>

                        <span class="tooltip">Adresse non complète</span>
                    </label><br><br>

                    <button style="width:auto;" type="submit" name="ajout">
                        Ajouter
                    </button>
                    </p>
                </form>
                <script type="text/javascript" src="../src/js/autocompletion.js"></script>
                <script type="text/javascript" src="../src/js/verification.js"></script>
                <script type="text/javascript" src="../src/js/inscription.js"></script>
            </div>
        </div>
        <script src="../src/js/dashbord.js"></script>
        </div>
    </div>
    <br><br>

    <!--Utilisateurs secondaires et droits-->
    <!--<div>
        <h2>Utilisateurs secondaires et droits</h2>

        <section class="ins_form">

            <div class="Partie_Gauche">
                <h3>Liste des utilisateurs : </h3><br>
                <form method="post" action="//src/php/controllers/monCompte.php">
                    <input type="checkbox" name="case1" id="case" /> <label for="case">Sous utilisateur 1</label><br><br>
                    <input type="checkbox" name="case2" id="case" /> <label for="case">Sous utilisateur 2</label><br><br>
                    <input type="checkbox" name="case3" id="case" /> <label for="case">Sous utilisateur 3</label><br><br>
                    <input type="checkbox" name="case4" id="case" /> <label for="case">Sous utilisateur 4</label><br><br>
                </form>
            </div>

            <div class="Partie_Droite">
                <h3>Liste des droits : </h3>
                <form method="post" action="//src/php/controllers/monCompte.php">
                    <p>Droit 1
                        <i onclick="document.getElementById('id02').style.display='block'" class="fa fa-info-circle"></i>
                        <input type="radio" name="droit1" value="activé" id="activé" checked="checked" /> <label for="activé">Activé</label>
                        <input type="radio" name="droit1" value="désactivé" id="désactivé" /> <label for="désactivé">Désactivé</label>
                    </p>
                    <div id="id02" class="modal">
                        <div class="modal-content animate">
                            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                            <div class="container">
                                <p>Description du droit</p>
                            </div>
                        </div>
                    </div>
                </form>
                <form method="post" action="//src/php/controllers/monCompte.php">
                    <p>Droit 2
                        <i onclick="document.getElementById('id02').style.display='block'" class="fa fa-info-circle"></i>
                        <input type="radio" name="droit2" value="activé" id="activé" checked="checked" /> <label for="activé">Activé</label>
                        <input type="radio" name="droit2" value="désactivé" id="désactivé" /> <label for="désactivé">Désactivé</label>
                    </p>
                    <div id="id02" class="modal">
                        <div class="modal-content animate">
                            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                            <div class="container">
                                <p>Description du droit</p>
                            </div>
                        </div>
                    </div>
                </form>
                <form method="post" action="//src/php/controllers/monCompte.php">
                    <p>Droit 3
                        <i onclick="document.getElementById('id02').style.display='block'" class="fa fa-info-circle"></i>
                        <input type="radio" name="droit3" value="activé" id="activé" checked="checked" /> <label for="activé">Activé</label>
                        <input type="radio" name="droit3" value="désactivé" id="désactivé" /> <label for="désactivé">Désactivé</label>
                    </p>
                    <div id="id02" class="modal">
                        <div class="modal-content animate">
                            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                            <div class="container">
                                <p>Description du droit</p>
                            </div>
                        </div>
                    </div>
                </form>
                <form method="post" action="//src/php/controllers/monCompte.php">
                    <p>Droit 4
                        <i onclick="document.getElementById('id02').style.display='block'" class="fa fa-info-circle"></i>
                        <input type="radio" name="droit4" value="activé" id="activé" checked="checked" /> <label for="activé">Activé</label>
                        <input type="radio" name="droit4" value="désactivé" id="désactivé" /> <label for="désactivé">Désactivé</label>
                    </p>
                    <div id="id02" class="modal">
                        <div class="modal-content animate">
                            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                            <div class="container">
                                <p>Description du droit</p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    </div>
    <script>
        // Get the modal
        var modal = document.getElementById('id02');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>-->

    <p style="text-align: center">
        <button>
            <a href="index.php?cible=utilisateur&function=deconnexion">
            <h4>Deconnexion</h4>
            </a>
        </button>
    </p>

</div>