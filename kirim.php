<?php

require_once 'functions.php';

// ambil data dari tabel kelola
$kelola = $result = mysqli_query($conn, "SELECT * FROM tb_kirim");









include_once 'header_admin.php';
?>




<div class="container">
    <div class="row">
        <div class="col">









            <!-- <div class="card text-center"> -->
            <h1>Barang Yang Dikirim</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Perintah</th>
                        <th scope="col">no</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Total Pembayaran</th>
                    </tr>
                </thead>
                <?php $i = 1; ?>
                <?php foreach ($kelola as $row) : ?>
                    <tbody>
                        <tr>
                            <td>
                                <a href="batalkirim.php?id=<?= $row["id"]; ?>" class="btn btn-danger">
                                    Hapus
                                </a>
                            </td>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $row["pelanggan"]; ?></td>
                            <td><?= $row["alamat"]; ?></td>
                            <td><?= $row["tipe"]; ?></td>
                            <td>Rp. <?= $row["total"]; ?></td>
                        </tr>
                    </tbody>
                <?php endforeach; ?>
            </table>
            <!-- </div> -->










        </div>
    </div>
</div>







<?php include_once 'footer.php'; ?>