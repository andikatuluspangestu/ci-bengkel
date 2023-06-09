-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 09, 2023 at 12:48 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bengkelmotor`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `tgl_booking` date DEFAULT NULL,
  `no_antrian` int(11) DEFAULT NULL,
  `total_biaya` int(11) DEFAULT NULL,
  `id_sparepart` int(11) NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `jenis_service` varchar(255) DEFAULT NULL,
  `nama_customer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `tgl_booking`, `no_antrian`, `total_biaya`, `id_sparepart`, `id_customer`, `jenis_service`, `nama_customer`) VALUES
(45, '2023-06-09', 1, 57000, 2, NULL, 'Service 1', 'Fina Aulan Ni\'mah');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id_service` int(11) NOT NULL,
  `jenis_service` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `biaya` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id_service`, `jenis_service`, `deskripsi`, `gambar`, `biaya`) VALUES
(1, 'Service 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in arcu pulvinar, consectetur lorem eu, tristique est. Sed mollis ipsum id eros egestas semper. Nulla vitae tortor at metus laoreet dictum.', 'https://source.unsplash.com/random?car&8ef488f688', '7000'),
(2, 'Service 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in arcu pulvinar, consectetur lorem eu, tristique est. Sed mollis ipsum id eros egestas semper. Nulla vitae tortor at metus laoreet dictum.', 'https://source.unsplash.com/random?car&50d1ec7e17', '15000'),
(3, 'Service 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in arcu pulvinar, consectetur lorem eu, tristique est. Sed mollis ipsum id eros egestas semper. Nulla vitae tortor at metus laoreet dictum.', 'https://source.unsplash.com/random?car&52bb59e7d8', '3000'),
(4, 'Service 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in arcu pulvinar, consectetur lorem eu, tristique est. Sed mollis ipsum id eros egestas semper. Nulla vitae tortor at metus laoreet dictum.', 'https://source.unsplash.com/random?car&3c3b56356d', '5000'),
(5, 'Service 5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in arcu pulvinar, consectetur lorem eu, tristique est. Sed mollis ipsum id eros egestas semper. Nulla vitae tortor at metus laoreet dictum.', 'https://source.unsplash.com/random?car&63be3de5e7', '10000'),
(6, 'Service 6', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in arcu pulvinar, consectetur lorem eu, tristique est. Sed mollis ipsum id eros egestas semper. Nulla vitae tortor at metus laoreet dictum.', 'https://source.unsplash.com/random?car&afbb40ac99', '2000'),
(7, 'Service 7', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in arcu pulvinar, consectetur lorem eu, tristique est. Sed mollis ipsum id eros egestas semper. Nulla vitae tortor at metus laoreet dictum.', 'https://source.unsplash.com/random?car&3a195d3e8c', '2000'),
(8, 'Service 8', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in arcu pulvinar, consectetur lorem eu, tristique est. Sed mollis ipsum id eros egestas semper. Nulla vitae tortor at metus laoreet dictum.', 'https://source.unsplash.com/random?car&d6433ff039', '9000'),
(9, 'Service 9', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in arcu pulvinar, consectetur lorem eu, tristique est. Sed mollis ipsum id eros egestas semper. Nulla vitae tortor at metus laoreet dictum.', 'https://source.unsplash.com/random?car&448e8a998b', '4000'),
(10, 'Service 10', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in arcu pulvinar, consectetur lorem eu, tristique est. Sed mollis ipsum id eros egestas semper. Nulla vitae tortor at metus laoreet dictum.', 'https://source.unsplash.com/random?car&254c22dd26', '7000');

-- --------------------------------------------------------

--
-- Table structure for table `sparepart`
--

CREATE TABLE `sparepart` (
  `kd_sparepart` int(11) NOT NULL,
  `nama_sparepart` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sparepart`
--

INSERT INTO `sparepart` (`kd_sparepart`, `nama_sparepart`, `qty`, `harga`) VALUES
(1, 'Pelumas Yamalube 25mil', 20, 100000),
(2, 'Oli Castrol Matic', 200, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
(3, 'Admin', 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_sparepart` (`id_sparepart`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`);

--
-- Indexes for table `sparepart`
--
ALTER TABLE `sparepart`
  ADD PRIMARY KEY (`kd_sparepart`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sparepart`
--
ALTER TABLE `sparepart`
  MODIFY `kd_sparepart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
