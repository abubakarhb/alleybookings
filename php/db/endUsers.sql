-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 20, 2023 at 05:51 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

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
  `phone_number` varchar(200) DEFAULT NULL,
  `nationality` varchar(200) DEFAULT NULL,
  `gender` varchar(300) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `verification_status` longtext NOT NULL,
  `user_status` enum('active','inactive') NOT NULL,
  `time_in` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `endUsers`
--

INSERT INTO `endUsers` (`id`, `first_name`, `last_name`, `email`, `password`, `phone_number`, `nationality`, `gender`, `address`, `verification_status`, `user_status`, `time_in`) VALUES
(1, 'Ahmed', 'Yaro', 'swagsman26@gmail.com', '1234567890', '0706897584', 'Nigeria', 'Male', 'ESTATE BAGO ELECTION', 'TFBKTW82MTFlWk1XSlhXeTVDUkpKR0NHZDJyME1WeE5QVXREMGpTN1RSQT0=', 'active', '2023-02-20 16:42:38'),
(2, 'Usman', 'Namai', 'Usman@gmail.com', '12345', '0706897584', 'Morocco', 'Male', 'ESTATE BAGO ELECTION', 'TVBQQzUzMnFXSDhMVWFzc2FHWk5UUlJVOHlLeGx1M0QwV1Y2aHdLd0JQQT0=', 'active', '2023-02-20 12:17:01'),
(3, 'Mohammed', 'Hassan', 'fgsgrs@sss.von', 'sdfwfrw', NULL, NULL, NULL, NULL, 'Zzd0blBLVUxyMDU2WjVkaGovd0UwUTZUNFU0SHlPaHZVZ2Q0Q0F3Y1lJUT0=', 'active', '2023-02-20 16:32:22'),
(34, 'Abubakar', 'Bello', 'assadeeq543a@gmail.com', '1234', NULL, NULL, NULL, NULL, 'dHBpT0ZQWjRpR0RZVkhFQ24yUVVUVWhJOERHMTlHckVJRmpJSXZ4SEZicz0=', 'active', '2023-01-03 18:10:49'),
(35, 'Abubakar', 'Bello', 'assadeeq543sa@gmail.com', '1234', NULL, NULL, NULL, NULL, 'Ulhlc1J3R2xFaUVIMW9OLzhTSlhQODR1UU5qcldTSGQ5RnFQbVVPTnNmUT0=', 'active', '2023-01-03 18:10:59'),
(36, 'Sani', 'Yunusa', 'dd@gmail.com', '111222', NULL, NULL, NULL, NULL, 'TFBKTW82MTFlWk1XSlhXeTVDUkpKR0NHZDJyME1WeE5QVXREMGpTN1RSQT0=', 'active', '2023-02-20 12:33:01');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `endUsers`
--
ALTER TABLE `endUsers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
