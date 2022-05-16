<?php
/**
 * Page qui affiche une liste des évaluations formatives.
 * @author Antoine Ouellette
 */
require 'include/configuration.inc'; /*Appel configuration.inc*/
require 'include/entete.inc'; /*Appel entete.inc*/

//Si le formulaire retourne un message
if (isset($_SESSION['message_operation']))
{
    //Message de reussite
    if ($_SESSION['operation_reussie'] == true)
    {
        echo "<div class='alert alert-success' role='alert'>";
    }
    //Message d'echec
    else
    {
        echo "<div class='alert alert-danger' role='alert'>";
    }

    echo $_SESSION['message_operation'];//Affiche le contenu du message.
    echo "</div>";
    $_SESSION['message_operation'] = null;
    $_SESSION['operation_reussie'] = null;
}
?>
<?php
$requete = "SELECT id, titre, dateevaluation FROM formatifs ORDER BY dateevaluation";//une requete mysql
$resultat = $mysqli->query($requete);     // on exécute cette requête.

if ($resultat) {    // si la requête a fonctionné
    if ($mysqli->affected_rows > 0) {    // si la requête a retourné au moins un enregistrement
        echo "<ul>";

        while ($enreg = $resultat->fetch_row()) {     // extrait chaque ligne une à une
            $la_date = date("Y-m-d à H\hi",strtotime($enreg[2]));     //enregistrer la valeur de la date sous un autre format
            echo "<li>Cours : $enreg[0], Formatif : $enreg[1], Date : $la_date</li>";     //Définir le format d'affichage de chaque ligne
        }

        echo "</ul>";
    }
    else {
        echo "<p class='message-avertissement'>Il n'y a aucun client dans le système.</p>";
    }

    $resultat->free();   // libère immédiatement la mémoire qui était allouée

}
else {
    echo "<p class='message-erreur'>Nous sommes désolés, les clients ne peuvent pas être affichés.</p>";
    echo_debug($mysqli->error);   // cette instruction sera expliquée dans une fiche plus loin
}


require 'include/pied-page.inc'; /* Appel pied-page.inc */
require 'include/nettoyage.inc'; /* Appel nettoyage.inc */
?>