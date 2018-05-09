<?php
/**
 * Created by PhpStorm.
 * User: PC-Adrien
 * Date: 30/04/2018
 * Time: 09:33
 */
session_start()
?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/style_profil.css">
</head>

<body>
<div id="corps">

    <h1 style="text-align: left">Mon profil - Utilisateur principal</h1></br>

    <div class="ins_form">
        <div class="Partie_2G">
            <form method="post" action="">
                <h2>Mes informations personnelles</h2>

                <p><label>Civilité &nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="civil" value="Mme" id="civil_mme"/>Mme
                        <input type="radio" name="civil" value="Mr" id="civil_mr"/> Mr</label></p>

                <p><label>Nom<br>
                        <input type="text" size="35" value="<?php echo $user['user_name']; ?>" disabled><br /><br />
                        <input type="text" name="last_name" size="35"/></label></p>

                <p><label>Prénom<br>
                        <input type="text" size="35" value="<?php echo $user['user_firstname']; ?>" disabled><br /><br />
                        <input type="text" name="first_name" size="35"/></label></p>

                <p><label>Adresse<br>
                        <input type="text" name="adress" size="35"/></label></p>

                <p><label for="zip_code">Code postal
                    <label for="city" id="ville">Ville</label><br>
                    <input type="text" name="zip_code" id="zip_code" size="11"/></label>
                    <input type="text" name="city" id="city" size="18"/></p>

                <p><label>Numéro de téléphone<br>
                        <input type="tel" name="tel" size="35"/></label></p>
                <?php echo "<span class='Alerte_Message'>".$Tel_Message."</span>"; ?>

                <p><label>Date de naissance<br>
                        <input type="date" name="date_naissance" size="35"/></label></p><br>

                <button type="submit" name="creation_submit" class="submit_button">Modifier</button>
                <br>
            </form>
        </div>

        <div class="Partie_2D">
            <form method="post" action="modif_profil.php">
                <h2>Modifier mote de passe</h2>

                <label>Entrez votre ancien mot de passe :</label>
                <input type="password" name="password" size="35"/><br/><br/>

                <label>Entrez votre nouveau mot de passe :</label>
                <input type="password" name="newmdp1" size="35"/><br/><br/>

                <label>Confirmation du nouveau mot de passe :</label>
                <input type="password" name="newmdp2" size="35"/><br/><br/>

                <button type="submit" name="creation_submit" class="submit_button">Modifier</button>
            </form><br><br>

            <form method="post" action="modif_profil.php">
                <h2>Modifier adresse e-mail</h2>

                <label for="mail1">Votre adresse mail actuel :</label><br/><br/>
                <input type="text" size="35" name="mail" disabled/><br/><br/>

                <label for="mail1">Entrez votre nouvelle adresse mail :</label>
                <input type="text" name="newmail" size="35"/><br/><br/>

                <label for="mail1">Confirmer votre nouvelle adresse mail :</label>
                <input type="text" name="newmail" size="35"/><br/><br/>

                <button type="submit" name="creation_submit" class="submit_button">Modifier</button>
            </form>
        </div>
    </div>

</div>
</body>