-- Adminer 4.8.1 MySQL 10.4.28-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `lfs` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */;
USE `lfs`;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `categories` (`id`, `category_name`, `link`) VALUES
(1,	'Identity Cards',	''),
(2,	'Digital Item',	''),
(3,	'Wallets',	''),
(4,	'Books',	''),
(5,	'Money',	''),
(6,	'Bags',	'');

DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `postedby` int(11) DEFAULT NULL,
  `location_found` varchar(255) DEFAULT NULL,
  `location_lost` varchar(255) DEFAULT NULL,
  `date_found` varchar(255) DEFAULT NULL,
  `date_lost` varchar(255) DEFAULT NULL,
  `owner_name` varchar(255) DEFAULT NULL,
  `owner_contact` varchar(255) DEFAULT NULL,
  `claimed` tinyint(1) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `claimed_by` varchar(255) DEFAULT NULL,
  `claimed_date` date DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `postedby` (`postedby`),
  CONSTRAINT `items_ibfk_1` FOREIGN KEY (`postedby`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `items` (`item_id`, `item_name`, `category`, `description`, `postedby`, `location_found`, `location_lost`, `date_found`, `date_lost`, `owner_name`, `owner_contact`, `claimed`, `type`, `claimed_by`, `claimed_date`, `image`) VALUES
(1,	'Laptop',	'Electronics',	'Silver MacBook Pro',	8,	'Cafeteria',	NULL,	'2023-05-15',	NULL,	'John Smith',	'john@example.com',	0,	'Lost',	NULL,	NULL,	'img/product-1.jpg'),
(2,	'Wallet',	'Books',	'Black leather wallet',	8,	'Park',	NULL,	'2023-05-18',	NULL,	'Jane Doe',	'jane@example.com',	1,	'Lost',	'Mary Johnson',	'2023-05-20',	'img/product-1.jpg'),
(3,	'Keychain',	'Wallets',	'Red keychain with a car logo',	1,	'Bus Stop',	NULL,	'2023-05-21',	NULL,	'David Wilson',	'david@example.com',	0,	'Found',	NULL,	NULL,	'img/product-1.jpg');

DROP TABLE IF EXISTS `lost_items`;
CREATE TABLE `lost_items` (
  `post_id` int(11) NOT NULL,
  `lost_by` varchar(255) DEFAULT NULL,
  `contact_info` varchar(255) DEFAULT NULL,
  `lost_item_name` varchar(255) DEFAULT NULL,
  `lost_item_description` varchar(255) DEFAULT NULL,
  `date_posted` date DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


DROP TABLE IF EXISTS `places`;
CREATE TABLE `places` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `place_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `places` (`id`, `place_name`) VALUES
(1,	'Block A'),
(2,	'Block B'),
(3,	'Block C'),
(4,	'Block D'),
(5,	'IFM Canteen'),
(6,	'Maktaba'),
(7,	'IFM Airport');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `student_id` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `resetcode` int(11) DEFAULT NULL,
  `resettoken` varchar(50) DEFAULT NULL,
  `expireat` int(50) DEFAULT NULL,
  `verifytoken` varchar(255) DEFAULT NULL,
  `verified` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `middle_name`, `lastname`, `student_id`, `phone`, `role`, `resetcode`, `resettoken`, `expireat`, `verifytoken`, `verified`) VALUES
(1,	'admin',	'admin@ifm.tz',	'7c4a8d09ca3762af61e59520943dc26494f8941b',	'System',	' ',	'Administrator',	'',	'+255693338637',	1,	907226,	'5644f1a1ecfc5234b06baf2f55bdd85f06e896da',	1686945413,	NULL,	1),
(8,	'user',	'user@ifm.ac.tz',	'7c4a8d09ca3762af61e59520943dc26494f8941b',	'Mohamed',	'Issa',	'Singano',	NULL,	'0755199399',	2,	222398,	'92c56c4ad88c3880b1dc29ad56681fefea5fe27f',	1686944431,	NULL,	1);

-- 2023-06-16 20:52:51
