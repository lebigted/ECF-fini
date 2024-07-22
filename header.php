<?php

include 'auth.php';  

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">  
<body>
    <?php if ($page === 'home') : ?>
        <div class="header-gif">
            <img src="images/welcome.gif" alt="Bienvenue à l'Arche Verte">  
    <?php endif; ?>

    <header>
        <nav>
            <ul>
                <li><a href="index.php?page=home">Accueil</a></li>
                <li><a href="index.php?page=services">Nos Services</a></li>
                <li><a href="index.php?page=habitats">Nos Habitats</a></li>
                <li><a href="index.php?page=avis">Avis des Visiteurs</a></li>
                <li><a href="pro_login.php">Espace Pro</a></li>
                <li><a href="content/logout.php">Déconnexion</a></li>
            </ul>
        </nav>
    </header>

    <!-- Autres contenus HTML -->

    <script>
        let lastScrollTop = 0;
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            const footer = document.querySelector('footer');
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > lastScrollTop) {
                // Scroll down
                header.classList.add('hidden-header');
                footer.classList.add('hidden-footer');
            } else {
                // Scroll up
                header.classList.remove('hidden-header');
                footer.classList.remove('hidden-footer');
            }

            lastScrollTop = scrollTop;
        });
    </script>
</body>
</html>

