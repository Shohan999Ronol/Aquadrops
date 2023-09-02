-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2023 at 06:40 PM
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
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `total_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_name`, `price`, `quantity`, `total_price`, `created_at`, `image_url`) VALUES
(46, 4, 'Recyclable Paper Cup', 50.00, 1, 0.00, '2023-09-01 07:40:34', 'frontend/img/paper_cup.png'),
(47, 4, 'One time Coffee Cup', 100.00, 1, 0.00, '2023-09-01 07:40:38', 'frontend/img/paper_coffee_cup.png'),
(48, 4, 'One time Coffee Cup', 100.00, 1, 0.00, '2023-09-01 07:44:49', 'frontend/img/paper_coffee_cup.png'),
(49, 4, 'Water Dispenser', 3000.00, 1, 0.00, '2023-09-01 07:44:54', 'frontend/img/water_dispensar.png'),
(50, 4, 'Metal Water Bottle', 800.00, 1, 0.00, '2023-09-01 07:44:59', 'frontend/img/metal_bottle.png'),
(51, 4, 'One time Coffee Cup', 100.00, 1, 0.00, '2023-09-01 07:48:01', 'frontend/img/paper_coffee_cup.png'),
(52, 4, 'One time Coffee Cup', 100.00, 1, 0.00, '2023-09-01 07:48:07', 'frontend/img/paper_coffee_cup.png'),
(53, 4, 'One time Coffee Cup', 100.00, 1, 0.00, '2023-09-01 07:48:11', 'frontend/img/paper_coffee_cup.png'),
(54, 4, 'Recyclable Paper Cup', 50.00, 1, 0.00, '2023-09-01 07:48:14', 'frontend/img/paper_cup.png'),
(55, 4, 'Coca-Cola 1.25L', 110.00, 1, 0.00, '2023-09-01 07:48:20', 'frontend/img/coke_1L.png');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `coupon_name` varchar(100) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `discount`) VALUES
(16, 'ldjsflj', 23),
(18, 'ldsa;l', 30),
(19, 'aslkds', 10),
(20, 'ldhlahjlf', 39);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `product_list` text DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL DEFAULT 'Ordered',
  `total_amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `contact_no`, `address`, `payment_method`, `product_list`, `order_date`, `status`, `total_amount`) VALUES
(7, 4, 'Shohan', 'shohan@gmail.com', '762153812698', 'uttara dhaka', 'Cash on Delivery', '[{\"product_name\":\"Water Dispenser\",\"quantity\":\"1\"},{\"product_name\":\"Unilever Pureit Classic Water Purifier 23L\",\"quantity\":\"1\"},{\"product_name\":\"Fanta 1L\",\"quantity\":\"1\"}]', '2023-09-01 16:51:00', 'Shipped', 7281.00),
(8, 4, 'Ronol', 'ronol@gmail.com', '2345678', 'badda dhaka', 'Cash on Delivery', '[{\"product_name\":\"7up can 125 ml\",\"quantity\":\"1\"},{\"product_name\":\"Coca-Cola 1.25L\",\"quantity\":\"1\"},{\"product_name\":\"Sprite 1L\",\"quantity\":\"1\"},{\"product_name\":\"Unilever Pureit Classic Water Purifier 23L\",\"quantity\":\"3\"}]', '2023-09-01 17:19:03', 'On the Way', 13734.00),
(9, 6, 'ronol', 'ronol@gmail.com', '123456789', 'Uttara sector 11 Dhaka 1230', 'Cash on Delivery', '[{\"product_name\":\"Water Dispenser\",\"quantity\":\"1\"},{\"product_name\":\"Unilever Pureit Classic Water Purifier 23L\",\"quantity\":\"4\"},{\"product_name\":\"Black Mug\",\"quantity\":\"1\"},{\"product_name\":\"One time Coffee Cup\",\"quantity\":\"1\"},{\"product_name\":\"Coca-Cola 1.25L\",\"quantity\":\"1\"},{\"product_name\":\"Sprite 1L\",\"quantity\":\"1\"},{\"product_name\":\"2 Liter Water Bottles\",\"quantity\":\"1\"}]', '2023-09-02 06:13:46', 'Shipped', 21681.00),
(10, 6, 'ronol again', 'ronol@yahoo.com', '123456789', 'mipur 12 road 34 ', 'Credit Card', '[{\"product_name\":\"Unilever Pureit Classic Water Purifier 23L\",\"quantity\":\"4\"},{\"product_name\":\"Black Mug\",\"quantity\":\"2\"},{\"product_name\":\"7up 1 Ltr Bottle\",\"quantity\":\"2\"},{\"product_name\":\"7up can 125 ml\",\"quantity\":\"1\"}]', '2023-09-02 07:17:34', 'On the Way', 10784.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `product_type` varchar(255) NOT NULL,
  `discount_price` decimal(10,2) DEFAULT `price`
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `description`, `image_url`, `product_type`, `discount_price`) VALUES
(1, 'Unilever Pureit Classic Water Purifier 23L', 5000.00, 'Water Purifier 23L', 'frontend/img/pure_it.png', 'Marchents', 4750.00),
(2, 'Water Dispenser', 3000.00, '25L Bottle Water Dispenser', 'frontend/img/water_dispensar.png', 'Marchents', 2850.00),
(3, 'Recyclable Paper Cup', 50.00, '100 pcs', 'frontend/img/paper_cup.png', 'Marchents', 47.50),
(4, 'Black Mug', 550.00, '1 pcs', 'frontend/img/black_mug.png', 'Marchents', 522.50),
(5, 'One time Coffee Cup', 100.00, '12 pcs', 'frontend/img/paper_coffee_cup.png', 'Marchents', 95.00),
(6, 'Metal Water Bottle', 800.00, '1L Metal body thermoflask bottle', 'frontend/img/metal_bottle.png', 'Marchents', 760.00),
(7, '7up 1 Ltr Bottle', 100.00, 'Single', 'frontend/img/7up.png', 'Soft Drinks', 95.00),
(8, '7up can 125 ml', 60.00, 'Single', 'frontend/img/7up_can.png', 'Soft Drinks', 57.00),
(9, 'Coca-Cola 1.25L', 110.00, 'Single', 'frontend/img/coke_1L.png', 'Soft Drinks', 104.50),
(10, 'Mountain Dew', 550.00, 'Case Of 6 Bottles', 'frontend/img/dew_1L.png', 'Soft Drinks', 522.50),
(11, 'Fanta 1L', 90.00, 'Single', 'frontend/img/fanta_1L.png', 'Soft Drinks', 85.50),
(12, 'Sprite 1L', 90.00, 'Single', 'frontend/img/sprite.png', 'Soft Drinks', 85.50),
(13, '10 Liter Water Bottle', 80.00, '10 Ltr.', 'frontend/img/20 litter.jpg', 'Water Bottles', 76.00),
(14, '30 Liter Water Can', 90.00, '30 Ltr', 'frontend/img/30 litter.jpg', 'Water Bottles', 85.50),
(15, '40 Liter Water Can', 110.00, '40 Ltr', 'frontend/img/40 litter.jpg', 'Water Bottles', 104.50),
(16, '1 Liter Water Bottles', 225.00, 'Case Of 9 Bottles', 'frontend/img/1litter.jpg', 'Water Bottles', 213.75),
(17, '2 Liter Water Bottles', 240.00, 'Case Of 6 Bottles', 'frontend/img/2ltr.jpg', 'Water Bottles', 228.00),
(18, '500 ML Water Bottles', 480.00, 'Case Of 24 Bottles', 'frontend/img/500-ml-.jpg', 'Water Bottles', 456.00),
(34, 'SMC Plus Orange', 30.00, 'First ever electrolyte drink in Bangladesh', 'frontend/img/smc_plus_orange.png', 'Soft Drinks', 30.00),
(35, 'SMC Plus Lemon 250 ml', 30.00, 'First ever electrolyte drink in Bangladesh', 'frontend/img/smc_plus_lemon-removebg-preview.png', 'Soft Drinks', 30.00),
(39, 'Bruvana Sports+Litchi 500ml', 60.00, 'Refreshing and hydrating beverage designed for athletes and active individuals', 'frontend/img/bruvana-sports_png.png', 'Soft Drinks', 60.00),
(40, 'Bruvana Sports+Mango 500ml', 60.00, 'Refreshing and hydrating beverage designed for athletes', 'frontend/img/bruvana-sports-mango.png', 'Soft Drinks', 60.00),
(41, 'Drinko Litchi 500ml', 30.00, 'A unique drink consists of nata jelly and flavored drinks', 'frontend/img/drinko_litchi-removebg-preview.png', 'Soft Drinks', 30.00),
(42, 'Drinko Mango 500ml', 30.00, 'A unique drink consists of nata jelly and flavored drinks', 'frontend/img/drinko_mango-removebg-preview.png', 'Soft Drinks', 30.00),
(43, 'Drinko Pineapple 500ml', 30.00, 'A unique drink consists of nata jelly and flavored drinks', 'frontend/img/pran-drinko-pineapple-juice.png', 'Soft Drinks', 30.00),
(44, 'Appy Fizz 500ml', 70.00, 'Consists of carbonated apple juice', 'frontend/img/appy_fizz-removebg-preview.png', 'Soft Drinks', 70.00),
(45, 'Clay cup', 100.00, 'Handcrafted Clay Cup, a sustainable and artisanal vessel that enhances the flavor of your favorite beverages.', 'frontend/img/clay.jpg', 'Marchents', 100.00),
(46, 'Canberry stainless steel double wall vaccum flusk 1L', 1000.00, 'Stainless steel double walled vacuum insulated technology', 'frontend/img/flusk.png', 'Marchents', 1000.00),
(47, 'Smart Thermos Flask with Led Temperature Display In-Touch', 1000.00, 'Touch screen, one-key display temperature, ultra-high heat resistance and stability', 'frontend/img/Smart-Thermos-Flask-with-Led-Temperature-.png', 'Marchents', 1000.00),
(48, 'Gatorade sports drink lime lemon', 500.00, 'The ultimate solution for replenishing electrolytes and reinvigorating your body', 'frontend/img/gatorade-sports-drink-lime-lemon-removebg-preview.png', 'Soft Drinks', 500.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`) VALUES
(1, 'Tanmoy Bhowmik', 'tanmoybhowmik98@gmail.com', '01767634661', '$2y$10$sYJ/L9XrcM9oyNkfruaas.0eboGruqnW34Lz8KJb.eCcCxHKGwcti'),
(2, 'test', 'test@gmail.com', '794379832', '$2y$10$qbjr7sv7.PNTbLsOn4XGA.RCjRYix1zPKbBYaw583MGTEJy.aW08O'),
(4, 'shohan', 'shohan@gmail.com', '0987654321', '$2y$10$Vuf9AfchkoPWRy3dz6Zji.jyWGIso0Le/WZga/.oN6UwIMAwoPkqq'),
(5, 'Admin', 'admin@gmail.com', '1234567890', '$2y$10$y9o4GPMoNJGmBdUHOTwSZuG3DbBOkvLScx9pIuMOhUah5Mlw6lXtu'),
(6, 'Ronol', 'ronol@gmail.com', '123456789', '$2y$10$ITF8iYiD4A5kObGplo29PO2Bhr17OTujGXK8cj07SUHPSSyOJm8qW'),
(7, 'MD. FARHAN SOBERIN', 'farhanminmoy@gmail.com', '+8801777571397', '$2y$10$IYAKsqKjZ49pDiNrAZa94uN3DRtjnGWt/a2/3lT7ZNXxLwA7i/1WG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
