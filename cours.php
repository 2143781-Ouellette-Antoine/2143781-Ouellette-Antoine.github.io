<?php
/**
 * Page qui liste tous mes cours
 * @author Antoine Ouellette
 */
require 'include/configuration.inc'; /*Appel configuration.inc*/
require 'include/entete.inc';

$requete = "SELECT code, titre FROM cours ORDER BY code";//une requete mysql
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
        echo "<p class='message-avertissement'>Il n'y a aucun client dans le système.</p>";
    }

    $resultat->free();   // libère immédiatement la mémoire qui était allouée

}
else {
    echo "<p class='message-erreur'>Nous sommes désolés, les clients ne peuvent pas être affichés.</p>";
    echo_debug($mysqli->error);   // cette instruction sera expliquée dans une fiche plus loin
}

?>
<?/*
<h2>Liste des cours</h2>
        <div class="row"><!--Premiere rangee-->
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
        <div class="row"><!--Deuxieme rangee-->
            <div class="col-sm-4">
                <div class="un-cours">
                    <h3>420-2D4-VI</h3>
                    <p>Support technique</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="un-cours">
                    <h3>420-2C4-VI</h3>
                    <p>Reseau</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="un-cours">
                    <h3>604-102-MQ</h3>
                    <p>Anglais</p>
                </div>
            </div>
        </div>
        <div class="row"><!--troisieme rangee-->
            <div class="col-sm-4">
                <!--vide-->
            </div>
            <div class="col-sm-4">
                <div class="un-cours">
                    <h3>601-101-MQ</h3>
                    <p>Francais</p>
                </div>
            </div>
            <div class="col-sm-4">
                <!--vide-->
            </div>
        </div>
*/?>
<?php require 'include/pied-page.inc'; /* Appel pied-page.inc */?>
<?php require 'include/nettoyage.inc'; /* Appel nettoyage.inc */?>
