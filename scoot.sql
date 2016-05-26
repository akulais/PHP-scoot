CREATE DATABASE  IF NOT EXISTS `scoot` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `scoot`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: scoot
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `childs`
--

DROP TABLE IF EXISTS `childs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `childs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `image` int(11) DEFAULT NULL,
  `age` date DEFAULT NULL,
  `allergies` text,
  `foods_likes` text,
  `foods_dislikes` text,
  `dr_name` varchar(255) DEFAULT NULL,
  `dr_contact_info` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `childs`
--

LOCK TABLES `childs` WRITE;
/*!40000 ALTER TABLE `childs` DISABLE KEYS */;
INSERT INTO `childs` VALUES (1,'Liam',0,'2012-03-23','nka','meat and carbs','vegetables','Dr. Suess','555-867-5309','2016-04-13 04:47:23','2016-04-13 04:47:23'),(2,'New kid',0,'2016-01-01','peanuts','pooping','sleeping','suess','nope','2016-05-06 17:17:34','2016-05-06 17:17:34'),(3,'Test',5,'2016-01-01','NKA','ice cream','vegetables','Dr. Suess','555 555 5555','2016-05-19 21:17:35','2016-05-19 21:17:35'),(24,'New one',7,'2010-01-01','NKA','Hummus','carrots','Jones','J_jj@gmail.com','2016-05-24 11:43:39','2016-05-24 11:43:39');
/*!40000 ALTER TABLE `childs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `childs_users`
--

DROP TABLE IF EXISTS `childs_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `childs_users` (
  `child_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`child_id`,`user_id`),
  KEY `fk_childs_has_users_users1_idx` (`user_id`),
  KEY `fk_childs_has_users_childs_idx` (`child_id`),
  CONSTRAINT `fk_childs_has_users_childs` FOREIGN KEY (`child_id`) REFERENCES `childs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_childs_has_users_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `childs_users`
--

LOCK TABLES `childs_users` WRITE;
/*!40000 ALTER TABLE `childs_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `childs_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `comments` text,
  `amount` varchar(45) DEFAULT NULL,
  `user2_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `child_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`child_id`),
  KEY `fk_events_childs1_idx` (`child_id`),
  CONSTRAINT `fk_events_childs1` FOREIGN KEY (`child_id`) REFERENCES `childs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (3,'fluids','milk','had 2 cups','all',1,'2016-04-13 04:48:10','2016-04-13 04:48:10',1),(6,'booms','poop','no strain, stinky','large',1,'2016-04-13 04:48:56','2016-04-13 04:48:56',1),(7,'booms','poop','','avg',1,'2016-05-18 14:13:52','2016-05-18 14:13:52',2),(8,'booms','poop','nothing','avg',1,'2016-05-19 21:25:55','2016-05-19 21:25:55',3),(9,'booms','poop','','small',1,'2016-05-19 22:19:34','2016-05-19 22:19:34',1),(10,'booms','poop','','large',1,'2016-05-19 22:19:42','2016-05-19 22:19:42',1),(11,'booms','poop','','large',1,'2016-05-20 11:57:38','2016-05-20 11:57:38',1),(18,'medicines','meds','every 5hr','2ml',3,'2016-05-23 13:05:29','2016-05-23 13:05:29',1),(21,'drink','Water','thirsty','all',1,'2016-05-24 11:44:20','2016-05-24 11:44:20',24),(23,'food','Pizza','Pepperoni','some',1,'2016-05-24 11:45:30','2016-05-24 11:45:30',24),(26,'medicines','Tylenol','every 4hr','5ml',1,'2016-05-24 13:27:09','2016-05-24 13:27:09',24),(27,'booms','poop','','small',1,'2016-05-24 13:30:50','2016-05-24 13:30:50',24),(28,'booms','poop','','wet',1,'2016-05-24 14:05:14','2016-05-24 14:05:14',24),(29,'booms','poop','','wet',1,'2016-05-24 14:23:11','2016-05-24 14:23:11',24),(30,'booms','poop','','wet',1,'2016-05-24 14:54:16','2016-05-24 14:54:16',24),(32,'booms','poop','','wet',1,'2016-05-24 15:08:13','2016-05-24 15:08:13',24),(33,'booms','poop','sick','wet',1,'2016-05-24 15:16:29','2016-05-24 15:16:29',3),(34,'booms','poop','','avg',1,'2016-05-24 15:21:34','2016-05-24 15:21:34',2),(36,'booms','poop','','avg',1,'2016-05-24 22:12:12','2016-05-24 22:12:12',24),(37,'booms','poop','','large',1,'2016-05-24 22:34:15','2016-05-24 22:34:15',1),(42,'booms','poop','','avg',1,'2016-05-25 10:35:06','2016-05-25 10:35:06',24),(44,'medicines','Motrin','every 8hr','7ml',1,'2016-05-25 12:18:54','2016-05-25 12:18:54',24),(45,'drink','Milk','not that thirsty','some',1,'2016-05-25 12:28:27','2016-05-25 12:28:27',2);
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`event_id`),
  KEY `fk_notifications_events1_idx` (`event_id`),
  CONSTRAINT `fk_notifications_events1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'William','akulais@gmail.com','father','25d55ad283aa400af464c76d713c07ad','2016-04-13 04:43:15','2016-04-13 04:43:15'),(2,'Lily','lilyzx@gmail.com','mother','25d55ad283aa400af464c76d713c07ad','2016-04-13 04:45:10','2016-04-13 04:45:10'),(3,'New','me@me.com','other_family','25d55ad283aa400af464c76d713c07ad','2016-05-23 12:13:50','2016-05-23 12:13:50'),(4,'james madison','j@gmail.com','grandparent','25d55ad283aa400af464c76d713c07ad','2016-05-25 10:51:51','2016-05-25 10:51:51'),(5,'Mickey','mikemike@this.com','sitter','25d55ad283aa400af464c76d713c07ad','2016-05-25 12:21:15','2016-05-25 12:21:15'),(6,'mathew jones','mathew@2gmail.com','other_family','25d55ad283aa400af464c76d713c07ad','2016-05-25 13:06:21','2016-05-25 13:06:21'),(7,'Bill Murray','helpus@all.com','sitter','25d55ad283aa400af464c76d713c07ad','2016-05-25 13:10:07','2016-05-25 13:10:07'),(8,'William Morgan','akulais@gmail.com','mother','25d55ad283aa400af464c76d713c07ad','2016-05-25 13:10:41','2016-05-25 13:10:41'),(9,'','','mother','d41d8cd98f00b204e9800998ecf8427e','2016-05-25 13:11:03','2016-05-25 13:11:03'),(10,'new','f@f.com','sitter','25d55ad283aa400af464c76d713c07ad','2016-05-25 13:12:28','2016-05-25 13:12:28'),(11,'tester','tester@gmail.com','sitter','25d55ad283aa400af464c76d713c07ad','2016-05-25 13:24:31','2016-05-25 13:24:31');
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

-- Dump completed on 2016-05-25 19:07:16
