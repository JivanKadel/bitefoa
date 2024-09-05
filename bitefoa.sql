-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 05, 2024 at 03:17 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bitefoa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int UNSIGNED NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`, `email`, `name`) VALUES
(11, '$2y$10$QK.aKHH7YjRAYAHtKeCwSeUBzsv3oYGe2DywIEugsetydfZhi29oi', 'jivankadel@gmail.com', 'Jivan Kadel'),
(12, '$2y$10$F3U0SIvEZxhapHtL74soZeSstL52BT9vvx97bH0WH4EaWgUpWgEBq', 'admin@gmail.com', 'Anon'),
(13, '$2y$10$u2XVE5FWYVp.RoYJCpwOmOvHhYyLC5n5x59t9/8FPKA555SErZYR6', 'jivan@gmail.com', 'jivan');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(101, 'appetizers'),
(102, 'soups and salads'),
(103, 'main course'),
(104, 'desserts'),
(105, 'beverages');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int UNSIGNED NOT NULL,
  `name` tinytext NOT NULL,
  `category_id` int NOT NULL DEFAULT '0',
  `price` int UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `category_id`, `price`) VALUES
(1, 'Chicken momos', 101, 300),
(2, 'Samosa', 101, 75),
(3, 'aloo chop', 101, 75),
(4, 'Gorkhali Lamb Curry', 103, 2050),
(5, 'Paneer Makhani', 103, 1250),
(6, 'Dal Bhat', 103, 1400),
(7, 'Dhido Gundruk', 103, 1750),
(8, 'Thukpa', 102, 700),
(9, 'Dal Soup', 102, 450),
(10, 'Kachumber Salad', 102, 400),
(11, 'Kheer', 104, 750),
(12, 'Gulab Jamun', 104, 150),
(13, 'Rasmalai', 104, 150),
(14, 'Masala Chai', 105, 100),
(15, 'Lassi', 105, 150);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int UNSIGNED NOT NULL,
  `user_name` text NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `orders` json NOT NULL,
  `completed` tinyint(1) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `order_date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_name`, `user_phone`, `orders`, `completed`, `address`, `order_date_time`) VALUES
(130, 'Ambika', '9812345678', '{\"cart\": [{\"name\": \"chicken momos\", \"price\": 300, \"quantity\": 1}, {\"name\": \"Gorkhali Lamb Curry\", \"price\": 2050, \"quantity\": 1}, {\"name\": \"Kheer\", \"price\": 750, \"quantity\": 1}, {\"name\": \"Masala Chai\", \"price\": 100, \"quantity\": 1}], \"total\": 8950}', NULL, 'Kathmandu', '2024-05-12 21:40:58'),
(131, 'Anuj Shrestha', '9812345678', '{\"cart\": [{\"name\": \"Dal Soup\", \"price\": 450, \"quantity\": 1}, {\"name\": \"Paneer Makhani\", \"price\": 1250, \"quantity\": 1}, {\"name\": \"Gulab Jamun\", \"price\": 150, \"quantity\": 1}, {\"name\": \"Lassi\", \"price\": 150, \"quantity\": 2}], \"total\": 8150}', NULL, 'Thimi', '2024-06-20 21:41:48'),
(132, 'Arun Khatri', '9832345678', '{\"cart\": [{\"name\": \"samosa\", \"price\": 75, \"quantity\": 1}, {\"name\": \"Kachumber Salad\", \"price\": 400, \"quantity\": 1}, {\"name\": \"Dal Bhat\", \"price\": 1400, \"quantity\": 1}, {\"name\": \"Gulab Jamun\", \"price\": 150, \"quantity\": 1}, {\"name\": \"Masala Chai\", \"price\": 100, \"quantity\": 1}], \"total\": 6575}', 1, 'Koteshwor', '2024-06-17 21:42:29'),
(133, 'Aryan Gwachha', '9842345678', '{\"cart\": [{\"name\": \"aloo chop\", \"price\": 80, \"quantity\": 1}, {\"name\": \"Thukpa\", \"price\": 700, \"quantity\": 1}, {\"name\": \"Paneer Makhani\", \"price\": 1250, \"quantity\": 1}, {\"name\": \"Gulab Jamun\", \"price\": 150, \"quantity\": 2}], \"total\": 7400}', 1, 'Bhaktapur', '2024-06-14 21:43:11'),
(135, 'Djwal Duwal', '9852345678', '{\"cart\": [{\"name\": \"chicken momos\", \"price\": 300, \"quantity\": 1}, {\"name\": \"samosa\", \"price\": 75, \"quantity\": 1}, {\"name\": \"Dal Soup\", \"price\": 450, \"quantity\": 1}, {\"name\": \"Kachumber Salad\", \"price\": 400, \"quantity\": 1}, {\"name\": \"aloo chop\", \"price\": 80, \"quantity\": 1}, {\"name\": \"Gorkhali Lamb Curry\", \"price\": 2050, \"quantity\": 1}, {\"name\": \"Paneer Makhani\", \"price\": 1250, \"quantity\": 1}, {\"name\": \"Kheer\", \"price\": 750, \"quantity\": 2}, {\"name\": \"Gulab Jamun\", \"price\": 150, \"quantity\": 2}], \"total\": 36110}', NULL, 'Bhaktapur', '2024-06-13 12:59:10'),
(136, 'Dilli Raj Awasthi', '9862345678', '{\"cart\": [{\"name\": \"aloo chop\", \"price\": 80, \"quantity\": 1}, {\"name\": \"chicken momos\", \"price\": 300, \"quantity\": 1}, {\"name\": \"Dal Soup\", \"price\": 450, \"quantity\": 2}, {\"name\": \"Paneer Makhani\", \"price\": 1250, \"quantity\": 1}, {\"name\": \"Gulab Jamun\", \"price\": 150, \"quantity\": 1}], \"total\": 7780}', 1, 'Lokanthali', '2024-06-15 12:59:58'),
(137, 'Dilli Raj Awasthi', '9872345678', '{\"cart\": [{\"name\": \"Dhido Gundruk\", \"price\": 1750, \"quantity\": 1}, {\"name\": \"Paneer Makhani\", \"price\": 1250, \"quantity\": 1}, {\"name\": \"Gulab Jamun\", \"price\": 150, \"quantity\": 1}, {\"name\": \"Masala Chai\", \"price\": 100, \"quantity\": 1}, {\"name\": \"Lassi\", \"price\": 150, \"quantity\": 1}], \"total\": 14550}', NULL, 'Suryabinayak', '2024-06-15 13:01:07'),
(138, 'Durga Thapa', '9882345678', '{\"cart\": [{\"name\": \"Thukpa\", \"price\": 700, \"quantity\": 1}, {\"name\": \"Kachumber Salad\", \"price\": 400, \"quantity\": 1}, {\"name\": \"Dal Bhat\", \"price\": 1400, \"quantity\": 1}, {\"name\": \"Dhido Gundruk\", \"price\": 1750, \"quantity\": 1}, {\"name\": \"Gulab Jamun\", \"price\": 150, \"quantity\": 1}], \"total\": 12950}', 1, 'Lokanthali', '2024-06-15 13:03:18'),
(139, 'Ishan Adhikari', '9892345678', '{\"cart\": [{\"name\": \"Dal Bhat\", \"price\": 1400, \"quantity\": 1}, {\"name\": \"Gulab Jamun\", \"price\": 150, \"quantity\": 1}, {\"name\": \"Lassi\", \"price\": 150, \"quantity\": 1}, {\"name\": \"Dhido Gundruk\", \"price\": 1750, \"quantity\": 1}, {\"name\": \"Paneer Makhani\", \"price\": 1250, \"quantity\": 1}, {\"name\": \"Dal Soup\", \"price\": 450, \"quantity\": 1}, {\"name\": \"aloo chop\", \"price\": 80, \"quantity\": 1}, {\"name\": \"samosa\", \"price\": 75, \"quantity\": 1}], \"total\": 28485}', 1, 'Srijananagar', '2024-06-16 13:03:58'),
(140, 'Ishan Twayana', '9811045678', '{\"cart\": [{\"name\": \"samosa\", \"price\": 75, \"quantity\": 1}, {\"name\": \"Gorkhali Lamb Curry\", \"price\": 2050, \"quantity\": 1}, {\"name\": \"Kheer\", \"price\": 750, \"quantity\": 1}, {\"name\": \"Lassi\", \"price\": 150, \"quantity\": 1}, {\"name\": \"Gulab Jamun\", \"price\": 150, \"quantity\": 1}], \"total\": 11275}', 1, 'Bhaktapur', '2024-06-17 13:05:04'),
(141, 'Jivan Kadel', '9811145678', '{\"cart\": [{\"name\": \"Kheer\", \"price\": 750, \"quantity\": 1}, {\"name\": \"Masala Chai\", \"price\": 100, \"quantity\": 2}, {\"name\": \"Lassi\", \"price\": 150, \"quantity\": 1}], \"total\": 3650}', 1, 'Lokanthali', '2024-06-22 13:05:48'),
(142, 'Kishor', '9811245678', '{\"cart\": [{\"name\": \"Kachumber Salad\", \"price\": 400, \"quantity\": 1}, {\"name\": \"Paneer Makhani\", \"price\": 1250, \"quantity\": 1}, {\"name\": \"Gulab Jamun\", \"price\": 150, \"quantity\": 1}, {\"name\": \"Lassi\", \"price\": 150, \"quantity\": 1}, {\"name\": \"Masala Chai\", \"price\": 100, \"quantity\": 1}], \"total\": 7850}', NULL, 'Kausaltar', '2024-06-17 13:06:31'),
(143, 'Nabin Kandel', '9811345678', '{\"cart\": [{\"name\": \"chicken momos\", \"price\": 300, \"quantity\": 1}, {\"name\": \"samosa\", \"price\": 75, \"quantity\": 1}, {\"name\": \"Thukpa\", \"price\": 700, \"quantity\": 2}, {\"name\": \"Dal Soup\", \"price\": 450, \"quantity\": 1}], \"total\": 5750}', 1, 'Thimi', '2024-06-18 13:07:07'),
(144, 'Niraj Suwal', '9811445678', '{\"cart\": [{\"name\": \"Thukpa\", \"price\": 700, \"quantity\": 1}, {\"name\": \"Dal Soup\", \"price\": 450, \"quantity\": 1}, {\"name\": \"Gorkhali Lamb Curry\", \"price\": 2050, \"quantity\": 2}, {\"name\": \"Dhido Gundruk\", \"price\": 1750, \"quantity\": 1}], \"total\": 17300}', 1, 'Sanga', '2024-06-18 13:07:55'),
(145, 'Prabesh Shrestha Bata', '9811545678', '{\"cart\": [{\"name\": \"Dal Bhat\", \"price\": 1400, \"quantity\": 1}, {\"name\": \"Gorkhali Lamb Curry\", \"price\": 2050, \"quantity\": 1}, {\"name\": \"Thukpa\", \"price\": 700, \"quantity\": 1}, {\"name\": \"Kachumber Salad\", \"price\": 400, \"quantity\": 1}], \"total\": 13550}', NULL, 'Duwakot', '2024-06-17 13:08:41'),
(146, 'Pranil Shrestha', '9811645678', '{\"cart\": [{\"name\": \"aloo chop\", \"price\": 80, \"quantity\": 1}, {\"name\": \"Kachumber Salad\", \"price\": 400, \"quantity\": 1}, {\"name\": \"Dhido Gundruk\", \"price\": 1750, \"quantity\": 1}, {\"name\": \"Gulab Jamun\", \"price\": 150, \"quantity\": 1}, {\"name\": \"Lassi\", \"price\": 150, \"quantity\": 1}, {\"name\": \"Masala Chai\", \"price\": 100, \"quantity\": 2}], \"total\": 13060}', NULL, 'Thimi', '2024-06-20 06:09:19'),
(150, 'Pratik Satta', '9811745678', '{\"cart\": [{\"name\": \"samosa\", \"price\": 75, \"quantity\": 1}, {\"name\": \"Dal Soup\", \"price\": 450, \"quantity\": 1}, {\"name\": \"Gorkhali Lamb Curry\", \"price\": 2050, \"quantity\": 1}, {\"name\": \"Dhido Gundruk\", \"price\": 1750, \"quantity\": 1}, {\"name\": \"Gulab Jamun\", \"price\": 150, \"quantity\": 1}], \"total\": 11975}', NULL, 'Bhaktapur', '2024-06-19 20:45:26'),
(151, 'Pratik Sharma', '9811845678', '{\"cart\": [{\"name\": \"Kachumber Salad\", \"price\": 400, \"quantity\": 1}, {\"name\": \"aloo chop\", \"price\": 75, \"quantity\": 1}, {\"name\": \"samosa\", \"price\": 75, \"quantity\": 1}, {\"name\": \"chicken momos\", \"price\": 300, \"quantity\": 2}], \"total\": 3425}', NULL, 'Koteshwor', '2024-06-19 21:21:48'),
(152, 'Pratistha Karki', '9811945678', '{\"cart\": [{\"name\": \"Gorkhali Lamb Curry\", \"price\": 2050, \"quantity\": 1}, {\"name\": \"Dhido Gundruk\", \"price\": 1750, \"quantity\": 1}, {\"name\": \"Gulab Jamun\", \"price\": 150, \"quantity\": 1}, {\"name\": \"Rasmalai\", \"price\": 150, \"quantity\": 1}, {\"name\": \"Masala Chai\", \"price\": 100, \"quantity\": 1}, {\"name\": \"Lassi\", \"price\": 150, \"quantity\": 2}], \"total\": 26950}', 1, 'Kausaltar', '2024-06-19 21:23:12'),
(153, 'Prem Kathayat', '9812205678', '{\"cart\": [{\"name\": \"aloo chop\", \"price\": 75, \"quantity\": 1}, {\"name\": \"Kachumber Salad\", \"price\": 400, \"quantity\": 1}, {\"name\": \"Paneer Makhani\", \"price\": 1250, \"quantity\": 1}, {\"name\": \"Rasmalai\", \"price\": 150, \"quantity\": 1}, {\"name\": \"Kheer\", \"price\": 750, \"quantity\": 2}], \"total\": 10150}', NULL, 'Koteshwor', '2024-06-21 10:24:14'),
(154, 'Raj Nayabhari', '9812215678', '{\"cart\": [{\"name\": \"chicken momos\", \"price\": 300, \"quantity\": 1}, {\"name\": \"Dal Soup\", \"price\": 450, \"quantity\": 1}, {\"name\": \"Gorkhali Lamb Curry\", \"price\": 2050, \"quantity\": 1}, {\"name\": \"Kheer\", \"price\": 750, \"quantity\": 1}, {\"name\": \"Masala Chai\", \"price\": 100, \"quantity\": 2}], \"total\": 14800}', NULL, 'Bhaktapur', '2024-06-21 21:25:37'),
(155, 'Reshmi Rajchal', '9812225678', '{\"cart\": [{\"name\": \"Paneer Makhani\", \"price\": 1250, \"quantity\": 1}, {\"name\": \"Dal Bhat\", \"price\": 1400, \"quantity\": 1}, {\"name\": \"Masala Chai\", \"price\": 100, \"quantity\": 2}, {\"name\": \"Lassi\", \"price\": 150, \"quantity\": 2}], \"total\": 15650}', NULL, 'Bhaktapur', '2024-06-21 21:27:01'),
(159, 'Rijan Joshi', '9812235678', '{\"cart\": [{\"name\": \"Thukpa\", \"price\": 700, \"quantity\": 1}, {\"name\": \"Dal Soup\", \"price\": 450, \"quantity\": 1}, {\"name\": \"Kachumber Salad\", \"price\": 400, \"quantity\": 1}, {\"name\": \"Paneer Makhani\", \"price\": 1250, \"quantity\": 1}], \"total\": 6200}', NULL, 'Bhaktapur', '2024-06-22 07:05:48'),
(160, 'Jivan Kadel', '9812345678', '{\"cart\": [{\"name\": \"aloo chop\", \"price\": 75, \"quantity\": 1}, {\"name\": \"samosa\", \"price\": 75, \"quantity\": 1}, {\"name\": \"Dal Soup\", \"price\": 450, \"quantity\": 1}, {\"name\": \"Kachumber Salad\", \"price\": 400, \"quantity\": 1}], \"total\": 1000}', 1, 'Bhaktapur', '2024-06-23 07:45:22'),
(161, 'Jivan Kadel', '9812345678', '{\"cart\": [{\"name\": \"samosa\", \"price\": 75, \"quantity\": 1}, {\"name\": \"Gorkhali Lamb Curry\", \"price\": 2050, \"quantity\": 1}, {\"name\": \"Dhido Gundruk\", \"price\": 1750, \"quantity\": 1}], \"total\": 3875}', 1, 'Kathmandu', '2024-06-23 07:43:22'),
(162, 'Test', '9812345678', '{\"cart\": [{\"name\": \"Paneer Makhani\", \"price\": 1250, \"quantity\": 1}, {\"name\": \"Rasmalai\", \"price\": 150, \"quantity\": 1}, {\"name\": \"Masala Chai\", \"price\": 100, \"quantity\": 1}, {\"name\": \"Lassi\", \"price\": 150, \"quantity\": 1}], \"total\": 1650}', 1, 'ktm', '2024-06-22 10:05:48'),
(163, 'Sabeen Nayaju', '9812245678', '{\"cart\": [{\"name\": \"Dal Bhat\", \"price\": 1400, \"quantity\": 1}, {\"name\": \"Gulab Jamun\", \"price\": 150, \"quantity\": 1}, {\"name\": \"Masala Chai\", \"price\": 100, \"quantity\": 1}, {\"name\": \"Gorkhali Lamb Curry\", \"price\": 2050, \"quantity\": 1}], \"total\": 3700}', 1, 'Bhaktapur', '2024-06-22 12:02:17'),
(164, 'Sagar Parajuli', '9812255678', '{\"cart\": [{\"name\": \"Kachumber Salad\", \"price\": 400, \"quantity\": 1}, {\"name\": \"aloo chop\", \"price\": 75, \"quantity\": 2}, {\"name\": \"Dhido Gundruk\", \"price\": 1750, \"quantity\": 2}], \"total\": 4050}', NULL, 'Jadibuti', '2024-06-22 12:03:18'),
(167, 'sagar', '9812345678', '{\"cart\": [{\"name\": \"Samosa\", \"price\": 75, \"quantity\": 1}, {\"name\": \"aloo chop\", \"price\": 75, \"quantity\": 1}, {\"name\": \"Thukpa\", \"price\": 700, \"quantity\": 1}, {\"name\": \"Dal Soup\", \"price\": 450, \"quantity\": 1}], \"total\": 1300}', 1, 'ktm', '2024-06-23 06:49:33'),
(170, 'jivan kadel', '9812345678', '{\"cart\": [{\"name\": \"Chicken momos\", \"price\": 300, \"quantity\": 1}, {\"name\": \"Samosa\", \"price\": 75, \"quantity\": 1}, {\"name\": \"Thukpa\", \"price\": 700, \"quantity\": 1}], \"total\": 1075}', NULL, 'bkt', '2024-06-23 09:28:22');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int UNSIGNED NOT NULL,
  `user_name` text NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `seats` int NOT NULL,
  `completed` tinyint(1) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `reserve_date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `user_name`, `user_phone`, `seats`, `completed`, `address`, `reserve_date_time`) VALUES
