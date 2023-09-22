-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2023 at 12:11 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_mgmt_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `ID` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `deletedStatus` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`ID`, `department_name`, `added_by`, `deletedStatus`, `created_at`) VALUES
(1, 'Head', 'Admin', 0, '2023-09-22 09:22:16'),
(2, 'IT ', 'Admin', 0, '2023-09-22 09:22:29'),
(3, 'Account', 'Admin', 0, '2023-09-22 09:22:51'),
(4, 'Human Resources', 'Admin', 0, '2023-09-22 09:25:39');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `ID` int(11) NOT NULL,
  `department_name` varchar(255) DEFAULT NULL,
  `designation_name` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `deletedStatus` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`ID`, `department_name`, `designation_name`, `added_by`, `deletedStatus`, `created_at`) VALUES
(1, 'Head', 'Administrator', 'Admin', 0, '2023-09-22 09:23:49'),
(2, 'IT ', 'Software Developer', 'Admin', 0, '2023-09-22 09:24:55'),
(3, 'Account', 'Chartered Accountant', 'Admin', 0, '2023-09-22 09:25:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Emp_id` varchar(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Phone_no` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Emp_deptment` varchar(255) DEFAULT NULL,
  `Emp_designation` varchar(255) DEFAULT NULL,
  `Date_of_Birth` varchar(255) DEFAULT NULL,
  `Emp_joining_date` date DEFAULT NULL,
  `Emp_reporting` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `DeletedStatus` int(11) NOT NULL DEFAULT 0,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Emp_id`, `Name`, `Phone_no`, `Email`, `Password`, `Emp_deptment`, `Emp_designation`, `Date_of_Birth`, `Emp_joining_date`, `Emp_reporting`, `added_by`, `DeletedStatus`, `Created_at`) VALUES
(1, 'TMS000', 'Admin', '9876543210', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'Head', 'Admin', '1998-05-20', NULL, NULL, NULL, 0, '2023-09-12 04:54:37'),
(2, 'TMS001', 'Admin', '9876543210', 'admin@tms.com', '202cb962ac59075b964b07152d234b70', 'Head', 'Administrator', '2000-02-10', '2023-09-14', '', 'Admin', 0, '2023-09-22 09:41:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
