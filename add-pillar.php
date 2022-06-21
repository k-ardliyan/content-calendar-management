<?php 

require_once 'db.php';

$pillar = isset($_POST['inputPillar']) ? $_POST['inputPillar'] : '';

$sqlInsert = "INSERT INTO content_pillars (name) VALUES ('$pillar')";

if (mysqli_query($conn, $sqlInsert)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sqlInsert . "<br>" . mysqli_error($conn);
}

?>