<?php 

require_once '../config/db.php';

$category = $_GET['c'];

// Query with PDO
$sql = "SELECT 
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
        WHERE cc.calendar_content_category_id = $category";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// add data on $result
foreach ($result as $row) {
    switch ($row['status_content']) {
        case 'Plan':
            $row['color'] = "#6c757d"; // gray
            break;
        case 'Ongoing':
            $row['color'] = "#ffc107"; // yellow
            break;
        case 'Need Review':
            $row['color'] = "#fd7e14"; // orange
            break;
        case 'Revision':
            $row['color'] = "#252728"; // black
            break;
        case 'Approved':
            $row['color'] = "#17a2b8"; // blue
            break;
        case 'Published':
            $row['color'] = "#28a745"; // green
            break;
        case 'Cancel':
            $row['color'] = "#dc3545"; // red
            break;
        default:
            $row['color'] = "white";
            break;
    }
    $row['start'] = $row['date_content'] . "T" . $row['time_content'];
    $row['title'] = " " . $row['name_team'] . "\n" .$row['name_content'];
    $row['icon'] = "user";
    $data[] = $row;
}

echo json_encode($data);

$pdo = null;

?>