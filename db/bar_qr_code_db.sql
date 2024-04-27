-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2022 at 06:51 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bar_qr_code_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(30) NOT NULL,
  `barcode` text NOT NULL,
  `code_type` varchar(100) NOT NULL,
  `qrcode` text NOT NULL,
  `text` text NOT NULL,
  `copies` int(30) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `barcode`, `code_type`, `qrcode`, `text`, `copies`, `date_created`) VALUES
(1, '123456711', 'C128', 'https://sourcecodester.com?search=PHP Projects', 'Sample Code', 3, '2022-01-07 11:01:50'),
(2, '23061415', 'C128', 'https://sourcecodester.com?search=PHP Project Idea', 'Code 101', 3, '2022-01-07 11:01:50'),
(3, '123456711', 'C128', 'https://sourcecodester.com?search=PHP Projects', 'Sample Code', 3, '2022-01-07 11:08:25'),
(4, '2306141507', 'C128', 'https://sourcecodester.com?search=PHP Project Idea', 'Code 101', 3, '2022-01-07 11:08:25'),
(5, '111222333445566', 'C128A', 'https://sourcecodester.com?search=Python', 'Sample Only', 1, '2022-01-07 11:59:43'),
(6, '12345678', 'EAN8', '12345678', 'Sample 101', 1, '2022-01-07 13:12:44'),
(7, '87654321', 'EAN8', '87654321', 'Sample 102', 1, '2022-01-07 13:12:44'),
(8, '45612378', 'C39', 'https://sourcecodester.com?search=Python', 'Sample 103', 1, '2022-01-07 13:12:44'),
(10, '87654321', 'C39E', '87654321', 'Sample 102', 1, '2022-01-07 13:13:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
