<?php
$servername = "db";
$username = "root";
$password = "ROOT_PASSWORD";
$dbname = "capteursDB";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname,3306);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

