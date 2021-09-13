<?php

include_once 'functions.php';

// ambil data dari tabel file
$admin = $result = mysqli_query($conn, "SELECT * FROM users");







include_once 'header_admin.php';
?>

<div class="container">
    <div class="row">
        <div class="col">



            <div class="card text-center">
                <h1>Tabel Admin</h1>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#admin">
                    Tambah Admin Baru
                </button>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Aksi</th>
                            <th scope="col">No</th>
                            <th scope="col">Nama Admin</th>
                        </tr>
                    </thead>
                    <?php $i = 1; ?>
                    <?php foreach ($admin as $row) : ?>
                        <tbody>
                            <tr>
                                <td>
                                    <a type="button" class="btn btn-danger" href="hapusadmin.php?id=<?= $row["id"]; ?>" onclick="return confirm('Anda yakin ingin Menghapus?');" class="card-link">
                                        Hapus
                                    </a>
                                </td>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $row["username"]; ?></td>
                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>


        <?php


        if (isset($_POST["register"])) {
            if (registrasi($_POST) > 0) {
                echo "<script>
		alert('user baru berhasil ditambahkan');
		</script>";
            } else {
                echo mysqli_error($conn);
            }
        }
        ?>

        <!-- Modal untuk tambah admin baru -->
        <div class="modal fade" id="admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Admin Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="" method="post">
                            <div class=" form-group row">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="username" required autocomplete="off" id="Username" placeholder="Username">
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password" required autocomplete="off" id="password" placeholder="password">
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label for="password2" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password2" required autocomplete="off" id="password2" placeholder="password2">
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="register" class="btn btn-success">Tambah</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>





    </div>
</div>
</div>






<?php include_once 'footer.php'; ?>