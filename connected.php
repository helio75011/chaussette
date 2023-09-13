
<?php session_start();
 if(empty($_SESSION['username'])){
    header("Location: login.php");
}
else{
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Page d'accueil</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

    <!-- Navigation -->

    <!-- Inclusion du formulaire de connexion -->
        <h1>Site de Recettes !</h1>
        <div class="user-widget">
  <?php if( isset($_SESSION['username']) && $_SESSION['username'] !== null ) : ?>
    <a href="logout.php">Se déconnecter</a>
  <?php else : ?>
    <a href="login.php">Se connecter</a>
  <?php endif; ?>
</div>
        <!-- Si l'utilisateur existe, on affiche les recettes -->
       
    </div>

</body>
</html>
<?php } ?>