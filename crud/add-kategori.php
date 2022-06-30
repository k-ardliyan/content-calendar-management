<?php 

require_once '../config/db.php';

$kategori = isset($_POST['inputKategori']) ? $_POST['inputKategori'] : '';

$result = $mysqli->query("INSERT INTO calendar_content_categories (name) VALUES ('$kategori')");

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