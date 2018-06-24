<?php
include "connexionPDO.php";

/**
 * Récupère tous les éléments d'une table
 * @param PDO $bdd
 * @param string $table
 * @return array
 */
function recupereTous(PDO $bdd, string $table): array {
    $query = 'SELECT * FROM ' . $table;
    return $bdd->query($query)->fetchAll();
}

/**
 * Recherche des éléments en fonction des attributs passés en paramètre
 * @param PDO $bdd
 * @param string $table
 * @param array $attributs
 * @return array
 */
function recherche(PDO $bdd, string $table, array $attributs): array {

    $where = "";
    foreach($attributs as $key => $value) {
        $where .= "$key = :$key" . ", ";
    }
    $where = substr_replace($where, '', -2, 2);

    $statement = $bdd->prepare('SELECT * FROM ' . $table . ' WHERE ' . $where);


    foreach($attributs as $key => $value) {
        $statement->bindParam(":$key", $value);
    }
    $statement->execute();

    return $statement->fetchAll();

}

/**
 * CREATE
 * Insère une nouvelle entrée à une table
 * @param PDO $bdd
 * @param array $values (Souvent le $_POST)
 * @param string $table
 * @return boolean
 */
function insertion(PDO $bdd, array $values, string $table): bool {

    $attributs = '';
    $valeurs = '';
    foreach ($values as $key => $value) {

        $attributs .= $key . ', ';
        $valeurs .= ':' . $key . ', ';
        $v[] = $value;
    }

    $attributs = substr_replace($attributs, '', -2, 2); //Enleve la dernière virgule pour ne pas faire échouer la requète
    $valeurs = substr_replace($valeurs, '', -2, 2); // Pareil

    $query = ' INSERT INTO ' . $table . ' (' . $attributs . ') VALUES (' . $valeurs . ')';

    $donnees = $bdd->prepare($query);
    $requete = "";
    foreach ($values as $key => $value) {
        $requete = $requete . $key . ' : ' . $value . ', ';
        $donnees->bindParam($key, $values[$key]); // pq pas juste value ?
    }

    return $donnees->execute();
}

/**
 * UPDATE
 * Modifie une variable dans une ligne d'une table ciblant son id
 * @param PDO $bdd
 * @param array $values
 * @param int $id (id de l'entrée à modifier)
 * @param string $table
 * @return boolean
 */
function modification(PDO $bdd, string $nouvelle_valeur,string $colonne, int $id, string $table): bool{
	$req = $bdd->prepare('UPDATE '.$table.' SET '.$colonne.'= :nouveau_texte WHERE id ='.$id);
	return $req->execute(array('nouveau_texte' => $nouvelle_valeur));
	
	
	
}

/**
 * REMOVE
 * Supprime une entrée dans devices ciblant son id
 * @param PDO $bdd
 * @param int $id
 * @param string $table
 * @return boolean
 */
function supprimer(PDO $bdd, int $id, string $table): bool{

	$req = $bdd->prepare('DELETE FROM '.$table.' WHERE id='.$id);
    return $req->execute();
}

/**
 * Renvoie le type d'utilisateur d'un user ciblant son id
 * @param PDO $bdd
 * @param int $id
 * @param string $table
 * @return string
 */

function getUserType(PDO $bdd, $id){
    $req = $bdd->prepare('SELECT user_type_id FROM users WHERE id=?');
    $req->bindParam(1, $id);
    $req->execute();
    return $req->fetch();
}

/**
 * Retroune toutes les infos d'un utilisateur en fonction de son email (identification a la connexion)
 * @param PDO $bdd
 * @param string $table
 * @param string $email
 * @return array
 */
function Get_User_Data(PDO $bdd, string $table, string $email): array {

    $statement = $bdd->prepare('SELECT * FROM ' . $table . ' WHERE email = :email');
    $statement->execute(array(':email' => $email));
    return $statement->fetch();
}

/**
 * Actualise toutes les infos d'un utilisateur en fonction de son id (modification info perso)
 * @param PDO $bdd
 * @param string $table
 * @param string $email
 * @return array
 */
function Update_User_Data(PDO $bdd, string $table, string $id): array {

    $statement = $bdd->prepare('SELECT * FROM ' . $table . ' WHERE id = :id');
    $statement->execute(array(':id' => $id));
    return $statement->fetch();
}


/**
 * Retroune vrai ou faux si l'email est déjà dans la base de données
 * @param PDO $bdd
 * @param string $table
 * @param string $email
 * @return bool
 */
function Is_Email_Exists(PDO $bdd, string $table, string $email): bool {
    $statement = $bdd->prepare('SELECT COUNT(*) FROM ' . $table . ' WHERE email = :email');
    $statement->execute(array(':email' => $email));
    if($statement->fetchColumn() > 0){
        return true;
    } else {
        return false;
    }
}

/**
 * Retourne la derniere entrée (en terme de date) ajouté à une table
 * @param PDO $bdd
 * @param string $table
 * @param string $entre
 * @return array
 */
function get_last(PDO $bdd, string $table, string $email): array {

    $statement = $bdd->prepare('SELECT * FROM ' . $table . ' WHERE email = :email');
    $statement->execute(array(':email' => $email));
    return $statement->fetch();
}




/**
 * Recherche nom devices en fonction des attributs passés en paramètre
 * @param PDO $bdd
 * @param string $table
 * @param array $attributs
 * @return array
 */
function recherche_device(PDO $bdd, string $attributs): array {
	
	$query = 'SELECT name FROM device_types WHERE id=' . $attributs;
	return $bdd->query($query)->fetchAll();
}

/**
 * Recherche nom devices en fonction des attributs passés en paramètre
 * @param PDO $bdd
 * @param string $table
 * @param array $attributs
 * @return array
 */
function recherche_type_capteur_trame(PDO $bdd, string $attributs): array {
	$query = 'SELECT type_capteur_trame FROM device_types WHERE name='. $attributs;
    return $bdd->query($query)->fetchAll();
}



/**
 * Renvoie le nombre d'inscrits a kingdome
 * @param PDO $bdd
 * @return array
 */
function getNumInscrits($bdd){
    $statement = $bdd->prepare('SELECT COUNT(id) FROM users ');
    $statement->execute();
    return $statement->fetch();

}

function getNumHome($bdd){
    $statement = $bdd->prepare('SELECT COUNT(id) FROM homes ');
    $statement->execute();
    return $statement->fetch();

}

function getNumRoom($bdd){
    $statement = $bdd->prepare('SELECT COUNT(id) FROM rooms ');
    $statement->execute();
    return $statement->fetch();

}

function val_trame(PDO $bdd,string $attributs): array {
	
	
	
	
	
	
	$statement = $bdd->prepare('select value,TIMESTAMPDIFF(second , timestamp, NOW()) from datas where timestamp = (select max(timestamp) from datas where device_id='.$attributs.')'); 
	$statement->execute();
	return $statement->fetch();
}


