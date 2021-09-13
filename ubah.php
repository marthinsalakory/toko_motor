<?php

require 'functions.php';

// ambil data dari url
$id = $_GET["id"];

// query data file berdasarkan id-nya
$dt = query("SELECT * FROM tb_produk WHERE kode_barang = $id")[0];



// cek apakah tombol diubah sudah ditekan atau belum
if (isset($_POST["ubah"])) {

    // cek apakah data berhasi di tambahkan atau tidak
    if (ubah($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil diubah');
            document.location.href = 'admin.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal diubah');
            document.location.href = 'admin.php';
        </script>
        ";
    }
}




include_once 'header_admin.php';
?>


<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="kode_barang" value="<?= $dt["kode_barang"]; ?>">
    <input type="hidden" name="gambar_lama" value="<?= $dt["gambar_barang"]; ?>">
    <div class="form-group row">
        <label for="gambar_barang" class="col-sm-2 col-form-label">Gambar Produk</label>
        <img src="img/<?= $dt["gambar_barang"]; ?>" alt="" width="100"><br>
        <div class="col-sm-10">
            <input type="file" class="form-control" name="gambar_barang" id="gambar_barang">
        </div>
    </div>
    <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Nama Produk</label>
        <div class="col-sm-10">
            <input type="text" value="<?= $dt["nama_barang"]; ?>" class="form-control" name="nama_barang" required autocomplete="off" id="nama_barang" placeholder="Nama Produk" autocomplete="off">
        </div>
    </div>
    <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Merek Produk</label>
        <div class="col-sm-10">
            <input type="text" value="<?= $dt["merek_barang"]; ?>" class="form-control" name="merek_barang" required autocomplete="off" id="merek_barang" placeholder="Merek Produk" autocomplete="off">
        </div>
    </div>
    <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Warna Produk</label>
        <div class="col-sm-10">
            <input type="text" value="<?= $dt["warna_barang"]; ?>" class="form-control" name="warna_barang" required autocomplete="off" id="warna_barang" placeholder="Warna Produk" autocomplete="off">
        </div>
    </div>
    <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Harga Produk</label>
        <div class="col-sm-10">
            <input type="number" value="<?= $dt["harga_barang"]; ?>" class="form-control" name="harga_barang" required autocomplete="off" id="harga_barang" placeholder="Harga Produk" autocomplete="off">
        </div>
    </div>
    <div class=" form-group row">
        <label for="rincian_produk" class="col-sm-2 col-form-label">Rincian</label>
        <div class="col-sm-10">
            <input type="textarea" value="<?= $dt["rincian_barang"]; ?>" class="form-control" name="rincian_barang" required autocomplete="off" id="rincian_barang" placeholder="Rincian">
        </div>
    </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="ubah">Ubah Sekarang</button>
    </div>
    </div>
</form>





<?php

include_once 'footer.php';

?>