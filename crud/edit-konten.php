<?php

require_once '../config/db.php';

$id = isset($_POST['idKonten']) ? $_POST['idKonten'] : '';
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

$result = $mysqli->query("UPDATE calendar_contents 
                                SET name = '$nama', url = '$url', content = '$content', copywriting = '$copywriting', status = '$status', date = '$tanggal', time = '$jam', revision = '$revisi', content_pillar_id = '$pillar', team_id = '$team', calendar_content_category_id = '$kategori' 
                                WHERE id = '$id'");
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