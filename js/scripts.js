document.addEventListener("DOMContentLoaded", function(event) {
    let boutonOuvrirPanneau = document.getElementById('boutonOuvrirPanneau');

    if ( boutonOuvrirPanneau != null) {
        boutonOuvrirPanneau.onclick = ouvrirPanneau;
    }

    let boutonFermerPanneau = document.getElementById('boutonFermerPanneau');

    if ( boutonFermerPanneau != null) {
        boutonFermerPanneau.onclick = fermerPanneau;
    }
});

function ouvrirPanneau() {
    let panneau = document.getElementById('panneau');
    if ( panneau != null) {
        panneau.style.width = "100%";
    }
  }

  function fermerPanneau() {
    let panneau = document.getElementById('panneau');
    if ( panneau != null) {
        panneau.style.width = "0";
    }
  }