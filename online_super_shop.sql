-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 01, 2025 at 08:17 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_super_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `landmark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'home',
  `isdefault` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `name`, `phone`, `locality`, `address`, `city`, `state`, `country`, `landmark`, `zip`, `type`, `isdefault`, `created_at`, `updated_at`) VALUES
(4, 4, 'Morsalin Khan Jusad', '01915414085', 'Sarulia', 'PATWARI BARI', 'JATRABARI', 'DHAKA', 'Bangladesh', 'Demra', '1232', 'home', 1, '2024-12-22 09:21:18', '2024-12-22 09:21:18'),
(5, 5, 'ARIF HAWLADER', '01915414085', 'Bokultola', 'East Boxnogor', 'Sarulia', 'DHAKA', 'Bangladesh', 'Demra', '1361', 'home', 1, '2024-12-22 09:29:30', '2024-12-22 09:29:30');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Frito Lay', 'frito-lay', '1732937953.jpg', '2024-11-29 21:39:13', '2024-11-29 21:39:13'),
(2, 'Nespresso', 'nespresso', '1733235500.jpg', '2024-12-03 08:18:20', '2024-12-03 08:18:20');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('admin@example.com|127.0.0.1', 'i:2;', 1735057970),
('admin@example.com|127.0.0.1:timer', 'i:1735057970;', 1735057970);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `icon_name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Biscuits & Snacks', 'biscuits-and-snacks', 'fa-solid fa-cookie-bite', '1735110415.jpg', '2024-11-29 21:40:19', '2024-12-25 01:06:55'),
(2, 'Beverages', 'beverages', 'fa-solid fa-mug-saucer', '1735110396.jpg', '2024-12-03 06:56:33', '2024-12-25 01:06:36'),
(3, 'Breads & Bakery', 'breads-and-bakery', 'fa-solid fa-egg', '1735110509.jpg', '2024-12-03 08:15:22', '2024-12-25 01:08:29'),
(4, 'Fruits & vegetables', 'fruits-and-vegetables', 'fa-brands fa-apple', '1735110530.jpg', '2024-12-25 00:33:39', '2024-12-25 01:08:50'),
(5, 'meats & seafood', 'meats-and-seafood', 'fa-solid fa-drumstick-bite', '1735110480.jpg', '2024-12-25 00:45:27', '2024-12-25 01:08:00'),
(7, 'Breakfast & Dairy', 'breakfast-and-dairy', 'fa-solid fa-egg', '1735110464.jpg', '2024-12-25 00:46:39', '2024-12-25 01:07:44'),
(8, 'Frozen Foods', 'frozen-foods', 'fa-solid fa-ice-cream', '1735110451.png', '2024-12-25 00:47:38', '2024-12-25 01:07:31'),
(10, 'Grocery & Staples', 'grocery-and-staples', 'fa-solid fa-cart-shopping', '1735110436.png', '2024-12-25 00:48:30', '2024-12-25 01:07:16'),
(11, 'household needs', 'household-needs', NULL, '1735110573.jpg', '2024-12-25 01:09:33', '2024-12-25 01:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint UNSIGNED NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `images`, `images_id`, `created_at`, `updated_at`) VALUES
(1, '1732938148_product-image2-46-600x540.jpg', 1, '2024-11-29 21:42:28', '2024-11-29 21:42:28'),
(2, '1732938148_product-image3-34-600x540.jpg', 1, '2024-11-29 21:42:28', '2024-11-29 21:42:28'),
(3, '1732938244_product-image2-2-600x540.jpg', 2, '2024-11-29 21:44:04', '2024-11-29 21:44:04'),
(4, '1732938244_product-image3-2-600x540.jpg', 2, '2024-11-29 21:44:04', '2024-11-29 21:44:04'),
(5, '1732938352_product-image2-2-600xd540.jpg', 3, '2024-11-29 21:45:52', '2024-11-29 21:45:52'),
(6, '1733248000_product-image2-43-600x540.jpg', 5, '2024-12-03 11:46:40', '2024-12-03 11:46:40'),
(7, '1733300634_product-image2-11-600x540.jpg', 6, '2024-12-04 02:23:54', '2024-12-04 02:23:54');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `icon_name`, `link`, `created_at`, `updated_at`) VALUES
(1, 'home', 'null', 'home', '2024-12-23 12:25:52', '2024-12-24 11:43:24'),
(2, 'Shop', 'null', 'shop', '2024-12-24 06:40:59', '2024-12-24 11:43:35'),
(3, 'Meats & Seafood', 'fa-solid fa-drumstick-bite', NULL, '2024-12-24 06:56:14', '2024-12-24 06:56:14'),
(4, 'Bakery', 'fa-solid fa-bread-slice', NULL, '2024-12-24 06:57:34', '2024-12-24 06:57:34'),
(5, 'Beverages', 'fa-solid fa-mug-hot', NULL, '2024-12-24 06:59:28', '2024-12-24 06:59:28'),
(6, 'Blog', NULL, NULL, '2024-12-24 06:59:39', '2024-12-24 06:59:39'),
(7, 'contact', NULL, NULL, '2024-12-24 06:59:48', '2024-12-24 06:59:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_11_23_080833_create_brands_table', 1),
(5, '2024_11_23_162413_create_categories_table', 1),
(6, '2024_11_24_123730_create_products_table', 1),
(7, '2024_11_25_135815_create_images_table', 1),
(8, '2024_11_29_060402_create_orders_table', 1),
(9, '2024_11_29_060634_create_transections_table', 1),
(10, '2024_11_29_060640_create_addresses_table', 1),
(11, '2024_11_29_063953_create_order_items_table', 1),
(12, '2024_12_02_135840_create_slides_table', 2),
(13, '2024_12_03_045204_create_left_sidebar_banners_table', 3),
(14, '2024_12_03_045617_create_left_sidebar_banners_table', 4),
(15, '2024_12_03_051439_create_sidebar_banners_table', 5),
(16, '2024_12_03_055327_create_weekend_banners_table', 6),
(17, '2024_12_03_121343_create_sub_categories_table', 7),
(18, '2024_12_08_161632_create_reviews_table', 8),
(19, '2024_12_23_175439_create_menus_table', 9),
(20, '2024_12_23_175454_create_sub_menus_table', 9),
(21, '2024_12_30_061448_create_shop_orders_table', 10),
(22, '2024_12_30_062531_create_shop_order_items_table', 11),
(23, '2024_12_30_063239_create_shop_transections_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `tax` decimal(8,2) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `landmark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'home',
  `status` enum('ordered','delivered','canceled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ordered',
  `is_shipping_different` tinyint(1) NOT NULL DEFAULT '0',
  `delivered_date` date DEFAULT NULL,
  `canceled_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `subtotal`, `discount`, `tax`, `total`, `name`, `phone`, `locality`, `address`, `city`, `state`, `country`, `landmark`, `zip`, `type`, `status`, `is_shipping_different`, `delivered_date`, `canceled_date`, `created_at`, `updated_at`) VALUES
(30, 5, 3.88, 0.00, 0.81, 4.69, 'ARIF HAWLADER', '01915414085', 'Bokultola', 'East Boxnogor, Sarulia', 'Sarulia', 'DHAKA', 'Bangladesh', 'Demra', '1361', 'home', 'ordered', 0, NULL, NULL, '2024-12-22 09:29:30', '2024-12-22 09:29:30'),
(31, 5, 4.00, 0.00, 0.84, 4.84, 'ARIF HAWLADER', '01915414085', 'Bokultola', 'East Boxnogor, Sarulia', 'Sarulia', 'DHAKA', 'Bangladesh', 'Demra', '1361', 'home', 'ordered', 0, NULL, NULL, '2024-12-22 09:58:42', '2024-12-22 09:58:42'),
(32, 4, 25.00, 0.00, 5.25, 30.25, 'Morsalin Khan Jusad', '01915414085', 'Sarulia', 'PATWARI BARI', 'JATRABARI', 'DHAKA', 'Bangladesh', 'Demra', '1232', 'home', 'ordered', 0, NULL, NULL, '2024-12-25 10:41:52', '2024-12-25 10:41:52'),
(33, 4, 74.00, 0.00, 15.54, 89.54, 'Morsalin Khan Jusad', '01915414085', 'Sarulia', 'PATWARI BARI', 'JATRABARI', 'DHAKA', 'Bangladesh', 'Demra', '1232', 'home', 'ordered', 0, NULL, NULL, '2024-12-25 10:43:30', '2024-12-25 10:43:30'),
(34, 4, 68.88, 0.00, 14.46, 83.34, 'Morsalin Khan Jusad', '01915414085', 'Sarulia', 'PATWARI BARI', 'JATRABARI', 'DHAKA', 'Bangladesh', 'Demra', '1232', 'home', 'ordered', 0, NULL, NULL, '2024-12-25 10:43:58', '2024-12-25 10:43:58'),
(35, 4, 92.88, 0.00, 19.50, 112.38, 'Morsalin Khan Jusad', '01915414085', 'Sarulia', 'PATWARI BARI', 'JATRABARI', 'DHAKA', 'Bangladesh', 'Demra', '1232', 'home', 'ordered', 0, NULL, NULL, '2024-12-25 10:44:38', '2024-12-25 10:44:38'),
(36, 4, 110.00, 0.00, 23.10, 133.10, 'Morsalin Khan Jusad', '01915414085', 'Sarulia', 'PATWARI BARI', 'JATRABARI', 'DHAKA', 'Bangladesh', 'Demra', '1232', 'home', 'ordered', 0, NULL, NULL, '2024-12-25 10:45:16', '2024-12-25 10:45:16'),
(37, 4, 25.00, 0.00, 5.25, 30.25, 'Morsalin Khan Jusad', '01915414085', 'Sarulia', 'PATWARI BARI', 'JATRABARI', 'DHAKA', 'Bangladesh', 'Demra', '1232', 'home', 'ordered', 0, NULL, NULL, '2024-12-25 10:45:48', '2024-12-25 10:45:48'),
(38, 4, 25.00, 0.00, 5.25, 30.25, 'Morsalin Khan Jusad', '01915414085', 'Sarulia', 'PATWARI BARI', 'JATRABARI', 'DHAKA', 'Bangladesh', 'Demra', '1232', 'home', 'ordered', 0, NULL, NULL, '2024-12-25 10:49:30', '2024-12-25 10:49:30'),
(39, 5, 45.00, 0.00, 9.45, 54.45, 'ARIF HAWLADER', '01915414085', 'Bokultola', 'East Boxnogor, Sarulia', 'Sarulia', 'DHAKA', 'Bangladesh', 'Demra', '1361', 'home', 'ordered', 0, NULL, NULL, '2024-12-25 10:51:52', '2024-12-25 10:51:52'),
(40, 5, 45.00, 0.00, 9.45, 54.45, 'ARIF HAWLADER', '01915414085', 'Bokultola', 'East Boxnogor, Sarulia', 'Sarulia', 'DHAKA', 'Bangladesh', 'Demra', '1361', 'home', 'ordered', 0, NULL, NULL, '2024-12-25 10:52:14', '2024-12-25 10:52:14'),
(41, 4, 25.00, 0.00, 5.25, 30.25, 'Morsalin Khan Jusad', '01915414085', 'Sarulia', 'PATWARI BARI', 'JATRABARI', 'DHAKA', 'Bangladesh', 'Demra', '1232', 'home', 'ordered', 0, NULL, NULL, '2024-12-26 09:06:19', '2024-12-26 09:06:19');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int NOT NULL,
  `options` longtext COLLATE utf8mb4_unicode_ci,
  `rstatus` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `order_id`, `price`, `quantity`, `options`, `rstatus`, `created_at`, `updated_at`) VALUES
(36, 6, 30, 3.88, 1, NULL, 0, '2024-12-22 09:29:30', '2024-12-22 09:29:30'),
(37, 5, 31, 4.00, 1, NULL, 0, '2024-12-22 09:58:42', '2024-12-22 09:58:42'),
(38, 2, 32, 25.00, 1, NULL, 0, '2024-12-25 10:41:52', '2024-12-25 10:41:52'),
(39, 2, 33, 25.00, 1, NULL, 0, '2024-12-25 10:43:30', '2024-12-25 10:43:30'),
(40, 5, 33, 4.00, 1, NULL, 0, '2024-12-25 10:43:30', '2024-12-25 10:43:30'),
(41, 3, 33, 45.00, 1, NULL, 0, '2024-12-25 10:43:30', '2024-12-25 10:43:30'),
(42, 6, 34, 3.88, 1, NULL, 0, '2024-12-25 10:43:58', '2024-12-25 10:43:58'),
(43, 2, 34, 25.00, 1, NULL, 0, '2024-12-25 10:43:58', '2024-12-25 10:43:58'),
(44, 1, 34, 40.00, 1, NULL, 0, '2024-12-25 10:43:58', '2024-12-25 10:43:58'),
(45, 1, 35, 40.00, 1, NULL, 0, '2024-12-25 10:44:38', '2024-12-25 10:44:38'),
(46, 6, 35, 3.88, 1, NULL, 0, '2024-12-25 10:44:38', '2024-12-25 10:44:38'),
(47, 5, 35, 4.00, 1, NULL, 0, '2024-12-25 10:44:38', '2024-12-25 10:44:38'),
(48, 3, 35, 45.00, 1, NULL, 0, '2024-12-25 10:44:38', '2024-12-25 10:44:38'),
(49, 3, 36, 45.00, 1, NULL, 0, '2024-12-25 10:45:16', '2024-12-25 10:45:16'),
(50, 1, 36, 40.00, 1, NULL, 0, '2024-12-25 10:45:16', '2024-12-25 10:45:16'),
(51, 2, 36, 25.00, 1, NULL, 0, '2024-12-25 10:45:16', '2024-12-25 10:45:16'),
(52, 2, 37, 25.00, 1, NULL, 0, '2024-12-25 10:45:48', '2024-12-25 10:45:48'),
(53, 2, 38, 25.00, 1, NULL, 0, '2024-12-25 10:49:30', '2024-12-25 10:49:30'),
(54, 3, 39, 45.00, 1, NULL, 0, '2024-12-25 10:51:52', '2024-12-25 10:51:52'),
(55, 3, 40, 45.00, 1, NULL, 0, '2024-12-25 10:52:14', '2024-12-25 10:52:14'),
(56, 2, 41, 25.00, 1, NULL, 0, '2024-12-26 09:06:19', '2024-12-26 09:06:19');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` enum('recommended','organic') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_discount` int DEFAULT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regular_price` decimal(8,2) NOT NULL,
  `sale_price` decimal(8,2) DEFAULT NULL,
  `SKU` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int UNSIGNED NOT NULL DEFAULT '10',
  `stock` enum('instock','outofstock') COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `brand_id` bigint UNSIGNED DEFAULT NULL,
  `subcategory_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `tags`, `pro_discount`, `short_description`, `description`, `image`, `regular_price`, `sale_price`, `SKU`, `qty`, `stock`, `featured`, `category_id`, `brand_id`, `subcategory_id`, `created_at`, `updated_at`) VALUES
(1, 'Angie’s Boomchickapop Sweet & Salty Kettle Corn', 'angie-s-boomchickapop-sweet-and-salty-kettle-corn', 'recommended', 10, 'Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent', 'Quisque varius diam vel metus mattis, id aliquam diam rhoncus. Proin vitae magna in dui finibus malesuada et at nulla. Morbi elit ex, viverra vitae ante vel, blandit feugiat ligula. Fusce fermentum iaculis nibh, at sodales leo maximus a. Nullam ultricies sodales nunc, in pellentesque lorem mattis quis. Cras imperdiet est in nunc tristique lacinia. Nullam aliquam mauris eu accumsan tincidunt. Suspendisse velit ex, aliquet vel ornare vel, dignissim a tortor.\r\n\r\nMorbi ut sapien vitae odio accumsan gravida. Morbi vitae erat auctor, eleifend nunc a, lobortis neque. Praesent aliquam dignissim viverra. Maecenas lacus odio, feugiat eu nunc sit amet, maximus sagittis dolor. Vivamus nisi sapien, elementum sit amet eros sit amet, ultricies cursus ipsum. Sed consequat luctus ligula. Curabitur laoreet rhoncus blandit. Aenean vel diam ut arcu pharetra dignissim ut sed leo. Vivamus faucibus, ipsum in vestibulum', '1732938148_product-image-60-346x310.jpg', 50.00, 40.00, 'BE4CURT', 24, 'instock', 0, 1, 1, NULL, '2024-11-29 21:42:28', '2024-11-29 21:42:28'),
(2, 'Werther’s Original Caramel Hard Candies', 'werther-s-original-caramel-hard-candies', 'recommended', 10, 'Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent', 'Quisque varius diam vel metus mattis, id aliquam diam rhoncus. Proin vitae magna in dui finibus malesuada et at nulla. Morbi elit ex, viverra vitae ante vel, blandit feugiat ligula. Fusce fermentum iaculis nibh, at sodales leo maximus a. Nullam ultricies sodales nunc, in pellentesque lorem mattis quis. Cras imperdiet est in nunc tristique lacinia. Nullam aliquam mauris eu accumsan tincidunt. Suspendisse velit ex, aliquet vel ornare vel, dignissim a tortor.', '1732938244_product-image-3-346x310.jpg', 30.00, 25.00, 'DDFS43', 20, 'instock', 0, 1, 1, NULL, '2024-11-29 21:44:04', '2024-11-29 21:44:04'),
(3, 'Shimmer Pastel Almond Blend', 'shimmer-pastel-almond-blend', 'recommended', 10, 'Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent', 'Quisque varius diam vel metus mattis, id aliquam diam rhoncus. Proin vitae magna in dui finibus malesuada et at nulla. Morbi elit ex, viverra vitae ante vel, blandit feugiat ligula. Fusce fermentum iaculis nibh, at sodales leo maximus a. Nullam ultricies sodales nunc, in pellentesque lorem mattis quis. Cras imperdiet est in nunc tristique lacinia. Nullam aliquam mauris eu accumsan tincidunt. Suspendisse velit ex, aliquet vel ornare vel, dignissim a tortor.', '1732938352_biscuitssnacks-1.jpg', 50.00, 45.00, 'DGD4334', 50, 'instock', 0, 1, 1, NULL, '2024-11-29 21:45:52', '2024-11-29 21:45:52'),
(5, 'Canada Dry Ginger Ale – 2 L Bottle', 'canada-dry-ginger-ale-2-l-bottle', 'organic', 10, 'Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent', 'Quisque varius diam vel metus mattis, id aliquam diam rhoncus. Proin vitae magna in dui finibus malesuada et at nulla. Morbi elit ex, viverra vitae ante vel, blandit feugiat ligula. Fusce fermentum iaculis nibh, at sodales leo maximus a. Nullam ultricies sodales nunc, in pellentesque lorem mattis quis. Cras imperdiet est in nunc tristique lacinia. Nullam aliquam mauris eu accumsan tincidunt. Suspendisse velit ex, aliquet vel ornare vel, dignissim a tortor.', '1733248000_product-image-54-600x540.jpg', 6.00, 4.00, 'DSDF45', 30, 'outofstock', 0, 2, 2, NULL, '2024-12-03 11:46:40', '2024-12-03 11:46:40'),
(6, 'Simply Lemonade with Raspberry Juice', 'simply-lemonade-with-raspberry-juice', 'organic', 10, 'Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent', 'Quisque varius diam vel metus mattis, id aliquam diam rhoncus. Proin vitae magna in dui finibus malesuada et at nulla. Morbi elit ex, viverra vitae ante vel, blandit feugiat ligula. Fusce fermentum iaculis nibh, at sodales leo maximus a. Nullam ultricies sodales nunc, in pellentesque lorem mattis quis. Cras imperdiet est in nunc tristique lacinia. Nullam aliquam mauris eu accumsan tincidunt. Suspendisse velit ex, aliquet vel ornare vel, dignissim a tortor.', '1733300633_product-image-15-600x540.jpg', 4.88, 3.88, 'DGD4334', 30, 'outofstock', 0, 2, 2, 3, '2024-12-04 02:23:53', '2024-12-04 02:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci,
  `rating` tinyint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `review`, `rating`, `created_at`, `updated_at`) VALUES
(9, 5, 5, 'Best Product', 5, '2024-12-22 09:58:25', '2024-12-22 09:58:25');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop_orders`
--

CREATE TABLE `shop_orders` (
  `id` bigint UNSIGNED NOT NULL,
  `invoice` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `subtotal` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `total` decimal(8,2) NOT NULL,
  `paid` decimal(8,2) NOT NULL,
  `due` decimal(8,2) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'home',
  `status` enum('sale','return') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'sale',
  `return_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_orders`
--

INSERT INTO `shop_orders` (`id`, `invoice`, `subtotal`, `discount`, `total`, `paid`, `due`, `name`, `phone`, `email`, `address`, `type`, `status`, `return_date`, `created_at`, `updated_at`) VALUES
(1, 'INV-20241231-0001', 70.00, 30.00, 40.00, 5.00, 35.00, 'Yeasin Hossain', '01600153173', 'admin@example.com', 'Bokultola, Sarulia, DHAKA, 1361, Bangladesh,', 'home', 'sale', NULL, '2024-12-30 23:41:50', '2024-12-30 23:41:50'),
(2, 'INV-20241231-0001', 70.00, 30.00, 40.00, 5.00, 35.00, 'Yeasin Hossain', '01600153173', 'admin@example.com', 'Bokultola, Sarulia, DHAKA, 1361, Bangladesh,', 'home', 'sale', NULL, '2024-12-30 23:41:50', '2024-12-30 23:41:50'),
(3, 'INV-20241231-0001', 85.00, 7.00, 78.00, 60.00, 18.00, 'Morsalin', '01647689789', 'admin@example.com', 'East Boxnogor, Bokultola, Sarulia, DHAKA, 1361, Bangladesh,', 'home', 'sale', NULL, '2024-12-30 23:48:30', '2024-12-30 23:48:30');

-- --------------------------------------------------------

--
-- Table structure for table `shop_order_items`
--

CREATE TABLE `shop_order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int NOT NULL,
  `options` longtext COLLATE utf8mb4_unicode_ci,
  `rstatus` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_order_items`
--

INSERT INTO `shop_order_items` (`id`, `product_id`, `order_id`, `price`, `quantity`, `options`, `rstatus`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 45.00, 1, NULL, 0, '2024-12-30 23:41:50', '2024-12-30 23:41:50'),
(2, 2, 1, 25.00, 1, NULL, 0, '2024-12-30 23:41:50', '2024-12-30 23:41:50'),
(3, 3, 2, 45.00, 1, NULL, 0, '2024-12-30 23:41:50', '2024-12-30 23:41:50'),
(4, 2, 2, 25.00, 1, NULL, 0, '2024-12-30 23:41:50', '2024-12-30 23:41:50'),
(5, 3, 3, 45.00, 1, NULL, 0, '2024-12-30 23:48:30', '2024-12-30 23:48:30'),
(6, 1, 3, 40.00, 1, NULL, 0, '2024-12-30 23:48:30', '2024-12-30 23:48:30');

-- --------------------------------------------------------

--
-- Table structure for table `shop_transections`
--

CREATE TABLE `shop_transections` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `mode` enum('cod','card','paypal') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('approved','refunded') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'approved',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_transections`
--

INSERT INTO `shop_transections` (`id`, `order_id`, `mode`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, NULL, 'approved', '2024-12-30 23:48:30', '2024-12-30 23:48:30');

-- --------------------------------------------------------

--
-- Table structure for table `sidebar_banners`
--

CREATE TABLE `sidebar_banners` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sidebar_banners`
--

INSERT INTO `sidebar_banners` (`id`, `image`, `title`, `subtitle`, `tag`, `price`, `created_at`, `updated_at`) VALUES
(1, '1733205024.jpg', 'Roats Burger', 'Bacola Natural Foods', 'Special Organic', 15.99, '2024-12-02 23:39:15', '2024-12-02 23:50:24'),
(2, '1733205168.jpg', 'every hour', 'Best Bakery Products', 'Freshest Products', 24.99, '2024-12-02 23:52:48', '2024-12-02 23:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_offer` int NOT NULL,
  `subtitle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `image`, `title`, `discount_offer`, `subtitle`, `description`, `price`, `created_at`, `updated_at`) VALUES
(2, '1733161196.jpg', 'Feed your family the best', 20, 'Exclusive offer', 'Only this week. Don’t miss...', 7.99, '2024-12-02 11:21:08', '2024-12-02 11:39:56'),
(3, '1733380112.jpg', 'Feed your family the best', 30, 'Exclusive Offer', 'Only this week. Don’t miss...', 8.99, '2024-12-05 00:28:32', '2024-12-05 00:28:32'),
(4, '1733380237.jpg', 'Grocery full of inspiration', 40, 'Exclusive Offer', 'Only this week. Don’t miss...', 6.99, '2024-12-05 00:30:37', '2024-12-05 00:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `slug`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Coffe', 'coffe', 2, '2024-12-03 06:57:16', '2024-12-03 07:45:24'),
(2, 'Craft Beer', 'craft-beer', 2, '2024-12-03 07:07:59', '2024-12-03 07:07:59'),
(3, 'Drink Boxes & Pouches', 'drink-boxes-and-pouches', 2, '2024-12-03 08:13:28', '2024-12-03 08:13:28'),
(4, 'Soda & Pop', 'soda-and-pop', 2, '2024-12-03 08:13:53', '2024-12-03 08:13:53'),
(5, 'Buns and Rolls', 'buns-and-rolls', 3, '2024-12-03 08:16:35', '2024-12-03 08:16:35');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menus`
--

CREATE TABLE `sub_menus` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` bigint UNSIGNED DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_menus`
--

INSERT INTO `sub_menus` (`id`, `name`, `menu_id`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Home 1', 1, 'home_1', '2024-12-24 05:12:58', '2024-12-25 11:24:52'),
(2, 'Home 2', 1, 'N/A', '2024-12-24 06:40:19', '2024-12-25 11:38:18'),
(3, 'shop default', 2, NULL, '2024-12-24 11:10:14', '2024-12-24 11:10:14');

-- --------------------------------------------------------

--
-- Table structure for table `transections`
--

CREATE TABLE `transections` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `mode` enum('cod','card','paypal') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','declined','refunded') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transections`
--

INSERT INTO `transections` (`id`, `user_id`, `order_id`, `mode`, `status`, `created_at`, `updated_at`) VALUES
(26, 5, 30, 'cod', 'pending', '2024-12-22 09:29:30', '2024-12-22 09:29:30'),
(27, 5, 31, 'cod', 'pending', '2024-12-22 09:58:42', '2024-12-22 09:58:42'),
(28, 4, 32, 'cod', 'pending', '2024-12-25 10:41:52', '2024-12-25 10:41:52'),
(29, 4, 33, 'cod', 'pending', '2024-12-25 10:43:30', '2024-12-25 10:43:30'),
(30, 4, 34, 'cod', 'pending', '2024-12-25 10:43:58', '2024-12-25 10:43:58'),
(31, 4, 35, 'cod', 'pending', '2024-12-25 10:44:38', '2024-12-25 10:44:38'),
(32, 4, 36, 'cod', 'pending', '2024-12-25 10:45:16', '2024-12-25 10:45:16'),
(33, 4, 37, 'cod', 'pending', '2024-12-25 10:45:48', '2024-12-25 10:45:48'),
(34, 4, 38, 'cod', 'pending', '2024-12-25 10:49:30', '2024-12-25 10:49:30'),
(35, 5, 39, 'cod', 'pending', '2024-12-25 10:51:52', '2024-12-25 10:51:52'),
(36, 5, 40, 'cod', 'pending', '2024-12-25 10:52:14', '2024-12-25 10:52:14'),
(37, 4, 41, 'cod', 'pending', '2024-12-26 09:06:19', '2024-12-26 09:06:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'MD Jusd', 'bappimolla201718@gmail.com', NULL, '$2y$12$ZMDiEWeqaBCazXMP5GnEl.0ryfu6xRgm2F4j5FTme0lslzBU46krS', 'user', NULL, '2024-12-08 06:39:37', '2024-12-08 06:39:37'),
(5, 'ARIF HAWLADER', 'mdarifhowlader091@gmail.com', NULL, '$2y$12$F8hLMaEFtmlPQ1yrLv.dX.KQYGIwh8SWecB5ZXGI/HweIw5RVujgy', 'admin', NULL, '2024-12-22 09:24:53', '2024-12-22 09:24:53');

-- --------------------------------------------------------

--
-- Table structure for table `weekend_banners`
--

CREATE TABLE `weekend_banners` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_offer` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weekend_banners`
--

INSERT INTO `weekend_banners` (`id`, `image`, `title`, `subtitle`, `discount_offer`, `created_at`, `updated_at`) VALUES
(1, '1733207591.jpg', 'Legumes & Cereals', 'Feed your family the best', 41, '2024-12-03 00:15:54', '2024-12-03 00:33:11'),
(2, '1733207716.jpg', 'Dairy & Eggs', 'A different kind of grocery store', 40, '2024-12-03 00:35:16', '2024-12-03 00:35:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `fk_subcategory_id` (`subcategory_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shop_orders`
--
ALTER TABLE `shop_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_order_items`
--
ALTER TABLE `shop_order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop_order_items_product_id_foreign` (`product_id`),
  ADD KEY `shop_order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `shop_transections`
--
ALTER TABLE `shop_transections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop_transections_order_id_foreign` (`order_id`);

--
-- Indexes for table `sidebar_banners`
--
ALTER TABLE `sidebar_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_categories_slug_unique` (`slug`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `sub_menus`
--
ALTER TABLE `sub_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_menus_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `transections`
--
ALTER TABLE `transections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transections_user_id_foreign` (`user_id`),
  ADD KEY `transections_order_id_foreign` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `weekend_banners`
--
ALTER TABLE `weekend_banners`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `shop_orders`
--
ALTER TABLE `shop_orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shop_order_items`
--
ALTER TABLE `shop_order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shop_transections`
--
ALTER TABLE `shop_transections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sidebar_banners`
--
ALTER TABLE `sidebar_banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_menus`
--
ALTER TABLE `sub_menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transections`
--
ALTER TABLE `transections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `weekend_banners`
--
ALTER TABLE `weekend_banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_subcategory_id` FOREIGN KEY (`subcategory_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shop_order_items`
--
ALTER TABLE `shop_order_items`
  ADD CONSTRAINT `shop_order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `shop_orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shop_order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shop_transections`
--
ALTER TABLE `shop_transections`
  ADD CONSTRAINT `shop_transections_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `shop_orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_menus`
--
ALTER TABLE `sub_menus`
  ADD CONSTRAINT `sub_menus_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transections`
--
ALTER TABLE `transections`
  ADD CONSTRAINT `transections_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transections_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
