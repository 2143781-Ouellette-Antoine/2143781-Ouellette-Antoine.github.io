<?php
/**
 * Bibliothèque des fonctions de ma page principale
 * @author Antoine Ouellette
 */
function afficherNomBrowser(): string
{
    //echo $_SERVER['HTTP_USER_AGENT'] . PHP_EOL;

    //to lowercase:
    $nomBrowser = strtolower($_SERVER['HTTP_USER_AGENT']);

    //if c'est le bon browser, return le nom du browser.
    if ((strpos($nomBrowser, 'opera'))!==false || (strpos($nomBrowser, 'opr/'))!==false) return 'Opera';
    elseif ((strpos($nomBrowser, 'edge'))!==false || (strpos($nomBrowser, 'edg/'))!==false) return 'Edge';
    elseif ((strpos($nomBrowser, 'chrome'))!==false) return 'Chrome';
    elseif ((strpos($nomBrowser, 'safari'))!==false) return 'Safari';
    elseif ((strpos($nomBrowser, 'firefox'))!==false) return 'Firefox';
    elseif ((strpos($nomBrowser, 'msie'))!==false || (strpos($nomBrowser, 'trident/7'))!==false) return 'Internet Explorer';
    return 'Unknown';//if the function didn't exit yet, return Unknown.
}

/**
 * Ajoute une balise <script> pour un fichier .js qui porte le même nom que la page actuelle,
 * seulement si ce script existe.
 * Supposition critique : le fichier doit être placé dans le sous-dossier js/scriptspages pour pouvoir être inclus.
 * Ex : le script pour la page d'accueil sera js/scriptspages/index.js.
 *
 * @author Christiane Lagacé <christianelagace.com>
 * @return void
 *
 */
function inclureJsPropreALaPageActuelle(){

    $dossierRacineSite = dirname(__FILE__, 2);

    // Le deuxième paramètre de basename permet de supprimer cette chaîne de la valeur retournée
    $pageActuelleSansExtension = basename( $_SERVER['SCRIPT_NAME'], '.php' );

    if ( file_exists( $dossierRacineSite . '/js/scriptspages/' . $pageActuelleSansExtension . '.js' ) ) {
        echo "<script src='js/scriptspages/$pageActuelleSansExtension.js' defer></script>";
    }
}
?>