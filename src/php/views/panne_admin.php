<head>
    <link rel="stylesheet" href="css/panne.css">
</head>

<div id='corps'>
    <?php
    $incoming_messages_panne = recupereTous($bdd, 'incoming_messages_panne');
    if (empty($incoming_messages_panne)){
        echo "Vous n'avez pas de nouveaux messages.";
    }
    else {
        $cpt = 0;
        foreach ($incoming_messages_panne as $cle => $elt) {
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


                if ($champ === 'nom_capt') {
                    echo(
                        '<div class = "container_nom_capt_champ_data">'
                        . '<div class = "container_nom_capt_champ">'
                        . 'Objet :'
                        . '</div>'
                        . '<div class = "container_nom_capt_data">'
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
            echo "<a class='suppr' href=''> Supprimer le message (A venir !) </a>";
            echo "</section>";

        }
    }
    ?>

</div>

