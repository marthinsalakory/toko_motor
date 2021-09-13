<?php

session_start();

if (isset($_SESSION["login"])) {
	header("Location: admin.php");
	exit;
}

if (isset($_POST["login"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM users WHERE username ='$username'");


	// cek username
	if (mysqli_num_rows($result) === 1) {

		// cek password
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])) {
			// set session
			$_SESSION["login"] = true;

			header("Location: admin.php");
			exit;
		}
	}

	$error = true;


	// ambil data dari tabel file
	$data = $result = mysqli_query($conn, "SELECT * FROM tb_kirim");
	$dt = $result = mysqli_query($conn, "SELECT * FROM tb_kirim");
}


?>
<!DOCTYPE html>
<html>

<head>
	<title>Toko Motor</title>
	<link rel="icon" href="img/motor.png" type="img/hear" sizes="16x16">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>

	<!-- <nav style="background-color: #2a3b4c; color: #ffffff;" class="navbar navbar-expand-lg navbar-dark"> -->
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffff;">
		<div class="container">
			<!-- <a class="navbar-brand" href="#">tokomotor</a> -->
			<a href="admin.php"><img src="img/logo.png" alt="tokomotor"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<form action="" method="post" class="form-inline my-2 my-lg-0">
				<input name="keyword" class="form-control mr-sm-2" size="80" type="search" placeholder="Search" aria-label="Search" autocomplete="off">
				<button class="btn btn-outline-success my-2 my-sm-0" name="cari" type="submit">Search</button>
			</form>
			<div>
				<img src="img/jarak.png" alt="" height="20px" width="30px">
				<a href="keranjang.php"><img src="img/keranjang.png" alt="keranjang" height="20px" width="25px"></a>
				<img src="img/jarak.png" alt="" height="20px" width="10px">
				<button type="button" class="btn btn-transparent" data-toggle="modal" data-target="#notifikasi">
					<img src="img/lonceng.png" alt="Notifikasi" height="20px" width="25px">
				</button>
			</div>
			<div class=" collapse navbar-collapse">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#login">
							Login
						</button>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<?php if (isset($error)) : ?>
		<p style="text-align: center; color: red; font-style: italic;">username / password salah</p>
	<?php endif; ?>

	<!-- Modal untuk login -->
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Halaman Login</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<form action="" method="post">
						<div class="form-group row">
							<label for="username" class="col-sm-2 col-form-label">Username</label>
							<div class="col-sm-10">
								<input type="text" name="username" class="form-control" id="username" placeholder="Username" autofocus="on" autocomplete="off">
							</div>
						</div>
						<div class=" form-group row">
							<label for="password" class="col-sm-2 col-form-label">Password</label>
							<div class="col-sm-10">
								<input type="password" name="password" class="form-control" id="password" placeholder="Password">
							</div>
						</div>

				</div>
				<div class="modal-footer">
					<button type="submit" name="login" class="btn btn-success">Login</button>
					</form>
				</div>
			</div>
		</div>
	</div>




	<!-- Modal untuk Notifikasi -->
	<div class="modal fade" id="notifikasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Notifikasi :</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<?php // ambil data dari tabel file
					$notif = $result = mysqli_query($conn, "SELECT * FROM tb_kirim"); ?>

					<?php foreach ($notif as $row) : ?>
						<ul>
							<li>Hallo <?= $row["pelanggan"]; ?>, saat ini pesanan <?= $row["tipe"]; ?>, milik anda, sedang di antar ke alamat <?= $row["alamat"]; ?>, mohon siapkan uang sebesar Rp.<?= $row["total"]; ?> </li>
						</ul>
					<?php endforeach; ?>

				</div>
				<div class="modal-footer">
					<button type="submit" name="login" class="btn btn-success">Login</button>
				</div>
			</div>
		</div>
	</div>