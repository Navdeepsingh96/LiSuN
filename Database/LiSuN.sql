-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 15, 2019 at 01:12 PM
-- Server version: 5.7.26-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `LiSuN`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(20) DEFAULT NULL,
  `LastName` varchar(20) DEFAULT NULL,
  `LoginID` varchar(20) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `FirstName`, `LastName`, `LoginID`, `Password`) VALUES
(10001, 'Library', 'Supervisor', 'Admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `brodie_resource_library`
--

CREATE TABLE `brodie_resource_library` (
  `id` int(11) NOT NULL,
  `book_name` varchar(100) DEFAULT NULL,
  `book_author` varchar(100) DEFAULT NULL,
  `book_publication` varchar(100) DEFAULT NULL,
  `issued` varchar(10) DEFAULT NULL,
  `issuer_name` varchar(50) DEFAULT NULL,
  `issuer_email` varchar(50) DEFAULT NULL,
  `issuer_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brodie_resource_library`
--

INSERT INTO `brodie_resource_library` (`id`, `book_name`, `book_author`, `book_publication`, `issued`, `issuer_name`, `issuer_email`, `issuer_date`) VALUES
(9, 'The Lord of the Rings', 'J. R. R. Tolkien', 'Allison and Busby', NULL, NULL, NULL, NULL),
(10, 'Le Petit Prince (The Little Prince)', 'Antoine de Saint-Exupéry', 'Anvil Press Poetry', NULL, NULL, NULL, NULL),
(11, 'Harry Potter and the Philosopher\'s Stone', 'J. K. Rowling', 'Arktos Media', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chancellor_paterson_library`
--

CREATE TABLE `chancellor_paterson_library` (
  `id` int(11) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `book_author` varchar(100) NOT NULL,
  `book_publication` varchar(100) NOT NULL,
  `issued` varchar(10) DEFAULT NULL,
  `issuer_name` varchar(50) DEFAULT NULL,
  `issuer_email` varchar(50) DEFAULT NULL,
  `issuer_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chancellor_paterson_library`
--

INSERT INTO `chancellor_paterson_library` (`id`, `book_name`, `book_author`, `book_publication`, `issued`, `issuer_name`, `issuer_email`, `issuer_date`) VALUES
(1, 'harry potter and goblet of fire', 'jk rowling', 'wb', NULL, NULL, NULL, NULL),
(2, 'The Hobbit', 'J. R. R. Tolkien', 'Bella Books', NULL, NULL, NULL, NULL),
(3, 'And Then There Were None', 'Agatha Christie', 'Blake Publishing', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `issuerrequests`
--

CREATE TABLE `issuerrequests` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `request` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issuerrequests`
--

INSERT INTO `issuerrequests` (`id`, `name`, `email`, `request`) VALUES
(1, 'navdeep singh', 'nsingh25@lakeheadu.c', 'hey is harry potter available'),
(2, 'Navdeep Singh', 'nsingh25@lakeheadu.c', 'hey is lord of the rings available'),
(3, 'rajat', 'rajatsarowa@gmail.com', 'get me last harry potter book');

-- --------------------------------------------------------

--
-- Table structure for table `issuers`
--

CREATE TABLE `issuers` (
  `ID` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `gender` enum('Male','Female','Others','') DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issuers`
--

INSERT INTO `issuers` (`ID`, `firstname`, `lastname`, `age`, `gender`, `contact`, `email`, `password`) VALUES
(1, 'Navdeep', 'Singh', 23, 'Male', '8073577201', 'nsingh25@lakeheadu.ca', 'nsingh25'),
(2, 'navdeep', 'singh', 23, 'Male', '08968507201', 'rananavdeep007@gmail.com', 'navdeep'),
(3, 'Rajat', 'Sarowa', 24, 'Male', '8968507201', 'rajatsarowa@gmail.com', 'rajatsarowa');

-- --------------------------------------------------------

--
-- Table structure for table `librarians`
--

CREATE TABLE `librarians` (
  `ID` int(11) NOT NULL,
  `libname` enum('waverley_resource_library','brodie_resource_library','mary_jl_black_branch','chancellor_paterson_library') DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `gender` enum('Male','Female','Others','') DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `librarians`
--

INSERT INTO `librarians` (`ID`, `libname`, `firstname`, `lastname`, `age`, `gender`, `contact`, `email`, `password`) VALUES
(7, 'waverley_resource_library', 'Navdeep', 'Singh', 23, 'Male', '8073577201', 'nsingh25@lakeheadu.ca', 'nsingh25'),
(8, 'brodie_resource_library', 'Akanksha', 'Ahuja', 23, 'Female', '8073432431', 'AkankshaAhuja@gmail.com', 'AkankshaAhuja'),
(9, 'mary_jl_black_branch', 'parth', 'rathod', 23, 'Female', '8076846363', 'parthrathod@gmail.com', 'parthrathod'),
(10, 'chancellor_paterson_library', 'Alex', 'Morgan', 25, 'Female', '8076846363', 'Alexmorgan@gmail.com', 'Alexmorgan'),
(11, 'waverley_resource_library', 'Rajat', 'Sarowa', 24, 'Male', '9466351132', 'rajatsarowa@gmail.com', 'rajatsarowa');

-- --------------------------------------------------------

--
-- Table structure for table `libraries`
--

CREATE TABLE `libraries` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Contact` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `libraries`
--

INSERT INTO `libraries` (`ID`, `Name`, `Address`, `Contact`) VALUES
(1, 'Waverley Resource Library', '285 Red River Rd, Thunder Bay, ON P7B 1A9', '(807) 345-8275'),
(2, 'Brodie Resource Library', '216 Brodie St S, Thunder Bay, ON P7E 1C2', '(807) 345-8275'),
(3, 'Mary J.L. Black Branch', '901 Edward St S, Thunder Bay, ON P7E 6R2', '(807) 345-8275'),
(4, 'Chancellor Paterson Library', '955 Oliver Rd, Thunder Bay, ON P7B 5E1', '(807) 343-8225'),
(5, 'Thunder Bay Public Library: Waverley Resource Library', '285 Red River Rd, Thunder Bay, ON P7B 1A9', '(807) 345-8275');

-- --------------------------------------------------------

--
-- Table structure for table `mary_jl_black_branch`
--

CREATE TABLE `mary_jl_black_branch` (
  `id` int(11) NOT NULL,
  `book_name` varchar(100) DEFAULT NULL,
  `book_author` varchar(100) DEFAULT NULL,
  `book_publication` varchar(100) DEFAULT NULL,
  `issued` varchar(10) DEFAULT NULL,
  `issuer_name` varchar(50) DEFAULT NULL,
  `issuer_email` varchar(50) DEFAULT NULL,
  `issuer_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mary_jl_black_branch`
--

INSERT INTO `mary_jl_black_branch` (`id`, `book_name`, `book_author`, `book_publication`, `issued`, `issuer_name`, `issuer_email`, `issuer_date`) VALUES
(4, 'The Lion, the Witch and the Wardrobe', 'C. S. Lewis', 'Boundless', NULL, NULL, NULL, NULL),
(5, 'She: A History of Adventure', 'H. Rider Haggard', 'Broadview Press', NULL, NULL, NULL, NULL),
(6, 'Le avventure di Pinocchio. Storia di un burattino (The Adventures of Pinocchio)', 'Carlo Collodi', 'Candy Jar Books', NULL, NULL, NULL, NULL),
(7, 'The Da Vinci Code', 'Dan Brown', 'Chronicle Books', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `request` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `name`, `email`, `request`) VALUES
(11, 'St. Joseph&#39;s Hospital', 'stjosephs@gmail.com', 'sdc'),
(12, 'Akanksha Ahuja', 'AkankshAhuja@gmail.c', 'can you update my credentials'),
(13, 'St. Joseph&#39;s Hospital', 'stjosephs@gmail.com', 'asfasdfasdf'),
(15, 'rajat', 'rajatsarowa@gmail.com', 'update my email'),
(16, 'Navdeep Singh', 'navdeep.singh96@hotmail.com', 'add a new library please');

-- --------------------------------------------------------

--
-- Table structure for table `waverley_resource_library`
--

CREATE TABLE `waverley_resource_library` (
  `id` int(11) NOT NULL,
  `book_name` varchar(100) DEFAULT NULL,
  `book_author` varchar(100) DEFAULT NULL,
  `book_publication` varchar(100) NOT NULL,
  `issued` varchar(10) DEFAULT NULL,
  `issuer_name` varchar(50) DEFAULT NULL,
  `issuer_email` varchar(50) DEFAULT NULL,
  `issuer_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waverley_resource_library`
--

INSERT INTO `waverley_resource_library` (`id`, `book_name`, `book_author`, `book_publication`, `issued`, `issuer_name`, `issuer_email`, `issuer_date`) VALUES
(5, 'harry potter and prisoner of azkaban', 'jk rowling', 'warner bros', 'yes', 'navdeep', 'singh', '2019-06-13'),
(6, 'The Alchemist', 'Paulo Coelho', 'Cisco Press', NULL, NULL, NULL, NULL),
(7, 'You Can Heal Your Life', 'Louise Hay', 'CRC Press', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brodie_resource_library`
--
ALTER TABLE `brodie_resource_library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chancellor_paterson_library`
--
ALTER TABLE `chancellor_paterson_library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issuerrequests`
--
ALTER TABLE `issuerrequests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issuers`
--
ALTER TABLE `issuers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `librarians`
--
ALTER TABLE `librarians`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `libraries`
--
ALTER TABLE `libraries`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `mary_jl_black_branch`
--
ALTER TABLE `mary_jl_black_branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `waverley_resource_library`
--
ALTER TABLE `waverley_resource_library`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brodie_resource_library`
--
ALTER TABLE `brodie_resource_library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `chancellor_paterson_library`
--
ALTER TABLE `chancellor_paterson_library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `issuerrequests`
--
ALTER TABLE `issuerrequests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `issuers`
--
ALTER TABLE `issuers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `librarians`
--
ALTER TABLE `librarians`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `libraries`
--
ALTER TABLE `libraries`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mary_jl_black_branch`
--
ALTER TABLE `mary_jl_black_branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `waverley_resource_library`
--
ALTER TABLE `waverley_resource_library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
