<?php
/**
 * Page de formulaire pour ajouter un cours.
 * @author Antoine Ouellette
 */
require 'include/configuration.inc'; /*Appel configuration.inc*/
require 'include/entete.inc'; /* Appel entete.inc */

//Si je provient du Formulaire
if (isset($_SESSION['POST']))
{
    // Récupère les données POST que le fichier traitement-formulaire.php avait stockées dans $_SESSION['POST'] .
    $donneesSaisiesPrecedemment = $_SESSION['POST'];
    $_SESSION['POST'] = null;
}

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
        <div class="containerFormulaire">
            <h1 class="header"></h1>
            <h2 class="titreFormulaire">Ajout d'un cours</h2>

            <form action="http://notes.test/traitement-cours.php" method="post" name="formulaireCours" id="formulaireCours">
                <!--Section 1-->
                <div class="form-group">
                    <label for="code_cours" class="required">Code du cours:</label>
                    <input type="text" class="form-control" name="code_cours" id="code_cours" required placeholder="XXX-XXX-XX" autofocus
                        value="<?php echo $donneesSaisiesPrecedemment['code_cours'] ?? '' ?>">
                    <small id="codeCoursHelp" class="form-text">Format: XXX-XXX-XX (lettres ou chiffres)</small>
                    <small class="msgErreur form-text text-danger d-none">Erreur!</small>
                </div>
                <div class="form-group">
                    <label for="nom_cours" class="required">Nom du cours:</label>
                    <input type="text" class="form-control" name="nom_cours" id="nom_cours" required maxlength="100"
                           value="<?php echo $donneesSaisiesPrecedemment['nom_cours'] ?? '' ?>">
                    <small id="nomCoursHelp" class="form-text">100 caracteres maximum.</small>
                    <small class="msgErreur form-text text-danger d-none">Erreur!</small>
                </div>
                <!--Soumettre-->
                <button type="submit" name="submitButton" class="btn bg-dark text-white border-dark rounded">Ajouter</button>
            </form>
        </div>
<?php
require 'include/pied-page.inc'; /* Appel pied-page.inc */
require 'include/nettoyage.inc'; /* Appel nettoyage.inc */
?>