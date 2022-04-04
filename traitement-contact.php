<?php
/**
 * Fichier PHP qui Valide le formulaire
 * et envoie les donnees dans la BD.
 * @author Antoine Ouellette
 */
require 'include/configuration.inc'; /*Appel configuration.inc*/

// Si je proviens d'un formulaire POST
if (!empty($_POST))
{
    //*** Protetion XSS *******************************************************************
    foreach ($_POST as $element => $valeur)
    {
        $_POST[$element] = htmlspecialchars($valeur);//Convertir les caracteres speciaux
    }//mon xss est en conflis avec mon textarea

    //*** Initialisation des variables pour clarifier le code *****************************
    $nom_utilisateur = $_POST['nom_utilisateur'];
    $courriel_utilisateur = $_POST['courriel_utilisateur'];
    $sujet = $_POST['sujet'];
    $message = $_POST['message'];

    //*** Validation serveur PHP **********************************************************
    $messageErreur = '';//vide a la base.
    //Verifier Nom:
    if (empty($nom_utilisateur))// Si la variable est vide
    {
        $messageErreur .= 'Le Nom est requis.<br />';
    }
    elseif (mb_strlen($nom_utilisateur) > 100)//Si la variable est plus grande que 100 caracteres
    {
        $messageErreur .= 'Le Nom depasse 100 caracteres.<br />';
    }
    //Verifier Courriel:
    if (empty($courriel_utilisateur))// Si la variable est vide
    {
        $messageErreur .= 'Le Courriel est requis.<br />';
    }
    elseif (!filter_var($courriel_utilisateur, FILTER_VALIDATE_EMAIL))//Si la variable est un courriel
    {
        $messageErreur .= 'Le Courriel n\'a pas un format valide.<br />';
    }
    //Verifier Sujet:
    if (empty($sujet))// Si la variable est vide
    {
        $messageErreur .= 'Le Sujet est requis.<br />';
    }
    elseif (mb_strlen($sujet) > 100)//Si la variable est plus grande que 100 caracteres
    {
        $messageErreur .= 'Le Sujet depasse 100 caracteres.<br />';
    }
    //Verifier Message:
    if (empty($message))// Si la variable est vide
    {
        $messageErreur .= 'Le Message est requis.';
    }

    //La validation termine, Executer une action correspondante
    if ($messageErreur == '')
    {
        //Si il n'y a pas d'erreur
        // traiter le formulaire dans la BD.

        // Enregistrer que l'operation est reussie
        $_SESSION['operation_reussie'] = true;
        $_SESSION['message_operation'] = "Formulaire: Reussite!";
        // effectuer ensuite une redirection vers contact.php
        header("location: contact.php");//retourne sur le formulaire (et message de reussite)
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
        header("location: contact.php");//Renvoye les donnees POST au formulaire
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