<?php  

require_once '../config/db.php';
$result = $mysqli->query("SELECT * FROM calendar_content_categories");

?>

<?php foreach($result as $row): ?>
    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
<?php endforeach; ?>