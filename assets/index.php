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

    <?php require_once 'nav/nav.php'; ?>

    <div class="coins">
        <div class="menu-toggle" id="menu-toggle">&#x2192;</div>

        <aside id="side-menu">
            <?php require_once 'menu/menu.php'; ?>
        </aside>

        <div class="form-container">
            <?php
            $action = $_GET['action'] ?? 'connexion';

            if ($action === 'inscription') {
                require_once 'inscription/inscription.php';
            } else {
                require_once 'connexion/connexion.php';
            }
            ?>
        </div>
    </div>

</body>
</html>
