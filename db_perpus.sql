-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2018 at 08:15 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `nim` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('l','p') NOT NULL,
  `prodi` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`nim`, `nama`, `tempat_lahir`, `tgl_lahir`, `jk`, `prodi`) VALUES
(17161518, 'alfariz ', 'banyuasin', '2018-12-01', 'l', 'si'),
(151413116, 'Hafidzin', 'indralaya', '2018-12-01', 'l', 'si'),
(151614119, 'galuh munggaran', 'palembang', '2018-03-08', 'l', 'ti'),
(1715161414, 'mutiara', 'palembang', '2018-12-03', 'p', 'ti'),
(1715161415, 'hisyam', 'pangkalam balai', '2018-08-02', 'l', 'si');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id` int(9) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `Penerbit` varchar(100) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `isbn` varchar(25) NOT NULL,
  `jumlah_buku` int(3) NOT NULL,
  `lokasi` enum('rak1','rak2','rak3') NOT NULL,
  `tgl_input` date NOT NULL,
  `img` varchar(50) NOT NULL,
  `seluruh_buku` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id`, `judul`, `pengarang`, `Penerbit`, `tahun_terbit`, `isbn`, `jumlah_buku`, `lokasi`, `tgl_input`, `img`, `seluruh_buku`) VALUES
(4, 'TRIK SEO SECURITY', 'AKHSANUL HAQ', 'ADI SUCIPTO', '2008', '78UYY', 0, 'rak2', '2018-09-05', '', ''),
(8, 'tutorial boostrap 3.3.0', 'Prof.Dr.Sarjon Defit, S.Kom, Msc', 'Erlangga', '2015', '12098', 1, 'rak1', '2018-12-21', '', ''),
(9, 'belajar PHP 7', 'dr.jarot maulana.m,sc', 'Ktsp', '2013', '1209887', 0, 'rak2', '2018-12-21', '', ''),
(10, 'framework codeigneiter', 'tri atmojo', 'erlangga', '2004', '12342', 0, 'rak3', '2018-12-13', '', ''),
(11, 'master toefel', 'jarwot', 'qwerty', '1995', '6867', 1, 'rak1', '2018-12-12', '', '5'),
(12, 'master toefel', 'jarwot', 'binadarma', '1995', '6867', 1, 'rak1', '2018-12-12', '', '5'),
(13, 'master toefel edisi 2', 'jarwot', 'binadarma', '1995', '6867', 1, 'rak1', '2018-12-12', '', '5'),
(14, 'belajar PHP 7', 'masyam', 'Erlangga', '2004', '897', 1, 'rak1', '0000-00-00', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengunjung`
--

CREATE TABLE `tb_pengunjung` (
  `nim` int(12) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `almamater` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengunjung`
--

INSERT INTO `tb_pengunjung` (`nim`, `nama`, `almamater`) VALUES
(1413121, 'ayang restu', 'universitas brawijaya'),
(1615141, 'rafidah', 'universitas diponegoro');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(9) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `nim` varchar(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `tgl_pinjam` varchar(30) NOT NULL,
  `tgl_kembali` varchar(30) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `judul`, `nim`, `nama`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
(10, 'TRIK SEO SECURITY', '17161518', 'alfariz ', '', '1545692400', 'sudah dikembalikan'),
(11, 'TRIK SEO SECURITY', '17161518', 'alfariz ', '', '1545692400', 'sudah dikembalikan'),
(16, 'tutorial boostrap 3.3.0', '151614119', 'galuh munggaran', '25-12-18', '25-12-25', 'sudah dikembalikan'),
(18, 'tutorial boostrap 3.3.0', '151614119', 'galuh munggaran', '18-12-2018', '25-12-18', 'sudah dikembalikan'),
(23, 'belajar framework', '17161514', 'romo', '23-11-2018', '1-12-2018', 'sudah dikembalikan'),
(24, 'tutorial boostrap 3.3.0', '17161518', 'alfariz ', '13-12-2018', '20-12-2018', 'sudah dikembalikan'),
(26, 'tutorial boostrap 3.3.0', '1715161414', 'mutiara', '13-12-2018', '20-12-2018', 'sudah dikembalikan'),
(28, 'master toefel edisi 2', '151614119', 'galuh munggaran', '13-12-2018', '20-12-2018', 'sudah dikembalikan'),
(29, 'TRIK SEO SECURITY', '151614119', 'galuh munggaran', '13-12-2018', '20-12-2018', 'sudah dikembalikan'),
(30, 'master toefel', '17161518', 'alfariz ', '13-12-2018', '20-12-2018', 'sudah dikembalikan'),
(31, 'TRIK SEO SECURITY', '17161518', 'alfariz ', '13-12-2018', '20-12-2018', 'pinjam');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `level` varchar(30) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `nama`, `level`, `foto`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'avatar5.png'),
(2, 'user', 'user', 'user', 'user', 'login.png'),
(3, 'jawo', '827ccb0eea8a706c4c34a16891f84e7b', 'jawo', 'admin', 'jawo.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengunjung`
--
ALTER TABLE `tb_pengunjung`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `nim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1715161416;

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_pengunjung`
--
ALTER TABLE `tb_pengunjung`
  MODIFY `nim` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1615142;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
