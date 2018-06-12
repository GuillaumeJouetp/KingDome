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
    <link rel="stylesheet" href="css/monCompte.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div id="corps">

    <div id="profil">
        <h1 style="text-align: left">Mon profil - Utilisateur principal</h1></br>

        <h2>Informations personnelles</h2>
        <div id="info_perso">
            <div id="info_persop">
                <p>Nom : <?php echo $_SESSION['user_name']; ?>
                    <img src=" <?php echo $_SESSION['avatar'];?>" alt="Photo de profil" style="float: right; width: 200px; height: 200px;"></p>
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

    <div>
        <h3>Nombre de résidences enregistrées</h3>


    </div>
    <br><br>

    <p style="text-align: center">
        <button>
            <a href="index.php?cible=utilisateur&function=deconnexion">
                <h4>Deconnexion</h4>
            </a>
        </button>
    </p>

</div>
</body>