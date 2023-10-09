<?php
require ('config/setting.php');

if (isset($_POST['username']) && isset($_POST['password'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $data = $conn->prepare("SELECT * FROM `users` WHERE username='$username' and password='$password'"); 
  $data->execute();
  $users = $data->fetchAll(PDO::FETCH_ASSOC);
  if(count($users)==1){
      $_SESSION['username'] = $username;


    
      header("Location: connected.php");
 
  }else{
    $_SESSION['error_connexion'] = "Le nom d'utilisateur ou le mot de passe est incorrect.";
    header("Location: login.php");

  }
}?>
