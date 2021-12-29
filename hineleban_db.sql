-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2021 at 03:26 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hineleban_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `CartId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `transactionid` int(11) DEFAULT NULL,
  `customerId` int(11) NOT NULL,
  `updated_at` date NOT NULL DEFAULT current_timestamp(),
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`CartId`, `ProductId`, `Quantity`, `Price`, `transactionid`, `customerId`, `updated_at`, `created_at`) VALUES
(6, 2, 2, 900, 1, 777, '2021-12-28', '2021-12-28'),
(15, 2, 6, 2700, 19, 777, '2021-12-28', '2021-12-28'),
(16, 2, 2, 900, 19, 777, '2021-12-28', '2021-12-28'),
(17, 2, 3, 1350, 20, 777, '2021-12-28', '2021-12-28'),
(18, 2, 3, 1350, 20, 810, '2021-12-28', '2021-12-28'),
(19, 2, 1, 450, 21, 816, '2021-12-29', '2021-12-29'),
(20, 2, 4, 1800, 21, 816, '2021-12-29', '2021-12-29');

-- --------------------------------------------------------

--
-- Table structure for table `customertbls`
--

CREATE TABLE `customertbls` (
  `CustomerId` int(11) NOT NULL,
  `CustomerType` varchar(255) NOT NULL DEFAULT '4',
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `EmailAddress` varchar(255) NOT NULL,
  `ContactNo` varchar(255) DEFAULT NULL,
  `streetaddress` varchar(1000) DEFAULT NULL,
  `brgy` varchar(1000) DEFAULT NULL,
  `city` varchar(1000) DEFAULT NULL,
  `province` varchar(1000) DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `Password` varchar(255) NOT NULL,
  `SecurityQuestion` varchar(255) DEFAULT NULL,
  `SecurityAnswer` varchar(255) DEFAULT NULL,
  `Active` int(11) NOT NULL DEFAULT 1,
  `resourcepath` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customertbls`
--

