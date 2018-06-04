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
    <link rel="stylesheet" href="css/monCompte.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div id="corps">

    <div id="profil">
        <h1 style="text-align: left">Mon profil - Utilisateur principal</h1></br>

        <h2>Informations personnelles</h2>
        <div id="info_perso">
            <div id="info_persop">
                <p>Nom : <?php echo $_SESSION['user_name']; ?>
                    <img src=" <?php echo $_SESSION['avatar'];?>" alt="Photo de profil" style="float: right; width: 100px; height: 150px;"></p>
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
        <h3>Mes résidences</h3>

        <?php
        // On récupère tout le contenu de la table jeux_video
        $var = $bdd->query('SELECT * FROM homes');

        // On affiche chaque entrée une à une
        while ($home = $var->fetch())
        {
            ?>
            <button class='collapsible' onclick='collapse()'><?php echo $home['name_home']; ?>
                <label class='switch' style='margin-left: 2%'>
                    <input type='checkbox'>
                    <span class='slider round'></span>
                </label>
            </button>
        <?php $home_id=$home['id']; ?>

            <div class="content">
                <?php
                // On récupère tout le contenu de la table jeux_video
                $var2 = $bdd->query('SELECT * FROM rooms');

                // On affiche chaque entrée une à une
                while ($room = $var2->fetch())
                {
                    $room['home_id'] = $home_id;
                    ?>
                    <form method="post" action="index.php?cible=monCompte&function=addRoom" class="addRoom">
                        <?php if (isset($errors)) { ?>
                            <p><?php echo $errors; ?></p>
                        <?php } ?>
                        <input type="text" name="home_id" value="<?php echo $room['home_id']; ?>" style="display: none">
                        <input type="text" name="name" class="room_input" placeholder="Entrer le nom de la pièce">
                        <button type="submit" class="room_btn" name="submit">Ajouter </button>
                    </form>

                    <section class="room">
                        <table>
                            <thead>
                            <tr>
                                <th>Pièces</th>
                                <th>Supprimer</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php while ($donnees2 = $var2->fetch()) { ?>
                                <tr>
                                    <td class="room">
                                        <?php
                                        if ($donnees2['home_id'] == $home_id) {
                                            echo $donnees2['name'];}
                                        ?>
                                    </td>
                                    <td class="delete">
                                        <?php if ($donnees2['home_id'] == $home_id) { ?>
                                            <a href="index.php?cible=monCompte&function=delRoom=<?php echo $donnees2['id2']; ?>"
                                               onclick="if(confirm('Etes vous sûre de vouloir supprimer la pièce?')){
                                   document.location.href=url;}
                                   else{}">x</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php
                            } ?>
                            </tbody>
                        </table>
                        <p style="text-align: center">
                            <a href="index.php?cible=monCompte&function=delHome=<?php echo $home['id']; ?>"
                               onclick="if(confirm('Etes vous sûre de vouloir supprimer la résidence?')){
                       document.location.href=url;}
                   else{}">Supprimer maison
                            </a>
                        </p>
                    </section>
                <?php } ?>
            </div>
            <script src="../src/js/Collapse.js"></script>
        <?php }
        $var->closeCursor(); // Termine le traitement de la requête
        ?>

        <!-- Consommation -->
        <button>
            <a href="index.php?cible=consommation">
                <img src="../res/icones/consommation.png" alt="icone compte" class="icone">Consommation
            </a>
        </button>

        <!-- Ajout de maison -->
        <button id="myBt" onclick="ajoutMaison()" style="float: right"><h3>Ajouter Résidence +</h3></button>
        <div id="myModel" class="model">
            <div class="model-content">
                <div class="model-header">
                    <span class="close2">&times;</span>
                </div>
                <div class="model-body">
                    <h3>Ajouter une résidence</h3>
                    <form method="post" action="index.php" class="ajout">
                        <p>
                        <p><label for="name_home">Nom de la maison*<br>
                                <input type="text" name="name_home" id="name_home" placeholder="Maison principale" required/>
                            </label>
                        </p>
                        <p><label for="adress">Adresse*<br>
                                <input type="text" name="adress" id="adress" placeholder="Adresse de la maison" required/>
                            </label>
                        </p>

                        <p><label for="zip_code">Code postal*<br>
                                <input type="text" name="zip_code" id="zip_code" required/>
                            </label>
                        </p>
                        <p><label for="town" id="ville">Ville*<br>
                                <input type="text" name="town" id="town" required/>
                            </label>
                        </p>

                        <p><label for="country">Pays*<br>
                                <input type="text" name="country" id="country" value="France" required>
                            </label>
                        </p>

                        <button style="width:auto;" type="submit" name="submit2">
                            Ajouter
                        </button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
        <script src="../src/js/Form_Maison.js"></script>

    </div>
    <br><br>

    <!--Utilisateurs secondaires et droits-->
    <div>
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
    </script>

    <p style="text-align: center">
        <button>
            <a href="index.php?cible=utilisateur&function=deconnexion">
            <h4>Deconnexion</h4>
            </a>
        </button>
    </p>

</div>
</body>