<?php  

require_once '../config/db.php';
$resultPillar = $mysqli->query("SELECT * FROM content_pillars");

?>

<?php foreach($resultPillar as $row): ?>
    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
<?php endforeach; ?>