<?php 

require_once '../config/db.php';

$kategori = $_GET['kategori'];

// query to get all data from calendar_contents table join to table teams with id
// $result = $mysqli->query("SELECT * ,
//                                     cc.id as id_cc, 
//                                     cc.name as cc_name, 
//                                     cc.url as url_content, 
//                                     t.id as team_id,
//                                     t.role_id as role_id,
//                                     t.name as team_name, 
//                                     cp.name as cp_name, 
//                                     ccc.name as ccc_name, 
//                                     t2.name as reviewer
//                                 FROM calendar_contents cc 
//                                 JOIN teams t ON cc.team_id = t.id 
//                                 JOIN content_pillars cp ON cc.content_pillar_id = cp.id
//                                 JOIN calendar_content_categories ccc ON cc.calendar_content_category_id = ccc.id
//                                 LEFT JOIN calendar_content_revisions ccr ON cc.id = ccr.calendar_content_id
//                                 LEFT JOIN teams t2 ON ccr.team_id = t2.id
//                                 WHERE cc.calendar_content_category_id = $kategori");

$result2 = $mysqli->query("SELECT 
                                    cc.id as id_content, 
                                    cc.name as name_content, 
                                    cc.url as url_content, 
                                    cc.content as content_content,
                                    cc.copywriting as copywriting_content,
                                    cc.status as status_content,
                                    cc.date as date_content,
                                    cc.time as time_content,
                                    cc.content_pillar_id as pillar_id_content,
                                    cc.team_id as team_id_content,
                                    cc.created_at as created_at_content,
                                    cc.calendar_content_category_id as category_id_content,
                                    t.name as name_team,
                                    t.role_id as role_id_team,
                                    cp.id as id_pillar,
                                    cp.name as name_pillar,
                                    ccc.id as id_category,
                                    ccc.name as name_category,
                                    ccr.id as id_revision,
                                    ccr.revision as revision,
                                    ccr.calendar_content_id as content_id_revision,
                                    ccr.team_id as team_id_revision,
                                    t2.name as reviewer
                                FROM calendar_contents cc 
                                JOIN teams t ON cc.team_id = t.id 
                                JOIN content_pillars cp ON cc.content_pillar_id = cp.id
                                JOIN calendar_content_categories ccc ON cc.calendar_content_category_id = ccc.id
                                LEFT JOIN calendar_content_revisions ccr ON cc.id = ccr.calendar_content_id
                                LEFT JOIN teams t2 ON ccr.team_id = t2.id
                                WHERE cc.calendar_content_category_id = $kategori");

// loop through all data result2
while ($data = $result2->fetch_assoc()) {
    switch ($data['status_content']) {
        case 'Plan':
            $data['color'] = "grey";
            break;
        case 'Ongoing':
            $data['color'] = "yellow";
            break;
        case 'Need Review':
            $data['color'] = "orange";
            break;
        case 'Revision':
            $data['color'] = "black";
            break;
        case 'Approved':
            $data['color'] = "skyblue";
            break;
        case 'Published':
            $data['color'] = "green";
            break;
        case 'Cancel':
            $data['color'] = "red";
            break;
        default:
            $data['color'] = "white";
            break;
    }
    // data calendar start and title
    $data['start'] = $data['date_content'] . "T" . $data['time_content'];
    $data['title'] = " " . $data['name_team'] . "\n" .$data['name_content'];
    $data['icon'] = "user";
    $all_data[] = $data;
}

// foreach ($result as $row) {
//     $row['id_calendar_content'] = $row['id_cc'];
//     $row['url'] = '';
//     // switchcase
//     switch ($row['status']) {
//         case 'Plan':
//             $row['color'] = "grey";
//             break;
//         case 'Ongoing':
//             $row['color'] = "yellow";
//             break;
//         case 'Need Review':
//             $row['color'] = "orange";
//             break;
//         case 'Revision':
//             $row['color'] = "black";
//             break;
//         case 'Approved':
//             $row['color'] = "skyblue";
//             break;
//         case 'Published':
//             $row['color'] = "green";
//             break;
//         case 'Cancel':
//             $row['color'] = "red";
//             break;
//         default:
//             $row['color'] = "white";
//             break;
//     }
//     // data calendar start and title
//     $row['start'] = $row['date'] . "T" . $row['time'];
//     $row['title'] = " " . $row['team_name'] . "\n" .$row['cc_name'];
//     $row['icon'] = "user";
//     $row['kategori'] = $row['ccc_name'];
//     $data[] = $row;
// }

echo json_encode($all_data);

?>