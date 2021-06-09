-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2020 at 01:25 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `246mmc`
--

-- --------------------------------------------------------

--
-- Table structure for table `isciler`
--

CREATE TABLE `isciler` (
  `id` int(11) UNSIGNED NOT NULL,
  `AdSoyad` varchar(50) NOT NULL,
  `Vezife` varchar(25) NOT NULL,
  `Maas` float(6,2) NOT NULL,
  `av` enum('Evli','Subay') NOT NULL,
  `tel` varchar(15) NOT NULL,
  `qeyd_tarixi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `isciler`
--

INSERT INTO `isciler` (`id`, `AdSoyad`, `Vezife`, `Maas`, `av`, `tel`, `qeyd_tarixi`) VALUES
(2, 'Hemid Hemidli', 'SMM', 250.00, 'Subay', '055 877 99 66', '2020-02-25 12:35:39'),
(5, 'Mahir Tahirli', 'HR', 1700.00, 'Evli', '055 222 22 22', '2020-02-27 13:42:51'),
(6, 'Hikmet Hikmetli', 'Mobil Developer', 500.00, 'Subay', '055 211 22 80', '2020-02-27 13:57:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `isciler`
--
ALTER TABLE `isciler`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tel` (`tel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `isciler`
--
ALTER TABLE `isciler`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
