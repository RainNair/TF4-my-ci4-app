-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2026 at 10:54 PM
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
-- Database: `pos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `email`, `phone`, `created_at`) VALUES
(1, 'Juan Dela Cruz', 'juan.delacruz@example.com', '09171234567', '2026-09-29 04:00:52'),
(2, 'Maria Clara', 'maria.clara@example.com', '09182345678', '2026-09-29 04:00:52'),
(3, 'Jose Rizal', 'jose.rizal@example.com', '09193456789', '2026-09-29 04:00:52'),
(4, 'Andres Bonifacio', 'andres.b@example.com', '09204567890', '2026-09-29 04:00:52'),
(5, 'Apolinario Mabini', 'apolinario.m@example.com', '09215678901', '2026-09-29 04:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `password`, `avatar`, `created_at`) VALUES
(1, 'admin_juan', 'Juan Dela Cruz', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHe1f10p2S3q/x.yBqWk4v.d.M9.v8JvyK', NULL, '2026-09-29 04:00:52'),
(2, 'mgr_maria', 'Maria Clara', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHe1f10p2S3q/x.yBqWk4v.d.M9.v8JvyK', NULL, '2026-09-29 04:00:52'),
(3, 'cashier_jose', 'Jose Rizal', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHe1f10p2S3q/x.yBqWk4v.d.M9.v8JvyK', NULL, '2026-09-29 04:00:52'),
(4, 'cashier_andres', 'Andres Bonifacio', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHe1f10p2S3q/x.yBqWk4v.d.M9.v8JvyK', NULL, '2026-09-29 04:00:52'),
(5, 'sys_mabini', 'Apolinario Mabini', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHe1f10p2S3q/x.yBqWk4v.d.M9.v8JvyK', NULL, '2026-09-29 04:00:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
