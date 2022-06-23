<?php 

require_once 'db.php';

$id = isset($_POST['delPillar']) ? $_POST['delPillar'] : null;

$result = $mysqli->query("DELETE FROM content_pillars
                        WHERE id = '$id'");

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