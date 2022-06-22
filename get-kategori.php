<?php 

    require_once 'db.php';

    $result = $mysqli->query("SELECT id, name FROM calendar_content_categories");

    foreach ($result as $category) {
        $data[] = $category;
    }
    
    echo json_encode($data);
    
?>