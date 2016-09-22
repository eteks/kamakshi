-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 22, 2016 at 12:57 PM
-- Server version: 5.5.50-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `giftstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `giftstore_adminusers`
--

CREATE TABLE IF NOT EXISTS `giftstore_adminusers` (
  `adminuser_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Unique identification of admin user',
  `adminuser_username` varchar(150) NOT NULL COMMENT 'Stores the username of admin user',
  `adminuser_password` varchar(150) NOT NULL COMMENT 'Stores the password of admin user',
  `adminuser_email` varchar(150) NOT NULL COMMENT 'Stores the email of admin user',
  `adminuser_mobile` bigint(15) NOT NULL COMMENT 'Stores the mobile number of admin user',
  `adminuser_is_superuser` tinyint(1) NOT NULL COMMENT 'Stores whether the admin user is superuser or not',
  `adminuser_status` tinyint(1) NOT NULL COMMENT 'Stores the status of admin user whether active or inactive',
  `adminuser_create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Stores the created date of admin user',
  PRIMARY KEY (`adminuser_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `giftstore_area`
--

CREATE TABLE IF NOT EXISTS `giftstore_area` (
  `area_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Unique identification of area',
  `area_name` varchar(150) NOT NULL COMMENT 'Stores the name of the area',
  `area_state_id` int(10) NOT NULL COMMENT 'Stores the mapping id of state',
  `area_city_id` int(10) NOT NULL COMMENT 'Stores the mapping id of city',
  `area_delivery_charge` decimal(10,2) DEFAULT NULL COMMENT 'Stores the delivery charge of area',
  `area_status` tinyint(1) NOT NULL COMMENT 'Stores the status of area',
  `area_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Stores the created date of area',
  PRIMARY KEY (`area_id`),
  KEY `area_state_id` (`area_state_id`),
  KEY `area_city_id` (`area_city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `giftstore_category`
--

CREATE TABLE IF NOT EXISTS `giftstore_category` (
  `category_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Unique identification for category',
  `category_name` varchar(150) NOT NULL COMMENT 'Stores the category name',
  `category_image` varchar(200) NOT NULL COMMENT 'Stores the category image',
  `category_status` tinyint(1) NOT NULL COMMENT 'Stores the status of category',
  `category_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Stores the created date of category',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `giftstore_category`
--

INSERT INTO `giftstore_category` (`category_id`, `category_name`, `category_image`, `category_status`, `category_createddate`) VALUES
(1, 'Watches', 'assets/img/upload/product6.jpg', 1, '2016-09-08 09:28:34'),
(2, 'Teddy', 'assets/img/upload/product1.jpg', 1, '2016-09-08 09:44:04'),
(3, 'Jewels', 'assets/img/upload/product3.jpg', 1, '2016-09-09 10:01:40'),
(4, 'Mobile', 'assets/img/upload/product4.jpg', 1, '2016-09-09 10:01:40'),
(5, 'Dress', 'assets/img/upload/product5.jpg', 1, '2016-09-09 10:05:09'),
(6, 'Scent', 'assets/img/upload/product2.jpg', 1, '2016-09-09 10:05:09'),
(7, 'Shoes', 'assets/img/upload/product7.jpg', 1, '2016-09-09 10:09:25'),
(8, 'T-shirt', 'assets/img/upload/product8.jpg', 1, '2016-09-09 10:09:25'),
(9, 'Cakes', 'assets/img/upload/product9.jpg', 1, '2016-09-09 10:10:54'),
(10, 'Glass', 'assets/img/upload/product10.jpg', 1, '2016-09-09 10:10:54'),
(11, 'Choclates', 'assets/img/upload/product11.jpg', 1, '2016-09-09 10:11:37'),
(12, 'asdf1', 'assets/admin/img/uploads/print1.jpeg', 0, '2016-09-21 11:01:57'),
(13, 'dfdfd', 'assets/admin/img/uploads/wall3.jpeg', 1, '2016-09-21 12:45:56');

-- --------------------------------------------------------

--
-- Table structure for table `giftstore_ccavenue_transaction`
--

CREATE TABLE IF NOT EXISTS `giftstore_ccavenue_transaction` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `tracking_id` varchar(150) NOT NULL,
  `bank_referrence_number` varchar(150) NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `payment_mode` varchar(150) NOT NULL,
  `card_name` varchar(150) NOT NULL,
  `currency` varchar(3) NOT NULL,
  `delivery_name` varchar(150) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `delivery_state_id` int(10) NOT NULL,
  `delivery_city_id` int(10) NOT NULL,
  `delivery_area_id` int(10) NOT NULL,
  `delivery_zip` varchar(150) NOT NULL,
  `delivery_country` varchar(150) NOT NULL,
  `delivery_email` varchar(150) NOT NULL,
  `delivery_mobile` bigint(15) NOT NULL,
  `offer_type` varchar(150) NOT NULL,
  `offer_code` varchar(150) NOT NULL,
  `discount_value` decimal(9,2) NOT NULL,
  `amount` decimal(9,2) NOT NULL,
  `status_code` tinyint(1) NOT NULL,
  `status_message` varchar(255) NOT NULL,
  `merchant_amount` decimal(9,2) NOT NULL,
  `eci_value` int(10) NOT NULL,
  `transaction_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `transaction_id` (`transaction_id`),
  KEY `user_id` (`user_id`),
  KEY `order_id` (`order_id`),
  KEY `delivery_state_id` (`delivery_state_id`),
  KEY `delivery_city_id` (`delivery_city_id`),
  KEY `delivery_area_id` (`delivery_area_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `giftstore_city`
--

CREATE TABLE IF NOT EXISTS `giftstore_city` (
  `city_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Unique identification of city',
  `city_name` varchar(150) NOT NULL COMMENT 'Stores the name of the city',
  `city_state_id` int(10) NOT NULL COMMENT 'Stores the mapping id of state',
  `city_status` tinyint(1) NOT NULL COMMENT 'Stores the status of city',
  `city_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Stores the created date of city',
  PRIMARY KEY (`city_id`),
  KEY `city_state_id` (`city_state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `giftstore_order`
--

CREATE TABLE IF NOT EXISTS `giftstore_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_user_id` int(11) DEFAULT NULL,
  `order_total_items` int(10) NOT NULL,
  `order_user_type` varchar(100) NOT NULL,
  `order_customer_name` varchar(150) NOT NULL,
  `order_customer_email` varchar(150) NOT NULL,
  `order_shipping_line1` varchar(150) NOT NULL,
  `order_shipping_line2` varchar(150) NOT NULL,
  `order_shipping_state_id` int(10) NOT NULL,
  `order_shipping_city_id` int(10) NOT NULL,
  `order_shipping_area_id` int(10) NOT NULL,
  `order_shipping_email` varchar(150) NOT NULL,
  `order_shipping_mobile` bigint(15) NOT NULL,
  `order_delivery_status` tinyint(1) NOT NULL,
  `order_delivery_date` date NOT NULL,
  `order_delivery_time` time NOT NULL,
  `	order_total_amount` decimal(10,2) NOT NULL,
  `order_status` tinyint(1) NOT NULL,
  `order_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`),
  KEY `order_user_id` (`order_user_id`),
  KEY `order_shipping_state_id` (`order_shipping_state_id`),
  KEY `order_shipping_city_id` (`order_shipping_city_id`),
  KEY `order_shipping_area_id` (`order_shipping_area_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `giftstore_orderitem`
--

CREATE TABLE IF NOT EXISTS `giftstore_orderitem` (
  `orderitem_id` int(10) NOT NULL AUTO_INCREMENT,
  `orderitem_order_id` int(10) NOT NULL,
  `orderitem_product_id` int(10) NOT NULL COMMENT 'Stores the product id which is ordered by user',
  `orderitem_product_attribute_id` int(10) NOT NULL COMMENT 'Stores the product attribute id which is ordered by user',
  `orderitem_product_attribute_value_id` int(10) NOT NULL COMMENT 'Stores the product attribute detail id which is ordered by user',
  `orderitem_quantity` int(10) NOT NULL,
  `orderitem_price` decimal(10,2) NOT NULL,
  `orderitem_session_id` varchar(255) NOT NULL,
  `orderitem_status` tinyint(1) NOT NULL,
  `orderitem_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`orderitem_id`),
  KEY `orderitem_order_id` (`orderitem_order_id`),
  KEY `orderitem_product_id` (`orderitem_product_id`),
  KEY `orderitem_product_attribute_id` (`orderitem_product_attribute_id`),
  KEY `orderitem_product_attribute_value_id` (`orderitem_product_attribute_value_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `giftstore_product`
--

CREATE TABLE IF NOT EXISTS `giftstore_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identification of product ',
  `product_title` varchar(150) NOT NULL COMMENT 'Stores the title of product',
  `product_description` varchar(255) NOT NULL COMMENT 'Stores the description of product',
  `product_category_id` int(10) NOT NULL COMMENT 'Stores the category id of product',
  `product_subcategory_id` int(10) NOT NULL COMMENT 'Stores the subcategory id of product',
  `product_recipient_id` int(10) NOT NULL,
  `product_price` decimal(10,2) NOT NULL COMMENT 'Stores the price of product',
  `product_totalitems` int(10) NOT NULL COMMENT 'Stores the total no. of items available in product',
  `product_sold` int(10) NOT NULL COMMENT 'Stores the no. items sold in product',
  `product_status` tinyint(1) NOT NULL COMMENT 'Stores the status of product',
  `product_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Stores the created date of the product',
  PRIMARY KEY (`product_id`),
  KEY `product_category_id` (`product_category_id`),
  KEY `product_subcategory_id` (`product_subcategory_id`),
  KEY `product_recipient_id` (`product_recipient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `giftstore_product_attribute`
--

CREATE TABLE IF NOT EXISTS `giftstore_product_attribute` (
  `product_attribute_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Stores the unique identification of product attribute',
  `product_attribute` varchar(150) NOT NULL COMMENT 'Stores the product attribute like size, weight, type, color, material, etc',
  `product_attribute_inputtags` varchar(255) NOT NULL COMMENT 'Stores the input element which is shown in product detail page',
  `product_attribute_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Stores the created date of product attribute',
  PRIMARY KEY (`product_attribute_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `giftstore_product_attribute_value`
--

CREATE TABLE IF NOT EXISTS `giftstore_product_attribute_value` (
  `product_attribute_value_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Stores the unique identification of product attribute value id',
  `product_attribute_value` varchar(100) NOT NULL COMMENT 'Stores the value of product attribute like if size means large, medium, low',
  `product_attribute_value_price` decimal(10,2) NOT NULL COMMENT 'Stores the price of product attribute value',
  `product_attribute_value_totalitems` bigint(15) NOT NULL COMMENT 'Stores the totalitems available in that particular product attribute value',
  `product_attribute_value_sold` bigint(15) NOT NULL COMMENT 'Stores the no. of items sold in that particular product attribute',
  `product_attribute_mapping_id` int(11) NOT NULL COMMENT 'Stores the product attribute mapping id',
  `product_mapping_id` int(11) NOT NULL COMMENT 'Stores the product mapping id',
  `product_attribute_value_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Stores the created date of product attribute value',
  PRIMARY KEY (`product_attribute_value_id`),
  KEY `product_attribute_mapping_id` (`product_attribute_mapping_id`,`product_mapping_id`),
  KEY `product_mapping_id` (`product_mapping_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `giftstore_product_upload_image`
--

CREATE TABLE IF NOT EXISTS `giftstore_product_upload_image` (
  `product_upload_image_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Store the unique id of product uploaded image id',
  `product_upload_image` varchar(255) NOT NULL COMMENT 'Stores the product uploaded image path',
  `product_mapping_id` int(10) NOT NULL COMMENT 'Stores the product mapping id',
  PRIMARY KEY (`product_upload_image_id`),
  KEY `product_mapping_id` (`product_mapping_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `giftstore_recipient`
--

CREATE TABLE IF NOT EXISTS `giftstore_recipient` (
  `recipient_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifcation of recipient id',
  `recipient_type` varchar(150) NOT NULL COMMENT 'Stores the type of recipient',
  `recipient_status` tinyint(1) NOT NULL COMMENT 'Stores the status of recipient',
  `recipient_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Stores the created date of recipient type',
  PRIMARY KEY (`recipient_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `giftstore_recipient`
--

INSERT INTO `giftstore_recipient` (`recipient_id`, `recipient_type`, `recipient_status`, `recipient_createddate`) VALUES
(1, 'All', 1, '2016-09-09 10:27:27'),
(2, 'Men', 1, '2016-09-09 10:29:09'),
(3, 'Women', 1, '2016-09-09 10:29:09'),
(4, 'Boy', 1, '2016-09-09 10:27:27'),
(5, 'Girl', 1, '2016-09-09 10:27:42');

-- --------------------------------------------------------

--
-- Table structure for table `giftstore_recipient_category`
--

CREATE TABLE IF NOT EXISTS `giftstore_recipient_category` (
  `recipient_category_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Unique identification of recipient category_id',
  `recipient_mapping_id` int(10) NOT NULL COMMENT 'Stores the recipient mapping id for assigned category',
  `category_mapping_id` int(10) NOT NULL COMMENT 'Stores the category mapping id for the recipient',
  `recipient_category_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Stores the created date of recipient category assigned',
  PRIMARY KEY (`recipient_category_id`),
  KEY `recipient_mapping_id` (`recipient_mapping_id`),
  KEY `category_mapping_id` (`category_mapping_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `giftstore_recipient_category`
--

INSERT INTO `giftstore_recipient_category` (`recipient_category_id`, `recipient_mapping_id`, `category_mapping_id`, `recipient_category_createddate`) VALUES
(1, 1, 1, '2016-09-09 10:30:07'),
(2, 1, 2, '2016-09-09 10:30:07'),
(3, 2, 1, '2016-09-09 10:30:26'),
(4, 2, 2, '2016-09-09 10:30:26'),
(5, 3, 1, '2016-09-09 10:31:01'),
(6, 3, 2, '2016-09-09 10:31:01'),
(7, 4, 1, '2016-09-09 10:31:21'),
(8, 4, 2, '2016-09-09 10:31:21'),
(9, 5, 1, '2016-09-09 10:31:41'),
(10, 5, 2, '2016-09-09 10:31:41');

-- --------------------------------------------------------

--
-- Table structure for table `giftstore_state`
--

CREATE TABLE IF NOT EXISTS `giftstore_state` (
  `state_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Unique identification of state',
  `state_name` varchar(150) NOT NULL COMMENT 'Stores the name of the state',
  `state_status` tinyint(1) NOT NULL COMMENT 'Stores the status of state',
  `state_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Stores the created date of state',
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `giftstore_state`
--

INSERT INTO `giftstore_state` (`state_id`, `state_name`, `state_status`, `state_createddate`) VALUES
(7, 'Puducherry', 1, '2016-08-31 13:23:06');

-- --------------------------------------------------------

--
-- Table structure for table `giftstore_subcategory`
--

CREATE TABLE IF NOT EXISTS `giftstore_subcategory` (
  `subcategory_id` int(1) NOT NULL AUTO_INCREMENT COMMENT 'Unique identification of subcategory',
  `subcategory_name` varchar(150) NOT NULL COMMENT 'Stores the name of subcategory',
  `subcategory_status` tinyint(1) NOT NULL COMMENT 'Stores the status of subcategory',
  `subcategory_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Stores the createddate of subcategory',
  PRIMARY KEY (`subcategory_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `giftstore_subcategory_category`
--

CREATE TABLE IF NOT EXISTS `giftstore_subcategory_category` (
  `subcategory_category_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Unique identification of subcategory and category mapping id',
  `subcategory_mapping_id` int(10) NOT NULL COMMENT 'Stores the mapping id of subcategory',
  `category_mapping_id` int(10) NOT NULL COMMENT 'Stores the mapping id of category',
  `subcategory_category_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Stores the created date of subcategory and category mapping id',
  PRIMARY KEY (`subcategory_category_id`),
  KEY `subcategory_mapping_id` (`subcategory_mapping_id`),
  KEY `category_mapping_id` (`category_mapping_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `giftstore_users`
--

CREATE TABLE IF NOT EXISTS `giftstore_users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Unique identification of user',
  `user_social_id` varchar(100) NOT NULL COMMENT 'Stores the social id of user from social website like facebook, google, twitter, etc',
  `user_name` varchar(150) NOT NULL COMMENT 'Stores the username of user',
  `user_password` varchar(50) NOT NULL COMMENT 'Stores the password of user',
  `user_type` varchar(100) NOT NULL COMMENT 'Stores the type of user',
  `user_email` varchar(150) NOT NULL COMMENT 'Stores the email of user',
  `user_dob` date NOT NULL COMMENT 'Stores the date of birth of user',
  `user_mobile` bigint(15) NOT NULL COMMENT 'Stores the mobile number of user',
  `user_status` tinyint(1) NOT NULL COMMENT 'Stores the status of user',
  `user_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Stores the created date of user',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE IF NOT EXISTS `todos` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `completed` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`id`, `title`, `description`, `completed`) VALUES
(0, 'test1', 'test1', 1),
(1, 'test', 'test', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL,
  `status` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `email`, `password`, `status`) VALUES
(5, 'thangam', 'gold', 'thangamgold95@gmail.com', 'cd8cca1899998a96574491d9bbd5cf0d', b'0'),
(2, 'thangam', 'gold', 'thangamgold45@gmail.com', 'd9f6e636e369552839e7bb8057aeb8da', b'0'),
(3, 'dfh', 'ghfgj', 'fgh@gh.drfh', 'd9f6e636e369552839e7bb8057aeb8da', b'0'),
(4, 'thangam', 'gold', 'thangamgold86@gmail.com', 'cd8cca1899998a96574491d9bbd5cf0d', b'0'),
(6, 'thangam', 'gold', 'thangam19@gmail.com', 'cd8cca1899998a96574491d9bbd5cf0d', b'0'),
(7, 'thangam', 'gold', 'admin@gmail.com', 'd9f6e636e369552839e7bb8057aeb8da', b'0'),
(8, '', '', '', '', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `giftstore_area`
--
ALTER TABLE `giftstore_area`
  ADD CONSTRAINT `giftstore_area_ibfk_1` FOREIGN KEY (`area_state_id`) REFERENCES `giftstore_state` (`state_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giftstore_area_ibfk_2` FOREIGN KEY (`area_city_id`) REFERENCES `giftstore_city` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `giftstore_ccavenue_transaction`
--
ALTER TABLE `giftstore_ccavenue_transaction`
  ADD CONSTRAINT `giftstore_ccavenue_transaction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `giftstore_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giftstore_ccavenue_transaction_ibfk_2` FOREIGN KEY (`delivery_state_id`) REFERENCES `giftstore_state` (`state_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giftstore_ccavenue_transaction_ibfk_3` FOREIGN KEY (`delivery_city_id`) REFERENCES `giftstore_city` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giftstore_ccavenue_transaction_ibfk_4` FOREIGN KEY (`delivery_area_id`) REFERENCES `giftstore_area` (`area_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giftstore_ccavenue_transaction_ibfk_5` FOREIGN KEY (`order_id`) REFERENCES `giftstore_order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `giftstore_city`
--
ALTER TABLE `giftstore_city`
  ADD CONSTRAINT `giftstore_city_ibfk_1` FOREIGN KEY (`city_state_id`) REFERENCES `giftstore_state` (`state_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `giftstore_order`
--
ALTER TABLE `giftstore_order`
  ADD CONSTRAINT `giftstore_order_ibfk_1` FOREIGN KEY (`order_user_id`) REFERENCES `giftstore_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giftstore_order_ibfk_2` FOREIGN KEY (`order_shipping_state_id`) REFERENCES `giftstore_state` (`state_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giftstore_order_ibfk_3` FOREIGN KEY (`order_shipping_city_id`) REFERENCES `giftstore_city` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giftstore_order_ibfk_4` FOREIGN KEY (`order_shipping_area_id`) REFERENCES `giftstore_area` (`area_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `giftstore_orderitem`
--
ALTER TABLE `giftstore_orderitem`
  ADD CONSTRAINT `giftstore_orderitem_ibfk_1` FOREIGN KEY (`orderitem_order_id`) REFERENCES `giftstore_order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giftstore_orderitem_ibfk_2` FOREIGN KEY (`orderitem_product_id`) REFERENCES `giftstore_product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giftstore_orderitem_ibfk_3` FOREIGN KEY (`orderitem_product_attribute_id`) REFERENCES `giftstore_product_attribute` (`product_attribute_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giftstore_orderitem_ibfk_4` FOREIGN KEY (`orderitem_product_attribute_value_id`) REFERENCES `giftstore_product_attribute_value` (`product_attribute_value_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `giftstore_product`
--
ALTER TABLE `giftstore_product`
  ADD CONSTRAINT `giftstore_product_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `giftstore_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giftstore_product_ibfk_2` FOREIGN KEY (`product_subcategory_id`) REFERENCES `giftstore_subcategory` (`subcategory_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giftstore_product_ibfk_3` FOREIGN KEY (`product_recipient_id`) REFERENCES `giftstore_recipient` (`recipient_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `giftstore_product_attribute_value`
--
ALTER TABLE `giftstore_product_attribute_value`
  ADD CONSTRAINT `giftstore_product_attribute_value_ibfk_1` FOREIGN KEY (`product_attribute_mapping_id`) REFERENCES `giftstore_product_attribute` (`product_attribute_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giftstore_product_attribute_value_ibfk_2` FOREIGN KEY (`product_mapping_id`) REFERENCES `giftstore_product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `giftstore_product_upload_image`
--
ALTER TABLE `giftstore_product_upload_image`
  ADD CONSTRAINT `giftstore_product_upload_image_ibfk_1` FOREIGN KEY (`product_mapping_id`) REFERENCES `giftstore_product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `giftstore_recipient_category`
--
ALTER TABLE `giftstore_recipient_category`
  ADD CONSTRAINT `giftstore_recipient_category_ibfk_1` FOREIGN KEY (`recipient_mapping_id`) REFERENCES `giftstore_recipient` (`recipient_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giftstore_recipient_category_ibfk_2` FOREIGN KEY (`category_mapping_id`) REFERENCES `giftstore_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `giftstore_subcategory_category`
--
ALTER TABLE `giftstore_subcategory_category`
  ADD CONSTRAINT `giftstore_subcategory_category_ibfk_1` FOREIGN KEY (`subcategory_mapping_id`) REFERENCES `giftstore_subcategory` (`subcategory_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giftstore_subcategory_category_ibfk_2` FOREIGN KEY (`category_mapping_id`) REFERENCES `giftstore_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
