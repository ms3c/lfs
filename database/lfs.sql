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

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `chatusers`;
CREATE TABLE `chatusers` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `chatusers` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`) VALUES
(1,	1178344245,	'Mohamed',	'Issa',	'mohamed@gmail.com',	'c1a276b8587995e9f29e1b7fe9148169',	'1687083713download.php.jpg',	'Active now'),
(2,	1015663701,	'Mohamed',	'Singano',	'singano2009@gmail.com',	'c1a276b8587995e9f29e1b7fe9148169',	'1687083735default.jpg',	'Offline now'),
(3,	1015663702,	'Mohamed',	'Singano',	'singano2009@gmail.com',	'c1a276b8587995e9f29e1b7fe9148169',	'1687083735default.jpg',	'Offline now'),
(4,	2323,	'James',	'Holden',	'James',	'james12',	'1687083735default.jpg',	'Active Now');

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
  `claimed` tinyint(1) DEFAULT 0,
  `foundby` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `claimed_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `claimed_date` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `postedby` (`postedby`),
  KEY `claimed_by` (`claimed_by`),
  KEY `foundby` (`foundby`),
  CONSTRAINT `items_ibfk_1` FOREIGN KEY (`postedby`) REFERENCES `users` (`id`),
  CONSTRAINT `items_ibfk_2` FOREIGN KEY (`claimed_by`) REFERENCES `users` (`id`),
  CONSTRAINT `items_ibfk_3` FOREIGN KEY (`foundby`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `items` (`item_id`, `item_name`, `category`, `description`, `postedby`, `location_found`, `location_lost`, `date_found`, `date_lost`, `owner_name`, `owner_contact`, `claimed`, `foundby`, `type`, `claimed_by`, `status`, `claimed_date`, `image`) VALUES
(23,	'Iphone 6S',	'Digital Item',	'Iphone 6s imeokotwa',	8,	'Canteen',	'Canteen',	'2023-06-19',	'2023-06-19',	NULL,	'Mohamed Singano',	0,	NULL,	'Lost',	NULL,	0,	NULL,	'helpers/uploads/062319302420122656432.jpg'),
(24,	'Samsung Phone',	'Digital Item',	'Simu imeokotwa',	8,	'Maktaba',	'Maktaba',	'2023-06-19',	'2023-06-19',	NULL,	'Mohamed Singano',	0,	NULL,	'Found',	NULL,	0,	NULL,	'helpers/uploads/062319300220132646y32.jpg'),
(25,	'Laptop',	'Digital Item',	'Laptop yangu imepotea maeneo ya canteen',	19,	'Canteen',	'Canteen',	'2023-06-19',	'2023-06-19',	NULL,	'Baraka Baraka',	0,	NULL,	'Lost',	NULL,	0,	NULL,	'helpers/uploads/06231930112002264ter32.jpg'),
(26,	'PC Mouse',	'Identity Cards',	'A PC mouse was found around canteen, feel free to reach out to me',	19,	'Canteen',	'Canteen',	'2023-06-19',	'2023-06-19',	NULL,	'Baraka Baraka',	0,	NULL,	'Found',	NULL,	0,	NULL,	'helpers/uploads/0623193002201026432.jpg'),
(27,	'Sony Camera',	'Digital Item',	'Camera imeokotwa meneo ya canteen',	8,	'Canteen',	'Canteen',	'2023-06-19',	'2023-06-19',	NULL,	'Mohamed Singano',	0,	NULL,	'Found',	NULL,	0,	NULL,	'helpers/uploads/06231930312017cam.jpg');

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


DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(1,	1178344245,	1015663701,	'hello');

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
  `code` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `middle_name`, `lastname`, `student_id`, `phone`, `role`, `resetcode`, `resettoken`, `expireat`, `verifytoken`, `verified`, `code`) VALUES
(1,	'admin',	'singano2009@gmail.com',	'7c4a8d09ca3762af61e59520943dc26494f8941b',	'System',	' ',	'Administrator',	'',	'+255693338637',	1,	907226,	'5644f1a1ecfc5234b06baf2f55bdd85f06e896da',	1686945413,	NULL,	1,	NULL),
(8,	'user',	'mohamed@ifm.ac.tz',	'7c4a8d09ca3762af61e59520943dc26494f8941b',	'Mohamed',	'Singano',	'Issa',	NULL,	'0755199399',	2,	222398,	'92c56c4ad88c3880b1dc29ad56681fefea5fe27f',	1686944431,	NULL,	1,	NULL),
(19,	'user2',	'user2@ifm.ac.tz',	'7c4a8d09ca3762af61e59520943dc26494f8941b',	'Baraka',	'Gan',	'Baraka',	NULL,	'0755199399',	2,	222398,	'92c56c4ad88c3880b1dc29ad56681fefea5fe27f',	1686944431,	NULL,	1,	NULL),
(20,	'admin2',	'mohamed@pulsans.com',	'315f166c5aca63a157f7d41007675cb44a948b33',	'Mohamed',	'ISSA',	'Singano',	NULL,	'+255693338637',	2,	NULL,	NULL,	NULL,	'393a1bec7f37d9b2da3bed9fc8d5e042fa734fb0',	1,	NULL),
(28,	'Ahmed',	'singano2009@pulsans.com',	'7c4a8d09ca3762af61e59520943dc26494f8941b',	'Ahmed',	'',	'Ally',	NULL,	'0656542197',	2,	NULL,	NULL,	NULL,	'f531834a66ef373d06b63858f16c6437664b60e1',	1,	'5555'),
(29,	'baraka',	'kingbarakah021@gmail.com',	'0948e6cdb435e7af781f810b445c760a0c4b67ff',	'Barka',	'Vitus',	'Genny',	NULL,	'0719295365',	2,	NULL,	NULL,	NULL,	'0978bec6913c48a572b81478277b2e698623da5f',	1,	'3946');

-- 2023-06-19 10:19:13
