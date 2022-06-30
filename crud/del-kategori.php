<?php

require_once '../config/db.php';

$id = isset($_POST['delKategori']) ? $_POST['delKategori'] : null;

$result = $mysqli->query("DELETE FROM calendar_content_categories
                        WHERE id = '$id'");

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