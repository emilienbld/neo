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

<header class="nav-bar">
    <?php require_once 'nav/nav.php'; ?>
</header>

<main class="main-container coins d-flex row">
    <aside class="menu_g">
        <?php require_once 'menu/menu.php'; ?>
    </aside>

    <?php
    $action = $_GET['action'] ?? 'connexion';

    if ($action === 'inscription') {
        require_once 'inscription/inscription.php';
    } else {
        require_once 'connexion/connexion.php';
    }
    ?>
</main>

</body>
</html>
