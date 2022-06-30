<?php

require_once '../config/db.php';

$nama = isset($_POST['inputNama']) ? $_POST['inputNama'] : '';
$url = isset($_POST['inputUrl']) ? $_POST['inputUrl'] : '';
$content = isset($_POST['inputContent']) ? $_POST['inputContent'] : '';
$copywriting = isset($_POST['inputCopywriting']) ? $_POST['inputCopywriting'] : '';
$status = isset($_POST['selectStatus']) ? $_POST['selectStatus'] : '';
$tanggal = isset($_POST['inputTanggal']) ? $_POST['inputTanggal'] : '';
$jam = isset($_POST['inputJam']) ? $_POST['inputJam'] : '';
$revisi = isset($_POST['inputRevisi']) ? $_POST['inputRevisi'] : '';
$pillar = isset($_POST['selectPillar']) ? $_POST['selectPillar'] : '';
$team = isset($_POST['inputTeam']) ? $_POST['inputTeam'] : '';
$kategori = isset($_POST['inputKategori']) ? $_POST['inputKategori'] : '';

$result = $mysqli->query("INSERT INTO calendar_contents (name, url, content, copywriting, status, date, time, revision, content_pillar_id, team_id, calendar_content_category_id) VALUES ('$nama', '$url', '$content', '$copywriting', '$status', '$tanggal', '$jam', '$revisi', '$pillar', '$team', '$kategori')");

if ($result) {
    $status = 200;
    $message = "Success";
} else {
    $status = 400;
    $message = "Failed";
}

$status = [
    'status' => $status,
    'message' => $message,
];

echo json_encode($status);

?>