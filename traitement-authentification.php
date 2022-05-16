<?php
/**
 * Description : validation côté serveur du formulaire d'ajout d'évaluation de la page "authentification.php"
 * @author : Clément Guyollot
 * Inspiré de : Christiane Lagacé (https://apical.xyz/)
 */

require 'include/configuration.inc';

if (!empty($_POST)) {
// Si le formulaire n'est pas vide
// *** protection XSS ******************************************************************
    foreach ($_POST as $element => $valeur) {
        $_POST[$element] = htmlspecialchars($valeur);
    }

// *** initialisation des variables pour clarifier le code *****************************
    $identifiant_utilisateur = $_POST['identifiant_utilisateur'];
    $mot_de_passe = $_POST['mot_de_passe'];

// *** validations côté serveur ********************************************************
    $messageErreur = '';

// format attendu : champs obligatoires
    // n'est pas vide : code de l'usager
    if ('' == $identifiant_utilisateur) {
        $messageErreur .= 'L\'identifiant est requis.<br />';
    }
    // n'est pas vide : mot de passe de l'usager
    if ('' == $mot_de_passe) {
        $messageErreur .= 'Le mot de passe est requis.<br />';
    }

    if ($messageErreur == '') {
        // Tente la lecture des données
        $requete = "SELECT prenom, nomfamille, motdepasse, estadmin FROM usagers WHERE code=? AND actif = 1";
        $stmt = $mysqli->prepare($requete);
        $prenom_result = "";
        $nomfamille_result = "";
        $hash_result = "";
        $estadmin_result = "";

        if ($stmt)//bool si requete fonctionne
        {
            // Indique le type du paramètre : s pour string, i pour integer, d pour decimal
            // 'ss' si deux paramétres etc... puis assigne la variable qui contient sa valeur
            $stmt->bind_param('s', $identifiant_utilisateur);

            $stmt->execute();

            // Permet de connaitre le nombre de ligne exécutée par la requête
            $stmt->store_result();

            // Si l'authentification a fonctionné
            if (0 == $stmt->errno)
            {
                //Pas d'erreurs sql
                if ($stmt->num_rows > 0)
                {
                    $stmt->bind_result($prenom_result, $nomfamille_result, $hash_result, $estadmin_result);
                    $stmt->fetch();

                    // Compare le résultat du mot de passe entrée par l'utilisateur et celui de la BD
                    $ok = password_verify($mot_de_passe, $hash_result);
                    if ($ok) {
                        // accepter la connexion
                        $_SESSION['authentification'] = true;
                        $_SESSION['operation_reussie'] = true;
                        $_SESSION['message_operation'] = "Authentification réussie. Bienvenue $prenom_result $nomfamille_result !";
                        $_SESSION['prenom_usager'] = $prenom_result;
                        if($estadmin_result == 1)
                            $_SESSION['estadmin'] = true;
                        else
                            $_SESSION['estadmin'] = false;
                        header('Location: index.php');
                    }
                    else
                    {
                        //le mot de passe sql ne correspond pas
                        $_SESSION['operation_reussie'] = false;
                        $_SESSION['message_operation'] = "L'authentification a échoué. La combinaison Identifiant / Mot de passe n'est pas correcte";
                        header("Location: authentification.php");
                    }
                }
                else
                {
                    //sql retourne 0 lignes (l'identifiant demande n'existe pas)
                    $_SESSION['message_operation'] = "L'authentification a échoué. La combinaison Identifiant / Mot de passe n'est pas correcte";
                }

            }
            else
            {
                //stmt->errno retourne une erreur sql
                $_SESSION['message_operation'] = "Nous sommes désolés, un problème technique nous empêche de retrouver les données (code 1).";
                echo_debug($stmt->error);//stmt (code 1)
            }
            $stmt->close();
        }
        else
        {
            // stmt n'a pas fonctionne
            $_SESSION['operation_reussie'] = false;
            $_SESSION['message_operation'] = "Nous sommes désolés, un problème technique nous empêche de vous authentifier. (code 2)";
            //echo_debug($mysqli->error);//mysqli (code 2)
            header("Location: formulaire-authentification.php");
        }
    }
    else
    {
        //Formulaire donne un message d'erreur
        $_SESSION['POST'] = $_POST; // Conservation des données
        $_SESSION['operation_reussie'] = false;
        $_SESSION['message_operation'] = $messageErreur; // Affiche le message d'erreur
        header("Location: formulaire-authentification.php");
    }
}
else
{
    // réagir si l'appel ne provient pas d'un POST
    $_SESSION['operation_reussie'] = false;
    header("Location: index.php");
}

require 'include/nettoyage.inc';
?>