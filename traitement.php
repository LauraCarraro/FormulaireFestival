<?php
define("MAX_RANGE", 200);
define("PRIX_TENTE_VAN_1_NUIT", 7);
define("PRIX_TENTE_VAN_3_NUITS", 18);

//Vérification des champs des coordonnées
if (isset($_POST) && $_POST) {
    if (isset($_POST['nom']) && $_POST['nom'] !== "") {
        $nom = htmlspecialchars($_POST['nom']);
    } else {
        header('location:../index.php?error=' . "Le nom est obligatoire");
        exit;
    }

    if (isset($_POST['prenom']) && $_POST['prenom'] !== "") {
        $prenom = htmlspecialchars($_POST['prenom']);
    } else {
        header('location:../index.php?error=' . "Le prénom est obligatoire");
        exit;
    }
    //Vérification email
    if (isset($_POST['email']) && $_POST['email'] !== "") {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $email = htmlspecialchars($_POST['email']);
        } else {
            header('location:../index.php?error=' . "L'email n'est pas valide.");
            exit;
        }
    } else {
        header('location:../index.php?error=' . "L'email est obligatoire.");
        exit;
    }
    //Vérification du numéro de téléphone
    if (isset($_POST['telephone']) && $_POST['telephone'] !== "") {
        if (filter_var($_POST['telephone'], FILTER_SANITIZE_NUMBER_INT)) {
            $telephone = htmlspecialchars($_POST['telephone']);
        } else {
            header('location:../index.php?error=' . "Le numéro de téléphone n'est pas valide.");
            exit;
        }
    } else {
        header('location:../index.php?error=' . "Le numéro de téléphone est obligatoire.");
        exit;
    }

    //Vérification des caractères de l'adresse postale
    $adressePostale = htmlspecialchars($_POST['adressePostale']);

    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';

    //Calcul du prix total
    $tarifReduit = isset($_POST["tarifReduit"]) ? "Oui" : "Non";
    $prixTotal = 0;
    $nombreJourReduit = $choixNombreJourReduit = null;
    if (isset($_POST['nbJourReduit'])) {
        $nombreJourReduit = $_POST['nbJourReduit'];
        // Récupérer la valeur sélectionnée
        switch ($nombreJourReduit) {
            case "pass1jourreduit":
                $choixNombreJourReduit = "1 jour";
                $prixTotal += 25;
                break;
            case "pass2joursreduit":
                $choixNombreJourReduit = "2 jours";
                $prixTotal += 50;
                break;
            case "pass3joursreduit":
                $choixNombreJourReduit = "3 jours";
                $prixTotal += 65;
                break;
            default:
                break;
        }

    }

    $nombreJour = $choixNombreJour = null;
    if (isset($_POST['nbJour'])) {
        $nombreJour = $_POST['nbJour'];
        // Récupérer la valeur sélectionnée
        switch ($nombreJour) {
            case "pass1jour":
                $choixNombreJour = "1 jour";
                $prixTotal += 40;
                break;
            case "pass2jours":
                $choixNombreJour = "2 jours";
                $prixTotal += 70;
                break;
            case "pass3jours":
                $choixNombreJour = "3 jours";
                $prixTotal += 100;
                break;
            default:
                break;
        }
    }

    if (isset($_POST['pass1jour'])) {
        switch ($_POST['choixJour']) {
            case 'choixJour1':
                $choixPass1jour = "Premier jour";
                break;
            case 'choixJour2':
                $choixPass1jour = "Deuxième jour";
                break;
            case 'choixJour3':
                $choixPass1jour = "Troisième jour";
                break;
            default:
                $choixPass1jour = null;
                break;
        }
    } else {
        $choixPass1jour = null;
    }

    if (isset($_POST['pass2jours'])) {
        switch ($_POST['choixJour2']) {
            case 'choixjour12':
                $choixPass2Jours = "Premier et deuxième jour";
                break;
            case 'choixjour23':
                $choixPass2Jours = "Deuxième et troisième jour";
                break;
            default:
                $choixPass2Jours = null;
                break;
        }
    } else {
        $choixPass2Jours = null;
    }

    $enfant = "";
    if (isset($_POST['enfants'])) {
        $enfants = $_POST['enfants'];
        if ($enfants == "enfantsOui") {
            $enfant = "Oui";
        }

        if ($enfants == "enfantsNon") {
            $enfant = "Non";
        }
    }

    $nombrePlaces = isset($_POST["nombrePlaces"]) && $_POST["nombrePlaces"] !== "" ? (int) $_POST["nombrePlaces"] : 0;
    $nombreCasquesEnfants = isset($_POST["nombreCasquesEnfants"]) && $_POST["nombreCasquesEnfants"] !== "" ? (int) $_POST["nombreCasquesEnfants"] : 0;
    $nombreLugesEte = isset($_POST["NombreLugesEte"]) && $_POST["NombreLugesEte"] !== "" ? (int) $_POST["NombreLugesEte"] : 0;

    // Vérification prix pour la réservation tente
    $tenteNuit = isset($_POST["tenteNuit"]) ? $_POST["tenteNuit"] : null;
    if ($tenteNuit === "tenteNuit1") {
        $prixTotal += PRIX_TENTE_VAN_1_NUIT;
    }
    if ($tenteNuit === "tenteNuit2") {
        $prixTotal += PRIX_TENTE_VAN_1_NUIT;
    }
    if ($tenteNuit === "tenteNuit3") {
        $prixTotal += PRIX_TENTE_VAN_1_NUIT;
    }
    if ($tenteNuit === "tente3Nuits") {
        $prixTotal += PRIX_TENTE_VAN_3_NUITS;
    }

    // Vérification prix pour la réservation van 
    $vanNuit = isset($_POST["vanNuit"]) ? $_POST["vanNuit"] : null;
    if ($vanNuit === "vanNuit1") {
        $prixTotal += PRIX_TENTE_VAN_1_NUIT;
    }
    if ($vanNuit === "vanNuit2") {
        $prixTotal += PRIX_TENTE_VAN_1_NUIT;
    }
    if ($vanNuit === "vanNuit3") {
        $prixTotal += PRIX_TENTE_VAN_1_NUIT;
    }
    if ($vanNuit === "van3Nuits") {
        $prixTotal += PRIX_TENTE_VAN_3_NUITS;
    }

    // Multiplication par le nombre de personnes
    $prixTotal *= $nombrePlaces;

    // Vérification prix des casques et des luges
    $prixTotal += ($nombreCasquesEnfants * 2);
    $prixTotal += ($nombreLugesEte * 5);

    $data = [
        $nom,
        $prenom,
        $email,
        $telephone,
        $adressePostale,
        $nombrePlaces,
        $tarifReduit,
        $prixTotal,
        $nombreJourReduit,
        $nombreJour,
        $choixPass1jour,
        $choixPass2Jours,
        isset($_POST['pass3jours']) ? "Pass complet" : null,
        $tenteNuit === "tenteNuit1" ? "Oui" : "Non",
        $tenteNuit === "tenteNuit2" ? "Oui" : "Non",
        $tenteNuit === "tenteNuit3" ? "Oui" : "Non",
        $tenteNuit === "tente3Nuits" ? "Oui" : "Non",
        $vanNuit === "vanNuit1" ? "Oui" : "Non",
        $vanNuit === "vanNuit2" ? "Oui" : "Non",
        $vanNuit === "vanNuit3" ? "Oui" : "Non",
        $vanNuit === "van3Nuits" ? "Oui" : "Non",
        $enfant,
        $nombreCasquesEnfants,
        $nombreLugesEte
    ];
    $csv = fopen("reservations.csv", "a");
    fputcsv($csv, $data);

    // Réponse à l'utilisateur
    echo "Merci pour votre réservation !";

} ?>

