<?php
require_once("model/barang.php");
// $mysqli = new mysqli("localhost", "root", "", "web_penjualan");

if(isset($_POST['submit'])){
    $arr_col= array();
	$arr_col['namaBarang'] = $_POST['namaBarang'];
	$arr_col['hargaBarang'] = $_POST['hargaBarang'];
    $arr_col['hargaJual'] = $_POST['hargaJual'];
	$arr_col['tanggalRestok'] = $_POST['tanggalRestok'];
	$arr_col['stok'] = $_POST['stok'];

    $objBarang = new barang();
	$idBarang = $objBarang->add_barang($arr_col);
	if($idBarang){
		echo "<script type='text/javascript'>alert('Data Barang Berhasil Ditambahkan');</script>";
		echo "<script>document.location = 'index.php'</script>";
	}
	else{
		echo "<script type='text/javascript'>alert('Data Barang Gagal Ditambahkan');</script>";
		echo "<script>document.location = 'index.php'</script>";
	}
}
// header("location: tambah.php");