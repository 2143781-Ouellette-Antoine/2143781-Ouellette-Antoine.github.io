<?php
/**
 * Page d'accueil pour mon site de notes
 * @author Antoine Ouellette
 */
require 'include/configuration.inc'; /*Appel configuration.inc*/
require 'include/entete.inc'; /*Appel entete.inc*/
?>
        <h2>Derniers cours évalués</h2>
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
            <a class="bouton" href="cours.php">Tous mes cours</a>
        </div>
<?php require 'include/pied-page.inc'; /* Appel pied-page.inc */?>
<?php require 'include/nettoyage.inc'; /* Appel nettoyage.inc */?>