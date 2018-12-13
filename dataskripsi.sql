-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2018 at 09:15 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dataskripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`nik`, `nama`) VALUES
('123', 'agus');

-- --------------------------------------------------------

--
-- Table structure for table `tb_enc_data_penduduk`
--

CREATE TABLE `tb_enc_data_penduduk` (
  `nik` varchar(32) NOT NULL,
  `nkk` varchar(32) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(24) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `tempat_lahir` varchar(48) NOT NULL,
  `tanggal_lahir` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_enc_data_penduduk`
--

INSERT INTO `tb_enc_data_penduduk` (`nik`, `nkk`, `nama`, `jenis_kelamin`, `alamat`, `tempat_lahir`, `tanggal_lahir`) VALUES
('33a838c63eadf257071531352242bc66', '33a838c6bb7d6c379966137392ee9410', '9df77192', '9458e4c81af970df78e4e0ab', '226662e38ead1ef3d36a20b9474df730ef10b0a6a223f7746095e6ac76f8426698bc89c896e4ca379fbdc8923ad2e9dc18a016f8d5f96fb8c8a5221dbdc7b4ce896e021da1539a38f60c9733291a1d1a4a7527c55c65e8fcd7142bb3', 'cda3213f16b1c13e8798625f', '73fc7c0e0d0e61fdc37be8de'),
('33a838c63eadf25707153135702f55e4', '33a838c6bb7d6c379966137319bfa634', 'def95fe1', '4486d42bb63956549f1cfd25', '226662e38ead1ef3d36a20b9474df730ef10b0a6a223f7746095e6ac76f8426698bc89c8e437a6e29fbdc8923ad2e9dc18a016f8d5f96fb8c8a5221dbdc7b4ce896e021da1539a38f60c9733291a1d1a4a7527c55c65e8fcd7142bb3', 'cf3d346abef89fb93d72076356c5aa56', '73fc7c0efa05b2b0b787f5b3'),
('33a838c63eadf257071531358f3e0527', '33a838c6bb7d6c379966137319bfa634', '5c6a33e4', '4486d42bb63956549f1cfd25', '226662e38ead1ef3d36a20b9474df730ef10b0a6a223f7746095e6ac76f8426698bc89c8e437a6e29fbdc8923ad2e9dc18a016f8d5f96fb8c8a5221dbdc7b4ce896e021da1539a38f60c9733291a1d1a4a7527c55c65e8fcd7142bb3', 'cda3213f93bba26063811da8f21da3f4', '73fc7c0efa05b2b071aae47e'),
('33a838c63eadf257071531359424996a', '33a838c6bb7d6c379966137392ee9410', '44d529a0f21da3f4', '4486d42bb63956549f1cfd25', '226662e38ead1ef3d36a20b9474df730ef10b0a6a223f7746095e6ac76f8426698bc89c896e4ca379fbdc8923ad2e9dc18a016f8d5f96fb8c8a5221dbdc7b4ce896e021da1539a38f60c9733291a1d1a4a7527c55c65e8fcd7142bb3', 'cf3d346abef89fb947f027dc391bfde39f1cfd25', '73fc7c0e0d0e61fda204eb89'),
('33a838c63eadf257071531359ff849ae', '33a838c6bb7d6c379966137392ee9410', '2f806e7f8012a5e2', '9458e4c81af970df78e4e0ab', '226662e38ead1ef3d36a20b9474df730ef10b0a6a223f7746095e6ac76f8426698bc89c896e4ca379fbdc8923ad2e9dc18a016f8d5f96fb8c8a5221dbdc7b4ce896e021da1539a38f60c9733291a1d1a4a7527c55c65e8fcd7142bb3', 'cf3d346abef89fb947f027dc391bfde39f1cfd25', '73fc7c0e0d0e61fdb787f5b3'),
('33a838c63eadf25707153135a613edf8', '33a838c6bb7d6c379966137392ee9410', '87a4a9e7330a5a7c', '9458e4c81af970df78e4e0ab', '226662e38ead1ef3d36a20b9474df730ef10b0a6a223f7746095e6ac76f8426698bc89c896e4ca379fbdc8923ad2e9dc18a016f8d5f96fb8c8a5221dbdc7b4ce896e021da1539a38f60c9733291a1d1a4a7527c55c65e8fcd7142bb3', 'cf3d346abef89fb9e8937c42d01e015fa58942ed', '73fc7c0e0d0e61fdb787f5b3'),
('33a838c63eadf25707153135bbd605e5', '33a838c6bb7d6c379966137392ee9410', 'a1dc8bd14f0523df', '9458e4c81af970df78e4e0ab', '226662e38ead1ef3d36a20b9474df730ef10b0a6a223f7746095e6ac76f8426698bc89c896e4ca379fbdc8923ad2e9dc18a016f8d5f96fb8c8a5221dbdc7b4ce896e021da1539a38f60c9733291a1d1a4a7527c55c65e8fcd7142bb3', 'cf3d346abef89fb9ff81c34a059bdda3', '73fc7c0e0d0e61fdb787f5b3'),
('33a838c63eadf25707153135c4681e1e', '33a838c6bb7d6c379966137319bfa634', '167fbf884f0523df', '9458e4c81af970df78e4e0ab', '226662e38ead1ef3d36a20b9474df730ef10b0a6a223f7746095e6ac76f8426698bc89c8e437a6e29fbdc8923ad2e9dc18a016f8d5f96fb8c8a5221dbdc7b4ce896e021da1539a38f60c9733291a1d1a4a7527c55c65e8fcd7142bb3', 'cf3d346abef89fb9f53d0045be0f0f9e74441cf3d7142bb3', '73fc7c0efa05b2b071aae47e'),
('33a838c63eadf25707153135c964f5b9', '33a838c6bb7d6c379966137392ee9410', 'dd616d70fd931a85', '9458e4c81af970df78e4e0ab', '226662e38ead1ef3d36a20b9474df730ef10b0a6a223f7746095e6ac76f8426698bc89c896e4ca379fbdc8923ad2e9dc18a016f8d5f96fb8c8a5221dbdc7b4ce896e021da1539a38f60c9733291a1d1a4a7527c55c65e8fcd7142bb3', 'cf3d346abef89fb9f53d0045e57ff8e1', '73fc7c0e0d0e61fdb787f5b3'),
('33a838c63eadf25707153135ce232c87', '33a838c6bb7d6c379966137319bfa634', 'd853e59f', '4486d42bb63956549f1cfd25', '226662e38ead1ef3d36a20b9474df730ef10b0a6a223f7746095e6ac76f8426698bc89c8e437a6e29fbdc8923ad2e9dc18a016f8d5f96fb8c8a5221dbdc7b4ce896e021da1539a38f60c9733291a1d1a4a7527c55c65e8fcd7142bb3', 'cf3d346abef89fb9db6950a03829e1335c050281', '73fc7c0efa05b2b0cedcbd2a'),
('33a838c63eadf25707153135d049b723', '33a838c6bb7d6c379966137392ee9410', '7ec04b3078e4e0ab', '9458e4c81af970df78e4e0ab', '226662e38ead1ef3d36a20b9474df730ef10b0a6a223f7746095e6ac76f8426698bc89c896e4ca379fbdc8923ad2e9dc18a016f8d5f96fb8c8a5221dbdc7b4ce896e021da1539a38f60c9733291a1d1a4a7527c55c65e8fcd7142bb3', 'cda3213f95168b25f17fbdc0', '73fc7c0e0d0e61fdc37be8de'),
('33a838c63eadf25707153135e0274ea4', '33a838c6bb7d6c379966137392ee9410', 'affa9a25', '9458e4c81af970df78e4e0ab', '226662e38ead1ef3d36a20b9474df730ef10b0a6a223f7746095e6ac76f8426698bc89c896e4ca379fbdc8923ad2e9dc18a016f8d5f96fb8c8a5221dbdc7b4ce896e021da1539a38f60c9733291a1d1a4a7527c55c65e8fcd7142bb3', 'cda3213f967283ec1cd3829bd4cba1f8', '73fc7c0e0d0e61fdb787f5b3'),
('33a838c63eadf25707153135f265f31d', '33a838c6bb7d6c379966137319bfa634', '7ec04b3082104233', '4486d42bb63956549f1cfd25', '226662e38ead1ef3d36a20b9474df730ef10b0a6a223f7746095e6ac76f8426698bc89c8e437a6e29fbdc8923ad2e9dc18a016f8d5f96fb8c8a5221dbdc7b4ce896e021da1539a38f60c9733291a1d1a4a7527c55c65e8fcd7142bb3', 'cda3213f777807d75b2b5fe09f1cfd25', '73fc7c0e0d0e61fd048f9567');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `id_pesan` int(11) NOT NULL,
  `username_pengirim` varchar(11) NOT NULL,
  `username_penerima` varchar(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `waktu_kirim` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pesan`
--

INSERT INTO `tb_pesan` (`id_pesan`, `username_pengirim`, `username_penerima`, `subject`, `pesan`, `waktu_kirim`) VALUES
(1, 'admin1', 'admin2', 'Tes', 'hanya Tes', '2018-10-08 09:34:00'),
(2, 'admin2', 'admin1', 'tes2', 'coba', '2018-10-08 09:35:00'),
(5, 'admin1', 'admin2', 'ssss', 'tyjcghkhj', '2018-10-08 09:36:51'),
(6, 'admin2', 'admin1', 'jhhhlhj', 'rsfgxghhjh', '2018-10-08 09:36:51'),
(7, 'admin2', 'admin1', 'coba', '<p>halo</p>', '2018-10-08 14:58:51'),
(8, 'admin2', 'admin1', 'tes', '<p>hanya tes</p>', '2018-10-08 15:38:35'),
(9, 'admin1', 'admin2', 'testestes', '<p>lalala</p>', '2018-10-16 15:35:54');

-- --------------------------------------------------------

--
-- Table structure for table `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `kode_prodi` varchar(5) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_prodi`
--

INSERT INTO `tb_prodi` (`kode_prodi`, `nama_prodi`) VALUES
('20201', 'Teknik Elektro S1'),
('20401', 'Teknik Elektronika D3'),
('21201', 'Teknik Mesin S1'),
('21401', 'Teknik Mesin D3'),
('22201', 'Teknik Sipil S1'),
('22401', 'Teknik Sipil D3'),
('23201', 'Arsitektur S1'),
('41221', 'Teknologi Pangan S1'),
('55201', 'Informatika S1'),
('61201', 'Manajemen S1'),
('74201', 'Hukum S1'),
('83207', 'Pendidikan Teknologi Informasi S1'),
('84202', 'Pendidikan Matematika S1'),
('84203', 'Pendidikan Fisika S1'),
('84205', 'Pendidikan Biologi S1'),
('85201', 'Pendidikan Jasmani, Kesehatan dan Rekreasi S1'),
('86104', 'Manajemen Pendidikan S2'),
('86201', 'Bimbingan dan Konseling S1'),
('86206', 'Pendidikan Guru Sekolah Dasar S1'),
('86207', 'Pendidikan Guru Pendidikan Anak Usia Dini S1'),
('87203', 'Pendidikan Ekonomi S1'),
('87205', 'Pendidikan Pancasila Dan Kewarganegaraan S1'),
('88101', 'Pendidikan Bahasa dan Sastra Indonesia S2'),
('88201', 'Pendidikan Bahasa Dan Sastra Indonesia S1'),
('88202', 'Pendidikan Bahasa dan Sastra Daerah S1'),
('88203', 'Pendidikan Bahasa Inggris S1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profpic` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`username`, `password`, `profpic`, `role`) VALUES
('admin1', '0192023a7bbd73250516f069df18b500', 'dist/img/user2-160x160.jpg', 'admin'),
('admin2', '0192023a7bbd73250516f069df18b500', 'dist/img/user1-128x128.jpg', 'admin'),
('student1', 'ad6a280417a0f533d8b670c61667e1a0', 'dist/img/user2-160x160.jpg', 'student'),
('student2', 'ad6a280417a0f533d8b670c61667e1a0', 'dist/img/user1-128x128.jpg', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tb_enc_data_penduduk`
--
ALTER TABLE `tb_enc_data_penduduk`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`kode_prodi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
