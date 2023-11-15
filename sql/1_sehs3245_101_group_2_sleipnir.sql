-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-11-12 16:19:59
-- 伺服器版本： 10.4.21-MariaDB
-- PHP 版本： 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `sehs3245_101_group_2_sleipnir`
--

CREATE DATABASE `sehs3245_101_group_2_sleipnir`;

-- --------------------------------------------------------

--
-- 資料表結構 `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL COMMENT 'Coupon Code',
  `amount` decimal(12,4) NOT NULL COMMENT 'Discount Amount'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `coupon`
--

INSERT INTO `coupon` (`id`, `code`, `amount`) VALUES
(1, 'coupon001', '100.0000');

-- --------------------------------------------------------

--
-- 資料表結構 `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL COMMENT 'Email Address',
  `password` varchar(255) NOT NULL COMMENT 'Password',
  `active` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Is Active',
  `last_login_time` timestamp NULL DEFAULT NULL COMMENT 'Last Login time',
  `token` text DEFAULT NULL COMMENT 'Login Token'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `customer`
--

INSERT INTO `customer` (`id`, `email`, `password`, `active`, `last_login_time`, `token`) VALUES
(1, 'customer01@sleipnir.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '2023-11-12 09:37:32', '2838023a778dfaecdc212708f721b788');

-- --------------------------------------------------------

--
-- 資料表結構 `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL COMMENT 'Email Address',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Last Updated At'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `updated_at`) VALUES
(1, 'mok@mok.com', '2023-11-11 16:09:29');

-- --------------------------------------------------------

--
-- 資料表結構 `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL COMMENT 'Customer Id',
  `first_name` varchar(255) NOT NULL COMMENT 'First Name',
  `last_name` varchar(255) NOT NULL COMMENT 'Last Name',
  `email` varchar(255) NOT NULL COMMENT 'Email Address',
  `mobile` varchar(50) NOT NULL COMMENT 'Mobile Number',
  `coupon_code` varchar(255) NOT NULL COMMENT 'Coupon Code',
  `increment_id` varchar(255) DEFAULT NULL COMMENT 'Order Number',
  `status` varchar(255) NOT NULL DEFAULT 'pending' COMMENT 'Order Status',
  `total_qty` int(11) NOT NULL COMMENT 'Total Quantity',
  `subtotal` decimal(12,4) NOT NULL COMMENT 'Subtotal',
  `discount` decimal(12,4) NOT NULL COMMENT 'Discount Amount',
  `grand_total` decimal(12,4) NOT NULL COMMENT 'Grand Total',
  `appointment_at` datetime NOT NULL COMMENT 'Customer Appointment Time',
  `branch` varchar(255) NOT NULL COMMENT 'Company Branch Name',
  `payment_method` varchar(255) NOT NULL COMMENT 'Payment Method',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Create At'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL COMMENT 'Order Id',
  `product_id` int(11) NOT NULL COMMENT 'Product Id',
  `product_name` varchar(255) NOT NULL COMMENT 'Product Name',
  `product_url` text NOT NULL COMMENT 'Product Url',
  `product_image_url` text NOT NULL COMMENT 'Product Image Url',
  `qty` int(11) NOT NULL COMMENT 'Order Quantity',
  `sales_price` decimal(12,4) NOT NULL COMMENT 'Sales Price'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `quote`
--

CREATE TABLE `quote` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL COMMENT 'Customer Id',
  `coupon_code` varchar(255) DEFAULT NULL COMMENT 'Coupon Code',
  `total_qty` int(11) NOT NULL DEFAULT 0 COMMENT 'Total Quantity',
  `subtotal` decimal(12,4) NOT NULL DEFAULT 0.0000 COMMENT 'Subtotal',
  `discount` decimal(12,4) NOT NULL DEFAULT 0.0000 COMMENT 'Discount Amount',
  `grand_total` decimal(12,4) NOT NULL DEFAULT 0.0000 COMMENT 'Grand Total',
  `is_ordered` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Is Checkouted',
  `increment_id` varchar(255) DEFAULT NULL COMMENT 'Order Number',
  `active` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Is Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Create At',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Updated At'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `quote_item`
--

CREATE TABLE `quote_item` (
  `id` int(11) NOT NULL,
  `quote_id` int(11) NOT NULL COMMENT 'Quote Id',
  `product_id` int(11) NOT NULL COMMENT 'Product Id',
  `product_name` varchar(255) NOT NULL COMMENT 'Product Name',
  `product_url` text NOT NULL COMMENT 'Product Url',
  `product_image_url` text NOT NULL COMMENT 'Product Image Url',
  `qty` int(11) NOT NULL COMMENT 'Order Quantity',
  `sales_price` decimal(12,4) NOT NULL COMMENT 'Sales Price'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_login` (`email`,`password`,`active`);

--
-- 資料表索引 `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- 資料表索引 `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_product_id` (`product_id`),
  ADD KEY `idx_order_id` (`order_id`) USING BTREE;

--
-- 資料表索引 `quote`
--
ALTER TABLE `quote`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_customer_id` (`customer_id`,`active`,`is_ordered`) USING BTREE;

--
-- 資料表索引 `quote_item`
--
ALTER TABLE `quote_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_quote_id` (`quote_id`),
  ADD KEY `idx_product_id` (`product_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `quote`
--
ALTER TABLE `quote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `quote_item`
--
ALTER TABLE `quote_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
