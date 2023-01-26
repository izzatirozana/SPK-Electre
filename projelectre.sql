-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2022 at 10:19 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projelectre`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tujuan_nama` varchar(100) NOT NULL,
  `tujuan` float NOT NULL,
  `jum_pinjaman` float NOT NULL,
  `gaji` float NOT NULL,
  `simpanan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id`, `nama`, `tujuan_nama`, `tujuan`, `jum_pinjaman`, `gaji`, `simpanan`) VALUES
(13, 'A', 'Pendidikan', 1, 3600000, 4320000, 2450000),
(14, 'B', 'Usaha', 2, 1816000, 3820000, 4450000),
(15, 'C', 'Kesehatan', 3, 4300000, 4320000, 2230000),
(16, 'D', 'Pendidikan', 1, 560000, 3820000, 3350000),
(17, 'E', 'Lainnya', 5, 2500000, 3820000, 4790500),
(18, 'F', 'Pendidikan', 1, 1900000, 3687000, 1825000),
(19, 'G', 'Usaha', 2, 1614000, 3687000, 2050000),
(20, 'H', 'Pendidikan', 1, 2997000, 3687000, 2950000),
(21, 'I', 'Lainnya', 5, 1500000, 3687000, 3950000),
(22, 'J', 'Pendidikan', 1, 1000000, 3687000, 2650000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`) VALUES
(4, 'admin', 'admin', '$2y$10$rYpNdxpB3HnnurPuAyPIiuh5WojI2uCe69Ax5zBunXqGGG5JJw1xG'),
(5, 'Nabila', 'nnabilaauliaa', '$2y$10$pYEiqfXNTgOJRQqhX51Hm.EyWpLi5ksESdqqz6PLoQuoJ1zu8x.DK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
