<?php
require_once("model/penjualan.php");

$penjualan = new penjualan();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penjualan</title>
    <link rel="icon" type="image/x-icon" href="161-removebgc.png">
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
</head>
<body id="thirdPage">
    <header>
      <img src="161-removebgc.png" alt="" />
    </header>
    <div class="tableContainer">
      <h1>Daftar Penjualan</h1>
      <div class="searchContainer">
        <label for="search">Cari:</label>
        <input type="text" id="search" name="search">
      </div>
        <table border="1">
            <thead>
				<tr><th>ID</th> <th>Nama Barang</th> <th>Jumlah Pembelian</th> <th>Tanggal Pembelian</th> <th>Harga Pembelian</th> <th>Tanggal Penjualan</th> <th>Harga Penjualan</th> <th>Sisa Stok</th></tr>
			</thead>
        <?php
          $res = $penjualan->get_penjualan();
          while($row = $res->fetch_assoc()){
            echo"<tr>";
              echo "<td>".$row['idPenjualan']."</td>";
              echo "<td>".$row['namaBarang']."</td>" ; 	
              echo "<td>". $row['jumlahBarang']."</td>";
              echo "<td>". $row['tanggalBeli']."</td>";
              echo "<td>". $row['hargaBeli']."</td>";
              echo "<td>". $row['tanggalJual']."</td>";
              echo "<td>". $row['hargaJual']."</td>";
              echo "<td>". $row['sisaStok']."</td>";
            echo "</tr>";
          }
        ?>
        </table>
      <div class="buttonBackDaftar">
        <button type="button" onclick="goBack()" class="button-back">Kembali</button>
      </div>
    </div>
</body>
<script>
  function goBack() {
    window.history.back();
  }
</script>
</html>