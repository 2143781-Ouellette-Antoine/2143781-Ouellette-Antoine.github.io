<?php
/**
 * Fichier PHP qui Valide le formulaire 'formulaire-periode.php'
 * et envoie les donnees dans la BD.
 * @author Antoine Ouellette
 */
require 'include/configuration.inc'; /*Appel configuration.inc*/

// Si je proviens d'un formulaire POST
if (!empty($_POST))
{
    //*** Protection XSS *******************************************************************
    foreach ($_POST as $element => $valeur)
    {
        $_POST[$element] = htmlspecialchars($valeur);//Convertir les caracteres speciaux
    }

    //*** Initialisation des variables pour clarifier le code *****************************
    $cours_id = $_POST['cours_id'];
    $jour_semaine = $_POST['jour_semaine'];
    $heure_debut = $_POST['heure_debut'];
    $heure_fin = $_POST['heure_fin'];

    //*** Validation serveur PHP **********************************************************
    $messageErreur = '';//vide a la base.
    //Verifier Cours_id:
    if (empty($cours_id))// Si la variable est vide
    {
        $messageErreur .= 'Le Cours est requis.<br />';
    }
    //Verifier Jour_semaine:
    if (empty($jour_semaine))// Si la variable est vide
    {
        $messageErreur .= 'Le Jour de la semaine est requis.<br />';
    }
    elseif ( !(is_numeric($jour_semaine)) || $jour_semaine > 6)//le jour n'existe pas
    {
        $messageErreur .= 'Le Jour de la semaine n\'a pas le bon format.<br />';
    }
    //Verifier Heure_debut:
    if (empty($heure_debut))// Si la variable est vide
    {
        $messageErreur .= 'L\'Heure de début est requise.<br />';
    }
    elseif (strtotime($heure_debut) === false)//time non valide
    {
        $messageErreur .= 'L\'Heure de début n\'a pas le bon format.<br />';
    }
    //Verifier Heure_fin:
    if (empty($heure_fin))// Si la variable est vide
    {
        $messageErreur .= 'L\'Heure de fin est requise.<br />';
    }
    elseif (strtotime($heure_fin) === false)//time non valide
    {
        $messageErreur .= 'L\'Heure de fin n\'a pas le bon format.<br />';
    }

    //La validation termine, Executer une action correspondante
    if ($messageErreur == '')
    {
        //Si il n'y a pas d'erreur

        //*** SQL *************************************************************************
        $requete = "INSERT INTO periodes(cours_id, jour, heuredebut, heurefin) VALUES(?, ?, ?, ?)";
        $stmt = $mysqli->prepare($requete);

        if ($stmt){
            $jour_semaine = intval($jour_semaine);
            $stmt->bind_param('iiss', $cours_id, $jour_semaine, $heure_debut, $heure_fin);
            $stmt->execute();

            if (0 == $stmt->errno) {
                $_SESSION['operation_reussie'] = true;
                $_SESSION['message_operation'] = "La période a été ajoutée avec succès !";
                header("location: liste-cours.php");
            }
            else {
                $_SESSION['operation_reussie'] = false;
                $_SESSION['message_operation'] = "Nous sommes désolés, un problème technique nous empêche d'enregistrer la période (code 1).";
                $_SESSION['POST'] = $_POST;
                header("location: formulaire-periode.php");
                log_debug($stmt->error);
            }
            $stmt->close();
        }
        else {
            $_SESSION['operation_reussie'] = false;
            $_SESSION['message_operation'] = "Nous sommes désolés, un problème technique nous empêche d'enregistrer la période (code 2).";
            $_SESSION['POST'] = $_POST;
            header("location: formulaire-periode.php");
            log_debug($mysqli->error);
        }
        //*********************************************************************************
    }
    else
    {
        //Si il y a une erreur dans validation.
        // Enregistrer que l'operation n'est pas reussie
        $_SESSION['operation_reussie'] = false;
        // Enregistrer tout le message d'erreur du formulaire
        $_SESSION['message_operation'] = $messageErreur;
        // Conserve les données du formulaire dans une variable de session.
        $_SESSION['POST'] = $_POST;
        header("location: formulaire-periode.php");//Renvoye les donnees POST au formulaire
    }

}
// Si je ne proviens pas d'un formulaire POST
else
{
    // réagir si l'appel ne provient pas du formulaire
    $_SESSION[] = "";
    // par exemple, ici, on redirige vers la page d'accueil sans avertissement
    header("location: index.php");
}

require 'include/nettoyage.inc'; /* Appel nettoyage.inc */
?>