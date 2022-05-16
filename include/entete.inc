<?php
/**
 * Entete de toutes les pages de mon site
 * @author Antoine Ouellette
 */
require 'include/ma-bibliotheque.php'; /*Link ma-bibliotheque.php*/

if ($mysqli->connect_errno) {

    die("&Eacute;chec lors de la connexion &agrave; la base de donn&eacute;es");

}
?>
<!DOCTYPE html>
<html lang="fr-CA">

<head>
    <title>Mes notes | Liste de cours</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Un site pour faire le suivi de mes résultats scolaires">
    <meta name="author" content="Antoine Ouellette">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="icon" href="favicon.ico" type="image/png"/>
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="css/adaptation-maquette.css">
    <link rel="stylesheet" href="css/mes-styles.css">
    <link rel="stylesheet" href="ma-bibliotheque-popup/style.css" />
    <script src="js/scripts.js" defer></script>
    <script src="ma-bibliotheque-popup/script.js"></script>
    <script src="js/confirmation-suppression.js"></script><!--existe pas-->
    <?php inclureJsPropreALaPageActuelle(); /*Caller la fonction dans le php*/?>

</head>

<body>
<div class="header_section">
    <div class="container p-0">
        <div class="row">
            <div class="col-md-3 p-0">
                <div class="logo"><a href="index.php">No<span>tes</span></a></div>
            </div>
            <div class="col-md-7 p-0">
                <!-- menu -->
                <div class="menu_text">
                    <div id="panneau" class="overlay">
                        <a href="#" class="closebtn" id="boutonFermerPanneau">&times;</a>
                        <div class="overlay-content">
                            <a href="index.php">Accueil</a>
                            <a href="liste-cours.php">Cours</a>
                            <a href="formatifs.php">Formatifs</a>
                            <a href="formulaire-contact.php">Contact</a>
                        </div>
                    </div>
                    <ul>
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="liste-cours.php">Cours</a></li>
                        <li><a href="formatifs.php">Formatifs</a></li>
                        <li><a href="formulaire-contact.php">Contact</a></li>
                    </ul>
                    <img src="medias/commun/toggle-menu.png" id="boutonOuvrirPanneau">
                </div>
                <!-- fin menu -->
            </div>
            <div class="col-md-1 d-flex justify-content-center align-items-center btn" id="divLoginButton">
                <?php
                //not logged in (user icon right)
                if( !(isset($_SESSION['authentification'])) || $_SESSION['authentification']==false)
                {
                    echo "
                        <a class=\"text-white\" href=\"formulaire-authentification.php\">
                            <span>Connexion</span>
                            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-person-fill\" viewBox=\"0 0 16 16\">
                              <path d=\"M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z\"/>
                            </svg>
                    ";
                }
                else
                //logged in (power icon right)
                {
                    echo "
                        <a class=\"text-white\" href=\"deconnexion.php\">
                            <div class='d-flex flex-column'>
                                <span>{$_SESSION['prenom_usager']}</span>
                                <span class='text-danger'>Déconnexion</span>
                            </div>
                    ";
                }
                ?>
                        </a>
            </div>
        </div>
    </div>
</div>

<!-- contenu -->
<div class="section-contenu layout_padding">
    <div class="container">
        <h1>Je gère mes notes!</h1>
        <div class="row">
            <div class="intro col-sm-12">
                Page web pour regrouper mes notes dans les cours.
            </div>
        </div>
    </div>
</div>

<!-- fin contenu -->
<!-- contenu2 -->
<div class="section-contenu2 diagonal-box">
    <div class="container">
        <?php
        if (!PAGE_PUBLIC && !(isset($_SESSION['authentification'])))
        {
            echo "<div class='alert alert-danger' role='alert'>
                <p>Vous ne disposez pas des droits requis pour accéder à cette page.</p>
                </div>";

            require 'pied-page.inc';
            require 'nettoyage.inc';
            die();
        }
        ?>