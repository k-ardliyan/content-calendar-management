<?php 

require_once '../config/db.php';

$deleteCategory = isset($_POST['deleteCategory']) ? $_POST['deleteCategory'] : false;
$deleteContent = isset($_POST['deleteContent']) ? $_POST['deleteContent'] : false;
$deletePillar = isset($_POST['deletePillar']) ? $_POST['deletePillar'] : false;

if ($deleteCategory == true) {
    $idCategory = isset($_POST['idCategory']) ? $_POST['idCategory'] : '';
    // try catch block to handle error
    try {
        $stmt = $pdo->prepare("DELETE FROM calendar_content_categories WHERE id = :id");
        $stmt->bindParam(':id', $idCategory);
        $stmt->execute();
        $status = 200;
        $message = "Success delete category";
    } catch (PDOException $e) {
        $status = 400;
        $message = "This category is already used in content";
    }
} else if ($deletePillar == true) {
    // try catch block to handle error
    try {
        $stmt = $pdo->prepare("DELETE FROM calendar_content_pillar WHERE id = :id");
        $stmt->bindParam(':id', $_POST['idPillar']);
        $stmt->execute();
        $status = 200;
        $message = "Success delete pillar";
    } catch (PDOException $e) {
        $status = 400;
        $message = "This pillar is already used in content";
    }
} else if ($deleteContent == true) {
    $idContent = isset($_POST['idContent']) ? $_POST['idContent'] : '';
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