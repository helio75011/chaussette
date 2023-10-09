<?php


require('config/setting.php');

// Vérification si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


$username = $_SESSION['username'];
  // Récupération des informations du compte à modifier
  $data=$conn->prepare("SELECT * FROM users WHERE username=:i");
  $data->execute([":i" => "$username"]);
  $users= $data->fetch(PDO::FETCH_ASSOC);


// var_dump($_FILES['visuel']['name']);
// Vérification si une image a été téléchargée
if (!empty($_FILES['visuel']['name'])){
    // Suppression de l'ancienne image dans le dossier
    if (file_exists($users['image'])) {
      unlink($users['image']);
    }
    
    $uploadedFile = $_FILES['visuel'];
  
    // Déplacement de la nouvelle image
    $uploadDir = 'images/';
    $fileName = uniqid() . '_' . $_FILES['visuel']['name'];
    $uploadFile = $uploadDir . $fileName;
    move_uploaded_file($uploadedFile['tmp_name'], $uploadFile);
    $fileName = 'images/' . $fileName;
    $visuel = $fileName;
  } else {
    $visuel = $users['image'];
  }
  




if(!empty($_POST['password'])){

  // Mise à jour des informations dans la base de données

  $data = $conn->prepare('UPDATE users SET username = :u, password = :p, email = :e, couleur = :c, marque = :m, taille = :t, image = :i, description = :d WHERE username = :a');
  $data->execute([
    ':a' => $username,
      ':u' => $_POST['name'],
      ':p' => $_POST['password'],
      ':e' => $_POST['email'],
      ':c' => $_POST['couleur'],
      ':m' => $_POST['marque'],
      ':t' => $_POST['taille'],
      ':i' => $visuel,
      ':d' => $_POST['description']
  ]);
}else{
     // Mise à jour des informations dans la base de données

  $data = $conn->prepare('UPDATE users SET username = :u, email = :e, couleur = :c, marque = :m, taille = :t, image = :i, description = :d WHERE username = :a');
  $data->execute([
    ':a' => $username,
      ':u' => $_POST['name'],
      ':e' => $_POST['email'],
      ':c' => $_POST['couleur'],
      ':m' => $_POST['marque'],
      ':t' => $_POST['taille'],
      ':i' => $visuel,
      ':d' => $_POST['description']
  ]);
}

$_SESSION['username'] = $_POST['name'];
  // Redirection vers l'accueil
  header('Location: compte.php');
  exit;
} else {

  // Récupération des informations du jeu vidéo à modifier
  $data=$conn->prepare("SELECT * FROM users WHERE username=:i");
  $data->execute([":i" => "$username"]);
  $users= $data->fetch(PDO::FETCH_ASSOC);
}
?>