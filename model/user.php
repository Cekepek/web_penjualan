<?php
require_once("parent.php");
class user extends koneksi{
    public function __construct()
    {
        parent::__construct();
    }

	public function login($username, $password){
		$sql = "Select * From user Where username=? And password=?";
		$stmt=$this->mysqli->prepare($sql);
		$stmt->bind_param("ss", $username,$password);
		$stmt->execute();
		return $stmt->get_result();
	}
}