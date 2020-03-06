-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 17, 2019 at 11:17 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kawira`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `purchase` int(11) NOT NULL,
  `sale` int(11) NOT NULL,
  `profit` int(11) NOT NULL,
  `acc_email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `year`, `purchase`, `sale`, `profit`, `acc_email`) VALUES
(1, 2019, 27000, 400000, 373000, 'ericpaul995@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(20) NOT NULL,
  `author` text NOT NULL,
  `activity` text NOT NULL,
  `adate` date NOT NULL,
  `atime` time NOT NULL,
  `venue` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `author`, `activity`, `adate`, `atime`, `venue`) VALUES
(1, 'martinallen722@gmail.com', 'Farmers General Meeting', '2019-11-20', '00:00:00', 'Oware'),
(2, 'martinallen722@gmail.com', 'Farmers General Meeting', '2019-11-30', '14:00:00', 'Nyatin'),
(3, 'martinallen722@gmail.com', 'Agricultural Visitors Visit', '2019-11-27', '16:00:00', 'Oware');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(20) NOT NULL,
  `brand_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(1, 'Fertilizer'),
(2, 'Seed'),
(3, 'Tractor'),
(4, 'Scarer'),
(5, 'Tractor');

-- --------------------------------------------------------

--
-- Table structure for table `farms`
--

CREATE TABLE `farms` (
  `farm_id` int(20) NOT NULL,
  `farm_name` varchar(200) NOT NULL,
  `farm_size` varchar(200) DEFAULT NULL,
  `phone` varchar(200) NOT NULL,
  `phone2` varchar(200) NOT NULL,
  `fnumber` varchar(200) NOT NULL,
  `supa_id` int(11) DEFAULT NULL,
  `scheme_id` int(20) NOT NULL,
  `user_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farms`
--

INSERT INTO `farms` (`farm_id`, `farm_name`, `farm_size`, `phone`, `phone2`, `fnumber`, `supa_id`, `scheme_id`, `user_id`) VALUES
(1, '', '123456', '0712345670', '0712345678', '123', NULL, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `location_address`
--

CREATE TABLE `location_address` (
  `id` int(20) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `lat` varchar(200) DEFAULT NULL,
  `lng` varchar(200) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `user_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mobile_payments`
--

CREATE TABLE `mobile_payments` (
  `transLoID` int(11) NOT NULL,
  `TransactionType` varchar(10) NOT NULL,
  `TransTime` varchar(14) NOT NULL,
  `TransAmount` varchar(6) NOT NULL,
  `BusinessShortCode` varchar(6) NOT NULL,
  `BillRefNumber` varchar(6) NOT NULL,
  `InvoiceNumber` varchar(6) NOT NULL,
  `OrgAccountBalance` varchar(10) NOT NULL,
  `ThirdPartyTransID` varchar(10) NOT NULL,
  `MSISDN` varchar(14) NOT NULL,
  `FirstName` varchar(10) DEFAULT NULL,
  `MiddleName` varchar(10) DEFAULT NULL,
  `LastName` varchar(10) DEFAULT NULL,
  `TransId` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mpesa_payments`
--

CREATE TABLE `mpesa_payments` (
  `TransactionType` varchar(40) DEFAULT NULL,
  `TransID` varchar(40) DEFAULT NULL,
  `TransTime` varchar(40) DEFAULT NULL,
  `TransAmount` double DEFAULT NULL,
  `BusinessShortCode` varchar(15) DEFAULT NULL,
  `BillRefNumber` varchar(40) DEFAULT NULL,
  `InvoiceNumber` varchar(40) DEFAULT NULL,
  `OrgAccountBalance` double NOT NULL,
  `ThirdPartyTransID` varchar(40) DEFAULT NULL,
  `MSISDN` varchar(20) DEFAULT NULL,
  `FirstName` varchar(60) DEFAULT NULL,
  `MiddleName` varchar(60) DEFAULT NULL,
  `LastName` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `name`, `type`, `message`, `status`, `date`) VALUES
(3, '', 'comment', 'hhhh', 'read', '2019-12-09 11:14:00'),
(4, 'Allend', 'like', '', 'read', '2019-12-09 11:17:13'),
(5, 'Allend', 'like', '', 'read', '2019-12-09 11:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `product_quantity` varchar(200) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `expected_delivery` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `user_id` int(20) NOT NULL,
  `total_price` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `product_id`, `product_quantity`, `order_date`, `expected_delivery`, `status`, `user_id`, `total_price`) VALUES
