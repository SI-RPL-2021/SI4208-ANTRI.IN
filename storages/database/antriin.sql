-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 05:27 AM
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
(4280444697, 'user02', '$2y$10$wPn3I/wbVT41KFHMwnH4COXs/W8gJG77uxeY8KOonyZ/UiZA2O6Nq', 'jskd@hhjsks.com'),
(5280242586, 'user01', '$2y$10$vAi95tifZO855LLViKkLvuaMp6UgcV2reRPaNC1jodOO01mznQiGa', 'abcjjs@antri.in');

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

--
-- Dumping data for table `apotek`
--

INSERT INTO `apotek` (`id_apotek`, `nama_apotek`, `alamat_apotek`, `no_telepon_apotek`, `id_resep_obat`) VALUES
(51722021012851, 'Jaya Farma Sejahtera', 'Jalan Flamboyan No.35', '03892 320023', 202139020522891),
(58712021022832, 'Vita CImin', 'jalan merdeka raya,', '343434', 202139020522891);

-- --------------------------------------------------------

--
-- Table structure for table `chat_online`
--

CREATE TABLE `chat_online` (
  `id_chat` bigint(20) NOT NULL,
  `conversations` text NOT NULL,
  `time_cnvs` datetime NOT NULL,
  `id_dok_chat` bigint(20) NOT NULL,
  `id_akun_chat` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dokter_akun`
--

CREATE TABLE `dokter_akun` (
  `id_akun_dok` bigint(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(70) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter_akun`
--

INSERT INTO `dokter_akun` (`id_akun_dok`, `username`, `password`, `email`) VALUES
(6131043867, 'rachel33', '$2y$10$oPM389z/m.uZDMcmuX5ayOoTev/zUy2UMU.7dYHrN.ka4pGlkZRmy', 'rachel33@antri.in'),
(6131046291, 'thorston55', '$2y$10$.Tw09z1Evf1QQozLEZAUb.Dc747aO.cjZtjtFzWwklXIoLLczmo.W', 'thorston55@antri.in'),
(6131048631, 'lisa77', '$2y$10$nHdXEf9UEg2l4zNy7wX/mOwkwWbG02D4GKdawKdoGcBaEoSlJntIe', 'lisa77@antri.in'),
(6131049003, 'mark88', '$2y$10$NEwm5gIYOLpcGHjoofNebuQaQ5TgRFMGMjn/w0H/vLXwP0YluaK3K', 'mark88@antri.in'),
(6131050280, 'george00', '$2y$10$3R0TDpANQtvoqVDtyVoOeuQTE.lcGsV8yhz0gZCUzoP5K4O13tRZ2', 'george00@antri.in');

-- --------------------------------------------------------

--
-- Table structure for table `list_dokter`
--

CREATE TABLE `list_dokter` (
  `id_dokter` bigint(20) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `spesialis` varchar(30) NOT NULL,
  `no_telepon` varchar(25) NOT NULL,
  `id_akun_dok` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_dokter`
--

INSERT INTO `list_dokter` (`id_dokter`, `nama_dokter`, `spesialis`, `no_telepon`, `id_akun_dok`) VALUES
(202104281210534, 'Rachel', 'Kandungan', '920023203', 6131043867),
(202104281360554, 'Mark', 'Penyakit dalam', '0892382399', 6131049003),
(202104281730631, 'Thorston', 'Gigi', '0882993434', 6131046291),
(202104283540553, 'Lisa', 'Anak', '39393939', 6131048631),
(202104284320535, 'George', 'Anak', '343434', 6131050280);

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
(202104280444361, 'Melisha', '939933112922', '1990-04-07', 'wanita', 'jalan raya kebun jati', '082993293', 4280444697),
(202105280242775, 'Selena', '999920003403033', '1993-06-18', 'Wanita', 'Jalan raya museum', '083929323', 5280242586);

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
(42810520202120, 'Spesialis Kandungan Sejahtera', '08:00-12:00', 202104281210534, 42820210835905),
(52803201202105, 'Umum', '10:00-20:00', 202104281730631, 52820210336702),
(52803402202104, 'Cinta Ibu Anak', '14:00-21:00', 202104281210534, 52820210317903),
(52803663202104, 'Gigi dan Gusi', '08:00-17:00', 202104284320535, 52820210336702),
(52803950202105, 'Psikiater Demi Hidup Bahagia', '11:00-19:00', 202104283540553, 52820210336702);

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

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`id_rekam_medis`, `id_user`, `id_rs`, `id_reservasi`, `keluhan`, `diagnosis`) VALUES
(202105892075928, 202104280444361, 42820210835905, 20217830528, 'Sakit Hati', 'Kelihatan Depresi');

-- --------------------------------------------------------

--
-- Table structure for table `resep_obat`
--

CREATE TABLE `resep_obat` (
  `id_resep_obat` bigint(20) NOT NULL,
  `id_rekam_medis` bigint(20) NOT NULL,
  `daftar_obat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resep_obat`
--

INSERT INTO `resep_obat` (`id_resep_obat`, `id_rekam_medis`, `daftar_obat`) VALUES
(202139020522891, 202105892075928, 'Air Putih; ...');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` bigint(20) NOT NULL,
  `nomor_antrian` varchar(10) NOT NULL,
  `status_reserv` varchar(15) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_dokter` bigint(20) NOT NULL,
  `id_rs` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `nomor_antrian`, `status_reserv`, `id_user`, `id_dokter`, `id_rs`) VALUES
(20217830528, '56', 'selesai', 202104280444361, 202104283540553, 42820210835905),
(202105280923158, '10', 'selesai', 202105280242775, 202104281210534, 42820210835905),
(202105280923207, '11', 'selesai', 202105280242775, 202104283540553, 52820210336702),
(202105281117298, '12', 'selesai', 202104280444361, 202104281730631, 52820210336702),
(202106130341710, '2', 'selesai', 202104280444361, 202104281360554, 42820210835905);

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
(42820210835905, 'Medica Husada Bakti Jaya', 'Jalan Jenderal Sudirman No.829', '98394 39390023'),
(52820210317903, 'Permata Hati Cemerlang', 'Jalan Raden Sanjaya No.2003', '823 29191032'),
(52820210336702, 'Dr. Djatiwibowo Healthcare', 'Jalan Pegangsaan No.111', '8299 32993934'),
(52820210376408, 'Dr. Kanuragan Sehati', 'Jalan Medical Check Up No.2930', '782 28919392');

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
-- Indexes for table `chat_online`
--
ALTER TABLE `chat_online`
  ADD PRIMARY KEY (`id_chat`),
  ADD KEY `fk_id_dok_chat` (`id_dok_chat`),
  ADD KEY `fk_id_akun_chat` (`id_akun_chat`);

--
-- Indexes for table `dokter_akun`
--
ALTER TABLE `dokter_akun`
  ADD PRIMARY KEY (`id_akun_dok`);

--
-- Indexes for table `list_dokter`
--
ALTER TABLE `list_dokter`
  ADD UNIQUE KEY `id_dokter` (`id_dokter`),
  ADD KEY `fk_id_akun_dok` (`id_akun_dok`);

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
-- Constraints for table `chat_online`
--
ALTER TABLE `chat_online`
  ADD CONSTRAINT `fk_id_akun_chat` FOREIGN KEY (`id_akun_chat`) REFERENCES `akun` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_dok_chat` FOREIGN KEY (`id_dok_chat`) REFERENCES `list_dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `list_dokter`
--
ALTER TABLE `list_dokter`
  ADD CONSTRAINT `fk_id_akun_dok` FOREIGN KEY (`id_akun_dok`) REFERENCES `dokter_akun` (`id_akun_dok`) ON DELETE CASCADE ON UPDATE CASCADE;

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
