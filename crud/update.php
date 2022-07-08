<?php 

require_once '../config/db.php';

session_start();

$updateCategory = isset($_POST['updateCategory']) ? $_POST['updateCategory'] : false;
$updateContent = isset($_POST['updateContent']) ? $_POST['updateContent'] : false;
$updatePillar = isset($_POST['updatePillar']) ? $_POST['updatePillar'] : false;

if ($updateCategory == true) {
    $idCategory = isset($_POST['idCategory']) ? $_POST['idCategory'] : '';
    $nameCategory = isset($_POST['nameCategory']) ? $_POST['nameCategory'] : '';
    $nameCategory = str_replace('\'', '&#39;', $nameCategory);
    $nameCategory = str_replace('"', '&#34;', $nameCategory);
    // check same like name category but not same id
    $stmt = $pdo->prepare("SELECT * FROM calendar_content_categories WHERE name = :name AND id != :id");
    $stmt->bindParam(':name', $nameCategory);
    $stmt->bindParam(':id', $idCategory);
    $stmt->execute();
    $result = $stmt->fetchAll();
    if (count($result) > 0) {
        $status = 400;
        $message = "Same name category";
    } else {
        $stmt = $pdo->prepare("UPDATE calendar_content_categories SET name = :name WHERE id = :id");
        $stmt->bindParam(':name', $nameCategory);
        $stmt->bindParam(':id', $idCategory);
        $result = $stmt->execute();
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
    $stmt = $pdo->prepare("SELECT * FROM content_pillars WHERE name = :name AND id != :id");
    $stmt->bindParam(':name', $namePillar);
    $stmt->bindParam(':id', $idPillar);
    $stmt->execute();
    $result = $stmt->fetchAll();
    if (count($result) > 0) {
        $status = 400;
        $message = "Same name pillar";
    } else {
        $stmt = $pdo->prepare("UPDATE content_pillars SET name = :name WHERE id = :id");
        $stmt->bindParam(':name', $namePillar);
        $stmt->bindParam(':id', $idPillar);
        $result = $stmt->execute();
        if ($result) {
            $status = 200;
            $message = "Success update pillar";
        } else {
            $status = 400;
            $message = "Failed update pillar";
        }
    }
} else if ($updateContent == true) {
    $idContent = isset($_POST['idContent']) ? $_POST['idContent'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $url = isset($_POST['url']) ? $_POST['url'] : '';
    $content = isset($_POST['content']) ? $_POST['content'] : '';
    $copywriting = isset($_POST['copywriting']) ? $_POST['copywriting'] : '';
    $status = isset($_POST['status']) ? $_POST['status'] : '';
    $date = isset($_POST['date']) ? $_POST['date'] : '';
    $time = isset($_POST['time']) ? $_POST['time'] : '';
    $revision = isset($_POST['revision']) ? $_POST['revision'] : '';
    $content_pillar_id = isset($_POST['pillar']) ? $_POST['pillar'] : '';
    $team_id = isset($_POST['team']) ? $_POST['team'] : '';
    $calendar_content_category_id = isset($_POST['category']) ? $_POST['category'] : '';
    
    $stmt = $pdo->prepare("UPDATE calendar_contents SET name = :name, url = :url, content = :content, copywriting = :copywriting, status = :status, date = :date, time = :time, content_pillar_id = :content_pillar_id, team_id = :team_id, calendar_content_category_id = :calendar_content_category_id WHERE id = :id");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':url', $url);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':copywriting', $copywriting);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':time', $time);
    $stmt->bindParam(':content_pillar_id', $content_pillar_id);
    $stmt->bindParam(':team_id', $team_id);
    $stmt->bindParam(':calendar_content_category_id', $calendar_content_category_id);
    $stmt->bindParam(':id', $idContent);
    $result = $stmt->execute();
    if ($result) {
        $status = 200;
        $message = "Success update content";
    } else {
        $status = 400;
        $message = "Failed update content";
    }

    if ($status == 200 && $_SESSION['role_id'] != 3) {  
        //check apakah ada revisi sebelumnya
        $stmt = $pdo->prepare("SELECT * FROM calendar_content_revisions WHERE calendar_content_id = :id");
        $stmt->bindParam(':id', $idContent);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if (count($result) > 0) {
            $stmt = $pdo->prepare("UPDATE calendar_content_revisions SET revision = :revision, team_id = :team_id WHERE calendar_content_id = :id");
            $stmt->bindParam(':revision', $revision);
            $stmt->bindParam(':team_id', $_SESSION['team_id']);
            $stmt->bindParam(':id', $idContent);
            $result = $stmt->execute();
            if($result) {
                $status = 200;
                $message = "Success update revision";
            } else {
                $status = 400;
                $message = "Failed update revision";
            }
        } else {
            $stmt = $pdo->prepare("INSERT INTO calendar_content_revisions (calendar_content_id, revision, team_id) VALUES (:id, :revision, :team_id)");
            $stmt->bindParam(':id', $idContent);
            $stmt->bindParam(':revision', $revision);
            $stmt->bindParam(':team_id', $_SESSION['team_id']);
            $result = $stmt->execute();
            if($result) {
                $status = 200;
                $message = "Success insert revision";
            } else {
                $status = 400;
                $message = "Failed insert revision";
            }
        }
    }
}

$status = [
    'status' => $status,
    'message' => $message,
];

echo json_encode($status);

$pdo = null;

?>