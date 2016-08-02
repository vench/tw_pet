-- MySQL dump 10.13  Distrib 5.5.49, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: testdb
-- ------------------------------------------------------
-- Server version	5.5.49-0ubuntu0.14.04.1

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
-- Table structure for table `pet__page`
--

DROP TABLE IF EXISTS `pet__page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pet__page` (
  `pageId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` mediumtext NOT NULL,
  `keywords` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`pageId`),
  KEY `modified` (`modified`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pet__page`
--

LOCK TABLES `pet__page` WRITE;
/*!40000 ALTER TABLE `pet__page` DISABLE KEYS */;
INSERT INTO `pet__page` VALUES (2,'Ð ÑƒÑ 32323','Ð ÑƒÑ','d','2016-06-21 14:40:03'),(4,'65','65','65','2016-06-21 14:10:01'),(5,'csa','','','2016-06-21 14:10:07'),(6,'csa','csa','csa','2016-06-21 14:10:11'),(7,'csa','csa','csa','2016-06-21 14:10:15'),(8,'csa','csa','csafew','2016-06-21 14:39:49'),(9,'csa','csa','csa','2016-06-21 14:10:22'),(10,'csa','ca','csa','2016-06-21 14:10:25'),(11,'csa','csa','csa','2016-06-21 14:10:30'),(12,'csa','csa','csa','2016-06-21 14:10:34'),(13,'csa','csa','','2016-06-21 14:10:50'),(14,'32','32','32','2016-06-21 14:28:18'),(15,'45','54','5','2016-06-21 14:31:54');
/*!40000 ALTER TABLE `pet__page` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-21 14:41:58


DROP TABLE IF EXISTS `tr_category`;

CREATE TABLE `tr_category` (
    `catId` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `parentCatId` int(10) unsigned DEFAULT NULL,
    `title` varchar(255) NOT NULL,
    `image` varchar(255) NOT NULL,
    `url` varchar(255) NOT NULL,
    PRIMARY KEY (`catId`),
    FOREIGN KEY (`parentCatId`) REFERENCES tr_category(`catId`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `tr_torrent`;

CREATE TABLE `tr_torrent` (
    `torId` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `catId` int(10) unsigned DEFAULT NULL,
    `title` varchar(255) NOT NULL,
    `name` varchar(255) NOT NULL,
    `image` varchar(255) NOT NULL,
    `url` varchar(255) NOT NULL,
    `metadata` varchar(255) NOT NULL,
    `metakeys` varchar(255) NOT NULL,
    `content` text NOT NULL,
    `contentShort` text NOT NULL,

    PRIMARY KEY (`torId`),
    FOREIGN KEY (`catId`) REFERENCES tr_category(`catId`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;