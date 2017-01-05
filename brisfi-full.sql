USE `n9173838`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: brisfi
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
-- Table structure for table `hotspots`
--


DROP TABLE IF EXISTS `hotspots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotspots` (
  `HotspotName` varchar(256) DEFAULT NULL,
  `Address` varchar(256) DEFAULT NULL,
  `Suburb` varchar(256) DEFAULT NULL,
  `Latitude` float(18,10) DEFAULT NULL,
  `Longitude` float(18,10) DEFAULT NULL,
  `HotspotID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`HotspotID`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=ujis;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotspots`
--

LOCK TABLES `hotspots` WRITE;
/*!40000 ALTER TABLE `hotspots` DISABLE KEYS */;
INSERT INTO `hotspots` VALUES ('7th Brigade Park, Chermside','Delaware St','Chermside',-27.3789291382,153.0446166992,1),('Annerley Library Wifi','450 Ipswich Road','Annerley, 4103',-27.5094223022,153.0333251953,2),('Ashgrove Library Wifi','87 Amarina Avenue','Ashgrove, 4060',-27.4439468384,152.9870910645,3),('Banyo Library Wifi','284 St. Vincents Road','Banyo, 4014',-27.3739662170,153.0783233643,4),('Booker Place Park','Birkin Rd & Sugarwood St','Bellbowrie',-27.5635299683,152.8937225342,5),('Bracken Ridge Library Wifi','Corner Bracken and Barrett Street','Bracken Ridge, 4017',-27.3179721832,153.0378723145,6),('Brisbane Botanic Gardens','Mt Coot-tha Rd','Toowong',-27.4772396088,152.9759826660,7),('Brisbane Square Library Wifi','Brisbane Square, 266 George Street','Brisbane, 4000',-27.4709110260,153.0224609375,8),('Bulimba Library Wifi','Corner Riding Road & Oxford Street','Bulimba, 4171',-27.4520301819,153.0628204346,9),('Calamvale District Park','Formby & Ormskirk Sts','Calamvale',-27.6215190887,153.0366516113,10),('Carina Library Wifi','Corner Mayfield Road & Nyrang Street','Carina, 4152',-27.4916934967,153.0912170410,11),('Carindale Library Wifi','The Home and Leisure Centre, Corner Carindale Street  & Banchory Court, Westfield Carindale Shopping Centre','Carindale, 4152',-27.5047588348,153.1004028320,12),('Carindale Recreation Reserve','Cadogan and Bedivere Sts','Carindale',-27.4969997406,153.1110534668,13),('Chermside Library Wifi','375 Hamilton  Road','Chermside, 4032',-27.3856029510,153.0348968506,14),('City Botanic Gardens Wifi','Alice Street','Brisbane City',-27.4756107330,153.0300445557,15),('Coopers Plains Library Wifi','107 Orange Grove Road','Coopers Plains, 4108',-27.5651054382,153.0403137207,16),('Corinda Library Wifi','641 Oxley Road','Corinda, 4075',-27.5388031006,152.9809112549,17),('D.M. Henderson Park','Granadilla St','MacGregor',-27.5774497986,153.0760345459,18),('Einbunpin Lagoon','Brighton Rd','Sandgate',-27.3194694519,153.0682220459,19),('Everton Park Library Wifi','561 South Pine Road','Everton Park, 4053',-27.4053344727,152.9904174805,20),('Fairfield Library Wifi','Fairfield Gardens Shopping Centre, 180 Fairfield Road','Fairfield, 4103',-27.5090904236,153.0259704590,21),('Forest Lake Parklands','Forest Lake Bld','Forest Lake',-27.6201992035,152.9662475586,22),('Garden City Library Wifi','Garden City Shopping Centre, Corner Logan and Kessels Road','Upper Mount Gravatt, 4122',-27.5624427795,153.0809173584,23),('Glindemann Park','Logan Rd','Holland Park West',-27.5255203247,153.0692291260,24),('Grange Library Wifi','79 Evelyn Street','Grange, 4051',-27.4253120422,153.0174713135,25),('Gregory Park','Baroona Rd','Paddington',-27.4669990540,152.9998168945,26),('Guyatt Park','Sir Fred Schonell Dve','St Lucia',-27.4929695129,153.0018768311,27),('Hamilton Library Wifi','Corner Racecourt Road and Rossiter Parade','Hamilton, 4007',-27.4379005432,153.0642242432,28),('Hidden World Park','Roghan Rd','Fitzgibbon',-27.3397178650,153.0349884033,29),('Holland Park Library Wifi','81 Seville Road','Holland Park, 4121',-27.5229225159,153.0722961426,30),('Inala Library Wifi','Inala Shopping centre, Corsair Ave','Inala, 4077',-27.5982856750,152.9735260010,31),('Indooroopilly Library Wifi','Indrooroopilly Shopping centre, Level 4, 322 Moggill Road','Indooroopilly, 4068',-27.4976425171,152.9736480713,32),('Kalinga Park','Kalinga St','Clayfield',-27.4066600800,153.0521697998,33),('Kenmore Library Wifi','Kenmore Village Shopping Centre, Brookfield Road','Kenmore, 4069',-27.5059280396,152.9386444092,34),('King Edward Park (Jacob\'s Ladder)','Turbot St and Wickham Tce','Brisbane',-27.4658908844,153.0240631104,35),('King George Square','Ann & Adelaide Sts','Brisbane',-27.4684295654,153.0242156982,36),('Mitchelton Library Wifi','37 Helipolis Parada','Mitchelton, 4053',-27.4170417786,152.9783477783,37),('Mt Coot-tha Botanic Gardens Library Wifi','Administration Building, Brisbane Botanic Gardens (Mt Coot-tha), Mt Coot-tha Road','Toowong, 4066',-27.4752998352,152.9760437012,38),('Mt Gravatt Library Wifi','8 Creek Road','Mt Gravatt, 4122',-27.5385551453,153.0802612305,39),('Mt Ommaney Library Wifi','Mt Ommaney Shopping Centre, 171 Dandenong Road','Mt Ommaney, 4074',-27.5482425690,152.9378051758,40),('New Farm Library Wifi','135 Sydney Street','New Farm, 4005',-27.4673652649,153.0495910645,41),('New Farm Park Wifi','Brunswick Street','New Farm',-27.4704608917,153.0522308350,42),('Nundah Library Wifi','1 Bage Street','Nundah, 4012',-27.4012584686,153.0583801270,43),('Oriel Park','Cnr of Alexandra & Lancaster Rds','Ascot',-27.4292793274,153.0576782227,44),('Orleigh Park','Hill End Tce','West End',-27.4899501801,153.0032653809,45),('Post Office Square','Queen & Adelaide Sts','Brisbane',-27.4673500061,153.0273437500,46),('Rocks Riverside Park','Counihan Rd','Seventeen Mile Rocks',-27.5415306091,152.9591369629,47),('Sandgate Library Wifi','Seymour Street','Sandgate, 4017',-27.3206043243,153.0704956055,48),('Stones Corner Library Wifi','280 Logan Road','Stones Corner, 4120',-27.4980354309,153.0436553955,49),('Sunnybank Hills Library Wifi','Sunnybank Hills Shopping Centre, Corner Compton and Calam Roads','Sunnybank Hills, 4109',-27.6109256744,153.0550689697,50),('Teralba Park','Pullen & Osborne Rds','Everton Park',-27.4028606415,152.9805908203,51),('Toowong Library Wifi','Toowon Village Shopping Centre, Sherwood Road','Toowong, 4066',-27.4850521088,152.9925079346,52),('West End Library Wifi','178 - 180 Boundary Street','West End, 4101',-27.4824504852,153.0120697021,53),('Wynnum Library Wifi','Wynnum Civic Centre, 66 Bay Terrace','Wynnum, 4178',-27.4424495697,153.1732025146,54),('Zillmere Library Wifi','Corner Jennings Street and Zillmere Road','Zillmere, 4034',-27.3601417542,153.0407867432,55);
/*!40000 ALTER TABLE `hotspots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `reviewID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `hotspotID` int(11) DEFAULT NULL,
  `review` text,
  `rating` int(11) DEFAULT NULL,
  PRIMARY KEY (`reviewID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=ujis;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,'Johnno',1,'Took some time to secure the connection, but once connected I didn\'t have an problems!',4),(2,'Johnno',2,'Absolutely garbage. Do not even try to connect!!',1),(3,'Dave',1,'Fast and fun. Highly recommended!',5),(4,'Seb',1,'Eh',3);
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `salt` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `postcode` int(4) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=ujis;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('admin','a20.hill@connect.qut.edu.au','4b3403665fea6','7b9e972bb5dbac104eaefcc4625129001efa493d45f8107b43817394f9992996',1,NULL,NULL),('Johnno','john@john.com','4b3403665fea6','79a4b323382e13b9750870361351a2da4919ea7b046807f58bc9c5cebfa4b164',2,NULL,NULL),('Dave','davey@gmail.com','4b3403665fea6','79a4b323382e13b9750870361351a2da4919ea7b046807f58bc9c5cebfa4b164',3,NULL,NULL),('Simon','russiasushi@gmail.com','4b3403665fea6','51df7d83b6fb2fae620b06f69907c9f485f5b39f954c88cba5ccb69e16105ee0',4,NULL,NULL),('Khargan','khargan@oldmate.com','4b3403665fea6','9238c5ed2b851053424c3d8c70eb8792fd7ec23b1f4fb9b17b29d147bbedc501',5,NULL,NULL),('Jimbo','jimbo@gmail.com','4b3403665fea6','acee99322daae00bfcaf254ac5c6681e8581c5d72af379796aa5365a123d916c',7,NULL,NULL),('Josh','joshy@gmail.com','4b3403665fea6','5dfe9506c5ea343f7803af50dcbd12e7a211b17e756a093b4696016f771eeeea',8,NULL,NULL),('Seb','sebtsherry@gmail.com','4b3403665fea6','79a4b323382e13b9750870361351a2da4919ea7b046807f58bc9c5cebfa4b164',9,NULL,NULL),('dickbag','gmail@gmail.com','4b3403665fea6','3a02a4fff1729fde0f235637c1fdd10e498bdcc4b5d2ba92f3a78fefc3a7f7fa',10,NULL,NULL),('SlippinJimmy','slip@jim.com','4b3403665fea6','3312c698e89d17dbc59f16cf8e1740d471ca4036e477f5c9dedb69501a74ffa6',12,NULL,NULL),('johncena','john@cena.com','4b3403665fea6','3312c698e89d17dbc59f16cf8e1740d471ca4036e477f5c9dedb69501a74ffa6',13,NULL,NULL),('testman','testman@man.com','4b3403665fea6','3312c698e89d17dbc59f16cf8e1740d471ca4036e477f5c9dedb69501a74ffa6',14,NULL,NULL),('samtheman','keopqwkeop@gmail.com','4b3403665fea6','3312c698e89d17dbc59f16cf8e1740d471ca4036e477f5c9dedb69501a74ffa6',36,NULL,NULL),('testq','12312312123412@gmail.com','4b3403665fea6','3312c698e89d17dbc59f16cf8e1740d471ca4036e477f5c9dedb69501a74ffa6',37,NULL,NULL),('123456789','kodwa@man.com','4b3403665fea6','3312c698e89d17dbc59f16cf8e1740d471ca4036e477f5c9dedb69501a74ffa6',38,NULL,NULL),('kpodwqkdpoqw','kwdapokwapo@dkwaop.com','4b3403665fea6','3312c698e89d17dbc59f16cf8e1740d471ca4036e477f5c9dedb69501a74ffa6',39,1234,NULL),('jenny','jen@ny.com','4b3403665fea6','3312c698e89d17dbc59f16cf8e1740d471ca4036e477f5c9dedb69501a74ffa6',40,1234,'2014-01-01'),('joseph','jo@joey.com','4b3403665fea6','3312c698e89d17dbc59f16cf8e1740d471ca4036e477f5c9dedb69501a74ffa6',41,1234,'2000-01-06'),('regularjoe','invalid@date.com','4b3403665fea6','3312c698e89d17dbc59f16cf8e1740d471ca4036e477f5c9dedb69501a74ffa6',42,4123,'1935-02-27');
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

-- Dump completed on 2015-05-22  0:49:52
