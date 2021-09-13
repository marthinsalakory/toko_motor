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


// function untuk menghapus data
function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM users WHERE id = $id");

    return mysqli_affected_rows($conn);
}


$id = $_GET["id"];

if (hapus($id) > 0) {
    echo "
        <script>
            alert('Admin berhasil dihapus');
            document.location.href = 'users.php';
        </script>
        ";
} else {
    echo "
        <script>
            alert('Admin gagal dihapus');
            document.location.href = 'users.php';
        </script>
        ";
}
