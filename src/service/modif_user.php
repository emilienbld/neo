<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require './bdd.php';
session_start();

if ($_SESSION['user_data']['role'] != 'admin') {
    header('Location: ../../assets/index.php');
    exit();
}

if (isset($_POST['email']) && isset($_POST['action'])) {
    $email = $_POST['email'];

    if ($_POST['action'] == 'modify_role' && isset($_POST['new_role'])) {
        $newRole = $_POST['new_role'];

        $user = $collection->findOne(['email' => $email]);

        if ($user) {
            $collection->updateOne(
                ['email' => $email],
                ['$set' => ['role' => $newRole]]
            );
            $_SESSION['message'] = "Le rôle de l'utilisateur a été mis à jour avec succès.";
        }

    } elseif ($_POST['action'] == 'delete_user') {
        $user = $collection->findOne(['email' => $email]);

        if ($user) {
            $collection->deleteOne(['email' => $email]);
            $_SESSION['message'] = "L'utilisateur a été supprimé avec succès.";
        }
    }
}

header('Location: ../../assets/parametre.php');
exit();
