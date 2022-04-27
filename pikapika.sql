-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2019 at 05:45 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pikapika`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(3) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `password`, `nama`) VALUES
(1, 'hatano@gmail.com', '123', 'Hatano Wataru');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id_jenis` int(3) NOT NULL,
  `jenis_barang` varchar(20) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `lama_proses` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenis`, `jenis_barang`, `harga`, `lama_proses`) VALUES
(1, 'Pakaian', '8000', '3 Hari'),
(2, 'Boneka', '8000', '4 Hari'),
(3, 'Karpet', '10000', '7 Hari'),
(4, 'Tas', '15000', '5 Hari'),
(5, 'Sepatu', '15000', '5 Hari');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(3) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `telepon` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email`, `password`, `nama`, `telepon`) VALUES
(1, 'akasuna@gmail.com', '123', 'Akasuna Hera', '081299153864'),
(2, 'hatano@seiyuu.jpn', '123', 'Hatano Wataru', '087772571215'),
(3, 'doppo@hypnosismic.matenrou', '123', 'Kannonzaka Doppo', '081215061603'),
(4, 'gentaro@hypnosismic.fps', '123', 'Yumeno Gentaro', '081112511215');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(3) NOT NULL,
  `id_pelanggan` int(3) NOT NULL,
  `id_jenis` int(3) NOT NULL,
  `berat` int(3) NOT NULL,
  `total` varchar(10) NOT NULL,
  `pembayaran` varchar(20) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `waktu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_pelanggan`, `id_jenis`, `berat`, `total`, `pembayaran`, `tanggal`, `waktu`) VALUES
(16, 1, 5, 2, '30000', 'T-Cash', '07-12-2018', '14:54:37'),
(17, 2, 3, 2, '20000', 'GoPay', '03-03-2019', '21:13:10'),
(18, 1, 1, 2, '16000', 'T-Cash', '03-03-2019', '22:08:36');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_laundry`
--

CREATE TABLE `pemesanan_laundry` (
  `id_laundry` int(3) NOT NULL,
  `id_pemesanan` int(3) NOT NULL,
  `id_pelanggan` int(3) NOT NULL,
  `id_jenis` int(3) NOT NULL,
  `total` varchar(10) NOT NULL,
  `pembayaran` varchar(20) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `waktu` varchar(20) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan_laundry`
--

INSERT INTO `pemesanan_laundry` (`id_laundry`, `id_pemesanan`, `id_pelanggan`, `id_jenis`, `total`, `pembayaran`, `tanggal`, `waktu`, `status`) VALUES
(21, 16, 1, 5, '30000', 'T-Cash', '07-12-2018', '14:54:37', 'Pencucian Selesai'),
(22, 17, 2, 3, '20000', 'GoPay', '03-03-2019', '21:13:10', 'Dalam Proses'),
(23, 18, 1, 1, '16000', 'T-Cash', '03-03-2019', '22:08:36', 'Dalam Proses');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `pemesanan_laundry`
--
ALTER TABLE `pemesanan_laundry`
  ADD PRIMARY KEY (`id_laundry`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id_jenis` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pemesanan_laundry`
--
ALTER TABLE `pemesanan_laundry`
  MODIFY `id_laundry` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
