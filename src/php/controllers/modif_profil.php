<?php
/**
 * Created by PhpStorm.
 * User: PC-Adrien
 * Date: 30/04/2018
 * Time: 11:08
 */

/**if(!empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail'])
{
    if(filter_var($_POST['newmail'], FILTER_VALIDATE_EMAIL))
    {
        $newmail = htmlspecialchars(trim($_POST['newmail']));
        $insertmail = $bdd->prepare("UPDATE membres SET mail = ? WHERE id = ?");
        $insertmail->execute(array($newmail, $_SESSION['id']));
        header('Location: monCompte.php?id='.$_SESSION['id']);
    }
}

if(!empty($_POST['newmdp1']) AND !empty($_POST['newmdp2']))
{
    $mdp1 = sha1($_POST['newmdp1']);
    $mdp2 = sha1($_POST['newmdp2']);

    if($mdp1 == $mdp2)
    {
        $insertmdp = $bdd->prepare("UPDATE membres SET motdepasse = ? WHERE id = ?");
        $insertmdp->execute(array($mdp1, $_SESSION['id']));
        header('Location: monCompte.php?id='.$_SESSION['id']);
    }
    else
    {
        $erreur = "Vos deux mot de passe ne correspondent pas !";
    }
}

if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name']))

{
    $tailleMax = 2097152;
    $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
    if($_FILES['avatar']['size'] <= $tailleMax)
    {
        $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
        if(in_array($extensionUpload, $extensionsValides))
        {
            $chemin = "membres/avatars/".$_SESSION['id'].".".$extensionUpload;
            $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
            if($resultat)
            {
                $updateavatar = $bdd->prepare('UPDATE membres SET avatar = :avatar WHERE id = :id');
                $updateavatar->execute(array(
                    'avatar' => $_SESSION['id'].".".$extensionUpload,
                    'id' => $_SESSION['id']
                ));
                header('Location: monCompte.php?id='.$_SESSION['id']);
            }
            else
            {
                $erreur = "Erreur durant l'importation de votre photo de profil";
            }
        }
        else
        {
            $erreur = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
        }
    }
    else
    {
        $erreur = "Votre photo de profil ne doit pas dépasser 2Mo";
    }
}**/
?>