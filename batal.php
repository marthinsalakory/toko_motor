<?php
require 'functions.php';

$id = $_GET["id"];

// function untuk menghapus data
function batal($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_kelola WHERE id = $id");

    return mysqli_affected_rows($conn);
}

if (batal($id) > 0) {
    echo "
        <script>
            alert('Pesanan Dibatalkan');
            document.location.href = 'kelola.php';
        </script>
        ";
} else {
    echo "
        <script>
            alert('Pesanan Gagal Dibatalkan');
            document.location.href = 'kelola.php';
        </script>
        ";
}
