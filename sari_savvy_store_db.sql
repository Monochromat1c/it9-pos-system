-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2024 at 11:42 AM
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
-- Database: `sari_savvy_store_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `discount_id` int(11) NOT NULL,
  `discount_name` varchar(255) NOT NULL,
  `discount_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`discount_id`, `discount_name`, `discount_amount`, `created_at`, `updated_at`) VALUES
(1, 'PWD Discount', 20.00, '2024-06-08 12:54:05', '2024-06-08 18:40:11'),
(3, 'No Discount', 0.00, '2024-06-08 12:57:10', '2024-06-08 12:57:10'),
(4, 'Senior Citizen', 20.00, '2024-06-11 17:03:52', '2024-06-11 17:03:52');

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `gender_id` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`gender_id`, `gender`, `created_at`, `updated_at`) VALUES
(1, 'Male', '2024-06-08 12:48:45', '2024-06-08 12:48:45'),
(2, 'Female\r\n', '2024-06-08 12:48:51', '2024-06-08 12:48:51');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `payment_method_id` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`payment_method_id`, `payment_method`, `created_at`, `updated_at`) VALUES
(1, 'Cash', '2024-06-08 12:54:44', '2024-06-08 12:54:44'),
(2, 'GCash', '2024-06-08 12:54:49', '2024-06-08 12:54:49');

-- --------------------------------------------------------

--
-- Table structure for table `payment_transactions`
--

