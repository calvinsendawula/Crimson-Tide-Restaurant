-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2022 at 07:37 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crimson_tide_restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_order`
--

CREATE TABLE `client_order` (
  `ClientOrderNo` int(8) NOT NULL,
  `ClientUsername` varchar(255) NOT NULL,
  `CrimsonEmployeeID` int(8) DEFAULT NULL,
  `PaymentMethod` varchar(25) DEFAULT NULL,
  `Status` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_order`
--

INSERT INTO `client_order` (`ClientOrderNo`, `ClientUsername`, `CrimsonEmployeeID`, `PaymentMethod`, `Status`) VALUES
(1, 'user1', NULL, 'MPesa', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `client_order_bill`
--

CREATE TABLE `client_order_bill` (
  `ClientOrderBillNo` int(8) NOT NULL,
  `ClientOrderNo` int(8) NOT NULL,
  `ClientOrderBillAmountDue` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `crimson_client`
--

CREATE TABLE `crimson_client` (
  `clientUsername` varchar(25) NOT NULL,
  `clientFName` varchar(25) NOT NULL,
  `clientLName` varchar(25) NOT NULL,
  `clientPhone` int(9) NOT NULL,
  `clientEmail` varchar(50) NOT NULL,
  `clientPassword` varchar(25) NOT NULL,
  `clientLocation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crimson_client`
--

INSERT INTO `crimson_client` (`clientUsername`, `clientFName`, `clientLName`, `clientPhone`, `clientEmail`, `clientPassword`, `clientLocation`) VALUES
('Alexander', 'Alex', 'Mackay', 0, '0ce8d2e42af5f9a0b0b8471401139f75', '83793ed6cf29f5645247d2a1a', '382ae1a27634c52e8be2d78f8d03636a'),
('CalvinSendawulaJonathan', 'Calvin', 'Sendawula', 191, '0ce8d2e42af5f9a0b0b8471401139f75', 'e0d556576a836db73c2a17653', '1b4f30adfe708c3ea47fe1127374ed90'),
('Client1', 'Client', 'One', 2147483647, 'client1@gmail.com', 'Client1', 'Plot 25, 5th Avenue, Madaraka'),
('Client2', 'Client', 'Two', 2147483647, 'client2@gmail.com', 'Client2', 'Phenom Langata'),
('Henry', 'Henry', 'Mackay', 6178847, '0ce8d2e42af5f9a0b0b8471401139f75', 'ca8ae5e5b7d96492234560377', '382ae1a27634c52e8be2d78f8d03636a'),
('personx', 'Susan', 'Ndabirawo', 191, 'fec421a6b14f62aa6306da34e9a10f6c', 'e0d556576a836db73c2a17653', '6b92ce8611d847d655d30c64f8070474'),
('SamFender', 'Sam', 'Fender', 738291042, 'samfender@gmail.com', 'TheRealSamFender', 'Geordie North East'),
('TemmyAlto', 'Temmy', 'Alto', 3711, '4f0681f154bfa4e4a781de453a1c86fc', 'TemmyAlto1', '1b4f30adfe708c3ea47fe1127374ed90'),
('user1', 'user1', 'ditto', 337843312, '59029276955677351421b3ff6bf5ee4c', 'user1', '382ae1a27634c52e8be2d78f8d03636a');

-- --------------------------------------------------------

--
-- Table structure for table `crimson_employee`
--

CREATE TABLE `crimson_employee` (
  `CrimsonEmployeeID` int(8) NOT NULL,
  `CrimsonEmployeeUsername` varchar(25) NOT NULL,
  `CrimsonEmployeeFName` varchar(25) NOT NULL,
  `CrimsonEmployeeLName` varchar(25) NOT NULL,
  `CrimsonEmployeePhoneNo` int(9) NOT NULL,
  `CrimsonEmployeeEmail` varchar(50) NOT NULL,
  `CrimsonEmployeePassword` varchar(25) NOT NULL,
  `CrimsonEmployeePhysicalAddress` varchar(50) NOT NULL,
  `CrimsonEmployeePostalAddress` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crimson_employee`
--

INSERT INTO `crimson_employee` (`CrimsonEmployeeID`, `CrimsonEmployeeUsername`, `CrimsonEmployeeFName`, `CrimsonEmployeeLName`, `CrimsonEmployeePhoneNo`, `CrimsonEmployeeEmail`, `CrimsonEmployeePassword`, `CrimsonEmployeePhysicalAddress`, `CrimsonEmployeePostalAddress`) VALUES
(90282500, 'CalvinSendawulaJonathan', 'Susan', 'Ndabirawo', 191, 'fec421a6b14f62aa6306da34e9a10f6c', 'e0d556576a836db73c2a17653', '9c06be7bcc95bd08338b0716583f10e8', '73bf2af5a67c2ab880de63472503d300'),
(90282501, 'Henry', 'Henry', 'Mackay', 23, '0ce8d2e42af5f9a0b0b8471401139f75', '58d17582a05d81dbc970a2fb5', '9c06be7bcc95bd08338b0716583f10e8', '73bf2af5a67c2ab880de63472503d300'),
(90282502, 'admin1', 'admin1', 'ditto', 0, '4c3d30db18c7e79e27be78c175b7c0a6', 'admin1', 'a1af817842ea89581575b7892aeecb74', '02f5f449560acd3d1d6179e01e260851'),
(90282507, 'Admin1', 'Admin', 'One', 2147483647, 'admin1@gmail.com', 'Admin1', 'Plot 10 Hannington Road', 'P.o.Box 2817');

-- --------------------------------------------------------

--
-- Table structure for table `crimson_menu_item`
--

CREATE TABLE `crimson_menu_item` (
  `CrimsonMenuItemID` int(8) NOT NULL,
  `CrimsonMenuItemName` varchar(255) NOT NULL,
  `CrimsonMenuItemStockAvailable` int(8) NOT NULL,
  `CrimsonMenuItemDiscount` int(3) DEFAULT NULL,
  `CrimsonMenuItemImagePath` varchar(255) NOT NULL,
  `CrimsonMenuItemPrice` int(5) NOT NULL,
  `CrimsonMenuItemDescription` varchar(1000) NOT NULL,
  `CrimsonMenuItemCategory` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crimson_menu_item`
--

INSERT INTO `crimson_menu_item` (`CrimsonMenuItemID`, `CrimsonMenuItemName`, `CrimsonMenuItemStockAvailable`, `CrimsonMenuItemDiscount`, `CrimsonMenuItemImagePath`, `CrimsonMenuItemPrice`, `CrimsonMenuItemDescription`, `CrimsonMenuItemCategory`) VALUES
(89505991, 'Omelette', 30, 40, 'omelette.jpg', 200, 'Just your average spiced omelette.', 'Breakfast Meals'),
(89505992, 'Supreme Burger', 25, 40, 'burger1.jpg', 510, '+ 1 free side of fries + Free bacon strips (optional) + 1 free soda of choice', 'Fast Food Specials'),
(89505993, 'Fries-Attack', 100, 40, 'fries1.jpg', 450, '+ 1 free cappucino (Medium) + Free bacon strips (optional)', 'Fast Food Specials'),
(89505994, 'Linguido Pizza', 50, 40, 'pizza1.jpg', 1020, '+ 1 free side of fries + 1 free soda of choice', 'Fast Food Specials'),
(89505995, 'Popeye Gravy Boat Pancake', 49, 40, 'breakfast1.jpg', 850, '+ 1 gravy boat + Butter(optional) + 1 free cappucino(optional)', 'Breakfast Meals'),
(89505996, 'Ceasar Omelette', 93, 40, 'breakfast2.jpg', 700, 'Onions, tomato, green pepper, green chilli. Served with (white or brown) toast and hash browns', 'Breakfast Meals'),
(89505997, 'Crimson Breakfast', 20, 40, 'breakfast3.jpg', 630, '2 eggs, 2 sausages, chips, bacon, beans in sauce, toast & choice of minute maid juice, Kenyan Tea or House Coffee', 'Breakfast Meals'),
(89505998, 'Fish Fillet', 38, 40, 'lunch&dinner1.jpg', 1850, 'Medium Serving. Perfectly grilled and deliciously served, sushi option available.', 'Lunch And Dinner'),
(89505999, 'Beef with Garlic - 300gm', 27, 40, 'lunch&dinner2.jpg', 1750, 'Tender & juicy steak with a rich brown garlic sauce that\'s out of this world good!', 'Lunch And Dinner'),
(89506000, 'Beef Crown', 23, 40, 'lunch&dinner3.jpg', 570, 'Steak fingers served with ugali/rice/chapati & greens', 'Lunch And Dinner'),
(89506007, 'food1', 39, 30, 'apple-on-books.jpg', 150, 'Tasty Apple', 'Fruits'),
(89506008, 'food2', 48, 40, 'Banner-cuisine.jpg', 550, 'Sweet Red Wine', 'Drinks'),
(89506009, 'food3', 37, 40, 'biryani.jpg', 330, 'Chicken Biryani', 'Lunch&Dinner');

-- --------------------------------------------------------

--
-- Table structure for table `crimson_menu_items_ordered`
--

CREATE TABLE `crimson_menu_items_ordered` (
  `ClientOrderNo` int(8) NOT NULL,
  `CrimsonMenuItemID` int(8) NOT NULL,
  `CrimsonMenuItemQty` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crimson_menu_items_ordered`
--

INSERT INTO `crimson_menu_items_ordered` (`ClientOrderNo`, `CrimsonMenuItemID`, `CrimsonMenuItemQty`) VALUES
(1, 89505993, 1),
(1, 89505995, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_order`
--
ALTER TABLE `client_order`
  ADD PRIMARY KEY (`ClientOrderNo`);

--
-- Indexes for table `client_order_bill`
--
ALTER TABLE `client_order_bill`
  ADD PRIMARY KEY (`ClientOrderBillNo`);

--
-- Indexes for table `crimson_client`
--
ALTER TABLE `crimson_client`
  ADD PRIMARY KEY (`clientUsername`);

--
-- Indexes for table `crimson_employee`
--
ALTER TABLE `crimson_employee`
  ADD PRIMARY KEY (`CrimsonEmployeeID`);

--
-- Indexes for table `crimson_menu_item`
--
ALTER TABLE `crimson_menu_item`
  ADD PRIMARY KEY (`CrimsonMenuItemID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_order`
--
ALTER TABLE `client_order`
  MODIFY `ClientOrderNo` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client_order_bill`
--
ALTER TABLE `client_order_bill`
  MODIFY `ClientOrderBillNo` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crimson_employee`
--
ALTER TABLE `crimson_employee`
  MODIFY `CrimsonEmployeeID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90282508;

--
-- AUTO_INCREMENT for table `crimson_menu_item`
--
ALTER TABLE `crimson_menu_item`
  MODIFY `CrimsonMenuItemID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89506010;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
