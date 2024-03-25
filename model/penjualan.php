<?php
require_once("parent.php");
class penjualan extends koneksi{
    public function __construct()
    {
        parent::__construct();
    }

    public function add_penjualan($arr_col){
        $kumpulan_col=array();
		$kumpulan_tanda_tanya=array();
		foreach ($arr_col as $key => $val) {
			$kumpulan_col[]= $key;
			$kumpulan_tanda_tanya[]="?";
		}
		$sql = "Insert INTO penjualan (namaBarang, jumlahBarang, tanggalBeli, hargaBeli, tanggalJual, hargaJual, sisaStok) VALUES (?,?,?,?,?,?,?)";
		$stmt = $this->mysqli->prepare($sql);
		$stmt->bind_param("sisisii", $arr_col['namaBarang'],$arr_col['jumlahBarang'],$arr_col['tanggalBeli'],$arr_col['hargaBeli'],$arr_col['tanggalJual'],$arr_col['hargaJual'],$arr_col['sisaStok']);
		$stmt->execute();
		$this->mysqli->close();
		return $stmt->insert_id;
    }

	public function get_penjualan(){
		$sql = "Select * From penjualan";
		$stmt = $this->mysqli->prepare($sql);
		$stmt->execute();
		$res = $stmt->get_result();
		return $res;
	}
}