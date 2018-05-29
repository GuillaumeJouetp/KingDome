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

        <h2>Informations personnnelles</h2>
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
        <p>
        <h2>Mes résidences </h2>
        </p>

        <?php
            $own_home = recupereTous($bdd, 'own_home');              /*variables pour recuperer les données de la bdd de own_home, rooms, devices_types, devices, cemacs*/
            $homes = recupereTous($bdd, 'homes');
            $rooms = recupereTous($bdd, 'rooms');
            $device_types = recupereTous($bdd, 'device_types');
            $devices = recupereTous($bdd, 'devices');
            $cemacs = recupereTous($bdd, 'cemacs');
            $id=$_SESSION['user_id'];

            foreach($own_home as $donnees) { /*boucle pour avoir le nombre de maison*/

                if ($id == $donnees['user_id']) {
                    echo(
                        "<button class='accordion' onclick='accordeon()'><h4>Nom de la maison"
                            . "<label class='switch' style='margin-left: 2%'>"
                                . "<input type='checkbox'>"
                                . "<span class='slider round'></span>"
                            . "</label></h4>"
                        . "</button>"
                        . '<div class="panel">'
                            . '<div id="myDIV" class="header">'
                                . '<h2 style="margin:5px; text-align: left">Ajouter une pièce</h2>'
                                . '<input type="text" id="myInput" placeholder="Pièce...">'
                                . '<span onclick="newElement()" class="addBtn">Add</span>'

                            . '</div>'

                            . '<ul id="myUL">'
                            . '</ul>'
                        . '</div>'
                    );
                }
            }
        ?>
        <form method="post" action="index.php?cible=monCompte&room">
            <input type="text" name="room" class="room_input">
            <button type="submit" class="room_btn" name="submit">Ajouter pièce</button>
        </form>
        <script>
            function accordeon() {
                var acc = document.getElementsByClassName("accordion");
                var i;

                for (i = 0; i < acc.length; i++) {
                    acc[i].addEventListener("click", function() {
                        this.classList.toggle("active");
                        var panel = this.nextElementSibling;
                        if (panel.style.maxHeight){
                            panel.style.maxHeight = null;
                        } else {
                            panel.style.maxHeight = panel.scrollHeight + "px";
                        }
                    });
                }
            }
        </script>
        <script>
            // Create a "close" button and append it to each list item
            var myNodelist = document.getElementsByTagName("LI");
            var i;
            for (i = 0; i < myNodelist.length; i++) {
                var span = document.createElement("SPAN");
                var txt = document.createTextNode("\u00D7");
                span.className = "close";
                span.appendChild(txt);
                myNodelist[i].appendChild(span);
            }

            // Click on a close button to hide the current list item
            var close = document.getElementsByClassName("close");
            var i;
            for (i = 0; i < close.length; i++) {
                close[i].onclick = function() {
                    var div = this.parentElement;
                    div.style.display = "none";
                }
            }

            // Add a "checked" symbol when clicking on a list item
            var list = document.querySelector('ul');
            list.addEventListener('click', function(ev) {
                if (ev.target.tagName === 'LI') {
                    ev.target.classList.toggle('checked');
                }
            }, false);

            // Create a new list item when clicking on the "Add" button
            function newElement() {
                var li = document.createElement("li");
                var inputValue = document.getElementById("myInput").value;
                var t = document.createTextNode(inputValue);
                li.appendChild(t);
                if (inputValue === '') {
                    alert("You must write something!");
                }
                else {
                    document.getElementById("myUL").appendChild(li);
                }
                document.getElementById("myInput").value = "";

                var span = document.createElement("SPAN");
                var txt = document.createTextNode("\u00D7");
                span.className = "close";
                span.appendChild(txt);
                li.appendChild(span);

                for (i = 0; i < close.length; i++) {
                    close[i].onclick = function() {
                        var div = this.parentElement;
                        div.style.display = "none";
                    }
                }
            }
        </script>

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
                    <form method="post" action="index.php?cible=monCompte&function=ajouter" enctype="multipart/form-data" class="ajout">
                        <p>
                            <p><label for="name_home">Nom de la maison*<br>
                                    <input type="text" name="name_home" id="name_home" placeholder="Maison principale" required/>
                                </label>
                            </p>
                            <p><label for="street">Adresse*<br>
                                    <input type="text" name="street" id="street" placeholder="Adresse de la maison" required/>
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

                            <button style="width:auto;" type="submit" name="submit_home">
                                Ajouter
                            </button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
        <script>
            function ajoutMaison() {
                // Get the modal
                var model = document.getElementById('myModel');

                // Get the button that opens the modal
                var bt = document.getElementById("myBt");

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close2")[0];

                // When the user clicks the button, open the modal
                bt.onclick = function() {
                    model.style.display = "block";
                }

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                    model.style.display = "none";
                }

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == model) {
                        model.style.display = "none";
                    }
                }
            }
        </script>

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