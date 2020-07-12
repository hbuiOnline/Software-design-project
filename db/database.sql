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
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
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
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `fuelQuote`
--
CREATE TABLE `fuelQuote` (
  `quoteId` int(11) NOT NULL,
  `quoteClientId` int(11) DEFAULT NULL,
  `quoteGallons` int(11) DEFAULT '0',
  `quoteDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `quotePPG` decimal(10, 3) DEFAULT '0.000',
  `quoteTotal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quoteDeliveryDate` date DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;
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
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;
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
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;
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
MODIFY `clientId` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 39;
--
-- AUTO_INCREMENT for table `fuelQuote`
--
ALTER TABLE `fuelQuote`
MODIFY `quoteId` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 45;
--
-- AUTO_INCREMENT for table `pwdReset`
--
ALTER TABLE `pwdReset`
MODIFY `pwdResetID` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 21;
--
-- AUTO_INCREMENT for table `userCredentials`
--
ALTER TABLE `userCredentials`
MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 11;
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
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;