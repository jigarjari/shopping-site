-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2025 at 04:25 PM
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
-- Database: `shoppingdb`
--
CREATE DATABASE IF NOT EXISTS `shoppingdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `shoppingdb`;

-- --------------------------------------------------------

--
-- Table structure for table `carttb`
--

CREATE TABLE `carttb` (
  `cid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carttb`
--

INSERT INTO `carttb` (`cid`, `user_id`, `product_id`, `qty`, `status`) VALUES
(4, 6, 15, 3, 'pending'),
(18, 27, 2, 1, 'ordered');

-- --------------------------------------------------------

--
-- Table structure for table `categorytb`
--

CREATE TABLE `categorytb` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorytb`
--

INSERT INTO `categorytb` (`id`, `name`) VALUES
(1, 'Electronic'),
(2, 'Clothing'),
(13, 'furniture');

-- --------------------------------------------------------

--
-- Table structure for table `coupontb`
--

CREATE TABLE `coupontb` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `discount_per` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coupontb`
--

INSERT INTO `coupontb` (`id`, `code`, `discount_per`) VALUES
(1, 'demo123', 10);

-- --------------------------------------------------------

--
-- Table structure for table `ordertb`
--

CREATE TABLE `ordertb` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordertb`
--

INSERT INTO `ordertb` (`id`, `user_id`, `total`, `order_date`) VALUES
(9, 27, 78400, '2025-09-28');

-- --------------------------------------------------------

--
-- Table structure for table `producttb`
--

CREATE TABLE `producttb` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `producttb`
--

INSERT INTO `producttb` (`id`, `category_id`, `name`, `description`, `price`, `image`) VALUES
(2, 1, 'Sony bravia TV', '112 inch pure HD display', 98000, 'product/images/sony.jpg'),
(15, 1, 'Iphone 17 pro max', 'excellent phone with bhagwa color', 85000, 'product/images/iphone17pro.jpg\r\n'),
(19, 2, 'US polo t-shirt', 'premium brand high qty material', 8500, 'product/images/tshirt.jpg'),
(20, 2, 'American Eagle', 'best jeans promoted by sydney', 8520, 'product/images/jeans.jpg'),
(25, 13, 'abcd', 'kbcksjd', 852, 'product/images/ChatGPT Image Sep 26, 2025, 09_37_13 PM.png');

-- --------------------------------------------------------

--
-- Table structure for table `usertb`
--

CREATE TABLE `usertb` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `status` varchar(10) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertb`
--

INSERT INTO `usertb` (`id`, `username`, `email`, `password`, `status`, `role`) VALUES
(1, 'admin', 'admin', 'admin', 'active', 'admin'),
(6, 'abc', 'xyz@gmail.com', 'qwerty', 'Active', 'User'),
(21, 'mnoijk', 'abcdef@gmail.com', 'avs', 'active', 'user'),
(22, 'xyz', 'qwerty@gmail.com', 'xyz@1234', 'blocked', 'user'),
(25, 'diya', 'd07@gmail.com', 'd@1234', 'Active', 'User'),
(26, 'tarang', 'tarang@gmail.com', 'tarang', 'block', 'User'),
(27, 'ok', 'ok@gmail.com', 'okokok', 'Active', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carttb`
--
ALTER TABLE `carttb`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categorytb`
--
ALTER TABLE `categorytb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupontb`
--
ALTER TABLE `coupontb`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `ordertb`
--
ALTER TABLE `ordertb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_order` (`user_id`);

--
-- Indexes for table `producttb`
--
ALTER TABLE `producttb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `usertb`
--
ALTER TABLE `usertb`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emailVal` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carttb`
--
ALTER TABLE `carttb`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `categorytb`
--
ALTER TABLE `categorytb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `coupontb`
--
ALTER TABLE `coupontb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ordertb`
--
ALTER TABLE `ordertb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `producttb`
--
ALTER TABLE `producttb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `usertb`
--
ALTER TABLE `usertb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carttb`
--
ALTER TABLE `carttb`
  ADD CONSTRAINT `product_fk` FOREIGN KEY (`product_id`) REFERENCES `producttb` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `usertb` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ordertb`
--
ALTER TABLE `ordertb`
  ADD CONSTRAINT `user_fk_order` FOREIGN KEY (`user_id`) REFERENCES `usertb` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `producttb`
--
ALTER TABLE `producttb`
  ADD CONSTRAINT `category_fk` FOREIGN KEY (`category_id`) REFERENCES `categorytb` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
