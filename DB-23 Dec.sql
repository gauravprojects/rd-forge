-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2015 at 03:28 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rdforge`
--

-- --------------------------------------------------------

--
-- Table structure for table `cutting_item_des`
--

CREATE TABLE `cutting_item_des` (
  `cutting_id` int(10) NOT NULL,
  `item_des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cutting_item_des`
--

INSERT INTO `cutting_item_des` (`cutting_id`, `item_des`) VALUES
(1, 'this is cutting type description.');

-- --------------------------------------------------------

--
-- Table structure for table `cutting_records`
--

CREATE TABLE `cutting_records` (
  `cutting_id` int(7) NOT NULL,
  `date` date NOT NULL,
  `raw_mat_size` varchar(25) NOT NULL,
  `heat_no` varchar(25) NOT NULL,
  `quantity` int(10) NOT NULL,
  `weight_per_piece` int(10) NOT NULL,
  `total_weight` int(10) NOT NULL,
  `size` varchar(25) NOT NULL,
  `pressure` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL,
  `schedule` varchar(25) NOT NULL,
  `available_weight_cutting` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cutting_records`
--

INSERT INTO `cutting_records` (`cutting_id`, `date`, `raw_mat_size`, `heat_no`, `quantity`, `weight_per_piece`, `total_weight`, `size`, `pressure`, `type`, `schedule`, `available_weight_cutting`) VALUES
(2, '2015-12-07', '50x40', '12345678', 10, 10, 100, '5', '200 pa', 'dddd', 'ssdf', 100);

-- --------------------------------------------------------

--
-- Table structure for table `cutting_remarks`
--

