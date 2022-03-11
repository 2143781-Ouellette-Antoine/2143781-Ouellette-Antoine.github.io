const tableauBoutonsCours = document.querySelectorAll('.un-cours');

Array.from(tableauBoutonsCours).forEach(function (bouton) {
    bouton.addEventListener('click', eventOnclick);
});

/*Afficher un message quand tu cliques*/
function eventOnclick() {
    /*Caller la fonction from ma-bibliotheque-popup*/
    afficherPopup3Secondes('Vous avez cliquer sur le bouton.', 3);
}