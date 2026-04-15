// FORMULAIRES CONNEXION / CRÉATION / OUBLI
// Pour index-connexion-2.html

document.addEventListener("DOMContentLoaded", () => {
  const boutonCreation = document.getElementById("btn-creation");
  const boutonConnexion = document.getElementById("btn-connexion");
  const formulaireCreation = document.getElementById("form-creation");
  const formulaireConnexion = document.getElementById("form-connexion");

  boutonCreation.addEventListener("click", () => {
    formulaireCreation.style.display = "block";
    formulaireConnexion.style.display = "none";
    formulaireOublie.style.display = "none";
  });

  boutonConnexion.addEventListener("click", () => {
    formulaireConnexion.style.display = "block";
    formulaireCreation.style.display = "none";
    formulaireOublie.style.display = "none";
  });

  boutonOublie.addEventListener("click", () => {
    formulaireOublie.style.display = "block";
    formulaireCreation.style.display = "none";
    formulaireConnexion.style.display = "none";
  });
});