<?php
require 'functions.php';

$id = $_GET["id"];

// function untuk menghapus data
function batalkirim($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_kirim WHERE id = $id");

    return mysqli_affected_rows($conn);
}

if (batalkirim($id) > 0) {
    echo "
<script>
    alert('Pesanan Dihapus');
    document.location.href = 'kirim.php';
</script>
";
} else {
    echo "
<script>
    alert('Pesanan Gagal Dihapus');
    document.location.href = 'kirim.php';
</script>
";
}
