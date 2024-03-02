var fieldsetReservation = document.getElementById("reservation");
var fieldsetOptions = document.getElementById("options");
var fieldsetCoordonnees = document.getElementById("coordonnees");

//Par défaut afficher seulement la section "réservation"
fieldsetReservation.style.display = "block";
fieldsetOptions.style.display = "none";
fieldsetCoordonnees.style.display = "none";

//Au clic sur le bouton suivant, passer à la section "options" et cacher les autres
var btnSuivant1 = document.getElementById("btnSuivant1");

btnSuivant1.addEventListener('click', () => {
  // Validez la partie 1 avant de passer à la section suivante
  if (validerPartie1()) {
    // Si la validation réussit, passez à la section suivante
    fieldsetReservation.style.display = "none";
    fieldsetOptions.style.display = "block";
    fieldsetCoordonnees.style.display = "none";
  } else {
    // Si la validation échoue, affichez une alerte et empêchez la transition
    alert("Veuillez remplir tous les champs avant de passer à la section suivante.");
  }
});

// Fonction pour valider la partie 1
function validerPartie1() {
  // Ajoutez vos conditions de validation ici
  var auMoinsUnPassCoche = pass1jourCheckbox.checked || pass2joursCheckbox.checked || pass3joursCheckbox.checked
  || pass1jourReduitCheckbox.checked || pass2joursReduitCheckbox.checked || pass3joursReduitCheckbox.checked;
  var nombrePlacesValide = parseInt(document.getElementById("nombrePlaces").value, 10) >= 1;

  // Retourne true si la validation réussit, sinon false
  return auMoinsUnPassCoche && nombrePlacesValide;
}


//Au clic sur le bouton suivant, passer à la section "coordonnées" et cacher les autres
var btnSuivant2 = document.getElementById("btnSuivant2");

btnSuivant2.addEventListener('click', () => {
  fieldsetReservation.style.display = "none";
  fieldsetOptions.style.display = "none";
  fieldsetCoordonnees.style.display = "block";
})
//Au clic sur le bouton précédent on revient sur la section réservation
var btnPrecedent = document.getElementById("btnPrecedent");

btnPrecedent.addEventListener('click', () => {
  fieldsetReservation.style.display = "block";
  fieldsetOptions.style.display = "none";
  fieldsetCoordonnees.style.display = "none";
})

//Au clic sur le 2ème bouton précédent on revient sur la section options
var btnPrecedent2 = document.getElementById("btnPrecedent2");

btnPrecedent2.addEventListener('click', () => {
  fieldsetReservation.style.display = "none";
  fieldsetOptions.style.display = "block";
  fieldsetCoordonnees.style.display = "none";
})

//Afficher le choix de la date pour le pass 1 jour
let pass1jourCheckbox = document.getElementById("pass1jour");
let pass1jourDateSection = document.getElementById("pass1jourDate");

pass1jourCheckbox.addEventListener("change", choixDate1jour);

function choixDate1jour() {
  pass1jourDateSection.style.display = pass1jourCheckbox.checked ? "block" : "none";
}

//Masquer les dates des PASS TARIFS NORMAUX si les autres PASS sont sélectionnés
let pass2joursCheckbox = document.getElementById("pass2jours");
let pass3joursCheckbox = document.getElementById("pass3jours");
let pass2joursDateSection = document.getElementById("pass2joursDate");

pass1jourCheckbox.addEventListener("change", updateDateSection);
pass2joursCheckbox.addEventListener("change", updateDateSection);
pass3joursCheckbox.addEventListener("change", updateDateSection);

function updateDateSection() {
 
  if (pass2joursCheckbox.checked || pass3joursCheckbox.checked) {
    pass1jourDateSection.style.display = "none";
  } else {
    pass1jourDateSection.style.display = "block";
  }
  if (pass1jourCheckbox.checked || pass3joursCheckbox.checked) {
    pass2joursDateSection.style.display = "none";
  } else {
    pass2joursDateSection.style.display = "block";
  }
}

//Masquer les dates des PASS TARIFS REDUITS si les autres PASS sont sélectionnés
let pass1jourReduitCheckbox = document.getElementById("pass1jourreduit");
let pass2joursReduitCheckbox = document.getElementById("pass2joursreduit");
let pass3joursReduitCheckbox = document.getElementById("pass3joursreduit");
let pass1jourReduitSection = document.getElementById("pass1jourDateReduit");
let pass2joursReduitSection = document.getElementById("pass2joursDateReduit");

pass1jourReduitCheckbox.addEventListener("change", updateDateSectionReduit);
pass2joursReduitCheckbox.addEventListener("change", updateDateSectionReduit);
pass3joursReduitCheckbox.addEventListener("change", updateDateSectionReduit);

function updateDateSectionReduit() {
 
  if (pass2joursReduitCheckbox.checked || pass3joursReduitCheckbox.checked) {
    pass1jourReduitSection.style.display = "none";
  } else {
    pass1jourReduitSection.style.display = "block";
  }
  if (pass1jourReduitCheckbox.checked || pass3joursReduitCheckbox.checked) {
    pass2joursReduitSection.style.display = "none";
  } else {
    pass2joursDateSection.style.display = "block";
  }
}

//Afficher le choix de date pour le pass 2 jours
function choixDate2jours() {
  let pass2joursCheckbox = document.getElementById("pass2jours");
  let pass2joursDateSection = document.getElementById("pass2joursDate");

  pass2joursDateSection.style.display = pass2joursCheckbox.checked ? "block" : "none";
}

//Afficher ou masquer les tarifs réduits
function afficherMasquerTarifsReduits() {
  let checkboxTarifReduit = document.getElementById("tarifReduit");
  let tarifsReduitsSection = document.getElementById("tarifsReduits");
  let tarifsNormauxSection = document.getElementById('tarifsNormaux');

  if (checkboxTarifReduit.checked) {
    tarifsReduitsSection.style.display = "block";
    tarifsNormauxSection.style.display = "none";
  } else {
    tarifsReduitsSection.style.display = "none";
    tarifsNormauxSection.style.display = "block";
  }
}

//Afficher le choix des jours PASS 1 JOUR REDUIT
function choixDate1jourReduit() {
  let checkboxPass1jourReduit = document.getElementById("pass1jourreduit");
  let pass1jourDateSection = document.getElementById("pass1jourDateReduit");

  pass1jourDateSection.style.display = checkboxPass1jourReduit.checked ? "block" : "none";
}

//Afficher le choix des jours PASS 2 JOURS REDUIT
function choixDate2joursReduit() {
  let checkboxPass2joursReduit = document.getElementById("pass2joursreduit");
  let pass2joursDateSection = document.getElementById("pass2joursDateReduit");

  pass2joursDateSection.style.display = checkboxPass2joursReduit.checked ? "block" : "none";
}

//Afficher la réservation de casques si la checkbox "enfants" est cochée
function afficherCasques() {
  let checkboxEnfantsOui = document.getElementById("enfantsOui");
  let sectionCasquesEnfants = document.getElementById("casquesEnfants");

  sectionCasquesEnfants.style.display = checkboxEnfantsOui.checked ? "block" : "none";
};

