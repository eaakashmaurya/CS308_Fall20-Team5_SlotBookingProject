-- MySQL dump 10.17  Distrib 10.3.25-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: c4dfed
-- ------------------------------------------------------
-- Server version	10.3.25-MariaDB-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `equipment`
--

DROP TABLE IF EXISTS `equipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipment` (
  `ID` int(11) NOT NULL,
  `Equipment` varchar(255) DEFAULT NULL,
  `Model` varchar(255) DEFAULT NULL,
  `InternalUsers` int(11) DEFAULT NULL,
  `ExternalUsers` int(11) DEFAULT NULL,
  `IndustryUsers` int(11) DEFAULT NULL,
  `RateType` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment`
--

LOCK TABLES `equipment` WRITE;
/*!40000 ALTER TABLE `equipment` DISABLE KEYS */;
/* source of database: https://c4dfed.com/wp-content/uploads/2019/05/c4dfed-Instruments-User-Charge-pages-13.pdf */

INSERT INTO `equipment`s VALUES (1,'FESEM','Zeiss',750,1875,3750,'per hour');
INSERT INTO `equipment` VALUES (2,'HE Ion Microscope','Orion, Zeiss',2000,5000,10000,'per hour');
INSERT INTO `equipment` VALUES (3,'AFM','Bruker',500,1250,2500,'per hour');
INSERT INTO `equipment` VALUES (4,'Raith EBL (exposure only)','Raith',1000,2500,5000,'per hour');
INSERT INTO `equipment` VALUES (5,'Ellipsometer (Data Acquisition)','Accurion',500,1250,2500,'per hour');
INSERT INTO `equipment` VALUES (6,'Ellipsometer (Modeling & Analysis)','Accurion',2500,6250,12500,'per hour');
INSERT INTO `equipment` VALUES (7,'MaskLess Lithography (Exposure only)','Intelligent Micro Patterning',200,500,1000,'per hour');
INSERT INTO `equipment` VALUES (8,'Optical Lithography','EV Group',250,625,1250,'per hour');
INSERT INTO `equipment` VALUES (9,'Stylis Profiler','AEP Technology',100,250,500,'per hour');
INSERT INTO `equipment` VALUES (10,'Optical Profiler','Bruker',150,375,750,'per hour');
INSERT INTO `equipment` VALUES (11,'RIE','Planar Tech.',300,750,1500,'per hour');
INSERT INTO `equipment` VALUES (12,'E-Spin','E-Spin nanotech',100,250,500,'per hour');
INSERT INTO `equipment` VALUES (13,'Sputtering','Advance Process Technology',400,1000,2000,'per hour');
INSERT INTO `equipment` VALUES (14,'Optical Microscope','Olympus',100,250,500,'per hour');
INSERT INTO `equipment` VALUES (15,'Keithley System with Probe Station','Keithley',100,250,500,'per hour');
INSERT INTO `equipment` VALUES (16,'Glove Box','SciLab SG1200/750TS',150,375,750,'per hour');
INSERT INTO `equipment` VALUES (17,'Raith EBL (exposure only)','Raith',1000,2500,5000,'per hour');
INSERT INTO `equipment` VALUES (18,'Thermal Evaporator','Hind High Vacuum',300,750,1500,'per run');
INSERT INTO `equipment` VALUES (19,'Spin Coater (Controlled atmosphere)','Laurell',75,200,600,'per sample');
INSERT INTO `equipment` VALUES (20,'Spin Coater (in air)','Spectro Spin',50,125,250,'per sample');
INSERT INTO `equipment` VALUES (21,'Contact Angle','SEO Phoenix 300 Touch Contact Angle',50,125,250,'per sample');
INSERT INTO `equipment` VALUES (22,'3D printer','XYZ Printing Pro',100,250,500,'per hour');
INSERT INTO `equipment` VALUES (23,'Electro Chemical Analyzer','CH Instruments',100,250,500,'per hour');
INSERT INTO `equipment` VALUES (24,'Three Zone Furnace 1000 °C','Thermofisher scientific',100,250,500,'per hour');
INSERT INTO `equipment` VALUES (25,'Vacuum Oven','Nanosemi Technology',100,250,500,'per day');
INSERT INTO `equipment` VALUES (26,'DI water','Millipore',50,125,250,'per litre');
INSERT INTO `equipment` VALUES (27,'Clean Lab Space (5x5 sq. foot)','---',2000,5000,10000,'per day');

/*!40000 ALTER TABLE `equipment` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-19 13:00:00
