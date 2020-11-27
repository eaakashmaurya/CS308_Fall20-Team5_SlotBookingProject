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
--
-- Table structure for table `tblcart`
--

CREATE TABLE `tblcart` (
  `fld_cart_id` int(11) NOT NULL,
  `fld_product_id` bigint(11) NOT NULL,
  `fld_customer_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
--
-- Table structure for table `tblcustomer`
--

CREATE TABLE `tblcustomer` (
  `fld_cust_id` int(10) NOT NULL,
  `fld_name` varchar(30) NOT NULL,
  `fld_email` varchar(30) NOT NULL,
  `fld_mobile` bigint(10) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tbadmin` (
  `fld_id` int(10) NOT NULL,
  `fld_username` varchar(30) NOT NULL,
  `fld_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcustomer`
--

INSERT INTO `tblcustomer` (`fld_cust_id`, `fld_name`, `fld_email`, `fld_mobile`, `password`) VALUES
(1, 'gajender', 'customer1@gmail.com', 7503515382, 'customer1'),
(2, 'sanjay', 'customer2@gmail.com', 7503515386, 'customer2'),
(3, 'saana', 'customer3@gmail.com', 7503515383, 'customer3');

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `fld_order_id` int(10) NOT NULL,
  `fld_cart_id` bigint(10) NOT NULL,
  `fldvendor_id` bigint(10) DEFAULT NULL,
  `fld_food_id` bigint(10) DEFAULT NULL,
  `fld_email_id` varchar(50) DEFAULT NULL,
  `fld_payment` varchar(20) DEFAULT NULL,
  `fldstatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`fld_order_id`, `fld_cart_id`, `fldvendor_id`, `fld_food_id`, `fld_email_id`, `fld_payment`, `fldstatus`) VALUES
(1, 1, 21, 1, 'customer3@gmail.com', '50', 'Delivered'),
(2, 2, 22, 3, 'customer3@gmail.com', '20', 'Out Of Stock');

--
-- Indexes for table `tbadmin`
--
ALTER TABLE `tbadmin`
  ADD PRIMARY KEY (`fld_id`);

--
-- Indexes for table `tbfood`
--
ALTER TABLE `tbfood`
  ADD PRIMARY KEY (`food_id`),
  ADD KEY `fldvendor_id` (`fldvendor_id`);

--
-- Indexes for table `tblcart`
--
ALTER TABLE `tblcart`
  ADD PRIMARY KEY (`fld_cart_id`);

--
-- Indexes for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  ADD PRIMARY KEY (`fld_cust_id`);
--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`fld_order_id`);


--
-- AUTO_INCREMENT for table `tbadmin`
--
ALTER TABLE `tbadmin`
  MODIFY `fld_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbfood`
--
ALTER TABLE `tbfood`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblcart`
--
ALTER TABLE `tblcart`
  MODIFY `fld_cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  MODIFY `fld_cust_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `fld_order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

