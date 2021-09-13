<?php

include_once 'functions.php';

// ambil data dari url
$id = $_GET["id"];

// query data tb_produk berdasarkan id-nya
$dt = query("SELECT * FROM tb_produk WHERE kode_barang = $id")[0];


include_once 'header.php';

?>



<div class="container">
    <div class="row">
        <div class="col">


            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img height="200px" width="200px" src="img/<?= $dt["gambar_barang"]; ?>" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $dt["nama_barang"]; ?></h5>
                            <p class="card-text">Merek Barang: <?= $dt["merek_barang"]; ?></p>
                            <p class="card-text">Warna Barang: <?= $dt["warna_barang"]; ?></p>
                            <p class="card-text">Harga Barang: <?= $dt["harga_barang"]; ?></p>
                            <p class="card-text">Rincian Barang: <?= $dt["rincian_barang"]; ?></p>
                            <div class="card-body">
                                <a href="beranda.php" class="btn btn-warning">
                                    Kembali
                                </a>
                                <a href="beli.php?id=<?= $dt["kode_barang"]; ?>" class="btn btn-success">
                                    Beli
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>
</div>







<?php include 'footer.php'; ?>