-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2021 at 11:23 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antriin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` bigint(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(0, 'admin01', '$2y$10$uodbUyd3pbIZaa/hc7lQEuGtjqYSgWsZlDCQX41x9r7F/GU37P9zm');

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` bigint(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(70) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `username`, `password`, `email`) VALUES
(4280444697, 'user02', '$2y$10$wPn3I/wbVT41KFHMwnH4COXs/W8gJG77uxeY8KOonyZ/UiZA2O6Nq', 'jskd@hhjsks.com');

-- --------------------------------------------------------

--
-- Table structure for table `apotek`
--

CREATE TABLE `apotek` (
  `id_apotek` bigint(20) NOT NULL,
  `nama_apotek` varchar(50) NOT NULL,
  `alamat_apotek` text NOT NULL,
  `no_telepon_apotek` varchar(20) NOT NULL,
  `id_resep_obat` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `list_dokter`
--

CREATE TABLE `list_dokter` (
  `id_dokter` bigint(20) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `spesialis` varchar(30) NOT NULL,
  `no_telepon` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_dokter`
--

INSERT INTO `list_dokter` (`id_dokter`, `nama_dokter`, `spesialis`, `no_telepon`) VALUES
(202104281210534, 'Rachel', 'Kandungan', '920023203'),
(202104281360554, 'Mark', 'Penyakit dalam', '0892382399'),
(202104281730631, 'Thorston', 'Ortopedi', '0882993434'),
(202104283540553, 'Lisa', 'Anak', '39393939'),
(202104284320535, 'George', 'THT', '343434');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_user` bigint(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `id_akun` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_user`, `nama_lengkap`, `no_ktp`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `no_telepon`, `id_akun`) VALUES
(202104280444361, 'User kedua bernama siapa', '939933112922', '2021-04-07', 'laki-laki', 'jalan raya kebun jati', '082993293', 4280444697);

-- --------------------------------------------------------

--
-- Table structure for table `poliklinik`
--

CREATE TABLE `poliklinik` (
  `id_poli` bigint(20) NOT NULL,
  `nama_poli` varchar(50) NOT NULL,
  `jadwal_buka` varchar(30) NOT NULL,
  `id_dokter` bigint(20) NOT NULL,
  `id_rs` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poliklinik`
--

INSERT INTO `poliklinik` (`id_poli`, `nama_poli`, `jadwal_buka`, `id_dokter`, `id_rs`) VALUES
(42810496202121, 'Sehat dimulai dari dalam diri', '15:00-23:00', 202104281360554, 42820210835905),
(42810520202120, 'Spesialis Kandungan Sejahtera', '08:00-12:00', 202104281210534, 42820210835905);

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `id_rekam_medis` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_rs` bigint(20) NOT NULL,
  `id_reservasi` bigint(20) NOT NULL,
  `keluhan` text NOT NULL,
  `diagnosis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `resep_obat`
--

CREATE TABLE `resep_obat` (
  `id_resep_obat` bigint(20) NOT NULL,
  `id_rekam_medis` bigint(20) NOT NULL,
  `daftar_obat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` bigint(20) NOT NULL,
  `nomor_antrian` varchar(10) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_dokter` bigint(20) NOT NULL,
  `id_rs` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rumah_sakit`
--

CREATE TABLE `rumah_sakit` (
  `id_rs` bigint(20) NOT NULL,
  `nama_rs` varchar(30) NOT NULL,
  `alamat_rs` text NOT NULL,
  `no_telepon_rs` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rumah_sakit`
--

INSERT INTO `rumah_sakit` (`id_rs`, `nama_rs`, `alamat_rs`, `no_telepon_rs`) VALUES
(42820210835905, 'Medica Husada Bakti Jaya', 'jalan Jenderal Sudirman', '98394 39390023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `apotek`
--
ALTER TABLE `apotek`
  ADD PRIMARY KEY (`id_apotek`),
  ADD KEY `fk_id_resep_obat` (`id_resep_obat`);

--
-- Indexes for table `list_dokter`
--
ALTER TABLE `list_dokter`
  ADD UNIQUE KEY `id_dokter` (`id_dokter`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_id_akun` (`id_akun`);

--
-- Indexes for table `poliklinik`
--
ALTER TABLE `poliklinik`
  ADD PRIMARY KEY (`id_poli`),
  ADD KEY `fk_id_dokter` (`id_dokter`),
  ADD KEY `fk_id_rs_poli` (`id_rs`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id_rekam_medis`),
  ADD KEY `fk_id_reservasi` (`id_reservasi`),
  ADD KEY `fk_id_rs2` (`id_rs`),
  ADD KEY `fk_id_user2` (`id_user`);

--
-- Indexes for table `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD PRIMARY KEY (`id_resep_obat`),
  ADD KEY `fk_id_rekam_medis` (`id_rekam_medis`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD KEY `fk_id_dokter2` (`id_dokter`),
  ADD KEY `fk_id_rs` (`id_rs`),
  ADD KEY `fk_id_user` (`id_user`);

--
-- Indexes for table `rumah_sakit`
--
ALTER TABLE `rumah_sakit`
  ADD PRIMARY KEY (`id_rs`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apotek`
--
ALTER TABLE `apotek`
  ADD CONSTRAINT `fk_id_resep_obat` FOREIGN KEY (`id_resep_obat`) REFERENCES `resep_obat` (`id_resep_obat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `fk_id_akun` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `poliklinik`
--
ALTER TABLE `poliklinik`
  ADD CONSTRAINT `fk_id_dokter` FOREIGN KEY (`id_dokter`) REFERENCES `list_dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_rs_poli` FOREIGN KEY (`id_rs`) REFERENCES `rumah_sakit` (`id_rs`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD CONSTRAINT `fk_id_reservasi` FOREIGN KEY (`id_reservasi`) REFERENCES `reservasi` (`id_reservasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_rs2` FOREIGN KEY (`id_rs`) REFERENCES `rumah_sakit` (`id_rs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_user2` FOREIGN KEY (`id_user`) REFERENCES `pengguna` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD CONSTRAINT `fk_id_rekam_medis` FOREIGN KEY (`id_rekam_medis`) REFERENCES `rekam_medis` (`id_rekam_medis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `fk_id_dokter2` FOREIGN KEY (`id_dokter`) REFERENCES `list_dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_rs` FOREIGN KEY (`id_rs`) REFERENCES `rumah_sakit` (`id_rs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `pengguna` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
