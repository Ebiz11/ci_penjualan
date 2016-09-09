-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 31 Jul 2016 pada 19.37
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
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(2, 'admin', 'admin123');

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
(1, 'Jeruk Manis', 4000, 5000, 28, '2016-07-17'),
(2, 'Mangga Arum Manis', 1500, 2500, 21, '2016-07-18'),
(3, 'Kiwi', 3000, 4000, 53, '2016-07-18'),
(4, 'Melon', 7000, 8000, 19, '2016-07-18'),
(5, 'Anggur', 5000, 6000, 16, '2016-07-18'),
(6, 'Rinso', 5600, 6500, 16, '2016-07-21'),
(7, 'Kopi', 2000, 3000, 6, '2016-07-21'),
(8, 'Sikat Gigi', 6000, 7000, 24, '2016-07-21'),
(9, 'Sabun', 4000, 4500, 17, '2016-07-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
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
(8, 6, 12, 10, 0, '2016-07-21'),
(9, 7, 13, 6, 0, '2016-07-21'),
(10, 8, 14, 4, 0, '2016-07-21'),
(11, 9, 15, 2, 8000, '2016-07-21'),
(12, 8, 18, 21, 400000, '2016-07-29'),
(13, 9, 19, 12, 320000, '2016-07-29'),
(14, 9, 20, 4, 20000, '2016-07-29');

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
(19, 7, 16, 2, 6000, '2016-07-21'),
(20, 8, 16, 1, 7000, '2016-07-21'),
(21, 9, 16, 1, 4500, '2016-07-21'),
(22, 7, 17, 4, 12000, '2016-07-23'),
(23, 6, 17, 4, 26000, '2016-07-23'),
(24, 3, 17, 1, 4000, '2016-07-23');

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
-- Struktur dari tabel `tb_kotaindonesia`
--

CREATE TABLE `tb_kotaindonesia` (
  `id` int(3) NOT NULL,
  `nama_kota` varchar(50) DEFAULT NULL,
  `ibu_kota` varchar(50) DEFAULT NULL,
  `keterangan` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kotaindonesia`
--

INSERT INTO `tb_kotaindonesia` (`id`, `nama_kota`, `ibu_kota`, `keterangan`) VALUES
(1, 'Medan', 'Medan', 'Kota medan adalah ibukota Provinsi Sumatera Utara'),
(2, 'Tapanuli Utara', 'Tarutung', 'Tapanuli Utara atau sering disebut TAPUT adalah sebuah tempat sejuk'),
(3, 'Jakarta', 'Jakarta', 'Jakarta Megapolitan Ibukota Negara Republik Indonesia'),
(4, 'Padang', 'Padang', 'Padang adalah tempat wisata jam gadang, disana terdapat jembatan yang membelah sungai musi'),
(5, 'Deliserdang', 'Lubuk Pakam', 'Sebuah kota sebelum medan yang kita pijak pertama sekali jika lewat udara (Bandara Kualanamu).');

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
(20, 20000, 'beli', '2016-07-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tb_kotaindonesia`
--
ALTER TABLE `tb_kotaindonesia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tb_kotaindonesia`
--
ALTER TABLE `tb_kotaindonesia`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
