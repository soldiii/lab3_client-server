-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 17, 2022 at 11:40 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `ID_Customer` int(11) NOT NULL,
  `CompanyName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `Phone` varchar(25) DEFAULT NULL,
  `Fax` varchar(25) DEFAULT NULL,
  `Address` longtext,
  `City` varchar(50) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`ID_Customer`, `CompanyName`, `LastName`, `FirstName`, `Phone`, `Fax`, `Address`, `City`, `Country`) VALUES
(1, 'Company A', 'Bedecs', 'Anna', '(123)555-0100', '(123)555-0101', '123 1st Street', 'Seattle', 'USA'),
(2, 'Company B', 'Gratacos Solsona', 'Antonio', '(123)555-0100', '(123)555-0101', '123 2nd Street', 'Boston', 'USA'),
(3, 'Company C', 'Axen', 'Thomas', '(123)555-0100', '(123)555-0101', '123 3rd Street', 'Los Angelas', 'USA'),
(4, 'Company D', 'Lee', 'Christina', '(123)555-0100', '(123)555-0101', '123 4th Street', 'New York', 'USA'),
(5, 'Company E', 'O’Donnell', 'Martin', '(123)555-0100', '(123)555-0101', '123 5th Street', 'Minneapolis', 'USA'),
(6, 'Company F', 'Pérez-Olaeta', 'Francisco', '(123)555-0100', '(123)555-0101', '123 6th Street', 'Milwaukee', 'USA'),
(7, 'Company G', 'Xie', 'Ming-Yang', '(123)555-0100', '(123)555-0101', '123 7th Street', 'Boise', 'USA'),
(8, 'Company H', 'Andersen', 'Elizabeth', '(123)555-0100', '(123)555-0101', '123 8th Street', 'Portland', 'USA'),
(9, 'Company I', 'Mortensen', 'Sven', '(123)555-0100', '(123)555-0101', '123 9th Street', 'Salt Lake City', 'USA'),
(10, 'Company J', 'Wacker', 'Roland', '(123)555-0100', '(123)555-0101', '123 10th Street', 'Chicago', 'USA'),
(11, 'Company K', 'Krschne', 'Peter', '(123)555-0100', '(123)555-0101', '123 11th Street', 'Miami', 'USA'),
(12, 'Company L', 'Edwards', 'John', '(123)555-0100', '(123)555-0101', '123 12th Street', 'Las Vegas', 'USA'),
(13, 'Company M', 'Ludick', 'Andre', '(123)555-0100', '(123)555-0101', '456 13th Street', 'Memphis', 'USA'),
(14, 'Company N', 'Grilo', 'Carlos', '(123)555-0100', '(123)555-0101', '456 14th Street', 'Denver', 'USA'),
(15, 'Company O', 'Kupkova', 'Helena', '(123)555-0100', '(123)555-0101', '456 15th Street', 'Honolulu', 'USA'),
(16, 'Company P', 'Goldschmidt', 'Daniel', '(123)555-0100', '(123)555-0101', '456 16th Street', 'San Francisco', 'USA'),
(17, 'Company Q', 'Bagel', 'Jean Philippe', '(123)555-0100', '(123)555-0101', '456 17th Street', 'Seattle', 'USA'),
(18, 'Company R', 'Autier Miconi', 'Catherine', '(123)555-0100', '(123)555-0101', '456 18th Street', 'Boston', 'USA'),
(19, 'Company S', 'Eggerer', 'Alexander', '(123)555-0100', '(123)555-0101', '789 19th Street', 'Los Angelas', 'USA'),
(20, 'Company T', 'Li', 'George', '(123)555-0100', '(123)555-0101', '789 20th Street', 'New York', 'USA'),
(21, 'Company U', 'Tham', 'Bernard', '(123)555-0100', '(123)555-0101', '789 21th Street', 'Minneapolis', 'USA'),
(22, 'Company V', 'Ramos', 'Luciana', '(123)555-0100', '(123)555-0101', '789 22th Street', 'Milwaukee', 'USA'),
(23, 'Company W', 'Entin', 'Michael', '(123)555-0100', '(123)555-0101', '789 23th Street', 'Portland', 'USA'),
(24, 'Company X', 'Hasselberg', 'Jonas', '(123)555-0100', '(123)555-0101', '789 24th Street', 'Salt Lake City', 'USA'),
(25, 'Company Y', 'Rodman', 'John', '(123)555-0100', '(123)555-0101', '789 25th Street', 'Chicago', 'USA'),
(26, 'Company Z', 'Liu', 'Run', '(123)555-0100', '(123)555-0101', '789 26th Street', 'Miami', 'USA'),
(27, 'Company AA', 'Toh', 'Karen', '(123)555-0100', '(123)555-0101', '789 27th Street', 'Las Vegas', 'USA'),
(28, 'Company BB', 'Raghav', 'Amritansh', '(123)555-0100', '(123)555-0101', '789 28th Street', 'Memphis', 'USA'),
(29, 'Company CC', 'Lee', 'Soo Jung', '(123)555-0100', '(123)555-0101', '789 29th Street', 'Denver', 'USA'),
(30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID_Order` int(11) NOT NULL,
  `ID_Customer` int(11) DEFAULT NULL,
  `OrderDate` datetime DEFAULT NULL,
  `DeliveryDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ID_Order`, `ID_Customer`, `OrderDate`, `DeliveryDate`) VALUES
