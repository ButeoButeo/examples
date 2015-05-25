-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 192.168.88.63    Database: learning_andrea
-- ------------------------------------------------------
-- Server version	5.6.21-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `about_settings`
--

DROP TABLE IF EXISTS `about_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `about_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `about_settings`
--

LOCK TABLES `about_settings` WRITE;
/*!40000 ALTER TABLE `about_settings` DISABLE KEYS */;
INSERT INTO `about_settings` VALUES (1,'It\'ll blow your mind.','Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.','about_img_1.jpg',1),(2,'See for yourself.','Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.','about_img_3.jpg',1),(3,'This one! Checkmate.','Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Donec ullamcorper nulla non metus auctor fringilla. Fusce dapibus, tellus ac cursus. Vestibulum id ligula porta felis euismod semper.','about_img_4.jpg',1);
/*!40000 ALTER TABLE `about_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'Mia','Njegovan','Mia','mianjegovan@gmail.com','5102ecd3d47f6561de70979017b87a80'),(4,'Andrea','Njegovan','AndreaDea','andreanjegovan@gmail.com','1c42f9c1ca2f65441465b43cd9339d6c');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Dresses'),(2,'Skirts'),(3,'Trousers'),(4,'Shorts'),(5,'Jumpers');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_settings`
--

DROP TABLE IF EXISTS `contact_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_settings`
--

LOCK TABLES `contact_settings` WRITE;
/*!40000 ALTER TABLE `contact_settings` DISABLE KEYS */;
INSERT INTO `contact_settings` VALUES (1,'Address','101 2nd Avenie'),(2,'City','Belgrade'),(3,'State','Serbia'),(4,'Email','mianjegovan@gmail.com'),(5,'Phone','+381 (0)60 24 100 20'),(6,'Skype','WA 98 101 98'),(7,'Image','contact.jpg'),(8,'Facebook','https://www.facebook.com'),(9,'LinkedIn','https://www.linkedin.com'),(10,'Twiter','https://twitter.com');
/*!40000 ALTER TABLE `contact_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `home_settings`
--

DROP TABLE IF EXISTS `home_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `home_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `button_title` varchar(255) NOT NULL,
  `button_link` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `home_settings`
--

LOCK TABLES `home_settings` WRITE;
/*!40000 ALTER TABLE `home_settings` DISABLE KEYS */;
INSERT INTO `home_settings` VALUES (1,'Find Out More About Us','Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula.','Learn More','shop/about','slide_img_2.jpg',1),(2,'Register Today','Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.','Sing Up Today','users/register','slide_img_3.jpg',1),(3,'See Our Products','Nullam id dolor id nibh ultricies vehicula ut id elit. Check it now.','Browse Gallery','products','slide_img_4.jpg',1),(6,'We\'d love to hear from you!','Donec id elit non mi porta gravida at eget metus.','Contact Us','contact','wome.jpg',1);
/*!40000 ALTER TABLE `home_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zipcode` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=208 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (91,2,3,'0',1,15.00,'Balzakova 15','','Novi Sad','Srbija',21000),(92,2,3,'0',1,15.00,'Balzakova 15','','Novi Sad','Srbija',21000),(113,4,5,'0',1,8.00,'Omladinskog Pokreta 6','','Novi Sad','Srbija',21000),(114,8,5,'0',1,12.00,'Husinskih Rudara 60','','Podgorica','Crna Gora',123456),(115,8,5,'0',1,12.00,'Husinskih Rudara 60','','Podgorica','Crna Gora',123456),(116,7,4,'0',2,20.00,'Gagarinova 15','','Novi Sad','Srbija',21000),(117,7,3,'0',1,10.00,'Novosadskog Sajma 23','','Beograd','Srbija',21000),(118,7,5,'0',1,10.00,'Omladinskog Pokreta 6','','Novi Sad','Srbija',21000),(119,5,5,'0',1,20.00,'Jevrejska 2','','Novi Sad','Srbija',21000),(120,1,5,'0',1,18.00,'Jevrejska 2','','Novi Sad','Srbija',21000),(121,2,6,'0',2,30.00,'100 Avenia','','Seatle','USA',123455),(122,24,7,'0',1,10.00,'350 Fifth Avenue','580 Fifth Avenue','New York','USA',10118),(123,15,7,'0',1,15.00,'350 Fifth Avenue','580 Fifth Avenue','New York','USA',10118),(124,1,3,'0',1,18.00,'Novosadskog Sajma 23','','Beograd','Srbija',21000),(125,3,7,'0',1,20.00,'350 Fifth Avenue','','New York','USA',85296),(126,3,7,'0',1,20.00,'Novosadskog Sajma 23','','Beograd','Srbija',21000),(127,25,7,'0',1,6.00,'350 Fifth Avenue','','New York','USA',589523),(128,2,7,'0',1,15.00,'Some Dummy Address 123','','Milan','Italy',85265),(129,1,5,'0',1,18.00,'Some Dummy Address 123','','Milan','Italy',85265),(130,2,5,'0',2,30.00,'Some Dummy Address 123','','Milan','Italy',85265),(131,5,5,'0',1,20.00,'Some Dummy Address 123','','Milan','Italy',85265),(132,1,5,'0',1,18.00,'Somborsi Bulevar 89','','Novi Sad','Serbia',123456),(133,2,5,'0',1,15.00,'Somborsi Bulevar 89','','Novi Sad','Serbia',123456),(134,1,5,'0',1,18.00,'Some Dummy Address 123','','Milan','Italy',85265),(135,1,5,'0',1,18.00,'Some Dummy Address 123','','Milan','Italy',85265),(136,5,5,'0',1,20.00,'Some Dummy Address 123','','Milan','Italy',85265),(137,5,5,'0',1,20.00,'Some Dummy Address 123','','Milan','Italy',85265),(138,4,5,'0',1,8.00,'Some Dummy Address 123','','Milan','Italy',85265),(139,2,5,'0',1,15.00,'Some Dummy Address 123','','Milan','Italy',85265),(140,8,5,'0',1,12.00,'Some Dummy Address 123','','Milan','Italy',85265),(141,8,5,'0',1,12.00,'Some Dummy Address 123','','Milan','Italy',85265),(142,27,5,'0',1,12.00,'Some Dummy Address 123','','Milan','Italy',85265),(143,9,5,'0',1,18.00,'Petra Drapsina 56','Teodo','Podgorica','Crna Gora',123456),(144,4,5,'0',1,8.00,'Puskinova 26','','Novi Sad','Serbia',21000),(145,5,5,'0',1,20.00,'Puskinova 26','','Novi Sad','Serbia',21000),(146,8,3,'0',1,12.00,'Balzakova 15','','New York','USA',85297),(147,11,3,'0',1,15.00,'Balzakova 15','','New York','USA',85297),(148,8,3,'0',1,12.00,'Balzakova 15','','New York','USA',85297),(149,11,3,'0',1,15.00,'Balzakova 15','','New York','USA',85297),(150,5,3,'0',1,20.00,'Gagarinova 15','','Novi Sad','Srbija',21000),(151,6,3,'0',1,15.00,'Gagarinova 15','','Novi Sad','Srbija',21000),(152,11,3,'0',1,15.00,'Some Dummy Address 123','','Milan','Italy',85265),(153,8,3,'0',1,12.00,'Some Dummy Address 123','','Milan','Italy',85265),(154,11,3,'0',1,15.00,'Some Dummy Address 123','','Milan','Italy',85265),(155,4,3,'0',1,8.00,'Some Dummy Address 123','','Milan','Italy',85265),(156,8,3,'0',1,12.00,'Some Dummy Address 123','','Milan','Italy',85265),(157,9,3,'0',1,18.00,'Some Dummy Address 123','','Milan','Italy',85265),(158,8,3,'0',1,12.00,'Some Dummy Address 123','','Milan','Italy',85265),(159,10,4,'0',1,15.00,'Balzakova 15','Teodora Mandica 46','Novi Sad','Serbia',123456),(160,12,4,'0',1,10.00,'Balzakova 15','Teodora Mandica 46','Novi Sad','Serbia',123456),(161,17,4,'0',1,10.00,'Some Dummy Address 123','','Milan','Italy',85265),(162,8,4,'0',1,12.00,'Some Dummy Address 123','','Milan','Italy',85265),(163,2,4,'0',1,15.00,'Some Dummy Address 123','','Milan','Italy',85265),(164,5,4,'0',1,20.00,'Some Dummy Address 123','','Milan','Italy',85265),(165,5,4,'0',1,20.00,'Some Dummy Address 123','','Milan','Italy',85265),(166,8,4,'0',1,12.00,'Some Dummy Address 123','','Milan','Italy',85265),(167,4,4,'0',1,8.00,'Some Dummy Address 123','','Milan','Italy',85265),(168,5,4,'0',1,20.00,'Some Dummy Address 123','','Milan','Italy',85265),(169,1,4,'0',1,18.00,'Some Dummy Address 123','','Milan','Italy',85265),(170,5,4,'0',1,20.00,'Some Dummy Address 123','','Milan','Italy',85265),(171,8,4,'0',1,12.00,'Some Dummy Address 123','','Milan','Italy',85265),(172,5,4,'0',1,20.00,'Some Dummy Address 123','','Milan','Italy',85265),(173,11,4,'0',1,15.00,'Some Dummy Address 123','','Milan','Italy',85265),(174,10,4,'0',1,15.00,'Some Dummy Address 123','','Milan','Italy',85265),(175,5,4,'0',1,20.00,'Some Dummy Address 123','','Milan','Italy',85265),(176,8,4,'0',1,12.00,'Some Dummy Address 123','','Milan','Italy',85265),(177,7,7,'0',1,10.00,'Street 89','580 Fifth Avenue','New York','USA',589523),(178,8,7,'0',1,12.00,'Street 89','580 Fifth Avenue','New York','USA',589523),(179,8,7,'0',1,12.00,'Street 89','580 Fifth Avenue','New York','USA',85269),(180,7,7,'0',1,10.00,'Street 89','580 Fifth Avenue','New York','USA',85269),(181,11,7,'0',1,15.00,'Some Dummy Address 123','','Milan','Italy',85265),(182,10,7,'0',1,15.00,'Some Dummy Address 123','','Milan','Italy',85265),(183,10,7,'0',1,15.00,'Some Dummy Address 123','','Milan','Italy',85265),(184,11,7,'0',1,15.00,'Some Dummy Address 123','','Milan','Italy',85265),(185,10,7,'0',1,15.00,'Street 89','580 Fifth Avenue','New York','USA',85269),(186,3,7,'0',1,20.00,'Street 89','580 Fifth Avenue','New York','USA',85269),(187,10,7,'0',2,30.00,'Street 89','580 Fifth Avenue','New York','USA',85269),(188,11,7,'0',1,15.00,'Street 89','580 Fifth Avenue','New York','USA',85269),(189,10,7,'0',2,30.00,'Some Dummy Address 123','','Milan','Italy',85265),(190,11,7,'0',1,15.00,'Some Dummy Address 123','','Milan','Italy',85265),(191,4,7,'0',1,8.00,'Some Dummy Address 123','','Milan','Italy',85265),(192,5,7,'0',1,20.00,'Some Dummy Address 123','','Milan','Italy',85265),(193,3,7,'0',2,40.00,'Some Dummy Address 123','','Milan','Italy',85265),(194,4,7,'0',1,8.00,'Some Dummy Address 123','','Milan','Italy',85265),(195,3,7,'0',1,20.00,'Street 89','580 Fifth Avenue','New York','USA',85269),(196,3,7,'0',1,20.00,'Some Dummy Address 123','','Milan','Italy',85265),(197,3,7,'0',1,20.00,'Street 89','580 Fifth Avenue','New York','USA',85269),(198,3,7,'0',1,20.00,'Some Dummy Address 123','','Milan','Italy',85265),(199,3,7,'0',1,20.00,'Street 89','580 Fifth Avenue','New York','USA',85269),(200,3,7,'0',1,20.00,'Street 89','580 Fifth Avenue','New York','USA',85269),(201,3,5,'0',1,20.00,'Balzakova 15','Teodora Mandica 46','Novi Sad','Serbia',123456),(202,2,5,'0',1,15.00,'Some Dummy Address 123','','Milan','Italy',85265),(203,3,5,'0',1,20.00,'Some Dummy Address 123','','Milan','Italy',85265),(204,3,5,'0',1,20.00,'Some Dummy Address 123','','Milan','Italy',85265),(205,4,5,'0',1,8.00,'Street 89','580 Fifth Avenue','New York','USA',85269),(206,5,5,'0',1,20.00,'Street 89','580 Fifth Avenue','New York','USA',85269),(207,1,8,'0',1,18.00,'Dummy Address 89','','Miami','US',13456);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `specifications` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `published` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,1,0,'Callie Plunge Dress','Whether it’s sugary show- stoppers or monochrome midis, we’ve got need-right-now night out dresses nailed. Dresses turn to tomboy textures.','Shoulder to Hem: 86cm/34, Bust: 39cm/15.25, Waist: 32cm/12.5, Hips: 43cm/17','dress1.jpg',18.00,1),(2,1,1,'Lucy Neck Slinky Dress','Look knock-out on nights out in figure-skimming bodycon fits, flowing maxi lengths and stunning sequin-embellished occasion dresses.','Shoulder to Hem: 86cm/34, Bust: 39cm/15.25, Waist: 32cm/12.5, Hips: 43cm/17','dress2.jpg',15.00,1),(3,1,1,'Billie Wrap Front Dress','Look knock-out on nights out in figure-skimming bodycon fits, flowing maxi lengths and stunning sequin-embellished occasion dresses.','Shoulder To Hem: 133cm/52, Bust: 41cm/16, Waist: 36cm/14, Model Wears Size: 10','dress3.jpg',20.00,1),(4,2,1,'Maria Box Pleat Skirt','Beat the winter blues with bodycon skirts in bright primary colours, or play with the punchy palette in pleated skirts to channel a cheerleader vibe.','Total Length: 42cm/16.5, Waist: 34cm/13.5','skirt1.jpg',8.00,1),(5,2,1,'Ivy Double Mesh Midi Skirt','Streamline your style in a sleek skirt. Take your style to new lengths, whether it’s micro minis or split side maxis, or flirt with the feminine side of fashion in a form fitting pencil skirt.','Total Length: 72cm/28.5, Waist: 32cm/12.5','skirt2.jpg',20.00,1),(6,3,1,'Kristie Bag Trousers','Perfect the flattering way to wear relaxed fits with these paper bag style shorts! Wear them with a crop top, barely-there heels and an envelope clutch.','Total Length: 100cm/39.5, Inside Leg: 73cm/28.5, Waist: 32cm/12.5','trousers1.jpg',15.00,1),(7,4,1,'Fiona Crepe Short','Perfect the flattering way to wear relaxed fits with these paper bag style shorts! Wear them with a crop top, barely-there heels and an envelope clutch.',' Total Length: 38cm/15, Waist: 31cm/12','short1.jpg',10.00,1),(8,5,1,'Sasha Oversized Jumper','A cool boyfriend cardigan or sweet jumper is the perfect way to cover up when it gets a little chilly. Wear oversized jumpers are vintage- inspired.','Centre Back to Hem: 64cm/25, Bust: 53cm/21, Hem Width: 25cm/10, Sleeve Length: 51cm/20','jumper1.jpg',12.00,1),(9,5,1,'Eillie Oversized Jumper','Go back to nature with your knits this season and add animal motifs to your must-haves. When you\'re not wrapping up in woodland warmers, nod to chunky Nordic knits and polo neck jumpers in peppered marl for your laidback layering pieces.','Centre Back to Hem: 64cm/25, Bust: 53cm/21, Hem Width: 25cm/10, Sleeve Length: 51cm/20','jumper2.jpg',18.00,1),(10,5,1,'Diana Crop Jumper','Turtle necks are totally on trend this season, making this high neck jumper the only way to wear your knits! Style it with high waisted jeans, chunky ankle boots and a bold lip.','Centre Back to Hem: 64cm/25, Bust: 53cm/21, Hem Width: 25cm/10, Sleeve Length: 51cm/20','jumper3.jpg',15.00,1),(11,4,1,'Mariella Trim Shorts','A versatile day-to-night option, new season shorts aren\'t all about showing some leg - think mid-length culottes and borrowed-from-the-boy longline styles for a more conservative take on the cropped length.',' Total Length: 38cm/15, Waist: 31cm/12','short2.jpg',15.00,1),(12,4,1,'Alice Flippy Shorts','A versatile day-to-night option, new season shorts aren\'t all about showing some leg - think mid-length culottes and borrowed-from-the-boy longline styles for a more conservative take on the cropped length.',' Total Length: 38cm/15, Waist: 31cm/12','short3.jpg',10.00,1),(13,3,1,'Rea Formal Joggers','Bring a sophisticated side to sporty with these tapered leg joggers, featuring a flattering high waist so you can up your going out game!','Total Length: 100cm/39.5, Inside Leg: 73cm/28.5, Waist: 32cm/12.5','trousers2.jpg',18.00,1),(14,3,1,'Fiona Mabel Print Trousers','Trousers take on a relaxed silhouette for the new season, with sports tailoring setting the trends and the wide leg one to watch.','Total Length: 100cm/39.5, Inside Leg: 73cm/28.5, Waist: 32cm/12.5','trousers3.jpg',12.00,1),(15,3,1,'Rita Elephant Print Trousers','Trousers take on a relaxed silhouette for the new season, with sports tailoring setting the trends and the wide leg one to watch.','Total Length: 101cm/39.5, Inside Leg: 73cm/28.5, Waist: 36cm/14','trousers4.jpg',15.00,1),(16,2,1,'Mila Box Pleat Skirt','AW has arrived, so layer up in a day skirt, some chunky ankle boots and a soft-knit jumper for a cosy and casual style. Think mini skirts in tartan prints and staple jersey midis in block colours.','Total Length 37cm/14.5, Waist 32cm/13','skirt3.png',15.00,1),(17,2,1,'Rose Flippy Style Skirt','Beat the winter blues with bodycon skirts in bright primary colours, or play with the punchy palette in pleated skirts to channel a cheerleader vibe.','Total Length: 44cm/17.5, Waist: 28cm/11','skirt4.png',10.00,1),(18,1,1,'Lulu Lace Dress','Nothing says party princess like a gorgeous prom dress, and this lace bandeau dress is perfect for your glam occasion. It’s a strapless style with a dipped neckline, and a nipped in waist.','Lining: 100% Polyester,\r\nBack to Hem: 70cm/27.5,\r\nBust: 33cm/13','dress4.jpg',20.00,1),(19,5,1,'Natalie Slash Neck Jumper','AW is here and it’s time to get the knitwear out! From cable knit cardigans and oversized jumpers, layer up your look this season. Work waterfall designs and off- the-shoulder shapes into your winter wardrobe.','Front To Hem: 47cm/18.5,\r\nSleeve Length: 54cm/21,\r\nHem Width: 42cm/16.5','jumper4.jpg',10.00,1),(20,4,1,'Catrin Trim Runner Shorts','It’s short time! Let’s experiment with lengths - dare to bare in knock-out knicker shorts and high shine hotpants, or go borrowed from the boyfriend in tailored board shorts.','Total Length: 27cm/10.5,\r\nWaist: 31cm/12,\r\nUK Size: 10','short4.jpg',6.00,1),(21,1,1,'Raven Cut Away Dress','No off-duty wardrobe is complete without a casual day dress. Basic bodycon dresses are always a winner and casual cami dresses a key piece for pairing with a polo neck, giving you that effortless everyday edge.','Shoulder To Hem: 133cm/52,\r\nBust: 41cm/16,\r\nWaist: 36cm/14\r\nSize: 10','dress5.jpg',15.00,1),(22,1,1,'Maya Scoop Neck Dress','This skater dress wins the award for most wearable wardrobe item. Fabulously flattering, we love wearing ours with an unbuttoned shirt and flat sandals for day, while adding towering heels takes you from day to the dance floor.','Back to Hem: 65cm/25.5, Bust: 33cm/13, Waist: 30cm/12, Armhole: 21cm/8.25','dress6.jpg',20.00,1),(23,1,1,'Brenda Crepe Cross Dress','Whether it’s sugary show- stoppers or monochrome midis, we’ve got need-right-now night out dresses nailed. Bodycon dresses turn to tomboy textures with killer quilting, shift dresses get sporty with supersize sleeves and t shirt dresses take to the dance floor in iridescent metallics.','Shoulder To Hem: 133cm/52, Bust: 41cm/16, Waist: 36cm/14','dress7.jpg',15.00,1),(24,2,1,'Roseanna Flippy Skirt','Beat the winter blues with bodycon skirts in bright primary colours, or play with the punchy palette in pleated skirts to channel a cheerleader vibe. Continuing the sporty theme, midi skirts come with stripe trims and ribbed finishes so you can work off-court cool on off-duty days.','Total Length: 44cm/17.5, Waist: 28cm/11','skirt5.jpg',10.00,1),(25,4,0,'Tia Disco Knicker Shorts','A versatile day-to-night option, new season shorts aren\'t all about showing some leg - think mid-length culottes and borrowed-from-the-boy longline styles for a more conservative take on the cropped length.','Total Length: 23cm/9, Waist: 34cm/13.5','short5.jpg',6.00,1),(27,2,0,'Julie Maxi Skirt','We\'ve got plenty of time for pin-bearing skirts this season. A-lines stand out as the A-list style - try out minis in button down denim with wedges for that throwback 60s vibe!','Total Length: 107cm/42, Waist: 33cm/13','skirt6.jpg',12.00,1),(28,2,0,'Camilla Cut Midi Skirt','Steal the spotlight this season in micro minis, of-the-moment midis and floor-sweeping maxi skirts. Whether you stick to separates or go matchy-matchy in a co-ord crop top, a skirt is the starting point to any stellar party look.','Total Length: 69cm/27, Waist: 33cm/13','skirt7.jpg',15.00,1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'Olinka','Njegovan','olinka.njegovan@gmail.com','OlinkaNj','d71dfce3a60b1fe23bdf62ae41b2bb0e','2015-03-01 13:07:07'),(4,'Mary','Roberts','m.roberts@mail.com','MaryR','b8e7be5dfa2ce0714d21dcfc7d72382c','2015-03-01 21:25:48'),(5,'Punisa','Drakulovic','puno.drakulovic@gmail.com','PunoD','e565ff3b6807e58e6da2e4995635bc60','2015-03-03 19:14:34'),(6,'John','Doe','jdoe@gmail.com','John','527bd5b5d689e2c32ae974c6229ff785','2015-04-14 16:39:41'),(7,'Lexi','Ross','l.ross@mail.com','LexiR','5878236d40a1f4093c07b4506b2d7a2c','2015-04-23 19:46:47'),(8,'Monika','Apen','m.apen@mail.com','MonikaA','6f3fc039bfe1efdb272111f276a0e84a','2015-05-24 21:31:56');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-05-25 22:55:33
