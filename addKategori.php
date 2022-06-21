<?php 

require_once 'config.php';

$kategori = isset($_POST['inputKategori']) ? $_POST['inputKategori'] : '';

$sqlInsert = "INSERT INTO calendar_content_categories (name) VALUES ('$kategori')";

$result = $mysqli->query($sqlInsert);
$status = 400;
$message = "Failed";

if ($result) {
    $status = 200;
    $message = "Success";
} 

// check if query successful
$status = [
    'status' => $status,
    'message' => $message,
];

echo json_encode($status);


?>