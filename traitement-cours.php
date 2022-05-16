<?php
/**
 * Fichier PHP qui Valide le formulaire 'formulaire-liste-cours.php'
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
    $code_cours = $_POST['code_cours'];
    $nom_cours = $_POST['nom_cours'];

    //*** Validation serveur PHP **********************************************************
    $messageErreur = '';//vide a la base.
    //Verifier Code:
    if (empty($code_cours))// Si la variable est vide
    {
        $messageErreur .= 'Le Code est requis.<br />';
    }
    elseif (!filter_var($code_cours, FILTER_VALIDATE_REGEXP, array("options" => array("regexp"=>"/^[0-9a-zA-Z]{3}-[0-9a-zA-Z]{3}-[0-9a-zA-Z]{2}$/"))))//Si la variable est un courriel
    {
        $messageErreur .= 'Le Code n\'a pas un format valide.<br />';
    }
    //Verifier Nom:
    if (empty($nom_cours))// Si la variable est vide
    {
        $messageErreur .= 'Le Nom est requis.<br />';
    }
    elseif (mb_strlen($nom_cours) > 100)//Si la variable est plus grande que 100 caracteres
    {
        $messageErreur .= 'Le Nom depasse 100 caracteres.<br />';
    }

    //La validation termine, Executer une action correspondante
    if ($messageErreur == '')
    {
        //Si il n'y a pas d'erreur

        //*** SQL *************************************************************************
        $requete = "INSERT INTO cours(code, titre) VALUES(?, ?)";
        $stmt = $mysqli->prepare($requete);

        if ($stmt){

            $stmt->bind_param('ss', $code_cours, $nom_cours);
            $stmt->execute();

            if (0 == $stmt->errno) {
                $_SESSION['operation_reussie'] = true;
                $_SESSION['message_operation'] = "Le cours a été ajouté avec succès !";
            }
            else {
                $_SESSION['message_operation'] = "Nous sommes désolés, un problème technique nous empêche d'enregistrer le cours (code 1).";
                log_debug($stmt->error);
            }
            $stmt->close();
        }
        else {
            $_SESSION['message_operation'] = "Nous sommes désolés, un problème technique nous empêche d'enregistrer le cours (code 2).";
            log_debug($mysqli->error);
        }
        //*********************************************************************************
    }
    else
    {
        //Si il y a une erreur.
        // Enregistrer que l'operation n'est pas reussie
        $_SESSION['operation_reussie'] = false;
        // Enregistrer tout le message d'erreur du formulaire
        $_SESSION['message_operation'] = $messageErreur;
        // Conserve les données du formulaire dans une variable de session.
        $_SESSION['POST'] = $_POST;
        //Renvoye les donnees POST au formulaire
    }
    //retourne sur le formulaire
    header("location: formulaire-cours.php");
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