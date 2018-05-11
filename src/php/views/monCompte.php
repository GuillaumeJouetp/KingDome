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

        <h2>Informations personnnel</h2>
        <div id="info_perso">
            <div id="info_persop">
                <p>Nom : <?php echo $nom = $_SESSION['user_name']; ?>
                    <img src="<?php $avatar = $_SESSION['avatar'];?>" alt="Photo de profil" style="float: right; width: 100px; height: 150px;"></p>
                <p>Prénom : <?php echo $prenom = $_SESSION['user_firstname']; ?></p>
                <p>Adresse mail : <?php echo $email = $_SESSION['email']; ?></p>
                <p>Téléphone :
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
        <p>
        <h2>Mes résidences </h2>
        </p>

        <button class="accordion"><h4>Maison 1
                <label class="switch" style="margin-left: 2%">
                    <input type="checkbox">
                    <span class="slider round"></span>
                </label></h4>
        </button>
        <div class="panel">
            <p>Pièce 1</p><br>
            <p>Pièce 1</p><br>
            <p>Pièce 1</p><br>
            <p>Pièce 1</p><br>
        </div>

        <button class="accordion"><h4>Maison 2
                <label class="switch" style="margin-left: 2%">
                    <input type="checkbox">
                    <span class="slider round"></span>
                </label></h4>
        </button>
        <div class="panel">
            <p>Pièce 1</p><br>
            <p>Pièce 1</p><br>
            <p>Pièce 1</p><br>
            <p>Pièce 1</p><br>
        </div>

        <button class="accordion"><h4>Maison 3
                <label class="switch" style="margin-left: 2%">
                    <input type="checkbox">
                    <span class="slider round"></span>
                </label></h4>
        </button>
        <div class="panel">
            <p>Pièce 1</p><br>
            <p>Pièce 1</p><br>
            <p>Pièce 1</p><br>
            <p>Pièce 1</p><br>
        </div>

        <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" id="btn_maison">
            <h3>Ajouter Résidence +</h3>
         </button>
        <div id="id01" class="modal">

            <form class="modal-content animate" action="/action_page.php">

                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

                <h3 id="formaison">Ajout de Maison</h3>

                <div class="container">
                    <label for="nom_maison">Nom de la maison : </label>
                    <input type="text" id="nom">
                    <br><br>

                    <label for="type">Type de maison : </label>
                    <select name="myChoice" id="type">
                        <option selected="selected"> Maison</option>
                        <option> Maison secondaire</option>
                        <option> Appartement</option>
                        <option> Appartement secondaire</option>
                    </select>
                    <br><br>

                    <label for="chambre">Chambres : </label>
                    <select name="myChoice" id="chambres">
                        <option selected="selected"> O</option>
                        <option> 1</option>
                        <option> 2</option>
                        <option> 3</option>
                        <option> 4</option>
                        <option> 5</option>
                        <option> 6</option>
                        <option> 7</option>
                        <option> 8</option>
                        <option> 9</option>
                        <option> 10</option>
                    </select>
                    <br><br>

                    <label for="bain">Salle de bain : </label>
                    <select name="myChoice" id="bain">
                        <option selected="selected"> O</option>
                        <option> 1</option>
                        <option> 2</option>
                        <option> 3</option>
                        <option> 4</option>
                        <option> 5</option>
                        <option> 6</option>
                        <option> 7</option>
                        <option> 8</option>
                        <option> 9</option>
                        <option> 10</option>
                    </select>
                    <br><br>

                    <label for="bureau">Bureau : </label>
                    <select name="myChoice" id="bureau">
                        <option selected="selected"> O</option>
                        <option> 1</option>
                        <option> 2</option>
                        <option> 3</option>
                        <option> 4</option>
                        <option> 5</option>
                        <option> 6</option>
                        <option> 7</option>
                        <option> 8</option>
                        <option> 9</option>
                        <option> 10</option>
                    </select>
                    <br><br>

                    <label for="cuisine">Cuisine : </label>
                    <select name="myChoice" id="cuisine">
                        <option selected="selected"> O</option>
                        <option> 1</option>
                        <option> 2</option>
                        <option> 3</option>
                        <option> 4</option>
                        <option> 5</option>
                        <option> 6</option>
                        <option> 7</option>
                        <option> 8</option>
                        <option> 9</option>
                        <option> 10</option>
                    </select>
                    <br><br>

                    <label for="manger">Salle à manger : </label>
                    <select name="myChoice" id="manger">
                        <option selected="selected"> O</option>
                        <option> 1</option>
                        <option> 2</option>
                        <option> 3</option>
                        <option> 4</option>
                        <option> 5</option>
                        <option> 6</option>
                        <option> 7</option>
                        <option> 8</option>
                        <option> 9</option>
                        <option> 10</option>
                    </select>
                    <br><br>

                    <label for="salon">Salon : </label>
                    <select name="myChoice" id="salon">
                        <option selected="selected"> O</option>
                        <option> 1</option>
                        <option> 2</option>
                        <option> 3</option>
                        <option> 4</option>
                        <option> 5</option>
                        <option> 6</option>
                        <option> 7</option>
                        <option> 8</option>
                        <option> 9</option>
                        <option> 10</option>
                    </select>
                    <br><br>

                    <label for="garage">Garage : </label>
                    <select name="myChoice" id="garage">
                        <option selected="selected"> O</option>
                        <option> 1</option>
                        <option> 2</option>
                        <option> 3</option>
                        <option> 4</option>
                        <option> 5</option>
                        <option> 6</option>
                        <option> 7</option>
                        <option> 8</option>
                        <option> 9</option>
                        <option> 10</option>
                    </select>
                    <br><br>

                    <button type="submit" onclick="document.getElementById('id01').style.display='none'" name="maison_submit" class="submit_button">Ajouter maison</button>
                    <br><br>
                </div>
            </form>
        </div>

        <button>
            <a href="index.php?cible=consommation">
                <img src="../res/icones/consommation.png" alt="icone compte" class="icone">Consommation
            </a>
        </button>
    </div>
    <br><br>

    <!--Utilisateurs secondaires et droits-->
    <div>
        <h2>Utilisateurs secondaires et droits</h2>

        <section class="ins_form">

            <div class="Partie_Gauche">
                <h3>Liste des utilisateurs : </h3><br>
                <form method="post" action="//src/php/controllers/profil.php">
                    <input type="checkbox" name="case1" id="case" /> <label for="case">Sous utilisateur 1</label><br><br>
                    <input type="checkbox" name="case2" id="case" /> <label for="case">Sous utilisateur 2</label><br><br>
                    <input type="checkbox" name="case3" id="case" /> <label for="case">Sous utilisateur 3</label><br><br>
                    <input type="checkbox" name="case4" id="case" /> <label for="case">Sous utilisateur 4</label><br><br>
                </form>
            </div>

            <div class="Partie_Droite">
                <h3>Liste des droits : </h3>
                <form method="post" action="//src/php/controllers/profil.php">
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
                <form method="post" action="//src/php/controllers/profil.php">
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
                <form method="post" action="//src/php/controllers/profil.php">
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
                <form method="post" action="//src/php/controllers/profil.php">
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