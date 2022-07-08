<?php 

require_once '../config/db.php';

$deleteCategory = isset($_POST['deleteCategory']) ? $_POST['deleteCategory'] : false;
$deleteContent = isset($_POST['deleteContent']) ? $_POST['deleteContent'] : false;
$deletePillar = isset($_POST['deletePillar']) ? $_POST['deletePillar'] : false;

if ($deleteCategory == true) {
    $idCategory = isset($_POST['idCategory']) ? $_POST['idCategory'] : '';
    $stmt = $pdo->prepare("DELETE FROM calendar_content_categories WHERE id = :id");
    $stmt->bindParam(':id', $idCategory);
    $result = $stmt->execute();
    if ($result) {
        $status = 200;
        $message = "Success delete category";
    } else {
        $status = 400;
        $message = "Failed delete category";
        
    }
} else if ($deletePillar == true) {
    $idPillar = isset($_POST['idPillar']) ? $_POST['idPillar'] : '';
    $stmt = $pdo->prepare("DELETE FROM content_pillars WHERE id = :id");
    $stmt->bindParam(':id', $idPillar);
    $result = $stmt->execute();
    if ($result) {
        $status = 200;
        $message = "Success delete pillar";
    } else {
        $status = 400;
        $message = "Failed delete pillar";
    }
} else if ($deleteContent == true) {
    $idContent = isset($_POST['idContent']) ? $_POST['idContent'] : '';
    // with cascade on table calendar_content_revisions
    $stmt = $pdo->prepare("DELETE FROM calendar_contents WHERE id = :id");
    $stmt->bindParam(':id', $idContent);
    $result = $stmt->execute();
    if ($result) {
        $status = 200;
        $message = "Success delete content";
    } else {
        $status = 400;
        $message = "Failed delete content";
    }
}

$status = [
    'status' => $status,
    'message' => $message,
];

echo json_encode($status);

$pdo = null;

?>