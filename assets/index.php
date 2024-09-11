<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
    <link href="style/all.css" rel="stylesheet">
</head>
<body>
<?php require_once 'nav.php'; ?>

<div class="coins d-flex row r">
    <div class="menu_g b">
        <?php require_once 'menu.php'; ?>
    </div>
    <!-- Section de connexion -->
    <div class="menu_d form g" id="connexion-form">
        <h1>Se connecter</h1>
        <!-- Message d'erreur de connexion -->
        <p id="error-message-connexion" class="error" style="display:none;"></p>

        <form method="POST" action="../src/service/connexion.php">
            <label>Email :</label>
            <input type="email" name="email" required><br>

            <label>Mot de passe :</label>
            <input type="password" name="password" required><br>

            <button type="submit">Se connecter</button>
            <button type="button" id="show-inscription">Pas de compte</button>
        </form>
    </div>

    <!-- Section d'inscription -->
    <div class="menu_d form r hidden" id="inscription-form">
        <h1>S'inscrire</h1>

        <!-- Message d'erreur d'inscription -->
        <p id="error-message-inscription" class="error" style="display:none;"></p>

        <form method="POST" action="../src/service/inscription.php">
            <label>Prénom :</label>
            <input type="text" name="firstname" required><br>

            <label>Nom :</label>
            <input type="text" name="lastname" required><br>

            <label>Email :</label>
            <input type="email" name="email" required><br>

            <label>Mot de passe :</label>
            <input type="password" name="password" required><br>

            <button type="submit">S'inscrire</button>
            <button type="button" id="show-connexion">Déjà client</button>
        </form>
    </div>
</div>

<script src="app.js"></script>

</body>
</html>
