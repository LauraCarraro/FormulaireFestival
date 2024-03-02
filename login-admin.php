<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        text-align: center;
        border: 1px solid black;
        padding: 30px;
    }

    h1,
    h3,
    button {
        font-family: Arial;
    }

    #logoAdm {
        width: 30px;
        height: 30px
    }
</style>

<body>
    <div id="sectionAdmin">
        <h1>Login Admin <img src="assets/logoadmin.png" id="logoAdm"></h1>
        <h3>Rentrez votre mot de passe</h3>
        <form action="admin.php" method="POST">
            <input type="password" placeholder="Mot de passe" name="password">
            <button>Se connecter</button>
            <br>
            <?php
            if (isset($_GET['error'])) {
                echo "<label>" . $_GET['error'] . "</label>";
            }
            ?>
        </form>
    </div>
</body>

</html>