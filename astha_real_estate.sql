-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 24, 2024 at 11:21 AM
-- Server version: 8.0.36-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `astha_real_estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(6, 'Test'),
(7, 'Test 2'),
(8, 'Tes 3');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `query` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` bigint UNSIGNED NOT NULL,
  `usersPropertiesId` bigint UNSIGNED NOT NULL,
  `feedback` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `propertyId` int DEFAULT NULL,
  `userId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` bigint UNSIGNED NOT NULL,
  `transactionId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transctionType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int NOT NULL,
  `usersPropertiesId` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `transactionId`, `transctionType`, `amount`, `usersPropertiesId`) VALUES
(1, '1582485399214731', 'Cash On Delivery', 200, 4);

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoryId` bigint UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `googleMapAddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalPrice` double(10,2) DEFAULT NULL,
  `area` double DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `name`, `description`, `categoryId`, `address`, `googleMapAddress`, `totalPrice`, `area`, `date_created`, `image_1`, `image_2`, `image_3`, `image_4`, `image_5`) VALUES
(9, 'Zane  updated', 'Rem updated', 6, 'Dolor updated', '', 1998.00, 1999, '2024-04-18 22:33:20', 'asset/media/662847d34180b.jpg', 'asset/media/662847d34381d.jpg', 'asset/media/662847d345006.jpg', 'asset/media/662847d34609a.jpg', 'asset/media/662847d3474a5.jpg'),
(15, 'Quyn Chandler', 'Nam mollitia veniam', 8, 'Cupidatat id culpa u', '', 215.00, 84, '2024-04-18 22:33:20', 'asset/media/662847bc18534.jpg', 'asset/media/662847bc1a681.jpg', 'asset/media/662847bc1bbe5.jpg', 'asset/media/662847bc1d223.jpg', 'asset/media/662847bc1eb26.jpg'),
(16, 'Clementine Porter', 'Officia in culpa pr', 6, 'Voluptas suscipit is', '', 690.00, 75, '2024-04-18 22:33:49', 'asset/media/662847f230517.jpg', 'asset/media/662847f232586.jpg', 'asset/media/662847f233dd0.jpg', 'asset/media/662847f234fce.jpg', 'asset/media/662847f235fce.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `phone`, `password`, `isAdmin`) VALUES
(4, 'Dean', 'Russo', 'rahyp@mailinator.com', '11', '0e7517141fb53f21ee439b355b5a1d0a', 1),
(5, 'Renee', 'Fields', 'fycequs@mailinator.com', '23', '0e7517141fb53f21ee439b355b5a1d0a', 0),
(6, 'Karleigh', 'Mcintosh', 'qywag@mailinator.com', '6', '0e7517141fb53f21ee439b355b5a1d0a', 0),
(7, 'Sharon', 'Schmidt', 'zumoqoka@mailinator.com', '9', '0e7517141fb53f21ee439b355b5a1d0a', 0),
(8, 'Conan', 'Macias', 'wekurijuwu@mailinator.com', '64', '0e7517141fb53f21ee439b355b5a1d0a', 0),
(9, 'Vanna', 'Mcbride', 'qycah@mailinator.com', '72', '0e7517141fb53f21ee439b355b5a1d0a', 0),
(10, 'PJ', 'Par', 'paresh@gmail.com', '1234', '81dc9bdb52d04dc20036dbd8313ed055', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usersproperties`
--

CREATE TABLE `usersproperties` (
  `id` bigint UNSIGNED NOT NULL,
  `userId` bigint UNSIGNED NOT NULL,
  `propertyId` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usersproperties`
--

INSERT INTO `usersproperties` (`id`, `userId`, `propertyId`) VALUES
(4, 4, 9),
(5, 4, 9),
(6, 4, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedbacks_userspropertiesid_foreign` (`usersPropertiesId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_userspropertiesid_foreign` (`usersPropertiesId`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `properties_categoryid_foreign` (`categoryId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersproperties`
--
ALTER TABLE `usersproperties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usersproperties_userid_foreign` (`userId`),
  ADD KEY `usersproperties_propertyid_foreign` (`propertyId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `usersproperties`
--
ALTER TABLE `usersproperties`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_userspropertiesid_foreign` FOREIGN KEY (`usersPropertiesId`) REFERENCES `usersproperties` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_userspropertiesid_foreign` FOREIGN KEY (`usersPropertiesId`) REFERENCES `usersproperties` (`id`);

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_categoryid_foreign` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`);

--
-- Constraints for table `usersproperties`
--
ALTER TABLE `usersproperties`
  ADD CONSTRAINT `usersproperties_propertyid_foreign` FOREIGN KEY (`propertyId`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `usersproperties_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
