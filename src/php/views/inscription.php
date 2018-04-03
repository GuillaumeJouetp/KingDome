<?php
/**
 * VUE DE LA PAGE INSCRIPTION/CONNEXION
 * User: Alexandre
 */
?>

<!doctype html>
<html lang=fr>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/style_inscription.css">
    <link rel="stylesheet" href="../../css/footer.css" />
    <link rel="stylesheet" href="../../css/style.css">
    <title>Inscription</title>
</head>
<body>

<?php
include "header.php";
?>

<div id="corps">
    <div id="Partie_Gauche">
        <h1>Nouveau chez KingDome?</h1><br>
        <h2>Mes identifiants</h2>

        <p><form method="POST" action="">

            <p><label for="mail">Adresse mail*</label><br>
            <input type="email" name="mail" size="35" required/></p>

            <p><label for="password">Mot de passe*</label><br>
            <input type="password" name="password" size="35" required/></p>

            <p><label for="password_confirmation">Confirmation du mot de passe*</label><br>
            <input type="password" name="password_confirmation" size="35" required/></p><br>

            <h2>Mes informations personnelles</h2>

            <p><label for="civil">Civilité *</label>&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="radio" name="civil" value="Mme" required/>Mme&nbsp&nbsp&nbsp&nbsp&nbsp
                <input type="radio" name="civil" value="Mr" required/> Mr</p>

            <p><label for="last_name">Nom*</label><br>
            <input type="text" name="last_name" size="35" required/></p>

            <p><label for="first_name">Prénom*</label><br>
            <input type="text" name="first_name" size="35" required/></p>

            <p><label for="adress">Adresse*</label><br>
            <input type="text" name="adress" size="35" required/></p>

            <p><label for="post_code">Code postal*</label> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <label for="country">Pays*</label><br>
            <input type="text" name="post_code" size="14" required/>&nbsp
                <input type="text" name="country" size="15" required/></p>

            <p><label for="tel">Numéro de téléphone*</label><br>
            <input type="tel" name="tel" size="35" required/></p>

            <p><label for="birth_day">Date de naissance</label><br>
            <input type="date" name="mail" size="35"/></p>

            <p><label for="newsletter">Je souhaite recevoir les bons plans de KingDome :</label><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="checkbox" name="par_mail"/> Par mail &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <input type="checkbox" name="par_sms"/> Par SMS</p><br>

            <p class="submit"><button type="submit" name="submit" class="submit_button">S'inscrire</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <button type="reset" name="reset" class="submit_button">Annuler</button></p><br>
            * Champs requis

        </form></p>
    </div>

    <div id="Partie_Droite">
        <h1>Déjà inscrit?</h1><br><br>

        <p><form method="POST" action="">
            <p><label for="mail">Mon adresse mail*</label><br>
                <input type="email" name="mail" size="35" required/></p>

            <p><label for="password">Mon mot de passe*</label><br>
                <input type="password" name="password" size="35" required/></p><br>

            <p class="connexion_button"><button type="submit" name="submit" class="submit_button">Connexion</button></p><br>
            * Champs requis

        </form></p>

    </div>
</div>

<?php
include "footer.php";
?>

</body>