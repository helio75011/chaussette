<header class="navbar">

        <a class="logo" href="index.php">Chaussette</a>
        <div class="links-navbar">
            <ul>
                <?php if( isset($_SESSION['username']) && $_SESSION['username'] !== null ) : ?>
                    <a href=".?logout" class="secondary-button">Se déconnecter</a>
                <?php else : ?>
                    <a href="login.php" class="secondary-button">Se connecter</a>
                <?php endif; ?>
                <!-- <a href="login.php" class="secondary-button">Connexion</a> -->
                </li>
            </ul>
        </div>
        <div class="menu-hamburger">
        <div class="button-burger-menu"></div>
        </div>

</header>