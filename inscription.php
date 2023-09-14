<?php 
require('config/setting.php');



    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];


if (isset($name) && isset($email) && isset( $password)){



    $req = $conn->query("SELECT username FROM `users` WHERE username='$name'");
    $chk_pseudo = $req->fetch(PDO::FETCH_ASSOC);
    if(!empty($_POST) && $chk_pseudo == '1' || $chk_pseudo > '1')
    {
        $_SESSION['error_inscription'] = "Le nom d'utilisateur  " . $name . " est déjà utilisé.";
          header("Location: register.php");

    }else{  
        $req = $conn->query("SELECT email FROM `users` WHERE email='$email'");
        $chk_pseudo = $req->fetch(PDO::FETCH_ASSOC);
        if(!empty($_POST) && $chk_pseudo == '1' || $chk_pseudo > '1')
        {
            $_SESSION['error_inscription'] = "L'email " . $email . " est déjà utilisé.";
              header("Location: register.php");
    
        }else{  
            $conn->query("INSERT INTO `users` (`username`, `password`, `email`) VALUES ('$name', '$password', '$email')");

            $_SESSION['username'] = $name;


            header("Location: connected.php");
        }
    }
}


