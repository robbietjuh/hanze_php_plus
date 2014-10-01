-- MySQL dump 10.13  Distrib 5.6.20, for osx10.8 (x86_64)
--
-- Host: localhost    Database: hanzecontact
-- ------------------------------------------------------
-- Server version	5.6.20

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
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departments` (
  `DepartmentID` int(11) NOT NULL AUTO_INCREMENT,
  `DepartmentName` varchar(128) NOT NULL,
  `ManagerID` int(11) NOT NULL,
  `LocationID` int(11) NOT NULL,
  PRIMARY KEY (`DepartmentID`)
) ENGINE=MyISAM AUTO_INCREMENT=195 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (20,'Marketing',201,1800),(50,'Shipping',124,1500),(60,'IT',103,1400),(80,'Sales',149,2500),(90,'Executive',100,1700),(110,'Accounting',205,1700),(190,'Contracting',0,1700),(192,'Test bewerking',12,22);
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employees` (
  `EmployeeID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(16) NOT NULL,
  `LastName` varchar(32) NOT NULL,
  `Email` varchar(32) NOT NULL,
  `PhoneNumber` varchar(16) NOT NULL,
  `HireDate` datetime NOT NULL,
  `JobID` int(11) NOT NULL,
  `Salary` float NOT NULL,
  `CommissionPCT` varchar(16) NOT NULL,
  `ManagerID` int(11) NOT NULL,
  `DepartmentID` int(11) NOT NULL,
  `Picture` varchar(255) NOT NULL DEFAULT 'default.jpg',
  PRIMARY KEY (`EmployeeID`)
) ENGINE=MyISAM AUTO_INCREMENT=213 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (102,'Lex','De Haan','LDEHAAN','515.123.4569','0000-00-00 00:00:00',0,37400,'',100,90,'default.jpg'),(206,'William','Gietz','WGIETZ','515.123.8181','0000-00-00 00:00:00',0,20086,'',205,110,'default.jpg'),(149,'Eleni','Zlotkey','EZLOTKEY','011.44.1344.4290','2029-01-00 00:00:00',0,23100,',2',100,80,'default.jpg'),(174,'Ellen','Abel','EABEL','011.44.1644.4292','0000-00-00 00:00:00',0,24200,',3',149,80,'default.jpg'),(176,'Jonathon','Taylor','JTAYLOR','011.44.1644.4292','0000-00-00 00:00:00',0,18920,',2',149,80,'default.jpg'),(178,'Kimberely','Grant','KGRANT','011.44.1644.4292','0000-00-00 00:00:00',0,15400,',15',149,0,'default.jpg'),(124,'Kevin','Mourgos','KMOURGOS','650.123.5234','0000-00-00 00:00:00',0,12760,'',100,50,'default.jpg'),(141,'Trenna','Rajs','TRAJS','650.121.8009','0000-00-00 00:00:00',0,7700,'',124,50,'default.jpg'),(142,'Curtis','Davies','CDAVIES','650.121.2994','0000-00-00 00:00:00',0,6820,'',124,50,'default.jpg'),(143,'Randall','Matos','RMATOS','650.121.2874','0000-00-00 00:00:00',0,5720,'',124,50,'default.jpg'),(144,'Peter','Vargas','PVARGAS','650.121.2004','0000-00-00 00:00:00',0,5500,'',124,50,'default.jpg'),(103,'Alexander','Hunold','AHUNOLD','590.423.4567','0000-00-00 00:00:00',0,19800,'',102,60,'default.jpg'),(104,'Bruce','Ernst','BERNST','590.423.4568','0000-00-00 00:00:00',0,13200,'',103,60,'default.jpg'),(107,'Diana','Lorentz','DLORENTZ','590.423.5567','0000-00-00 00:00:00',0,9240,'',103,60,'default.jpg'),(201,'Michael','Hartstein','MHARTSTE','515.123.5555','0000-00-00 00:00:00',0,28600,'',100,20,'default.jpg'),(202,'Pat','Fay','PFAY','603.123.6666','0000-00-00 00:00:00',0,13200,'',201,20,'default.jpg'),(212,'Robert','de Vries','info@robbytu.net','1234','2014-09-22 01:30:24',0,9866,'',1,1,'e6a149e329e8bdb6d66292317664ebf1.jpeg');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `JobID` int(11) NOT NULL AUTO_INCREMENT,
  `JobTitle` varchar(16) NOT NULL,
  `MinSalary` float NOT NULL,
  `MaxSalary` float NOT NULL,
  PRIMARY KEY (`JobID`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES (1,'President test',20000,40000),(2,'Administration V',15000,30000),(4,'Accounting Manag',8200,16000),(5,'Public Accountan',4200,9000),(6,'Sales Manager',10000,20000),(7,'Sales Representa',6000,12000),(8,'Stock Manager',5500,8500),(9,'Stock Clerk',2000,5000),(10,'Programmer',4000,10000),(11,'Marketing Manage',9000,15000),(12,'Marketing Repres',4000,90000),(19,'Dever',100,200);
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locations` (
  `LocationID` int(11) NOT NULL AUTO_INCREMENT,
  `StreetAddress` varchar(32) NOT NULL,
  `PostalCode` varchar(8) NOT NULL,
  `City` varchar(16) NOT NULL,
  `StateProvince` varchar(16) NOT NULL,
  `CountryID` int(11) NOT NULL,
  PRIMARY KEY (`LocationID`)
) ENGINE=MyISAM AUTO_INCREMENT=2504 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` VALUES (1800,'460 Bloor St. W.','ON M5S 1','Toronto','Ontario',1),(2500,'Magdalen Centre, The Oxford Scie','OX9 9ZB','Oxford','Oxford',0),(1400,'2014 Jabberwocky Rd','26192','Southlake','Texas',0),(1500,'2011 Interiors Blvd','99236','South San Franci','California',0),(1700,'2004 Charade Rd','98199','Seattle','Washington',0);
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-10-01 21:05:32
