-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2008 at 08:05 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`, `status`) VALUES
(1, 0, 'Electronics', 1),
(2, 1, 'Mobile', 1),
(3, 2, 'Wallton', 1),
(4, 0, 'Books', 1),
(5, 4, 'NaZrul', 1),
(6, 5, 'Ognibina', 1),
(7, 4, 'Rabindra', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company_info`
--

CREATE TABLE `company_info` (
  `id` int(11) NOT NULL,
  `company_info` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_info`
--

INSERT INTO `company_info` (`id`, `company_info`) VALUES
(4, 'MRC Manager<br>0170000000 | info@mrcmanager.com<br>');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `rate` double NOT NULL,
  `status` tinyint(1) NOT NULL,
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id`, `name`, `rate`, `status`, `entry_time`) VALUES
(2, 'UVWX', 6.5, 1, '2016-08-31 13:57:15'),
(6, 'admin', 3, 1, '2016-08-22 16:21:28');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`, `status`, `entry_time`) VALUES
(1, 'iPhone 6S', 1, '2016-04-29 08:16:47'),
(3, 'Wallton', 1, '2016-08-28 15:20:37');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `controller_folder` varchar(200) DEFAULT NULL COMMENT 'link without base url',
  `controller_link` varchar(200) DEFAULT NULL,
  `app_id` int(10) UNSIGNED NOT NULL COMMENT 'comes from applicatable',
  `order_seq` int(10) UNSIGNED DEFAULT '0',
  `css_icon_class` varchar(45) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'E',
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entry_by` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `name`, `controller_folder`, `controller_link`, `app_id`, `order_seq`, `css_icon_class`, `status`, `entry_time`, `entry_by`) VALUES
(8, 'Sales', 'sales', 'sales', 1, 2, 'ti-shopping-cart', 'A', '2016-05-17 13:32:25', 0),
(9, 'Webstore', 'webstore', 'webstore', 1, 3, 'ti-world', 'A', '2016-05-17 13:32:25', 0),
(10, 'Inventory', 'inventory', 'inventory', 1, 4, 'ti-package', 'A', '2016-05-17 13:32:25', 0),
(11, 'Service', 'service', 'service', 1, 5, 'ti-settings', 'A', '2016-05-17 13:32:25', 0),
(12, 'Customer', 'customer', 'customer', 1, 6, 'ti-user', 'A', '2016-05-17 13:32:25', 0),
(13, 'Report', 'report', 'report', 1, 7, 'ti-bar-chart', 'A', '2016-05-17 13:32:25', 0),
(14, 'Settings', 'settings', 'settings', 1, 8, 'ti-panel', 'A', '2016-05-17 13:32:25', 0),
(15, 'Dashboard', '', 'user', 1, 1, 'ti-home', 'A', '2016-05-17 13:32:25', 0),
(1000, 'Software Settings', 'software_settings', 'software_settings', 1, 1000, 'fa fa-cogs', 'A', '2016-05-17 13:32:25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE `payment_type` (
  `id` int(11) NOT NULL,
  `name` varchar(99) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_type`
--

INSERT INTO `payment_type` (`id`, `name`, `status`) VALUES
(1, 'Pyonior', 1),
(3, 'Paypal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pricing_rule`
--

CREATE TABLE `pricing_rule` (
  `id` int(11) NOT NULL,
  `name` varchar(99) NOT NULL,
  `percent` double NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pricing_rule`
--

INSERT INTO `pricing_rule` (`id`, `name`, `percent`, `status`) VALUES
(1, 'Fixed', 95, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(255) UNSIGNED NOT NULL,
  `tr_id` varchar(45) NOT NULL,
  `code` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `type_id` tinyint(1) NOT NULL,
  `unit_id` varchar(11) NOT NULL,
  `manufacture_id` int(11) NOT NULL,
  `is_taxable` tinyint(1) DEFAULT NULL,
  `tax_class_id` int(11) NOT NULL,
  `is_discount_allow` tinyint(1) DEFAULT NULL,
  `discount_percentage` double DEFAULT NULL,
  `is_serial_required` tinyint(1) DEFAULT NULL,
  `upc` varchar(45) DEFAULT NULL,
  `ean` varchar(45) DEFAULT NULL,
  `rack_no` varchar(45) DEFAULT NULL,
  `reorder_point` double DEFAULT NULL,
  `desired_inv_level` double DEFAULT NULL,
  `default_selling_price` double DEFAULT NULL,
  `default_buying_price` double DEFAULT NULL,
  `margin` double NOT NULL,
  `status` tinyint(1) NOT NULL,
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cat_id` int(11) NOT NULL,
  `entry_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `tr_id`, `code`, `name`, `type_id`, `unit_id`, `manufacture_id`, `is_taxable`, `tax_class_id`, `is_discount_allow`, `discount_percentage`, `is_serial_required`, `upc`, `ean`, `rack_no`, `reorder_point`, `desired_inv_level`, `default_selling_price`, `default_buying_price`, `margin`, `status`, `entry_time`, `cat_id`, `entry_by`) VALUES
(12, '160831173816', '', 'iPhone 6S', 1, 'Pice', 0, 0, 0, 0, 0, 0, '', '', '', 0, 0, 100, 60, 0, 0, '2016-08-31 15:38:16', 0, 0),
(11, '160831164348', 'W200i', 'W200i', 1, 'Pice', 3, 1, 2, 1, 6, 0, '146545646', '897562254', '5', 7, 5, 8600, 6500, 8100, 0, '2016-08-31 14:43:48', 2, 0),
(13, '160917234015', '0', '0', 0, '0', 0, 0, 0, 0, 0, 0, '0', '0', '0', 0, 0, 0, 0, 0, 0, '2016-09-17 21:40:15', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `role_group`
--

CREATE TABLE `role_group` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_group`
--

INSERT INTO `role_group` (`id`, `name`, `description`, `status`) VALUES
(1, 'Super Admin', 'Super Admin', 1),
(2, 'Owner', 'Shop Owner', 0),
(4, 'Manager', 'Shop Manager', 0),
(5, 'Associate', 'Associative user', 0),
(6, 'General', 'General shop employee', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role_group_permission`
--

CREATE TABLE `role_group_permission` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_group_id` int(10) UNSIGNED NOT NULL,
  `module_id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `add_p` varchar(45) NOT NULL DEFAULT 'N' COMMENT 'Y: Yes, N: No',
  `view_p` varchar(45) NOT NULL DEFAULT 'N',
  `edit_p` varchar(45) NOT NULL DEFAULT 'N',
  `check_p` varchar(45) NOT NULL DEFAULT 'N',
  `delete_p` varchar(45) NOT NULL DEFAULT 'N',
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entry_by` int(10) UNSIGNED NOT NULL,
  `last_updated_time` datetime NOT NULL,
  `last_updated_by` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'Shop woener id'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT 'N/A',
  `logo_url` varchar(255) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `sales_tax` int(11) NOT NULL,
  `fax` varchar(45) DEFAULT NULL,
  `time_zone` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `address_1` varchar(45) DEFAULT NULL,
  `address_2` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `zip` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `vat_reg_no` varchar(45) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `name`, `logo_url`, `email`, `phone`, `sales_tax`, `fax`, `time_zone`, `website`, `address_1`, `address_2`, `city`, `state`, `zip`, `country`, `mobile`, `vat_reg_no`, `status`) VALUES
(53, 'BD FANTACY', 'Logo Jpeg-01.jpg', 'bdf@example.com', '+02165461', 1, '+02165461', 'Asia/Dhaka', 'bdfantacy.com', 'Dhanmondi', 'Gulshan', 'Dhaka', 'Dhaka', '1207', 'BD', '012514541561', '032146541320', 1),
(54, '', 'Logo Jpeg-01.jpg', '', '', 0, '', 'Antarctica/Vostok', '', '', '', '', '', '', '', '', '', 1),
(55, '', 'Logo Jpeg-01.jpg', '', '', 0, '', 'Antarctica/Vostok', '', '', '', '', '', '', '', '', '', 1),
(56, '', 'Logo Jpeg-01.jpg', '', '', 0, '', 'Antarctica/Vostok', '', '', '', '', '', '', '', '', '', 1),
(57, '', '', '', '', 0, '', 'Antarctica/Vostok', '', '', '', '', '', '', '', '', '', 1),
(58, '', '', '', '', 0, '', 'Antarctica/Vostok', '', '', '', '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stock_moves`
--

CREATE TABLE `stock_moves` (
  `id` int(11) NOT NULL,
  `tr_id` varchar(45) NOT NULL,
  `quantity` double DEFAULT NULL,
  `unit_cost` double DEFAULT NULL,
  `total_cost` double DEFAULT NULL,
  `vendor_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_no` varchar(45) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entry_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_moves`
--

INSERT INTO `stock_moves` (`id`, `tr_id`, `quantity`, `unit_cost`, `total_cost`, `vendor_id`, `customer_id`, `order_no`, `status`, `entry_time`, `entry_by`) VALUES
(8, '160831164348', 10, 6500, 65000, 4, 0, NULL, NULL, '2016-08-31 14:43:48', 0),
(9, '160831173816', 0, 60, 0, 0, 0, NULL, NULL, '2016-08-31 15:38:16', 0),
(10, '160917234015', 0, 0, 0, 0, 0, NULL, NULL, '2016-09-17 21:40:15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stock_out`
--

CREATE TABLE `stock_out` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  `unit_cost` varchar(45) DEFAULT NULL,
  `total_cost` varchar(45) DEFAULT NULL,
  `serials` varchar(255) DEFAULT NULL,
  `vendor_id` int(10) UNSIGNED DEFAULT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `order_no` varchar(45) DEFAULT NULL,
  `status` char(1) DEFAULT 'A',
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entry_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tax_class`
--

CREATE TABLE `tax_class` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `rate` double NOT NULL,
  `status` tinyint(1) NOT NULL,
  `entry_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `removable` char(1) DEFAULT 'A',
  `is_sales_default` char(1) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tax_class`
--

INSERT INTO `tax_class` (`id`, `name`, `rate`, `status`, `entry_time`, `removable`, `is_sales_default`) VALUES
(2, 'Local', 8.5, 1, '2016-05-15 18:43:31', 'A', 'N'),
(3, 'Export', 7, 1, '0000-00-00 00:00:00', 'A', 'N'),
(4, 'Import', 5.5, 1, '0000-00-00 00:00:00', 'A', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `status` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `status`, `role`) VALUES
(11, 'admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 'active', 'super_admin');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `bank_name` varchar(45) DEFAULT NULL,
  `bank_ac_no` varchar(45) DEFAULT NULL,
  `paypal` varchar(45) DEFAULT NULL,
  `skrill` varchar(45) DEFAULT NULL,
  `payza` varchar(45) DEFAULT NULL,
  `contact_person_name` varchar(45) DEFAULT NULL,
  `contact_person_phone` varchar(45) DEFAULT NULL,
  `contact_person_email` varchar(45) DEFAULT NULL,
  `contact_person_mobile` varchar(45) DEFAULT NULL,
  `contact_person_designation` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `zip` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `total_purchased_amt` varchar(45) DEFAULT '0',
  `total_paid_amount` varchar(45) DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entry_by` int(10) UNSIGNED DEFAULT NULL,
  `website` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `bank_name`, `bank_ac_no`, `paypal`, `skrill`, `payza`, `contact_person_name`, `contact_person_phone`, `contact_person_email`, `contact_person_mobile`, `contact_person_designation`, `mobile`, `email`, `phone`, `address`, `city`, `state`, `zip`, `country`, `total_purchased_amt`, `total_paid_amount`, `status`, `entry_time`, `entry_by`, `website`) VALUES
(4, 'APCl', 'IDLC', '65465465456', 'as-56498751423', 'as-56465456', 'as-65879814', 'Mr. Mac', '+016212156154', 'test@gmail.com', '016545645646', 'Marketing Executive', '01712371172', 'samraat15@gmail.com', '01712371172', 'Queens', 'New York', 'WDC', '2564956', 'US', '0', '0', 1, '2016-08-29 11:11:08', NULL, 'http://samraat.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_info`
--
ALTER TABLE `company_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_module_app_id` (`app_id`);

--
-- Indexes for table `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pricing_rule`
--
ALTER TABLE `pricing_rule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_group`
--
ALTER TABLE `role_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_group_permission`
--
ALTER TABLE `role_group_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_role_group_permission_group_id` (`role_group_id`),
  ADD KEY `FK_role_group_permission_module_id` (`module_id`),
  ADD KEY `FK_role_group_permission_menu_id` (`menu_id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_moves`
--
ALTER TABLE `stock_moves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_out`
--
ALTER TABLE `stock_out`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax_class`
--
ALTER TABLE `tax_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `company_info`
--
ALTER TABLE `company_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;
--
-- AUTO_INCREMENT for table `payment_type`
--
ALTER TABLE `payment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pricing_rule`
--
ALTER TABLE `pricing_rule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `role_group`
--
ALTER TABLE `role_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `role_group_permission`
--
ALTER TABLE `role_group_permission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `stock_moves`
--
ALTER TABLE `stock_moves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `stock_out`
--
ALTER TABLE `stock_out`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tax_class`
--
ALTER TABLE `tax_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
