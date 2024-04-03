<?php
require_once("model/penjualan.php");
// $mysqli = new mysqli("localhost", "root", "", "web_penjualan");

if(isset($_POST['submit'])){
    $arr_col= array();
	$arr_col['idBarang'] = $_POST['idBarang'];
	$arr_col['jumlahBarang'] = $_POST['jumlahBarang'];
	$arr_col['tanggalJual'] = $_POST['tanggalJual'];
    $arr_col['hargaJual'] = $_POST['hargaJual'];

    $objPenjualan = new penjualan();
	$idPenjualan = $objPenjualan->add_penjualan($arr_col);
	if($idPenjualan){
		echo "<script type='text/javascript'>alert('Data Penjualan Berhasil Ditambahkan');</script>";
		echo "<script>document.location = 'index.php'</script>";
	}
	else{
		echo "<script type='text/javascript'>alert('Data Penjualan Gagal Ditambahkan');</script>";
		echo "<script>document.location = 'index.php'</script>";
	}
}
// header("location: tambah.php");