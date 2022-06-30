<?php 

require_once '../config/db.php';

$id = isset($_POST['delKonten']) ? $_POST['delKonten'] : null;

$result = $mysqli->query("DELETE FROM calendar_contents
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