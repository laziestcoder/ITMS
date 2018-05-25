-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2018 at 04:53 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iiuc_tmd`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_point`
--

CREATE TABLE `tbl_point` (
  `pointid` int(11) NOT NULL AUTO_INCREMENT,
  `point` varchar(60) NOT NULL,
  `routeid` int(11) NOT NULL,
  PRIMARY KEY(`pointid`),
  FOREIGN KEY(`routeid`) REFERENCES `tbl_route`(`routeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_point`
--

INSERT INTO `tbl_point` (`pointid`, `point`, `routeid`) VALUES
(1, 'Didar Market', 1),
(2, 'Kotwali', 1),
(3, 'New Market', 1),
(4, 'Kadamtali', 1),
(5, 'Dewan Hut', 1),
(6, 'Eid Gah', 1),
(7, 'Alkaran', 1),
(8, 'Oxygen', 2),
(9, 'Baizid', 2),
(10, 'GEC Moor', 2),
(11, 'Khulshi', 2),
(12, 'Miler Matha', 3),
(13, 'Nimtola Biswa Road', 3),
(14, 'Boropul', 3),
(15, 'Noyabazar', 3),
(16, 'Bohaddarhut', 4),
(17, 'Muradpur', 4),
(18, '2 No Gate', 4),
(19, 'Khulshi', 4),
(20, 'Chawkbazar', 5),
(21, 'Wasa Moor', 5),
(22, 'GEC Moor', 5),
(23, 'Agrabad', 7),
(24, 'Lucky Plaza', 7),
(25, 'Boro Pol', 7),
(26, 'Halishahar', 7),
(27, 'Darghahat', 8),
(28, 'Sitakunda', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_point`
--
ALTER TABLE `tbl_point`
  ADD PRIMARY KEY (`pointid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_point`
--
ALTER TABLE `tbl_point`
  MODIFY `pointid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
