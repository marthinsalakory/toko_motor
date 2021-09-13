<?php
require 'functions.php';

$kode_barang = $_GET["kode_barang"];

if (hapus($kode_barang) > 0) {
    echo "
        <script>
            alert('data berhasil dihapus');
            document.location.href = 'admin.php';
        </script>
        ";
} else {
    echo "
        <script>
            alert('data gagal dihapus');
            document.location.href = 'admin.php';
        </script>
        ";
}
