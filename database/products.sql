-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 29, 2023 at 01:28 PM
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
  `photo` varchar(200) NOT NULL,
  `popular_product` tinyint(1) NOT NULL,
  `c_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `description`, `price`, `photo`, `popular_product`, `c_id`) VALUES
(1, 'Watch', 'Electronics', 'Boat', 1500, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg', 1, 2),
(2, 'Woodland', 'Footwear', 'Shoes', 1678, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg', 0, 3),
(3, 'Realme7', 'Electronics', 'Phone', 10000, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg', 0, 2),
(4, 'Woodland', 'Footwear', 'Shoe', 1200, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-5.jpg', 0, 3),
(5, 'Jogger', 'Clothing', 'Highland', 1050, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-6.jpg', 1, 1),
(7, 'Belt', 'Clothing', 'Gucci', 8888, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-7.jpg', 1, 1),
(9, 'Nokia', 'Electronics', 'Nokia x1', 1500, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg', 1, 2),
(10, 'Bag', 'Clothing', 'Wildcraft', 500, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-8.jpg', 0, 1),
(11, 'Crocs', 'Footwear', 'Crocs flip flop', 3000, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-9.jpg', 1, 3),
(12, 'Shirt', 'Clothing', 'H and M', 2000, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-10.jpg', 0, 1),
(13, 'TWS', 'Electronics', 'Boat', 4000, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-11.jpg', 0, 2),
(14, 'Shoe', 'Clothing', 'Head', 800, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-5.jpg', 1, 1),
(15, 'Bag', 'Clothing', 'Scoobdoo', 500, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg', 0, 1),
(16, 'Bag', 'Clothing', 'Mochi', 1050, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg', 1, 1),
(17, 'AirJordan', 'Footwear', 'Nike shoes', 2000, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg', 0, 3),
(18, 'AirWhiste', 'Footwear', 'Nike Shoes', 1500, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg', 1, 3),
(19, 'S23', 'Electronics', 'Samsung Smart Phone', 2000, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-11.jpg', 1, 2),
(20, 'Redme7', 'Electronics', 'Redmi Phone', 1500, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg', 0, 2),
(21, 'Watch', 'Electronics', 'Harman', 1500, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg', 1, 2),
(22, 'Watch', 'Electronics', 'Harman', 1500, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg', 1, 2),
(26, 'Crocs', 'Footwear', 'crocs footwear', 200, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg', 1, 3),
(27, 'Bag', 'Clothing', 'Sky bags', 1800, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg', 0, 1),
(28, 'hoodie', 'Clothing', 'H&M Hoodie', 1800, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-5.jpg', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_id` (`c_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `Category` FOREIGN KEY (`c_id`) REFERENCES `categories` (`c_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
