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

?>