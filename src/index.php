<?php require('config/setting.php');
 if(isset($_SESSION['username'])){
    header("Location: connected.php");
}
else{
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="shortcut icon" href="img/favicon.png" />
  <title>Chaussette | retrouvé votre paire </title>
  <style>
    .navbar{
      position: absolute;
    }
  </style>
</head>

<body>
  <nav class="navbar">
    <a class="logo" href="index.php">Chaussette</a>
    <div class="links-navbar">
      <!-- <ul>
        <li>
          <a href="#">Contact Us</a>
        </li>
        <li><a href="#">Q&A ?</a></li>
        <li>
          <a href="#">About</a>
        </li> -->
        <li>
          <a href="login.php" class="secondary-button">Connexion</a>
        </li>
      </ul>
    </div>
    <div class="menu-hamburger">
      <div class="button-burger-menu"></div>
    </div>
  </nav>

  <main>
    <div class="screen">
      <div class="home">
        <h1>Chaussette</h1>
        <h2><span class="slogan-app"></span></h2>
        <a href="register.php" class="primary-button">Créer mon compte</a>
        <a href="login.php" class="mobile-login">Connexion</a>
      </div>
    </div>
  </main>

  
  <script src="js/volet.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
  <script src="js/auto_type.js"></script>
</body>

</html>

<?php } ?>