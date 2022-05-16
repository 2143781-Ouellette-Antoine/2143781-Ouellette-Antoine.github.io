<?php
/**
 * fichier php de traitement de la deconnexion
 * @author Antoine Ouellette
 */
if (isset($_SESSION['authentification'])) {
    unset($_SESSION['authentification']);
}
if (isset($_SESSION['estadmin'])) {
    unset($_SESSION['estadmin']);
}

session_start();
session_destroy();
require 'include/nettoyage.inc'; /*Appel nettoyage.inc*/

header("Location: index.php");   // renvoie vers une autre page
?>