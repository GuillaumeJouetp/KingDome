<head>
    <title>Mentions légale</title>
    <link rel="stylesheet" href="../src/css/ment_leg.css" />
</head> 

<div id="ment_leg">

    <div id="intro">
        
        <h1>Mentions légales</h1>
        
        <?php
        $reponse_texte = $bdd->query('SELECT * FROM updatable_content WHERE id = 3');
        $texte = $reponse_texte->fetch()
        ?>
                

        
        
            
        <div id="masque">
            <div class="fenetre-modale">
                <a class="fermer" href="#nullepart"><img src="..\res\icones\bouton-fermer.png"class="btn-fermer"/></a>
                <form method="post" action="index.php?cible=ment_leg&function=modifier_texte">
                    <label>Vos mentions légales<br> <br> <textarea rows="10" cols="100" name="texte_ment_leg"><?php echo $texte['content'] ?> </textarea> </label>
                    <button type="submit" class="button">Modifier</button>
                </form>
            </div>
        </div>
    </div>
    
    	      
                    
    
    <div class="para"><?php echo $texte['content'] ?></div>
        <div id="masque">
            <div class="fenetre-modale">
                <a class="fermer" href="#nullepart"><img src="..\res\icones\bouton-fermer.png"class="btn-fermer"/></a>
                <form method="post" action="index.php?cible=ment_leg&function=modifier_texte">
                    <label>Texte des mentions légales: <br> <br> <textarea rows="20" cols="100" name="texte_ment_leg"><?php echo $texte['content'] ?> </textarea> </label>
                    <button type="submit" class="button">Modifier</button>
                </form>
            </div>
        </div>        

    </div>
    
    	<a href="#masque" class="modif">
            <button type="button" class="button_modif_texte">Modifier le texte</button>
        </a>         

        
</div>