(101, 'Ambika Shah', '9812345678', 5, NULL, 'Koteshwor', '2024-06-19 12:00:00'),
(102, 'Anuj Shrestha', '9822345678', 4, NULL, 'Thimi', '2024-06-21 05:00:00'),
(105, 'Arun Khatri', '9832345678', 5, NULL, 'Koteshwor', '2024-06-21 01:00:00'),
(106, 'Aryan Gwachha', '9842345678', 4, NULL, 'Bhaktapur', '2024-06-23 07:00:00'),
(107, 'Djwal Duwal', '9852345678', 5, 1, 'Bhaktapur', '2024-06-21 03:00:00'),
(108, 'Dilli Raj Awasthi', '9862345678', 5, NULL, 'Kausaltar', '2024-06-17 10:00:00'),
(109, 'Dipen Haleyo', '9872345678', 4, NULL, 'Bhaktapur', '2024-06-18 10:00:00'),
(110, 'Durga Thapa', '9882345678', 7, NULL, 'Lokanthali', '2024-06-18 10:00:00'),
(111, 'Ishan Adhikari', '9892345678', 6, NULL, 'Srijananagar', '2024-06-22 04:00:00'),
(112, 'Ishan Twayana', '9811045678', 5, NULL, 'Bhaktapur', '2024-06-19 10:00:00'),
(116, 'Jivan Kadel', '9811145678', 7, NULL, 'Lokanthali', '2024-06-16 10:00:00'),
(117, 'Kishor Bk', '9811245678', 4, NULL, 'Kausaltar', '2024-06-16 02:00:00'),
(118, 'Nabin Kandel', '9811345678', 5, NULL, 'Thimi', '2024-06-17 04:00:00'),
(119, 'Niraj Suwal', '9811445678', 5, 1, 'Sanga', '2024-06-20 05:00:00'),
(120, 'Prabesh Shrestha Bata', '9811545678', 5, 1, 'Duwakot', '2024-06-19 02:00:00'),
(121, 'Pranil Shrestha', '9811645678', 8, NULL, 'Thimi', '2024-06-21 10:00:00'),
(122, 'Jivan Kadel', '9812345678', 8, NULL, 'Kathmandu', '2024-06-22 07:00:00'),
(123, 'Pranil Shrestha', '9811545678', 8, NULL, 'Bhaktapur', '2024-06-23 08:00:00'),
(124, 'Pratik Satta', '9811745678', 7, 1, 'Bhaktapur', '2024-06-23 10:00:00'),
(125, 'Pratik Sharma', '9811845678', 5, NULL, 'Jadibuti', '2024-06-17 10:00:00'),
(126, 'Pratistha Karki', '9811945678', 7, NULL, 'Lokanthali', '2024-06-19 10:00:00'),
(128, 'jivan', '9812345678', 8, 1, 'ktm', '2024-06-23 10:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`) USING BTREE;

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_menus_category` (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `FK_menus_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
