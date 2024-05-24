-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for photo_frame
CREATE DATABASE IF NOT EXISTS `photo_frame` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `photo_frame`;

-- Dumping structure for table photo_frame.login_master
CREATE TABLE IF NOT EXISTS `login_master` (
  `login_id` int NOT NULL AUTO_INCREMENT,
  `user_email_id` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `login_password` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `user_type` varchar(10) DEFAULT NULL,
  `date_create` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table photo_frame.login_master: ~2 rows (approximately)
INSERT INTO `login_master` (`login_id`, `user_email_id`, `login_password`, `user_type`, `date_create`) VALUES
	(1, 'manojkpajeer1271@gmail.com', 'safdasdasda', 'User', '2023-02-13 05:10:40'),
	(2, 'manojkpajeer127a@gmail.com', 'aaaaaa', 'User', '2023-02-13 05:18:47'),
	(3, 'admin@gmail.com', 'admin', 'Admin', '2023-02-13 05:18:47');

-- Dumping structure for table photo_frame.order_master
CREATE TABLE IF NOT EXISTS `order_master` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `transaction_id` varchar(25) DEFAULT NULL,
  `order_status` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `order_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table photo_frame.order_master: ~0 rows (approximately)
INSERT INTO `order_master` (`order_id`, `user_id`, `transaction_id`, `order_status`, `order_date`) VALUES
	(1, 1, '167689181263F356A4CE191', 'Order Placed', '2023-02-20 11:16:52'),
	(2, 1, '167689282663F35A9A5F656', 'Order Placed', '2023-02-20 11:33:46');

-- Dumping structure for table photo_frame.order_temp
CREATE TABLE IF NOT EXISTS `order_temp` (
  `temp_id` int NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(25) DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `product_quantity` int DEFAULT NULL,
  PRIMARY KEY (`temp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table photo_frame.order_temp: ~0 rows (approximately)
INSERT INTO `order_temp` (`temp_id`, `transaction_id`, `product_id`, `product_quantity`) VALUES
	(1, '167689181263F356A4CE191', 2, 1),
	(2, '167689181263F356A4CE191', 1, 2),
	(3, '167689181263F356A4CE191', 7, 1),
	(4, '167689282663F35A9A5F656', 4, 1);

-- Dumping structure for table photo_frame.payment_master
CREATE TABLE IF NOT EXISTS `payment_master` (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `card_holder_name` varchar(50) DEFAULT NULL,
  `card_number` bigint DEFAULT NULL,
  `card_expiry_date` tinyint DEFAULT NULL,
  `card_expiry_month` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `card_expiry_year` smallint DEFAULT NULL,
  `transaction_id` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `card_cvv` smallint DEFAULT NULL,
  `date_of_payment` timestamp NULL DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table photo_frame.payment_master: ~0 rows (approximately)
INSERT INTO `payment_master` (`payment_id`, `card_holder_name`, `card_number`, `card_expiry_date`, `card_expiry_month`, `card_expiry_year`, `transaction_id`, `card_cvv`, `date_of_payment`, `payment_status`) VALUES
	(1, 'manoj', 5214521452145214, 12, 'May', 2026, '167689181263F356A4CE191', 123, '2023-02-20 11:16:52', 'Success'),
	(2, 'Suraj', 5632563215236541, 15, 'March', 2025, '167689282663F35A9A5F656', 333, '2023-02-20 11:33:46', 'Success');

-- Dumping structure for table photo_frame.product_master
CREATE TABLE IF NOT EXISTS `product_master` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `category_id` int DEFAULT NULL,
  `product_image` varchar(50) DEFAULT NULL,
  `product_image_2` varchar(50) DEFAULT NULL,
  `product_image_3` varchar(50) DEFAULT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `product_price` double DEFAULT NULL,
  `product_description` text,
  `product_status` tinyint DEFAULT NULL,
  `product_date_create` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table photo_frame.product_master: ~12 rows (approximately)
INSERT INTO `product_master` (`product_id`, `category_id`, `product_image`, `product_image_2`, `product_image_3`, `product_name`, `product_price`, `product_description`, `product_status`, `product_date_create`) VALUES
	(1, 1, '1.jpeg', NULL, NULL, 'Transperent Frame - A5 ', 350, NULL, 1, '2023-02-13 06:44:17'),
	(2, 1, '2.jpg', NULL, NULL, 'Normal Frames - A5 ', 300, NULL, 1, '2023-02-13 06:44:17'),
	(3, 1, '3.jpg', NULL, NULL, 'Drawing Frames - A5 ', 1000, NULL, 1, '2023-02-13 06:44:17'),
	(4, 1, '4.jpeg', NULL, NULL, 'Transperent Frame - A4 ', 450, NULL, 1, '2023-02-13 06:44:17'),
	(5, 2, '5.jpeg', NULL, NULL, 'Happiness Box ', 300, NULL, 1, '2023-02-13 06:44:17'),
	(6, 2, '6.jpeg', NULL, NULL, 'Asthetic Mini Hamper ', 350, NULL, 1, '2023-02-13 06:44:17'),
	(7, 2, '7.jpeg', NULL, NULL, 'Asthetic Mini Hamper - Light ', 400, NULL, 1, '2023-02-13 06:44:17'),
	(8, 2, '8.jpeg', NULL, NULL, 'Explossion Box ', 450, NULL, 1, '2023-02-13 06:44:17'),
	(9, 3, '9.jpeg', NULL, NULL, 'Pencil Carvings ', 200, NULL, 1, '2023-02-13 06:44:17'),
	(10, 3, '10.jpeg', NULL, NULL, 'Mini Polaroids - Pack of 10 ', 50, NULL, 1, '2023-02-13 06:44:17'),
	(11, 3, '11.jpeg', NULL, NULL, 'Wall Deccor ', 390, NULL, 1, '2023-02-13 06:44:17'),
	(12, 3, '12.jpeg', NULL, NULL, 'Transperent Frame - A4 ', 450, NULL, 1, '2023-02-13 06:44:17');

-- Dumping structure for table photo_frame.user_master
CREATE TABLE IF NOT EXISTS `user_master` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `user_email_id` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `user_phone_number` varchar(10) DEFAULT NULL,
  `address_line_1` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `address_line_2` varchar(250) DEFAULT NULL,
  `pin_code` varchar(10) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `user_date_create` timestamp NULL DEFAULT NULL,
  `user_status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table photo_frame.user_master: ~2 rows (approximately)
INSERT INTO `user_master` (`user_id`, `user_name`, `user_email_id`, `user_phone_number`, `address_line_1`, `address_line_2`, `pin_code`, `city`, `user_date_create`, `user_status`) VALUES
	(1, 'ddd', 'manojkpajeer1271@gmail.com', '8904653324', 'asd', 'adssada', '222222', 'ccc', '2023-02-13 05:10:40', 1),
	(2, 'manojkpaj', 'manojkpajeer127a@gmail.com', '8904653324', NULL, NULL, NULL, NULL, '2023-02-13 05:18:47', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
