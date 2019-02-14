-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2019 at 04:55 PM
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
-- Database: `cybeer`
--

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
(5, 1, '2019-02-14 11:19:48', '2019-02-14 12:42:50', 5);

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
(3, 5, NULL, NULL, NULL, NULL, 'Za?atie varenia: naplnenie nádrže 190 litrami vody | moja poznamka 2', '2019-02-14 11:19:48'),
(4, 5, '', 0, '2.00', 'kg', 'prvy slad', '2019-02-14 12:28:54'),
(5, 5, 'add', 2, '7.00', 'kg', 'Pridavame chmel', '2019-02-14 12:35:54'),
(6, 5, 'add', 2, '1.00', 'kg', 'Pridavame chmel', '2019-02-14 12:42:14'),
(7, 5, NULL, NULL, NULL, NULL, 'Ukon?enie varenia', '2019-02-14 12:42:50'),
(8, 5, 'add', 4, '4.80', 'kg', 'Pridavame chmel znovu', '2019-02-14 14:39:07'),
(9, 5, 'add', 5, '18.30', 'l', 'Psenicu davame urcite v Litroch! (\'ale\" nie :>?)', '2019-02-14 14:43:34');

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
(4, 'Jozef', 'Mihalek', '0911 111 111', 'Tatry s.r.o.', 'Dziviakova 15', 'Tolava', '20020', 1, '2018-11-15 16:51:00'),
(5, 'Jozef', 'Mihalek', '0911 111 111', 'Tatry s.r.o.', 'Dziviakova 15', 'Tolava', '20020', 1, '2018-11-15 16:52:06'),
(6, 'Jozef', 'Mihalek', '0911 111 111', 'Tatry s.r.o.', 'Dziviakova 15', 'Tolava', '20020', 1, '2018-11-15 16:52:30'),
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
(1, 1, 2, 1, '300.00', '6x50L sud', NULL, '2019-02-14 15:45:34', NULL),
(2, 1, 1, 3, '100.00', '2x50L sudy', NULL, '2019-02-14 15:53:27', NULL);

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
(1, 1, 'Slad 1', '20.00', 'kg'),
(2, 1, 'chmel 1', '20.00', 'kg'),
(3, 1, 'slad 2', '30.00', 'kg'),
(4, 1, 'chmel 2', '45.20', 'kg'),
(5, 1, 'Pšenica', '9.70', 'kg'),
(6, 1, 'Pšenica', '28.00', 'kg'),
(7, 1, 'Pšenica', '28.00', 'kg');

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
(1, 1, 4, 'deduct', '4.80', 'Varenie', 'brewing_list', 5, '2019-02-14 14:39:07'),
(2, 1, 5, 'deduct', '18.30', 'Varenie', 'brewing_list', 5, '2019-02-14 14:43:34');

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
(1, 1, 'CL', 'Budweiser', '200.00', '120.00'),
(2, 1, 'CL', 'Epa', '200.00', '80.00'),
(3, 1, 'CL', 'Apa', '200.00', '555.00'),
(4, 1, 'CL', 'Zlatý Bažant', '200.00', '48.00'),
(5, 1, 'CK', 'Stella', '200.00', '190.00'),
(6, 1, 'CK', NULL, '200.00', '0.00'),
(7, 1, 'CK', NULL, '300.00', '0.00');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brewing_log`
--
ALTER TABLE `brewing_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `export`
--
ALTER TABLE `export`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `storage_log`
--
ALTER TABLE `storage_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tanks`
--
ALTER TABLE `tanks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
