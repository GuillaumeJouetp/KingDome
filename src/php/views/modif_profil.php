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

<body>
<div id="corps">

    <h1 style="text-align: left">Mon profil</h1></br>

    <section style="display: flex">
        <article style="width: 50%">
            <form method="post" action="index.php?cible=monCompte&function=modificationInfos" enctype="multipart/form-data" id="myForm">
                <h2>Mes informations personnelles</h2>

                <label>Nom*</label>
                <p><input type="text" size="35" name="user_name" value="<?php if(isset($_SESSION['user_name'])){echo $_SESSION['user_name'];} ?>" required/></p>

                <label>Prénom*</label>
                <p><input type="text" size="35" name="user_firstname" value="<?php if(isset($_SESSION['user_firstname'])){echo $_SESSION['user_firstname'];} ?>" required/></p>

                <label>Adresse*<br>
                    <input type="text" name="adress" id="autocomplete" size="35" placeholder="Entrez votre adresse" onmouseout="verifAdress()"/>

                    <input type="hidden" name="adress" id="fullAddr" disabled="true"/>
                    <input type="hidden" id="street_number" disabled="true" />
                    <input type="hidden" id="route" disabled="true" />
                    <input type="hidden" id="country" disabled="true" />
                    <input type="hidden" id="administrative_area_level_1" disabled="true" /><br>

                    <label for="zip_code" id="zip_label"><br>Code postal*<br>
                        <input type="text" name="zip_code" id="postal_code"  size="35" disabled="true" onmouseout="verifAdress()"/>
                    </label><br><br>

                    <label for="ville" id="city">Ville*<br>
                        <input type="text" name="city" id="locality" size="35" disabled="true" onmouseout="verifAdress()">
                    </label><br><br>

                    <span class="tooltip">Adresse non complète</span>
                </label>

                <label id="num_label">Numéro de téléphone*<br>
                    <input type="tel" name="tel" size="35" id="tel" value="<?php if(isset($_SESSION['tel'])){echo $_SESSION['tel'];} ?>" required/>
                    <span class="tooltip">Numéro de téléphone non valide</span>
                </label><br>

                <?php if (isset($Tel_message)) {
                    echo "<span class='Alerte_Tel'>".$Tel_message."</span>";} ?>

                <button type="button" id="myBtn" class="submit_button">Modifier votre avatar</button>
                <span class="tooltip" id="avatar_tooltip">L'avatar n'est pas une image valide</span>
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>

                        <h3>Téléchargez votre avatar</h3>
                        <h4>(JPG, PNG ou GIF)</h4><br>
                        <input type="hidden" name="MAX_FILE_SIZE" value="250000" />
                        <input type="file" name="avatar" size=50 class="avatar_button" id="the_avatar"/>
                        <button type="button" class="submit_button" id="avatar_ok" onblur="verifAvatar()">Envoyer</button>

                    </div>
                </div><br><br>

                <?php if (isset($msg)) {
                echo "<span class='Alerte_Message'>".$msg."</span>";} ?>

                <button type="submit" name="modifier" class="submit_button">Modifier</button>
                <br>
            </form>

            <script type="text/javascript" src="../src/js/autocompletion.js"></script>
            <script type="text/javascript" src="../src/js/inscription.js"></script>
            <script type="text/javascript" src="../src/js/verification.js"></script>
        </article>

        <aside style="width: 50%">
            <form method="post" action="index.php?cible=monCompte&function=modificationMail">
                <h2>Modifier adresse mail</h2>

                <p><label>Entrez votre ancienne adresse mail *</label>
                    <input type="email" name="email" size="35" required />
                </p>

                <p><label>Entrez votre nouvelle adresse mail *</label>
                    <input type="email" name="newMail" size="35" required />
                </p>

                <button type="submit" name="creation_submit" class="submit_button">Modifier</button>

                <?php if (isset($Connexion_Message)) {
                echo "<span class='Alerte_Message'>".$Connexion_Message."</span>";} ?>
            </form><br><br>

            <form method="post" action="index.php?cible=monCompte&function=modificationMdp">
                <h2>Modifier mot de passe</h2>

                <p><label>Entrez votre ancien mot de passe *</label>
                    <input type="password" name="password" size="35" required />
                </p>

                <p><label>Entrez votre nouveau mot de passe *</label>
                    <input type="password" name="newmdp" size="35" required />
                </p>

                <p><label>Confirmation du nouveau mot de passe*</label>
                    <input type="password" name="confirmation_newmdp" size="35" required />
                    <span class="tooltip">Le mot de passe de confirmation doit être identique à votre nouveau mot de passe</span>
                </p>

                <button type="submit" name="creation_submit" class="submit_button">Modifier</button>

                <?php if (isset($Password_Confirmation)) {
                    echo "<div class='Alerte_Message'>".$Password_Confirmation."</div>";}
                if (isset($Alerte_Password)) {
                    echo "<span class=".$Alerte_Password." id='newmdp'> Le mot de passe doit comporter au moins 8 caractère, ainsi qu'au moins un chiffre et une majuscule.</span>";}?>
            </form><br><br>
        </aside>
    </section>

</div>
</body>