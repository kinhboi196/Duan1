-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 09, 2024 at 06:50 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`id`, `name`) VALUES
(1, 'Kích thước'),
(2, 'Màu sắc');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_value`
--

CREATE TABLE `attribute_value` (
  `id` int NOT NULL,
  `attribute_id` int NOT NULL,
  `value` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `attribute_value`
--

INSERT INTO `attribute_value` (`id`, `attribute_id`, `value`) VALUES
(1, 1, 'M'),
(2, 1, 'L'),
(3, 2, 'Đỏ'),
(4, 2, 'Xanh');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-11-13 04:03:53', '2024-11-13 04:03:53'),
(2, 2, '2024-11-13 04:03:53', '2024-11-13 04:03:53'),
(3, 21, '2024-12-04 03:42:37', '2024-12-04 03:42:37'),
(5, 27, '2024-12-05 10:31:07', '2024-12-05 10:31:07'),
(6, 28, '2024-12-05 22:32:15', '2024-12-05 22:32:15');

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

CREATE TABLE `cart_detail` (
  `id` int NOT NULL,
  `cart_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int DEFAULT '1',
  `product_variants_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `cart_detail`
--

INSERT INTO `cart_detail` (`id`, `cart_id`, `product_id`, `quantity`, `product_variants_id`) VALUES
(4, 3, 41, 9, NULL),
(5, 3, 39, 11, NULL),
(51, 6, 39, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Giày  Nike'),
(4, 'Giày Jondan'),
(6, 'Giày Nike Siêu Cấp');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `status` enum('pending','completed','canceled','processing','onhold','confirmed','shipped','delivered','refunded','failed','returned','partial','awaitingpayment') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT 'pending',
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8mb3_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `notes` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `status`, `total`, `created_at`, `updated_at`, `name`, `address`, `phone`, `email`, `notes`) VALUES
(13, 27, 'canceled', '2250000.00', '2024-12-05 07:31:47', '2024-12-05 18:43:52', 'Luu minh duc', '', '', 'minhduc23052005', ''),
(14, 27, 'canceled', '1539000.00', '2024-12-05 07:42:55', '2024-12-05 18:46:17', 'Luu minh duc', '', '', 'minhduc23052005', ''),
(15, 27, 'canceled', '350000.00', '2024-12-05 10:59:28', '2024-12-05 18:50:09', 'Luu minh duc', 'hanoi', '344643575', 'minhduc23052005', ''),
(16, 27, 'canceled', '580000.00', '2024-12-05 11:03:14', '2024-12-05 18:50:24', 'Luu minh duc', '', '', 'minhduc23052005', ''),
(17, 28, 'processing', '340000.00', '2024-12-05 22:32:39', '2024-12-06 10:00:15', 'Luu minh duc', '', '', 'minhduc23', ''),
(18, 28, 'canceled', '350000.00', '2024-12-05 22:40:14', '2024-12-06 05:40:52', 'Luu minh duc', '', '', 'minhduc23', ''),
(19, 28, 'canceled', '680000.00', '2024-12-05 22:43:43', '2024-12-06 05:44:10', 'Luu minh duc', '', '', 'minhduc23', ''),
(20, 28, 'completed', '350000.00', '2024-12-06 02:08:02', '2024-12-06 09:40:17', 'Luu minh duc', '', '', 'minhduc23', ''),
(21, 28, 'completed', '350000.00', '2024-12-06 02:09:41', '2024-12-06 09:38:53', 'Luu minh duc', '', '', 'minhduc23', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int DEFAULT '1',
  `price` int NOT NULL,
  `product_variants_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quantity`, `price`, `product_variants_id`) VALUES
(32, 13, 41, 5, 450000, NULL),
(33, 14, 39, 2, 400000, NULL),
(34, 14, 40, 1, 39000, NULL),
(35, 14, 38, 2, 350000, NULL),
(36, 15, 38, 1, 350000, NULL),
(37, 16, 44, 1, 580000, NULL),
(38, 17, 43, 1, 340000, NULL),
(39, 18, 36, 1, 350000, NULL),
(40, 19, 43, 2, 340000, NULL),
(41, 20, 36, 1, 350000, NULL),
(42, 21, 36, 1, 350000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `price` int NOT NULL,
  `price_sale` int DEFAULT NULL,
  `stock` int DEFAULT '0',
  `image_main` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `description`, `price`, `price_sale`, `stock`, `image_main`, `created_at`, `updated_at`) VALUES
(36, 'Nike', 1, '                                                                                                Giày số 1                                                                                        ', 750000, 350000, 29, 'assets/Admin/upload674edc5924db8.jpg', '2024-11-25 17:50:08', '2024-12-03 04:43:36'),
(38, 'Nike', 1, '                                                                                                                                                                                                                                                                                              Giày số 1                                                                                                                                                                                                                                                   ', 800000, 350000, 29, 'assets/Admin/upload674edd1286094.jpg', '2024-11-25 18:08:31', '2024-12-03 04:35:15'),
(39, 'Nike', 6, '                                                                                                                                                                                          Giày số 1                                                                                                                                                                          ', 620000, 400000, 29, 'assets/Admin/upload674edd5c73540.jpg', '2024-11-25 19:12:26', '2024-12-03 04:40:33'),
(40, 'Nike', 1, '                                                                                                                                                                                                                            Giày số 1                                                                                                                                                                                                                ', 750000, 39000, 19, 'assets/Admin/upload674ef0b6660af.jpg', '2024-11-27 18:32:32', '2024-12-03 04:51:18'),
(41, 'Jodan', 4, '                                                                                                                                                                                                                                                Giày số 1                                                                                                                                                                                                                       ', 750000, 450000, 122, 'assets/Admin/upload674edf67013c5.jpg', '2024-11-28 07:26:49', '2024-12-03 04:39:48'),
(42, 'Nike', 1, '                                                                                                                                                                                                                                                                                                                                                                                                                                                Giày số 1                                                                                                                                                                                                                                                                                                                                                                                            ', 700000, 500000, 12, 'assets/Admin/upload674ef091e9e50.jpg', '2024-11-28 07:39:22', '2024-12-03 04:50:41'),
(43, 'Jodan', 4, '                                                                                                                                                                                            Giày số 1                                                                                        ', 660000, 340000, 12, 'assets/Admin/upload674ee0515ed7f.jpg', '2024-11-28 07:51:51', '2024-12-03 04:39:11'),
(44, 'Jodan', 4, '                                                                                         Giày số 1                                                                    ', 800000, 580000, 12, 'assets/Admin/upload674ee08ceba19.jpg', '2024-11-29 00:58:24', '2024-12-03 04:40:21'),
(45, 'Nike', 6, '                                                Giày số 1                                            ', 750000, 350000, 19, 'assets/Admin/upload674ee134a0220.jpg', '2024-12-03 03:45:08', '2024-12-03 04:43:53'),
(46, 'Nike', 6, '                                                Giày số 1                                            ', 850000, 450000, 19, 'assets/Admin/upload674ee17ca29b2.jpg', '2024-12-03 03:46:20', '2024-12-03 04:44:22'),
(47, 'Jodan', 4, '                                                Giày số 1                                            ', 650000, 550000, 19, 'assets/Admin/upload674ee1b2e69fa.jpg', '2024-12-03 03:47:14', '2024-12-03 04:42:04'),
(48, 'Nike', 6, '                                                                                                                                                Giày số 1                                                                                                                                    ', 730000, 560000, 19, 'assets/Admin/upload674ee1f556ca9.jpg', '2024-12-03 03:48:21', '2024-12-03 04:40:06');

-- --------------------------------------------------------

--
-- Table structure for table `product_comment`
--

CREATE TABLE `product_comment` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  `comment` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `parent` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `product_comment`
--

INSERT INTO `product_comment` (`id`, `product_id`, `user_id`, `comment`, `parent`, `created_at`) VALUES
(3, 38, 21, 'Giày đẹp và sang', NULL, '2024-12-03 07:04:21'),
(4, 38, 23, 'Cảm ơn bạn', 3, '2024-12-04 07:04:21'),
(10, 43, 21, 'ez', NULL, '2024-12-03 06:35:05'),
(11, 38, 11, 'Cảm ơn bạn đã phản hồi', 3, '2024-12-03 16:13:37');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_rating`
--

