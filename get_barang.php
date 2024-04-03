<?php
require_once("model/barang.php");
$selected = $_POST['selection'];
$objBarang = new barang();
$hasil = $objBarang->get_barang($selected);
$rows = mysqli_fetch_all($hasil,MYSQLI_ASSOC);
// while ($baris = $hasil->fetch_assoc()) {
//     $rows[] = $baris;
// }
echo json_encode($rows);
