-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 30, 2018 at 04:31 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Webdev`
--

-- --------------------------------------------------------

--
-- Table structure for table `Movies`
--

CREATE TABLE `Movies` (
  `title` varchar(20) NOT NULL,
  `releaseDate` varchar(20) NOT NULL,
  `director` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Movies`
--

INSERT INTO `Movies` (`title`, `releaseDate`, `director`) VALUES
('Good Will Hunting', '20/08/1997', 'Gus Van Sant'),
('Inglourious', '11/11/2009', 'Quentin Tarantino'),
('Jaws', '20/06/1975', ' Steven Spielberg'),
('King Kong', '20/06/2005', 'Peter Jackson'),
('Limitless', '20/06/2011', ' Neil Burger'),
('Lord of the Rings', '20/06/2001', 'Peter Jackson'),
('Scarface', '20/05/1983', 'Brian De Palma'),
('The Hateful Eight', '12/09/2015', 'Quentin Tarantino'),
('The Shawshank Redemp', '03/03/1994', 'Frank Darabont'),
('The Wolf of Wall Str', '20/06/2013', 'Martin Scorsese');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `userID` int(6) NOT NULL,
  `email` varchar(20) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`userID`, `email`, `userName`, `password`) VALUES
(123456, 'calvin@gmail.com', 'calvin', '4321'),
(654321, 'luke@gmail.com', 'McQ', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Movies`
--
ALTER TABLE `Movies`
  ADD PRIMARY KEY (`title`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