(30, 27, '2006-01-15 00:00:00', '2006-01-22 00:00:00'),
(31, 4, '2006-01-20 00:00:00', '2006-01-22 00:00:00'),
(32, 12, '2006-01-22 00:00:00', '2006-01-22 00:00:00'),
(33, 8, '2006-01-30 00:00:00', '2006-01-31 00:00:00'),
(34, 4, '2006-02-06 00:00:00', '2006-02-07 00:00:00'),
(35, 29, '2006-02-10 00:00:00', '2006-02-12 00:00:00'),
(36, 3, '2006-02-23 00:00:00', '2006-02-25 00:00:00'),
(37, 6, '2006-03-06 00:00:00', '2006-03-09 00:00:00'),
(38, 28, '2006-03-10 00:00:00', '2006-03-11 00:00:00'),
(39, 8, '2006-03-22 00:00:00', '2006-03-24 00:00:00'),
(40, 10, '2006-03-24 00:00:00', '2006-03-24 00:00:00'),
(41, 7, '2006-03-24 00:00:00', NULL),
(42, 10, '2006-03-24 00:00:00', '2006-04-07 00:00:00'),
(43, 11, '2006-03-24 00:00:00', NULL),
(44, 1, '2006-03-24 00:00:00', NULL),
(45, 28, '2006-04-07 00:00:00', '2006-04-07 00:00:00'),
(46, 9, '2006-04-05 00:00:00', '2006-04-05 00:00:00'),
(47, 6, '2006-04-08 00:00:00', '2006-04-08 00:00:00'),
(48, 8, '2006-04-05 00:00:00', '2006-04-05 00:00:00'),
(50, 25, '2006-04-05 00:00:00', '2006-04-05 00:00:00'),
(51, 26, '2006-04-05 00:00:00', '2006-04-05 00:00:00'),
(55, 29, '2006-04-05 00:00:00', '2006-04-05 00:00:00'),
(56, 6, '2006-04-03 00:00:00', '2006-04-03 00:00:00'),
(57, 27, '2006-04-22 00:00:00', '2006-04-22 00:00:00'),
(58, 4, '2006-04-22 00:00:00', '2006-04-22 00:00:00'),
(59, 12, '2006-04-22 00:00:00', '2006-04-22 00:00:00'),
(60, 8, '2006-04-30 00:00:00', '2006-04-30 00:00:00'),
(61, 4, '2006-04-07 00:00:00', '2006-04-07 00:00:00'),
(62, 29, '2006-04-12 00:00:00', '2006-04-12 00:00:00'),
(63, 3, '2006-04-25 00:00:00', '2006-04-25 00:00:00'),
(64, 6, '2006-05-09 00:00:00', '2006-05-09 00:00:00'),
(65, 28, '2006-05-11 00:00:00', '2006-05-11 00:00:00'),
(66, 8, '2006-05-24 00:00:00', '2006-05-24 00:00:00'),
(67, 10, '2006-05-24 00:00:00', '2006-05-24 00:00:00'),
(68, 7, '2006-05-24 00:00:00', NULL),
(69, 10, '2006-05-24 00:00:00', NULL),
(70, 11, '2006-05-24 00:00:00', NULL),
(71, 1, '2006-05-24 00:00:00', NULL),
(72, 28, '2006-06-07 00:00:00', '2006-06-07 00:00:00'),
(73, 9, '2006-06-05 00:00:00', '2006-06-05 00:00:00'),
(74, 6, '2006-06-08 00:00:00', '2006-06-08 00:00:00'),
(75, 8, '2006-06-05 00:00:00', '2006-06-05 00:00:00'),
(76, 25, '2006-06-05 00:00:00', '2006-06-05 00:00:00'),
(77, 26, '2006-06-05 00:00:00', '2006-06-05 00:00:00'),
(78, 29, '2006-06-05 00:00:00', '2006-06-05 00:00:00'),
(79, 6, '2006-06-23 00:00:00', '2006-06-23 00:00:00'),
(80, 4, '2006-04-25 17:03:55', NULL),
(81, 3, '2006-04-25 17:26:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `ID_Order` int(11) NOT NULL,
  `ID_Product` int(11) DEFAULT NULL,
  `Quantity` decimal(18,4) NOT NULL DEFAULT '0.0000',
  `UnitPrice` decimal(19,4) DEFAULT '0.0000',
  `Discount` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`ID_Order`, `ID_Product`, `Quantity`, `UnitPrice`, `Discount`) VALUES
