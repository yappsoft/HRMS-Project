-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 07, 2016 at 11:37 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrms_product`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_table`
--

CREATE TABLE `employee_table` (
  `employee_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `first_name` varchar(35) NOT NULL,
  `last_name` varchar(35) NOT NULL,
  `password` varchar(45) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `alternate_no` varchar(20) NOT NULL,
  `family_no` varchar(20) NOT NULL,
  `local_address` varchar(250) NOT NULL,
  `permanent_address` varchar(250) NOT NULL,
  `image` varchar(100) NOT NULL,
  `education` varchar(15) NOT NULL,
  `date_of_joining` varchar(35) NOT NULL,
  `bank_name` varchar(45) NOT NULL,
  `bank_branch_name` varchar(45) NOT NULL,
  `account_no` varchar(35) NOT NULL,
  `ifsc_code` varchar(35) NOT NULL,
  `number_of_leaves` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `holiday_table`
--

CREATE TABLE `holiday_table` (
  `holiday_id` int(11) NOT NULL,
  `holiday_name` varchar(45) NOT NULL,
  `holiday_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

-- --------------------------------------------------------

--
-- Table structure for table `leave_management_table`
--

CREATE TABLE `leave_management_table` (
  `employee_id` int(11) NOT NULL,
  `total_leaves` varchar(15) NOT NULL,
  `leaves_taken` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

CREATE TABLE `login_table` (
  `employee_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `main_super_admin`
--

CREATE TABLE `main_super_admin` (
  `superadmin_id` int(11) NOT NULL,
  `superadmin_email` varchar(50) NOT NULL,
  `superadmin_password` varchar(50) NOT NULL,
  `superadmin_image` varchar(35) NOT NULL,
  `superadmin_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_country`
--

CREATE TABLE `master_country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration_table`
--

CREATE TABLE `registration_table` (
  `company_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_email` int(50) NOT NULL,
  `company_password` varchar(50) NOT NULL,
  `company_contact` varchar(25) NOT NULL,
  `number_of_employee` varchar(25) NOT NULL,
  `company_plan` varchar(20) NOT NULL,
  `registration_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_table`
--
ALTER TABLE `employee_table`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `leave_management_table`
--
ALTER TABLE `leave_management_table`
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `company_id` (`company_id`);

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
-- Indexes for table `registration_table`
--
ALTER TABLE `registration_table`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `country_id` (`country_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `holiday_table`
--
ALTER TABLE `holiday_table`
  MODIFY `holiday_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `main_super_admin`
--
ALTER TABLE `main_super_admin`
  MODIFY `superadmin_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_country`
--
ALTER TABLE `master_country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `leave_management_table`
--
ALTER TABLE `leave_management_table`
  ADD CONSTRAINT `leave_management_table_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee_table` (`employee_id`);

--
-- Constraints for table `registration_table`
--
ALTER TABLE `registration_table`
  ADD CONSTRAINT `registration_table_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `master_country` (`country_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
