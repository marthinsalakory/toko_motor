<?php

include_once 'functions.php';




include_once 'header.php';

?>


<div class="container">
    <div class="row">
        <div class="col">







            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="img/1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/3.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <br><br><br>


            <!-- Card untuk menampilkan produk -->
            <?php $j = 0; ?>
            <?php foreach ($data as $row) : $k = ++$j;
            endforeach; ?>
            <!-- Untuk Jumlah Produk -->
            <div class="card" style="width: 69rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Ada <?= $j; ?> produk tersisa, silahkan cari menggunakan kolom search</li>
                </ul>
            </div>
            <div class="card-group">
                <?php $i = 0 ?>
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

                            <a href="rincian.php?id=<?= $row["kode_barang"]; ?>" class="btn btn-success">
                                Rincian
                            </a>
                            <a href="beli.php?id=<?= $row["kode_barang"]; ?>" class="btn btn-success">
                                Beli
                            </a>
                        </div>
                    </div>
                    <?php if (++$i == 5) break;  ?>
                <?php endforeach; ?>
            </div>











            <!-- Modal -->
            <div class="modal fade" id="beli" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Pembelian</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group row">
                                    <label for="pelanggan" class="col-sm-2 col-form-label">Nama:</label>
                                    <div class="col-sm-10">
                                        <input type="pelanggan" class="form-control" id="inputpelanggan" placeholder="Nama Pelanggan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jumlah_item" class="col-sm-2 col-form-label">Item:</label>
                                    <div class="col-sm-10">
                                        <input type="jumlah_item" class="form-control" id="inputjumlah_item" placeholder="Jumlah Item">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputalamat" placeholder="Alamat Anda">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="beli" class="btn btn-success">Beli Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
















            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>











        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>