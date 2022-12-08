-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 08, 2022 at 07:11 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eldenly`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `mem_id` int(11) NOT NULL,
  `mem_name` varchar(100) NOT NULL,
  `mem_address` varchar(200) NOT NULL,
  `mem_date` date NOT NULL,
  `mem_email` varchar(100) NOT NULL,
  `mem_tel` varchar(20) NOT NULL,
  `mem_user` varchar(50) NOT NULL,
  `mem_password` varchar(50) NOT NULL,
  `mem_status` varchar(10) NOT NULL,
  `mem_stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mem_id`, `mem_name`, `mem_address`, `mem_date`, `mem_email`, `mem_tel`, `mem_user`, `mem_password`, `mem_status`, `mem_stat`) VALUES
(18, 'hello-world', 'addres24304', '2003-02-21', 'arei@geamil.com', '203432039480', 'hello', 'hello', 'user', 0),
(19, 'nawasan wisitsingkhon', 'address222', '2002-02-22', '2002@gmail', '093420347039', 'nawasan', 'password', 'admin', 67),
(20, 'jake', 'address-mode2', '2002-02-22', 'jake@email.com', '0937293856', 'jake', 'jake', 'user', 0);

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `poll_id` int(11) NOT NULL,
  `poll_name` varchar(200) NOT NULL,
  `poll_date` date NOT NULL,
  `poll_member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `poll`
--

INSERT INTO `poll` (`poll_id`, `poll_name`, `poll_date`, `poll_member_id`) VALUES
(12, 'a type', '2022-11-14', 13),
(13, 'b type', '2022-11-14', 13),
(14, 'c type', '2022-11-14', 13),
(15, 'd type', '2022-11-14', 13),
(21, 'e type', '2022-11-14', 13),
(22, 'f type', '2022-11-14', 13),
(23, 'g type', '2022-11-14', 13),
(24, 'h type', '2022-11-14', 13),
(25, 'i type', '2022-11-15', 13);

-- --------------------------------------------------------

--
-- Table structure for table `poll_detail`
--

CREATE TABLE `poll_detail` (
  `poll_detail_id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL,
  `poll_detail_post` varchar(200) NOT NULL,
  `poll_detail_count` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `poll_detail`
--

INSERT INTO `poll_detail` (`poll_detail_id`, `poll_id`, `poll_detail_post`, `poll_detail_count`) VALUES
(14, 12, 'a2', 0),
(15, 12, 'a3', 0),
(16, 13, 'b1', 0),
(17, 13, 'b2', 0),
(18, 13, 'b3', 0),
(19, 13, 'b4', 0),
(20, 13, 'b5', 0),
(21, 14, 'c1', 0),
(22, 14, 'c2', 0),
(23, 14, 'c3', 0),
(24, 14, 'c4', 0),
(25, 14, 'c5', 0),
(26, 15, 'a', 0),
(27, 15, 'b', 0),
(38, 21, 'e1', 0),
(39, 21, 'e2', 0),
(40, 21, 'e3', 0),
(41, 21, 'e4', 0),
(42, 21, 'e5', 0),
(43, 22, 'f1', 0),
(44, 22, 'f2', 0),
(45, 23, 'g1', 0),
(46, 23, 'g2', 0),
(47, 23, 'g3', 0),
(48, 23, 'g4', 0),
(49, 23, 'g5', 1),
(50, 23, 'g6', 0),
(51, 23, 'g7', 0),
(52, 23, 'g8', 0),
(53, 23, 'g9', 0),
(54, 24, 'h1', 0),
(55, 24, 'h2', 0),
(56, 24, 'h3', 1),
(57, 25, 'i1', 2),
(58, 25, 'i2', 2),
(59, 12, 'a1', 0),
(60, 21, 'e6', 0);

-- --------------------------------------------------------

--
-- Table structure for table `poll_post`
--

CREATE TABLE `poll_post` (
  `poll_post_id` int(11) NOT NULL,
  `poll_poll_id` int(11) NOT NULL,
  `poll_post_member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `poll_post`
--

INSERT INTO `poll_post` (`poll_post_id`, `poll_poll_id`, `poll_post_member_id`) VALUES
(4, 25, 13),
(5, 23, 13),
(7, 25, 19),
(8, 25, 20),
(9, 25, 18),
(10, 24, 19);

-- --------------------------------------------------------

--
-- Table structure for table `webbord`
--

CREATE TABLE `webbord` (
  `web_id` int(11) NOT NULL,
  `web_name` varchar(200) NOT NULL,
  `web_date` date NOT NULL,
  `web_mem_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `webbord`
--

INSERT INTO `webbord` (`web_id`, `web_name`, `web_date`, `web_mem_id`) VALUES
(1, 'กินอะไรดี', '2022-11-16', 19),
(2, 'hello world', '2022-11-16', 19),
(5, 'test change2?', '2022-11-16', 19);

-- --------------------------------------------------------

--
-- Table structure for table `webbord_detail`
--

CREATE TABLE `webbord_detail` (
  `web_detail_id` int(11) NOT NULL,
  `web_id` int(11) NOT NULL,
  `web_detail_post` varchar(200) NOT NULL,
  `web_detail_date` date NOT NULL,
  `web_detail_mem_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `webbord_detail`
--

INSERT INTO `webbord_detail` (`web_detail_id`, `web_id`, `web_detail_post`, `web_detail_date`, `web_detail_mem_id`) VALUES
(1, 2, 'bye', '2022-11-16', 19),
(2, 2, 'bye', '2022-11-16', 19),
(3, 2, 'asdasdfasf', '2022-11-16', 19),
(4, 2, 'no', '2022-11-16', 19),
(5, 2, 'ไก่จิกเด็กตาย', '2022-11-16', 19),
(6, 1, 'กินน้ำและอย่าลืมเคี้ยวให้ละเอียดก่อนกลืน', '2022-11-16', 19),
(7, 2, 'เด็กไม่ตาย?', '2022-11-16', 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`poll_id`);

--
-- Indexes for table `poll_detail`
--
ALTER TABLE `poll_detail`
  ADD PRIMARY KEY (`poll_detail_id`);

--
-- Indexes for table `poll_post`
--
ALTER TABLE `poll_post`
  ADD PRIMARY KEY (`poll_post_id`);

--
-- Indexes for table `webbord`
--
ALTER TABLE `webbord`
  ADD PRIMARY KEY (`web_id`);

--
-- Indexes for table `webbord_detail`
--
ALTER TABLE `webbord_detail`
  ADD PRIMARY KEY (`web_detail_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
  MODIFY `poll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `poll_detail`
--
ALTER TABLE `poll_detail`
  MODIFY `poll_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `poll_post`
--
ALTER TABLE `poll_post`
  MODIFY `poll_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `webbord`
--
ALTER TABLE `webbord`
  MODIFY `web_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `webbord_detail`
--
ALTER TABLE `webbord_detail`
  MODIFY `web_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
