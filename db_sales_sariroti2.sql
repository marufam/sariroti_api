-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 27, 2017 at 08:47 AM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sales_sariroti2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `foto` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `foto`) VALUES
(2, 'hahah12ah', '12121', '1212123');

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `id_hari` int(10) NOT NULL,
  `hari` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`id_hari`, `hari`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jumat'),
(6, 'Sabtu'),
(7, 'Minggu');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(10) NOT NULL,
  `id_hari` int(11) NOT NULL,
  `id_karyawan` int(10) NOT NULL,
  `id_lokasi` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_hari`, `id_karyawan`, `id_lokasi`) VALUES
(1, 7, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(10) NOT NULL,
  `nama_karyawan` varchar(25) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `jk` enum('pria','wanita') NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL,
  `foto` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `tempat_lahir`, `tgl_lahir`, `alamat`, `jk`, `username`, `password`, `foto`) VALUES
(1, 'Amie', 'Jember', '1996-05-12', 'Jember', '', 'username', 'password', '11-05-2017-17-12-12.png'),
(2, 'Amien42', 'Malang', '1996-05-12', 'jljl', 'pria', 'admin', 'admin', '27-08-2017-16-06-34.png'),
(3, 'Moch Maruf Amien', 'Jember', '2017-05-13', 'Jember', '', 'amien123', 'amien123', '06-05-2017-46-12-17.png'),
(4, 'Moch Maruf Amien', 'Jember', '2017-05-13', 'Jember', '', 'amien123', 'amien123', '06-05-2017-17-12-21.png'),
(5, 'Moch Maruf', 'Jember', '2017-05-13', 'Jember', '', 'amien123', 'amien123', '10-05-2017-15-12-05.png');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(10) NOT NULL,
  `foto_laporan` varchar(25) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `foto_laporan`, `deskripsi`, `status`, `tanggal`, `id_karyawan`, `id_lokasi`) VALUES
(15, '27-08-2017-49-08-44.png', 'yup', 0, '2017-08-27', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(10) NOT NULL,
  `nama_lokasi` varchar(20) NOT NULL,
  `longtitude` varchar(25) NOT NULL,
  `latitude` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `nama_lokasi`, `longtitude`, `latitude`) VALUES
(1, 'Malang asasas', '112.632632', '-7.966620'),
(2, 'Apa ini', '112.615925', '-7.943132'),
(3, 'apa ini2', '112.618908', '-7.943281'),
(4, 'Apa ini3', '112.617170', '-7.942048'),
(5, 'apa ini4', '112.615131', '-7.949401');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_laporan` int(11) NOT NULL,
  `id_roti` int(11) NOT NULL,
  `jumlah_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_laporan`, `id_roti`, `jumlah_jual`) VALUES
(15, 1, 23);

-- --------------------------------------------------------

--
-- Table structure for table `roti`
--

CREATE TABLE `roti` (
  `id_roti` int(11) NOT NULL,
  `nama_roti` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `target` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roti`
--

INSERT INTO `roti` (`id_roti`, `nama_roti`, `harga`, `target`) VALUES
(1, 'backery', 1200, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_laporan`,`id_roti`);

--
-- Indexes for table `roti`
--
ALTER TABLE `roti`
  ADD PRIMARY KEY (`id_roti`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `roti`
--
ALTER TABLE `roti`
  MODIFY `id_roti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
