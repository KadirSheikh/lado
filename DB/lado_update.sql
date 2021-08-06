-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2021 at 02:03 PM
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
-- Table structure for table `admin_wallet_tbl`
--

CREATE TABLE `admin_wallet_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `balance` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_wallet_tbl`
--

INSERT INTO `admin_wallet_tbl` (`id`, `name`, `email`, `mobile_no`, `balance`) VALUES
(1, 'Lado Admin', 'lado@gmail.com', '8806760677', 1200);

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
  `product_profit` float NOT NULL,
  `total_profit` float NOT NULL,
  `product_type` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` float NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_tbl`
--

INSERT INTO `cart_tbl` (`cart_id`, `user_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_profit`, `total_profit`, `product_type`, `quantity`, `total_price`, `added_on`) VALUES
(2, 15, 2, 'Ghee', 'card2.png', 200, 0, 0, 'ghee', 2, 500, '2021-04-05 06:30:18'),
(5, 19, 1, 'Cake', 'card1.png', 200, 0, 0, 'cake', 3, 600, '2021-04-05 11:58:57');

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
  `profile_photo` varchar(50) NOT NULL DEFAULT 'user.png',
  `referal_code` varchar(100) NOT NULL,
  `joined_by` varchar(100) NOT NULL,
  `leg_count` int(11) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL,
  `is_id_active` varchar(10) NOT NULL DEFAULT 'No',
  `reg_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_tbl`
--

