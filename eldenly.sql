-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 04:06 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

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
  `mem_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mem_id`, `mem_name`, `mem_address`, `mem_date`, `mem_email`, `mem_tel`, `mem_user`, `mem_password`, `mem_status`) VALUES
(13, 'nawasan', '221b', '2001-09-29', 'name@gmail.com', '092348071', 'nawasan', 'password', 'user'),
(17, 'asfasfasd', 'fasfasfasfasfs', '2022-11-10', 'salfajslf@gami', '23098423047', 'username', 'password', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `poll_id` int(11) NOT NULL,
  `poll_name` varchar(200) NOT NULL,
  `poll_date` date NOT NULL,
  `poll_member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `poll_detail`
--

CREATE TABLE `poll_detail` (
  `poll_detail_id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL,
  `poll_detail_post` varchar(200) NOT NULL,
  `poll_detail_count` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `poll_post`
--

CREATE TABLE `poll_post` (
  `poll_post_id` int(11) NOT NULL,
  `poll_poll_id` int(11) NOT NULL,
  `poll_post_member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
  MODIFY `poll_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poll_detail`
--
ALTER TABLE `poll_detail`
  MODIFY `poll_detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poll_post`
--
ALTER TABLE `poll_post`
  MODIFY `poll_post_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
