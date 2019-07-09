-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 11, 2018 at 06:47 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mypet`
--

-- --------------------------------------------------------

--
-- Table structure for table `cust_address`
--

CREATE TABLE `cust_address` (
  `cust_id` int(11) NOT NULL,
  `city` varchar(35) NOT NULL,
  `district` varchar(35) NOT NULL,
  `street` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cust_address`
--

INSERT INTO `cust_address` (`cust_id`, `city`, `district`, `street`) VALUES
(5, 'makkah', 'Al-subhani', 'alanqary'),
(6, 'jeddah', 'shauqiea', 'mmsha'),
(7, 'makkah', 'shauqiea', 'street34'),
(9, 'jeddah', 'Alshraee', 'street12');

-- --------------------------------------------------------

--
-- Table structure for table `cust_info`
--

CREATE TABLE `cust_info` (
  `cust_id` int(11) NOT NULL,
  `first_name` varchar(35) NOT NULL,
  `last_name` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `img` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cust_info`
--

INSERT INTO `cust_info` (`cust_id`, `first_name`, `last_name`, `email`, `password`, `phone_no`, `date`, `img`) VALUES
(3, 'miaad', 'shlyan', 'miaad2019@gmail.com', 'miaad', '0557640084', '1440-03-04', '../image/user.png'),
(4, 'waad', 'shlyan', 'waad@gmail.com', 'waad', '0562130987', '2018-11-12', '../image/user.png'),
(5, 'miaad', 'shlyan', 'miaad@gmail.com', 'miaad', '0557640084', '2018-11-13', '../image/user.png'),
(6, 'alaa ', 'alsobhe', 'alaa@gmail.com', 'alaa', '0511001234', '2018-11-13', '../image/user.png'),
(7, 'samar', 'bakhsh', 'samar@gmail.com', 'samar', '0546788765', '2018-11-13', '../image/user.png'),
(8, 'milad', 'sh', 'mmmm@hotmail.com', 'mmmm', '0557640080', '2018-11-23', '../image/user.png'),
(9, 'shatha', 'eda', 'shatha@gmail.com', 'shatha', '0546788765', '2018-11-26', '../image/user.png'),
(12, 'loly', 'ahmed', 'loly@hotmail.com', 'loly', '0546788765', '2018-11-26', '../image/user.png');

-- --------------------------------------------------------

--
-- Table structure for table `cust_order`
--

CREATE TABLE `cust_order` (
  `ord_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `total_price` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cust_order`
--

INSERT INTO `cust_order` (`ord_id`, `cust_id`, `date`, `total_price`) VALUES
(441, 9, '2018-11-27', '222'),
(514, 10, '2018-11-26', '140'),
(889, 10, '2018-11-26', '110'),
(1037, 9, '2018-11-26', '119'),
(1874, 9, '2018-11-27', '128'),
(1883, 5, '2018-12-06', '308'),
(2556, 0, '2018-11-26', '140'),
(2937, 9, '2018-11-26', '90'),
(3038, 0, '2018-11-26', '75'),
(3395, 10, '2018-11-26', '81'),
(3519, 5, '2018-11-26', '237'),
(4956, 9, '2018-11-27', '35'),
(5456, 9, '2018-11-27', '80'),
(5672, 5, '2018-12-06', '65'),
(6195, 9, '2018-11-27', '100'),
(6593, 0, '2018-11-26', '90'),
(7123, 9, '2018-11-26', '106'),
(7244, 9, '2018-11-26', '130'),
(7368, 9, '2018-11-27', '100'),
(7593, 9, '2018-11-27', '190'),
(7655, 0, '2018-11-26', '31'),
(7793, 7, '2018-11-26', '35'),
(7979, 7, '2018-11-26', '75'),
(8187, 9, '2018-11-27', '173'),
(8738, 9, '2018-11-27', '45'),
(9018, 7, '2018-11-27', '24'),
(9069, 9, '2018-11-27', '90'),
(9346, 9, '2018-11-27', '95'),
(9375, 10, '2018-11-26', '54'),
(9746, 9, '2018-11-26', '45'),
(9792, 7, '2018-11-27', '245');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `ord_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`ord_id`, `prod_id`, `quantity`, `price`) VALUES
(441, 185, 1, '35'),
(441, 195, 1, '17'),
(441, 207, 1, '170'),
(514, 117, 1, '65'),
(514, 129, 1, '75'),
(889, 102, 1, '35'),
(889, 129, 1, '75'),
(1037, 185, 3, '105'),
(1037, 198, 1, '14'),
(1874, 208, 1, '90'),
(1874, 224, 1, '38'),
(1883, 111, 1, '48'),
(1883, 115, 1, '65'),
(1883, 117, 3, '195'),
(2556, 117, 1, '65'),
(2556, 129, 1, '75'),
(2937, 210, 1, '90'),
(3038, 185, 1, '35'),
(3038, 187, 1, '40'),
(3395, 103, 1, '16'),
(3395, 115, 1, '65'),
(3519, 113, 1, '150'),
(3519, 127, 3, '87'),
(4956, 184, 1, '35'),
(5456, 212, 1, '16'),
(5456, 213, 1, '45'),
(5456, 219, 1, '19'),
(5672, 115, 1, '65'),
(6195, 208, 1, '90'),
(6195, 217, 1, '10'),
(6593, 210, 1, '90'),
(7123, 209, 1, '90'),
(7123, 212, 1, '16'),
(7244, 100, 1, '65'),
(7244, 115, 1, '65'),
(7368, 185, 1, '35'),
(7368, 201, 1, '65'),
(7593, 110, 1, '70'),
(7593, 131, 1, '120'),
(7655, 195, 1, '17'),
(7655, 198, 1, '14'),
(7793, 185, 1, '35'),
(7979, 129, 1, '75'),
(8187, 209, 1, '90'),
(8187, 218, 1, '20'),
(8187, 223, 1, '25'),
(8187, 224, 1, '38'),
(8738, 103, 1, '16'),
(8738, 127, 1, '29'),
(9018, 197, 1, '14'),
(9018, 202, 1, '10'),
(9069, 185, 1, '35'),
(9069, 188, 1, '55'),
(9346, 187, 1, '40'),
(9346, 188, 1, '55'),
(9375, 185, 1, '35'),
(9375, 191, 1, '19'),
(9746, 213, 1, '45'),
(9792, 106, 3, '60'),
(9792, 115, 1, '65'),
(9792, 130, 1, '120');

