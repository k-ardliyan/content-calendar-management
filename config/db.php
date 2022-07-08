<?php 

// Create Connection Database with PDO
$host = "localhost";
$username = "root";
$password = "";
$dbname = "ccm";
// try catch block to handle error
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

?>