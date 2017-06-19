-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 10 Mei 2017 pada 20.07
-- Versi Server: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.1.4-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sales_sariroti`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `foto` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `foto`) VALUES
(2, 'hahah12ah', '12121', '1212123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `id_karyawan` int(10) NOT NULL,
  `id_lokasi` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `tanggal`, `id_karyawan`, `id_lokasi`) VALUES
(1, '1996-05-12', 2, 1),
(2, '2017-05-17', 2, 1),
(3, '2017-05-03', 2, 2),
(4, '2017-05-03', 1, 3),
(5, '2017-05-03', 1, 4),
(6, '2017-05-03', 1, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
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
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `tempat_lahir`, `tgl_lahir`, `alamat`, `jk`, `username`, `password`, `foto`) VALUES
(1, 'Amie', 'Jember', '1996-05-12', 'Jember', '', 'username', 'password', '11-05-2017-17-12-12.png'),
(2, 'Amien42', 'Malang', '1996-05-12', 'jljl', 'pria', 'admin', 'admin', 'amien'),
(3, 'Moch Maruf Amien', 'Jember', '2017-05-13', 'Jember', '', 'amien123', 'amien123', '06-05-2017-46-12-17.png'),
(4, 'Moch Maruf Amien', 'Jember', '2017-05-13', 'Jember', '', 'amien123', 'amien123', '06-05-2017-17-12-21.png'),
(5, 'Moch Maruf', 'Jember', '2017-05-13', 'Jember', '', 'amien123', 'amien123', '10-05-2017-15-12-05.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(10) NOT NULL,
  `id_jadwal` int(10) NOT NULL,
  `foto_laporan` varchar(25) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `id_jadwal`, `foto_laporan`, `deskripsi`) VALUES
(1, 1, 'aa', 'aaa'),
(2, 4, 'bbb', 'bbbb'),
(3, 1, 'g20469.png', 'coba foto'),
(4, 1, 'g20469.png', 'coba foto'),
(5, 1, 'g20469.png', 'coba foto'),
(6, 1, 'g20469.png', 'coba foto'),
(7, 1, '05-05-2017.png', 'coba foto'),
(8, 1, '05-05-2017-21-01-04.png', 'coba foto'),
(9, 1, '05-05-2017.png', 'coba foto'),
(10, 1, '05-05-2017-52-01.png', 'coba foto1'),
(11, 1, '05-05-2017-01-01-06.png', 'coba foto1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(10) NOT NULL,
  `nama_lokasi` varchar(20) NOT NULL,
  `longtitude` varchar(25) NOT NULL,
  `latitude` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `nama_lokasi`, `longtitude`, `latitude`) VALUES
(1, 'Malang asasas', '112.616998', '-7.944832'),
(2, 'Apa ini', '112.615925', '-7.943132'),
(3, 'apa ini2', '112.618908', '-7.943281'),
(4, 'Apa ini3', '112.617170', '-7.942048'),
(5, 'apa ini4', '112.615131', '-7.949401');

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
  MODIFY `id_laporan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
