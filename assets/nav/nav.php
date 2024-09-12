<head>
    <script>
        function toggleMenu() {
            var menu = document.getElementById('menu-list');
            if (menu.style.display === 'block') {
                menu.style.display = 'none';
            } else {
                menu.style.display = 'block';
            }
        }
    </script>
</head>
<body>

<nav class="menu">
    <!-- Menu burger -->
    <div class="burger" onclick="toggleMenu()">
        &#9776;
    </div>

    <!-- Menu principal -->
    <ul id="menu-list">
        <li>
            <a href="#">Accueil</a>
        </li>
        <li>
            <a href="#">CGU</a>
        </li>
        <li>
            <a href="#">Compte</a>
        </li>
    </ul>

    <?php if (isset($_SESSION['user_data'])): ?>
        <div class="user-info">
            Bonjour<br><?php echo htmlspecialchars($_SESSION['user_data']['firstname']); ?> <?php echo htmlspecialchars($_SESSION['user_data']['lastname']); ?>
        </div>
    <?php endif; ?>
</nav>

</body>
