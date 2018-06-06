<?php
$ch = curl_init();
curl_setopt(
    $ch,
    CURLOPT_URL,
    "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=7896");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$logs = curl_exec($ch);
curl_close($ch);

/**
 * READ
 * Renvoie la dernière trame inséré dans la base de donnée
 * @param PDO $bdd
 * @return boolean
 */

function get_last_trame(PDO $bdd): array {

    $statement = $bdd->prepare('SELECT id,MAX(timestamp) AS maxTimestamp FROM datas');
    $statement->execute();
    return $statement->fetch();
}
