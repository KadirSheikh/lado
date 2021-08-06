-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2021 at 10:20 AM
-- Server version: 10.1.37-MariaDB
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
-- Database: `lado`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'lado_admin', 'admin@123', '2021-03-17 10:12:38');

-- --------------------------------------------------------

--
-- Table structure for table `cart_tbl`
--

CREATE TABLE `cart_tbl` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_image` varchar(50) NOT NULL,
  `product_price` float NOT NULL,
  `product_type` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` float NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_tbl`
--

CREATE TABLE `customer_tbl` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `csrf_token` varchar(100) NOT NULL,
  `referal_code` varchar(100) NOT NULL,
  `profile_photo` varchar(50) NOT NULL DEFAULT 'user.png',
  `reg_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_tbl`
--

INSERT INTO `customer_tbl` (`id`, `full_name`, `email`, `mobile_no`, `password`, `csrf_token`, `referal_code`, `profile_photo`, `reg_at`) VALUES
(1, 'Kadir Rizwan', 'sheikhkadir02@gmail.com', '7972112804', '$2y$10$0h3E1QXHrohu9YDihyNg5OIGC569D0ci3aMRQPna6kOeFNCtH3TBO', '03c5e7966619e4f0286873141bf4fd20', '', 'Screenshot (96).png', '2021-03-15 11:51:35');

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `id` int(11) NOT NULL,
  `order_id` varchar(20) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `shipName` varchar(30) NOT NULL,
  `shipEmail` varchar(30) NOT NULL,
  `shipPhone` varchar(15) NOT NULL,
  `shipAddress` varchar(500) NOT NULL,
  `shipCity` varchar(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_quantity` int(20) NOT NULL,
  `total_price` float NOT NULL,
  `payment_mode` varchar(30) NOT NULL,
  `purchase_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL DEFAULT 'Order pending',
  `cancel_request` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`id`, `order_id`, `user_id`, `shipName`, `shipEmail`, `shipPhone`, `shipAddress`, `shipCity`, `product_id`, `product_name`, `product_quantity`, `total_price`, `payment_mode`, `purchase_date`, `status`, `cancel_request`) VALUES
(6, 'LADO1603202192673482', '1', 'Kadir Sheikh', 'sheikhkadir02@gmail.com', '7972112804', '', 'Napur', 1, 'Cupcake', 1, 150, 'cod', '2021-03-16 16:02:58', 'Order pending', 1),
(7, 'LADO1603202120837734', '1', 'Kadir Sheikh', 'sheikhkadir02@gmail.com', '7972112804', 'Ward No. 1 , Old Town , Butibori , Nagpur', 'Napur', 2, 'Ghee', 1, 200, 'cod', '2021-03-16 16:05:55', 'Order pending', 1),
(8, 'LADO1703202110603226', '1', 'Kadir Sheikh', 'sheikhkadir02@gmail.com', '7972112804', 'Ward No. 1 , Old Town , Butibori , Nagpur', 'Napur', 1, 'Gheefsfafas', 1, 200, 'cod', '2021-03-17 21:48:05', 'Order pending', 1),
(9, 'LADO1903202111486660', '1', 'Kadir Sheikh', 'sheikhkadir02@gmail.com', '7972112804', 'Ward No. 1 , Old Town , Butibori , Nagpur', 'Napur', 1, 'Gheefsfafas', 2, 400, 'cod', '2021-03-19 08:51:08', 'Order delivered', 0),
(10, 'LADO1903202120681703', '1', 'Kadir Sheikh', 'sheikhkadir02@gmail.com', '7972112804', 'Ward No. 1 , Old Town , Butibori , Nagpur', 'Napur', 3, 'Ghee', 6, 1200, 'cod', '2021-03-19 08:51:08', 'Order delivered', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products_tbl`
--

CREATE TABLE `products_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `type` varchar(20) NOT NULL,
  `image` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `add_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_tbl`
--

INSERT INTO `products_tbl` (`id`, `name`, `price`, `type`, `image`, `description`, `add_on`) VALUES
(1, 'Gheefsfafas', 200, 'cake', 'Screenshot (98).png', 'This is ghee', '2021-03-16 05:45:30'),
(2, 'Ghee', 200, 'ghee', 'card2.png', 'This is ghee', '2021-03-16 05:45:30'),
(3, 'Ghee', 200, 'ghee', 'card2.png', 'This is ghee', '2021-03-16 05:45:30'),
(16, 'Ghee', 200, 'ghee', 'card2.png', 'This is ghee', '2021-03-16 05:45:30'),
(17, 'Ghee', 200, 'ghee', 'card2.png', 'This is ghee', '2021-03-16 05:45:30'),
(18, 'Ghee', 200, 'ghee', 'card2.png', 'This is ghee', '2021-03-16 05:45:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_tbl`
--
ALTER TABLE `products_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products_tbl`
--
ALTER TABLE `products_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
