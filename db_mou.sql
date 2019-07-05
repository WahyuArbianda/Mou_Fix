-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03 Jul 2019 pada 10.41
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mou`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(12) NOT NULL,
  `id_tipe` int(2) NOT NULL,
  `email` text NOT NULL,
  `username` varchar(64) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `nip` varchar(32) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `id_tipe`, `email`, `username`, `nama`, `nip`, `jabatan`, `password`) VALUES
('01ADM', 0, 'superadmin@gmail.com', 'Super Admin', 'Super Admin', '8627', 'Super Admin', 'admin'),
('21CAK', 20, 'adminpks@gmail.com', 'Admin PKS', 'Admin PKS', '8540', 'Admin PKS', 'admin'),
('29YOX', 93, 'adminmou@gmail.com', 'Admin MOU', 'Admin MOU', '1213', 'Admin MOU', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dinas`
--

CREATE TABLE `dinas` (
  `id_dinas` int(12) NOT NULL,
  `nama_dinas` text NOT NULL,
  `alamat` text NOT NULL,
  `is_delete` enum('0','1') NOT NULL,
  `time_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_admin` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dinas`
--

INSERT INTO `dinas` (`id_dinas`, `nama_dinas`, `alamat`, `is_delete`, `time_update`, `id_admin`) VALUES
(1, 'Kominfo Kota Malang', 'Jln Kedungkandang, Kota Malang', '1', '2019-06-25 22:00:00', '01ADM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_mou`
--

CREATE TABLE `jenis_mou` (
  `id_jenis` varchar(7) NOT NULL,
  `nama_jenis` text NOT NULL,
  `is_delete` enum('0','1') NOT NULL,
  `time_update` date NOT NULL,
  `id_admin` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pks`
--

CREATE TABLE `jenis_pks` (
  `id_jenis` varchar(7) NOT NULL,
  `nama_jenis` text NOT NULL,
  `is_delete` enum('0','1') NOT NULL,
  `time_update` date NOT NULL,
  `id_admin` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mou`
--

CREATE TABLE `mou` (
  `id_mou` varchar(15) NOT NULL,
  `tgl_msk` datetime NOT NULL,
  `deskripsi_mou` text NOT NULL,
  `id_jenis` varchar(7) NOT NULL,
  `periode_bermula` date NOT NULL,
  `periode_berakhir` date NOT NULL,
  `perihal` text NOT NULL,
  `berkas` text NOT NULL,
  `is_delete` enum('0','1') NOT NULL,
  `time_update` datetime NOT NULL,
  `id_admin` varchar(12) NOT NULL,
  `hub_pks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pks`
--

CREATE TABLE `pks` (
  `id_pks` varchar(15) NOT NULL,
  `tgl_pks` datetime NOT NULL,
  `periode_mulai` date NOT NULL,
  `periode_selesai` date NOT NULL,
  `deskripsi` text NOT NULL,
  `tujuan` text NOT NULL,
  `jenis_pks` varchar(7) NOT NULL,
  `berkas` text NOT NULL,
  `id_dinas` text NOT NULL,
  `hub_instansi` text NOT NULL,
  `is_delete` enum('0','1') NOT NULL,
  `time_update` time NOT NULL,
  `id_admin` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_admin`
--

CREATE TABLE `tipe_admin` (
  `id_tipe` int(2) NOT NULL,
  `keterangan` varchar(32) NOT NULL,
  `is_delete` enum('0','1') NOT NULL,
  `time_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tipe_admin`
--

INSERT INTO `tipe_admin` (`id_tipe`, `keterangan`, `is_delete`, `time_update`) VALUES
(0, 'Super Admin', '1', '2019-07-01 13:27:47'),
(1, 'Admin MOU', '1', '2019-07-01 13:27:54'),
(2, 'Admin PKS', '1', '2019-07-03 10:11:06'),
(4, 'Admin MOU', '0', '2019-07-03 13:31:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `dinas`
--
ALTER TABLE `dinas`
  ADD PRIMARY KEY (`id_dinas`);

--
-- Indexes for table `jenis_mou`
--
ALTER TABLE `jenis_mou`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `jenis_pks`
--
ALTER TABLE `jenis_pks`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `mou`
--
ALTER TABLE `mou`
  ADD PRIMARY KEY (`id_mou`),
  ADD UNIQUE KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `pks`
--
ALTER TABLE `pks`
  ADD PRIMARY KEY (`id_pks`);

--
-- Indexes for table `tipe_admin`
--
ALTER TABLE `tipe_admin`
  ADD PRIMARY KEY (`id_tipe`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tipe_admin`
--
ALTER TABLE `tipe_admin`
  MODIFY `id_tipe` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
