<?php
/*On récupère les logs*/
include "php/models/logs.php";

// si la fonction n'est pas définie ou est vide, on choisit d'afficher la vue par default
if (!isset($_GET['function']) || empty($_GET['function'])) {
    $function = "default";
} else {
    $function = $_GET['function'];
}

$title = 'logs';

switch ($function) {
    case 'default':
        $vue = "viewLogs";
        break;

    default :
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "error404";
        $title = "error404";
}

include "php/views/header.php";
include('php/views/' . $vue . '.php');
include "php/views/footer.php";




/**
 * Affiche en brut les trames reçues depuis le serveur
 * @param string $logs
 * @return void
 */
function viewOriginalLog ($logs) {
    echo "Raw Data:<br />";
    echo("$logs");
}

/**
 * Affiche les trames reçues depuis le serveur en sautant une ligne pour chaque trame (1 trame = 33 caractères)
 * @param string $logs
 * @return void
 */
function viewTabLogs ($logs){
    $data_tab = str_split($logs,33);
    echo "Tabular Data:<br />";
    for($i=0, $size=count($data_tab); $i<$size; $i++){
        echo "Trame $i: $data_tab[$i]<br />";
    }
}

/**
 * Affiche le décodage d'une trame
 * @param string $logs
 * @return void
 */
function decodeTrame ($logs){
    $data_tab = str_split($logs,33);
    $trame = $data_tab[1];
// décodage avec des substring
    $t = substr($trame,0,1);
    $o = substr($trame,1,4);
// …
// décodage avec sscanf
    list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
        sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
    echo("<br />$t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec<br />");
}

/**
 * Affiche joliement chaque trames dans un tableau
 * @param string $logs
 * @return void
 */
function decodeTrames ($logs){
    $data_tab =str_split($logs,33);
    echo ("
    <table>
              <tr>
                <th>Type de trame</th>
                <th>Numéro d'équipe</th>
                <th>Type de requête</th>
                <th>Type de capteur</th>
                <th>Numéro de capteur</th>
                <th>Valeur du capteur</th>
                <th>Numéro de trame</th>
                <th>Checksum</th>
                <th>Temps</th>
              </tr>
         ");
    foreach ($data_tab as $key=>$elm){
        $trame = $data_tab[$key];
        // décodage avec des substring
        $t = substr($trame,0,1);
        $o = substr($trame,1,4);
// …
// décodage avec sscanf
        list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
            sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
        echo("
        
              <tr>
                <td>$t</td>
                <td>$o</td>
                <td>$r</td>
                <td>$c</td>
                <td>$n</td>
                <td>$v</td>
                <td>$a</td>
                <td>$x</td>
                <td>$year,$month,$day,$hour,$min,$sec</td>
                </tr>
            
        ");
    }
    echo (" </table>");
}