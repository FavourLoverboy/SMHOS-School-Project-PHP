-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2022 at 04:04 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `favhomecell`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `otherName` varchar(20) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `timeIn` varchar(20) NOT NULL,
  `timeOut` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `lastName`, `firstName`, `otherName`, `sex`, `timeIn`, `timeOut`, `date`) VALUES
(35, 'Nwokama', 'Favour', 'Ehio', 'Male', '01:01:28', '', '2021-10-07'),
(36, 'Kenneth', 'Precious', 'John', 'Male', '', '', '2021-10-07'),
(37, 'Awo', 'John', 'Phillip', 'Male', '01:01:12', '01:01:32', '2021-10-07'),
(38, 'Nwokama', 'Favour', 'Ehio', 'Male', '12:51:56', '12:52:27', '2021-10-18'),
(39, 'Kenneth', 'Precious', 'John', 'Male', '', '', '2021-10-18'),
(40, 'Awo', 'John', 'Phillip', 'Male', '12:52:09', '', '2021-10-18'),
(41, 'Nwokama', 'Favour', 'Ehio', 'Male', '10:57:23', '10:57:53', '2021-11-06'),
(42, 'Kenneth', 'Precious', 'John', 'Male', '', '', '2021-11-06'),
(43, 'Awo', 'John', 'Phillip', 'Male', '10:57:33', '', '2021-11-06'),
(44, 'Nwokama', 'Favour', 'Ehio', 'Male', '12:05:44', '', '2021-12-19'),
(45, 'Kenneth', 'Precious', 'John', 'Male', '12:07:41', '', '2021-12-19'),
(46, 'Awo', 'John', 'Phillip', 'Male', '12:06:34', '12:06:44', '2021-12-19'),
(47, 'Nwokama', 'Favour', 'Ehio', 'Male', '', '', '2022-01-12'),
(48, 'Kenneth', 'Precious', 'John', 'Male', '', '', '2022-01-12'),
(49, 'Awo', 'John', 'Phillip', 'Male', '', '', '2022-01-12');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `memId` int(11) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `otherName` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(7) NOT NULL,
  `email` varchar(30) NOT NULL,
  `number` varchar(20) NOT NULL,
  `occupation` varchar(20) NOT NULL,
  `maritalStatus` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `town` varchar(20) NOT NULL,
  `areYouAMember` varchar(10) NOT NULL,
  `churchName` varchar(30) NOT NULL,
  `churchBranch` varchar(30) NOT NULL,
  `areYouBaptised` varchar(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memId`, `lastName`, `firstName`, `otherName`, `dob`, `sex`, `email`, `number`, `occupation`, `maritalStatus`, `address`, `nationality`, `state`, `town`, `areYouAMember`, `churchName`, `churchBranch`, `areYouBaptised`, `date`, `status`) VALUES
(1, 'Nwokama', 'Favour', 'Ehio', '2001-08-27', 'Male', 'favour@gmail.com', '08097048450', 'Full stack web devel', 'Single', 'Rumuokwuta', 'Nigeria', 'Rivers', 'Ph', 'Yes', 'Smhos', 'Rumuokwuta', 'Yes', '2021-10-05 01:00:21', 'Active'),
(2, 'Kenneth', 'Precious', 'John', '2000-01-01', 'Male', 'kenneth@gmail.com', '01765282452', 'Student', 'Widower', 'Town', 'Nigeria', 'Abia', 'Aba', 'Yes', 'Smhos', 'Rose Center', 'No', '2021-10-05 01:02:57', 'Active'),
(3, 'Awo', 'John', 'Phillip', '2005-11-17', 'Male', 'awo@gmail.com', '34565435282', 'Trader', 'Married', 'Agip', 'Nigeria', 'Bayelsa', 'Bayelsa', 'No', 'Winners', 'Along', 'No', '2021-10-05 01:05:17', 'Active'),
(4, 'Anna', 'Princess', 'Testimony', '2006-06-29', 'Female', 'anna@gmail.com', '23425463728', 'Doctor', 'Married', 'New Road', 'Nigeria', 'Akwa ibom', 'Uyo', 'No', 'Redeem', 'King david parish', 'Yes', '2021-10-05 01:07:57', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `id` int(11) NOT NULL,
  `theme` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`id`, `theme`, `date`) VALUES
(16, 'God\'s Love Feats', '2021-10-07 01:01:00'),
(17, 'Love', '2021-10-18 12:51:28'),
(18, 'Love', '2021-11-06 10:57:14'),
(19, 'Love feast', '2021-12-19 12:05:22'),
(20, 'God\'s Love', '2022-01-12 10:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `position` varchar(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `password`, `email`, `position`, `date`, `status`) VALUES
(1, 'favour', 'favour', 'favour@gmail.com', 'Admin', '2021-10-02 17:49:20', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memId`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `memId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
