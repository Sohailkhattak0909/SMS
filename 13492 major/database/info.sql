-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2024 at 03:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `info`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `S_No` int(11) NOT NULL,
  `first_n` varchar(19) NOT NULL,
  `last_n` varchar(19) NOT NULL,
  `age` tinyint(4) DEFAULT NULL CHECK (`age` >= 9 and `age` <= 16),
  `gender` varchar(6) NOT NULL,
  `class` varchar(4) NOT NULL,
  `email` varchar(320) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `urdu` int(11) NOT NULL,
  `english` int(11) NOT NULL,
  `maths` int(11) NOT NULL,
  `islamiat` int(11) NOT NULL,
  `science` int(11) NOT NULL,
  `geography` int(11) NOT NULL,
  `history` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `per` float NOT NULL
) ;

--
-- Triggers `data`
--
DELIMITER $$
CREATE TRIGGER `before_update_data` BEFORE UPDATE ON `data` FOR EACH ROW BEGIN
    IF NEW.age < 9 OR NEW.age > 16 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Please enter age between 9 and 16';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `check_marks_range` BEFORE INSERT ON `data` FOR EACH ROW BEGIN
    IF NEW.urdu < 0 OR NEW.urdu > 100 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error: Please enter marks between 0 and 100';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `vi`
--

CREATE TABLE `vi` (
  `Course_ID` varchar(11) NOT NULL,
  `Course_name` varchar(50) NOT NULL,
  `Time` varchar(19) NOT NULL,
  `Location` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vii`
--

CREATE TABLE `vii` (
  `Course_ID` varchar(11) NOT NULL,
  `Course_name` varchar(50) NOT NULL,
  `Time` varchar(19) NOT NULL,
  `Location` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `viii`
--

CREATE TABLE `viii` (
  `Course_ID` varchar(11) NOT NULL,
  `Course_name` varchar(50) NOT NULL,
  `Time` varchar(19) NOT NULL,
  `Location` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `viii`
--

INSERT INTO `viii` (`Course_ID`, `Course_name`, `Time`, `Location`) VALUES
('Urdu 8', 'Urdu', '8:00 AM To 8:40 AM', 'A 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`S_No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `S_No` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
