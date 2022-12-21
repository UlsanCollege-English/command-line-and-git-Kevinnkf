-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2022 at 04:22 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kevin`
--

-- --------------------------------------------------------

--
-- Table structure for table `khalfani`
--

CREATE TABLE `khalfani` (
  `id_pembeli` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `HP` varchar(20) NOT NULL,
  `Tgl_Transaksi` date NOT NULL,
  `Jenis_Barang` varchar(25) NOT NULL,
  `Nama_Barang` varchar(50) NOT NULL,
  `Jumlah` int(20) NOT NULL,
  `Harga` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khalfani`
--

INSERT INTO `khalfani` (`id_pembeli`, `nama`, `alamat`, `HP`, `Tgl_Transaksi`, `Jenis_Barang`, `Nama_Barang`, `Jumlah`, `Harga`) VALUES
(1, 'Kevin Khalfani Fadillah', 'Condet, Jakarta', '087877271929', '2022-11-04', 'Sepatu', 'Converse White', 2, 100000),
(2, 'Sayyid Nabil ', 'Tanggerang Selatan, Indonesia', '087877271920', '2022-11-25', 'Jaket', 'Kalibre Touring Jacket', 2, 200000),
(3, 'Kevin Khalfani Fadillah', 'Koja, Jakut', '087877271929', '2022-11-01', 'Sepatu', 'Converse White', 1, 50000),
(6, 'Muhammad Afrizal Rasyid', 'Kemayoran, Jakarta', '+62 812-1301-3665', '2022-11-08', 'Jaket', 'Black Hoodie Eiger', 2, 700000),
(7, 'Dylan Prawiro', 'Kemayoran, Jakarta', '087877271927', '2022-11-05', 'Jam Tangan', 'Nike Air Jordan', 1, 0),
(8, 'Cristiano Ronaldi', 'Madeira, Portugal', '087877271823', '2022-11-10', 'Sepatu', 'CR7 Adidas Shoes', 1, 0),
(9, 'Lionel Messi', 'Rosario, Argentina', '087877271345', '0000-00-00', 'Jam Tangan', 'Converse White', 2, 120000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `khalfani`
--
ALTER TABLE `khalfani`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `khalfani`
--
ALTER TABLE `khalfani`
  MODIFY `id_pembeli` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
