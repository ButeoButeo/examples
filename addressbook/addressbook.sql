-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2015 at 05:19 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `addressbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
`id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zipcode` varchar(30) NOT NULL,
  `notes` text NOT NULL,
  `contact_group` varchar(100) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `first_name`, `last_name`, `email`, `phone`, `address1`, `address2`, `city`, `state`, `zipcode`, `notes`, `contact_group`, `date_added`) VALUES
(1, 'John', 'Doe', 'jdoe@gmail.com', '(978) 555-1111', '223 Massachusetts Ave', '', 'Cambridge', 'AL', '02136', '', 'Business', '2014-07-11 16:21:01'),
(2, 'Mark', 'Jackson', 'markjax@yahoo.com', '(978) 555-2222', '566 Main St', 'Unit 4', 'Haverhill', 'AD', '01830', '', 'Friends', '2014-07-11 16:21:01'),
(3, 'Samuel', 'Smith', 'samsmith@gmail.com', '(978) 555-3333', '23 Elm St', '', 'Amesbury', 'DE', '01913', '', 'Business', '2014-07-11 16:22:41'),
(8, 'Jennifer', 'Sheehan', 'jen.irish@hotmail.com', '9783848273', '44 Birchmeadow rd', '', 'Amesbury', 'DE', '01913', '', 'Family', '2014-07-13 10:30:40'),
(9, 'Mia', 'Njegovan', 'mianjegovan@gmail.com', '+381638991259', 'Balzakova 15', 'Teodora Mandica 46', 'Novi Sad', 'LU', '123456', '', 'Family', '2015-03-15 22:23:00'),
(11, 'Olinka', 'Njegovan', 'olinka.njegovan@gmail.com', '+38166062769', 'Balzakova 15', '', 'Novi Sad', 'SR', '21000', '', 'Family', '2015-03-15 22:35:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
