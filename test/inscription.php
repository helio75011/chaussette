<?php 
require('config.php');
session_start(); 

if (isset($_POST['name']) && isset($_POST['password']) && isset($_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
      $query = "SELECT * FROM `users` WHERE username='$name'";
    $result = mysqli_query($conn,$query);
    $rows = mysqli_num_rows($result);
    if($rows==0){
        $query = "SELECT * FROM `users` WHERE email='$email'";
        $result = mysqli_query($conn,$query);
        $rows = mysqli_num_rows($result);
        if($rows==0){
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['mdp'] = $password;
            header("Location: inscription_D.php");
        }
        else{
            $_SESSION['error_inscription'] = "L'email " . $email . " est déjà utilisé.";
            header("Location: login.php");
        }
    }else{
        $_SESSION['error_inscription'] = "Le nom d'utilisateur  " . $name . " est déjà utilisé.";
        header("Location: login.php");
    }
 
  }





?>