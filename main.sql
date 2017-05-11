-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: JDC
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1

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
-- Table structure for table `poDetails`
--

DROP TABLE IF EXISTS `poDetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `poDetails` (
  `poDetailID` int(30) NOT NULL AUTO_INCREMENT,
  `itemCategory` varchar(255) DEFAULT NULL,
  `itemID` int(30) NOT NULL,
  `poListID` int(30) NOT NULL,
  `itemCost` double(8,2) NOT NULL,
  `itemQty` int(30) NOT NULL,
  `poFinal` double(8,2) DEFAULT NULL,
  PRIMARY KEY (`poDetailID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poDetails`
--

LOCK TABLES `poDetails` WRITE;
/*!40000 ALTER TABLE `poDetails` DISABLE KEYS */;
INSERT INTO `poDetails` VALUES (1,'Stone',3,7,25.00,2,50.00),(2,'Jewelry',10,7,23.00,2,46.00),(3,'Stone',9,8,34.00,1,107.00),(4,'Stone',3,8,25.00,2,107.00),(5,'Jewelry',10,8,23.00,1,107.00),(6,'Stone',9,9,34.00,1,34.00),(7,'Stone',3,10,25.00,3,75.00),(8,'Stone',3,11,25.00,21,525.00),(9,'Stone',9,12,34.35,1,55.35),(10,'Jewelry',10,12,21.00,1,55.35),(11,'Stone',9,13,34.35,2,124.70),(12,'Jewelry',10,13,21.00,1,124.70),(13,'Jewelry',11,13,35.00,1,124.70),(14,'Jewelry',10,14,21.00,1,21.00),(15,'Jewelry',10,15,21.00,1,21.00),(16,'Stone',9,16,34.35,6,206.10),(17,'Stone',9,17,34.35,1,76.35),(18,'Jewelry',10,17,21.00,2,76.35),(19,'Stone',9,18,34.35,1,94.70),(20,'Jewelry',11,18,35.00,1,94.70),(21,'Stone',12,18,25.35,1,94.70),(22,'Jewelry',10,19,21.00,1,80.70),(23,'Stone',9,19,34.35,1,80.70),(24,'Stone',12,19,25.35,1,80.70);
/*!40000 ALTER TABLE `poDetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `poLists`
--

DROP TABLE IF EXISTS `poLists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `poLists` (
  `poID` int(30) NOT NULL AUTO_INCREMENT,
  `poDate` date DEFAULT NULL,
  `poFinal` double(8,2) DEFAULT NULL,
  PRIMARY KEY (`poID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poLists`
--

LOCK TABLES `poLists` WRITE;
/*!40000 ALTER TABLE `poLists` DISABLE KEYS */;
INSERT INTO `poLists` VALUES (1,'2017-02-15',55.00),(2,'2017-03-11',50.00),(3,'2017-03-11',50.00),(4,'2017-03-11',50.00),(5,'2017-03-11',50.00),(6,'2017-03-11',50.00),(7,'2017-03-11',46.00),(8,'2017-03-11',107.00),(9,'2017-03-11',34.00),(10,'2017-03-14',75.00),(11,'2017-03-14',525.00),(12,'2017-03-14',55.35),(13,'2017-03-14',124.70),(14,'2017-03-14',21.00),(15,'2017-03-14',21.00),(16,'2017-03-14',206.10),(17,'2017-03-19',76.35),(18,'2017-03-19',94.70),(19,'2017-03-19',80.70);
/*!40000 ALTER TABLE `poLists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stoneLists`
--

DROP TABLE IF EXISTS `stoneLists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stoneLists` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `stoneType` varchar(20) NOT NULL,
  `stonePrice` double(8,2) NOT NULL,
  `stoneCut` varchar(20) NOT NULL,
  `stoneQty` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stoneLists`
--

LOCK TABLES `stoneLists` WRITE;
/*!40000 ALTER TABLE `stoneLists` DISABLE KEYS */;
INSERT INTO `stoneLists` VALUES (1,'1.2 MM Diamond',2.50,'Round','5'),(8,'Daimond 5.9',15.00,'Emerald','25'),(9,'35',25.00,'Round','563');
/*!40000 ALTER TABLE `stoneLists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `styleNumbers`
--

DROP TABLE IF EXISTS `styleNumbers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `styleNumbers` (
  `styleID` int(30) NOT NULL AUTO_INCREMENT,
  `metalType` varchar(255) DEFAULT NULL,
  `styleType` varchar(255) DEFAULT NULL,
  `styleQty` int(11) DEFAULT NULL,
  `stylePrice` double(8,2) DEFAULT NULL,
  `styleNumber` varchar(255) DEFAULT NULL,
  `stoneType` varchar(255) DEFAULT NULL,
  `stoneCut` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`styleID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `styleNumbers`
--

LOCK TABLES `styleNumbers` WRITE;
/*!40000 ALTER TABLE `styleNumbers` DISABLE KEYS */;
INSERT INTO `styleNumbers` VALUES (9,NULL,NULL,13,34.35,NULL,'Diamond 1.5 cttw','Square','Stone'),(10,'14KW','Ring',23,21.00,'R812534',NULL,NULL,'Jewelry'),(11,'18KW','Bracelet',23,35.00,'B812564',NULL,NULL,'Jewelry'),(12,NULL,NULL,3,25.35,NULL,'Emerald 25mm','Princess','Stone'),(13,NULL,NULL,25,25.00,NULL,'Ruby 12 mm','Emerald','Stone'),(14,'925','Necklace',23,5.00,'N827112',NULL,NULL,'Jewelry'),(15,'24KW','Earrings',23,52.00,'E473889',NULL,NULL,'Jewelry'),(16,NULL,NULL,45,1.00,NULL,'CZ 2.5mm','Heart','Stone');
/*!40000 ALTER TABLE `styleNumbers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userAccounts`
--

DROP TABLE IF EXISTS `userAccounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userAccounts` (
  `userID` int(30) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userAccounts`
--

LOCK TABLES `userAccounts` WRITE;
/*!40000 ALTER TABLE `userAccounts` DISABLE KEYS */;
INSERT INTO `userAccounts` VALUES (1,'admin','admin');
/*!40000 ALTER TABLE `userAccounts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-22 16:55:31
