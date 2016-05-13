-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2016 at 03:28 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hrms_product`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance_tbl`
--

CREATE TABLE IF NOT EXISTS `attendance_tbl` (
`id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `attendence_dt` timestamp(6) NOT NULL,
  `note_title` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Table structure for table `companyreg_tbl`
--

CREATE TABLE IF NOT EXISTS `companyreg_tbl` (
`company_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_email` varchar(50) NOT NULL,
  `company_password` varchar(50) NOT NULL,
  `company_contact` varchar(25) NOT NULL,
  `number_of_employee` varchar(25) NOT NULL,
  `company_plan` enum('free','paid') NOT NULL,
  `registration_date` datetime NOT NULL,
  `is_email_var` enum('active','inactive') NOT NULL,
  `subscription_date` datetime NOT NULL,
  `company_status` enum('active','inactive','reject') NOT NULL,
  `company_img` varchar(50) NOT NULL,
  `verfication_code` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_tbl`
--

CREATE TABLE IF NOT EXISTS `employee_tbl` (
`employee_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `last_name` varchar(35) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(45) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `alternate_no` varchar(20) NOT NULL,
  `family_no` varchar(20) NOT NULL,
  `local_address` varchar(250) NOT NULL,
  `permanent_address` varchar(250) NOT NULL,
  `image` varchar(100) NOT NULL,
  `education` varchar(15) NOT NULL,
  `date_of_birth` varchar(25) NOT NULL,
  `date_of_joining` varchar(35) NOT NULL,
  `bank_name` varchar(45) NOT NULL,
  `bank_branch_name` varchar(45) NOT NULL,
  `account_no` varchar(35) NOT NULL,
  `ifsc_code` varchar(35) NOT NULL,
  `number_of_leaves` varchar(35) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Table structure for table `holiday_tbl`
--

CREATE TABLE IF NOT EXISTS `holiday_tbl` (
`holiday_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `holiday_name` varchar(45) NOT NULL,
  `holiday_date` varchar(25) NOT NULL,
  `holiday_days` varchar(35) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Table structure for table `leave_manag_tbl`
--

CREATE TABLE IF NOT EXISTS `leave_manag_tbl` (
`leave_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `total_leave` varchar(25) NOT NULL,
  `leave_taken` varchar(25) NOT NULL,
  `leave_date` varchar(25) NOT NULL,
  `leave_days` varchar(25) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `login_tbl`
--

CREATE TABLE IF NOT EXISTS `login_tbl` (
`login_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(50) NOT NULL,
  `login_status` enum('active','inactive') NOT NULL,
  `user_type` varchar(25) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `main_super_admin`
--

CREATE TABLE IF NOT EXISTS `main_super_admin` (
`superadmin_id` int(11) NOT NULL,
  `superadmin_email` varchar(50) NOT NULL,
  `superadmin_password` varchar(50) NOT NULL,
  `superadmin_image` varchar(35) NOT NULL,
  `superadmin_status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `master_country`
--

CREATE TABLE IF NOT EXISTS `master_country` (
`country_id` int(11) NOT NULL,
  `country_name` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `notification_tbl`
--

CREATE TABLE IF NOT EXISTS `notification_tbl` (
`notification_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `notif_message` varchar(200) NOT NULL,
  `notif_type` varchar(15) NOT NULL,
  `notif_date` varchar(15) NOT NULL,
  `to_show` varchar(35) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_tbl`
--
ALTER TABLE `attendance_tbl`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companyreg_tbl`
--
ALTER TABLE `companyreg_tbl`
 ADD PRIMARY KEY (`company_id`), ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
 ADD PRIMARY KEY (`employee_id`), ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `holiday_tbl`
--
ALTER TABLE `holiday_tbl`
 ADD PRIMARY KEY (`holiday_id`);

--
-- Indexes for table `leave_manag_tbl`
--
ALTER TABLE `leave_manag_tbl`
 ADD PRIMARY KEY (`leave_id`), ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `login_tbl`
--
ALTER TABLE `login_tbl`
 ADD PRIMARY KEY (`login_id`), ADD KEY `company_id` (`company_id`), ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `main_super_admin`
--
ALTER TABLE `main_super_admin`
 ADD PRIMARY KEY (`superadmin_id`);

--
-- Indexes for table `master_country`
--
ALTER TABLE `master_country`
 ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `notification_tbl`
--
ALTER TABLE `notification_tbl`
 ADD PRIMARY KEY (`notification_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_tbl`
--
ALTER TABLE `attendance_tbl`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `companyreg_tbl`
--
ALTER TABLE `companyreg_tbl`
MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `holiday_tbl`
--
ALTER TABLE `holiday_tbl`
MODIFY `holiday_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `leave_manag_tbl`
--
ALTER TABLE `leave_manag_tbl`
MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `login_tbl`
--
ALTER TABLE `login_tbl`
MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `main_super_admin`
--
ALTER TABLE `main_super_admin`
MODIFY `superadmin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `master_country`
--
ALTER TABLE `master_country`
MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notification_tbl`
--
ALTER TABLE `notification_tbl`
MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `companyreg_tbl`
--
ALTER TABLE `companyreg_tbl`
ADD CONSTRAINT `companyreg_tbl_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `master_country` (`country_id`);

--
-- Constraints for table `leave_manag_tbl`
--
ALTER TABLE `leave_manag_tbl`
ADD CONSTRAINT `leave_manag_tbl_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee_tbl` (`employee_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
