<head>
    <title>Condition d'Utilisation</title>
    <link rel="stylesheet" href="../src/css/CGU.css" />
</head> 

<div id="CGU">

    <div id="intro">
        
        <h1>Conditions d'Utilisation</h1>
        
        <?php
        $reponse_texte = $bdd->query('SELECT * FROM updatable_content WHERE id = 1');
        $texte = $reponse_texte->fetch()
        ?>
                

        <div class="p_intro"><?php echo $texte['content'] ?></div>
        
        <a href="#masque" class="modif">
            <button type="button" class="button_modif_texte">Modifier le texte</button>
        </a>
            
        <div id="masque">
            <div class="fenetre-modale">
                <a class="fermer" href="#nullepart"><img src="..\res\icones\bouton-fermer.png"class="btn-fermer"/></a>
                <form method="post" action="index.php?cible=CGU&function=modifier_texte">
                    <label>Texte d'introduction : <br> <br> <textarea rows="30" cols="35" name="texte_introCGU"><?php echo $texte['content'] ?> </textarea> </label>
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
                    <label>Texte des CGU : <br> <br> <textarea rows="90" cols="105" name="texte_CGU"><?php echo $texte['content'] ?> </textarea> </label>
                    <button type="submit" class="button">Modifier</button>
                </form>
            </div>
        </div>        

    </div>

        
</div> 
