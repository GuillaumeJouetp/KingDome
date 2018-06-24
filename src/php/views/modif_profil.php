<?php
/**
 * Created by PhpStorm.
 * User: PC-Adrien
 * Date: 30/04/2018
 * Time: 09:33
 */
?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASX0Eevc77t1rhFySVK7xfMuUV9dUi-30&libraries=places"></script>
    <link rel="stylesheet" href="css/monCompte.css">
    <link rel="stylesheet" href="css/inscription.css">
</head>

<div id="corps">

    <h1 style="text-align: left">Mon profil - Utilisateur</h1></br>

    <section style="display: flex">
        <article style="width: 50%">
            <h2>Mes informations personnelles</h2>

            <form method="post" action="index.php?cible=monCompte&function=modifInfos" enctype="multipart/form-data">
                <label>Nom*<br>
                    <input type="text" size="35" name="newUser_name" value="<?php if(isset($_SESSION['user_name'])){echo $_SESSION['user_name'];} ?>" required/>
                </label>

                <label>Prénom*<br>
                    <input type="text" size="35" name="newUser_firstname" value="<?php if(isset($_SESSION['user_firstname'])){echo $_SESSION['user_firstname'];} ?>" required/>
                </label>

                <label>Adresse*<br>
                    <input type="text" name="newAdress" id="autocomplete" size="35" placeholder="Entrez votre adresse" onmouseout="verifAdress()"/>

                    <input type="hidden" name="newAdress" id="fullAddr" disabled="true"/>
                    <input type="hidden" id="street_number" disabled="true" />
                    <input type="hidden" id="route" disabled="true" />
                    <input type="hidden" id="country" disabled="true" />
                    <input type="hidden" id="administrative_area_level_1" disabled="true" /><br>

                    <label for="zip_code" id="zip_label"><br>Code postal*<br>
                        <input type="text" name="newZip_code" id="postal_code"  size="35" disabled="true" onmouseout="verifAdress()"/>
                    </label><br>

                    <label for="ville" id="city"><br>Ville*<br>
                        <input type="text" name="newCity" id="locality" size="35" disabled="true" onmouseout="verifAdress()">
                    </label><br>

                    <span class="tooltip">Adresse non complète</span>
                </label>

                <label id="num_label">Numéro de téléphone*<br>
                    <input type="tel" name="newTel" size="35" id="tel" value="<?php if(isset($_SESSION['tel'])){echo $_SESSION['tel'];} ?>" required/>
                </label><br>

                <button type="submit" name="modifier" class="submit_button">Modifier</button>
                <br>
            </form>

            <!--<h2>Modifier avatar</h2>
            <form method="post" action="index.php?cible=monCompte&function=modifAvatar" enctype="multipart/form-data">

                <?php if ($_SESSION['avatar']!=null){ ?>
                    <img src="<?php echo $_SESSION['avatar']; ?>"
                         alt="Photo de profil" style="float: right; width: 200px; height: 200px;">

                    <button type="button" name="myBtn" class="submit_button">Modifier l'Avatar</button>
                    <button type="button" name="Supprimer" class="submit_button">Supprimer l'avatar</button>
                <?php } else { ?>

                <button type="button" id="myBtn" class="submit_button">Ajouter un avatar</button>
                <span class="tooltip" id="avatar_tooltip">L'avatar n'est pas une image valide</span>

                <?php } ?>

                <!-- Modal pop-up for upload avatar -->
                <!--<div id="myModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>

                        <h3>Téléchargez votre avatar</h3>
                        <h4>(JPG, PNG ou GIF)</h4><br>
                        <input type="hidden" name="MAX_FILE_SIZE" value="250000" />
                        <input type="file" name="avatar" size=50 class="avatar_button" id="the_avatar"/>
                        <button type="button" class="submit_button" id="avatar_ok" onblur="verifAvatar()">Envoyer</button>

                    </div>
                </div><br><br>

                <button type="submit" name="creation_submit" class="submit_button">Valider</button>

            </form>-->
        </article>

        <script type="text/javascript" src="../src/js/autocompletion.js"></script>
        <script type="text/javascript" src="../src/js/inscription.js"></script>

        <aside style="width: 50%">
            <form method="post" action="index.php?cible=monCompte&function=modifMail" id="formMail">
                <h2>Modifier adresse mail</h2>

                <label>Entrez votre ancienne adresse mail *<br>
                    <input type="email" name="email" size="35" required />
                </label><br>

                <label>Entrez votre nouvelle adresse mail *<br>
                    <input type="email" name="newMail" size="35" required  id="email" onblur="verifEmail(this.value)" />
                </label><br>

                <button type="submit" name="creation_submit" class="submit_button">Modifier</button>

            </form><br><br>
            <script type="text/javascript" src="../src/js/verifMail.js"></script>

            <form method="post" action="index.php?cible=monCompte&function=modifMdp" id="formMDP">
                <h2>Modifier mot de passe</h2>

                <label>Entrez votre ancien mot de passe *<br>
                    <input type="password" name="password" size="35" required />
                </label><br>

                <label>Entrez votre nouveau mot de passe *<br>
                    <input type="password" name="newMdp" id="newMdp" size="35" required />
                </label><br>

                <label>Confirmation du nouveau mot de passe*<br>
                    <input type="password" name="confirmation_newMdp" id="confirmation_newMdp" size="35" required />
                    <span class="tooltip">Le mot de passe de confirmation doit être identique à celui d'origine</span>
                </label>

                <span class='$Alerte_Password' id='alert_newMdp'> Le mot de passe doit comporter au moins 8 caractère, ainsi qu'au moins un chiffre et une majuscule.</span><br><br>

                <button type="submit" name="creation_submit" class="submit_button">Modifier</button>

            </form><br><br>
            <script type="text/javascript" src="../src/js/verifMdp.js"></script>
        </aside>
    </section>

    <button>
        <a href="index.php?cible=monCompte&function=dellAll">
            <h4>Supprimer compte</h4>
        </a>
    </button>

</div>