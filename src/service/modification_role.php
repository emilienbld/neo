<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
/*session_start();*/
require './bdd.php';

if (!isset($_SESSION['user_data']) || $_SESSION['user_data']['role'] !== 'admin') {
    header('Location: ../../assets/index.php');
    exit();
}

// Récupérer l'ID de l'utilisateur et le nouveau rôle
$userId = $_POST['user_id'];
$newRole = $_POST['role'];

// Vérifier si l'utilisateur existe
$user = $collection->findOne(['_id' => new MongoDB\BSON\ObjectId($userId)]);

if ($user) {
    // Mettre à jour le rôle de l'utilisateur
    $collection->updateOne(
        ['_id' => new MongoDB\BSON\ObjectId($userId)],
        ['$set' => ['role' => $newRole]]
    );
}

header('Location: ../../assets/parametre.php');
exit();
?>