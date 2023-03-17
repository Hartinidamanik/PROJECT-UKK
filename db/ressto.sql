-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2022 at 05:32 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ressto`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_pengguna` ()  SELECT * FROM x_tbl_pengguna$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_det_jual`
--

CREATE TABLE `tbl_det_jual` (
  `id_det_jual` int(11) NOT NULL,
  `nofak_jual` varchar(30) NOT NULL,
  `kode_menu` varchar(20) DEFAULT NULL,
  `jumlah_item` int(15) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_det_jual`
--

INSERT INTO `tbl_det_jual` (`id_det_jual`, `nofak_jual`, `kode_menu`, `jumlah_item`, `harga_jual`) VALUES
(233, '202203160000218', 'PA002', 1, 15000),
(234, '202203160000218', 'PA002', 2, 15000),
(235, '202203160000219', 'MI002', 1, 1000),
(236, '202203160000219', 'MA001', 1, 7500),
(237, '202203160000220', 'MI002', 1, 1000),
(238, '202203160000221', 'MA001', 1, 7500),
(242, '202203160000223', 'MA002', 1, 2500),
(249, '202205120000001', 'MI001', 3, 12500),
(250, '202205120000229', 'PA002', 6, 15000),
(251, '202205120000230', 'S3452', 4, 12000),
(252, '202205120000231', 'MI002', 7, 1000),
(253, '202205120000232', 'PA001', 9, 3000),
(254, '202205120000232', '', 9, NULL),
(255, '202205120000233', 'RJ153', 12, 17000),
(256, '202205120000233', '', 12, NULL),
(257, '202205120000234', 'S1234', 1, 12000),
(258, '202205120000234', 'RJ153', 1, 17000),
(259, '202205130000235', 'RJ153', 1, 17000),
(260, '202205130000236', 'RJ153', 3, 17000),
(261, '202205130000237', 'DHCR07', 1, 25000),
(262, '202205130000237', 'PHCR05', 1, 1000000),
(263, '202205130000238', 'DHCR06', 1, 36000),
(264, '202205130000239', 'DHCR01', 2, 25000),
(265, '202205130000240', 'DHCR07', 2, 25000),
(266, '202205130000240', 'DHCR05', 2, 30000),
(267, '202205140000241', 'DHCR07', 1, 25000),
(268, '202205140000242', 'FHCR02', 2, 25000),
(269, '202205140000243', 'DHCR07', 6, 25000),
(270, '202205140000244', 'DHCR07', 1, 25000),
(271, '202205140000245', 'PHCR02', 2, 204000),
(272, '202205140000246', 'DHCR07', 1, 25000),
(273, '202205140000246', 'PHCR01', 3, 200000),
(274, '202205140000246', 'DHCR06', 1, 36000),
(275, '202205140000247', 'DHCR01', 3, 25000),
(276, '202205140000248', 'FHCR03', 4, 24000),
(277, '202205140000249', 'FHCR05', 4, 50000),
(278, '202205140000250', 'PHCR05', 5, 1000000),
(279, '202205140000251', 'FHCR02', 4, 25000),
(280, '202205140000252', 'DHCR05', 5, 30000),
(281, '202205140000253', 'DHCR02', 3, 25000),
(282, '202205140000254', 'DHCR07', 1, 25000),
(283, '202205140000254', 'DHCR05', 2, 30000),
(284, '202205140000255', 'DHCR03', 1, 36000),
(285, '202205140000255', 'PHCR04', 2, 24000),
(286, '202205140000256', 'FHCR03', 3, 24000),
(287, '202205140000257', 'DHCR03', 2, 36000),
(288, '202205140000257', 'PHCR02', 4, 204000),
(289, '202205140000258', 'FHCR03', 2, 24000),
(290, '202205140000259', 'FHCR01', 3, 12000),
(291, '202205140000259', 'DHCR03', 3, 36000),
(292, '202205140000260', 'PHCR04', 4, 24000),
(293, '202205140000261', 'FHCR04', 5, 50000),
(294, '202205140000261', 'FHCR05', 1, 50000),
(295, '202205140000261', 'DHCR05', 3, 30000),
(296, '202205140000262', 'DHCR05', 1, 30000),
(297, '202205140000262', 'DHCR01', 1, 25000),
(298, '202205140000263', 'FHCR03', 2, 24000),
(299, '202205140000263', 'FHCR02', 1, 25000),
(300, '202205140000264', 'PHCR04', 3, 24000),
(301, '202205140000264', 'PHCR03', 1, 120000),
(302, '202205140000265', 'PHCR01', 1, 200000),
(303, '202205140000266', 'DHCR02', 2, 25000),
(304, '202205140000267', 'PHCR05', 2, 1000000),
(305, '202205140000268', 'DHCR07', 1, 25000),
(306, '202205140000269', 'PHCR04', 1, 24000),
(307, '202205140000269', 'DHCR04', 1, 24000),
(308, '202205140000270', 'FHCR03', 3, 24000),
(309, '202205140000271', 'FHCR04', 2, 50000),
(310, '202205140000271', 'DHCR07', 4, 25000),
(311, '202205140000272', 'PHCR03', 2, 120000),
(312, '202205140000273', 'FHCR03', 7, 24000),
(313, '202205140000274', 'DHCR01', 1, 25000),
(314, '202205140000274', 'FHCR02', 1, 25000),
(315, '202205140000275', 'PHCR04', 3, 24000),
(316, '202205140000275', 'DHCR07', 5, 25000),
(317, '202205140000276', 'PHCR03', 1, 120000),
(318, '202205140000277', 'FHCR05', 1, 50000),
(319, '202205140000278', 'DHCR06', 3, 36000),
(320, '202205140000278', 'PHCR02', 2, 204000),
(321, '202205140000279', 'DHCR04', 1, 24000),
(322, '202205140000280', 'DHCR01', 1, 25000),
(323, '202205140000281', 'PHCR05', 2, 1000000),
(324, '202205140000282', 'DHCR06', 4, 36000),
(325, '202205140000283', 'DHCR05', 3, 30000),
(326, '202205140000284', 'PHCR04', 5, 24000),
(327, '202205140000285', 'DHCR02', 2, 25000),
(328, '202205140000286', 'PHCR05', 1, 1000000),
(329, '202205140000287', 'DHCR02', 1, 25000),
(330, '202205140000288', 'FHCR04', 1, 50000),
(331, '202205140000289', 'DHCR05', 2, 30000),
(332, '202205140000290', 'PHCR04', 1, 24000),
(333, '202205140000291', 'FHCR01', 1, 12000),
(334, '202205140000292', 'PHCR02', 2, 204000),
(335, '202205140000293', 'FHCR04', 2, 50000),
(336, '202205140000294', 'FHCR01', 3, 12000),
(337, '202205140000295', 'PHCR03', 1, 120000),
(338, '202205140000296', 'FHCR01', 1, 12000),
(339, '202205140000297', 'FHCR03', 3, 24000),
(340, '202205140000298', 'DHCR02', 1, 25000),
(341, '202205140000299', 'DHCR06', 2, 36000),
(342, '202205140000300', 'FHCR04', 1, 50000),
(343, '202205140000301', 'PHCR01', 1, 200000),
(344, '202205140000301', 'FHCR05', 1, 50000),
(345, '202205140000302', 'PHCR03', 2, 120000),
(346, '202205140000303', 'PHCR04', 1, 24000),
(347, '202205140000304', 'FHCR01', 3, 12000),
(349, '202205140000305', 'PHCR04', 1, 24000),
(350, '202205140000307', 'DHCR03', 3, 36000),
(351, '202205140000308', 'PHCR03', 1, 120000),
(352, '202205140000309', 'FHCR01', 4, 12000),
(353, '202205140000310', 'PHCR01', 1, 200000),
(354, '202205140000311', 'FHCR03', 7, 24000),
(355, '202205140000312', 'DHCR07', 2, 25000),
(356, '202205140000312', 'FHCR04', 1, 50000),
(357, '202205140000313', 'PHCR03', 5, 120000),
(358, '202205140000314', 'DHCR03', 3, 36000),
(359, '202205140000315', 'DHCR07', 1, 25000),
(360, '202205140000315', 'FHCR03', 1, 24000);

--
-- Triggers `tbl_det_jual`
--
DELIMITER $$
CREATE TRIGGER `tTransaksiDetailHapus` BEFORE DELETE ON `tbl_det_jual` FOR EACH ROW INSERT tbl_log(pengguna_id, pengguna_nama, aksi) VALUES (old.nofak_jual, 'Belum Ada Pengguna', CONCAT('Transaksi detail- menghapus no faktur : ', old.nofak_jual))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tTransaksiDetailTambah` BEFORE INSERT ON `tbl_det_jual` FOR EACH ROW INSERT tbl_log(pengguna_id, pengguna_nama, aksi) VALUES (new.nofak_jual, 'Belum Ada Pengguna', CONCAT('Transaksi detail - menambahkan na faktur : ', new.nofak_jual,', Kode menu: ', new.kode_menu, ', Jumlah item: ', new.jumlah_item, ' dan harga jual: ', new.harga_jual))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis`
--

