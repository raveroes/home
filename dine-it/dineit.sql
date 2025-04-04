   -- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2024 at 02:26 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dineit`
--

-- --------------------------------------------------------

--
-- Table structure for table `buffets`
--

CREATE TABLE `buffets` (
  `id` int(11) NOT NULL,
  `buffets_number` varchar(10) NOT NULL,
  `type` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `availability` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buffets`
--

INSERT INTO `buffets` (`id`, `buffets_number`, `type`, `price`, `availability`) VALUES
(1, '12', 'Elite', 1000000.00, 1),
(2, '13', 'Elite', 1000000.00, 1),
(3, '101', 'Single', 500000.00, 3),
(4, '102', 'Double', 750000.00, 4),
(5, '103', 'Suite', 1500000.00, 5),
(6, '104', 'Deluxe', 1000000.00, 6);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gmail` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `gmail`, `phone`) VALUES
(1, 'Maul', 'veros@gmail.com', '0813291'),
(2, 'asdas', 'asda@gmama', 'asda');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `buffets_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `check_in` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `buffets_id`, `customer_id`, `check_in`) VALUES
(1, 1, 1, '2024-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `gmail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `gmail`, `password`) VALUES
(22, 'raafi', 'veros@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$dWtvNHJmSTdGbkt3ejl1bw$AIMDGHjZ11zk+coypm8S7wE/+jmKKoN/5erOliq+j2E'),
(23, 'raafi', 'raafi@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$ZUExT0oxTlJWZUlQcGtDLw$x2eMIG6KG30D+NVl6lOuwArnlw41pdoaUle92AQPun8'),
(24, 'wewe', 'walawe@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$VFB0Y3Z4S3lJTDBpNU5DbQ$SkgRRjoLC5xDnem5qf1JXf4Ra0e4vDylFIm+jDdRzv0'),
(25, 'raka', 'hazbui@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$R3g3U0tudTJmQ3pRczBMNw$RAJUVQsD2BSMd3rzSRZBbjI+QHo30TA1KEMM0bNOYRQ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buffets`
--
ALTER TABLE `buffets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`gmail`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `buffets_id` (`buffets_id`,`customer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buffets`
--
ALTER TABLE `buffets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
