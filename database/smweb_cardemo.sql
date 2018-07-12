-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2018 at 02:09 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smweb_cardemo`
--

-- --------------------------------------------------------

--
-- Table structure for table `sm_admin_users`
--

CREATE TABLE `sm_admin_users` (
  `UserId` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Mobile` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Address` text NOT NULL,
  `Image` text NOT NULL,
  `IsActive` int(11) NOT NULL COMMENT '1 for active 0 for block',
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` datetime NOT NULL,
  `RevisedBy` int(11) NOT NULL,
  `RevisedOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sm_admin_users`
--

INSERT INTO `sm_admin_users` (`UserId`, `Name`, `Mobile`, `Email`, `Password`, `Address`, `Image`, `IsActive`, `CreatedBy`, `CreatedOn`, `RevisedBy`, `RevisedOn`) VALUES
(1, 'Shyam Maurya', '9415592060', 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'bhayandar west', '', 1, 1, '2018-07-12 15:37:36', 0, '2018-07-12 15:37:36');

-- --------------------------------------------------------

--
-- Table structure for table `sm_car_models`
--

CREATE TABLE `sm_car_models` (
  `ModelId` int(11) NOT NULL,
  `MfId` int(11) NOT NULL,
  `ModelName` varchar(255) NOT NULL,
  `Color` varchar(50) NOT NULL,
  `MfYear` varchar(50) NOT NULL,
  `RegistrationNumber` varchar(50) NOT NULL,
  `Note` text NOT NULL,
  `Img1` varchar(255) NOT NULL,
  `Img2` varchar(50) NOT NULL,
  `IsActive` int(11) NOT NULL COMMENT '1 for active 0 for sold',
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` datetime NOT NULL,
  `RevisedBy` int(11) NOT NULL,
  `RevisedOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sm_car_models`
--

INSERT INTO `sm_car_models` (`ModelId`, `MfId`, `ModelName`, `Color`, `MfYear`, `RegistrationNumber`, `Note`, `Img1`, `Img2`, `IsActive`, `CreatedBy`, `CreatedOn`, `RevisedBy`, `RevisedOn`) VALUES
(1, 4, 'i10', 'Red', '2010', '2010050942', 'test car', 'test1.jpg', 'test2.jpg', 1, 1, '2018-07-12 18:57:21', 0, '0000-00-00 00:00:00'),
(2, 2, 'indigo', 'White', '2011', 'MH04 2010', '', 'test2.jpg', 'maserati-levante.jpg', 1, 1, '2018-07-12 18:58:32', 0, '0000-00-00 00:00:00'),
(3, 4, 'i20', 'Red', '2015', 'MH 45 0509', 'Test', 'Image015313158960.png', 'Image115313937070.jpg', 1, 1, '2018-07-12 19:01:36', 0, '0000-00-00 00:00:00'),
(4, 4, 'i20', 'Black', '2015', 'MH 04 05 7811', 'testt gg', 'Image015313160270.png', 'Image115313937070.jpg', 1, 1, '2018-07-12 19:03:47', 0, '0000-00-00 00:00:00'),
(7, 5, 'Mahindra', 'black', '2016', 'MH 10 7898', '200 dsf', 'Image015313937070.jpg', 'Image115313937070.jpg', 1, 1, '2018-07-12 16:38:27', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sm_manufacturer`
--

CREATE TABLE `sm_manufacturer` (
  `MfId` int(11) NOT NULL,
  `Manufacturer` varchar(255) NOT NULL,
  `IsActive` int(11) NOT NULL DEFAULT '1' COMMENT '0 for block 1 for Active',
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` datetime NOT NULL,
  `RevisedBy` int(11) NOT NULL,
  `RevisedOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sm_manufacturer`
--

INSERT INTO `sm_manufacturer` (`MfId`, `Manufacturer`, `IsActive`, `CreatedBy`, `CreatedOn`, `RevisedBy`, `RevisedOn`) VALUES
(1, 'Maruti Suzaki', 1, 1, '2018-07-12 18:53:31', 0, '0000-00-00 00:00:00'),
(2, 'TATA', 1, 1, '2018-07-12 18:53:39', 0, '0000-00-00 00:00:00'),
(3, 'Ford', 1, 1, '2018-07-12 18:53:47', 0, '0000-00-00 00:00:00'),
(4, 'Honda', 1, 1, '2018-07-12 18:56:36', 0, '0000-00-00 00:00:00'),
(5, 'Mahindra', 1, 1, '2018-07-12 16:29:54', 0, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sm_admin_users`
--
ALTER TABLE `sm_admin_users`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `sm_car_models`
--
ALTER TABLE `sm_car_models`
  ADD PRIMARY KEY (`ModelId`);

--
-- Indexes for table `sm_manufacturer`
--
ALTER TABLE `sm_manufacturer`
  ADD PRIMARY KEY (`MfId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sm_admin_users`
--
ALTER TABLE `sm_admin_users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sm_car_models`
--
ALTER TABLE `sm_car_models`
  MODIFY `ModelId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sm_manufacturer`
--
ALTER TABLE `sm_manufacturer`
  MODIFY `MfId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
