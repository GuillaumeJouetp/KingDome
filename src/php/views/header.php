<title><?php echo $title; ?></title>

<header>


    <div class="nom">
        <a href="index.php?cible=accueil">
            <img src="../res/images/KingDome.png" alt="Image du nom de l'application" class="kingdomepng" >
        </a>
            <span class="slogan"> Devenez le roi de votre maison </span> <!-- Un produit Domisep -->
            <span class="slogan"> Un produit Domisep </span>
    </div>


    <a href="index.php?cible=accueil" class="logo">
            <img src="../res/images/Logo.png" alt="Image du logo" class="logopng">
    </a>


    <nav>

        <button>
            <a href="index.php?cible=accueil">
                <img src="../res/icones/acceuil.png" alt="icone acceuil" class="icone"> Accueil
            </a>
        </button>

        <button>
            <a href="index.php?cible=dashboard">
                <img src="../res/icones/dashboard.png" alt="icone dashboard" class="icone">Dashboard
            </a>
        </button>

        <button>
            <a href="index.php?cible=catalogue&fonction=add">
                <img src="../res/icones/catalogue.png" alt="icone catalogue" class="icone">Catalogue
            </a>
        </button>

        <button>
            <a href="index.php?cible=contact">
                <img src="../res/icones/contact.png" alt="icone contact" class="icone">Contacter
            </a>
        </button>

        <?php if(isUserConnected() && $_SESSION['avatar'] != null){?>

            <button>
                <a href="index.php?cible=utilisateur">
                    <img src="<?php echo $_SESSION['avatar'];?>" alt="icone compte" class="icone" id="avatar">Compte
                </a>
            </button>

        <?php } else {?>

        <button>
            <a href="index.php?cible=utilisateur">
                <img src="../res/icones/monCompte.png" alt="icone compte" class="icone">Compte
            </a>
        </button>

        <?php } ?>
        
    </nav>
</header>

<span id = 'bienvenue'> <?php echo displayBienvenue() ?></span>

