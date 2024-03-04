<?php
include 'includes/header.php';

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire de réservation Music Vercors Festival</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
  if (isset($_GET['error'])) {
    echo $_GET['error'];
  }
  ?>
  <form action="traitement.php" id="inscription" method="POST">
    <fieldset id="reservation">
      <legend>Réservation</legend>
      <h3>Nombre de réservation(s) :</h3>
      <input type="number" name="nombrePlaces" id="nombrePlaces" value="1" min="1" required>
      <h3>Réservation(s) en tarif réduit</h3>
      <input type="checkbox" name="tarifReduit" id="tarifReduit" onclick="afficherMasquerTarifsReduits()">
      <label for="tarifReduit">Ma réservation sera en tarif réduit</label>

      <h3>Choisissez votre formule :</h3>
      <div id="tarifsNormaux">
        <input type="radio" name="choixPass" id="pass1jour" value="pass1jour" onclick="choixDate1jour()">
        <label for="pass1jour">Pass 1 jour : 40€</label>

        <!-- Si case cochée, afficher le choix du jour -->
        <section id="pass1jourDate" style="display: none;">
          <input type="radio" name="choixJour" id="choixJour1" value="choixJour1" checked>
          <label for="choixJour1">Pass pour la journée du 01/07</label>
          <input type="radio" name="choixJour" id="choixJour2" value="choixJour2">
          <label for="choixJour2">Pass pour la journée du 02/07</label>
          <input type="radio" name="choixJour" id="choixJour3" value="choixJour3">
          <label for="choixJour3">Pass pour la journée du 03/07</label>
        </section>

        <input type="radio" name="choixPass" id="pass2jours" value="pass2jours" onclick="choixDate2jours()">
        <label for="pass2jours">Pass 2 jours : 70€</label>

        <!-- Si case cochée, afficher le choix des jours -->
        <section id="pass2joursDate" style="display: none;">
          <input type="radio" name="choixJour2" id="choixJour12" value="choixjour12" checked>
          <label for="choixJour12">Pass pour deux journées du 01/07 au 02/07</label>
          <input type="radio" name="choixJour2" id="choixJour23" value="choixjour23">
          <label for="choixJour23">Pass pour deux journées du 02/07 au 03/07</label>
        </section>

        <input type="radio" name="choixPass" id="pass3jours" value="pass3jours">
        <label for="pass3jours">Pass 3 jours : 100€</label>
      </div>

      <!-- tarifs réduits : à n'afficher que si tarif réduit est sélectionné -->
      <section class="tarifsReduits" id="tarifsReduits" style="display: none;">
        <input type="radio" name="choixPassReduit" id="pass1jourreduit" value="pass1jourreduit"
          onclick="choixDate1jourReduit()">
        <label for="pass1jourreduit">Pass 1 jour : 25€</label>

        <section id="pass1jourDateReduit" style="display: none;">
          <input type="radio" name="choixJourReduit" id="choixJour1reduit" value="choixJour1reduit" checked>
          <label for="choixJour1reduit">Pass pour la journée du 01/07</label>
          <input type="radio" name="choixJourReduit" id="choixJour2reduit" value="choixJour2reduit">
          <label for="choixJour2reduit">Pass pour la journée du 02/07</label>
          <input type="radio" name="choixJourReduit" id="choixJour3reduit" value="choixJour3reduit">
          <label for="choixJour3reduit">Pass pour la journée du 03/07</label>
        </section>


        <input type="radio" name="choixPassReduit" id="pass2joursreduit" value="pass2joursreduit"
          onclick="choixDate2joursReduit()">
        <label for="pass2joursreduit">Pass 2 jours : 50€</label>

        <section id="pass2joursDateReduit" style="display: none;">
          <input type="radio" name="choixJour2Reduit" id="choixJour12reduit" value="choixJour12reduit" checked>
          <label for="choixJour12reduit">Pass pour deux journées du 01/07 au 02/07</label>
          <input type="radio" name="choixJour2Reduit" id="choixJour23reduit" value="choixJour23reduit">
          <label for="choixJour23reduit">Pass pour deux journées du 02/07 au 03/07</label>
        </section>

        <input type="radio" name="choixPassReduit" id="pass3joursreduit" value="pass3joursreduit">
        <label for="pass3joursreduit">Pass 3 jours : 65€</label>
      </section>

      <!-- FACULTATIF : ajouter un pass groupe (5 adultes : 150€ / jour) uniquement pass 1 jour -->
      <div>
        <p class="bouton" id="btnSuivant1">Suivant</p>
      </div>

    </fieldset>
    <fieldset id="options">
      <legend>Options</legend>
      <h3>Réserver un emplacement de tente : </h3>
      <input type="checkbox" id="tenteNuit1" name="tenteNuit1" class="tenteNuit" value="tenteNuit1"
        onchange="cocherTente3nuits()">
      <label for="tenteNuit1">Pour la nuit du 01/07 (5€)</label>
      <input type="checkbox" id="tenteNuit2" name="tenteNuit2" class="tenteNuit" value="tenteNuit2"
        onchange="cocherTente3nuits()">
      <label for="tenteNuit2">Pour la nuit du 02/07 (5€)</label>
      <input type="checkbox" id="tenteNuit3" name="tenteNuit3" class="tenteNuit" value="tenteNuit3"
        onchange="cocherTente3nuits()">
      <label for="tenteNuit3">Pour la nuit du 03/07 (5€)</label>
      <input type="checkbox" id="tente3Nuits" name="tente3Nuits" class="tenteNuit" value="tente3Nuits"
        onchange="cocherTente3nuits()">
      <label for="tente3Nuits">Pour les 3 nuits (12€)</label>

      <h3>Réserver un emplacement de camion aménagé : </h3>
      <input type="checkbox" id="vanNuit1" name="vanNuit1" class="vanNuit" value="vanNuit1" onchange="cocherVan3nuits()">
      <label for="vanNuit1">Pour la nuit du 01/07 (5€)</label>
      <input type="checkbox" id="vanNuit2" name="vanNuit2" class="vanNuit" value="vanNuit2" onchange="cocherVan3nuits()">
      <label for="vanNuit2">Pour la nuit du 02/07 (5€)</label>
      <input type="checkbox" id="vanNuit3" name="vanNuit3" class="vanNuit" value="vanNuit3" onchange="cocherVan3nuits()">
      <label for="vanNuit3">Pour la nuit du 03/07 (5€)</label>
      <input type="checkbox" id="van3Nuits" name="van3Nuits" class="vanNuit" value="van3Nuits"
        onchange="cocherVan3nuits()">
      <label for="van3Nuits">Pour les 3 nuits (12€)</label>

      <h3>Venez-vous avec des enfants ?</h3>
      <input type="radio" name="enfants" value="Oui" id="enfantsOui" onchange="afficherMasquerCasques()">
      <label for="enfantsOui">Oui</label>
      <input type="radio" name="enfants" value="Non" id="enfantsNon" onchange="afficherMasquerCasques()">
      <label for="enfantsNon">Non</label>

      <!-- Si oui, afficher : -->
      <section id="casquesEnfants" style="display: none;">
        <h4>Voulez-vous louer un casque antibruit pour enfants* (2€ / casque) ?</h4>
        <label for="nombreCasquesEnfants">Nombre de casques souhaités :</label>
        <input type="number" name="nombreCasquesEnfants" id="nombreCasquesEnfants" value="0" min="0">
        <p>*Dans la limite des stocks disponibles.</p>
      </section>

      <h3>Profitez de descentes en luge d'été à tarifs avantageux !</h3>
      <label for="NombreLugesEte">Nombre de descentes en luge d'été :</label>
      <input type="number" name="NombreLugesEte" id="NombreLugesEte" value="0" min="0">

      <p class="bouton" id="btnPrecedent">Précédent</p>
      <p class="bouton" id="btnSuivant2">Suivant</p>


    </fieldset>

    <fieldset id="coordonnees">
      <legend>Coordonnées</legend>
      <label for="nom">Nom :</label>
      <input type="text" name="nom" id="nom" required autocomplete="family-name">
      <label for="prenom">Prénom :</label>
      <input type="text" name="prenom" id="prenom" required autocomplete="given-name">
      <label for="email">Email :</label>
      <input type="email" name="email" id="email" required autocomplete="email">
      <label for="telephone">Téléphone :</label>
      <input type="text" name="telephone" id="telephone" required autocomplete="tel">
      <label for="adressePostale">Adresse Postale :</label>
      <input type="text" name="adressePostale" id="adressePostale" required autocomplete="address-line1">
      <br>
      <p class="bouton" id="btnPrecedent2">Précédent</p>
      <input type="submit" name="soumission" class="bouton" id="btnReserver" value="Réserver">
    </fieldset>
  </form>
  <?php
  include 'includes/footer.php';
  ?>
</body>
<script src="script.js" defer></script>


</html>