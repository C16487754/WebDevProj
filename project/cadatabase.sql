-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2018 at 11:42 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cadatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `title` varchar(30) NOT NULL,
  `pubyear` int(4) NOT NULL,
  `director` varchar(30) NOT NULL,
  `genre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`title`, `pubyear`, `director`, `genre`) VALUES
('Coach Carter', 2005, 'Thomas Carter', 'Sports'),
('Hannibal', 2001, 'Ridley Scott', 'Horror'),
('Jaws', 1975, ' Steven Spielberg', 'Thriller'),
('Kill Bill', 2003, 'Quentin Tarantino', 'Thriller'),
('Red Dragon', 2002, 'Brett Ratner', 'Horror'),
('Seven', 1995, 'David Fincher', 'Horror'),
('Step Brothers', 2008, 'Adam McKay', 'Comedy'),
('Talladega Nights', 2006, 'Adam McKay', 'Comedy'),
('The Hateful Eight', 2015, 'Quentin Tarantino', 'Drama'),
('The Interview', 2014, 'Seth Rogen', 'Comedy'),
('The Other Guys', 2010, 'Adam McKay', 'Comedy'),
('The Punisher', 2004, 'Jonathan Hensleigh', 'Sci-fi'),
('The Shawshank Redemption', 1994, 'Frank Darabont', 'Drama'),
('Training Day', 2001, 'Antoine Fuqua', 'Drama');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(6) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `firstname`, `email`, `password`) VALUES
(123465, 'Luke', 'Luke@mail.com', 'ABCabc123!'),
(123466, 'Adam', 'adam@mail.com', 'ABCabc123!'),
(123486, 'Mary', 'mary@mail.com', 'ABCabc123!'),
(123487, 'John', 'johnny@mail.com', 'ABCabc1234!'),
(123488, 'Calvin', 'cal@mail.com', 'ABCabc123!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`title`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123489;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
