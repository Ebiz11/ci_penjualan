-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12 Sep 2016 pada 03.56
-- Versi Server: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_penjualan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama_lengkap` varchar(20) NOT NULL,
  `level` enum('admin','karyawan','supplier') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama_lengkap`, `level`) VALUES
('admin', 'admin123', '', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga_beli`, `harga_jual`, `stok`, `tanggal`) VALUES
(1, 'Jeruk Manis', 4000, 5000, 38, '2016-07-17'),
(20, 'Mangga', 16000, 18000, 2, '2016-09-09'),
(26, 'Apel', 12000, 13000, 14, '2016-09-09'),
(28, 'Kiwi', 34000, 36000, 46, '2016-09-09'),
(29, 'Semangka', 12000, 13000, 10, '2016-09-09'),
(37, 'Kelengkeng', 12000, 14000, 12, '2016-09-09'),
(46, 'Buah Naga', 21000, 24000, 41, '2016-09-11'),
(47, 'Kurma Muda', 12000, 14000, 4, '2016-09-11'),
(48, 'Melon', 16000, 18000, 8, '2016-09-11'),
(49, 'Durian', 60000, 68000, 11, '2016-09-11'),
(51, 'Belimbing', 16000, 18000, 8, '2016-09-11'),
(52, 'Jeruk Bali', 24000, 26000, 20, '2016-09-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_barang`, `id_transaksi`, `jumlah`, `sub_total`, `tanggal`) VALUES
(7, 5, 11, 9, 126000, '2016-07-21'),
(8, 6, 12, 10, 210000, '2016-07-21'),
(9, 7, 13, 6, 300000, '2016-07-21'),
(10, 8, 14, 4, 100000, '2016-07-21'),
(11, 9, 15, 2, 8000, '2016-07-21'),
(12, 8, 18, 21, 400000, '2016-07-29'),
(13, 9, 19, 12, 320000, '2016-07-29'),
(14, 9, 20, 4, 20000, '2016-07-29'),
(15, 11, 23, 20, 400000, '2016-08-20'),
(16, 12, 24, 24, 192000, '2016-08-20'),
(17, 13, 25, 11, 550000, '2016-08-20'),
(18, 14, 28, 2, 224, '2016-09-04'),
(19, 15, 29, 6, 672, '2016-09-04'),
(20, 16, 30, 4, 1332, '2016-09-04'),
(21, 14, 36, 10, 120000, '2016-09-05'),
(22, 15, 37, 16, 240000, '2016-09-08'),
(23, 16, 38, 15, 180000, '2016-09-08'),
(24, 17, 39, 16, 640000, '2016-09-09'),
(25, 18, 40, 10, 300000, '2016-09-09'),
(26, 19, 41, 0, 0, '2016-09-09'),
(27, 20, 42, 10, 120000, '2016-09-09'),
(28, 21, 43, 0, 0, '2016-09-09'),
(29, 22, 44, 2, 9110, '2016-09-09'),
(30, 23, 45, 3, 12000, '2016-09-09'),
(31, 24, 46, 10, 30000, '2016-09-09'),
(32, 25, 47, 1, 3444, '2016-09-09'),
(33, 26, 48, 14, 168000, '2016-09-09'),
(34, 27, 49, 8, 64000, '2016-09-09'),
(35, 28, 50, 46, 1564000, '2016-09-09'),
(36, 29, 51, 12, 144000, '2016-09-09'),
(37, 30, 52, 19, 304000, '2016-09-09'),
(38, 31, 53, 16, 384000, '2016-09-09'),
(39, 32, 54, 12, 144000, '2016-09-09'),
(40, 33, 55, 10, 125000, '2016-09-09'),
(41, 34, 56, 11, 242000, '2016-09-09'),
(42, 35, 57, 12, 12000, '2016-09-09'),
(43, 36, 58, 11, 13200, '2016-09-09'),
(44, 37, 59, 22, 726, '2016-09-09'),
(45, 38, 60, 66, 800052, '2016-09-09'),
(46, 39, 61, 11, 13442, '2016-09-09'),
(47, 35, 62, 12, 25596, '2016-09-09'),
(48, 36, 63, 2, 0, '2016-09-09'),
(49, 37, 64, 12, 144000, '2016-09-09'),
(50, 38, 65, 10, 50000, '2016-09-11'),
(51, 39, 66, 2, 644, '2016-09-11'),
(52, 40, 67, 33, 14652, '2016-09-11'),
(53, 41, 68, 4, 2664, '2016-09-11'),
(54, 42, 69, 6, 2664, '2016-09-11'),
(55, 43, 70, 9, 108000, '2016-09-11'),
(56, 44, 71, 7, 6993, '2016-09-11'),
(57, 45, 72, 1, 433, '2016-09-11'),
(58, 46, 73, 4, 4008, '2016-09-11'),
(59, 47, 74, 6, 72000, '2016-09-11'),
(60, 48, 75, 8, 128000, '2016-09-11'),
(61, 49, 76, 11, 660000, '2016-09-11'),
(62, 50, 77, 6, 66000, '2016-09-11'),
(63, 51, 78, 10, 160000, '2016-09-11'),
(64, 52, 79, 5, 385, '2016-09-11'),
(65, 53, 80, 5, 3330, '2016-09-11'),
(66, 54, 81, 3, 1665, '2016-09-11'),
(67, 55, 82, 5, 220, '2016-09-11'),
(68, 47, 83, 4, 20000, '2016-09-11'),
(69, 52, 84, 30, 600000, '2016-09-11'),
(70, 52, 85, 6, 12000, '2016-09-11'),
(71, 1, 92, 40, 1200000, '2016-09-11'),
(72, 52, 94, 20, 480000, '2016-09-12'),
(73, 46, 95, 40, 600000, '2016-09-12');

