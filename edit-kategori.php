<?php

require_once 'db.php';

$id = isset($_POST['id']) ? $_POST['id'] : null;
$name = isset($_POST['name']) ? $_POST['name'] : null;

$result = $mysqli->query("UPDATE calendar_content_categories SET name = $name WHERE id = $id");

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