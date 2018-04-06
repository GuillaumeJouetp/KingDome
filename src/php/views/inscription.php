<?php
/**
 * VUE DE LA PAGE INSCRIPTION/CONNEXION
 * User: Alexandre
 * FINI
 */
?>

<!doctype html>
<html lang=fr>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style_inscription.css">
    <link rel="stylesheet" href="../css/footer.css" />
    <link rel="stylesheet" href="../css/style.css">
    <title>Inscription</title>
</head>
<body>

<div id="corps">
    <div id="Partie_Gauche">
        <h1>Nouveau chez KingDome?</h1><br>
        <h2>Mes identifiants</h2>

        <p><form method="POST" action="">

            <p><label>Adresse mail*<br>
            <input type="email" name="mail" size="35" required/></label></p>

            <p><label>Mot de passe*<br>
            <input type="password" name="password" size="35" required/></label></p>

            <p><label>Confirmation du mot de passe*<br>
            <input type="password" name="password_confirmation" size="35" required/></label></p><br>

            <h2>Mes informations personnelles</h2>

            <p><label>Civilité *&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="radio" name="civil" value="Mme" required/>Mme&nbsp&nbsp&nbsp&nbsp&nbsp
                <input type="radio" name="civil" value="Mr" required/> Mr</label></p>

            <p>Nom*</label><br>
            <input type="text" name="last_name" size="35" required/><label></p>

            <p><label>Prénom*<br>
            <input type="text" name="first_name" size="35" required/></label></p>

            <p><label>Adresse*<br>
            <input type="text" name="adress" size="35" required/></label></p>

            <p><label>Code postal* &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <label>Pays*<br>
            <input type="text" name="post_code" size="14" required/></label>&nbsp
                <input type="text" name="country" size="15" required/></label></p>

            <p><label>Numéro de téléphone*<br>
            <input type="tel" name="tel" size="35" required/></label></p>

            <p><label>Date de naissance<br>
            <input type="date" name="mail" size="35"/></label></p>

            <p><label>Je souhaite recevoir les bons plans de KingDome :<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="checkbox" name="par_mail"/> Par mail &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <input type="checkbox" name="par_sms"/> Par SMS</label><br></p>

            <p class="submit"><button type="submit" name="submit" class="submit_button">S'inscrire</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <button type="reset" name="reset" class="submit_button">Annuler</button></p><br>
            * Champs requis

        </form></p>
    </div>

    <div id="Partie_Droite">
        <h1>Déjà inscrit?</h1><br><br>

        <p><form method="POST" action="">
            <p><label>Mon adresse mail*<br>
                <input type="email" name="mail" size="35" required/></label></p>

            <p><label>Mon mot de passe*<br>
                <input type="password" name="password" size="35" required/></label><br></p>

            <p class="connexion_button"><button type="submit" name="submit" class="submit_button">Connexion</button></p><br>
            * Champs requis

        </form></p>

    </div>
</div>

</body>