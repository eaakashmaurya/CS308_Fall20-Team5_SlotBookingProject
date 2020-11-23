DROP TABLE IF EXISTS `equipment`;

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


LOCK TABLES `equipment` WRITE;

INSERT INTO `equipment` VALUES (1,'FESEM','Zeiss',750,1875,3750,'per hour');
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

UNLOCK TABLES;

