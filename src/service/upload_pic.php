<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require './bdd.php';
session_start();

if (isset($_FILES['profil_pic']) && $_FILES['profil_pic']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = '../../assets/photo/profil_pic/';

    $fileExtension = pathinfo($_FILES['profil_pic']['name'], PATHINFO_EXTENSION);

    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
        echo "Extension de fichier non valide. Seuls les fichiers JPG, JPEG, PNG et GIF sont acceptés.";
        exit();
    }

    $uniqueFileName = uniqid() . '.' . $fileExtension;

    $uploadFile = $uploadDir . $uniqueFileName;

    if (move_uploaded_file($_FILES['profil_pic']['tmp_name'], $uploadFile)) {
        $collection = (new MongoDB\Client)->projet_arrivee->users;

        $email = $_SESSION['user_data']['email'];

        $collection->updateOne(
            ['email' => $email],
            ['$set' => ['profil_pic' => $uniqueFileName]]
        );

        $_SESSION['user_data']['profil_pic'] = $uniqueFileName;

        header('Location: ../../assets/parametre/parametre.php');
        exit();
    } else {
        echo "Erreur lors du téléversement de l'image.";
    }
} else {
    echo "Aucun fichier téléchargé ou erreur de téléchargement.";
}

