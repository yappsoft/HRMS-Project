-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2016 at 02:34 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `companyreg_tbl`
--

INSERT INTO `companyreg_tbl` (`company_id`, `country_id`, `company_name`, `company_email`, `company_password`, `company_contact`, `number_of_employee`, `company_plan`, `registration_date`, `is_email_var`, `subscription_date`, `company_status`, `company_img`, `verfication_code`) VALUES
(8, 1, 'testing user', 'user@test.com', 'vija7898', '975577548', '2', 'free', '2016-05-12 17:24:54', 'inactive', '2016-05-12 17:24:54', 'inactive', '', 'eeab59e1015c78d006f6ab6aaa62f2a4'),
(9, 1, 'demo', 'user@demo.com', 'vija7898', '975575874', '1', 'paid', '2016-05-12 17:25:48', 'inactive', '2016-05-12 17:25:48', 'active', '', '51bdce10cece492fa6ac9a24312c3a7e'),
(10, 1, 'DEmo comapny', 'demo@demo.com', 'vija7898', '9755775748', '5', 'free', '2016-05-12 17:34:39', 'inactive', '2016-05-12 17:34:39', 'active', '', 'beb1faacff277ceb0551b4e54bf6e442');

-- --------------------------------------------------------

--
-- Table structure for table `employee_tbl`
--

CREATE TABLE IF NOT EXISTS `employee_tbl` (
`employee_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `first_name` varchar(35) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `employee_tbl`
--

INSERT INTO `employee_tbl` (`employee_id`, `company_id`, `first_name`, `last_name`, `email`, `password`, `mobile_no`, `alternate_no`, `family_no`, `local_address`, `permanent_address`, `image`, `education`, `date_of_birth`, `date_of_joining`, `bank_name`, `bank_branch_name`, `account_no`, `ifsc_code`, `number_of_leaves`) VALUES
(1, 1, 'yogendra', 'chouhan', '', '123', '8120255757', '9407295756', '8120255757', 'indore', 'indore', 'ffshfh.jpg', 'B.E.', '', '5/5/2016', 'bank of maharastra', 'indore', '497402010018257', 'mh1006', '15'),
(4, 0, 'Deepak', 'Singh', 'deepak.singhamit@gmail.com', '12345678', '1234567890', '12345', '12345', 'karamahari', 'indore', '', 'BE', '', '05/12/2016', 'SBI', 'DLN', '12345', 'sbi', '12'),
(6, 0, 'vijay', 'ijardar', 'vijay@yappsoft.com', '12345678', '123456', '123456', '123456', 'mhow', 'indore', '', 'BE', '', '05/12/2016', 'SBI', 'INDORE', '12345', 'sbi', '10'),
(7, 0, 'd', 'd', 'd@gmail.com', '12345678', '1234567890', '12345', '12345', 'd', 'd', '', 'BE', '', '05/13/2016', 'SBI', 'DLN', '5454545454', 'sbi', '100'),
(8, 0, 'k', 'k', 'k@gmail.com', '12345678', '123456', '123456', '12345', 'k', 'k', '', 'BE', 'Day-Month-Year', '05/13/2016', 'kkkk', 'DLN', '5454545454', 'sbi', '100'),
(9, 0, 'k', 'k', 'k@gmail.com', '12345678', '123456', '123456', '12345', 'k', 'k', '', 'BE', '3-3-3', '05/13/2016', 'kkkk', 'DLN', '5454545454', 'sbi', '100'),
(10, 0, 'nit', 'pat', 'nit@gmail.com', '12345678', '12345', '12345', '12345', 'nit', 'nit', '', 'BE', '3-3-3', '05/13/2016', 'SBI', 'DLN', '12345', 'sbi', '100'),
(11, 0, 'deno', 'demo', 'demmo@vj.com', 'vija7898', '788787', '8788878', '9755775748', 'indore', 'indore', '', 'BE', '3-2-3', '30-10-1994', 'indore', 'Indore', '999999999', 'indore', '10');

-- --------------------------------------------------------

--
-- Table structure for table `holiday_tbl`
--

CREATE TABLE IF NOT EXISTS `holiday_tbl` (
`holiday_id` int(11) NOT NULL,
  `holiday_name` varchar(45) NOT NULL,
  `holiday_date` varchar(25) NOT NULL,
  `holiday_days` varchar(35) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `holiday_tbl`
--

INSERT INTO `holiday_tbl` (`holiday_id`, `holiday_name`, `holiday_date`, `holiday_days`) VALUES
(1, 'vijay', '09/29/2016', 'thursday'),
(2, 'yogen', '05/23/2016', 'monday'),
(3, 'achint', '05/25/2016', 'monday'),
(4, 'deepak', '05/29/2016', 'sunday'),
(5, 'nitish', '03/05/2016', 'tuesday'),
(6, 'ruchi', '03/05/2016', 'tuesday'),
(7, 'asdda', '03/28/2016', 'tuesday'),
(10, 'demom hloi', '05/20/2016', 'tuesday');

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

--
-- Dumping data for table `leave_manag_tbl`
--

INSERT INTO `leave_manag_tbl` (`leave_id`, `employee_id`, `total_leave`, `leave_taken`, `leave_date`, `leave_days`) VALUES
(1, 1, '18', '3', '3/5/2016', 'monday');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `login_tbl`
--

INSERT INTO `login_tbl` (`login_id`, `employee_id`, `company_id`, `username`, `email`, `password`, `login_status`, `user_type`) VALUES
(6, 0, 8, '', 'user@test.com', 'vija7898', 'inactive', 'admin'),
(7, 0, 9, '', 'user@demo.com', 'vija7898', 'active', 'admin'),
(8, 0, 10, '', 'demo@demo.com', 'vija7898', 'active', 'admin');

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

--
-- Dumping data for table `main_super_admin`
--

INSERT INTO `main_super_admin` (`superadmin_id`, `superadmin_email`, `superadmin_password`, `superadmin_image`, `superadmin_status`) VALUES
(1, 'kamlesh.yappsoft@gmail.com', '123', 'hfgh.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `master_country`
--

CREATE TABLE IF NOT EXISTS `master_country` (
`country_id` int(11) NOT NULL,
  `country_name` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `master_country`
--

INSERT INTO `master_country` (`country_id`, `country_name`) VALUES
(1, 'india');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `notification_tbl`
--

INSERT INTO `notification_tbl` (`notification_id`, `company_id`, `notif_message`, `notif_type`, `notif_date`, `to_show`) VALUES
(9, 10, 'a DEmo comapny has send request for account register', 'user request', '2016-05-12 17:3', '');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `companyreg_tbl`
--
ALTER TABLE `companyreg_tbl`
MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `holiday_tbl`
--
ALTER TABLE `holiday_tbl`
MODIFY `holiday_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `leave_manag_tbl`
--
ALTER TABLE `leave_manag_tbl`
MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `login_tbl`
--
ALTER TABLE `login_tbl`
MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
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
MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
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
