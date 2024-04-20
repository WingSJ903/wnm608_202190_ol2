-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 07, 2024 at 05:14 PM
-- Server version: 10.6.17-MariaDB-cll-lve
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alexcha1_AAU_WMN608_Products`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `category` varchar(32) NOT NULL,
  `date_create` datetime NOT NULL,
  `date_modify` datetime NOT NULL,
  `description` text NOT NULL,
  `thumbnail` varchar(128) NOT NULL,
  `images` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category`, `date_create`, `date_modify`, `description`, `thumbnail`, `images`) VALUES
(1, 'Chair', 399, 'product', '2024-04-07 12:40:28', '2024-04-07 12:40:28', 'Chair is our main product', 'image/product_chair_thumb.jpg', 'product_chair_thumb_1.jpg,product_chair_thumb_2.jpg,product_chair_thumb_3.jpg'),
(2, 'Table', 600, 'Furniture', '2024-04-07 12:44:19', '2024-04-07 12:44:19', 'Table is great', 'Table_thumb.jpg', 'Table_thumb_1.jpg,Table_thumb_2.jpg'),
(3, 'Bar table', 499, 'bar table', '2024-04-07 12:57:11', '2024-04-07 12:57:11', 'Ballo bar table', 'Bartable.jpg', 'Bartable1.jpg,Bartable2.jpg'),
(5, 'Bench', 299, 'Bench', '2024-04-07 12:58:50', '2024-04-07 12:58:50', 'Wood bench', 'Wood_bench.jpg', 'Wood_bench_1.jpg,Wood_bench_2.jpg'),
(6, 'Coffee table', 249, 'Coffee table', '2024-04-07 13:00:04', '2024-04-07 13:00:04', 'Coffee table', 'Coffee_table.jpg', 'Coffee_table_1.jpg,Coffee_table_2.jpg'),
(7, 'Area rug', 599, 'Rug', '2024-04-07 13:01:27', '2024-04-07 13:01:27', 'Area rug', 'Area_rug.jpg', 'Area_rug_01.jpg,Area_rug_02.jpg'),
(8, 'Floor lamp', 79, 'Floor lamp', '2024-04-07 13:04:07', '2024-04-07 13:04:07', 'Floor lamp', 'Floor_lamp.jpg', 'Floor_lamp_01.jpg,Floor_lamp_02.jpg'),
(9, 'Modular', 449, 'Modular', '2024-04-07 13:05:08', '2024-04-07 13:05:08', 'Modular', 'Modular.jpg', 'Modular_01.jpg,Modular_02.jpg'),
(10, 'Ottoman', 269, 'Ottoman', '2024-04-07 13:06:17', '2024-04-07 13:06:17', 'Ottoman', 'Ottoman.jpg', 'Ottoman_01.jpg,Ottoman_02.jpg'),
(11, 'Pillow', 39, 'Pillow', '2024-04-07 13:07:15', '2024-04-07 13:07:15', 'Pillow', 'Pillow.jpg', 'Pillow_01.jpg,Pillow_02.jpg'),
(12, 'Stool', 119, 'Stool', '2024-04-07 13:08:13', '2024-04-07 13:08:13', 'Stool', 'Stool.jpg', 'Stool_01.jpg,Stool_02.jpg'),
(13, 'Umbrella', 229, 'Umbrella', '2024-04-07 13:09:13', '2024-04-07 13:09:13', 'Umbrella', 'Umbrella.jpg', 'Umbrella_01.jpg,Umbrella_02.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
