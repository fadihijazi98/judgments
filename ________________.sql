-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2020 at 09:12 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `الموكلون`
--

-- --------------------------------------------------------

--
-- Table structure for table `الموكلون`
--

CREATE TABLE `الموكلون` (
  `id` int(11) NOT NULL,
  `اسم الوكيل` varchar(50) NOT NULL,
  `رقم الهوية` varchar(50) NOT NULL,
  `رقم الهاتف` varchar(50) NOT NULL,
  `العنوان` varchar(50) NOT NULL,
  `التفاصيل` text NOT NULL,
  `المدعى عليه` varchar(50) NOT NULL,
  `الوكيل` varchar(50) NOT NULL,
  `الاتعاب` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `الموكلون`
--
ALTER TABLE `الموكلون`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `الموكلون`
--
ALTER TABLE `الموكلون`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
