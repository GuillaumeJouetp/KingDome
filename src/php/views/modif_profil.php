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
</head>

<body>
<div id="corps">

    <h1 style="text-align: left">Mon profil - Utilisateur principal</h1></br>

    <section  class="form">
        <form method="post" action="index.php?cible=modif_profil&function=modification">
            <h2>Mes informations personnelles</h2>

            <label>Civilité</label>
                <p><input type="radio" name="civil" value="Mme" id="civil_mme"/>Mme
                <input type="radio" name="civil" value="Mr" id="civil_mr"/> Mr</p>

            <label>Nom</label>
            <p><input type="text" size="35" value="<?php echo $_SESSION['user_name']; ?>" disabled/></p>

            <label>Prénom</label>
            <p><input type="text" size="35" value="<?php echo $_SESSION['user_firstname']; ?>" disabled/></p>

            <label>Adresse</label>
            <p><input type="text" size="35" value="" disabled/></p>

            <label for="zip_code">Code postal</label>
            <p><input type="text" name="zip_code" id="zip_code" size="11"/></p>
            <label for="city" id="ville">Ville</label>
            <p><input type="text" name="city" id="city" size="18"/></p>

            <label>Numéro de téléphone</label>
            <p><input type="tel" name="tel" size="35" value=""/></p>

            <label>Date de naissance</label>
            <p><input type="date" name="date_naissance" size="35" value="<?php echo $_SESSION['birth_date']; ?>"/></p>

            <button type="submit" name="creation_submit" class="submit_button">Modifier</button>
            <br>
        </form>

        <form method="post" action="modif_profil.php">
            <h2>Modifier mote de passe</h2>

            <label>Entrez votre ancien mot de passe :</label>
            <p><input type="password" name="password" size="35"/></p><br/>

            <label>Entrez votre nouveau mot de passe :</label>
            <p><input type="password" name="newmdp1" size="35"/></p><br/>

            <label>Confirmation du nouveau mot de passe :</label>
            <p><input type="password" name="newmdp2" size="35"/></p><br/>

            <button type="submit" name="creation_submit" class="submit_button">Modifier</button>
        </form><br><br>

        <form method="post" action="modif_profil.php">
            <h2>Modifier adresse e-mail</h2>

            <label for="mail1">Votre adresse mail actuel :</label>
            <p><input type="text" size="35" name="mail" disabled/></p><br/>

            <label for="mail1">Entrez votre nouvelle adresse mail :</label>
            <p><input type="text" name="newmail" size="35"/></p><br/>

            <label for="mail1">Confirmer votre nouvelle adresse mail :</label>
            <p><input type="text" name="newmail" size="35"/></p><br/>

            <button type="submit" name="creation_submit" class="submit_button">Modifier</button>
        </form>
    </section>

</div>
</body>