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
(6,	'Bags',	''),
(7,	'Test',	'');

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
(1,	1178344245,	'System',	'Administrator',	'mohamed@gmail.com',	'c1a276b8587995e9f29e1b7fe9148169',	'1687083713download.php.jpg',	'Active now'),
(10,	1337649967,	'Mohamed Issa',	'Singano',	'singano2009@gmail.com',	'309cd3800aacbd003ac36199fa537295',	'1687083735default.jpg',	'Active now'),
(11,	439556495,	'Gerald Frank',	'Amasi',	'gfrank576@gmail.com',	'380891959a0754c24a7ad3525c2d1e77',	'1687083735default.jpg',	'Active now'),
(12,	439556498,	'James Haolden',	'James',	'james@gmail.com',	'380891959a0754c24a7ad3525c2d1e77',	'1687083735default.jpg',	'Active now'),
(13,	439556477,	'Baraka Genny',	'Vutus',	'kingbarakah021@gmail.com',	'380891959a0754c24a7ad3525c2d1e77',	'1687083735default.jpg',	'Active now');

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
(23,	'Iphone 6S',	'Digital Item',	'Iphone 6s imeokotwa',	8,	'Canteen',	'Canteen',	'2023-06-22',	'2023-06-19',	NULL,	'Mohamed Singano',	0,	NULL,	'Lost',	NULL,	0,	NULL,	'helpers/uploads/062319302420122656432.jpg'),
(24,	'Samsung Phone',	'Digital Item',	'Simu imeokotwa',	8,	'Maktaba',	'Maktaba',	'2023-06-19',	'2023-06-19',	NULL,	'Mohamed Singano',	0,	NULL,	'Found',	NULL,	0,	NULL,	'helpers/uploads/062319300220132646y32.jpg'),
(25,	'Laptop',	'Digital Item',	'Laptop yangu imepotea maeneo ya canteen',	19,	'Canteen',	'Canteen',	'2023-06-19',	'2023-06-19',	NULL,	'Baraka Baraka',	0,	NULL,	'Lost',	NULL,	0,	NULL,	'helpers/uploads/06231930112002264ter32.jpg'),
(26,	'PC Mouse',	'Identity Cards',	'A PC mouse was found around canteen, feel free to reach out to me',	19,	'Canteen',	'Canteen',	'2023-06-19',	'2023-06-19',	NULL,	'Baraka Baraka',	1,	NULL,	'Found',	8,	1,	NULL,	'helpers/uploads/0623193002201026432.jpg'),
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
(1,	1178344245,	1015663701,	'hello'),
(2,	1178344245,	1485541924,	'mama'),
(3,	439556477,	439556495,	'hello'),
(4,	439556495,	439556477,	'hi'),
(5,	439556495,	439556477,	'how are you'),
(6,	439556495,	439556477,	'im fine'),
(7,	439556477,	439556495,	'sounds good');

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
(5,	'Canteen'),
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
  `chatid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chatid` (`chatid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `middle_name`, `lastname`, `student_id`, `phone`, `role`, `resetcode`, `resettoken`, `expireat`, `verifytoken`, `verified`, `code`, `chatid`) VALUES
(8,	'admin',	'moham3d.s3c@gmail.com',	'7c4a8d09ca3762af61e59520943dc26494f8941b',	'System',	'',	'Admin',	NULL,	'0755199399',	1,	222398,	'92c56c4ad88c3880b1dc29ad56681fefea5fe27f',	1686944431,	NULL,	1,	NULL,	439556498),
(19,	'user2',	'user2@ifm.ac.tz',	'7c4a8d09ca3762af61e59520943dc26494f8941b',	'Baraka',	'Ganny',	'Vitus',	NULL,	'0755199399',	2,	222398,	'92c56c4ad88c3880b1dc29ad56681fefea5fe27f',	1686944431,	NULL,	1,	NULL,	439556477),
(36,	'mohamed',	'singano2009@gmail.com',	'292959f6c7ab4f8b0761469ac1f11fc73f43b306',	'Mohamed',	'Issa',	'Singano',	NULL,	'0693338637',	2,	NULL,	NULL,	NULL,	'e126cdb6dd4ec943de37a977451cd4cef4c8870f',	1,	'9147',	1337649967),
(37,	'gerald',	'gfrank576@gmail.com',	'446f6fe420322ac611e4621119ab11e5a51daf2f',	'Gerald',	'Frank',	'Amasi',	NULL,	'0755188384',	2,	NULL,	NULL,	NULL,	'018fe91d34bb19e757a9960d19823bc4bf866d36',	1,	'2691',	439556495);

-- 2023-06-20 05:07:53