INSERT INTO `customertbls` (`CustomerId`, `CustomerType`, `FirstName`, `LastName`, `EmailAddress`, `ContactNo`, `streetaddress`, `brgy`, `city`, `province`, `zip`, `created_at`, `updated_at`, `Password`, `SecurityQuestion`, `SecurityAnswer`, `Active`, `resourcepath`) VALUES
(777, 'Admin', 'Mayc', 'Chilean', 'test@gmail.com', '09000000000', 'Roxas St', '557', 'Manila', 'Manila', 1008, '2021-12-17 22:04:24', '0000-00-00 00:00:00', 'test', 'test', 'test', 1, 'user/5K4pkqFcbChoDkgRaxEWzesBz5gOY2jcYIP4VF5E.png'),
(816, '4', 'zeth', 'rogen', 'zeth@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-29 01:05:06', '2021-12-29 01:05:06', 'test', NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventorytbl`
--

CREATE TABLE `inventorytbl` (
  `InventoryId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `unit` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `BatchCode` varchar(255) NOT NULL,
  `ReceivedDate` date NOT NULL,
  `DateAdded` date NOT NULL,
  `DateUpdated` date DEFAULT NULL,
  `Active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventorytbl`
--

INSERT INTO `inventorytbl` (`InventoryId`, `ProductId`, `unit`, `Quantity`, `BatchCode`, `ReceivedDate`, `DateAdded`, `DateUpdated`, `Active`) VALUES
(1, 2, 1050, 10, 'B1-12172021-CP', '2021-12-17', '2021-12-17', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `joborder`
--

CREATE TABLE `joborder` (
  `JobId` int(11) NOT NULL,
  `JobOrder` varchar(500) NOT NULL,
  `ReceivedDate` datetime NOT NULL,
  `DateUpdated` datetime NOT NULL,
  `JobStatus` varchar(255) NOT NULL,
  `Active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `joborder`
--

INSERT INTO `joborder` (`JobId`, `JobOrder`, `ReceivedDate`, `DateUpdated`, `JobStatus`, `Active`) VALUES
(1, '1', '2021-12-09 20:23:11', '2021-12-03 20:23:11', 'Received', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jobstatustbl`
--

CREATE TABLE `jobstatustbl` (
  `jobstatusid` int(11) NOT NULL,
  `joname` varchar(100) NOT NULL,
  `jodesc` varchar(1000) NOT NULL,
  `updated_at` date NOT NULL DEFAULT current_timestamp(),
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobstatustbl`
--

INSERT INTO `jobstatustbl` (`jobstatusid`, `joname`, `jodesc`, `updated_at`, `created_at`) VALUES
(1, 'Pending Approval', 'Pending Approval', '0000-00-00', '0000-00-00'),
(2, 'Approved', 'Approved', '0000-00-00', '0000-00-00'),
(3, 'Preparing', 'Preparing', '2021-12-01', '2021-12-02'),
(4, 'Picked up', 'Picked up', '2021-12-02', '2021-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `ordertbl`
--

CREATE TABLE `ordertbl` (
  `OrderId` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `orderQty` int(11) NOT NULL,
  `Price` double NOT NULL,
  `OrderDate` date NOT NULL,
  `OrderStatus` date DEFAULT NULL,
  `Active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `productstbl`
--

CREATE TABLE `productstbl` (
  `ProductId` int(11) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `ProductDes` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Unit` varchar(255) NOT NULL,
  `Price` double NOT NULL,
  `MfgDate` date NOT NULL,
  `Expiration` date NOT NULL,
  `isFeatured` int(11) NOT NULL,
  `Active` int(11) NOT NULL,
  `ResourcePath` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productstbl`
--

INSERT INTO `productstbl` (`ProductId`, `ProductName`, `ProductDes`, `Category`, `Unit`, `Price`, `MfgDate`, `Expiration`, `isFeatured`, `Active`, `ResourcePath`) VALUES
(2, 'Hineleban Adlai with Abaca Ikat Bag', 'Hineleban Adlai 1kg and Abaca Ikat Bag\r\nAdlai is a delicious grain that is high in fiber, low glycemic, gluten-free and a healthier alternative to rice and pasta.  Grown in Malaybalay, Bukidnon, this heirloom grain helps you lower blood sugar and choleste', 'Christmas Package', '1050', 450, '2021-12-17', '2022-01-21', 1, 1, 'user/Hineleban-Adlai-1kg-P350.png');

-- --------------------------------------------------------

--
-- Table structure for table `rolestbl`
--

CREATE TABLE `rolestbl` (
  `RoleId` int(11) NOT NULL,
  `RoleName` varchar(255) DEFAULT NULL,
  `RoleDesc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rolestbl`
--

INSERT INTO `rolestbl` (`RoleId`, `RoleName`, `RoleDesc`) VALUES
(1, 'admin', 'Site Developer'),
(2, 'adminOwner', 'CompanyOwner'),
(3, 'adminUser', 'Company Manager'),
(4, 'AreaManager', 'Area Manager'),
(5, 'SalesManager', 'Sales Manager'),
(6, 'AssistantSalesManager', 'Assistant Sales Manager');

-- --------------------------------------------------------

--
-- Table structure for table `transactiontbls`
--

CREATE TABLE `transactiontbls` (
  `transactionid` int(11) NOT NULL,
  `mop` varchar(1000) DEFAULT NULL,
  `transfer` varchar(1000) NOT NULL,
  `totalPrice` decimal(10,0) NOT NULL,
  `jobstatusid` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `updated_at` date NOT NULL DEFAULT current_timestamp(),
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactiontbls`
--

INSERT INTO `transactiontbls` (`transactionid`, `mop`, `transfer`, `totalPrice`, `jobstatusid`, `customerid`, `updated_at`, `created_at`) VALUES
(1, 'bank', 'grablalamove', '900', 1, 777, '2021-12-29', '2021-12-29'),
(18, NULL, 'graborlalamove', '2250', 1, 777, '2021-12-28', '2021-12-28'),
(19, NULL, 'graborlalamove', '3600', 1, 777, '2021-12-28', '2021-12-28'),
(20, NULL, 'graborlalamove', '1350', 1, 810, '2021-12-28', '2021-12-28'),
(21, NULL, 'lbc', '2250', 1, 816, '2021-12-29', '2021-12-29');

-- --------------------------------------------------------

--
-- Table structure for table `usertbl`
--

CREATE TABLE `usertbl` (
  `UserId` int(255) NOT NULL,
  `FirstName` varchar(1000) DEFAULT NULL,
  `LastName` varchar(1000) DEFAULT NULL,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `EmailAddress` varchar(255) NOT NULL,
  `UserRole` int(11) NOT NULL,
  `SecurityQuestion` varchar(255) DEFAULT NULL,
  `SecurityAnswer` varchar(255) DEFAULT NULL,
  `dateAdded` datetime DEFAULT NULL,
  `dateUpdated` datetime DEFAULT NULL,
  `Restrictions` varchar(255) DEFAULT NULL,
  `Active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertbl`
--

INSERT INTO `usertbl` (`UserId`, `FirstName`, `LastName`, `UserName`, `Password`, `EmailAddress`, `UserRole`, `SecurityQuestion`, `SecurityAnswer`, `dateAdded`, `dateUpdated`, `Restrictions`, `Active`) VALUES
(1, 'Mayc', 'Chiles', 'admin', 'admin', 'admin@gmail.com', 1, '', NULL, '2021-12-17 22:07:26', '2021-12-29 09:35:01', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`CartId`);

--
-- Indexes for table `customertbls`
--
ALTER TABLE `customertbls`
  ADD PRIMARY KEY (`CustomerId`);

--
-- Indexes for table `inventorytbl`
--
ALTER TABLE `inventorytbl`
  ADD PRIMARY KEY (`InventoryId`);

--
-- Indexes for table `joborder`
--
ALTER TABLE `joborder`
  ADD PRIMARY KEY (`JobId`);

--
-- Indexes for table `jobstatustbl`
--
ALTER TABLE `jobstatustbl`
  ADD PRIMARY KEY (`jobstatusid`);

--
-- Indexes for table `ordertbl`
--
ALTER TABLE `ordertbl`
  ADD PRIMARY KEY (`OrderId`);

--
-- Indexes for table `productstbl`
--
ALTER TABLE `productstbl`
  ADD PRIMARY KEY (`ProductId`);

--
-- Indexes for table `rolestbl`
--
ALTER TABLE `rolestbl`
  ADD PRIMARY KEY (`RoleId`);

--
-- Indexes for table `transactiontbls`
--
ALTER TABLE `transactiontbls`
  ADD PRIMARY KEY (`transactionid`);

--
-- Indexes for table `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `CartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customertbls`
--
ALTER TABLE `customertbls`
  MODIFY `CustomerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=817;

--
-- AUTO_INCREMENT for table `inventorytbl`
--
ALTER TABLE `inventorytbl`
  MODIFY `InventoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `joborder`
--
ALTER TABLE `joborder`
  MODIFY `JobId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobstatustbl`
--
ALTER TABLE `jobstatustbl`
  MODIFY `jobstatusid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ordertbl`
--
ALTER TABLE `ordertbl`
  MODIFY `OrderId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productstbl`
--
ALTER TABLE `productstbl`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rolestbl`
--
ALTER TABLE `rolestbl`
  MODIFY `RoleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transactiontbls`
--
ALTER TABLE `transactiontbls`
  MODIFY `transactionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `UserId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
