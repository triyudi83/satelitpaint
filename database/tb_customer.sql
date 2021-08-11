-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2021 at 02:29 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_satelitpaint`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id_customer` int(11) NOT NULL,
  `namacustomer` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `id_prov` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `tlp` char(12) NOT NULL,
  `hp` char(12) NOT NULL,
  `limit` int(11) NOT NULL,
  `hutang` int(11) NOT NULL,
  `sisalimit` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`id_customer`, `namacustomer`, `alamat`, `id_prov`, `id_kecamatan`, `id_kota`, `tlp`, `hp`, `limit`, `hutang`, `sisalimit`, `id_user`, `tgl_update`) VALUES
(1, 'aliefaa', 'JETIS WETAN 6/29', 18, 1806061, 1806, '0810000000', '', 100000000, 0, 100000000, 3, 2021);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
