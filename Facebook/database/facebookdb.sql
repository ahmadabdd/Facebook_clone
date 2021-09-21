-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2021 at 09:09 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facebookdb`
--
CREATE DATABASE IF NOT EXISTS `facebookdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `facebookdb`;

-- --------------------------------------------------------

--
-- Table structure for table `connections`
--

CREATE TABLE `connections` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `status` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `connections`
--

INSERT INTO `connections` (`id`, `user_id`, `friend_id`, `status`) VALUES
(3, 7, 4, 1),
(4, 4, 9, 3),
(6, 4, 10, 3),
(7, 4, 7, 1),
(10, 1, 7, 1),
(11, 7, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `text`) VALUES
(1, 1, 'Houssam Lababidi sent you a friend request'),
(2, 4, 'Ahmad  Abd sent you a friend request'),
(3, 7, 'Abdullah Alshami blocked you'),
(4, 2, 'Abdullah Alshami sent you a friend request'),
(5, 3, 'Abdullah Alshami blocked you'),
(6, 9, 'Abdullah Alshami sent you a friend request'),
(7, 10, 'Ahmad  Abd removed you as a firend'),
(8, 3, 'Abdullah Alshami sent you a friend request'),
(9, 4, 'Abdullah Alshami accepted your friend request'),
(10, 1, 'Abdullah Alshami accepted your friend request'),
(11, 9, 'Abdullah Alshami declined your friend request'),
(12, 1, 'Abdullah Alshami removed you as a firend'),
(13, 4, 'Abdullah Alshami blocked you'),
(14, 7, 'Abdullah Alshami unblocked you'),
(15, 7, 'Abdullah Alshami unblocked you'),
(16, 1, 'ahmad unblocked you'),
(17, 1, 'abd unblocked you'),
(18, 1, 'abd unblocked you'),
(19, 1, 'Abdullah Alshami blocked you'),
(20, 1, 'abd unblocked you'),
(21, 1, 'abd unblocked you'),
(22, 7, 'Abdullah Alshami blocked you'),
(23, 8, 'Abdullah Alshami blocked you'),
(24, 1, 'abd unblocked you'),
(25, 1, 'abd unblocked you'),
(26, 8, 'abd unblocked you'),
(27, 7, 'Abdullah Alshami unblocked you'),
(28, 1, 'Abdullah Alshami sent you a friend request'),
(29, 3, 'Abdullah Alshami blocked you'),
(30, 7, 'Abdullah Alshami sent you a friend request'),
(31, 9, 'Abdullah Alshami blocked you'),
(32, 4, 'Ahmad  Abd accepted your friend request'),
(33, 1, 'Abdullah Alshami removed you as a firend'),
(34, 3, 'Abdullah Alshami unblocked you'),
(35, 10, 'Abdullah Alshami blocked you'),
(36, 4, 'Nader Zaeter accepted your friend request'),
(37, 1, 'Nader Zaeter sent you a friend request'),
(38, 7, 'Ahmad  Abd accepted your friend request'),
(39, 7, 'Ahmad  Abd removed you as a firend'),
(40, 1, 'Nader Zaeter sent you a friend request'),
(41, 7, 'Ahmad  Abd accepted your friend request');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `phone`, `password`) VALUES
(1, 'Ahmad  Abd', 'ahmad.ah.ab0000@gmail.com', '76917535', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5'),
(2, 'Aya Badr', 'aya.badr@gmail.com', '76138220', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5'),
(3, 'Ranim Obeidi', 'ranim@gmail.com', '3027690', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5'),
(4, 'Abdullah Alshami', 'abdullah@gmail.com', '78822178', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5'),
(7, 'Nader Zaeter', 'nader@gmail.com', '3020110', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5'),
(8, 'Tala Badr', 'tala@gmail.com', '2010236', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5'),
(9, 'Ahmad Balkis', 'ahmad.balkis@gmail.com', '76016086', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5'),
(10, 'Houssam Lababidi', 'houssam@gmail.com', '03020102', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `connections`
--
ALTER TABLE `connections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `connections`
--
ALTER TABLE `connections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
