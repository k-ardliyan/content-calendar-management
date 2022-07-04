<?php

require_once '../config/db.php';

$id = isset($_POST['idKategori']) ? $_POST['idKategori'] : null;
$name = isset($_POST['nameKategori']) ? $_POST['nameKategori'] : null;

$name = str_replace('\'', '&#39;', $name);
$name = str_replace('"', '&#34;', $name);

$result = $mysqli->query("UPDATE calendar_content_categories SET name = '$name' WHERE id = '$id'");

$status = 400;
$message = "Failed";

if ($result) {
    $status = 200;
    $message = "Success";
} 

$status = [
    'status' => $status,
    'message' => $message,
];

echo json_encode($status);
            
?>