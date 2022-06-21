<?php 

    require_once 'config.php';

    // query to get all data from calendar_contents table join to table teams with id
    $sqlQuery = "SELECT * , cc.name as cc_name, t.name as team_name, cp.name as cp_name FROM calendar_contents cc JOIN teams t ON cc.team_id = t.id JOIN content_pillars cp ON cc.content_pillar_id = cp.id";
    $result = $mysqli->query($sqlQuery);

    foreach ($result as $row) {
        // switchcase
        switch ($row['status']) {
            case 'Plan':
                $row['color'] = "grey";
                break;
            case 'Ongoing':
                $row['color'] = "yellow";
                break;
            case 'Need Review':
                $row['color'] = "orange";
                break;
            case 'Revision':
                $row['color'] = "black";
                break;
            case 'Approved':
                $row['color'] = "skyblue";
                break;
            case 'Published':
                $row['color'] = "green";
                break;
            case 'Cancel':
                $row['color'] = "red";
                break;
            default:
                $row['color'] = "white";
                break;}
        // data calendar start and title
        $row['start'] = $row['date'] . "T" . $row['time'];
        $row['title'] = "\n" .$row['cc_name'] . "\n" . $row['team_name'];
        $data[] = $row;
    }

    echo json_encode($data);

?>