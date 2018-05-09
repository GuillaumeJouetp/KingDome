<?php
/**
 * VUE DE LA PAGE INSCRIPTION/CONNEXION
 * User: Alexandre
 * FINI
 */
?>

<head>
    <link rel="stylesheet" href="../../css/style_inscription.css">
</head>

<div id="corps">
    <section id="ins_form">

    <div id="Partie_Gauche">
        <h1>Nouveau chez KingDome?</h1><br>
        <h2>Mes identifiants</h2>

        <form method="POST" action="index.php?cible=utilisateur&function=inscription">

        <p><label>Adresse mail*<br>
                <input type="email" name="email" size="35" required/></label></p>
            <?php
            echo "<span class='Alerte_Message'>".$Email_Message."</span>"; ?>

        <p><label>Mot de passe*<br>
                <input type="password" name="password" size="35" required/></label></p>

        <p><label>Confirmation du mot de passe*<br>
                <input type="password" name="password_confirmation" size="35" required/></label></p>
            <?php
            echo "<span class='Alerte_Message'>".$Password_Confirmation."</span><br>";
            echo "<span class='$Alerte_Password'>" ?> Le mot de passe doit comporter au moins 8 caractère, ainsi qu'au moins un chiffre et une majuscule.</span><br>

        <h2>Mes informations personnelles</h2>

        <p><label>Civilité *&nbsp&nbsp&nbsp&nbsp&nbsp
                <input type="radio" name="civil" value="Mme" required/>Mme
                <input type="radio" name="civil" value="Mr" required id="civil_mr"/> Mr</label></p>

        <p><label>Nom*<br>
            <input type="text" name="last_name" size="35" required/></label></p>

        <p><label>Prénom*<br>
                <input type="text" name="first_name" size="35" required/></label></p>

        <p><label>Adresse*<br>
                <input type="text" name="adress" size="35" required/></label></p>

        <p><label for="zip_code">Code postal*
            <label for="city" id="ville">Ville*</label><br>
                    <input type="text" name="zip_code" id="zip_code" size="11" required/></label>
                <input type="text" name="city" id="city" size="18" required/></p>

        <p><label>Numéro de téléphone*<br>
                <input type="tel" name="tel" size="35" required/></label></p>
            <?php
            echo "<span class='Alerte_Message'>".$Tel_Message."</span>"; ?>

        <p><label>Date de naissance*<br>
                <input type="date" name="date_naissance" size="35" required/></label></p><br>

        <p class="submit">
            <button type="submit" name="creation_submit" class="submit_button">S'inscrire</button>
            <button type="reset" name="reset" class="submit_button" id="reset_button">Annuler</button>
        </p>
        <br>
        * Champs requis

        </form>
    </div>

    <div id="Partie_Droite">
        <h1>Déjà inscrit?</h1><br><br>

        <form method="POST" action="index.php?cible=utilisateur&function=connexion">
        <p><label>Mon adresse mail*<br>
                <input type="email" name="email" size="35" required/></label></p>

        <p><label>Mon mot de passe*<br>
                <input type="password" name="password" size="35" required/></label></p>

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