INSERT INTO `customer_tbl` (`id`, `full_name`, `email`, `mobile_no`, `password`, `csrf_token`, `profile_photo`, `referal_code`, `joined_by`, `leg_count`, `level`, `is_id_active`, `reg_at`) VALUES
(1, 'Lado Admin', 'lado@gmail.com', '8806760677', '$2y$10$LoBfoS9MlX4MlaQ/lTVj6.341gnGzkwapLqMnBrBdDivgnL5Wy3vi', '8522d111342c51fe92fdd0510483c01c', 'user.png', 'LADOADMINR23032021518947647', 'ITSADMIN', 8, 1, 'Yes', '2021-03-23 06:13:54'),
(6, 'Kadir Rizwan Sheikh', 'rs7246510@gmail.com', '7972112804', '$2y$10$Mx81BiJlWy7bBsuPl1Ho2.vP5DzpipCkNhj8/dI8llkRXl8leC.G.', '77a6f10bba1fb4b2d486ec0710de22a2', 'user.png', 'LADOR230320212075793738', 'LADOADMINR23032021518947647', 2, 2, 'No', '2021-03-23 14:24:08'),
(7, 'Kamil Rizwan Sheikh', 'sheikhkamil02@gmail.com', '8407944828', '$2y$10$ce3h47zE4MCMvEhk5jpNb.7Db5QfBH0VaUKjzILjpGQY5uSNG73AO', '0412e874b24e33b71d34314e03cc9ce0', 'user.png', 'LADOR240320211489952846', 'LADOADMINR23032021518947647', 1, 2, 'No', '2021-03-24 05:37:45'),
(8, 'Test', 'test@gmail.com', '7777777754', '$2y$10$F409xqN6ya1qSw.6jmqXzeaAFQBeVMAq70230FlsaeXENU4JukVYu', '66dc6a68b71a63bbc0ad2b2144d42f58', 'user.png', 'LADOR25032021230162799', 'LADOR230320212075793738', 2, 3, 'No', '2021-03-25 04:00:37'),
(9, 'test1', 'test1@gmail.com', '7777777777', '$2y$10$gFUK7D8q4A5/95LhKwsuw.LwpjWAiKi1EYBACh6nzj0lkdYJLG89C', 'f409402153f78986d1d5962916814f3e', 'user.png', 'LADOR250320211291614846', 'LADOR240320211489952846', 2, 3, 'No', '2021-03-25 04:01:39'),
(10, 'test2', 'test2@gmail.com', '8888888888', '$2y$10$TkhqWpe1ZMtfC/JeCA21/eJ8l5enVNSGivuNmpoHw/2n8sV7zJKQe', 'd31c27cd6198226635e48e28334a18ab', 'user.png', 'LADOR250320211095459865', 'LADOR25032021230162799', 1, 4, 'No', '2021-03-25 04:03:24'),
(11, 'test3', 'test3@gmal.com', '9999999969', '$2y$10$lZwMRyWAFxHUtXwDy/nw3O9H96NbbMBpFaeRxYWUoDnQpV667JBuC', '02a890e1e3a5092ac4b71467a51ff8e5', 'user.png', 'LADOR250320211487177507', 'LADOR250320211291614846', 1, 4, 'No', '2021-03-25 04:04:27'),
(12, 'test4', 'test4@gmail.com', '7777777777', '$2y$10$nEY3yQvWZNGV/w4hOA070uBrjHoUfIaPj6EcwDFbgWDTH3WF9jolm', 'c024bcd45e2af448c14e7cfd326f26d4', 'user.png', 'LADOR250320211834470420', 'LADOR250320211095459865', 1, 5, 'No', '2021-03-25 04:30:23'),
(13, 'test5', 'test5@gmail.com', '8888888888', '$2y$10$SILprxXwMFl999XjinzpnudqnbJQXneGz5Zc68WxFI9HSoL2iz/Oq', '1f4dd8b8db7e75be050d8f6159e42ad8', 'user.png', 'LADOR25032021185672731', 'LADOR250320211487177507', 0, 5, 'No', '2021-03-25 04:31:21'),
(14, 'admintest', 'admintest@gmail.com', '8888888888', '$2y$10$OyIPBYcZTv/LKSoByTD/EevvyLp0VZ3tCgmuW9UMCbKqtLReKf/Ce', 'bc5d5e288c760b059342e1f46e3656b2', 'user.png', 'LADOR250320212040878250', 'LADOADMINR23032021518947647', 0, 2, 'No', '2021-03-25 07:06:26'),
(15, 'test6', 'test6@gmail.com', '8888888880', '$2y$10$UD//xP0nDKgm2zvMUY3sx.O5aKs.l1Ul05S5SYDTz4k/rkd7eHmXe', '110725991109457ab51aa714def42434', 'user.png', 'LADOR25032021591972781', 'LADOR230320212075793738', 1, 6, 'No', '2021-03-25 07:07:41'),
(16, 'test7', 'test7@gmail.com', '7897897897', '$2y$10$UwgWVQVXdB1QD2WkJfFLnulfu9TvuyiGjUv3ifMis/N878NmwXGoW', '5d1f248a194e133a559bfd6b9aad5c3e', 'user.png', 'LADOR25032021378540589', 'LADOR25032021591972781', 0, 4, 'No', '2021-03-25 07:37:01'),
(17, 'test8', 'test8@gmail.com', '7777777777', '$2y$10$4/1vVH0zN.7P93As7xpw8.BsdbWaJ2pvtBzqf3cMAQgu1LIGnaBKW', '876e7f32c8a15cad1a95ab97d41a37a5', 'user.png', 'LADOR25032021883705917', 'LADOR250320211291614846', 0, 4, 'No', '2021-03-25 07:53:47'),
(18, 'test9', 'test9@gmail.com', '1234567890', '$2y$10$e4XYZz/nNVHpmNEDmya1Yuls8Mz9qW9vVQ3wEWtvvfdOj3xWFoBwy', 'cbfd81648f42d9c7e7a55d498e5168de', 'user.png', 'LADOR25032021113253681', 'LADOR25032021230162799', 0, 4, 'No', '2021-03-25 07:56:05'),
(19, 'test10', 'test10@gmail.com', '1234567890', '$2y$10$T3ohi0Zi/XfRezpyTdLnxO2o3f0bEs.2IS3jZ.aWhUvWisXGWSqLW', '6d2f82a27004bb384983b9073c2c39fc', 'user.png', 'LADOR250320211814125014', 'LADOR250320211834470420', 0, 6, 'No', '2021-03-25 07:58:44'),
(20, 'test11', 'test11@gmail.com', '7474747474', '$2y$10$RAX3g3SBWcBnXKMlPWteg.mAIvzPDo9lAnCpOoBi0YD9rFdlOWgVi', '587d92eb1bd37c06aabc9b1c7bb96c4e', 'user.png', 'LADOR26032021311340302', 'LADOADMINR23032021518947647', 0, 2, 'No', '2021-03-26 09:55:01'),
(21, 'Genuine User', 'g@gmail.com', '7878787867', '$2y$10$TIpoIuEH5CC0WCLlpwZRkuq94BdKsnYzTPoz0t2ItKQFs8hTBO6Hy', '3c58315b2fdd39c418fe813a3220e8fe', 'user.png', 'LADOR260320211997204835', 'LADOADMINR23032021518947647', 0, 2, 'No', '2021-03-26 10:02:30'),
(22, 'level check', 'level@gmail.com', '7878787878', '$2y$10$LZHLafN7WpJlNA2Uxso9ZOPYX3KxN8T6dd4uSH3uVsDhvBu8ua48q', 'fdee20703035b7a5d323b465a9341929', 'user.png', 'LADOR300320211205587272', 'LADOADMINR23032021518947647', 0, 2, 'No', '2021-03-30 10:40:50'),
(23, 'level 2', 'level2@gmail.com', '1234567890', '$2y$10$R.e43D2Hedy2pxjBGiXOXOquXA8pwsvJ5JcdR1udL3LadPAfRVqTi', 'cdfc13c5c897d7e6db0aaf22660133e8', 'user.png', 'LADOR300320211082847998', 'LADOADMINR23032021518947647', 0, 2, 'No', '2021-03-30 10:46:44'),
(24, 'level3', 'level3@gmail.com', '1234567885', '$2y$10$Nsb28KTbcO/AxK0iA7bFsexsJat/q/LoXyQxOOwdvv4fbQHZgtVt.', '5f90b48cfaf9f789b0e72d7ea74c2adf', 'user.png', 'LADOR30032021475206867', 'LADOADMINR23032021518947647', 1, 2, 'No', '2021-03-30 10:54:35'),
(25, 'level4', 'level4@gmail.com', '1234567890', '$2y$10$qY7DUgzQMqQaYacpzbnS2O3ApAXYiSRibIcUY/cmUXOgV9wmbzoqK', '25303b81a8f8e5efae536105da021029', 'user.png', 'LADOR300320211523965584', 'LADOR30032021475206867', 0, 3, 'No', '2021-03-30 11:01:30');

