-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 27, 2023 at 03:20 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` int(100) NOT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `description`, `price`, `photo`) VALUES
(1, 'Watch', 'Electronics', 'Boat', 1000, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg'),
(2, 'Woodland', 'Footwear', 'Shoes', 1678, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg'),
(3, 'Realme7', 'Electronics', 'Phone', 10000, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg'),
(4, 'Woodland', 'Footwear', 'Shoe', 13425, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-5.jpg'),
(5, 'Jogger', 'Clothing', 'Highland', 555, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-6.jpg'),
(7, 'Belt', 'Clothing', 'Gucci', 8888, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-7.jpg'),
(9, 'Nokia', 'Electronics', 'Nokia x1', 1500, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg'),
(10, 'Bag', 'Clothing', 'Wildcraft', 500, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-8.jpg'),
(11, 'Crocs', 'Footwear', 'Crocs flip flop', 3000, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-9.jpg'),
(12, 'Shirt', 'Clothing', 'H and M', 2000, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-10.jpg'),
(13, 'TWS', 'Electronics', 'Boat', 4000, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-11.jpg'),
(14, 'Bag', 'Clothing', 'Head', 2999, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-5.jpg'),
(15, 'Bag', 'Clothing', 'Scoobdoo', 500, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg'),
(16, 'Bag', 'Clothing', 'Mochi', 1000, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg'),
(17, 'AirJordan', 'Footwear', 'Nike shoes', 2000, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg'),
(18, 'AirWhiste', 'Footwear', 'Nike Shoes', 1500, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg'),
(19, 'S23', 'Electronics', 'Samsung Smart Phone', 2000, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-11.jpg'),
(20, 'Redme7', 'Electronics', 'Redmi Phone', 1500, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
