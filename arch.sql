-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2021 at 10:49 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arch`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Parent` tinyint(255) NOT NULL DEFAULT 0,
  `Child` tinyint(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL COMMENT 'اسم الشركة',
  `CEO` varchar(255) NOT NULL COMMENT 'رئيس مجلس الادارة',
  `ASO` varchar(255) NOT NULL COMMENT 'امين السر',
  `TaxCard` varchar(20) NOT NULL COMMENT 'البطاقة الضريبية',
  `TaxFile` varchar(40) NOT NULL COMMENT 'الملف الضريبي ',
  `IndexNum` varchar(20) NOT NULL COMMENT 'السجل التجاري',
  `SetDate` varchar(11) NOT NULL DEFAULT '00-00-0000',
  `Capital` varchar(100) NOT NULL DEFAULT '0',
  `CapitalLang` varchar(255) NOT NULL,
  `Stockrs` int(11) NOT NULL COMMENT 'المساهمين',
  `Revers` int(11) NOT NULL COMMENT 'المكتتبين',
  `Address` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone1` varchar(20) NOT NULL,
  `Phone2` varchar(20) NOT NULL,
  `id_img_1` varchar(100) NOT NULL,
  `id_img_2` varchar(100) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`ID`, `Name`, `CEO`, `ASO`, `TaxCard`, `TaxFile`, `IndexNum`, `SetDate`, `Capital`, `CapitalLang`, `Stockrs`, `Revers`, `Address`, `Email`, `Phone1`, `Phone2`, `id_img_1`, `id_img_2`, `Date`) VALUES
(1, 'ghost lab', 'محمد راضي ابراهيم', 'احمد راضي بخيت', '484-848-487', '584-8-74848-484-84-48', '7998848', '01/14/2021', '100,000', '', 800, 0, 'كفر الشيخ', 'ghost@ghost.com', '01069364670', '', ' (1) البطاقة الشخصية _40.jpg', ' (2) البطاقة الشخصية _11.jpg', '2021-01-30 19:11:19'),
(2, 'النور', 'علي احمد علي', 'احمد محمود ', '484-348-545', '454-5-64638-785-41-43', '45485858', '01/01/2021', '155,454,5', '', 20, 0, 'سيدي سالم', '', '10655656595', '', ' (1) البطاقة الشخصية _50.png', ' (2) البطاقة الشخصية _63.png', '2021-01-30 19:15:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Pass` varchar(255) NOT NULL,
  `Phone` varchar(15) NOT NULL DEFAULT '0',
  `Gen_Group` tinyint(2) NOT NULL DEFAULT 0,
  `Access` tinyint(2) NOT NULL DEFAULT 0,
  `Block` tinyint(2) NOT NULL DEFAULT 0,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Name`, `Pass`, `Phone`, `Gen_Group`, `Access`, `Block`, `Date`) VALUES
(1, 'MHMED', 'd3f99473d70e8b2027c4a9a85bfd531eb8ed0037', '01069364671', 1, 0, 0, '2021-01-30 21:46:20'),
(2, 'AHMED', '8cb2237d0679ca88db6464eac60da96345513964', '01234567890', 0, 0, 0, '2021-01-31 11:44:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`),
  ADD UNIQUE KEY `TaxCard` (`TaxCard`),
  ADD UNIQUE KEY `TaxFile` (`TaxFile`),
  ADD UNIQUE KEY `IndexNum` (`IndexNum`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
