-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2024 at 08:18 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `class` varchar(255) DEFAULT NULL,
  `studentno` varchar(255) NOT NULL,
  `studentName` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `stream` varchar(255) DEFAULT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` int(10) DEFAULT NULL,
  `nextphone` int(10) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `village` varchar(255) DEFAULT NULL,
  `studentImage` varchar(255) DEFAULT NULL,
  `parentName` varchar(255) DEFAULT NULL,
  `relation` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `class`, `studentno`, `studentName`, `age`, `stream`, `gender`, `email`, `contactno`, `nextphone`, `country`, `district`, `state`, `village`, `studentImage`, `parentName`, `relation`, `occupation`, `postingDate`, `updationDate`) VALUES
(35, 'G-10', '1818', 'Pathmanathan Krishogaran', 15, 'Select Stream', 'Male', 'haransaki55@gmail.com', 553592628, 760528370, 'Uganda', 'Uva', 'Badulla', 'No - 3 , Main street, Lunugala.', 'IMG_20220318_194748.jpg', 'Pathmanathan', 'Father', 'Farmer', '2024-09-26 06:10:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `permission` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` int(11) NOT NULL,
  `userimage` varchar(255) NOT NULL DEFAULT 'but.jpg',
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `name`, `lastname`, `username`, `email`, `sex`, `permission`, `password`, `mobile`, `userimage`, `status`) VALUES
(15, 'Main', 'Admin', 'admin', 'admin@gmail.com', 'Male', 'Super User', '81dc9bdb52d04dc20036dbd8313ed055', 770546590, 'images.jpeg', 1),
(21, 'Kisho', 'KM', 'kisho', 'kisho@gmail.com', 'Male', 'Super User', '827ccb0eea8a706c4c34a16891f84e7b', 760528956, 'IMG-20240421-WA0019.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `name_with_initials` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `main_class_teacher` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `full_name`, `name_with_initials`, `subject`, `main_class_teacher`, `photo`, `contact_no`, `email`, `address`, `created_at`) VALUES
(23, 'Prabodani Krishogaran', 'K. Prabodani', 'Science', 'G-13', 'images.jpeg', '0760528370', 'haransaki55@gmail.com', 'No - 3, Main street Badulla', '2024-09-26 06:03:37');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `lastname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `userEmail` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `username`, `name`, `lastname`, `userEmail`, `userip`, `loginTime`, `logout`, `status`) VALUES
(211, 'kisho', 'Kisho', 'Ak', 'kisho@gmail.com', 0x3a3a3100000000000000000000000000, '2024-09-18 18:32:03', '18-09-2024 09:45:11 PM', 1),
(213, 'kisho', 'Kisho', 'Ak', 'kisho@gmail.com', 0x3a3a3100000000000000000000000000, '2024-09-18 18:46:57', '18-09-2024 09:47:30 PM', 1),
(214, 'admin', 'Kisho', 'Admin', 'admin@gmail.com', 0x3a3a3100000000000000000000000000, '2024-09-18 18:47:36', NULL, 1),
(215, 'kisho', 'Kisho', 'Ak', 'kisho@gmail.com', 0x3a3a3100000000000000000000000000, '2024-09-18 20:28:46', NULL, 1),
(216, 'admin', 'Kisho', 'Admin', 'admin@gmail.com', 0x3a3a3100000000000000000000000000, '2024-09-18 20:33:44', '18-09-2024 11:34:45 PM', 1),
(217, 'kisho', 'Potential Hacker', NULL, 'Not registered in system', 0x3a3a3100000000000000000000000000, '2024-09-18 20:34:50', NULL, 0),
(218, 'kisho', 'Kisho', 'Ak', 'kisho@gmail.com', 0x3a3a3100000000000000000000000000, '2024-09-18 20:34:57', NULL, 1),
(219, 'kisho', 'Kisho', 'Ak', 'kisho@gmail.com', 0x3a3a3100000000000000000000000000, '2024-09-19 04:13:50', '19-09-2024 07:17:04 AM', 1),
(220, 'admin', 'Kisho', 'Admin', 'admin@gmail.com', 0x3a3a3100000000000000000000000000, '2024-09-19 04:17:10', NULL, 1),
(221, 'kisho', 'Kisho', 'Ak', 'kisho@gmail.com', 0x3a3a3100000000000000000000000000, '2024-09-19 04:37:51', NULL, 1),
(222, 'kisho', 'Kisho', 'Ak', 'kisho@gmail.com', 0x3a3a3100000000000000000000000000, '2024-09-19 08:24:04', NULL, 1),
(223, 'kisho', 'Kisho', 'Ak ', 'kisho@gmail.com', 0x3a3a3100000000000000000000000000, '2024-09-19 11:52:35', NULL, 1),
(224, 'admin', 'Kisho', 'Admin', 'admin@gmail.com', 0x3a3a3100000000000000000000000000, '2024-09-19 12:48:33', NULL, 1),
(225, 'kisho', 'Kisho', 'Ak ', 'kisho@gmail.com', 0x3a3a3100000000000000000000000000, '2024-09-19 13:43:56', NULL, 1),
(226, 'kisho', 'Kisho', 'Ak ', 'kisho@gmail.com', 0x3a3a3100000000000000000000000000, '2024-09-19 14:58:25', NULL, 1),
(227, 'admin', 'Kisho', 'Admin', 'admin@gmail.com', 0x3a3a3100000000000000000000000000, '2024-09-20 05:36:59', NULL, 1),
(228, 'kisho', 'Kisho', 'KM', 'kisho@gmail.com', 0x3a3a3100000000000000000000000000, '2024-09-20 08:30:09', '20-09-2024 11:32:41 AM', 1),
(229, 'kisho', 'Kisho', 'KM', 'kisho@gmail.com', 0x3a3a3100000000000000000000000000, '2024-09-20 08:36:07', NULL, 1),
(230, 'kisho', 'Kisho', 'KM', 'kisho@gmail.com', 0x3a3a3100000000000000000000000000, '2024-09-20 08:47:26', NULL, 1),
(231, 'kisho', 'Kisho', 'KM', 'kisho@gmail.com', 0x3a3a3100000000000000000000000000, '2024-09-20 15:11:13', '20-09-2024 06:13:02 PM', 1),
(232, 'admin', 'Kisho', 'Admin', 'admin@gmail.com', 0x3a3a3100000000000000000000000000, '2024-09-20 15:13:09', '20-09-2024 06:13:12 PM', 1),
(233, 'admin', 'Kisho', 'Admin', 'admin@gmail.com', 0x3a3a3100000000000000000000000000, '2024-09-20 15:13:42', '20-09-2024 06:14:05 PM', 1),
(234, 'aaa', 'Potential Hacker', NULL, 'Not registered in system', 0x3a3a3100000000000000000000000000, '2024-09-20 15:14:11', NULL, 0),
(235, 'kisho', 'Potential Hacker', NULL, 'Not registered in system', 0x3a3a3100000000000000000000000000, '2024-09-20 15:14:19', NULL, 0),
(236, 'kisho', 'Kisho', 'KM', 'kisho@gmail.com', 0x3a3a3100000000000000000000000000, '2024-09-20 15:14:25', '20-09-2024 06:15:11 PM', 1),
(237, 'kisho', 'Potential Hacker', NULL, 'Not registered in system', 0x3a3a3100000000000000000000000000, '2024-09-20 15:35:48', NULL, 0),
(238, 'admin', 'Kisho', 'Admin', 'admin@gmail.com', 0x3a3a3100000000000000000000000000, '2024-09-20 15:35:55', NULL, 1),
(239, 'admin', 'Kisho', 'Admin', 'admin@gmail.com', 0x3a3a3100000000000000000000000000, '2024-09-26 04:18:36', NULL, 1),
(240, 'admin', 'Kisho', 'Admin', 'admin@gmail.com', 0x3a3a3100000000000000000000000000, '2024-09-26 05:57:59', NULL, 1),
(241, 'admin', 'Main', 'Admin', 'admin@gmail.com', 0x3a3a3100000000000000000000000000, '2024-09-26 06:16:12', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
