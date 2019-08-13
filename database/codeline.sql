-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2019 at 10:55 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.1.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeline`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `total_night` int(11) NOT NULL,
  `total_price` decimal(9,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `room_id`, `user_id`, `date_start`, `date_end`, `customer_id`, `total_night`, `total_price`, `created_at`, `updated_at`, `transaction_id`) VALUES
(1, 7, NULL, '2019-08-13 08:27:15', '2019-09-10 08:27:15', 5, 28, '3360.00', '2019-08-13 07:27:15', '2019-08-13 07:27:15', 9),
(2, 10, NULL, '2019-07-23 08:27:15', '2019-08-20 08:27:15', 5, 28, '4368.00', '2019-08-13 07:27:15', '2019-08-13 07:27:15', 8),
(3, 9, NULL, '2019-08-06 08:27:15', '2019-08-27 08:27:15', 2, 21, '2520.00', '2019-08-13 07:27:15', '2019-08-13 07:27:15', 4),
(4, 8, NULL, '2019-07-30 08:27:15', '2019-09-10 08:27:15', 5, 42, '6552.00', '2019-08-13 07:27:15', '2019-08-13 07:27:15', 3),
(5, 8, NULL, '2019-07-16 08:27:15', '2019-08-13 08:27:15', 4, 28, '4368.00', '2019-08-13 07:27:15', '2019-08-13 07:27:15', 3),
(6, 4, NULL, '2019-07-16 08:27:15', '2019-09-10 08:27:15', 2, 56, '8736.00', '2019-08-13 07:27:15', '2019-08-13 07:27:15', 8),
(7, 6, NULL, '2019-07-30 08:27:15', '2019-08-13 08:27:15', 5, 14, '2184.00', '2019-08-13 07:27:15', '2019-08-13 07:27:15', 3),
(8, 7, NULL, '2019-07-23 08:27:15', '2019-09-10 08:27:15', 2, 49, '5880.00', '2019-08-13 07:27:15', '2019-08-13 07:27:15', 4),
(9, 10, NULL, '2019-07-30 08:27:15', '2019-09-03 08:27:15', 5, 35, '5460.00', '2019-08-13 07:27:15', '2019-08-13 07:27:15', 10),
(10, 9, NULL, '2019-08-06 08:27:15', '2019-08-13 08:27:15', 1, 7, '840.00', '2019-08-13 07:27:15', '2019-08-13 07:27:15', 9);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `first_name`, `last_name`, `phone`, `email`, `address`, `city`, `country`, `fax`, `created_at`, `updated_at`) VALUES
(1, 6, 'Cecilia', 'O\'Kon', '629.557.0967 x3933', 'imelda.jaskolski@hotmail.com', '715 Elian Turnpike', 'Lake Macy', 'French Guiana', '', '2019-08-13 07:27:15', '2019-08-13 07:27:15'),
(2, 5, 'Joey', 'Heller', '(772) 380-3354 x02529', 'hzboncak@yahoo.com', '6121 Dillan Plain Apt. 433', 'New Donnellburgh', 'United States Minor Outlying Islands', '', '2019-08-13 07:27:15', '2019-08-13 07:27:15'),
(3, 5, 'Sylvia', 'Schroeder', '694.794.6186 x436', 'okon.heaven@hotmail.com', '3777 Adrian Point', 'Smithammouth', 'Panama', '', '2019-08-13 07:27:15', '2019-08-13 07:27:15'),
(4, 5, 'Abbigail', 'Christiansen', '+18256241508', 'piper.kuphal@yahoo.com', '42471 Klein Lodge', 'Lake Patriciastad', 'Macedonia', '', '2019-08-13 07:27:15', '2019-08-13 07:27:15'),
(5, 4, 'Demond', 'West', '(301) 265-3558', 'talon94@gmail.com', '296 Stehr Harbor', 'Millertown', 'Albania', '', '2019-08-13 07:27:15', '2019-08-13 07:27:15');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `address`, `city`, `state`, `country`, `zipcode`, `phone_number`, `email`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Dream Downtown', '10191 Schuster Roads', 'West Claudiaburgh', 'Arkansas', 'Bhutan', '46031-8938', '1-205-534-3024', 'bednar.derrick@konopelski.info', 'luxury-roomaw05-1954a49631c9073.png', '2019-08-13 07:27:15', '2019-08-13 07:27:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(16, '2014_10_12_000000_create_users_table', 1),
(17, '2014_10_12_100000_create_password_resets_table', 1),
(18, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(19, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(20, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(21, '2016_06_01_000004_create_oauth_clients_table', 1),
(22, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(23, '2019_06_21_175411_create_hotels_table', 1),
(24, '2019_06_21_180137_create_customers_table', 1),
(25, '2019_06_21_180515_create_room_types_table', 1),
(26, '2019_06_21_180520_create_room_capacities_table', 1),
(27, '2019_06_21_180520_create_rooms_table', 1),
(28, '2019_06_21_180627_create_bookings_table', 1),
(29, '2019_06_21_182429_create_prices_table', 1),
(30, '2019_08_13_023107_create_transactions_table', 1),
(31, '2019_08_13_060921_add_transaction_id_to_booking', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('1a85b1623b08f187eec3ec927b4b4e62152795139937a8fd214ba2dd13a4d32e83594024cb5e1312', 6, 2, NULL, '[]', 0, '2019-08-13 07:34:04', '2019-08-13 07:34:04', '2020-08-13 08:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'qdj4HECmQOmw7ajHMuzMOIlQa5njgPnxDGwrZQaQ', 'http://localhost', 1, 0, 0, '2019-08-13 07:26:18', '2019-08-13 07:26:18'),
(2, NULL, 'Laravel Password Grant Client', 'aOWJ4uvqxsFCdgJjF0sJGF6NYNU4YMrMV8KGYRsD', 'http://localhost', 0, 1, 0, '2019-08-13 07:26:18', '2019-08-13 07:26:18');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-08-13 07:26:18', '2019-08-13 07:26:18');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('f662c03098329f042783295689c52919d2523be501459dc43eaf45c2bfc74a504a81ce50671cc760', '1a85b1623b08f187eec3ec927b4b4e62152795139937a8fd214ba2dd13a4d32e83594024cb5e1312', 0, '2020-08-13 08:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_type_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`id`, `room_type_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, '156.00', NULL, NULL),
(2, 2, '120.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hotel_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_type_id` bigint(20) UNSIGNED NOT NULL,
  `room_capacity_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `hotel_id`, `name`, `room_type_id`, `room_capacity_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'B4', 2, 3, 'Hotel-660x400.png', '2019-08-13 07:27:15', '2019-08-13 07:27:15'),
