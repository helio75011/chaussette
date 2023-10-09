<?php require('config/setting.php');

if (empty($_SESSION['role']) || empty($_SESSION['username']) ) {
    header('Location: index.php');
    exit;
}

$errors = [];

function cleanFileName($filename) {
    $sanitized = preg_replace('/[^a-zA-Z0-9-_\.]/', '_', $filename); 
    return $sanitized;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $marque_id = $_POST['marque_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $size_id = $_POST['size_id'];

    if (empty($title)) {
        $errors[] = 'Veuillez entrer un titre.';
    }

    if (empty($description)) {
        $errors[] = 'Veuillez entrer une description.';
    }


    // Ajoutez des vérifications supplémentaires pour les autres champs si nécessaire

    $photoPath = null; // Par défaut, aucun chemin d'image

    // Si une image est fournie, la traiter
    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
        $uploadDir = 'uploads/';
        // Utilisez cette fonction pour nettoyer le nom du fichier avant de le déplacer
        $uploadFile = $uploadDir . cleanFileName(basename($_FILES['image']['name']));
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            $photoPath = $uploadFile;
        } else {
            $errors[] = "Erreur lors de l'upload de l'image.";
        }
    }

    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO models (marque_id, title, description, size_id, photo_path) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$marque_id, $title, $description, $size_id, $photoPath]);
        
        header('Location: admin.php');
        exit();
    }
}

if (isset($_GET['delete_model'])) {
    $modelId = intval($_GET['delete_model']);
    $stmt = $conn->prepare("DELETE FROM models WHERE id = ?");
    $stmt->execute([$modelId]);

    header('Location: admin.php');
    exit();
}

$marques = $conn->query("SELECT * FROM marques")->fetchAll();
$sizes = $conn->query("SELECT * FROM sizes")->fetchAll();
$modelsQuery = $conn->query("SELECT models.*, marques.name as marque_name, sizes.size_name as size_name FROM models JOIN marques ON models.marque_id = marques.id JOIN sizes ON models.size_id = sizes.id");
$models = $modelsQuery->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un modèle</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Bienvenue, <?php echo $_SESSION['username']; ?></h1>

    <form action="logout.php" method="post">
        <input type="submit" value="Déconnexion">
    </form>

    <form action="" method="post" enctype="multipart/form-data">

        <?php if (!empty($errors)): ?>
        <div class="error-messages">
           <ul>
            <?php foreach ($errors as $error): ?>
               <li><?= $error ?></li>
            <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>

        <div>
            <label for="marque">Marques:</label>
            <select name="marque_id" id="marque">
                <?php foreach ($marques as $marque): ?>
                    <option value="<?= $marque['id'] ?>"><?= $marque['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="image">Image du modèle:</label>
            <input type="file" name="image" id="image">
        </div>
        <div>
            <label for="title">Titre:</label>
            <input type="text" name="title" id="title">
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description"></textarea>
        </div>
        <div>
            <label for="size">Taille:</label>
            <select name="size_id" id="size">
                <?php foreach ($sizes as $size): ?>
                    <option value="<?= $size['id'] ?>"><?= $size['size_name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <input type="submit" value="Ajouter">
        </div>
    </form>

    <div class="container" id="affichage">

       <h2>Modèles ajoutés:</h2>

        <table border="1">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Marque</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Taille</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($models as $model): ?>
                <tr>
                    <td>
                        <?php if ($model['photo_path']): ?>
                        <img src="<?= $model['photo_path'] ?>" alt="Photo du modèle <?= $model['title'] ?>" style="max-width: 100px; max-height: 100px;">
                        <?php else: ?>
                            Pas de photo
                        <?php endif; ?>
                    </td>  
                    <td><?= $model['marque_name'] ?></td>
                    <td><?= $model['title'] ?></td>
                    <td><?= $model['description'] ?></td>
                    <td><?= $model['size_name'] ?></td>
                    <td>
                        <a href="admin.php?delete_model=<?= $model['id'] ?>" style="color: red;" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce modèle?');">Supprimer</a>
                    </td>
               </tr>
               <?php endforeach; ?>
           </tbody>
        </table>
    </div>

</body>
</html>