-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 11:31 AM
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
  `waktuMulai` time NOT NULL,
  `waktuSelesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `waktuMulai`, `waktuSelesai`) VALUES
(1, '07:00:00', '15:00:00'),
(2, '15:00:00', '22:00:00'),
(3, '22:00:00', '07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_security`
--

CREATE TABLE `jadwal_security` (
  `id_jadwalSecurity` int(11) NOT NULL,
  `id_security` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_security`
--

INSERT INTO `jadwal_security` (`id_jadwalSecurity`, `id_security`, `id_jadwal`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `lap_barang`
--

CREATE TABLE `lap_barang` (
  `id_lapBarang` int(11) NOT NULL,
  `namaBarang` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `deskripsi` text NOT NULL,
  `fotoBarang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lap_barang`
--

INSERT INTO `lap_barang` (`id_lapBarang`, `namaBarang`, `tanggal`, `deskripsi`, `fotoBarang`) VALUES
(8, 'Kunci Motor', '2024-05-14 15:43:14', 'zczds', '664324227e8f6.png'),
(9, 'Kunci Motor', '2024-05-14 15:44:13', 'asdas', '6643245d62ca9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lap_kehilangan`
--

CREATE TABLE `lap_kehilangan` (
  `id_lapKehilangan` int(11) NOT NULL,
  `namaPemilik` varchar(255) NOT NULL,
  `noHp` varchar(20) NOT NULL,
  `buktiKepemilikan` varchar(255) NOT NULL,
  `fotoBukti` text NOT NULL,
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
  `id_lapBarang` int(11) DEFAULT NULL,
  `waktuMulai` datetime NOT NULL DEFAULT current_timestamp(),
  `waktuSelesai` datetime DEFAULT current_timestamp(),
  `note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `security`
--

CREATE TABLE `security` (
  `id_security` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `noHp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `security`
--

INSERT INTO `security` (`id_security`, `nama`, `tgl_lhr`, `noHp`, `alamat`, `id_user`) VALUES
(1, 'Wijdan Akhmad', '2004-04-09', '082135322025', 'Jalan Bumi', 1),
(2, 'Ageng', '0000-00-00', '0821353220', 'jalan situ', 2),
(3, 'Penjaga Satu', '2024-05-04', '082135328888', 'Jalan Mars', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `passwordLama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `passwordLama`) VALUES
(1, '123', 'akhmad@gmail.com', '123', '12345'),
(2, '1234', 'ageng@gmail.com', '1234', 'a123'),
(3, 'B', NULL, 'b123', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `jadwal_security`
--
ALTER TABLE `jadwal_security`
  ADD PRIMARY KEY (`id_jadwalSecurity`),
  ADD KEY `js_security` (`id_security`),
  ADD KEY `js_jadwal` (`id_jadwal`);

--
-- Indexes for table `lap_barang`
--
ALTER TABLE `lap_barang`
  ADD PRIMARY KEY (`id_lapBarang`);

--
-- Indexes for table `lap_kehilangan`
--
ALTER TABLE `lap_kehilangan`
  ADD PRIMARY KEY (`id_lapKehilangan`),
  ADD KEY `id_lapBarang` (`id_lapBarang`);

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
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwal_security`
--
ALTER TABLE `jadwal_security`
  MODIFY `id_jadwalSecurity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lap_barang`
--
ALTER TABLE `lap_barang`
  MODIFY `id_lapBarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lap_kehilangan`
--
ALTER TABLE `lap_kehilangan`
  MODIFY `id_lapKehilangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `lap_shift`
--
ALTER TABLE `lap_shift`
  MODIFY `id_lapShift` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `security`
--
ALTER TABLE `security`
  MODIFY `id_security` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_security`
--
ALTER TABLE `jadwal_security`
  ADD CONSTRAINT `js_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`),
  ADD CONSTRAINT `js_security` FOREIGN KEY (`id_security`) REFERENCES `security` (`id_security`);

--
-- Constraints for table `lap_kehilangan`
--
ALTER TABLE `lap_kehilangan`
  ADD CONSTRAINT `id_lapBarang` FOREIGN KEY (`id_lapBarang`) REFERENCES `lap_barang` (`id_lapBarang`);

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