(2, 1, 'A1', 2, 1, 'Bre1-Resized.png', '2019-08-13 07:27:15', '2019-08-13 07:27:15'),
(3, 1, 'C4', 2, 2, 'Bre1-Resized.png', '2019-08-13 07:27:15', '2019-08-13 07:27:15'),
(4, 1, 'C4', 1, 1, '849827_1.jpg', '2019-08-13 07:27:15', '2019-08-13 07:27:15'),
(5, 1, 'C4', 1, 2, 'f3e29c605a81097cb065165ef57c17a0.png', '2019-08-13 07:27:15', '2019-08-13 07:27:15'),
(6, 1, 'B2', 1, 2, 'premium-room.png', '2019-08-13 07:27:15', '2019-08-13 07:27:15'),
(7, 1, 'C5', 2, 1, 'f3e29c605a81097cb065165ef57c17a0.png', '2019-08-13 07:27:15', '2019-08-13 07:27:15'),
(8, 1, 'C5', 1, 3, 'Bre1-Resized.png', '2019-08-13 07:27:15', '2019-08-13 07:27:15'),
(9, 1, 'B4', 2, 2, '613027204_750x422.png', '2019-08-13 07:27:15', '2019-08-13 07:27:15'),
(10, 1, 'C5', 1, 3, 'Continental_hotel_bedroom.jpg', '2019-08-13 07:27:15', '2019-08-13 07:27:15');

-- --------------------------------------------------------

--
-- Table structure for table `room_capacity`
--

CREATE TABLE `room_capacity` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_capacity`
--

INSERT INTO `room_capacity` (`id`, `name`) VALUES
(1, 'Single'),
(2, 'Double'),
(3, 'Family');

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`id`, `type`) VALUES
(1, 'Deluxe'),
(2, 'Standard');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tx_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_ref` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(9,2) NOT NULL,
  `charged_amount` decimal(9,2) NOT NULL,
  `tx_ref` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `tx_id`, `order_ref`, `payment_id`, `amount`, `charged_amount`, `tx_ref`, `status`, `payment_type`, `created_at`, `updated_at`) VALUES
