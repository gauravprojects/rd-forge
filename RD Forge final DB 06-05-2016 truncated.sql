-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2016 at 08:04 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

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
-- Table structure for table `cutting_records`
--

CREATE TABLE IF NOT EXISTS `cutting_records` (
`cutting_id` int(7) NOT NULL,
  `date` date NOT NULL,
  `raw_mat_size` varchar(25) NOT NULL,
  `heat_no` varchar(25) NOT NULL,
  `quantity` int(10) NOT NULL,
  `weight_per_piece` int(10) NOT NULL,
  `total_weight` int(10) NOT NULL,
  `standard_size` varchar(25) NOT NULL,
  `pressure` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL,
  `schedule` varchar(25) NOT NULL,
  `available_weight_cutting` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cutting_stock`
--

CREATE TABLE IF NOT EXISTS `cutting_stock` (
`stock_id` int(10) NOT NULL,
  `heat_no` varchar(25) NOT NULL,
  `standard_size` varchar(10) NOT NULL,
  `pressure` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `schedule` varchar(10) NOT NULL,
  `available_weight_cutting` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `drilling_records`
--

CREATE TABLE IF NOT EXISTS `drilling_records` (
`drill_id` int(10) NOT NULL,
  `work_order_no` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `item` varchar(25) NOT NULL,
  `quantity` varchar(25) NOT NULL,
  `machine_name` varchar(25) NOT NULL,
  `weight` int(10) NOT NULL,
  `grade` varchar(25) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `drilling_work_order_stock`
--

CREATE TABLE IF NOT EXISTS `drilling_work_order_stock` (
`drill_id` int(11) NOT NULL,
  `work_order_no` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `pressure` varchar(255) NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `weight` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forging_records`
--

CREATE TABLE IF NOT EXISTS `forging_records` (
`forging_id` int(7) NOT NULL,
  `heat_no` varchar(20) NOT NULL,
  `cutting_size` varchar(255) NOT NULL,
  `cutting_type` varchar(255) NOT NULL,
  `cutting_pressure` varchar(255) NOT NULL,
  `cutting_schedule` varchar(255) NOT NULL,
  `quantity` int(10) NOT NULL,
  `date` date NOT NULL,
  `weight_per_piece` int(10) NOT NULL,
  `size` varchar(255) NOT NULL,
  `pressure` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `total_weight` int(15) NOT NULL,
  `remarks` text NOT NULL,
  `available_weight_forging` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forging_stock`
--

CREATE TABLE IF NOT EXISTS `forging_stock` (
`stock_id` int(11) NOT NULL,
  `heat_no` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `pressure` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `available_quantity_forging` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `machining_records`
--

CREATE TABLE IF NOT EXISTS `machining_records` (
`mach_id` int(7) NOT NULL,
  `date` date NOT NULL,
  `work_order_no` varchar(25) NOT NULL,
  `item` varchar(25) NOT NULL,
  `heat_no` varchar(25) NOT NULL,
  `forging_size` varchar(255) NOT NULL,
  `forging_pressure` varchar(255) NOT NULL,
  `forging_type` varchar(255) NOT NULL,
  `forging_schedule` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `machine_name` varchar(25) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `weight` int(10) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `machining_work_order_stock`
--

CREATE TABLE IF NOT EXISTS `machining_work_order_stock` (
`mach_id` int(11) NOT NULL,
  `work_order_no` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `pressure` varchar(255) NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `weight` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_description_type`
--

CREATE TABLE IF NOT EXISTS `master_description_type` (
`id` int(7) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_grades`
--

CREATE TABLE IF NOT EXISTS `master_grades` (
`id` int(7) NOT NULL,
  `grade_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_manufacturers`
--

CREATE TABLE IF NOT EXISTS `master_manufacturers` (
`id` int(7) NOT NULL,
  `manufacturer_name` varchar(100) NOT NULL,
  `item` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_material_type`
--

CREATE TABLE IF NOT EXISTS `master_material_type` (
`id` int(11) NOT NULL,
  `material_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_pressure`
--

CREATE TABLE IF NOT EXISTS `master_pressure` (
`id` int(3) NOT NULL,
  `pressure` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_schedule`
--

CREATE TABLE IF NOT EXISTS `master_schedule` (
`id` int(7) NOT NULL,
  `schedule` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_sizes`
--

CREATE TABLE IF NOT EXISTS `master_sizes` (
`id` int(7) NOT NULL,
  `size` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_status`
--

CREATE TABLE IF NOT EXISTS `master_status` (
`id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_std_size`
--

CREATE TABLE IF NOT EXISTS `master_std_size` (
`id` int(7) NOT NULL,
  `std_size` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `raw_material_records`
--

CREATE TABLE IF NOT EXISTS `raw_material_records` (
`internal_no` int(11) NOT NULL,
  `receipt_code` text NOT NULL,
  `date` date NOT NULL,
  `size` varchar(100) NOT NULL,
  `manufacturer` varchar(25) NOT NULL,
  `heat_no` varchar(255) NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `raw_material_stock`
--

CREATE TABLE IF NOT EXISTS `raw_material_stock` (
`stock_id` int(11) NOT NULL,
  `size` varchar(50) NOT NULL,
  `heat_no` varchar(100) NOT NULL,
  `available_weight` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `serration_records`
--

CREATE TABLE IF NOT EXISTS `serration_records` (
`serr_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `work_order_no` varchar(25) NOT NULL,
  `item` varchar(25) NOT NULL,
  `quantity` int(10) NOT NULL,
  `machine_name` varchar(25) NOT NULL,
  `employee_name` varchar(25) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `weight` int(10) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `serration_work_order_stock`
--

CREATE TABLE IF NOT EXISTS `serration_work_order_stock` (
`serr_id` int(11) NOT NULL,
  `work_order_no` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `pressure` varchar(255) NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `weight` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(7) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `remember_token`, `updated_at`, `role`) VALUES
(1, 'gaurav123', '$2a$10$CuHKyEbvKAt06kAgITp9IegTq/kMePhbDS56eZiKmOe.p9vMam.HK', 'nEXeN5fTyVPJTp6m0CowcxWyPeylSmSdhNHEbqSGWyybydY0E1Q1VH6qRzTk', '2015-12-02 11:14:42', 0),
(2, 'admin', '$2a$10$CuHKyEbvKAt06kAgITp9IegTq/kMePhbDS56eZiKmOe.p9vMam.HK', '3gm0BbUE4mHtI2CYIQcHg612fe9WghzBiSKU8bqBnGHBXFROybf917l6y0jb', '2016-05-02 21:05:04', 1),
(3, 'gaurav1188', '$2a$10$CuHKyEbvKAt06kAgITp9IegTq/kMePhbDS56eZiKmOe.p9vMam.HK', NULL, NULL, 2),
(4, 'abcd', '$2a$10$CuHKyEbvKAt06kAgITp9IegTq/kMePhbDS56eZiKmOe.p9vMam.HK', 'WYkzmRKbJocz32pYAOGL4sw5yM1WIH9qpWxBfVHE8GnibsuNd1KsSE4TVkRr', '2015-12-27 08:10:32', 3),
(5, 'efgh', '$2a$10$CuHKyEbvKAt06kAgITp9IegTq/kMePhbDS56eZiKmOe.p9vMam.HK', NULL, NULL, 4),
(6, 'ijkl', '$2a$10$CuHKyEbvKAt06kAgITp9IegTq/kMePhbDS56eZiKmOe.p9vMam.HK', NULL, NULL, 5),
(7, 'mnop', '$2a$10$CuHKyEbvKAt06kAgITp9IegTq/kMePhbDS56eZiKmOe.p9vMam.HK', 'xrvYR4KyjM9QJ8vkJqKjxHGv6iPyOSYhXjhviDsyLvYlTkfagEuURpxIaE6R', '2015-12-02 16:57:06', 5),
(8, 'qrst', '$2a$10$CuHKyEbvKAt06kAgITp9IegTq/kMePhbDS56eZiKmOe.p9vMam.HK', 'u1FgWsmtuQEyT4as6GrJxqXrXHoicANCebSKb5OoAhgB0tzW84hfCzBIj1tb', '2015-12-22 10:02:22', 6);

-- --------------------------------------------------------

--
-- Table structure for table `work_order_material_details`
--

CREATE TABLE IF NOT EXISTS `work_order_material_details` (
`work_id` int(5) NOT NULL,
  `work_order_no` varchar(255) NOT NULL,
  `item_no` int(10) NOT NULL,
  `material_grade` varchar(255) NOT NULL,
  `size` varchar(30) NOT NULL,
  `pressure` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `schedule` varchar(30) NOT NULL,
  `quantity` int(20) NOT NULL,
  `weight` int(20) NOT NULL,
  `remarks` varchar(20) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `work_order_records`
--

CREATE TABLE IF NOT EXISTS `work_order_records` (
`id` int(7) NOT NULL,
  `work_order_no` varchar(255) NOT NULL,
  `purchase_order_no` varchar(40) DEFAULT NULL,
  `customer_name` varchar(20) NOT NULL,
  `purchase_order_date` date NOT NULL,
  `required_delivery_date` date NOT NULL,
  `inspection` varchar(40) NOT NULL,
  `packing_instruction` varchar(40) NOT NULL,
  `testing_instruction` varchar(40) NOT NULL,
  `quotation_no` varchar(20) NOT NULL,
  `remarks` varchar(40) NOT NULL,
  `status` varchar(25) NOT NULL
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
-- Indexes for table `cutting_stock`
--
ALTER TABLE `cutting_stock`
 ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `drilling_records`
--
ALTER TABLE `drilling_records`
 ADD PRIMARY KEY (`drill_id`);

--
-- Indexes for table `drilling_work_order_stock`
--
ALTER TABLE `drilling_work_order_stock`
 ADD PRIMARY KEY (`drill_id`);

--
-- Indexes for table `forging_records`
--
ALTER TABLE `forging_records`
 ADD PRIMARY KEY (`forging_id`);

--
-- Indexes for table `forging_stock`
--
ALTER TABLE `forging_stock`
 ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `machining_records`
--
ALTER TABLE `machining_records`
 ADD PRIMARY KEY (`mach_id`);

--
-- Indexes for table `machining_work_order_stock`
--
ALTER TABLE `machining_work_order_stock`
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
-- Indexes for table `master_material_type`
--
ALTER TABLE `master_material_type`
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
-- Indexes for table `master_status`
--
ALTER TABLE `master_status`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_std_size`
--
ALTER TABLE `master_std_size`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raw_material_records`
--
ALTER TABLE `raw_material_records`
 ADD PRIMARY KEY (`internal_no`), ADD KEY `heat_no` (`heat_no`), ADD KEY `size` (`size`), ADD KEY `size_2` (`size`), ADD KEY `internal_no` (`internal_no`);

--
-- Indexes for table `raw_material_stock`
--
ALTER TABLE `raw_material_stock`
 ADD PRIMARY KEY (`stock_id`,`heat_no`,`size`), ADD KEY `f1key` (`size`), ADD KEY `fkey` (`heat_no`);

--
-- Indexes for table `serration_records`
--
ALTER TABLE `serration_records`
 ADD PRIMARY KEY (`serr_id`);

--
-- Indexes for table `serration_work_order_stock`
--
ALTER TABLE `serration_work_order_stock`
 ADD PRIMARY KEY (`serr_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_order_material_details`
--
ALTER TABLE `work_order_material_details`
 ADD PRIMARY KEY (`work_id`);

--
-- Indexes for table `work_order_records`
--
ALTER TABLE `work_order_records`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cutting_records`
--
ALTER TABLE `cutting_records`
MODIFY `cutting_id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cutting_stock`
--
ALTER TABLE `cutting_stock`
MODIFY `stock_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `drilling_records`
--
ALTER TABLE `drilling_records`
MODIFY `drill_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `drilling_work_order_stock`
--
ALTER TABLE `drilling_work_order_stock`
MODIFY `drill_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forging_records`
--
ALTER TABLE `forging_records`
MODIFY `forging_id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forging_stock`
--
ALTER TABLE `forging_stock`
MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `machining_records`
--
ALTER TABLE `machining_records`
MODIFY `mach_id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `machining_work_order_stock`
--
ALTER TABLE `machining_work_order_stock`
MODIFY `mach_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_description_type`
--
ALTER TABLE `master_description_type`
MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_grades`
--
ALTER TABLE `master_grades`
MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_manufacturers`
--
ALTER TABLE `master_manufacturers`
MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_material_type`
--
ALTER TABLE `master_material_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_pressure`
--
ALTER TABLE `master_pressure`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_schedule`
--
ALTER TABLE `master_schedule`
MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_sizes`
--
ALTER TABLE `master_sizes`
MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_status`
--
ALTER TABLE `master_status`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_std_size`
--
ALTER TABLE `master_std_size`
MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `raw_material_records`
--
ALTER TABLE `raw_material_records`
MODIFY `internal_no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `raw_material_stock`
--
ALTER TABLE `raw_material_stock`
MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `serration_records`
--
ALTER TABLE `serration_records`
MODIFY `serr_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `serration_work_order_stock`
--
ALTER TABLE `serration_work_order_stock`
MODIFY `serr_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `work_order_material_details`
--
ALTER TABLE `work_order_material_details`
MODIFY `work_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `work_order_records`
--
ALTER TABLE `work_order_records`
MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
