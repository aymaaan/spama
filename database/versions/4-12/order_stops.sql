-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04 ديسمبر 2019 الساعة 00:56
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
-- بنية الجدول `order_stops`
--

CREATE TABLE `order_stops` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `stop_type` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stop_value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `order_stops`
--

INSERT INTO `order_stops` (`id`, `order_id`, `stop_type`, `stop_value`, `created_at`, `updated_at`) VALUES
(1, 2, '1', NULL, '2019-11-20 00:33:17', '2019-11-20 00:29:12'),
(2, 8, '1', NULL, '2019-11-21 23:54:14', '2019-11-21 23:54:14'),
(3, 9, '0', NULL, '2019-11-22 00:01:17', '2019-11-22 00:01:17'),
(4, 11, '0', 'لبيلبيل', '2019-11-22 00:04:51', '2019-11-22 00:04:51'),
(5, 18, '0', NULL, '2019-11-22 00:17:55', '2019-11-22 00:17:55'),
(6, 19, '0', NULL, '2019-11-22 00:27:26', '2019-11-22 00:27:26'),
(7, 20, '0', NULL, '2019-11-22 00:28:27', '2019-11-22 00:28:27'),
(8, 1, '0', NULL, '2019-11-22 00:33:20', '2019-11-22 00:33:20'),
(9, 28, '0', NULL, '2019-11-25 21:13:23', '2019-11-25 21:13:23'),
(10, 30, '0', NULL, '2019-11-25 23:21:22', '2019-11-25 23:21:22'),
(11, 31, NULL, NULL, '2019-11-25 23:22:04', '2019-11-25 23:22:04'),
(12, 32, NULL, NULL, '2019-11-25 23:39:32', '2019-11-25 23:39:32'),
(13, 33, NULL, NULL, '2019-11-25 23:46:41', '2019-11-25 23:46:41'),
(14, 49, NULL, '1', '2019-11-28 00:31:47', '2019-11-28 00:31:47'),
(15, 49, NULL, '1', '2019-11-28 00:31:47', '2019-11-28 00:31:47'),
(16, 49, NULL, '1', '2019-11-28 00:31:47', '2019-11-28 00:31:47'),
(17, 49, NULL, '1', '2019-11-28 00:31:47', '2019-11-28 00:31:47'),
(18, 50, NULL, '1', '2019-11-28 00:33:41', '2019-11-28 00:33:41'),
(19, 50, NULL, '1', '2019-11-28 00:33:41', '2019-11-28 00:33:41'),
(20, 50, NULL, '2', '2019-11-28 00:33:41', '2019-11-28 00:33:41'),
(21, 50, NULL, '1', '2019-11-28 00:33:41', '2019-11-28 00:33:41'),
(23, 51, 'branch', '1', '2019-11-28 20:59:15', '2019-11-28 20:59:15'),
(24, 51, 'customer', '2', '2019-11-30 23:55:14', '2019-11-30 23:55:14'),
(25, 51, 'customer', '2', '2019-11-28 20:59:15', '2019-11-28 20:59:15'),
(26, 52, 'branch', '1', '2019-11-29 00:42:10', '2019-11-29 00:26:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_stops`
--
ALTER TABLE `order_stops`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_stops`
--
ALTER TABLE `order_stops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
