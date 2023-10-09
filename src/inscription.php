<?php
require('config/setting.php');



$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$couleur = $_POST['couleur'];
$marque = $_POST['marque'];
$taille = $_POST['taille'];
$description = $_POST['description'];


if (!empty($_POST) && isset($name) && isset($email) && isset($password)) {



    $req = $conn->query("SELECT username FROM `users` WHERE username='$name'");
    $chk_pseudo = $req->fetch(PDO::FETCH_ASSOC);
    if ($chk_pseudo == '1' || $chk_pseudo > '1') {
        $_SESSION['error_inscription'] = "Le nom d'utilisateur  " . $name . " est déjà utilisé.";
        header("Location: register.php");

    } else {
        $req = $conn->query("SELECT email FROM `users` WHERE email='$email'");
        $chk_mail = $req->fetch(PDO::FETCH_ASSOC);
        if ($chk_mail == '1' || $chk_mail > '1') {
            $_SESSION['error_inscription'] = "L'email " . $email . " est déjà utilisé.";
            header("Location: register.php");

        } else {
            $req = $conn->query("SELECT couleur FROM `couleur` WHERE couleur='$couleur'");
            $chk_couleur = $req->fetch(PDO::FETCH_ASSOC);
            if ($chk_couleur == '0') {
                $conn->query("INSERT INTO `couleur` (`couleur`) VALUES ('$couleur')");
            }

            $req = $conn->query("SELECT marque FROM `marque` WHERE marque='$marque'");
            $chk_marque = $req->fetch(PDO::FETCH_ASSOC);
            if ($chk_marque == '0') {
                $conn->query("INSERT INTO `marque` (`marque`) VALUES ('$marque')");
            }

            $req = $conn->query("SELECT taille FROM `taille` WHERE taille='$taille'");
            $chk_taille = $req->fetch(PDO::FETCH_ASSOC);
            if ($chk_taille == '0') {
                $conn->query("INSERT INTO `taille` (`taille`) VALUES ('$taille')");
            }

            $uploadedFile = $_FILES['visuel'];
            $fileName = uniqid() . '_' . $_FILES['visuel']['name'];
            
            // Déplacement du fichier téléchargé
            $uploadDir = 'images/';
            $uploadFile = $uploadDir . $fileName;
            move_uploaded_file($uploadedFile['tmp_name'], $uploadFile);
            $fileName = 'images/' . $fileName;
            
	//on cree une requete d'insertion dans la base
	$insert = $conn->prepare('INSERT INTO users (username, password, email, couleur, marque, taille, image, description) VALUES (:u, :p, :e, :c, :m, :t, :i, :d) ');
	$insert->execute([
		':u' => $_POST['name'],
		':p' => $_POST['password'],
		':e' => $_POST['email'],
		':c' => $_POST['couleur'],
		':m' => $_POST['marque'],
		':t' => $_POST['taille'],
		':i' => $fileName,
		':d' => $_POST['description']
	]);
         $_SESSION['username'] = $name;
            header("Location: connected.php");
}
    }


}