-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2022 at 05:57 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `landregistry`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `wallet` varchar(50) NOT NULL,
  `aadhaar` int(12) NOT NULL,
  `role` int(11) NOT NULL,
  `verified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `user_name`, `password`, `email`, `wallet`, `aadhaar`, `role`, `verified`) VALUES
(1, 'admin', '5125df097343a2647e8ec321e9bedcc7', 'admin@email.com', 'xdce6294e0bcb917b1222de3bef70c406c552acf165', 000000000000, 0, 0),
(2, 'seller1', '5125df097343a2647e8ec321e9bedcc7', 'seller1@email.com', 'xdce6294e0bcb917b1555de3bef70c406c552acf165', 111122221111, 1, 1),
(3, 'buyer1', '5125df097343a2647e8ec321e9bedcc7', 'buyer1@email.com', 'xdce6294e0bcb917b1333de3bef70c406c552acf165', 111100001111, 2, 1),
(3, 'buyer2', '5125df097343a2647e8ec321e9bedcc7', 'buyer2@email.com', 'xdce6294e0bcb917b1333de3bef70c406c552acf165', 000011110000, 2, 1),
(4, 'seller2', '5125df097343a2647e8ec321e9bedcc7', 'seller2@email.com', 'xdce6294e0bcb917b1666de3bef70c406c552acf165', 222211112222, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `id` int(11) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `owner_wallet` varchar(50) NOT NULL,
  `country` text NOT NULL,
  `state` text NOT NULL,
  `city` text NOT NULL,
  `propertyaddress` text NOT NULL,
  `latitude` text NOT NULL,
  `longitude` text NOT NULL,
  `verifier` varchar(50) NOT NULL,
  `hash` varchar(50) NOT NULL,
  `verified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `owner`, `owner_wallet`, `country`, `state`, `city`, `propertyaddress`, `latitude`, `longitude`, `verifier`, `hash`, `verified`) VALUES
(1, '', '', 'India', 'Andhra Pradesh', 'Adilabad', 'Lorem ipsum dolor sit amet consectetur', '123', '345', '', '', 0),
(2, 'pradeep', '', 'India', 'Andhra Pradesh', 'Adilabad', 'adipisicing elit, Accusamus amet', '111', '0', '', '', 0),
(3, 'pradeep', 'xdce6294e0bcb917b1555de3bef70c406c552acf165', 'India', 'Andhra Pradesh', 'Adilabad', 'illum exercitationem porro', '0', '111', '', '', 0),
(4, 'pradeep', 'xdce6294e0bcb917b1555de3bef70c406c552acf165', 'India', 'Tamil Nadu', 'Chennai', 'reiciendis animi non', '0', '0', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `users`
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
