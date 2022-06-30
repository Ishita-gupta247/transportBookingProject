-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2022 at 10:59 AM
-- Server version: 10.6.5-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookingproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`adminId`, `adminName`, `password`) VALUES
(1, 'ishitaGupta', 'erty90'),
(2, 'payalGupta', 'yui89');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(15) NOT NULL,
  `categoryId` int(15) NOT NULL,
  `bookingTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `numTickets` int(15) NOT NULL DEFAULT 1,
  `finalPrice` int(50) NOT NULL,
  `customerName` varchar(200) NOT NULL,
  `paymentMode` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Ongoing',
  `customerId` int(20) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `categoryId`, `bookingTime`, `numTickets`, `finalPrice`, `customerName`, `paymentMode`, `status`, `customerId`, `address`) VALUES
(52, 1, '2022-06-23 07:49:19', 1, 6500, 'Ishita gupta ', 'credit', 'cancel', 1, 'gandhiNagar,Delhi'),
(53, 1, '2022-06-23 07:31:24', 1, 6500, 'Ishita gupta ', 'credit', 'success', 1, 'gandhiNagar,Delhi'),
(57, 1, '2022-06-23 07:37:00', 1, 6500, 'Ishita gupta ', 'credit', 'success', 1, 'gandhiNagar,Delhi'),
(58, 1, '2022-06-23 08:19:49', 1, 5800, 'Ishita gupta ', 'credit', 'success', 2, 'gandhiNagar,Delhi'),
(59, 3, '2022-06-23 08:21:15', 1, 5900, 'aleena', 'upi', 'success', 3, '32-appt,rohini'),
(60, 3, '2022-06-23 08:28:26', 1, 5900, 'aleena', 'upi', 'success', 3, '32-appt,rohini');

-- --------------------------------------------------------

--
-- Table structure for table `carddetails`
--

CREATE TABLE `carddetails` (
  `id` int(15) NOT NULL,
  `customerId` int(11) NOT NULL,
  `cardNumber` int(255) NOT NULL,
  `nameOnCard` varchar(200) NOT NULL,
  `securityCode` varchar(200) NOT NULL,
  `expiryDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carddetails`
--

INSERT INTO `carddetails` (`id`, `customerId`, `cardNumber`, `nameOnCard`, `securityCode`, `expiryDate`) VALUES
(8, 1, 78823, 'ruyi', 'rye93-2', '2025-07-23'),
(9, 2, 34678, 'ishita', 'tui7870', '2024-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `station1` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `cstatus` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `type`, `station1`, `destination`, `price`, `startTime`, `endTime`, `startDate`, `endDate`, `cstatus`) VALUES
(1, 'aeroplane', 'economics', 'delhi', 'chennai', 5800, '13:37:55', '15:37:55', '2022-06-25', '2022-06-25', 'success'),
(2, 'aeroplane', 'business', 'delhi', 'sikkim', 5900, '09:37:55', '12:37:55', '2022-06-28', '2022-06-28', 'success'),
(3, 'train', 'Ac', 'kashmir', 'jammu', 5900, '12:42:44', '14:42:44', '2022-07-08', '2022-07-09', 'success'),
(17, 'Bus', 'nonAc', 'kasouli', 'dehradun', 1200, '18:19:00', '15:15:00', '2022-06-30', '2022-07-01', 'cancel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `carddetails`
--
ALTER TABLE `carddetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cardNum` (`cardNumber`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `carddetails`
--
ALTER TABLE `carddetails`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
