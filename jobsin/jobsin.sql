-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2015 at 01:47 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jobsin`
--
CREATE DATABASE IF NOT EXISTS `jobsin` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `jobsin`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Accounting & Banking'),
(2, 'Construction'),
(3, 'Fashion & Style'),
(4, 'Food & Restaurant'),
(5, 'Healthcare'),
(6, 'Retail & Sales'),
(7, 'Technology');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `category_id`, `user_id`, `type_id`, `company_name`, `title`, `description`, `city`, `state`, `contact_email`, `created`) VALUES
(1, 7, 1, 1, 'Tech Guy Computer Services', 'Senior Graphic Designer', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dapibus risus at dapibus malesuada. Vestibulum euismod, velit sit amet tempor ornare, nulla augue mattis mi, nec ultricies dolor augue nec lectus. Integer bibendum enim ipsum, at eleifend nisl elementum sit amet. Etiam eget magna et nunc ultrices suscipit. Duis a ligula vel nisi auctor laoreet. Morbi varius suscipit purus, sed pretium nisl sagittis id. Aliquam vel nulla tempor, luctus quam nec, egestas sem. Nulla nulla ante, faucibus fringilla blandit non, porttitor at eros.\r\n</p>\r\n<p>\r\nCras luctus cursus pretium. Fusce rhoncus tortor at lectus dignissim, sed dignissim enim euismod. Pellentesque venenatis lacus diam. Nulla aliquam turpis vel lorem viverra consequat. Curabitur vitae vehicula lacus. Fusce quis imperdiet tortor. Fusce enim massa, tincidunt vel lobortis non, mattis quis turpis. Nam lobortis, lectus vitae iaculis bibendum, felis nulla consectetur leo, nec volutpat orci elit ut lorem. Nunc sagittis mauris quis tellus ullamcorper facilisis. Sed volutpat lacus in gravida condimentum. Maecenas sit amet massa vel neque suscipit porta. In luctus odio ante, a scelerisque tellus imperdiet id. Nunc in mollis lectus. Nam lobortis dui lorem, nec lacinia erat pellentesque non. In mattis eget massa sit amet elementum.</p>', 'London', 'GB', 'contact@employer.com', '2014-07-14 00:00:00'),
(2, 7, 1, 1, 'Tech Guy Computer Services', 'UX Designer', '<p>Velit sit amet tempor ornare, nulla augue mattis mi, nec ultricies dolor augue nec lectus. Integer bibendum enim ipsum, at eleifend nisl elementum sit amet. Etiam eget magna et nunc ultrices suscipit. Duis a ligula vel nisi auctor laoreet. Morbi varius suscipit purus, sed pretium nisl sagittis id. Aliquam vel nulla tempor, luctus quam nec, egestas sem. Nulla nulla ante, faucibus fringilla blandit non, porttitor at eros.\n</p>\n<p>\nCras luctus cursus pretium. Fusce rhoncus tortor at lectus dignissim, sed dignissim enim euismod. Pellentesque venenatis lacus diam. Nulla aliquam turpis vel lorem viverra consequat. Curabitur vitae vehicula lacus. Fusce quis imperdiet tortor. Fusce enim massa, tincidunt vel lobortis non, mattis quis turpis. Nam lobortis, lectus vitae iaculis bibendum, felis nulla consectetur leo, nec volutpat orci elit ut lorem. Nunc sagittis mauris quis tellus ullamcorper facilisis. Sed volutpat lacus in gravida condimentum. Maecenas sit amet massa vel neque suscipit porta. In luctus odio ante, a scelerisque tellus imperdiet id. Nunc in mollis lectus. Nam lobortis dui lorem, nec lacinia erat pellentesque non. In mattis eget massa sit amet elementum.</p>', 'London', 'GB', 'contact@employer.om', '2014-07-14 00:00:00'),
(3, 5, 2, 2, 'Harborside Healthcare', 'Registered Nurse', '<p>Nec ultricies dolor augue nec lectus. Integer bibendum enim ipsum, at eleifend nisl elementum sit amet. Etiam eget magna et nunc ultrices suscipit. Duis a ligula vel nisi auctor laoreet. Morbi varius suscipit purus, sed pretium nisl sagittis id. Aliquam vel nulla tempor, luctus quam nec, egestas sem. Nulla nulla ante, faucibus fringilla blandit non, porttitor at eros.\r\n</p>\r\n<p>\r\nCras luctus cursus pretium. Fusce rhoncus tortor at lectus dignissim, sed dignissim enim euismod. Pellentesque venenatis lacus diam. Nulla aliquam turpis vel lorem viverra consequat. Curabitur vitae vehicula lacus. Fusce quis imperdiet tortor. Fusce enim massa, tincidunt vel lobortis non, mattis quis turpis. Nam lobortis, lectus vitae iaculis bibendum, felis nulla consectetur leo, nec volutpat orci elit ut lorem. Nunc sagittis mauris quis tellus ullamcorper facilisis. Sed volutpat lacus in gravida condimentum. Maecenas sit amet massa vel neque suscipit porta. In luctus odio ante, a scelerisque tellus imperdiet id. Nunc in mollis lectus. Nam lobortis dui lorem, nec lacinia erat pellentesque non. In mattis eget massa sit amet elementum.</p>', 'Serbia', 'RS', 'contact@employer.com', '2014-07-14 00:00:00'),
(4, 2, 3, 1, 'Smith Painting', 'House Painter', '<p>Eenim ipsum, at eleifend nisl elementum sit amet. Etiam eget magna et nunc ultrices suscipit. Duis a ligula vel nisi auctor laoreet. Morbi varius suscipit purus, sed pretium nisl sagittis id. Aliquam vel nulla tempor, luctus quam nec, egestas sem. Nulla nulla ante, faucibus fringilla blandit non, porttitor at eros.\r\n</p>\r\n<p>\r\nCras luctus cursus pretium. Fusce rhoncus tortor at lectus dignissim, sed dignissim enim euismod. Pellentesque venenatis lacus diam. Nulla aliquam turpis vel lorem viverra consequat. Curabitur vitae vehicula lacus. Fusce quis imperdiet tortor. Fusce enim massa, tincidunt vel lobortis non, mattis quis turpis. Nam lobortis, lectus vitae iaculis bibendum, felis nulla consectetur leo, nec volutpat orci elit ut lorem. Nunc sagittis mauris quis tellus ullamcorper facilisis. Sed volutpat lacus in gravida condimentum. Maecenas sit amet massa vel neque suscipit porta. In luctus odio ante, a scelerisque tellus imperdiet id. Nunc in mollis lectus. Nam lobortis dui lorem, nec lacinia erat pellentesque non. In mattis eget massa sit amet elementum.</p>', 'Sliema', 'MT', 'contact@employer.com', '2014-07-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `color`) VALUES
(1, 'Full Time', '#81b800'),
(2, 'Part Time', '#4c9ef1'),
(3, 'Freelance', '#f4f4f4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `role`, `created`) VALUES
(1, 'Brad', 'Traversy', 'techguyinfo@gmail.com', 'techguy1', 'b11e69e8f791ce2ca31c906df27b95285156f9b4', 'Employer', '2014-07-14 07:46:01'),
(2, 'Jane', 'Doe', 'janedoe@gmail.com', 'janed', '2b84997dcd67aba6feacc42c86458c05d3e98b1fa573389a63', 'Employer', '2014-07-14 07:50:39'),
(3, 'John', 'Doe', 'johndoe@gmail.com', 'johnd', '2b84997dcd67aba6feacc42c86458c05d3e98b1fa573389a63', 'Job Seeker', '2014-07-14 07:51:10'),
(16, 'Jennifer', 'Sheehan', 'jen.irish@hotmail.com', 'jensheehan', 'b11e69e8f791ce2ca31c906df27b95285156f9b4', 'Job Seeker', '2014-07-15 16:04:23');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
