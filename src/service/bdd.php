<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require '../../vendor/autoload.php';

try {
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $collection = $client->projet_arrivee->users;
/*    echo "Connexion réussie.<br>";*/
} catch (Exception $e) {
    echo "Erreur de connexion à MongoDB : " . $e->getMessage();
    die();
}
