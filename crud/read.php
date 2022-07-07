<?php 

require_once '../config/db.php';
$readCategoryModal = isset($_POST['readCategoryModal']) ? $_POST['readCategoryModal'] : false;
$readCategoryCalendar = isset($_POST['readCategoryCalendar']) ? $_POST['readCategoryCalendar'] : false;
$readPillarModal = isset($_POST['readPillarModal']) ? $_POST['readPillarModal'] : false;
$readPillarContent = isset($_POST['readPillarContent']) ? $_POST['readPillarContent'] : false;

?>

<?php if ($readCategoryModal == true): ?>
    <table class="table" id="tableKategori">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kategori</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $result = $mysqli->query("SELECT * FROM calendar_content_categories WHERE id");
                $no=1;
                while($row = mysqli_fetch_array($result)): 
            ?>
            
            <tr>
                <td><?= $no; ?></td>
                <td><?= $row['name']; ?></td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm text-white mr-2" onclick="editKategori(this.getAttribute('data-id'),this.getAttribute('data-name'))" data-id="<?= $row['id']; ?>" data-name="<?= $row['name']; ?>"><i class="bx bx-pencil"></i></a>
                    <button type="button" class="btn btn-danger btn-sm" onclick="delKategori(<?= $row['id']; ?>)"><i class="bx bx-trash"></i></button>
                </td>
            </tr>
            <?php $no++; endwhile ?>
        </tbody>
    </table>

<?php elseif ($readCategoryCalendar == true):
    $result = $mysqli->query("SELECT * FROM calendar_content_categories");
    ?>
    <?php foreach($result as $row): ?>
        <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
    <?php endforeach; ?>

<?php elseif ($readPillarModal == true): ?>
    <table class="table" id="tablePillar">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Pillar</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $result = $mysqli->query("SELECT * FROM content_pillars WHERE id");
                $no=1;
                while($row = mysqli_fetch_array($result)): 
            ?>

            <tr>
                <td><?= $no; ?></td>
                <td><?= $row['name']; ?></td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm text-white mr-2" data-id="<?= $row['id'] ?>" data-name="<?= $row['name']; ?>" onclick="editPillar($(this).data('id'),$(this).data('name'))"><i class="bx bx-pencil"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" onclick="delPillar(<?= $row['id']; ?>)"><i class="bx bx-trash"></i></button>
                </td>
            </tr>
            <?php $no++; endwhile ?>
        </tbody>
    </table>
    
<?php elseif ($readPillarContent == true): 
    $resultPillar = $mysqli->query("SELECT * FROM content_pillars");?>
    <?php foreach($resultPillar as $row): ?>
        <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
    <?php endforeach; ?>
<?php endif; ?>