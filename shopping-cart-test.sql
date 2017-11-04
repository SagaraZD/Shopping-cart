-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2016 at 05:32 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shopping-cart-test`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_12_11_080915_create_types_table', 1),
('2016_12_11_093800_create_products_table', 1),
('2016_12_11_153012_create_users_table', 2),
('2016_12_12_173927_create_roles_table', 3),
('2016_12_12_174536_create_user_role_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `name` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `type_id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(6, 16, 'Chair', 20, '2016-12-18 01:41:20', '2016-12-18 10:27:34'),
(8, 16, 'Table', 200.5, '2016-12-18 10:28:04', '2016-12-18 10:39:10'),
(9, 16, 'Fan', 150, '2016-12-18 10:28:24', '2016-12-18 10:28:24'),
(10, 6, 'Television', 55, '2016-12-18 10:28:55', '2016-12-18 10:28:55'),
(11, 3, 'Car', 1250, '2016-12-18 10:29:23', '2016-12-18 10:29:23'),
(12, 3, 'Van', 1550, '2016-12-18 10:29:55', '2016-12-18 10:29:55'),
(13, 17, 'Phone', 45, '2016-12-18 10:30:08', '2016-12-18 10:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(13, 'Member', 'A Member', '2016-12-12 12:48:30', '2016-12-12 12:48:30'),
(14, 'Admin', 'The Admin', '2016-12-12 12:48:30', '2016-12-12 12:48:30');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Vehicle', '2016-12-11 06:53:00', '2016-12-11 06:53:00'),
(6, 'Electronic', '2016-12-11 11:45:36', '2016-12-11 11:45:36'),
(16, 'Furniture', '2016-12-18 01:11:08', '2016-12-18 01:11:08'),
(17, 'Phone', '2016-12-18 01:11:22', '2016-12-18 01:11:22'),
(19, 'Clothing', '2016-12-18 01:12:50', '2016-12-18 10:30:24'),
(20, 'Property', '2016-12-18 01:13:22', '2016-12-18 01:13:22'),
(21, 'Education', '2016-12-18 01:13:50', '2016-12-18 01:13:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `FirstName`, `LastName`, `email`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
(12, 'Victor', 'Member', 'member@test.com', '$2y$10$UCqxjeuEtv8rGu8EmKGhouG47k.NV58dWI4I424Nk0vd0mDb15hfi', '2016-12-12 12:48:30', '2016-12-18 10:57:33', 'wYIvdQkCLHx6Ldqc7XSRGtO2ngllkHRf85yrwduuKEfLfsLlxMKFfh68q1wp'),
(13, 'Alex ', 'Admin ', 'admin@test.com', '$2y$10$tzkJk45xAs/d2RPH1Ty.guk3vujX3iQNVfgCHt2eRr.Gv.8RxvbGy', '2016-12-12 12:48:31', '2016-12-18 10:32:34', 'ibS3cSYRxSzX0Mdhc8cLN5UspVEjJI0qVJteuL06vFRzCPASyvjcXtQ9LGZQ');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `created_at`, `updated_at`, `user_id`, `role_id`) VALUES
(4, NULL, NULL, 12, 13),
(5, NULL, NULL, 13, 14),
(6, NULL, NULL, 14, 13),
(7, NULL, NULL, 15, 13),
(8, NULL, NULL, 16, 13),
(9, NULL, NULL, 17, 13),
(10, NULL, NULL, 18, 13),
(11, NULL, NULL, 19, 13),
(12, NULL, NULL, 20, 13),
(13, NULL, NULL, 21, 13),
(14, NULL, NULL, 22, 13),
(15, NULL, NULL, 23, 13);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
