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
      <form>
        <div class="searchContainer">
          <label for="search">Tanggal Penjualan:</label>
          <input type="date" id="search" name="search">
          <input type="submit" value="Cari">
        </div>
      </form>
        <table border="1">
            <thead>
				<tr><th>ID</th> <th>Nama Barang</th> <th>Harga per Satuan</th> <th>Jumlah Barang</th> <th>Tanggal Penjualan</th> <th>Total Harga</th></tr>
			</thead>
        <?php
          $tanggal = "";
          if(isset($_GET['search'])){
            $tanggal = $_GET['search'];
            echo "<p><i>Hasil pencarian untuk tanggal penjualan '".$tanggal."'</i></p>";
          }
          $res = $penjualan->get_penjualan($tanggal);
          while($row = $res->fetch_assoc()){
            echo"<tr>";
              echo "<td>".$row['idPenjualan']."</td>";
              echo "<td>".$row['namaBarang']."</td>" ; 	
              echo "<td>". $row['hargaJual']."</td>";
              echo "<td>". $row['jumlahBarang']."</td>";
              echo "<td>". $row['tanggalJual']."</td>";
              echo "<td>". $row['totalHarga']."</td>";
            echo "</tr>";
          }
        ?>
        </table>
      <div class="buttonBackDaftar">
        <a href="index.php">
          <button type="button" class="button-back">Kembali</button>
        </a>
      </div>
    </div>
</body>
<script>
  function goBack() {
    window.history.back();
  }
</script>
</html>