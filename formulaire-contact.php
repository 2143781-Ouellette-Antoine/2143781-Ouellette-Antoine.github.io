<?php
/**
 * Page de formulaire pour contacter.
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
            <h2 class="titreFormulaire">Formulaire de contact</h2>
            <a href="liste-contacts.php">
                <button type="button" class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill mr-2" viewBox="0 0 16 16">
                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"></path>
                    </svg>
                    Liste de contacts
                </button>
            </a>

            <form action="http://notes.test/traitement-contact.php" method="post" name="formulaireContact" id="formulaireContact">
                <!--Section 1-->
                <div class="form-group">
                    <label for="nom_utilisateur" class="required">Nom:</label>
                    <input type="text" class="form-control" name="nom_utilisateur" id="nom_utilisateur" required maxlength="100" autofocus
                        value="<?php echo $donneesSaisiesPrecedemment['nom_utilisateur'] ?? '' ?>">
                    <small id="nomHelp" class="form-text">100 caractères maximum.</small>
                    <small class="msgErreur form-text text-danger d-none">Erreur!</small>
                </div>
                <div class="form-group">
                    <label for="courriel_utilisateur" class="required">Courriel:</label>
                    <input type="email" class="form-control" name="courriel_utilisateur" id="courriel_utilisateur" required placeholder="adresse@exemple.com"
                           value="<?php echo $donneesSaisiesPrecedemment['courriel_utilisateur'] ?? '' ?>">
                    <small class="msgErreur form-text text-danger d-none">Erreur!</small>
                </div>
                <div class="form-group">
                    <label for="sujet" class="required">Sujet:</label>
                    <input type="text" class="form-control" name="sujet" id="sujet" required maxlength="100"
                           value="<?php echo $donneesSaisiesPrecedemment['sujet'] ?? '' ?>">
                    <small id="sujetHelp" class="form-text">100 caractères maximum.</small>
                    <small class="msgErreur form-text text-danger d-none">Erreur!</small>
                </div>
                <div class="form-group">
                    <label for="message" class="required">Message:</label>
                    <textarea rows="4" cols="50" name="message" form="formulaireContact" class="form-control" required
                              id="message_utilisateur"><?php echo $donneesSaisiesPrecedemment['message'] ?? '' ?></textarea>
                    <small class="msgErreur form-text text-danger d-none">Erreur!</small>
                </div>
                <!--Soumettre-->
                <button type="submit" name="submitButton" class="btn bg-dark text-white border-dark rounded">Soumettre l'inscription</button>
            </form>
        </div>
<?php
require 'include/pied-page.inc'; /* Appel pied-page.inc */
require 'include/nettoyage.inc'; /* Appel nettoyage.inc */
?>