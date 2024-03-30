-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2024 at 09:36 AM
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
(12, 4, 'Kandukur', 2, '2024-03-25', 'Breakfast', '14', '', '', '', '5,7,10,16,18', 'Open', '2', 'Paid', 'YES', 1628, 0, 'pay_NlLOX6sPOeg5FF', '2024-03-12 07:24:25'),
(13, 4, 'Kandukur', 2, '2024-03-25', 'Lunch', '14', '', '', '', '5,7,16', 'Open', '2', 'Paid', 'YES', 684, 0, 'pay_NlNAnj8k8sFbaN', '2024-03-12 09:07:40'),
(14, 4, 'chennai', 2, '2024-03-21', 'Dinner', '14', '', '', '', '16,17', 'Open', '2', 'Accepted', 'YES', 472, 0, '', '2024-03-12 09:18:06'),
(15, 4, 'chennai', 2, '2024-03-27', 'Breakfast', '14', '', '', '', '1,7,14', 'Open', '2', 'Accepted', 'YES', 1499, 0, '', '2024-03-12 09:39:01'),
(25, 4, 'chennai', 2, '2024-04-02', 'Lunch', '14', '', '', '', '10,16', 'Open', '2', 'Accepted', 'YES', 944, 0, '', '2024-03-30 07:43:50'),
(26, 4, 'chennai', 2, '2024-04-02', 'Lunch', '14', '', '', '', '15,16', 'Open', '2', 'Accepted', 'YES', 1062, 0, '', '2024-03-30 07:54:36');

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
(2, 'Deserts'),
(3, 'Rice'),
(4, 'Biryani'),
(5, 'Curry');

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
(10, 'American', '0000-00-00 00:00:00'),
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
(2, 'Birthday Party', '0000-00-00', 'uploads/20240201225855.png', 'Special'),
(3, 'Holi', '2024-03-25', 'uploads/20240312065552.png', 'Event'),
(4, 'Ugadi', '2024-04-09', 'uploads/20240312065705.png', 'Event'),
(5, 'Ramanavami', '2024-04-19', 'uploads/20240312065732.png', 'Event'),
(6, 'Ganesh Charturthi', '2024-09-07', 'uploads/20240312065928.png', 'Event'),
(7, 'Anniversary', '0000-00-00', 'uploads/20240312070045.png', 'Special'),
(8, 'Inviting Guests', '0000-00-00', 'uploads/20240312070119.png', 'Special'),
(9, 'Family Meetup', '0000-00-00', 'uploads/20240312070135.png', 'Special'),
(10, 'Diwali', '2024-11-01', 'uploads/20240327043943.png', 'Event');

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
  `exp` varchar(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `postcode` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `username`, `password`, `email`, `image`, `user_type`, `mobile_number`, `first_name`, `last_name`, `address_line_1`, `address_line_2`, `exp`, `city`, `postcode`, `state`, `country`) VALUES
(1, 'admin', '12345', 'admin@admin.com', '', 'Admin', '9392522044', '', '', '', '', '0', '', '', '', ''),
(2, 'ganesh', '12345', 'ganeshvunnam8@gmail.com', '', 'chef', '9392522044', 'GANESH', 'VUNNAM', '5-78, Chowtapalem (vlg), Prakasam (dist)', '', '5 Years', 'Chennai', '523109', 'Andhra Pradesh', 'India'),
(3, 'Test', '1234', 'test@login.com', '', 'user', '123456789', 'Test', 'User', '', '', '0', '', '', '', ''),
(4, 'Ganesh', '12345', 'ganeshvunnam8@gmail.com', 'uploads/20240327065529.png', 'user', '9392522044', '', '', '', '', '0', '', '', '', ''),
(5, 'len', '1234', 'len@gmail.com', '', 'user', '765432345654', '', '', '', '', '0', '', '', '', ''),
(6, 'vamsi', '12345', 'vamsi123@gmail.com', '', 'chef', '9177053680', '', '', '', '', '0', '', '', '', ''),
(7, 'Naveen', '12345', 'naveen123@gmail.com', 'uploads/20240327065529.png', 'chef', '9949909092', '', '', '', '', '0', '', '', '', ''),
(8, 'koti', '12345', 'koti123@gmail.com', '', 'chef', '9177053681', '', '', '', '', '0', '', '', '', '');

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
(4, 14, 'Deserts', 'Kulfi', 60),
(5, 14, 'Rice', 'Steam Rice', 80),
(6, 14, 'Rice', 'Sambar Rice', 120),
(7, 14, 'Rice', 'Curd Rice', 110),
(8, 14, 'Rice', 'Lemon Rice', 110),
(9, 0, 'Biryani', 'Hyderabadi Biryani', 300),
(10, 14, 'Biryani', 'Hyderabadi Biryani', 300),
(11, 14, 'Biryani', 'Chicken Biryani', 250),
(12, 14, 'Biryani', 'Mutton Biryani', 500),
(13, 14, 'Curry', 'Chicken Curry', 200),
(14, 14, 'Curry', 'Mutton Curry', 350),
(15, 14, 'Curry', 'Fish Curry', 350),
(16, 14, 'Curry', 'Sambar', 100),
(17, 14, 'Curry', 'Rasam', 100),
(18, 14, 'Deserts', 'Bread Halwa', 100),
(19, 14, 'Deserts', 'Gulab Jamun', 80);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_cuisines`
--
ALTER TABLE `tbl_cuisines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_profile`
--
ALTER TABLE `tbl_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
