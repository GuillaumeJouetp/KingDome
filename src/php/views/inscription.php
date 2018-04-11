<?php
/**
 * VUE DE LA PAGE INSCRIPTION/CONNEXION
 * User: Alexandre
 * FINI
 */
?>

<head>
    <link rel="stylesheet" href="css/style_inscription.css">
</head>

<div id="corps">
    <section id="ins_form">

    <div id="Partie_Gauche">
        <h1>Nouveau chez KingDome?</h1><br>
        <h2>Mes identifiants</h2>

        <form method="POST" action="">

        <p><label>Adresse mail*<br>
                <input type="email" name="mail" size="35" required/></label></p>

        <p><label>Mot de passe*<br>
                <input type="password" name="password" size="35" required/></label></p>

        <p><label>Confirmation du mot de passe*<br>
                <input type="password" name="password_confirmation" size="35" required/></label></p><br>

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

        <p><label for="post_code">Code postal*
            <label for="city" id="ville">Ville*</label><br>
                    <input type="text" name="post_code" id="post_code" size="11" required/></label>
                <input type="text" name="city" id="city" size="18" required/></p>

        <p><label>Numéro de téléphone*<br>
                <input type="tel" name="tel" size="35" required/></label></p>

        <p><label>Date de naissance<br>
                <input type="date" name="mail" size="35"/></label></p>

        <p><label>Je souhaite recevoir les bons plans de KingDome :<br>
                <input type="checkbox" name="par_mail" id="par_mail"/> Par mail
                <input type="checkbox" name="par_sms" id="par_sms"/> Par SMS</label><br></p>

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

        <form method="POST" action="">
        <p><label>Mon adresse mail*<br>
                <input type="email" name="mail" size="35" required/></label></p>

        <p><label>Mon mot de passe*<br>
                <input type="password" name="password" size="35" required/></label><br></p>

        <p class="connexion_button">
            <button type="submit" name="connexion_submit" class="submit_button">Connexion</button>
        </p>
        <br>
        * Champs requis

        </form>
    </div>

    </section>
</div>
