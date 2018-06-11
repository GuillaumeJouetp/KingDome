<head> 
    <link rel="stylesheet" href="css/footer.css" />

</head>
<footer>

    <?php
    $reponse_footer = $bdd->query('SELECT * FROM footer');
    $info_footer = $reponse_footer->fetch();
    ?>

			    <ul id="Coordonnees">
   				    <h3>Nos coordonnées</h3>
                    <li><?php echo $info_footer['mail_address'] ?></li>
                    <li><?php echo $info_footer['phone_number'] ?></li>
                    <li><?php echo $info_footer['address'] ?></li>
                    <li><?php echo $info_footer['postal_code'] . " " . $info_footer['city'] ?></li>
                </ul>
                
            
                
                <div id="pb">
                    <h3>Un problème ?</h3>
                    <h3 id="sug">Une suggestion ?</h3>
                    
                    <div id="bouton">
                            <button><a href="index.php?cible=contact">Nous contacter !</a></button><br>
                            <button><a href="index.php?cible=ment_leg">Mentions légales</a></button><br>
                            <button><a href="index.php?cible=CGU">Conditions Générales d'utilisation</a></button>
                    </div>

                </div>

                <div id="reseaux">
                    <h3>Rejoignez nous sur les réseaux sociaux !</h3>

                    <div class="imgsR">
                        <img src="../res/icones/facebook.png" alt="Facebook" width="40" height="40"/>
                        <img src="../res/icones/instagram.png" alt="Instagram" width="40" height="40" />
                        <img src="../res/icones/twitter.png" alt="twitter" width="40" height="40" />
                        <img src="../res/icones/linkedin.png" alt="linkedin" width="40" height="40" />
                    </div>
                </div>

</footer>