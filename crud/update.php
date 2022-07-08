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
    
    $result = $mysqli->query("UPDATE calendar_contents SET name = '$name', url = '$url', content = '$content', copywriting = '$copywriting', status = '$status', date = '$date', time = '$time', content_pillar_id = '$content_pillar_id', team_id = '$team_id', calendar_content_category_id = '$calendar_content_category_id' WHERE id = '$idContent'");
    if ($result) {
        $status = 200;
        $message = "Success update content";
    } else {
        $status = 400;
        $message = "Failed update content";
    }

    if ($status == 200 && $_SESSION['role_id'] != 3) {  
        //check apakah ada revisi sebelumnya
        $result = $mysqli->query("SELECT * FROM calendar_content_revisions WHERE calendar_content_id = '$idContent'");
        if ($result->num_rows > 0) {
            $result = $mysqli->query("UPDATE calendar_content_revisions SET revision = '$revision', team_id = '$_SESSION[team_id]' WHERE calendar_content_id = '$idContent'");
            if($result){
                $status = 200;
                $message = "Success update revision";
            } else {
                $status = 400;
                $message = "Failed update revision";
            }
        } else {
            $result = $mysqli->query("INSERT INTO calendar_content_revisions (revision, calendar_content_id, team_id) VALUES ('$revision', '$idContent', '$_SESSION[team_id]')");
            if($result){
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

?>