-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2024 at 08:21 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rpl-security`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lap_barang`
--

CREATE TABLE `lap_barang` (
  `id_lapBarang` int(11) NOT NULL,
  `namaBarang` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `ditemukan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lap_kehilangan`
--

CREATE TABLE `lap_kehilangan` (
  `id_lapKehilangan` int(11) NOT NULL,
  `namaPemilik` varchar(255) NOT NULL,
  `buktiKepemilikan` varchar(255) NOT NULL,
  `id_lapBarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lap_shift`
--

CREATE TABLE `lap_shift` (
  `id_lapShift` int(11) NOT NULL,
  `id_security` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_lapBarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `security`
--

CREATE TABLE `security` (
  `id_security` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `security`
--

INSERT INTO `security` (`id_security`, `nama`, `tgl_lhr`, `id_user`) VALUES
(1, 'wijdan', '2004-04-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, '123', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `lap_barang`
--
ALTER TABLE `lap_barang`
  ADD PRIMARY KEY (`id_lapBarang`);

--
-- Indexes for table `lap_kehilangan`
--
ALTER TABLE `lap_kehilangan`
  ADD PRIMARY KEY (`id_lapKehilangan`);

--
-- Indexes for table `lap_shift`
--
ALTER TABLE `lap_shift`
  ADD PRIMARY KEY (`id_lapShift`),
  ADD KEY `security` (`id_security`),
  ADD KEY `jadwal` (`id_jadwal`),
  ADD KEY `lapBarang` (`id_lapBarang`);

--
-- Indexes for table `security`
--
ALTER TABLE `security`
  ADD PRIMARY KEY (`id_security`),
  ADD KEY `user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lap_barang`
--
ALTER TABLE `lap_barang`
  MODIFY `id_lapBarang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lap_kehilangan`
--
ALTER TABLE `lap_kehilangan`
  MODIFY `id_lapKehilangan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lap_shift`
--
ALTER TABLE `lap_shift`
  MODIFY `id_lapShift` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `security`
--
ALTER TABLE `security`
  MODIFY `id_security` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lap_shift`
--
ALTER TABLE `lap_shift`
  ADD CONSTRAINT `jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`),
  ADD CONSTRAINT `lapBarang` FOREIGN KEY (`id_lapBarang`) REFERENCES `lap_barang` (`id_lapBarang`),
  ADD CONSTRAINT `security` FOREIGN KEY (`id_security`) REFERENCES `security` (`id_security`);

--
-- Constraints for table `security`
--
ALTER TABLE `security`
  ADD CONSTRAINT `user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
