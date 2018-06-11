<head>
    <link rel="stylesheet" href="css\dashboard.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASX0Eevc77t1rhFySVK7xfMuUV9dUi-30&libraries=places"></script>
</head>

	<div id=corps>
        <?php
        $droit=recupereTous($bdd,'user_types')
        ?>
       <form method="post" action="index.php?cible=dashboard&function=changer_droit">
           <?php echo "<span class='Alerte_Message'>".$Email_Message_conf."</span>"; ?>
           <legend><h2>Modifier les droits</h2></legend>
           <label>Adresse mail : <input type="email" name="email"><?php echo "<span class='Alerte_Message'>".$Email_Message."</span>"; ?></label><br><br>
           <label>Nouveau droit : <select name="nouveau_droit"><?php
                   foreach($droit as $nouveau_droit){
                       echo("<option>" .$nouveau_droit['name'] ."</option>");
                   }
                   ?></select></label><br><br>
           <button type="submit">Modifier</button>
       </form>

        <form method="post" action="index.php?cible=dashboard&function=modif_footer" enctype="multipart/form-data" id="myForm">
            <legend><h2>Modifier le footer</h2></legend>
            <label>Adresse mail : <input type="email" name="email"></label><br><br>
            <label>Numéro de téléphone : <input type="tel" name="tel"></label><br><br>
            <label>Adresse :
                <input type="text" name="adress" id="autocomplete" size="39" placeholder="Entrez votre adresse" >

                <input type="hidden" name="adress" id="fullAddr" size="39" disabled="true"/>
                <input type="hidden" id="street_number" disabled="true" />
                <input type="hidden" id="route" disabled="true" />
                <input type="hidden" id="country" disabled="true" />
                <input type="hidden" id="administrative_area_level_1" disabled="true" /></label><br>

                <label for="zip_code" id="zip_label"><br>Code postal : <input type="text" name="zip_code" id="postal_code" size="13" disabled="true" ></label><br><br>
                <label for="ville" id="city">Ville : <input type="text" name="city" id="locality" disabled="true" ></label><br><br>

            <button type="submit">Modifier</button>
        </form>

        <script type="text/javascript" src="../src/js/autocompletion.js"></script>

        <form method="post" action="index.php?cible=dashboard&function=modif_accueil">
            <legend><h2>Modifier la page d'accueil</h2></legend>

    </div>

