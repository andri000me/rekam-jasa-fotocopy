-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 16, 2021 at 05:25 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekam_jasa`
--

-- --------------------------------------------------------

--
-- Table structure for table `jasa`
--

CREATE TABLE `jasa` (
  `idjasa` int(11) NOT NULL,
  `jasa_nama` varchar(128) DEFAULT NULL,
  `jasa_harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jasa`
--

INSERT INTO `jasa` (`idjasa`, `jasa_nama`, `jasa_harga`) VALUES
(1, 'Jilid Biasa', 6000),
(3, 'Jilid Melingkar Biasa', 20000),
(4, 'Jilid Melingkar Press', 25000),
(5, 'Jilid Semi Lux', 40000),
(6, 'Jilid Lux/Hard Cover', 50000),
(7, 'Jilid Spiral Biasa (Ring Plastik)', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `idpengguna` int(11) NOT NULL,
  `pengguna_nama` varchar(64) DEFAULT NULL,
  `pengguna_username` varchar(32) DEFAULT NULL,
  `pengguna_password` varchar(128) DEFAULT NULL,
  `pengguna_level` enum('Admin','User') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`idpengguna`, `pengguna_nama`, `pengguna_username`, `pengguna_password`, `pengguna_level`) VALUES
(1, 'Administrator', 'admin', '$2y$10$9kgZVoKm/uCj9faKX5H2q.tgawINM9ARl8D8r1TNe1MoG7HH6aDc2', 'Admin'),
(2, 'User Biasa', 'user', '$2y$10$BhY35ynWc/wOfAdA1aRMvep.cmXJ976e9yjK4bogUiBMc34UQyjcy', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idtransaksi` int(11) NOT NULL,
  `jasa_id` int(11) NOT NULL,
  `transaksi_no` varchar(20) DEFAULT NULL,
  `transaksi_tgl` int(11) DEFAULT NULL,
  `transaksi_nama` varchar(128) DEFAULT NULL,
  `transaksi_jumlah` varchar(5) DEFAULT NULL,
  `transaksi_total_harga` varchar(15) DEFAULT NULL,
  `pengguna_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idtransaksi`, `jasa_id`, `transaksi_no`, `transaksi_tgl`, `transaksi_nama`, `transaksi_jumlah`, `transaksi_total_harga`, `pengguna_id`) VALUES
(2, 1, 'TRX00002', 1615910733, 'Pelanggan 2', '4', '24000', 1),
(3, 6, 'TRX00003', 1615911472, 'Pelanggan 1', '5', '250000', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`idjasa`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idpengguna`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idtransaksi`,`jasa_id`,`pengguna_id`),
  ADD KEY `fk_transaksi_jasa_idx` (`jasa_id`),
  ADD KEY `fk_transaksi_pengguna1_idx` (`pengguna_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jasa`
--
ALTER TABLE `jasa`
  MODIFY `idjasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `idpengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_transaksi_jasa` FOREIGN KEY (`jasa_id`) REFERENCES `jasa` (`idjasa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transaksi_pengguna1` FOREIGN KEY (`pengguna_id`) REFERENCES `pengguna` (`idpengguna`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
