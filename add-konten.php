<?php 
require_once 'config.php';

$team = $_POST['team'];
$nama = isset($_POST['inputNama']) ? $_POST['inputNama'] : '';
$url = isset($_POST['inputUrl']) ? $_POST['inputUrl'] : '';
$content = isset($_POST['inputContent']) ? $_POST['inputContent'] : '';
$copywriting = isset($_POST['inputCopywriting']) ? $_POST['inputCopywriting'] : '';
$status = isset($_POST['inputStatus']) ? $_POST['inputStatus'] : '';
$pillar = isset($_POST['inputPillar']) ? $_POST['inputPillar'] : '';
$tanggal = isset($_POST['inputTanggal']) ? $_POST['inputTanggal'] : '';
$jam = isset($_POST['inputJam']) ? $_POST['inputJam'] : '';
$revisi = isset($_POST['inputRevisi']) ? $_POST['inputRevisi'] : '';

$sqlInsert = "INSERT INTO calendar_contents (name, url, content, copywriting, status, pillar, date, time, revision) VALUES ('$nama', '$url', '$content', '$copywriting', '$status', '$pillar', '$tanggal', '$jam', '$revisi')";

?>