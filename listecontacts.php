<?php
/**
 * Page d'accueil de ma page.
 * @author Antoine Ouellette
 */
require 'include/configuration.inc'; /*Appel configuration.inc*/
require 'include/entete.inc'; /*Appel entete.inc*/

echo "<h2 class=\"text-white mb-3\">Liste des messages</h2>";

$requete = "SELECT nom, courriel, sujet, message FROM contacts ORDER BY nom";//une requete mysql
$resultat = $mysqli->query($requete);     // on exécute cette requête.

if ($resultat) {    // si la requête a fonctionné
    if ($mysqli->affected_rows > 0) {    // si la requête a retourné au moins un enregistrement

        while ($enreg = $resultat->fetch_row()) {     // extrait chaque ligne une à une
            echo "
                <li>
                <div class=\"card text-white bg-dark mb-3\">
                    <div class=\"card-header\">$enreg[0] ($enreg[1])</div>
                    <div class=\"card-body\">
                        <h5 class=\"card-title text-white\">$enreg[2]</h5>
                        <p class=\"card-text\">$enreg[3]</p>
                    </div>
                </div>
                </li>
            ";
        }

        echo "";
    }
    else {
        echo "<p class='message-avertissement'>Il n'y a aucun contact dans le système.</p>";
    }

    $resultat->free();   // libère immédiatement la mémoire qui était allouée

}
else {
    echo "<p class='message-erreur'>Nous sommes désolés, les contacts ne peuvent pas être affichés.</p>";
    echo_debug($mysqli->error);   // cette instruction sera expliquée dans une fiche plus loin
}

require 'include/pied-page.inc'; /* Appel pied-page.inc */
require 'include/nettoyage.inc'; /* Appel nettoyage.inc */
?>