(1, 1, '2', '2019-12-16', '2019-12-17', 0, 20, '3600'),
(3, 1, '8', '2019-12-16', '2019-12-17', 0, 20, '14400'),
(4, 1, '5', '2019-12-16', '2019-12-24', 0, 20, '9000');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `resetId` int(20) NOT NULL,
  `resetEmail` varchar(200) DEFAULT NULL,
  `resetSelector` text,
  `resetToken` text,
  `resetExpeires` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(20) NOT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `product_price` decimal(20,2) NOT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `brand_id`, `product_price`, `status`) VALUES
(1, 'Amonia', 1, '1800.00', 1),
(2, 'Punda Milia', 2, '3000.00', 1),
(4, 'Awino', 4, '3000.00', 1),
(5, 'Nitrogen', 1, '3000.00', 1),
(6, 'KBH 1345', 3, '3500.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `register_db`
--

CREATE TABLE `register_db` (
  `user_id` int(20) NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `reg_date` varchar(200) DEFAULT NULL,
  `reg_time` varchar(200) DEFAULT NULL,
  `file` varchar(200) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `size` varchar(200) DEFAULT NULL,
  `age` varchar(200) DEFAULT NULL,
  `role` int(11) DEFAULT '3',
  `isEmailConfirmed` tinyint(1) NOT NULL,
  `token` varchar(200) NOT NULL,
  `isSuspended` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_db`
--

INSERT INTO `register_db` (`user_id`, `username`, `first_name`, `last_name`, `email`, `password`, `reg_date`, `reg_time`, `file`, `type`, `size`, `age`, `role`, `isEmailConfirmed`, `token`, `isSuspended`) VALUES
(3, 'erickpaul@gmail.com', 'Ware', 'Erick', 'erickpaul@gmail.com', '$2y$10$SuOjWw1ksZpLT3qb1e2mPOLdRgHzOR5MAB7ATtrVU59kcvquATEdu', '2019-11-10', '16:05:52', '82154-9088-78857-6c491622bddb4e8184619738bd40ee87.jpg', 'image/jpeg', '277.28515625', NULL, 1, 1, '', 1),
(4, 'paeko', 'Perez', 'Akoth', 'akothperez@gmail.com', '$2y$10$SuOjWw1ksZpLT3qb1e2mPOLdRgHzOR5MAB7ATtrVU59kcvquATEdu', '2019-11-10', '16:53:32', '55372-10796-40172-2963-a090e5d62b7a438a9fa615323c8ceed1.jpg', 'image/jpeg', '14.138671875', NULL, 2, 0, '6KopUPhbjy', 1),
(5, 'Omuklela', 'Omuk', 'Lela', 'omuklela@gmail.com', '$2y$10$SuOjWw1ksZpLT3qb1e2mPOLdRgHzOR5MAB7ATtrVU59kcvquATEdu', '2019-11-10', '17:34:22', '68889-35496-23003-47711-img-20190617-wa0010.jpg', 'image/jpeg', '56.0107421875', NULL, 2, 0, '(4/*nptfxh', 1),
(10, 'Martin', 'Allen', 'Martin', 'allenmartin722@gmail.com', '$2y$10$SuOjWw1ksZpLT3qb1e2mPOLdRgHzOR5MAB7ATtrVU59kcvquATEdu', '2019-11-13', '16:44:47', '35963-82154-9088-78857-6c491622bddb4e8184619738bd40ee87.jpg', 'image/jpeg', '277.28515625', NULL, 2, 0, 'RYN!trpPh*', 1),
(17, 'martinallen722@gmail.com', 'Allen', 'Martin', 'martinallen722@gmail.com', '$2y$10$SuOjWw1ksZpLT3qb1e2mPOLdRgHzOR5MAB7ATtrVU59kcvquATEdu', '2019-11-13', '17:28:48', '32223-90736-23003-47711-img-20190617-wa0010.jpg', 'image/jpeg', '56.0107421875', NULL, 2, 1, '', 1),
(18, 'allenmartin3317@gmail.com', 'Allend', 'Martind', 'allenmartin3317@gmail.com', '$2y$10$SuOjWw1ksZpLT3qb1e2mPOLdRgHzOR5MAB7ATtrVU59kcvquATEdu', '2019-11-13', '17:31:43', '85584-91119-64533-47711-img-20190617-wa0010.jpg', 'image/jpeg', '56.0107421875', NULL, 3, 0, '', 1),
(19, 'steveowago', 'Steve', 'Owago', 'steveowago@gmail.com', '$2y$10$SuOjWw1ksZpLT3qb1e2mPOLdRgHzOR5MAB7ATtrVU59kcvquATEdu', '2019-11-14', '12:58:31', '36478-80876-cmruok2.png', 'image/png', '240.9208984375', NULL, 2, 1, '', 1),
(20, 'Eric', 'Eric ', 'Ware', 'ericpaul995@gmail.com', '$2y$10$SuOjWw1ksZpLT3qb1e2mPOLdRgHzOR5MAB7ATtrVU59kcvquATEdu', '2019-11-18', '17:45:44', '40649-91119-64533-47711-img-20190617-wa0010.jpg', 'image/jpeg', '56.0107421875', NULL, 3, 1, '', 0),
(21, 'lennox3317@gmail.com', 'Lennox', 'Odede', 'lennox3317@gmail.com', '$2y$10$SuOjWw1ksZpLT3qb1e2mPOLdRgHzOR5MAB7ATtrVU59kcvquATEdu', '2019-11-21', '19:01:43', '96107-undraw_posting_photo.svg', 'image/svg+xml', '36.4111328125', NULL, 2, 0, 'Vkuv1eMct7', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(20) NOT NULL,
  `role_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Supervisor'),
(3, 'farmer');

-- --------------------------------------------------------

--
-- Table structure for table `scheme`
--

CREATE TABLE `scheme` (
  `scheme_id` int(20) NOT NULL,
  `scheme_name` varchar(200) DEFAULT NULL,
  `sup_id` int(11) DEFAULT NULL,
  `sup_start_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scheme`
--

INSERT INTO `scheme` (`scheme_id`, `scheme_name`, `sup_id`, `sup_start_date`) VALUES
(1, 'Oriamatera', 19, '2019-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `super_comment`
--

CREATE TABLE `super_comment` (
  `comment_id` int(20) NOT NULL,
  `super_name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `message` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super_comment`
--

INSERT INTO `super_comment` (`comment_id`, `super_name`, `email`, `message`) VALUES
(1, 'Allen', 'martinallen722@gmail.com', 'Hell Omut');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acc_id` (`acc_email`);

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `farms`
--
ALTER TABLE `farms`
  ADD KEY `supa_id` (`supa_id`),
  ADD KEY `scheme_id` (`scheme_id`),
  ADD KEY `farm_id` (`farm_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `location_address`
--
ALTER TABLE `location_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobile_payments`
--
ALTER TABLE `mobile_payments`
  ADD PRIMARY KEY (`transLoID`),
  ADD KEY `TransId` (`TransId`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`resetId`),
  ADD UNIQUE KEY `resetEmail` (`resetEmail`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_bid` (`brand_id`);

--
-- Indexes for table `register_db`
--
ALTER TABLE `register_db`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `scheme`
--
ALTER TABLE `scheme`
  ADD PRIMARY KEY (`scheme_id`),
  ADD KEY `sup_id` (`sup_id`);

--
-- Indexes for table `super_comment`
--
ALTER TABLE `super_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `farms`
--
ALTER TABLE `farms`
  MODIFY `farm_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `location_address`
--
ALTER TABLE `location_address`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mobile_payments`
--
ALTER TABLE `mobile_payments`
  MODIFY `transLoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `resetId` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `register_db`
--
ALTER TABLE `register_db`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `scheme`
--
ALTER TABLE `scheme`
  MODIFY `scheme_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `super_comment`
--
ALTER TABLE `super_comment`
  MODIFY `comment_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `farms`
--
ALTER TABLE `farms`
  ADD CONSTRAINT `farms_ibfk_1` FOREIGN KEY (`scheme_id`) REFERENCES `scheme` (`scheme_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `farms_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `register_db` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`id`) REFERENCES `register_db` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `register_db` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD CONSTRAINT `password_reset_ibfk_1` FOREIGN KEY (`resetId`) REFERENCES `register_db` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`) ON DELETE SET NULL;

--
-- Constraints for table `register_db`
--
ALTER TABLE `register_db`
  ADD CONSTRAINT `register_db_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`role_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