CREATE TABLE `tbl_jenis` (
  `id_jenis` int(11) NOT NULL,
  `jenis_menu` varchar(50) NOT NULL,
  `pengguna_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis`
--

INSERT INTO `tbl_jenis` (`id_jenis`, `jenis_menu`, `pengguna_id`) VALUES
(7836, 'Makanan', 39),
(7837, 'Minuman', 39),
(7838, 'Paket Spesial', 39),
(7839, 'Paket Ceria', 39),
(7879, 'Paket Super', 39),
(7881, 'Paket KUA', 57);

--
-- Triggers `tbl_jenis`
--
DELIMITER $$
CREATE TRIGGER `tJenisHapus` BEFORE DELETE ON `tbl_jenis` FOR EACH ROW INSERT tbl_log(pengguna_id, pengguna_nama, aksi) VALUES (old.pengguna_id, 'Belum Ada Pengguna', CONCAT('Jenis Menu - menghapus jenis menu : ', old.jenis_menu))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tJenisTambah` AFTER INSERT ON `tbl_jenis` FOR EACH ROW INSERT tbl_log(pengguna_id, pengguna_nama, aksi) VALUES (new.pengguna_id, 'Belum Ada Pengguna', CONCAT('Jenis Menu - menambahkan jenis menu : ', new.jenis_menu))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tJenisUbah` BEFORE UPDATE ON `tbl_jenis` FOR EACH ROW INSERT tbl_log(pengguna_id, pengguna_nama, aksi) VALUES (old.pengguna_id, 'Belum Ada Pengguna', CONCAT('Jenis menu - mengubah nama jenis menu : ', old.jenis_menu, ' menjadi : ', new.jenis_menu))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log`
--

CREATE TABLE `tbl_log` (
  `pengunjung_id` int(11) NOT NULL,
  `pengguna_id` varchar(100) NOT NULL,
  `pengguna_nama` varchar(100) NOT NULL,
  `pengunjung_tanggal` timestamp NULL DEFAULT current_timestamp(),
  `aksi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_log`
--

INSERT INTO `tbl_log` (`pengunjung_id`, `pengguna_id`, `pengguna_nama`, `pengunjung_tanggal`, `aksi`) VALUES
(1708, '39', 'Manajer Keren', '2022-05-12 03:17:37', 'Nama Menu - menambahkan nama menu : mie kuah'),
(1709, '39', 'Manajer Keren', '2022-05-12 03:44:45', 'Nama Menu - menambahkan nama menu : boba'),
(1710, '202205120000001', 'Kasir skr', '2022-05-12 04:01:29', 'Transaksi detail - menambahkan na faktur : 202205120000001, Kode menu: MI001, Jumlah item: 3 dan harga jual: 12500'),
(1711, '39', 'Manajer Keren', '2022-05-12 04:07:00', 'Transaksi detail - menambahkan na faktur : 202205120000229, Kode menu: PA002, Jumlah item: 6 dan harga jual: 15000'),
(1712, '39', 'Manajer Keren', '2022-05-12 04:10:09', 'Nama Menu - menambahkan nama menu : jus kueni'),
(1713, '39', 'Manajer Keren', '2022-05-12 04:12:59', 'Nama Menu - menambahkan nama menu : ikan bakar'),
(1714, '202205120000230', 'Kasir skr', '2022-05-12 04:14:02', 'Transaksi detail - menambahkan na faktur : 202205120000230, Kode menu: S3452, Jumlah item: 4 dan harga jual: 12000'),
(1715, '39', 'Manajer Keren', '2022-05-12 04:35:35', 'Transaksi detail - menambahkan na faktur : 202205120000231, Kode menu: MI002, Jumlah item: 7 dan harga jual: 1000'),
(1716, '39', 'Manajer Keren', '2022-05-12 04:56:49', 'Transaksi detail - menambahkan na faktur : 202205120000232, Kode menu: PA001, Jumlah item: 9 dan harga jual: 3000'),
(1717, '39', 'Manajer Keren', '2022-05-12 04:57:30', NULL),
(1718, '39', 'Manajer Keren', '2022-05-12 05:05:05', 'Nama Menu - menambahkan nama menu : dimsum udang'),
(1719, '39', 'Manajer Keren', '2022-05-12 05:07:03', 'Transaksi detail - menambahkan na faktur : 202205120000233, Kode menu: RJ153, Jumlah item: 12 dan harga jual: 17000'),
(1720, '39', 'Manajer Keren', '2022-05-12 05:07:23', NULL),
(1721, '39', 'Manajer Keren', '2022-05-12 05:11:26', 'Nama Menu - menambahkan nama menu : jus jambu'),
(1722, '202205120000234', 'Kasir1', '2022-05-12 07:41:16', 'Transaksi detail - menambahkan na faktur : 202205120000234, Kode menu: S1234, Jumlah item: 1 dan harga jual: 12000'),
(1723, '202205120000234', 'Kasir1', '2022-05-12 07:41:41', 'Transaksi detail - menambahkan na faktur : 202205120000234, Kode menu: RJ153, Jumlah item: 1 dan harga jual: 17000'),
(1724, '37', 'Administrator', '2022-05-12 08:45:35', 'Pengguna - mengubah nama pengguna : Administrator menjadi : Administrator, mengubah username : admin menjadi : admin, mengubah email : admin@gmail.com menjadi : admin@gmail.com, mengubah no HP : 081- menjadi : 081- dan  mengubah hak akses : 1 menjadi : 1'),
(1725, '202205130000235', 'Kasir1', '2022-05-13 10:24:36', 'Transaksi detail - menambahkan na faktur : 202205130000235, Kode menu: RJ153, Jumlah item: 1 dan harga jual: 17000'),
(1726, '202205130000236', 'Kasir1', '2022-05-13 11:32:38', 'Transaksi detail - menambahkan na faktur : 202205130000236, Kode menu: RJ153, Jumlah item: 3 dan harga jual: 17000'),
(1727, '37', 'Administrator', '2022-05-13 11:56:56', 'Pengguna - mengubah nama pengguna : Administrator menjadi : Admin, mengubah username : admin menjadi : admin, mengubah email : admin@gmail.com menjadi : admin@gmail.com, mengubah no HP : 081- menjadi : 087615249845 dan  mengubah hak akses : 1 menjadi : 1'),
(1728, '48', 'Kasir Lama', '2022-05-13 11:57:58', 'Pengguna - mengubah nama pengguna : Kasir Lama menjadi : Kasir, mengubah username : lama menjadi : kasir, mengubah email : lama@gmail.com menjadi : kasir@gmail.com, mengubah no HP : 081- menjadi : 9832449823641 dan  mengubah hak akses : 3 menjadi : 3'),
(1729, '49', 'Kasir skr', '2022-05-13 12:07:57', 'Pengguna - mengubah nama pengguna : Kasir skr menjadi : Kasir1, mengubah username : 123 menjadi : kasir1, mengubah email : 123@gmail.com menjadi : kasir1@gmail.com, mengubah no HP : 123 menjadi : 081351427692 dan  mengubah hak akses : 3 menjadi : 3'),
(1730, '39', 'Manajer Keren', '2022-05-13 12:09:09', 'Pengguna - mengubah nama pengguna : Manajer Keren menjadi : Manager, mengubah username : manajer menjadi : manager, mengubah email : manajer@gmail.com menjadi : manager@gmail.com, mengubah no HP : 0812345 menjadi : 085231765923 dan  mengubah hak akses : 2 menjadi : 2'),
(1731, '56', 'Kasir2', '2022-05-13 12:10:58', 'Pengguna - menambahkan nama pengguna : kasir2, pengguna email : kasir2@gmail.com'),
(1732, '57', 'Manager S', '2022-05-13 12:14:13', 'Pengguna - menambahkan nama pengguna : managers, pengguna email : managers@gmail.com'),
(1733, '39', 'Manager', '2022-05-13 12:16:42', 'Jenis menu - mengubah nama jenis menu : Paket 1 menjadi : Paket Spesial'),
(1734, '39', 'Manager', '2022-05-13 12:16:58', 'Jenis menu - mengubah nama jenis menu : Paket 2 menjadi : Paket Super'),
(1735, '39', 'Manager', '2022-05-13 12:17:10', 'Jenis menu - mengubah nama jenis menu : Paket 3 menjadi : Paket Ceria'),
(1736, '57', 'Manager S', '2022-05-13 12:18:22', 'Jenis Menu - menambahkan jenis menu : Paket KUA'),
(1737, '39', 'Manager', '2022-05-13 12:34:37', 'Nama menu - mengubah nama menu : Nasi Putih menjadi : Kentang Goreng, Harga Jual : 7500 menjadi : 12000'),
(1738, '39', 'Manager', '2022-05-13 12:34:37', 'Nama menu - mengubah nama menu : Telor Dadar menjadi : Telor Dadar, Harga Jual : 2500 menjadi : 2500'),
(1739, '39', 'Manager', '2022-05-13 12:34:37', 'Nama menu - mengubah nama menu : Kerupuk menjadi : Kerupuk, Harga Jual : 1500 menjadi : 1500'),
(1740, '39', 'Manager', '2022-05-13 12:34:37', 'Nama menu - mengubah nama menu : Es Jeruk menjadi : Es Jeruk, Harga Jual : 12500 menjadi : 12500'),
(1741, '39', 'Manager', '2022-05-13 12:34:37', 'Nama menu - mengubah nama menu : Air Cup menjadi : Air Cup, Harga Jual : 1000 menjadi : 1000'),
(1742, '39', 'Manager', '2022-05-13 12:34:37', 'Nama menu - mengubah nama menu : Tahu + Tempe menjadi : Tahu + Tempe, Harga Jual : 3000 menjadi : 3000'),
(1743, '39', 'Manager', '2022-05-13 12:34:38', 'Nama menu - mengubah nama menu : Nasi Putih + Telor Dadar + Sayur menjadi : Nasi Putih + Telor Dadar + Sayur, Harga Jual : 15000 menjadi : 15000'),
(1744, '39', 'Manager', '2022-05-13 12:34:38', 'Nama menu - mengubah nama menu : dimsum udang menjadi : dimsum udang, Harga Jual : 17000 menjadi : 17000'),
(1745, '39', 'Manager', '2022-05-13 12:34:38', 'Nama menu - mengubah nama menu : boba menjadi : boba, Harga Jual : 12000 menjadi : 12000'),
(1746, '39', 'Manager', '2022-05-13 12:34:38', 'Nama menu - mengubah nama menu : mie kuah menjadi : mie kuah, Harga Jual : 15000 menjadi : 15000'),
(1747, '39', 'Manager', '2022-05-13 12:34:38', 'Nama menu - mengubah nama menu : jus kueni menjadi : jus kueni, Harga Jual : 12000 menjadi : 12000'),
(1748, '39', 'Manager', '2022-05-13 12:34:38', 'Nama menu - mengubah nama menu : ikan bakar menjadi : ikan bakar, Harga Jual : 25000 menjadi : 25000'),
(1749, '39', 'Manager', '2022-05-13 12:34:38', 'Nama menu - mengubah nama menu : jus jambu menjadi : jus jambu, Harga Jual : 12500 menjadi : 12500'),
(1750, '39', 'Manager', '2022-05-13 12:44:09', 'Nama menu - mengubah nama menu : Tahu + Tempe menjadi : Juice Jeruk Nipis, Harga Jual : 3000 menjadi : 25000'),
(1751, '39', 'Manager', '2022-05-13 12:50:09', 'Nama menu - mengubah nama menu : Juice Jeruk Nipis menjadi : Juice Jeruk Nipis, Harga Jual : 25000 menjadi : 25000'),
(1752, '39', 'Manager', '2022-05-13 12:54:24', 'Nama menu - mengubah nama menu : Nasi Putih + Telor Dadar + Sayur menjadi : Nasi Putih + Telor Dadar + Sayur, Harga Jual : 15000 menjadi : 15000'),
(1753, '39', 'Manager', '2022-05-13 12:54:24', 'Nama menu - mengubah nama menu : dimsum udang menjadi : dimsum udang, Harga Jual : 17000 menjadi : 17000'),
(1754, '39', 'Manager', '2022-05-13 12:54:24', 'Nama menu - mengubah nama menu : mie kuah menjadi : mie kuah, Harga Jual : 15000 menjadi : 15000'),
(1755, '39', 'Manager', '2022-05-13 12:54:24', 'Nama menu - mengubah nama menu : ikan bakar menjadi : ikan bakar, Harga Jual : 25000 menjadi : 25000'),
(1756, '39', 'Manager', '2022-05-13 13:03:32', 'Nama menu - mengubah nama menu : Nasi Putih + Telor Dadar + Sayur menjadi : Jus Terong Belanda, Harga Jual : 15000 menjadi : 15000'),
(1757, '39', 'Manager', '2022-05-13 13:03:32', 'Nama menu - mengubah nama menu : dimsum udang menjadi : Island Cofee, Harga Jual : 17000 menjadi : 17000'),
(1758, '39', 'Manager', '2022-05-13 13:03:32', 'Nama menu - mengubah nama menu : boba menjadi : Cofee Sepi, Harga Jual : 12000 menjadi : 12000'),
(1759, '39', 'Manager', '2022-05-13 13:03:32', 'Nama menu - mengubah nama menu : mie kuah menjadi : Blue Ice, Harga Jual : 15000 menjadi : 15000'),
(1760, '39', 'Manager', '2022-05-13 13:03:32', 'Nama menu - mengubah nama menu : jus kueni menjadi : Dalgona Cofee, Harga Jual : 12000 menjadi : 12000'),
(1761, '39', 'Manager', '2022-05-13 13:03:32', 'Nama menu - mengubah nama menu : ikan bakar menjadi : Americano, Harga Jual : 25000 menjadi : 25000'),
(1762, '39', 'Manager', '2022-05-13 13:03:32', 'Nama menu - mengubah nama menu : Telor Dadar menjadi : Ayam Goreng, Harga Jual : 2500 menjadi : 2500'),
(1763, '39', 'Manager', '2022-05-13 13:03:32', 'Nama menu - mengubah nama menu : Kerupuk menjadi : Kebab Gelap, Harga Jual : 1500 menjadi : 1500'),
(1764, '39', 'Manager', '2022-05-13 13:03:32', 'Nama menu - mengubah nama menu : Es Jeruk menjadi : Pizza, Harga Jual : 12500 menjadi : 12500'),
(1765, '39', 'Manager', '2022-05-13 13:03:32', 'Nama menu - mengubah nama menu : Air Cup menjadi : Rendang, Harga Jual : 1000 menjadi : 1000'),
(1766, '39', 'Manager', '2022-05-13 13:06:07', 'Nama menu - mengubah nama menu : Jus Terong Belanda menjadi : Jus Terong Belanda, Harga Jual : 15000 menjadi : 25000'),
(1767, '39', 'Manager', '2022-05-13 13:06:31', 'Nama menu - mengubah nama menu : Jus Terong Belanda menjadi : Jus Terong Belanda, Harga Jual : 25000 menjadi : 25000'),
(1768, '39', 'Manager', '2022-05-13 13:06:59', 'Nama menu - mengubah nama menu : Island Cofee menjadi : Island Cofee, Harga Jual : 17000 menjadi : 36000'),
(1769, '39', 'Manager', '2022-05-13 13:07:16', 'Nama menu - mengubah nama menu : Island Cofee menjadi : Island Cofee, Harga Jual : 36000 menjadi : 36000'),
(1770, '39', 'Manager', '2022-05-13 13:08:46', 'Nama menu - mengubah nama menu : Cofee Sepi menjadi : Cofee Sepi, Harga Jual : 12000 menjadi : 24000'),
(1771, '39', 'Manager', '2022-05-13 13:09:34', 'Nama menu - mengubah nama menu : Island Cofee menjadi : Island Cofee, Harga Jual : 36000 menjadi : 36000'),
(1772, '39', 'Manager', '2022-05-13 13:10:18', 'Nama menu - mengubah nama menu : Cofee Sepi menjadi : Cofee Sepi, Harga Jual : 24000 menjadi : 24000'),
(1773, '39', 'Manager', '2022-05-13 13:10:29', 'Nama menu - mengubah nama menu : Island Cofee menjadi : Island Cofee, Harga Jual : 36000 menjadi : 36000'),
(1774, '39', 'Manager', '2022-05-13 13:11:31', 'Nama menu - mengubah nama menu : Blue Ice menjadi : Blue Ice, Harga Jual : 15000 menjadi : 30000'),
(1775, '39', 'Manager', '2022-05-13 13:12:00', 'Nama menu - mengubah nama menu : Dalgona Cofee menjadi : Dalgona Cofee, Harga Jual : 12000 menjadi : 36000'),
(1776, '39', 'Manager', '2022-05-13 13:12:21', 'Nama menu - mengubah nama menu : Blue Ice menjadi : Blue Ice, Harga Jual : 30000 menjadi : 30000'),
(1777, '39', 'Manager', '2022-05-13 13:34:46', 'Nama menu - mengubah nama menu : Ayam Goreng menjadi : Ayam Goreng, Harga Jual : 2500 menjadi : 25000'),
(1778, '39', 'Manager', '2022-05-13 13:35:26', 'Nama menu - mengubah nama menu : Kebab Gelap menjadi : Kebab Gelap, Harga Jual : 1500 menjadi : 24000'),
(1779, '39', 'Manager', '2022-05-13 13:42:39', 'Nama menu - mengubah nama menu : Pizza menjadi : Pizza, Harga Jual : 12500 menjadi : 50000'),
(1780, '39', 'Manager', '2022-05-13 13:42:41', 'Nama menu - mengubah nama menu : Pizza menjadi : Pizza, Harga Jual : 50000 menjadi : 50000'),
(1781, '39', 'Manager', '2022-05-13 13:43:24', 'Nama menu - mengubah nama menu : Rendang menjadi : Rendang, Harga Jual : 1000 menjadi : 50000'),
(1782, '39', 'Manager', '2022-05-13 13:43:58', 'Nama menu - mengubah nama menu : Kentang Goreng menjadi : Kentang Goreng, Harga Jual : 12000 menjadi : 12000'),
(1783, '39', 'Manager', '2022-05-13 13:51:11', 'Nama menu - mengubah nama menu : Jus Terong Belanda menjadi : Jus Terong Belanda, Harga Jual : 25000 menjadi : 25000'),
(1784, '39', 'Manager', '2022-05-13 13:56:09', 'Nama menu - mengubah nama menu : Dalgona Cofee menjadi : Dalgona Cofee, Harga Jual : 36000 menjadi : 36000'),
(1785, '39', 'Manager', '2022-05-13 13:58:00', 'Nama menu - mengubah nama menu : Americano menjadi : Americano, Harga Jual : 25000 menjadi : 25000'),
(1786, '39', 'Manager', '2022-05-13 13:58:11', 'Nama menu - mengubah nama menu : Cofee Sepi menjadi : Coffee Sepi, Harga Jual : 24000 menjadi : 24000'),
(1787, '39', 'Manager', '2022-05-13 13:58:28', 'Nama menu - mengubah nama menu : Island Cofee menjadi : Island Coffee, Harga Jual : 36000 menjadi : 36000'),
(1788, '39', 'Manager', '2022-05-13 13:58:56', 'Nama menu - mengubah nama menu : Americano menjadi : Americano Coffee, Harga Jual : 25000 menjadi : 25000'),
(1789, '39', 'Manager', '2022-05-13 14:01:26', 'Nama menu - mengubah nama menu : jus jambu menjadi : jus jambu, Harga Jual : 12500 menjadi : 200000'),
(1790, '39', 'Manager', '2022-05-13 14:01:28', 'Nama menu - mengubah nama menu : jus jambu menjadi : jus jambu, Harga Jual : 200000 menjadi : 200000'),
(1791, '39', 'Manager', '2022-05-13 14:01:57', 'Nama menu - mengubah nama menu : jus jambu menjadi : Paket HCR 1, Harga Jual : 200000 menjadi : 200000'),
(1792, '39', 'Manager', '2022-05-13 14:04:18', 'Nama Menu - menambahkan nama menu : Burger, Nasi, Ayam,Telur,Minum'),
(1793, '39', 'Manager', '2022-05-13 14:06:08', 'Nama Menu - menambahkan nama menu : Paket Secangkir Berdua'),
(1794, '39', 'Manager', '2022-05-13 14:07:29', 'Nama menu - mengubah nama menu : Burger, Nasi, Ayam,Telur,Minum menjadi : Burger, Nasi, Ayam,Telur,Minum, Harga Jual : 204000 menjadi : 204000'),
(1795, '39', 'Manager', '2022-05-13 14:20:06', 'Nama Menu - menambahkan nama menu : Paket Sarapan1'),
(1796, '39', 'Manager', '2022-05-13 14:20:49', 'Nama menu - mengubah nama menu : Paket HCR 1 menjadi : Paket HCR 1, Harga Jual : 200000 menjadi : 200000'),
(1797, '39', 'Manager', '2022-05-13 14:21:07', 'Nama menu - mengubah nama menu : Paket Sarapan1 menjadi : Paket Sarapan, Harga Jual : 24000 menjadi : 24000'),
(1798, '39', 'Manager', '2022-05-13 14:23:10', 'Nama Menu - menambahkan nama menu : Paket Makan Malam Romantis'),
(1799, '39', 'Manager', '2022-05-13 14:25:06', 'Transaksi detail - menambahkan na faktur : 202205130000237, Kode menu: DHCR07, Jumlah item: 1 dan harga jual: 25000'),
(1800, '39', 'Manager', '2022-05-13 14:26:13', 'Transaksi detail - menambahkan na faktur : 202205130000237, Kode menu: PHCR05, Jumlah item: 1 dan harga jual: 1000000'),
(1801, '39', 'Manager', '2022-05-13 14:27:35', 'Transaksi detail - menambahkan na faktur : 202205130000238, Kode menu: DHCR06, Jumlah item: 1 dan harga jual: 36000'),
(1802, '39', 'Manager', '2022-05-13 14:27:52', 'Transaksi detail - menambahkan na faktur : 202205130000239, Kode menu: DHCR01, Jumlah item: 2 dan harga jual: 25000'),
(1803, '202205130000240', 'Kasir', '2022-05-13 15:19:43', 'Transaksi detail - menambahkan na faktur : 202205130000240, Kode menu: DHCR07, Jumlah item: 2 dan harga jual: 25000'),
(1804, '202205130000240', 'Kasir', '2022-05-13 15:19:58', 'Transaksi detail - menambahkan na faktur : 202205130000240, Kode menu: DHCR05, Jumlah item: 2 dan harga jual: 30000'),
(1805, '202205140000241', 'Kasir', '2022-05-13 23:58:44', 'Transaksi detail - menambahkan na faktur : 202205140000241, Kode menu: DHCR07, Jumlah item: 1 dan harga jual: 25000'),
(1806, '202205140000242', 'Kasir', '2022-05-13 23:59:45', 'Transaksi detail - menambahkan na faktur : 202205140000242, Kode menu: FHCR02, Jumlah item: 2 dan harga jual: 25000'),
(1807, '202205140000243', 'Kasir', '2022-05-14 00:01:01', 'Transaksi detail - menambahkan na faktur : 202205140000243, Kode menu: DHCR07, Jumlah item: 6 dan harga jual: 25000'),
(1808, '202205140000244', 'Kasir', '2022-05-14 00:51:09', 'Transaksi detail - menambahkan na faktur : 202205140000244, Kode menu: DHCR07, Jumlah item: 1 dan harga jual: 25000'),
(1809, '202205140000245', 'Kasir', '2022-05-14 00:51:41', 'Transaksi detail - menambahkan na faktur : 202205140000245, Kode menu: PHCR02, Jumlah item: 2 dan harga jual: 204000'),
(1810, '202205140000246', 'Kasir', '2022-05-14 01:06:06', 'Transaksi detail - menambahkan na faktur : 202205140000246, Kode menu: DHCR07, Jumlah item: 1 dan harga jual: 25000'),
(1811, '202205140000246', 'Kasir', '2022-05-14 01:06:18', 'Transaksi detail - menambahkan na faktur : 202205140000246, Kode menu: PHCR01, Jumlah item: 3 dan harga jual: 200000'),
(1812, '202205140000246', 'Kasir', '2022-05-14 01:06:27', 'Transaksi detail - menambahkan na faktur : 202205140000246, Kode menu: DHCR06, Jumlah item: 1 dan harga jual: 36000'),
(1813, '202205140000247', 'Kasir', '2022-05-14 01:35:23', 'Transaksi detail - menambahkan na faktur : 202205140000247, Kode menu: DHCR01, Jumlah item: 3 dan harga jual: 25000'),
(1814, '202205140000248', 'Kasir', '2022-05-14 01:37:02', 'Transaksi detail - menambahkan na faktur : 202205140000248, Kode menu: FHCR03, Jumlah item: 4 dan harga jual: 24000'),
(1815, '202205140000249', 'Kasir', '2022-05-14 01:37:47', 'Transaksi detail - menambahkan na faktur : 202205140000249, Kode menu: FHCR05, Jumlah item: 4 dan harga jual: 50000'),
(1816, '202205140000250', 'Kasir', '2022-05-14 01:39:07', 'Transaksi detail - menambahkan na faktur : 202205140000250, Kode menu: PHCR05, Jumlah item: 5 dan harga jual: 1000000'),
(1817, '202205140000251', 'Kasir', '2022-05-14 01:40:24', 'Transaksi detail - menambahkan na faktur : 202205140000251, Kode menu: FHCR02, Jumlah item: 4 dan harga jual: 25000'),
(1818, '202205140000252', 'Kasir', '2022-05-14 01:42:15', 'Transaksi detail - menambahkan na faktur : 202205140000252, Kode menu: DHCR05, Jumlah item: 5 dan harga jual: 30000'),
(1819, '202205140000253', 'Kasir', '2022-05-14 01:42:57', 'Transaksi detail - menambahkan na faktur : 202205140000253, Kode menu: DHCR02, Jumlah item: 3 dan harga jual: 25000'),
(1820, '202205140000254', 'Kasir', '2022-05-14 01:43:26', 'Transaksi detail - menambahkan na faktur : 202205140000254, Kode menu: DHCR07, Jumlah item: 1 dan harga jual: 25000'),
(1821, '202205140000254', 'Kasir', '2022-05-14 01:43:39', 'Transaksi detail - menambahkan na faktur : 202205140000254, Kode menu: DHCR05, Jumlah item: 2 dan harga jual: 30000'),
(1822, '202205140000255', 'Kasir', '2022-05-14 01:44:37', 'Transaksi detail - menambahkan na faktur : 202205140000255, Kode menu: DHCR03, Jumlah item: 1 dan harga jual: 36000'),
(1823, '202205140000255', 'Kasir', '2022-05-14 01:45:14', 'Transaksi detail - menambahkan na faktur : 202205140000255, Kode menu: PHCR04, Jumlah item: 2 dan harga jual: 24000'),
(1824, '202205140000256', 'Kasir', '2022-05-14 01:47:27', 'Transaksi detail - menambahkan na faktur : 202205140000256, Kode menu: FHCR03, Jumlah item: 3 dan harga jual: 24000'),
(1825, '202205140000257', 'Kasir', '2022-05-14 02:12:49', 'Transaksi detail - menambahkan na faktur : 202205140000257, Kode menu: DHCR03, Jumlah item: 2 dan harga jual: 36000'),
(1826, '202205140000257', 'Kasir', '2022-05-14 02:12:59', 'Transaksi detail - menambahkan na faktur : 202205140000257, Kode menu: PHCR02, Jumlah item: 4 dan harga jual: 204000'),
(1827, '202205140000258', 'Kasir', '2022-05-14 02:13:49', 'Transaksi detail - menambahkan na faktur : 202205140000258, Kode menu: FHCR03, Jumlah item: 2 dan harga jual: 24000'),
(1828, '202205140000259', 'Kasir', '2022-05-14 02:14:25', 'Transaksi detail - menambahkan na faktur : 202205140000259, Kode menu: FHCR01, Jumlah item: 3 dan harga jual: 12000'),
(1829, '202205140000259', 'Kasir', '2022-05-14 02:14:36', 'Transaksi detail - menambahkan na faktur : 202205140000259, Kode menu: DHCR03, Jumlah item: 3 dan harga jual: 36000'),
(1830, '202205140000260', 'Kasir', '2022-05-14 02:15:20', 'Transaksi detail - menambahkan na faktur : 202205140000260, Kode menu: PHCR04, Jumlah item: 4 dan harga jual: 24000'),
(1831, '202205140000261', 'Kasir', '2022-05-14 02:15:43', 'Transaksi detail - menambahkan na faktur : 202205140000261, Kode menu: FHCR04, Jumlah item: 5 dan harga jual: 50000'),
(1832, '202205140000261', 'Kasir', '2022-05-14 02:15:55', 'Transaksi detail - menambahkan na faktur : 202205140000261, Kode menu: FHCR05, Jumlah item: 1 dan harga jual: 50000'),
(1833, '202205140000261', 'Kasir', '2022-05-14 02:16:03', 'Transaksi detail - menambahkan na faktur : 202205140000261, Kode menu: DHCR05, Jumlah item: 3 dan harga jual: 30000'),
(1834, '202205140000262', 'Kasir', '2022-05-14 02:16:29', 'Transaksi detail - menambahkan na faktur : 202205140000262, Kode menu: DHCR05, Jumlah item: 1 dan harga jual: 30000'),
(1835, '202205140000262', 'Kasir', '2022-05-14 02:16:38', 'Transaksi detail - menambahkan na faktur : 202205140000262, Kode menu: DHCR01, Jumlah item: 1 dan harga jual: 25000'),
(1836, '202205140000263', 'Kasir', '2022-05-14 02:17:03', 'Transaksi detail - menambahkan na faktur : 202205140000263, Kode menu: FHCR03, Jumlah item: 2 dan harga jual: 24000'),
(1837, '202205140000263', 'Kasir', '2022-05-14 02:17:22', 'Transaksi detail - menambahkan na faktur : 202205140000263, Kode menu: FHCR02, Jumlah item: 1 dan harga jual: 25000'),
(1838, '202205140000264', 'Kasir', '2022-05-14 02:17:40', 'Transaksi detail - menambahkan na faktur : 202205140000264, Kode menu: PHCR04, Jumlah item: 3 dan harga jual: 24000'),
(1839, '202205140000264', 'Kasir', '2022-05-14 02:17:52', 'Transaksi detail - menambahkan na faktur : 202205140000264, Kode menu: PHCR03, Jumlah item: 1 dan harga jual: 120000'),
(1840, '202205140000265', 'Kasir', '2022-05-14 02:18:22', 'Transaksi detail - menambahkan na faktur : 202205140000265, Kode menu: PHCR01, Jumlah item: 1 dan harga jual: 200000'),
(1841, '202205140000266', 'Kasir', '2022-05-14 02:18:44', 'Transaksi detail - menambahkan na faktur : 202205140000266, Kode menu: DHCR02, Jumlah item: 2 dan harga jual: 25000'),
(1842, '202205140000267', 'Kasir', '2022-05-14 02:19:34', 'Transaksi detail - menambahkan na faktur : 202205140000267, Kode menu: PHCR05, Jumlah item: 2 dan harga jual: 1000000'),
(1843, '202205140000268', 'Kasir', '2022-05-14 02:20:00', 'Transaksi detail - menambahkan na faktur : 202205140000268, Kode menu: DHCR07, Jumlah item: 1 dan harga jual: 25000'),
(1844, '202205140000269', 'Kasir', '2022-05-14 02:20:22', 'Transaksi detail - menambahkan na faktur : 202205140000269, Kode menu: PHCR04, Jumlah item: 1 dan harga jual: 24000'),
(1845, '202205140000269', 'Kasir', '2022-05-14 02:20:32', 'Transaksi detail - menambahkan na faktur : 202205140000269, Kode menu: DHCR04, Jumlah item: 1 dan harga jual: 24000'),
(1846, '202205140000270', 'Kasir', '2022-05-14 02:21:00', 'Transaksi detail - menambahkan na faktur : 202205140000270, Kode menu: FHCR03, Jumlah item: 3 dan harga jual: 24000'),
(1847, '202205140000271', 'Kasir', '2022-05-14 02:21:24', 'Transaksi detail - menambahkan na faktur : 202205140000271, Kode menu: FHCR04, Jumlah item: 2 dan harga jual: 50000'),
(1848, '202205140000271', 'Kasir', '2022-05-14 02:21:32', 'Transaksi detail - menambahkan na faktur : 202205140000271, Kode menu: DHCR07, Jumlah item: 4 dan harga jual: 25000'),
(1849, '202205140000272', 'Kasir', '2022-05-14 02:21:56', 'Transaksi detail - menambahkan na faktur : 202205140000272, Kode menu: PHCR03, Jumlah item: 2 dan harga jual: 120000'),
(1850, '202205140000273', 'Kasir', '2022-05-14 02:22:34', 'Transaksi detail - menambahkan na faktur : 202205140000273, Kode menu: FHCR03, Jumlah item: 7 dan harga jual: 24000'),
(1851, '202205140000274', 'Kasir', '2022-05-14 02:23:22', 'Transaksi detail - menambahkan na faktur : 202205140000274, Kode menu: DHCR01, Jumlah item: 1 dan harga jual: 25000'),
(1852, '202205140000274', 'Kasir', '2022-05-14 02:23:31', 'Transaksi detail - menambahkan na faktur : 202205140000274, Kode menu: FHCR02, Jumlah item: 1 dan harga jual: 25000'),
(1853, '202205140000275', 'Kasir', '2022-05-14 02:23:59', 'Transaksi detail - menambahkan na faktur : 202205140000275, Kode menu: PHCR04, Jumlah item: 3 dan harga jual: 24000'),
(1854, '202205140000275', 'Kasir', '2022-05-14 02:24:11', 'Transaksi detail - menambahkan na faktur : 202205140000275, Kode menu: DHCR07, Jumlah item: 5 dan harga jual: 25000'),
(1855, '202205140000276', 'Kasir', '2022-05-14 02:24:38', 'Transaksi detail - menambahkan na faktur : 202205140000276, Kode menu: PHCR03, Jumlah item: 1 dan harga jual: 120000'),
(1856, '202205140000277', 'Kasir', '2022-05-14 02:25:18', 'Transaksi detail - menambahkan na faktur : 202205140000277, Kode menu: FHCR05, Jumlah item: 1 dan harga jual: 50000'),
(1857, '202205140000278', 'Kasir', '2022-05-14 02:25:54', 'Transaksi detail - menambahkan na faktur : 202205140000278, Kode menu: DHCR06, Jumlah item: 3 dan harga jual: 36000'),
(1858, '202205140000278', 'Kasir', '2022-05-14 02:26:18', 'Transaksi detail - menambahkan na faktur : 202205140000278, Kode menu: PHCR02, Jumlah item: 2 dan harga jual: 204000'),
(1859, '202205140000279', 'Kasir', '2022-05-14 02:26:51', 'Transaksi detail - menambahkan na faktur : 202205140000279, Kode menu: DHCR04, Jumlah item: 1 dan harga jual: 24000'),
(1860, '202205140000280', 'Kasir', '2022-05-14 02:27:19', 'Transaksi detail - menambahkan na faktur : 202205140000280, Kode menu: DHCR01, Jumlah item: 1 dan harga jual: 25000'),
(1861, '202205140000281', 'Kasir', '2022-05-14 02:28:51', 'Transaksi detail - menambahkan na faktur : 202205140000281, Kode menu: PHCR05, Jumlah item: 2 dan harga jual: 1000000'),
(1862, '202205140000282', 'Kasir', '2022-05-14 02:29:52', 'Transaksi detail - menambahkan na faktur : 202205140000282, Kode menu: DHCR06, Jumlah item: 4 dan harga jual: 36000'),
(1863, '202205140000283', 'Kasir', '2022-05-14 02:30:33', 'Transaksi detail - menambahkan na faktur : 202205140000283, Kode menu: DHCR05, Jumlah item: 3 dan harga jual: 30000'),
(1864, '202205140000284', 'Kasir', '2022-05-14 02:31:29', 'Transaksi detail - menambahkan na faktur : 202205140000284, Kode menu: PHCR04, Jumlah item: 5 dan harga jual: 24000'),
(1865, '202205140000285', 'Kasir', '2022-05-14 02:32:27', 'Transaksi detail - menambahkan na faktur : 202205140000285, Kode menu: DHCR02, Jumlah item: 2 dan harga jual: 25000'),
(1866, '202205140000286', 'Kasir', '2022-05-14 02:33:32', 'Transaksi detail - menambahkan na faktur : 202205140000286, Kode menu: PHCR05, Jumlah item: 1 dan harga jual: 1000000'),
(1867, '202205140000287', 'Kasir', '2022-05-14 02:33:59', 'Transaksi detail - menambahkan na faktur : 202205140000287, Kode menu: DHCR02, Jumlah item: 1 dan harga jual: 25000'),
(1868, '202205140000288', 'Kasir', '2022-05-14 02:34:28', 'Transaksi detail - menambahkan na faktur : 202205140000288, Kode menu: FHCR04, Jumlah item: 1 dan harga jual: 50000'),
(1869, '202205140000289', 'Kasir', '2022-05-14 02:35:04', 'Transaksi detail - menambahkan na faktur : 202205140000289, Kode menu: DHCR05, Jumlah item: 2 dan harga jual: 30000'),
(1870, '202205140000290', 'Kasir', '2022-05-14 02:35:44', 'Transaksi detail - menambahkan na faktur : 202205140000290, Kode menu: PHCR04, Jumlah item: 1 dan harga jual: 24000'),
(1871, '202205140000291', 'Kasir', '2022-05-14 02:36:17', 'Transaksi detail - menambahkan na faktur : 202205140000291, Kode menu: FHCR01, Jumlah item: 1 dan harga jual: 12000'),
(1872, '202205140000292', 'Kasir', '2022-05-14 02:37:04', 'Transaksi detail - menambahkan na faktur : 202205140000292, Kode menu: PHCR02, Jumlah item: 2 dan harga jual: 204000'),
(1873, '202205140000293', 'Kasir', '2022-05-14 02:37:33', 'Transaksi detail - menambahkan na faktur : 202205140000293, Kode menu: FHCR04, Jumlah item: 2 dan harga jual: 50000'),
(1874, '202205140000294', 'Kasir', '2022-05-14 02:38:07', 'Transaksi detail - menambahkan na faktur : 202205140000294, Kode menu: FHCR01, Jumlah item: 3 dan harga jual: 12000'),
(1875, '202205140000295', 'Kasir', '2022-05-14 02:38:35', 'Transaksi detail - menambahkan na faktur : 202205140000295, Kode menu: PHCR03, Jumlah item: 1 dan harga jual: 120000'),
(1876, '202205140000296', 'Kasir', '2022-05-14 02:38:54', 'Transaksi detail - menambahkan na faktur : 202205140000296, Kode menu: FHCR01, Jumlah item: 1 dan harga jual: 12000'),
(1877, '202205140000297', 'Kasir', '2022-05-14 02:39:16', 'Transaksi detail - menambahkan na faktur : 202205140000297, Kode menu: FHCR03, Jumlah item: 3 dan harga jual: 24000'),
(1878, '202205140000298', 'Kasir', '2022-05-14 02:39:39', 'Transaksi detail - menambahkan na faktur : 202205140000298, Kode menu: DHCR02, Jumlah item: 1 dan harga jual: 25000'),
(1879, '202205140000299', 'Kasir', '2022-05-14 02:40:03', 'Transaksi detail - menambahkan na faktur : 202205140000299, Kode menu: DHCR06, Jumlah item: 2 dan harga jual: 36000'),
(1880, '202205140000300', 'Kasir', '2022-05-14 02:40:21', 'Transaksi detail - menambahkan na faktur : 202205140000300, Kode menu: FHCR04, Jumlah item: 1 dan harga jual: 50000'),
(1881, '202205140000301', 'Kasir', '2022-05-14 02:40:36', 'Transaksi detail - menambahkan na faktur : 202205140000301, Kode menu: PHCR01, Jumlah item: 1 dan harga jual: 200000'),
(1882, '202205140000301', 'Kasir', '2022-05-14 02:40:45', 'Transaksi detail - menambahkan na faktur : 202205140000301, Kode menu: FHCR05, Jumlah item: 1 dan harga jual: 50000'),
(1883, '202205140000302', 'Kasir', '2022-05-14 02:41:18', 'Transaksi detail - menambahkan na faktur : 202205140000302, Kode menu: PHCR03, Jumlah item: 2 dan harga jual: 120000'),
(1884, '202205140000303', 'Kasir', '2022-05-14 02:41:41', 'Transaksi detail - menambahkan na faktur : 202205140000303, Kode menu: PHCR04, Jumlah item: 1 dan harga jual: 24000'),
(1885, '202205140000304', 'Kasir', '2022-05-14 02:42:00', 'Transaksi detail - menambahkan na faktur : 202205140000304, Kode menu: FHCR01, Jumlah item: 3 dan harga jual: 12000'),
(1886, '202205140000305', 'Kasir', '2022-05-14 02:42:13', 'Transaksi detail - menambahkan na faktur : 202205140000305, Kode menu: DHCR02, Jumlah item: 2 dan harga jual: 25000'),
(1887, '202205140000305', 'Kasir', '2022-05-14 02:42:19', 'Transaksi detail- menghapus no faktur : 202205140000305'),
(1888, '202205140000305', 'Kasir', '2022-05-14 02:42:52', 'Transaksi detail - menambahkan na faktur : 202205140000305, Kode menu: PHCR04, Jumlah item: 1 dan harga jual: 24000'),
(1889, '202205140000307', 'Kasir', '2022-05-14 02:43:12', 'Transaksi detail - menambahkan na faktur : 202205140000307, Kode menu: DHCR03, Jumlah item: 3 dan harga jual: 36000'),
(1890, '202205140000308', 'Kasir', '2022-05-14 02:43:35', 'Transaksi detail - menambahkan na faktur : 202205140000308, Kode menu: PHCR03, Jumlah item: 1 dan harga jual: 120000'),
(1891, '202205140000309', 'Kasir', '2022-05-14 02:43:59', 'Transaksi detail - menambahkan na faktur : 202205140000309, Kode menu: FHCR01, Jumlah item: 4 dan harga jual: 12000'),
(1892, '202205140000310', 'Kasir', '2022-05-14 02:44:23', 'Transaksi detail - menambahkan na faktur : 202205140000310, Kode menu: PHCR01, Jumlah item: 1 dan harga jual: 200000'),
(1893, '202205140000311', 'Kasir', '2022-05-14 02:45:30', 'Transaksi detail - menambahkan na faktur : 202205140000311, Kode menu: FHCR03, Jumlah item: 7 dan harga jual: 24000'),
(1894, '202205140000312', 'Kasir', '2022-05-14 02:46:43', 'Transaksi detail - menambahkan na faktur : 202205140000312, Kode menu: DHCR07, Jumlah item: 2 dan harga jual: 25000'),
(1895, '202205140000312', 'Kasir', '2022-05-14 02:46:51', 'Transaksi detail - menambahkan na faktur : 202205140000312, Kode menu: FHCR04, Jumlah item: 1 dan harga jual: 50000'),
(1896, '202205140000313', 'Kasir', '2022-05-14 02:48:15', 'Transaksi detail - menambahkan na faktur : 202205140000313, Kode menu: PHCR03, Jumlah item: 5 dan harga jual: 120000'),
(1897, '202205140000314', 'Kasir', '2022-05-14 02:48:38', 'Transaksi detail - menambahkan na faktur : 202205140000314, Kode menu: DHCR03, Jumlah item: 3 dan harga jual: 36000'),
(1898, '202205140000315', 'Kasir', '2022-05-14 05:11:12', 'Transaksi detail - menambahkan na faktur : 202205140000315, Kode menu: DHCR07, Jumlah item: 1 dan harga jual: 25000'),
(1899, '202205140000315', 'Kasir', '2022-05-14 05:11:21', 'Transaksi detail - menambahkan na faktur : 202205140000315, Kode menu: FHCR03, Jumlah item: 1 dan harga jual: 24000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_jual`
--

CREATE TABLE `tbl_master_jual` (
  `id_master_jual` int(11) NOT NULL,
  `nofak_jual` varchar(30) NOT NULL,
  `tgl_jual` date DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `no_meja` char(20) DEFAULT NULL,
  `total_bayar` int(11) NOT NULL,
  `pengguna_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_master_jual`
--

INSERT INTO `tbl_master_jual` (`id_master_jual`, `nofak_jual`, `tgl_jual`, `total_harga`, `no_meja`, `total_bayar`, `pengguna_id`) VALUES
(229, '202205120000001', '2022-05-12', 37500, '12', 0, 49),
(230, '202205120000229', '2022-05-12', 90000, '07', 0, 49),
(231, '202205120000230', '2022-05-12', 48000, '08', 0, 49),
(232, '202205120000231', '2022-05-12', 7000, '05', 0, 49),
(233, '202205120000232', '2022-05-12', 27000, '02', 0, 49),
(234, '202205120000233', '2022-05-12', 204000, '05', 0, 49),
(235, '202205120000234', '2022-05-12', 29000, '01', 50000, 49),
(236, '202205130000235', '2022-05-13', 17000, '10', 20000, 49),
(237, '202205130000236', '2022-05-13', 51000, '07', 60000, 49),
(238, '202205130000237', '2022-05-13', 1025000, '08', 1030000, 48),
(239, '202205130000238', '2022-05-13', 36000, '02', 0, 48),
(240, '202205130000239', '2022-05-13', 50000, '12', 0, 48),
(241, '202205130000240', '2022-05-13', 110000, '12', 120000, 48),
(242, '202205140000241', '2022-05-14', 25000, '8', 0, 48),
(243, '202205140000242', '2022-05-14', 50000, '03', 0, 48),
(244, '202205140000243', '2022-05-14', 150000, '01', 0, 48),
(245, '202205140000244', '2022-05-14', 25000, '22', 0, 48),
(246, '202205140000245', '2022-05-14', 408000, '30', 500000, 48),
(247, '202205140000246', '2022-05-14', 661000, '49', 700000, 48),
(248, '202205140000247', '2022-05-14', 75000, '5', 0, 48),
(249, '202205140000248', '2022-05-14', 96000, '32', 0, 48),
(250, '202205140000249', '2022-05-14', 200000, '26', 0, 48),
(251, '202205140000250', '2022-05-14', 5000000, '39', 0, 48),
(252, '202205140000251', '2022-05-14', 100000, '48', 0, 48),
(253, '202205140000252', '2022-05-14', 150000, '42', 0, 48),
(254, '202205140000253', '2022-05-14', 75000, '39', 0, 48),
(255, '202205140000254', '2022-05-14', 85000, '07', 0, 48),
(256, '202205140000255', '2022-05-14', 84000, '06', 90000, 48),
(257, '202205140000256', '2022-05-14', 72000, '47', 0, 48),
(258, '202205140000257', '2022-05-14', 888000, '02', 0, 48),
(259, '202205140000258', '2022-05-14', 48000, '06', 50000, 48),
(260, '202205140000259', '2022-05-14', 144000, '24', 0, 48),
(261, '202205140000260', '2022-05-14', 96000, '05', 0, 48),
(262, '202205140000261', '2022-05-14', 390000, '12', 0, 48),
(263, '202205140000262', '2022-05-14', 55000, '13', 0, 48),
(264, '202205140000263', '2022-05-14', 73000, '25', 0, 48),
(265, '202205140000264', '2022-05-14', 192000, '39', 0, 48),
(266, '202205140000265', '2022-05-14', 200000, '48', 0, 48),
(267, '202205140000266', '2022-05-14', 50000, '44', 0, 48),
(268, '202205140000267', '2022-05-14', 2000000, '36', 0, 48),
(269, '202205140000268', '2022-05-14', 25000, '09', 0, 48),
(270, '202205140000269', '2022-05-14', 48000, '01', 0, 48),
(271, '202205140000270', '2022-05-14', 72000, '55', 0, 48),
(272, '202205140000271', '2022-05-14', 200000, '43', 0, 48),
(273, '202205140000272', '2022-05-14', 240000, '06', 0, 48),
(274, '202205140000273', '2022-05-14', 168000, '66', 0, 48),
(275, '202205140000274', '2022-05-14', 50000, '58', 0, 48),
(276, '202205140000275', '2022-05-14', 197000, '40', 0, 48),
(277, '202205140000276', '2022-05-14', 120000, '56', 150000, 48),
(278, '202205140000277', '2022-05-14', 50000, '51', 0, 48),
(279, '202205140000278', '2022-05-14', 516000, '47', 0, 48),
(280, '202205140000279', '2022-05-14', 24000, '70', 0, 48),
(281, '202205140000280', '2022-05-14', 25000, '40', 0, 48),
(282, '202205140000281', '2022-05-14', 2000000, '65', 0, 48),
(283, '202205140000282', '2022-05-14', 144000, '11', 0, 48),
(284, '202205140000283', '2022-05-14', 90000, '10', 0, 48),
(285, '202205140000284', '2022-05-14', 120000, '15', 0, 48),
(286, '202205140000285', '2022-05-14', 50000, '13', 0, 48),
(287, '202205140000286', '2022-05-14', 1000000, '56', 0, 48),
(288, '202205140000287', '2022-05-14', 25000, '07', 0, 48),
(289, '202205140000288', '2022-05-14', 50000, '03', 0, 48),
(290, '202205140000289', '2022-05-14', 60000, '23', 0, 48),
(291, '202205140000290', '2022-05-14', 24000, '09', 0, 48),
(292, '202205140000291', '2022-05-14', 12000, '04', 0, 48),
(293, '202205140000292', '2022-05-14', 408000, '48', 0, 48),
(294, '202205140000293', '2022-05-14', 100000, '18', 0, 48),
(295, '202205140000294', '2022-05-14', 36000, '14', 0, 48),
(296, '202205140000295', '2022-05-14', 120000, '16', 0, 48),
(297, '202205140000296', '2022-05-14', 12000, '04', 0, 48),
(298, '202205140000297', '2022-05-14', 72000, '57', 0, 48),
(299, '202205140000298', '2022-05-14', 25000, '63', 0, 48),
(300, '202205140000299', '2022-05-14', 72000, '05', 0, 48),
(301, '202205140000300', '2022-05-14', 50000, '49', 0, 48),
(302, '202205140000301', '2022-05-14', 250000, '05', 0, 48),
(303, '202205140000302', '2022-05-14', 240000, '33', 0, 48),
(304, '202205140000303', '2022-05-14', 24000, '07', 0, 48),
(305, '202205140000304', '2022-05-14', 36000, '11', 0, 48),
(307, '202205140000305', '2022-05-14', 24000, '19', 0, 48),
(308, '202205140000307', '2022-05-14', 108000, '17', 0, 48),
(309, '202205140000308', '2022-05-14', 120000, '04', 0, 48),
(310, '202205140000309', '2022-05-14', 48000, '28', 0, 48),
(311, '202205140000310', '2022-05-14', 200000, '29', 0, 48),
(312, '202205140000311', '2022-05-14', 168000, '44', 0, 48),
(313, '202205140000312', '2022-05-14', 100000, '47', 0, 48),
(314, '202205140000313', '2022-05-14', 600000, '08', 0, 48),
(315, '202205140000314', '2022-05-14', 108000, '68', 0, 48),
(316, '202205140000315', '2022-05-14', 49000, '12', 50000, 48);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `kode_menu` varchar(12) NOT NULL,
  `id_jenis` int(11) DEFAULT NULL,
  `nama_menu` varchar(150) DEFAULT NULL,
  `satuan` varchar(30) DEFAULT NULL,
  `hrg_jual` double DEFAULT NULL,
  `deskripsi` varchar(200) DEFAULT NULL,
  `pengguna_id` int(11) DEFAULT NULL,
  `photo_makanan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`kode_menu`, `id_jenis`, `nama_menu`, `satuan`, `hrg_jual`, `deskripsi`, `pengguna_id`, `photo_makanan`) VALUES
('DHCR01', 7837, 'Juice Jeruk Nipis', 'pcs', 25000, '', 39, '818e41706570cb295f09f2cbc1e41ac1.jpg'),
('DHCR02', 7837, 'Jus Terong Belanda', 'pcs', 25000, '', 39, '2a7eec6aed19b67f0b8af58a3a5f2ef9.jpg'),
('DHCR03', 7837, 'Island Coffee', 'pcs', 36000, '', 39, '69cbc776b7ad880b321923dff6dfdd7c.png'),
('DHCR04', 7837, 'Coffee Sepi', 'pcs', 24000, 'Ubah Hari mu Jadi Penuh Cinta!!!!', 39, 'a8fe2ec427ab9321e9b6899ca1ecc811.jpg'),
('DHCR05', 7837, 'Blue Ice', 'pcs', 30000, '', 39, 'a5c39ae0efad8c88be31cdd5b9a967c3.jpg'),
('DHCR06', 7837, 'Dalgona Cofee', 'pcs', 36000, '', 39, 'f3c176cdd56b8b42b0ddb8b9bd2c8f31.jpg'),
('DHCR07', 7837, 'Americano Coffee', 'paket', 25000, '', 39, 'c0a5a4accb6dd9b14ce260be3992abe9.jpg'),
('FHCR01', 7836, 'Kentang Goreng', 'pcs', 12000, '', 39, '363a4cfb476dbbe7a4e1c3d684847aae.jpg'),
('FHCR02', 7836, 'Ayam Goreng', 'pcs', 25000, '', 39, '8369894010e08087b91fecfadf3683c1.jpg'),
('FHCR03', 7836, 'Kebab Gelap', 'pcs', 24000, '', 39, 'eeffb09f3a7662d9896f126eaa648cee.jpg'),
('FHCR04', 7836, 'Pizza', 'pcs', 50000, '', 39, 'f22ef32e6a8159e3405e10b5ad4d4ba7.jpg'),
('FHCR05', 7836, 'Rendang', 'pcs', 50000, '', 39, 'e254697afeacde98d873bf1f6bb6147a.jpg'),
('PHCR01', 7839, 'Paket HCR 1', 'paket', 200000, '', 39, 'a4fdf16d35f7ade9d409d9a40780241b.jpg'),
('PHCR02', 7879, 'Burger, Nasi, Ayam,Telur,Minum', 'paket', 204000, 'Paket Keluarga Besar ', 39, 'f53f14785b42cc9f42ecda32b7979828.jpg'),
('PHCR03', 7881, 'Paket Secangkir Berdua', 'paket', 120000, '2 Ayam, 2 Nasi, 1 Blue Ice', 39, 'bf3a866fd4852674f58a7c1e7ee0d44b.jpg'),
('PHCR04', 7838, 'Paket Sarapan', 'paket', 24000, '1 roti, 1HotCofee', 39, 'd90186e57220ea8c21713d603baf6d77.jpg'),
('PHCR05', 7838, 'Paket Makan Malam Romantis', 'paket', 1000000, 'Bonus Paket Suprize Romantis', 39, '7b772fc346445dd050581766dde5cde5.jpg');

--
-- Triggers `tbl_menu`
--
DELIMITER $$
CREATE TRIGGER `tMenuHapus` BEFORE DELETE ON `tbl_menu` FOR EACH ROW INSERT tbl_log(pengguna_id, pengguna_nama, aksi) VALUES (old.pengguna_id, 'Belum Ada Pengguna', CONCAT('Nama Menu - menghapus nama menu : ', old.nama_menu))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tMenuTambah` BEFORE INSERT ON `tbl_menu` FOR EACH ROW INSERT tbl_log(pengguna_id, pengguna_nama, aksi) VALUES (new.pengguna_id, 'Belum Ada Pengguna', CONCAT('Nama Menu - menambahkan nama menu : ', new.nama_menu))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tMenuUbah` BEFORE UPDATE ON `tbl_menu` FOR EACH ROW INSERT tbl_log(pengguna_id, pengguna_nama, aksi) VALUES (old.pengguna_id, 'Belum Ada Pengguna', CONCAT('Nama menu - mengubah nama menu : ', old.nama_menu, ' menjadi : ', new.nama_menu, ', Harga Jual : ', old.hrg_jual, ' menjadi : ',  new.hrg_jual))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `x_tbl_pengguna`
--

CREATE TABLE `x_tbl_pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_nama` varchar(50) DEFAULT NULL,
  `pengguna_username` varchar(30) DEFAULT NULL,
  `pengguna_password` varchar(35) DEFAULT NULL,
  `pengguna_email` varchar(50) DEFAULT NULL,
  `pengguna_nohp` varchar(20) DEFAULT NULL,
  `pengguna_hak_akses` varchar(3) DEFAULT NULL,
  `pengguna_register` timestamp NULL DEFAULT current_timestamp(),
  `pengguna_photo` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `x_tbl_pengguna`
--

INSERT INTO `x_tbl_pengguna` (`pengguna_id`, `pengguna_nama`, `pengguna_username`, `pengguna_password`, `pengguna_email`, `pengguna_nohp`, `pengguna_hak_akses`, `pengguna_register`, `pengguna_photo`) VALUES
(37, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', '087615249845', '1', '2022-02-16 16:11:55', '4cf2e024bb10144c222e0ee888d09eda.jpg'),
(39, 'Manager', 'manager', '1d0258c2440a8d19e716292b231e3190', 'manager@gmail.com', '085231765923', '2', '2022-02-16 16:16:15', 'ba45755fb450b6eeeeea4861f84a308d.jpg'),
(48, 'Kasir', 'kasir', 'c7911af3adbd12a035b289556d96470a', 'kasir@gmail.com', '9832449823641', '3', '2022-02-21 18:05:20', 'eb6e32a967fe9fcaa4b47f93c31eac5d.jpg'),
(49, 'Kasir1', 'kasir1', '29c748d4d8f4bd5cbc0f3f60cb7ed3d0', 'kasir1@gmail.com', '081351427692', '3', '2022-02-21 18:05:57', '8facdfbbd85d0fecb646e3f760426113.jpg'),
(56, 'Kasir2', 'kasir2', '8c86013d8ba23d9b5ade4d6463f81c45', 'kasir2@gmail.com', '086534120982', '3', '2022-05-13 12:10:58', 'c7b5d4e7aa02e05c95b5758e5f19ec4e.jpg'),
(57, 'Manager S', 'managers', '8b0de315a0005347a1b72938c8eab5f8', 'managers@gmail.com', '085231765923', '2', '2022-05-13 12:14:13', 'c1d2923d460034b43c770aae93969e65.jpg');

--
-- Triggers `x_tbl_pengguna`
--
DELIMITER $$
CREATE TRIGGER `tPenggunaHapus` BEFORE DELETE ON `x_tbl_pengguna` FOR EACH ROW INSERT tbl_log(pengguna_id, pengguna_nama, aksi) VALUES (old.pengguna_id, old.pengguna_nama, CONCAT('Pengguna - menghapus nama pengguna : ', old.pengguna_nama))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tPenggunaTambah` AFTER INSERT ON `x_tbl_pengguna` FOR EACH ROW INSERT tbl_log(pengguna_id, pengguna_nama, aksi) VALUES (new.pengguna_id, new.pengguna_nama, CONCAT('Pengguna - menambahkan nama pengguna : ', new.pengguna_username, ', pengguna email : ', new.pengguna_email))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tPenggunaUbah` BEFORE UPDATE ON `x_tbl_pengguna` FOR EACH ROW INSERT tbl_log(pengguna_id, pengguna_nama, aksi) VALUES (old.pengguna_id, old.pengguna_nama, CONCAT('Pengguna - mengubah nama pengguna : ', old.pengguna_nama, ' menjadi : ', new.pengguna_nama, ', mengubah username : ', old.pengguna_username, ' menjadi : ', new.pengguna_username, ', mengubah email : ', old.pengguna_email, ' menjadi : ', new.pengguna_email, ', mengubah no HP : ', old.pengguna_nohp, ' menjadi : ', new.pengguna_nohp, ' dan  mengubah hak akses : ', old.pengguna_hak_akses, ' menjadi : ', new.pengguna_hak_akses))
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_det_jual`
--
ALTER TABLE `tbl_det_jual`
  ADD PRIMARY KEY (`id_det_jual`);

--
-- Indexes for table `tbl_jenis`
--
ALTER TABLE `tbl_jenis`
  ADD PRIMARY KEY (`id_jenis`),
  ADD UNIQUE KEY `jenis_menu` (`jenis_menu`);

--
-- Indexes for table `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`pengunjung_id`);

--
-- Indexes for table `tbl_master_jual`
--
ALTER TABLE `tbl_master_jual`
  ADD PRIMARY KEY (`id_master_jual`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`kode_menu`),
  ADD UNIQUE KEY `nama_menu` (`nama_menu`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `x_tbl_pengguna`
--
ALTER TABLE `x_tbl_pengguna`
  ADD PRIMARY KEY (`pengguna_id`),
  ADD UNIQUE KEY `pengguna_username` (`pengguna_username`,`pengguna_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_det_jual`
--
ALTER TABLE `tbl_det_jual`
  MODIFY `id_det_jual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=361;

--
-- AUTO_INCREMENT for table `tbl_jenis`
--
ALTER TABLE `tbl_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7882;

--
-- AUTO_INCREMENT for table `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `pengunjung_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1900;

--
-- AUTO_INCREMENT for table `tbl_master_jual`
--
ALTER TABLE `tbl_master_jual`
  MODIFY `id_master_jual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=317;

--
-- AUTO_INCREMENT for table `x_tbl_pengguna`
--
ALTER TABLE `x_tbl_pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD CONSTRAINT `tbl_menu_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `tbl_jenis` (`id_jenis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