-- --------------------------------------------------------

--
-- Table structure for table `forget_pass_otp_tbl`
--

CREATE TABLE `forget_pass_otp_tbl` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` int(10) NOT NULL,
  `is_expired` tinyint(1) NOT NULL,
  `requested_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forget_pass_otp_tbl`
--

INSERT INTO `forget_pass_otp_tbl` (`id`, `email`, `otp`, `is_expired`, `requested_at`) VALUES
(1, 'rs7246510@gmail.com', 302790, 1, '2021-04-03 10:07:46'),
(2, 'rs7246510@gmail.com', 606756, 1, '2021-04-03 10:00:52'),
(3, 'rs7246510@gmail.com', 355804, 1, '2021-04-03 10:06:10'),
(4, 'sheikhkadir02@gmail.com', 245046, 1, '2021-04-05 06:50:49'),
(5, 'test10@gmail.com', 513090, 1, '2021-04-05 07:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `my_wallet_tbl`
--

CREATE TABLE `my_wallet_tbl` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `balance` float NOT NULL DEFAULT '0',
  `is_dc_buy` varchar(10) NOT NULL DEFAULT 'No',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `my_wallet_tbl`
--

INSERT INTO `my_wallet_tbl` (`id`, `user_id`, `user_name`, `mobile_no`, `email`, `balance`, `is_dc_buy`, `created_on`) VALUES
(1, 1, 'Lado Admin', '8806760677', 'lado@gmail.com', 0, 'Yes', '2021-03-26 10:02:30'),
(2, 21, 'Genuine User', '7878787867', 'g@gmail.com', 9700, 'Yes', '2021-03-26 10:02:30'),
(3, 22, 'level check', '7878787878', 'level@gmail.com', 0, 'No', '2021-03-30 10:40:51'),
(4, 23, 'level 2', '1234567890', 'level2@gmail.com', 0, 'No', '2021-03-30 10:46:44'),
(5, 24, 'level3', '1234567885', 'level3@gmail.com', 0, 'No', '2021-03-30 10:54:35'),
(6, 19, 'Kadir Rizwan Sheikh', '7972112804', 'sheikhkadir02@gmail.com', 660, 'Yes', '2021-03-30 11:01:30');

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
  `expected_date` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Order pending',
  `cancel_request` int(11) NOT NULL DEFAULT '0',
  `order_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`id`, `order_id`, `user_id`, `shipName`, `shipEmail`, `shipPhone`, `shipAddress`, `shipCity`, `product_id`, `product_name`, `product_quantity`, `total_price`, `payment_mode`, `purchase_date`, `expected_date`, `status`, `cancel_request`, `order_on`) VALUES
