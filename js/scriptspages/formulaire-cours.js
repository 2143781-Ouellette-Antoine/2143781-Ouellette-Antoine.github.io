const REGEX_CODE = '/^[0-9a-zA-Z]{3}-[0-9a-zA-Z]{3}-[0-9a-zA-Z]{2}$/';
let champCode = document.getElementById('code_cours');
let champNom = document.getElementById('nom_cours');

if (champCode != null) {//si champCode existe,
    champNom.onblur = validerCode;
}
if (champNom != null) {//si champNom existe,
    champNom.onblur = validerNom;
}

/**
 * Valide le Nom
 * et affiche le message d'erreur dans le DOM si non valide.
 * (required) (format==good)
 */
function validerCode(event, target, REGEX_CODE) {
    if(target === undefined) {
        target = event.target;
    }

    let valeur = target.value;
    let valide = false;
    const zoneMessage = target.parentElement.querySelector('.msgErreur');//Le premier qui a une classe .msgErreur
    let message = '';

    // si quelque chose a été entré comme valeur
    if (valeur) {
        if (valeur.match(REGEX_CODE)) {//Test valeur avec le Regex
            valide = true;
            zoneMessage.innerHTML = '';
            zoneMessage.classList.add("d-none");//Hide balise erreur
            target.classList.remove("is-invalid");//Remove encadre rouge
        }
        else {
            message = 'Le format du code de cours n\'est pas valide.';
        }
    }
    else {
        message = 'Le code de cours est requise.';
    }

    if (!valide) {
        // envoyer le message d'erreur au HTML
        zoneMessage.classList.remove("d-none");//Un-hide balise erreur
        zoneMessage.innerHTML = message;//Export le message
        target.classList.add("is-invalid");//Ajouter encadre rouge
    }

    return valide;
}

/**
 * Valide le Code
 * et affiche le message d'erreur dans le DOM si non valide.
 * (required) (length<=100)
 * @param event Événement qui a déclenché l'appel de la fonction.
 * @param target Élément HTML validé (optionnel).
 * @return valide Si le champ est valide
 */
function validerNom(event, target) {
    if(target === undefined) {
        target = event.target;
    }

    let valeur = target.value;
    let valide  = false;
    const zoneMessage = target.parentElement.querySelector('.msgErreur');//Le premier qui a une classe .msgErreur
    let message = '';

    // si quelque chose a été entré comme valeur
    if (valeur) {
        if (valeur.length <= 100) {
            valide = true;
            zoneMessage.innerHTML = '';
            zoneMessage.classList.add("d-none");//Hide balise erreur
            target.classList.remove("is-invalid");//Remove encadre rouge
        }
        else {
            message = 'Le Nom ne doit pas comporter plus de 100 caractères.';
        }
    }
    else {
        message = 'Le Nom est requis.';
    }

    if (!valide) {
        // envoyer le message d'erreur au HTML
        zoneMessage.classList.remove("d-none");//Un-hide balise erreur
        zoneMessage.innerHTML = message;//Export le message
        target.classList.add("is-invalid");//Ajouter encadre rouge
    }

    return valide;
}