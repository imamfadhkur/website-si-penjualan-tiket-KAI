-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2020 at 04:58 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservasi_tiketkai`
--

-- --------------------------------------------------------

--
-- Table structure for table `kereta`
--

CREATE TABLE `kereta` (
  `id_KA` int(10) NOT NULL,
  `nama_KA` varchar(100) NOT NULL,
  `stasiun_keberangkatan` varchar(30) NOT NULL,
  `waktu_keberangkatan` datetime(6) NOT NULL,
  `stasiun_kedatangan` varchar(30) NOT NULL,
  `waktu_kedatangan` datetime(6) NOT NULL,
  `harga` int(20) NOT NULL,
  `kapasitas_kursi` int(10) NOT NULL,
  `gambarKereta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kereta`
--

INSERT INTO `kereta` (`id_KA`, `nama_KA`, `stasiun_keberangkatan`, `waktu_keberangkatan`, `stasiun_kedatangan`, `waktu_kedatangan`, `harga`, `kapasitas_kursi`, `gambarKereta`) VALUES
(1, 'Argo Lawu', 'Solo Gubeng ', '2020-05-01 08:30:00.000000', 'Surabaya Pasarturi', '2020-05-01 21:00:00.000000', 165000, 70, 'image/kereta1.jpeg'),
(2, 'Kencana', 'Glodok Karas', '2020-05-02 07:00:00.000000', 'Surabaya Pusat', '2020-05-02 12:00:00.000000', 60000, 50, 'image/kereta2.jpeg'),
(3, 'Gajayana', 'Gambir', '2020-05-03 07:30:00.000000', 'Surabaya Gubeng', '2020-05-03 09:30:00.000000', 40000, 40, 'image/kereta3.jpeg'),
(4, 'Gajah Mada', 'Stasiun Wilis', '2020-05-11 08:00:00.000000', 'Glodok Karas', '2020-05-11 21:00:00.000000', 350000, 80, 'image/kereta4.jpeg'),
(5, 'Argo Dwipangga', 'Solo Gedengan', '2020-05-11 09:00:00.000000', 'Semarang Tawang', '2020-05-11 16:00:00.000000', 100000, 75, 'image/kereta5.jpeg'),
(6, 'Muria', 'Gambir', '2020-05-13 07:30:00.000000', 'Semarang Tawang', '2020-05-13 21:30:00.000000', 320000, 60, 'image/kereta6.jpeg'),
(7, 'Parahyangan', 'malang', '2020-05-17 09:00:00.000000', 'bandung', '2020-05-18 12:00:00.000000', 650000, 80, 'image/kereta7.jpeg'),
(8, 'Turangga', 'Surabaya Gubeng', '2020-05-16 08:00:00.000000', 'Glodok Karas', '2020-05-16 16:30:00.000000', 200000, 60, 'image/kereta8.jpeg'),
(9, 'Sembrani', 'Surabaya Pasarturi', '2020-05-20 09:00:00.000000', 'Gambir', '2020-05-20 11:00:00.000000', 50000, 30, 'image/kereta9.jpeg'),
(10, 'Purwojoyo', 'Cilacap', '2020-05-22 12:00:00.000000', 'Gambir', '2020-05-23 03:30:00.000000', 220000, 65, 'image/kereta10.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(10) NOT NULL,
  `nama_pembeli` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jk` char(2) NOT NULL,
  `noTelp` bigint(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama_pembeli`, `alamat`, `jk`, `noTelp`) VALUES
(1, 'Susanto Putro', 'RT 01 RW 01 desa Kenangan, kec. Batrisya, kab. Kulon Progo', 'L', 6285424242111),
(2, 'Imam Fadhkur Rokhim', 'RT 015 RW 003 ds. Selotinatah kec. Ngariboyo kab. Magetan', 'L', 6283846902341),
(3, 'Roi Purba', 'RT 01 RW 15 ds. Kenangan, kec. Kaluwungan, kab. Kediri', 'L', 62818111233443),
(4, 'Rita Nur Fatimah', 'RT 01 RW 10 ds. Kedung, kec. Winangon, kab. Banjarsari', 'P', 6281834123344),
(5, 'Fatimah', 'RT 03 RW 10 ds. Kandas, kec. Ringin Agung, kab. Banjarsari', 'P', 6281342223344),
(6, 'Zahra Nur Layla Sari', 'RT 03 RW 15 ds. Banaran, kec. Mangun Rejo, kab. Banjarnegara', 'P', 6281342223321),
(7, 'Imra Atul', 'RT 02 RW 11 ds. Geneng, kec. Mangkujayan, kab. Banjarnegara', 'P', 6281342222233),
(8, 'Ilham Friansyah', 'RT 03 RW 14 ds. Selotinatah, kec. Ngariboyo, kab. Magetan', 'L', 6281342112233),
(9, 'Nurul Muthmainnah', 'desa Slawe, kec. Taji kab. Karas', 'P', 628556431234),
(10, 'Faisy Syaifullah', 'Ds. Selotinatah Kec. Ngariboyo kab. Magetan Jawa Timur Indonesia', 'L', 6282344533235);

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(10) NOT NULL,
  `id_pembeli` int(10) NOT NULL,
  `id_KA` int(10) NOT NULL,
  `nomor_kursi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `id_pembeli`, `id_KA`, `nomor_kursi`) VALUES
(1, 1, 1, 3),
(2, 1, 3, 6),
(3, 1, 3, 4),
(4, 1, 3, 2),
(5, 1, 3, 9),
(6, 2, 3, 1),
(7, 3, 4, 2),
(8, 4, 4, 8),
(9, 5, 4, 7),
(10, 6, 4, 5),
(11, 7, 4, 10),
(12, 8, 4, 17),
(13, 9, 1, 1),
(14, 10, 10, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kereta`
--
ALTER TABLE `kereta`
  ADD PRIMARY KEY (`id_KA`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `id_KA` (`id_KA`),
  ADD KEY `id_pembeli` (`id_pembeli`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kereta`
--
ALTER TABLE `kereta`
  MODIFY `id_KA` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`id_KA`) REFERENCES `kereta` (`id_KA`),
  ADD CONSTRAINT `tiket_ibfk_2` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
