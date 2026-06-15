-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 15, 2026 at 06:11 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_latihan_pbo_ti1c_satriaardiyansyah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tiket`
--

CREATE TABLE `tabel_tiket` (
  `id_tiket` int NOT NULL,
  `nama_film` varchar(100) NOT NULL,
  `jadwal_tayang` datetime NOT NULL,
  `jumlah_kursi` int NOT NULL,
  `harga_dasar_tiket` decimal(10,2) NOT NULL,
  `jenis_studio` enum('regular','imax','velvet') NOT NULL,
  `tipe_audio` varchar(50) DEFAULT NULL,
  `lokasi_baris` varchar(10) DEFAULT NULL,
  `kacamata_3d_id` varchar(20) DEFAULT NULL,
  `efek_gerak_fitur` varchar(50) DEFAULT NULL,
  `bantal_selimut_pack` tinyint(1) DEFAULT NULL,
  `layanan_butler` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_tiket`
--

INSERT INTO `tabel_tiket` (`id_tiket`, `nama_film`, `jadwal_tayang`, `jumlah_kursi`, `harga_dasar_tiket`, `jenis_studio`, `tipe_audio`, `lokasi_baris`, `kacamata_3d_id`, `efek_gerak_fitur`, `bantal_selimut_pack`, `layanan_butler`) VALUES
(1, 'Agak Laen', '2026-06-20 13:00:00', 120, '45000.00', 'regular', 'Dolby Digital 7.1', 'A-10', NULL, NULL, NULL, NULL),
(2, 'Agak Laen', '2026-06-20 13:00:00', 120, '45000.00', 'regular', 'Dolby Digital 7.1', 'B-12', NULL, NULL, NULL, NULL),
(3, 'Badarawuhi', '2026-06-20 15:30:00', 100, '50000.00', 'regular', 'Dolby Digital 7.1', 'C-05', NULL, NULL, NULL, NULL),
(4, 'Badarawuhi', '2026-06-20 15:30:00', 100, '50000.00', 'regular', 'Dolby Digital 7.1', 'C-06', NULL, NULL, NULL, NULL),
(5, 'Siksa Kubur', '2026-06-21 19:00:00', 150, '40000.00', 'regular', 'Dolby Atmos', 'E-01', NULL, NULL, NULL, NULL),
(6, 'Siksa Kubur', '2026-06-21 19:00:00', 150, '40000.00', 'regular', 'Dolby Atmos', 'E-02', NULL, NULL, NULL, NULL),
(7, 'Kung Fu Panda 4', '2026-06-22 10:00:00', 120, '45000.00', 'regular', 'Dolby Digital 7.1', 'F-14', NULL, NULL, NULL, NULL),
(8, 'Kung Fu Panda 4', '2026-06-22 10:00:00', 120, '45000.00', 'regular', 'Dolby Digital 7.1', 'F-15', NULL, NULL, NULL, NULL),
(9, 'Dune: Part Two', '2026-06-20 14:00:00', 250, '85000.00', 'imax', 'IMAX 12-Channel', NULL, '3D-GLS-001', 'Getaran Bass Ekstra', NULL, NULL),
(10, 'Dune: Part Two', '2026-06-20 14:00:00', 250, '85000.00', 'imax', 'IMAX 12-Channel', NULL, '3D-GLS-002', 'Getaran Bass Ekstra', NULL, NULL),
(11, 'Godzilla x Kong', '2026-06-21 16:15:00', 250, '90000.00', 'imax', 'IMAX NextGen', NULL, '3D-GLS-045', 'Kursi D-BOX', NULL, NULL),
(12, 'Godzilla x Kong', '2026-06-21 16:15:00', 250, '90000.00', 'imax', 'IMAX NextGen', NULL, '3D-GLS-046', 'Kursi D-BOX', NULL, NULL),
(13, 'Civil War', '2026-06-22 20:00:00', 200, '80000.00', 'imax', 'IMAX 12-Channel', NULL, 'NON-3D', 'Efek Kejut Audio', NULL, NULL),
(14, 'Civil War', '2026-06-22 20:00:00', 200, '80000.00', 'imax', 'IMAX 12-Channel', NULL, 'NON-3D', 'Efek Kejut Audio', NULL, NULL),
(15, 'Dune: Part Two', '2026-06-20 20:30:00', 40, '150000.00', 'velvet', 'Dolby Atmos', 'BED-01', NULL, NULL, 1, 'Welcome Drink & Snack Platter'),
(16, 'Dune: Part Two', '2026-06-20 20:30:00', 40, '150000.00', 'velvet', 'Dolby Atmos', 'BED-02', NULL, NULL, 1, 'Welcome Drink & Snack Platter'),
(17, 'Badarawuhi', '2026-06-21 21:00:00', 30, '120000.00', 'velvet', 'Dolby Digital 7.1', 'BED-05', NULL, NULL, 1, 'Hot Tea & Popcorn Caramel'),
(18, 'Badarawuhi', '2026-06-21 21:00:00', 30, '120000.00', 'velvet', 'Dolby Digital 7.1', 'BED-06', NULL, NULL, 1, 'Hot Tea & Popcorn Caramel'),
(19, 'Civil War', '2026-06-22 18:30:00', 40, '140000.00', 'velvet', 'Dolby Atmos', 'BED-10', NULL, NULL, 1, 'Premium Lounge Access & Dinner'),
(20, 'Civil War', '2026-06-22 18:30:00', 40, '140000.00', 'velvet', 'Dolby Atmos', 'BED-11', NULL, NULL, 1, 'Premium Lounge Access & Dinner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  MODIFY `id_tiket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
