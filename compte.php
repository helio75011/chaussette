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
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/compte.css" />
  <link rel="shortcut icon" href="img/favicon.png" />
  <link rel="stylesheet" href="css/style.css" />

  <title>Chaussette | retrouvé votre paire </title>
</head>

<body class="d-flex flex-column min-vh-100">
<?php include('partials/header.php');?>

  <div class="screen">

    <div class="form-container">
      <div class="form-content">
       
        

<?php   $username = $_SESSION['username']; ?>

              <h3><?= $username; ?></h3>

          


    </div>
  </div>
</body>


    <script src='https://hammerjs.github.io/dist/hammer.min.js'></script>

</body>
</html>
<?php } ?>