<!-- //Affichage récapitulatif réservation sous forme de liste -->

<h2>Récapitulatif réservation</h2>
<ul>
    <li>Nom :
        <?php echo $nom; ?>
    </li>
    <li>Prénom :
        <?php echo $prenom; ?>
    </li>
    <li>Email :
        <?php echo $email; ?>
    </li>
    <li>Telephone :
        <?php echo $telephone; ?>
    </li>
    <li>Adresse :
        <?php echo $adressePostale; ?>
    </li>
    <li>Nombre de places :
        <?php echo $nombrePlaces; ?>
    </li>
    <li>Tarif réduit :
        <?php echo $tarifReduit; ?>
    </li>
    <li>Pass réduits :
        <?php echo $choixNombreJourReduit; ?>
    </li>
    <li>Pass :
        <?php echo $choixNombreJour; ?>
    </li>
    <li>Jour choisi :
        <?php echo $choixPass1jour; ?>
    </li>
    <li>Jours choisis :
        <?php echo $choixPass2Jours; ?>
    </li>
    <li>Tente nuit 1 :
        <?php echo $tenteNuit === "tenteNuit1" ? "Oui" : "Non" ?>
    </li>
    <li>Tente nuit 2 :
        <?php echo $tenteNuit === "tenteNuit2" ? "Oui" : "Non" ?>
    </li>
    <li>Tente nuit 3 :
        <?php echo $tenteNuit === "tenteNuit3" ? "Oui" : "Non" ?>
    </li>
    <li>Tente 3 nuits :
        <?php echo $tenteNuit === "tente3Nuits" ? "Oui" : "Non" ?>
    </li>
    <li>Van nuit 1 :
        <?php echo $vanNuit === "vanNuit1" ? "Oui" : "Non" ?>
    </li>
    <li>Van nuit 2 :
        <?php echo $vanNuit === "vanNuit2" ? "Oui" : "Non" ?>
    </li>
    <li>Van nuit 3 :
        <?php echo $vanNuit === "vanNuit3" ? "Oui" : "Non" ?>
    </li>
    <li>Van 3 nuits :
        <?php echo $vanNuit === "van3Nuits" ? "Oui" : "Non" ?>
    </li>
    <li>Enfants :
        <?php echo $enfant; ?>
    </li>
    <li>Casques enfant :
        <?php echo $nombreCasquesEnfants; ?>
    </li>
    <li>Luge été :
        <?php echo $nombreLugesEte; ?>
    </li>
</ul>