-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2015 at 11:56 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rdforge`
--

-- --------------------------------------------------------

--
-- Table structure for table `cutting_item_des`
--

CREATE TABLE IF NOT EXISTS `cutting_item_des` (
  `cutting_id` int(10) NOT NULL,
  `item_des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cutting_item_des`
--

INSERT INTO `cutting_item_des` (`cutting_id`, `item_des`) VALUES
(3, 'its good'),
(13, 'its good'),
(14, 'its good'),
(17, 'its good'),
(18, 'its good'),
(24, ''),
(25, ''),
(26, ''),
(27, '');

-- --------------------------------------------------------

--
-- Table structure for table `cutting_records`
--

CREATE TABLE IF NOT EXISTS `cutting_records` (
  `cutting_id` int(7) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `raw_mat_size` varchar(25) NOT NULL,
  `heat_no` varchar(25) NOT NULL,
  `quantity` int(10) NOT NULL,
  `weight_per_piece` int(10) NOT NULL,
  `total_weight` int(10) NOT NULL,
  PRIMARY KEY (`cutting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `cutting_records`
--

INSERT INTO `cutting_records` (`cutting_id`, `date`, `raw_mat_size`, `heat_no`, `quantity`, `weight_per_piece`, `total_weight`) VALUES
(3, '2015-10-21', '12456', '123', 100, 15, 1500),
(13, '2015-10-21', '12456', '123', 100, 15, 1500),
(14, '2015-10-21', '12456', '123', 100, 15, 1500),
(17, '2015-10-21', '12456', '123', 100, 15, 1500),
(18, '2015-10-21', '12456', '123', 100, 15, 1500),
(24, '2015-10-21', '', '', 0, 0, 0),
(25, '2015-10-21', '', '', 0, 0, 0),
(26, '2015-10-25', '4 by 5', '124589', 16, 15, 240),
(27, '2015-10-25', '10 by 16', '124589', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cutting_remarks`
--

CREATE TABLE IF NOT EXISTS `cutting_remarks` (
  `cutting_id` int(11) NOT NULL AUTO_INCREMENT,
  `remarks` text NOT NULL,
  PRIMARY KEY (`cutting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `cutting_remarks`
--

INSERT INTO `cutting_remarks` (`cutting_id`, `remarks`) VALUES
(3, 'its very good'),
(13, 'its very good'),
(14, 'its very good'),
(17, 'its very good'),
(24, ''),
(25, ''),
(26, ''),
(27, '');

-- --------------------------------------------------------

--
-- Table structure for table `drilling_records`
--

CREATE TABLE IF NOT EXISTS `drilling_records` (
  `drilling_id` int(10) NOT NULL AUTO_INCREMENT,
  `work_order_no` int(10) NOT NULL,
  `date` date NOT NULL,
  `item` varchar(25) NOT NULL,
  `heat_no` varchar(25) NOT NULL,
  `quantity` varchar(25) NOT NULL,
  `machine_name` varchar(25) NOT NULL,
  `employee_name` varchar(25) NOT NULL,
  `grade` varchar(10) NOT NULL,
  PRIMARY KEY (`drilling_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `drilling_records`
--

INSERT INTO `drilling_records` (`drilling_id`, `work_order_no`, `date`, `item`, `heat_no`, `quantity`, `machine_name`, `employee_name`, `grade`) VALUES
(1, 12, '2015-10-15', '', '', '', '', '', ''),
(2, 124, '2015-10-15', '', '', '', '', '', ''),
(3, 123456, '2015-10-15', '100', '123', '100', '', 'gaurav', 'A'),
(4, 12345, '2015-10-15', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `drilling_remarks`
--

CREATE TABLE IF NOT EXISTS `drilling_remarks` (
  `drilling_id` int(10) NOT NULL,
  `remarks` text NOT NULL,
  PRIMARY KEY (`drilling_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forging_records`
--

CREATE TABLE IF NOT EXISTS `forging_records` (
  `forging_id` int(7) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `forged_des` varchar(30) NOT NULL,
  `weight_per_piece` int(10) NOT NULL,
  `heat_no` varchar(25) NOT NULL,
  `quantity` int(10) NOT NULL,
  `total_weight` int(10) NOT NULL,
  PRIMARY KEY (`forging_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `forging_records`
--

INSERT INTO `forging_records` (`forging_id`, `date`, `forged_des`, `weight_per_piece`, `heat_no`, `quantity`, `total_weight`) VALUES
(1, '2015-10-06', '100', 100, '100', 100, 10000),
(2, '2015-10-06', 'gcskaj', 1, '1', 1, 1),
(3, '2015-10-06', 'shlbjk', 11, '1', 1, 11),
(4, '2015-10-06', 'bcsl', 1, '1', 1, 1),
(5, '2015-10-06', 'gdahlk', 100, '100', 100, 10000),
(6, '2015-10-06', '100', 0, '', 0, 0),
(7, '2015-10-06', '100', 0, '', 0, 0),
(8, '2015-10-06', '100', 0, '', 0, 0),
(9, '2015-10-07', 'dslhsdlkj', 5353, '', 0, 0),
(10, '2015-10-08', '', 0, '', 0, 0),
(11, '2015-10-12', '', 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `forging_remarks`
--

CREATE TABLE IF NOT EXISTS `forging_remarks` (
  `forging_id` int(11) NOT NULL AUTO_INCREMENT,
  `remarks` text NOT NULL,
  PRIMARY KEY (`forging_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `forging_remarks`
--

INSERT INTO `forging_remarks` (`forging_id`, `remarks`) VALUES
(4, 'sanakm;a'),
(5, ''),
(6, ''),
(7, ''),
(8, ''),
(10, ''),
(11, '');

-- --------------------------------------------------------

--
-- Table structure for table `inspection_details`
--

CREATE TABLE IF NOT EXISTS `inspection_details` (
  `work_order_no` int(10) NOT NULL,
  `inspection` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

CREATE TABLE IF NOT EXISTS `logbook` (
  `log_id` int(8) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `category` varchar(15) NOT NULL,
  `details` text NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `logbook`
--

INSERT INTO `logbook` (`log_id`, `date`, `time`, `category`, `details`) VALUES
(1, '2015-10-07', '838:59:59', 'Raw Material', 'Manufacturer: gaurav  Heat no: 135358  Material Grade: Grade 1 Material Type: Type 1 Size: 100'),
(2, '2015-10-07', '07:29:26', 'cutting', 'Heat no: 4353 Quantity: 100 Weight per piece: 6335 Total 633500'),
(3, '2015-10-07', '07:33:59', 'Forging', 'Forging Description: dslhsdlkj Heat no  Weight per piece 5353 Quantity :  Total Weight 0'),
(4, '2015-10-07', '01:32:52', 'Raw Material', 'Manufacturer: gaurav  Heat no: 6533  Material Grade: Grade 1 Material Type: Type 1 Size: 100'),
(5, '2015-10-08', '05:43:37', 'Forging', 'Forging Description:  Heat no  Weight per piece  Quantity :  Total Weight 0'),
(6, '2015-10-12', '09:13:31', 'Forging', 'Forging Description:  Heat no  Weight per piece  Quantity :  Total Weight 0'),
(7, '2015-10-12', '04:08:20', 'Raw Material', 'Manufacturer: Gaurav  Heat no: 123  Material Grade: Grade 1 Material Type: Type 1 Size: 100'),
(8, '2015-10-12', '04:14:47', 'Raw Material', 'Manufacturer:   Heat no:   Material Grade: Grade 1 Material Type: Type 1 Size: '),
(9, '2015-10-12', '04:15:18', 'Raw Material', 'Manufacturer:   Heat no:   Material Grade: Grade 1 Material Type: Type 1 Size: '),
(10, '2015-10-12', '04:15:45', 'Raw Material', 'Manufacturer:   Heat no:   Material Grade: Grade 1 Material Type: Type 1 Size: '),
(11, '2015-10-12', '04:16:13', 'Raw Material', 'Manufacturer:   Heat no:   Material Grade: Grade 1 Material Type: Type 1 Size: '),
(12, '2015-10-12', '04:17:17', 'Raw Material', 'Manufacturer:   Heat no:   Material Grade: Grade 1 Material Type: Type 1 Size: '),
(13, '2015-10-12', '08:43:06', 'Raw Material', 'Manufacturer: gaurav  Heat no: 123  Material Grade: Grade 1 Material Type: Type 1 Size: 100'),
(14, '2015-10-12', '08:44:10', 'Raw Material', 'Manufacturer:   Heat no:   Material Grade: Grade 1 Material Type: Type 1 Size: '),
(15, '2015-10-14', '05:57:41', 'Raw Material', 'Manufacturer:   Heat no:   Material Grade: Grade 1 Material Type: Type 1 Size: '),
(16, '2015-10-14', '06:17:48', 'Raw Material', 'Manufacturer: gaurav arora  Heat no: 100  Material Grade: Grade 1 Material Type: Type 1 Size: 100'),
(17, '2015-10-14', '07:15:54', 'Cutting', 'Heat no: 4653 Quantity: 100 Weight per piece: 100 Total 10000'),
(18, '2015-10-16', '09:39:35', 'Raw Material', 'Manufacturer:   Heat no:   Material Grade: Grade 1 Material Type: Type 1 Size: '),
(19, '2015-10-16', '09:40:20', 'Raw Material', 'Manufacturer:   Heat no:   Material Grade: Grade 1 Material Type: Type 1 Size: '),
(20, '2015-10-16', '09:48:42', 'Raw Material', 'Manufacturer:   Heat no:   Material Grade: Grade 1 Material Type: Type 1 Size: '),
(21, '2015-10-16', '09:49:26', 'Raw Material', 'Manufacturer:   Heat no:   Material Grade: Grade 1 Material Type: Type 1 Size: '),
(22, '2015-10-16', '09:51:29', 'Raw Material', 'Manufacturer:   Heat no:   Material Grade: Grade 1 Material Type: Type 1 Size: '),
(23, '2015-10-16', '09:53:57', 'Raw Material', 'Manufacturer:   Heat no:   Material Grade: Grade 1 Material Type: Type 1 Size: '),
(24, '2015-10-17', '08:01:09', 'Raw Material', 'Manufacturer: arora developers  Heat no: 4335  Material Grade: Grade 1 Material Type: Type 1 Size: 100'),
(25, '2015-10-17', '08:02:19', 'Raw Material', 'Manufacturer: arora developers  Heat no: 4335  Material Grade: Grade 1 Material Type: Type 1 Size: 100'),
(26, '2015-10-17', '09:23:36', 'Raw Material', 'Manufacturer:   Heat no:   Material Grade: Grade 1 Material Type: Type 1 Size: '),
(27, '2015-10-17', '09:27:58', 'Raw Material', 'Manufacturer:   Heat no:   Material Grade: Grade 1 Material Type: Type 1 Size: '),
(28, '2015-10-17', '09:28:05', 'Raw Material', 'Manufacturer:   Heat no:   Material Grade: Grade 1 Material Type: Type 1 Size: '),
(29, '2015-10-17', '09:28:26', 'Raw Material', 'Manufacturer:   Heat no:   Material Grade: Grade 1 Material Type: Type 1 Size: '),
(30, '2015-10-17', '09:28:57', 'Raw Material', 'Manufacturer:   Heat no:   Material Grade: Grade 1 Material Type: Type 1 Size: '),
(31, '2015-10-17', '09:29:17', 'Raw Material', 'Manufacturer:   Heat no:   Material Grade: Grade 1 Material Type: Type 1 Size: '),
(32, '2015-10-17', '09:30:33', 'Raw Material', 'Manufacturer:   Heat no:   Material Grade: Grade 1 Material Type: Type 1 Size: '),
(33, '2015-10-17', '09:31:27', 'Raw Material', 'Manufacturer:   Heat no:   Material Grade: Grade 1 Material Type: Type 1 Size: '),
(34, '2015-10-17', '09:35:10', 'Raw Material', 'Manufacturer:   Heat no:   Material Grade: Grade 1 Material Type: Type 1 Size: '),
(35, '2015-10-17', '09:38:10', 'Raw Material', 'Manufacturer:   Heat no:   Material Grade: Grade 1 Material Type: Type 1 Size: '),
(36, '2015-10-17', '09:39:15', 'Raw Material', 'Manufacturer: gaurav developers  Heat no: 12345  Material Grade: Grade 1 Material Type: Type 1 Size: 100 kg'),
(37, '2015-10-21', '11:07:37', 'Cutting', 'Heat no: 123 Quantity: 100 Weight per piece: 15 Total 1500'),
(38, '2015-10-21', '11:08:32', 'Cutting', 'Heat no: 123 Quantity: 100 Weight per piece: 15 Total 1500'),
(39, '2015-10-21', '11:09:54', 'Cutting', 'Heat no: 123 Quantity: 100 Weight per piece: 15 Total 1500'),
(40, '2015-10-21', '11:11:09', 'Cutting', 'Heat no: 123 Quantity: 100 Weight per piece: 15 Total 1500'),
(41, '2015-10-21', '11:11:59', 'Cutting', 'Heat no: 123 Quantity: 100 Weight per piece: 15 Total 1500'),
(42, '2015-10-21', '11:12:52', 'Cutting', 'Heat no: 123 Quantity: 100 Weight per piece: 15 Total 1500'),
(43, '2015-10-21', '11:13:30', 'Cutting', 'Heat no: 123 Quantity: 100 Weight per piece: 15 Total 1500'),
(44, '2015-10-21', '11:14:04', 'Cutting', 'Heat no: 123 Quantity: 100 Weight per piece: 15 Total 1500'),
(45, '2015-10-21', '11:14:18', 'Cutting', 'Heat no: 123 Quantity: 100 Weight per piece: 15 Total 1500'),
(46, '2015-10-21', '11:14:42', 'Cutting', 'Heat no: 123 Quantity: 100 Weight per piece: 15 Total 1500'),
(47, '2015-10-21', '11:16:45', 'Cutting', 'Heat no: 123 Quantity: 100 Weight per piece: 15 Total 1500'),
(48, '2015-10-21', '11:17:34', 'Cutting', 'Heat no: 123 Quantity: 100 Weight per piece: 15 Total 1500'),
(49, '2015-10-21', '11:18:22', 'Cutting', 'Heat no: 123 Quantity: 100 Weight per piece: 15 Total 1500'),
(50, '2015-10-21', '11:24:15', 'Cutting', 'Heat no: 123 Quantity: 100 Weight per piece: 15 Total 1500'),
(51, '2015-10-21', '11:27:13', 'Cutting', 'Heat no: 123 Quantity: 100 Weight per piece: 15 Total 1500'),
(52, '2015-10-21', '11:27:43', 'Cutting', 'Heat no: 123 Quantity: 100 Weight per piece: 15 Total 1500'),
(53, '2015-10-21', '11:28:28', 'Cutting', 'Heat no: 123 Quantity: 100 Weight per piece: 15 Total 1500'),
(54, '2015-10-21', '11:29:01', 'Cutting', 'Heat no: 123 Quantity: 100 Weight per piece: 15 Total 1500'),
(55, '2015-10-21', '11:29:44', 'Cutting', 'Heat no: 123 Quantity: 100 Weight per piece: 15 Total 1500'),
(56, '2015-10-21', '11:30:53', 'Cutting', 'Heat no: 123 Quantity: 100 Weight per piece: 15 Total 1500'),
(57, '2015-10-21', '11:31:36', 'Cutting', 'Heat no: 123 Quantity: 100 Weight per piece: 15 Total 1500'),
(58, '2015-10-21', '11:33:43', 'Cutting', 'Heat no:  Quantity:  Weight per piece:  Total 0'),
(59, '2015-10-21', '11:34:19', 'Cutting', 'Heat no:  Quantity:  Weight per piece:  Total 0'),
(60, '2015-10-21', '11:34:41', 'Cutting', 'Heat no:  Quantity:  Weight per piece:  Total 0'),
(61, '2015-10-21', '11:35:02', 'Cutting', 'Heat no:  Quantity:  Weight per piece:  Total 0'),
(62, '2015-10-21', '12:03:01', 'Cutting', 'Heat no:  Quantity:  Weight per piece:  Total 0'),
(63, '2015-10-21', '04:40:56', 'Raw Material', 'Manufacturer:   Heat no:   Material Grade: Grade 1 Material Type: Type 1 Size: '),
(64, '2015-10-21', '05:01:36', 'Raw Material', 'Manufacturer:   Heat no:   Material Grade: Grade 1 Material Type: Type 1 Size: '),
(65, '2015-10-23', '08:46:44', 'Raw Material', 'Manufacturer: adf  Heat no: 125  Material Grade: Grade 1 Material Type: Type 1 Size: 100'),
(66, '2015-10-23', '08:57:41', 'Raw Material', 'Manufacturer:   Heat no:   Material Grade: Grade 1 Material Type: Type 1 Size: '),
(67, '2015-10-23', '09:55:09', 'Raw Material', 'Manufacturer:   Heat no:   Material Grade: Grade 1 Material Type: Type 1 Size: '),
(68, '2015-10-25', '07:41:05', 'Raw Material', 'Manufacturer: gaurav arora  Heat no: 123456  Material Grade: SA 266 GR-4 Material Type: Type 4 Size: 10 by 16'),
(69, '2015-10-25', '07:42:20', 'Raw Material', 'Manufacturer: gaurav arora  Heat no: 123456  Material Grade: SA 266 GR-4 Material Type: Type 4 Size: 10 by 16'),
(70, '2015-10-25', '07:42:44', 'Raw Material', 'Manufacturer: gaurav arora  Heat no: 123456  Material Grade: SA 266 GR-4 Material Type: Type 4 Size: 10 by 16'),
(71, '2015-10-25', '07:45:23', 'Raw Material', 'Manufacturer:   Heat no:   Material Grade: SA 105 Material Type: Bloom Size: 4 by 5'),
(72, '2015-10-25', '07:46:05', 'Raw Material', 'Manufacturer:   Heat no:   Material Grade: SA 105 Material Type: Round Size: 4 by 5'),
(73, '2015-10-25', '07:48:04', 'Raw Material', 'Manufacturer:   Heat no:   Material Grade: SA 105 Material Type: Ingot Size: 4 by 5'),
(74, '2015-10-25', '07:48:48', 'Raw Material', 'Manufacturer:   Heat no:   Material Grade: SA 105 Material Type: Ingot Size: 4 by 5'),
(75, '2015-10-25', '08:07:05', 'Raw Material', 'Manufacturer:   Heat no:   Material Grade: SA 105 Material Type: Ingot Size: 4 by 5'),
(76, '2015-10-25', '08:07:36', 'Raw Material', 'Manufacturer:   Heat no:   Material Grade: SA 105 Material Type: Ingot Size: 4 by 5'),
(77, '2015-10-25', '08:12:22', 'Raw Material', 'Manufacturer:   Heat no: 123  Material Grade: SA 105 Material Type: Ingot Size: 4 by 5'),
(78, '2015-10-25', '08:59:24', 'Raw Material', 'Manufacturer: gaurav  Heat no: 124589  Material Grade: SA 266 GR-2 Material Type: Round Size: 4 by 5');

-- --------------------------------------------------------

--
-- Table structure for table `machining_records`
--

CREATE TABLE IF NOT EXISTS `machining_records` (
  `mach_id` int(7) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `work_order_no` varchar(25) NOT NULL,
  `item` varchar(25) NOT NULL,
  `heat_no` varchar(25) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `machine_name` varchar(25) NOT NULL,
  `employee_name` varchar(25) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `weight` int(10) NOT NULL,
  PRIMARY KEY (`mach_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `machining_records`
--

INSERT INTO `machining_records` (`mach_id`, `date`, `work_order_no`, `item`, `heat_no`, `quantity`, `machine_name`, `employee_name`, `grade`, `weight`) VALUES
(1, '2015-10-15', '123', '', '', 0, '', '', '', 0),
(2, '2015-10-15', '1245678', 'good', '123', 100, '', 'gaurav', '10', 100),
(3, '2015-10-15', '123456', '', '', 0, '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mach_remarks`
--

CREATE TABLE IF NOT EXISTS `mach_remarks` (
  `mach_id` int(10) NOT NULL,
  `remarks` text NOT NULL,
  PRIMARY KEY (`mach_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mach_remarks`
--

INSERT INTO `mach_remarks` (`mach_id`, `remarks`) VALUES
(2, ''),
(3, '');

-- --------------------------------------------------------

--
-- Table structure for table `master_grades`
--

CREATE TABLE IF NOT EXISTS `master_grades` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `grade_name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `master_grades`
--

INSERT INTO `master_grades` (`id`, `grade_name`) VALUES
(3, 'SA 105'),
(4, 'SA 266 GR-2'),
(5, 'SA 266 GR-4');

-- --------------------------------------------------------

--
-- Table structure for table `master_manufacturers`
--

CREATE TABLE IF NOT EXISTS `master_manufacturers` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `manufacturer_name` varchar(25) NOT NULL,
  `item` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `master_manufacturers`
--

INSERT INTO `master_manufacturers` (`id`, `manufacturer_name`, `item`) VALUES
(9, 'india', 'Ingot');

-- --------------------------------------------------------

--
-- Table structure for table `master_pressure`
--

CREATE TABLE IF NOT EXISTS `master_pressure` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `pressure` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `master_pressure`
--

INSERT INTO `master_pressure` (`id`, `pressure`) VALUES
(5, '200pa'),
(6, '600pa');

-- --------------------------------------------------------

--
-- Table structure for table `master_sizes`
--

CREATE TABLE IF NOT EXISTS `master_sizes` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `size` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `master_sizes`
--

INSERT INTO `master_sizes` (`id`, `size`) VALUES
(4, '4 by 5'),
(5, '10 by 16'),
(6, '2 by 2'),
(7, '16 by 10');

-- --------------------------------------------------------

--
-- Table structure for table `master_std_size`
--

CREATE TABLE IF NOT EXISTS `master_std_size` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `std_size` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `packing_instructions`
--

CREATE TABLE IF NOT EXISTS `packing_instructions` (
  `work_order_no` int(10) NOT NULL,
  `pac_ins` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `raw_material`
--

CREATE TABLE IF NOT EXISTS `raw_material` (
  `internal_no` int(10) NOT NULL AUTO_INCREMENT,
  `receipt_code` text NOT NULL,
  `date` date NOT NULL,
  `size` varchar(10) NOT NULL,
  `manufacturer` varchar(25) NOT NULL,
  `heat_no` text NOT NULL,
  `weight` int(10) NOT NULL,
  `left_over_weight` varchar(10) NOT NULL,
  `pur_order_no` text NOT NULL,
  `pur_order_date` date NOT NULL,
  `invoice_no` text NOT NULL,
  `invoice_date` date NOT NULL,
  `material_grade` text NOT NULL,
  `raw_material_type` varchar(25) NOT NULL,
  `available_weight` int(10) NOT NULL,
  PRIMARY KEY (`internal_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10006 ;

--
-- Dumping data for table `raw_material`
--

INSERT INTO `raw_material` (`internal_no`, `receipt_code`, `date`, `size`, `manufacturer`, `heat_no`, `weight`, `left_over_weight`, `pur_order_no`, `pur_order_date`, `invoice_no`, `invoice_date`, `material_grade`, `raw_material_type`, `available_weight`) VALUES
(1001, '', '0000-00-00', '4 by 5', '', '', 0, '', '', '0000-00-00', '', '0000-00-00', 'SA 105', 'Ingot', 0),
(10001, '', '0000-00-00', '4 by 5', '', '', 0, '', '', '0000-00-00', '', '0000-00-00', 'SA 105', 'Ingot', 0),
(10002, '100', '0000-00-00', '4 by 5', '', '', 100, '', '', '0000-00-00', '', '0000-00-00', 'SA 105', 'Ingot', 100),
(10003, '', '0000-00-00', '4 by 5', '', '123', 1000, '', '', '0000-00-00', '', '0000-00-00', 'SA 105', 'Ingot', 900),
(10004, '', '0000-00-00', '', '', '', 0, '', '', '0000-00-00', '', '0000-00-00', '', '', 900),
(10005, '123456', '2015-10-16', '4 by 5', 'gaurav', '124589', 1589, '145', '', '0000-00-00', '', '0000-00-00', 'SA 266 GR-2', 'Round', 1109);

-- --------------------------------------------------------

--
-- Table structure for table `remarks`
--

CREATE TABLE IF NOT EXISTS `remarks` (
  `work_order_no` int(10) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seration_records`
--

CREATE TABLE IF NOT EXISTS `seration_records` (
  `seration_id` int(10) NOT NULL AUTO_INCREMENT,
  `work_order_no` varchar(25) NOT NULL,
  `item` varchar(25) NOT NULL,
  `heat_no` varchar(25) NOT NULL,
  `quantity` int(10) NOT NULL,
  `machine_name` varchar(25) NOT NULL,
  `employee_name` varchar(25) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `weight` int(10) NOT NULL,
  PRIMARY KEY (`seration_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `seration_remarks`
--

CREATE TABLE IF NOT EXISTS `seration_remarks` (
  `seration_id` int(10) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `testing_instructions`
--

CREATE TABLE IF NOT EXISTS `testing_instructions` (
  `work_order_no` int(10) NOT NULL,
  `testing_ins` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'gaurav123', '$2a$10$CuHKyEbvKAt06kAgITp9IegTq/kMePhbDS56eZiKmOe.p9vMam.HK'),
(2, 'india123', 'india123.'),
(3, 'gaurav1188', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `work_order_details`
--

CREATE TABLE IF NOT EXISTS `work_order_details` (
  `work_order_no` int(7) NOT NULL AUTO_INCREMENT,
  `purchase_order_no` varchar(40) DEFAULT NULL,
  `customer_name` varchar(20) NOT NULL,
  `purchase_order_date` date NOT NULL,
  `required_delivery_date` date NOT NULL,
  `inspection` varchar(40) NOT NULL,
  `packing_instruction` varchar(40) NOT NULL,
  `testing_instruction` varchar(40) NOT NULL,
  `quatation_no` varchar(20) NOT NULL,
  `remarks` varchar(40) NOT NULL,
  PRIMARY KEY (`work_order_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `work_order_details`
--

INSERT INTO `work_order_details` (`work_order_no`, `purchase_order_no`, `customer_name`, `purchase_order_date`, `required_delivery_date`, `inspection`, `packing_instruction`, `testing_instruction`, `quatation_no`, `remarks`) VALUES
(1, '', 'Gaurav arora', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(2, '', '', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(3, '', '', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(4, '', '', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(5, '', '', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(6, '', '', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(7, '', '', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(8, '', '', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(9, '', '', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(10, '', '', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(11, '', '', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(12, '', '', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(13, '', '', '0000-00-00', '0000-00-00', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `work_order_material_details`
--

CREATE TABLE IF NOT EXISTS `work_order_material_details` (
  `work_id` int(5) NOT NULL AUTO_INCREMENT,
  `work_order_no` varchar(10) NOT NULL,
  `item_no` int(5) NOT NULL,
  `description` varchar(40) NOT NULL,
  `material_grade` varchar(5) NOT NULL,
  `quantity` int(5) NOT NULL,
  `weight` int(5) NOT NULL,
  `remarks` varchar(20) NOT NULL,
  PRIMARY KEY (`work_id`),
  UNIQUE KEY `unique_work_order_no` (`work_order_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `work_order_material_details`
--

INSERT INTO `work_order_material_details` (`work_id`, `work_order_no`, `item_no`, `description`, `material_grade`, `quantity`, `weight`, `remarks`) VALUES
(34, '4', 4, 'rfer', 'ertyr', 0, 52, 'bndher'),
(35, '13', 13, '', 'SA 10', 0, 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
