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
        // var_dump("SELECT * FROM users WHERE username NOT IN 'test'");
          $data = $conn->prepare("SELECT * FROM users WHERE NOT username='$_SESSION['username']'"); 
          $data->execute();
          $socks = $data->fetchAll(PDO::FETCH_ASSOC);
      ?>
      <div class="tinder--cards">
        <?php 
        foreach ($socks as $sock): 
          $is_compatible = $sock['taille'] == $current_user['taille'] && $sock['couleur'] == $current_user['couleur'] && $sock['marque'] == $current_user['marque']; 
        ?>
          <div class="tinder--card overflow-auto">
            <?php if($is_compatible): ?>
            <p class="compatible">Compatible</p>
            <?php endif; ?>
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

</body>
</html>
<?php } ?>