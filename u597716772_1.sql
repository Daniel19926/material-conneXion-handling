-- MySQL dump 10.15  Distrib 10.0.23-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: u597716772_1
-- ------------------------------------------------------
-- Server version	10.0.25-MariaDB

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
-- Table structure for table `library`
--

DROP TABLE IF EXISTS `library`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `library` (
  `dt` datetime DEFAULT CURRENT_TIMESTAMP,
  `matstatus` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'OK',
  `eventtype` varchar(8) COLLATE utf8_unicode_ci DEFAULT 'Insert',
  `username` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `rownumber` int(11) DEFAULT NULL,
  `shelfname` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `placename` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `placeposition` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `category` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `position` (`position`,`rownumber`,`shelfname`,`placename`,`placeposition`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `library`
--

/*!40000 ALTER TABLE `library` DISABLE KEYS */;
INSERT INTO `library` VALUES ('2016-05-26 10:11:56','other','Update','guest',5,3,'AA','Skövde','Main library Skövde','4444-55','Carbon-Based'),('2016-05-26 10:19:09','OK','Insert','daniel.rosmark',7,2,'AA','Skövde','Main library Skövde','1222-21','Process'),('2016-05-26 12:10:45','OK','Insert','daniel.rosmarks',6,2,'AB','Tibro','Main library Tibro','6666-55','Cement-Based'),('2016-05-26 12:11:01','OK','Insert','daniel.rosmarks',7,2,'AA','Tibro','Main library Tibro','9999-77','Glass'),('2016-06-19 20:10:12','OK','Insert','daniel.rosmark',5,2,'AA','Skövde','Main library Skövde','5478-65','Ceramics'),('2016-06-19 20:19:03','OK','Insert','daniel.rosmark',8,2,'AB','Tibro','Main library Tibro','5412-65','Naturals'),('2016-06-19 20:19:49','OK','Insert','daniel.rosmark',6,2,'AA','Skövde','Main library Skövde','8745-98','Polymers'),('2016-07-31 16:03:26','OK','Insert','guest',6,3,'AA','Skövde','Main library Skövde','6589-87','Metals'),('2016-07-31 16:03:46','OK','Insert','guest',7,2,'AB','Tibro','Main library Tibro','5789-65','Metals'),('2016-08-12 08:44:36','OK','Insert','guest',4,2,'AA','Skövde','Main library Skövde','4444-33','Cement-Based'),('2016-08-13 12:25:44','OK','Insert','guest',6,1,'AA','Skövde','Cooridor 1','5555-87','Carbon-Based'),('2016-08-14 11:41:58','OK','Insert','guest',3,2,'AB','Tibro','Main library Tibro','7898-98','Metals'),('2016-08-17 22:53:23','OK','Insert','guest',8,2,'AA','Skövde','Main library Skövde','6545-89','Metals'),('2016-08-17 22:54:27','OK','Insert','guest',7,2,'AA','Skövde','Main library Skövde','1114-54','Metals'),('2016-08-17 23:14:35','OK','Insert','guest',7,1,'AA','Skövde','Main library Skövde','7854-65','Cement-Based'),('2016-08-17 23:21:35','OK','Insert','guest',8,1,'AA','Skövde','Main library Skövde','6544-87','Cement-Based'),('2016-08-17 23:31:01','OK','Insert','guest',6,2,'AA','Skövde','Main library Skövde','5848-98','Carbon-Based');
/*!40000 ALTER TABLE `library` ENABLE KEYS */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`u597716772_1`@`localhost`*/ /*!50003 TRIGGER afterinsert
AFTER INSERT
   ON library FOR EACH ROW

BEGIN

   INSERT INTO logtable
   ( id,
     changedate,
     username,
     matstatus)
   VALUES
   ( NEW.id,
     SYSDATE(),
     new.username,
     new.matstatus);

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`u597716772_1`@`localhost`*/ /*!50003 TRIGGER afterupdate
AFTER UPDATE
   ON library FOR EACH ROW

BEGIN
   INSERT INTO logtable
   ( id,
     changedate,
     username,
     matstatus,
     eventtype
     )
   VALUES
   ( NEW.id,
     SYSDATE(),
     new.username,
     new.matstatus,
     new.eventtype);

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `logtable`
--

DROP TABLE IF EXISTS `logtable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logtable` (
  `username` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `changedate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `matstatus` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eventtype` varchar(8) COLLATE utf8_unicode_ci DEFAULT 'Insert'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logtable`
--

/*!40000 ALTER TABLE `logtable` DISABLE KEYS */;
INSERT INTO `logtable` VALUES ('daniel.rosmark','4444-55','2016-05-26 10:11:56','OK','Insert'),('daniel.rosmark','1222-21','2016-05-26 10:19:09','OK','Insert'),('daniel.rosmarks','6666-55','2016-05-26 12:10:45','OK','Insert'),('daniel.rosmarks','9999-77','2016-05-26 12:11:01','OK','Insert'),('daniel.rosmark','5478-65','2016-06-19 20:10:12','OK','Insert'),('daniel.rosmark','5412-65','2016-06-19 20:19:03','OK','Insert'),('daniel.rosmark','8745-98','2016-06-19 20:19:49','OK','Insert'),('guest','6589-87','2016-07-31 16:03:26','OK','Insert'),('guest','5789-65','2016-07-31 16:03:46','OK','Insert'),('guest','4444-55','2016-08-10 13:31:02','Select item','Update'),('guest','4444-55','2016-08-10 13:31:34','Select item','Update'),('guest','4444-55','2016-08-10 13:34:31','user','Update'),('guest','4444-55','2016-08-10 13:36:20','user','Update'),('guest','4444-55','2016-08-10 14:11:55','Select item','Update'),('guest','4444-55','2016-08-10 14:15:49','user','Update'),('guest','4444-33','2016-08-12 08:44:36','OK','Insert'),('guest','4444-55','2016-08-12 09:10:54','user','Update'),('guest','4444-55','2016-08-12 09:21:54','select issue','Update'),('guest','4444-55','2016-08-12 09:21:54','select issue','Update'),('guest','4444-55','2016-08-12 09:25:10','5','Update'),('guest','4444-55','2016-08-12 09:25:10','5','Update'),('guest','4444-55','2016-08-12 09:26:16','2','Update'),('guest','4444-55','2016-08-12 09:26:16','2','Update'),('guest','4444-55','2016-08-12 09:28:07','2','Update'),('guest','4444-55','2016-08-12 09:28:07','2','Update'),('guest','4444-55','2016-08-12 09:28:37','Return material to supplier','Update'),('guest','4444-55','2016-08-12 09:28:37','Return material to supplier','Update'),('guest','4444-55','2016-08-12 09:31:27','5','Update'),('guest','4444-55','2016-08-12 09:31:27','5','Update'),('guest','4444-55','2016-08-12 09:39:36','Return material to supplier','Update'),('guest','4444-55','2016-08-12 09:39:36','Return material to supplier','Update'),('guest','4444-55','2016-08-12 09:43:03','other','Update'),('guest','4444-55','2016-08-12 09:43:03','other','Update'),('guest','5555-87','2016-08-13 12:25:44','OK','Insert'),('guest','7898-98','2016-08-14 11:41:58','OK','Insert'),('guest','6545-89','2016-08-17 22:53:23','OK','Insert'),('guest','1114-54','2016-08-17 22:54:27','OK','Insert'),('guest','7854-65','2016-08-17 23:14:35','OK','Insert'),('guest','6544-87','2016-08-17 23:21:35','OK','Insert'),('guest','5848-98','2016-08-17 23:31:01','OK','Insert');
/*!40000 ALTER TABLE `logtable` ENABLE KEYS */;

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material` (
  `id` char(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `category` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`category`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material`
--

/*!40000 ALTER TABLE `material` DISABLE KEYS */;
INSERT INTO `material` VALUES ('0027-24','Ceramics'),('0417-03','Metals'),('7457-05','Cement-Based'),('7507-02','Carbon-Based'),('7525-01','Glass'),('7528-02','Polymers'),('7540-01','Process'),('7541-01','Naturals');
/*!40000 ALTER TABLE `material` ENABLE KEYS */;

--
-- Table structure for table `pdf`
--

DROP TABLE IF EXISTS `pdf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pdf` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `file` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `signature` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pdf`
--

/*!40000 ALTER TABLE `pdf` DISABLE KEYS */;
INSERT INTO `pdf` VALUES (8,'6323-delivery-note-2016-06-06-vr.pdf','applicatio',847349,NULL),(9,'63170-delivery-note-2016-06-06-vr.pdf','applicatio',847349,NULL),(10,'7040-delivery-note-2016-06-06-vr.pdf','applicatio',847349,NULL),(11,'63082-delivery-note-2016-06-06-vr.pdf','applicatio',847349,NULL);
/*!40000 ALTER TABLE `pdf` ENABLE KEYS */;

--
-- Table structure for table `place`
--

DROP TABLE IF EXISTS `place`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `place` (
  `placename` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`placename`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `place`
--

/*!40000 ALTER TABLE `place` DISABLE KEYS */;
INSERT INTO `place` VALUES ('Skövde'),('Tibro');
/*!40000 ALTER TABLE `place` ENABLE KEYS */;

--
-- Table structure for table `placepos`
--

DROP TABLE IF EXISTS `placepos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `placepos` (
  `placeposition` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `placename` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`placeposition`,`placename`),
  KEY `placename` (`placename`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `placepos`
--

/*!40000 ALTER TABLE `placepos` DISABLE KEYS */;
INSERT INTO `placepos` VALUES ('Cooridor 1','Skövde'),('Main library Skövde','Skövde'),('Main library Tibro','Tibro');
/*!40000 ALTER TABLE `placepos` ENABLE KEYS */;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `role` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`role`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES ('Admin'),('Guest'),('User');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

--
-- Table structure for table `rowposition`
--

DROP TABLE IF EXISTS `rowposition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rowposition` (
  `id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT '0',
  `rownumber` int(11) NOT NULL DEFAULT '0',
  `shelfname` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `placename` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `placeposition` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`position`,`rownumber`,`shelfname`,`placename`,`placeposition`),
  KEY `placename` (`placename`,`shelfname`,`placeposition`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rowposition`
--

/*!40000 ALTER TABLE `rowposition` DISABLE KEYS */;
INSERT INTO `rowposition` VALUES (NULL,1,1,'AA','Skövde','Main library Skövde'),(NULL,2,1,'AA','Skövde','Main library Skövde'),(NULL,3,1,'AA','Skövde','Main library Skövde'),(NULL,4,1,'AA','Skövde','Main library Skövde'),(NULL,5,1,'AA','Skövde','Main library Skövde'),(NULL,6,1,'AA','Skövde','Main library Skövde'),('7854-65',7,1,'AA','Skövde','Main library Skövde'),('6544-87',8,1,'AA','Skövde','Main library Skövde'),(NULL,9,1,'AA','Skövde','Main library Skövde'),(NULL,10,1,'AA','Skövde','Main library Skövde'),(NULL,1,2,'AA','Skövde','Main library Skövde'),(NULL,2,2,'AA','Skövde','Main library Skövde'),(NULL,3,2,'AA','Skövde','Main library Skövde'),('4444-33',4,2,'AA','Skövde','Main library Skövde'),('5478-65',5,2,'AA','Skövde','Main library Skövde'),('5848-98',6,2,'AA','Skövde','Main library Skövde'),('1114-54',7,2,'AA','Skövde','Main library Skövde'),('6545-89',8,2,'AA','Skövde','Main library Skövde'),(NULL,9,2,'AA','Skövde','Main library Skövde'),(NULL,10,2,'AA','Skövde','Main library Skövde'),(NULL,1,3,'AA','Skövde','Main library Skövde'),(NULL,2,3,'AA','Skövde','Main library Skövde'),(NULL,3,3,'AA','Skövde','Main library Skövde'),(NULL,4,3,'AA','Skövde','Main library Skövde'),('4444-55',5,3,'AA','Skövde','Main library Skövde'),('6589-87',6,3,'AA','Skövde','Main library Skövde'),(NULL,7,3,'AA','Skövde','Main library Skövde'),(NULL,8,3,'AA','Skövde','Main library Skövde'),(NULL,9,3,'AA','Skövde','Main library Skövde'),(NULL,10,3,'AA','Skövde','Main library Skövde'),(NULL,1,4,'AA','Skövde','Main library Skövde'),(NULL,2,4,'AA','Skövde','Main library Skövde'),(NULL,3,4,'AA','Skövde','Main library Skövde'),(NULL,4,4,'AA','Skövde','Main library Skövde'),(NULL,5,4,'AA','Skövde','Main library Skövde'),(NULL,6,4,'AA','Skövde','Main library Skövde'),(NULL,7,4,'AA','Skövde','Main library Skövde'),(NULL,8,4,'AA','Skövde','Main library Skövde'),(NULL,9,4,'AA','Skövde','Main library Skövde'),(NULL,10,4,'AA','Skövde','Main library Skövde'),(NULL,1,1,'AA','Tibro','Main library Tibro'),(NULL,2,1,'AA','Tibro','Main library Tibro'),(NULL,3,1,'AA','Tibro','Main library Tibro'),(NULL,4,1,'AA','Tibro','Main library Tibro'),(NULL,5,1,'AA','Tibro','Main library Tibro'),(NULL,6,1,'AA','Tibro','Main library Tibro'),(NULL,7,1,'AA','Tibro','Main library Tibro'),(NULL,8,1,'AA','Tibro','Main library Tibro'),(NULL,9,1,'AA','Tibro','Main library Tibro'),(NULL,10,1,'AA','Tibro','Main library Tibro'),(NULL,1,2,'AA','Tibro','Main library Tibro'),(NULL,2,2,'AA','Tibro','Main library Tibro'),(NULL,3,2,'AA','Tibro','Main library Tibro'),(NULL,4,2,'AA','Tibro','Main library Tibro'),(NULL,5,2,'AA','Tibro','Main library Tibro'),(NULL,6,2,'AA','Tibro','Main library Tibro'),('9999-77',7,2,'AA','Tibro','Main library Tibro'),(NULL,8,2,'AA','Tibro','Main library Tibro'),(NULL,9,2,'AA','Tibro','Main library Tibro'),(NULL,10,2,'AA','Tibro','Main library Tibro'),(NULL,1,3,'AA','Tibro','Main library Tibro'),(NULL,2,3,'AA','Tibro','Main library Tibro'),(NULL,3,3,'AA','Tibro','Main library Tibro'),(NULL,4,3,'AA','Tibro','Main library Tibro'),(NULL,5,3,'AA','Tibro','Main library Tibro'),(NULL,6,3,'AA','Tibro','Main library Tibro'),(NULL,7,3,'AA','Tibro','Main library Tibro'),(NULL,8,3,'AA','Tibro','Main library Tibro'),(NULL,9,3,'AA','Tibro','Main library Tibro'),(NULL,10,3,'AA','Tibro','Main library Tibro'),(NULL,1,4,'AA','Tibro','Main library Tibro'),(NULL,2,4,'AA','Tibro','Main library Tibro'),(NULL,3,4,'AA','Tibro','Main library Tibro'),(NULL,4,4,'AA','Tibro','Main library Tibro'),(NULL,5,4,'AA','Tibro','Main library Tibro'),(NULL,6,4,'AA','Tibro','Main library Tibro'),(NULL,7,4,'AA','Tibro','Main library Tibro'),(NULL,8,4,'AA','Tibro','Main library Tibro'),(NULL,9,4,'AA','Tibro','Main library Tibro'),(NULL,10,4,'AA','Tibro','Main library Tibro'),(NULL,1,5,'AA','Tibro','Main library Tibro'),(NULL,2,5,'AA','Tibro','Main library Tibro'),(NULL,3,5,'AA','Tibro','Main library Tibro'),(NULL,4,5,'AA','Tibro','Main library Tibro'),(NULL,5,5,'AA','Tibro','Main library Tibro'),(NULL,6,5,'AA','Tibro','Main library Tibro'),(NULL,7,5,'AA','Tibro','Main library Tibro'),(NULL,8,5,'AA','Tibro','Main library Tibro'),(NULL,9,5,'AA','Tibro','Main library Tibro'),(NULL,10,5,'AA','Tibro','Main library Tibro'),(NULL,1,1,'AB','Tibro','Main library Tibro'),(NULL,2,1,'AB','Tibro','Main library Tibro'),(NULL,3,1,'AB','Tibro','Main library Tibro'),(NULL,4,1,'AB','Tibro','Main library Tibro'),(NULL,5,1,'AB','Tibro','Main library Tibro'),(NULL,6,1,'AB','Tibro','Main library Tibro'),(NULL,7,1,'AB','Tibro','Main library Tibro'),(NULL,8,1,'AB','Tibro','Main library Tibro'),(NULL,9,1,'AB','Tibro','Main library Tibro'),(NULL,10,1,'AB','Tibro','Main library Tibro'),(NULL,1,2,'AB','Tibro','Main library Tibro'),(NULL,2,2,'AB','Tibro','Main library Tibro'),('7898-98',3,2,'AB','Tibro','Main library Tibro'),(NULL,4,2,'AB','Tibro','Main library Tibro'),(NULL,5,2,'AB','Tibro','Main library Tibro'),('6666-55',6,2,'AB','Tibro','Main library Tibro'),('5789-65',7,2,'AB','Tibro','Main library Tibro'),('5412-65',8,2,'AB','Tibro','Main library Tibro'),(NULL,9,2,'AB','Tibro','Main library Tibro'),(NULL,10,2,'AB','Tibro','Main library Tibro'),(NULL,1,3,'AB','Tibro','Main library Tibro'),(NULL,2,3,'AB','Tibro','Main library Tibro'),(NULL,3,3,'AB','Tibro','Main library Tibro'),(NULL,4,3,'AB','Tibro','Main library Tibro'),(NULL,5,3,'AB','Tibro','Main library Tibro'),(NULL,6,3,'AB','Tibro','Main library Tibro'),(NULL,7,3,'AB','Tibro','Main library Tibro'),(NULL,8,3,'AB','Tibro','Main library Tibro'),(NULL,9,3,'AB','Tibro','Main library Tibro'),(NULL,10,3,'AB','Tibro','Main library Tibro'),(NULL,1,4,'AB','Tibro','Main library Tibro'),(NULL,2,4,'AB','Tibro','Main library Tibro'),(NULL,3,4,'AB','Tibro','Main library Tibro'),(NULL,4,4,'AB','Tibro','Main library Tibro'),(NULL,5,4,'AB','Tibro','Main library Tibro'),(NULL,6,4,'AB','Tibro','Main library Tibro'),(NULL,7,4,'AB','Tibro','Main library Tibro'),(NULL,8,4,'AB','Tibro','Main library Tibro'),(NULL,9,4,'AB','Tibro','Main library Tibro'),(NULL,10,4,'AB','Tibro','Main library Tibro'),(NULL,1,1,'AA','Skövde','Cooridor 1'),(NULL,2,1,'AA','Skövde','Cooridor 1'),(NULL,3,1,'AA','Skövde','Cooridor 1'),(NULL,4,1,'AA','Skövde','Cooridor 1'),(NULL,5,1,'AA','Skövde','Cooridor 1'),('5555-87',6,1,'AA','Skövde','Cooridor 1'),(NULL,7,1,'AA','Skövde','Cooridor 1'),(NULL,8,1,'AA','Skövde','Cooridor 1'),(NULL,9,1,'AA','Skövde','Cooridor 1'),(NULL,10,1,'AA','Skövde','Cooridor 1'),(NULL,1,2,'AA','Skövde','Cooridor 1'),(NULL,2,2,'AA','Skövde','Cooridor 1'),(NULL,3,2,'AA','Skövde','Cooridor 1'),(NULL,4,2,'AA','Skövde','Cooridor 1'),(NULL,5,2,'AA','Skövde','Cooridor 1'),(NULL,6,2,'AA','Skövde','Cooridor 1'),(NULL,7,2,'AA','Skövde','Cooridor 1'),(NULL,8,2,'AA','Skövde','Cooridor 1'),(NULL,9,2,'AA','Skövde','Cooridor 1'),(NULL,10,2,'AA','Skövde','Cooridor 1'),(NULL,1,3,'AA','Skövde','Cooridor 1'),(NULL,2,3,'AA','Skövde','Cooridor 1'),(NULL,3,3,'AA','Skövde','Cooridor 1'),(NULL,4,3,'AA','Skövde','Cooridor 1'),(NULL,5,3,'AA','Skövde','Cooridor 1'),(NULL,6,3,'AA','Skövde','Cooridor 1'),(NULL,7,3,'AA','Skövde','Cooridor 1'),(NULL,8,3,'AA','Skövde','Cooridor 1'),(NULL,9,3,'AA','Skövde','Cooridor 1'),(NULL,10,3,'AA','Skövde','Cooridor 1'),(NULL,1,4,'AA','Skövde','Cooridor 1'),(NULL,2,4,'AA','Skövde','Cooridor 1'),(NULL,3,4,'AA','Skövde','Cooridor 1'),(NULL,4,4,'AA','Skövde','Cooridor 1'),(NULL,5,4,'AA','Skövde','Cooridor 1'),(NULL,6,4,'AA','Skövde','Cooridor 1'),(NULL,7,4,'AA','Skövde','Cooridor 1'),(NULL,8,4,'AA','Skövde','Cooridor 1'),(NULL,9,4,'AA','Skövde','Cooridor 1'),(NULL,10,4,'AA','Skövde','Cooridor 1');
/*!40000 ALTER TABLE `rowposition` ENABLE KEYS */;

--
-- Table structure for table `shelf`
--

DROP TABLE IF EXISTS `shelf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shelf` (
  `shelfname` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `placeposition` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `placename` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`placename`,`shelfname`,`placeposition`),
  KEY `placeposition` (`placeposition`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shelf`
--

/*!40000 ALTER TABLE `shelf` DISABLE KEYS */;
INSERT INTO `shelf` VALUES ('AA','Cooridor 1','Skövde'),('AA','Main library Skövde','Skövde'),('AA','Main library Tibro','Tibro'),('AB','Main library Tibro','Tibro');
/*!40000 ALTER TABLE `shelf` ENABLE KEYS */;

--
-- Table structure for table `shelfrow`
--

DROP TABLE IF EXISTS `shelfrow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shelfrow` (
  `rownumber` int(11) DEFAULT NULL,
  `shelfname` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `placename` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `placeposition` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  KEY `placename` (`placename`,`shelfname`),
  KEY `placeposition` (`placeposition`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shelfrow`
--

/*!40000 ALTER TABLE `shelfrow` DISABLE KEYS */;
INSERT INTO `shelfrow` VALUES (1,'AA','Skövde','Main library Skövde'),(2,'AA','Skövde','Main library Skövde'),(3,'AA','Skövde','Main library Skövde'),(4,'AA','Skövde','Main library Skövde'),(1,'AA','Tibro','Main library Tibro'),(2,'AA','Tibro','Main library Tibro'),(3,'AA','Tibro','Main library Tibro'),(4,'AA','Tibro','Main library Tibro'),(5,'AA','Tibro','Main library Tibro'),(1,'AB','Tibro','Main library Tibro'),(2,'AB','Tibro','Main library Tibro'),(3,'AB','Tibro','Main library Tibro'),(4,'AB','Tibro','Main library Tibro'),(1,'AA','Skövde','Cooridor 1'),(2,'AA','Skövde','Cooridor 1'),(3,'AA','Skövde','Cooridor 1'),(4,'AA','Skövde','Cooridor 1');
/*!40000 ALTER TABLE `shelfrow` ENABLE KEYS */;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `pass` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tokencode` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`username`),
  KEY `role` (`role`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('daniel.rosmark','danielr','Admin','daniel.rosmark@gmail.com','12c66f662fa08d7a180fa0c3741484b4'),('daniel.r','danielr','User','malmrot@gmail.com',NULL),('daniel.ro','danielr','Guest','malmrot@gmail.com',NULL),('daniel.rosmarks','$2y$10$Ev/5sEwwpV5gJGkeWTHwT.mP6nVNy7Dl74LmnrXqps1h.lM9c6pqS','Admin','amelia.piloten@gmail.com',NULL),('guest','$2y$10$Im9VVSqjntmrjQvfKnkhjOW29TUhB.n4eiCFMGeNt2gy1Dx4LkeS2','Admin','guests@gmail.com',NULL),('guests','$2y$10$OP3wSuNu1kMKcvDLJ6OfcO/I07nGBmOErOVNCB/6baXhG90LiMWoO','Guest','da@gmail.com',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

--
-- Table structure for table `visitor`
--

DROP TABLE IF EXISTS `visitor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visitor` (
  `dt` datetime DEFAULT CURRENT_TIMESTAMP,
  `vname` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `organisation` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `visitors` int(11) DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitor`
--

/*!40000 ALTER TABLE `visitor` DISABLE KEYS */;
INSERT INTO `visitor` VALUES ('2016-07-31 15:22:52','daw','dwa','32',32,'da@gmail.com'),('2016-08-01 06:52:06','da','dw','ww',3,'da@gmail.cim'),('2016-08-01 06:58:20','daniel','högskolan i skövde','chef',3,'da@gmail.com'),('2016-08-01 07:00:27','da','högskolan i skövde','chef',4,'da@gmail.com'),('2016-08-01 07:16:52','daw','dwa','d',2,'daw@gmail.com'),('2016-08-04 17:12:41','da','d','',0,''),('2016-08-04 17:12:57','daw','Högskolan i Skövde','dwa',3,'daw@gmail.com'),('2016-08-10 09:37:32','daniel','skövde','student',5,'da@gmail.com'),('2016-08-10 10:39:14','daw','dawd','fa',3,'da@gmail.com'),('2016-08-12 15:23:46','dwa','dwa','daw',5,'dwa@gmail.com'),('2016-08-12 15:33:36','daw','daw','dw',4,'daw@gmail.com'),('2016-08-13 13:06:27','da','daw','dwa',5,'daw@gmail.com'),('2016-08-13 13:20:36','da','da','dwa',4,'daw@gmail.com'),('2016-08-13 13:22:55','daw','da','dwa',4,'da@gmail.com');
/*!40000 ALTER TABLE `visitor` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-18 14:22:27
