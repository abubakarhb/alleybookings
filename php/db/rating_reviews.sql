-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 20, 2023 at 06:42 PM
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
-- Table structure for table `rating_reviews`
--

CREATE TABLE `rating_reviews` (
  `id` int(11) NOT NULL,
  `property_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `users_reviews` varchar(350) NOT NULL,
  `staff_ratings` bigint(20) NOT NULL,
  `freeWifi_ratings` bigint(20) NOT NULL,
  `clealiness_ratings` bigint(20) NOT NULL,
  `location_ratings` bigint(20) NOT NULL,
  `comfort_ratings` bigint(20) NOT NULL,
  `facilities_ratings` bigint(20) NOT NULL,
  `status` enum('Yes','No') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating_reviews`
--

INSERT INTO `rating_reviews` (`id`, `property_id`, `user_id`, `users_reviews`, `staff_ratings`, `freeWifi_ratings`, `clealiness_ratings`, `location_ratings`, `comfort_ratings`, `facilities_ratings`, `status`, `created_at`) VALUES
(1, 1, 1, 'string', 5, 6, 4, 5, 7, 5, 'Yes', '2023-02-20 10:29:20'),
(2, 2, 1, 'string', 8, 6, 4, 5, 7, 5, 'Yes', '2023-02-20 10:31:17'),
(3, 2, 2, 'string', 4, 6, 4, 5, 7, 5, 'Yes', '2023-02-20 17:41:46');
(4, 2, 3, 'string', 8, 5, 4, 5, 7, 5, 'Yes', '2023-02-20 17:41:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rating_reviews`
--
ALTER TABLE `rating_reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rating_reviews`
--
ALTER TABLE `rating_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
