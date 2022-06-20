<?php 

require_once 'config.php';

$kategori = isset($_POST['inputKategori']) ? $_POST['inputKategori'] : '';

$sqlInsert = "INSERT INTO calendar_content_categories (name) VALUES ('$kategori')";


?>