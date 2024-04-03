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
    <form action="update_stok_proses.php" method="POST" enctype="multipart/form-data">
        <h1>Update Stok</h1>
        <div class="form-container-stok">
            <div class="input-barang">
                <div class="input-group">
                    <label for="input1">Nama Barang:</label>
                    <select name="barang" id="barang">
                        <option value="pilihbarang" selected>--Pilih Barang--</option>
                        <?php
                        $objBarang = new barang();
                        $hasil = $objBarang->get_barang("");

                        while ($baris = $hasil->fetch_assoc()) {
                            $id = $baris['id'];
                            $nama = $baris['namaBarang'];
                            echo "<option value='$id'>$nama</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="input-group">
                    <label for="input2">Tanggal Restok Barang : </label>
                    <input type="date" id="tanggalRestok" name="tanggalRestok" required />
                </div>
                <div class="input-group">
                    <label for="input3">Harga Barang :</label>
                    <input type="number" id="hargaBarang" name="hargaBarang" required />
                </div>
                <div class="input-group">
                    <label for="input3">Harga Jual :</label>
                    <input type="number" id="hargaJual" name="hargaJual" required />
                </div>
                <div class="input-group">
                    <label for="input4">Jumlah Barang :</label>
                    <input type="number" id="stok" name="stok" value="0" required />
                </div>
            </div>
        </div>
        <div class="button">
            <a href="index.php">
                <button type="button" onclick="goBack()" class="button-back">Kembali</button>
            </a>
            <button type="submit" name="submit" class="button-submit" onclick="validate()">Tambahkan</button>
        </div>
    </form>
</body>
<script type="text/javascript">
    function goBack() {
        window.history.back();
    }
    $('#barang').on('change', function() {
        var mainselection = this.value;
        $.ajax({
            type: "POST",
            url: "get_barang.php",
            data: 'selection=' + mainselection,
            success: function(result) {
                var res = $.parseJSON(result);
                $("#hargaBarang").val(res[0].hargaBarang)
                $("#hargaJual").val(res[0].hargaJual)
            }
        });
    });

    function validate() {
        var ddl = document.getElementById("barang");
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

    document.getElementById("tanggalRestok").defaultValue = todayDate;
};

loadDate();
</script>

</html>