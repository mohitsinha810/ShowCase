-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2018 at 07:56 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `showcase`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`id`, `firstname`, `lastname`, `email`, `mobile`, `password`) VALUES
(1, 'John', 'Doe', 'johndoe@gmail.com', 1234333333, 'wwee3344');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_cart`
--

CREATE TABLE `buyer_cart` (
  `id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `productid` int(11) DEFAULT NULL,
  `buyerid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buyer_orders`
--

CREATE TABLE `buyer_orders` (
  `id` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `pin` bigint(20) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `items` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `buyerid` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `payment` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyer_orders`
--

INSERT INTO `buyer_orders` (`id`, `address`, `mobile`, `firstname`, `lastname`, `state`, `city`, `pin`, `country`, `items`, `quantity`, `price`, `buyerid`, `email`, `payment`) VALUES
(48, 'w', 8234333333, 'ty', 'we', 'ww', 'new delhi', 123456, 'India', '3,9', '4,1', '110000', '1', 'llkkl@dw.com', 1),
(49, 'w', 8234333333, 'ty', 'we', 'ww', 'new delhi', 123456, 'India', '10', '1', '10000', '1', 'llkkl@dw.com', 1),
(50, 'w', 8234333333, 'ty', 'we', 'ww', 'new delhi', 123456, 'India', '10', '1', '10000', '1', 'llkkl@dw.com', 1),
(51, 'w', 8234333333, 'ty', 'we', 'ww', 'new delhi', 123456, 'India', '10', '1', '10000', '1', 'llkkl@dw.com', 2),
(52, 'w', 8234333333, 'ty', 'we', 'ww', 'new delhi', 123456, 'India', '4', '1', '2000', '1', 'llkkl@dw.com', 1),
(53, 'w', 8234333333, 'ty', 'we', 'ww', 'new delhi', 123456, 'India', '4', '1', '2000', '1', 'llkkl@dw.com', 1),
(54, 'w', 8234333333, 'ty', 'we', 'ww', 'new delhi', 123456, 'India', '3,4', '2,1', '52000', '1', 'llkkl@dw.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'ty we', 'mohitsinha810@gmail.com', 'Hello', 'How are you'),
(2, 'ty we', 'mohitsinha810@gmail.com', 'Hello', 'How are you'),
(3, 'ty we', 'mohitsinha810@gmail.com', 'Hello', 'How are you'),
(4, 'ty we', 'mohitsinha810@gmail.com', 'Hello', 'How are you'),
(5, 'ty we', 'mohitsinha810@gmail.com', 'Hello', 'How are you'),
(6, 'ty we', 'mohitsinha810@gmail.com', 'Hello', 'How are you'),
(7, 'ty we', 'mohitsinha810@gmail.com', 'Hello', 'How are you'),
(8, 'ty we', 'mohitsinha810@gmail.com', 'Hello', 'How are you'),
(9, 'ty we', 'mohitsinha810@gmail.com', 'Hello', 'How are you'),
(10, 'ty we', 'mohitsinha810@gmail.com', 'Hello', 'How are you');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `surface` varchar(255) DEFAULT NULL,
  `delivery` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `longdesc` mediumtext,
  `shortdesc` varchar(255) DEFAULT NULL,
  `yearofartwork` year(4) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `sellerid` int(11) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `type`, `surface`, `delivery`, `image`, `longdesc`, `shortdesc`, `yearofartwork`, `width`, `height`, `price`, `sellerid`, `category`) VALUES
(2, 'Chinese Festival', 'Painting', 'Canvas', 'Boxed', '1Chinese Festival.jpg', 'This is a real art.', 'This is  a art.', 2018, 20, 30, 12000, 1, 'Landscape'),
(3, 'Office', 'Painting', 'Cloth', 'Rolled', '1Office.jpg', 'Long', 'Short', 2018, 14, 16, 25000, 1, 'Portrait'),
(4, 'A City', 'Drawing', 'Hardboard', 'Boxed', '1A CIty.jpg', 'This is a beautiful painting of a city.', 'Beautiful city', 2018, 14, 67, 2000, 1, 'Paintings On Nature'),
(5, 'Abstract', 'Painting', 'Cloth', 'Stretched', '1Abstract.jpg', 'Beautiful', 'Hello', 2018, 12, 34, 12000, 1, 'Abstract Art'),
(7, 'Scenery', 'Painting', 'Canvas', 'Stretched', '1Scenery.jpg', 'de', 'ed', 2018, 12, 34, 1289, 1, 'Abstract Art'),
(9, 'Another nature', 'Painting', 'Watercolorpaper', 'Rolled', '1Another nature.jpg', 'wew', 'qw', 2018, 12, 34, 10000, 1, 'None');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `profile` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `firstname`, `lastname`, `email`, `mobile`, `password`, `profile`, `image`) VALUES
(1, 'drwe', 'we', 'hello@gm.com', 1234333333, 'wwee3344', NULL, NULL),
(8, 'ty', 'we', 'mohit@gmail.com', 8234333333, 'wwee3344', NULL, NULL),
(9, 'ty', 'we', 'llkkl@dw.com', 8234333333, 'wwee3344', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seller_cart`
--

CREATE TABLE `seller_cart` (
  `id` int(11) NOT NULL,
  `sellerid` int(11) DEFAULT NULL,
  `productid` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller_cart`
--

INSERT INTO `seller_cart` (`id`, `sellerid`, `productid`, `quantity`) VALUES
(9, 1, 3, 1),
(12, 1, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `seller_orders`
--

CREATE TABLE `seller_orders` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyer_cart`
--
ALTER TABLE `buyer_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyer_orders`
--
ALTER TABLE `buyer_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_cart`
--
ALTER TABLE `seller_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_orders`
--
ALTER TABLE `seller_orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buyer_cart`
--
ALTER TABLE `buyer_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buyer_orders`
--
ALTER TABLE `buyer_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `seller_cart`
--
ALTER TABLE `seller_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `seller_orders`
--
ALTER TABLE `seller_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
