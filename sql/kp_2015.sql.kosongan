-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2015 at 04:11 AM
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
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `company_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `desc` varchar(300) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE IF NOT EXISTS `provider` (
  `provider_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `desc` varchar(300) NOT NULL,
  PRIMARY KEY (`provider_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE IF NOT EXISTS `provinsi` (
  `provinsi_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`provinsi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `p_lastmile`
--

CREATE TABLE IF NOT EXISTS `p_lastmile` (
  `p_lastmile_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `desc` varchar(300) NOT NULL,
  PRIMARY KEY (`p_lastmile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `p_nw_service`
--

CREATE TABLE IF NOT EXISTS `p_nw_service` (
  `p_nw_service_id` int(11) NOT NULL,
  `p_serv_type_id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `desc` varchar(300) DEFAULT NULL,
  `package` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`p_nw_service_id`),
  KEY `p_serv_type_id` (`p_serv_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `p_order_type`
--

CREATE TABLE IF NOT EXISTS `p_order_type` (
  `p_order_type_id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `desc` varchar(300) DEFAULT NULL,
  `delivery_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`p_order_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `p_process`
--

CREATE TABLE IF NOT EXISTS `p_process` (
  `p_process_id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `desc` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`p_process_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `p_region`
--

CREATE TABLE IF NOT EXISTS `p_region` (
  `p_region_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `desc` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`p_region_id`),
  KEY `comp_id` (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `p_site_type`
--

CREATE TABLE IF NOT EXISTS `p_site_type` (
  `p_site_type_id` int(11) NOT NULL,
  `type_name` varchar(5) NOT NULL,
  `desc` varchar(300) NOT NULL,
  PRIMARY KEY (`p_site_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `t_document_id` int(11) NOT NULL,
  `t_work_id` int(11) NOT NULL,
  `tipe_dok` int(11) DEFAULT NULL,
  `path` varchar(64) DEFAULT NULL,
  `caption` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`t_document_id`),
  KEY `t_work_id` (`t_work_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_network`
--

CREATE TABLE IF NOT EXISTS `t_network` (
  `t_network_id` int(11) NOT NULL,
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
  `mon_sms` tinyint(1) DEFAULT NULL,
  `mon_log` int(11) DEFAULT NULL,
  PRIMARY KEY (`t_network_id`),
  KEY `p_lastmile_id` (`p_lastmile_id`),
  KEY `t_nw_site_id` (`t_nw_site_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_network_order`
--

CREATE TABLE IF NOT EXISTS `t_network_order` (
  `t_network_order_id` int(11) NOT NULL,
  `t_detail_network_order_id` int(11) NOT NULL,
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
  `mon_sms` tinyint(1) DEFAULT NULL,
  `mon_log` int(11) DEFAULT NULL,
  PRIMARY KEY (`t_network_order_id`),
  KEY `p_lastmile_id` (`p_lastmile_id`),
  KEY `t_detail_network_order_id` (`t_detail_network_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_nw_service`
--

CREATE TABLE IF NOT EXISTS `t_nw_service` (
  `p_nw_service_id` int(11) NOT NULL,
  `network_id` int(11) NOT NULL,
  `t_network_order_id` int(11) NOT NULL,
  KEY `network_id` (`network_id`),
  KEY `p_nw_service_id` (`p_nw_service_id`),
  KEY `t_network_order_id` (`t_network_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_nw_site`
--

CREATE TABLE IF NOT EXISTS `t_nw_site` (
  `t_nw_site_id` int(11) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `t_pic_id` int(11) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `phone2` varchar(15) NOT NULL,
  PRIMARY KEY (`t_pic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `t_work_id` int(11) NOT NULL,
  `p_process_id` int(11) NOT NULL,
  `t_detail_network_order_id` int(11) NOT NULL,
  `valid_fr` date DEFAULT NULL,
  `valid_to` date DEFAULT NULL,
  `keterangan` varchar(300) DEFAULT NULL,
  `closed_by` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`t_work_id`),
  KEY `p_process_id` (`p_process_id`,`t_detail_network_order_id`),
  KEY `t_detail_network_order_id` (`t_detail_network_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(16) DEFAULT NULL,
  `password` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD CONSTRAINT `p_nw_service_ibfk_1` FOREIGN KEY (`p_serv_type_id`) REFERENCES `p_service_type` (`p_serv_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p_region`
--
ALTER TABLE `p_region`
  ADD CONSTRAINT `p_region_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_detail_network_order`
--
ALTER TABLE `t_detail_network_order`
  ADD CONSTRAINT `t_detail_network_order_ibfk_2` FOREIGN KEY (`t_network_order_id`) REFERENCES `t_network_order` (`t_network_order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_detail_network_order_ibfk_1` FOREIGN KEY (`p_order_type_id`) REFERENCES `p_order_type` (`p_order_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_document`
--
ALTER TABLE `t_document`
  ADD CONSTRAINT `t_document_ibfk_1` FOREIGN KEY (`t_work_id`) REFERENCES `t_process` (`t_work_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_network`
--
ALTER TABLE `t_network`
  ADD CONSTRAINT `t_network_ibfk_2` FOREIGN KEY (`p_lastmile_id`) REFERENCES `p_lastmile` (`p_lastmile_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_network_ibfk_3` FOREIGN KEY (`t_nw_site_id`) REFERENCES `t_nw_site` (`t_nw_site_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_network_order`
--
ALTER TABLE `t_network_order`
  ADD CONSTRAINT `t_network_order_ibfk_1` FOREIGN KEY (`t_detail_network_order_id`) REFERENCES `t_detail_network_order` (`t_detail_network_order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_network_order_ibfk_2` FOREIGN KEY (`p_lastmile_id`) REFERENCES `p_lastmile` (`p_lastmile_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_nw_service`
--
ALTER TABLE `t_nw_service`
  ADD CONSTRAINT `t_nw_service_ibfk_3` FOREIGN KEY (`t_network_order_id`) REFERENCES `t_network_order` (`t_network_order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_nw_service_ibfk_1` FOREIGN KEY (`network_id`) REFERENCES `t_network` (`t_network_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_nw_service_ibfk_2` FOREIGN KEY (`p_nw_service_id`) REFERENCES `p_nw_service` (`p_nw_service_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `t_process_ibfk_2` FOREIGN KEY (`t_detail_network_order_id`) REFERENCES `t_detail_network_order` (`t_detail_network_order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_process_ibfk_1` FOREIGN KEY (`p_process_id`) REFERENCES `p_process` (`p_process_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`p_role_id`) REFERENCES `p_role` (`p_role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `workflow`
--
ALTER TABLE `workflow`
  ADD CONSTRAINT `workflow_ibfk_2` FOREIGN KEY (`p_order_type_id`) REFERENCES `p_order_type` (`p_order_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `workflow_ibfk_1` FOREIGN KEY (`p_role_id`) REFERENCES `p_role` (`p_role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
