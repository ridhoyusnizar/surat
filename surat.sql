-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 12, 2019 at 01:54 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id_disposisi` int(45) NOT NULL,
  `tanggal` varchar(21) NOT NULL,
  `no_agenda` varchar(20) NOT NULL,
  `catatan_ketua` longtext DEFAULT NULL,
  `catatan` longtext DEFAULT NULL,
  `dari` varchar(45) NOT NULL,
  `kepada` varchar(95) NOT NULL,
  `status_terbaca` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keputusan`
--

CREATE TABLE `keputusan` (
  `id_k` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `no_surat_no` int(45) NOT NULL,
  `no_surat_noplus` varchar(45) NOT NULL,
  `no_surat_kode` varchar(45) NOT NULL,
  `no_surat_romawi` varchar(45) NOT NULL,
  `no_surat_tahun` int(12) NOT NULL,
  `isi_surat` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `keputusan`
--

INSERT INTO `keputusan` (`id_k`, `tanggal`, `no_surat_no`, `no_surat_noplus`, `no_surat_kode`, `no_surat_romawi`, `no_surat_tahun`, `isi_surat`, `gambar`) VALUES
(1, '2019-04-25', 1, '', 'KPTS', 'IV', 2019, 'kk', 'default.jpg'),
(2, '2019-04-27', 2, '', 'KPTS', 'VI', 2019, 'kk', 'default.jpg'),
(3, '2019-04-27', 3, '', 'KPTS', 'VI', 2019, 'kk', 'default.jpg'),
(4, '2019-06-15', 3, '', 'KPTS', 'VI', 2019, 'kk', 'default.jpg'),
(6, '2019-04-27', 4, '', 'KPTS', 'VI', 2019, 'kk', 'default.jpg'),
(8, '2019-04-12', 5, '', 'KPTS', 'VI', 2019, 'kk', 'default.jpg'),
(9, '2019-04-27', 6, '', 'KPTS', 'VI', 2019, 'WW', 'default.jpg'),
(10, '2019-04-27', 7, '', 'KPTS', 'VI', 2019, 'WW', 'default.jpg'),
(11, '2019-04-12', 8, '', 'KPTS', 'VI', 2019, 'WW', 'default.jpg'),
(12, '2019-04-12', 9, '', 'KPTS', 'VI', 2019, 'WW', 'default.jpg'),
(15, '2019-04-19', 10, '', 'KPTS', 'VI', 2019, 'WW', 'default.jpg'),
(16, '2019-04-12', 10, '', 'KPTS', 'VI', 2019, 'OO', 'default.jpg'),
(17, '2019-04-27', 11, 'a', 'KPTS', 'VI', 2019, 'kk', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_surat_keluar` int(10) NOT NULL,
  `no_surat_no` int(10) NOT NULL,
  `no_surat_noplus` varchar(45) DEFAULT NULL,
  `no_surat_kode` varchar(45) NOT NULL,
  `no_surat_kelompok` varchar(45) NOT NULL,
  `no_surat_romawi` varchar(45) NOT NULL,
  `no_surat_tahun` varchar(45) NOT NULL,
  `tanggal` date NOT NULL,
  `sifat` varchar(45) NOT NULL,
  `sifat_surat_detail` varchar(45) NOT NULL,
  `kepada` varchar(255) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_surat_keluar`, `no_surat_no`, `no_surat_noplus`, `no_surat_kode`, `no_surat_kelompok`, `no_surat_romawi`, `no_surat_tahun`, `tanggal`, `sifat`, `sifat_surat_detail`, `kepada`, `perihal`, `gambar`) VALUES
(5, 1, '', 'EKS-PYBW', 'Keu', 'VIII', '2019', '2019-08-12', 'Biasa', 'Keuangan', 'H', 'H', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keputusan_pjb`
--

CREATE TABLE `surat_keputusan_pjb` (
  `id_sk` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `no_surat_no` int(45) NOT NULL,
  `no_surat_noplus` varchar(45) NOT NULL,
  `no_surat_kode` varchar(45) NOT NULL,
  `no_surat_kelompok` varchar(255) NOT NULL,
  `no_surat_romawi` varchar(45) NOT NULL,
  `no_surat_tahun` int(12) NOT NULL,
  `isi_surat` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `surat_keputusan_pjb`
--

INSERT INTO `surat_keputusan_pjb` (`id_sk`, `tanggal`, `no_surat_no`, `no_surat_noplus`, `no_surat_kode`, `no_surat_kelompok`, `no_surat_romawi`, `no_surat_tahun`, `isi_surat`, `gambar`) VALUES
(1, '2019-04-27', 1, '', 'SK-PYBW', 'Pjb', 'IV', 2019, 'kk', 'default.jpg'),
(2, '2019-01-02', 2, '', 'SK-PYBW', 'Pjb', 'IV', 2019, 'OO', 'default.jpg'),
(3, '2019-03-07', 2, '', 'SK-PYBW', 'Pjb', 'IV', 2019, 'WW', 'default.jpg'),
(4, '2019-04-11', 3, '', 'SK-PYBW', 'Pjb', 'IV', 2019, 'WW', 'default.jpg'),
(5, '2019-04-12', 3, '', 'SK-PYBW', 'Pjb', 'IV', 2019, 'WW', 'default.jpg'),
(6, '2019-04-20', 4, '', 'SK-PYBW', 'Pjb', 'IV', 2019, 'WW', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keputusan_satker`
--

CREATE TABLE `surat_keputusan_satker` (
  `id_sk` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `no_surat_no` int(45) NOT NULL,
  `no_surat_noplus` varchar(45) NOT NULL,
  `no_surat_kode` varchar(45) NOT NULL,
  `no_surat_kelompok` varchar(255) NOT NULL,
  `no_surat_romawi` varchar(45) NOT NULL,
  `no_surat_tahun` int(12) NOT NULL,
  `isi_surat` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `surat_keputusan_satker`
--

INSERT INTO `surat_keputusan_satker` (`id_sk`, `tanggal`, `no_surat_no`, `no_surat_noplus`, `no_surat_kode`, `no_surat_kelompok`, `no_surat_romawi`, `no_surat_tahun`, `isi_surat`, `gambar`) VALUES
(1, '2019-04-27', 1, '', 'SK-PYBW', 'Satker', 'IV', 2019, 'kk', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_surat_masuk` int(10) NOT NULL,
  `tanggal_agenda` date NOT NULL,
  `waktu_agenda` time NOT NULL,
  `no_agenda` varchar(20) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `no_surat` varchar(45) NOT NULL,
  `asal_surat` varchar(255) NOT NULL,
  `sifat_surat` varchar(50) NOT NULL,
  `sifat_surat_detail` varchar(50) NOT NULL,
  `kelompok` varchar(100) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `perihal` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT 'default.jpg',
  `status` varchar(45) NOT NULL,
  `catatan_masuk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_peraturan`
--

CREATE TABLE `surat_peraturan` (
  `id_sp` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `no_surat_no` int(45) NOT NULL,
  `no_surat_noplus` varchar(45) NOT NULL,
  `no_surat_tahun` int(12) NOT NULL,
  `isi_surat` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `surat_peraturan`
--

INSERT INTO `surat_peraturan` (`id_sp`, `tanggal`, `no_surat_no`, `no_surat_noplus`, `no_surat_tahun`, `isi_surat`, `gambar`) VALUES
(1, '2019-04-26', 1, '', 2019, 'kk', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `surat_tugas`
--

CREATE TABLE `surat_tugas` (
  `id_st` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `no_surat_no` int(45) NOT NULL,
  `no_surat_noplus` varchar(45) NOT NULL,
  `no_surat_kode` varchar(45) NOT NULL,
  `no_surat_romawi` varchar(45) NOT NULL,
  `no_surat_tahun` int(12) NOT NULL,
  `isi_surat` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `surat_tugas`
--

INSERT INTO `surat_tugas` (`id_st`, `tanggal`, `no_surat_no`, `no_surat_noplus`, `no_surat_kode`, `no_surat_romawi`, `no_surat_tahun`, `isi_surat`, `gambar`) VALUES
(1, '2019-04-19', 1, '', 'ST-PYBW', 'IV', 2019, 'kk', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(45) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nama` varchar(95) DEFAULT NULL,
  `nama_lengkap` varchar(95) NOT NULL,
  `gel_dpn` varchar(95) NOT NULL,
  `gel_blkng` varchar(95) NOT NULL,
  `pass` varchar(40) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `kode` varchar(95) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nip`, `nama`, `nama_lengkap`, `gel_dpn`, `gel_blkng`, `pass`, `level`, `kode`) VALUES
(1, 'dekan', 'Dekan', '', '', '', 'c4ca4238a0b923820dcc509a6f75849b', 1, '5048eb81d730e66971a73938fdf179ec'),
(5, 'wadek', 'Wakil Dekan', '', '', '', 'c4ca4238a0b923820dcc509a6f75849b', 1, '05de675f2ab860f099a42786f769f1c8'),
(6, 'bendahara', 'Bendahara', '', '', '', 'c4ca4238a0b923820dcc509a6f75849b', 1, '0bf5f91e0355576b5a9d346e289a6e8e'),
(7, 'admin', 'Administrasi ', '', '', '', 'c4ca4238a0b923820dcc509a6f75849b', 3, '02a9efd61a27ee3ec48a39b60deee330'),
(8, 'staffAK', 'Staff Administrasi Kantor', '', '', '', 'c4ca4238a0b923820dcc509a6f75849b', 4, '1afd5866d89f7b741edd2762032eeb40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id_disposisi`),
  ADD KEY `no_agenda` (`no_agenda`),
  ADD KEY `kepada` (`kepada`);

--
-- Indexes for table `keputusan`
--
ALTER TABLE `keputusan`
  ADD PRIMARY KEY (`id_k`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_surat_keluar`);

--
-- Indexes for table `surat_keputusan_pjb`
--
ALTER TABLE `surat_keputusan_pjb`
  ADD PRIMARY KEY (`id_sk`);

--
-- Indexes for table `surat_keputusan_satker`
--
ALTER TABLE `surat_keputusan_satker`
  ADD PRIMARY KEY (`id_sk`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_surat_masuk`),
  ADD KEY `no_agenda` (`no_agenda`);

--
-- Indexes for table `surat_peraturan`
--
ALTER TABLE `surat_peraturan`
  ADD PRIMARY KEY (`id_sp`);

--
-- Indexes for table `surat_tugas`
--
ALTER TABLE `surat_tugas`
  ADD PRIMARY KEY (`id_st`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`),
  ADD KEY `nama_2` (`nama`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id_disposisi` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keputusan`
--
ALTER TABLE `keputusan`
  MODIFY `id_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_surat_keluar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `surat_keputusan_pjb`
--
ALTER TABLE `surat_keputusan_pjb`
  MODIFY `id_sk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `surat_keputusan_satker`
--
ALTER TABLE `surat_keputusan_satker`
  MODIFY `id_sk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_surat_masuk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `surat_peraturan`
--
ALTER TABLE `surat_peraturan`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat_tugas`
--
ALTER TABLE `surat_tugas`
  MODIFY `id_st` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD CONSTRAINT `disposisi_ibfk_2` FOREIGN KEY (`kepada`) REFERENCES `user` (`nama`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `disposisi_ibfk_3` FOREIGN KEY (`no_agenda`) REFERENCES `surat_masuk` (`no_agenda`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
