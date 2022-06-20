<?php 

    require_once 'config.php';

    $sqlQuery = "SELECT * FROM calendar_contents";
    $result = $mysqli->query($sqlQuery);

    foreach ($result as $row) {
        $row['color'] = "red";
        $data[] = $row;
    }

    // print_r($data)
    echo json_encode($data);

?>