-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2025 at 08:25 AM
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
-- Database: `arian_car`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `image`) VALUES
(1, 'فرمون ماشین', '2025-04-01 22:25:03', '/Arian Car/image/25_04_05_16_07_23.png'),
(2, 'دنده فرمون', '2025-04-01 22:38:37', '/Arian Car/image/25_04_05_16_08_39.png'),
(3, 'پیچ رینگ', '2025-04-02 11:03:21', '/Arian Car/image/25_04_05_16_08_51.png'),
(4, 'چراغ', '2025-04-02 12:12:53', '/Arian Car/image/25_04_05_16_09_03.png'),
(5, 'اکسسوری', '2025-04-02 12:13:27', '/Arian Car/image/25_04_05_16_09_10.png'),
(6, 'شوینده', '2025-04-02 12:13:52', '/Arian Car/image/25_04_05_16_09_17.png');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_email` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_email`, `post_id`, `comment`, `created_at`) VALUES
(1, 'erfancraft26@gmail.com', 8, 'awdawd awdawd waawdd awdawd adwad awdawd awddawd awdad awdawd a\r\n', '2025-04-09 19:41:39'),
(2, 'erfancraft26@gmail.com', 8, 'awdawd awdawd waawdd awdawd adwad awdawd awddawd awdad awdawd a\r\n', '2025-04-09 19:59:52'),
(3, 'erfancraft26@gmail.com', 11, 'سلام خوبی؟\r\nلب نمیدی', '2025-04-09 20:19:31');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `receiver_name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `plaque` varchar(10) DEFAULT NULL,
  `floor_unit` text NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `delivery_status` enum('pending','delivered') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `post_id`, `product_name`, `quantity`, `price`, `total_price`, `receiver_name`, `phone`, `address`, `plaque`, `floor_unit`, `user_email`, `delivery_status`, `created_at`) VALUES
(5, 12, 'دختر موز', 7, 12540000, 87780000, 'عرفان فریدونی', '09016688715', 'پرند و فااز6 و کیسون و زون9', '19', 'طبقه 2 واحد18', 'erfancraft26@gmail.com', 'pending', '2025-04-12 14:43:17');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` text NOT NULL,
  `price` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `cat_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 10,
  `special` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `name`, `body`, `image`, `price`, `created_at`, `cat_id`, `status`, `special`) VALUES
(8, 'lalalaboom', 'gfytfuy', '/Arian Car/image/25_04_05_16_11_30.jpg', '200000', '2025-04-05 17:41:30', 5, 10, 10),
(9, 'lalalaboom', 'فببب 7ب فیف ', '/Arian Car/image/25_04_08_17_27_44.jpg', '51200000', '2025-04-08 18:57:44', 1, 10, 0),
(11, 'war', 'عفبف غفیغفی غغیق قغقی', '/Arian Car/image/25_04_08_17_28_53.png', '3000', '2025-04-08 18:58:53', 1, 10, 10),
(12, 'دختر موز', 'من همونم که یک روز می خواستم دریا بشم می خواستم بزرگترین دریایی دنیا بشم\r\nابعاد 555 x 490', '/Arian Car/image/25_04_10_10_58_44.jpg', '12540000', '2025-04-10 12:28:44', 4, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stars`
--

CREATE TABLE `stars` (
  `id` int(11) NOT NULL,
  `img_num` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `stars`
--

INSERT INTO `stars` (`id`, `img_num`, `user_email`) VALUES
(6, 5, 'erfancraft26@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email` text NOT NULL,
  `created_at` datetime NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`, `admin`) VALUES
(1, 'ninjacraft267', '$2y$10$SS252Dw04OtKBpJme.8cVeqZ2nO4fCwdTD0c1vY3Qxpb.1u.5Y84u', 'erfancraft26@gmail.com', '2025-04-05 18:05:17', 1),
(2, 'erfan craft', '$2y$10$eXnpeC6G7pDLP06nTHJ22.pxc2JfFa79Mo2I7Vo99kKcCNxZQC48K', 'erfanfreyduni4@gmail.com', '2025-04-07 18:56:43', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stars`
--
ALTER TABLE `stars`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `stars`
--
ALTER TABLE `stars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
