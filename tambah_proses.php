<?php
require_once("model/penjualan.php");
// $mysqli = new mysqli("localhost", "root", "", "web_penjualan");

if(isset($_POST['submit'])){
    $arr_col= array();
	$arr_col['namaBarang'] = $_POST['namaBarang'];
	$arr_col['jumlahBarang'] = $_POST['jumlahBarang'];
	$arr_col['tanggalBeli'] = $_POST['tanggalBeli'];
	$arr_col['hargaBeli'] = $_POST['hargaBeli'];
	$arr_col['tanggalJual'] = $_POST['tanggalJual'];
    $arr_col['hargaJual'] = $_POST['hargaJual'];

	echo($arr_col['namaBarang']);
    $objPenjualan = new penjualan();
	$idPenjualan = $objPenjualan->add_penjualan($arr_col);
	if($idPenjualan){
		echo "<script type='text/javascript'>alert('Data Penjualan Berhasil Ditambahkan');</script>";
		echo "<script>document.location = 'index.html'</script>";
	}
}
// header("location: tambah.php");