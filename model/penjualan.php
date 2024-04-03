<?php
require_once("parent.php");
require_once("barang.php");
class penjualan extends koneksi
{
	public function __construct()
	{
		parent::__construct();
	}

	public function add_penjualan($arr_col)
	{
		$sql = "Insert INTO penjualan (idBarang, jumlahBarang, tanggalJual, totalHarga) VALUES (?,?,?,?)";
		$stmt = $this->mysqli->prepare($sql);
		$stmt->bind_param("iisi", $arr_col['idBarang'], $arr_col['jumlahBarang'], $arr_col['tanggalJual'], $arr_col['hargaJual']);
		$stmt->execute();
		$this->mysqli->close();
		$objBarang = new barang();
		$error = $objBarang->jual_stok($arr_col['idBarang'], $arr_col['jumlahBarang']);
		if ($error == true) {
			echo "<script type='text/javascript'>alert('Stok Barang Gagal Diupdate');</script>";
			echo "<script>document.location = 'index.php'</script>";
		} else {
			return $stmt->insert_id;
		}
	}

	public function get_penjualan($tanggal)
	{
		if ($tanggal != "") {
			$sql = "Select p.idPenjualan, b.namaBarang, b.hargaJual, p.jumlahBarang, p.tanggalJual, p.totalHarga From penjualan as p INNER JOIN barang as b on p.idBarang = b.id where p.tanggalJual=?";
			$stmt = $this->mysqli->prepare($sql);
			$stmt->bind_param("s", $tanggal);
		} else {
			$sql = "Select p.idPenjualan, b.namaBarang, b.hargaJual, p.jumlahBarang, p.tanggalJual, p.totalHarga From  penjualan as p INNER JOIN barang as b on p.idBarang = b.id ";
			$stmt = $this->mysqli->prepare($sql);
		}
		$stmt->execute();
		$res = $stmt->get_result();
		return $res;
	}
}
