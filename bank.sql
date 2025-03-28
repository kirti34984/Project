-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2024 at 01:23 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `message` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`first_name`, `last_name`, `email`, `subject`, `message`) VALUES
('Vanshi', 'R', 'vanshi@gmail.com', 'Error in adding records', 'Please see into it'),
('Kashi', 'Milan', 'kashi@gmail.com', 'Issue', 'Please see into it ');

-- --------------------------------------------------------

--
-- Table structure for table `personal_details`
--

CREATE TABLE `personal_details` (
  `resource_person` varchar(50) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `organization_name` varchar(50) DEFAULT NULL,
  `organization_city` varchar(50) DEFAULT NULL,
  `pan_card` varchar(50) DEFAULT NULL,
  `aadhar_card` varchar(50) DEFAULT NULL,
  `account_holder_name` varchar(50) DEFAULT NULL,
  `account_no` varchar(50) DEFAULT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `branch_name` varchar(50) DEFAULT NULL,
  `ifsc_code` varchar(50) DEFAULT NULL,
  `mobile_no` int(11) DEFAULT NULL,
  `email_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal_details`
--

INSERT INTO `personal_details` (`resource_person`, `designation`, `organization_name`, `organization_city`, `pan_card`, `aadhar_card`, `account_holder_name`, `account_no`, `bank_name`, `branch_name`, `ifsc_code`, `mobile_no`, `email_id`) VALUES
('vanshi', 'Accounts', 'IIS', 'Jaipur', 'ABCDE1234F', '987456312085', 'Vanshi', 'A102', 'SBI', 'SFS', 'SBIN0000691', 2147483647, 'vanshi@gmail.com'),
('Kashi', 'Accounts', 'IIS', 'Jaipur', 'GHIJK9879L', '987456312059', 'Kashi', 'A103', 'ICICI', 'SFS', 'ICIC0000015', 2147483647, 'kashi@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
