<?php

include_once 'header_admin.php';

?>

<div class="container">
    <div class="row">
        <div class="col">



            <br>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#jual">
                Jual Produk
            </button><br><br><br>



            <!-- Modal untuk Tambah Data Produk -->
            <div class="modal fade" id="jual" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Jual Produk</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for="gambar_barang" class="col-sm-2 col-form-label">Gambar Produk</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="gambar_barang" id="gambar_barang">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama Produk</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama_barang" required autocomplete="off" id="nama_barang" placeholder="Nama Produk" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Merek Produk</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="merek_barang" required autocomplete="off" id="merek_barang" placeholder="Merek Produk" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Warna Produk</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="warna_barang" required autocomplete="off" id="warna_barang" placeholder="Warna Produk" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Harga Produk</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="harga_barang" required autocomplete="off" id="harga_barang" placeholder="Harga Produk" autocomplete="off">
                                    </div>
                                </div>
                                <div class=" form-group row">
                                    <label for="rincian_produk" class="col-sm-2 col-form-label">Rincian</label>
                                    <div class="col-sm-10">
                                        <input type="textarea" class="form-control" name="rincian_barang" required autocomplete="off" id="rincian_barang" placeholder="Rincian">
                                    </div>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="jual" class="btn btn-success">Jual</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php $j = 0; ?>
            <?php foreach ($data as $row) : $k = ++$j;
            endforeach; ?>
            <!-- Untuk Jumlah Produk -->
            <div class="card" style="width: 69rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Jumlah Produk Anda Saat Ini = <?= $j; ?> produk</li>
                </ul>
            </div>
            <div class="card-group">
                <!-- Card untuk menampilkan produk -->
                <?php $i = 0; ?>
                <?php foreach ($data as $row) : ?>
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="img/<?= $row["gambar_barang"]; ?>" alt="Card image cap">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <b>
                                    <?= $row["nama_barang"]; ?><br><br>
                                    Rp.<?= $row["harga_barang"]; ?>
                                </b>
                            </li>
                        </ul>
                        <div class="card-body">
                            <a class="btn btn-warning" href="ubah.php?id=<?= $row["kode_barang"]; ?>">
                                Ubah
                            </a>
                            <a type="button" class="btn btn-danger" href="hapus.php?kode_barang=<?= $row["kode_barang"]; ?>" onclick="return confirm('yakin?');" class="card-link">
                                Hapus
                            </a>

                        </div>
                    </div>
                    <?php if (++$i == 5) break;  ?>
                <?php endforeach; ?>
            </div>






        </div>
    </div>
</div>





<?php

include_once 'footer.php';


?>