--
-- Trigger `pembelian`
--
DELIMITER $$
CREATE TRIGGER `t_beli` AFTER INSERT ON `pembelian` FOR EACH ROW BEGIN
 UPDATE barang SET stok=stok+NEW.jumlah
  WHERE id_barang=NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_barang`, `id_transaksi`, `jumlah`, `sub_total`, `tanggal`) VALUES
(27, 1, 22, 6, 30000, '2016-08-20'),
(28, 2, 22, 2, 5000, '2016-08-20'),
(29, 11, 26, 2, 44000, '2016-08-20'),
(30, 12, 26, 4, 36000, '2016-08-20'),
(31, 13, 26, 3, 162000, '2016-08-20'),
(32, 1, 27, 6, 30000, '2016-09-01'),
(33, 2, 27, 4, 10000, '2016-09-01'),
(34, 3, 27, 6, 24000, '2016-09-01'),
(35, 1, 86, 6, 30000, '2016-09-11'),
(36, 29, 86, 2, 26000, '2016-09-11'),
(37, 20, 86, 4, 72000, '2016-09-11'),
(38, 1, 87, 4, 20000, '2016-09-11'),
(39, 20, 87, 2, 36000, '2016-09-11'),
(40, 1, 88, 4, 20000, '2016-09-11'),
(41, 20, 88, 2, 36000, '2016-09-11'),
(42, 51, 88, 2, 36000, '2016-09-11'),
(43, 46, 88, 2, 48000, '2016-09-11'),
(44, 1, 89, 1, 5000, '2016-09-11'),
(45, 20, 89, 2, 36000, '2016-09-11'),
(46, 1, 90, 1, 5000, '2016-09-11'),
(47, 20, 91, 2, 36000, '2016-09-11'),
(48, 47, 91, 4, 56000, '2016-09-11'),
(49, 1, 93, 2, 10000, '2016-09-12'),
(50, 20, 93, 2, 36000, '2016-09-12'),
(51, 46, 93, 4, 96000, '2016-09-12'),
(52, 47, 93, 2, 28000, '2016-09-12');

--
-- Trigger `penjualan`
--
DELIMITER $$
CREATE TRIGGER `t_jual` AFTER INSERT ON `penjualan` FOR EACH ROW BEGIN
 UPDATE barang SET stok=stok-NEW.jumlah
WHERE id_barang=NEW.id_barang;
 END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `kd_supplier` varchar(20) NOT NULL,
  `nama_supplier` varchar(40) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `jenis_transaksi` enum('beli','jual') NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `sub_total`, `jenis_transaksi`, `tanggal`) VALUES
(11, 126000, 'beli', '2016-07-21'),
(12, 56000, 'beli', '2016-07-21'),
(13, 12000, 'beli', '2016-07-21'),
(14, 24000, 'beli', '2016-07-21'),
(15, 8000, 'beli', '2016-07-21'),
(16, 17500, 'jual', '2016-07-21'),
(17, 42000, 'jual', '2016-07-23'),
(18, 400000, 'beli', '2016-07-29'),
(19, 320000, 'beli', '2016-07-29'),
(20, 20000, 'beli', '2016-07-29'),
(21, 69500, 'jual', '2016-08-01'),
(22, 35000, 'jual', '2016-08-20'),
(23, 400000, 'beli', '2016-08-20'),
(24, 192000, 'beli', '2016-08-20'),
(25, 550000, 'beli', '2016-08-20'),
(26, 242000, 'jual', '2016-08-20'),
(27, 64000, 'jual', '2016-09-01'),
(28, 224, 'beli', '2016-09-04'),
(29, 672, 'beli', '2016-09-04'),
(30, 1332, 'beli', '2016-09-04'),
(31, 0, 'beli', '2016-09-05'),
(32, 0, 'beli', '2016-09-05'),
(33, 0, 'beli', '2016-09-05'),
(34, 0, 'beli', '2016-09-05'),
(35, 0, 'beli', '2016-09-05'),
(36, 120000, 'beli', '2016-09-05'),
(37, 240000, 'beli', '2016-09-08'),
(38, 180000, 'beli', '2016-09-08'),
(39, 640000, 'beli', '2016-09-09'),
(40, 300000, 'beli', '2016-09-09'),
(41, 0, 'beli', '2016-09-09'),
(42, 120000, 'beli', '2016-09-09'),
(43, 0, 'beli', '2016-09-09'),
(44, 9110, 'beli', '2016-09-09'),
(45, 12000, 'beli', '2016-09-09'),
(46, 30000, 'beli', '2016-09-09'),
(47, 3444, 'beli', '2016-09-09'),
(48, 168000, 'beli', '2016-09-09'),
(49, 64000, 'beli', '2016-09-09'),
(50, 1564000, 'beli', '2016-09-09'),
(51, 144000, 'beli', '2016-09-09'),
(52, 304000, 'beli', '2016-09-09'),
(53, 384000, 'beli', '2016-09-09'),
(54, 144000, 'beli', '2016-09-09'),
(55, 125000, 'beli', '2016-09-09'),
(56, 242000, 'beli', '2016-09-09'),
(57, 12000, 'beli', '2016-09-09'),
(58, 13200, 'beli', '2016-09-09'),
(59, 726, 'beli', '2016-09-09'),
(60, 800052, 'beli', '2016-09-09'),
(61, 13442, 'beli', '2016-09-09'),
(62, 25596, 'beli', '2016-09-09'),
(63, 0, 'beli', '2016-09-09'),
(64, 144000, 'beli', '2016-09-09'),
(65, 50000, 'beli', '2016-09-11'),
(66, 644, 'beli', '2016-09-11'),
(67, 14652, 'beli', '2016-09-11'),
(68, 2664, 'beli', '2016-09-11'),
(69, 2664, 'beli', '2016-09-11'),
(70, 108000, 'beli', '2016-09-11'),
(71, 6993, 'beli', '2016-09-11'),
(72, 433, 'beli', '2016-09-11'),
(73, 4008, 'beli', '2016-09-11'),
(74, 72000, 'beli', '2016-09-11'),
(75, 128000, 'beli', '2016-09-11'),
(76, 660000, 'beli', '2016-09-11'),
(77, 66000, 'beli', '2016-09-11'),
(78, 160000, 'beli', '2016-09-11'),
(79, 385, 'beli', '2016-09-11'),
(80, 3330, 'beli', '2016-09-11'),
(81, 1665, 'beli', '2016-09-11'),
(82, 220, 'beli', '2016-09-11'),
(83, 20000, 'beli', '2016-09-11'),
(84, 600000, 'beli', '2016-09-11'),
(85, 12000, 'beli', '2016-09-11'),
(86, 128000, 'jual', '2016-09-11'),
(87, 0, 'jual', '2016-09-11'),
(88, 0, 'jual', '2016-09-11'),
(89, 0, 'jual', '2016-09-11'),
(90, 0, 'jual', '2016-09-11'),
(91, 0, 'jual', '2016-09-11'),
(92, 1200000, 'beli', '2016-09-11'),
(93, 0, 'jual', '2016-09-12'),
(94, 480000, 'beli', '2016-09-12'),
(95, 600000, 'beli', '2016-09-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
