<?php 

require_once '../config/db.php';

$kategori = isset($_POST['inputKategori']) ? $_POST['inputKategori'] : '';

// handle quote ' and "
$kategori = str_replace('\'', '&#39;', $kategori);
$kategori = str_replace('"', '&#34;', $kategori);

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