-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2018 at 02:57 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ta_data_mining`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_datauji`
--

CREATE TABLE `tb_datauji` (
  `id` int(11) NOT NULL,
  `tekanan` int(11) NOT NULL,
  `lengkungan` int(11) NOT NULL,
  `jatuh` int(11) NOT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_datauji`
--

INSERT INTO `tb_datauji` (`id`, `tekanan`, `lengkungan`, `jatuh`, `ket`) VALUES
(1, 10, 10, 10, 'jelek'),
(2, 20, 20, 20, 'bagus'),
(3, 15, 15, 15, 'jelek'),
(4, 25, 25, 25, 'bagus'),
(6, 10, 30, 20, 'Jelek');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_datauji`
--
ALTER TABLE `tb_datauji`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_datauji`
--
ALTER TABLE `tb_datauji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
