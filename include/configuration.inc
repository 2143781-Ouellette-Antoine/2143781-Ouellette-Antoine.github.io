<?php
/**
 * Bibliothèque des fonctions de ma page principale
 * @author Antoine Ouellette
 */

//Initialise la session
session_start();

//Se brancher a la base de donnees
@$mysqli = new mysqli("127.0.0.1", "root", "mysql", "notes_ouelletteantoine");

if ($mysqli->connect_errno) {
    die("&Eacute;chec lors de la connexion &agrave; la base de donn&eacute;es");
}
$mysqli->set_charset("utf8mb4");

//Stocker des informations sur le lien url actuel
// valeurs par défaut si la page n'est pas dans la base de donnees
$page_titre = "Notes";
$page_description = "Information non disponible";
$page_h2 = "Notes";
$page_texte = "Desole. Cette page ne semble pas exister";
$page_public = 1;
$fichierPage = basename($_SERVER['SCRIPT_NAME']);//ex: index.php

// requete preparee pour connaitre les infos de la page selon $fichierPage
// *** Tente la lecture des données ************************************************************************************
$requete = "SELECT titre, description, h1, public, texte FROM pages WHERE url=?";
$stmt = $mysqli->prepare($requete);
$titre_result = "";
$description_result = "";
$h1_result = "";
$public_result = 0;
$texte_result = "";

if ($stmt)//bool si requete fonctionne
{
    // Indique le type du paramètre : s pour string, i pour integer, d pour decimal
    // 'ss' si deux paramétres etc... puis assigne la variable qui contient sa valeur
    $stmt->bind_param('s', $fichierPage);//WHERE url=$fichierPage

    $stmt->execute();

    // Permet de connaitre le nombre de ligne exécutée par la requête
    $stmt->store_result();

    // Si l'authentification a fonctionné
    if (0 == $stmt->errno)
    {
        //Pas d'erreurs sql
        if ($stmt->num_rows > 0)
        {
            $stmt->bind_result($titre_result, $description_result, $h1_result, $public_result, $texte_result);
            $stmt->fetch();

            //enregistrer les valeurs lues
            $page_titre = $titre_result;
            $page_description = $description_result;
            $page_h2 = $h1_result;
            $page_public = $public_result;
            $page_texte = $texte_result;

        }
        else
        {
            //sql retourne 0 lignes (l'identifiant demande n'existe pas)
            $_SESSION['message_operation'] = "La page n'a pas pu etre trouve dans la base de donnees.";
            $_SESSION['operation_reussie'] = false;
        }

    }
    else
    {
        //stmt->errno retourne une erreur sql
        $_SESSION['message_operation'] = "Nous sommes désolés, un problème technique nous empêche de retrouver les données (code 1).";
        $_SESSION['operation_reussie'] = false;
        echo_debug($stmt->error);//stmt (code 1)
    }
    $stmt->close();
}
else
{
    // stmt n'a pas fonctionne
    $_SESSION['operation_reussie'] = false;
    $_SESSION['message_operation'] = "Nous sommes désolés, un problème technique nous empêche de vous authentifier. (code 2)";
    //echo_debug($mysqli->error);//mysqli (code 2)
}
//**********************************************************************************************************************

// définition des constantes pour cette page
define('PAGE_TITRE', $page_titre);
define('PAGE_DESCRIPTION', $page_description);
define('PAGE_H1', $page_h2);
define('PAGE_TEXTE', $page_texte);
define('PAGE_PUBLIC', $page_public);
?>