<?php
require_once("parent.php");
class barang extends koneksi
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add_barang($arr_col)
    {
        $sql = "Insert INTO barang (namaBarang, hargaBarang, hargaJual, tanggalRestok, stok) VALUES (?,?,?,?,?)";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("siisi", $arr_col['namaBarang'], $arr_col['hargaBarang'], $arr_col['hargaJual'], $arr_col['tanggalRestok'], $arr_col['stok']);
        $stmt->execute();
        $this->mysqli->close();
        return $stmt->insert_id;
    }

    public function get_barang()
    {
        $sql = "Select * From barang";
        $res = $this->mysqli->query($sql);
        return $res;
    }

    public function update_stok($arr_col){
        $sql = "UPDATE barang SET hargaBarang=?, hargaJual=?, tanggalRestok=?, stok=stok+? WHERE id=".$arr_col['barang'];
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("iisi", $arr_col['hargaBarang'], $arr_col['hargaJual'], $arr_col['tanggalRestok'], $arr_col['stok']);
        $stmt->execute();
        $this->mysqli->close();
        return $stmt->error;
    }
}
