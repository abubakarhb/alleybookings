-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 03, 2023 at 02:31 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alleybookings`
--

-- --------------------------------------------------------

--
-- Table structure for table `endUsers`
--

CREATE TABLE `endUsers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `verification_status` longtext NOT NULL,
  `time_in` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `endUsers`
--

INSERT INTO `endUsers` (`id`, `first_name`, `last_name`, `email`, `password`, `verification_status`, `time_in`) VALUES
(29, 'aloyu', 'me', 'aliyu@gmail.com', '12344', 'MkRhUktJVnAzZWxLMkMrZ1lLTmRyRWFhd0ZybGh5M3AybEhacVU3N2U2MD0=', '2022-12-31 18:05:06'),
(30, 'abu', 'ab', 'assadeeq543@gmail.com', '12345', 'TFBKTW82MTFlWk1XSlhXeTVDUkpKR0NHZDJyME1WeE5QVXREMGpTN1RSQT0=', '2022-12-31 19:05:54');

-- --------------------------------------------------------

--
-- Table structure for table `hotelListerProperties`
--

CREATE TABLE `hotelListerProperties` (
  `id` int(11) NOT NULL,
  `property_name` varchar(50) NOT NULL,
  `property_type` int(1) NOT NULL,
  `property_currency` varchar(10) NOT NULL,
  `zip_code` varchar(15) NOT NULL,
  `property_chain_status` int(1) NOT NULL,
  `property_channel_manager_status` int(1) NOT NULL,
  `owner_id` int(255) NOT NULL,
  `time_in` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotelListerProperties`
--

INSERT INTO `hotelListerProperties` (`id`, `property_name`, `property_type`, `property_currency`, `zip_code`, `property_chain_status`, `property_channel_manager_status`, `owner_id`, `time_in`) VALUES
(1, 'ee', 1, 'NG', 'z12', 1, 1, 24, '2023-01-03 13:29:47'),
(2, 'ee', 1, 'NG', 'z12', 1, 1, 25, '2023-01-03 13:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `hotelListerPropertiesLocation`
--

CREATE TABLE `hotelListerPropertiesLocation` (
  `id` int(11) NOT NULL,
  `property_location` varchar(50) NOT NULL,
  `property_country` varchar(50) NOT NULL,
  `property_street_address` varchar(50) NOT NULL,
  `property_unit_number` int(255) NOT NULL,
  `property_city` varchar(15) NOT NULL,
  `zip_code` varchar(15) NOT NULL,
  `hotelListerProperties_id` int(255) NOT NULL,
  `time_in` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotelListerPropertiesLocation`
--

INSERT INTO `hotelListerPropertiesLocation` (`id`, `property_location`, `property_country`, `property_street_address`, `property_unit_number`, `property_city`, `zip_code`, `hotelListerProperties_id`, `time_in`) VALUES
(1, 'ui', 'jk', 'ui', 2, 'kano', 'Z10', 16, '2023-01-03 12:46:20'),
(2, 'ui', 'jk', 'ui', 2, 'kano', 'Z10', 17, '2023-01-03 13:11:07'),
(3, 'ui', 'jk', 'ui', 2, 'kano', 'Z10', 18, '2023-01-03 13:20:45'),
(4, 'ui', 'jk', 'ui', 2, 'kano', 'Z10', 19, '2023-01-03 13:21:17'),
(5, 'ui', 'jk', 'ui', 2, 'kano', 'Z10', 20, '2023-01-03 13:21:54'),
(6, 'ui', 'jk', 'ui', 2, 'kano', 'Z10', 21, '2023-01-03 13:22:36'),
(7, 'ui', 'jk', 'ui', 2, 'kano', 'Z10', 22, '2023-01-03 13:27:01'),
(8, 'ui', 'jk', 'ui', 2, 'kano', 'Z10', 23, '2023-01-03 13:28:53'),
(9, 'ui', 'jk', 'ui', 2, 'kano', 'Z10', 24, '2023-01-03 13:29:47'),
(10, 'ui', 'jk', 'ui', 2, 'kano', 'Z10', 25, '2023-01-03 13:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `hotelListerUsers`
--

CREATE TABLE `hotelListerUsers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `time_in` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotelListerUsers`
--

INSERT INTO `hotelListerUsers` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `time_in`) VALUES
(1, 'abu', 'ab', 'assadeeq543@gmail.com', '12345', '2023-01-03 08:12:07'),
(2, 'first_name', 'last_name', 'assadeeq5423@gmail.com', 'phone', '2023-01-03 10:24:28'),
(3, 'first_name', 'last_name', 'assadeeq5543@gmail.com', 'phone', '2023-01-03 10:41:42'),
(4, 'first_name', 'last_name', 'assadeeq55543@gmail.com', 'phone', '2023-01-03 10:46:55'),
(5, 'first_name', 'last_name', 'assadeeq552543@gmail.com', 'phone', '2023-01-03 11:19:36'),
(6, 'first_name', 'last_name', 'assadeeq5352543@gmail.com', 'phone', '2023-01-03 11:20:42'),
(7, 'first_name', 'last_name', 'assadeeq535s2543@gmail.com', 'phone', '2023-01-03 11:21:09'),
(8, 'first_name', 'last_name', 'assadeeq5354s2543@gmail.com', 'phone', '2023-01-03 11:21:39'),
(9, 'first_name', 'last_name', 'assadeeq5354s23543@gmail.com', 'phone', '2023-01-03 11:22:23'),
(10, 'first_name', 'last_name', 'assadeeq5354s233543@gmail.com', 'phone', '2023-01-03 11:22:59'),
(11, 'abu', 'sam', 'sam456@gmail.com', '12345678', '2023-01-03 12:07:58'),
(12, 'abu', 'sam', 'sam4456@gmail.com', '12345678', '2023-01-03 12:17:10'),
(13, 'abu', 'sam', 'sam44456@gmail.com', '12345678', '2023-01-03 12:18:55'),
(14, 'abu', 'sam', 'sam444456@gmail.com', '12345678', '2023-01-03 12:34:36'),
(15, 'abu', 'sam', 'sam4544456@gmail.com', '12345678', '2023-01-03 12:45:41'),
(16, 'abu', 'sam', 'sam45444556@gmail.com', '12345678', '2023-01-03 12:46:20'),
(17, 'abu', 'sam', 'sam4544s4556@gmail.com', '12345678', '2023-01-03 13:11:07'),
(18, 'abu', 'sam', 'sam44544s4556@gmail.com', '12345678', '2023-01-03 13:20:45'),
(19, 'abu', 'sam', 'sam4454334s4556@gmail.com', '12345678', '2023-01-03 13:21:17'),
(20, 'abu', 'sam', 'sam44544334s4556@gmail.com', '12345678', '2023-01-03 13:21:54'),
(21, 'abu', 'sam', 'sam445443344s4556@gmail.com', '12345678', '2023-01-03 13:22:36'),
(22, 'abu', 'sam', 'sam4454443344s4556@gmail.com', '12345678', '2023-01-03 13:27:01'),
(23, 'abu', 'sam', 'sam44544463344s4556@gmail.com', '12345678', '2023-01-03 13:28:53'),
(24, 'abu', 'sam', 'sam445445463344s4556@gmail.com', '12345678', '2023-01-03 13:29:47'),
(25, 'abu', 'sam', 'sam4454454633446s4556@gmail.com', '12345678', '2023-01-03 13:30:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `endUsers`
--
ALTER TABLE `endUsers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `hotelListerProperties`
--
ALTER TABLE `hotelListerProperties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotelListerPropertiesLocation`
--
ALTER TABLE `hotelListerPropertiesLocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotelListerUsers`
--
ALTER TABLE `hotelListerUsers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `endUsers`
--
ALTER TABLE `endUsers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `hotelListerProperties`
--
ALTER TABLE `hotelListerProperties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hotelListerPropertiesLocation`
--
ALTER TABLE `hotelListerPropertiesLocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hotelListerUsers`
--
ALTER TABLE `hotelListerUsers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
