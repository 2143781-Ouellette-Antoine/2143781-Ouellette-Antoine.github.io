const REGEX_EMAIL = '/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/';
let champNom = document.getElementById('nom_utilisateur');
let champCourriel = document.getElementById('courriel_utilisateur');
let champSujet = document.getElementById('sujet');
let champMessage = document.getElementById('message_utilisateur');

if (champNom != null) {//si champNom existe,
    champNom.onblur = validerNom;
}
if (champCourriel != null) {//si champCourriel existe,
    champCourriel.onblur = validerCourriel;
}
if (champSujet != null) {//si champSujet existe,
    champSujet.onblur = validerSujet;
}
if (champMessage != null) {//si champMessage existe,
    champMessage.onblur = validerMessage;
}

/**
 * Valide le Nom
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

/**
 * Valide le Courriel
 * et affiche le message d'erreur dans le DOM si non valide.
 * (required) (format==good)
 */
function validerCourriel(event, target, REGEX_EMAIL) {
    if(target === undefined) {
        target = event.target;
    }

    let valeur = target.value;
    let valide = false;
    const zoneMessage = target.parentElement.querySelector('.msgErreur');//Le premier qui a une classe .msgErreur
    let message = '';

    // si quelque chose a été entré comme valeur
    if (valeur) {
        if (valeur.match(REGEX_EMAIL)) {//Test valeur avec le Regex
            valide = true;
            zoneMessage.innerHTML = '';
            zoneMessage.classList.add("d-none");//Hide balise erreur
            target.classList.remove("is-invalid");//Remove encadre rouge
        }
        else {
            message = 'Le format de l\'adresse courriel n\'est pas valide.';
        }
    }
    else {
        message = 'L\'adresse courriel est requise.';
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
 * Valide le Sujet
 * et affiche le message d'erreur dans le DOM si non valide.
 * (required) (length<=100)
 */
function validerSujet(event, target) {
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
            message = 'Le Sujet ne doit pas comporter plus de 100 caractères.';
        }
    }
    else {
        message = 'Le Sujet est requis.';
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
 * Valide le Message
 * et affiche le message d'erreur dans le DOM si non valide.
 * (required) (length<=100)
 */
function validerMessage(event, target) {
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
            message = 'Le Message ne doit pas comporter plus de 100 caractères.';
        }
    }
    else {
        message = 'Le Message est requis.';
    }

    if (!valide) {
        // envoyer le message d'erreur au HTML
        zoneMessage.classList.remove("d-none");//Un-hide balise erreur
        zoneMessage.innerHTML = message;//Export le message
        target.classList.add("is-invalid");//Ajouter encadre rouge
    }

    return valide;
}