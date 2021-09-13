<?php


// koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_motor";

$conn = new mysqli($servername, $username, $password, $dbname);

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// ambil data dari tabel file
$data = $result = mysqli_query($conn, "SELECT * FROM tb_produk");



function uploud()
{
    $nama_gambar_barang = $_FILES['gambar_barang']['name'];
    // $ukuran_gambar_barang = $_FILES['gambar_barang']['size'];
    $error = $_FILES['gambar_barang']['error'];
    $tmpname = $_FILES['gambar_barang']['tmp_name'];

    // cek apakah tidak ada file yang di uploud
    if ($error === 4) {
        echo "<script>
				alert('pilih gambar terlebih dahulu');
			</script>";
        return false;
    }

    // cek file apa yang boleh diuploud
    $ekstensi = ['jpg', 'jpeg', 'png'];
    $ekstensiFile = explode('.', $nama_gambar_barang);
    $ekstensiFile = strtolower(end($ekstensiFile));
    if (!in_array($ekstensiFile, $ekstensi)) {
        echo "<script>
				alert('format file anda tidak didukung');
			</script>";
        return false;
    }

    // cek batas ukuran gambar_barang
    // if ($ukuran_gambar_barang > 1000000) {
    //     echo "<script>
    // 			alert('ukuran file terlalu besar');
    // 		</script>";
    //     return false;
    // }

    // generate nama file baru
    $nama_baru_gambar_barang = uniqid();
    $nama_baru_gambar_barang .= '.';
    $nama_baru_gambar_barang .= $ekstensiFile;

    // lolos pengecekan, fle siap diuploud
    move_uploaded_file($tmpname, 'img/' . $nama_baru_gambar_barang);

    return $nama_baru_gambar_barang;
}


// function untuk tambah di tabel produk
function tambah($data)
{
    global $conn;
    // ambil data dari tiap elemen dalam form
    $nama_barang = htmlspecialchars($data["nama_barang"]);
    $merek_barang = htmlspecialchars($data["merek_barang"]);
    $warna_barang = htmlspecialchars($data["warna_barang"]);
    $harga_barang = htmlspecialchars($data["harga_barang"]);
    $rincian_barang = htmlspecialchars($data["rincian_barang"]);

    // uploud gambar_barang
    $gambar_barang = uploud();
    if (!$gambar_barang) {
        return false;
    }

    // query insert data
    $query = "INSERT INTO tb_produk
                VALUES
                ('', '$gambar_barang', '$nama_barang', '$merek_barang', '$warna_barang', '$harga_barang', '$rincian_barang')
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// function untuk menghapus data
function hapus($kode_barang)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_produk WHERE kode_barang = $kode_barang");

    return mysqli_affected_rows($conn);
}

// function untuk ubah data file
function ubah($data)
{
    global $conn;
    // ambil data dari tiap elemen dalam form
    $kode_barang = $data["kode_barang"];
    $gambar_lama = htmlspecialchars($data["gambar_lama"]);
    $nama_barang = htmlspecialchars($data["nama_barang"]);
    $merek_barang = htmlspecialchars($data["merek_barang"]);
    $warna_barang = htmlspecialchars($data["warna_barang"]);
    $harga_barang = htmlspecialchars($data["harga_barang"]);
    $rincian_barang = htmlspecialchars($data["rincian_barang"]);

    // // cek apakah user pilih file baru atau tidak
    // if ($_FILES['gambar_barang']['size'] == 0) {
    //     $file = $gambar_lama;
    // } else {
    //     $file = uploud();
    // }

    // cek apakah user pilih file baru atau tidak
    if ($_FILES['gambar_barang']['error'] === 4) {
        $file = $gambar_lama;
    } else {
        $file = uploud();
    }

    // query insert data
    $query = "UPDATE tb_produk SET
				gambar_barang = '$file',
				nama_barang = '$nama_barang',
				merek_barang = '$merek_barang',
				warna_barang = '$warna_barang',
				harga_barang = '$harga_barang',
				rincian_barang = '$rincian_barang'
				WHERE kode_barang = $kode_barang
				";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// function untuk cari data tabel file
function cari($keyword)
{
    $query = "SELECT * FROM tb_produk
				WHERE
			nama_barang LIKE '%$keyword%'
				";

    return query($query);
}
// tombol cari ditekan
if (isset($_POST["cari"])) {
    $data = cari($_POST["keyword"]);
}


// function untuk registrasi
function registrasi($data)
{
    global $conn;

    $username = strtolower(stripcslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username udah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
				alert('username sudah terdaftar');
			</script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
				alert('konfirmasi password tidak sesuai');
			</script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}
