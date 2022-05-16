<?php
/**
 * Page de formulaire pour ajouter une periode.
 * @author Antoine Ouellette
 */
require 'include/configuration.inc'; /*Appel configuration.inc*/
require 'include/entete.inc'; /* Appel entete.inc */

//Si je provient du Formulaire
//Recuperer les donneesSaisiesPrecedemment
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


// initialiser les données pour remplir la liste déroulante
$requete = "SELECT id, code, titre FROM cours ORDER BY titre";
$resultat = $mysqli->query($requete);

if (!$resultat) {
    echo "
        <div class='alert alert-danger' role='alert'>
            <p class='message-erreur'>Nous sommes désolés, un problème nous empêche d'afficher le formulaire correctement.</p>
        </div>
    ";
    echo_debug($mysqli->error);
}
else
{
//Affiche le formulaire
?>
        <div class="containerFormulaire">
            <h1 class="header"></h1>
            <h2 class="titreFormulaire">Ajouter une Période</h2>

            <form action="http://notes.test/traitement-periode.php" method="post" name="formulairePeriode" id="formulairePeriode">
                <!--Section 1-->
                <div class="form-group">
                    <label for="cours_id" class="required">Cours:</label>
                    <select id="cours_id" name="cours_id" size="1" class="form-control" autofocus>
                    <?php
                        if ( $mysqli->affected_rows > 0 ) {
                            echo "<option value=''>Veuillez choisir un cours</option>";
                            while ( $enreg = $resultat->fetch_row() ) {

                                // chaque option de la liste déroulante affichera la description de la catégorie et retournera son id
                                echo "<option value='$enreg[0]'>$enreg[1] $enreg[2]</option>";
                            }
                        }
                        else {
                            // le message apparaîtra à la place des options de la liste déroulante
                            echo "<option value=''>Il n'y a présentement aucune catégorie dans le système.</option>";
                        }
                        $resultat->free();
                    ?>
                    </select>
                    <small class="msgErreur form-text text-danger d-none">Erreur!</small>
                </div>
                <div class="form-group">
                    <label for="jour_semaine" class="required">Jour de la semaine:</label>
                    <input type="text" class="form-control" name="jour_semaine" id="jour_semaine" placeholder="0"
                           value="<?php echo $donneesSaisiesPrecedemment['jour_semaine'] ?? '' ?>">
                    <small id="cours_idHelp" class="form-text">Saisissez 0 pour dimanche, 1 pour lundi, etc.</small>
                    <small class="msgErreur form-text text-danger d-none">Erreur!</small>
                </div>
                <div class="form-group">
                    <label for="heure_debut" class="required">Heure de début:</label>
                    <input type="text" class="form-control" name="heure_debut" id="heure_debut" placeholder="hh:mm"
                           value="<?php echo $donneesSaisiesPrecedemment['heure_debut'] ?? '' ?>">
                    <small id="heure_debutHelp" class="form-text">Format hh:mm</small>
                    <small class="msgErreur form-text text-danger d-none">Erreur!</small>
                </div>
                <div class="form-group">
                    <label for="heure_fin" class="required">Heure de fin:</label>
                    <input type="text" class="form-control" name="heure_fin" id="heure_fin" placeholder="hh:mm"
                           value="<?php echo $donneesSaisiesPrecedemment['heure_fin'] ?? '' ?>">
                    <small id="heure_finHelp" class="form-text">Format hh:mm</small>
                    <small class="msgErreur form-text text-danger d-none">Erreur!</small>
                </div>
                <!--Soumettre-->
                <button type="submit" name="submitButton" class="btn bg-dark text-white border-dark rounded">Ajouter</button>
            </form>
        </div>
<?php
}
require 'include/pied-page.inc'; /* Appel pied-page.inc */
require 'include/nettoyage.inc'; /* Appel nettoyage.inc */
?>