(30, 34, '100.0000', '14.0000', 0),
(30, 80, '30.0000', '3.5000', 0),
(31, 7, '10.0000', '30.0000', 0),
(31, 51, '10.0000', '53.0000', 0),
(31, 80, '10.0000', '3.5000', 0),
(32, 1, '15.0000', '18.0000', 0),
(32, 43, '20.0000', '46.0000', 0),
(33, 19, '30.0000', '9.2000', 0),
(34, 19, '20.0000', '9.2000', 0),
(35, 48, '10.0000', '12.7500', 0),
(36, 41, '200.0000', '9.6500', 0),
(37, 8, '17.0000', '40.0000', 0),
(38, 43, '300.0000', '46.0000', 0),
(39, 48, '100.0000', '12.7500', 0),
(40, 81, '200.0000', '2.9900', 0),
(41, 43, '300.0000', '46.0000', 0),
(42, 6, '10.0000', '25.0000', 0),
(42, 4, '10.0000', '22.0000', 0),
(42, 19, '10.0000', '9.2000', 0),
(43, 80, '20.0000', '3.5000', 0),
(43, 81, '50.0000', '2.9900', 0),
(44, 1, '25.0000', '18.0000', 0),
(44, 43, '25.0000', '46.0000', 0),
(44, 81, '25.0000', '2.9900', 0),
(45, 41, '50.0000', '9.6500', 0),
(45, 40, '50.0000', '18.4000', 0),
(46, 57, '100.0000', '19.5000', 0),
(46, 72, '50.0000', '34.8000', 0),
(47, 34, '300.0000', '14.0000', 0),
(48, 8, '25.0000', '40.0000', 0),
(48, 19, '25.0000', '9.2000', 0),
(50, 21, '20.0000', '10.0000', 0),
(51, 5, '25.0000', '21.3500', 0),
(51, 41, '30.0000', '9.6500', 0),
(51, 40, '30.0000', '18.4000', 0),
(56, 48, '10.0000', '12.7500', 0),
(55, 34, '87.0000', '14.0000', 0),
(79, 7, '30.0000', '30.0000', 0),
(79, 51, '30.0000', '53.0000', 0),
(78, 17, '40.0000', '39.0000', 0),
(77, 6, '90.0000', '25.0000', 0),
(76, 4, '30.0000', '22.0000', 0),
(75, 48, '40.0000', '12.7500', 0),
(74, 48, '40.0000', '12.7500', 0),
(73, 41, '10.0000', '9.6500', 0),
(72, 43, '5.0000', '46.0000', 0),
(71, 40, '40.0000', '18.4000', 0),
(70, 8, '20.0000', '40.0000', 0),
(69, 80, '15.0000', '3.5000', 0),
(67, 74, '20.0000', '10.0000', 0),
(60, 72, '40.0000', '34.8000', 0),
(63, 3, '50.0000', '10.0000', 0),
(63, 8, '3.0000', '40.0000', 0),
(58, 20, '40.0000', '81.0000', 0),
(58, 52, '40.0000', '7.0000', 0),
(80, 56, '10.0000', '38.0000', 0),
(81, 81, '0.0000', '2.9900', 0),
(81, 56, '0.0000', '38.0000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID_Product` int(11) NOT NULL,
  `ProductName` varchar(50) DEFAULT NULL,
  `Price` decimal(19,4) NOT NULL DEFAULT '0.0000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID_Product`, `ProductName`, `Price`) VALUES
(1, 'Northwind Traders Chai', '18.0000'),
(3, 'Northwind Traders Syrup', '10.0000'),
(4, 'Northwind Traders Cajun Seasoning', '22.0000'),
(5, 'Northwind Traders Olive Oil', '21.3500'),
(6, 'Northwind Traders Boysenberry Spread', '25.0000'),
(7, 'Northwind Traders Dried Pears', '30.0000'),
(8, 'Northwind Traders Curry Sauce', '40.0000'),
(14, 'Northwind Traders Walnuts', '23.2500'),
(17, 'Northwind Traders Fruit Cocktail', '39.0000'),
(19, 'Northwind Traders Chocolate Biscuits Mix', '9.2000'),
(20, 'Northwind Traders Marmalade', '81.0000'),
(21, 'Northwind Traders Scones', '10.0000'),
(34, 'Northwind Traders Beer', '14.0000'),
(40, 'Northwind Traders Crab Meat', '18.4000'),
(41, 'Northwind Traders Clam Chowder', '9.6500'),
(43, 'Northwind Traders Coffee', '46.0000'),
(48, 'Northwind Traders Chocolate', '12.7500'),
(51, 'Northwind Traders Dried Apples', '53.0000'),
(52, 'Northwind Traders Long Grain Rice', '7.0000'),
(56, 'Northwind Traders Gnocchi', '38.0000'),
(57, 'Northwind Traders Ravioli', '19.5000'),
(65, 'Northwind Traders Hot Pepper Sauce', '21.0500'),
(66, 'Northwind Traders Tomato Sauce', '17.0000'),
(72, 'Northwind Traders Mozzarella', '34.8000'),
(74, 'Northwind Traders Almonds', '10.0000'),
(77, 'Northwind Traders Mustard', '13.0000'),
(80, 'Northwind Traders Dried Plums', '3.5000'),
(81, 'Northwind Traders Green Tea', '2.9900'),
(82, 'Northwind Traders Granola', '4.0000'),
(83, 'Northwind Traders Potato Chips', '1.8000'),
(85, 'Northwind Traders Brownie Mix', '12.4900'),
(86, 'Northwind Traders Cake Mix', '15.9900'),
(87, 'Northwind Traders Tea', '4.0000'),
(88, 'Northwind Traders Pears', '1.3000'),
(89, 'Northwind Traders Peaches', '1.5000'),
(90, 'Northwind Traders Pineapple', '1.8000'),
(91, 'Northwind Traders Cherry Pie Filling', '2.0000'),
(92, 'Northwind Traders Green Beans', '1.2000'),
(93, 'Northwind Traders Corn', '1.2000'),
(94, 'Northwind Traders Peas', '1.5000'),
(95, 'Northwind Traders Tuna Fish', '2.0000'),
(96, 'Northwind Traders Smoked Salmon', '4.0000'),
(97, 'Northwind Traders Hot Cereal', '5.0000'),
(98, 'Northwind Traders Vegetable Soup', '1.8900'),
(99, 'Northwind Traders Chicken Soup', '1.9500'),
(100, 'test', '10.0000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`ID_Customer`),
  ADD KEY `city` (`City`),
  ADD KEY `company` (`CompanyName`),
  ADD KEY `first_name` (`FirstName`),
  ADD KEY `last_name` (`LastName`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID_Order`),
  ADD KEY `customer_id` (`ID_Customer`),
  ADD KEY `customer_id_2` (`ID_Customer`),
  ADD KEY `id` (`ID_Order`),
  ADD KEY `id_2` (`ID_Order`),
  ADD KEY `id_3` (`ID_Order`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `product_id` (`ID_Product`),
  ADD KEY `product_id_2` (`ID_Product`),
  ADD KEY `fk_order_details_orders1_idx` (`ID_Order`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID_Product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `ID_Customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID_Order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID_Product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_customers` FOREIGN KEY (`ID_Customer`) REFERENCES `customers` (`ID_Customer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_order_details_orders` FOREIGN KEY (`ID_Order`) REFERENCES `orders` (`ID_Order`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_order_details_products` FOREIGN KEY (`ID_Product`) REFERENCES `products` (`ID_Product`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
