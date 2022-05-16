<?php
/**
 * Page de formulaire pour modifier la page d'accueil.
 * @author Antoine Ouellette
 */
require 'include/configuration.inc'; /* Appel configuration.inc */
$_SESSION['hide_content_entete'] = true;
$visible_tiny_mce = true;
require 'include/entete.inc'; /*Appel entete.inc*/
?>
<h2>Modifier la page d'accueil</h2>
<?php
//*** Lire le html **************************************************************************
$requete = "SELECT texte FROM pages WHERE url='index.php'";//une requete mysql
$resultat = $mysqli->query($requete);     // on exécute cette requête.

if ($resultat)    // si la requête a fonctionné
{
    if ($mysqli->affected_rows > 0)    // si la requête a retourné un enregistrement
    {
        while ($enreg = $resultat->fetch_row())     // extrait chaque ligne une à une
        {
            $contenuHTML = $enreg[0];
        }
    }
    else
    {
        echo "<p class='message-avertissement'>Il n'y a aucun texte dans le système.</p>";
    }

    $resultat->free();   // libère immédiatement la mémoire qui était allouée

}
else
{
    echo "<p class='message-erreur'>Nous sommes désolés, le texte ne peut pas être affiché.</p>";
    echo_debug($mysqli->error);   // cette instruction sera expliquée dans une fiche plus loin
}
//******************************************************************************************
?>
<textarea class="tinymce" style="height: initial; transition: initial"><?php echo $contenuHTML?></textarea>
<br>
<button href="enregistrer-index.php" class="btn bg-dark text-white border-dark rounded">Enregistrer</button>
<?php require 'include/pied-page.inc'; /* Appel pied-page.inc */?>
<?php require 'include/nettoyage.inc'; /* Appel nettoyage.inc */?>