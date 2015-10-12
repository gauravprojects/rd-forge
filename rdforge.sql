-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2015 at 04:00 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

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
(9, 'hey description'),
(10, 'hey I am dere'),
(11, 'hey description'),
(12, ''),
(13, ''),
(14, 'fvsvdva'),
(15, 'wfea'),
(16, 'bahut kata maine'),
(17, 'hjn,km,'),
(18, 'sjhajkh'),
(19, 'dswv'),
(20, '54'),
(21, 'sfsa'),
(22, 'sahi hai'),
(24, ''),
(25, ''),
(26, 'theek hai');

-- --------------------------------------------------------

--
-- Table structure for table `cutting_records`
--

CREATE TABLE IF NOT EXISTS `cutting_records` (
`cutting_id` int(7) NOT NULL,
  `date` date NOT NULL,
  `raw_mat_size` varchar(25) NOT NULL,
  `heat_no` varchar(25) NOT NULL,
  `quantity` int(10) NOT NULL,
  `weight_per_piece` int(10) NOT NULL,
  `total_weight` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `cutting_records`
--

INSERT INTO `cutting_records` (`cutting_id`, `date`, `raw_mat_size`, `heat_no`, `quantity`, `weight_per_piece`, `total_weight`) VALUES
(1, '2015-10-05', '1', '', 0, 32, 0),
(2, '2015-10-05', '12', '4324', 0, 0, 0),
(3, '2015-10-05', '12', '6876', 3, 23, 69),
(4, '2015-10-05', '1002', '4252', 2787, 12, 33444),
(5, '2015-10-05', '50', '4666', 100, 4565, 456500),
(6, '2015-10-05', '2', '', 0, 0, 0),
(7, '2015-10-05', '3', '', 0, 0, 0),
(8, '2015-10-05', '9', '', 0, 0, 0),
(9, '2015-10-05', '2', '2342', 0, 0, 0),
(10, '2015-10-05', '34', '', 23, 0, 0),
(11, '2015-10-05', '2', '2342', 0, 0, 0),
(12, '2015-10-05', '123', '16', 0, 0, 0),
(13, '2015-10-05', '234', '', 0, 0, 0),
(14, '2015-10-05', '23', '', 0, 45, 0),
(15, '2015-10-05', '45', '', 0, 0, 0),
(16, '2015-10-05', '12', '12345', 100, 10, 1000),
(17, '2015-10-05', '100', '6463', 2, 4, 8),
(18, '2015-10-05', '100', '6656', 4545, 4, 18180),
(19, '2015-10-05', '100', '136', 4, 65, 260),
(20, '2015-10-05', '234', '4646', 45, 54, 2430),
(21, '2015-10-05', '19', '45235', 0, 0, 0),
(22, '2015-10-06', '100', '166', 12, 100, 1200),
(23, '2015-10-06', 'vcvagas', '', 0, 0, 0),
(24, '2015-10-06', '100', '4653', 0, 0, 0),
(25, '2015-10-06', '100', '', 0, 0, 0),
(26, '2015-10-06', '100', '100', 100, 100, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `cutting_remarks`
--

CREATE TABLE IF NOT EXISTS `cutting_remarks` (
`cutting_id` int(11) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `cutting_remarks`
--

INSERT INTO `cutting_remarks` (`cutting_id`, `remarks`) VALUES
(9, 'hey remarks'),
(10, 'I AM ALSO DERE'),
(11, 'hey remarks'),
(12, ''),
(13, ''),
(14, 'avsvfadvad'),
(15, 'safa'),
(16, 'sara kat gaya'),
(17, 'jkmgjhk'),
(18, 'hkwljwlk'),
(19, 'erew'),
(20, '15'),
(21, 'faa'),
(22, 'bahut sahi hai'),
(24, ''),
(25, ''),
(26, 'theek hai');

-- --------------------------------------------------------

--
-- Table structure for table `drilling_records`
--

CREATE TABLE IF NOT EXISTS `drilling_records` (
`drilling_id` int(10) NOT NULL,
  `work_order_no` int(10) NOT NULL,
  `date` date NOT NULL,
  `item` varchar(25) NOT NULL,
  `heat_no` varchar(25) NOT NULL,
  `quantity` varchar(25) NOT NULL,
  `machine_name` varchar(25) NOT NULL,
  `employee_name` varchar(25) NOT NULL,
  `grade` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `drilling_remarks`
--

CREATE TABLE IF NOT EXISTS `drilling_remarks` (
  `drilling_id` int(10) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forging_records`
--

CREATE TABLE IF NOT EXISTS `forging_records` (
`forging_id` int(7) NOT NULL,
  `date` date NOT NULL,
  `forged_des` varchar(30) NOT NULL,
  `weight_per_piece` int(10) NOT NULL,
  `heat_no` varchar(25) NOT NULL,
  `quantity` int(10) NOT NULL,
  `total_weight` int(10) NOT NULL
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
`forging_id` int(11) NOT NULL,
  `remarks` text NOT NULL
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
`log_id` int(8) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `category` varchar(15) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `logbook`
--

INSERT INTO `logbook` (`log_id`, `date`, `time`, `category`, `details`) VALUES
(1, '2015-10-07', '838:59:59', 'Raw Material', 'Manufacturer: gaurav  Heat no: 135358  Material Grade: Grade 1 Material Type: Type 1 Size: 100'),
(2, '2015-10-07', '07:29:26', 'cutting', 'Heat no: 4353 Quantity: 100 Weight per piece: 6335 Total 633500'),
(3, '2015-10-07', '07:33:59', 'Forging', 'Forging Description: dslhsdlkj Heat no  Weight per piece 5353 Quantity :  Total Weight 0'),
(4, '2015-10-07', '01:32:52', 'Raw Material', 'Manufacturer: gaurav  Heat no: 6533  Material Grade: Grade 1 Material Type: Type 1 Size: 100'),
(5, '2015-10-08', '05:43:37', 'Forging', 'Forging Description:  Heat no  Weight per piece  Quantity :  Total Weight 0'),
(6, '2015-10-12', '09:13:31', 'Forging', 'Forging Description:  Heat no  Weight per piece  Quantity :  Total Weight 0');

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
  `remarks` text NOT NULL
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
`id` int(10) NOT NULL COMMENT 'primary key here',
  `receipt_code` text NOT NULL,
  `date` date NOT NULL,
  `size` int(10) NOT NULL,
  `manufacturer` varchar(25) NOT NULL,
  `heat_no` text NOT NULL,
  `weight` int(10) NOT NULL,
  `left_over_weight` varchar(10) NOT NULL,
  `pur_order_no` text NOT NULL,
  `pur_order_date` date NOT NULL,
  `invoice_no` text NOT NULL,
  `invoice_date` date NOT NULL,
  `material_grade` text NOT NULL,
  `raw_material_type` varchar(25) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `raw_material`
--

INSERT INTO `raw_material` (`id`, `receipt_code`, `date`, `size`, `manufacturer`, `heat_no`, `weight`, `left_over_weight`, `pur_order_no`, `pur_order_date`, `invoice_no`, `invoice_date`, `material_grade`, `raw_material_type`) VALUES
(1, '12345', '2015-10-01', 0, '', '', 0, '', '', '0000-00-00', '', '0000-00-00', 'Grade 1', 'Type 1'),
(2, '1234567', '2015-10-01', 45, 'Software Incubator', '123AC2', 125, '', '4636', '0000-00-00', '656135', '0000-00-00', 'Grade 1', 'Type 1'),
(3, '12345', '2015-10-02', 0, 'arora', '4656', 656, '', '565656', '0000-00-00', '', '0000-00-00', 'Grade 1', 'Type 1'),
(4, '1', '2015-10-02', 0, 'pata nahi', '1234', 100, '', '146', '0000-00-00', '656', '0000-00-00', 'Grade 1', 'Type 1'),
(5, '12345', '2015-10-03', 100, 'gaurav arora', '4436', 6653, '', '4656', '2015-10-04', '46565', '2015-10-23', 'Grade 3', 'Type 4'),
(6, '12345', '2015-10-03', 100, 'gupta developers', '4335', 323, '', '234656', '0000-00-00', '', '0000-00-00', 'Grade 1', 'Type 1'),
(7, '100', '2015-10-04', 0, '', '', 0, '', '', '0000-00-00', '', '0000-00-00', 'Grade 1', 'Type 1'),
(8, '1123', '2015-10-04', 0, '', '', 0, '', '', '0000-00-00', '', '0000-00-00', 'Grade 1', 'Type 1'),
(9, '1', '2015-10-05', 100, 'Akgec developers', '14ABC', 100, '', '1ABC', '2015-10-17', '4656', '2015-10-24', 'Grade 1', 'Type 1'),
(10, '100', '2015-10-06', 0, '', '', 0, '', '', '0000-00-00', '', '0000-00-00', 'Grade 1', 'Type 1'),
(11, '100', '2015-10-06', 65, 'nfslkjsdlk', '4656', 0, '', '', '0000-00-00', '', '0000-00-00', 'Grade 1', 'Type 1'),
(12, '1656', '2015-10-06', 5465, '5656', '56', 65, '', '656', '2015-10-24', '', '2015-10-24', 'Grade 1', 'Type 1'),
(13, '1323', '2015-10-07', 100, 'gaurav', '135358', 100, '', '453535', '2015-10-17', '43569', '2015-10-16', 'Grade 1', 'Type 1'),
(14, '132356', '2015-10-07', 100, 'gaurav', '6533', 100, '10', '6532', '2015-10-23', '', '0000-00-00', 'Grade 1', 'Type 1');

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
`seration_id` int(10) NOT NULL,
  `work_order_no` varchar(25) NOT NULL,
  `item` varchar(25) NOT NULL,
  `heat_no` varchar(25) NOT NULL,
  `quantity` int(10) NOT NULL,
  `machine_name` varchar(25) NOT NULL,
  `employee_name` varchar(25) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `weight` int(10) NOT NULL
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
`id` int(7) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL
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
`work_order_no` int(7) NOT NULL,
  `purchase_order_no` varchar(40) DEFAULT NULL,
  `customer_name` varchar(20) NOT NULL,
  `purchase_order_date` date NOT NULL,
  `required_delivery_date` date NOT NULL,
  `inspection` varchar(40) NOT NULL,
  `packing_instruction` varchar(40) NOT NULL,
  `testing_instruction` varchar(40) NOT NULL,
  `quatation_no` varchar(20) NOT NULL,
  `remarks` varchar(40) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `work_order_details`
--

INSERT INTO `work_order_details` (`work_order_no`, `purchase_order_no`, `customer_name`, `purchase_order_date`, `required_delivery_date`, `inspection`, `packing_instruction`, `testing_instruction`, `quatation_no`, `remarks`) VALUES
(1, '1', 'gaurav', '2015-10-09', '2015-10-16', 'hona hai', 'in plastic polybags', 'test it well before use', '424683', 'ok done'),
(2, '', 'gaurav', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(3, '', '', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(4, '', 'gaurav', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(5, '', 'gaurav', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(6, '', 'gaurav', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(7, '', 'gaurav', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(8, '', 'gaurav', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(9, '', 'gaurav', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(10, '', 'gaurav', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(11, '', 'gaurav', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(12, '', 'gaurav', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(13, '', 'gaurav', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(14, '', 'gaurav', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(15, '', 'gaurav', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(16, '', 'gaurav', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(17, '', 'gaurav', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(18, '1', 'gaurav arora', '1994-09-12', '0000-00-00', '', '', '', '', 'cd,bvsl.'),
(19, '', 'gaurav', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(20, '', 'gaurav', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(21, '', 'gaurav', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(22, '', 'gaurav', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(23, '', 'gaurav', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(24, '', 'gaurav', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(25, '', 'gaurav', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(26, '', 'gaurav', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(27, '', 'gaurav', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(28, '', 'gaurav', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(29, '', 'gaurav', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(30, '', 'gaurav', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(31, '', 'gaurav', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(32, '', '', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(33, '', 'gaurav', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(34, '', '', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(35, '', '', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(36, '', '', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(37, '', 'gaurav', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(38, '', '', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(39, '', '', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(40, '', '', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(41, '', '', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(42, '', '', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(43, '', '', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(44, '', '', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(45, '', '', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(46, '', 'gaurav', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(47, '', 'gaurav', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(48, '', '', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(49, '12', 'Gaurav Arora', '2015-10-25', '2015-10-10', '', '', '', '', 'Make it quick'),
(50, '123', 'Gaurav Arora', '2015-10-16', '2015-10-17', 'make it clear', 'Make palstic cover', 'test it well', '123456', 'fwhwlkj'),
(51, '', '', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(52, '1', 'gaurav', '1994-12-12', '2015-10-22', 'abc', 'abc', 'abc', '123', 'hey');

-- --------------------------------------------------------

--
-- Table structure for table `work_order_material_details`
--

CREATE TABLE IF NOT EXISTS `work_order_material_details` (
`work_id` int(5) NOT NULL,
  `work_order_no` varchar(10) NOT NULL,
  `description` varchar(40) NOT NULL,
  `material_grade` varchar(5) NOT NULL,
  `quantity` int(5) NOT NULL,
  `weight` int(5) NOT NULL,
  `remarks` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `work_order_material_details`
--

INSERT INTO `work_order_material_details` (`work_id`, `work_order_no`, `description`, `material_grade`, `quantity`, `weight`, `remarks`) VALUES
(1, '1/1', '', 'Grade', 0, 0, ''),
(2, '2/1', '', 'Grade', 0, 0, ''),
(3, '3/1', 'fss', 'Grade', 10, 5, ''),
(4, '4/1', '', 'Grade', 0, 0, ''),
(5, '5/1', '', 'Grade', 0, 0, ''),
(6, '6/1', 'gaurav', 'Grade', 0, 0, ''),
(7, '7/1', '', 'Grade', 0, 0, ''),
(8, '8/1', '', 'Grade', 0, 0, ''),
(9, '9/1', 'heyya', 'Grade', 10, 100, 'hello'),
(10, '9/2', 'now', 'Grade', 0, 10, 'sks'),
(11, '10/1', '', 'Grade', 10, 0, ''),
(12, '10/2', '', 'Grade', 1, 0, ''),
(13, '10/3', '', 'Grade', 2, 0, ''),
(14, '11/1', '', 'Grade', 0, 0, ''),
(15, '12/1', '', 'Grade', 0, 0, ''),
(16, '13/1', '', 'Grade', 10, 0, ''),
(17, '13/2', '', 'Grade', 50, 0, ''),
(18, '13/3', '', 'Grade', 30, 0, ''),
(19, '14/1', '', 'Grade', 10, 0, ''),
(20, '14/2', '', 'Grade', 20, 0, ''),
(21, '14/3', '', 'Grade', 30, 0, ''),
(22, '15/1', '', 'Grade', 0, 0, ''),
(23, '16/1', '', 'Grade', 0, 0, ''),
(24, '17/1', '', 'Grade', 0, 0, ''),
(25, '18/1', '', 'Grade', 10, 0, ''),
(26, '18/2', '', 'Grade', 20, 0, ''),
(27, '18/3', '', 'Grade', 30, 0, ''),
(28, '19/1', '', 'Grade', 0, 0, ''),
(29, '20/1', '', 'Grade', 0, 0, ''),
(30, '21/1', '', 'Grade', 0, 0, ''),
(31, '22/1', '', 'Grade', 0, 0, ''),
(32, '23/1', '', 'Grade', 0, 0, ''),
(33, '24/1', '', 'Grade', 0, 0, ''),
(35, '25/1', '', 'Grade', 0, 0, ''),
(36, '26/1', '', 'Grade', 0, 0, ''),
(37, '27/1', '', 'Grade', 0, 0, ''),
(38, '28/1', '', 'Grade', 0, 0, ''),
(39, '29/1', '', 'Grade', 0, 0, ''),
(40, '30/1', '', 'Grade', 0, 0, ''),
(41, '31/1', '', 'Grade', 0, 0, ''),
(42, '32/1', '', 'Grade', 0, 0, ''),
(43, '33/1', 'gaurav', 'Grade', 100, 10, ''),
(44, '34/1', '', 'Grade', 0, 0, ''),
(45, '35/1', '', 'Grade', 0, 0, ''),
(46, '36/1', '', 'Grade', 0, 0, ''),
(47, '37/1', '', 'Grade', 0, 0, ''),
(48, '38/1', '', 'Grade', 0, 0, ''),
(49, '39/1', '', 'Grade', 0, 0, ''),
(50, '40/1', '', 'Grade', 0, 0, ''),
(51, '41/1', '', 'Grade', 0, 0, ''),
(52, '42/1', '', 'Grade', 0, 0, ''),
(53, '43/1', '', 'Grade', 0, 0, ''),
(54, '44/1', '', 'Grade', 0, 0, ''),
(55, '45/1', '', 'Grade', 0, 0, ''),
(56, '46/1', 'india', 'Grade', 100, 1, 'asd'),
(57, '46/2', 'pak', 'Grade', 10, 2, 'jkl'),
(58, '46/3', 'sri lanka', 'Grade', 2, 10, 'hll'),
(59, '47/1', '', 'Grade', 0, 0, ''),
(60, '48/1', '', 'Grade', 0, 0, ''),
(61, '49/1', '3 bolts ', 'Grade', 10, 100, 'non rusry'),
(62, '50/1', 'Gaurav', 'Grade', 100, 10, 'ok '),
(63, '50/2', 'Shobhit', 'Grade', 10, 10, 'ok'),
(64, '50/3', 'sri lanka', 'Grade', 145, 10, 'etc'),
(65, '52/1', 'abc', 'Grade', 10, 10, 'abc'),
(66, '52/2', 'abc', 'Grade', 10, 100, 'ngh'),
(67, '52/3', 'vahgk', 'Grade', 0, 10, 'jjs,k');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cutting_records`
--
ALTER TABLE `cutting_records`
 ADD PRIMARY KEY (`cutting_id`);

--
-- Indexes for table `cutting_remarks`
--
ALTER TABLE `cutting_remarks`
 ADD PRIMARY KEY (`cutting_id`);

--
-- Indexes for table `drilling_records`
--
ALTER TABLE `drilling_records`
 ADD PRIMARY KEY (`drilling_id`);

--
-- Indexes for table `drilling_remarks`
--
ALTER TABLE `drilling_remarks`
 ADD PRIMARY KEY (`drilling_id`);

--
-- Indexes for table `forging_records`
--
ALTER TABLE `forging_records`
 ADD PRIMARY KEY (`forging_id`);

--
-- Indexes for table `forging_remarks`
--
ALTER TABLE `forging_remarks`
 ADD PRIMARY KEY (`forging_id`);

--
-- Indexes for table `logbook`
--
ALTER TABLE `logbook`
 ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `mach_remarks`
--
ALTER TABLE `mach_remarks`
 ADD PRIMARY KEY (`mach_id`);

--
-- Indexes for table `raw_material`
--
ALTER TABLE `raw_material`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seration_records`
--
ALTER TABLE `seration_records`
 ADD PRIMARY KEY (`seration_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_order_details`
--
ALTER TABLE `work_order_details`
 ADD PRIMARY KEY (`work_order_no`);

--
-- Indexes for table `work_order_material_details`
--
ALTER TABLE `work_order_material_details`
 ADD PRIMARY KEY (`work_id`), ADD UNIQUE KEY `unique_work_order_no` (`work_order_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cutting_records`
--
ALTER TABLE `cutting_records`
MODIFY `cutting_id` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `cutting_remarks`
--
ALTER TABLE `cutting_remarks`
MODIFY `cutting_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `drilling_records`
--
ALTER TABLE `drilling_records`
MODIFY `drilling_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forging_records`
--
ALTER TABLE `forging_records`
MODIFY `forging_id` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `forging_remarks`
--
ALTER TABLE `forging_remarks`
MODIFY `forging_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
MODIFY `log_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `raw_material`
--
ALTER TABLE `raw_material`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'primary key here',AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `seration_records`
--
ALTER TABLE `seration_records`
MODIFY `seration_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `work_order_details`
--
ALTER TABLE `work_order_details`
MODIFY `work_order_no` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `work_order_material_details`
--
ALTER TABLE `work_order_material_details`
MODIFY `work_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
