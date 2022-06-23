<table class="table" id="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Kategori</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
        require_once 'db.php';
        $result = $mysqli->query("SELECT * FROM calendar_content_categories WHERE id");
        $no=1;
        while($row = mysqli_fetch_array($result)): 
        
        ?>

        <tr>
            <td><?= $no; ?></td>
            <td><?= $row['name']; ?></td>
            <td>
                <button type="button" class="btn btn-warning btn-sm text-white mr-2" onclick="editKategori(<?= $row['id'] ?>,'<?= $row['name']; ?>')"><i class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-danger btn-sm" onclick="delKategori(<?= $row['id']; ?>)"><i class="fa fa-trash"></i></button>
            </td>
        </tr>
        <?php $no++; endwhile ?>
    </tbody>
</table>