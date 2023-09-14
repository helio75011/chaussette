<?php
require('config/setting.php');
 

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/register.css" />
  <link rel="shortcut icon" href="img/favicon.png" />
  <title>Chaussette | retrouvé votre paire </title>
</head>

<body>
  <div class="screen">
    <div class="form-container">
      <div class="form-content">
        <h2><a href="./index.php">Chaussette</a></h2>
        <h3>Créer votre compte</h3>
        <p>
          Nous avons besoin de vos informations pour trouver votre paire
        </p>
        <?php
        if (isset($_SESSION['error_inscription'])) { ?>
          <p>
            <?php echo $_SESSION['error_inscription']; ?>
          </p>
        <?php } ?>
        <form action="inscription.php" method="POST">
          <h3>Dites nous en plus à propos de vous</h3>
          <div class="main-informations">

            <label for="name">
              <input type="text" id="name" placeholder="Pseudo" name="name" required /></label>
              <label for="email">
              <input type="email" id="email" placeholder="Mail" name="email" required /></label>
            <label for="password">
              <input type="password" id="password" placeholder="Mot de passe" name="password" required /></label>
          </div>

          
          <h4>Couleur :</h4>
          <div class="hobbies radio">

          <?php ?>
            <div>
              <label for="couleur">
                <input type="checkbox" name="couleur" value="cooking" />
                <span>Cooking</span>
              </label>
            </div>

           
          </div>
          <?php ?>


          <input class="btn-login" type="submit" value="Inscription" />
        </form>
        <p>
          Vous avez déjà un compte ?
          <a href="login.php">Connexion</a>
        </p>
      </div>
    </div>
  </div>
</body>

</html>