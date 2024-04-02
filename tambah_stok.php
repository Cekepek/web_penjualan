<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Penjualan</title>
    <link rel="icon" type="image/x-icon" href="161-removebgc.png">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body id="secondPage">
    <header>
        <img src="161-removebgc.png" alt="" />
    </header>
    <form action="tambah_stok_proses.php" method="POST" enctype="multipart/form-data">
        <h1>Tambah Barang</h1>
        <div class="form-container-stok">
            <div class="input-barang">
                <div class="input-group">
                    <label for="input1">Nama Barang:</label>
                    <input type="text" id="input1" name="namaBarang" required />
                </div>
                <div class="input-group">
                    <label for="input2">Tanggal Restok Barang : </label>
                    <input type="date" id="input2" name="tanggalRestok" required />
                </div>
                <div class="input-group">
                    <label for="input3">Harga Barang :</label>
                    <input type="number" id="input3" name="hargaBarang" required />
                </div>
                <div class="input-group">
                    <label for="input3">Harga Jual :</label>
                    <input type="number" id="input3" name="hargaJual" required />
                </div>
                <div class="input-group">
                    <label for="input4">Jumlah Barang :</label>
                    <input type="number" id="input3" name="stok" required />
                </div>
            </div>
        </div>
        <div class="button">
            <a href="index.php">
                <button type="button" onclick="goBack()" class="button-back">Kembali</button>
            </a>
            <button type="submit" name="submit" class="button-submit">Tambahkan</button>
        </div>
    </form>
</body>
<script>
    function goBack() {
        window.history.back();
    }
</script>

</html>