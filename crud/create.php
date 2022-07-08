<?php 

require_once '../config/db.php';

$addCategory = isset($_POST['addCategory']) ? $_POST['addCategory'] : false;
$addContent = isset($_POST['addContent']) ? $_POST['addContent'] : false;
$addPillar = isset($_POST['addPillar']) ? $_POST['addPillar'] : false;

if ($addCategory == true) {
    $nameCategory = isset($_POST['nameCategory']) ? $_POST['nameCategory'] : '';

    // handle quote ' and "
    $nameCategory = str_replace('\'', '&#39;', $nameCategory);
    $nameCategory = str_replace('"', '&#34;', $nameCategory);

    // check same name category
    $stmt = $pdo->prepare("SELECT * FROM calendar_content_categories WHERE name = :name");
    $stmt->bindParam(':name', $nameCategory);
    $stmt->execute();
    $result = $stmt->fetchAll();
    if (count($result) > 0) {
        $status = 400;
        $message = "Same name category";
    } else {
        $stmt = $pdo->prepare("INSERT INTO calendar_content_categories (name) VALUES (:name)");
        $stmt->bindParam(':name', $nameCategory);
        $result = $stmt->execute();
        if ($result) {
            $status = 200;
            $message = "Success add category";
        } else {
            $status = 400;
            $message = "Failed add category";
        }
    }
} else if ($addPillar == true) {
    $namePillar = isset($_POST['namePillar']) ? $_POST['namePillar'] : '';

    // handle quote ' and "
    $namePillar = str_replace('\'', '&#39;', $namePillar);
    $namePillar = str_replace('"', '&#34;', $namePillar);

    // check same name pillar
    $stmt = $pdo->prepare("SELECT * FROM content_pillars WHERE name = :name");
    $stmt->bindParam(':name', $namePillar);
    $stmt->execute();
    $result = $stmt->fetchAll();
    if (count($result) > 0) {
        $status = 400;
        $message = "Same name pillar";
    } else {
        $stmt = $pdo->prepare("INSERT INTO content_pillars (name) VALUES (:name)");
        $stmt->bindParam(':name', $namePillar);
        $result = $stmt->execute();
        if ($result) {
            $status = 200;
            $message = "Success add pillar";
        } else {
            $status = 400;
            $message = "Failed add pillar";
        }
    }
} else if ($addContent == true) {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $url = isset($_POST['url']) ? $_POST['url'] : '';
    $content = isset($_POST['content']) ? $_POST['content'] : '';
    $copywriting = isset($_POST['copywriting']) ? $_POST['copywriting'] : '';
    $status = isset($_POST['status']) ? $_POST['status'] : '';
    $date = isset($_POST['date']) ? $_POST['date'] : '';
    $time = isset($_POST['time']) ? $_POST['time'] : '';
    $content_pillar_id = isset($_POST['pillar']) ? $_POST['pillar'] : '';
    $team_id = isset($_POST['team']) ? $_POST['team'] : '';
    $calendar_content_category_id = isset($_POST['category']) ? $_POST['category'] : '';

    $stmt = $pdo->prepare("INSERT INTO calendar_contents (name, url, content, copywriting, status, date, time, content_pillar_id, team_id, calendar_content_category_id) VALUES (:name, :url, :content, :copywriting, :status, :date, :time, :content_pillar_id, :team_id, :calendar_content_category_id)");
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
    $result = $stmt->execute();
    if ($result) {
        $status = 200;
        $message = "Success add content";
    } else {
        $status = 400;
        $message = "Failed add content";
    }
}

$status = [
    'status' => $status,
    'message' => $message,
];

echo json_encode($status);

$pdo = null;

?>