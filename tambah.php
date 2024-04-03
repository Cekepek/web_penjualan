<?php
require_once("model/barang.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tambah Penjualan</title>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js"></script>
  <link rel="icon" type="image/x-icon" href="161-removebgc.png">
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body id="secondPage">
  <header>
    <img src="161-removebgc.png" alt="" />
  </header>
  <form action="tambah_proses.php" method="POST" enctype="multipart/form-data">
    <h1>Tambah Penjualan</h1>
    <div class="form-container">
      <div class="side">
        <div class="input-group">
          <label for="input1">Nama Barang:</label>
          <select name="idBarang" id='selectBarang'>
            <option value="pilihbarang" selected>--Pilih Barang--</option>
            <?php
            $objBarang = new barang();
            $hasil = $objBarang->get_barang(null);
            $nomorBarang = 0;
            while ($baris = $hasil->fetch_assoc()) {
              $id = $baris['id'];
              $nama = $baris['namaBarang'];
              echo "<option value='$id'>$nama</option>";
            }
            ?>
          </select>
        </div>
        <div class="input-group">
          <label for="input4">Jumlah Barang :</label>
          <input type="number" id="inputJumlah" name="jumlahBarang" oninput="checkValue(this)" value="0" onfocus="if(this.value == 0){this.value = '';}" required />
          <small><i id="jumlahstok"></i></small>
        </div>
      </div>
      <div class="side">
        <div class="input-group">
          <label for="input5">Tanggal Penjualan :</label>
          <input type="date" id="inputTanggal" name="tanggalJual" required />
        </div>
        <div class="input-group">
          <label for="input6">Harga Penjualan :</label>
          <input type="text" id="inputHarga" name="hargaJual" value="0" />
        </div>
      </div>
    </div>
    <div class="button">
      <a href="index.php">
        <button type="button" onclick="goBack()" class="button-back">Kembali</button>
      </a>
      <button type="submit" name="submit" class="button-submit" id="submit" onclick="validate()">Tambahkan</button>
    </div>
  </form>
</body>
<script type="text/javascript">
  function goBack() {
    window.history.back();
  }
  $('#selectBarang').on('change', function() {
    var mainselection = this.value;
    $.ajax({
      type: "POST",
      url: "get_barang.php",
      data: 'selection=' + mainselection,
      success: function(result) {
        var res = $.parseJSON(result);
        $("#inputJumlah").attr({
          "max": res[0].stok,
          "min": 0
        });
        $("#jumlahstok").html("Stok barang: " + res[0].stok)
        var jumlah = $("#inputJumlah").val();
        $("#inputHarga").val(res[0].hargaJual * jumlah)
      }
    });
  });

  $('#inputJumlah').on('input', function() {
    var jumlah = this.value;
    var selected = $('#selectBarang').find(":selected").val();
    $.ajax({
      type: "POST",
      url: "get_barang.php",
      data: 'selection=' + selected,
      success: function(result) {
        var res = $.parseJSON(result);
        $("#inputHarga").val(res[0].hargaJual * jumlah)
      }
    });
  })
  $('#inputHarga').focus(function() {
    $(this).blur();
  });

  function checkValue(sender) {
    let min = sender.min;
    let max = sender.max;
    let value = parseInt(sender.value)
    if (value > max) {
      sender.value = max;
    } else if (value < min) {
      sender.value = min;
    }
  }

  function validate() {
    var ddl = document.getElementById("selectBarang");
    var selectedValue = ddl.options[ddl.selectedIndex].value;
    if (selectedValue == "pilihbarang") {
      alert("Harap Pilih Barang");
    }
  }
  window.onload = function loadDate() {
    let date = new Date(),
        day = date.getDate(),
        month = date.getMonth() + 1,
        year = date.getFullYear();

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    const todayDate = `${year}-${month}-${day}`;

    document.getElementById("inputTanggal").defaultValue = todayDate;
};

loadDate();
</script>

</html>