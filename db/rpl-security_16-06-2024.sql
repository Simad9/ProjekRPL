-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2024 at 05:31 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `jamMulai` time NOT NULL,
  `jamAkhir` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `jamMulai`, `jamAkhir`) VALUES
(1, '07:00:00', '15:00:00'),
(2, '15:00:00', '22:00:00'),
(3, '22:00:00', '07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kunci`
--

CREATE TABLE `kunci` (
  `id_kunci` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `lokasi` varchar(30) NOT NULL,
  `penjaw` varchar(30) NOT NULL,
  `note` text NOT NULL,
  `urlFoto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kunci`
--

INSERT INTO `kunci` (`id_kunci`, `nama`, `lokasi`, `penjaw`, `note`, `urlFoto`) VALUES
(5, 'Kunci Seminar', 'Patt 1', 'Pak Sugeng', 'Mahasiswa harus izin terlebih dahulu', '666df01b2e3df.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `lap_barang`
--

CREATE TABLE `lap_barang` (
  `id_lapBarang` int(11) NOT NULL,
  `tanggalWaktu` datetime NOT NULL DEFAULT current_timestamp(),
  `jenisBarang` varchar(30) NOT NULL,
  `deskripsi` varchar(30) NOT NULL,
  `urlFoto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lap_barang`
--

INSERT INTO `lap_barang` (`id_lapBarang`, `tanggalWaktu`, `jenisBarang`, `deskripsi`, `urlFoto`) VALUES
(8, '2024-06-16 22:14:10', 'Kunci Motor', 'test', '666f014260019.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `lap_jaga`
--

CREATE TABLE `lap_jaga` (
  `id_lapJaga` int(11) NOT NULL,
  `id_security` int(11) NOT NULL,
  `id_jadwal` int(11) DEFAULT NULL,
  `statusJaga` varchar(20) DEFAULT NULL,
  `waktuMulai` time NOT NULL DEFAULT current_timestamp(),
  `waktuSelesai` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lap_jaga`
--

INSERT INTO `lap_jaga` (`id_lapJaga`, `id_security`, `id_jadwal`, `statusJaga`, `waktuMulai`, `waktuSelesai`) VALUES
(1, 1, 1, NULL, '11:51:02', '21:19:16'),
(2, 2, 2, NULL, '21:19:30', '23:26:47'),
(3, 3, 3, 'berjaga', '22:05:56', '00:00:00'),
(5, 6, NULL, NULL, '04:14:52', '04:14:52');

-- --------------------------------------------------------

--
-- Table structure for table `lap_kehilangan`
--

CREATE TABLE `lap_kehilangan` (
  `id_lapKehilangan` int(11) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `bukti` varchar(30) NOT NULL,
  `urlFoto` varchar(30) NOT NULL,
  `id_lapBarang` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lap_kehilangan`
--

INSERT INTO `lap_kehilangan` (`id_lapKehilangan`, `tanggal`, `bukti`, `urlFoto`, `id_lapBarang`, `id_mhs`) VALUES
(7, '2024-06-16', 'STNK', '666f0153723ae.png', 8, 26);

-- --------------------------------------------------------

--
-- Table structure for table `lap_pinjamkunci`
--

CREATE TABLE `lap_pinjamkunci` (
  `id_pinjamKunci` int(11) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `id_kunci` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `diizinkan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lap_reqjadwal`
--

CREATE TABLE `lap_reqjadwal` (
  `id_reqJadwal` int(11) NOT NULL,
  `tanggalWaktu` datetime NOT NULL DEFAULT current_timestamp(),
  `id_security` int(11) NOT NULL,
  `id_securityTeman` int(11) NOT NULL,
  `alasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lap_reqjadwal`
--

INSERT INTO `lap_reqjadwal` (`id_reqJadwal`, `tanggalWaktu`, `id_security`, `id_securityTeman`, `alasan`) VALUES
(4, '2024-06-16 21:55:50', 1, 2, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jurusan` varchar(30) DEFAULT NULL,
  `noHp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `nama`, `jurusan`, `noHp`) VALUES
(3, 'Wijdan Akhmad', 'Informatika', '082135322025'),
(4, 'Wijdan Akhmad', 'Informatika', '082135322025'),
(5, 'Test', 'IF', '08123456789'),
(9, 'Ageng', 'Informatika', '08231243'),
(10, 'Wijdan Akhmad', NULL, '082135322025'),
(12, 'Andi', 'Informatika', '08231243'),
(13, 'Wijdan', 'Informatika', '082135322025'),
(15, '123', '123', '123'),
(16, '123', '123', '123'),
(17, '123', '123', '123'),
(18, '123', '123', '123'),
(19, '123', '123', '123'),
(20, '123', '123', '123'),
(22, '123', '123', '123'),
(23, '123', '123', '123'),
(24, '123', 'Informatika', '082135322025'),
(26, '12312', NULL, '123');

-- --------------------------------------------------------

--
-- Table structure for table `security`
--

CREATE TABLE `security` (
  `id_security` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `noHp` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `security`
--

INSERT INTO `security` (`id_security`, `nama`, `noHp`, `username`, `password`) VALUES
(1, 'Wijdan A', '082135322025', '123', '123'),
(2, 'Ageng', '081234567890', '1234', '123'),
(3, 'Penjaga 1', '081098765432', '12345', '123'),
(6, 'Shiro', '092813', 'shiro', 'shiro');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `kunci`
--
ALTER TABLE `kunci`
  ADD PRIMARY KEY (`id_kunci`);

--
-- Indexes for table `lap_barang`
--
ALTER TABLE `lap_barang`
  ADD PRIMARY KEY (`id_lapBarang`);

--
-- Indexes for table `lap_jaga`
--
ALTER TABLE `lap_jaga`
  ADD PRIMARY KEY (`id_lapJaga`),
  ADD KEY `fk_jadwal` (`id_jadwal`),
  ADD KEY `fk_securityJaga` (`id_security`);

--
-- Indexes for table `lap_kehilangan`
--
ALTER TABLE `lap_kehilangan`
  ADD PRIMARY KEY (`id_lapKehilangan`),
  ADD KEY `fk_lapBarang` (`id_lapBarang`),
  ADD KEY `fk_mhs_kehilangan` (`id_mhs`);

--
-- Indexes for table `lap_pinjamkunci`
--
ALTER TABLE `lap_pinjamkunci`
  ADD PRIMARY KEY (`id_pinjamKunci`),
  ADD KEY `fk_mhs` (`id_mhs`),
  ADD KEY `fk_kunci` (`id_kunci`);

--
-- Indexes for table `lap_reqjadwal`
--
ALTER TABLE `lap_reqjadwal`
  ADD PRIMARY KEY (`id_reqJadwal`),
  ADD KEY `fk_secTemen` (`id_securityTeman`),
  ADD KEY `fk_securityReq` (`id_security`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indexes for table `security`
--
ALTER TABLE `security`
  ADD PRIMARY KEY (`id_security`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kunci`
--
ALTER TABLE `kunci`
  MODIFY `id_kunci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lap_barang`
--
ALTER TABLE `lap_barang`
  MODIFY `id_lapBarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lap_jaga`
--
ALTER TABLE `lap_jaga`
  MODIFY `id_lapJaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lap_kehilangan`
--
ALTER TABLE `lap_kehilangan`
  MODIFY `id_lapKehilangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lap_pinjamkunci`
--
ALTER TABLE `lap_pinjamkunci`
  MODIFY `id_pinjamKunci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `lap_reqjadwal`
--
ALTER TABLE `lap_reqjadwal`
  MODIFY `id_reqJadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `security`
--
ALTER TABLE `security`
  MODIFY `id_security` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lap_jaga`
--
ALTER TABLE `lap_jaga`
  ADD CONSTRAINT `fk_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`),
  ADD CONSTRAINT `fk_securityJaga` FOREIGN KEY (`id_security`) REFERENCES `security` (`id_security`);

--
-- Constraints for table `lap_kehilangan`
--
ALTER TABLE `lap_kehilangan`
  ADD CONSTRAINT `fk_lapBarang` FOREIGN KEY (`id_lapBarang`) REFERENCES `lap_barang` (`id_lapBarang`),
  ADD CONSTRAINT `fk_mhs_kehilangan` FOREIGN KEY (`id_mhs`) REFERENCES `mahasiswa` (`id_mhs`);

--
-- Constraints for table `lap_pinjamkunci`
--
ALTER TABLE `lap_pinjamkunci`
  ADD CONSTRAINT `fk_kunci` FOREIGN KEY (`id_kunci`) REFERENCES `kunci` (`id_kunci`),
  ADD CONSTRAINT `fk_mhs` FOREIGN KEY (`id_mhs`) REFERENCES `mahasiswa` (`id_mhs`);

--
-- Constraints for table `lap_reqjadwal`
--
ALTER TABLE `lap_reqjadwal`
  ADD CONSTRAINT `fk_secTemen` FOREIGN KEY (`id_securityTeman`) REFERENCES `security` (`id_security`),
  ADD CONSTRAINT `fk_securityReq` FOREIGN KEY (`id_security`) REFERENCES `security` (`id_security`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
