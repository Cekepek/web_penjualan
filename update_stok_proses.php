<?php
require_once("model/barang.php");
// $mysqli = new mysqli("localhost", "root", "", "web_penjualan");

if(isset($_POST['submit'])){
    $arr_col= array();
	$arr_col['barang'] = $_POST['barang'];
	$arr_col['hargaBarang'] = $_POST['hargaBarang'];
    $arr_col['hargaJual'] = $_POST['hargaJual'];
	$arr_col['tanggalRestok'] = $_POST['tanggalRestok'];
	$arr_col['stok'] = $_POST['stok'];

    $objBarang = new barang();
	$error = $objBarang->update_stok($arr_col);
	if($error != true){
		echo "<script type='text/javascript'>alert('Stok Barang Berhasil Diupdate');</script>";
		echo "<script>document.location = 'index.php'</script>";
	}
	else{
		echo "<script type='text/javascript'>alert('Stok Barang Gagal Diupdate');</script>";
		echo "<script>document.location = 'index.php'</script>";
	}
}
// header("location: tambah.php");