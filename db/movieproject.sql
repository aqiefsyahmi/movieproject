-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2022 at 07:25 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movieproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `txt` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pswd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`txt`, `email`, `pswd`) VALUES
('abu', 'abu002@gmail.com', 'dawdw2'),
('ahmad', 'ahmaddanial@gmail.com', 'ahmad123'),
('ali', 'ali007@gmail.com', 'ali123'),
('khairul', 'khairul07@gmail.com', 'khairul123'),
('test1', 'test1@gmail.com', 'teset'),
('test2', 'test2@gmail.com', 'test'),
('test3', 'test3@gmail.com', 'test'),
('test4', 'test4@gmail.com', 'test'),
('test', 'test@gmail.com', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `userrating`
--

CREATE TABLE `userrating` (
  `txt` varchar(50) NOT NULL,
  `comment` text DEFAULT NULL,
  `rate` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userrating`
--

INSERT INTO `userrating` (`txt`, `comment`, `rate`) VALUES
('abu', 'dwadwad', 0),
('ahmad', 'citer tak best lahh', 2),
('ali', NULL, 0),
('khairul', 'dwad', 0),
('test', 'fjksdjf', 0),
('test1', NULL, 0),
('test2', NULL, 0),
('test3', NULL, 0),
('test4', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `userrating`
--
ALTER TABLE `userrating`
  ADD PRIMARY KEY (`txt`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