(1, 'LADO0304202115336719', '19', 'Kadir Sheikh', 'sheikhkadir02@gmail.com', '7878787878', 'Ward No. 1 , Old Town , Butibori , Nagpur', 'Napur', 1, 'Gheefsfafas', 1, 200, 'cod', '2021-04-03 13:20:09', '2021-04-06', 'Order pending', 0, '2021-04-03 07:50:09'),
(2, 'LADO0504202117112130', '19', 'Kadir Sheikh', 'sheikhkadir02@gmail.com', '7878787878', 'Ward No. 1 , Old Town , Butibori , Nagpur', 'Napur', 1, 'Gheefsfafas', 1, 200, 'cod', '2021-04-05 12:00:35', '2021-04-08', 'Order pending', 0, '2021-04-05 06:30:35'),
(3, 'LADO0504202117111801', '19', 'Kadir Sheikh', 'sheikhkadir02@gmail.com', '777777777', 'Ward No. 1 , Old Town , Butibori , Nagpur', 'Napur', 1, 'Gheefsfafas', 2, 400, 'cod', '2021-04-05 12:08:00', '2008-04-21', 'Order pending', 0, '2021-04-05 06:38:00'),
(4, 'LADO0504202112511528', '19', 'Kadir Sheikh', 'sheikhkadir02@gmail.com', '777777777', 'Ward No. 1 , Old Town , Butibori , Nagpur', 'Napur', 2, 'Ghee', 1, 200, 'cod', '2021-04-05 12:13:58', '0000-00-00', 'Order pending', 0, '2021-04-05 06:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `products_tbl`
--

CREATE TABLE `products_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `buying_price` float NOT NULL,
  `profit` double NOT NULL,
  `type` varchar(20) NOT NULL,
  `image` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `add_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_tbl`
--

INSERT INTO `products_tbl` (`id`, `name`, `price`, `buying_price`, `profit`, `type`, `image`, `description`, `add_on`) VALUES
(1, 'Cake', 200, 100, 100, 'cake', 'card1.png', 'This is ghee', '2021-03-16 05:45:30'),
(2, 'Ghee', 200, 100, 100, 'ghee', 'card2.png', 'This is ghee', '2021-03-16 05:45:30'),
(3, 'Ghee', 250, 100, 100, 'ghee', 'card2.png', 'This is ghee', '2021-03-16 05:45:30');

-- --------------------------------------------------------

--
-- Table structure for table `profit_log_tbl`
--

CREATE TABLE `profit_log_tbl` (
  `id` int(11) NOT NULL,
  `purchase_by_user_id` int(11) NOT NULL,
  `distribute_user_id` int(11) NOT NULL,
  `profit_amount` float NOT NULL,
  `distributed_amount` float NOT NULL,
  `admin_profit` float NOT NULL,
  `order_status` varchar(50) NOT NULL DEFAULT 'Order pending',
  `order_id` varchar(100) NOT NULL,
  `is_order_cancelled` int(11) NOT NULL DEFAULT '0',
  `is_money_sent` varchar(10) NOT NULL DEFAULT 'No',
  `is_read_by_user` int(11) NOT NULL DEFAULT '0',
  `recieved_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `shared_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profit_log_tbl`
--

INSERT INTO `profit_log_tbl` (`id`, `purchase_by_user_id`, `distribute_user_id`, `profit_amount`, `distributed_amount`, `admin_profit`, `order_status`, `order_id`, `is_order_cancelled`, `is_money_sent`, `is_read_by_user`, `recieved_on`, `shared_on`) VALUES
(1, 19, 12, 300, 30, 180, 'Order pending', 'LADO03042021153367199119', 0, 'No', 0, '2021-04-03 07:50:09', '0000-00-00'),
(2, 19, 10, 300, 30, 180, 'Order pending', 'LADO03042021153367199119', 0, 'No', 0, '2021-04-03 07:50:09', '0000-00-00'),
(3, 19, 8, 300, 30, 180, 'Order pending', 'LADO03042021153367199119', 0, 'No', 0, '2021-04-03 07:50:09', '0000-00-00'),
(4, 19, 6, 300, 30, 180, 'Order pending', 'LADO03042021153367199119', 0, 'No', 0, '2021-04-03 07:50:10', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `review_product_tbl`
--

CREATE TABLE `review_product_tbl` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` float NOT NULL,
  `review` varchar(500) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_product_tbl`
--

INSERT INTO `review_product_tbl` (`id`, `user_id`, `product_id`, `rating`, `review`, `created_on`) VALUES
(1, 19, 1, 2, 'What a product!', '2021-04-02 11:16:32'),
(2, 19, 2, 3, 'Awesome product', '2021-04-02 11:17:57'),
(3, 19, 3, 5, 'What awesome product', '2021-04-02 11:16:32');

-- --------------------------------------------------------

--
-- Table structure for table `share_tbl`
--

CREATE TABLE `share_tbl` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `ref_code` varchar(50) NOT NULL,
  `contacts` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `share_tbl`
--

INSERT INTO `share_tbl` (`id`, `username`, `ref_code`, `contacts`) VALUES
(1, 'Genuine User', 'LADOR260320211997204835', '797211824'),
(2, 'Genuine User', 'LADOR260320211997204835', '8407944833'),
(3, 'Genuine User', 'LADOR260320211997204835', '7030321687'),
(4, 'Genuine User', 'LADOR260320211997204835', '7030321686'),
(5, 'Genuine User', 'LADOR260320211997204835', '1234567890'),
(6, 'Genuine User', 'LADOR260320211997204835', '7057813899');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_request_tbl`
--

CREATE TABLE `withdraw_request_tbl` (
  `request_id` int(10) NOT NULL,
  `requested_user_id` int(10) NOT NULL,
  `requested_username` varchar(255) NOT NULL,
  `mobile_no` varchar(100) NOT NULL,
  `requested_amount` float NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `request_status` varchar(200) NOT NULL DEFAULT 'in process',
  `withdraw_in` varchar(255) NOT NULL,
  `request_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `allow_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdraw_request_tbl`
--

INSERT INTO `withdraw_request_tbl` (`request_id`, `requested_user_id`, `requested_username`, `mobile_no`, `requested_amount`, `is_read`, `request_status`, `withdraw_in`, `request_date`, `allow_date`) VALUES
(2, 21, 'Genuine User', '7972112804', 100, 1, 'in process', 'paytm', '2021-03-26 10:27:46', '2021-03-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_wallet_tbl`
--
ALTER TABLE `admin_wallet_tbl`
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
-- Indexes for table `forget_pass_otp_tbl`
--
ALTER TABLE `forget_pass_otp_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_wallet_tbl`
--
ALTER TABLE `my_wallet_tbl`
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
-- Indexes for table `profit_log_tbl`
--
ALTER TABLE `profit_log_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_product_tbl`
--
ALTER TABLE `review_product_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `share_tbl`
--
ALTER TABLE `share_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_request_tbl`
--
ALTER TABLE `withdraw_request_tbl`
  ADD PRIMARY KEY (`request_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_wallet_tbl`
--
ALTER TABLE `admin_wallet_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `forget_pass_otp_tbl`
--
ALTER TABLE `forget_pass_otp_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `my_wallet_tbl`
--
ALTER TABLE `my_wallet_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products_tbl`
--
ALTER TABLE `products_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profit_log_tbl`
--
ALTER TABLE `profit_log_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `review_product_tbl`
--
ALTER TABLE `review_product_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `share_tbl`
--
ALTER TABLE `share_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `withdraw_request_tbl`
--
ALTER TABLE `withdraw_request_tbl`
  MODIFY `request_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
