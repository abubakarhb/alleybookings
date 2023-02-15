-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 15, 2023 at 06:23 PM
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
-- Table structure for table `amenties`
--

CREATE TABLE `amenties` (
  `id` int(11) NOT NULL,
  `extra_extraBedOptions` varchar(5) NOT NULL,
  `numberOfExtra_extraBedOptions` int(255) NOT NULL,
  `amenities` longtext NOT NULL,
  `hotelListerPropertiesId` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `amenties`
--

INSERT INTO `amenties` (`id`, `extra_extraBedOptions`, `numberOfExtra_extraBedOptions`, `amenities`, `hotelListerPropertiesId`) VALUES
(1, '1', 2, '', 24),
(2, '1', 2, 'string', 24),
(3, '1', 2, 'string', 24),
(4, '1', 2, 'string', 24),
(5, '1', 2, 'string', 24),
(6, '1', 2, 'string', 24),
(7, '1', 2, 'string', 24),
(8, '1', 2, 'string', 24),
(9, '1', 2, 'string', 24),
(10, '1', 2, 'string', 24),
(11, '1', 2, 'string', 24),
(12, '1', 2, 'string', 24);

-- --------------------------------------------------------

--
-- Table structure for table `channelManager`
--

CREATE TABLE `channelManager` (
  `id` int(11) NOT NULL,
  `status` varchar(5) NOT NULL,
  `content` varchar(50) NOT NULL,
  `hotelListerPropertiesId` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `channelManager`
--

INSERT INTO `channelManager` (`id`, `status`, `content`, `hotelListerPropertiesId`) VALUES
(1, '1', 'string', 24),
(2, '1', 'string', 24),
(3, '1', 'string', 24),
(4, '1', 'string', 24),
(5, '1', 'string', 24),
(6, '1', 'string', 24),
(7, '1', 'string', 24),
(8, '1', 'string', 24),
(9, '1', 'string', 24),
(10, '1', 'string', 24),
(11, '1', 'string', 24),
(12, '1', 'string', 24),
(13, '1', 'string', 24),
(14, '1', 'string', 24),
(15, '1', 'string', 24),
(16, '1', 'string', 24),
(17, '1', 'string', 24),
(18, '1', 'string', 24),
(19, '1', 'string', 24),
(20, '1', 'string', 24),
(21, '1', 'string', 24),
(22, '1', 'string', 24),
(23, '1', 'string', 24),
(24, '1', 'string', 24),
(25, '1', 'string', 24);

-- --------------------------------------------------------

--
-- Table structure for table `copy_of_yearly_rate`
--

CREATE TABLE `copy_of_yearly_rate` (
  `id` int(11) NOT NULL,
  `property_id` bigint(20) NOT NULL,
  `rates_from` varchar(200) NOT NULL,
  `rates_to` varchar(200) NOT NULL,
  `days_of_week` varchar(200) NOT NULL,
  `room_type` varchar(300) NOT NULL,
  `rate_changes` varchar(200) NOT NULL,
  `restriction` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `copy_of_yearly_rate`
--

INSERT INTO `copy_of_yearly_rate` (`id`, `property_id`, `rates_from`, `rates_to`, `days_of_week`, `room_type`, `rate_changes`, `restriction`, `created_at`) VALUES
(1, 1, '2023-01-17', '2023-01-17', 'Mon, Tues, Wed', 'string', 'string', 'string', '2023-02-01 18:13:04');

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
(31, 'abu', 'ab', 'assadeeq543@gmail.com', '12345', 'TFBKTW82MTFlWk1XSlhXeTVDUkpKR0NHZDJyME1WeE5QVXREMGpTN1RSQT0=', '2023-01-03 15:36:40'),
(32, 'abu', 'ab', 'assadee2q543@gmail.com', '12345', 'TVBQQzUzMnFXSDhMVWFzc2FHWk5UUlJVOHlLeGx1M0QwV1Y2aHdLd0JQQT0=', '2023-01-03 17:04:13'),
(33, 'Mohammed', 'Hassan', 'fgsgrs@sss.von', 'sdfwfrw', 'Zzd0blBLVUxyMDU2WjVkaGovd0UwUTZUNFU0SHlPaHZVZ2Q0Q0F3Y1lJUT0=', '2023-01-28 05:56:49'),
(34, 'Abubakar', 'Bello', 'assadeeq543a@gmail.com', '1234', 'dHBpT0ZQWjRpR0RZVkhFQ24yUVVUVWhJOERHMTlHckVJRmpJSXZ4SEZicz0=', '2023-01-03 18:10:49'),
(35, 'Abubakar', 'Bello', 'assadeeq543sa@gmail.com', '1234', 'Ulhlc1J3R2xFaUVIMW9OLzhTSlhQODR1UU5qcldTSGQ5RnFQbVVPTnNmUT0=', '2023-01-03 18:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `facilitiesServices`
--

CREATE TABLE `facilitiesServices` (
  `id` int(11) NOT NULL,
  `avaibleForGuest_parking` varchar(255) NOT NULL,
  `type_parking` varchar(255) NOT NULL,
  `needToReserve_parking` varchar(5) NOT NULL,
  `availability_breakfast` varchar(5) NOT NULL,
  `price_breakfast` double(10,2) NOT NULL,
  `typeOfBreakfast_breakfast` varchar(255) NOT NULL,
  `languagesSpoken` varchar(255) NOT NULL,
  `facilities` longtext NOT NULL,
  `more_facilities` longtext DEFAULT NULL,
  `hotelListerPropertiesId` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facilitiesServices`
--

INSERT INTO `facilitiesServices` (`id`, `avaibleForGuest_parking`, `type_parking`, `needToReserve_parking`, `availability_breakfast`, `price_breakfast`, `typeOfBreakfast_breakfast`, `languagesSpoken`, `facilities`, `more_facilities`, `hotelListerPropertiesId`) VALUES
(1, 'string', 'string', '1', '1', 2.50, 'string', 'string', 'string', '{\"cancellations\":{\"daysOfCancellations\":\"33\",\"PercenToChargeCancellations\":\"23.43\"},\"checks\":{\"checkInTime\":\"from1~to1\",\"checkOutTime\":\"from1~to1\"},\"accomondations\":{\"accomondateChildren\":0,\"accomondatePet\":1},\"accountId\":\"24\"}', 24),
(2, 'string', 'string', '1', '1', 2.50, 'string', 'string', 'string', '{\"cancellations\":{\"daysOfCancellations\":\"33\",\"PercenToChargeCancellations\":\"23.43\"},\"checks\":{\"checkInTime\":\"from1~to1\",\"checkOutTime\":\"from1~to1\"},\"accomondations\":{\"accomondateChildren\":0,\"accomondatePet\":1},\"accountId\":\"24\"}', 24),
(3, 'string', 'string', '1', '1', 2.50, 'string', 'string', 'string', '{\"cancellations\":{\"daysOfCancellations\":\"33\",\"PercenToChargeCancellations\":\"23.43\"},\"checks\":{\"checkInTime\":\"from1~to1\",\"checkOutTime\":\"from1~to1\"},\"accomondations\":{\"accomondateChildren\":0,\"accomondatePet\":1},\"accountId\":\"24\"}', 24),
(4, 'string', 'string', '1', '1', 2.50, 'string', 'string', 'string', '{\"cancellations\":{\"daysOfCancellations\":\"33\",\"PercenToChargeCancellations\":\"23.43\"},\"checks\":{\"checkInTime\":\"from1~to1\",\"checkOutTime\":\"from1~to1\"},\"accomondations\":{\"accomondateChildren\":0,\"accomondatePet\":1},\"accountId\":\"24\"}', 24),
(5, 'string', 'string', '1', '1', 2.50, 'string', 'string', 'string', '{\"cancellations\":{\"daysOfCancellations\":\"33\",\"PercenToChargeCancellations\":\"23.43\"},\"checks\":{\"checkInTime\":\"from1~to1\",\"checkOutTime\":\"from1~to1\"},\"accomondations\":{\"accomondateChildren\":0,\"accomondatePet\":1},\"accountId\":\"24\"}', 24),
(6, 'string', 'string', '1', '1', 2.50, 'string', 'string', 'string', '{\"cancellations\":{\"daysOfCancellations\":\"33\",\"PercenToChargeCancellations\":\"23.43\"},\"checks\":{\"checkInTime\":\"from1~to1\",\"checkOutTime\":\"from1~to1\"},\"accomondations\":{\"accomondateChildren\":0,\"accomondatePet\":1},\"accountId\":\"24\"}', 24),
(7, 'string', 'string', '1', '1', 2.50, 'string', 'string', 'string', '{\"cancellations\":{\"daysOfCancellations\":\"33\",\"PercenToChargeCancellations\":\"23.43\"},\"checks\":{\"checkInTime\":\"from1~to1\",\"checkOutTime\":\"from1~to1\"},\"accomondations\":{\"accomondateChildren\":0,\"accomondatePet\":1},\"accountId\":\"24\"}', 24),
(8, 'string', 'string', '1', '1', 2.50, 'string', 'string', 'string', '{\"cancellations\":{\"daysOfCancellations\":\"33\",\"PercenToChargeCancellations\":\"23.43\"},\"checks\":{\"checkInTime\":\"from1~to1\",\"checkOutTime\":\"from1~to1\"},\"accomondations\":{\"accomondateChildren\":0,\"accomondatePet\":1},\"accountId\":\"24\"}', 24),
(9, 'string', 'string', '1', '1', 2.50, 'string', 'string', 'string', '{\"cancellations\":{\"daysOfCancellations\":\"33\",\"PercenToChargeCancellations\":\"23.43\"},\"checks\":{\"checkInTime\":\"from1~to1\",\"checkOutTime\":\"from1~to1\"},\"accomondations\":{\"accomondateChildren\":0,\"accomondatePet\":1},\"accountId\":\"24\"}', 24),
(10, 'string', 'string', '1', '1', 2.50, 'string', 'string', 'string', '{\"cancellations\":{\"daysOfCancellations\":\"33\",\"PercenToChargeCancellations\":\"23.43\"},\"checks\":{\"checkInTime\":\"from1~to1\",\"checkOutTime\":\"from1~to1\"},\"accomondations\":{\"accomondateChildren\":0,\"accomondatePet\":1},\"accountId\":\"24\"}', 24),
(11, 'string', 'string', '1', '1', 2.50, 'string', 'string', 'string', '{\"cancellations\":{\"daysOfCancellations\":\"33\",\"PercenToChargeCancellations\":\"23.43\"},\"checks\":{\"checkInTime\":\"from1~to1\",\"checkOutTime\":\"from1~to1\"},\"accomondations\":{\"accomondateChildren\":0,\"accomondatePet\":1},\"accountId\":\"24\"}', 24),
(12, 'string', 'string', '1', '1', 2.50, 'string', 'string', 'string', '{\"cancellations\":{\"daysOfCancellations\":\"33\",\"PercenToChargeCancellations\":\"23.43\"},\"checks\":{\"checkInTime\":\"from1~to1\",\"checkOutTime\":\"from1~to1\"},\"accomondations\":{\"accomondateChildren\":0,\"accomondatePet\":1},\"accountId\":\"24\"}', 24),
(13, 'string', 'string', '1', '1', 2.50, 'string', 'string', 'string', '{\"cancellations\":{\"daysOfCancellations\":\"33\",\"PercenToChargeCancellations\":\"23.43\"},\"checks\":{\"checkInTime\":\"from1~to1\",\"checkOutTime\":\"from1~to1\"},\"accomondations\":{\"accomondateChildren\":0,\"accomondatePet\":1},\"accountId\":\"24\"}', 24),
(14, 'string', 'string', '1', '1', 2.50, 'string', 'string', 'string', '{\"cancellations\":{\"daysOfCancellations\":\"33\",\"PercenToChargeCancellations\":\"23.43\"},\"checks\":{\"checkInTime\":\"from1~to1\",\"checkOutTime\":\"from1~to1\"},\"accomondations\":{\"accomondateChildren\":0,\"accomondatePet\":1},\"accountId\":\"24\"}', 24),
(15, 'string', 'string', '1', '1', 2.50, 'string', 'string', 'string', '{\"cancellations\":{\"daysOfCancellations\":\"33\",\"PercenToChargeCancellations\":\"23.43\"},\"checks\":{\"checkInTime\":\"from1~to1\",\"checkOutTime\":\"from1~to1\"},\"accomondations\":{\"accomondateChildren\":0,\"accomondatePet\":1},\"accountId\":\"24\"}', 24),
(16, 'string', 'string', '1', '1', 2.50, 'string', 'string', 'string', '{\"cancellations\":{\"daysOfCancellations\":\"33\",\"PercenToChargeCancellations\":\"23.43\"},\"checks\":{\"checkInTime\":\"from1~to1\",\"checkOutTime\":\"from1~to1\"},\"accomondations\":{\"accomondateChildren\":0,\"accomondatePet\":1},\"accountId\":\"24\"}', 24),
(17, 'string', 'string', '1', '1', 2.50, 'string', 'string', 'string', '{\"cancellations\":{\"daysOfCancellations\":\"33\",\"PercenToChargeCancellations\":\"23.43\"},\"checks\":{\"checkInTime\":\"from1~to1\",\"checkOutTime\":\"from1~to1\"},\"accomondations\":{\"accomondateChildren\":0,\"accomondatePet\":1},\"accountId\":\"24\"}', 24),
(18, 'string', 'string', '1', '1', 2.50, 'string', 'string', 'string', '{\"cancellations\":{\"daysOfCancellations\":\"33\",\"PercenToChargeCancellations\":\"23.43\"},\"checks\":{\"checkInTime\":\"from1~to1\",\"checkOutTime\":\"from1~to1\"},\"accomondations\":{\"accomondateChildren\":0,\"accomondatePet\":1},\"accountId\":\"24\"}', 24),
(19, 'string', 'string', '1', '1', 2.50, 'string', 'string', 'string', '{\"cancellations\":{\"daysOfCancellations\":\"33\",\"PercenToChargeCancellations\":\"23.43\"},\"checks\":{\"checkInTime\":\"from1~to1\",\"checkOutTime\":\"from1~to1\"},\"accomondations\":{\"accomondateChildren\":0,\"accomondatePet\":1},\"accountId\":\"24\"}', 24),
(20, 'string', 'string', '1', '1', 2.50, 'string', 'string', 'string', '{\"cancellations\":{\"daysOfCancellations\":\"33\",\"PercenToChargeCancellations\":\"23.43\"},\"checks\":{\"checkInTime\":\"from1~to1\",\"checkOutTime\":\"from1~to1\"},\"accomondations\":{\"accomondateChildren\":0,\"accomondatePet\":1},\"accountId\":\"24\"}', 24);

-- --------------------------------------------------------

--
-- Table structure for table `generalRoomAmenities`
--

CREATE TABLE `generalRoomAmenities` (
  `id` int(11) NOT NULL,
  `unit` enum('m','ft') NOT NULL,
  `size` int(255) NOT NULL,
  `other_amenities` longtext NOT NULL,
  `hotelListerPropertiesId` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `generalRoomAmenities`
--

INSERT INTO `generalRoomAmenities` (`id`, `unit`, `size`, `other_amenities`, `hotelListerPropertiesId`) VALUES
(1, 'ft', 24, '{\"daysOfCancellations\":\"33\",\"PercenToChargeCancellations\":\"23.43\"}', 24);

-- --------------------------------------------------------

--
-- Table structure for table `health_safety_features`
--

CREATE TABLE `health_safety_features` (
  `id` int(11) NOT NULL,
  `staff_follow_protocols` enum('Yes','No') NOT NULL,
  `shared_stationery_removed` enum('Yes','No') NOT NULL,
  `guestHandSanitizer` enum('Yes','No') NOT NULL,
  `process_to_check_guests_health` enum('Yes','No') NOT NULL,
  `first_aid_avail` enum('Yes','No') NOT NULL,
  `healthCareAccess` enum('Yes','No') NOT NULL,
  `guest_thermometers` enum('Yes','No') NOT NULL,
  `guest_face_mask` enum('Yes','No') NOT NULL,
  `air_purifiers` enum('Yes','No') NOT NULL,
  `contactless_check_in_out` enum('Yes','No') NOT NULL,
  `cashless_payment_available` enum('Yes','No') NOT NULL,
  `physical_distancing_rules_followed` enum('Yes','No') NOT NULL,
  `mobile_app_for_room_service` enum('Yes','No') NOT NULL,
  `physical_barriers_between_staff_and_guests_where_necessary` enum('Yes','No') NOT NULL,
  `Single_room_AC_for_guest_accommodation` enum('Yes','No') NOT NULL,
  `chemicals_needed_against_coronavirus` enum('Yes','No') NOT NULL,
  `items_washed_in_accordance_with_local_authority_guidelines` enum('Yes','No') NOT NULL,
  `guest_accommodation_disinfected_between_stays` enum('Yes','No') NOT NULL,
  `guest_accommodation_sealed_after_cleaning` enum('Yes','No') NOT NULL,
  `property_cleaned_by_professional` enum('Yes','No') NOT NULL,
  `guests_can_cancel_any_cleaning_services_during_stay` enum('Yes','No') NOT NULL,
  `hand_sanitizer` enum('Yes','No') NOT NULL,
  `physical_distancing_in_dining_areas` enum('Yes','No') NOT NULL,
  `food_can_be_delivered_to_guest` enum('Yes','No') NOT NULL,
  `other_tableware_items_sanitized` enum('Yes','No') NOT NULL,
  `breakfast_to_go_containers` enum('Yes','No') NOT NULL,
  `delivered_food_covered_securely` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `health_safety_features`
--

INSERT INTO `health_safety_features` (`id`, `staff_follow_protocols`, `shared_stationery_removed`, `guestHandSanitizer`, `process_to_check_guests_health`, `first_aid_avail`, `healthCareAccess`, `guest_thermometers`, `guest_face_mask`, `air_purifiers`, `contactless_check_in_out`, `cashless_payment_available`, `physical_distancing_rules_followed`, `mobile_app_for_room_service`, `physical_barriers_between_staff_and_guests_where_necessary`, `Single_room_AC_for_guest_accommodation`, `chemicals_needed_against_coronavirus`, `items_washed_in_accordance_with_local_authority_guidelines`, `guest_accommodation_disinfected_between_stays`, `guest_accommodation_sealed_after_cleaning`, `property_cleaned_by_professional`, `guests_can_cancel_any_cleaning_services_during_stay`, `hand_sanitizer`, `physical_distancing_in_dining_areas`, `food_can_be_delivered_to_guest`, `other_tableware_items_sanitized`, `breakfast_to_go_containers`, `delivered_food_covered_securely`) VALUES
(1, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `HotelListerNotifications`
--

CREATE TABLE `HotelListerNotifications` (
  `id` int(11) NOT NULL,
  `email` enum('true','false') NOT NULL,
  `automatic_reply` enum('true','false') NOT NULL,
  `reminder` enum('true','false') NOT NULL,
  `hotelListerPropertiesId` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `HotelListerNotifications`
--

INSERT INTO `HotelListerNotifications` (`id`, `email`, `automatic_reply`, `reminder`, `hotelListerPropertiesId`) VALUES
(1, 'true', 'false', 'true', 24);

-- --------------------------------------------------------

--
-- Table structure for table `hotelListerPayments`
--

CREATE TABLE `hotelListerPayments` (
  `id` int(11) NOT NULL,
  `chargeCreditProperty_guestPaymentOptions` varchar(5) NOT NULL,
  `methods_guestPaymentOptions` varchar(1000) NOT NULL,
  `commissionPercentage_commissionPayments` double(10,2) NOT NULL,
  `invoiceCompanyTitle_commissionPayments` varchar(255) NOT NULL,
  `hotelListerPropertiesId` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotelListerPayments`
--

INSERT INTO `hotelListerPayments` (`id`, `chargeCreditProperty_guestPaymentOptions`, `methods_guestPaymentOptions`, `commissionPercentage_commissionPayments`, `invoiceCompanyTitle_commissionPayments`, `hotelListerPropertiesId`) VALUES
(1, '10', 'string', 4.50, 'string', 1),
(2, '1', 'string', 4.50, 'string', 2),
(3, '1', 'string', 4.50, 'string', 24);

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
(1, 'City Garden Hotel', 1, 'NG', '564ED', 1, 1, 24, '2023-01-28 22:35:05'),
(2, 'Royal Guest Hotel', 1, 'NG', 'z12', 1, 1, 25, '2023-01-28 05:58:41'),
(3, 'ee', 1, 'NG', 'z12', 1, 1, 26, '2023-01-03 15:32:40'),
(4, 'ee', 1, 'NG', 'z12', 1, 1, 27, '2023-01-20 16:09:03');

-- --------------------------------------------------------

--
-- Table structure for table `hotelListerPropertiesBasicInfo`
--

CREATE TABLE `hotelListerPropertiesBasicInfo` (
  `id` int(11) NOT NULL,
  `property_host_type` enum('Professional','Private') NOT NULL,
  `name` varchar(100) NOT NULL,
  `startRate` varchar(50) NOT NULL,
  `hotelListerPropertiesId` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotelListerPropertiesBasicInfo`
--

INSERT INTO `hotelListerPropertiesBasicInfo` (`id`, `property_host_type`, `name`, `startRate`, `hotelListerPropertiesId`) VALUES
(1, 'Professional', 'string', 'string', 24),
(2, 'Professional', 'string', 'string', 24),
(3, 'Professional', 'string', 'string', 24),
(4, 'Professional', 'string', 'string', 24),
(5, 'Professional', 'string', 'string', 24),
(6, 'Professional', 'string', 'string', 24),
(7, 'Professional', 'string', 'string', 24),
(8, 'Professional', 'string', 'string', 24),
(9, 'Professional', 'string', 'string', 24),
(10, 'Professional', 'string', 'string', 24),
(11, 'Professional', 'string', 'string', 24),
(12, 'Professional', 'string', 'string', 24),
(13, 'Professional', 'string', 'string', 24),
(14, 'Professional', 'string', 'string', 24),
(15, 'Professional', 'string', 'string', 24),
(16, 'Professional', 'string', 'string', 24),
(17, 'Professional', 'string', 'string', 24),
(18, 'Professional', 'string', 'string', 24),
(19, 'Professional', 'string', 'string', 24),
(20, 'Professional', 'string', 'string', 24),
(21, 'Professional', 'string', 'string', 24),
(22, 'Professional', 'string', 'string', 24),
(23, 'Professional', 'string', 'string', 24),
(24, 'Professional', 'string', 'string', 24),
(25, 'Professional', 'string', 'string', 24),
(26, 'Professional', 'string', 'string', 24),
(27, 'Professional', 'string', 'string', 24),
(28, 'Professional', 'string', 'string', 24);

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
(1, 'United Kingdom', 'United Kingdom', 'ui', 2, 'London', 'Z10', 1, '2023-02-12 11:04:54'),
(2, 'Nigeria', 'Nigeria', 'ui', 2, 'kano', 'Z10', 2, '2023-02-12 11:05:11'),
(3, 'Nigeria', 'Nigeria', 'ui', 2, 'Niger', 'Z10', 18, '2023-02-12 11:16:35'),
(4, 'ui', 'jk', 'ui', 2, 'kano', 'Z10', 19, '2023-01-03 13:21:17'),
(5, 'ui', 'jk', 'ui', 2, 'kano', 'Z10', 20, '2023-01-03 13:21:54'),
(6, 'ui', 'jk', 'ui', 2, 'kano', 'Z10', 21, '2023-01-03 13:22:36'),
(7, 'ui', 'jk', 'ui', 2, 'kano', 'Z10', 22, '2023-01-03 13:27:01'),
(8, 'ui', 'jk', 'ui', 2, 'kano', 'Z10', 23, '2023-01-03 13:28:53'),
(9, 'ui', 'jk', 'ui', 2, 'kano', 'Z10', 24, '2023-01-03 13:29:47'),
(10, 'ui', 'jk', 'ui', 2, 'kano', 'Z10', 25, '2023-01-03 13:30:08'),
(11, 'ui', 'jk', 'ui', 2, 'kano', 'Z10', 26, '2023-01-03 15:32:40'),
(12, 'ui', 'jk', 'ui', 2, 'kano', 'Z10', 27, '2023-01-06 16:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `hotelListerrights`
--

CREATE TABLE `hotelListerrights` (
  `id` int(11) NOT NULL,
  `rights` int(1) NOT NULL,
  `right2` int(1) NOT NULL,
  `hotelListerPropertiesId` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotelListerrights`
--

INSERT INTO `hotelListerrights` (`id`, `rights`, `right2`, `hotelListerPropertiesId`) VALUES
(1, 1, 0, 24),
(2, 1, 0, 24);

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
(25, 'abu', 'sam', 'sam4454454633446s4556@gmail.com', '12345678', '2023-01-03 13:30:08'),
(26, 'abu', 'sam', 'sam445445433446s4556@gmail.com', '12345678', '2023-01-03 15:32:40'),
(27, 'abu', 'sam', 'sam4454ee45433446s4556@gmail.com', '12345678', '2023-01-06 16:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `hotelReservation`
--

CREATE TABLE `hotelReservation` (
  `id` int(11) NOT NULL,
  `property_id` bigint(20) NOT NULL,
  `property_name` varchar(300) NOT NULL,
  `property_location` varchar(200) NOT NULL,
  `room_type` varchar(200) NOT NULL,
  `room_name` varchar(200) NOT NULL,
  `room_id` int(255) NOT NULL,
  `guest_name` varchar(300) NOT NULL,
  `status` enum('Yes','No') NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `total_payment` varchar(200) NOT NULL,
  `commission` varchar(300) NOT NULL,
  `reservation_no` varchar(300) NOT NULL,
  `book_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotelReservation`
--

INSERT INTO `hotelReservation` (`id`, `property_id`, `property_name`, `property_location`, `room_type`, `room_name`, `room_id`, `guest_name`, `status`, `check_in`, `check_out`, `total_payment`, `commission`, `reservation_no`, `book_on`) VALUES
(1, 1, 'City Garden Hotel', 'ui', 'Presidential Suite', 'CHF-125', 1, 'Abubakar Bello', 'Yes', '2023-02-12', '2023-02-13', '10', '4.50', '1674947209', '2023-01-28 22:52:03'),
(2, 2, 'Royal Guest Hotel', 'ui', 'Suite / Executive Suite', 'CHF-125', 2, 'Abubakar Bello', 'Yes', '2023-02-13', '2023-02-14', '1', '4.50', '1674946465', '2023-01-28 22:52:32'),
(3, 2, 'Royal Guest Hotel', 'ui', 'Suite / Executive Suite', 'CHF-125', 2, 'Mohammed Hassan', 'Yes', '2023-02-05', '2023-02-07', '1', '4.50', '1674946409', '2023-01-28 22:52:40'),
(4, 1, 'City Garden Hotel', 'ui', 'Room for Extended Stay', 'RFE 123', 3, 'Abubakar Bello', 'Yes', '2023-02-15', '2023-02-17', '10', '4.50', '1675004730', '2023-01-29 14:58:05'),
(5, 1, 'City Garden Hotel', 'ui', 'Presidential Suite', 'SES-001', 1, 'Mohammed Hassan', 'Yes', '2023-02-08', '2023-02-10', '10', '4.50', '1675005489', '2023-01-29 15:03:13'),
(6, 1, 'City Garden Hotel', 'United Kingdom', 'Suite / Executive Suite', 'SES-001', 2, 'Mohammed Hassan', 'Yes', '2023-02-12', '2023-02-13', '10', '4.50', '1676228936', '2023-02-12 19:10:28'),
(7, 1, 'City Garden Hotel', 'United Kingdom', 'Suite / Executive Suite', 'SES-001', 2, 'Mohammed Hassan', 'Yes', '2023-02-12', '2023-02-14', '10', '4.50', '1676229345', '2023-02-12 19:11:21');

-- --------------------------------------------------------

--
-- Table structure for table `Hotel_lister_agent`
--

CREATE TABLE `Hotel_lister_agent` (
  `id` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile_number` varchar(300) NOT NULL,
  `property_id` bigint(20) NOT NULL,
  `homepage_access` enum('Yes','No') NOT NULL,
  `reservations_access` enum('Yes','No') NOT NULL,
  `finance_access` enum('Yes','No') NOT NULL,
  `users_access` enum('Yes','No') NOT NULL,
  `rates_availability_access` enum('Yes','No') NOT NULL,
  `property_access` enum('Yes','No') NOT NULL,
  `messages_access` enum('Yes','No') NOT NULL,
  `reviews_access` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Hotel_lister_agent`
--

INSERT INTO `Hotel_lister_agent` (`id`, `fname`, `lname`, `email`, `mobile_number`, `property_id`, `homepage_access`, `reservations_access`, `finance_access`, `users_access`, `rates_availability_access`, `property_access`, `messages_access`, `reviews_access`) VALUES
(1, 'Double', 'string', 'string@gmail', '070989687', 1, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(2, 'Double11', 'string11', 'string11@gmail', '070989687', 1, 'No', 'No', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `document_name` varchar(200) NOT NULL,
  `invoice_number` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `period` varchar(300) NOT NULL,
  `action` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `status` enum('paid','unpaid') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `document_name`, `invoice_number`, `date`, `period`, `action`, `amount`, `status`) VALUES
(1, 'Double', '63e55e661d6dd', '2023-01-12', '2days', 'none', '10', 'unpaid'),
(2, 'Double', '63e5d4910b63e', '2023-01-12', '2days', 'none', '10', 'unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `layoutPrice`
--

CREATE TABLE `layoutPrice` (
  `id` int(11) NOT NULL,
  `roomType_budgetDoubleRoom` varchar(255) NOT NULL,
  `roomName_budgetDoubleRoom` varchar(255) NOT NULL,
  `customName_budgetDoubleRoom` varchar(255) NOT NULL,
  `smokingPolicy_budgetDoubleRoom` varchar(1000) NOT NULL,
  `numRoom_budgetDoubleRoom` int(255) NOT NULL,
  `bedKind_bedOptions` varchar(255) NOT NULL,
  `numGuest_bedOptions` int(255) NOT NULL,
  `pricePerPerson_basePricePerNight` double(10,2) NOT NULL,
  `roomLocation` varchar(200) NOT NULL,
  `totalOccupant` varchar(200) NOT NULL,
  `maxAdultOccupants` varchar(200) NOT NULL,
  `maxChildrenOccupants` varchar(200) NOT NULL,
  `hotelListerPropertiesId` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layoutPrice`
--

INSERT INTO `layoutPrice` (`id`, `roomType_budgetDoubleRoom`, `roomName_budgetDoubleRoom`, `customName_budgetDoubleRoom`, `smokingPolicy_budgetDoubleRoom`, `numRoom_budgetDoubleRoom`, `bedKind_bedOptions`, `numGuest_bedOptions`, `pricePerPerson_basePricePerNight`, `roomLocation`, `totalOccupant`, `maxAdultOccupants`, `maxChildrenOccupants`, `hotelListerPropertiesId`, `created_at`) VALUES
(1, 'Presidential Suite', 'CHF-125', 'string', 'string', 3, 'string', 2, 2.50, 'string', '', '', '', 1, '2023-02-09 14:50:29'),
(2, 'Suite / Executive Suite', 'SES-001', 'string', 'string', 1, 'string', 2, 2.50, '', '', '', '', 2, '2023-01-28 22:49:24'),
(3, 'Room for Extended Stay', 'RFE 123', 'string', 'string', 1, 'string', 2, 2.50, '', '', '', '', 1, '2023-01-28 22:29:44'),
(4, 'King', 'string', 'string', 'string', 1, 'string', 2, 2.50, '', '', '', '', 2, '2023-01-28 22:29:49'),
(5, 'Queen', 'string', 'string', 'string', 1, 'string', 2, 2.50, '', '', '', '', 2, '2023-01-28 22:29:53'),
(6, 'Single', 'string', 'string', 'string', 1, 'string', 2, 2.50, '', '', '', '', 24, '2023-01-28 06:31:12'),
(7, 'Double', 'string', 'string', 'string', 1, 'string', 2, 2.50, '', '', '', '', 24, '2023-01-28 06:31:33'),
(8, 'string', 'string', 'string', 'string', 1, 'string', 2, 2.50, '', '', '', '', 24, '2023-01-18 23:00:00'),
(9, 'string', 'string', 'string', 'string', 1, 'string', 2, 2.50, '', '', '', '', 24, '2023-01-18 23:00:00'),
(10, 'string', 'string', 'string', 'string', 1, 'string', 2, 2.50, '', '', '', '', 24, '2023-01-25 07:37:28'),
(11, 'string', 'string', 'string', 'string', 1, 'string', 2, 2.50, '', '', '', '', 24, '0000-00-00 00:00:00'),
(12, 'string', 'string', 'string', 'string', 1, 'string', 2, 2.50, '', '', '', '', 24, '0000-00-00 00:00:00'),
(13, 'string', 'string', 'string', 'string', 1, 'string', 2, 2.50, '', '', '', '', 24, '0000-00-00 00:00:00'),
(14, 'string', 'string', 'string', 'string', 1, 'string', 2, 2.50, '', '', '', '', 24, '0000-00-00 00:00:00'),
(15, 'string', 'string', 'string', 'string', 1, 'string', 2, 2.50, '', '', '', '', 24, '0000-00-00 00:00:00'),
(16, 'string', 'string', 'string', 'string', 1, 'string', 2, 2.50, '', '', '', '', 24, '0000-00-00 00:00:00'),
(17, 'string', 'string', 'string', 'string', 1, 'string', 2, 2.50, '', '', '', '', 24, '0000-00-00 00:00:00'),
(18, 'string', 'string', 'string', 'string', 1, 'string', 2, 2.50, '', '', '', '', 24, '0000-00-00 00:00:00'),
(19, 'string', 'string', 'string', 'string', 1, 'string', 2, 2.50, '', '', '', '', 24, '0000-00-00 00:00:00'),
(20, 'Double Room Updadted and Again', 'CHA-1', 'NULLY Updated', 'Created Policy Updadte', 8, 'full Updadted', 5, 200.00, 'Estate Around', '2', '7', '3', 1, '2023-02-10 05:53:58');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastName` varchar(200) NOT NULL,
  `phoneNumber` varchar(200) NOT NULL,
  `email` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `firstname`, `lastName`, `phoneNumber`, `email`) VALUES
(1, 'First Name', 'Last Name', '070896875', 'ccc@gmail.com'),
(2, 'First Name of another', 'Last Name of another', '070896875345', 'string@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `open_close_rooms`
--

CREATE TABLE `open_close_rooms` (
  `id` int(11) NOT NULL,
  `room_id` int(255) NOT NULL,
  `property_id` int(11) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `room_type` varchar(300) NOT NULL,
  `room_selling_amount` float NOT NULL,
  `standard_rate` float NOT NULL,
  `non_refundable_rates` float NOT NULL,
  `open_close_booking_status` enum('active','inactive') NOT NULL,
  `standard_rate_status` enum('active','inactive') NOT NULL,
  `non_refundable_rates_status` enum('active','inactive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `open_close_rooms`
--

INSERT INTO `open_close_rooms` (`id`, `room_id`, `property_id`, `date_from`, `date_to`, `room_type`, `room_selling_amount`, `standard_rate`, `non_refundable_rates`, `open_close_booking_status`, `standard_rate_status`, `non_refundable_rates_status`, `created_at`) VALUES
(1, 1, 1, '2023-01-16', '2023-01-17', 'Double', 1.32, 1.32, 1.33, 'active', 'active', 'active', '2023-02-12 15:08:50'),
(2, 2, 1, '2023-01-16', '2023-01-17', 'Double', 1.32, 1.32, 1.33, 'active', 'active', 'active', '2023-02-12 15:08:52'),
(3, 3, 1, '2023-01-16', '2023-01-17', 'Double', 1.32, 1.32, 1.33, 'active', 'active', 'active', '2023-02-12 15:08:55'),
(4, 4, 1, '2023-01-16', '2023-01-18', 'Double', 1.32, 1.32, 1.33, 'active', 'active', 'active', '2023-02-12 15:08:57'),
(5, 5, 2, '2023-01-16', '2023-01-17', 'Double', 1.32, 1.32, 1.33, 'active', 'active', 'active', '2023-02-12 15:09:01'),
(6, 6, 2, '2023-01-16', '2023-01-17', 'Double', 1.32, 1.32, 1.33, 'active', 'active', 'active', '2023-02-12 15:09:04');

-- --------------------------------------------------------

--
-- Table structure for table `otherPropertyDescription`
--

CREATE TABLE `otherPropertyDescription` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `language` varchar(200) NOT NULL,
  `propertyDescription` text NOT NULL,
  `roomDescription` text NOT NULL,
  `property_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `otherPropertyDescription`
--

INSERT INTO `otherPropertyDescription` (`id`, `room_id`, `language`, `propertyDescription`, `roomDescription`, `property_id`, `created_at`) VALUES
(1, 1, 'English', 'Double', 'NULLY updated', 1, '2023-02-09 20:09:20'),
(2, 1, 'French', 'As you can see we are using', 'to get the age range and', 2, '2023-02-10 06:55:48'),
(3, 2, 'English', 'As you can see we are using', 'to get the age range and', 2, '2023-02-15 14:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

CREATE TABLE `policies` (
  `id` int(11) NOT NULL,
  `daysInAdvance_cancellations` int(11) NOT NULL,
  `guestPay_cancellations` double(10,2) NOT NULL,
  `hotelListerPropertiesId` int(255) NOT NULL,
  `checkIn_checkTime` varchar(50) NOT NULL,
  `checkOut_checkTime` varchar(50) NOT NULL,
  `accomondateChildren` varchar(5) NOT NULL,
  `accomondatePet` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`id`, `daysInAdvance_cancellations`, `guestPay_cancellations`, `hotelListerPropertiesId`, `checkIn_checkTime`, `checkOut_checkTime`, `accomondateChildren`, `accomondatePet`) VALUES
(1, 33, 23.43, 24, 'from1~to1', 'from1~to1', '0', '1'),
(2, 33, 23.43, 24, 'from1~to1', 'from1~to1', '0', '1'),
(3, 33, 23.43, 24, 'from1~to1', 'from1~to1', '0', '1'),
(4, 33, 23.43, 24, 'from1~to1', 'from1~to1', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `propertiesPhotos`
--

CREATE TABLE `propertiesPhotos` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `hotelListerPropertiesId` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `propertiesPhotos`
--

INSERT INTO `propertiesPhotos` (`id`, `content`, `hotelListerPropertiesId`) VALUES
(1, 'hi~hi~hi', 24);

-- --------------------------------------------------------

--
-- Table structure for table `propertyContactDetails`
--

CREATE TABLE `propertyContactDetails` (
  `id` int(11) NOT NULL,
  `hotelListerPropertiesId` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone1` varchar(15) NOT NULL,
  `phone2` varchar(15) NOT NULL,
  `company` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `propertyContactDetails`
--

INSERT INTO `propertyContactDetails` (`id`, `hotelListerPropertiesId`, `name`, `phone1`, `phone2`, `company`) VALUES
(1, 24, 'string', 'string', 'string', '1'),
(2, 24, 'string', 'string', 'string', '1'),
(3, 24, 'string', 'string', 'string', '1'),
(4, 24, 'string', 'string', 'string', '1'),
(5, 24, 'string', 'string', 'string', '1'),
(6, 24, 'string', 'string', 'string', '1'),
(7, 24, 'string', 'string', 'string', '1'),
(8, 24, 'string', 'string', 'string', '1'),
(9, 24, 'string', 'string', 'string', '1'),
(10, 24, 'string', 'string', 'string', '1'),
(11, 24, 'string', 'string', 'string', '1'),
(12, 24, 'string', 'string', 'string', '1'),
(13, 24, 'string', 'string', 'string', '1'),
(14, 24, 'string', 'string', 'string', '1'),
(15, 24, 'string', 'string', 'string', '1'),
(16, 24, 'string', 'string', 'string', '1'),
(17, 24, 'string', 'string', 'string', '1'),
(18, 24, 'string', 'string', 'string', '1'),
(19, 24, 'string', 'string', 'string', '1'),
(20, 24, 'string', 'string', 'string', '1'),
(21, 24, 'string', 'string', 'string', '1'),
(22, 24, 'string', 'string', 'string', '1'),
(23, 24, 'string', 'string', 'string', '1'),
(24, 24, 'string', 'string', 'string', '1'),
(25, 24, 'string', 'string', 'string', '1'),
(26, 24, 'string', 'string', 'string', '1'),
(27, 24, 'string', 'string', 'string', '1');

-- --------------------------------------------------------

--
-- Table structure for table `propertyLocation`
--

CREATE TABLE `propertyLocation` (
  `id` int(11) NOT NULL,
  `address1` varchar(50) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `hotelListerPropertiesId` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `propertyLocation`
--

INSERT INTO `propertyLocation` (`id`, `address1`, `address2`, `country`, `city`, `zip`, `hotelListerPropertiesId`) VALUES
(1, 'string', 'string', 'string', 'string', 'string', 24),
(2, 'string', 'string', 'string', 'string', 'string', 24),
(3, 'string', 'string', 'string', 'string', 'string', 24),
(4, 'string', 'string', 'string', 'string', 'string', 24),
(5, 'string', 'string', 'string', 'string', 'string', 24),
(6, 'string', 'string', 'string', 'string', 'string', 24),
(7, 'string', 'string', 'string', 'string', 'string', 24),
(8, 'string', 'string', 'string', 'string', 'string', 24),
(9, 'string', 'string', 'string', 'string', 'string', 24),
(10, 'string', 'string', 'string', 'string', 'string', 24),
(11, 'string', 'string', 'string', 'string', 'string', 24),
(12, 'string', 'string', 'string', 'string', 'string', 24),
(13, 'string', 'string', 'string', 'string', 'string', 24),
(14, 'string', 'string', 'string', 'string', 'string', 24),
(15, 'string', 'string', 'string', 'string', 'string', 24),
(16, 'string', 'string', 'string', 'string', 'string', 24),
(17, 'string', 'string', 'string', 'string', 'string', 24),
(18, 'string', 'string', 'string', 'string', 'string', 24),
(19, 'string', 'string', 'string', 'string', 'string', 24),
(20, 'string', 'string', 'string', 'string', 'string', 24),
(21, 'string', 'string', 'string', 'string', 'string', 24),
(22, 'string', 'string', 'string', 'string', 'string', 24),
(23, 'string', 'string', 'string', 'string', 'string', 24);

-- --------------------------------------------------------

--
-- Table structure for table `VAT_details`
--

CREATE TABLE `VAT_details` (
  `id` int(11) NOT NULL,
  `status` enum('Yes','No') NOT NULL,
  `tin` varchar(200) NOT NULL,
  `property_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `VAT_details`
--

INSERT INTO `VAT_details` (`id`, `status`, `tin`, `property_id`) VALUES
(1, 'Yes', '20230210143825926295', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenties`
--
ALTER TABLE `amenties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channelManager`
--
ALTER TABLE `channelManager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `copy_of_yearly_rate`
--
ALTER TABLE `copy_of_yearly_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `endUsers`
--
ALTER TABLE `endUsers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `facilitiesServices`
--
ALTER TABLE `facilitiesServices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generalRoomAmenities`
--
ALTER TABLE `generalRoomAmenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `health_safety_features`
--
ALTER TABLE `health_safety_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `HotelListerNotifications`
--
ALTER TABLE `HotelListerNotifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotelListerPayments`
--
ALTER TABLE `hotelListerPayments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotelListerProperties`
--
ALTER TABLE `hotelListerProperties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotelListerPropertiesBasicInfo`
--
ALTER TABLE `hotelListerPropertiesBasicInfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotelListerPropertiesLocation`
--
ALTER TABLE `hotelListerPropertiesLocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotelListerrights`
--
ALTER TABLE `hotelListerrights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotelListerUsers`
--
ALTER TABLE `hotelListerUsers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotelReservation`
--
ALTER TABLE `hotelReservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Hotel_lister_agent`
--
ALTER TABLE `Hotel_lister_agent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layoutPrice`
--
ALTER TABLE `layoutPrice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `open_close_rooms`
--
ALTER TABLE `open_close_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otherPropertyDescription`
--
ALTER TABLE `otherPropertyDescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `propertiesPhotos`
--
ALTER TABLE `propertiesPhotos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hotelListerPropertiesId` (`hotelListerPropertiesId`);

--
-- Indexes for table `propertyContactDetails`
--
ALTER TABLE `propertyContactDetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `propertyLocation`
--
ALTER TABLE `propertyLocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `VAT_details`
--
ALTER TABLE `VAT_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amenties`
--
ALTER TABLE `amenties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `channelManager`
--
ALTER TABLE `channelManager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `copy_of_yearly_rate`
--
ALTER TABLE `copy_of_yearly_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `endUsers`
--
ALTER TABLE `endUsers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `facilitiesServices`
--
ALTER TABLE `facilitiesServices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `generalRoomAmenities`
--
ALTER TABLE `generalRoomAmenities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `health_safety_features`
--
ALTER TABLE `health_safety_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `HotelListerNotifications`
--
ALTER TABLE `HotelListerNotifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotelListerPayments`
--
ALTER TABLE `hotelListerPayments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hotelListerProperties`
--
ALTER TABLE `hotelListerProperties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `hotelListerPropertiesBasicInfo`
--
ALTER TABLE `hotelListerPropertiesBasicInfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `hotelListerPropertiesLocation`
--
ALTER TABLE `hotelListerPropertiesLocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hotelListerrights`
--
ALTER TABLE `hotelListerrights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hotelListerUsers`
--
ALTER TABLE `hotelListerUsers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `hotelReservation`
--
ALTER TABLE `hotelReservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Hotel_lister_agent`
--
ALTER TABLE `Hotel_lister_agent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `layoutPrice`
--
ALTER TABLE `layoutPrice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `open_close_rooms`
--
ALTER TABLE `open_close_rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `otherPropertyDescription`
--
ALTER TABLE `otherPropertyDescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `propertiesPhotos`
--
ALTER TABLE `propertiesPhotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `propertyContactDetails`
--
ALTER TABLE `propertyContactDetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `propertyLocation`
--
ALTER TABLE `propertyLocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `VAT_details`
--
ALTER TABLE `VAT_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
