<div class="menu-content">
    <div class="user-info">
        <?php
        $profilPic = isset($_SESSION['user_data']['profil_pic']) && $_SESSION['user_data']['profil_pic'] != null
            ? '/assets/photo/profil_pic/' . htmlspecialchars($_SESSION['user_data']['profil_pic'])
            : '/assets/photo/profil_pic/default-profil.png';
//        dd($_SESSION['user_data']);

        ?>
        <img src="<?php echo $profilPic; ?>" alt="Photo de profil" class="profil-pic">
        <p><?php echo isset($_SESSION['user_data']['firstname']) ? htmlspecialchars($_SESSION['user_data']['firstname']) : 'Visiteur'; ?></p>
    </div>
    <nav class="main-nav">
        <ul>
            <li><a href="#"><img src="/assets/icons/home.svg" alt="Accueil"> Accueil</a></li>
            <li><a href="#"><img src="/assets/icons/settings.svg" alt="Paramètres"> Paramètres</a></li>
            <li><a href="#"><img src="/assets/icons/help.svg" alt="Aide"> Aide</a></li>
            <li><a href="#"><img src="/assets/icons/exit.svg" alt="Déconnexion"> Déconnexion</a></li>
        </ul>
    </nav>

    <div class="quick-links">
        <h3>Liens rapides</h3>
        <ul>
            <li><a href="#"><img src="/assets/icons/notification.svg" alt="Notifications"> Notifications</a></li>
            <li><a href="#"><img src="/assets/icons/message.svg" alt="Messages"> Messages</a></li>
            <li><a href="#"><img src="/assets/icons/stat.svg" alt="Statistiques"> Statistiques</a></li>
        </ul>
    </div>
</div>

<script>
    const menuToggle = document.getElementById('menu-toggle');
    const sideMenu = document.getElementById('side-menu');

    menuToggle.addEventListener('click', () => {
        sideMenu.classList.toggle('active');
        menuToggle.classList.toggle('active');

        if (sideMenu.classList.contains('active')) {
            menuToggle.innerHTML = '&#x2190;';
        } else {
            menuToggle.innerHTML = '&#x2192;';
        }

    });

</script>
