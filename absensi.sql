-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2021 at 06:20 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(18, 'admin', '$2y$10$xwdiucHf.Q43DEaH9y1Zv.2wjsYeWX9hrLcMKYICFDYKhUIfD9ldW'),
(24, 'a', '$2y$10$PFzQ1qrYs4.g2rUUWTg8IOTleUMTnJXHnjQ7CqbMA9AD8dSnqZ19.'),
(25, 'user', '$2y$10$k7n.RWW5XRNKsJwqMZpWdueJJEfX.2qcrlKBGvxUhBqqAtTvIwA8W');

-- --------------------------------------------------------

--
-- Table structure for table `histori_absensi`
--

CREATE TABLE `histori_absensi` (
  `id_histori` int(20) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Tanggal` varchar(100) NOT NULL,
  `Jam_masuk` time DEFAULT NULL,
  `Jam_keluar` time DEFAULT NULL,
  `Kehadiran` varchar(100) NOT NULL,
  `Keterangan` varchar(100) NOT NULL,
  `Status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `histori_absensi`
--

INSERT INTO `histori_absensi` (`id_histori`, `Nama`, `Tanggal`, `Jam_masuk`, `Jam_keluar`, `Kehadiran`, `Keterangan`, `Status`) VALUES
(50, 'g', '13-Jul-21', '12:13:11', '12:13:22', 'a', 'am', 'a'),
(51, 'aloq', '13-Jul-21', '12:13:11', '12:13:22', 'aa', 'ak', '1'),
(52, 'aku', '15-Jul-21', '12:13:00', '12:13:22', 'aa', 'sasaaa', 'aaamnm'),
(53, 'aku', '15-Jul-21', '12:13:00', '12:13:00', 'a', 'aNaa', 'aaamnm');

-- --------------------------------------------------------

--
-- Table structure for table `semua_pegawai`
--

CREATE TABLE `semua_pegawai` (
  `Id_pegawai` int(11) NOT NULL,
  `Foto` varchar(50) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Nik` varchar(30) NOT NULL,
  `Departemen` varchar(50) NOT NULL,
  `Jabatan` varchar(50) NOT NULL,
  `No_Wa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semua_pegawai`
--

INSERT INTO `semua_pegawai` (`Id_pegawai`, `Foto`, `Nama`, `Nik`, `Departemen`, `Jabatan`, `No_Wa`) VALUES
(12, '60d194ab2e3dc.jpg', 'M.Dafiq Arifin', '1', 'aaa', 'j', '6285231216777'),
(15, '60ed015425ae1.jpg', 'Andika Meisma', '12', 'aaaaa', 'Administrasi', '1');

-- --------------------------------------------------------

--
-- Table structure for table `table_scan`
--

CREATE TABLE `table_scan` (
  `id_scan` int(11) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Tanggal` date NOT NULL,
  `Jam_masuk` varchar(100) NOT NULL,
  `Jam_keluar` varchar(100) NOT NULL,
  `Kehadiran` varchar(100) NOT NULL,
  `Keterangan` varchar(100) NOT NULL,
  `Status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_scan`
--

INSERT INTO `table_scan` (`id_scan`, `Nama`, `Tanggal`, `Jam_masuk`, `Jam_keluar`, `Kehadiran`, `Keterangan`, `Status`) VALUES
(102, 'b', '2021-07-10', '12:13', '12:13', '', '', 'masuk'),
(103, 'qq', '2021-07-08', '12:13:11', '12:13:22', '', '', 'masuk'),
(113, 'alot, 123, ssa, sssl', '2021-07-26', '2021-07-26 09:34:14', '', '', '', 'masuk'),
(114, 'alot', '2021-07-26', '2021-07-26 09:36:30', '', '', '', 'masuk'),
(137, 'alot, 123, ssa, sssl', '2021-07-27', '2021-07-28 00:01:31', '', '', '', 'masuk'),
(139, 'alot', '2021-07-27', '2021-07-28 00:07:51', '', '', '', 'masuk'),
(143, 'alot', '2021-07-28', '2021-07-28 08:52:51', '2021-07-28 10:30:29', '', '', 'pulang'),
(145, 'alot, 123, ssa, sssl', '2021-07-28', '2021-07-28 09:52:12', '2021-07-28 09:54:59', '', '', 'pulang'),
(148, 'alot', '2021-07-28', '2021-07-28 10:30:10', '2021-07-28 10:30:29', '', '', 'pulang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `histori_absensi`
--
ALTER TABLE `histori_absensi`
  ADD PRIMARY KEY (`id_histori`);

--
-- Indexes for table `semua_pegawai`
--
ALTER TABLE `semua_pegawai`
  ADD PRIMARY KEY (`Id_pegawai`);

--
-- Indexes for table `table_scan`
--
ALTER TABLE `table_scan`
  ADD PRIMARY KEY (`id_scan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `histori_absensi`
--
ALTER TABLE `histori_absensi`
  MODIFY `id_histori` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `semua_pegawai`
--
ALTER TABLE `semua_pegawai`
  MODIFY `Id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `table_scan`
--
ALTER TABLE `table_scan`
  MODIFY `id_scan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
