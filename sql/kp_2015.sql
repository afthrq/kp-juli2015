-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2015 at 04:34 PM
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
('1bc46d84c8990febfd9239aec6a94298', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436366049, 'a:4:{s:9:"user_data";s:0:"";s:9:"user_name";s:7:"inputor";s:12:"is_logged_in";b:1;s:4:"role";s:7:"inputor";}');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `desc` varchar(300) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `name`, `desc`) VALUES
(1, 'Pertamina (Persero)', ''),
(2, 'PDSI', ''),
(3, 'PGE', '');

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE IF NOT EXISTS `provider` (
  `provider_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `desc` varchar(300) NOT NULL,
  PRIMARY KEY (`provider_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`provider_id`, `name`, `desc`) VALUES
(1, 'Telkom', ''),
(2, 'Patrakom', '');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE IF NOT EXISTS `provinsi` (
  `provinsi_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`provinsi_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`provinsi_id`, `name`) VALUES
(62, 'Jawa Barat');

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
(6, 'Lain-Lain', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_lastmile`
--

CREATE TABLE IF NOT EXISTS `p_lastmile` (
  `p_lastmile_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `desc` varchar(300) NOT NULL,
  PRIMARY KEY (`p_lastmile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
(1, 0, 1, NULL, 'Paket 1'),
(2, 0, 1, NULL, 'Paket 2'),
(3, 0, 1, NULL, 'Paket 3'),
(4, 0, 1, NULL, 'Paket 4'),
(5, 0, 1, NULL, 'Paket 5'),
(6, 0, 1, NULL, 'Paket 6'),
(7, 0, 1, NULL, 'Vicon'),
(8, 0, 2, NULL, 'PTP'),
(9, 0, 2, NULL, 'PTMP'),
(10, 0, 2, NULL, 'MPTMP'),
(11, 0, 4, NULL, '1:2'),
(12, 0, 4, NULL, '1:4'),
(13, 0, 3, NULL, '(default)'),
(14, 0, 5, NULL, '(default)'),
(15, 0, 6, NULL, '(default)'),
(16, 0, 7, NULL, '(default)'),
(17, 0, 8, NULL, '(default)');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `p_order_type`
--

INSERT INTO `p_order_type` (`p_order_type_id`, `name`, `desc`, `delivery_time`) VALUES
(1, 'Upgrade', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_process`
--

CREATE TABLE IF NOT EXISTS `p_process` (
  `p_process_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `desc` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`p_process_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `p_region`
--

CREATE TABLE IF NOT EXISTS `p_region` (
  `p_region_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `desc` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`p_region_id`),
  KEY `comp_id` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `p_region`
--

INSERT INTO `p_region` (`p_region_id`, `company_id`, `name`, `desc`) VALUES
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
(2, 'verifikator', ''),
(3, 'pm', ''),
(4, 'engineer', ''),
(5, 'tester', '');

-- --------------------------------------------------------

--
-- Table structure for table `p_service`
--

CREATE TABLE IF NOT EXISTS `p_service` (
  `p_service_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `desc` varchar(300) NOT NULL,
  PRIMARY KEY (`p_service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_service`
--

INSERT INTO `p_service` (`p_service_id`, `name`, `desc`) VALUES
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `p_site_type`
--

INSERT INTO `p_site_type` (`p_site_type_id`, `type_name`, `desc`) VALUES
(1, 'Kantor Pusat', ''),
(2, 'Kantor Region', ''),
(3, 'Cabang', ''),
(4, 'TBBM', ''),
(5, 'TT', ''),
(6, 'Instalasi', ''),
(7, 'TLPG', ''),
(8, 'DPPU', ''),
(9, 'Rig', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_detail_network_order`
--

CREATE TABLE IF NOT EXISTS `t_detail_network_order` (
  `t_detail_network_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_network_order_id` int(11) NOT NULL,
  `p_order_type_id` int(11) NOT NULL,
  `no_form_permintaan` varchar(50) DEFAULT NULL,
  `tgl_permintaan` date DEFAULT NULL,
  `tiket_order_provider` varchar(20) DEFAULT NULL,
  `no_balo_provider` varchar(50) DEFAULT NULL,
  `no_balo_pertamina` varchar(50) DEFAULT NULL,
  `tgl_tagih` date DEFAULT NULL,
  `pic_provider` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`t_detail_network_order_id`),
  KEY `t_network_order_id` (`t_network_order_id`,`p_order_type_id`),
  KEY `p_order_type_id` (`p_order_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_network`
--

CREATE TABLE IF NOT EXISTS `t_network` (
  `t_network_id` int(11) NOT NULL,
  `p_lastmile_id` int(11) NOT NULL,
  `t_nw_site_id` int(11) NOT NULL,
  `p_nw_service_id` int(11) NOT NULL,
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
  `mon_sms` tinyint(1) DEFAULT NULL,
  `mon_log` int(11) DEFAULT NULL,
  PRIMARY KEY (`t_network_id`),
  KEY `p_lastmile_id` (`p_lastmile_id`),
  KEY `t_nw_site_id` (`t_nw_site_id`),
  KEY `p_nw_service_id` (`p_nw_service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_network_order`
--

CREATE TABLE IF NOT EXISTS `t_network_order` (
  `t_network_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_detail_network_order_id` int(11) NOT NULL,
  `t_nw_site_id` int(11) NOT NULL,
  `p_lastmile_id` int(11) NOT NULL,
  `p_nw_service_id` int(11) NOT NULL,
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
  `mon_sms` tinyint(1) DEFAULT NULL,
  `mon_log` int(11) DEFAULT NULL,
  PRIMARY KEY (`t_network_order_id`),
  KEY `p_lastmile_id` (`p_lastmile_id`),
  KEY `t_detail_network_order_id` (`t_detail_network_order_id`),
  KEY `t_nw_site_id` (`t_nw_site_id`),
  KEY `p_nw_service_id` (`p_nw_service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `t_network_order`
--

INSERT INTO `t_network_order` (`t_network_order_id`, `t_detail_network_order_id`, `t_nw_site_id`, `p_lastmile_id`, `p_nw_service_id`, `no_jar`, `ip_wan`, `ip_lan`, `ip_loop`, `asn`, `bw`, `netmask_wan`, `netmask_lan`, `hostname`, `sla`, `valid_fr`, `valid_to`, `mon_cacti`, `mon_npmd`, `mon_sms`, `mon_log`) VALUES
(26, 0, 24, 0, 8, NULL, NULL, NULL, NULL, NULL, 1024, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_nw_service`
--

CREATE TABLE IF NOT EXISTS `t_nw_service` (
  `p_nw_service_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_network_id` int(11) NOT NULL,
  `t_network_order_id` int(11) NOT NULL,
  KEY `network_id` (`t_network_id`),
  KEY `p_nw_service_id` (`p_nw_service_id`),
  KEY `t_network_order_id` (`t_network_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_nw_site`
--

CREATE TABLE IF NOT EXISTS `t_nw_site` (
  `t_nw_site_id` int(11) NOT NULL AUTO_INCREMENT,
  `provinsi_id` int(11) NOT NULL,
  `p_site_type_id` int(11) NOT NULL,
  `p_region_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `t_nw_site`
--

INSERT INTO `t_nw_site` (`t_nw_site_id`, `provinsi_id`, `p_site_type_id`, `p_region_id`, `name`, `desc`, `is_critical`, `longitude`, `latitude`, `address`, `traffic_mgmt`) VALUES
(24, 62, 2, 21, 'Bandung', '', 0, '', '', 'Jawa Barat', '');

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

-- --------------------------------------------------------

--
-- Table structure for table `t_pic`
--

CREATE TABLE IF NOT EXISTS `t_pic` (
  `t_pic_id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `phone2` varchar(15) NOT NULL,
  PRIMARY KEY (`t_pic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `t_pic`
--

INSERT INTO `t_pic` (`t_pic_id`, `nip`, `name`, `phone`, `phone2`) VALUES
(22, '', 'Ashari', '', ''),
(23, '', 'Jakarta', '', ''),
(24, '', 'Pak Riyan', '', ''),
(25, '', 'Pak Riyan', '', ''),
(26, '', 'Pak Husen', '', ''),
(27, '', 'Pak Husen', '', ''),
(28, '', 'Pak Husen', '', ''),
(29, '', 'Pak Husen', '', ''),
(30, '', 'Pak Husen', '', ''),
(31, '', 'Pak Husen', '', ''),
(32, '', 'Pak Husen', '', ''),
(33, '', 'Pak Husen', '', ''),
(34, '', 'Pak Husen', '', ''),
(35, '', 'Pak Husen', '', ''),
(36, '', 'Pak Husen', '', ''),
(37, '', 'Pak Husen', '', ''),
(38, '', 'Pak Husen', '', ''),
(39, '', 'Pak Husen', '', ''),
(40, '', 'Pak Husen', '', ''),
(41, '', 'Pak Husen', '', ''),
(42, '', 'Pak Husen', '', ''),
(43, '', 'Pak Husen', '', ''),
(44, '', 'Pak Husen', '', ''),
(45, '', 'Pak Husen', '', ''),
(46, '', 'Pak Husen', '', '');

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
  `keterangan` varchar(300) DEFAULT NULL,
  `closed_by` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`t_work_id`),
  KEY `p_process_id` (`p_process_id`,`t_detail_network_order_id`),
  KEY `t_detail_network_order_id` (`t_detail_network_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
(2, 'verifikator', '2ea2aa47b5cbf1f95b9dd18c1bf8dd4c'),
(3, 'pm', '5109d85d95fece7816d9704e6e5b1279'),
(4, 'engineer', '9d127ff383d595262c67036f50493133'),
(5, 'tester', 'f5d1278e8109edd94e1e4197e04873b9');

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
  `p_role_id` int(11) NOT NULL,
  `p_order_type_id` int(11) NOT NULL,
  `process_id` varchar(10) NOT NULL,
  `next_process_id` varchar(10) NOT NULL,
  KEY `p_role_id` (`p_role_id`,`p_order_type_id`),
  KEY `p_order_type_id` (`p_order_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `p_nw_service`
--
ALTER TABLE `p_nw_service`
  ADD CONSTRAINT `p_nw_service_ibfk_1` FOREIGN KEY (`p_service_id`) REFERENCES `p_service` (`p_service_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `t_document_ibfk_1` FOREIGN KEY (`t_work_id`) REFERENCES `t_process` (`t_work_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_document_ibfk_2` FOREIGN KEY (`p_doc_type_id`) REFERENCES `p_doc_type` (`p_doc_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_network`
--
ALTER TABLE `t_network`
  ADD CONSTRAINT `t_network_ibfk_1` FOREIGN KEY (`p_lastmile_id`) REFERENCES `p_lastmile` (`p_lastmile_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_network_ibfk_2` FOREIGN KEY (`t_nw_site_id`) REFERENCES `t_nw_site` (`t_nw_site_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_network_ibfk_3` FOREIGN KEY (`p_nw_service_id`) REFERENCES `p_nw_service` (`p_nw_service_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_network_order`
--
ALTER TABLE `t_network_order`
  ADD CONSTRAINT `t_network_order_ibfk_1` FOREIGN KEY (`t_nw_site_id`) REFERENCES `t_nw_site` (`t_nw_site_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_network_order_ibfk_2` FOREIGN KEY (`p_nw_service_id`) REFERENCES `p_nw_service` (`p_nw_service_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `t_process_ibfk_1` FOREIGN KEY (`p_process_id`) REFERENCES `p_process` (`p_process_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `workflow_ibfk_2` FOREIGN KEY (`p_role_id`) REFERENCES `p_role` (`p_role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
