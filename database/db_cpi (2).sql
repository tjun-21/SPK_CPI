-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2023 at 09:25 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cpi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(250) NOT NULL,
  `admin_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_username`, `admin_email`, `admin_password`, `admin_foto`) VALUES
(2, 'admin', 'admina@mail.com', '202cb962ac59075b964b07152d234b70', 'Screenshot_2023-07-23_004947.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenisproduk`
--

CREATE TABLE `tb_jenisproduk` (
  `jenis_id` int(11) NOT NULL,
  `jenis_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jenisproduk`
--

INSERT INTO `tb_jenisproduk` (`jenis_id`, `jenis_nama`) VALUES
(1, 'Makanan'),
(2, 'Kerajinan Tangan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `kriteria_id` int(11) NOT NULL,
  `kriteria_nama` varchar(30) NOT NULL,
  `bobot_kriteria` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`kriteria_id`, `kriteria_nama`, `bobot_kriteria`) VALUES
(1, 'Tenaga Kerja', 0.06),
(2, 'Target Pasar', 0.08),
(3, 'Asal Bahan Baku', 0.12),
(4, 'Ciri Khas Produk', 0.26),
(5, 'Ketersediaan Bahan Baku', 0.1),
(6, 'Omset / Tahun', 0.17),
(7, 'Permintaan Pasar', 0.21);

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `nilai_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`nilai_id`, `produk_id`, `sub_id`) VALUES
(1, 1, 2),
(3, 1, 9),
(4, 1, 11),
(5, 1, 15),
(6, 1, 17),
(7, 1, 20),
(8, 1, 23),
(10, 2, 1),
(12, 2, 7),
(13, 2, 12),
(14, 2, 15),
(15, 2, 17),
(16, 2, 19),
(17, 2, 22),
(19, 3, 1),
(21, 3, 9),
(22, 3, 11),
(23, 3, 13),
(24, 3, 18),
(25, 3, 20),
(26, 3, 23),
(28, 4, 3),
(30, 4, 9),
(31, 4, 12),
(32, 4, 15),
(33, 4, 18),
(34, 4, 21),
(35, 4, 24),
(37, 5, 3),
(39, 5, 9),
(40, 5, 12),
(41, 5, 15),
(42, 5, 18),
(43, 5, 21),
(44, 5, 24),
(46, 6, 1),
(48, 6, 9),
(49, 6, 11),
(50, 6, 13),
(51, 6, 17),
(52, 6, 20),
(53, 6, 23),
(55, 7, 2),
(57, 7, 9),
(58, 7, 12),
(59, 7, 15),
(60, 7, 17),
(61, 7, 21),
(62, 7, 23),
(64, 8, 1),
(66, 8, 7),
(67, 8, 12),
(68, 8, 13),
(69, 8, 17),
(70, 8, 20),
(71, 8, 23),
(73, 9, 2),
(75, 9, 9),
(76, 9, 12),
(77, 9, 15),
(78, 9, 17),
(79, 9, 20),
(80, 9, 23),
(82, 10, 2),
(84, 10, 9),
(85, 10, 12),
(86, 10, 15),
(87, 10, 17),
(88, 10, 20),
(89, 10, 23),
(91, 11, 1),
(93, 11, 7),
(94, 11, 12),
(95, 11, 13),
(96, 11, 17),
(97, 11, 20),
(98, 11, 23),
(100, 12, 2),
(102, 12, 9),
(103, 12, 12),
(104, 12, 13),
(105, 12, 17),
(106, 12, 20),
(107, 12, 23),
(109, 13, 2),
(111, 13, 9),
(112, 13, 12),
(113, 13, 14),
(114, 13, 17),
(115, 13, 20),
(116, 13, 23),
(118, 14, 1),
(120, 14, 9),
(121, 14, 12),
(122, 14, 13),
(123, 14, 18),
(124, 14, 20),
(125, 14, 23),
(127, 15, 2),
(129, 15, 9),
(130, 15, 11),
(131, 15, 13),
(132, 15, 16),
(133, 15, 20),
(134, 15, 22),
(136, 16, 2),
(138, 16, 9),
(139, 16, 12),
(140, 16, 15),
(141, 16, 17),
(142, 16, 20),
(143, 16, 23),
(145, 17, 1),
(147, 17, 9),
(148, 17, 11),
(149, 17, 13),
(150, 17, 16),
(151, 17, 20),
(152, 17, 23),
(154, 18, 1),
(156, 18, 9),
(157, 18, 11),
(158, 18, 13),
(159, 18, 17),
(160, 18, 20),
(161, 18, 23),
(163, 19, 3),
(165, 19, 7),
(166, 19, 11),
(167, 19, 13),
(168, 19, 17),
(169, 19, 21),
(170, 19, 22),
(172, 20, 2),
(174, 20, 7),
(175, 20, 12),
(176, 20, 13),
(177, 20, 17),
(178, 20, 20),
(179, 20, 23),
(181, 21, 3),
(183, 21, 7),
(184, 21, 11),
(185, 21, 13),
(186, 21, 17),
(187, 21, 20),
(188, 21, 22),
(190, 22, 2),
(192, 22, 9),
(193, 22, 11),
(194, 22, 13),
(195, 22, 17),
(196, 22, 21),
(197, 22, 23),
(199, 23, 2),
(201, 23, 9),
(202, 23, 11),
(203, 23, 13),
(204, 23, 17),
(205, 23, 21),
(206, 23, 23),
(208, 24, 2),
(210, 24, 7),
(211, 24, 12),
(212, 24, 13),
(213, 24, 17),
(214, 24, 20),
(215, 24, 22),
(217, 25, 2),
(219, 25, 8),
(220, 25, 11),
(221, 25, 13),
(222, 25, 17),
(223, 25, 20),
(224, 25, 22),
(226, 26, 3),
(228, 26, 9),
(229, 26, 11),
(230, 26, 13),
(231, 26, 17),
(232, 26, 20),
(233, 26, 22),
(235, 27, 2),
(237, 27, 9),
(238, 27, 11),
(239, 27, 13),
(240, 27, 16),
(241, 27, 20),
(242, 27, 22),
(244, 28, 3),
(246, 28, 9),
(247, 28, 11),
(248, 28, 13),
(249, 28, 17),
(250, 28, 21),
(251, 28, 22),
(253, 29, 2),
(255, 29, 9),
(256, 29, 11),
(257, 29, 13),
(258, 29, 17),
(259, 29, 20),
(260, 29, 23),
(262, 30, 3),
(264, 30, 9),
(265, 30, 11),
(266, 30, 13),
(267, 30, 17),
(268, 30, 21),
(269, 30, 22);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `produk_id` int(11) NOT NULL,
  `produk_nama` varchar(50) NOT NULL,
  `produk_jenis` int(11) NOT NULL,
  `produk_description` text NOT NULL,
  `produk_foto` varchar(255) DEFAULT NULL,
  `produk_hasil` float NOT NULL DEFAULT '0',
  `produk_rank` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`produk_id`, `produk_nama`, `produk_jenis`, `produk_description`, `produk_foto`, `produk_hasil`, `produk_rank`) VALUES
(1, 'Sambal Sunti Teri Nasi', 1, 'Sambal yang mengedepankan Performa', '', 222, 7),
(2, 'Kerang Sambal Nanas', 1, '', '', 168, 12),
(3, 'Gelang Manik Manik', 2, '', '', 157, 3),
(4, 'Asam Udang', 1, ' apa itu ? ahahahha', '', 282, 1),
(5, 'Asam Kareng', 1, '', '', 282, 2),
(6, 'Gelang Batu Alam', 2, '', '', 147, 4),
(7, 'Kerupuk Ikan Suree', 1, '', '', 245, 3),
(8, 'Kanji Rumbi', 1, '', '', 154, 15),
(9, 'Bileh Crispi', 1, '', '', 228, 4),
(10, 'Udang Crispi', 1, '', '', 228, 5),
(11, 'Lemang', 1, '', '', 154, 16),
(12, 'Kue Bawang', 1, '', '', 176, 10),
(13, 'Keripik Usus Ayam', 1, '', '', 202, 8),
(14, 'Keripik Tempe', 1, '', '', 180, 9),
(15, 'Stik Ketela', 1, '', '', 139, 18),
(16, 'Ikan Keumamah', 1, '', '', 228, 6),
(17, 'Peyek Kacang', 1, '', '', 154, 17),
(18, 'Kelapa Jelly', 1, '', '', 164, 13),
(19, 'Kerajinan Rotan', 2, '', '', 130.5, 8),
(20, 'Tape Beras', 1, '', '', 160, 14),
(21, 'Ayaman Tampi Beras', 2, '', '', 122, 10),
(22, 'Songket Bordir Pucok Reubong', 2, '', '', 161.5, 1),
(23, 'Tas Bordir', 2, '', '', 161.5, 2),
(24, 'Anyaman', 2, '', '', 122, 11),
(25, 'Tas Rajut', 2, '', '', 124, 9),
(26, 'Sarung Bordir', 2, '', '', 138, 7),
(27, 'Kopiah Bordir', 2, '', '', 122, 12),
(28, 'Payung Kasap', 2, '', '', 146.5, 5),
(29, 'Keripik Pisang Aneka Rasa', 1, 'Keripik pisang adalah makanan yang terbuat dari pisang yang diiris tipis kemudian digoreng dengan menggunakan tepung yang telah dibumbui. Biasanya rasanya adalah asin dengan aroma bawang yang gurih [1] Makanan ini tersebar hampir merata di seluruh Indonesia, khususnya di Pulau Jawa dan Sumatra. Ada pula hidangan sejenis kripik pisang yang serupa di beberapa daerah Asia, seperti Filipina, India, dan Thailand.\r\n\r\nKeripik pisang merupakan satu-satunya produk olahan pisang yang memiliki perdagangan internasional yang signifikan. Pengekspor utama keripik pisang di seluruh dunia adalah Filipina. Pasar ekspor keripik pisang juga sudah ada di Thailand dan Indonesia.', '6840478.png', 170, 11),
(30, 'Tudung Saji', 2, '     tudung saji merupakan suatu apa lah yang saya juga kurang tau, yang fungsinya untuk dipakek pastinya, dan juga merupakan suatu benda yang saya sendiri tidak tau bentuknya\r\n      ', '', 146.5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sub_kriteria`
--

CREATE TABLE `tb_sub_kriteria` (
  `sub_id` int(11) NOT NULL,
  `sub_nama` varchar(50) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `sub_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sub_kriteria`
--

INSERT INTO `tb_sub_kriteria` (`sub_id`, `sub_nama`, `kriteria_id`, `sub_nilai`) VALUES
(1, 'Kurang dari 3 orang jumlah tenaga kerja', 1, 1),
(2, 'Antara 3-7 orang jumlah tenaga kerja\r\n', 1, 2),
(3, 'Lebih dari 7 orng jumlah tenaga kerja', 1, 3),
(7, 'Pasar tradisional', 2, 1),
(8, 'Swalayan', 2, 2),
(9, 'Pasar tradisional dan swalayan ', 2, 3),
(10, 'Luar daerah ', 3, 1),
(11, 'Luar daerah dan dalam daerah ', 3, 2),
(12, 'Dalam daerah', 3, 3),
(13, 'Olahan pangan dari hasil perkebunan ', 4, 1),
(14, 'Olahan pangan dari hasil peternakan ', 4, 2),
(15, 'Olahan pangan dari hasil perikanan ', 4, 3),
(16, 'Cukup banyak ', 5, 1),
(17, 'Banyak ', 5, 2),
(18, 'Sangat Banyak', 5, 3),
(19, 'Kurang dari 5 juta ', 6, 1),
(20, 'Antara 5-20 juta', 6, 2),
(21, 'Lebih dari 20 juta ', 6, 3),
(22, 'Cukup banyak', 7, 1),
(23, 'Banyak', 7, 2),
(24, 'Sangat Banyak ', 7, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_jenisproduk`
--
ALTER TABLE `tb_jenisproduk`
  ADD PRIMARY KEY (`jenis_id`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`kriteria_id`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`nilai_id`),
  ADD KEY `produk_id` (`produk_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`produk_id`),
  ADD KEY `jenis_id` (`produk_jenis`);

--
-- Indexes for table `tb_sub_kriteria`
--
ALTER TABLE `tb_sub_kriteria`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `kriteria_id` (`kriteria_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_jenisproduk`
--
ALTER TABLE `tb_jenisproduk`
  MODIFY `jenis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `kriteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;
--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tb_sub_kriteria`
--
ALTER TABLE `tb_sub_kriteria`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD CONSTRAINT `tb_nilai_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `tb_produk` (`produk_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_nilai_ibfk_2` FOREIGN KEY (`sub_id`) REFERENCES `tb_sub_kriteria` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD CONSTRAINT `tb_produk_ibfk_1` FOREIGN KEY (`produk_jenis`) REFERENCES `tb_jenisproduk` (`jenis_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_sub_kriteria`
--
ALTER TABLE `tb_sub_kriteria`
  ADD CONSTRAINT `tb_sub_kriteria_ibfk_1` FOREIGN KEY (`kriteria_id`) REFERENCES `tb_kriteria` (`kriteria_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
