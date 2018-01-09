-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 09, 2018 at 01:04 PM
-- Server version: 5.5.57-MariaDB-1ubuntu0.14.04.1
-- PHP Version: 7.0.23-1+ubuntu14.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tokobaju_db2`
--
CREATE DATABASE IF NOT EXISTS `tokobaju_db2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tokobaju_db2`;

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `moveCartToTransactionDetail`(IN `trans_id` INT, IN `cart_ids` INT)
    NO SQL
BEGIN
INSERT INTO transaction_detail (
    `size`,
    `color`,
    `quantity`,
    `transaction_id`,
    `product_id`
) SELECT
	`size`,
    `color`,
    `quantity`,
     trans_id,
    `product_id`
FROM cart WHERE FIND_IN_SET(cart.id, cart_ids);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `email` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('admin123@gmail.com', '$2y$10$dbilZrBcXPuJC5xrWS3/Hu5zG046bfecwU9y52ygIEES5UPb7VA9q');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `size` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `costumer_email` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_costumer_email_index` (`costumer_email`),
  KEY `cart_product_id_index` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `size`, `color`, `quantity`, `costumer_email`, `product_id`) VALUES
(7, '2', '2', 1, 'test@gmail.com', 29);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `email` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`email`, `password`, `name`, `address`, `photo`) VALUES
('abc@gmail.com', '$2y$10$bA93RbGSDr674VM09Pqv8e8aXp3OnYndxkmYVEAjWkOo8Rv0YrYF2', 'abc', 'ABC', '/img/avatar.png'),
('fake_costumer@gmail.com', '$2y$10$HHMnQN7DjFEE6sjPXUaO2.Upmmc1MkpXZMFdMpOcDE.Rx78Km5Hd.', 'Fake Customer', 'Jl Fake Address No.99', '/img/avatar.png'),
('test@gmail.com', '$2y$10$gTmzP2Wisz3uZhQkwNChiuZVBCjdZi6wfDK.SQjuG81sxtydePdBK', 'Test 123', 'Jl Mekar Indah No.11', '/img/avatar.png');

-- --------------------------------------------------------

--
-- Table structure for table `customer_shipping_addresses`
--

CREATE TABLE IF NOT EXISTS `customer_shipping_addresses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `costumer_email` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kotamadya` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_name` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_phone_number` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `costumer_shipping_addresses_costumer_email_index` (`costumer_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `customer_shipping_addresses`
--

INSERT INTO `customer_shipping_addresses` (`id`, `costumer_email`, `address`, `kecamatan`, `kotamadya`, `provinsi`, `postal_code`, `receiver_name`, `receiver_phone_number`) VALUES
(1, 'test@gmail.com', 'Jl Mekar Indah No.11', 'Rancasari', 'Bandung', 'Jawa Barat', '40125', 'Jajang Nurjaman', '08128195'),
(2, 'test@gmail.com', '1', '1', '1', '1', '1', '1', '1'),
(3, 'test@gmail.com', '2', '2', '2', '2', '2', '2', '2'),
(4, 'test@gmail.com', '3', '3', '3', '3', '3', '3', '3'),
(5, 'test@gmail.com', '4', '4', '4', '4', '4', '4', '4'),
(6, 'test@gmail.com', '5', '5', '5', '5', '5', '5', '5'),
(7, 'test@gmail.com', '6', '6', '6', '6', '6', '6', '6'),
(8, 'test@gmail.com', 'Jl Test 123 No.125', 'Rancasari', 'Bandung', 'Jawa Barat', '195710', 'Endang Sukasih', '081561531');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_12_19_035215_create_costumer_table', 1),
(4, '2017_12_19_035450_create_product_table', 1),
(5, '2017_12_19_040329_create_product_images_table', 1),
(6, '2017_12_19_040520_create_product_category_table', 1),
(7, '2017_12_19_040637_create_product_sizes_table', 1),
(8, '2017_12_19_040806_create_product_colors_table', 1),
(9, '2017_12_19_041053_create_transaction_table', 1),
(10, '2017_12_19_041352_create_transaction_detail_table', 1),
(11, '2017_12_19_041844_create_cart_table', 1),
(12, '2017_12_19_042323_create_costumer_shipping_addresses_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` mediumint(9) NOT NULL,
  `discount_in_percent` float NOT NULL,
  `description` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` smallint(6) NOT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `thumbnail_image_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_category_id_index` (`category_id`),
  KEY `thumbnail_image_id` (`thumbnail_image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=40 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `discount_in_percent`, `description`, `stock`, `category_id`, `created_at`, `updated_at`, `thumbnail_image_id`) VALUES
