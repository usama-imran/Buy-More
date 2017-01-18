-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2017 at 05:52 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `associate_product`
--

CREATE TABLE `associate_product` (
  `associate_product_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `associate_product`
--

INSERT INTO `associate_product` (`associate_product_id`, `product_id`) VALUES
(3, 1),
(4, 1),
(1, 33),
(2, 33),
(5, 43),
(6, 43),
(7, 70);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `credit_card_no` varchar(17) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`order_id`, `user_id`, `credit_card_no`, `date_created`) VALUES
(1, 2, '4170322404761755', '2017-01-12 05:27:36'),
(5, 2, '', '2017-01-12 06:43:09'),
(6, 2, '', '2017-01-12 07:45:28'),
(12, 1, '', '2017-01-17 07:34:00'),
(13, 1, '', '2017-01-17 07:34:29'),
(14, 2, '', '2017-01-17 10:49:26');

-- --------------------------------------------------------

--
-- Table structure for table `cart_products`
--

CREATE TABLE `cart_products` (
  `cart_pro_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_products`
--

INSERT INTO `cart_products` (`cart_pro_id`, `product_id`, `person_id`, `order_id`, `quantity`) VALUES
(1, 33, 2, 1, 1),
(2, 43, 2, 1, 1),
(3, 44, 2, 1, 1),
(14, 1, 2, 5, 1),
(15, 74, 2, 5, 1),
(16, 73, 2, 6, 1),
(27, 33, 1, 12, 1),
(28, 43, 1, 12, 1),
(29, 33, 1, 13, 3),
(30, 43, 1, 13, 1),
(31, 84, 1, 13, 1),
(32, 76, 1, 13, 1),
(33, 33, 2, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cname` varchar(15) NOT NULL,
  `description` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cname`, `description`, `created_by`, `is_active`, `date_created`) VALUES
(1, 'Laptop', 'Lorem', 1, 1, '2016-12-09 11:00:47'),
(2, 'KeyÂ Board', 'Lorem', 1, 1, '2016-12-13 10:37:43'),
(3, 'Mouse', 'Lorem Ipsum amet, sit dolor', 2, 1, '2016-12-13 10:56:29'),
(4, 'Memory', 'Lorem Ipsum amet, sit dolor', 1, 1, '2016-12-13 11:04:41'),
(26, 'Hard Drive', 'Western Digital', 2, 0, '2016-12-14 07:15:51'),
(27, 'Transport', 'Lorem Ipsum sit, amet dolor', 2, 0, '2016-12-14 10:17:02'),
(28, 'Plane', 'Lorem Ipsum amet, sit dolor', 2, 1, '2016-12-16 05:29:33'),
(29, 'Ships', 'Ship is used for the purpose of transportation', 2, 1, '2016-12-16 09:40:05'),
(30, 'Coming Soon', 'Lorem', 1, 1, '2017-01-12 10:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `price`, `description`, `quantity`, `image`, `date_created`, `created_by`, `is_active`, `cat_id`) VALUES
(1, 'Dell', 52000, 'Dell inspiron 550', 0, '5.jpg', '2016-12-16 05:33:53', 2, 0, 1),
(33, 'Bread', 1500, 'Brown Bread', 0, '3.jpg', '2016-12-14 06:42:58', 2, 1, 4),
(43, 'Razor Gaming 612', 6500, 'Lorem ipsum emit sit dolor', 0, '1.jpg', '2016-12-16 13:04:19', 2, 0, 4),
(44, 'Memory', 1500, 'Corsiare', 0, '4.jpg', '2016-12-16 13:04:41', 2, 0, 4),
(45, 'HP Envy', 120000, 'Touchsmart J109-tx', 0, '6.jpg', '2016-12-14 07:32:45', 2, 0, 1),
(46, 'Sager Keyboard', 25000, 'Alienware 15', 0, '7.jpg', '2017-01-12 10:38:46', 1, 0, 2),
(68, 'Sager 17', 310000, 'Alienware 17', 0, '2.jpg', '2017-01-16 13:51:58', 1, 0, 1),
(69, 'Rikshaw', 120000, 'Lorem Ipsum amet, sit dolor', 0, '8.jpg', '2016-12-15 09:07:12', 1, 0, 27),
(70, 'HP', 15000, '1st Gen', 0, '9.jpg', '2016-12-14 11:25:02', 1, 0, 1),
(72, 'Envy Touchsmart', 65000, 'J109-tx Energy Star, i7', 5, '10.jpg', '2016-12-19 07:03:36', 1, 0, 1),
(73, 'Mouse', 250, 'Dell Dophin', 3, '11.jpg', '2016-12-26 09:19:54', 1, 0, 3),
(74, 'Hard Drive', 5500, '500 GB of storage', 3, '12.jpg', '2016-12-26 09:19:19', 1, 0, 1),
(75, 'Segate RAM', 2000, '2Gb ', 2, '4.jpg', '2016-12-26 09:20:20', 1, 0, 4),
(76, 'Alchupakabra', 25000, 'Lorem ipsum emit sit dolor', 10, 'chupacabra.jpg', '2017-01-11 05:28:33', 1, 0, 27),
(79, 'Razor Keyboard', 6000, 'Lorem Ipsum', 20, '10081345702669083.jpg', '2017-01-12 10:50:15', 1, 0, 2),
(80, 'Razor Backlit', 12000, 'Lorem Ipsum', 15, 'images.jpg', '2017-01-12 10:51:11', 1, 0, 2),
(83, 'Logitech Mouse', 15000, 'Lorem Ipsum', 20, 'g502-rgb-tunable-gaming-mouse.jpg', '2017-01-12 10:59:32', 1, 0, 30),
(84, 'Gaming Mouse', 8000, 'Lorem Ipsum Sit Dolor', 15, 'berserker-rts-gaming-mouse-best-laser-gaming.jpg', '2017-01-12 11:01:12', 1, 0, 30);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `person_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(45) NOT NULL,
  `city` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`person_id`, `first_name`, `last_name`, `email`, `address`, `city`, `password`, `type`, `date_created`, `created_by`, `is_active`) VALUES
(1, 'Usama', 'Imran', 'usama.imran@rolustech.com', 'House # 158 , PIA Road', 'Lahore', '123', 'admin', '2016-12-13 06:34:35', 0, 1),
(2, 'Bilal', 'Riaz', 'usama.imran@yahoo.com', 'House # 222, G-Block', 'Lahore', '123', 'user', '2016-12-13 12:19:13', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `associate_product`
--
ALTER TABLE `associate_product`
  ADD PRIMARY KEY (`associate_product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `cart_products`
--
ALTER TABLE `cart_products`
  ADD PRIMARY KEY (`cart_pro_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `person_id` (`person_id`),
  ADD KEY `cart_id` (`order_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`person_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `associate_product`
--
ALTER TABLE `associate_product`
  MODIFY `associate_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `cart_products`
--
ALTER TABLE `cart_products`
  MODIFY `cart_pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `person_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `associate_product`
--
ALTER TABLE `associate_product`
  ADD CONSTRAINT `associate_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `cart_products`
--
ALTER TABLE `cart_products`
  ADD CONSTRAINT `cart_products_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `cart_products_ibfk_2` FOREIGN KEY (`person_id`) REFERENCES `users` (`person_id`),
  ADD CONSTRAINT `cart_products_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `cart` (`order_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
