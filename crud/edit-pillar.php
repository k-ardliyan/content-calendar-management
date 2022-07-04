<?php 

require_once '../config/db.php';

$id = isset($_POST['idPillar']) ? $_POST['idPillar'] : null;
$name = isset($_POST['namePillar']) ? $_POST['namePillar'] : null;

// handle quote ' and "
$name = str_replace('\'', '&#39;', $name);
$name = str_replace('"', '&#34;', $name);

$result = $mysqli->query("UPDATE content_pillars SET name = '$name' WHERE id = '$id'");

if ($result) {
    $status = 200;
    $message = "Success";
} else {
    $status = 400;
    $message = "Failed";
}

$status = [
    'status' => $status,
    'message' => $message,
];

echo json_encode($status);

?>