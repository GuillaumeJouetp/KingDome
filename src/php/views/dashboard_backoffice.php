<head>
    <link rel="stylesheet" href="css\dashboard.css">
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

    </div>

