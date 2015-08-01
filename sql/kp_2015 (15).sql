-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2015 at 05:20 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kp_2015`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('a2559510d4647a4fa97dce3cb431a6fa', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.134 Safari/537.36', 1438675873, 'a:4:{s:9:"user_data";s:0:"";s:9:"user_name";s:7:"inputor";s:12:"is_logged_in";b:1;s:4:"role";s:7:"inputor";}'),
('dfe2b12ffb1e9a46ed610b5d99d45f4e', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.125 Safari/537.36', 1438399178, 'a:4:{s:9:"user_data";s:0:"";s:9:"user_name";s:16:"networkarchitect";s:12:"is_logged_in";b:1;s:4:"role";s:16:"networkarchitect";}');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(30) NOT NULL,
  `desc` varchar(300) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `desc`) VALUES
(1, 'Pertamina (Persero)', ''),
(2, 'PDSI', ''),
(3, 'PGE', '');

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE IF NOT EXISTS `provider` (
  `provider_id` int(11) NOT NULL AUTO_INCREMENT,
  `provider_name` varchar(30) NOT NULL,
  `desc` varchar(300) NOT NULL,
  PRIMARY KEY (`provider_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`provider_id`, `provider_name`, `desc`) VALUES
(1, 'Telkom', ''),
(2, 'Patrakom', ''),
(3, 'Icon', ''),
(4, 'Indosat', ''),
(5, 'XL', '');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE IF NOT EXISTS `provinsi` (
  `provinsi_id` int(11) NOT NULL AUTO_INCREMENT,
  `provinsi_name` varchar(30) NOT NULL,
  PRIMARY KEY (`provinsi_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`provinsi_id`, `provinsi_name`) VALUES
(4, 'DKI Jakarta'),
(6, 'Jawa Timur'),
(7, 'Nanggroe Aceh Darussalam'),
(8, 'Sumatera Utara'),
(9, 'Sumatera Barat'),
(10, 'Sumatera Selatan'),
(11, 'Riau'),
(12, 'Kep. Riau'),
(13, 'Jambi'),
(14, 'Bengkulu'),
(15, 'Lampung'),
(16, 'Bangka Belitung'),
(17, 'Jawa Barat'),
(18, 'Banten'),
(19, 'Jawa Tengah'),
(20, 'DI Yogyakarta'),
(21, 'Kalimantan Barat'),
(22, 'Kalimantan Timur'),
(23, 'Kalimantan Selatan'),
(24, 'Kalimantan Utara'),
(25, 'Kalimantan Tengah'),
(26, 'Bali'),
(27, 'Nusa Tenggara Timur'),
(28, 'Nusa Tenggara Barat'),
(29, 'Sulawesi Utara'),
(30, 'Sulawesi Tengah'),
(31, 'Sulawesi Tenggara'),
(32, 'Sulawesi Selatan'),
(33, 'Gorontalo'),
(34, 'Maluku'),
(35, 'Maluku Utara'),
(36, 'Papua Barat'),
(37, 'Papua'),
(38, 'Sulawesi Barat'),
(39, 'Timor Leste');

-- --------------------------------------------------------

--
-- Table structure for table `p_doc_type`
--

CREATE TABLE IF NOT EXISTS `p_doc_type` (
  `p_doc_type_id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `desc` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`p_doc_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_doc_type`
--

INSERT INTO `p_doc_type` (`p_doc_type_id`, `name`, `desc`) VALUES
(1, 'Form Permintaan', NULL),
(2, 'Memo', NULL),
(3, 'Nota Pengantar', NULL),
(4, 'BALO', NULL),
(5, 'Form UAT', NULL),
(6, 'Surat Ijin Kerja', NULL),
(7, 'Lain-Lain', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_lastmile`
--

CREATE TABLE IF NOT EXISTS `p_lastmile` (
  `p_lastmile_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `desc` varchar(300) NOT NULL,
  PRIMARY KEY (`p_lastmile_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `p_lastmile`
--

INSERT INTO `p_lastmile` (`p_lastmile_id`, `name`, `desc`) VALUES
(1, 'Fiber Optic', ''),
(2, 'Tembaga', ''),
(3, 'Radio Terestrial', ''),
(4, 'VSAT', '');

-- --------------------------------------------------------

--
-- Table structure for table `p_nw_service`
--

CREATE TABLE IF NOT EXISTS `p_nw_service` (
  `p_nw_service_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_serv_type_id` int(11) NOT NULL,
  `p_service_id` int(11) NOT NULL,
  `desc` varchar(300) DEFAULT NULL,
  `package` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`p_nw_service_id`),
  KEY `p_serv_type_id` (`p_serv_type_id`),
  KEY `p_service_id` (`p_service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `p_nw_service`
--

INSERT INTO `p_nw_service` (`p_nw_service_id`, `p_serv_type_id`, `p_service_id`, `desc`, `package`) VALUES
(1, 1, 1, NULL, 'Paket 1'),
(2, 1, 1, NULL, 'Paket 2'),
(3, 1, 1, NULL, 'Paket 3'),
(4, 1, 1, NULL, 'Paket 4'),
(5, 1, 1, NULL, 'Paket 5'),
(6, 1, 1, NULL, 'Paket 6'),
(7, 1, 1, NULL, 'Vicon'),
(8, 1, 2, NULL, 'PTP'),
(9, 1, 2, NULL, 'PTMP'),
(10, 1, 2, NULL, 'MPTMP'),
(11, 1, 3, NULL, '(default)'),
(12, 1, 4, NULL, '1:2'),
(13, 1, 4, NULL, '1:4'),
(14, 2, 5, NULL, '(default)'),
(15, 2, 6, NULL, '(default)'),
(16, 3, 7, NULL, '(default)'),
(17, 3, 8, NULL, '(default)');

-- --------------------------------------------------------

--
-- Table structure for table `p_order_type`
--

CREATE TABLE IF NOT EXISTS `p_order_type` (
  `p_order_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `desc` varchar(300) DEFAULT NULL,
  `delivery_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`p_order_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `p_order_type`
--

INSERT INTO `p_order_type` (`p_order_type_id`, `name`, `desc`, `delivery_time`) VALUES
(1, 'Pasang Baru', NULL, 3),
(2, 'Upgrade', NULL, 35),
(3, 'Upgrade (Ganti Infrastruktur)', NULL, 3),
(4, 'Upgrade Temprorer', NULL, 3),
(5, 'Downgrade', NULL, 35),
(6, 'Relokasi', NULL, 1),
(7, 'Dismantle', NULL, 56);

-- --------------------------------------------------------

--
-- Table structure for table `p_process`
--

CREATE TABLE IF NOT EXISTS `p_process` (
  `p_process_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `desc` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`p_process_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `p_process`
--

INSERT INTO `p_process` (`p_process_id`, `name`, `desc`) VALUES
(1, 'Form Permintaan', NULL),
(2, 'Verifikasi Permintaan', NULL),
(3, 'Koordinasi Provider', NULL),
(4, 'Survey', NULL),
(5, 'Implementasi', NULL),
(6, 'UAT', NULL),
(7, 'Monitoring', NULL),
(8, 'BALO', NULL),
(9, 'Online Billing', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_region`
--

CREATE TABLE IF NOT EXISTS `p_region` (
  `p_region_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `region_name` varchar(30) NOT NULL,
  `desc` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`p_region_id`),
  KEY `comp_id` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `p_region`
--

INSERT INTO `p_region` (`p_region_id`, `company_id`, `region_name`, `desc`) VALUES
(1, 1, 'Pusat', NULL),
(2, 1, 'MOR I', NULL),
(3, 1, 'MOR II', NULL),
(4, 1, 'MOR III', NULL),
(5, 1, 'MOR IV', NULL),
(6, 1, 'MOR V', NULL),
(7, 1, 'MOR VI', NULL),
(8, 1, 'MOR VII', NULL),
(9, 1, 'MOR VIII', NULL),
(10, 1, 'RU II', NULL),
(11, 1, 'RU III', NULL),
(12, 1, 'RU IV', NULL),
(13, 1, 'RU V', NULL),
(14, 1, 'RU VI', NULL),
(15, 1, 'RU VII', NULL),
(16, 2, 'Pusat', NULL),
(17, 2, 'Area NAD', NULL),
(18, 2, 'Area Sumbagut', NULL),
(19, 2, 'Area Sumbagsel', NULL),
(20, 2, 'Area Sumbagteng', NULL),
(21, 2, 'Jawa', NULL),
(22, 3, 'Pusat', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_role`
--

CREATE TABLE IF NOT EXISTS `p_role` (
  `p_role_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `desc` varchar(300) NOT NULL,
  PRIMARY KEY (`p_role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_role`
--

INSERT INTO `p_role` (`p_role_id`, `name`, `desc`) VALUES
(1, 'inputor', ''),
(2, 'networkarchitect', ''),
(3, 'wananalyst', ''),
(4, 'wanengineer', ''),
(5, 'wanperformance', '');

-- --------------------------------------------------------

--
-- Table structure for table `p_service`
--

CREATE TABLE IF NOT EXISTS `p_service` (
  `p_service_id` int(11) NOT NULL,
  `service_name` varchar(30) NOT NULL,
  `desc` varchar(300) NOT NULL,
  PRIMARY KEY (`p_service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_service`
--

INSERT INTO `p_service` (`p_service_id`, `service_name`, `desc`) VALUES
(1, 'MPLS', ''),
(2, 'Metro-E', ''),
(3, 'VSAT SCPC', ''),
(4, 'VSAT IP', ''),
(5, 'Cisco 2801-V/K9', ''),
(6, 'Cisco 2901-V/K9', ''),
(7, 'HWIC-2T', ''),
(8, 'HWIC-2FE', '');

-- --------------------------------------------------------

--
-- Table structure for table `p_service_type`
--

CREATE TABLE IF NOT EXISTS `p_service_type` (
  `p_serv_type_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `desc` varchar(300) NOT NULL,
  PRIMARY KEY (`p_serv_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_service_type`
--

INSERT INTO `p_service_type` (`p_serv_type_id`, `name`, `desc`) VALUES
(1, 'Link', ''),
(2, 'Router', ''),
(3, 'Module', '');

-- --------------------------------------------------------

--
-- Table structure for table `p_site_type`
--

CREATE TABLE IF NOT EXISTS `p_site_type` (
  `p_site_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(15) NOT NULL,
  `desc` varchar(300) NOT NULL,
  PRIMARY KEY (`p_site_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `p_site_type`
--

INSERT INTO `p_site_type` (`p_site_type_id`, `type_name`, `desc`) VALUES
(1, 'Kantor Pusat', ''),
(2, 'Kantor Region', ''),
(3, 'Kantor Cabang', ''),
(4, 'TBBM', 'Terminal Bahan Bakar Minyak'),
(5, 'TT', 'Terminal Transit'),
(6, 'Instalasi', ''),
(7, 'TLPG', 'Terminal LPG'),
(8, 'DPPU', 'Depot Pengisian Pesawat Udara'),
(9, 'LOBP', 'Lubricant Oil Blending Plant'),
(10, 'Kantor SAM', 'Kantor Sales Area Manager');

-- --------------------------------------------------------

--
-- Table structure for table `t_detail_network_order`
--

CREATE TABLE IF NOT EXISTS `t_detail_network_order` (
  `t_detail_network_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_order_type_id` int(11) NOT NULL,
  `no_form_permintaan` varchar(50) DEFAULT NULL,
  `tgl_permintaan` date DEFAULT NULL,
  `tiket_order_provider` varchar(20) DEFAULT NULL,
  `no_balo_provider` varchar(50) DEFAULT NULL,
  `no_balo_pertamina` varchar(50) DEFAULT NULL,
  `tgl_tagih` date DEFAULT NULL,
  `pic_provider` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`t_detail_network_order_id`),
  KEY `t_network_order_id` (`p_order_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=104 ;

--
-- Dumping data for table `t_detail_network_order`
--

INSERT INTO `t_detail_network_order` (`t_detail_network_order_id`, `p_order_type_id`, `no_form_permintaan`, `tgl_permintaan`, `tiket_order_provider`, `no_balo_provider`, `no_balo_pertamina`, `tgl_tagih`, `pic_provider`) VALUES
(93, 1, '1', '2015-07-29', '10-52315', '20', '1-07292015-032', '2015-07-29', 'Pak Husen'),
(94, 2, '21-06212015-012', '2015-07-30', '14', '21', '15-001512-003', '2015-09-02', 'Pak Ryan'),
(95, 1, '12-0911215-002', '2017-05-25', '15', '22', '4120', '2018-08-31', 'Pak Andi'),
(96, 4, '012-10-505', '2019-09-09', '21-109', '15', '09-2015-01', '2020-10-06', 'Pak Anton'),
(97, 5, '51', '2021-06-01', '15', '52', '20-1014-012', '2021-10-10', 'Pak Budi'),
(98, 1, '13', '2015-06-21', '12', '12', '15', '2015-07-24', 'Hari'),
(99, 1, '', '0000-00-00', '', '', '', '0000-00-00', ''),
(100, 1, '15', '2015-08-14', NULL, NULL, NULL, NULL, NULL),
(101, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_document`
--

CREATE TABLE IF NOT EXISTS `t_document` (
  `t_document_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_work_id` int(11) NOT NULL,
  `p_doc_type_id` int(11) NOT NULL,
  `path` varchar(64) DEFAULT NULL,
  `caption` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`t_document_id`),
  KEY `t_work_id` (`t_work_id`),
  KEY `p_doc_type_id` (`p_doc_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=122 ;

--
-- Dumping data for table `t_document`
--

INSERT INTO `t_document` (`t_document_id`, `t_work_id`, `p_doc_type_id`, `path`, `caption`) VALUES
(88, 344, 1, 'uploads/Guillendesign-Variations-3-Steam1.ico', 'Dokumen Verifikasi'),
(89, 345, 6, 'uploads/itunes10_white.ico', 'Dokumen Koordinasi Provider'),
(90, 348, 5, 'uploads/Ashari_5112100133.doc', 'Dokumen UAT'),
(91, 350, 4, 'uploads/Book1.xlsx', 'Dokumen BALO'),
(92, 354, 1, 'uploads/ASD_B_T1_5112100133_Muhammad_Ashari_Adhitama.pptx', 'Dokumen Verifikasi Upgrade'),
(93, 355, 6, 'uploads/Apakah_Algoritma_Sorting_itu.docx', 'Dokumen Koordinasi Upgrade'),
(94, 357, 5, 'uploads/DPPL_KP_5112100133.docx', 'Dokumen UAT Upgrade'),
(95, 359, 4, 'uploads/DIAGRAM_AKTIVITAS_T4.doc', 'Dokumen BALO Upgrade'),
(96, 363, 1, 'uploads/PPL_UTS_5112100133.docx', 'Caption Verifikasi 2'),
(97, 364, 6, 'uploads/DIAGRAM_AKTIVITAS_T41.doc', 'Caption Koordinasi 2'),
(98, 367, 5, 'uploads/MPPL_D_Muhammad-Ashari-Adhitama_5112100133.docx', 'Caption UAT 2'),
(99, 369, 4, 'uploads/Apakah_Algoritma_Sorting_itu1.docx', 'Caption BALO 2'),
(100, 373, 1, 'uploads/ARSITEKTUR_DAN_RANCANGAN_RINCI_KALKULATOR.docx', 'Caption Verifikasi Up 2'),
(101, 374, 6, 'uploads/ASD_B_T1_5112100133_Muhammad_Ashari_Adhitama1.pptx', 'Caption Koordinasi Up 2'),
(102, 376, 5, 'uploads/covefr.docx', 'Caption UAT Up 2'),
(103, 378, 4, 'uploads/DPPL_KP_51121001331.docx', 'Caption BALO Up 2'),
(104, 382, 1, 'uploads/MPPL_D_Muhammad-Ashari-Adhitama_51121001331.docx', 'Caption Verifikasi Down 2'),
(105, 383, 6, 'uploads/ARSITEKTUR_DAN_RANCANGAN_RINCI_KALKULATOR1.docx', 'Caption Koordinasi Down 2'),
(106, 385, 5, 'uploads/Muhammad_Ashari_Adhitama_5112100133_ASD_B_Tugas_3.pdf', 'Caption UAT Down 2'),
(107, 387, 4, 'uploads/covefr1.docx', 'Caption BALO Down 2'),
(108, 391, 1, 'uploads/Apakah_Algoritma_Sorting_itu2.docx', 'Caption Verifikasi 3'),
(109, 392, 6, 'uploads/ASD_B_T1_5112100133_Muhammad_Ashari_Adhitama2.pptx', 'Caption KP'),
(110, 395, 5, 'uploads/Apakah_Algoritma_Sorting_itu3.docx', 'Caption UAT'),
(111, 397, 4, 'uploads/DPPL_KP_5112100133_5112100144.docx', 'BALO'),
(112, 400, 1, 'uploads/index.php', 'caption verifikasi'),
(115, 400, 1, 'uploads/', ''),
(116, 400, 1, 'uploads/', ''),
(117, 405, 6, 'uploads/', ''),
(118, 412, 5, 'uploads/', ''),
(119, 412, 5, 'uploads/', ''),
(120, 415, 4, 'uploads/', ''),
(121, 418, 1, 'uploads/Ashari_5112100133.doc', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_network`
--

CREATE TABLE IF NOT EXISTS `t_network` (
  `t_network_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_lastmile_id` int(11) NOT NULL,
  `t_nw_site_id` int(11) NOT NULL,
  `no_jar` varchar(15) DEFAULT NULL,
  `ip_wan` varchar(15) DEFAULT NULL,
  `ip_lan` varchar(15) DEFAULT NULL,
  `ip_loop` varchar(15) DEFAULT NULL,
  `asn` varchar(5) DEFAULT NULL,
  `bw` int(11) DEFAULT NULL,
  `netmask_wan` int(11) DEFAULT NULL,
  `netmask_lan` int(11) DEFAULT NULL,
  `hostname` varchar(30) DEFAULT NULL,
  `sla` varchar(5) DEFAULT NULL,
  `valid_fr` date DEFAULT NULL,
  `valid_to` date DEFAULT NULL,
  `mon_cacti` tinyint(1) DEFAULT NULL,
  `mon_npmd` tinyint(1) DEFAULT NULL,
  `mon_sp` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`t_network_id`),
  KEY `p_lastmile_id` (`p_lastmile_id`),
  KEY `t_nw_site_id` (`t_nw_site_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `t_network`
--

INSERT INTO `t_network` (`t_network_id`, `p_lastmile_id`, `t_nw_site_id`, `no_jar`, `ip_wan`, `ip_lan`, `ip_loop`, `asn`, `bw`, `netmask_wan`, `netmask_lan`, `hostname`, `sla`, `valid_fr`, `valid_to`, `mon_cacti`, `mon_npmd`, `mon_sp`) VALUES
(15, 4, 47, NULL, '192.168.5.2', '10.151.15.15', '10.10.10.10', 'Yes', 1024, 10, 29, 'Testing Hostname', '87.5%', NULL, NULL, 1, 1, 1),
(16, 3, 48, NULL, '192.168.10.12', '10.151.50.50', '1.1.1.1', 'Yes', 4096, 15, 28, 'Testing Hostname 2', '71.5%', NULL, NULL, 1, 0, 1),
(17, 3, 49, NULL, '192.168.5.2', '1.10.10.1', '1.1.1.1', 'Yes', 1024, 8, 4, 'Hostname_1', '72.5%', '2015-07-29', NULL, 1, 0, 1),
(18, 0, 52, NULL, NULL, NULL, NULL, NULL, 512, NULL, NULL, NULL, NULL, '2015-08-01', NULL, NULL, NULL, NULL),
(19, 0, 53, NULL, NULL, NULL, NULL, NULL, 9192, NULL, NULL, NULL, NULL, '2015-08-01', NULL, NULL, NULL, NULL),
(20, 0, 53, NULL, NULL, NULL, NULL, NULL, 9192, NULL, NULL, NULL, NULL, '2015-08-01', NULL, NULL, NULL, NULL),
(21, 0, 53, NULL, NULL, NULL, NULL, NULL, 9192, NULL, NULL, NULL, NULL, '2015-08-01', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_network_order`
--

CREATE TABLE IF NOT EXISTS `t_network_order` (
  `t_network_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_detail_network_order_id` int(11) NOT NULL,
  `t_nw_site_id` int(11) NOT NULL,
  `p_lastmile_id` int(11) NOT NULL,
  `no_jar` varchar(15) DEFAULT NULL,
  `ip_wan` varchar(15) DEFAULT NULL,
  `ip_lan` varchar(15) DEFAULT NULL,
  `ip_loop` varchar(15) DEFAULT NULL,
  `asn` varchar(5) DEFAULT NULL,
  `bw` int(11) DEFAULT NULL,
  `netmask_wan` int(11) DEFAULT NULL,
  `netmask_lan` int(11) DEFAULT NULL,
  `hostname` varchar(30) DEFAULT NULL,
  `sla` varchar(5) DEFAULT NULL,
  `valid_fr` date DEFAULT NULL,
  `valid_to` date DEFAULT NULL,
  `mon_cacti` tinyint(1) DEFAULT NULL,
  `mon_npmd` tinyint(1) DEFAULT NULL,
  `mon_sp` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`t_network_order_id`),
  KEY `p_lastmile_id` (`p_lastmile_id`),
  KEY `t_detail_network_order_id` (`t_detail_network_order_id`),
  KEY `t_nw_site_id` (`t_nw_site_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `t_network_order`
--

INSERT INTO `t_network_order` (`t_network_order_id`, `t_detail_network_order_id`, `t_nw_site_id`, `p_lastmile_id`, `no_jar`, `ip_wan`, `ip_lan`, `ip_loop`, `asn`, `bw`, `netmask_wan`, `netmask_lan`, `hostname`, `sla`, `valid_fr`, `valid_to`, `mon_cacti`, `mon_npmd`, `mon_sp`) VALUES
(66, 93, 47, 4, NULL, '192.168.5.2', '10.151.15.15', '10.10.10.10', 'Yes', 1024, 10, 29, 'Testing Hostname', '87.5%', NULL, NULL, 1, 1, 1),
(67, 94, 47, 4, NULL, '192.168.5.2', '10.151.15.15', '10.10.10.10', 'Yes', 4096, 10, 29, 'Testing Hostname', '87.5%', NULL, NULL, 1, 1, 1),
(68, 95, 48, 3, NULL, '192.168.10.12', '10.151.50.50', '1.1.1.1', 'Yes', 512, 15, 28, 'Testing Hostname 2', '71.5%', NULL, NULL, 1, 0, 1),
(69, 96, 48, 3, NULL, '192.168.10.12', '10.151.50.50', '1.1.1.1', 'Yes', 4096, 15, 28, 'Testing Hostname 2', '71.5%', NULL, NULL, 1, 0, 1),
(70, 97, 47, 4, NULL, '192.168.5.2', '10.151.15.15', '10.10.10.10', 'Yes', 1024, 10, 29, 'Testing Hostname', '87.5%', NULL, NULL, 1, 1, 1),
(71, 98, 49, 3, NULL, '192.168.5.2', '1.10.10.1', '1.1.1.1', 'Yes', 1024, 8, 4, 'Hostname_1', '72.5%', NULL, NULL, 1, 0, 1),
(72, 99, 50, 4, NULL, '192.168.10.51', '10.151.34.14', '1.1.1.1', 'Testi', 1024, 27, 20, 'Testing Hostname', '90%', NULL, NULL, 0, 0, 0),
(73, 100, 51, 0, NULL, NULL, NULL, NULL, NULL, 512, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 101, 48, 0, NULL, NULL, NULL, NULL, NULL, 1024, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 102, 52, 0, NULL, NULL, NULL, NULL, NULL, 512, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 103, 53, 0, NULL, NULL, NULL, NULL, NULL, 9192, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_nw_service`
--

CREATE TABLE IF NOT EXISTS `t_nw_service` (
  `t_network_order_id` int(11) NOT NULL,
  `p_nw_service_id` int(11) NOT NULL,
  KEY `p_nw_service_id` (`p_nw_service_id`),
  KEY `t_network_order_id` (`t_network_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_nw_service`
--

INSERT INTO `t_nw_service` (`t_network_order_id`, `p_nw_service_id`) VALUES
(66, 8),
(66, 14),
(67, 8),
(68, 13),
(68, 15),
(68, 16),
(69, 6),
(70, 7),
(71, 8),
(71, 15),
(71, 16),
(72, 10),
(72, 15),
(72, 16),
(73, 3),
(73, 14),
(74, 9),
(75, 13),
(75, 15),
(76, 4),
(76, 15);

-- --------------------------------------------------------

--
-- Table structure for table `t_nw_service_fix`
--

CREATE TABLE IF NOT EXISTS `t_nw_service_fix` (
  `t_network_id` int(11) NOT NULL,
  `p_nw_service_id` int(11) NOT NULL,
  KEY `network_id` (`t_network_id`),
  KEY `p_nw_service_id` (`p_nw_service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_nw_service_fix`
--

INSERT INTO `t_nw_service_fix` (`t_network_id`, `p_nw_service_id`) VALUES
(15, 7),
(15, 14),
(16, 6),
(16, 15),
(16, 16),
(17, 8),
(17, 15),
(17, 16),
(18, 13),
(18, 15),
(19, 4),
(19, 15),
(20, 4),
(20, 15),
(21, 4),
(21, 15);

-- --------------------------------------------------------

--
-- Table structure for table `t_nw_site`
--

CREATE TABLE IF NOT EXISTS `t_nw_site` (
  `t_nw_site_id` int(11) NOT NULL AUTO_INCREMENT,
  `provinsi_id` int(11) NOT NULL,
  `p_site_type_id` int(11) NOT NULL,
  `p_region_id` int(11) NOT NULL,
  `site_name` varchar(30) NOT NULL,
  `desc` varchar(300) NOT NULL,
  `is_critical` int(11) NOT NULL,
  `longitude` varchar(30) NOT NULL,
  `latitude` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `traffic_mgmt` varchar(15) NOT NULL,
  PRIMARY KEY (`t_nw_site_id`),
  KEY `provinsi_id` (`provinsi_id`),
  KEY `p_site_type_id` (`p_site_type_id`),
  KEY `p_region_id` (`p_region_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `t_nw_site`
--

INSERT INTO `t_nw_site` (`t_nw_site_id`, `provinsi_id`, `p_site_type_id`, `p_region_id`, `site_name`, `desc`, `is_critical`, `longitude`, `latitude`, `address`, `traffic_mgmt`) VALUES
(47, 4, 4, 1, 'Thamrin', '', 0, '', '', 'Jl. MH Thamrin', 'Automatic Fail '),
(48, 17, 3, 4, 'Bekasi', '', 0, '', '', 'Jl. Canna 2', 'Load Balance'),
(49, 4, 4, 4, 'Plumpang', '', 0, '', '', 'Jl. Plumpang', 'Automatic Fail '),
(50, 6, 6, 4, 'Madura', '', 0, '', '', 'Jl. Madura', 'Automatic Fail '),
(51, 6, 3, 1, 'Surabaya', '', 0, '', '', 'Sukolilo', ''),
(52, 37, 5, 3, 'Jayapura', '', 0, '', '', 'Jl. Jayapura', ''),
(53, 8, 10, 7, 'Medan', '', 0, '', '', 'Jl. Medan', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_nw_site_pic`
--

CREATE TABLE IF NOT EXISTS `t_nw_site_pic` (
  `t_nw_site_id` int(11) NOT NULL,
  `t_pic_id` int(11) NOT NULL,
  KEY `t_nw_site_id` (`t_nw_site_id`),
  KEY `t_pic_id` (`t_pic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_nw_site_pic`
--

INSERT INTO `t_nw_site_pic` (`t_nw_site_id`, `t_pic_id`) VALUES
(47, 46),
(48, 8),
(49, 48),
(50, 35),
(51, 8),
(52, 16),
(53, 13);

-- --------------------------------------------------------

--
-- Table structure for table `t_pic`
--

CREATE TABLE IF NOT EXISTS `t_pic` (
  `t_pic_id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(10) NOT NULL,
  `pic_name` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `phone2` varchar(15) NOT NULL,
  PRIMARY KEY (`t_pic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `t_pic`
--

INSERT INTO `t_pic` (`t_pic_id`, `nip`, `pic_name`, `phone`, `phone2`) VALUES
(7, '', 'Pak Husni', '', ''),
(8, '', 'Pak Hari', '', ''),
(9, '', 'test', '', ''),
(10, '', 'Pak Husni', '', ''),
(11, '', 'test', '', ''),
(12, '', 'tes', '', ''),
(13, '', 'Pak Husen', '', ''),
(14, '', 'coba2', '', ''),
(15, '', 'Pak Husen', '', ''),
(16, '', 'Pak Makarim', '', ''),
(17, '', 'Pak Husni', '', ''),
(18, '', 'tes', '', ''),
(19, '', 'tes', '', ''),
(20, '', 'tes', '', ''),
(21, '', 'test', '', ''),
(22, '', 'tes', '', ''),
(23, '', 'tes', '', ''),
(24, '', 'aceh', '', ''),
(25, '', 'tes', '', ''),
(26, '', 'tes', '', ''),
(27, '', 'aw', '', ''),
(28, '', 'aq', '', ''),
(29, '', 'ae', '', ''),
(30, '', 'aq', '', ''),
(31, '', 'av', '', ''),
(32, '', 'Pak Husni', '', ''),
(33, '', 'Pak Husni', '', ''),
(34, '', 'Pak Makarim', '', ''),
(35, '', 'Pak Riyan', '', ''),
(36, '', 'test', '', ''),
(37, '', 'coba', '', ''),
(38, '', 'coba', '', ''),
(39, '', 'coba', '', ''),
(40, '', 'test', '', ''),
(41, '', 'test', '', ''),
(42, '', 'aw', '', ''),
(43, '', 'Pak Suseno', '', ''),
(44, '', 'Pak Husen', '', ''),
(45, '', 'aw', '', ''),
(46, '', 'Pak Jaka', '', ''),
(47, '', 'Pak Hari', '', ''),
(48, '', 'Dani', '', ''),
(49, '', 'Pak Riyan', '', ''),
(50, '', 'Pak Hari', '', ''),
(51, '', 'Pak Makarim', '', ''),
(52, '', 'Pak Husen', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_price_nw_serv_provider`
--

CREATE TABLE IF NOT EXISTS `t_price_nw_serv_provider` (
  `provider_id` int(11) NOT NULL,
  `p_nw_service_id` int(11) NOT NULL,
  `price_otc` int(11) DEFAULT NULL,
  `price_mrc` int(11) DEFAULT NULL,
  KEY `provider_id` (`provider_id`),
  KEY `p_nw_service_id` (`p_nw_service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_price_nw_serv_provider`
--

INSERT INTO `t_price_nw_serv_provider` (`provider_id`, `p_nw_service_id`, `price_otc`, `price_mrc`) VALUES
(3, 2, NULL, NULL),
(3, 9, NULL, NULL),
(2, 11, NULL, NULL),
(4, 4, NULL, NULL),
(4, 11, NULL, NULL),
(4, 4, NULL, NULL),
(5, 11, NULL, NULL),
(4, 3, NULL, NULL),
(4, 4, NULL, NULL),
(3, 9, NULL, NULL),
(3, 2, NULL, NULL),
(2, 2, NULL, NULL),
(3, 2, NULL, NULL),
(3, 2, NULL, NULL),
(3, 3, NULL, NULL),
(3, 8, NULL, NULL),
(3, 9, NULL, NULL),
(3, 8, NULL, NULL),
(2, 2, NULL, NULL),
(2, 3, NULL, NULL),
(3, 10, NULL, NULL),
(2, 10, NULL, NULL),
(3, 1, NULL, NULL),
(3, 2, NULL, NULL),
(3, 3, NULL, NULL),
(2, 4, NULL, NULL),
(1, 12, NULL, NULL),
(2, 10, NULL, NULL),
(3, 3, NULL, NULL),
(2, 11, NULL, NULL),
(2, 11, NULL, NULL),
(3, 2, NULL, NULL),
(3, 2, NULL, NULL),
(2, 9, NULL, NULL),
(2, 4, NULL, NULL),
(2, 2, NULL, NULL),
(3, 6, NULL, NULL),
(3, 12, NULL, NULL),
(3, 4, NULL, NULL),
(2, 8, NULL, NULL),
(4, 13, NULL, NULL),
(2, 8, NULL, NULL),
(4, 10, NULL, NULL),
(2, 3, NULL, NULL),
(3, 13, NULL, NULL),
(4, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_process`
--

CREATE TABLE IF NOT EXISTS `t_process` (
  `t_work_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_process_id` int(11) NOT NULL,
  `t_detail_network_order_id` int(11) NOT NULL,
  `valid_fr` date DEFAULT NULL,
  `valid_to` date DEFAULT NULL,
  `keterangan` longtext,
  `closed_by` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`t_work_id`),
  KEY `p_process_id` (`p_process_id`,`t_detail_network_order_id`),
  KEY `t_detail_network_order_id` (`t_detail_network_order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=430 ;

--
-- Dumping data for table `t_process`
--

INSERT INTO `t_process` (`t_work_id`, `p_process_id`, `t_detail_network_order_id`, `valid_fr`, `valid_to`, `keterangan`, `closed_by`) VALUES
(236, 9, 103, NULL, '2015-08-01', '', 'networkarc'),
(343, 1, 93, '2015-07-29', '2015-07-29', 'Assalamualaikum', 'inputor'),
(344, 2, 93, '2015-07-29', '2015-07-29', '', 'networkarc'),
(345, 3, 93, '2015-07-29', '2015-07-29', '', 'networkarc'),
(346, 4, 93, '2015-07-29', '2015-07-29', 'Hasil Survey Memuaskan', 'wananalyst'),
(347, 5, 93, '2015-07-29', '2015-07-29', '', 'wananalyst'),
(348, 6, 93, '2015-07-29', '2015-07-29', '', 'wanenginee'),
(349, 7, 93, '2015-07-29', '2015-07-29', 'Monitoring sukses', 'wanperform'),
(350, 8, 93, '2015-07-29', '2015-07-29', 'BALO telah diterima ', 'wananalyst'),
(351, 9, 93, '2015-07-29', '2015-07-29', 'Pesanan telah selesai dikerjakan', 'networkarc'),
(353, 1, 94, '2015-07-29', '2015-07-29', 'Upgrade Bandwidth', 'inputor'),
(354, 2, 94, '2015-07-29', '2015-07-29', '', 'networkarc'),
(355, 3, 94, '2015-07-29', '2015-07-29', '', 'networkarc'),
(356, 5, 94, '2015-07-29', '2015-07-29', 'Traffic Management mohon diubah', 'wananalyst'),
(357, 6, 94, '2015-07-29', '2015-07-29', '', 'wanenginee'),
(358, 7, 94, '2015-07-29', '2015-07-29', '', 'wanperform'),
(359, 8, 94, '2015-07-29', '2015-07-29', '', 'wananalyst'),
(360, 9, 94, '2015-07-29', '2015-07-29', '', 'networkarc'),
(362, 1, 95, '2015-07-29', '2015-07-29', '', 'inputor'),
(363, 2, 95, '2015-07-29', '2015-07-29', '', 'networkarc'),
(364, 3, 95, '2015-07-29', '2015-07-29', '', 'networkarc'),
(365, 4, 95, '2015-07-29', '2015-07-29', 'Survey telah dilakukan', 'wananalyst'),
(366, 5, 95, '2015-07-29', '2015-07-29', '', 'wananalyst'),
(367, 6, 95, '2015-07-29', '2015-07-29', '', 'wanenginee'),
(368, 7, 95, '2015-07-29', '2015-07-29', 'Monitoring selesai', 'wanperform'),
(369, 8, 95, '2015-07-29', '2015-07-29', '', 'wananalyst'),
(370, 9, 95, '2015-07-29', '2015-07-29', '', 'networkarc'),
(372, 1, 96, '2015-07-29', '2015-07-29', '', 'inputor'),
(373, 2, 96, '2015-07-29', '2015-07-29', '', 'networkarc'),
(374, 3, 96, '2015-07-29', '2015-07-29', '', 'networkarc'),
(375, 5, 96, '2015-07-29', '2015-07-29', '', 'wananalyst'),
(376, 6, 96, '2015-07-29', '2015-07-29', 'UAT Telah dikirim, Terima Kasih', 'wanenginee'),
(377, 7, 96, '2015-07-29', '2015-07-29', 'NPMD gagal', 'wanperform'),
(378, 8, 96, '2015-07-29', '2015-07-29', 'BALO untuk upgrade telah dibuat', 'wananalyst'),
(379, 9, 96, '2015-07-29', '2015-07-29', '', 'networkarc'),
(381, 1, 97, '2015-07-29', '2015-07-29', '', 'inputor'),
(382, 2, 97, '2015-07-29', '2015-07-29', '', 'networkarc'),
(383, 3, 97, '2015-07-29', '2015-07-29', '', 'networkarc'),
(384, 5, 97, '2015-07-29', '2015-07-29', '', 'wananalyst'),
(385, 6, 97, '2015-07-29', '2015-07-29', '', 'wanenginee'),
(386, 7, 97, '2015-07-29', '2015-07-29', 'Monitoring Sukses', 'wanperform'),
(387, 8, 97, '2015-07-29', '2015-07-29', 'BALO untuk downgrade telah dicetak', 'wananalyst'),
(388, 9, 97, '2015-07-29', '2015-07-29', '', 'networkarc'),
(390, 1, 98, '2015-07-29', '2015-07-29', '', 'inputor'),
(391, 2, 98, '2015-07-29', '2015-07-29', '', 'networkarc'),
(392, 3, 98, '2015-07-29', '2015-07-29', '', 'networkarc'),
(393, 4, 98, '2015-07-29', '2015-07-29', '', 'wananalyst'),
(394, 5, 98, '2015-07-29', '2015-07-29', '', 'wananalyst'),
(395, 6, 98, '2015-07-29', '2015-07-29', '', 'wanenginee'),
(396, 7, 98, '2015-07-29', '2015-07-29', '', 'wanperform'),
(397, 8, 98, '2015-07-29', '2015-07-29', '', 'wananalyst'),
(398, 9, 98, '2015-07-29', '2015-07-29', '', 'networkarc'),
(399, 1, 99, '2015-07-30', '2015-07-30', '', 'inputor'),
(400, 2, 99, '2015-07-30', '2015-07-30', '', 'networkarc'),
(405, 3, 99, '2015-07-30', '2015-07-31', '', 'networkarc'),
(406, 4, 99, '2015-07-31', '2015-08-01', '', 'wananalyst'),
(411, 5, 99, '2015-08-01', '2015-08-01', '', 'wananalyst'),
(412, 6, 99, '2015-08-01', '2015-08-01', '', 'wanenginee'),
(414, 7, 99, '2015-08-01', '2015-08-01', '', 'wanperform'),
(415, 8, 99, '2015-08-01', '2015-08-01', '', 'wananalyst'),
(416, 9, 99, '2015-08-01', NULL, NULL, NULL),
(417, 1, 100, '2015-08-01', '2015-08-01', '', 'inputor'),
(418, 2, 100, '2015-08-01', '2015-08-01', '', 'networkarc'),
(419, 1, 101, '2015-08-01', '2015-08-01', '', 'inputor'),
(420, 2, 101, '2015-08-01', NULL, NULL, NULL),
(421, 1, 102, '2015-08-01', '2015-08-01', '', 'inputor'),
(422, 2, 102, '2015-08-01', NULL, NULL, NULL),
(424, 1, 103, '2015-08-01', '2015-08-01', '', 'inputor'),
(425, 2, 103, '2015-08-01', NULL, NULL, NULL),
(429, 3, 100, '2015-08-01', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_unrec_process`
--

CREATE TABLE IF NOT EXISTS `t_unrec_process` (
  `t_detail_network_order_id` int(11) NOT NULL,
  `un_proc_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_process_id` int(11) NOT NULL,
  `t_nw_site_id` int(11) NOT NULL,
  PRIMARY KEY (`un_proc_id`),
  KEY `p_process_id` (`p_process_id`,`t_detail_network_order_id`),
  KEY `t_detail_network_order_id` (`t_detail_network_order_id`),
  KEY `t_nw_site_id` (`t_nw_site_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `t_unrec_process`
--

INSERT INTO `t_unrec_process` (`t_detail_network_order_id`, `un_proc_id`, `p_process_id`, `t_nw_site_id`) VALUES
(99, 1, 9, 50),
(100, 2, 3, 51),
(101, 3, 2, 48);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`) VALUES
(1, 'inputor', 'a7bb3e810ddf6e7d89397ec26513c42c'),
(2, 'networkarchitect', '69756090a09e3e1ed8665715e894a2ea'),
(3, 'wananalyst', 'f45a1dcfa56b550e36f0637567b1ab02'),
(4, 'wanengineer', '705f46e384e0d8d9a260380d0303ce97'),
(5, 'wanperformance', '6a1f69e2f6cab80e0780fb5fb7583e8d');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `user_id` int(11) NOT NULL,
  `p_role_id` int(11) NOT NULL,
  KEY `user_id` (`user_id`,`p_role_id`),
  KEY `p_role_id` (`p_role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_id`, `p_role_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `workflow`
--

CREATE TABLE IF NOT EXISTS `workflow` (
  `p_order_type_id` int(11) NOT NULL,
  `p_role_id` int(11) NOT NULL,
  `p_process_id` int(11) NOT NULL,
  `next_process_id` varchar(10) NOT NULL,
  KEY `p_role_id` (`p_role_id`,`p_order_type_id`),
  KEY `p_order_type_id` (`p_order_type_id`),
  KEY `p_process_id` (`p_process_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workflow`
--

INSERT INTO `workflow` (`p_order_type_id`, `p_role_id`, `p_process_id`, `next_process_id`) VALUES
(1, 1, 1, '2'),
(1, 2, 2, '3'),
(1, 2, 3, '4'),
(1, 3, 4, '5'),
(1, 3, 5, '6'),
(1, 4, 6, '7'),
(1, 5, 7, '8'),
(1, 3, 8, '9'),
(1, 2, 9, ''),
(2, 1, 1, '2'),
(2, 2, 2, '3'),
(2, 2, 3, '5'),
(2, 3, 5, '6'),
(2, 4, 6, '7'),
(2, 5, 7, '8'),
(2, 3, 8, '9'),
(2, 2, 9, ''),
(3, 1, 1, '2'),
(3, 2, 2, '3'),
(3, 2, 3, '4'),
(3, 3, 4, '5'),
(3, 3, 5, '6'),
(3, 4, 6, '7'),
(3, 5, 7, '8'),
(3, 3, 8, '9'),
(3, 2, 9, ''),
(4, 1, 1, '2'),
(4, 2, 2, '3'),
(4, 2, 3, '5'),
(4, 3, 5, '6'),
(4, 4, 6, '7'),
(4, 5, 7, '8'),
(4, 3, 8, '9'),
(4, 2, 9, ''),
(5, 1, 1, '2'),
(5, 2, 2, '3'),
(5, 2, 3, '5'),
(5, 3, 5, '6'),
(5, 4, 6, '7'),
(5, 5, 7, '8'),
(5, 3, 8, '9'),
(5, 2, 9, ''),
(6, 1, 1, '2'),
(6, 2, 2, '3'),
(6, 2, 3, '4'),
(6, 3, 4, '5'),
(6, 3, 5, '8'),
(6, 3, 8, '9'),
(6, 2, 9, ''),
(7, 1, 1, '2'),
(7, 2, 2, '3'),
(7, 2, 3, '5'),
(7, 3, 5, '7'),
(7, 5, 7, '9'),
(7, 2, 9, '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `p_nw_service`
--
ALTER TABLE `p_nw_service`
  ADD CONSTRAINT `p_nw_service_ibfk_1` FOREIGN KEY (`p_service_id`) REFERENCES `p_service` (`p_service_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p_nw_service_ibfk_2` FOREIGN KEY (`p_serv_type_id`) REFERENCES `p_service_type` (`p_serv_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p_region`
--
ALTER TABLE `p_region`
  ADD CONSTRAINT `p_region_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_detail_network_order`
--
ALTER TABLE `t_detail_network_order`
  ADD CONSTRAINT `t_detail_network_order_ibfk_1` FOREIGN KEY (`p_order_type_id`) REFERENCES `p_order_type` (`p_order_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_document`
--
ALTER TABLE `t_document`
  ADD CONSTRAINT `t_document_ibfk_2` FOREIGN KEY (`p_doc_type_id`) REFERENCES `p_doc_type` (`p_doc_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_document_ibfk_3` FOREIGN KEY (`t_work_id`) REFERENCES `t_process` (`t_work_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_network`
--
ALTER TABLE `t_network`
  ADD CONSTRAINT `t_network_ibfk_2` FOREIGN KEY (`t_nw_site_id`) REFERENCES `t_nw_site` (`t_nw_site_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_network_order`
--
ALTER TABLE `t_network_order`
  ADD CONSTRAINT `t_network_order_ibfk_1` FOREIGN KEY (`t_nw_site_id`) REFERENCES `t_nw_site` (`t_nw_site_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_network_order_ibfk_2` FOREIGN KEY (`t_detail_network_order_id`) REFERENCES `t_detail_network_order` (`t_detail_network_order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_nw_service`
--
ALTER TABLE `t_nw_service`
  ADD CONSTRAINT `t_nw_service_ibfk_1` FOREIGN KEY (`p_nw_service_id`) REFERENCES `p_nw_service` (`p_nw_service_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_nw_service_ibfk_2` FOREIGN KEY (`t_network_order_id`) REFERENCES `t_network_order` (`t_network_order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_nw_service_fix`
--
ALTER TABLE `t_nw_service_fix`
  ADD CONSTRAINT `t_nw_service_fix_ibfk_1` FOREIGN KEY (`p_nw_service_id`) REFERENCES `p_nw_service` (`p_nw_service_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_nw_service_fix_ibfk_2` FOREIGN KEY (`t_network_id`) REFERENCES `t_network` (`t_network_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_nw_site`
--
ALTER TABLE `t_nw_site`
  ADD CONSTRAINT `t_nw_site_ibfk_1` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsi` (`provinsi_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_nw_site_ibfk_2` FOREIGN KEY (`p_site_type_id`) REFERENCES `p_site_type` (`p_site_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_nw_site_ibfk_3` FOREIGN KEY (`p_region_id`) REFERENCES `p_region` (`p_region_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_nw_site_pic`
--
ALTER TABLE `t_nw_site_pic`
  ADD CONSTRAINT `t_nw_site_pic_ibfk_1` FOREIGN KEY (`t_nw_site_id`) REFERENCES `t_nw_site` (`t_nw_site_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_nw_site_pic_ibfk_2` FOREIGN KEY (`t_pic_id`) REFERENCES `t_pic` (`t_pic_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_price_nw_serv_provider`
--
ALTER TABLE `t_price_nw_serv_provider`
  ADD CONSTRAINT `t_price_nw_serv_provider_ibfk_1` FOREIGN KEY (`provider_id`) REFERENCES `provider` (`provider_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_price_nw_serv_provider_ibfk_2` FOREIGN KEY (`p_nw_service_id`) REFERENCES `p_nw_service` (`p_nw_service_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_process`
--
ALTER TABLE `t_process`
  ADD CONSTRAINT `t_process_ibfk_1` FOREIGN KEY (`p_process_id`) REFERENCES `p_process` (`p_process_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_process_ibfk_2` FOREIGN KEY (`t_detail_network_order_id`) REFERENCES `t_detail_network_order` (`t_detail_network_order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_unrec_process`
--
ALTER TABLE `t_unrec_process`
  ADD CONSTRAINT `t_unrec_process_ibfk_1` FOREIGN KEY (`p_process_id`) REFERENCES `p_process` (`p_process_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_unrec_process_ibfk_2` FOREIGN KEY (`t_detail_network_order_id`) REFERENCES `t_detail_network_order` (`t_detail_network_order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_unrec_process_ibfk_3` FOREIGN KEY (`t_nw_site_id`) REFERENCES `t_nw_site` (`t_nw_site_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_role_ibfk_2` FOREIGN KEY (`p_role_id`) REFERENCES `p_role` (`p_role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `workflow`
--
ALTER TABLE `workflow`
  ADD CONSTRAINT `workflow_ibfk_1` FOREIGN KEY (`p_order_type_id`) REFERENCES `p_order_type` (`p_order_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `workflow_ibfk_2` FOREIGN KEY (`p_role_id`) REFERENCES `p_role` (`p_role_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `workflow_ibfk_3` FOREIGN KEY (`p_process_id`) REFERENCES `p_process` (`p_process_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
