-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 09, 2012 at 07:53 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `registrasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE IF NOT EXISTS `fakultas` (
  `kd_fakultas` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  PRIMARY KEY (`kd_fakultas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`kd_fakultas`, `nama`) VALUES
(1, 'Ilmu Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `kd_fakultas` int(2) NOT NULL,
  `kd_jurusan` int(2) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  PRIMARY KEY (`kd_jurusan`),
  KEY `kd_fakultas` (`kd_fakultas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`kd_fakultas`, `kd_jurusan`, `nama`) VALUES
(1, 01, 'Web Development'),
(1, 02, 'Multimedia');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `username` varchar(25) NOT NULL,
  `password` char(41) NOT NULL,
  `nama` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` int(8) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL,
  `sekolah` varchar(255) NOT NULL,
  `kd_jurusan` int(2) unsigned zerofill NOT NULL,
  `tanggal_registrasi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`nis`),
  KEY `kd_jurusan` (`kd_jurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `email`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `telp`, `sekolah`, `kd_jurusan`, `tanggal_registrasi`) VALUES
(10112001, 'Aditya Yudha Pradhana', 'adit@pradhana.net', 'Laki-laki', 'Jakarta', '1989-02-08', 'Jln. Raya Caracas No.15', '085624440889', 'SMA Negeri 1 Cilimus', 01, '2012-10-08 22:49:56'),
(10212004, 'Dayu Devi', 'dayu@gmail.com', 'Perempuan', 'Karangasem', '1988-09-14', 'Karanganyar, Sragen', '093849873890', 'SMA Sragen', 02, '2012-10-09 05:29:13');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`kd_fakultas`) REFERENCES `fakultas` (`kd_fakultas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kd_jurusan`) REFERENCES `jurusan` (`kd_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