CREATE TABLE `cutting_remarks` (
  `cutting_id` int(11) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cutting_remarks`
--

INSERT INTO `cutting_remarks` (`cutting_id`, `remarks`) VALUES
(1, 'remarks to ache hai');

-- --------------------------------------------------------

--
-- Table structure for table `drilling_records`
--

CREATE TABLE `drilling_records` (
  `drilling_id` int(10) NOT NULL,
  `work_order_no` int(10) NOT NULL,
  `date` date NOT NULL,
  `item` varchar(25) NOT NULL,
  `heat_no` varchar(25) NOT NULL,
  `quantity` varchar(25) NOT NULL,
  `machine_name` varchar(25) NOT NULL,
  `employee_name` varchar(25) NOT NULL,
  `grade` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `drilling_remarks`
--

CREATE TABLE `drilling_remarks` (
  `drilling_id` int(10) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forging_records`
--

CREATE TABLE `forging_records` (
  `forging_id` int(7) NOT NULL,
  `heat_no` varchar(20) NOT NULL,
  `quantity` int(10) NOT NULL,
  `date` date NOT NULL,
  `weight_per_piece` int(10) NOT NULL,
  `size` varchar(20) NOT NULL,
  `pressure` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `schedule` varchar(20) NOT NULL,
  `total_weight` int(15) NOT NULL,
  `remarks` text NOT NULL,
  `available_weight_forging` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forging_records`
--

INSERT INTO `forging_records` (`forging_id`, `heat_no`, `quantity`, `date`, `weight_per_piece`, `size`, `pressure`, `type`, `schedule`, `total_weight`, `remarks`, `available_weight_forging`) VALUES
(3, '1245689', 1, '1970-01-01', 10, '5', '200 pa', 'dddd', 'ssdf', 10, '', 10);

-- --------------------------------------------------------

--
-- Table structure for table `inspection_details`
--

CREATE TABLE `inspection_details` (
  `work_order_no` int(10) NOT NULL,
  `inspection` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

CREATE TABLE `logbook` (
  `log_id` int(8) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `category` varchar(15) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `machining_records`
--

CREATE TABLE `machining_records` (
  `mach_id` int(7) NOT NULL,
  `date` date NOT NULL,
  `work_order_no` varchar(25) NOT NULL,
  `item` varchar(25) NOT NULL,
  `heat_no` varchar(25) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `machine_name` varchar(25) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `weight` int(10) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_description_type`
--

CREATE TABLE `master_description_type` (
  `id` int(7) NOT NULL,
  `type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_description_type`
--

INSERT INTO `master_description_type` (`id`, `type`) VALUES
(1, 'dddd');

-- --------------------------------------------------------

--
-- Table structure for table `master_grades`
--

CREATE TABLE `master_grades` (
  `id` int(7) NOT NULL,
  `grade_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_grades`
--

INSERT INTO `master_grades` (`id`, `grade_name`) VALUES
(1, 'SSSH');

-- --------------------------------------------------------

--
-- Table structure for table `master_manufacturers`
--

CREATE TABLE `master_manufacturers` (
  `id` int(7) NOT NULL,
  `manufacturer_name` varchar(25) NOT NULL,
  `item` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_manufacturers`
--

INSERT INTO `master_manufacturers` (`id`, `manufacturer_name`, `item`) VALUES
(1, 'RD-Forge', 'Round');

-- --------------------------------------------------------

--
-- Table structure for table `master_pressure`
--

CREATE TABLE `master_pressure` (
  `id` int(3) NOT NULL,
  `pressure` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_pressure`
--

INSERT INTO `master_pressure` (`id`, `pressure`) VALUES
(1, '200 pa'),
(2, '300 pa'),
(3, '400 pa');

-- --------------------------------------------------------

--
-- Table structure for table `master_schedule`
--

CREATE TABLE `master_schedule` (
  `id` int(7) NOT NULL,
  `schedule` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_schedule`
--

INSERT INTO `master_schedule` (`id`, `schedule`) VALUES
(2, 'hfeiw'),
(3, 'abcd'),
(4, 'efgh');

-- --------------------------------------------------------

--
-- Table structure for table `master_sizes`
--

CREATE TABLE `master_sizes` (
  `id` int(7) NOT NULL,
  `size` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_sizes`
--

INSERT INTO `master_sizes` (`id`, `size`) VALUES
(1, '50x40');

-- --------------------------------------------------------

--
-- Table structure for table `master_std_size`
--

CREATE TABLE `master_std_size` (
  `id` int(7) NOT NULL,
  `std_size` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_std_size`
--

INSERT INTO `master_std_size` (`id`, `std_size`) VALUES
(1, '5');

-- --------------------------------------------------------

--
-- Table structure for table `packing_instructions`
--

CREATE TABLE `packing_instructions` (
  `work_order_no` int(10) NOT NULL,
  `pac_ins` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `raw_material`
--

CREATE TABLE `raw_material` (
  `internal_no` int(10) NOT NULL,
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
  `available_weight` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `raw_material`
--

INSERT INTO `raw_material` (`internal_no`, `receipt_code`, `date`, `size`, `manufacturer`, `heat_no`, `weight`, `left_over_weight`, `pur_order_no`, `pur_order_date`, `invoice_no`, `invoice_date`, `material_grade`, `raw_material_type`, `available_weight`) VALUES
(3, '', '2001-02-01', '50x40', 'RD-Forge', '12345789', 100, '', '', '1970-01-01', '', '1970-01-01', 'SSSH', 'Ingot', 0),
(7, '123456', '1970-01-01', '50x40', 'RD-Forge', '1245689', 1000, '', '', '1970-01-01', '', '1970-01-01', 'SSSH', 'Ingot', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `remarks`
--

CREATE TABLE `remarks` (
  `work_order_no` int(10) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seration_records`
--

CREATE TABLE `seration_records` (
  `seration_id` int(10) NOT NULL,
  `work_order_no` varchar(25) NOT NULL,
  `item` varchar(25) NOT NULL,
  `heat_no` varchar(25) NOT NULL,
  `quantity` int(10) NOT NULL,
  `machine_name` varchar(25) NOT NULL,
  `employee_name` varchar(25) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `weight` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seration_remarks`
--

CREATE TABLE `seration_remarks` (
  `seration_id` int(10) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `testing_instructions`
--

CREATE TABLE `testing_instructions` (
  `work_order_no` int(10) NOT NULL,
  `testing_ins` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(7) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `remember_token`, `updated_at`, `role`) VALUES
(1, 'gaurav123', '$2a$10$CuHKyEbvKAt06kAgITp9IegTq/kMePhbDS56eZiKmOe.p9vMam.HK', 'nEXeN5fTyVPJTp6m0CowcxWyPeylSmSdhNHEbqSGWyybydY0E1Q1VH6qRzTk', '2015-12-02 11:14:42', 0),
(2, 'admin', '$2a$10$CuHKyEbvKAt06kAgITp9IegTq/kMePhbDS56eZiKmOe.p9vMam.HK', 'fQ8joi8AW9l54kShfcAkXDoCkqMXbMYx4pAzIvbkUiuG9ihCO9slzpl6mfC2', '2015-12-02 17:02:15', 1),
(3, 'gaurav1188', '$2a$10$CuHKyEbvKAt06kAgITp9IegTq/kMePhbDS56eZiKmOe.p9vMam.HK', NULL, NULL, 2),
(4, 'abcd', '$2a$10$CuHKyEbvKAt06kAgITp9IegTq/kMePhbDS56eZiKmOe.p9vMam.HK', 'vgpdvvTsP0L3iTCssxNoov87MFZJBd8EaPkbU2sHyC23j6CJiiZajTrZrq4F', '2015-12-22 14:49:40', 3),
(5, 'efgh', '$2a$10$CuHKyEbvKAt06kAgITp9IegTq/kMePhbDS56eZiKmOe.p9vMam.HK', NULL, NULL, 4),
(6, 'ijkl', '$2a$10$CuHKyEbvKAt06kAgITp9IegTq/kMePhbDS56eZiKmOe.p9vMam.HK', NULL, NULL, 5),
(7, 'mnop', '$2a$10$CuHKyEbvKAt06kAgITp9IegTq/kMePhbDS56eZiKmOe.p9vMam.HK', 'xrvYR4KyjM9QJ8vkJqKjxHGv6iPyOSYhXjhviDsyLvYlTkfagEuURpxIaE6R', '2015-12-02 16:57:06', 5),
(8, 'qrst', '$2a$10$CuHKyEbvKAt06kAgITp9IegTq/kMePhbDS56eZiKmOe.p9vMam.HK', 'u1FgWsmtuQEyT4as6GrJxqXrXHoicANCebSKb5OoAhgB0tzW84hfCzBIj1tb', '2015-12-22 10:02:22', 6);

-- --------------------------------------------------------

--
-- Table structure for table `work_order_details`
--

CREATE TABLE `work_order_details` (
  `work_order_no` int(7) NOT NULL,
  `purchase_order_no` varchar(40) DEFAULT NULL,
  `customer_name` varchar(20) NOT NULL,
  `purchase_order_date` date NOT NULL,
  `required_delivery_date` date NOT NULL,
  `inspection` varchar(40) NOT NULL,
  `packing_instruction` varchar(40) NOT NULL,
  `testing_instruction` varchar(40) NOT NULL,
  `quatation_no` varchar(20) NOT NULL,
  `remarks` varchar(40) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `work_order_material_details`
--

CREATE TABLE `work_order_material_details` (
  `work_id` int(5) NOT NULL,
  `work_order_no` int(15) NOT NULL,
  `item_no` varchar(10) NOT NULL,
  `material_grade` varchar(5) NOT NULL,
  `size` varchar(30) NOT NULL,
  `pressure` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `schedule` varchar(30) NOT NULL,
  `quantity` int(5) NOT NULL,
  `weight` int(5) NOT NULL,
  `remarks` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `machining_records`
--
ALTER TABLE `machining_records`
  ADD PRIMARY KEY (`mach_id`);

--
-- Indexes for table `master_description_type`
--
ALTER TABLE `master_description_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_grades`
--
ALTER TABLE `master_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_manufacturers`
--
ALTER TABLE `master_manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_pressure`
--
ALTER TABLE `master_pressure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_schedule`
--
ALTER TABLE `master_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_sizes`
--
ALTER TABLE `master_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_std_size`
--
ALTER TABLE `master_std_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raw_material`
--
ALTER TABLE `raw_material`
  ADD PRIMARY KEY (`internal_no`);

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
  ADD PRIMARY KEY (`work_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cutting_records`
--
ALTER TABLE `cutting_records`
  MODIFY `cutting_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cutting_remarks`
--
ALTER TABLE `cutting_remarks`
  MODIFY `cutting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `drilling_records`
--
ALTER TABLE `drilling_records`
  MODIFY `drilling_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forging_records`
--
ALTER TABLE `forging_records`
  MODIFY `forging_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `log_id` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `machining_records`
--
ALTER TABLE `machining_records`
  MODIFY `mach_id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_description_type`
--
ALTER TABLE `master_description_type`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `master_grades`
--
ALTER TABLE `master_grades`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `master_manufacturers`
--
ALTER TABLE `master_manufacturers`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `master_pressure`
--
ALTER TABLE `master_pressure`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `master_schedule`
--
ALTER TABLE `master_schedule`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `master_sizes`
--
ALTER TABLE `master_sizes`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `master_std_size`
--
ALTER TABLE `master_std_size`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `raw_material`
--
ALTER TABLE `raw_material`
  MODIFY `internal_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `seration_records`
--
ALTER TABLE `seration_records`
  MODIFY `seration_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `work_order_details`
--
ALTER TABLE `work_order_details`
  MODIFY `work_order_no` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `work_order_material_details`
--
ALTER TABLE `work_order_material_details`
  MODIFY `work_id` int(5) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
