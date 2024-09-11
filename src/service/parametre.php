<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();
require './bdd.php';

if (!isset($_SESSION['user'])) {
    header('Location: ../../assets/index.php');
    exit();
}

$email = $_SESSION['user'];
$user = $collection->findOne(['email' => $email]);

$_SESSION['user_data'] = [
    'firstname' => $user['firstname'],
    'lastname' => $user['lastname'],
    'email' => $user['email'],
    'date_naissance' => date('d/m/Y', $user['date_naissance']->toDateTime()->getTimestamp()),
    'rue' => $user['adresse']['rue'],
    'ville' => $user['adresse']['ville'],
    'code_postal' => $user['adresse']['code_postal'],
    'role'=> $user['role']
];

/*var_dump($user['role']);*/

/*var_dump($_SESSION);*/
//header('Location: ../../assets/parametre.php');
//exit();
if ($_SESSION['user_data']['role'] === 'admin') {
    $allUsersCursor = $collection->find([], ['projection' => ['password' => 0]]);
    $allUsers = iterator_to_array($allUsersCursor);
    $_SESSION['all_users'] = $allUsers;
}

header('Location: ../../assets/parametre.php');
exit();