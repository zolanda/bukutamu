-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2018 at 02:53 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bukutamu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email`, `username`, `password`) VALUES
(1, 'zolanda', 'azolanda@gmail.com', 'zolanda', 'ac43724f16e9241d990427ab7c8f4228');

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `id_bagian` int(5) NOT NULL,
  `nama_bagian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id_bagian`, `nama_bagian`) VALUES
(11, 'Sekretaris'),
(12, 'Kelompok Jabatan Fungsional'),
(13, 'Bidang Pembinaan, Pengembangan dan Pengawasan Kearsipan'),
(14, 'Bidang Pengelolaan dan Pelestarian Arsip'),
(15, 'Bidang Layanan dan Pemanfaatan Arsip'),
(16, 'Bidang Deposit dan Pengolahan Bahan Perpustakaan'),
(17, 'Bidang Pengembangan Perpustakaan');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id_jawaban` int(10) NOT NULL,
  `jawaban` varchar(10) NOT NULL,
  `id_pengunjung` int(10) NOT NULL,
  `id_pertanyaan` int(10) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id_jawaban`, `jawaban`, `id_pengunjung`, `id_pertanyaan`, `waktu`) VALUES
(26, 'Yes', 66, 1, '2018-01-25 17:51:47'),
(27, 'Yes', 66, 2, '2018-01-25 17:51:48'),
(28, 'Yes', 66, 3, '2018-01-25 17:51:48'),
(29, 'No', 66, 4, '2018-01-25 17:51:48'),
(30, 'Yes', 66, 5, '2018-01-25 17:51:48'),
(31, 'Yes', 89, 1, '2018-01-29 22:39:34'),
(32, 'No', 89, 2, '2018-01-29 22:39:35'),
(33, 'Yes', 89, 3, '2018-01-29 22:39:35'),
(34, 'No', 89, 4, '2018-01-29 22:39:35'),
(35, 'Yes', 89, 5, '2018-01-29 22:39:35');

-- --------------------------------------------------------

--
-- Table structure for table `keperluan`
--

CREATE TABLE `keperluan` (
  `id_keperluan` int(10) NOT NULL,
  `nama_keperluan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keperluan`
--

INSERT INTO `keperluan` (`id_keperluan`, `nama_keperluan`) VALUES
(1, 'Penelitian atau Mencari Arsip'),
(2, 'Kunjungan atau Wisata Arsip'),
(3, 'Magang atau PKL'),
(4, 'Konsultasi Kearsipan atau Perpustakaan'),
(5, 'Umum atau Lain - lain');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `no_induk` varchar(18) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `id_bagian` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`no_induk`, `nama_pegawai`, `id_bagian`) VALUES
('112', 'Sapta Hermawati, SH, MM', 11),
('mdfkjfd', 'Maria Maharsi Pradoposari, SH, MH', 11);

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int(10) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `pertanyaan`) VALUES
(1, 'Puaskah anda pada pelayanan dinas kami ?'),
(2, 'Puaskah anda terhadap pelayanan yang diberikan oleh petugas / sdm dinas kami ?'),
(3, 'Puaskah anda terhadap sarana dan prasarana pendukung layanan pada dinas kami?'),
(4, 'Puaskah anda terhadap khazanah arsip yang ada pada dinas kami?'),
(5, 'Puaskah anda terhadap keamanan dan kenyamanan pelayanan pada dinas kami?');

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE `tamu` (
  `id_tamu` int(11) NOT NULL,
  `identitas_tamu` varchar(20) NOT NULL,
  `nama_tamu` varchar(255) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `id_keperluan` int(10) NOT NULL,
  `no_pengunjung` varchar(10) NOT NULL,
  `banyak_tamu` int(10) NOT NULL,
  `waktu` datetime NOT NULL,
  `indeks` int(11) NOT NULL,
  `no_induk` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tamu`
--

INSERT INTO `tamu` (`id_tamu`, `identitas_tamu`, `nama_tamu`, `instansi`, `no_hp`, `id_keperluan`, `no_pengunjung`, `banyak_tamu`, `waktu`, `indeks`, `no_induk`) VALUES
(2, '12557632799', 'zola', 'undip', '097239298893', 1, '78', 1, '2018-01-22 19:53:06', 0, '2147483647'),
(3, '123141295742985794', 'zola', 'undip', '098272727213', 1, '90', 10, '2018-01-22 19:54:18', 0, '2147483647'),
(4, '1212321', 'flsajdlksjd', 'jflsadjflksajflsdjlfk', '-9771039', 1, '56', 3, '2018-01-26 10:45:15', 0, '2147483647'),
(5, '89283849021859048150', 'alo', 'undip', '086845345', 2, '', 1, '2018-01-29 15:16:13', 0, '2147483647'),
(6, '1234567890', 'dfghjk,', 'dfghjk', '87654', 1, '89', 8, '2018-01-29 15:16:49', 0, '2147483647'),
(7, '18509314850931480', 'sfjslj', 'fjaskdlfj', '49804982039', 1, '45', 5, '2018-01-31 13:30:02', 0, '2147483647'),
(8, '123456789', 'zl', 'ertyui', '089', 1, '78', 1, '2018-02-01 23:23:09', 0, '2147483647'),
(9, '34567890', 'sayang', 'dimana ya ', '098728929181', 1, '12', 1, '2018-02-21 14:04:58', 0, '2147483647'),
(10, '1234567', 'zl', 'rumah', '1', 1, 'e', 1, '2018-02-26 21:32:07', 0, '2147483647'),
(11, '12332425678', 'fghjkl;', 'undip', '09877774', 2, '', 1, '2018-02-26 21:40:24', 0, '3329148943892401');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `keperluan`
--
ALTER TABLE `keperluan`
  ADD PRIMARY KEY (`id_keperluan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`no_induk`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id_tamu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id_bagian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id_jawaban` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `keperluan`
--
ALTER TABLE `keperluan`
  MODIFY `id_keperluan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tamu`
--
ALTER TABLE `tamu`
  MODIFY `id_tamu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
