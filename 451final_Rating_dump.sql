-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: 451final
-- ------------------------------------------------------
-- Server version	5.7.18

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
-- Table structure for table `Rating`
--

DROP TABLE IF EXISTS `Rating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Rating` (
  `ratingID` int(11) NOT NULL AUTO_INCREMENT,
  `scale` int(11) NOT NULL,
  `written` varchar(45) NOT NULL,
  `fk_revID` int(11) NOT NULL,
  `fk_storeID` int(11) NOT NULL,
  `fk_itemID` int(11) NOT NULL,
  PRIMARY KEY (`ratingID`),
  UNIQUE KEY `ratingID_UNIQUE` (`ratingID`),
  KEY `fk_storeID_idx` (`fk_storeID`),
  KEY `fk_itemID_idx` (`fk_itemID`),
  KEY `fk_revID_idx` (`fk_revID`),
  CONSTRAINT `fk_itemID` FOREIGN KEY (`fk_itemID`) REFERENCES `Item` (`itemID`) ON UPDATE CASCADE,
  CONSTRAINT `fk_revID` FOREIGN KEY (`fk_revID`) REFERENCES `Reviewer` (`revID`) ON UPDATE CASCADE,
  CONSTRAINT `fk_storeID` FOREIGN KEY (`fk_storeID`) REFERENCES `Store` (`storeID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Rating`
--

LOCK TABLES `Rating` WRITE;
/*!40000 ALTER TABLE `Rating` DISABLE KEYS */;
INSERT INTO `Rating` VALUES (11,2,' Its okay.',13,9,75),(12,5,' Its good.',13,10,76),(13,8,' Its great.',13,11,77),(14,10,' Its the best.',13,12,78),(15,9,' Amazing.',14,13,79),(16,1,'Bad.',14,13,80),(17,10,' The best.',15,9,75),(18,4,'Ehhhht.',16,9,75),(19,7,'Great.',17,13,80),(20,8,' Great',13,13,81);
/*!40000 ALTER TABLE `Rating` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-04 17:19:11
