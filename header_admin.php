<?php

require_once 'functions.php';

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: beranda.php");
    exit;
}



// fungsi untuk tombol jual
// cek apakah tombol jual sudah ditekan atau belum
if (isset($_POST["jual"])) {
    // cek apakah data berhasi di tambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
        <script>
            alert('produk berhasil ditambahkan');
            document.location.href = 'admin.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('produk gagal ditambahkan');
            document.location.href = 'admin.php';
        </script>
        ";
    }
}



?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
    <link rel="icon" href="img/motor.png" type="img/hear" sizes="16x16">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>

    <!-- <nav style="background-color: #2a3b4c; color: #ffffff;" class="navbar navbar-expand-lg navbar-dark"> -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffff;">
        <div class="container">
            <!-- <a class="navbar-brand" href="#">tokomotor</a> -->
            <a href="beranda.php"><img hr src="img/logo.png" alt="tokomotor"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <form action="" method="post" class="form-inline my-2 my-lg-0">
                <input name="keyword" class="form-control mr-sm-2" size="21" type="search" placeholder="Search" aria-label="Search" autocomplete="off">
                <button class="btn btn-outline-success my-2 my-sm-0" name="cari" type="submit">Search</button>
            </form>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="admin.php" class="btn btn-success">
                            Kelola Produk
                        </a>
                        <a href="kelola.php" class="btn btn-success">
                            Kelola Pesanan
                        </a>
                        <a href="kirim.php" class="btn btn-success">
                            Kelola Pengiriman
                        </a>
                        <a href="users.php" class="btn btn-success">
                            Kelola Admin
                        </a>
                        <a href="logout.php" onclick="return confirm('Anda yakin ingin Logout?');" class="btn btn-warning">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>