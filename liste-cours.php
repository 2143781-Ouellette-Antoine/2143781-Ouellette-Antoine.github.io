<?php
/**
 * Page qui liste tous mes cours.
 * @author Antoine Ouellette
 */
require 'include/configuration.inc'; /*Appel configuration.inc*/
require 'include/entete.inc'; /*Appel entete.inc*/

//*** Si le formulaire retourne un message ************************************************
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

//*** Afficher la liste des cours **********************************************************
$requete = "SELECT code, titre FROM cours ORDER BY titre";//une requete mysql
$resultat = $mysqli->query($requete);     // on exécute cette requête.

if ($resultat) {    // si la requête a fonctionné
    if ($mysqli->affected_rows > 0) {    // si la requête a retourné au moins un enregistrement
        echo "<ul>";

        while ($enreg = $resultat->fetch_row()) {     // extrait chaque ligne une à une
            echo "<li>$enreg[0] $enreg[1]</li>";
        }

        echo "</ul>";
    }
    else {
        echo "<p class='message-avertissement'>Il n'y a aucun cours dans le système.</p>";
    }

    $resultat->free();   // libère immédiatement la mémoire qui était allouée

}
else {
    echo "<p class='message-erreur'>Nous sommes désolés, les cours ne peuvent pas être affichés.</p>";
    echo_debug($mysqli->error);   // cette instruction sera expliquée dans une fiche plus loin
}
//******************************************************************************************
?>
<br/>
<a href="formulaire-cours.php">
    <button type="button" class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book-fill mr-2" viewBox="0 0 16 16">
            <path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
        </svg>
        Ajouter un cours
    </button>
</a>
<div class="row col-sm-12 divbouton">
    <a class="bouton" href="formulaire-periode.php">Périodes</a>
</div>
<?php require 'include/pied-page.inc'; /* Appel pied-page.inc */?>
<?php require 'include/nettoyage.inc'; /* Appel nettoyage.inc */?>
