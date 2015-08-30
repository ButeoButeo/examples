-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2015 at 06:33 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobsin`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

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
-- Table structure for table `faqs`
--

CREATE TABLE IF NOT EXISTS `faqs` (
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`question`, `answer`, `id`) VALUES
('Some question?', 'Awesome answer', 1),
('Second question?', 'This answer is shit', 2);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `label`) VALUES
(1, 'contact_us', 'Contact Us'),
(2, 'about_us', 'About Us'),
(3, 'visit_us', 'Visit Us');

-- --------------------------------------------------------

--
-- Table structure for table `menu_links`
--

CREATE TABLE IF NOT EXISTS `menu_links` (
  `id` int(11) NOT NULL,
  `menu_id` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `page_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_links`
--

INSERT INTO `menu_links` (`id`, `menu_id`, `label`, `page_id`) VALUES
(1, '1', 'info@jobsin.com', 6),
(2, '1', '+25896245', 5),
(3, '1', '<i class="fa fa-facebook"></i>', 0),
(4, '1', '<i class="fa fa-twitter"></i>', 0),
(5, '2', 'Our Story', 3),
(6, '2', 'Our Team', 3),
(7, '3', 'Some Dummy Triq 85', 4),
(8, '3', 'San Gwann, SG 528', 3),
(9, '3', 'Malta', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `label`, `link`) VALUES
(1, 'home', 'Home', ''),
(2, 'jobs', 'Jobs', 'jobs/browse'),
(3, 'about', 'About Us', 'about'),
(4, 'contact', 'Contact Us', 'contact'),
(5, 'login', 'Login', 'users/login'),
(6, 'register', 'Register', 'users/register');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `role`, `created`) VALUES
(1, 'Brad', 'Traversy', 'techguyinfo@gmail.com', 'techguy1', 'b11e69e8f791ce2ca31c906df27b95285156f9b4', 'Employer', '2014-07-14 07:46:01'),
(2, 'Jane', 'Doe', 'janedoe@gmail.com', 'janed', '2b84997dcd67aba6feacc42c86458c05d3e98b1fa573389a63', 'Employer', '2014-07-14 07:50:39'),
(3, 'John', 'Doe', 'johndoe@gmail.com', 'johnd', '2b84997dcd67aba6feacc42c86458c05d3e98b1fa573389a63', 'Job Seeker', '2014-07-14 07:51:10'),
(16, 'Jennifer', 'Sheehan', 'jen.irish@hotmail.com', 'jensheehan', 'b11e69e8f791ce2ca31c906df27b95285156f9b4', 'Job Seeker', '2014-07-15 16:04:23'),
(17, 'Andrea', 'Njegovan', 'andrea@gmail.com', 'andrea', 'a927d99f0f0e47c9b098fe473a95c50e6387cc7c', '', '2015-08-16 20:39:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_links`
--
ALTER TABLE `menu_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `menu_links`
--
ALTER TABLE `menu_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
