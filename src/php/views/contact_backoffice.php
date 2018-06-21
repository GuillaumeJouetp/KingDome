<head>
    <link rel="stylesheet" href="css/contact.css">
</head>

<div id='corps'>
    <?php

    echo("<h1> Messagerie </h1>");

    $incoming_messages = recupereTous($bdd, 'incoming_messages');
    if (empty($incoming_messages)){
        echo "Vous n'avez pas de nouveaux messages.";
    }
    else {
        $cpt = 0;
        foreach ($incoming_messages as $cle => $elt) {
            $cpt++;
            echo(
                "<section class = 'allMessageContainer'>"
                . "<h2> Message $cpt :</h2>"
            );
            foreach ($elt as $champ => $data) {
                if ($champ === 'mail') {
                    echo(
                        '<div class = "container_mail_champ_data">'
                        . '<div class = "container_mail_champ">'
                        . 'De :'
                        . '</div>'
                        . '<div class = "container_mail_data">'
                        . $data
                        . '</div>'
                        . '</div>'
                    );
                }
                if ($champ === 'object') {
                    echo(
                        '<div class = "container_object_champ_data">'
                        . '<div class = "container_object_champ">'
                        . 'Objet :'
                        . '</div>'
                        . '<div class = "container_object_data">'
                        . $data
                        . '</div>'
                        . '</div>'
                    );
                }
                if ($champ === 'content') {
                    echo(
                        '<div class = "container_content_champ_data">'
                        . '<div class = "container_content_champ">'
                        . 'Message :'
                        . '</div>'
                        . '<div class = "container_content_data">'
                        . $data
                        . '</div>'
                        . '</div>'
                    );
                }
            }
            $get1 = $incoming_messages[$cle]['id'];
            echo ("<form action='index.php?cible=contact&function=suppr_message&message_id=$get1' method='post'><button class='button_modif' type='submit'>Supprimer</button></form>");
            echo "</section>";

        }
    }
    
    
    echo("<h1> Panne des utilisateurs </h1>");
    
    $incoming_messages_panne = recupereTous($bdd, 'incoming_messages_panne');
    if (empty($incoming_messages_panne)){
    	echo "Vous n'avez pas de nouveaux messages de panne.";
    }
    else {
    	$cpt = 0;
    	foreach ($incoming_messages_panne as $cle => $elt) {
    		$cpt++;
    		echo(
    				"<section class = 'allMessageContainer'>"
    				. "<h2> Message Panne $cpt :</h2>"
    				);
    		foreach ($elt as $champ => $data) {
    			if ($champ === 'mail') {
    				echo(
    						'<div class = "container_mail_champ_data">'
    						. '<div class = "container_mail_champ">'
    						. 'De :'
    						. '</div>'
    						. '<div class = "container_mail_data">'
    						. $data
    						. '</div>'
    						. '</div>'
    						);
    			}
    			if ($champ === 'nom_capt') {
    				echo(
    						'<div class = "container_object_champ_data">'
    						. '<div class = "container_object_champ">'
    						. 'Référence du capteur :'
    						. '</div>'
    						. '<div class = "container_object_data">'
    						. $data
    						. '</div>'
    						. '</div>'
    						);
    			}
    			if ($champ === 'content') {
    				echo(
    						'<div class = "container_content_champ_data">'
    						. '<div class = "container_content_champ">'
    						. 'Message :'
    						. '</div>'
    						. '<div class = "container_content_data">'
    						. $data
    						. '</div>'
    						. '</div>'
    						);
    			}
    		}
    		$get2 = $incoming_messages_panne[$cle]['id'];
    		echo ("<form action='index.php?cible=contact&function=suppr_message_panne&message_id_panne=$get2' method='post'><button class='button_modif' type='submit'>Supprimer</button></form>");
    		echo "</section>";
    		
    	}
    }
    ?>

</div>

