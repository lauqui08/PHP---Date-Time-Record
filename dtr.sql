-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2017 at 11:43 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dtr`
--

-- --------------------------------------------------------

--
-- Table structure for table `dtr`
--

CREATE TABLE `dtr` (
  `id` int(11) NOT NULL,
  `idnum` varchar(20) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `position` varchar(100) NOT NULL,
  `edate` varchar(200) NOT NULL,
  `am_in` varchar(50) NOT NULL,
  `am_out` varchar(50) NOT NULL,
  `pm_in` varchar(50) NOT NULL,
  `pm_out` varchar(50) NOT NULL,
  `ot_in` varchar(50) NOT NULL,
  `ot_out` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtr`
--

INSERT INTO `dtr` (`id`, `idnum`, `fullname`, `position`, `edate`, `am_in`, `am_out`, `pm_in`, `pm_out`, `ot_in`, `ot_out`) VALUES
(1, '00024', 'Kobe Bryant', 'Shooting Guard', 'Friday 16 June 2017', '17:38:25', '17:39:31', '17:39:40', '17:40:04', '17:40:27', '17:40:32'),
(2, '00021', 'Kevin Garnett', 'Center', 'Friday 16 June 2017', '17:38:34', '17:40:00', '', '', '', ''),
(3, '00005', 'Jason Kidd', 'Point Guard', 'Friday 16 June 2017', '17:38:40', '17:39:54', '17:40:51', '', '', ''),
(4, '00001', 'Tracy Mcgrady', 'Small Forward', 'Friday 16 June 2017', '17:38:46', '17:39:49', '17:40:20', '', '', ''),
(5, '00041', 'Dirk Nowitzki', 'Power Forward', 'Friday 16 June 2017', '17:38:52', '17:39:17', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee_info`
--

CREATE TABLE `employee_info` (
  `id` int(11) NOT NULL,
  `idnum` varchar(20) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_info`
--

INSERT INTO `employee_info` (`id`, `idnum`, `fullname`, `position`) VALUES
(2, '00024', 'Kobe Bryant', 'Shooting Guard'),
(3, '00001', 'Tracy Mcgrady', 'Small Forward'),
(4, '00041', 'Dirk Nowitzki', 'Power Forward'),
(5, '00005', 'Jason Kidd', 'Point Guard'),
(6, '00021', 'Kevin Garnett', 'Center');

-- --------------------------------------------------------

--
-- Table structure for table `time_log`
--

CREATE TABLE `time_log` (
  `id` int(11) NOT NULL,
  `idnum` varchar(20) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `position` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_log`
--

INSERT INTO `time_log` (`id`, `idnum`, `fullname`, `date`, `position`, `status`, `time`) VALUES
(1, '00024', 'Kobe Bryant', 'Friday 16 June 2017', 'Shooting Guard', 'time-in', '17:38:25'),
(2, '00021', 'Kevin Garnett', 'Friday 16 June 2017', 'Center', 'time-in', '17:38:34'),
(3, '00005', 'Jason Kidd', 'Friday 16 June 2017', 'Point Guard', 'time-in', '17:38:40'),
(4, '00001', 'Tracy Mcgrady', 'Friday 16 June 2017', 'Small Forward', 'time-in', '17:38:46'),
(5, '00041', 'Dirk Nowitzki', 'Friday 16 June 2017', 'Power Forward', 'time-in', '17:38:52'),
(6, '00041', 'Dirk Nowitzki', 'Friday 16 June 2017', 'Power Forward', 'time-out', '17:39:17'),
(7, '00024', 'Kobe Bryant', 'Friday 16 June 2017', 'Shooting Guard', 'time-out', '17:39:31'),
(8, '00024', 'Kobe Bryant', 'Friday 16 June 2017', 'Shooting Guard', 'time-in', '17:39:40'),
(9, '00001', 'Tracy Mcgrady', 'Friday 16 June 2017', 'Small Forward', 'time-out', '17:39:49'),
(10, '00005', 'Jason Kidd', 'Friday 16 June 2017', 'Point Guard', 'time-out', '17:39:54'),
(11, '00021', 'Kevin Garnett', 'Friday 16 June 2017', 'Center', 'time-out', '17:40:00'),
(12, '00024', 'Kobe Bryant', 'Friday 16 June 2017', 'Shooting Guard', 'time-out', '17:40:04'),
(13, '00001', 'Tracy Mcgrady', 'Friday 16 June 2017', 'Small Forward', 'time-in', '17:40:20'),
(14, '00024', 'Kobe Bryant', 'Friday 16 June 2017', 'Shooting Guard', 'time-in', '17:40:27'),
(15, '00024', 'Kobe Bryant', 'Friday 16 June 2017', 'Shooting Guard', 'time-out', '17:40:32'),
(16, '00005', 'Jason Kidd', 'Friday 16 June 2017', 'Point Guard', 'time-in', '17:40:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dtr`
--
ALTER TABLE `dtr`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idnum` (`idnum`);

--
-- Indexes for table `employee_info`
--
ALTER TABLE `employee_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idnum` (`idnum`);

--
-- Indexes for table `time_log`
--
ALTER TABLE `time_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dtr`
--
ALTER TABLE `dtr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `employee_info`
--
ALTER TABLE `employee_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `time_log`
--
ALTER TABLE `time_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
