<?php
/**
 * Page de formulaire pour l'authentification.
 * @author Antoine Ouellette
 */
require 'include/configuration.inc'; /* Appel configuration.inc */
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
            <h2 class="titreFormulaire">Authentification</h2>

            <form action="http://notes.test/traitement-authentification.php" method="post" name="formulaireAuthentification" id="formulaireAuthentification">
                <!--Section 1-->
                <div class="form-group">
                    <label for="identifiant_utilisateur" class="required">Identifiant:</label>
                    <input type="text" class="form-control" name="identifiant_utilisateur" id="identifiant_utilisateur" required autofocus
                        value="<?php echo $donneesSaisiesPrecedemment['identifiant_utilisateur'] ?? '' ?>">
                    <small class="msgErreur form-text text-danger d-none">Erreur!</small>
                </div>
                <div class="form-group">
                    <label for="mot_de_passe" class="required">Mot de passe:</label>
                    <input type="text" class="form-control" name="mot_de_passe" id="mot_de_passe" required
                           value="<?php echo $donneesSaisiesPrecedemment['mot_de_passe'] ?? '' ?>">
                    <small class="msgErreur form-text text-danger d-none">Erreur!</small>
                </div>
                <!--Soumettre-->
                <button type="submit" name="submitButton" class="btn bg-dark text-white border-dark rounded">Connexion</button>
            </form>
        </div>
<?php
require 'include/pied-page.inc'; /* Appel pied-page.inc */
require 'include/nettoyage.inc'; /* Appel nettoyage.inc */
?>