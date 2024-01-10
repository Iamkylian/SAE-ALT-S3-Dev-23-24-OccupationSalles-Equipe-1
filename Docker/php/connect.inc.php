<?php
$servername = "localhost";
$username = "root";
$password = "ROOT_PASSWORD";
$dbname = "capteursDB";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname,9906);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

