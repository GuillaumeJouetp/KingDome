<?php
/**
 * VUE DE LA PAGE MON PROFIL
 * User: Adrien
 * En cours
 */
?>

<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASX0Eevc77t1rhFySVK7xfMuUV9dUi-30&libraries=places"></script>
    <link rel="stylesheet" href="css/mon_compte.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<div id="corps">

    <div id="profil">
        <h1 style="text-align: left">Mon profil - Administrateur</h1></br>

        <h2>Informations personnelles</h2>
        <div id="info_perso">
            <div id="info_persop">
                <p>Nom : <?php echo $_SESSION['user_name']; ?>
                    <?php if ($_SESSION['avatar']!=null){ ?>
                        <img src="<?php echo $_SESSION['avatar']; ?>"
                             alt="Photo de profil" style="float: right; width: 200px; height: 200px;">
                    <?php } ?>
                </p>
                <p>Prénom : <?php echo $_SESSION['user_firstname']; ?></p>
                <p>Adresse mail : <?php echo $_SESSION['email']; ?></p>
                <p style="text-align: center">
                    <button type="button">
                        <a href="index.php?cible=modif_profil&function=modifier">Modifier le profil</a>
                    </button>
                </p>
            </div>
        </div>
    </div>
    <br><br>

    <div class="wrapper2">
        <span class="data2">  <?= getNumHome($bdd)[0] ?> </span>
        <span class="prefixe2"> maisons sont enregistrées sur KingDome !</span>
    </div>

    <div class="wrapper2">
        <span class="prefixe2">Ainsi que &nbsp;</span>
        <span class="data2">  <?= getNumRoom($bdd)[0] ?> </span>
        <span class="prefixe2"> pièces !</span>
    </div>

    <p style="text-align: center">
        <button>
            <a href="index.php?cible=utilisateur&function=deconnexion">
                <h4>Deconnexion</h4>
            </a>
        </button>
    </p>

</div>