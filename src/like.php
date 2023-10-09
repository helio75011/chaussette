<?php
require('config/setting.php'); // Assurez-vous d'inclure votre fichier de configuration

$ID_M = $_POST['ID_M'];
$ID_U = $_SESSION['username'];
$conn->query("INSERT INTO `paire` (`ID_U`, `ID_M`) VALUES ('$ID_U', '$ID_M')");

$data = $conn->prepare("SELECT * FROM `paire` WHERE ID_U='$ID_M' and ID_M='$ID_U'"); 
$data->execute();
$liked = $data->fetchAll(PDO::FETCH_ASSOC);

$response = array();
if (count($liked) == 1) {
    $response['match'] = true;
} else {
    $response['match'] = false;
}

header('Content-Type: application/json');
echo json_encode($response);
?>
