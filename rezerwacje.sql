-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:666
-- Generation Time: Aug 24, 2016 at 02:30 PM
-- Server version: 5.5.49-log
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srb_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `rezerwacje`
--

CREATE TABLE IF NOT EXISTS `rezerwacje` (
  `id` int(11) NOT NULL,
  `numer` int(11) NOT NULL,
  `id_seans` int(11) NOT NULL,
  `id_klient` int(11) NOT NULL,
  `PNR` varchar(9999) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rezerwacje`
--

INSERT INTO `rezerwacje` (`id`, `numer`, `id_seans`, `id_klient`, `PNR`) VALUES
(1, 2, 1, 1, '2016-08-29-2'),
(2, 16, 1, 1, '2016-08-29-16'),
(3, 17, 1, 1, '2016-08-29-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rezerwacje`
--
ALTER TABLE `rezerwacje`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rezerwacje`
--
ALTER TABLE `rezerwacje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
