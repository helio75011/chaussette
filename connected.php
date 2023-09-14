<?php require ('config/setting.php');

 if(empty($_SESSION['username'])){
    header("Location: login.php");
}
else{
?>
<!DOCTYPE html>
<html>
<head>
  <?php include('partials/head.php')?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Site de Recettes - Page d'accueil</title>
  <link rel="stylesheet" href="css/card.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"> -->
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
</head>
<body class="d-flex flex-column min-vh-100">
    <?php include('partials/header.php');?>
    <div class="tinder">
      <div class="tinder--status">
        <i class="fa fa-remove"></i>
        <i class="fa fa-heart"></i>
      </div>
      <?php
          $data = $conn->prepare("SELECT * FROM users WHERE NOT username = :i");        
          $data->execute([':i' => $_SESSION['username']]);
          $socks = $data->fetchAll(PDO::FETCH_ASSOC);
      ?>
      <div class="tinder--cards">
        <?php 
        foreach ($socks as $sock): ?>
        
        <div class="tinder--card overflow-auto" ID_M="<?= $sock['username']; ?>">
        
              <figure>
                <img src=<?=$sock['image']?> alt="">
              </figure>
              <h3><?= $sock['username']; ?></h3>
              <?php if(!empty($sock['taille']) || !empty($sock['couleur']) || !empty($sock['marque'])): ?>
              <div class="info">
                <?php if( !empty($sock['taille']) ) : ?>
                  <p><i class="fa-solid fa-ruler"></i><?=$sock['taille'];?></p>
                <?php endif ?>
                <?php if( !empty($sock['couleur']) ) : ?>
                  <p class="color"><?=$sock['couleur'];?></p>
                <?php endif ?>
                <?php if( !empty($sock['marque']) ) : ?>
                  <p><?=$sock['marque'];?></p>
                <?php endif ?>
              </div>
              <?php if( !empty($sock['description']) ) : ?>
                <p class="description"><?=$sock['description'];?></p>
              <?php endif ?>
              <?php endif?>
          </div>
        <?php endforeach;?>
      </div>

      <div class="tinder--buttons">
        <button id="nope"><i class="fa fa-remove"></i></button>
        <button id="love"><i class="fa fa-heart"></i></button>
      </div>
    </div>

    <script src='https://hammerjs.github.io/dist/hammer.min.js'></script>
    <script  src="js/card.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>
<?php } ?>