CREATE TABLE `product_rating` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  `rating` tinyint DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_rating`
--

INSERT INTO `product_rating` (`id`, `product_id`, `user_id`, `rating`, `created_at`) VALUES
(3, 43, 21, 5, '2024-12-03 06:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `sku` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_variant_attribute`
--

CREATE TABLE `product_variant_attribute` (
  `id` int NOT NULL,
  `attribute_value_id` int NOT NULL,
  `product_variants_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `role` enum('1','2') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '2' COMMENT '1: Admin\r\n2: User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `phone`, `image`, `created_at`, `updated_at`, `role`) VALUES
(1, 'admin', 'admin1', '$2y$10$D6eGEXjizbveVanYRHUx8OEWh8OAU/g5obaQL/Nse7YlUjxybuniS', 'jsjjs', '92828', 'assets/Admin/upload6749a14f8d733.jpg', '2024-11-13 04:02:30', '2024-11-29 05:18:40', '1'),
(2, 'Jane Smith', 'jane@example.com', '$2y$10$KPhZ0zHE.98Mb95.ttpkqOoMxKny4k3Tf4s9BNwXaJJrC9kjYE/Vm', '456 Elm St', '0987654321', NULL, '2024-11-13 04:02:30', '2024-11-18 03:11:22', '2'),
(8, 'Long2', 'admin@gmail.com', '$2y$10$7.mPvPl3i0a.rFt2hwSs0.yECIeen7YO77o8u9/3l.VbPmhXYuMrq', 'dsvsdvsd', '23423423', 'assets/Admin/upload/673ae43b1596d.png', '2024-11-18 00:52:43', '2024-11-18 00:52:43', '2'),
(11, 'admin', 'admin', '$2y$10$D6eGEXjizbveVanYRHUx8OEWh8OAU/g5obaQL/Nse7YlUjxybuniS', 'jsjjs', '92828', 'assets/Admin/upload674d253ad294d.jpg', '2024-11-22 09:02:36', '2024-12-01 20:10:50', '1'),
(12, 'Nguoi dung so 2', 'user', '$2y$10$jRmpvg3CV8rLBdCdE.zH8uV1QvpyeAuRR04zSqyav2Ip0zlDs5em.', 'aaa', '1231231', 'assets/Admin/upload/67462b109abfa.jpg', '2024-11-25 23:26:20', '2024-11-26 13:14:32', '2'),
(21, 'Phạm Hoài Nam', 'kinhboi196', '$2y$10$1qZCJ9960CwDa9M4s0bV9.WIUydCskmDNb.XGL0opsWxMUBEkzvki', 'Hà Nội', '0766304377', 'assets/Users/upload/6746fbb509d8d.jpg', '2024-11-26 11:32:40', '2024-11-29 05:21:34', '2'),
(23, 'Lưu Minh Đức', 'gizom', '$2y$10$U7h4VNuewG2I1tSnfdy5Ouwmrkb.1bOB/eFBz62S/M1AZkNIDGPdq', 'Hà Nội', '123123', 'assets/Admin/upload/67465e37c635f.jpg', '2024-11-26 16:47:33', '2024-12-03 00:41:25', '1'),
(24, 'Phạm Hoài Nam', 'n@gmail.com', '$2y$10$uhIYCICE2MzufBfwc04qIubJcIyvG9rFuf2NmIP1BJkG577Uq2QkC', NULL, NULL, NULL, '2024-11-26 17:12:30', '2024-11-26 17:12:30', '2'),
(25, 'Áo thun', '123', '$2y$10$hXVKE/Q7a0Ie.WX1KVvhQuRG1Nh6CWz3BMOZBtBNhN1ex8NBv.0yK', NULL, NULL, NULL, '2024-11-26 17:49:10', '2024-11-26 17:49:10', '2'),
(26, 'Áo thun', '1111', '$2y$10$jH4O1Fe4ikjXhHEwOubwXOdGAIJG87PcdaHf3HrqRFGDVimeCKVzC', '123', '123', 'assets/Users/upload/6746fd4785426.jpg', '2024-11-27 04:06:26', '2024-11-27 04:06:47', '2'),
(27, 'Luu minh duc', 'minhduc23052005', '$2y$10$8R7GcsJ8Ki.ky2Oledw3QOJ70OIG9EdBasQhdWzvy2qVCDNLjXu/u', '', '', '', '2024-12-05 03:30:04', '2024-12-05 03:31:00', '2'),
(28, 'Luu minh duc', 'minhduc23', '$2y$10$N05V0CAdCa0M5qLAcs0Gd.T0TVKxfMJJSO6wT2vnMW.GWyB.Jof/C', NULL, NULL, NULL, '2024-12-05 22:31:52', '2024-12-05 22:31:52', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_value`
--
ALTER TABLE `attribute_value`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_id` (`attribute_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `product_variants_id` (`product_variants_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `product_variants_id` (`product_variants_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_comment`
--
ALTER TABLE `product_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_rating`
--
ALTER TABLE `product_rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_variant_attribute`
--
ALTER TABLE `product_variant_attribute`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_value_id` (`attribute_value_id`),
  ADD KEY `product_variants_id` (`product_variants_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attribute_value`
--
ALTER TABLE `attribute_value`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `product_comment`
--
ALTER TABLE `product_comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product_rating`
--
ALTER TABLE `product_rating`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_variant_attribute`
--
ALTER TABLE `product_variant_attribute`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_value`
--
ALTER TABLE `attribute_value`
  ADD CONSTRAINT `attribute_value_ibfk_1` FOREIGN KEY (`attribute_id`) REFERENCES `attribute` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD CONSTRAINT `cart_detail_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`),
  ADD CONSTRAINT `cart_detail_ibfk_3` FOREIGN KEY (`product_variants_id`) REFERENCES `product_variants` (`id`),
  ADD CONSTRAINT `cart_detail_ibfk_4` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `order_detail_ibfk_3` FOREIGN KEY (`product_variants_id`) REFERENCES `product_variants` (`id`),
  ADD CONSTRAINT `order_detail_ibfk_4` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `product_comment`
--
ALTER TABLE `product_comment`
  ADD CONSTRAINT `product_comment_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `product_comment_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `product_rating`
--
ALTER TABLE `product_rating`
  ADD CONSTRAINT `product_rating_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `product_rating_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `product_variant_attribute`
--
ALTER TABLE `product_variant_attribute`
  ADD CONSTRAINT `product_variant_attribute_ibfk_1` FOREIGN KEY (`attribute_value_id`) REFERENCES `attribute_value` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_variant_attribute_ibfk_2` FOREIGN KEY (`product_variants_id`) REFERENCES `product_variants` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
