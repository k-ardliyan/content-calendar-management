<form method="POST">
    <table>
        <tr> 
            <td>Nama:</td>
            <td>:</td>
            <td><input type="text" name="nama" id="nama"></td>
        </tr>
        <tr>
            <td>Keperluan</td>
            <td>:</td>
            <td><input type="text" name="keperluan" id="keperluan"></td>
        </tr>
        <tr>
            <td colspan="3"><input type="submit" name="submit" value="submit"></td>
        </tr>
    </table>
</form>

<?php 

if (isset($_POST['submit'])):
    $datas = [
        'nama' => $_POST['nama'],
        'keperluan' => $_POST['keperluan']
    ];
    // echo to html
    foreach ($datas as $key => $value):
        echo $value . '<br>';
    endforeach;
endif;
?>