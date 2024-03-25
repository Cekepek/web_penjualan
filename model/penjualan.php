<?php
require_once("parent.php");
class penjualan extends koneksi{
    public function __construct()
    {
        parent::__construct();
    }

    public function add_penjualan($arr_col){
		$sql = "Insert INTO penjualan (namaBarang, jumlahBarang, tanggalBeli, hargaBeli, tanggalJual, hargaJual, sisaStok) VALUES (?,?,?,?,?,?,?)";
		$stmt = $this->mysqli->prepare($sql);
		$stmt->bind_param("sisisii", $arr_col['namaBarang'],$arr_col['jumlahBarang'],$arr_col['tanggalBeli'],$arr_col['hargaBeli'],$arr_col['tanggalJual'],$arr_col['hargaJual'],$arr_col['sisaStok']);
		$stmt->execute();
		$this->mysqli->close();
		return $stmt->insert_id;
    }

	public function get_penjualan($tanggal){
		if($tanggal!=""){
			$sql = "Select * From penjualan where tanggalJual=?";
			$stmt = $this->mysqli->prepare($sql);
			$stmt->bind_param("s",$tanggal);
		}
		else{
			$sql = "Select * From penjualan";
			$stmt = $this->mysqli->prepare($sql);
		}
		$stmt->execute();
		$res = $stmt->get_result();
		return $res;
	}
}