<?php
/**
 * Page d'accueil pour mon site de notes
 * @author Antoine Ouellette
 */
require 'include/configuration.inc'; /* Appel configuration.inc */
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
        <h2>Derniers cours évalués</h2>
        <div class="d-flex align-items-center">
            <?php echo PAGE_TEXTE ; ?>

            <?php
                if (!(isset($_SESSION['authentifie']) && $_SESSION['authentifie'] == true))
                    echo "<a class='bouton m-0' href='formulaire-index.php' style='font-size: 15px'>Modifier le texte de description</a>";
            ?>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="un-cours">
                    <h3>420-2A6-VI</h3>
                    <p>Programmation 2</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="un-cours">
                    <h3>420-2A4-VI</h3>
                    <p>Développement Web 1</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="un-cours">
                    <h3>420-2B4-VI</h3>
                    <p>Bases de données 1</p>
                </div>
            </div>
        </div>
        <div class="row col-sm-12 divbouton">
            <a class="bouton" href="liste-cours.php">Tous mes cours</a>
        </div>
<?php require 'include/pied-page.inc'; /* Appel pied-page.inc */?>
<?php require 'include/nettoyage.inc'; /* Appel nettoyage.inc */?>