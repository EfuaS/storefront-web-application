-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 14, 2020 at 04:10 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `storefrontdb`
--
CREATE DATABASE `storefrontd`;
USE `storefrontd`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('kwekuosebo@storefront.com', '789456'),
('yolo@storefront.com', '147852');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--


-- --------------------------------------------------------

--


-- --------------------------------------------------------

--
-- Table structure for table `saleinfo`
--
-- Error reading structure for table storefrontdb.saleinfo: #1932 - Table 'storefrontdb.saleinfo' doesn't exist in engine

-- --------------------------------------------------------

--
-- Table structure for table `saletable`
--

CREATE TABLE `saletable` (
  `sales_id` int(11) NOT NULL,
  `products` text NOT NULL,
  `total_price` double NOT NULL,
  `cash_in` double NOT NULL,
  `balance` int(30) UNSIGNED DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saletable`
--

INSERT INTO `saletable` (`sales_id`, `products`, `total_price`, `cash_in`, `balance`, `date_time`, `user_id`) VALUES
(1, 'none', 1, 1, NULL, '2020-12-09 16:10:54', 1),
(2, 'laliga', 20, 23, NULL, '2020-12-09 16:40:41', 1),
(3, 'laliga', 20, 23, NULL, '2020-12-09 16:43:35', 1),
(4, 'laliga', 20, 23, NULL, '2020-12-09 16:43:39', 1),
(5, 'laliga', 1.2, 1.5, NULL, '2020-12-09 16:44:13', 1),
(6, 'laliga', 1.2, 1.5, NULL, '2020-12-09 16:45:05', 1),
(7, 'laga', 20, 40, NULL, '2020-12-09 16:45:19', 1),
(8, 'laga', 20, 40, NULL, '2020-12-09 17:08:58', 1),
(9, 'heo', 12, 1, NULL, '2020-12-09 17:09:57', 1),
(10, 'heo', 12, 1, NULL, '2020-12-09 17:10:37', 1),
(11, 'heo', 12, 1, NULL, '2020-12-09 17:10:50', 1),
(12, 'new', 1, 2, NULL, '2020-12-10 13:35:55', 1),
(13, 'new', 1, 2, NULL, '2020-12-10 13:36:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userss`
--
-- Error reading structure for table storefrontdb.userss: #1932 - Table 'storefrontdb.userss' doesn't exist in engine

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(225) NOT NULL,
  `telephone` tinyint(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `tax_number` int(30) NOT NULL,
  `registration_number` int(30) NOT NULL,
  `digital_address` varchar(30) NOT NULL,
  `password_first` varchar(255) NOT NULL,
  `password_conf` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`user_id`, `full_name`, `telephone`, `email`, `business_name`, `tax_number`, `registration_number`, `digital_address`, `password_first`, `password_conf`) VALUES
(1, 'Lawrencia Cobbina', 127, 'n@ashesi.edu.gh', 'lolly', 174963, 321654, 'GT-01-125-02', '1234', '1234'),
(2, 'Afua ', 127, 'lawrencia.cobbina@ashesi.edu.gh', 'happy', 7894561, 3216548, 'gt-01-025-32', '1230', '1230'),
(4, 'Afua ', 127, 'afua.ayiku@ashesi.edu.gh', 'Mine', 111111, 111111, 'gt-01-025-32', '', ''),
(6, 'The Pied Pipers', 127, 'trhiana@rocketmail.com', 'New Store', 654321, 1234569, 'GT-01-125-02', '$argon2id$v=19$m=65536,t=4,p=1$a29vc2RicjY5MVY3cnMydg$falVncEQ/z7sIAuA6XSFVtuipCi+3FlvqvpjmcX5IQI', ''),
(7, 'AFUA Ayiku', 127, 'fuseinial@gmail.com', 'Homies', 7894561, 321654, 'GT-01-125-02', '$argon2id$v=19$m=65536,t=4,p=1$UVdWck1oTzg4N01reEYzcg$KPgWx0Fi2lW9K2JayjsnTnWFEsf3S6brizD0pVlw8is', ''),
(8, 'Sign up', 127, 'lawrenciacobbina3@gmail.com', 'Molly', 7894561, 3216548, 'GT-01-125-02', '$argon2id$v=19$m=65536,t=4,p=1$SnNJWVh0TUx1YUhtL2R1Tg$iAD5OPmxxcA6g6BnMQ3t6tk1xAc+p5pflXX5xElxG2I', ''),
(9, 'Lawrencia ', 127, 'lol@gmail.com', 'happy', 174963, 1234569, 'GT-01-125-02', '$argon2id$v=19$m=65536,t=4,p=1$eDVZMzJTMDZmdkpmVEFyNA$tznWcfZowce+XU+LFZdR2Js6BMDxad5LQU+L9JrbbF0', ''),
(10, 'The Pied Pipers', 127, 'l@gmail.com', 'Molly', 174963, 3216548, 'GT-01-125-02', '$argon2id$v=19$m=65536,t=4,p=1$Ly5xaXpHYWlQZ0xyZllPcA$tOEuwtUpLiDcUF0mNSgnrwUzz+5SCViJyGs8NTfj3KM', ''),
(11, 'Afua ', 127, 'afua@gmail.com', 'My Store', 14987234, 78924136, 'gt-01-025-32', '$argon2id$v=19$m=65536,t=4,p=1$QjVTVld6WS55aDBvYzZwSQ$tN7Wpddo4pb28Hpq5vf314DhWBk4etoHLW7L1sJftaY', ''),
(12, 'edit user', 127, 'new@gmail.com', 'Newer Store', 14987234, 78924136, 'gt-01-025-32', '$argon2id$v=19$m=65536,t=4,p=1$RDhoS3JweDE4WWkzekxOZQ$BNNl6NI3HdAgLQNTz7PnKWmuAbHdf9i3yxdFcUU3un0', ''),
(13, 'John Ayomah', 127, 'john@gmail.com', 'John Store', 7894561, 78924136, 'gt-01-025-32', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saletable`
--
ALTER TABLE `saletable`
  ADD PRIMARY KEY (`sales_id`),
  ADD KEY `saletable_ibfk_1` (`user_id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--

--
-- AUTO_INCREMENT for table `saletable`
--
ALTER TABLE `saletable`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `saletable`
--
ALTER TABLE `saletable`
  ADD CONSTRAINT `saletable_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usertable` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
