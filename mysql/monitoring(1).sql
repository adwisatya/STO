-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2015 at 05:56 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `kurva_s`
--

CREATE TABLE IF NOT EXISTS `kurva_s` (
`id` int(11) NOT NULL,
  `subkerja` text NOT NULL,
  `m66` text NOT NULL,
  `m67` text NOT NULL,
  `m68` text NOT NULL,
  `gid` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kurva_s`
--

INSERT INTO `kurva_s` (`id`, `subkerja`, `m66`, `m67`, `m68`, `gid`) VALUES
(5, '3.1.1.1', '11,2,3,4,5,6,7', '11,22,43,44,14,4,6', '3,4,2,3,4,5,6', 1),
(7, '3.1.1.1', '1,1,1,1,1,1,1', '2,2,2,2,2,2,', '3,4,2,3,4,5,6', 2),
(8, '3.1.1.1', '3,4,2,3,4,5,6', '3,4,2,3,4,5,6', '3,4,2,3,4,5,6', 1),
(9, '3.1.1.1', '1,2,3,4,5,5,7', '2,3,5,4,3,3,4', '1,3,3,3,3,3,3', 3);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_harian`
--

CREATE TABLE IF NOT EXISTS `laporan_harian` (
`no` int(3) NOT NULL,
  `tanggal` varchar(6) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan_harian`
--

INSERT INTO `laporan_harian` (`no`, `tanggal`, `deskripsi`, `gambar`) VALUES
(2, '250315', 'Laporan1', '8f3e6f49897b60539e7b72d17b633eff.jpg'),
(3, '030415', 'Hujan Melanda							', 'c7da2202001ef3739c67954b4c9dbb31.PNG'),
(4, '040415', 'Hari cerah', 'a19ddbe22afc139c538bfca41cea40ad.png');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_mingguan`
--

CREATE TABLE IF NOT EXISTS `laporan_mingguan` (
`no` int(1) NOT NULL,
  `minggu` varchar(5) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan_mingguan`
--

INSERT INTO `laporan_mingguan` (`no`, `minggu`, `file`) VALUES
(1, '12', '3232'),
(2, '12', 'e61a5cf902103690c0ca0dc9b32e7520.xlsx');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`no` int(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`no`, `username`, `password`, `status`) VALUES
(1, 'aryya', 'adwisatya', 9),
(2, 'alfon prima', 'sto alfon prima', 9),
(3, 'abdi hamdani', 'sto abdi hamdani', 9),
(4, 'riky johan', 'sto riky johan', 9),
(5, 'nugroho h paulus', 'upk ph 1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kurva_s`
--
ALTER TABLE `kurva_s`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `laporan_harian`
--
ALTER TABLE `laporan_harian`
 ADD PRIMARY KEY (`no`);

--
-- Indexes for table `laporan_mingguan`
--
ALTER TABLE `laporan_mingguan`
 ADD PRIMARY KEY (`no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kurva_s`
--
ALTER TABLE `kurva_s`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `laporan_harian`
--
ALTER TABLE `laporan_harian`
MODIFY `no` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `laporan_mingguan`
--
ALTER TABLE `laporan_mingguan`
MODIFY `no` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `no` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
