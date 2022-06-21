<?php 
// Create Connection to Database MYSQL
$host = "localhost";
$user = "root";
$pass = "";
$db = "ccm";
$mysqli = new mysqli($host, $user, $pass, $db);
if($mysqli->connect_error) {
    exit('Could not connect');
}
?>