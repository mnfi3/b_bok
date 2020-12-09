-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 09, 2020 at 02:10 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bonab`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_orders`
--

DROP TABLE IF EXISTS `bank_orders`;
CREATE TABLE IF NOT EXISTS `bank_orders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cart_id` int(10) UNSIGNED NOT NULL,
  `address` text,
  `phone` varchar(255) NOT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `discount_id` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_in_person` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bank_orders_cart_id_foreign` (`cart_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `translator` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `publication_date` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `discount_percent` int(11) DEFAULT '0',
  `stock` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_important` tinyint(1) DEFAULT NULL,
  `page_count` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `demo_file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carts_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cart_contents`
--

DROP TABLE IF EXISTS `cart_contents`;
CREATE TABLE IF NOT EXISTS `cart_contents` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cart_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_contents_cart_id_foreign` (`cart_id`),
  KEY `cart_contents_book_id_foreign` (`book_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'علوم تربیتی و روانشناسی', '2020-12-08 20:30:00', '2020-12-08 20:30:00', NULL),
(2, 'علوم پایه', '2020-12-08 20:30:00', '2020-12-08 20:30:00', NULL),
(3, 'کشاورزی', '2020-12-08 20:30:00', '2020-12-08 20:30:00', NULL),
(4, 'الهیات', '2020-12-08 20:30:00', '2020-12-08 20:30:00', NULL),
(5, 'فناوری اطلاعات', '2020-12-08 20:30:00', '2020-12-08 20:30:00', NULL),
(6, 'فنی و مهندسی', '2020-12-08 20:30:00', '2020-12-08 20:30:00', NULL),
(7, 'ادبیات و علوم انسانی', '2020-12-08 20:30:00', '2020-12-08 20:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

DROP TABLE IF EXISTS `discounts`;
CREATE TABLE IF NOT EXISTS `discounts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `percent` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_12_12_100131_create_books_table', 1),
(4, '2018_12_12_101832_create_sliders_table', 1),
(5, '2018_12_12_102300_create_payments_table', 1),
(6, '2018_12_12_102315_create_carts_table', 1),
(7, '2018_12_12_110429_create_cart_contents_table', 1),
(8, '2018_12_12_110557_create_orders_table', 1),
(9, '2018_12_12_111055_create_order_contents_table', 1),
(10, '2019_01_08_100808_add_role_to_users_table', 1),
(11, '2019_01_08_105232_add_some_fields_to_orders_table', 1),
(12, '2019_01_08_203911_add_post_trace_number_to_orders_table', 1),
(13, '2019_01_08_205407_add_price_to_order_contents_table', 1),
(14, '2019_01_09_171736_create_bank_orders_table', 1),
(15, '2019_01_15_210534_add_is_important_to_books_table', 1),
(16, '2019_01_21_134742_add_page_count_to_books_table', 1),
(17, '2019_02_03_113546_create_categories_table', 1),
(18, '2019_02_03_114215_add_category_id_to_books_table', 1),
(19, '2019_02_04_122459_add_is_in_person_and_buy_code_to_orders_table', 1),
(20, '2019_02_04_122721_add_is_in_person_to_bank_orders_table', 1),
(21, '2019_04_30_133211_add_demo_file_to_books_table', 1),
(22, '2019_11_21_105446_add_discount_percent_to_books', 1),
(23, '2019_11_24_130125_create_discounts_table', 1),
(24, '2019_11_24_131654_add_discount_id_to_bank_orders_table', 1),
(25, '2019_11_24_131851_add_discount_id_to_orders_table', 1),
(26, '2019_11_24_135938_add_letter_number_and_sended_at_to_orders_table', 1),
(27, '2019_12_07_133140_add_translator_to_books_table', 1),
(29, '2020_12_09_153306_create_settings_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(10) UNSIGNED NOT NULL,
  `discount_id` int(11) DEFAULT '0',
  `address` text,
  `is_sent` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `trace_no` varchar(255) DEFAULT NULL,
  `letter_number` varchar(255) DEFAULT NULL,
  `sended_at` timestamp NULL DEFAULT NULL,
  `is_in_person` tinyint(1) DEFAULT NULL,
  `buy_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_payment_id_foreign` (`payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_contents`
--

DROP TABLE IF EXISTS `order_contents`;
CREATE TABLE IF NOT EXISTS `order_contents` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_contents_order_id_foreign` (`order_id`),
  KEY `order_contents_book_id_foreign` (`book_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `is_success` tinyint(1) NOT NULL,
  `retrival_ref_no` varchar(255) NOT NULL,
  `system_trace_no` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(255) DEFAULT NULL,
  `value` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'address', 'آذربایجان شرقی - بناب - بزرگراه ولایت - دانشگاه بناب - انتشارات', '2020-12-09 13:33:13', '2020-12-09 13:33:13', NULL),
(2, 'link1-title', 'دانشگاه بناب', '2020-12-09 13:33:13', '2020-12-09 13:33:13', NULL),
(3, 'link1-url', 'https://www.ubonab.ac.ir/', '2020-12-09 13:33:13', '2020-12-09 13:33:13', NULL),
(4, 'link2-title', 'دانشگاه بناب', '2020-12-09 13:33:13', '2020-12-09 13:33:13', NULL),
(5, 'link2-url', 'https://www.ubonab.ac.ir/', '2020-12-09 13:33:13', '2020-12-09 13:33:13', NULL),
(6, 'link3-title', 'دانشگاه بناب', '2020-12-09 13:33:13', '2020-12-09 13:33:13', NULL),
(7, 'link3-url', 'https://www.ubonab.ac.ir/', '2020-12-09 13:33:13', '2020-12-09 13:33:13', NULL),
(8, 'exper-name', 'رضا نصرتی', '2020-12-09 13:33:13', '2020-12-09 13:33:13', NULL),
(9, 'exper-email', 'nosrati_r@yahoo.com', '2020-12-09 13:33:13', '2020-12-09 13:33:13', NULL),
(10, 'exper-direct-phone', '34327567-041', '2020-12-09 13:33:13', '2020-12-09 13:33:13', NULL),
(11, 'exper-internal-phone', '2457', '2020-12-09 13:33:13', '2020-12-09 13:33:13', NULL),
(12, 'boss-name', 'دکتر جواد مصرآبادی', '2020-12-09 13:33:13', '2020-12-09 13:33:13', NULL),
(13, 'boss-email', 'mesrabadi@azaruniv.ac.ir', '2020-12-09 13:33:13', '2020-12-09 13:33:13', NULL),
(14, 'boss-direct-phone', '34327567-041', '2020-12-09 13:33:13', '2020-12-09 13:33:13', NULL),
(15, 'boss-internal-phone', '2456', '2020-12-09 13:33:13', '2020-12-09 13:33:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '/uploads/images/lib.jpg', '2020-12-08 20:30:00', '2020-12-08 20:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `role`) VALUES
(1, 'مدیر', 'admin@press.ubonab.ac.ir', '01234567899', '$2y$10$cQ1Ec.iEFyi42oQ/ZUy0Me2ElaZAhmKcChR9eRMdMT4EOA/QZY47.', 'ppHeWCg4aIKpoWPOkzGDm3Cz024DWICZT5cf8Dy8hWkT2qskDYHOYDi3DBTa', '2020-12-08 20:30:00', '2020-12-08 20:30:00', NULL, 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
