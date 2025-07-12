-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2025 at 01:58 AM
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
-- Database: `cajovna`
--

-- --------------------------------------------------------

--
-- Table structure for table `formular`
--

CREATE TABLE `formular` (
  `id` int(11) NOT NULL,
  `meno` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sprava` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formular`
--

INSERT INTO `formular` (`id`, `meno`, `email`, `sprava`, `created_at`) VALUES
(1, 'ber', 'ema.radzova@gmail.com', 'uprav', '2025-05-27 14:28:25'),
(2, 'admin', 'ema@gmail.com', 'grefsnfhc', '2025-05-27 14:46:26'),
(3, 'meow', 'ema.radzova@gmail.com', 'test', '2025-05-27 14:46:38'),
(4, 'yftdfygu', 'ema.radzova@gmail.com', 'ilujfdfdfy', '2025-06-20 13:05:36');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `created_at`) VALUES
(1, 'ema.radzova@gmail.com', '2025-05-27 14:27:59'),
(3, 'ema@gmail.com', '2025-05-27 14:36:47'),
(5, 'em@gmail.com', '2025-05-27 14:38:29'),
(6, 'test@gmail.com', '2025-05-27 14:39:01'),
(10, 'emva@gmail.com', '2025-05-30 14:12:20'),
(12, 'ema.radz@gmail.com', '2025-06-19 23:13:34'),
(13, 'eva@gmail.com', '2025-06-20 13:02:38');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `rating` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `image`, `alt`, `rating`) VALUES
(1, 'Prírode blízky čaj', 'Aliqu diam amet diam et eos. Clita erat ipsum lorem erat ipsum lorem sit sed', 12.99, 0, 'img/store-product-1.jpg', 'caj1', 4),
(2, 'Zelený čaj tulsi', 'Aliqu diam amet diam et eos. Clita erat ipsum lorem erat ipsum lorem sit sed', 19.00, 5, 'img/store-product-2.jpg', 'caj2', 5),
(3, 'Instantný čajový mix', 'Aliqu diam amet diam et eos. Clita erat ipsum lorem erat ipsum lorem sit sed', 17.00, 7, 'img/store-product-3.jpg', 'caj3', 5);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `purchased_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `product_id`, `quantity`, `price`, `purchased_at`) VALUES
(1, 3, 1, 17.00, '2025-05-27 15:06:37'),
(2, 3, 2, 34.00, '2025-05-27 15:10:06'),
(3, 3, 1, 17.00, '2025-05-27 15:13:02'),
(4, 3, 1, 17.00, '2025-05-27 15:13:45'),
(5, 3, 1, 17.00, '2025-05-27 15:15:31'),
(6, 3, 1, 17.00, '2025-05-27 15:16:29'),
(7, 3, 1, 17.00, '2025-05-30 12:47:29'),
(8, 3, 3, 51.00, '2025-05-30 14:12:38'),
(9, 3, 1, 17.00, '2025-06-18 23:28:47'),
(10, 3, 1, 17.00, '2025-06-19 23:10:17'),
(11, 3, 2, 34.00, '2025-06-19 23:14:17'),
(12, 2, 1, 19.00, '2025-06-19 23:14:17'),
(13, 3, 2, 34.00, '2025-06-20 13:03:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `formular`
--
ALTER TABLE `formular`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `formular`
--
ALTER TABLE `formular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
