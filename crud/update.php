<?php 

require_once '../config/db.php';

$updateCategory = isset($_POST['updateCategory']) ? $_POST['updateCategory'] : false;
$updateContent = isset($_POST['updateContent']) ? $_POST['updateContent'] : false;
$updatePillar = isset($_POST['updatePillar']) ? $_POST['updatePillar'] : false;

if ($updateCategory == true) {
    $idCategory = isset($_POST['idCategory']) ? $_POST['idCategory'] : '';
    $nameCategory = isset($_POST['nameCategory']) ? $_POST['nameCategory'] : '';
    $nameCategory = str_replace('\'', '&#39;', $nameCategory);
    $nameCategory = str_replace('"', '&#34;', $nameCategory);
    // check same like name category but not same id
    $result = $mysqli->query("SELECT * FROM calendar_content_categories WHERE name = '$nameCategory' AND id != '$idCategory'");
    if ($result->num_rows > 0) {
        $status = 400;
        $message = "Name category already exists";
    } else {
        $result = $mysqli->query("UPDATE calendar_content_categories SET name = '$nameCategory' WHERE id = '$idCategory'");
        if ($result) {
            $status = 200;
            $message = "Success update category";
        } else {
            $status = 400;
            $message = "Failed update category";
        }
    }
} else if ($updatePillar == true) {
    $idPillar = isset($_POST['idPillar']) ? $_POST['idPillar'] : '';
    $namePillar = isset($_POST['namePillar']) ? $_POST['namePillar'] : '';
    $namePillar = str_replace('\'', '&#39;', $namePillar);
    $namePillar = str_replace('"', '&#34;', $namePillar);
    // check same like name pillar but not same id
    $result = $mysqli->query("SELECT * FROM content_pillars WHERE name = '$namePillar' AND id != '$idPillar'");
    if ($result->num_rows > 0) {
        $status = 400;
        $message = "Name pillar already exists";
    } else {
        $result = $mysqli->query("UPDATE content_pillars SET name = '$namePillar' WHERE id = '$idPillar'");
        if ($result) {
            $status = 200;
            $message = "Success update pillar";
        } else {
            $status = 400;
            $message = "Failed update pillar";
        }
    }
}

$status = [
    'status' => $status,
    'message' => $message,
];

echo json_encode($status);

?>