<?php 

require_once '../config/db.php';

$pillar = isset($_POST['inputPillar']) ? $_POST['inputPillar'] : null;

// handle quote ' and "
$pillar = str_replace('\'', '&#39;', $pillar);
$pillar = str_replace('"', '&#34;', $pillar);

$result = $mysqli->query("INSERT INTO content_pillars (name) VALUES ('$pillar')");

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