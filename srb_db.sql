-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:666
-- Generation Time: Aug 25, 2016 at 03:08 PM
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
-- Table structure for table `filmy`
--

CREATE TABLE IF NOT EXISTS `filmy` (
  `id` int(11) NOT NULL,
  `tytul` varchar(36) CHARACTER SET cp1250 COLLATE cp1250_polish_ci NOT NULL,
  `rezyser` varchar(36) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `gatunek` int(11) NOT NULL,
  `cover` varchar(999) CHARACTER SET utf16 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `filmy`
--

INSERT INTO `filmy` (`id`, `tytul`, `rezyser`, `gatunek`, `cover`) VALUES
(1, 'Zjawa', 'Alejandro GonzÃ¡lez IÃ±Ã¡rritu', 2, 'zjawa.jpg'),
(2, 'Matrix', 'Wachowscy', 4, 'matrix.jpg'),
(3, 'Mechanik: Konfrontacja', 'Dennis Gansel', 2, 'mechanik.jpg'),
(4, 'Nie oddychaj', 'Fede Alvarez', 1, 'nie-oddychaj.jpg'),
(5, 'Sausage Party', 'Greg Tiernan', 1, 'sausage.jpg'),
(6, 'Rekiny Wojny', 'Todd Phillips', 1, 'dogs.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gatunek`
--

CREATE TABLE IF NOT EXISTS `gatunek` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(16) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gatunek`
--

INSERT INTO `gatunek` (`id`, `nazwa`) VALUES
(1, 'Horror'),
(2, 'Kryminal'),
(4, 'Fikcja');

-- --------------------------------------------------------

--
-- Table structure for table `klienci`
--

CREATE TABLE IF NOT EXISTS `klienci` (
  `id` int(11) NOT NULL,
  `login` varchar(36) NOT NULL,
  `password` varchar(36) NOT NULL,
  `lvl` int(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klienci`
--

INSERT INTO `klienci` (`id`, `login`, `password`, `lvl`) VALUES
(1, 'kszmidt', 'asd', 9),
(7, 'Test', 'tescik1', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rezerwacje`
--

INSERT INTO `rezerwacje` (`id`, `numer`, `id_seans`, `id_klient`, `PNR`) VALUES
(1, 2, 1, 1, '2016-08-29-2'),
(2, 17, 0, 0, '2016-08-29-16'),
(3, 17, 1, 1, '2016-08-29-17'),
(4, 15, 3, 1, '2016-08-31-15'),
(5, 16, 3, 1, '2016-08-31-16'),
(6, 17, 3, 1, '2016-08-31-17'),
(7, 18, 3, 1, '2016-08-31-18'),
(8, 13, 1, 1, '2016-08-29-13'),
(9, 14, 1, 1, '2016-08-29-14'),
(10, 9, 4, 1, '2016-09-01-9'),
(11, 10, 4, 1, '2016-09-01-10'),
(12, 9, 3, 1, '2016-08-31-9'),
(13, 6, 2, 1, '2016-08-31-6'),
(14, 5, 2, 1, '2016-08-31-5'),
(15, 4, 2, 1, '2016-08-31-4'),
(16, 15, 2, 1, '2016-08-31-15'),
(17, 14, 2, 1, '2016-08-31-14');

-- --------------------------------------------------------

--
-- Table structure for table `seans`
--

CREATE TABLE IF NOT EXISTS `seans` (
  `id` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `miejsc` int(11) NOT NULL,
  `data` date NOT NULL,
  `godzina` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seans`
--

INSERT INTO `seans` (`id`, `id_film`, `miejsc`, `data`, `godzina`) VALUES
(1, 1, 30, '2016-08-29', '00:00:00'),
(2, 2, 15, '2016-08-31', '15:00:00'),
(3, 3, 25, '2016-08-31', '17:00:00'),
(4, 1, 10, '2016-09-01', '14:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `filmy`
--
ALTER TABLE `filmy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gatunek`
--
ALTER TABLE `gatunek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rezerwacje`
--
ALTER TABLE `rezerwacje`
  ADD KEY `id` (`id`);

--
-- Indexes for table `seans`
--
ALTER TABLE `seans`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `filmy`
--
ALTER TABLE `filmy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `gatunek`
--
ALTER TABLE `gatunek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `rezerwacje`
--
ALTER TABLE `rezerwacje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `seans`
--
ALTER TABLE `seans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
