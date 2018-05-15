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
 * Modifie une entrée d'une table ciblant son id
 * @param PDO $bdd
 * @param array $values
 * @param int $id (id de l'entrée à modifier)
 * @param string $table
 * @return boolean
 */
function modification(PDO $bdd, array $values, int $id, string $table): bool{

}

/**
 * REMOVE
 * Supprime une entrée dans devices ciblant son id
 * @param PDO $bdd
 * @param int $id
 * @param string $table
 * @return boolean
 */
function supprimer(PDO $bdd, int $id): bool{

	$req = $bdd->prepare('DELETE FROM devices WHERE id='.$id);
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
 * Retroune l'id, le prénom, nom et mot de passe d'un utilisateur en fonction de son email (identification a la connexion)
 * @param PDO $bdd
 * @param string $table
 * @param string $email
 * @return array
 */
function Get_Id(PDO $bdd, string $table, string $email): array {

    $statement = $bdd->prepare('SELECT id,user_firstname, user_name, password FROM ' . $table . ' WHERE email = :email');
    $statement->execute(array(':email' => $email));
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
 * Retourne les villes selectionné par le code postal
 * @param PDO $bdd
 * @param string $table
 * @param string $entre
 * @return array
 */
function get_city(PDO $bdd, string $table, $cp){

    $statement = $bdd->prepare('SELECT city FROM ' . $table . ' WHERE zip_code LIKE :zip_code ORDER BY city');
    $statement->execute(array(':zip_code' => $cp));
    while($statement->fetch()){
        echo "\n<option value=\"".$statement[0]."\">".$statement[1]."</option>";
    }

}
