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
        <form action="connexion.php" method="POST">
          <h3>Dites nous en plus à propos de vous</h3>
          <div class="main-informations">
            <input name="username " type="text" placeholder="Pseudo" />
            <input type="email" placeholder="Email" name="email" />
            <input type="password" placeholder="Password" name="password" />
          </div>

          <div class="gender radio">
            <h4>Your gender :</h4>
            <div>
              <label>
                <input type="radio" name="user-gender" value="man" checked />
                <span>Man</span>
              </label>
            </div>

            <div>
              <label>
                <input type="radio" name="user-gender" value="woman" />
                <span>Woman</span>
              </label>
            </div>
          </div>

          <h4>You Search</h4>
          <div class="gender radio">
            <div>
              <label>
                <input type="radio" name="search-gender" value="man" checked />
                <span>Man</span>
              </label>
            </div>

            <div>
              <label>
                <input type="radio" name="search-gender" value="woman" />
                <span>Woman</span>
              </label>
            </div>
          </div>

          <h4>Your Hobbies :</h4>
          <div class="hobbies radio">
            <div>
              <label>
                <input type="checkbox" name="user-hobbies" value="cooking" />
                <span>Cooking</span>
              </label>
            </div>

            <div>
              <label>
                <input type="checkbox" name="user-hobbies" value="sport" />
                <span>Sport</span>
              </label>
            </div>

            <div>
              <label>
                <input type="checkbox" name="user-hobbies" value="reading" />
                <span>Reading</span>
              </label>
            </div>

            <div>
              <label>
                <input type="checkbox" name="user-hobbies" value="music" />
                <span>Music</span>
              </label>
            </div>

            <div>
              <label>
                <input type="checkbox" name="user-hobbies" value="dance" />
                <span>Dance</span>
              </label>
            </div>

            <div>
              <label>
                <input type="checkbox" name="user-hobbies" value="astronomy" />
                <span>Astronomy</span>
              </label>
            </div>

            <div>
              <label>
                <input type="checkbox" name="user-hobibes" value="gardening" />
                <span>Gardening</span>
              </label>
            </div>

            <div>
              <label>
                <input type="checkbox" name="user-hobbies" value="photography" />
                <span>Photography</span>
              </label>
            </div>

            <div>
              <label>
                <input type="checkbox" name="user-hobbies" value="travel" />
                <span>Travel</span>
              </label>
            </div>

            <div>
              <label>
                <input type="checkbox" name="user-hobbies" value="cinema" />
                <span>Cinema</span>
              </label>
            </div>

            <div>
              <label>
                <input type="checkbox" name="user-hobbies" value="videos-games" />
                <span>Video-Games</span>
              </label>
            </div>

            <div>
              <label>
                <input type="checkbox" name="user-hobbies" value="drawing" />
                <span>Drawing</span>
              </label>
            </div>

            <div>
              <label>
                <input type="checkbox" name="user-hobbies" value="animals" />
                <span>Animals</span>
              </label>
            </div>
          </div>



          <input class="btn-login" type="submit" value="Connexion" />
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