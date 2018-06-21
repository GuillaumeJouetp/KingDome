<?php
include "connexionPDO.php";

/**
 * retourne le nombre de pages consultés aujourd'hui
 * @param PDO $bdd
 * @return int
 */
function getNumConsultedPages(PDO $bdd) {
    $retour = $bdd->prepare('SELECT visites FROM visites_jour WHERE date=CURRENT_DATE()');
    $retour->execute();
    $donnees = $retour->fetch();
    $visites = $donnees['visites'];
    return $visites;
}

/**
 * retourne un array qui contient les datas du graph
 * @param PDO $bdd
 * @return array
 */
function getdatas(PDO $bdd){
    /*On récupère les 7 derniers jours*/
    $query = $bdd->prepare('SELECT visites,date FROM visites_jour ORDER BY date DESC LIMIT 7 ');
    $query->execute();
    $xDatas = $query->fetchAll();
    /*On affiche les 7 derniers jours dans l'ordre chronologique*/
    $xDatas = array_reverse($xDatas);
    return $xDatas;
}


/**
 * retourne un array qui contient les datas du graph
 * @param PDO $bdd
 * @return array
 */
function getdatasConso(PDO $bdd,$duree){

	switch ($duree){
		
		case 1:
			$mois = $bdd->query('SELECT date FROM conso_mois WHERE date >= NOW() - INTERVAL 1 MONTH AND id_user='.$_SESSION['user_id']);
			$mois = $mois->fetch();
			//$mois = array($mois['date']);
			break;
			
		case 3 :
			$mois = $bdd->query('SELECT date FROM conso_mois WHERE date >= NOW() - INTERVAL 3 MONTH AND id_user='.$_SESSION['user_id']);
			$mois = $mois->fetchAll();
			//$mois= array ($mois[0][0], $mois[1][0], $mois[2][0]);
			break;
			
		case 6 :
			$mois = $bdd->query('SELECT date FROM conso_mois WHERE date >= NOW() - INTERVAL 6 MONTH AND id_user='.$_SESSION['user_id']);
			$mois = $mois->fetchAll();
			//$mois= array ($mois[0][0], $mois[1][0], $mois[2][0], $mois[3][0], $mois[4][0], $mois[5][0]);

			break;
			
		case 12 :
			$mois = $bdd->query('SELECT date FROM conso_mois WHERE date >= NOW() - INTERVAL 1 YEAR AND id_user='.$_SESSION['user_id']);
			$mois = $mois->fetchAll();
			//$mois= array ($mois[0][0], $mois[1][0], $mois[2][0], $mois[3][0], $mois[4][0], $mois[5][0], $mois[6][0], $mois[7][0], $mois[8][0], $mois[9][0], $mois[10][0], $mois[11][0]);
			break;
	}
	/*On récupère les */

	return $mois;
}


/**
 * modifie nombre de pages consultés aujourd'hui
 * @param PDO $bdd
 * @return int
 */

function setNumConsultedPages(PDO $bdd) {
    // Affichage du nombre de visites d'aujourd'hui
    //On compte le nombre d'entrées pour aujourd'hui
    $retour_count = $bdd->prepare('SELECT COUNT(*)  AS nbre_entrees FROM visites_jour WHERE date=CURRENT_DATE()');
    $retour_count->execute();
    //Fetch-array
    $donnees_count = $retour_count->fetch();

    //Si la date d'aujourd'hui n'a pas encore été enregistrée (première visite de la journée)
    if ($donnees_count['nbre_entrees'] == 0)
    {
        //On rentre la date d'aujourd'hui et on marque 1 comme nombre de visites.
        $statement = $bdd->prepare('INSERT INTO visites_jour(visites, date) VALUES (1, CURRENT_DATE());');
        $statement->execute();
        //On affiche une visite car c'est la première visite de la journée
        return '1';
    //Si la date a déjà été enregistrée
    } else {
        //On sélectionne l'entrée qui correspond à notre date
        $retour = $bdd->prepare('SELECT visites FROM visites_jour WHERE date=CURRENT_DATE()');
        $retour->execute();
        $donnees = $retour->fetch();
        //Incrémentation du nombre de visites
        $visites = $donnees['visites'] + 1;
        //Update dans la base de données
        $statement = $bdd->prepare( 'UPDATE visites_jour SET visites = visites + 1 WHERE date=CURRENT_DATE()');
        $statement->execute();
        //Enfin, on affiche le nombre de visites d'aujourd'hui !
        return $visites;
    }

}

/**
 * retourne le nombre record de connexion ainsi que la date a laquelle il a été atteint
 * @param PDO $bdd
 * @return array
 */

function getMaxConnec(PDO $bdd){
    //On sélectionne l'entrée qui a le nombre visite le plus important
    $retour_max = $bdd->prepare( 'SELECT visites, date FROM visites_jour ORDER BY visites DESC LIMIT 0, 1');
    $retour_max->execute();
    $donnees_max = $retour_max->fetch();
    // On l'affiche ainsi que la date à laquelle le record a été établi
    return $donnees_max;

}

/**
 * retourne la moyenne du nombre de visites par jour
 * @param PDO $bdd
 * @return int
 */
function getMoy(PDO $bdd){
    $total_visites = 0; //Nombre de visites
    $total_jours = 0;//Nombre de jours enregistrés dans la base

    $total_visites = $bdd->query( 'SELECT SUM(visites) AS total_visites FROM visites_jour ')->fetch();
    $total_visites = $total_visites['total_visites'];

    $total_jours = $bdd->query( 'SELECT COUNT(*) AS total_jours FROM visites_jour')->fetch();
    $total_jours = $total_jours['total_jours'];

    //on fait la moyenne
    $moyenne = $total_visites/$total_jours;
    return $moyenne ;
}