CREATE TABLE `payment_transactions` (
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `discount_id` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `change_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_transactions`
--

INSERT INTO `payment_transactions` (`transaction_id`, `user_id`, `payment_method_id`, `discount_id`, `total_amount`, `amount_paid`, `change_amount`, `created_at`, `updated_at`) VALUES
(49, 8, 1, 4, 140.00, 200.00, 88.00, '2024-06-11 10:21:09', '2024-06-11 10:21:09'),
(50, 4, 1, 4, 180.00, 200.00, 56.00, '2024-06-11 11:30:26', '2024-06-11 11:30:26'),
(51, 12, 1, 3, 35.00, 50.00, 15.00, '2024-06-11 13:18:20', '2024-06-11 13:18:20'),
(52, 13, 1, 3, 35.00, 50.00, 15.00, '2024-06-11 21:49:18', '2024-06-11 21:49:18'),
(53, 14, 2, 4, 80.00, 100.00, 36.00, '2024-06-11 22:03:25', '2024-06-11 22:03:25'),
(54, 13, 1, 1, 55.00, 100.00, 56.00, '2024-06-11 23:11:40', '2024-06-11 23:11:40'),
(55, 13, 2, 1, 90.00, 100.00, 28.00, '2024-06-13 22:56:42', '2024-06-13 22:56:42'),
(56, 19, 1, 4, 90.00, 100.00, 28.00, '2024-06-15 04:17:09', '2024-06-15 04:17:09'),
(57, 17, 1, 3, 35.00, 50.00, 15.00, '2024-06-16 01:22:54', '2024-06-16 01:22:54'),
(58, 13, 1, 3, 35.00, 50.00, 15.00, '2024-06-16 01:23:08', '2024-06-16 01:23:08'),
(59, 13, 1, 3, 35.00, 100.00, 65.00, '2024-06-16 01:23:19', '2024-06-16 01:23:19'),
(60, 13, 1, 3, 70.00, 100.00, 30.00, '2024-06-16 01:23:34', '2024-06-16 01:23:34'),
(61, 13, 1, 3, 45.00, 50.00, 5.00, '2024-07-16 01:26:47', '2024-07-16 01:26:47'),
(62, 13, 1, 3, 70.00, 100.00, 30.00, '2024-08-16 01:28:42', '2024-08-16 01:28:42'),
(63, 13, 1, 3, 20.00, 50.00, 30.00, '2025-08-16 01:29:17', '2025-08-16 01:29:17'),
(64, 14, 1, 1, 105.00, 200.00, 116.00, '2024-06-16 01:35:44', '2024-06-16 01:35:44');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(11,0) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_image`, `product_name`, `quantity`, `price`, `supplier_id`, `expiration_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(58, NULL, 'Coca-Cola (1.5L) - Regular', 82, 45, 1, '2024-05-26', '2024-05-26 04:19:19', '2024-06-11 22:01:03', NULL),
(59, NULL, 'Coca-Cola (1.5L) - Zero Sugar', 86, 45, 1, '2024-05-26', '2024-05-26 04:19:19', '2024-06-11 01:41:15', NULL),
(60, NULL, 'Coca-Cola (1.5L) - Cherry', 82, 45, 1, '2024-05-26', '2024-05-26 04:19:19', '2024-07-16 01:26:39', NULL),
(61, NULL, 'Nestle Chuckie (1L) - Chocolate', 100, 60, 2, '2024-05-26', '2024-05-26 04:19:19', '2024-05-26 04:19:19', NULL),
(62, NULL, 'Nestle Chuckie (1L) - Strawberry', 100, 60, 2, '2024-05-26', '2024-05-26 04:19:19', '2024-05-26 04:19:19', NULL),
(63, NULL, 'Lucky Me Pancit Canton - Original', 100, 12, 3, '2024-05-26', '2024-05-26 04:19:19', '2024-05-26 04:19:19', NULL),
(64, NULL, 'Lucky Me Pancit Canton - Chili Mansi', 100, 12, 3, '2024-05-26', '2024-05-26 04:19:19', '2024-05-26 04:19:19', NULL),
(65, NULL, 'Lucky Me Pancit Canton - Calamansi', 100, 12, 3, '2024-05-26', '2024-05-26 04:19:19', '2024-05-26 04:19:19', NULL),
(66, NULL, 'C2 Green Tea (500ml) - Apple', 0, 20, 4, '2024-05-26', '2024-05-26 04:19:19', '2024-06-09 02:07:52', NULL),
(67, NULL, 'C2 Green Tea (500ml) - Lemon', 0, 20, 4, '2024-05-26', '2024-05-26 04:19:19', '2024-06-09 02:12:27', NULL),
(68, 'product_images/7IibBr2Mte6Dz82IlD2qb7bpDjh211bPptwS2Kzj.png', 'C2 Green Tea (500ml) - Peach', 79, 20, 4, '2024-05-26', '2024-05-26 04:19:19', '2025-08-16 01:29:03', NULL),
(69, NULL, 'Oreo Cookies - Original', 100, 45, 5, '2024-05-26', '2024-05-26 04:19:19', '2024-05-26 04:19:19', NULL),
(70, NULL, 'Oreo Cookies - Double Stuf', 100, 45, 5, '2024-05-26', '2024-05-26 04:19:19', '2024-05-26 04:19:19', NULL),
(71, NULL, 'Oreo Cookies - Golden', 100, 45, 5, '2024-05-26', '2024-05-26 04:19:19', '2024-05-26 04:19:19', NULL),
(72, NULL, 'Safeguard Soap - Fresh Clean', 100, 25, 6, '2024-05-26', '2024-05-26 04:19:19', '2024-05-26 04:19:19', NULL),
(73, NULL, 'Safeguard Soap - Pure White', 100, 25, 6, '2024-05-26', '2024-05-26 04:19:19', '2024-05-26 04:19:19', NULL),
(74, NULL, 'Safeguard Soap - Cool Menthol', 100, 25, 6, '2024-05-26', '2024-05-26 04:19:19', '2024-05-26 04:19:19', NULL),
(75, NULL, 'Selecta Ice Cream - Ube Macapuno', 100, 75, 7, '2024-05-26', '2024-05-26 04:19:19', '2024-05-26 04:19:19', NULL),
(76, NULL, 'Selecta Ice Cream - Cookies and Cream', 100, 75, 7, '2024-05-26', '2024-05-26 04:19:19', '2024-05-26 04:19:19', NULL),
(77, NULL, 'Selecta Ice Cream - Mango', 100, 75, 7, '2024-05-26', '2024-05-26 04:19:19', '2024-05-26 04:19:19', NULL),
(78, NULL, 'San Miguel Beer - Pale Pilsen', 100, 30, 1, '2024-05-26', '2024-05-26 04:19:19', '2024-05-26 04:19:19', NULL),
(79, NULL, 'San Miguel Beer - Light', 100, 30, 1, '2024-05-26', '2024-05-26 04:19:19', '2024-05-26 04:19:19', NULL),
(80, NULL, 'San Miguel Beer - Apple', 100, 30, 1, '2024-05-26', '2024-05-26 04:19:19', '2024-05-26 04:19:19', NULL),
(81, NULL, 'Lady\'s Choice Mayonnaise (470ml) - Original', 99, 100, 2, '2024-05-26', '2024-05-26 04:19:19', '2024-06-10 05:05:37', NULL),
(82, NULL, 'Lady\'s Choice Mayonnaise (470ml) - Lite', 98, 100, 2, '2024-05-26', '2024-05-26 04:19:19', '2024-06-08 21:53:18', NULL),
(83, NULL, 'Nescafe Instant Coffee - Classic', 100, 50, 3, '2024-05-26', '2024-05-26 04:19:19', '2024-05-26 04:19:19', NULL),
(84, NULL, 'Nescafe Instant Coffee - Decaf', 100, 50, 3, '2024-05-26', '2024-05-26 04:19:19', '2024-05-26 04:19:19', NULL),
(85, NULL, 'Nescafe Instant Coffee - White Coffee', 100, 50, 3, '2024-05-26', '2024-05-26 04:19:19', '2024-05-26 04:19:19', NULL),
(86, NULL, 'Skyflakes Crackers - Original', 99, 18, 4, '2024-05-26', '2024-05-26 04:19:19', '2024-06-15 04:16:34', NULL),
(87, NULL, 'Skyflakes Crackers - Garlic', 100, 18, 4, '2024-05-26', '2024-05-26 04:19:19', '2024-06-15 04:16:34', NULL),
(88, NULL, 'Skyflakes Crackers - Fit', 100, 18, 4, '2024-05-26', '2024-05-26 04:19:19', '2024-06-15 04:16:34', NULL),
(89, NULL, 'Del Monte Pineapple Juice (1L) - Classic', 100, 45, 5, '2024-05-26', '2024-05-26 04:19:19', '2024-06-11 03:17:12', '2024-06-11 03:17:12'),
(90, NULL, 'Del Monte Pineapple Juice (1L) - Pine-apple', 100, 45, 5, '2024-05-26', '2024-05-26 04:19:19', '2024-06-09 00:18:42', NULL),
(91, NULL, 'Knorr Sinigang Mix - Original', 99, 10, 6, '2024-05-26', '2024-05-26 04:19:19', '2024-06-08 21:53:13', NULL),
(92, NULL, 'Knorr Sinigang Mix - Gabi (Taro)', 99, 10, 6, '2024-05-26', '2024-05-26 04:19:19', '2024-06-09 02:00:45', NULL),
(93, NULL, 'Knorr Sinigang Mix - Sampalok (Tamarind)', 99, 10, 6, '2024-05-26', '2024-05-26 04:19:19', '2024-06-08 21:13:40', NULL),
(94, NULL, 'Jack \'n Jill Chippy - Garlic', 100, 12, 7, '2024-05-26', '2024-05-26 04:19:19', '2024-05-26 04:19:19', NULL),
(95, NULL, 'Jack \'n Jill Chippy - Barbecue', 99, 12, 7, '2024-05-26', '2024-05-26 04:19:19', '2024-06-09 01:58:09', NULL),
(96, NULL, 'Milo Chocolate Powder (300g) - Original', 100, 120, 1, '2024-05-26', '2024-05-26 04:19:19', '2024-05-26 04:19:19', NULL),
(97, NULL, 'Milo Chocolate Powder (300g) - Activ-Go', 100, 120, 1, '2024-05-26', '2024-05-26 04:19:19', '2024-05-26 04:19:19', NULL),
(98, 'product_images/V5f0ArW41HlY7i9kC0Q9DoerfdRekRMi4gc3PRiU.png', 'Century Tuna - Hot and Spicy', 81, 35, 2, '2024-05-26', '2024-05-26 04:19:19', '2024-06-16 01:23:22', NULL),
(99, 'product_images/etMNA3Mivosue6n5qUbteT8ZfcuyiPjMj0gsuj5V.png', 'Century Tuna - Flakes in Oil', 76, 35, 2, '2024-05-26', '2024-05-26 04:19:19', '2024-08-16 01:28:29', NULL),
(100, NULL, 'Century Tuna - Lite', 81, 35, 2, '2024-05-26', '2024-05-26 04:19:19', '2024-06-16 01:23:10', NULL),
(101, NULL, 'Lipton Yellow Label Tea (25 bags) - Regular', 99, 80, 3, '2024-05-26', '2024-05-26 04:19:19', '2024-06-10 05:05:36', NULL),
(102, NULL, 'Lipton Yellow Label Tea (25 bags) - Earl Grey', 99, 80, 3, '2024-05-26', '2024-05-26 04:19:19', '2024-06-10 05:05:36', NULL),
(103, NULL, 'Gardenia Bread - White', 99, 50, 4, '2024-05-26', '2024-05-26 04:19:19', '2024-06-11 07:49:00', NULL),
(104, NULL, 'Gardenia Bread - Chocolate', 100, 50, 4, '2024-05-26', '2024-05-26 04:19:19', '2024-06-10 05:24:27', NULL),
(105, NULL, 'Gardenia Bread - Wheat', 97, 50, 4, '2024-05-26', '2024-05-26 04:19:19', '2024-06-10 05:01:09', NULL),
(106, NULL, 'Golden Fiesta Cooking Oil (1L) - Vegetable', 96, 90, 5, '2024-05-26', '2024-05-26 04:19:19', '2024-06-10 05:01:12', NULL),
(107, NULL, 'Golden Fiesta Cooking Oil (1L) - Canola', 98, 90, 5, '2024-05-26', '2024-05-26 04:19:19', '2024-06-09 02:06:32', NULL),
(108, NULL, 'Purefoods Corned Beef - Classic', 100, 45, 6, '2024-05-26', '2024-05-26 04:19:19', '2024-05-26 04:19:19', NULL),
(109, NULL, 'Purefoods Corned Beef - Lite', 100, 45, 6, '2024-05-26', '2024-05-26 04:19:19', '2024-05-26 04:19:19', NULL),
(110, NULL, 'Purefoods Corned Beef - Chili Corned Beef', 100, 45, 6, '2024-05-26', '2024-05-26 04:19:19', '2024-05-26 04:19:19', NULL),
(111, 'product_images/Zm6xlpwd4qihBfNWP6OFXRyO9crVx3xAWhP8Rlzf.png', 'Apple Juice - Regular', 74, 35, 1, '2026-07-08', '2024-06-11 03:18:00', '2024-06-16 01:35:30', NULL),
(112, NULL, 'asdf', 123, 123, 1, '2024-06-26', '2024-06-11 03:47:28', '2024-06-11 03:50:37', '2024-06-11 03:50:37'),
(113, NULL, 'asdffd', 123, 123, 1, '2024-06-14', '2024-06-11 04:05:08', '2024-06-11 04:05:45', '2024-06-11 04:05:45'),
(114, NULL, 'asdff', 123, 123, 1, '2024-06-13', '2024-06-11 04:05:55', '2024-06-11 04:16:33', '2024-06-11 04:16:33'),
(115, NULL, 'asdffff', 100, 123, 1, '2024-06-21', '2024-06-11 04:16:43', '2024-06-11 04:27:24', '2024-06-11 04:27:24'),
(116, NULL, 'abcde', 86, 50, 1, '2024-06-21', '2024-06-11 04:25:54', '2024-06-11 04:27:21', '2024-06-11 04:27:21'),
(117, NULL, 'asdf23', 100, 123, 2, '2024-06-29', '2024-06-11 04:45:11', '2024-06-11 07:28:03', '2024-06-11 07:28:03'),
(118, NULL, 'afsdfasdfa', 123, 123, 1, '2024-06-26', '2024-06-11 04:46:18', '2024-06-11 04:47:43', '2024-06-11 04:47:43'),
(119, NULL, 'aaaaaaaaaaaaaa', 123, 123, 1, '2024-06-22', '2024-06-11 13:18:58', '2024-06-11 13:19:01', '2024-06-11 13:19:01'),
(120, NULL, 'asdfasd', 123, 123, 1, '2024-06-20', '2024-06-11 23:19:21', '2024-06-11 23:19:30', '2024-06-11 23:19:30'),
(121, 'product_images/i8408ml0NNUQzeRjejs8bgzPLT7v9hcku6IbMEhi.jpg', 'asdfewf', 123, 123, 1, '2024-06-21', '2024-06-11 23:19:48', '2024-06-11 23:19:54', '2024-06-11 23:19:54'),
(122, 'product_images/UYmD5tkcDN2IVytxO2ONWSI8WYiyA1Trr9Wm0Fpt.png', 'Test', 123, 123, 1, '2024-06-20', '2024-06-16 01:38:16', '2024-06-16 01:38:42', '2024-06-16 01:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `product_transaction`
--

CREATE TABLE `product_transaction` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_transaction`
--

INSERT INTO `product_transaction` (`id`, `transaction_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 49, 99, 1, 35.00, '2024-06-11 10:21:09', '2024-06-11 10:21:09'),
(2, 49, 98, 1, 35.00, '2024-06-11 10:21:09', '2024-06-11 10:21:09'),
(3, 49, 100, 2, 35.00, '2024-06-11 10:21:09', '2024-06-11 10:21:09'),
(4, 50, 60, 1, 45.00, '2024-06-11 11:30:26', '2024-06-11 11:30:26'),
(5, 50, 58, 3, 45.00, '2024-06-11 11:30:26', '2024-06-11 11:30:26'),
(6, 51, 111, 1, 35.00, '2024-06-11 13:18:20', '2024-06-11 13:18:20'),
(7, 52, 98, 1, 35.00, '2024-06-11 21:49:18', '2024-06-11 21:49:18'),
(8, 53, 111, 1, 35.00, '2024-06-11 22:03:25', '2024-06-11 22:03:25'),
(9, 53, 58, 1, 45.00, '2024-06-11 22:03:25', '2024-06-11 22:03:25'),
(10, 54, 68, 1, 20.00, '2024-06-11 23:11:40', '2024-06-11 23:11:40'),
(11, 54, 99, 1, 35.00, '2024-06-11 23:11:40', '2024-06-11 23:11:40'),
(12, 55, 111, 1, 35.00, '2024-06-13 22:56:42', '2024-06-13 22:56:42'),
(13, 55, 68, 1, 20.00, '2024-06-13 22:56:42', '2024-06-13 22:56:42'),
(14, 55, 99, 1, 35.00, '2024-06-13 22:56:42', '2024-06-13 22:56:42'),
(15, 56, 111, 1, 35.00, '2024-06-15 04:17:09', '2024-06-15 04:17:09'),
(16, 56, 68, 1, 20.00, '2024-06-15 04:17:09', '2024-06-15 04:17:09'),
(17, 56, 99, 1, 35.00, '2024-06-15 04:17:09', '2024-06-15 04:17:09'),
(18, 57, 111, 1, 35.00, '2024-06-16 01:22:54', '2024-06-16 01:22:54'),
(19, 58, 99, 1, 35.00, '2024-06-16 01:23:08', '2024-06-16 01:23:08'),
(20, 59, 100, 1, 35.00, '2024-06-16 01:23:19', '2024-06-16 01:23:19'),
(21, 60, 98, 1, 35.00, '2024-06-16 01:23:34', '2024-06-16 01:23:34'),
(22, 60, 99, 1, 35.00, '2024-06-16 01:23:34', '2024-06-16 01:23:34'),
(23, 61, 60, 1, 45.00, '2024-07-16 01:26:47', '2024-07-16 01:26:47'),
(24, 62, 99, 2, 35.00, '2024-08-16 01:28:42', '2024-08-16 01:28:42'),
(25, 63, 68, 1, 20.00, '2025-08-16 01:29:17', '2025-08-16 01:29:17'),
(26, 64, 111, 3, 35.00, '2024-06-16 01:35:44', '2024-06-16 01:35:44');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2024-06-08 12:49:53', '2024-06-08 12:49:53'),
(2, 'User/Employee', '2024-06-08 12:50:20', '2024-06-08 12:51:04');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier`, `created_at`, `updated_at`) VALUES
(1, 'Metro Mart', '2024-05-26 04:05:34', '2024-05-26 04:05:34'),
(2, 'Super Corp', '2024-05-26 04:06:08', '2024-05-26 04:06:08'),
(3, 'Wholesale Trading Inc.', '2024-05-26 04:06:20', '2024-05-26 04:06:20'),
(4, 'Direct Supplier PH', '2024-05-26 04:06:29', '2024-05-26 04:06:29'),
(5, 'Supplier Plus+', '2024-05-26 04:06:39', '2024-05-26 04:06:39'),
(6, 'Supply Chain Solutions', '2024-05-26 04:06:51', '2024-05-26 04:06:51'),
(7, 'Philippine Distributors', '2024-05-26 04:07:04', '2024-05-26 04:07:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `suffix_name` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `profile_picture`, `first_name`, `middle_name`, `last_name`, `suffix_name`, `birthday`, `gender_id`, `address`, `contact_number`, `email`, `username`, `password`, `role_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'Charles', 'sdaf', 'Diestro', NULL, '2001-01-01', 1, 'Rawr', '09123456789', 'cmdiestro@yooha.au', 'admin123', 'admin123', 2, '2024-06-08 12:52:44', '2024-06-11 00:38:02', '2024-06-11 00:38:02'),
(3, NULL, 'sdasdasd', 'Manuel', 'Diestro', NULL, '2024-06-06', 1, 'Abc, 123', '09123456789', 'asdf123@gmail.com', 'asdf123', 'asdf123', 2, '2024-06-11 08:41:05', '2024-06-11 02:29:56', '2024-06-11 02:29:56'),
(4, NULL, 'Kezia Landrea', 'Angel', 'Dolor', 'Cutie', '2024-06-11', 2, 'Rawr', '09123456789', 'kezzzya@gmail.com', 'kezzy', NULL, 2, '2024-06-11 02:27:40', '2024-06-11 12:23:20', '2024-06-11 12:23:20'),
(6, NULL, 'Charles Manuel', NULL, 'Diestro', NULL, '2024-06-11', 1, 'Abc, 123', '09325869567', 'cmdiestro@shxtxp.co', 'cmdiestro', NULL, 1, '2024-06-11 02:31:39', '2024-06-11 12:23:15', '2024-06-11 12:23:15'),
(7, NULL, 'asdfasdf', 'asdf', 'asdf', 'asdf', '2024-06-27', 1, 'Abc, 123', '09123456789', 'asdfzzasdfya@gmail.com', 'asdfasdf', NULL, 2, '2024-06-11 04:49:16', '2024-06-11 04:49:49', '2024-06-11 04:49:49'),
(8, NULL, 'Charles Manuel', NULL, 'Diestro', NULL, '2024-06-21', 1, 'Abc, 123', '09432940345', 'cmdiestro+2@shxtxp.co', 'cmdiestro2', NULL, 2, '2024-06-11 09:10:18', '2024-06-11 12:23:18', '2024-06-11 12:23:18'),
(11, 'profile_pictures/pqTGcoFstJdJIwBB8Qijyi8WjUA4v5yhOiUM4sI7.png', 'Charles Manuel', NULL, 'Diestro', NULL, '2024-06-20', 1, 'Abc, 123', '09123456789', 'charlzzzzz@gmail.com', 'charlzzzzz', '$2y$12$bp5ZvATbFWDj4NVb7r5fHOlOdb8jg0UiOJsUJ8pm7JjECAPkkfDjK', 1, '2024-06-11 12:30:34', '2024-06-11 23:22:08', NULL),
(12, 'profile_pictures/vCdeiBL8KzEWj0yr51WWTOt13yqdHZoFKhEQvnhR.png', 'Kezia Landrea', NULL, 'Dolor', NULL, '2024-06-26', 2, 'Rawr', '09325869567', 'kezzzyaa@gmail.com', 'kezzzyaa', '$2y$12$iotPR5IPOY344tXMc/Umz.2KmOFZz8L8AJ7j9X1HkBhO/T9W6zi2m', 1, '2024-06-11 13:17:11', '2024-06-14 06:00:09', NULL),
(13, 'profile_pictures/c8bt5UIyTdj3sa9IFaTdWsBab5vxngsFaoqUdhgz.jpg', 'Geopard', NULL, 'Lecko', NULL, '2024-06-28', 1, 'Abc, 123', '09915748395', 'geopardlecko@yahoo.com', 'deardedbragon', '$2y$12$UXHv65MEl8U1I9Z73D.P2.l8AIv.jf3/vkvZPBxDvb1lf09nI4hZC', 2, '2024-06-11 20:09:04', '2024-06-11 20:31:18', NULL),
(14, 'profile_pictures/aEYsBQzbqTc1G2Nmd9Wx9wqMvGvwWh80l5Yj9IvT.jpg', 'Mraying', NULL, 'Pantis', NULL, '2024-07-04', 2, 'Rawr', '09915483924', 'prayingmantis@insect.world', 'prayingmantis@', '$2y$12$Aec4fvqaMmHVt4Od/LgkG.PbUKnZkQllNO5iQogz/P36uGAGDSy3m', 2, '2024-06-11 21:15:35', '2024-06-11 23:13:47', NULL),
(15, 'profile_pictures/0JDKsGqXR1OkyTaZrPk2KpN423Xnf6lb46JCgkxI.jpg', 'asdf', 'asdf', 'asdf', 'asdf', '2024-06-25', 1, 'Abc, 123', '092348545675', 'asdffdsa@gmail.com', 'asdffdsa', '$2y$12$mKEr2yfpJOI1xkT1BOBHZOkkEt/qudQZNZUZkfGC5qeoIR2l.qo3m', 1, '2024-06-11 23:22:39', '2024-06-14 02:59:21', '2024-06-14 02:59:21'),
(16, 'profile_pictures/H3immcUeErSCPx1Qr5yMDJx1ueidSmGYT6U64V4I.png', 'Karl Dave', NULL, 'Basas', NULL, '2024-06-19', 1, 'Abc, 123', '09345693456', 'kbasas@gmail.com', 'kbasas', '$2y$12$H3DmPU8DXhuFK8JJAwyO/O0mgx0R3UnZQmB7CgvjNEaECHL.SXpJO', 1, '2024-06-14 03:26:05', '2024-06-14 03:40:56', NULL),
(17, 'profile_pictures/EaDUnhBpYaNqI2SYQlWfS01sbdoJTR2NcPUcWqUk.jpg', 'Ian Gabriel', NULL, 'Dichosa', NULL, '2024-06-18', 1, 'Abc, 123', '09348345695', 'igdichosa@gmail.com', 'igdichosa', '$2y$12$ukbwVyv8cBi6PErHC2c.6Owiyq0JNdnMk5Buoa3iCGy2u4Vhd0ede', 2, '2024-06-14 03:28:42', '2024-06-14 03:41:12', NULL),
(18, 'profile_pictures/p6niH9uduVTDXEMilLRRymL9RejsAV8BHy4EsXXg.jpg', 'Stanly', NULL, 'Kinnes', NULL, '2024-06-20', 1, 'Abc, 123', '09586948567', 'skinnes@gmail.com', 'skinnes', '$2y$12$sC26htztoZFLCYhIimxM7u0ds5gWzBscoU/uHzxE7WXBzO/n5/xD2', 1, '2024-06-14 03:31:49', '2024-06-14 03:41:20', NULL),
(19, 'profile_pictures/92UzNLGN36ut9Al1HzNwywseQAcSSPHM5Djhct0a.jpg', 'Jhonaby', NULL, 'Leonor', NULL, '2024-06-20', 2, 'Abc, 123', '09856754321', 'jleonor@gmail.com', 'jleonor', '$2y$12$IU2mU7dcGUzxmxMBji6.tOUfkV5y1ybsj.genwNRCTntUWtUjTqle', 2, '2024-06-14 03:35:26', '2024-06-14 03:41:31', NULL),
(20, 'profile_pictures/cGfKqT7noRmoXol8tHImOX3WgihSsolV0B0DWLpW.png', 'Ezekiel David', NULL, 'Najera', NULL, '2024-06-26', 1, 'Abc, 123', '09574393485', 'ednajera@gmail.com', 'ednajera', '$2y$12$fEJxcc/efwsyh3EayFQYz.K0bzhGOpwo4ufljeO3LAhdtlKaTTV4e', 1, '2024-06-14 03:37:15', '2024-06-14 03:41:57', NULL),
(21, 'profile_pictures/yIgAS2G0SzOPrXbJ5vZgK6B8kBuj44CKFANk3k0Z.jpg', 'Wealyn', NULL, 'Yap', NULL, '2024-06-18', 2, 'Abc, 123', '09347389287', 'wyap@gmail.com', 'wyap', '$2y$12$88xBSK9WqbozDuvWH1jRIuNHWJ0j/6kCsQIeOeMFxJWDfEkKttV6O', 1, '2024-06-14 03:40:40', '2024-06-14 03:42:06', NULL),
(22, 'profile_pictures/gDsz4MfecfFh9fbvmjWy2K174zAewwm94iiMM27o.png', 'Vincent', NULL, 'Bacia', NULL, '2024-06-13', 1, 'Abc, 123', '09787654356', 'vbacia@gmail.com', 'vbacia@', '$2y$12$fxGKmgkDhDHK0bebGuLzquMGetvbAzSNBm0B3aSqCLQeAN1QWRnKC', 1, '2024-06-15 04:23:56', '2024-06-15 04:24:14', NULL),
(23, 'profile_pictures/Qsm9aNu1Wzyy1f1EKu2cQ6q1dxpDhdaiIoG5MCvZ.png', 'asdf', 'asdfa', 'sdf', 'asdf', '2024-06-04', 2, 'asdf', '09325869567', 'asdfasdf@gmail.com', 'asdfasdfasdfasdf', '$2y$12$zJxT9EyMXWuHhBT6gQbJDeE.nN8MnlsMwY4wYVPe9VM28eWWmpAXu', 1, '2024-06-16 01:39:42', '2024-06-16 01:40:06', '2024-06-16 01:40:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`discount_id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`payment_method_id`);

--
-- Indexes for table `payment_transactions`
--
ALTER TABLE `payment_transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `payment_method_id` (`payment_method_id`),
  ADD KEY `discount_id` (`discount_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `product_transaction`
--
ALTER TABLE `product_transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `gender_id` (`gender_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `gender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `payment_method_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_transactions`
--
ALTER TABLE `payment_transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `product_transaction`
--
ALTER TABLE `product_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `payment_transactions`
--
ALTER TABLE `payment_transactions`
  ADD CONSTRAINT `payment_transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `payment_transactions_ibfk_2` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`payment_method_id`),
  ADD CONSTRAINT `payment_transactions_ibfk_3` FOREIGN KEY (`discount_id`) REFERENCES `discounts` (`discount_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`supplier_id`);

--
-- Constraints for table `product_transaction`
--
ALTER TABLE `product_transaction`
  ADD CONSTRAINT `product_transaction_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `payment_transactions` (`transaction_id`),
  ADD CONSTRAINT `product_transaction_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`gender_id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
