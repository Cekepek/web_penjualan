<?php
require_once("model/user.php");
if(isset($_POST["btnLogin"])){
	$objUsers = new user();
	$rs = $objUsers->
	login($_POST['username'],
			$_POST['password']);
	$row = $rs->fetch_assoc();
	if($row!=false){
        $_SESSION['loggedIn'] = true;
		$_SESSION['username'] = $row['username'];
		header("location: index.php");
	}else{
		echo "<script type='text/javascript'>alert('Login Gagal');</script>";
		echo "<script>document.location = 'login.php'</script>";
	}
}
