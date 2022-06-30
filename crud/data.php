<?php 

require_once '../config/db.php';

    $kategori = $_GET['kategori'];

    // query to get all data from calendar_contents table join to table teams with id
    $result = $mysqli->query("SELECT * , cc.id as id_cc, cc.name as cc_name, cc.url as url_content, t.name as team_name, cp.name as cp_name, ccc.name as ccc_name
                                    FROM calendar_contents cc 
                                    JOIN teams t ON cc.team_id = t.id 
                                    JOIN content_pillars cp ON cc.content_pillar_id = cp.id
                                    JOIN calendar_content_categories ccc ON cc.calendar_content_category_id = ccc.id
                                    WHERE cc.calendar_content_category_id = $kategori");

    foreach ($result as $row) {
        $row['id_calendar_content'] = $row['id_cc'];
        $row['url'] = '';
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
                break;
        }
        // data calendar start and title
        $row['start'] = $row['date'] . "T" . $row['time'];
        $row['title'] = "\n" .$row['cc_name'] . "\n" . $row['team_name'];
        $row['kategori'] = $row['ccc_name'];
        $data[] = $row;
    }

    echo json_encode($data);

?>