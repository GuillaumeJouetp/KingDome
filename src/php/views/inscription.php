<?php
/**
 * VUE DE LA PAGE INSCRIPTION/CONNEXION
 * User: Alexandre
 * FINI
 */
?>

<head>
    <link rel="stylesheet" href="css/inscription.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASX0Eevc77t1rhFySVK7xfMuUV9dUi-30&libraries=places"></script>

</head>

<body>

    <div id="corps">
        <section id="ins_form">

            <div id="Partie_Gauche">
                <h1>Nouveau chez KingDome?</h1><br>
                <h2>Mes identifiants</h2>

                <form method="post" action="index.php?cible=utilisateur&function=inscription" enctype="multipart/form-data" id="myForm">

                    <label>Adresse mail*<br>
                        <input type="email" name="email" size="39" required id="email" onblur="verifEmail(this.value)"/>
                        <span id="txtHint"></span>
                        <span class="tooltip">Email non valide</span>
                    </label>
                    <?php
                        echo "<span class='Alerte_Message'>".$Email_Message."</span>"; ?>

                    <label>Mot de passe*<br>
                        <input type="password" name="password" size="39" required id="pwd1"/>
                    </label>

                    <label>Confirmation du mot de passe*<br>
                        <input type="password" name="password_confirmation" size="39" required id="pwd2"/>
                        <span class="tooltip">Le mot de passe de confirmation doit être identique à celui d'origine</span>
                    </label>

                    <?php
                        echo "<div class='Alerte_Message'>".$Password_Confirmation."</div>";
                        echo "<span class='$Alerte_Password' id='alert_pwd1'>" ?> Le mot de passe doit comporter au moins 8 caractère, ainsi qu'au moins un chiffre et une majuscule.</span>

                    <h2>Mes informations personnelles</h2>

                    <label>Civilité *
                        <input type="radio" name="civil" value="Mme" required checked id="civil_mme"/>Mme
                        <input type="radio" name="civil" value="Mr" required id="civil_mr"/> Mr
                        <span class="tooltip">Vous devez sélectionnez votre civilité</span>
                    </label>


                    <label>Nom*<br>
                        <input type="text" name="last_name" size="39" required id="lastName"/>
                        <span class="tooltip">Un nom ne peut pas faire moins de 2 caractères et comporter des chiffres</span>
                    </label>

                    <label>Prénom*<br>
                        <input type="text" name="first_name" size="39" required id="firstName"/>
                        <span class="tooltip">Un prénom ne peut pas faire moins de 2 caractères et comporter des chiffres</span>
                    </label>



                    <label>Adresse*<br>
                        <input type="text" name="adress" id="autocomplete" size="39" placeholder="Entrez votre adresse" onmouseout="verifAdress()"/>

                        <input type="hidden" name="adress" id="fullAddr" size="39" disabled="true"/>
                        <input type="hidden" id="street_number" disabled="true" />
                        <input type="hidden" id="route" disabled="true" />
                        <input type="hidden" id="country" disabled="true" />
                        <input type="hidden" id="administrative_area_level_1" disabled="true" />

                        <label for="zip_code" id="zip_label"><br>Code postal*
                            <label for="ville" id="city">Ville*<br>
                                <input type="text" name="zip_code" id="postal_code" size="13" disabled="true" onmouseout="verifAdress()"/>
                                <input type="text" name="city" id="locality" disabled="true" onmouseout="verifAdress()">
                            </label>
                        </label>

                        <span class="tooltip">Adresse non complète</span>
                    </label>

                    <label id="num_label">Numéro de téléphone*<br>
                        <input type="tel" name="tel" size="39" id="tel" required/>
                        <span class="tooltip">Numéro de téléphone non valide</span>
                    </label>

                    <?php
                    echo "<span class='Alerte_Message'>".$Tel_Message."</span>"; ?>

                    <label id="birth_label">Date de naissance<br>
                        <input type="date" name="date_naissance" id="date" size="35" min="1877-01-01" max="2016-01-01" onblur="verifDate()"/>
                        <button type="button" id="myBtn" class="submit_button">Ajouter un avatar</button>

                        <span class="tooltip" id="date_tooltip">Date de naissance non valide, vous devez avoir entre 5 et 140 ans</span>
                        <span class="tooltip" id="avatar_tooltip">L'avatar n'est pas une image valide</span>
                    </label>

                    <?php
                    echo "<span class='Alerte_Message'>".$Avatar_Message."</span>"; ?>

                     <!-- Modal pop-up for upload avatar -->
                    <div id="myModal" class="modal">
                            <div class="modal-content">
                                <span class="close">&times;</span>

                                    <h3>Téléchargez votre avatar</h3>
                                    <h4>(JPG, PNG ou GIF)</h4><br>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="250000" />
                                    <input type="file" name="avatar" size=50 class="avatar_button" id="the_avatar"/>
                                    <button type="button" class="submit_button" id="avatar_ok" onblur="verifAvatar()">Envoyer</button>

                            </div>
                    </div>


                    <label id="cgu_label">J'ai lu et approuvé les <a href="#" id="cgu_link">conditions générales d'utilisation*</a>
                            <input type="checkbox" name="cgu" required id="cgu_checkbox">
                        <span class="tooltip">Vous devez accepter les conditions avant de continuer</span>
                    </label>
                    <?php
                    echo "<span class='Alerte_Message'>".$CGU_Message."</span>"; ?>

                    <div class="submit">
                        <button type="submit" name="creation_submit" class="submit_button">S'inscrire</button>
                        <button type="reset" name="reset" class="submit_button" id="reset_button">Annuler</button>
                    </div>
                    <div id="champs_requis">* Champs requis</div>

                </form>
            </div>

            <div id="Partie_Droite">
                <h1 id="deja_inscrit">Déjà inscrit?</h1>

                <form method="POST" action="index.php?cible=utilisateur&function=connexion">

                    <label>Mon adresse mail*<br>
                        <input type="email" name="email" size="39" required/>
                    </label>

                <label>Mon mot de passe*<br>
                        <input type="password" name="password" size="39" required/>
                </label>

                <div class="connexion_button">
                    <button type="submit" name="connexion_submit" class="submit_button">Connexion</button>
                </div>

                    <p>* Champs requis</p>

                </form>
                <?php
                echo "<span class='Alerte_Message'>".$Connexion_Message."</span>"; ?>
            </div>

        </section>

    </div>

    <script type="text/javascript" src="../src/js/autocompletion.js"></script>
    <script type="text/javascript" src="../src/js/inscription.js"></script>
    <script type="text/javascript" src="../src/js/verification.js"></script>

</body>


