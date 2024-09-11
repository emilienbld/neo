<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();
require './bdd.php';

if (!isset($_SESSION['user']) || $_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: ../../assets/index.php');
    exit();
}

$email = $_SESSION['user'];
$field = $_POST['field'];

if ($field === 'password') {
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];
/*    var_dump($currentPassword, $newPassword, $confirmPassword);*/

    $user = $collection->findOne(['email' => $email]);

    if (!$user || !password_verify($currentPassword, $user['password'])) {
        header('Location: ../../assets/parametre.php?error=1');
        exit();
    }

    if ($newPassword !== $confirmPassword) {
        header('Location: ../../assets/parametre.php?error=2');
        exit();
    }

    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $collection->updateOne(
        ['email' => $email],
        ['$set' => ['password' => $hashedPassword]]
    );

    $_SESSION['user_data']['password'] = $hashedPassword;
/*    header('Location: ../../assets/parametre.php?success=1');*/
    exit();

} else {
    $value = $_POST['value'];

    switch ($field) {
        case 'firstname':
        case 'lastname':
        case 'email':
        case 'date_naissance':
            $collection->updateOne(
                ['email' => $email],
                ['$set' => [$field => $value]]
            );
            break;

        case 'rue':
        case 'ville':
        case 'code_postal':
            $collection->updateOne(
                ['email' => $email],
                ['$set' => ['adresse.' . $field => $value]]
            );
            break;
    }

}
$user = $collection->findOne(['email' => $email]);

$_SESSION['user_data'] = [
    'firstname' => $user['firstname'],
    'lastname' => $user['lastname'],
    'email' => $user['email'],
    'date_naissance' => date('d/m/Y', $user['date_naissance']->toDateTime()->getTimestamp()),
    'rue' => $user['adresse']['rue'],
    'ville' => $user['adresse']['ville'],
    'code_postal' => $user['adresse']['code_postal']
];
header('Location: ../../assets/parametre.php?success=1');
exit();
