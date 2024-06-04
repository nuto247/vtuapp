-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2024 at 05:37 PM
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
-- Database: `vtuapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `dataprices`
--

CREATE TABLE `dataprices` (
  `id` int(11) NOT NULL,
  `variation_id` varchar(255) NOT NULL,
  `network` varchar(255) NOT NULL,
  `plan` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dataprices`
--

INSERT INTO `dataprices` (`id`, `variation_id`, `network`, `plan`, `price`, `created_at`, `updated_at`) VALUES
(1, '500', 'mtn', 'MTN SME Data 500MB - 30Days', '500', '2024-04-25 14:22:23', '2024-04-25 14:22:23'),
(4, 'M1024', 'mtn', 'MTN SME Data 1GB – 30 Days', '1000', '2024-04-25 14:24:11', '2024-04-25 14:24:11'),
(5, 'M2024', 'mtn', 'MTN SME Data 2GB – 30 Days', '2000', '2024-04-25 14:24:47', '2024-04-25 14:24:47'),
(6, '3000', 'mtn', 'MTN SME Data 3GB – 30 Days', '3000', '2024-04-25 14:25:26', '2024-04-25 14:25:26'),
(7, '5000', 'mtn', 'MTN SME Data 5GB – 30 Days', '5000', '2024-04-25 14:26:04', '2024-04-25 14:26:04'),
(8, 'AIRTEL500MB', 'airtel', 'Airtel Data 500MB (Gift) – 30 Days', '200', '2024-04-29 13:45:31', '');

-- --------------------------------------------------------

--
-- Table structure for table `datasettings`
--

CREATE TABLE `datasettings` (
  `id` int(11) NOT NULL,
  `api` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datasettings`
--

INSERT INTO `datasettings` (`id`, `api`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'https://vtu.ng/wp-json/api/v1/data', 'revolutpay', 'revolutpay123', '2024-05-27 14:00:12', '2024-05-30 12:17:59');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `amount` decimal(20,2) NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `user_id`, `status`, `reference`, `amount`, `transaction_id`, `created_at`, `updated_at`) VALUES
(4, 8, 'completed', '1666816876', 200.00, 'MNFY|49|20240322162440|000066', '2024-03-22 14:24:36', '2024-03-22 14:25:09'),
(9, 8, 'completed', '6445462420', 3000.00, 'MNFY|49|20240322174429|000072', '2024-03-22 15:44:27', '2024-03-22 15:44:48'),
(10, 7, 'completed', '4353374561', 7000.00, 'MNFY|27|20240322175726|000091', '2024-03-22 15:57:23', '2024-03-22 15:57:53'),
(11, 9, 'completed', '8231905251', 1111.00, 'MNFY|50|20240406174032|000648', '2024-04-06 15:40:20', '2024-04-06 15:41:15'),
(12, 9, 'completed', '3268689961', 2000.00, 'MNFY|71|20240424121958|000672', '2024-04-24 10:19:53', '2024-04-24 10:20:25'),
(13, 9, 'pending', '8859426526', 2000.00, NULL, '2024-05-11 11:23:01', '2024-05-11 11:23:01'),
(14, 9, 'pending', '5206549544', 2000.00, NULL, '2024-05-11 11:25:12', '2024-05-11 11:25:12');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incoming_webhooks`
--

CREATE TABLE `incoming_webhooks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transactionReference` varchar(255) NOT NULL,
  `paymentReference` varchar(255) NOT NULL,
  `amountPaid` varchar(255) NOT NULL,
  `totalPayable` varchar(255) NOT NULL,
  `paidOn` varchar(255) NOT NULL,
  `paymentStatus` varchar(255) NOT NULL,
  `paymentDescription` varchar(255) NOT NULL,
  `transactionHash` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `paymentMethod` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `title`, `message`, `created_at`, `updated_at`) VALUES
