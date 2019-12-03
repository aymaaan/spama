-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04 ديسمبر 2019 الساعة 00:55
-- إصدار الخادم: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elweeeys_products_system`
--

-- --------------------------------------------------------

--
-- بنية الجدول `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  `from_time` time NOT NULL,
  `to_time` time NOT NULL,
  `branch_start` int(11) DEFAULT NULL,
  `customer_start` int(11) DEFAULT NULL,
  `other_start` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `branch_des` int(11) DEFAULT NULL,
  `customer_des` int(11) DEFAULT NULL,
  `order_status` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `other_des` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `orders`
--

INSERT INTO `orders` (`id`, `date`, `driver_id`, `city_id`, `from_time`, `to_time`, `branch_start`, `customer_start`, `other_start`, `branch_des`, `customer_des`, `order_status`, `other_des`, `created_at`, `updated_at`, `user_id`) VALUES
(3, '1983-03-12', 6, 1, '15:01:00', '03:45:00', NULL, NULL, NULL, NULL, NULL, 'pending', NULL, '2019-12-02 22:27:31', '2019-12-02 22:27:31', 1),
(4, '1980-07-12', 6, 1, '20:46:00', '05:17:00', NULL, 0, 'لبيلبيليبلبيلي', 1, 0, 'pending', NULL, '2019-11-21 23:55:32', '2019-11-21 23:49:52', 1),
(5, '1980-07-12', 6, 1, '20:46:00', '05:17:00', NULL, 0, 'لبيلبيليبلبيلي', 1, 1, 'pending', NULL, '2019-11-21 23:55:36', '2019-11-21 23:50:20', 1),
(6, '1980-07-12', 6, 1, '20:46:00', '05:17:00', NULL, 0, 'لبيلبيليبلبيلي', 1, 1, 'pending', NULL, '2019-11-21 23:55:41', '2019-11-21 23:50:49', 1),
(7, '1980-07-12', 6, 1, '20:46:00', '05:17:00', NULL, 0, 'لبيلبيليبلبيلي', 1, 1, 'pending', NULL, '2019-11-21 23:55:46', '2019-11-21 23:51:53', 1),
(8, '2013-08-03', 6, 1, '03:47:00', '21:43:00', NULL, 1, 'لبيلبيليبلبيلي', 1, 0, 'pending', NULL, '2019-11-22 00:00:18', '2019-11-22 00:00:18', 1),
(19, '1991-05-22', 6, 2, '03:45:00', '06:06:00', NULL, 2, NULL, NULL, 0, 'pending', 'قليبيب', '2019-11-22 00:27:26', '2019-11-22 00:27:26', 1),
(20, '1983-04-15', 6, 3, '17:03:00', '04:06:00', NULL, 1, NULL, 1, 0, 'pending', NULL, '2019-11-22 00:28:27', '2019-11-22 00:28:27', 1),
(21, '1990-07-26', 6, 3, '00:10:00', '16:39:00', 1, 0, NULL, NULL, 2, 'pending', NULL, '2019-11-22 00:30:45', '2019-11-22 00:30:45', 1),
(22, '1970-05-24', 6, 2, '12:43:00', '12:16:00', 1, 2, NULL, NULL, 2, 'pending', NULL, '2019-11-22 00:31:29', '2019-11-22 00:31:29', 1),
(23, '1970-05-24', 6, 2, '12:43:00', '12:16:00', 1, 2, NULL, NULL, 2, 'pending', NULL, '2019-11-22 00:31:54', '2019-11-22 00:31:54', 1),
(24, '1970-05-24', 6, 2, '12:43:00', '12:16:00', 1, 2, NULL, NULL, 2, 'pending', NULL, '2019-11-22 00:32:15', '2019-11-22 00:32:15', 1),
(25, '1970-05-24', 6, 2, '12:43:00', '12:16:00', 1, 2, NULL, NULL, 2, 'pending', NULL, '2019-11-22 00:32:19', '2019-11-22 00:32:19', 1),
(26, '1970-05-24', 6, 2, '12:43:00', '12:16:00', 1, 2, NULL, NULL, 2, 'pending', NULL, '2019-11-22 00:33:02', '2019-11-22 00:33:02', 1),
(27, '1970-05-24', 6, 2, '12:43:00', '12:16:00', 1, 2, NULL, NULL, 2, 'pending', NULL, '2019-11-22 00:33:20', '2019-11-22 00:33:20', 1),
(50, '2009-09-16', 6, 1, '16:56:00', '03:56:00', 1, 0, NULL, NULL, 0, 'pending', 'Quia eligendi corrup', '2019-11-28 21:20:01', '2019-11-28 00:33:41', 1),
(51, '1975-10-16', 6, 1, '15:25:00', '16:08:00', NULL, 0, NULL, NULL, 0, 'pending', 'hgfhgfhgfh', '2019-12-01 00:12:50', '2019-12-01 00:12:50', 1),
(52, '1992-06-14', 6, 2, '05:31:00', '12:06:00', NULL, 1, NULL, 1, 0, 'pending', NULL, '2019-11-29 00:27:16', '2019-11-29 00:26:35', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
