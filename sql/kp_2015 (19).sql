-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2015 at 04:48 AM
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
('fa920dff784e4663c29bf986b501d3e8', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.130 Safari/537.36', 1439149368, 'a:4:{s:9:"user_data";s:0:"";s:9:"user_name";s:7:"inputor";s:12:"is_logged_in";b:1;s:4:"role";s:7:"inputor";}'),
('822cd517a354b30763e6260ed533e67a', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.130 Safari/537.36', 1439170791, '');

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
-- Table structure for table `p_monitoring`
--

CREATE TABLE IF NOT EXISTS `p_monitoring` (
  `mon_id` int(11) NOT NULL AUTO_INCREMENT,
  `mon_name` varchar(30) DEFAULT NULL,
  `desc` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`mon_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `p_monitoring`
--

INSERT INTO `p_monitoring` (`mon_id`, `mon_name`, `desc`) VALUES
(1, 'Monitoring CACTI', NULL),
(2, 'Monitoring NPMD', NULL),
(3, 'Monitoring Smokeping', NULL);

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
  `ord_name` varchar(30) DEFAULT NULL,
  `desc` varchar(300) DEFAULT NULL,
  `delivery_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`p_order_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `p_order_type`
--

INSERT INTO `p_order_type` (`p_order_type_id`, `ord_name`, `desc`, `delivery_time`) VALUES
(1, 'Pasang Baru', NULL, 56),
(2, 'Upgrade', NULL, 3),
(3, 'Upgrade (Ganti Infrastruktur)', NULL, 35),
(4, 'Upgrade Temprorer', NULL, 3),
(5, 'Downgrade', NULL, 3),
(6, 'Relokasi', NULL, 35),
(7, 'Dismantle', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `p_price_nw_serv_provider`
--

CREATE TABLE IF NOT EXISTS `p_price_nw_serv_provider` (
  `provider_id` int(11) NOT NULL,
  `p_nw_service_id` int(11) NOT NULL,
  `price_otc` int(11) DEFAULT NULL,
  `price_mrc` int(11) DEFAULT NULL,
  KEY `provider_id` (`provider_id`),
  KEY `p_nw_service_id` (`p_nw_service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_price_nw_serv_provider`
--

INSERT INTO `p_price_nw_serv_provider` (`provider_id`, `p_nw_service_id`, `price_otc`, `price_mrc`) VALUES
(1, 1, NULL, 100000),
(1, 2, NULL, 0),
(1, 3, NULL, 120000),
(1, 4, NULL, 130000),
(1, 5, NULL, 140000),
(1, 6, NULL, 150000),
(1, 7, NULL, 160000),
(1, 8, NULL, 170000),
(1, 9, NULL, 180000),
(1, 10, NULL, 190000),
(1, 11, NULL, 200000),
(1, 12, NULL, 210000),
(1, 13, NULL, 220000),
(1, 14, 100000, NULL),
(1, 15, 150000, NULL),
(1, 16, 120000, NULL),
(1, 17, 175000, NULL),
(2, 1, NULL, 150000),
(2, 2, NULL, 160000),
(2, 3, NULL, 170000),
(2, 4, NULL, 175000),
(2, 5, NULL, 180000),
(2, 6, NULL, 185000),
(2, 7, NULL, 190000),
(2, 8, NULL, 195000),
(2, 9, NULL, 200000),
(2, 10, NULL, 205000),
(2, 11, NULL, 210000),
(2, 12, NULL, 215000),
(2, 13, NULL, 220000),
(2, 14, 100000, NULL),
(2, 15, 152000, NULL),
(2, 16, 142500, NULL),
(2, 17, 175000, NULL);

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
  `tgl_aktivasi` date DEFAULT NULL,
  `pic_provider` varchar(50) DEFAULT NULL,
  `biaya_tambahan` int(11) NOT NULL,
  PRIMARY KEY (`t_detail_network_order_id`),
  KEY `t_network_order_id` (`p_order_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=241 ;

--
-- Dumping data for table `t_detail_network_order`
--

INSERT INTO `t_detail_network_order` (`t_detail_network_order_id`, `p_order_type_id`, `no_form_permintaan`, `tgl_permintaan`, `tiket_order_provider`, `no_balo_provider`, `no_balo_pertamina`, `tgl_tagih`, `tgl_aktivasi`, `pic_provider`, `biaya_tambahan`) VALUES
(229, 1, '012-10-2015', '2015-08-09', '001-20-1234', '01-2014', '002-12-2015', NULL, '2015-08-20', 'Pak Husen', 500000),
(239, 6, '12-123-0021', '2015-08-10', '001-1012', '001-2131', '912-123', NULL, '2015-08-25', 'Pak Andi', 100000),
(240, 2, '1121', '2015-08-10', '1312', '001-132', '012-1234', NULL, '2015-08-13', 'Pak Husen', 125000);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=219 ;

--
-- Dumping data for table `t_document`
--

INSERT INTO `t_document` (`t_document_id`, `t_work_id`, `p_doc_type_id`, `path`, `caption`) VALUES
(187, 804, 1, 'uploads/PERSYARATAN_PKL1.docx', 'Dokumen Verifikasi Fix'),
(188, 805, 2, 'uploads/PERSYARATAN_PKL2.docx', 'Dokumen Koordinasi Fix'),
(190, 805, 1, 'uploads/', ''),
(191, 808, 6, 'uploads/PERSYARATAN_PKL4.docx', 'Dokumen Survey Fix 2'),
(192, 809, 3, 'uploads/PERSYARATAN_PKL5.docx', 'Dokumen Implementasi Fix'),
(193, 810, 5, 'uploads/Laporan_KP_5112100123-5112100133.docx', 'Dokumen UAT Fix'),
(194, 803, 1, 'uploads/Laporan_KP_5112100123-51121001331.docx', 'Dokumen Monitoring Fix'),
(195, 812, 4, 'uploads/Laporan_KP_5112100123-51121001332.docx', 'Dokumen BALO Fix'),
(196, 813, 3, 'uploads/PERSYARATAN_PKL6.docx', 'Dokumen OB Fix'),
(206, 841, 1, 'uploads/PERSYARATAN_PKL10.docx', 'Form Permintaan'),
(207, 842, 1, 'uploads/', ''),
(208, 843, 1, 'uploads/', ''),
(209, 845, 4, 'uploads/PERSYARATAN_PKL11.docx', 'Dokumen BALO Fix'),
(210, 846, 1, 'uploads/', ''),
(211, 846, 1, 'uploads/', ''),
(212, 850, 1, 'uploads/Laporan_KP_5112100123-51121001334.docx', 'Dokumen Permintaan Upgrade'),
(213, 851, 1, 'uploads/', ''),
(215, 853, 5, 'uploads/Laporan_KP_5112100123-51121001335.docx', 'Dokumen UAT'),
(216, 849, 3, 'uploads/Laporan_KP_5112100123-51121001336.docx', 'Dokumen Monitoring Fix'),
(217, 855, 4, 'uploads/PERSYARATAN_PKL12.docx', 'BALO'),
(218, 856, 1, 'uploads/', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_monitoring`
--

CREATE TABLE IF NOT EXISTS `t_monitoring` (
  `t_network_order_id` int(11) DEFAULT NULL,
  `mon_id` int(11) DEFAULT NULL,
  KEY `mon_id` (`mon_id`,`t_network_order_id`),
  KEY `t_network_order_id` (`t_network_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_monitoring`
--

INSERT INTO `t_monitoring` (`t_network_order_id`, `mon_id`) VALUES
(158, 1),
(165, 1),
(165, 2),
(158, 3);

-- --------------------------------------------------------

--
-- Table structure for table `t_monitoring_fix`
--

CREATE TABLE IF NOT EXISTS `t_monitoring_fix` (
  `t_network_id` int(11) DEFAULT NULL,
  `mon_id` int(11) DEFAULT NULL,
  KEY `mon_id` (`mon_id`,`t_network_id`),
  KEY `t_network_id` (`t_network_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_monitoring_fix`
--

INSERT INTO `t_monitoring_fix` (`t_network_id`, `mon_id`) VALUES
(32, 1),
(32, 2);

-- --------------------------------------------------------

--
-- Table structure for table `t_network`
--

CREATE TABLE IF NOT EXISTS `t_network` (
  `t_network_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_lastmile_id` int(11) NOT NULL,
  `t_nw_site_id` int(11) NOT NULL,
  `provider_id` int(11) DEFAULT NULL,
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
  PRIMARY KEY (`t_network_id`),
  KEY `p_lastmile_id` (`p_lastmile_id`),
  KEY `t_nw_site_id` (`t_nw_site_id`),
  KEY `provider_id` (`provider_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `t_network`
--

INSERT INTO `t_network` (`t_network_id`, `p_lastmile_id`, `t_nw_site_id`, `provider_id`, `no_jar`, `ip_wan`, `ip_lan`, `ip_loop`, `asn`, `bw`, `netmask_wan`, `netmask_lan`, `hostname`, `sla`, `valid_fr`, `valid_to`) VALUES
(32, 1, 139, 2, NULL, '192.168.5.2', '10.151.50.50', '0.0.0.0', '6400', 0, 29, 30, 'Host Pusat', '81%', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_network_order`
--

CREATE TABLE IF NOT EXISTS `t_network_order` (
  `t_network_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_detail_network_order_id` int(11) NOT NULL,
  `t_nw_site_id` int(11) NOT NULL,
  `provider_id` int(11) DEFAULT NULL,
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
  PRIMARY KEY (`t_network_order_id`),
  KEY `p_lastmile_id` (`p_lastmile_id`),
  KEY `t_detail_network_order_id` (`t_detail_network_order_id`),
  KEY `t_nw_site_id` (`t_nw_site_id`),
  KEY `provider_id` (`provider_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=166 ;

--
-- Dumping data for table `t_network_order`
--

INSERT INTO `t_network_order` (`t_network_order_id`, `t_detail_network_order_id`, `t_nw_site_id`, `provider_id`, `p_lastmile_id`, `no_jar`, `ip_wan`, `ip_lan`, `ip_loop`, `asn`, `bw`, `netmask_wan`, `netmask_lan`, `hostname`, `sla`, `valid_fr`, `valid_to`) VALUES
(158, 229, 131, 2, 1, '0', '0', '0', '0', '0', 1024, 0, 0, '0', '0', NULL, NULL),
(164, 239, 139, 2, 0, '1', NULL, NULL, NULL, NULL, 1024, NULL, NULL, NULL, NULL, NULL, NULL),
(165, 240, 139, 2, 1, NULL, '192.168.5.2', '10.151.50.50', '0.0.0.0', '6400', 0, 29, 30, 'Host Pusat', '81%', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_nw_service`
--

CREATE TABLE IF NOT EXISTS `t_nw_service` (
  `t_network_order_id` int(11) NOT NULL,
  `p_nw_service_id` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  KEY `p_nw_service_id` (`p_nw_service_id`),
  KEY `t_network_order_id` (`t_network_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_nw_service`
--

INSERT INTO `t_nw_service` (`t_network_order_id`, `p_nw_service_id`, `jumlah`) VALUES
(158, 2, 1),
(158, 15, 1),
(158, 16, 5),
(158, 17, 2),
(164, 2, 1),
(165, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_nw_service_fix`
--

CREATE TABLE IF NOT EXISTS `t_nw_service_fix` (
  `t_network_id` int(11) NOT NULL,
  `p_nw_service_id` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  KEY `network_id` (`t_network_id`),
  KEY `p_nw_service_id` (`p_nw_service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_nw_service_fix`
--

INSERT INTO `t_nw_service_fix` (`t_network_id`, `p_nw_service_id`, `jumlah`) VALUES
(32, 2, NULL),
(32, 15, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=140 ;

--
-- Dumping data for table `t_nw_site`
--

INSERT INTO `t_nw_site` (`t_nw_site_id`, `provinsi_id`, `p_site_type_id`, `p_region_id`, `site_name`, `desc`, `is_critical`, `longitude`, `latitude`, `address`, `traffic_mgmt`) VALUES
(131, 4, 1, 1, 'Jakarta Pusat', '', 0, '98', '112', 'Jalan Merdeka Timur no. 56', ''),
(139, 37, 2, 8, 'Jayapura', '', 0, '98', '102', 'Jayapura Raya', 'Load Sharing');

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
(131, 150),
(139, 150);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=159 ;

--
-- Dumping data for table `t_pic`
--

INSERT INTO `t_pic` (`t_pic_id`, `nip`, `pic_name`, `phone`, `phone2`) VALUES
(150, '', 'Pak Mifta ', '085730555032 ', ' '),
(151, '', 'Pak Mifta ', '', ''),
(152, '', 'Pak Mifta ', '', ''),
(153, '', 'Pak Mifta ', '', ''),
(154, '', 'Pak Mifta ', '', ''),
(155, '', 'Pak Mifta ', '', ''),
(156, '', 'Pak Mifta ', '', ''),
(157, '', 'Pak Mifta ', '', ''),
(158, '', 'Pak Mifta ', '', '');

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
  `closed_by` varchar(50) DEFAULT NULL,
  `ket_reject` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`t_work_id`),
  KEY `p_process_id` (`p_process_id`,`t_detail_network_order_id`),
  KEY `t_detail_network_order_id` (`t_detail_network_order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=859 ;

--
-- Dumping data for table `t_process`
--

INSERT INTO `t_process` (`t_work_id`, `p_process_id`, `t_detail_network_order_id`, `valid_fr`, `valid_to`, `keterangan`, `closed_by`, `ket_reject`) VALUES
(803, 1, 229, '2015-08-09', '2015-08-09', 'Dimohon ijin pemasangan jaringan di pertamina pusat, berikut permintaannya', 'inputor', NULL),
(804, 2, 229, '2015-08-09', '2015-08-09', 'Permintaan ini telah diverifikasi', 'networkarchitect', NULL),
(805, 3, 229, '2015-08-09', '2015-08-09', 'Sudah diterima rejectnya dan sudah diproses', 'networkarchitect', 'Tolong dicek ulang'),
(808, 4, 229, '2015-08-09', '2015-08-09', 'Survey sudah dilakukan, dan terbukti tempat ini dapat dilakukan  implementasi', 'wananalyst', NULL),
(809, 5, 229, '2015-08-09', '2015-08-09', 'Implementasi berhasil dilakukan', 'wananalyst', NULL),
(810, 6, 229, '2015-08-09', '2015-08-09', 'UAT juga telah dilakukan, dan sesuai dengan standard', 'wanengineer', NULL),
(811, 7, 229, '2015-08-09', '2015-08-09', 'Monitoring CACTI dan Smokeping berhasil dilakukan', 'wanperformance', NULL),
(812, 8, 229, '2015-08-09', '2015-08-09', 'BALO telah dicetak', 'wananalyst', NULL),
(813, 9, 229, '2015-08-09', '2015-08-10', 'Online Billing berhasil dicetak', 'networkarchitect', NULL),
(840, 1, 239, '2015-08-10', '2015-08-10', '', 'inputor', NULL),
(841, 2, 239, '2015-08-10', '2015-08-10', '', 'networkarchitect', NULL),
(842, 3, 239, '2015-08-10', '2015-08-10', '', 'networkarchitect', NULL),
(843, 4, 239, '2015-08-10', '2015-08-10', '', 'wananalyst', NULL),
(844, 5, 239, '2015-08-10', '2015-08-10', '', 'wananalyst', NULL),
(845, 8, 239, '2015-08-10', '2015-08-10', 'Keterangan aja', 'wananalyst', NULL),
(846, 9, 239, '2015-08-10', '2015-08-10', '', 'networkarchitect', NULL),
(849, 1, 240, '2015-08-10', '2015-08-10', '', 'inputor', NULL),
(850, 2, 240, '2015-08-10', '2015-08-10', '', 'networkarchitect', NULL),
(851, 3, 240, '2015-08-10', '2015-08-10', '', 'networkarchitect', NULL),
(852, 5, 240, '2015-08-10', '2015-08-10', '', 'wananalyst', NULL),
(853, 6, 240, '2015-08-10', '2015-08-10', '', 'wanengineer', NULL),
(854, 7, 240, '2015-08-10', '2015-08-10', 'CACTI NPMD berhasil ', 'wanperformance', NULL),
(855, 8, 240, '2015-08-10', '2015-08-10', '', 'wananalyst', NULL),
(856, 9, 240, '2015-08-10', '2015-08-10', '', 'networkarchitect', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_unrec_process`
--

CREATE TABLE IF NOT EXISTS `t_unrec_process` (
  `t_detail_network_order_id` int(11) NOT NULL,
  `un_proc_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_process_id` int(11) NOT NULL,
  `t_nw_site_id` int(11) NOT NULL,
  `ket_reject` varchar(300) NOT NULL,
  PRIMARY KEY (`un_proc_id`),
  KEY `p_process_id` (`p_process_id`,`t_detail_network_order_id`),
  KEY `t_detail_network_order_id` (`t_detail_network_order_id`),
  KEY `t_nw_site_id` (`t_nw_site_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=111 ;

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
-- Constraints for table `p_price_nw_serv_provider`
--
ALTER TABLE `p_price_nw_serv_provider`
  ADD CONSTRAINT `p_price_nw_serv_provider_ibfk_1` FOREIGN KEY (`provider_id`) REFERENCES `provider` (`provider_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p_price_nw_serv_provider_ibfk_2` FOREIGN KEY (`p_nw_service_id`) REFERENCES `p_nw_service` (`p_nw_service_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `t_monitoring`
--
ALTER TABLE `t_monitoring`
  ADD CONSTRAINT `t_monitoring_ibfk_1` FOREIGN KEY (`mon_id`) REFERENCES `p_monitoring` (`mon_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_monitoring_ibfk_2` FOREIGN KEY (`t_network_order_id`) REFERENCES `t_network_order` (`t_network_order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_monitoring_fix`
--
ALTER TABLE `t_monitoring_fix`
  ADD CONSTRAINT `t_monitoring_fix_ibfk_1` FOREIGN KEY (`mon_id`) REFERENCES `p_monitoring` (`mon_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_monitoring_fix_ibfk_2` FOREIGN KEY (`t_network_id`) REFERENCES `t_network` (`t_network_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `t_network_order_ibfk_2` FOREIGN KEY (`t_detail_network_order_id`) REFERENCES `t_detail_network_order` (`t_detail_network_order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_network_order_ibfk_3` FOREIGN KEY (`provider_id`) REFERENCES `provider` (`provider_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
