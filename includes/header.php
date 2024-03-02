<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="script.js" defer></script>
</head>

<body>
    <style>
        header {
            background-image: url('assets/headerfestival.png');
            background-size: 100% auto;
            background-position: center;
            background-repeat: no-repeat;
            text-align: right;
            height: 300px;
        }

        #loginAdmin {
            position: fixed;
            cursor: pointer;
            top: 20px;
            right: 20px;
            background-color: white;
            border: 1px solid black;
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            align-items: center;
            width: 120px;
            height: 40px;
            border-radius: 5px;
            z-index: 99;
            color: black;
            font-size: 18px;
            padding: 0;
        }

        #logoAdmin {
            width: 20px;
            height: 20px;
        }
        a {
            text-decoration: none;
            color: black;
        }
    </style>

    <header>
        <button id=loginAdmin><a href="/login-admin.php">
            <img src="assets/logoadmin.png" alt="Logo Admin" id="logoAdmin"> Admin
        </a></button>
    </header>
</body>

</html>