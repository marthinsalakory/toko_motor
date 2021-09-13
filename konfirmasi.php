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

// ambil data dari url
$id = $_GET["id"];

// query data file berdasarkan id-nya
$dt = query("SELECT * FROM tb_kelola WHERE id = $id")[0];

// function untuk konfirmasi pesanan
function konfirmasi($data)
{
    global $dt;
    global $conn;
    // ambil data
    $pelanggan = $dt["pelanggan"];
    $tipe = $dt["tipe"];
    $total = $dt["total"];
    $alamat = $dt["alamat"];

    // query insert data
    $query = "INSERT INTO tb_kirim
                VALUES
                ('', '$pelanggan', '$tipe', '$total', '$alamat')
                ";
    mysqli_query($conn, $query);

    mysqli_query($conn, "DELETE FROM tb_kelola WHERE id = $data");

    return mysqli_affected_rows($conn);
}



// cek apakah data berhasi di Terkonfirmasi atau tidak
if (konfirmasi($id) > 0) {
    echo "
        <script>
            alert('Pesanan Terkonfirmasi');
            document.location.href = 'kirim.php';
        </script>
        ";
} else {
    echo "
        <script>
            alert('Pesanan gagal Dikonfirmasi');
            document.location.href = 'kelola.php';
        </script>
        ";
}
