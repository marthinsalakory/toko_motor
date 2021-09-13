<?php

require_once 'functions.php';

// ambil data dari tabel kelola
$kelola = $result = mysqli_query($conn, "SELECT * FROM tb_kelola");









include_once 'header.php';
?>




<div class="container">
    <div class="row">
        <div class="col">









            <!-- <div class="card text-center"> -->
            <h1>Keranjang Saya</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Perintah</th>
                        <th scope="col">no</th>
                        <th scope="col">Kode Penjualan</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Kota</th>
                        <th scope="col">No Hp</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah Item</th>
                        <th scope="col">Total</th>
                        <th scope="col">Kode Produk</th>
                    </tr>
                </thead>
                <?php $i = 1; ?>
                <?php foreach ($kelola as $row) : ?>
                    <tbody>
                        <tr>
                            <td>
                                <a href="batal.php?id=<?= $row["id"]; ?>" class="btn btn-danger">
                                    Batal
                                </a>
                            </td>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $row["id"]; ?></td>
                            <td><?= $row["pelanggan"]; ?></td>
                            <td><?= $row["alamat"]; ?></td>
                            <td><?= $row["kota"]; ?></td>
                            <td><?= $row["no_hp"]; ?></td>
                            <td><img src="img/<?= $row["gambar"]; ?>" width="50px" height="50px"></td>
                            <td><?= $row["tipe"]; ?></td>
                            <td><?= $row["harga"]; ?></td>
                            <td><?= $row["item"]; ?></td>
                            <td><?= $row["total"]; ?></td>
                            <td><?= $row["kode_barang"]; ?></td>
                        </tr>
                    </tbody>
                <?php endforeach; ?>
            </table>
            <!-- </div> -->










        </div>
    </div>
</div>







<?php include_once 'footer.php'; ?>