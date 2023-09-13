<?php

require('config.php');
session_start();
if (isset($_POST['username']) && isset($_POST['password'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
    $query = "SELECT * FROM `users` WHERE username='$username' and password='$password'";
  $result = mysqli_query($conn,$query);
  $rows = mysqli_num_rows($result);
  if($rows==1){
      $_SESSION['username'] = $username;
      $role = "SELECT 'role' FROM `users` WHERE username='$username' and password='$password'";
      $_SESSION['role'] = $role;
      if($_SESSION == 'admin'){
        header("Location: admin.php");
      }else{
      header("Location: connected.php");
      }
  }else{
    $_SESSION['error_connexion'] = "Le nom d'utilisateur ou le mot de passe est incorrect.";
    header("Location: login.php");

  }
}?>
