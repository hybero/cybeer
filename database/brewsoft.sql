-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2019 at 11:04 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brewsoft`
--
CREATE DATABASE IF NOT EXISTS `brewsoft` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `brewsoft`;

-- --------------------------------------------------------

--
-- Table structure for table `beers`
--

CREATE TABLE `beers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brewing_lists`
--

CREATE TABLE `brewing_lists` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_end` timestamp NULL DEFAULT NULL,
  `tank_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `brewing_lists`
--

INSERT INTO `brewing_lists` (`id`, `user_id`, `date_start`, `date_end`, `tank_id`) VALUES
(7, 1, '2019-02-16 10:10:45', '2019-02-16 10:19:13', 8),
(8, 1, '2019-02-16 10:20:03', '2019-02-16 10:20:49', 9),
(9, 1, '2019-02-16 14:47:43', NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `brewing_log`
--

CREATE TABLE `brewing_log` (
  `id` int(11) NOT NULL,
  `brewing_list_id` int(11) NOT NULL,
  `action` enum('add','deduct') COLLATE latin1_general_ci DEFAULT NULL,
  `storage_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `units` enum('kg','l','ks') COLLATE latin1_general_ci DEFAULT NULL,
  `description` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `brewing_log`
--

INSERT INTO `brewing_log` (`id`, `brewing_list_id`, `action`, `storage_id`, `amount`, `units`, `description`, `created`) VALUES
(11, 7, NULL, NULL, NULL, NULL, 'Za?atie varenia: naplnenie nádrže 180 litrami vody | ', '2019-02-16 10:10:45'),
(12, 7, 'add', 8, '2.00', 'kg', 'Pridavam psenicu', '2019-02-16 10:18:11'),
(13, 7, 'add', 9, '2.00', 'kg', 'Teraz ide slad', '2019-02-16 10:18:30'),
(14, 7, NULL, NULL, NULL, NULL, 'Ukon?enie varenia', '2019-02-16 10:19:13'),
(15, 8, NULL, NULL, NULL, NULL, 'Za?atie varenia: naplnenie nádrže 190 litrami vody | ideme skusit apu', '2019-02-16 10:20:03'),
(16, 8, 'add', 9, '8.00', 'kg', 'Najprv slad', '2019-02-16 10:20:21'),
(17, 8, 'add', 8, '18.00', 'kg', 'Teraz by mala ist psenica', '2019-02-16 10:20:42'),
(18, 8, NULL, NULL, NULL, NULL, 'Ukon?enie varenia', '2019-02-16 10:20:49'),
(19, 9, NULL, NULL, NULL, NULL, 'Za?atie varenia: naplnenie nádrže 150 litrami vody | ', '2019-02-16 14:47:44'),
(20, 9, 'add', 8, '4.80', '', '', '2019-02-16 14:47:55');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `surname` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `phone` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `company` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `address` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `town` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `postcode` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `surname`, `phone`, `company`, `address`, `town`, `postcode`, `user_id`, `created`) VALUES
(1, 'Pavol', 'Havlik', '0950595773', 'Pivovar pod Topolom', 'Jarabikova 21/65', 'Podhajky', '555555', 1, '2018-11-14 17:41:36'),
(2, 'Milan', 'Zahorsky', '0949 999 999', 'Hriskov', 'Lumena 2/37', 'Strmohrad', '62626', 1, '2018-11-14 17:42:52'),
(3, 'Jozef', 'Mihalek', '0911 111 111', 'Tatry s.r.o.', 'Dziviakova 15', 'Tolava', '20020', 1, '2018-11-15 16:50:29'),
(5, 'Jozef', 'Mihalek', '0911 111 111', 'Tatry s.r.o.', 'Dziviakova 15', 'Tolava', '20020', 1, '2018-11-15 16:52:06'),
(7, 'Jozef', 'Mihalek', '0911 111 111', 'Tatry s.r.o.', 'Dziviakova 15', 'Tolava', '20020', 1, '2018-11-15 16:53:11'),
(8, 'mariaca', 'hacaca', '000 55 88 9999', 'mno.jhj', 'mala', 'jakuza', '55555', 1, '2018-12-17 18:40:38');

