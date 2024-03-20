-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2024 at 11:30 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookachef`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookings`
--

CREATE TABLE `tbl_bookings` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `guest` int(100) NOT NULL,
  `date` date NOT NULL,
  `meal` varchar(100) NOT NULL,
  `cuisine` varchar(100) NOT NULL,
  `ingredients` varchar(200) NOT NULL,
  `restrictions` varchar(1000) NOT NULL,
  `conditions` longtext NOT NULL,
  `dishes` varchar(200) NOT NULL,
  `request` varchar(50) NOT NULL DEFAULT 'Open',
  `direct_request` varchar(200) NOT NULL DEFAULT 'NA',
  `status` varchar(200) NOT NULL DEFAULT 'Order Received',
  `payment` varchar(200) NOT NULL DEFAULT 'NA',
  `amount` int(11) NOT NULL,
  `chef_update` int(11) NOT NULL DEFAULT 0,
  `payment_id` varchar(500) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_bookings`
--

INSERT INTO `tbl_bookings` (`id`, `user`, `city`, `guest`, `date`, `meal`, `cuisine`, `ingredients`, `restrictions`, `conditions`, `dishes`, `request`, `direct_request`, `status`, `payment`, `amount`, `chef_update`, `payment_id`, `created_on`) VALUES
(2, 3, 'Chennai', 3, '2024-02-14', 'Dinner', '14', 'Chef', 'Dairy', 'I don\\\'t like gee', '1,2,3,4', 'Open', '2', 'Accepted', 'NA', 0, 0, '', '2024-02-02 03:15:50'),
(3, 3, 'Mumbai', 3, '2024-02-29', 'Lunch', '14', 'Customer', 'Shellfish,Dairy', 'I dont like mutton', '2,3,4', 'Open', '2', 'Paid', 'YES', 1451, 1, 'pay_NXRduVx9bBLpjt', '2024-02-02 05:07:45'),
(4, 3, 'Chennai', 14, '2024-03-19', 'Dinner', '14', '', 'Vegetarian', 'I like Chicken', '1,2,3,4', 'Open', '2', 'Paid', 'YES', 9664, 0, 'pay_NXYoiMVpZ0grMP', '2024-02-05 11:27:59'),
(10, 3, 'chennai', 5, '2024-02-07', 'Breakfast', '14', '', '', 'nvbvvbvbvfhdid', '3', 'Open', 'NA', 'Order Received', 'NA', 0, 0, '', '2024-02-06 10:43:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`) VALUES
(1, 'Sandwich'),
(2, 'Deserts');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cuisines`
--

CREATE TABLE `tbl_cuisines` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_cuisines`
--

INSERT INTO `tbl_cuisines` (`id`, `name`, `created_on`) VALUES
(1, 'French ', '2023-12-13 09:53:27'),
(2, 'Chinese ', '2023-12-13 09:53:27'),
(3, 'Japanese', '0000-00-00 00:00:00'),
(4, 'Greek', '0000-00-00 00:00:00'),
(5, 'Spanish', '0000-00-00 00:00:00'),
(6, 'Lebanese', '0000-00-00 00:00:00'),
(7, 'Turkey', '0000-00-00 00:00:00'),
(8, 'Thai', '0000-00-00 00:00:00'),
(9, 'Mexican', '0000-00-00 00:00:00'),
(10, 'American', '0000-00-00 00:00:00'),
(11, 'Mediterranean', '0000-00-00 00:00:00'),
(12, 'Caribbean', '0000-00-00 00:00:00'),
(13, 'Italian', '0000-00-00 00:00:00'),
(14, 'Indian', '2023-12-13 09:58:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(200) NOT NULL,
  `event_date` date NOT NULL,
  `event_image` varchar(500) NOT NULL,
  `event_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`event_id`, `event_name`, `event_date`, `event_image`, `event_type`) VALUES
(1, 'Diwali', '2024-02-23', 'uploads/20240201225533.png', 'Event'),
(2, 'Birthday Party', '0000-00-00', 'uploads/20240201225855.png', 'Special');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `image` varchar(500) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `address_line_1` varchar(250) NOT NULL,
  `address_line_2` varchar(250) NOT NULL,
  `postcode` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `username`, `password`, `email`, `image`, `user_type`, `mobile_number`, `first_name`, `last_name`, `address_line_1`, `address_line_2`, `postcode`, `state`, `country`) VALUES
(1, 'admin', '12345', 'admin@admin.com', '', 'Admin', '9392522044', '', '', '', '', '', '', ''),
(2, 'ganesh', '12345', 'ganeshvunnam8@gmail.com', 'uploads/20240202102147.png', 'chef', '9392522044', '', '', '', '', '', '', ''),
(3, 'Test', '1234', 'test@login.com', '', 'user', '123456789', 'Test', 'User', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL,
  `cid` int(200) NOT NULL,
  `category` varchar(100) NOT NULL,
  `dish` varchar(200) NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `cid`, `category`, `dish`, `price`) VALUES
(1, 14, 'Sandwich', 'Plain Sandwich', 175),
(2, 14, 'Sandwich', 'Grilled Sandwich', 175),
(3, 14, 'Sandwich', 'Club Sandwich', 175),
(4, 14, 'Deserts', 'Kulfi', 60);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profile`
--

CREATE TABLE `tbl_profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_line_1` varchar(300) NOT NULL,
  `address_line_2` varchar(300) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cuisines`
--
ALTER TABLE `tbl_cuisines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_profile`
--
ALTER TABLE `tbl_profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_cuisines`
--
ALTER TABLE `tbl_cuisines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_profile`
--
ALTER TABLE `tbl_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
