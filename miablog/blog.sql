-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2015 at 11:07 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'News'),
(2, 'Events'),
(3, 'Trends'),
(4, 'Collections');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category`, `title`, `body`, `author`, `tags`, `date`) VALUES
(2, 3, 'The Poldark Spectacle', 'Essentially, it''s a lightweight design ideal for wearing over your current garb - but be sure to lose the chunky knit jumper beneath as it will create too much bulk for a coat that''s all about a smart easiness. Dries Van Noten had the right idea for a balmy sense of dressing (let''s put a note in our diary for August on this one then) and Miu Miu and MaxMara showed how to do it when it comes to occasion dressing, of which spring throws up plenty of. It''ll smarten up jeans and makes a change to a short-jacket-and-dress ensemble.', 'Andrea Njegovan', 'clothes news, clothes events', '2015-01-18 17:42:39'),
(6, 2, 'Jy Kim', 'The Fashion Event buyers understand that ''trendy'' clothing comes with an expiration date, so they seek out unique and unusual clothing that will turn heads today, tomorrow, and in ten years from now. It is time. Be there - AUTUMN/WINTER 2015-16', 'Andrea Njegovan', 'test', '2015-01-22 21:51:01'),
(7, 3, 'Summer Fashion Poll', 'What will you be wearing come May? We polled a cross-section of Vogue editors to discern what statement pieces will get their fashion vote next month. Will the humble fashion peasant shirt be in a coalition with the statement silk blouse? And, have we had enough of Seventies haute bohemia? Is it time to vote in the party loving Eighties disco girl as our new silhouette?', 'Mia Njegovan', 'post', '2015-02-04 21:38:19'),
(8, 1, 'Suzy Menkes In Conversation With David Lauren', 'On the second day of the Conde Nast International Luxury Conference in Florence, Suzy Menkes speaks to David Lauren of Ralph Lauren. Watch the interview in full below.', 'Olinka Njegovan', 'new', '2015-02-16 11:24:18'),
(9, 3, 'Ways To Wear: The Long Waistcoat', 'SRING is about shedding layers - and quite literally in the case of the longer length waistcoat, your next stop on from the transitional coat (refresh yourself on those here). What you gain in hem space, you lose in sleevage - so it''s the ideal in-between garment as the temperature dial cranks up and your wardrobe grapples to keep up with it.', 'Mia Njegovan', 'wear, trend', '2015-02-02 03:23:19'),
(10, 3, 'The Return of The Clog', 'Throughout the year, the general public is invited to purchase from our exclusive collection of ladieswear. In addition to our major events, The Fashion Event has developed a unique fundraising program, whereby charitable organizations are able to raise funds in an enjoyable and effortless way.', 'Andrea Njegovan', 'clog, trend', '2015-01-04 06:38:19'),
(11, 2, 'Alcoolique', 'SRING is about shedding layers - and quite literally in the case of the longer length waistcoat, your next stop on from the transitional coat (refresh yourself on those here). What you gain in hem space, you lose in sleevage - so it''s the ideal in-between garment as the temperature dial cranks up and your wardrobe grapples to keep up with it.', 'Mia Njegovan', 'wear, trend', '2015-02-02 03:23:19'),
(13, 3, 'Blake Lively Style File', 'Something of a fashion world darling, she''s been a regular on the front rows of New York Fashion Week, starred in a Chanel campaign - she even accompanied Karl Lagerfeld to the 2011 Met Ball - and was named the face of Gucci''s Premiere fragrance in 2012.\r\n\r\nIn 2012 she wore a bespoke Marchesa bridal gown to marry fellow actor Ryan Reynolds at the Boone Hall Plantation in Mount Pleasant, South Carolina. The couple welcomed their first child, a daughter named James, in December 2014. ', 'Lucy Hutchings', 'trend, fashion', '2015-04-23 19:15:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
