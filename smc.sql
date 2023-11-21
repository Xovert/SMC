-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2023 at 10:57 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smc`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `item` varchar(150) NOT NULL,
  `buy_price` decimal(10,2) UNSIGNED NOT NULL,
  `sell_price` decimal(10,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `user_id`, `item`, `buy_price`, `sell_price`) VALUES
(1, 3, 'Matsoft', '246553.42', '266057.87'),
(2, 3, 'Sonair', '216961.55', '490313.93'),
(3, 2, 'Bitwolf', '120973.75', '333941.16'),
(4, 3, 'Hatity', '185102.04', '429040.17'),
(5, 2, 'Veribet', '189903.59', '348475.19'),
(6, 4, 'Treeflex', '216501.20', '275282.73'),
(7, 4, 'Home Ing', '152396.23', '293754.94'),
(8, 2, 'Namfix', '131204.80', '471881.33'),
(9, 1, 'Viva', '150190.90', '463670.89'),
(10, 3, 'Bigtax', '243162.98', '434110.91'),
(11, 2, 'Toughjoyfax', '236511.10', '481636.27'),
(12, 2, 'Tampflex', '183868.54', '412373.00'),
(13, 2, 'Ventosanzap', '211038.87', '265658.69'),
(14, 1, 'Flowdesk', '171602.40', '377746.51'),
(15, 3, 'Cookley', '218892.30', '293669.51'),
(16, 4, 'Biodex', '182641.80', '330348.82'),
(17, 3, 'Tresom', '192334.95', '464739.50'),
(18, 2, 'Fintone', '239439.76', '428650.18'),
(19, 3, 'Voltsillam', '132105.55', '259165.08'),
(20, 3, 'Aerified', '167297.73', '371281.65');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, '21blackbird', 'mdadson0@economist.com', '$2y$10$grpUABXNDInBS3Ojy31nfOIi/I6SPDavomSJQOwxQckspUjOjzoYW'),
(2, 'xovert', 'rfloyed1@nationalgeographic.com', '$2y$10$lIgMbio/9Ng7pW/8zWzOFu2PiCBRFV262aRqfSqj3JidHa.1wcS3y'),
(3, 'gd19', 'laspden2@squidoo.com', '$2y$10$jDmQk.qFdaScvnRWcSiHV.nmqOBRE.S7HhZ2YzYlYMOEHIIhmWNbO'),
(4, 'myosin', 'nstealy3@dion.ne.jp', '$2y$10$ijc6XbgN6wQfAhe.RPGn0O6/Yep0ZtzFQK/4wwvqHHvl2523fmVf6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_constraint_user` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `foreign_constraint_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
