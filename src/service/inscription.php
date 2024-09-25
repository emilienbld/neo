<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once 'bdd.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

        if (!$firstname || !$lastname || !$email || !$password) {
        // Redirection en cas d'informations manquantes
        header('Location: ../../assets/index.php?error=2');
        exit();
    }

    $existingUser = $collection->findOne(['email' => $email]);

    if ($existingUser) {
        // Redirection en cas de compte déjà existant
        header('Location: ../../assets/index.php?error=2');
        exit();
    } else {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $newUser = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'password' => $hashedPassword,
            'date_naissance' => new MongoDB\BSON\UTCDateTime(strtotime($date_naissance) * 1000),
            'adresse' => [
                'rue' => $rue,
                'ville' => $ville,
                'code_postal' => $code_postal
            ],
            'role' => 'user',
            'profil_pic' => $profil_pic
        ];

        try {
            $result = $collection->insertOne($newUser);
            if ($result->getInsertedCount() == 1) {
                header('Location: ../../assets/index.php');
                exit();
            } else {
                // Redirection en cas d'erreur lors de l'insertion
                header('Location: ../../assets/index.php?error=2');
                exit();
            }
        } catch (Exception $e) {
            // Redirection en cas d'erreur lors de l'insertion dans la base
            header('Location: ../../assets/index.php?error=2');
            exit();
        }
    }
} else {
    header('Location: ../../assets/index.php');
    exit();
}