(29, 'O0KVhmuP3e', 150000, 10, 'This is brief description of product', 50, NULL, '2017-12-28 22:21:42', '0000-00-00 00:00:00', 1),
(30, '70TZ7wspjZ', 200000, 20, 'This is brief description of product', 50, NULL, '2018-01-01 13:37:37', '0000-00-00 00:00:00', 2),
(31, 'qvzn8QMEYp', 300000, 10, 'This is brief description of product', 50, NULL, '2018-01-01 13:37:40', '0000-00-00 00:00:00', 1),
(32, 'LJuxFk9Vx2', 400000, 20, 'This is brief description of product', 50, NULL, '2018-01-01 13:37:42', '0000-00-00 00:00:00', 2),
(33, 'e5CwkVZX2o', 500000, 10, 'This is brief description of product', 50, NULL, '2018-01-01 13:37:44', '0000-00-00 00:00:00', 1),
(34, 'yDXNwWt22f', 600000, 30, 'This is brief description of product', 50, NULL, '2018-01-01 13:37:46', '0000-00-00 00:00:00', 2),
(35, 'JnjZJuS4PR', 700000, 10, 'This is brief description of product', 50, NULL, '2018-01-01 13:37:47', '0000-00-00 00:00:00', 1),
(36, 'Celana Chino', 120000, 10, 'Celana Chino pantas untuk kerja, maupun menghandiri acara formal.<br>', 40, 1, '2018-01-01 15:26:13', '2018-01-01 15:25:09', 3),
(37, 'Celana Training', 50000, 5, 'Pantas bagi anda yang suka olahraga dan menginginkan kenyamanan.<br>', 10, 2, '2018-01-01 15:28:13', '2018-01-01 15:27:39', 5),
(38, 'atag2', 110000, 10, 'ihgauijhg a9hqou hg9qhgoq<br>', 25, 1, '2018-01-01 15:50:28', '2018-01-01 15:50:11', 6),
(39, 'test1234', 100000, 0, 'Memberikan kesan menarik ketika dipakai<br>', 8, 1, '2018-01-09 04:45:46', '2018-01-08 21:45:46', 9);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_category` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_category_parent_category_index` (`parent_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `name`, `parent_category`) VALUES
(1, 'pria', NULL),
(2, 'atasan', 1),
(3, 'celana', 1),
(4, 'jaket', 2),
(5, 'kaos', 2),
(6, 'jas', 2),
(7, 'casual', 2),
(8, 'jeans', 3),
(9, 'chino', 3);

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE IF NOT EXISTS `product_colors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_colors_product_id_index` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `color`, `product_id`) VALUES
(1, 'red', 29),
(2, 'blue', 29),
(3, 'grey', 36),
(4, 'brown', 36),
(5, 'grey', 37),
(6, 'black', 37),
(7, 'green', 37),
(8, 'red', 38),
(9, 'white', 38),
(10, 'red', 39);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE IF NOT EXISTS `product_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_index` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `product_id`) VALUES
(1, 'img/banner1.jpg', 29),
(2, 'img/banner2.jpg', 29),
(3, 'img/posting/foto/15148203401514798560pictlrpost15067000522721827595_270223940157178_4134483789990592512_n.jpg', 36),
(4, 'img/posting/foto/15148204771514790974mbuntu9.jpg', 37),
(5, 'img/posting/foto/15148204771514790805mbuntu2.png', 37),
(6, 'img/posting/foto/15148218161514806098pictlrpost150220991818gintama_chibi_by_kenndrawd95zdpm.jpg', 38),
(7, 'img/posting/foto/1515469576mbuntu2.png', 39),
(8, 'img/posting/foto/15154695761514816746tkpost150436948018rest22.png', 39),
(9, 'img/posting/foto/151546957615148204771514790974mbuntu9.jpg', 39);

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE IF NOT EXISTS `product_sizes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `size` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_sizes_product_id_index` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `size`, `product_id`) VALUES
(1, 'M', 29),
(2, 'L', 29),
(3, 'M', 36),
(4, 'XL', 36),
(5, 'M', 37),
(6, 'L', 37),
(7, 'S', 38),
(8, 'M', 38),
(9, 'L', 38),
(10, 'S', 39),
(11, 'M', 39);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` enum('waiting_approval','rejected','approved','waiting_payment','product_has_sent','done','payment_verified','payment_proof_rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'waiting_approval',
  `courier` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_has_verified_at` datetime DEFAULT NULL,
  `proof_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `costumer_email` varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `costumer_shipping_address_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transaction_costumer_email_index` (`costumer_email`),
  KEY `destination_shipping_address` (`costumer_shipping_address_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `status`, `courier`, `payment_has_verified_at`, `proof_photo`, `created_at`, `costumer_email`, `costumer_shipping_address_id`) VALUES
(14, 'product_has_sent', 'JNE', NULL, 'img/proof_photo_customer/11154.png', '2018-01-08 15:28:22', 'test@gmail.com', 1),
(15, 'payment_proof_rejected', 'JNE', NULL, 'img/proof_photo_customer/65231.png', '2018-01-09 05:05:13', 'test@gmail.com', 1),
(16, 'waiting_approval', 'JNE', NULL, NULL, '2018-01-08 15:48:07', 'test@gmail.com', 1),
(17, 'done', 'JNE', NULL, NULL, '2018-01-09 05:16:07', 'test@gmail.com', 1),
(18, 'done', 'JNE', NULL, 'img/proof_photo_customer/65823.jpg', '2018-01-09 02:39:42', 'test@gmail.com', 1),
(19, 'done', 'JNE', NULL, 'img/proof_photo_customer/27254.jpg', '2018-01-09 05:02:28', 'test@gmail.com', 8);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_detail`
--

CREATE TABLE IF NOT EXISTS `transaction_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `size` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `transaction_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `transaction_detail_transaction_id_index` (`transaction_id`),
  KEY `transaction_detail_product_id_index` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `transaction_detail`
--

INSERT INTO `transaction_detail` (`id`, `size`, `color`, `quantity`, `transaction_id`, `product_id`) VALUES
(7, '2', '1', 1, 14, 29),
(8, '2', '1', 1, 15, 29),
(9, '4', '3', 3, 16, 36),
(10, '9', '8', 1, 17, 38),
(11, '1', '2', 6, 18, 29),
(12, '11', '10', 2, 19, 39);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`costumer_email`) REFERENCES `customer` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_shipping_addresses`
--
ALTER TABLE `customer_shipping_addresses`
  ADD CONSTRAINT `customer_shipping_addresses_ibfk_1` FOREIGN KEY (`costumer_email`) REFERENCES `customer` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `product_category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_colors_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD CONSTRAINT `product_sizes_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`costumer_email`) REFERENCES `customer` (`email`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD CONSTRAINT `transaction_detail_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
