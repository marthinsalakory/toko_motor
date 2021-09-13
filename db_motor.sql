-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jan 2021 pada 14.20
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_motor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelola`
--

CREATE TABLE `tb_kelola` (
  `id` int(11) NOT NULL,
  `pelanggan` varchar(250) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `kota` varchar(200) NOT NULL,
  `no_hp` varchar(300) NOT NULL,
  `tipe` varchar(300) NOT NULL,
  `item` varchar(250) NOT NULL,
  `total` varchar(250) NOT NULL,
  `kode_barang` varchar(200) NOT NULL,
  `harga` varchar(300) NOT NULL,
  `gambar` varchar(300) NOT NULL,
  `konfirmasi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kirim`
--

CREATE TABLE `tb_kirim` (
  `id` int(11) NOT NULL,
  `pelanggan` varchar(250) NOT NULL,
  `tipe` varchar(250) NOT NULL,
  `total` int(11) NOT NULL,
  `alamat` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kirim`
--

INSERT INTO `tb_kirim` (`id`, `pelanggan`, `tipe`, `total`, `alamat`) VALUES
(4, 'Marthin', 'Motor Sport Trand', 80000000, 'Ambon');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `kode_barang` int(11) NOT NULL,
  `gambar_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `merek_barang` varchar(100) NOT NULL,
  `warna_barang` varchar(100) NOT NULL,
  `harga_barang` varchar(100) NOT NULL,
  `rincian_barang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`kode_barang`, `gambar_barang`, `nama_barang`, `merek_barang`, `warna_barang`, `harga_barang`, `rincian_barang`) VALUES
(12, '5ffa9cdb43dca.jpg', 'R25', 'Yamaha', 'Kuning', '70000000', 'Motor Keren, Silahkan Di Order'),
(13, '5ffa9d3b3a577.jpg', 'Satria 150cc', 'Yamaha', 'Hitam', '35000000', 'Satria kembali lagi dengan produk  terbaru, buruan order'),
(14, '5ffa9d7f7b2c8.jpeg', 'motor sport R25', 'Yamaha', 'Hitam', '80000000', 'Motor Sport, Gaya Trand, silahkan di order'),
(15, '5ffa9dea5012c.jpg', 'Motor Metro Klasik', 'Honda', 'Hitam', '50000000', 'Motor ini cocok sekali bagi kalian Pria Kasual, Silahkan Di order'),
(16, '5ffa9e5197798.jpg', 'Motor Klasik Now', 'Suzuki', 'Hitam', '40000000', 'Motor Klasik, Gaya Pria Klasik, buruan di order'),
(17, '5ffa9ed1067b5.jpg', 'Motor Sport Trand', 'Yamaha', 'Merah Putih', '40000000', 'Motor Sport dengan harga terjangkau, buruan di order'),
(18, '5ffa9f3c1af20.jpg', 'Motor Matic', 'Yamaha', 'Merah', '35000000', 'Cocok Bagi semua kalangan, buruan di order'),
(19, '5ffaa092566c2.jpg', 'Rx King', 'Yamaha', 'Hitam', '2900000', 'Buruan di order, stok terbatas'),
(20, '5ffaa0fddde5a.jpg', 'Matic', 'Honda', 'Putih', '35000000', 'Silahkan di order, barang bagus'),
(21, '5ffaa1792a7ea.jpg', 'Matic M123', 'Yamaha', 'biru', '21000000', 'Cocok sekali bagi anak anda, yang sedang sekolah'),
(22, '5ffaa295cfc62.jpg', 'Supra 125', 'Honda', 'Putih', '25000000', 'Supra  hadir lagi buruan di order'),
(23, '5ffaf1cf273ef.jpg', 'Motor Klasik New', 'Yamaha', 'Hitam', '60000000', 'Motor Klasik, silahkan di order'),
(24, '5ffaf25d3874e.jpg', 'Motor Sport C60', 'Yamaha', 'Hitam', '90000000', 'motor mewah, untuk gaya semakin cool'),
(25, '5ffaf4caa4291.jpg', 'Honda Thunder', 'Honda', 'Merah', '30000000', 'Motor besar, buat orang besar, silahkan di order'),
(26, '5ffaf51b4fad4.jpg', 'Xadf', 'Honda', 'Hitam', '30000000', 'Motor metik, silahkan di order'),
(27, '5ffaf573bb200.jpg', 'Honda Beat', 'Honda', 'Merah', '23000000', 'Produk terbaik, silahkan di order'),
(28, '5ffaf5cf7ca89.jpg', 'Honda CRF', 'Honda', 'Merah', '24000000', 'untuk semua kalangan, silahkan di order'),
(29, '5ffaf64128b75.png', 'New Aerox', 'Hondda', 'Hitam', '35000000', 'Honda terbaru, silahkan di order'),
(30, '5ffaf698a0311.jpg', 'Yamaha-Y15ZR', 'Yamaha', 'Hitam', '25000000', 'Yamaha terbaru, silahkan di order'),
(31, '5ffafae6354fc.jpg', 'Honda Scooupy', 'Honda', 'Abu-Abu', '23000000', 'Motor matic, gaya Clasik'),
(32, '5ffafb3323ded.jpg', 'Motor Trile', 'Honda', 'Hitam', '39000000', 'Sangat cocok bagi Pria, silahkan di order');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(4, 'admin', '$2y$10$EoSeyTt3e6JAfCRXYvCfU.7JlPCpCiZMRryYg89LsJ1PdWIDkjqmq'),
(5, 'uas', '$2y$10$Zs0UPyqqGUGBDHj9akQ4J.V5rlmpDZ3IN72rhKiNEMM6dF7Qwycei');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_kelola`
--
ALTER TABLE `tb_kelola`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kirim`
--
ALTER TABLE `tb_kirim`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_kelola`
--
ALTER TABLE `tb_kelola`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_kirim`
--
ALTER TABLE `tb_kirim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `kode_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
