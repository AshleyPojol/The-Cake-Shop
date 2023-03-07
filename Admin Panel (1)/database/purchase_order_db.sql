-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host:  Remote Server 1:3306
-- Generation Time: Sep 08, 2021 at 10:57 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `purchase_order_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `item_list`
--

CREATE TABLE `item_list` (
  `id` int(30) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT ' 1 = Active, 0 = Inactive',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_list`
--

INSERT INTO `item_list` (`id`, `name`, `description`,`price`, `status`, `date_created`) VALUES
(1, 'Item 1', 'Sample Item Only. Test 101','99.99', 1, '2021-09-08 10:17:19'),
(2, 'Item 102', 'Sample Only','59.99', 1, '2021-09-08 10:21:42'),
(3, 'Item 3', 'Sample product 103. 3x25 per boxes','49.99', 1, '2021-09-08 10:22:10');
-- --------------------------------------------------------

--
-- Table structure for table `supplier_list`
--

CREATE TABLE `supplier_list` (
  `id` int(30) NOT NULL,
  `name` varchar(250) NOT NULL,
  `contact_person` text NOT NULL,
  `contact` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT ' 0 = Inactive, 1 = Active',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_list`
--

INSERT INTO `supplier_list` (`id`, `name`, `contact_person`, `contact`, `status`, `date_created`) VALUES
(1, 'Supplier 101', 'George Wilson', '09123459879', 1, '2021-09-08 09:46:45'),
(2, 'Supplier 102', 'Samantha Lou', '09332145889', 1, '2021-09-08 10:25:12');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'KAMP Inventory System'),
(6, 'short_name', 'KAMP DBMS'),
(11, 'logo', 'uploads/KAMP Logo.png'),
(13, 'user_avatar', 'uploads/Avatar.jpg'),
(14, 'cover', 'uploads/KAMP BG.jpg'),
(15, 'company_name', 'KAMP Automobile Corporation'),
(16, 'company_email', 'info@kamp.com'),
(17, 'company_address', 'Makailag St. Brgy Barilan Swerte City' );

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
(1, 'Adminstrator', 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/1624240500_avatar.png', NULL, 1, '2021-01-20 14:02:37', '2021-06-21 09:55:07'),
(2, 'John', 'Doe', 'johndoe', '0192023a7bbd73250516f069df18b500', 'uploads/1624240500_avatar.png', NULL, 1, '2021-01-20 14:02:37', '2021-06-21 09:55:07'),
(3, 'Jane', 'Smith', 'janesmith', '0192023a7bbd73250516f069df18b500', 'uploads/1624240500_avatar.png', NULL, 2, '2021-01-20 14:02:37', '2021-06-21 09:55:07'),
(4, 'Bob', 'Johnson', 'bjohnson', '0192023a7bbd73250516f069df18b500', 'uploads/1624240500_avatar.png', NULL, 2, '2021-01-20 14:02:37', '2021-06-21 09:55:07'),
(5, 'Samantha', 'Lee', 'slee', '0192023a7bbd73250516f069df18b500', 'uploads/1624240500_avatar.png', NULL, 1, '2021-01-20 14:02:37', '2021-06-21 09:55:07'),
(6, 'David', 'Kim', 'dkim', '0192023a7bbd73250516f069df18b500', 'uploads/1624240500_avatar.png', NULL, 1, '2021-01-20 14:02:37', '2021-06-21 09:55:07'),
(7, 'Maria', 'Perez', 'mperez', '0192023a7bbd73250516f069df18b500', 'uploads/1624240500_avatar.png', NULL, 2, '2021-01-20 14:02:37', '2021-06-21 09:55:07'),
(8, 'William', 'Chen', 'wchen', '0192023a7bbd73250516f069df18b500', 'uploads/1624240500_avatar.png', NULL, 1, '2021-01-20 14:02:37', '2021-06-21 09:55:07'),
(9, 'Emily', 'Davis', 'edavis', '0192023a7bbd73250516f069df18b500', 'uploads/1624240500_avatar.png', NULL, 2, '2021-01-20 14:02:37', '2021-06-21 09:55:07'),
(10, 'Mike', 'Brown', 'mbrown', '0192023a7bbd73250516f069df18b500', 'uploads/1624240500_avatar.png', NULL, 1, '2021-01-20 14:02:37', '2021-06-21 09:55:07'),
(11, 'Linda', 'Nguyen', 'lnguyen', '0192023a7bbd73250516f069df18b500', 'uploads/1624240500_avatar.png', NULL, 2, '2021-01-20 14:02:37', '2021-06-21 09:55:07'),
(12, 'Alex', 'Lee', 'alexlee', '0192023a7bbd73250516f069df18b500', 'uploads/1624240500_avatar.png', NULL, 1, '2021-01-20 14:02:37', '2021-06-21 09:55:07'),
(13, 'Jennifer', 'Lopez', 'jlopez', '0192023a7bbd73250516f069df18b500', 'uploads/1624240500_avatar.png', NULL, 2, '2021-01-20 14:02:37', '2021-06-21 09:55:07'),
(14, 'Matthew', 'Patel', 'mpatel', '0192023a7bbd73250516f069df18b500', 'uploads/1624240500_avatar.png', NULL, 2, '2021-01-20 14:02:37', '2021-06-21 09:55:07'),
(15, 'Tina', 'Lee', 'tlee', '0192023a7bbd73250516f069df18b500', 'uploads/1624240500_avatar.png', NULL, 2, '2021-01-20 14:02:37', '2021-06-21 09:55:07'),
(16, 'Brian', 'Kim', 'bkim', '0192023a7bbd73250516f069df18b500', 'uploads/1624240500_avatar.png', NULL, 2, '2021-01-20 14:02:37', '2021-06-21 09:55:07'),
(17, 'Karen', 'Chang', 'kchang', '0192023a7bbd73250516f069df18b500', 'uploads/1624240500_avatar.png', NULL, 2, '2021-01-20 14:02:37', '2021-06-21 09:55:07'),
(18, 'Andrew', 'Park', 'apark', '0192023a7bbd73250516f069df18b500', 'uploads/1624240500_avatar.png', NULL, 1, '2021-01-20 14:02:37', '2021-06-21 09:55:07'),
(19, 'Jessica', 'Song', 'jsong', '0192023a7bbd73250516f069df18b500', 'uploads/1624240500_avatar.png', NULL, 2, '2021-01-20 14:02:37', '2021-06-21 09:55:07'),
(20, 'Kevin', 'Yang', 'kyang', '0192023a7bbd73250516f069df18b500', 'uploads/1624240500_avatar.png', NULL, 1, '2021-01-20 14:02:37', '2021-06-21 09:55:07'),
(21, 'Erica', 'Chen', 'echen', '0192023a7bbd73250516f069df18b500', 'uploads/1624240500_avatar.png', NULL, 1, '2021-01-20 14:02:37', '2021-06-21 09:55:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item_list`
--
ALTER TABLE `item_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_list`
--
ALTER TABLE `supplier_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
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
-- AUTO_INCREMENT for table `item_list`
--
ALTER TABLE `item_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier_list`
--
ALTER TABLE `supplier_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
