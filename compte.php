<?php require('config/setting.php');

if (empty($_SESSION['username'])) {
  header("Location: login.php");
} else {
?>
  <!DOCTYPE html>
  <html>


  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/compte.css" />
    <link rel="shortcut icon" href="img/favicon.png" />
    <link rel="stylesheet" href="css/style.css" />


    <link rel="shortcut icon" href="img/favicon.png" />
    <link rel="stylesheet" href="css/all.min.css">
    <title>Chaussette | retrouvé votre paire </title>
  </head>

  <body class="d-flex flex-column min-vh-100">
    <?php include('partials/header.php'); ?>


    <div class="screen">
      <div class="form-container">
        <div class="form-content">
          <h2>Mon compte</h2>

          <?php $username = $_SESSION['username']; ?>


          <section id="container--match">
            <!-- recuperer toutes les paires qui nous ont like -->
            <?php $data = $conn->prepare("SELECT * FROM users WHERE username=:y");
            $data->execute([
              ":y" => "$username"
            ]);
            $users = $data->fetch(PDO::FETCH_ASSOC);
            ?>



            <h3>Modifier votre compte</h3>

            <?php
            if (isset($_SESSION['error_inscription'])) { ?>
              <p>
                <?php echo $_SESSION['error_inscription']; ?>
              </p>
            <?php } ?>
            <form action="modifier.php" method="POST" enctype="multipart/form-data">
              <h3>Modifier vos informations personnel</h3>
              <div class="main-informations">
                <label for="name">
                  <input type="text" id="name" placeholder="Pseudo" value="<?= $users['username'] ?>" name="name" required />
                </label>
                <label for="email">
                  <input type="email" id="email" placeholder="Mail" value="<?= $users['email'] ?>" name="email" required />
                </label>
                <label for="password">
                  <input type="password" id="password" placeholder="Mot de passe" name="password" />
                </label>
                <label for="description">
                  <input type="text" id="description" value="<?= $users['description'] ?>" placeholder="Description" name="description" required />
                </label> <br>

                <label for="visuel">
                  <h4>Photo de profil :</h4>
                </label>
                <div style=" display: flex; column-gap: 20px;  width: 80%;
    margin-left: 10%; align-items: center;">
                  <figure>
                    <img style="
    border-radius: 20px; max-width: 100px;
" src=<?= $users['image'] ?> alt="#">
                  </figure>
                  <input style="    height: 10%;" type="file" class="form-control" id="visuel" name="visuel" />
                </div>
              </div>





              <h4>Couleur :</h4>
              <div class="hobbies radio" id="couleurContainer">
                <?php
                $data = $conn->prepare('SELECT * FROM couleur');
                $data->execute();
                $couleurs = $data->fetchAll(PDO::FETCH_ASSOC);

                foreach ($couleurs as $couleur) :
                ?>
                  <div>
                    <label for="<?= $couleur['couleur']; ?>">
                      <input id="<?= $couleur['couleur']; ?>" type="radio" name="couleur" <?php if ($couleur['couleur'] == $users['couleur']) { ?> checked <?php }; ?> value="<?= $couleur['couleur']; ?>" required />
                      <span>
                        <?= $couleur['couleur']; ?>
                      </span>
                    </label>
                  </div>
                <?php endforeach; ?>
              </div>
              <div>
                <div class="newColor">
                  <label for="newColor">
                    <input type="text" id="newColor" class="newC" placeholder="Ajoutez" name="newColor" />
                  </label>
                  <button type="button" class="newColorb" onclick="ajouterCouleur()">+</button>
                </div>
              </div>

              <h4>Marque :</h4>
              <div class="hobbies radio" id="marqueContainer">
                <?php
                $data = $conn->prepare('SELECT * FROM marque');
                $data->execute();
                $marques = $data->fetchAll(PDO::FETCH_ASSOC);

                foreach ($marques as $marque) :
                ?>
                  <div>
                    <label for="<?= $marque['marque']; ?>">
                      <input id="<?= $marque['marque']; ?>" <?php if ($marque['marque'] == $users['marque']) { ?> checked <?php }; ?> type="radio" name="marque" value="<?= $marque['marque']; ?>" required />
                      <span>
                        <?= $marque['marque']; ?>
                      </span>
                    </label>
                  </div>
                <?php endforeach; ?>
              </div>

              <div class="newColor">
                <label for="newMarque">
                  <input type="text" id="newMarque" class="newC" placeholder="Ajoutez" name="newMarque" />
                </label>
                <button type="button" class="newColorb" onclick="ajouterMarque()">+</button>
              </div>



              <h4>Taille :</h4>
              <div class="hobbies radio" id="tailleContainer">
                <?php
                $data = $conn->prepare('SELECT * FROM taille');
                $data->execute();
                $tailles = $data->fetchAll(PDO::FETCH_ASSOC);

                foreach ($tailles as $taille) :
                ?>
                  <div>
                    <label for="<?= $taille['taille']; ?>">
                      <input id="<?= $taille['taille']; ?>" <?php if ($taille['taille'] == $users['taille']) { ?> checked <?php }; ?> type="radio" name="taille" value="<?= $taille['taille']; ?>" required />
                      <span>
                        <?= $taille['taille']; ?>
                      </span>
                    </label>
                  </div>
                <?php endforeach; ?>
              </div>

              <div class="newColor">
                <label for="newTaille">
                  <input type="text" id="newTaille" class="newC" placeholder="Ajoutez" name="newTaille" />
                </label>
                <button type="button" class="newColorb" onclick="ajouterTaille()">+</button>
              </div>




              <input class="btn-login" type="submit" value="Modifier" />
            </form>


            <?php
            // function delete_account($username)
            // {
            //   global $conn;
            //   $suppression = $conn->prepare("DELETE FROM users WHERE username = :username");
            //   $suppression->bindParam(':username', $username, PDO::PARAM_STR);
            //   $suppression->execute();
            // }
            // if (isset($_GET['action']) && $_GET['action'] == 'quitter' && !empty($_GET['username'])) {
            //   print_r($_GET['username']);
            //   delete_account($_GET['username']);
            //   session_destroy();
            //   $_SESSION['message'] = '<div class="alert alert-success">L\'user n°' . $_GET['username'] . ' a bien été supprimé.</div>';
            //   header('location: login.php');
            // }


            ?>

            <a href="delete.php" class="btn_supp" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce compte?');">Supprimer mon compte</a>


        </div>
      </div>
    </div>
  </body>
  <script>
    function ajouterCouleur() {
      var newColorInput = document.getElementById('newColor');
      var newColor = newColorInput.value.trim();

      if (newColor !== '') {
        var couleurContainer = document.getElementById('couleurContainer');

        // Vérifiez d'abord si un bouton radio avec la même valeur existe
        var existingRadio = couleurContainer.querySelector('input[type="radio"][value="' + newColor + '"]');

        if (!existingRadio) {
          // S'il n'existe pas, ajoutez-le
          var div = document.createElement('div');
          div.innerHTML = `
                <label for="${newColor}">
                    <input id="${newColor}" type="radio" name="couleur" value="${newColor}" checked />
                    <span>${newColor}</span>
                </label>
            `;
          couleurContainer.appendChild(div);
        } else {
          // S'il existe déjà, sélectionnez-le
          existingRadio.checked = true;
        }

        // Effacer le champ de saisie
        newColorInput.value = '';
      } else {
        alert("Veuillez entrer une couleur valide.");
      }
    }

    // Faites de même pour les fonctions ajouterMarque et ajouterTaille en utilisant les mêmes principes.
  </script>

  <script>
    function ajouterMarque() {
      var newMarqueInput = document.getElementById('newMarque');
      var newMarque = newMarqueInput.value.trim();

      if (newMarque !== '') {
        var marqueContainer = document.getElementById('marqueContainer');

        // Vérifiez d'abord si un bouton radio avec la même valeur existe
        var existingRadio = marqueContainer.querySelector('input[type="radio"][value="' + newMarque + '"]');

        if (!existingRadio) {
          // S'il n'existe pas, ajoutez-le
          var div = document.createElement('div');
          div.innerHTML = `
                <label for="${newMarque}">
                    <input id="${newMarque}" type="radio" name="marque" value="${newMarque}" checked />
                    <span>${newMarque}</span>
                </label>
            `;
          marqueContainer.appendChild(div);
        } else {
          // S'il existe déjà, sélectionnez-le
          existingRadio.checked = true;
        }

        // Effacer le champ de saisie
        newMarqueInput.value = '';
      } else {
        alert("Veuillez entrer une marque valide.");
      }
    }

    // Faites de même pour les fonctions ajouterMarque et ajouterTaille en utilisant les mêmes principes.
  </script>

  <script>
    function ajouterTaille() {
      var newTailleInput = document.getElementById('newTaille');
      var newTaille = newTailleInput.value.trim();

      if (newTaille !== '') {
        var tailleContainer = document.getElementById('tailleContainer');

        // Vérifiez d'abord si un bouton radio avec la même valeur existe
        var existingRadio = tailleContainer.querySelector('input[type="radio"][value="' + newTaille + '"]');

        if (!existingRadio) {
          // S'il n'existe pas, ajoutez-le
          var div = document.createElement('div');
          div.innerHTML = `
                <label for="${newTaille}">
                    <input id="${newTaille}" type="radio" name="taille" value="${newTaille}" checked />
                    <span>${newTaille}</span>
                </label>
            `;
          tailleContainer.appendChild(div);
        } else {
          // S'il existe déjà, sélectionnez-le
          existingRadio.checked = true;
        }

        // Effacer le champ de saisie
        newTailleInput.value = '';
      } else {
        alert("Veuillez entrer une taille valide.");
      }
    }

    // Faites de même pour les fonctions ajouterMarque et ajouterTaille en utilisant les mêmes principes.
  </script>


  </html>
<?php } ?>