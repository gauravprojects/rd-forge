-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2015 at 08:34 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rd_forge`
--

-- --------------------------------------------------------

--
-- Table structure for table `cutting_item_des`
--

CREATE TABLE IF NOT EXISTS `cutting_item_des` (
  `cutting_id` int(10) NOT NULL,
  `item_des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cutting_records`
--

CREATE TABLE IF NOT EXISTS `cutting_records` (
  `cutting_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `raw_mat_size` varchar(25) NOT NULL,
  `heat_no` varchar(25) NOT NULL,
  `quantity` int(10) NOT NULL,
  `weight_per_piece` int(10) NOT NULL,
  `total_weight` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cutting_remarks`
--

CREATE TABLE IF NOT EXISTS `cutting_remarks` (
  `cutting_id` int(11) NOT NULL AUTO_INCREMENT,
  `remarks` text NOT NULL,
  PRIMARY KEY (`cutting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
-- Table structure for table `entry_of_records`
--

CREATE TABLE IF NOT EXISTS `entry_of_records` (
  `work_order_no` int(10) NOT NULL AUTO_INCREMENT,
  `date_of_issue` date NOT NULL,
  `cus_name` varchar(25) NOT NULL,
  `pur_order_no` text NOT NULL,
  `pur_order_date` date NOT NULL,
  `req_dil_date` date NOT NULL,
  `quation_no` text NOT NULL,
  PRIMARY KEY (`work_order_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `forging_records`
--

CREATE TABLE IF NOT EXISTS `forging_records` (
  `forging_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `forged_des` varchar(30) NOT NULL,
  `weight_per_piece` int(10) NOT NULL,
  `heat_no` varchar(25) NOT NULL,
  `quantity` int(10) NOT NULL,
  `total_weight` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forging_remarks`
--

CREATE TABLE IF NOT EXISTS `forging_remarks` (
  `forging_id` int(11) NOT NULL AUTO_INCREMENT,
  `remarks` text NOT NULL,
  PRIMARY KEY (`forging_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
-- Table structure for table `machining_records`
--

CREATE TABLE IF NOT EXISTS `machining_records` (
  `mach_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `work_order_no` varchar(25) NOT NULL,
  `item` varchar(25) NOT NULL,
  `heat_no` varchar(25) NOT NULL,
  `qunantity` int(10) NOT NULL,
  `machine_name` varchar(25) NOT NULL,
  `employee_name` varchar(25) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `weight` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mach_remarks`
--

CREATE TABLE IF NOT EXISTS `mach_remarks` (
  `mach_id` int(10) NOT NULL,
  `remarks` text NOT NULL,
  PRIMARY KEY (`mach_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'primary key here',
  `receipt_code` text NOT NULL,
  `date` date NOT NULL,
  `size` int(10) NOT NULL,
  `manufacturer` varchar(25) NOT NULL,
  `heat_no` text NOT NULL,
  `weight` int(10) NOT NULL,
  `pur_order_no` text NOT NULL,
  `pur_order_date` date NOT NULL,
  `invoice_no` text NOT NULL,
  `invoice_date` date NOT NULL,
  `material_grade` text NOT NULL,
  `raw_material_type` varchar(25) NOT NULL,
  `internal_no` varchar(7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `remarks`
--

CREATE TABLE IF NOT EXISTS `remarks` (
  `work_order_no` int(10) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `remarks`
--

INSERT INTO `remarks` (`work_order_no`, `remarks`) VALUES
(1, 'india is a great country'),
(2, 'hey where are you going');

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
-- Table structure for table `work_order_details`
--

CREATE TABLE IF NOT EXISTS `work_order_details` (
  `work_order_no` int(10) NOT NULL,
  `item_no` int(3) NOT NULL AUTO_INCREMENT COMMENT 'composite primary key',
  `material_grade` varchar(25) NOT NULL,
  `quantity` int(5) NOT NULL,
  `dispatched_quantity` int(5) NOT NULL,
  `weight` int(5) NOT NULL,
  `remarks` text NOT NULL,
  PRIMARY KEY (`item_no`),
  UNIQUE KEY `work_order_no` (`work_order_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
