-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 11, 2020 at 09:06 PM
-- Server version: 8.0.13-4
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vAYVZyoYeD`
--
CREATE DATABASE IF NOT EXISTS `vAYVZyoYeD` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `vAYVZyoYeD`;

-- --------------------------------------------------------

--
-- Table structure for table `clientProfile`
--

CREATE TABLE `clientProfile` (
  `clientId` int(11) NOT NULL,
  `clientUserId` int(11) DEFAULT NULL,
  `clientName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `clientAddress1` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `clientAddress2` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'None',
  `clientCity` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `clientState` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `clientZip` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clientProfile`
--

INSERT INTO `clientProfile` (`clientId`, `clientUserId`, `clientName`, `clientAddress1`, `clientAddress2`, `clientCity`, `clientState`, `clientZip`) VALUES
(35, 8, 'Michael A', '6343 Edloe St.', '234', 'Houston', 'AZ', 77005),
(36, 4, 'Han bui', '6109 Adair Dr', '', 'Austin', 'TX', 78754),
(37, 7, 'Demo User', '12345 Road rd', '', 'Houston', 'TE', 77888),
(38, 5, 'Demo USERR', '11122 Updown blvd', '', 'Hoiston', 'TE', 78766);

-- --------------------------------------------------------

--
-- Table structure for table `fuelQuote`
--

CREATE TABLE `fuelQuote` (
  `quoteId` int(11) NOT NULL,
  `quoteClientId` int(11) DEFAULT NULL,
  `quoteGallons` int(11) DEFAULT '0',
  `quoteDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `quotePPG` decimal(10,3) DEFAULT '0.000',
  `quoteTotal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quoteDeliveryDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fuelQuote`
--

INSERT INTO `fuelQuote` (`quoteId`, `quoteClientId`, `quoteGallons`, `quotePPG`, `quoteTotal`, `quoteDeliveryDate`) VALUES
(1, 37, 1000, '2.590', '2590.00', NULL),
(2, 36, 200, '2.700', '540.00', '2020-07-31'),
(3, 37, 100, '3.400', '340.00', NULL),
(4, 38, 500, '3.400', '1600.00', NULL),
(5, 37, 300, '3.000', '1000.00', NULL),
(12, 38, 100, '2.750', '1000.00', '2002-10-08'),
(14, 35, 10, NULL, NULL, '2020-07-15'),
(15, 35, 10, NULL, NULL, '2020-07-16'),
(16, 35, 10, '0.000', '0.00', '2020-07-16'),
(17, 35, 10, '0.000', '0.00', '2020-07-15'),
(18, 35, 15, '0.000', '0.00', '2020-07-17'),
(36, 36, 3000, '1.695', '0.00', '2222-02-01'),
(37, 36, 20, '1.710', '34.20', '2034-11-23'),
(38, 36, 33, '1.710', '56.43', '2020-08-18'),
(39, 36, 200, '1.710', '342.00', '2020-02-21'),
(40, 36, 500, '1.710', '855.00', '2020-07-22'),
(41, 36, 600, '1.710', '1,026.00', '2020-07-15'),
(42, 36, 1500, '1.695', '2,542.50', '2020-08-19'),
(43, 36, 1500, '1.695', '2,542.50', '1553-02-03'),
(44, 36, 500, '1.710', '855.00', '2020-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `pwdReset`
--

CREATE TABLE `pwdReset` (
  `pwdResetID` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userCredentials`
--

CREATE TABLE `userCredentials` (
  `userId` int(11) NOT NULL,
  `userEmail` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userName` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userPassword` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userRole` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'client'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userCredentials`
--

INSERT INTO `userCredentials` (`userId`, `userEmail`, `userName`, `userPassword`, `userRole`) VALUES
(4, 'info.viponline@yahoo.com.vn', 'infoviponline', '$2y$10$x/eXu9KJ4JXNbWREphZ3QeYnUjZQA28i7.9uwPLyySRBi1yXQUFc.', 'client'),
(5, 'demo@gmail.com', 'demoUser', '$2y$10$22wywkHPjP0CIjRRwFz4feRi/YVhlDXtW5UYD46G9uCRON4vXKw6W', 'client'),
(7, 'demouser@gmail.com', 'demouser1', '$2y$10$22wywkHPjP0CIjRRwFz4feRi/YVhlDXtW5UYD46G9uCRON4vXKw6W', 'client'),
(8, 'michael@test.com', 'michaelTest', '$2y$10$WysaaoDAa.txuYsr366OS.3vPK5b7RIRHcX.L/mX0EE1jiKsco69K', 'client'),
(9, 'profileTest@test.com', 'profileTest', '$2y$10$e7rCQmTtA6FYq2mRsdUmW.1./PCskbXroRib2c0WIakHbf6ZCaFvy', 'client'),
(10, 'demo3@gmail.com', 'demo3', '$2y$10$gxhwyMVfyz.s6JQpYomLqO550./2YskwtYhpZGdo5T3Zyefj4Pyyq', 'client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientProfile`
--
ALTER TABLE `clientProfile`
  ADD PRIMARY KEY (`clientId`),
  ADD KEY `clientUserId` (`clientUserId`);

--
-- Indexes for table `fuelQuote`
--
ALTER TABLE `fuelQuote`
  ADD PRIMARY KEY (`quoteId`),
  ADD KEY `quoteClientId` (`quoteClientId`);

--
-- Indexes for table `pwdReset`
--
ALTER TABLE `pwdReset`
  ADD PRIMARY KEY (`pwdResetID`);

--
-- Indexes for table `userCredentials`
--
ALTER TABLE `userCredentials`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `username` (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientProfile`
--
ALTER TABLE `clientProfile`
  MODIFY `clientId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `fuelQuote`
--
ALTER TABLE `fuelQuote`
  MODIFY `quoteId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `pwdReset`
--
ALTER TABLE `pwdReset`
  MODIFY `pwdResetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `userCredentials`
--
ALTER TABLE `userCredentials`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clientProfile`
--
ALTER TABLE `clientProfile`
  ADD CONSTRAINT `clientProfile_ibfk_1` FOREIGN KEY (`clientUserId`) REFERENCES `userCredentials` (`userid`) ON UPDATE CASCADE;

--
-- Constraints for table `fuelQuote`
--
ALTER TABLE `fuelQuote`
  ADD CONSTRAINT `fuelQuote_ibfk_1` FOREIGN KEY (`quoteClientId`) REFERENCES `clientProfile` (`clientid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
