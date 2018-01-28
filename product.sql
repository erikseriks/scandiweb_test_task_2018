-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 28, 2018 at 04:31 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Products`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `sku` varchar(40) COLLATE utf8mb4_latvian_ci NOT NULL,
  `name` mediumtext COLLATE utf8mb4_latvian_ci NOT NULL,
  `price` decimal(15,2) UNSIGNED NOT NULL,
  `type` int(2) UNSIGNED NOT NULL,
  `attribute` varchar(20) COLLATE utf8mb4_latvian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_latvian_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`sku`, `name`, `price`, `type`, `attribute`) VALUES
('73FG4764-34G5-4F5-4G5', 'Desk', '100.10', 3, '3000x920x640'),
('8347F8245FH845FH', 'Chair', '4.20', 3, '345x455x345'),
('8HRF824H5F8979H54F', 'Moovie', '3.50', 1, '2500'),
('KJDGH9E5GE8743IJGJF', 'Book', '9.99', 2, '5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`sku`),
  ADD UNIQUE KEY `sku` (`sku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