-- --------------------------------------------------------

--
-- Table structure for table `petinfo`
--

CREATE TABLE `petinfo` (
  `petid` int(20) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `petname` varchar(255) NOT NULL,
  `birhday` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `petinfo`
--

INSERT INTO `petinfo` (`petid`, `cust_id`, `petname`, `birhday`, `description`, `image`) VALUES
(11, 5, 'caty', '2017-02-19', 'rose-ringed parakeet.\r\nable to learn, memorized words and singing but not fluent.', './pet/0f4167780892a4e4b4fae23a9c7a4ed4.jpg'),
(12, 4, 'boni ', '2014-12-03', 'husky dog.\r\nthe abundance of fur, cold places. Pets and social likes to mix with people.\r\n', './pet/c1a3b64883bed0308d3a4f66e27f711f--mini-husky-alaskan-klee-kai.jpg'),
(13, 5, 'Pearl', '2017-02-05', 'parakeet.\r\nable to learn, memorized words and singing but not fluent.', './pet/7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` double(7,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `petType` varchar(255) NOT NULL,
  `proType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `image`, `petType`, `proType`) VALUES
(100, 'CATIDEA Food Container Medium 5~7kg', 'Food Container', 65.00, '../cat/cats1.png ', 'cat', ' Container'),
(101, 'Bergamo Nuvola Double Plastic Bowl', 'Nuvola Double Plastic Bowls', 18.00, '../cat/cats2.jpg', 'cat', ' Container'),
(102, 'CATIDEA high quality stainless steel bowl', 'Accessories', 35.00, '../cat/cats3.png', 'cat', ' Container'),
(103, 'Beaphar Feeding Syringes', 'Beaphar Feeding Syringes', 16.00, '../cat/cats4.jpg', 'cat', ' supplier'),
(104, 'Beaphar Lactol Feeding Set', 'Food Supplies', 20.00, '../cat/cats5.png', 'cat', ' supplier'),
(105, 'MP Bergamo Nuvola Food Dispenser 11L', 'Food Supplies', 78.00, '../cat/cats6.png', 'cat', ' supplier'),
(106, 'Three’s a Crowd Refillable Catnip Wand', 'Cat toys', 20.00, '../cat/cattoys1.jpg', 'cat', 'toy'),
(107, 'Zolux 4 Balls with Bells for Cats', 'Cat toys', 10.00, '../cat/cattoys2.png', 'cat', 'toy'),
(108, 'Savic Pet Enigma Medium Level 1', 'Cat toys', 12.00, '../cat/cattoys3.jpg', 'cat', 'toy'),
(109, 'SENTRY Hairball Relief For Cats Fish Flavor 2oz', 'Medical Care', 30.00, '../cat/cathealth1.jpg', 'cat', 'care'),
(110, 'Beaphar Calming Set for Cats', 'Medical Care', 70.00, '../cat/cathealth2.png', 'cat', 'care'),
(111, 'Beaphar Soft Cat Flea Collar - Sparkle', 'Medical Care', 48.00, '../cat/cathealth3.jpg', 'cat', 'care'),
(112, 'Pet Products Cat Bed', 'Cat Bed', 62.00, '../cat/catbed1.png', 'cat', 'bed'),
(113, 'Moonlight Igloos Cats', 'Cat Bed', 150.00, '../cat/catbed2.jpg', 'cat', 'bed'),
(114, 'Love Word Cat Basket', 'Cat Basket', 52.00, '../cat/catbed3.png', 'cat', 'bed'),
(115, 'Applaws Dry Cat Food Adult Chicken', 'Dry Cat Food', 65.00, '../cat/catfood1.png', 'cat', 'food'),
(116, 'Applaws Adult Chicken with Extra Salmon', 'Dry Cat Food', 65.00, '../cat/catfood2.jpg', 'cat', 'food'),
(117, 'Applaws Kitten Cat Dry Food Chicken ', 'Dry Cat Food', 65.00, '../cat/catfood7.png', 'cat', 'food'),
(127, 'Kit Cat Mini Fish Medley ', 'Dry Cat Food', 29.00, '../cat/catfood4.jpg', 'cat', 'food'),
(128, 'Kit Cat Mini chicken cuisine', 'Dry Cat Food', 29.00, '../cat/catfood3.jpg', 'cat', 'food'),
(129, 'Royal Canin Dry Cats Food Sensible 33 ', 'Dry Cat Food', 75.00, '../cat/catfood8.jpg', 'cat', 'food'),
(130, 'Applaws Kitten Chicken Breast Can 24x70g ', 'wet cat food ', 120.00, '../cat/catfood5.png', 'cat', 'food'),
(131, 'Applaws Senior Tuna with Salmon 70gx24', 'wet cat food ', 120.00, '../cat/catfood6.png', 'cat', 'food'),
(132, 'Applaws Kitten Tuna Can 24x70g  ', 'wet cat food ', 120.00, '../cat/catfood9.jpg', 'cat', 'food'),
(183, 'Beaphar XtraVital', 'budgie Food', 35.00, '../bridpic/BeapharXtraVitalbudgieFood.jpg', 'bird', 'food'),
(184, 'Beaphar XtraVital ', 'Large Parakeet Food', 35.00, '../bridpic/Beaphar XtraVital Large Parakeet Food.jpg', 'bird', 'food'),
(185, 'Beaphar XtraVital Parrot', 'Parrot Premium Food', 35.00, '../bridpic/Beaphar XtraVital Parrot Premium Food.jpg', 'bird', 'food'),
(186, 'RIO Food', 'for Exotic birds', 40.00, '../bridpic/RIO Food for Exotic birds.png', 'bird', 'food'),
(187, 'RIO Food', 'for Canaries', 40.00, '../bridpic/RIO Food for Canaries.png', 'bird', 'food'),
(188, 'Beneluxe', 'Insect Mix', 55.00, '../bridpic/Benelux-Insect-Mix.jpg', 'bird', 'food'),
(189, 'Crunchy Stick ', 'exotic millet apple', 19.00, '../bridpic/crunchy-stick-exotic-milletapple-.jpg', 'bird', 'food'),
(190, 'Crunchy Stick ', 'Canary seed sticklewort', 19.00, '../bridpic/crunchy-stick-canary-canary-seedsticklewort.jpg', 'bird', 'food'),
(191, 'Crunchy Stick ', 'parrot peanut apple', 19.00, '../bridpic/crunchy-stick-parrot-peanutapple-.jpg', 'bird', 'food'),
(193, 'Food Supplier', 'Bird Feeder', 14.00, '../bridpic/Bird Feeder2.png', 'bird', 'supplier'),
(194, 'Food Supplier', 'Bird Feeder', 17.00, '../bridpic/Bird Feeder1.png', 'bird', 'supplier'),
(195, 'Food Supplier', 'Bird Feeder', 17.00, '../bridpic/Bird Feeder.png', 'bird', 'supplier'),
(196, 'Food Supplier', 'Drinking Bottle & Feeder 300ml', 15.00, '../bridpic/Drinking Bottle & Feeder 300ml.jpg', 'bird', 'supplier'),
(197, 'Food Supplier', 'External Bath for Small Birds ', 14.00, '../bridpic/External Bath for Small Birds (.png', 'bird', 'supplier'),
(198, 'Food Supplier', 'External Bath for Small Birds', 14.00, '../bridpic/External Bath for Small Birds2.png', 'bird', 'supplier'),
(199, 'Health care ', 'Beaphar Wound Ointment 30ml', 45.00, '../bridpic/Beaphar Wound Ointment 30ml.jpg', 'bird', 'care'),
(200, 'Health care ', 'Beaphar Anti-Septic Plumage Spray 150ml', 50.00, '../bridpic/Beaphar Anti-Septic Plumage Spray 150ml.jpg', 'bird', 'care'),
(201, 'Health care ', 'Beaphar Vogelspray 404 -250ml', 65.00, '../bridpic/Beaphar Vogelspray 404 (250ml) .png', 'bird', 'care'),
(202, 'Toys  ', 'Plastic swing for small birds', 10.00, '../bridpic/plastic swing .png', 'bird', 'toy'),
(203, 'Toys  ', 'Swing for Small Birds', 16.00, '../bridpic/Swing for Small Birds.png', 'bird', 'toy'),
(204, 'Toys  ', 'run Ladder', 20.00, '../bridpic/run Ladder .png', 'bird', 'toy'),
(205, 'Cage', 'Round birds cage', 120.00, '../bridpic/Round birds cage.png', 'bird', 'cage'),
(206, 'Cage', 'parrot cage', 200.00, '../bridpic/parrot cage.jpg', 'bird', 'cage'),
(207, 'Cage', 'arabesque-cages-anna', 170.00, '../bridpic/arabesque-cages-anna-.jpg', 'bird', 'cage'),
(208, 'Chicken Puppy Large Breed', 'Dry Dog Food Diets that use high levels of cereals', 90.00, '../dog/food1.jpg', 'dog', 'food'),
(209, 'Chicken Puppy Small Medium Breed', 'Dry Dog Food Diets that use high levels of cereals', 90.00, '../dog/food2.png', 'dog', 'food'),
(210, 'Chicken Puppy Large Breed', 'Dry Dog Food Diets that use high levels of cereals', 90.00, '../dog/food3.png', 'dog', 'food'),
(211, 'Scrumptious Salmon Treats', 'crispy shell and soft creamy centre', 16.00, '../dog/Scrumptious1.jpg', 'dog', 'food'),
(212, 'Yogurt and Mixed Berries Treats', 'a creamy yogurt filling with mixed berries', 16.00, '../dog/Scrumptious2.png', 'dog', 'food'),
(213, 'Beaphar Lactol Milk', 'Complete milk replacement feed for orphan puppies', 45.00, '../dog/Scrumptious5.jpg', 'dog', 'food'),
(214, 'Dog Arthritis', 'maintenance of healthy bones and supple joints.', 75.00, '../dog/medical care1.jpg', 'dog', 'care'),
(215, 'Flea Guard Flea ', ' ingredients which aid in the control of fleas & ticks.', 53.00, '../dog/medical care2.png', 'dog', 'care'),
(216, 'Beaphar Plaque Away', 'food particles cause plaque on your dogs teeth', 35.00, '../dog/medical care3.png', 'dog', 'care'),
(217, 'Zolux Plush Birdy Piou  Dog Toy', 'colorful plush toys ', 10.00, '../dog/toy1.jpg', 'dog', 'toy'),
(218, 'Dinos Frills the Triceratops', 'Made with bubble plush ', 20.00, '../dog/toy2.jpg', 'dog', 'toy'),
(219, 'Checkers Skinny Brown Roosters', 'character from durable', 19.00, '../dog/toy3.jpg', 'dog', 'toy'),
(220, 'Waterproof Jacket Beige', 'Fleece lined waterproof padded jacket', 55.00, '../dog/Clothes1.jpg', 'dog', 'clothes'),
(221, 'Waterproof Jacket Red ', ' Fleece lined waterproof padded jacket.', 40.00, '../dog/Clothes2.jpg', 'dog', 'clothes'),
(222, 'Skinny Brown jacket', '100% cotton shirt-style collar and bottom', 55.00, '../dog/Clothes3.jpg', 'dog', 'clothes'),
(223, 'Pet Bed Basket', 'with a washable pillow made of polyester', 25.00, '../dog/Beds1.png', 'dog', 'bed'),
(224, 'wood Pet Bed ', ' Round basket made of a thick Felt fabric', 38.00, '../dog/Beds2.png', 'dog', 'bed'),
(225, 'Comfort Pet Bed ', 'High quality fabric with a wool effect ', 45.00, '../dog/Beds3.jpg', 'dog', 'bed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cust_address`
--
ALTER TABLE `cust_address`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `cust_info`
--
ALTER TABLE `cust_info`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `cust_order`
--
ALTER TABLE `cust_order`
  ADD PRIMARY KEY (`ord_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`ord_id`,`prod_id`);

--
-- Indexes for table `petinfo`
--
ALTER TABLE `petinfo`
  ADD PRIMARY KEY (`petid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cust_info`
--
ALTER TABLE `cust_info`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9793;
--
-- AUTO_INCREMENT for table `petinfo`
--
ALTER TABLE `petinfo`
  MODIFY `petid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
