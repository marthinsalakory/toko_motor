<?php

include_once 'functions.php';

// ambil data dari url
$id = $_GET["id"];

// query data file berdasarkan id-nya
$dt = query("SELECT * FROM tb_produk WHERE kode_barang = $id")[0];



// function untuk tambah di tabel produk
function beli($data)
{
    global $conn;
    // ambil data dari tiap elemen dalam form
    $pelanggan = htmlspecialchars($data["pelanggan"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $kota = htmlspecialchars($data["kota"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    $tipe = htmlspecialchars($data["tipe"]);
    $item = htmlspecialchars($data["item"]);
    $kode_barang = htmlspecialchars($data["kode_barang"]);
    $harga = htmlspecialchars($data["harga"]);
    $gambar = htmlspecialchars($data["gambar"]);
    $konfirmasi = htmlspecialchars($data["konfirmasi"]);


    // jumlah total harga beli
    $total = $item * $harga;


    // query insert data
    $query = "INSERT INTO tb_kelola
                VALUES
                ('', '$pelanggan', '$alamat', '$kota', '$no_hp', '$tipe', '$item', '$total', '$kode_barang', '$harga', '$gambar', '$konfirmasi')
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


// cek apakah tombol beli sudah ditekan atau belum
if (isset($_POST["beli"])) {

    // cek apakah data berhasi di tambahkan atau tidak
    if (beli($_POST) > 0) {
        echo "
        <script>
            alert('Pesanan anda sedang di proses');
            document.location.href = 'keranjang.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Pesanan anda gagal di proses');
            document.location.href = 'beranda.php';
        </script>
        ";
    }
}

?>

<!DOCTYPE HTML>
<html>

<head>
    <title>form pemesanan</title>
    <link rel="stylesheet" href="styleform.css">
</head>

<body>
    <div class="container">
        <h1>Form Pembelian</h1>

        <?php $konfirmasi = 1;  ?>
        <form action="" method="post">
            <input type="hidden" name="gambar" value="<?= $dt["gambar_barang"]; ?>">
            <input type="hidden" name="kode_barang" value="<?= $dt["kode_barang"]; ?>">
            <input type="hidden" name="konfirmasi" value="<?= $konfirmasi;  ?>">

            <label id="pelanggan">Nama Pembeli</label>
            <br>
            <input type="text" name="pelanggan">
            <br>
            <label id="alamat">Alamat</label>
            <br>
            <input type="text" name="alamat">
            <br>
            <label id="kota">Kota</label>
            <br>
            <input type="text" name="kota">
            <br>
            <label id="no_hp">No Hp</label>
            <br>
            <input type="text" name="no_hp">
            <br>
            <label id="tipe">Tipe Motor</label>
            <br>
            <input type="text" readonly value="<?= $dt["nama_barang"]; ?>" name="tipe">
            <br>
            <label id="tipe">Jumlah Item</label>
            <br>
            <input type="text" name="item">
            <br>
            <label id="harga">Harga Barang</label>
            <br>
            <input type="text" readonly name="harga" value="<?= $dt["harga_barang"]; ?>">
            <br>
            <button type="submit" name="beli">Beli</button>
        </form>
    </div>
</body>

</html>