-- --------------------------------------------------------

--
-- Table structure for table `export`
--

CREATE TABLE `export` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `tank_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `packaging` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `packaging_returned` timestamp NULL DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `export`
--

INSERT INTO `export` (`id`, `user_id`, `client_id`, `tank_id`, `amount`, `packaging`, `packaging_returned`, `created`, `updated`) VALUES
(7, 1, 1, 8, '100.00', '2x50L', NULL, '2019-02-16 10:19:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `units` enum('kg','l','ks') COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `storage`
--

INSERT INTO `storage` (`id`, `user_id`, `name`, `amount`, `units`) VALUES
(9, 1, 'Slad', '40.00', 'kg');

-- --------------------------------------------------------

--
-- Table structure for table `storage_log`
--

CREATE TABLE `storage_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `storage_id` int(11) NOT NULL,
  `action` enum('add','deduct') COLLATE latin1_general_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `source` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `source_type` enum('brewing_list') COLLATE latin1_general_ci DEFAULT NULL,
  `source_id` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `storage_log`
--

INSERT INTO `storage_log` (`id`, `user_id`, `storage_id`, `action`, `amount`, `source`, `source_type`, `source_id`, `created`) VALUES
(3, 1, 8, 'deduct', '2.00', 'Varenie', 'brewing_list', 7, '2019-02-16 10:18:11'),
(4, 1, 9, 'deduct', '2.00', 'Varenie', 'brewing_list', 7, '2019-02-16 10:18:30'),
(5, 1, 9, 'deduct', '8.00', 'Varenie', 'brewing_list', 8, '2019-02-16 10:20:21'),
(6, 1, 8, 'deduct', '18.00', 'Varenie', 'brewing_list', 8, '2019-02-16 10:20:42'),
(7, 1, 8, 'deduct', '4.80', 'Varenie', 'brewing_list', 9, '2019-02-16 14:47:55');

-- --------------------------------------------------------

--
-- Table structure for table `tanks`
--

CREATE TABLE `tanks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` enum('CL','CK') COLLATE latin1_general_ci NOT NULL,
  `name` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `capacity` decimal(10,2) NOT NULL,
  `status` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tanks`
--

INSERT INTO `tanks` (`id`, `user_id`, `type`, `name`, `capacity`, `status`) VALUES
(9, 1, 'CL', 'Apa', '200.00', '190.00'),
(10, 1, 'CK', 'Epa 14', '500.00', '150.00');

-- --------------------------------------------------------

--
-- Table structure for table `tanks_log`
--

CREATE TABLE `tanks_log` (
  `id` int(11) NOT NULL,
  `tank_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text COLLATE latin1_general_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beers`
--
ALTER TABLE `beers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brewing_lists`
--
ALTER TABLE `brewing_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brewing_log`
--
ALTER TABLE `brewing_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `export`
--
ALTER TABLE `export`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storage_log`
--
ALTER TABLE `storage_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tanks`
--
ALTER TABLE `tanks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `tanks_log`
--
ALTER TABLE `tanks_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beers`
--
ALTER TABLE `beers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brewing_lists`
--
ALTER TABLE `brewing_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `brewing_log`
--
ALTER TABLE `brewing_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `export`
--
ALTER TABLE `export`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `storage_log`
--
ALTER TABLE `storage_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tanks`
--
ALTER TABLE `tanks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


CREATE USER 'brewsoft'@'%' IDENTIFIED VIA mysql_native_password USING '***';GRANT ALL PRIVILEGES ON *.* TO 'brewsoft'@'%' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;GRANT ALL PRIVILEGES ON `brewsoft`.* TO 'brewsoft'@'%';
