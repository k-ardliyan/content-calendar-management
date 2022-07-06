<?php 
// Create Connection to Database MYSQL
$host = "localhost";
$user = "root";
$pass = "";
$db = "ccm";
$mysqli = new mysqli($host, $user, $pass, $db);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>