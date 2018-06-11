<head>
    <title>Condition Générales d'Utilisation</title>
    <link rel="stylesheet" href="../src/css/CGU.css" />
</head> 

<div id="corps">

    <div id="intro">
        
        <h1>Conditions d'Utilisation</h1>
        
        <?php
        $reponse_texte = $bdd->query('SELECT * FROM updatable_content WHERE id = 2');
        $texte = $reponse_texte->fetch()
        ?>
                

       
        
            
        <div id="masque">
            <div class="fenetre-modale">
                <a class="fermer" href="#nullepart"><img src="..\res\icones\bouton-fermer.png"class="btn-fermer"/></a>
                <form method="post" action="index.php?cible=CGU&function=modifier_texte">
                    <label>Vos Conditions Générales d'Utilisation<br> <br> <textarea rows="30" cols="100" name="texte_CGU"><?php echo $texte['content'] ?> </textarea> </label>
                    <button type="submit" class="button">Modifier</button>
                </form>
            </div>
        </div>
    </div>
    
    	
    
    
    <div class="para"><?php echo $texte['content'] ?></div>
        <div id="masque">
            <div class="fenetre-modale">
                <a class="fermer" href="#nullepart"><img src="..\res\icones\bouton-fermer.png"class="btn-fermer"/></a>
                <form method="post" action="index.php?cible=CGU&function=modifier_texte">
                    <label>Texte des CGU : <br> <br> <textarea rows="20" cols="100" name="texte_CGU"><?php echo $texte['content'] ?> </textarea> </label>
                    <button type="submit" class="button">Modifier</button>
                </form>
            </div>
        </div>
        
        <a href="#masque" class="modif">
            <button type="button" class="button_modif_texte">Modifier le texte</button>
        </a>
        
</div> 
