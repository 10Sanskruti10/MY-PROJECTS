-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2025 at 08:34 AM
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
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'Sanskruti', '$2y$10$GKiq6JqyM1CawWvUY81vYu0t8A6kksOMEs41/BWwlI.5RvWEYF9Tm'),
(2, 'Sanskruti', '$2y$10$Xexd1KlPy90gJkl9Br5KyOqyE657nslxjMN7oJ7mBB7VlF6jsJPDq'),
(3, 'Sanskruti', '$2y$10$yNUVyMRbecNk7idSaF/6ZummiOIrydLF3OqVsZYD9qSOb/iP.AI4S'),
(4, 'Sanskruti', '$2y$10$o19bQaqGQPNzWQdUsh2QUuIGtixT.3MRq5oRRD5LmfJn9JA6jkiF.'),
(5, 'Sanskruti', '$2y$10$YD5UEpLtII7K3u0FMmv8Ieqh4kFZKMkXiT5fGsHra1TqJw9.faPg2'),
(6, 'Sanskruti', '$2y$10$JOgEWsG6Ht6vLGHI7Ml6Qu8d1NN7jWuvxxEeHnLRwlIxe9.418ope'),
(7, 'Sanskruti', '$2y$10$7slf0dyv4LS5JMY9Qepd0uXdRXn0pogYsufOYxoxhWmcblR7zYMUW'),
(8, 'Sanskruti', '$2y$10$dmoa0JgIpN5pxOBllBD40uBDpAvhcHjvaKHaHUNvmNmPUrjkmndFq'),
(9, 'Sanskruti', '$2y$10$e2Uy0Aa9UHIjQqSaJVvNjeqv5kq4Ez9STg9MbbMGEDXkHGEvUlZ/S'),
(10, 'Sanskruti', '$2y$10$fya3ljepbPr9n1O7YsvS/O44xRFPBoAts3.jkw.kHjjrkTy89Lm8S'),
(11, 'Sanskruti', '$2y$10$gOJhZmddC7lZDWasm7RcD.mnqszYlpmb90qWHvclpxiZDAbVBWsfC');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `password`) VALUES
(11, 'marry', 'marry@gmail.com', '24223424', '123'),
(12, 'rakesh', 'rakesh@gmail.com', '2', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
