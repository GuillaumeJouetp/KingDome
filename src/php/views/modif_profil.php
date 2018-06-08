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
    <link rel="stylesheet" href="css/monCompte.css">
    <link rel="stylesheet" href="css/inscription.css">
</head>

<body>
<div id="corps">

    <h1 style="text-align: left">Mon profil - Utilisateur principal</h1></br>

    <section style="display: flex">
        <form method="post" action="index.php?cible=monCompte&function=modificationInfos" enctype="multipart/form-data" style="width: 600px">
            <h2>Mes informations personnelles</h2>

            <label>Nom</label>
            <p><input type="text" size="35" name="user_name" value="<?php if(isset($_SESSION['user_name'])){echo $_SESSION['user_name'];} ?>" /></p>

            <label>Prénom</label>
            <p><input type="text" size="35" name="user_firstname" value="<?php if(isset($_SESSION['user_firstname'])){echo $_SESSION['user_firstname'];} ?>" /></p>

            <label>Adresse</label>
            <p><input type="text" size="35" name="adress" value="<?php if(isset($_SESSION['adress'])){echo $_SESSION['adress'];} ?>" /></p>

            <label for="zip_code">Code postal</label>
            <p><input type="text" name="zip_code" id="zip_code" size="11" placeholder="<?php if(isset($_SESSION['zip_code'])){echo $_SESSION['zip_code'];} ?>"/></p>
            <label for="city" >Ville</label>
            <p><input type="text" name="city" id="city" size="35" placeholder="<?php if(isset($_SESSION['city'])){echo $_SESSION['city'];} ?>"/></p>

            <label>Numéro de téléphone</label>
            <p><input type="tel" name="tel" size="35" placeholder="<?php if(isset($_SESSION['tel'])){echo $_SESSION['tel'];} ?>"/></p>

            <label>Date de naissance</label>
            <p><input type="date" name="date_naissance" size="35" placeholder="<?php if(isset($_SESSION['birth_date'])){echo $_SESSION['birth_date'];} ?>"/></p>

            <!--<button type="button" id="myBtn" class="submit_button">Ajouter un avatar</button>
            <span class="tooltip" id="avatar_tooltip">L'avatar n'est pas une image valide</span><br>

            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>

                    <h3>Téléchargez votre avatar</h3>
                    <h4>(JPG, PNG ou GIF)</h4><br>
                    <input type="hidden" name="MAX_FILE_SIZE" value="250000" />
                    <input type="file" name="avatar" size=50 class="avatar_button" id="the_avatar"/>
                    <button type="button" class="submit_button" id="avatar_ok" onblur="verifAvatar()">Envoyer</button>

                </div>
            </div><br>-->

            <button type="submit" name="modifier" class="submit_button">Modifier</button>
            <br>
        </form>

        <form method="post" action="index.php?cible=monCompte&function=modificationMdp">
            <h2>Modifier mot de passe</h2>

            <p><label>Entrez votre ancien mot de passe *</label>
                <input type="password" name="password" size="39" required />
            </p><br>

            <p><label>Entrez votre nouveau mot de passe *</label>
                <input type="password" name="newmdp1" size="39" required />
            </p><br>

            <p><label>Confirmation du mot de passe*</label>
                <input type="password" name="newmdp2" size="39" required />
                <span class="tooltip">Le mot de passe de confirmation doit être identique à celui d'origine</span>
            </p><br>

            <button type="submit" name="creation_submit" class="submit_button">Modifier</button>
        </form><br><br>
    </section>

    <script type="text/javascript" src="../src/js/inscription.js"></script>
    <script type="text/javascript" src="../src/js/verification.js"></script>

</div>
</body>