(7, 7, 'Welcome to Revolutpay', 'Message was received', '2024-04-03 14:46:50', '2024-04-03 14:46:50'),
(8, 7, 'Get paid when you reffer someone today', 'Message was received', '2024-04-03 14:47:54', '2024-04-03 14:47:54'),
(9, 7, 'Buy Airtime, Data and CableTv at cheaper rates', 'okay its working now', '2024-04-03 14:48:14', '2024-04-03 14:48:14'),
(10, 7, 'Coexistence', 'Coexistence Coexistence Coexistence', '2024-04-17 13:56:31', '2024-04-17 13:56:31'),
(11, 7, 'Fulani Herdsmen: Toward a Peaceful Coexistence with Host Communities', 'Fulani Herdsmen: Toward a Peaceful Coexistence with Host CommunitiesFulani Herdsmen: Toward a Peaceful Coexistence with Host CommunitiesFulani Herdsmen: Toward a Peaceful Coexistence with Host CommunitiesFulani Herdsmen: Toward a Peaceful Coexistence with Host Communities', '2024-04-17 13:56:50', '2024-04-17 13:56:50');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 2),
(6, '2018_11_06_222923_create_transactions_table', 2),
(7, '2018_11_07_192923_create_transfers_table', 2),
(8, '2018_11_15_124230_create_wallets_table', 2),
(9, '2021_11_02_202021_update_wallets_uuid_table', 2),
(10, '2023_07_29_000000_create_incoming_webhooks_table', 2),
(11, '2024_03_19_065805_create_web_hook_calls_table', 2),
(12, '2024_03_23_134447_create_orders_table', 3),
(13, '2024_03_23_135355_add_user_id_to_orders_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `nepasettings`
--

CREATE TABLE `nepasettings` (
  `id` int(11) NOT NULL,
  `api` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nepasettings`
--

INSERT INTO `nepasettings` (`id`, `api`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'nepa', 'revolutpay', 'revolutpay123', '2024-05-28 15:03:57', '2024-05-28 15:03:57');

-- --------------------------------------------------------

--
-- Table structure for table `neps`
--

CREATE TABLE `neps` (
  `id` int(11) NOT NULL,
  `api` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `neps`
--

INSERT INTO `neps` (`id`, `api`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'nepayyyyyyyy', 'revolutpayddsss', 'revolutpay123qqqqq', '2024-05-29 11:30:58', '2024-05-29 10:35:19');

-- --------------------------------------------------------

--
-- Table structure for table `networks`
--

CREATE TABLE `networks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `variation_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `networks`
--

INSERT INTO `networks` (`id`, `variation_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 500, 'mtn 500', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nins`
--

CREATE TABLE `nins` (
  `id` int(11) NOT NULL,
  `api` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nins`
--

INSERT INTO `nins` (`id`, `api`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'ninfff', 'revolutpay', 'revolutpay123', '2024-05-29 13:33:28', '2024-05-29 12:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `order_reference` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `variation_id` varchar(100) DEFAULT NULL,
  `service_id` varchar(255) NOT NULL,
  `smartcard_number` varchar(255) NOT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `data_plan` varchar(255) DEFAULT NULL,
  `network` varchar(255) DEFAULT NULL,
  `order_type` varchar(60) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_reference`, `phone`, `variation_id`, `service_id`, `smartcard_number`, `amount`, `data_plan`, `network`, `order_type`, `status`, `created_at`, `updated_at`) VALUES
(57, '8', '4408784', '07030585793', '500', '', '', '189', 'MTN Data 500MB – 30 Days', 'mtn', 'data', 'success', '2024-03-28 10:02:06', '2024-03-28 10:02:14'),
(58, '8', '4408817', '07030585793', '500', '', '', '189', 'MTN Data 500MB – 30 Days', 'mtn', 'data', 'success', '2024-03-28 10:06:07', '2024-03-28 10:06:14'),
(59, '9', '4469872', '07030585793', NULL, '', '', '100', NULL, 'mtn', 'airtime', 'success', '2024-04-10 14:12:49', '2024-04-10 14:13:08'),
(60, '9', '4469888', '07030585793', NULL, '', '', '100', NULL, 'mtn', 'airtime', 'success', '2024-04-10 14:16:15', '2024-04-10 14:16:24'),
(61, '9', NULL, NULL, 'NGN2,000: MTN SME Data 2GB – 30 Days', '', '', NULL, NULL, 'mtn', 'data', 'pending', '2024-04-23 15:27:44', '2024-04-23 15:27:44'),
(62, '9', NULL, NULL, 'NGN2,000: MTN SME Data 2GB – 30 Days', '', '', NULL, NULL, 'mtn', 'data', 'pending', '2024-04-23 15:28:40', '2024-04-23 15:28:40'),
(63, '9', NULL, '07030585793', NULL, '', '', '200', NULL, 'mtn', 'airtime', 'failed', '2024-04-23 15:29:32', '2024-04-23 15:29:33'),
(64, '9', NULL, NULL, 'NGN2,000: MTN SME Data 2GB – 30 Days', '', '', NULL, NULL, 'mtn', 'data', 'pending', '2024-04-23 15:32:54', '2024-04-23 15:32:54'),
(65, '9', NULL, NULL, '500', '', '', NULL, NULL, 'mtn', 'data', 'pending', '2024-04-23 15:40:26', '2024-04-23 15:40:26'),
(66, '9', NULL, NULL, '500', '', '', NULL, NULL, 'mtn', 'data', 'pending', '2024-04-23 15:42:25', '2024-04-23 15:42:25'),
(67, '9', NULL, NULL, '500', '', '', NULL, NULL, 'mtn', 'data', 'pending', '2024-04-23 15:42:48', '2024-04-23 15:42:48'),
(68, '9', NULL, NULL, '500', '', '', NULL, NULL, 'mtn', 'data', 'pending', '2024-04-23 15:43:27', '2024-04-23 15:43:27'),
(69, '9', NULL, NULL, '500', '', '', NULL, NULL, 'mtn', 'data', 'pending', '2024-04-23 15:48:18', '2024-04-23 15:48:18'),
(70, '9', NULL, NULL, '500', '', '', NULL, NULL, 'mtn', 'data', 'pending', '2024-04-23 15:49:28', '2024-04-23 15:49:28'),
(71, '9', NULL, NULL, '1', '', '', NULL, NULL, 'mtn', 'data', 'pending', '2024-04-25 09:50:15', '2024-04-25 09:50:15'),
(72, '9', NULL, '07030585793', NULL, '', '', '100', NULL, 'mtn', 'airtime', 'pending', '2024-05-14 09:34:50', '2024-05-14 09:34:50'),
(73, '9', NULL, '07030585793', NULL, '', '', '100', NULL, 'mtn', 'airtime', 'pending', '2024-05-14 09:35:31', '2024-05-14 09:35:31'),
(74, '9', NULL, '07030585793', NULL, '', '', '100', NULL, 'mtn', 'airtime', 'pending', '2024-05-14 09:36:03', '2024-05-14 09:36:03'),
(75, '9', NULL, '07030585793', NULL, '', '', '100', NULL, 'mtn', 'airtime', 'pending', '2024-05-14 09:36:27', '2024-05-14 09:36:27'),
(76, '9', NULL, '07030585793', NULL, '', '', '100', NULL, 'mtn', 'airtime', 'pending', '2024-05-14 09:37:17', '2024-05-14 09:37:17'),
(77, '9', NULL, '07030585793', NULL, '', '', '100', NULL, 'mtn', 'airtime', 'pending', '2024-05-14 09:38:51', '2024-05-14 09:38:51'),
(78, '9', NULL, '07030585793', NULL, '', '', '100', NULL, 'mtn', 'airtime', 'pending', '2024-05-14 09:41:46', '2024-05-14 09:41:46'),
(79, '9', NULL, '07030585793', NULL, '', '', '100', NULL, 'mtn', 'airtime', 'pending', '2024-05-14 09:42:20', '2024-05-14 09:42:20'),
(80, '9', NULL, '07030585793', NULL, '', '', '100', NULL, 'mtn', 'airtime', 'pending', '2024-05-14 09:45:22', '2024-05-14 09:45:22'),
(81, '9', NULL, '07030585793', NULL, '', '', '2000', NULL, 'mtn', 'airtime', 'pending', '2024-05-14 09:45:34', '2024-05-14 09:45:34'),
(82, '9', NULL, '07030585793', NULL, '', '', '2000', NULL, 'mtn', 'airtime', 'failed', '2024-05-14 09:46:49', '2024-05-14 09:46:52'),
(83, '9', NULL, '07030585793', NULL, '', '', '2000', NULL, 'mtn', 'airtime', 'pending', '2024-05-14 10:29:40', '2024-05-14 10:29:40'),
(84, '9', NULL, '07030585793', NULL, '', '', '2000', NULL, 'mtn', 'airtime', 'pending', '2024-05-14 10:30:39', '2024-05-14 10:30:39'),
(85, '9', NULL, '07030585793', NULL, '', '', '2000', NULL, 'mtn', 'airtime', 'pending', '2024-05-14 10:31:39', '2024-05-14 10:31:39'),
(86, '9', NULL, '07030585793', NULL, '', '', '200', NULL, 'mtn', 'airtime', 'failed', '2024-05-14 10:40:06', '2024-05-14 10:40:09'),
(87, '9', NULL, '07030585793', NULL, '', '', '200', NULL, 'mtn', 'airtime', 'failed', '2024-05-14 10:42:42', '2024-05-14 10:42:43'),
(88, '9', NULL, NULL, '500', '', '', NULL, NULL, 'mtn', 'data', 'pending', '2024-05-27 13:03:56', '2024-05-27 13:03:56'),
(89, '9', NULL, '0705555555', NULL, '', '', '3000', NULL, 'mtn', 'airtime', 'failed', '2024-05-27 13:04:53', '2024-05-27 13:04:55'),
(90, '9', NULL, NULL, '500', '', '', NULL, NULL, 'mtn', 'data', 'pending', '2024-05-27 13:05:11', '2024-05-27 13:05:11'),
(91, '9', NULL, NULL, 'AIRTEL500MB', '', '', NULL, NULL, 'airtel', 'data', 'pending', '2024-05-27 13:12:07', '2024-05-27 13:12:07'),
(92, '9', NULL, NULL, '500', '', '', NULL, NULL, 'mtn', 'data', 'pending', '2024-05-27 13:13:46', '2024-05-27 13:13:46'),
(93, '9', NULL, NULL, '500', '', '', NULL, NULL, 'mtn', 'data', 'pending', '2024-05-27 13:18:13', '2024-05-27 13:18:13'),
(94, '9', NULL, NULL, '500', '', '', NULL, NULL, 'mtn', 'data', 'pending', '2024-05-27 13:19:06', '2024-05-27 13:19:06'),
(95, '9', NULL, '07030585793', NULL, '', '', '111', NULL, 'mtn', 'airtime', 'pending', '2024-05-30 10:36:49', '2024-05-30 10:36:49'),
(96, '9', NULL, '07030585793', NULL, '', '', '111', NULL, 'mtn', 'airtime', 'pending', '2024-05-30 10:38:04', '2024-05-30 10:38:04'),
(97, '9', '4694788', '07030585793', NULL, '', '', '100', NULL, 'mtn', 'airtime', 'success', '2024-05-30 10:41:08', '2024-05-30 10:41:24'),
(98, '9', NULL, '07030585793', NULL, '', '', '100', NULL, 'mtn', 'airtime', 'failed', '2024-05-30 10:42:47', '2024-05-30 10:42:49'),
(99, '9', '4694797', '07030585793', NULL, '', '', '200', NULL, 'mtn', 'airtime', 'success', '2024-05-30 10:43:11', '2024-05-30 10:43:18'),
(100, '9', '4694815', '07030585793', '500', '', '', '189', 'MTN Data 500MB – 30 Days', 'mtn', 'data', 'success', '2024-05-30 10:48:21', '2024-05-30 10:48:27'),
(101, '9', NULL, NULL, '500', '', '', NULL, NULL, 'mtn', 'data', 'pending', '2024-05-30 11:01:40', '2024-05-30 11:01:40'),
(102, '9', NULL, NULL, '500', '', '', NULL, NULL, 'mtn', 'data', 'pending', '2024-05-30 11:02:58', '2024-05-30 11:02:58'),
(103, '9', NULL, NULL, '500', '', '', NULL, NULL, 'mtn', 'data', 'pending', '2024-05-30 11:04:05', '2024-05-30 11:04:05'),
(104, '9', '4694870', '07030585793', '500', '', '', '189', 'MTN Data 500MB – 30 Days', 'mtn', 'data', 'success', '2024-05-30 11:09:14', '2024-05-30 11:09:19'),
(105, '9', NULL, NULL, '500', '', '', NULL, NULL, 'mtn', 'data', 'pending', '2024-05-30 11:20:34', '2024-05-30 11:20:34'),
(106, '9', NULL, NULL, '500', '', '', NULL, NULL, 'mtn', 'data', 'pending', '2024-05-30 11:21:36', '2024-05-30 11:21:36'),
(107, '9', NULL, NULL, '500', '', '', NULL, NULL, 'mtn', 'data', 'pending', '2024-05-30 11:30:04', '2024-05-30 11:30:04'),
(108, '9', NULL, NULL, '500', '', '', NULL, NULL, 'mtn', 'data', 'pending', '2024-05-30 11:35:24', '2024-05-30 11:35:24'),
(109, '9', NULL, NULL, '500', '', '', NULL, NULL, 'mtn', 'data', 'pending', '2024-05-30 11:54:27', '2024-05-30 11:54:27'),
(110, '9', '4695092', '07030585793', '500', '', '', '189', 'MTN Data 500MB – 30 Days', 'mtn', 'data', 'success', '2024-05-30 12:13:40', '2024-05-30 12:13:45'),
(111, '9', '4695101', '07030585793', '500', '', '', '189', 'MTN Data 500MB – 30 Days', 'mtn', 'data', 'success', '2024-05-30 12:18:15', '2024-05-30 12:18:19'),
(112, '11', NULL, NULL, 'easy', 'startimes', '555556666666', NULL, NULL, NULL, NULL, NULL, '2024-06-04 13:27:19', '2024-06-04 13:27:19'),
(113, '11', NULL, NULL, 'padipass', 'gotv', '555556666666', NULL, NULL, NULL, NULL, NULL, '2024-06-04 13:28:05', '2024-06-04 13:28:05'),
(114, '11', NULL, NULL, 'sharp sharp', 'startimes', '555556666666', NULL, NULL, NULL, NULL, NULL, '2024-06-04 13:28:17', '2024-06-04 13:28:17'),
(115, '11', NULL, NULL, 'easy', 'startimes', '555556666666', NULL, NULL, NULL, NULL, NULL, '2024-06-04 13:56:59', '2024-06-04 13:56:59'),
(116, '11', NULL, NULL, 'easy', 'startimes', '555556666666', NULL, NULL, NULL, NULL, NULL, '2024-06-04 14:00:11', '2024-06-04 14:00:11');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('uchetochukwu@gmail.com', '$2y$12$vPD02UybuYSuYKwusGo5qu2HoyZNncK8t1I4E5DeYhKIvIJwShMd6', '2024-04-09 14:31:17');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `api` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `api`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'https://vtu.ng/wp-json/api/v1/airtime', 'revolutpay', 'revolutpay123', '2024-05-13 14:59:21', '2024-05-30 10:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `tvprices`
--

CREATE TABLE `tvprices` (
  `id` int(11) NOT NULL,
  `service_id` varchar(255) NOT NULL,
  `variation_id` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tvprices`
--

INSERT INTO `tvprices` (`id`, `service_id`, `variation_id`, `price`, `created_at`, `updated_at`) VALUES
(8, 'dstv', 'dstv-padi', 300, '2024-06-04 10:22:11', '2024-06-04 14:35:39'),
(9, 'gotv', 'gotv-smallie', 200, '2024-06-04 10:31:30', '2024-06-04 14:35:29'),
(10, 'startimes', 'basic', 300, '2024-06-04 10:34:42', '2024-06-04 14:36:09');

-- --------------------------------------------------------

--
-- Table structure for table `tvsettings`
--

CREATE TABLE `tvsettings` (
  `id` int(11) NOT NULL,
  `api` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tvsettings`
--

INSERT INTO `tvsettings` (`id`, `api`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'https://vtu.ng/wp-json/api/v1/tv', 'revolutpay', 'revolutpay123', '2024-05-28 13:35:44', '2024-06-04 14:19:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `affiliate_code` varchar(255) DEFAULT NULL,
  `wallet_address` varchar(255) NOT NULL,
  `pin` int(11) NOT NULL DEFAULT 1,
  `phone` bigint(11) NOT NULL DEFAULT 803,
  `address` text DEFAULT NULL,
  `bvn_status` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `status`, `name`, `email`, `affiliate_code`, `wallet_address`, `pin`, `phone`, `address`, `bvn_status`, `email_verified_at`, `password`, `token`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'admin', 'suspend', 'Onutochukwu Uche k', 'admin@revolutpay.ng', '', '2403528767', 7766, 709999999, NULL, 'unverified', NULL, '$2y$12$ydQTxj.ygKZcekUooAYHB.KIeWoOiqqUHy7FFHCgQD0zgmY8DJlB2', '', NULL, '2024-03-21 05:38:30', '2024-04-12 08:55:50'),
(11, 'buyer', 'suspend', 'ify', 'ify@revolutpay.ng', '', '3439854139', 6194, 803, NULL, 'unverified', NULL, '$2y$12$30Z1Mc3viQl/MStXZAtA9O3CtotnUruSUXsRM4evH4Hdn2YGgOwIO', '', NULL, '2024-04-08 12:53:44', '2024-04-08 13:36:26'),
(12, 'buyer', 'suspend', 'bayo', 'bayo@revolutpay.ng', '', '9815095737', 1, 803, NULL, 'unverified', NULL, '$2y$12$JGj2ac6sHcogOoCh96mU.evIhiQH4f/bZKzOc37wt2nkcOUP6kq3O', '', NULL, '2024-04-09 12:27:16', '2024-04-12 09:02:25');

-- --------------------------------------------------------

--
-- Table structure for table `variations`
--

CREATE TABLE `variations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `variations`
--

INSERT INTO `variations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '500', '2024-05-24 11:37:54', '2024-05-24 11:37:54'),
(2, '1000', '2024-05-24 11:38:24', '2024-05-24 11:38:24');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `holder_type` varchar(255) NOT NULL,
  `holder_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `uuid` char(36) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta`)),
  `balance` decimal(64,0) NOT NULL DEFAULT 0,
  `decimal_places` smallint(5) UNSIGNED NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `holder_type`, `holder_id`, `name`, `slug`, `uuid`, `description`, `meta`, `balance`, `decimal_places`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 4, 'Default Wallet', 'default', '267754e7-2fa6-4909-b2ac-6c123f151208', NULL, '[]', 420, 2, '2024-03-19 14:55:10', '2024-03-19 14:59:23'),
(2, 'App\\Models\\User', 5, 'Default Wallet', 'default', '7a085ba5-812f-446e-b629-57861f47697b', NULL, '[]', 5000, 2, '2024-03-19 12:46:58', '2024-03-20 06:20:55'),
(3, 'App\\Models\\User', 8, 'Default Wallet', 'default', 'ba9e4e1d-ac53-46d0-bf14-2a10b2dcf4e9', NULL, '[]', 116743, 2, '2024-03-21 06:03:08', '2024-04-12 08:52:44'),
(4, 'App\\Models\\User', 7, 'Default Wallet', 'default', 'c55d81e0-69dc-4dc9-8eab-4257fdfe3785', NULL, '[]', 20332, 2, '2024-03-22 15:57:53', '2024-04-12 08:55:50'),
(5, 'App\\Models\\User', 9, 'Default Wallet', 'default', 'a9ed320f-842e-43d6-b453-72ef93dcbebf', NULL, '[]', 233299, 2, '2024-04-06 15:41:15', '2024-05-30 12:18:20'),
(6, 'App\\Models\\User', 10, 'Default Wallet', 'default', 'eaa83067-c4f6-4e1d-a02a-819e4b6aa7fd', NULL, '[]', 20876, 2, '2024-04-08 12:34:20', '2024-04-12 08:58:06'),
(7, 'App\\Models\\User', 11, 'Default Wallet', 'default', 'dcf0649c-a066-4d71-ae73-c32ebe67676b', NULL, '[]', 1875444, 2, '2024-04-08 12:54:24', '2024-04-08 13:47:02'),
(8, 'App\\Models\\User', 13, 'Default Wallet', 'default', '482d9191-52eb-47d8-8d93-794df1bb0a0c', NULL, '[]', 1000, 2, '2024-04-12 08:58:43', '2024-04-12 08:58:43'),
(9, 'App\\Models\\User', 12, 'Default Wallet', 'default', '84075030-a926-4bb1-8705-9b4e1dee745d', NULL, '[]', 2000, 2, '2024-04-12 09:02:25', '2024-04-12 09:02:25');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_transactions`
--

CREATE TABLE `wallet_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payable_type` varchar(255) NOT NULL,
  `payable_id` bigint(20) UNSIGNED NOT NULL,
  `wallet_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('deposit','withdraw') NOT NULL,
  `amount` decimal(64,0) NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta`)),
  `uuid` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallet_transactions`
--

INSERT INTO `wallet_transactions` (`id`, `payable_type`, `payable_id`, `wallet_id`, `type`, `amount`, `confirmed`, `meta`, `uuid`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 4, 1, 'deposit', 10, 1, NULL, '981271af-c3c2-4a3c-b824-9dc468d8cca4', '2024-03-19 14:55:15', '2024-03-19 14:55:15'),
(2, 'App\\Models\\User', 4, 1, 'deposit', 10, 1, NULL, 'c3614287-21f3-4c95-9dd0-29f31470c2b3', '2024-03-19 14:56:32', '2024-03-19 14:56:32'),
(3, 'App\\Models\\User', 4, 1, 'deposit', 400, 1, NULL, '2fa62dd0-3df4-4eb0-9ac7-c640dd2fc584', '2024-03-19 14:59:23', '2024-03-19 14:59:23'),
(4, 'App\\Models\\User', 5, 2, 'deposit', 2000, 1, NULL, 'e554658a-f59c-4cf9-903e-7253113d1da8', '2024-03-19 12:46:59', '2024-03-19 12:46:59'),
(5, 'App\\Models\\User', 5, 2, 'deposit', 3000, 1, NULL, 'b2f24480-3a78-4f38-ac9c-f9aa2d53ea84', '2024-03-20 06:20:55', '2024-03-20 06:20:55'),
(6, 'App\\Models\\User', 8, 3, 'deposit', 5000, 1, NULL, '4c82c973-e7e4-4384-ad12-a5f6edebfb9c', '2024-03-21 06:03:10', '2024-03-21 06:03:10'),
(7, 'App\\Models\\User', 8, 3, 'deposit', 200, 1, NULL, 'ebfb1442-8ddd-40cd-802b-7904693718d8', '2024-03-22 14:25:22', '2024-03-22 14:25:22'),
(8, 'App\\Models\\User', 8, 3, 'deposit', 3000, 1, NULL, 'f1e2b5cd-f20c-40b7-b702-5890a2955f9e', '2024-03-22 15:44:48', '2024-03-22 15:44:48'),
(9, 'App\\Models\\User', 7, 4, 'deposit', 7000, 1, NULL, '6f27ac37-2e14-4a7e-bc3a-6910da6524dc', '2024-03-22 15:57:53', '2024-03-22 15:57:53'),
(10, 'App\\Models\\User', 8, 3, 'withdraw', -10, 1, NULL, '8d674553-dba1-4ee2-989d-4d77836b8602', '2024-03-25 13:29:41', '2024-03-25 13:29:41'),
(11, 'App\\Models\\User', 8, 3, 'withdraw', -189, 1, NULL, '8b11a396-e546-4cd3-90d3-54ec1a13355b', '2024-03-27 15:19:06', '2024-03-27 15:19:06'),
(12, 'App\\Models\\User', 8, 3, 'withdraw', -189, 1, NULL, 'bed34dac-ceb7-41fe-998e-0ccac2af3c17', '2024-03-28 10:02:16', '2024-03-28 10:02:16'),
(13, 'App\\Models\\User', 8, 3, 'withdraw', -189, 1, NULL, 'f34a15de-2f4d-48a1-88a6-2b84b165c015', '2024-03-28 10:06:14', '2024-03-28 10:06:14'),
(14, 'App\\Models\\User', 9, 5, 'deposit', 1111, 1, NULL, '600ef136-c9bc-49fb-ad06-9ea5b4f06e9f', '2024-04-06 15:41:17', '2024-04-06 15:41:17'),
(15, 'App\\Models\\User', 9, 5, 'deposit', 10000, 1, NULL, '76e98aa9-583f-43e8-bdc3-a7793039b9fd', '2024-04-06 16:45:09', '2024-04-06 16:45:09'),
(16, 'App\\Models\\User', 10, 6, 'deposit', 10000, 1, NULL, '8c05617a-7485-4547-ad2d-c5b94cec8ffe', '2024-04-08 12:34:21', '2024-04-08 12:34:21'),
(17, 'App\\Models\\User', 10, 6, 'deposit', 9876, 1, NULL, 'f6bc3b39-6459-4eaa-9648-a3bfd87956bf', '2024-04-08 12:45:25', '2024-04-08 12:45:25'),
(18, 'App\\Models\\User', 11, 7, 'deposit', 987000, 1, NULL, '98c06da2-3ef5-4de8-9b5d-65c8e5ab8beb', '2024-04-08 12:54:24', '2024-04-08 12:54:24'),
(19, 'App\\Models\\User', 11, 7, 'deposit', 777000, 1, NULL, '23af9077-9fb6-46c1-a660-3eb4564d7b9a', '2024-04-08 12:55:43', '2024-04-08 12:55:43'),
(20, 'App\\Models\\User', 11, 7, 'deposit', 111000, 1, NULL, '46d064b0-5379-4d96-b72e-fe143fffa2bc', '2024-04-08 12:56:33', '2024-04-08 12:56:33'),
(21, 'App\\Models\\User', 11, 7, 'deposit', 111, 1, NULL, 'dc0ee412-32c1-4bf8-8d16-4b14b9d5a697', '2024-04-08 12:57:07', '2024-04-08 12:57:07'),
(22, 'App\\Models\\User', 11, 7, 'deposit', 222, 1, NULL, '5931c8fd-6ef7-4564-a2ca-5a1eb07e44c6', '2024-04-08 12:57:40', '2024-04-08 12:57:40'),
(23, 'App\\Models\\User', 7, 4, 'deposit', 111, 1, NULL, '287295a8-8a79-4b2f-ad27-e1c98148e379', '2024-04-08 12:58:27', '2024-04-08 12:58:27'),
(24, 'App\\Models\\User', 11, 7, 'deposit', 0, 1, NULL, 'df4cd3e4-8196-4c18-a9d2-032c3befb96f', '2024-04-08 13:36:26', '2024-04-08 13:36:26'),
(25, 'App\\Models\\User', 7, 4, 'deposit', 111, 1, NULL, 'c4a5f884-5d98-4f50-86fd-615318cb0882', '2024-04-08 13:38:58', '2024-04-08 13:38:58'),
(26, 'App\\Models\\User', 11, 7, 'deposit', 111, 1, NULL, '9ee467e4-8505-4d15-a883-875e48becd5c', '2024-04-08 13:47:02', '2024-04-08 13:47:02'),
(27, 'App\\Models\\User', 8, 3, 'deposit', 111, 1, NULL, 'fed7cab8-c76b-4c69-9f4c-c634f328ae97', '2024-04-08 13:51:49', '2024-04-08 13:51:49'),
(28, 'App\\Models\\User', 8, 3, 'deposit', 11, 1, NULL, '38c32166-a5cc-4fbf-ad70-a19f4e837d9d', '2024-04-08 13:52:22', '2024-04-08 13:52:22'),
(29, 'App\\Models\\User', 9, 5, 'deposit', 111, 1, NULL, '64e43d23-10db-403b-99e8-86f3abda82f0', '2024-04-08 14:09:01', '2024-04-08 14:09:01'),
(30, 'App\\Models\\User', 7, 4, 'deposit', 1000, 1, NULL, 'fdb1c5cd-8364-45b3-b705-6e184a29fb6b', '2024-04-08 14:13:19', '2024-04-08 14:13:19'),
(31, 'App\\Models\\User', 8, 3, 'deposit', 11, 1, NULL, '0d7f96db-bf00-477a-9bd7-4de74d48a53f', '2024-04-08 14:18:07', '2024-04-08 14:18:07'),
(32, 'App\\Models\\User', 8, 3, 'deposit', 0, 1, NULL, '6bb3a265-a44f-4750-b51c-adc1bcdaea20', '2024-04-08 14:25:26', '2024-04-08 14:25:26'),
(33, 'App\\Models\\User', 9, 5, 'withdraw', -100, 1, NULL, 'aa129fcd-5af1-471a-a288-62b73b7d9317', '2024-04-10 14:13:10', '2024-04-10 14:13:10'),
(34, 'App\\Models\\User', 9, 5, 'withdraw', -100, 1, NULL, '6c8b0dee-354a-4732-bcca-a5afd5f80fdf', '2024-04-10 14:16:24', '2024-04-10 14:16:24'),
(35, 'App\\Models\\User', 8, 3, 'deposit', 0, 1, NULL, '4043eda3-5b54-4f0b-975f-2c86969a87e6', '2024-04-12 08:50:02', '2024-04-12 08:50:02'),
(36, 'App\\Models\\User', 7, 4, 'deposit', 1110, 1, NULL, 'dab55488-f0d8-4e68-a66c-e8e8a446167a', '2024-04-12 08:52:22', '2024-04-12 08:52:22'),
(37, 'App\\Models\\User', 8, 3, 'deposit', 111110, 1, NULL, '53a09c67-0e02-4245-8963-76e993071776', '2024-04-12 08:52:44', '2024-04-12 08:52:44'),
(38, 'App\\Models\\User', 7, 4, 'deposit', 8000, 1, NULL, '98c48954-bef1-4321-a3e1-30119ac878e2', '2024-04-12 08:55:15', '2024-04-12 08:55:15'),
(39, 'App\\Models\\User', 7, 4, 'deposit', 3000, 1, NULL, '7bc3de44-d113-4a0f-9a7d-f7cfb9b62c63', '2024-04-12 08:55:50', '2024-04-12 08:55:50'),
(40, 'App\\Models\\User', 10, 6, 'deposit', 1000, 1, NULL, 'fe1441eb-1d55-4b01-a82b-3a73cfbf8b6f', '2024-04-12 08:58:06', '2024-04-12 08:58:06'),
(41, 'App\\Models\\User', 13, 8, 'deposit', 1000, 1, NULL, '9c27a0ab-80b0-4717-b208-4f16f9914cfc', '2024-04-12 08:58:43', '2024-04-12 08:58:43'),
(42, 'App\\Models\\User', 12, 9, 'deposit', 2000, 1, NULL, 'b51dc0b3-3619-441f-a934-60ef942bb536', '2024-04-12 09:02:25', '2024-04-12 09:02:25'),
(43, 'App\\Models\\User', 9, 5, 'deposit', 2000, 1, NULL, 'fd8b4311-f3c2-4208-b118-ca780b83c39a', '2024-04-24 10:20:27', '2024-04-24 10:20:27'),
(44, 'App\\Models\\User', 9, 5, 'withdraw', -100, 1, NULL, '6cdf18c0-12d6-4756-bd40-6869fd816ad4', '2024-05-30 10:41:24', '2024-05-30 10:41:24'),
(45, 'App\\Models\\User', 9, 5, 'withdraw', -200, 1, NULL, '31ff3629-a1aa-4810-a250-ca2ef9a832f6', '2024-05-30 10:43:18', '2024-05-30 10:43:18'),
(46, 'App\\Models\\User', 9, 5, 'withdraw', -189, 1, NULL, 'a2a25880-b3b9-4d6f-8831-2023026d4f2c', '2024-05-30 10:48:27', '2024-05-30 10:48:27'),
(47, 'App\\Models\\User', 9, 5, 'withdraw', -189, 1, NULL, 'af245c4a-f587-4d94-b5ed-9e6c1fc41286', '2024-05-30 11:09:19', '2024-05-30 11:09:19'),
(48, 'App\\Models\\User', 9, 5, 'withdraw', -189, 1, NULL, '37545b3a-33c0-4f6a-b92d-d03aae5ca13c', '2024-05-30 12:13:45', '2024-05-30 12:13:45'),
(49, 'App\\Models\\User', 9, 5, 'withdraw', -189, 1, NULL, '7ec8c70d-a875-4a82-94cf-eea9cfb07d93', '2024-05-30 12:18:20', '2024-05-30 12:18:20');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_transfers`
--

CREATE TABLE `wallet_transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_type` varchar(255) NOT NULL,
  `from_id` bigint(20) UNSIGNED NOT NULL,
  `to_type` varchar(255) NOT NULL,
  `to_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('exchange','transfer','paid','refund','gift') NOT NULL DEFAULT 'transfer',
  `status_last` enum('exchange','transfer','paid','refund','gift') DEFAULT NULL,
  `deposit_id` bigint(20) UNSIGNED NOT NULL,
  `withdraw_id` bigint(20) UNSIGNED NOT NULL,
  `discount` decimal(64,0) NOT NULL DEFAULT 0,
  `fee` decimal(64,0) NOT NULL DEFAULT 0,
  `uuid` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dataprices`
--
ALTER TABLE `dataprices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datasettings`
--
ALTER TABLE `datasettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `incoming_webhooks`
--
ALTER TABLE `incoming_webhooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nepasettings`
--
ALTER TABLE `nepasettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `neps`
--
ALTER TABLE `neps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `networks`
--
ALTER TABLE `networks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nins`
--
ALTER TABLE `nins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tvprices`
--
ALTER TABLE `tvprices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tvsettings`
--
ALTER TABLE `tvsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `variations`
--
ALTER TABLE `variations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wallets_holder_type_holder_id_slug_unique` (`holder_type`,`holder_id`,`slug`),
  ADD UNIQUE KEY `wallets_uuid_unique` (`uuid`),
  ADD KEY `wallets_holder_type_holder_id_index` (`holder_type`,`holder_id`),
  ADD KEY `wallets_slug_index` (`slug`);

--
-- Indexes for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transactions_uuid_unique` (`uuid`),
  ADD KEY `transactions_payable_type_payable_id_index` (`payable_type`,`payable_id`),
  ADD KEY `payable_type_payable_id_ind` (`payable_type`,`payable_id`),
  ADD KEY `payable_type_ind` (`payable_type`,`payable_id`,`type`),
  ADD KEY `payable_confirmed_ind` (`payable_type`,`payable_id`,`confirmed`),
  ADD KEY `payable_type_confirmed_ind` (`payable_type`,`payable_id`,`type`,`confirmed`),
  ADD KEY `transactions_type_index` (`type`),
  ADD KEY `transactions_wallet_id_foreign` (`wallet_id`);

--
-- Indexes for table `wallet_transfers`
--
ALTER TABLE `wallet_transfers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transfers_uuid_unique` (`uuid`),
  ADD KEY `transfers_from_type_from_id_index` (`from_type`,`from_id`),
  ADD KEY `transfers_to_type_to_id_index` (`to_type`,`to_id`),
  ADD KEY `transfers_deposit_id_foreign` (`deposit_id`),
  ADD KEY `transfers_withdraw_id_foreign` (`withdraw_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dataprices`
--
ALTER TABLE `dataprices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `datasettings`
--
ALTER TABLE `datasettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incoming_webhooks`
--
ALTER TABLE `incoming_webhooks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `nepasettings`
--
ALTER TABLE `nepasettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `neps`
--
ALTER TABLE `neps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `networks`
--
ALTER TABLE `networks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nins`
--
ALTER TABLE `nins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tvprices`
--
ALTER TABLE `tvprices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tvsettings`
--
ALTER TABLE `tvsettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `variations`
--
ALTER TABLE `variations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `wallet_transfers`
--
ALTER TABLE `wallet_transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  ADD CONSTRAINT `transactions_wallet_id_foreign` FOREIGN KEY (`wallet_id`) REFERENCES `wallets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wallet_transfers`
--
ALTER TABLE `wallet_transfers`
  ADD CONSTRAINT `transfers_deposit_id_foreign` FOREIGN KEY (`deposit_id`) REFERENCES `wallet_transactions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transfers_withdraw_id_foreign` FOREIGN KEY (`withdraw_id`) REFERENCES `wallet_transactions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
