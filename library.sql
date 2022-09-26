-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2022 at 12:14 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_table`
--

CREATE TABLE `book_table` (
  `ISBN` varchar(20) NOT NULL,
  `BookTitle` varchar(30) NOT NULL,
  `Author` varchar(30) NOT NULL,
  `Edition` varchar(1) NOT NULL,
  `Year` year(4) NOT NULL,
  `CategoryID` char(3) NOT NULL,
  `Reservation` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_table`
--

INSERT INTO `book_table` (`ISBN`, `BookTitle`, `Author`, `Edition`, `Year`, `CategoryID`, `Reservation`) VALUES
('093-403992', 'Computers in Business', 'Alicia Oneill', '3', 1997, '003', 1),
('23472-8729', 'Exploring Peru', 'Stephanie Birchid', '4', 2005, '005', 0),
('237-34823', 'Business Strategy', 'Joe Peppard', '2', 2002, '002', 0),
('23u8-923849', 'A guide to nutrition', 'John Thorpe', '2', 1997, '001', 0),
('2983-3494', 'Cooking for children', 'Anabelle Sharper', '1', 2003, '007', 0),
('82n8-308', 'computers for idiots', 'Susan O\'Neill', '5', 1998, '004', 0),
('9823-23984', 'My life in picture', 'Kevin Graham', '8', 2004, '001', 0),
('9823-2403-0', 'DaVinci Code', 'Dan Brown', '1', 2003, '008', 0),
('9823-98345', 'How to cook Italian food', 'Jamie Oliver', '2', 2005, '007', 1),
('9823-98487', 'Optimising your business', 'Cleo Blair', '1', 2001, '002', 0),
('98234-029384', 'My ranch in Texas', 'George Bush', '1', 2005, '001', 1),
('988745-234', 'Tara Road', 'Maeve Binchy', '4', 2002, '008', 0),
('993-004-00', 'My life in bits', 'John Smith', '1', 2001, '001', 0),
('9987-0039882', 'Shooting History', 'Jon Snow', '1', 2003, '001', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category_table`
--

CREATE TABLE `category_table` (
  `CategoryID` char(3) NOT NULL,
  `CategoryDescription` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_table`
--

INSERT INTO `category_table` (`CategoryID`, `CategoryDescription`) VALUES
('001', 'Health'),
('002', 'Business'),
('003', 'Biography'),
('004', 'Technology'),
('005', 'Travel'),
('006', 'Self-Help'),
('007', 'Cookery'),
('008', 'Fiction');

-- --------------------------------------------------------

--
-- Table structure for table `reserve_table`
--

CREATE TABLE `reserve_table` (
  `ISBN` varchar(20) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reserve_table`
--

INSERT INTO `reserve_table` (`ISBN`, `UserName`, `Date`) VALUES
('093-403992', 'bob', '2021-12-17'),
('9823-98345', 'tommy100', '2011-10-11'),
('98234-029384', 'joecrotty', '2011-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(6) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(10) NOT NULL,
  `AddressLine1` varchar(30) NOT NULL,
  `AddressLine2` varchar(20) NOT NULL,
  `City` varchar(15) NOT NULL,
  `Telephone` int(7) NOT NULL,
  `Mobile` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`UserName`, `Password`, `FirstName`, `LastName`, `AddressLine1`, `AddressLine2`, `City`, `Telephone`, `Mobile`) VALUES
('alanmckenna', 't1234s', 'Alan', 'McKenna', '38 Cranley Road', 'Fairview', 'Dublin', 9998377, 856625567),
('bob', '654321', 'bob', 'bob', 'qe', 'asd', 'asdas', 1111111, 111111111),
('joecrotty', 'kj7899', 'Joseph', 'Crotty', 'Apt 5 Clyde Road', 'Donnybrook', 'Dublin', 8887889, 876654456),
('tommy100', '123456', 'Tom', 'Behan', '14 Hyde Road', 'Dalkey', 'Dublin', 9983747, 876738782);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_table`
--
ALTER TABLE `book_table`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `category_table`
--
ALTER TABLE `category_table`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `reserve_table`
--
ALTER TABLE `reserve_table`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`UserName`),
  ADD UNIQUE KEY `UserName` (`UserName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
