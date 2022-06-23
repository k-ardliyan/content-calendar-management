<?php 

$orders = [
    ['id' => 1, 'name' => 'Bakmie', 'price' => 5000],
    ['id' => 2, 'name' => 'Nasi Goreng', 'price' => 10000],
    ['id' => 3, 'name' => 'Burjo', 'price' => 4000],
    ['id' => 4, 'name' => 'Boba', 'price' => 7000],
    ['id' => 5, 'name' => 'Martabak', 'price' => 12000],
];

function tambahData(){
    echo "<tr>";
    echo "<td>dummy</td>";
    echo "<td>dummy</td>";
    echo "<td>dummy</td>";
    echo "</tr>";
}

?>
<table border="1">
        <tr>
            <th>Order Id</th>
            <th>Name</th>
            <th>Price</th>
        </tr>
<?php
foreach ($orders as $order):
?>
        <tr>
            <td><?php echo $order['id']; ?></td>
            <td><?php echo $order['name']; ?></td>
            <td><?php echo $order['price']; ?></td>
        </tr>
<?php endforeach;
// var_dump($orders);

?>
<tr>
    <button onclick="<?php tambahData(); ?>">Tambah Data</button>
</tr>

</table>

<?php 

var_dump($GLOBALS);

?>