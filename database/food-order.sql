-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2024 at 06:58 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(12, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(13, 'Emon Hossain', 'emon', '81dc9bdb52d04dc20036dbd8313ed055'),
(15, 'Siam Ahmed', 'siam', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(4, 'Pizza', 'Food_Category_790.jpg', 'Yes', 'Yes'),
(5, 'Burger', 'Food_Category_344.jpg', 'Yes', 'Yes'),
(6, 'Momo', 'Food_Category_77.jpg', 'Yes', 'Yes'),
(9, 'Fried Chicken', 'pexels-saveurssecretes-5476229.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(3, 'Chicken Momo Dumplings', 'Chicken Dumpling with herbs from Mountains', 5.00, 'Easy-Chicken-Momo-Dumplings.jpg', 6, 'Yes', 'Yes'),
(4, 'Ham Burger', 'Burger with Ham, Pineapple and lots of Cheese.', 4.00, 'Food-Name-6340.jpg', 5, 'Yes', 'Yes'),
(5, 'Smoky BBQ Pizza', 'Best Firewood Pizza in Town.', 6.00, 'Food-Name-8298.jpg', 4, 'No', 'Yes'),
(6, 'Sadeko Momo', 'Best Spicy Momo for Winter', 6.00, 'Food-Name-7387.jpg', 6, 'Yes', 'Yes'),
(7, 'Mixed Pizza', 'Pizza with chicken, Ham, mushrooms ', 10.00, 'pexels-catscoming-367915.jpg', 4, 'Yes', 'Yes'),
(8, 'Veg pizza', 'Pizza with fresh tomatoes, cheese, mushrooms, and capsicums', 9.00, 'Food-Name-9892.jpg', 4, 'Yes', 'Yes'),
(9, 'Beef Burger', 'Burger with beef and veggies', 3.00, 'pexels-andra-325634-918581.jpg', 5, 'Yes', 'Yes'),
(12, 'Crispy Chicks', '', 4.00, 'pexels-chanwalrus-1059943.jpg', 9, 'Yes', 'Yes'),
(13, 'Flavor Fusion Fries', '', 5.00, 'pexels-harry-dona-2338407.jpg', 9, 'Yes', 'Yes'),
(14, 'Golden Crispy Delights', '', 4.00, 'pexels-pixabay-60616.jpg', 9, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_messages`
--

CREATE TABLE `tbl_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `message` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_messages`
--

INSERT INTO `tbl_messages` (`id`, `name`, `email`, `message`) VALUES
(1, 'Md. Lutfor Rahman ', 'lutfor@gmail.com', 'My order hasn\\\'t arrived and this is very frustrating. So, can you please look into it why are they taking so long?'),
(15, 'Md. Emon Hossain ', 'emon5369@gmail.com', 'What are you all doing? It\\\'s been a long time since you updated any of the components. We need some change on the ui, so work on it as fast as possib'),
(16, 'Saif alam', 'saif@gmail.com', 'I had a great experience using this website. Thank you for your service :) ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(8, 'Dumplings Specials', 5.00, 1, 5.00, '2024-08-07 00:34:49', 'On Delivery', 'Saiful Islam', '0138475940', 'saiful@gmail.com', 'Mohammadpur'),
(9, 'Best Burger', 4.00, 2, 8.00, '2024-08-07 00:34:49', 'Delivered', 'Saiful Islam', '0138475940', 'saiful@gmail.com', 'Mohammadpur'),
(10, 'Best Burger', 4.00, 1, 4.00, '2024-08-07 13:31:25', 'Cancelled', 'Md. Emon Hossain ', '01610601762', 'emon5369@gmail.com', 'Dhanmondi, Dhaka'),
(11, 'Smoky BBQ Pizza', 6.00, 2, 12.00, '2024-08-07 13:31:25', 'Delivered', 'Md. Emon Hossain ', '01610601762', 'emon5369@gmail.com', 'Dhanmondi, Dhaka'),
(12, 'Crispy Chicks', 4.00, 1, 4.00, '2024-08-07 19:56:31', 'Delivered', 'Siam Ahmed', '01834567321', 'Siam@gmail.com', 'Hazaribag, Dhaka'),
(13, 'Flavor Fusion Fries', 5.00, 2, 10.00, '2024-08-07 19:56:31', 'On Delivery', 'Siam Ahmed', '01834567321', 'Siam@gmail.com', 'Hazaribag, Dhaka'),
(15, 'Chicken Momo Dumplings', 5.00, 2, 10.00, '2024-08-12 15:56:32', 'Ordered', 'Md. Emon Hossain ', '01610601762', 'emon5369@gmail.com', 'Dhanmondi, Dhaka'),
(19, 'Crispy Chicks', 4.00, 1, 4.00, '2024-08-25 05:29:07', 'Ordered', 'Md. Emon Hossain ', '01610601762', 'emon5369@gmail.com', 'Dhanmondi, Dhaka'),
(25, 'Mixed Pizza', 10.00, 1, 10.00, '2024-08-29 18:27:22', 'Ordered', 'Saiful Islam', '0138475940', 'saiful@gmail.com', 'Mohammadpur'),
(29, 'Ham Burger', 4.00, 2, 8.00, '2024-08-29 19:27:16', 'Ordered', 'Saif alam', '0156790443', 'saif@gmail.com', 'Gulshan, Dhaka'),
(31, 'Flavor Fusion Fries', 5.00, 4, 20.00, '2024-08-29 19:39:13', 'Ordered', 'Md. Emon Hossain ', '01610601762', 'emon5369@gmail.com', 'Dhanmondi, Dhaka'),
(33, 'Ham Burger', 4.00, 8, 32.00, '2024-08-29 19:43:48', 'Ordered', 'Saif alam', '01567890264', 'saif@gmail.com', 'Gulshan, Dhaka'),
(39, 'Ham Burger', 4.00, 2, 8.00, '2024-09-02 05:48:51', 'Ordered', 'Md. Emon Hossain ', '01610601762', 'emon5369@gmail.com', 'Dhanmondi, Dhaka'),
(40, 'Smoky BBQ Pizza', 6.00, 4, 24.00, '2024-09-14 10:02:15', 'Cancelled', 'Md. Emon Hossain ', '01610601762', 'emon5369@gmail.com', 'Dhanmondi, Dhaka'),
(41, 'Veg pizza', 9.00, 5, 45.00, '2024-09-14 10:02:15', 'Delivered', 'Md. Emon Hossain ', '01610601762', 'emon5369@gmail.com', 'Dhanmondi, Dhaka'),
(42, 'Chicken Momo Dumplings', 5.00, 3, 15.00, '2024-09-15 15:26:37', 'Ordered', 'Md. Emon Hossain ', '01610601762', 'emon5369@gmail.com', 'Dhanmondi, Dhaka'),
(43, 'Ham Burger', 4.00, 2, 8.00, '2024-09-15 15:26:37', 'Delivered', 'Md. Emon Hossain ', '01610601762', 'emon5369@gmail.com', 'Dhanmondi, Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `contact`, `email`, `address`, `password`) VALUES
(1, 'Md. Emon Hossain ', '01610601762', 'emon5369@gmail.com', 'Dhanmondi, Dhaka', '$2y$10$qFM6ND1nQiO/Z1ErumHCR.4P9EXqRfPnV18xZfuDcd4tRlJCxnpv2'),
(2, 'Saiful Islam', '0138475940', 'saiful@gmail.com', 'Mohammadpur', '$2y$10$ZIWEBVvkxB3wcFjPNkufeePe4ElSlAsQjjGP43aUB4XmrWnzSFt7G'),
(3, 'Siam Ahmed', '01834567321', 'Siam@gmail.com', 'Hazaribag, Dhaka', '$2y$10$Qx0TAxYw5CB1.cBy0MzBzeB7pYRJCFd5pKEaP4Wb.u8ptg71D80Wy'),
(6, 'Saif alam', '01567890264', 'saif@gmail.com', 'Gulshan, Dhaka', '$2y$10$iYVpjby5PQ/2NBHHD5zGq.XK1xL7VvL4RHGjeKWZFOa7DM4N.Kcn6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
