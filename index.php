<?php
session_start();

if (!isset($_SESSION['username'])) {
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Web Penjualan</title>
  <link rel="icon" type="image/x-icon" href="161-removebgc.png">
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body id="firstPage">
  <a href="logout.php">
    <button class="logout-btn">Logout</button>
  </a>
  <header>
    <img src="161-removebgc.png" alt="">
  </header>
  <div class="menu">
    <a href="./menu_stok.php">
      <div class="menu-item">
        <i class="fa fa-plus"></i>
        <p>Stok Barang</p>
      </div>
    </a>
    <a href="./tambah.php">
      <div class="menu-item">
        <i class="fa fa-plus"></i>
        <p>Tambah Penjualan</p>
      </div>
    </a>
    <a href="./daftar.php">
      <div class="menu-item">
        <i class="fa fa-list"></i>
        <p>Daftar Penjualan</p>
      </div>
    </a>
  </div>
</body>

</html>