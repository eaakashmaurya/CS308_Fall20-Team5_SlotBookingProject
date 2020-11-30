-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2018 at 06:07 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+05:30";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c4dfed_facility_booking`
--
CREATE DATABASE IF NOT EXISTS `c4dfed_facility_booking` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `c4dfed_facility_booking`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_id` varchar(15) NOT NULL,
  PRIMARY KEY (`admin_id`),
  `admin_username` varchar(15) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_phone` int(10) NOT NULL,
  `admin_password` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_email`, `admin_phone`, `admin_password`) VALUES
('admin1', 'admin1', 'admin1@gmail.com', 137663521, 'admin1'),
('admin2', 'admin2', 'admin2@gmail.com', 123456789, 'admin2');

-- --------------------------------------------------------

--
-- Table containing information on all equipment
--
DROP TABLE IF EXISTS `equipment`;
CREATE TABLE `equipment` (
  `equip_id` int(11) NOT NULL,
  PRIMARY KEY (`equip_id`),
  `Equipment` varchar(255) DEFAULT NULL,
  `Model` varchar(255) DEFAULT NULL,
  `InternalUsers` int(11) DEFAULT NULL,
  `ExternalUsers` int(11) DEFAULT NULL,
  `IndustryUsers` int(11) DEFAULT NULL,
  `RateType` varchar(255) DEFAULT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `record`
--
-- DROP TABLE IF EXISTS `record`;
--CREATE TABLE `record` (
  --`record_id` int(11) NOT NULL,
  --`record_start` varchar(10) DEFAULT NULL,
--  `record_end` varchar(10) DEFAULT NULL,
 -- `record_price` int(11) DEFAULT NULL,
 -- `record_item` varchar(255) DEFAULT NULL,
  --`record_status` varchar(10) NOT NULL DEFAULT 'pending',
  --`record_sub` varchar(10) NOT NULL DEFAULT 'expired',
  --`record_approved_by` varchar(15) NOT NULL DEFAULT 'pending',
  --`student_id` varchar(15) NOT NULL,
--  `equip_id` varchar(15) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `record`;
CREATE TABLE `record` (
  `record_id` int(11) NOT NULL AUTO_INCREMENT,
  `equip_id` int(11) ,
  `user_id` varchar(15) ,
  `record_date` DATE NOT NULL, 
  `record_start` TIME NOT NULL, 
  `record_end` TIME NOT NULL, 
  `record_qauntity` int(11) NOT NULL, 
  `record_status` varchar(10) NOT NULL DEFAULT 'pending',
  `record_price` int(11),
  PRIMARY KEY (`record_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` varchar(15) NOT NULL, 
  PRIMARY KEY (`user_id`),
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_supervisor` varchar(255) NOT NULL,
  `user_supervisor_email` varchar(255) NOT NULL,
  `user_type` varchar(15) NOT NULL, 
  `user_pwd` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);


--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_type` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

  --
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT;


--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Table structure for table `student`
--
--DROP TABLE IF EXISTS `student`;
--CREATE TABLE `student` (
--  `student_id` varchar(15) NOT NULL,
--  `student_username` varchar(15) NOT NULL,
  --`student_pwd` char(70) NOT NULL,
  --`student_name` varchar(255) NOT NULL,
  --`student_department` varchar(5) NOT NULL,
  --`student_email` varchar(30) NOT NULL,
  --`student_phone` varchar(15) NOT NULL
--) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
