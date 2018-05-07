<?php
/**
 * VUE DE LA PAGE INSCRIPTION/CONNEXION
 * User: Alexandre
 * FINI
 */
?>

<head>
    <link rel="stylesheet" href="css/inscription.css">
</head>

<div id="corps">
    <section id="ins_form">

        <div id="Partie_Gauche">
            <h1>Nouveau chez KingDome?</h1><br>
            <h2>Mes identifiants</h2>

            <form method="post" action="index.php?cible=utilisateur&function=inscription" enctype="multipart/form-data">

                <p><label>Adresse mail*<br>
                        <input type="email" name="email" size="39" required/></label></p>
                    <?php
                    echo "<span class='Alerte_Message'>".$Email_Message."</span>"; ?>

                <p><label>Mot de passe*<br>
                        <input type="password" name="password" size="39" required/></label></p>

                <p><label>Confirmation du mot de passe*<br>
                        <input type="password" name="password_confirmation" size="39" required/></label></p>
                    <?php
                    echo "<span class='Alerte_Message'>".$Password_Confirmation."</span><br>";
                    echo "<span class='$Alerte_Password'>" ?> Le mot de passe doit comporter au moins 8 caractère, ainsi qu'au moins un chiffre et une majuscule.</span><br>

                <h2>Mes informations personnelles</h2>

                <p><label>Civilité *
                        <input type="radio" name="civil" value="Mme" required checked id="civil_mme"/>Mme
                        <input type="radio" name="civil" value="Mr" required id="civil_mr"/> Mr</label></p>

                <p><label>Nom*<br>
                    <input type="text" name="last_name" size="39" required/></label></p>

                <p><label>Prénom*<br>
                        <input type="text" name="first_name" size="39" required/></label></p>

                <p><label>Adresse*<br>
                        <input type="text" name="adress" size="39" required/></label></p>

                <p><label for="zip_code">Code postal*
                    <label for="city" id="ville">Ville*</label><br>
                        <input type="text" name="zip_code" id="zip_code" size="14" required/></label>
                        <input type="text" name="city" id="city" size="19" required/>
                </p>

                <p><label>Numéro de téléphone*<br>
                    <input type="tel" name="tel" size="39" required/></label></p>
                <?php
                echo "<span class='Alerte_Message'>".$Tel_Message."</span>"; ?>

                <p>
                    <label>Date de naissance<br>
                        <input type="date" name="date_naissance" size="35"/></label>

                    <button id="myBtn" class="submit_button">Ajouter un avatar</button>
                </p>
                <?php
                echo "<span class='Alerte_Message'>".$Avatar_Message."</span>"; ?>

                 <!-- Modal pop-up for upload avatar -->
                <div id="myModal" class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <p>
                                <h3>Téléchargez votre avatar</h3>
                                <h4>(JPG, PNG ou GIF)</h4><br>
                                <input type="hidden" name="MAX_FILE_SIZE" value="250000" />
                                <input type="file" name="avatar" size=50 class="avatar_button"/>
                                <button class="submit_button" id="avatar_ok">Envoyer</button>
                            </p>
                        </div>
                </div>

                <p class="submit">
                    <button type="submit" name="creation_submit" class="submit_button">S'inscrire</button>
                    <button type="reset" name="reset" class="submit_button" id="reset_button">Annuler</button>
                </p>
                <br>* Champs requis

            </form>
        </div>

        <div id="Partie_Droite">
            <h1>Déjà inscrit?</h1><br><br>

            <form method="POST" action="index.php?cible=utilisateur&function=connexion">
            <p><label>Mon adresse mail*<br>
                    <input type="email" name="email" size="39" required/></label></p>

            <p><label>Mon mot de passe*<br>
                    <input type="password" name="password" size="39" required/></label></p>

            <p class="connexion_button">
                <button type="submit" name="connexion_submit" class="submit_button">Connexion</button>
            </p>
                <p>* Champs requis</p>

            </form>
            <?php
            echo "<span class='Alerte_Message'>".$Connexion_Message."</span>"; ?>
        </div>

    </section>

</div>

<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the button that valid the avatar
    var ok = document.getElementById("avatar_ok");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    };

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    };

    // When the user clicks on "envoyer", close the modal
    ok.onclick = function() {
        modal.style.display = "none";
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }
</script>