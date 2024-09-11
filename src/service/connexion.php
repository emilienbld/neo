<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require './bdd.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = $collection->findOne(['email' => $email]);

    if ($user && password_verify($password, $user['password'])) {
/*        $_SESSION['user'] = $user['firstname'] . ' ' . $user['lastname'];*/

        $_SESSION['user'] = $user['email'];
/*        var_dump($_SESSION);*/
/*        var_dump($user['role']);*/


        header('Location: parametre.php');
        exit();
    } else {
        header('Location: ../../assets/index.php?error=1');
        exit();
    }
}