(1, 'jSbdAITuaQIXx79', 'E9dZOJpnScyIt5BH6e1F', 'dpKyXWBoVp', '2000.00', '2000.00', 'dRn3MvAI6512Julgel4A', 1, 'card', '2019-08-13 07:27:15', '2019-08-13 07:27:15'),
(2, '5OP6phbEnXfd9fK', 'lWaw1RYRgBErYFi4ZJNB', 'mLcr8jmpma', '2000.00', '2000.00', '3dBJzDrurq75bE0d0jVy', 1, 'card', '2019-08-13 07:27:15', '2019-08-13 07:27:15'),
(3, 'JS9kxAJnq5CJKSu', 'heynQc92JAOESFjJMGey', '9UUMGhPUxi', '2000.00', '2000.00', 'ewZshRXI4en3KKNbTGtd', 1, 'card', '2019-08-13 07:27:15', '2019-08-13 07:27:15'),
(4, 'ppWXiPBI9QeuXal', 'HjmBNQKECbbdOlB8Z4HK', 'dyo4rHNeJo', '2000.00', '2000.00', 'O2aMOV3mjhnGRzpWcrIH', 1, 'card', '2019-08-13 07:27:15', '2019-08-13 07:27:15'),
(5, 'Iio92Z48b2UrhfI', 'OICqxndWhwxJvrFRdWTC', 'tFMvmOtdcN', '2000.00', '2000.00', 'cfWGYc5JeIre5Q4GQNRU', 1, 'card', '2019-08-13 07:27:15', '2019-08-13 07:27:15'),
(6, 'ShNWqjuucnimlIb', 'CeRPfuQGKzQRMhj1DWJc', 'G6w4jANgS6', '2000.00', '2000.00', 'OM0D8DjRCGG3O5paFKGP', 1, 'card', '2019-08-13 07:27:15', '2019-08-13 07:27:15'),
(7, 'KPBCeJ05xgwrcv8', 'CTUBu4L9m36o2xIyjau1', 'Zs4oM1IOJ8', '2000.00', '2000.00', 'QtrIO5GCacbXRDTi49dM', 1, 'card', '2019-08-13 07:27:15', '2019-08-13 07:27:15'),
(8, 'QqAc75xvqNl8OJd', 'qvzVo3REb5SMtOo3V9yE', 'O02LMC3ryf', '2000.00', '2000.00', 'Z6ocxMG1hxbWtb3Gzufx', 1, 'card', '2019-08-13 07:27:15', '2019-08-13 07:27:15'),
(9, 'jmEiJ4YhJmqgobC', '6N5XJJcYfkGYPYbcK5E6', 'PR819caCop', '2000.00', '2000.00', 'heVzR3lHUSVZx8EbxOHF', 1, 'card', '2019-08-13 07:27:15', '2019-08-13 07:27:15'),
(10, 'tKiIjqk73Pd5ZfF', 'd8npgDd54y929yLLRPV0', 'xBS8WXAWRp', '2000.00', '2000.00', 'lz4xgR0FRJIWwS8is195', 1, 'card', '2019-08-13 07:27:15', '2019-08-13 07:27:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin@codelinehotel.io', '2019-08-13 07:27:15', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2019-08-13 07:27:15', '2019-08-13 07:27:15'),
(2, 'edmund11@example.net', '2019-08-13 07:27:15', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2019-08-13 07:27:15', '2019-08-13 07:27:15'),
(3, 'dhilpert@example.com', '2019-08-13 07:27:15', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2019-08-13 07:27:15', '2019-08-13 07:27:15'),
(4, 'alysa19@example.com', '2019-08-13 07:27:15', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2019-08-13 07:27:15', '2019-08-13 07:27:15'),
(5, 'zkessler@example.org', '2019-08-13 07:27:15', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2019-08-13 07:27:15', '2019-08-13 07:27:15'),
(6, 'jmcglynn@example.org', '2019-08-13 07:27:15', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2019-08-13 07:27:15', '2019-08-13 07:27:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_room_id_foreign` (`room_id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_customer_id_foreign` (`customer_id`),
  ADD KEY `bookings_transaction_id_foreign` (`transaction_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `price_room_type_id_unique` (`room_type_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_hotel_id_foreign` (`hotel_id`),
  ADD KEY `rooms_room_type_id_foreign` (`room_type_id`),
  ADD KEY `rooms_room_capacity_id_foreign` (`room_capacity_id`);

--
-- Indexes for table `room_capacity`
--
ALTER TABLE `room_capacity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `room_capacity`
--
ALTER TABLE `room_capacity`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `bookings_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `bookings_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`),
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `price`
--
ALTER TABLE `price`
  ADD CONSTRAINT `price_room_type_id_foreign` FOREIGN KEY (`room_type_id`) REFERENCES `room_type` (`id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`),
  ADD CONSTRAINT `rooms_room_capacity_id_foreign` FOREIGN KEY (`room_capacity_id`) REFERENCES `room_capacity` (`id`),
  ADD CONSTRAINT `rooms_room_type_id_foreign` FOREIGN KEY (`room_type_id`) REFERENCES `room_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
