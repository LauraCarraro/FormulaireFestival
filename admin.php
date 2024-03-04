<?php
// Hash du mot de passe : "coucou"
const PASSWORD = '$2y$10$ZB1WgyZr7TsStWYYCxq/euKLobplurGdt6P9huO4zjoPeE69V6H16';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!password_verify($_POST["password"], PASSWORD)) {
        $error = "Le mot de passe ne correspond pas";

        header("location:login-admin.php?error=" . $error);
        exit;
    }
}

$fichier = fopen("reservations.csv", "r");
?>

<style>
    table {
        width: 100%;
        font-family: Arial, Helvetica, sans-serif;
        background-color: #FFFFFF;
        border-collapse: collapse;
        border-width: 2px;
        border-color: #7EA8F8;
        border-style: solid;
        color: #000000;
    }

    table td,
    table th {
        border: 2px solid black;
        padding: 5px;
    }

    table thead {
        background-color: rgb(90, 166, 171);
    }
</style>
<table>
    <thead>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Téléphone</th>
        <th>Adresse postale</th>
        <th>Nombre de places</th>
        <th>Tarif réduit</th>
        <th>Prix total</th>
        <th>Nombre jour réduit</th>
        <th>Nombre jour</th>
        <th>Choix pass 1 jour</th>
        <th>Choix pass 2 jours</th>
        <th>Choix pass 3 jours</th>
        <th>Tente nuit 1</th>
        <th>Tente nuit 2</th>
        <th>Tente nuit 3</th>
        <th>Tente 3 nuits</th>
        <th>Van nuit 1</th>
        <th>Van nuit 2</th>
        <th>Van nuit 3</th>
        <th>Van 3 nuits</th>
        <th>Enfant</th>
        <th>Nombre casque enfant</th>
        <th>Nombre luge été</th>
    </thead>
    <tbody>
        <?php while (($ligne = fgetcsv($fichier, null, ",")) !== FALSE) { ?>
            <tr>
                <?php foreach ($ligne as $valeur) { ?>
                    <td>
                        <?= $valeur ?>
                    </td>
                <?php } ?>
            </tr>
        <?php } ?>
        </tr>
    </tbody>
</table>