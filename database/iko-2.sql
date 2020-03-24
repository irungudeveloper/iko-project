-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2020 at 10:52 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iko-2`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(4) NOT NULL,
  `title` varchar(30) NOT NULL,
  `price` int(4) NOT NULL,
  `amount` int(4) NOT NULL,
  `user_id` int(4) NOT NULL,
  `product_id` int(4) NOT NULL,
  `session_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(4) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Shoes', ' 			\r\n 		this category is for everything footwear:\r\nsandals, Official, Women/Men'),
(3, 'Electronics', 'New and better everyday 			\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(4) NOT NULL,
  `title` varchar(35) NOT NULL,
  `price` int(4) NOT NULL,
  `total` int(4) NOT NULL,
  `amount` int(4) NOT NULL,
  `status` int(1) NOT NULL,
  `user_id` int(4) NOT NULL,
  `product_id` int(4) NOT NULL,
  `session_id` int(4) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `title`, `price`, `total`, `amount`, `status`, `user_id`, `product_id`, `session_id`, `created_at`) VALUES
(30, 'Another Product', 1200, 3600, 3, 1, 8, 10, 9, '2020-01-02'),
(31, 'The Dust', 1500, 4500, 3, 1, 8, 12, 9, '2020-01-15'),
(32, 'Another Product', 1200, 3600, 3, 1, 8, 10, 9, '2020-01-16'),
(33, 'The Dust', 1500, 4500, 3, 1, 8, 12, 9, '2020-02-12'),
(34, 'HELLO WORLD', 1000, 4000, 4, 1, 10, 14, 9, '2020-02-19'),
(35, 'Bites', 100, 300, 3, 1, 8, 11, 9, '2020-02-26'),
(36, 'HELLO WORLD', 1000, 2000, 2, 1, 10, 14, 11, '2020-03-05'),
(37, 'New User', 1250, 2500, 2, 0, 10, 13, 10, '2020-03-13'),
(38, 'Another Product', 1200, 3600, 3, 1, 8, 10, 8, '2020-03-23');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(4) NOT NULL,
  `title` varchar(30) NOT NULL,
  `price` int(4) NOT NULL,
  `stock` int(4) NOT NULL,
  `location` varchar(40) NOT NULL,
  `image1` longtext NOT NULL,
  `image2` longtext NOT NULL,
  `image3` longtext NOT NULL,
  `description` varchar(255) NOT NULL,
  `availability` int(1) NOT NULL,
  `created_at` date NOT NULL,
  `category_id` int(4) NOT NULL,
  `user_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `stock`, `location`, `image1`, `image2`, `image3`, `description`, `availability`, `created_at`, `category_id`, `user_id`) VALUES
(8, 'Description', 1233, 123, 'Asgard', 'p2.png', 'p1.png', 'p3.png', 'This is a description', 0, '2020-01-04', 1, 0),
(9, 'New Product', 19000, 15, 'Alliance', 'h7.png', 'h6.png', 'h5.png', 'This is a second attempt', 0, '2020-01-09', 1, 8),
(10, 'Another Product', 1200, 10, 'Pangani', 'l4.png', 'l3.png', 'l2.png', 'This is another product', 0, '2020-01-15', 1, 8),
(11, 'Bites', 100, -3, 'Nairobi', 'p1.png', 'p2.png', 'p3.png', 'this is one for the UI', 0, '2020-02-14', 3, 8),
(12, 'The Dust', 1500, 9, 'Kachmega', 'head1.png', 'headphonesoverload.png', 'p1.png', 'Another one bites the dust', 0, '2020-02-19', 1, 8),
(13, 'New User', 1250, 28, 'Nakuru', 'h6.png', 'h7.png', 'head1.png', 'This is a new merchant posting', 0, '2020-02-22', 3, 10),
(14, 'HELLO WORLD', 1000, 4, 'Zanzibar', 'carousel-2.jpeg', 'carousel-1.jpg', 'laptopverload.png', 'This is another new product', 0, '2020-03-04', 3, 10),
(15, 'Last Product', 3000, 15, 'Tz', 'laptopverload.png', 'phoneoverload.png', 'carousel-1.jpg', 'This is me', 0, '2020-03-13', 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `product_sales`
--

CREATE TABLE `product_sales` (
  `id` int(4) NOT NULL,
  `product_id` int(4) NOT NULL,
  `total_sales` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `image` longtext NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type_id` int(3) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `image`, `email`, `password`, `type_id`, `created_at`) VALUES
(1, 'Irungu', 'Edwin', 'nothingseperatesloveRom.png', 'irunguedwin8042@gmail.com', '$2y$10$l8Qrvh5r9wuyUz6wqNjFVu0rV1nFLKxY1aw8BN/Ze9UaIsCZ2wf/.', 1, '2020-03-12'),
(7, 'Edwin', 'Irungu', 'logo.png', 'edwin@gmail.com', '$2y$10$3fShlRgnSKtMXhe7qGe9ZecCiWgRWcXOGLXT2lJDgVKhPjfQ13Cv.', 2, '2020-03-12'),
(8, 'John', 'Doe', 'logo.png', 'john@gmail.com', '$2y$10$ZIXgnthvSti1qkG/o4l6vu0LFwz2L3tl20wakUvZ73mIZNLt6RWzG', 1, '2020-03-12'),
(9, 'Jane', 'Doe', 'logo.png', 'jane@gmail.com', '$2y$10$EQ9uoL1K7xZtXeeuRcaWv.O785IMJvLAOZmmQUXnTlglzjHXWRBRC', 2, '2020-03-12'),
(10, 'Irungu', 'Edwin', 'h7.png', 'edwinirungu@gmail.com', '$2y$10$Lm1xWMT4HRKXqxnz3oDQiuHhhk2NZhZc0YgaAYcSMOMeELv7gDOXO', 1, '2020-03-18'),
(11, 'Zack', 'Doe', 'laptopverload.png', 'zack@gmail.com', '$2y$10$7Ufb3mTthc44v/pl9HF6butp1cH7Rn0nGoaVUn.k1LtwMCopJrkF.', 2, '2020-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(4) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sales`
--
ALTER TABLE `product_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_sales`
--
ALTER TABLE `product_sales`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
