-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2023 at 06:01 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pocketmoneyms`
--

-- --------------------------------------------------------

--
-- Table structure for table `acount`
--

CREATE TABLE IF NOT EXISTS `acount` (
  `useId` int(30) NOT NULL,
  `blance` decimal(30,0) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acount`
--

INSERT INTO `acount` (`useId`, `blance`) VALUES
(1000000, '20000'),
(1000001, '7000'),
(1000002, '1'),
(1000003, '590000'),
(1000006, '0'),
(1000007, '0'),
(1000008, '32000'),
(1000009, '40000');

-- --------------------------------------------------------

--
-- Table structure for table `mesages`
--

CREATE TABLE IF NOT EXISTS `mesages` (
  `mId` int(30) NOT NULL,
  `uId` varchar(30) NOT NULL,
  `date` varchar(15) NOT NULL,
  `content` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mesages`
--

INSERT INTO `mesages` (`mId`, `uId`, `date`, `content`, `status`) VALUES
(5, '1000008', 'Sat-28-Jan-2023', 'Hello I want whole my money', 1),
(6, '1000008', 'Sat-28-Jan-2023', 'hy youyyyy', 1),
(7, '1000009', 'Sat-28-Jan-2023', 'hello Admin', 1),
(8, '1000009', 'Sat-28-Jan-2023', 'hey their', 1),
(9, '1000009', 'Sat-28-Jan-2023', 'you did it well', 1),
(10, '1000009', 'Sat-28-Jan-2023', 'good moning', 1),
(11, '1000009', 'Sat-28-Jan-2023', 'god is good', 1),
(12, '1000009', 'Sat-28-Jan-2023', 'well done', 1),
(13, '1000009', 'Sat-28-Jan-2023', 'God didi it well', 1),
(14, '1000009', 'Sat-28-Jan-2023', 'now let check', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `tId` int(30) NOT NULL,
  `uId` int(123) NOT NULL,
  `date` varchar(21) NOT NULL,
  `task` varchar(10) NOT NULL,
  `amount` decimal(30,0) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`tId`, `uId`, `date`, `task`, `amount`, `status`) VALUES
(1, 1000000, '30/01/2023', 'dr', '30000', 1),
(2, 1000001, '12/02/2023', 'dr', '10000', 1),
(3, 1000000, '30/01/2023', 'cr', '5000', 1),
(4, 1000001, '12/02/2023', 'dr', '2000', 1),
(5, 1000000, '30/01/2023', 'cr', '5000', 1),
(6, 1000001, '12/02/2023', 'cr', '5000', 0),
(14, 1000003, '2727/0101/2023', 'cr', '10000', 1),
(16, 1000008, '2828/0101/2023', 'dr', '40000', 1),
(17, 1000008, '28/01/2023', 'cr', '5000', 1),
(18, 1000008, '28/01/2023', 'cr', '10000', 1),
(19, 1000008, '28/01/2023', 'dr', '7000', 1),
(20, 1000009, '28/01/2023', 'dr', '50000', 1),
(21, 1000009, '28/01/2023', 'cr', '10000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `Id` int(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(80) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `post` int(1) NOT NULL,
  `stutus` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1000010 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `username`, `password`, `firstName`, `lastName`, `post`, `stutus`) VALUES
(1000000, '@kwizera', '$2y$10$eL.Q5PP7lW2fFwuCK4GiLeALI2BBptBS6ob5.IDCkqk8J7GQdLvl.', ' Kwizera', 'Elisa', 1, 1),
(1000001, '@philemon', '321', ' Alex', 'llname', 0, 1),
(1000002, '@lily', '123', ' NIYIKIZA', 'Liliane', 0, 1),
(1000003, '@jojo', '123', '  NIYOMUSHUMBA', 'Josiane', 0, 1),
(1000006, '@ingonaa', '$2y$10$QUiDlElZpEGotACjyqP19Odnp59/QLtsa2iwaOCAoDm.tDehniOCa', '  MURENGEZI', 'Jean', 0, 1),
(1000007, '@lion', '$2y$10$eL.Q5PP7lW2fFwuCK4GiLeALI2BBptBS6ob5.IDCkqk8J7GQdLvl.', ' SHIKAMUSENGE', 'Philemon', 1, 1),
(1000008, '@iot', '$2y$10$ll8r7cpb1piU4CL7v7u45unLImumIgdpwahOHHTykuvzo3elZSjOO', 'NTAKIRUTIMANA', 'Sabin', 2, 1),
(1000009, '@kamana', '$2y$10$rcqjpLvHSXLUrlvPuUiS9.ML6GcNiyY3U6f6qTQv/8a70frIKk2O2', 'Kamana', 'fabien', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acount`
--
ALTER TABLE `acount`
  ADD KEY `userId` (`useId`);

--
-- Indexes for table `mesages`
--
ALTER TABLE `mesages`
  ADD PRIMARY KEY (`mId`),
  ADD KEY `uId` (`uId`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`tId`),
  ADD KEY `userId` (`uId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mesages`
--
ALTER TABLE `mesages`
  MODIFY `mId` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `tId` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1000010;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
