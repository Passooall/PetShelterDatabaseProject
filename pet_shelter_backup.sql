-- MySQL dump 10.14  Distrib 5.5.68-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: pgarcia
-- ------------------------------------------------------
-- Server version	5.5.68-MariaDB

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
-- Temporary table structure for view `Adoptable_Animals`
--

DROP TABLE IF EXISTS `Adoptable_Animals`;
/*!50001 DROP VIEW IF EXISTS `Adoptable_Animals`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `Adoptable_Animals` (
  `ID` tinyint NOT NULL,
  `Name` tinyint NOT NULL,
  `Sex` tinyint NOT NULL,
  `Breed` tinyint NOT NULL,
  `Species` tinyint NOT NULL,
  `Temperament` tinyint NOT NULL,
  `Adoption_Fee` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `Adopted`
--

DROP TABLE IF EXISTS `Adopted`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Adopted` (
  `Adopter_ID` varchar(25) NOT NULL DEFAULT '',
  `Animal_ID` varchar(25) DEFAULT NULL,
  `Taken` datetime DEFAULT NULL,
  `Returned` datetime DEFAULT NULL,
  PRIMARY KEY (`Adopter_ID`),
  KEY `Animal_ID` (`Animal_ID`),
  CONSTRAINT `Adopted_ibfk_1` FOREIGN KEY (`Animal_ID`) REFERENCES `Animals` (`ID`) ON DELETE CASCADE,
  CONSTRAINT `Adopted_ibfk_2` FOREIGN KEY (`Adopter_ID`) REFERENCES `Adopter` (`ID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Adopted`
--

LOCK TABLES `Adopted` WRITE;
/*!40000 ALTER TABLE `Adopted` DISABLE KEYS */;
INSERT INTO `Adopted` VALUES ('01627520','86388709',NULL,NULL),('82440883','37620657',NULL,NULL),('e80dc014','4b31185e','0000-00-00 00:00:00','0000-00-00 00:00:00'),('f5be70ce','9999abcd','0000-00-00 00:00:00','0000-00-00 00:00:00'),('fhe12123','64b720ab','2019-01-02 14:23:00','0000-00-00 00:00:00'),('ghy32856','fd670c3d','0000-00-00 00:00:00','0000-00-00 00:00:00'),('gtyu6bbc','71fc03b0','2017-06-08 08:40:00','2022-08-21 17:48:00'),('hhyyik77','ee136d63','2018-04-21 20:16:00','2022-02-16 08:44:00'),('hu78780h','bce4b643','2020-11-29 05:23:00','2022-08-21 01:36:00'),('iio9889v','6ac28482','2017-02-27 09:00:00','0000-00-00 00:00:00'),('ji89654e','1c37f0ea','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `Adopted` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`pgarcia`@`localhost`*/ /*!50003 TRIGGER Remove_Cares_For AFTER INSERT ON Adopted FOR EACH ROW BEGIN DELETE FROM Cares_For WHERE Cares_For.Animal_ID=new.Animal_ID; END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `Adopter`
--

DROP TABLE IF EXISTS `Adopter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Adopter` (
  `ID` varchar(25) NOT NULL DEFAULT '',
  `First_Name` varchar(25) DEFAULT NULL,
  `Middle_Name` varchar(25) DEFAULT NULL,
  `Last_Name` varchar(25) DEFAULT NULL,
  `Street_Name` varchar(25) DEFAULT NULL,
  `House_Number` int(11) DEFAULT NULL,
  `Zipcode` int(11) DEFAULT NULL,
  `City` varchar(25) DEFAULT NULL,
  `State_USA` text,
  `Phone_Number` varchar(25) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  `Method` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Adopter`
--

LOCK TABLES `Adopter` WRITE;
/*!40000 ALTER TABLE `Adopter` DISABLE KEYS */;
INSERT INTO `Adopter` VALUES ('01627520','Cassy','','Flores','Buckingham Rd.',3214,93321,'Bakersfield','California','661-823-2234','cassyf@email.com',90,'Cash'),('12ewxd2','Mike','','Shoots','Spohn',274,92427,'Kota Kinabalu','California','643-704-2709','lmelhuishg@baidu.com',157,'Cash'),('12fdws33','James','','Mocat','Gale',3,97746,'Yuanjiazhuang','California','898-592-1008','dmcwatersk@usatoday.com',149,'Cash'),('221cccsq','Roger','','Rosa','Arrowood',2648,64511,'Jutrosin','California','874-442-4379','aashworthl@wired.com',154,'Cash'),('23r4dfa3','Phil','','Haps','Bellgrove',58,77199,'Bakersfield','California','539-688-9885','vrehmej@issuu.com',27,'Cash'),('24544sdc','Manus','','Cotts','Northwestern',8,82071,'Xinzhan','California','184-505-1788','mreadittf@hc360.com',41,'Cash'),('34e5rt61','Lamar','','Jobs','Homewood',8,21430,'Lianjiangkou','Texas','994-207-5944','cmacgillivrie12@4shared.com',124,'Card'),('5443fgyi','Sue','','Semmick','Hayes',8047,43436,'Mlawe','California','144-806-5401','tcashleyu@youtube.com',190,'Card'),('59cf6646','Tamar','Lindy','Beeden','Prentice',44641,35120,'Volzhsk','California','618-582-1619','ahowsin1@typepad.com',54,'Cash'),('5ef0d2d3','Jeannette','Kali','Moakes','Dovetail',652,55118,'Prado','Florida','453-466-1533','lmacgettigen5@reddit.com',114,'Cash'),('64dd20ab','Mark','Dime','Espindola','Anzinger',58864,26231,'Bakersfield','California','810-816-1966','rcodyc@edublogs.org',89,'Cash'),('685nhy09','Xoxie','','Zoom','Evergreen',1,51578,'Yunyan','Texas','239-644-3830','aballey@wp.com',113,'Card'),('69d455ff','Dorito','','Mercado','Esker',54,34605,'Maracay','California','266-703-4902','gblagburna@360.cn',173,'Cash'),('69dfd3bf','Max','','Garcia','Di Loreto',66,13348,'Mahaddayweyne','California','951-899-5564','gmowdayb@themeforest.net',152,'Cash'),('6ffbadea','Hertha','Lazaro','Winchurst','Arapahoe',5,66405,'La Sarre','California','999-574-3335','drichardin6@admin.ch',102,'Cash'),('71fc0lly','Sim','','Bomm','Vidon',36799,79282,'Kuusjoki','California','990-130-5302','fcampaignew@ameblo.jp',141,'Card'),('7865aaaa','Lee','','Freeman','Fisk',5396,97469,'Jiangkou','Texas','332-513-6153','tlobb10@ask.com',171,'Card'),('82440883','Joanna','','Sanchez','Buckley St.',2341,93024,'Davis','California','661-263-2357','joannas@gmail.com',50,'Cash'),('92558c6a','Sam','','Nickolas','Farwell',6,58974,'Huaidao','California','949-649-4705','emulcockq@umn.edu',196,'Cash'),('92ba777a','Greg','','Edgar','David',148,17670,'Amgalang','California','950-961-6885','ryakunkins@telegraph.co.uk',83,'Cash'),('92ba8c6b','Antonio','','Gor','Schiller',24,60292,'Baruny','California','509-576-4187','alinfortho@umn.edu',185,'Cash'),('99ba8c6a','Tooth','Man','Boor','Forster',95,51972,'Gniezno','California','270-410-4915','vvasiliup@booking.com',130,'Cash'),('9a93bf31','Evan','Tarrah','Lamps','Menomonie',4002,27755,'Bakersfield','California','664-652-5863','jegel7@vistaprint.com',52,'Cash'),('9e9b820a','Mason','Bud','Quatermain','Comanche',0,38267,'Moutsamoudou','California','758-350-4597','gzelley2@hhs.gov',60,'Cash'),('a3649a93','Jan','Emelyne','Mcilvoray','Bellgrove',72,81693,'Gandapura','California','479-218-8644','bshawcross4@miibeian.gov.cn',129,'Cash'),('ajvdsf789','Mark','','Dopes','Menomonie',4,67802,'Mineiros','California','109-698-9737','rodriscoleh@flickr.com',169,'Cash'),('c8404263','Chickie','Annadiane','Leckey','Starling',9866,86588,'Xingfu','California','209-478-5209','vkeelan3@apple.com',184,'Cash'),('cd25fa5a','Dorita','Randoph','Mussullo','Londonderry',92,80116,'Penghua','California','477-910-0784','fellacombe8@scribd.com',112,'Cash'),('ddd32111','Ariel','','Mops','Mariners Cove',15171,46949,'Rybno','California','449-108-0592','lsertinn@g.co',111,'Cash'),('dqw23e45','Lamar','','Logs','Ireland Street',3222,21488,'Bakersfield','Texas','994-207-5555','bober@gmail.com',124,'Card'),('dsvaqe32','Heather','','Hops','Northwestern',788,86446,'Mariinsk','California','448-333-4767','ecrowcombei@over-blog.com',114,'Cash'),('e80dc014','Marcus','','Hernandez','Spaight',999,88717,'Tanggung','California','842-217-4361','ewaymand@loc.gov',164,'Cash'),('f5be70ce','Shoshanna','Florenza','Taffee','Tennyson',112,51055,'Angoulême','California','977-448-0418','mdeinhard9@ameblo.jp',75,'Cash'),('f66d56c','Eleen','Noble ','Sanbroke','Monterey',99,87385,'Maindang','California','250-951-6562','mrojel0@nymag.com',46,'Cash'),('fhe12123','Mario','','Cox','Chinook',8704,45394,'Huangpi','California','569-190-2220','tbuggye@symantec.com',122,'Cash'),('ghy32856','Lee','','Slave','Quincy',7499,17594,'General Lavalle','Texas','963-264-0342','cpensom11@smh.com.au',138,'Card'),('gtyu6bbc','Shosha','','Soom','Doe Crossing',16321,15587,'Limboto','Texas','435-382-6101','pgannawayx@sohu.com',194,'Card'),('hhyyik77','Iam','','Tony','Village',2,70794,'Chayuan','California','985-148-6919','amaccollomr@sun.com',177,'Cash'),('hu78780h','Groot','','Klemmick','Brown',933,18053,'Bakersfield','California','798-993-5328','tcrossthwaitet@cornell.edu',25,'Card'),('iio9889v','Cloe','','Demmick','Maple',95717,31169,'Bakersfield','California','431-936-2362','dgarnsworthv@mayoclinic.com',90,'Card'),('ji89654e','Lee','','Freman','North',9,16496,'Zblewo','Texas','193-270-4335','asambrokz@istockphoto.com',147,'Card');
/*!40000 ALTER TABLE `Adopter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Animals`
--

DROP TABLE IF EXISTS `Animals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Animals` (
  `Name` text,
  `DOB` datetime DEFAULT NULL,
  `Sex` text,
  `Species` text,
  `Breed` text,
  `Color` text,
  `Pattern` text,
  `Altered` text,
  `Weight` float DEFAULT NULL,
  `ID` varchar(20) NOT NULL DEFAULT '',
  `Shelter_Section` int(11) DEFAULT NULL,
  `Adoption_Fee` float DEFAULT NULL,
  `Euthanized` text,
  `Date_of_Euthanization` datetime DEFAULT NULL,
  `Arrival_Date` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Animals`
--

LOCK TABLES `Animals` WRITE;
/*!40000 ALTER TABLE `Animals` DISABLE KEYS */;
INSERT INTO `Animals` VALUES ('Giffie','2012-04-01 09:19:00','M','Dog','German Shepherd','Brown','Patches','T',68,'0f1f6580',2,108,'F',NULL,'2014-07-31 18:41:00'),('Daisy','0000-00-00 00:00:00','F','Bird','Duck','White','Solid','F',10,'11f324de',6,20,'F',NULL,'2014-12-12 12:12:00'),('Rex','2019-10-23 10:23:00','M','Dog','German Shepherd','Brown','Patches','F',50,'1c37f0ea',2,50,'F',NULL,'2020-04-13 21:41:00'),('Milo','2020-04-25 14:53:00','M','Dog','Chihuahua','Tan','Solid','F',6,'2164cf62',1,20,'F',NULL,'2020-09-23 21:43:00'),('Gaga','2015-06-13 13:32:00','F','Bird','Parrot','Red','Patches','F',10,'24c03f5e',6,100,'F',NULL,'2016-06-21 12:32:00'),('Minnie','0000-00-00 00:00:00','F','Rodent','Mouse','Black','Solid','F',45,'2cfcb813',10,50,'F',NULL,'2014-12-12 12:12:00'),('Tina','2010-02-23 13:42:00','F','Dog','Chihuahua','Brown','Patches','F',5,'2f543a30',1,50,'F',NULL,'2011-12-23 23:23:00'),('Merideth','0000-00-00 00:00:00','M','Cat','Tabby','Grey/White','Patches','No',0,'37620657',4,50,'No',NULL,'0000-00-00 00:00:00'),('Rochella','2016-02-21 20:44:00','F','Ferret','Black Sable','Black','Solid','F',2.5,'3774615e',10,17,'F',NULL,'2019-02-21 06:00:00'),('Fluffy','2015-08-15 20:33:00','F','Cat','Tabby','Orange','Striped','F',15,'380dc00c',5,10,'F',NULL,'0000-00-00 00:00:00'),('Aldus','2017-09-10 01:04:00','M','Cat','Ragdoll','white','Spotted','T',12,'476f5c09',4,37,'F',NULL,'2020-05-02 19:47:00'),('Deane','2010-04-20 13:56:00','F','Cat','Persian','White','Solid','T',9,'48b52db0',5,9.3,'F',NULL,'2012-01-11 04:39:00'),('Polly','2015-06-13 23:11:00','F','Bird','Parrot','White','Solid','F',10,'4b31185e',6,120,'F',NULL,'2016-03-21 10:03:00'),('Star','2012-05-12 23:21:00','F','Lizard','Gecko','Green','Striped','F',1,'52bd85c3',8,2,'F',NULL,'2013-06-15 12:23:00'),('Amos','2016-05-15 16:36:00','M','Ferret','Blaze','Red','Striped','T',3.2,'53ce4421',10,10.8,'F',NULL,'2018-04-16 15:27:00'),('Bunny','2012-03-25 12:53:00','F','Dog','Greyhound','Tan','Patches','F',80,'62ec34cd',2,100,'F',NULL,'2013-03-23 13:42:00'),('Nugget','2012-04-14 12:15:00','M','Cat','Ragdoll','White','Solid','F',20,'64b720ab',4,50,'F',NULL,'2015-06-22 10:05:00'),('Geico','2015-05-23 12:43:00','M','Lizard','Gecko','Green','Striped','F',1,'6ac28482',8,2,'F',NULL,'2016-12-23 12:12:00'),('Aster','2016-02-18 18:01:00','F','Bird','Parakeet','Blue','Spotted','F',2,'6cfeb41c',7,10,'F',NULL,'2017-03-23 10:03:00'),('Peeko','2012-12-23 12:03:00','M','Bird','Seagull','White','Striped','F',5,'6fb35b21',6,100,'F',NULL,'0000-00-00 00:00:00'),('Tuna','2010-11-23 14:42:00','F','Dog','Dachshund','Brown','Solid','F',10,'71fc03b0',1,20,'F',NULL,'2010-12-13 23:12:00'),('Splinter','2020-02-23 12:23:00','M','Rodent','Rat','Brouwn','Solid','F',5,'7e00806d',10,2,'F',NULL,'2020-11-12 12:23:00'),('Tristam','2010-02-18 13:18:00','M','Dog','Pug','Tan','Solid','F',15,'807cb21d',1,91,'F',NULL,'2019-05-10 23:38:00'),('Zues','0000-00-00 00:00:00','M','Dog','German Shepherd','Black','Patches','Yes',0,'86388709',3,90,'No',NULL,'0000-00-00 00:00:00'),('Max','0000-00-00 00:00:00','M','Dog','Great Dane','Black','Solid','F',60,'8bb114f4',2,50,'F',NULL,'2014-12-12 12:12:00'),('Cesar','2012-04-30 17:29:00','M','Lizard','Komodo Dragon','Green','Solid','F',172,'8d964852',8,360,'F',NULL,'2016-11-17 11:28:00'),('Oreo','2010-04-05 12:32:00','F','Dog','Chihuahua','Black','Patches','F',5,'8fd44a22',1,20,'F',NULL,'2011-07-10 10:10:00'),('Goofy','0000-00-00 00:00:00','M','Dog','Great Dane','Black','Solid','F',100,'905694ad',2,100,'F',NULL,'2014-12-12 12:12:00'),('Mocha','2009-08-29 16:22:00','F','Cat','Shorthair','Brown','Patches','F',11,'92ba8c6a',4,20,'F',NULL,'2020-12-02 14:22:00'),('Kai','2020-08-03 12:31:00','F','Dog','German Shepherd','White','Solid','T',50,'9999abcd',2,100,'F',NULL,'2020-09-15 16:05:00'),('Tony','0000-00-00 00:00:00','M','Cat','Tabby','Orange','Striped','F',10,'ac64d184',4,20,'F',NULL,'2012-11-23 10:10:00'),('Pogo','2018-02-04 21:12:00','M','Dog','Pug','Tan','Solid','T',15,'bac26383',1,50,'F',NULL,'2018-09-25 12:32:00'),('Odin','2010-12-23 15:42:00','M','Dog','Mastiff','Grey','Solid','F',40,'bce4b643',2,100,'F',NULL,'2015-12-01 04:23:00'),('Ru','2022-01-13 14:23:00','M','Dog','Australian Shepherd','White','Patches','F',20,'be697dc0',2,60,'F',NULL,'2022-01-30 03:32:00'),('Pookie','0000-00-00 00:00:00','F','Dog','Pomeranian','White','Solid','F',20,'c0bbbaff',3,100,'F',NULL,'0000-00-00 00:00:00'),('Mickey','0000-00-00 00:00:00','M','Rodent','Mouse','Black','Solid','F',50,'ccd2efca',10,50,'F',NULL,'2014-12-12 12:12:00'),('Colgate','2015-12-30 15:04:00','M','Rodent','Rat','Grey','Solid','F',3,'ced9c24f',10,5,'F',NULL,'2018-12-03 10:12:00'),('Hashim','2016-07-10 21:23:00','M','Dog','Chihuahua','Brown','Spotted','F',4.3,'e1d35a33',1,10.8,'T','2021-02-25 14:55:00','2019-05-10 23:38:00'),('Donald','0000-00-00 00:00:00','M','Bird','Duck','White','Solid','F',10,'ed23444f',6,20,'F',NULL,'2014-12-12 12:12:00'),('Boba','0000-00-00 00:00:00','M','Dog','Shiba Inu','Black','Patches','F',25,'ee136d63',3,200,'F',NULL,'2022-11-23 15:23:00'),('Janessa','2010-10-22 15:30:00','F','Lizard','Komodo Dragon','Green','Solid','F',150,'fc29b8b1',8,122,'T',NULL,'2011-11-13 16:40:00'),('Beyonce','2015-08-14 21:32:00','F','Cat','Ragdoll','Black','solid','F',10,'fd670c3d',4,100,'F',NULL,'2016-09-12 14:43:00'),('Malcolm','2013-01-25 21:44:00','M','Cat','British Shorthair','Grey','Solid','F',10,'feb847ac',5,9.3,'F',NULL,'2017-11-04 16:51:00');
/*!40000 ALTER TABLE `Animals` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`pgarcia`@`localhost`*/ /*!50003 TRIGGER Animal_Update
AFTER INSERT ON Animals
FOR EACH ROW 
BEGIN
UPDATE Shelter_Section SET Shelter_Section.Spaces_Left = Shelter_Section.Spaces_Left-1 WHERE Shelter_Section.Room_Number = new.Shelter_Section;
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
/*!50003 CREATE*/ /*!50017 DEFINER=`pgarcia`@`localhost`*/ /*!50003 TRIGGER Animal_Deleted
BEFORE DELETE ON Animals
FOR EACH ROW 
BEGIN
DELETE FROM Adopted WHERE Adopted.Animal_ID = old.ID;
DELETE FROM Health_Record WHERE Health_Record.Animal_ID = old.ID;
DELETE FROM Cares_For WHERE Cares_For.Animal_ID = old.ID;
DELETE FROM Status WHERE Status.Animal_ID = old.ID;
UPDATE Shelter_Section SET Shelter_Section.Spaces_Left = Shelter_Section.Spaces_Left+1 WHERE Shelter_Section.Room_Number = old.Shelter_Section;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Temporary table structure for view `Animals_In_Shelter`
--

DROP TABLE IF EXISTS `Animals_In_Shelter`;
/*!50001 DROP VIEW IF EXISTS `Animals_In_Shelter`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `Animals_In_Shelter` (
  `Name` tinyint NOT NULL,
  `DOB` tinyint NOT NULL,
  `Sex` tinyint NOT NULL,
  `Species` tinyint NOT NULL,
  `Breed` tinyint NOT NULL,
  `Color` tinyint NOT NULL,
  `Pattern` tinyint NOT NULL,
  `Altered` tinyint NOT NULL,
  `Weight` tinyint NOT NULL,
  `ID` tinyint NOT NULL,
  `Shelter_Section` tinyint NOT NULL,
  `Adoption_Fee` tinyint NOT NULL,
  `Euthanized` tinyint NOT NULL,
  `Date_of_Euthanization` tinyint NOT NULL,
  `Arrival_Date` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `Care_Log`
--

DROP TABLE IF EXISTS `Care_Log`;
/*!50001 DROP VIEW IF EXISTS `Care_Log`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `Care_Log` (
  `Animal` tinyint NOT NULL,
  `Animal_ID` tinyint NOT NULL,
  `Employee_FName` tinyint NOT NULL,
  `Employee_lName` tinyint NOT NULL,
  `Employee_ID` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `Cares_For`
--

DROP TABLE IF EXISTS `Cares_For`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Cares_For` (
  `Employee_ID` varchar(25) NOT NULL DEFAULT '',
  `Animal_ID` varchar(25) NOT NULL DEFAULT '',
  `Start` datetime DEFAULT NULL,
  `End` datetime DEFAULT NULL,
  PRIMARY KEY (`Animal_ID`,`Employee_ID`),
  KEY `Employee_ID` (`Employee_ID`),
  CONSTRAINT `Cares_For_ibfk_1` FOREIGN KEY (`Employee_ID`) REFERENCES `Employee` (`ID`) ON DELETE CASCADE,
  CONSTRAINT `Cares_For_ibfk_2` FOREIGN KEY (`Animal_ID`) REFERENCES `Animals` (`ID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cares_For`
--

LOCK TABLES `Cares_For` WRITE;
/*!40000 ALTER TABLE `Cares_For` DISABLE KEYS */;
INSERT INTO `Cares_For` VALUES ('637482a','0f1f6580',NULL,NULL),('6cf6d551','11f324de','2018-04-12 05:30:00','2021-01-18 04:15:00'),('2f49929e','2164cf62','2010-11-15 20:49:00','0000-00-00 00:00:00'),('637482a','2164cf62',NULL,NULL),('90deb728','2cfcb813','2011-03-02 15:04:00','2020-09-09 19:14:00'),('72e63041','2f543a30','2020-12-04 15:40:00','2020-09-07 13:21:00'),('2f49929e','3774615e','2015-03-29 13:16:00','0000-00-00 00:00:00'),('860e64a8','380dc00c','2018-10-11 00:44:00','2020-10-24 03:25:00'),('72e63041','476f5c09','2020-03-31 01:45:00','2020-09-09 04:58:00'),('0e9aae59','48b52db0','2019-12-09 18:50:00','2020-04-17 16:42:00'),('6dd330a5','52bd85c3','2012-06-01 14:41:00','2020-06-08 18:18:00'),('2f49929e','6cfeb41c','2017-07-30 17:24:00','0000-00-00 00:00:00'),('0e9aae59','6fb35b21','2014-12-24 04:43:00','2020-11-26 19:44:00'),('0e9aae59','7e00806d','2013-03-28 07:53:00','0000-00-00 00:00:00'),('90deb728','807cb21d','2018-05-21 03:16:00','2020-03-29 09:03:00'),('860e64a8','8bb114f4','2018-12-17 17:45:00','2020-06-02 04:16:00'),('3c007748','8d964852','2020-09-19 18:28:00','0000-00-00 00:00:00'),('72e63041','8fd44a22','2015-02-20 14:40:00','0000-00-00 00:00:00'),('72e63041','905694ad','2012-12-14 07:22:00','0000-00-00 00:00:00'),('6cf6d551','92ba8c6a','2018-07-11 03:48:00','2020-11-22 08:48:00'),('4af64d6f','ac64d184','2020-10-29 10:12:00','2021-02-11 11:12:00'),('6dd330a5','bac26383','2020-07-04 00:12:00','0000-00-00 00:00:00'),('90deb728','be697dc0','2021-01-29 01:25:00','0000-00-00 00:00:00'),('2f49929e','c0bbbaff','2011-01-12 16:35:00','2020-12-16 09:43:00'),('6dd330a5','ccd2efca','2014-08-23 17:13:00','2020-10-12 12:31:00'),('3c007748','ced9c24f','2017-04-26 10:37:00','0000-00-00 00:00:00'),('6dd330a5','e1d35a33','2014-03-19 20:21:00','2020-12-14 12:42:00'),('69ff2334','ed23444f','2019-09-09 22:47:00','0000-00-00 00:00:00'),('6cf6d551','fc29b8b1','2010-09-05 21:17:00','0000-00-00 00:00:00'),('1212312','feb847ac',NULL,NULL),('860e64a8','feb847ac','2012-06-20 19:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `Cares_For` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DeletedEmployees`
--

DROP TABLE IF EXISTS `DeletedEmployees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DeletedEmployees` (
  `EmployeeName` text,
  `SSN` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DeletedEmployees`
--

LOCK TABLES `DeletedEmployees` WRITE;
/*!40000 ALTER TABLE `DeletedEmployees` DISABLE KEYS */;
/*!40000 ALTER TABLE `DeletedEmployees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Employee`
--

DROP TABLE IF EXISTS `Employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Employee` (
  `firstName` text,
  `middleName` text,
  `lastName` text,
  `streetName` text,
  `houseNumber` int(11) DEFAULT NULL,
  `zipCode` int(11) DEFAULT NULL,
  `city` text,
  `state` text,
  `phoneNumber1` varchar(25) DEFAULT NULL,
  `ID` varchar(20) NOT NULL DEFAULT '',
  `SSN` varchar(25) DEFAULT NULL,
  `email` text,
  `payment` float DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `authority` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Employee`
--

LOCK TABLES `Employee` WRITE;
/*!40000 ALTER TABLE `Employee` DISABLE KEYS */;
INSERT INTO `Employee` VALUES ('Pascual','Romero','Garcia','Hazelmere Ct.',1500,0,'Bakersfield','California','661-699-3814','01673679','123-45-6789','pascualgrc@gmail.com',30,NULL,NULL,'89e01536ac207279409d4de1e5253e01f4a1769e696db0d6062ca9b8f56767c8',2),('Zed','Kirbee','Label','6th',4,49035,'Washington','District of Columbia','202-811-3089','0e9aae59','112-53-4756','klabel8@123-reg.co.uk',24,'0000-00-00','0000-00-00','password1',0),('Man','A.','Ger','Manager St.',1111,12345,'Manageropolis','California','661-555-1111','1212312','123-45-6789','manager@email.com',25,NULL,NULL,'6cf615d5bcaac778352a8f1f3360d23f02f34ec182e259897fd6ce485d7870d4',1),('Ardra','Tadio','Scammell','Little Fleur',6,55154,'Lehigh Acres','Florida','863-277-6983','2f49929e','258-78-4450','tscammell6@phpbb.com',24,'0000-00-00','0000-00-00','password2',0),('Oriana','Ernestus','Gabbott','Corben',3,58118,'Charlotte','North Carolina','704-335-0965','3c007748','874-15-7850','egabbott7@ucoz.ru',19,'0000-00-00','0000-00-00','password3',0),('Frank','Kori','Cuchey','Prentice',19,63629,'Aurora','Colorado','303-474-8778','4af64d6f','380-98-7582','kcuchey9@chron.com',23,'0000-00-00','0000-00-00','password4',0),('Emp','Lo','Yee','Employee Rd.',1010,54321,'Employee City','California','661-555-1010','637482a','987-65-4321','employee@email.com',15,NULL,NULL,'0b14d501a594442a01c6859541bcb3e8164d183d32937b851835442f69d5c94e',0),('Hillary','Cherida','Horley','Grayhawk',394,65601,'Washington','District of Columbia','202-987-8785','69ff2334','827-62-7816','chorley3@paginegialle.it',15,'0000-00-00','0000-00-00','password5',1),('Jay','Beverie','Haryngton','Riverside',694,42549,'Newark','New Jersey','201-283-5392','6cf6d551','173-64-2004','bharyngton4@epa.gov',20,'0000-00-00','0000-00-00','password6',0),('Sebastian','Pepe','Bernardino','Hooker',8696,11822,'Orange','California','858-815-1896','6dd330a5','331-91-3063','pbernardino0@naver.com',19,'0000-00-00','0000-00-00','password7',2),('Shaylynn','Ario','Murkus','Oak',79,52380,'Raleigh','North Carolina','919-768-9568','72e63041','863-94-6480','amurkus2@ameblo.jp',23,'0000-00-00','0000-00-00','password8',1),('Orbadiah','Korie','Batterham','Arapahoe',8,43498,'Evansville','Indiana','812-428-0302','860e64a8','314-47-1063','kbatterham5@canalblog.com',17,'0000-00-00','0000-00-00','password9',0),('Petronella','Isa','de Clerc','Westport',7894,53808,'Bowie','Maryland','240-328-4047','90deb728','742-59-6375','ideclerc1@aboutads.info',20,'0000-00-00','0000-00-00','password9',1),('Supe','R.','Visor','Supervisor Ct.',9999,74629,'Super','California','661-555-5555','ab24fa34','729-36-3728','supervisor@email.com',15,NULL,NULL,'5906ac361a137e2d286465cd6588ebb5ac3f5ae955001100bc41577c3d751764',2);
/*!40000 ALTER TABLE `Employee` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`pgarcia`@`localhost`*/ /*!50003 TRIGGER New_Employee
AFTER INSERT ON Employee
FOR EACH ROW 
BEGIN
DECLARE id varchar(20);
DECLARE s_id varchar(20);
SET id = new.ID;
INSERT INTO Supervisor(Employee_ID, Supervisor) VALUES (id, NULL);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `Health_Record`
--

DROP TABLE IF EXISTS `Health_Record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Health_Record` (
  `Cond` text,
  `Hist` text,
  `Special_Needs` text,
  `Serial_Number` varchar(40) DEFAULT NULL,
  `Animal_ID` varchar(20) DEFAULT NULL,
  KEY `Animal_ID` (`Animal_ID`),
  CONSTRAINT `Health_Record_ibfk_1` FOREIGN KEY (`Animal_ID`) REFERENCES `Animals` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Health_Record`
--

LOCK TABLES `Health_Record` WRITE;
/*!40000 ALTER TABLE `Health_Record` DISABLE KEYS */;
INSERT INTO `Health_Record` VALUES ('Poor','Abused','NULL','33fb7a56-c815-41d8-8faf-42a81e92fa5e','48b52db0'),('Excellent','NULL','NULL','5da833f2-8d3e-40fd-a144-6328b78d8e9a','476f5c09'),('Good','Runaway','NULL','60ff5c78-1cb6-45bd-a192-86084cccc437','53ce4421'),('Excellent','NULL','Hip Problem','7c1bf283-ca84-4f17-b811-93ba3964e95f','fc29b8b1'),('Good','Abandoned','NULL','9183c9b2-ba1c-4dae-b117-ed84e5a99120','3774615e'),('Good','Police Dog','Afraid of vaccums','96728ff2-cc3a-4bf5-b901-9572071f5d3a','0f1f6580'),('Good','Runaway','Cushings Disease','ad841147-2daf-4749-bf69-5e09b5023-a4c','8d964852'),('Good','NULL','NULL','b45518e3-34fa-40f6-b282-a58d5dbed023','feb847ac'),('Good','NULL','Blind','dd338dcd-120b-4608-8cd0-f29064974bf0','e1d35a33'),('Good','found at park',NULL,NULL,'11f324de'),('Excellent',NULL,NULL,NULL,'37620657'),('Good',NULL,NULL,NULL,'86388709');
/*!40000 ALTER TABLE `Health_Record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Manages`
--

DROP TABLE IF EXISTS `Manages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Manages` (
  `Employee_ID` varchar(25) NOT NULL DEFAULT '',
  `Shelter_ID` varchar(25) DEFAULT NULL,
  `Day_Shift` text,
  `Night_Shift` text,
  PRIMARY KEY (`Employee_ID`),
  KEY `Shelter_ID` (`Shelter_ID`),
  CONSTRAINT `Manages_ibfk_1` FOREIGN KEY (`Employee_ID`) REFERENCES `Employee` (`ID`),
  CONSTRAINT `Manages_ibfk_2` FOREIGN KEY (`Shelter_ID`) REFERENCES `Pet_Shelter` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Manages`
--

LOCK TABLES `Manages` WRITE;
/*!40000 ALTER TABLE `Manages` DISABLE KEYS */;
INSERT INTO `Manages` VALUES ('69ff2334','04fccb6d','No','Yes'),('6dd330a5','04fccb6d','Yes','No'),('72e63041','04fccb6d','No','Yes'),('90deb728','04fccb6d','Yes','No');
/*!40000 ALTER TABLE `Manages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `Needs_Care`
--

DROP TABLE IF EXISTS `Needs_Care`;
/*!50001 DROP VIEW IF EXISTS `Needs_Care`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `Needs_Care` (
  `Name` tinyint NOT NULL,
  `DOB` tinyint NOT NULL,
  `Sex` tinyint NOT NULL,
  `Species` tinyint NOT NULL,
  `Breed` tinyint NOT NULL,
  `Color` tinyint NOT NULL,
  `Pattern` tinyint NOT NULL,
  `Altered` tinyint NOT NULL,
  `Weight` tinyint NOT NULL,
  `ID` tinyint NOT NULL,
  `Shelter_Section` tinyint NOT NULL,
  `Adoption_Fee` tinyint NOT NULL,
  `Euthanized` tinyint NOT NULL,
  `Date_of_Euthanization` tinyint NOT NULL,
  `Arrival_Date` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `Pet_Shelter`
--

DROP TABLE IF EXISTS `Pet_Shelter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Pet_Shelter` (
  `Name` text,
  `Street_Name` text,
  `Building_Number` int(11) DEFAULT NULL,
  `Zip_Code` int(11) DEFAULT NULL,
  `City` text,
  `State` text,
  `Phone_Number` text,
  `Email` text,
  `ID` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Pet_Shelter`
--

LOCK TABLES `Pet_Shelter` WRITE;
/*!40000 ALTER TABLE `Pet_Shelter` DISABLE KEYS */;
INSERT INTO `Pet_Shelter` VALUES ('Golden Gate Pet Shelter','Carpenter',228,93309,'Bakersfield','California','651-469-8885','goldengateshelter@hexun.com','04fccb6d');
/*!40000 ALTER TABLE `Pet_Shelter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Shelter_Section`
--

DROP TABLE IF EXISTS `Shelter_Section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Shelter_Section` (
  `Name` text,
  `Section_ID` varchar(20) NOT NULL DEFAULT '',
  `Animal_Type` text,
  `Room_Number` int(10) unsigned DEFAULT NULL,
  `Max_Capacity` int(11) DEFAULT NULL,
  `Spaces_Left` int(11) DEFAULT NULL,
  PRIMARY KEY (`Section_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Shelter_Section`
--

LOCK TABLES `Shelter_Section` WRITE;
/*!40000 ALTER TABLE `Shelter_Section` DISABLE KEYS */;
INSERT INTO `Shelter_Section` VALUES ('Golden Gate Pet Shelter','15cd2734','Lizards',9,20,20),('Golden Gate Pet Shelter','3b0b99ba','Dogs',3,10,7),('Golden Gate Pet Shelter','44985a14','Birds',7,10,9),('Golden Gate Pet Shelter','56c1a344','Lizards',8,20,16),('Golden Gate Pet Shelter','5e132923','Rodents',10,30,23),('Golden Gate Pet Shelter','678a431b','Cats',5,15,12),('Golden Gate Pet Shelter','8641d39a','Birds',6,10,6),('Golden Gate Pet Shelter','9af0fbd2','Dogs',2,10,3),('Golden Gate Pet Shelter','9c98ed50','Dogs',1,10,3),('Golden Gate Pet Shelter','d26a69e4','Cats',4,15,9);
/*!40000 ALTER TABLE `Shelter_Section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Status`
--

DROP TABLE IF EXISTS `Status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Status` (
  `Animal_ID` varchar(25) NOT NULL DEFAULT '',
  `Activity` varchar(25) DEFAULT NULL,
  `Adoptable` tinyint(1) DEFAULT NULL,
  `Temperament` varchar(25) DEFAULT NULL,
  `Training` int(11) DEFAULT NULL,
  `Exercising` int(11) DEFAULT NULL,
  `Feeding` int(11) DEFAULT NULL,
  PRIMARY KEY (`Animal_ID`),
  CONSTRAINT `Status_ibfk_1` FOREIGN KEY (`Animal_ID`) REFERENCES `Animals` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Status`
--

LOCK TABLES `Status` WRITE;
/*!40000 ALTER TABLE `Status` DISABLE KEYS */;
INSERT INTO `Status` VALUES ('0f1f6580','High',1,'Hyperactive',30,60,3),('11f324de','high',0,'aggressive',10,60,2),('1c37f0ea','Low',1,'calm',30,60,3),('2164cf62','high',0,'aggressive',30,60,3),('24c03f5e','Medium',1,'calm',15,60,2),('2cfcb813','Medium',1,'lazy',30,30,3),('2f543a30','Medium',1,'calm',15,60,2),('37620657','Medium',1,'Chill',10,30,2),('3774615e','high',0,'aggressive',30,60,3),('380dc00c','Medium',1,'lazy',30,30,3),('476f5c09','Medium',1,'calm',15,60,2),('48b52db0','Medium',1,'calm',15,60,2),('4b31185e','high',1,'hyper',10,120,2),('52bd85c3','high',0,'aggressive',30,60,3),('62ec34cd','Medium',1,'lazy',60,30,2),('64b720ab','Medium',1,'calm',0,60,2),('6ac28482','high',1,'hyper',30,120,3),('6cfeb41c','Low',1,'calm',30,60,3),('6fb35b21','high',0,'aggressive',15,60,2),('71fc03b0','Medium',1,'lazy',10,30,2),('7e00806d','Low',1,'calm',15,60,2),('807cb21d','high',1,'hyper',30,120,3),('86388709','Medium',1,'Cautious',30,40,2),('8bb114f4','high',1,'hyper',30,120,3),('8d964852','high',0,'hyper',15,120,2),('8fd44a22','high',0,'aggressive',15,60,2),('905694ad','Low',1,'calm',15,60,2),('92ba8c6a','Low',1,'calm',0,60,2),('9999abcd','Medium',1,'lazy',60,30,2),('ac64d184','high',1,'hyper',60,120,2),('bac26383','Low',1,'calm',30,60,3),('bce4b643','Low',1,'calm',60,60,2),('be697dc0','Low',1,'calm',30,60,3),('c0bbbaff','Medium',1,'calm',30,60,3),('ccd2efca','Medium',1,'calm',30,60,3),('ced9c24f','Low',1,'calm',15,60,2),('e1d35a33','high',0,'aggressive',30,60,3),('ed23444f','Low',1,'calm',10,60,2),('ee136d63','Medium',1,'lazy',15,30,2),('fc29b8b1','Low',0,'calm',0,60,2),('fd670c3d','high',1,'hyper',15,120,2),('feb847ac','Low',1,'calm',30,60,3);
/*!40000 ALTER TABLE `Status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Supervisor`
--

DROP TABLE IF EXISTS `Supervisor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Supervisor` (
  `Employee_ID` varchar(25) NOT NULL DEFAULT '',
  `Supervisor` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`Employee_ID`),
  CONSTRAINT `Supervisor_ibfk_1` FOREIGN KEY (`Employee_ID`) REFERENCES `Employee` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Supervisor`
--

LOCK TABLES `Supervisor` WRITE;
/*!40000 ALTER TABLE `Supervisor` DISABLE KEYS */;
INSERT INTO `Supervisor` VALUES ('01673679',NULL),('0e9aae59','6dd330a5'),('1212312',NULL),('2f49929e','6dd330a5'),('3c007748','6dd330a5'),('4af64d6f','6dd330a5'),('637482a',NULL),('69ff2334','6dd330a5'),('6cf6d551','6dd330a5'),('6dd330a5',''),('72e63041','6dd330a5'),('860e64a8','6dd330a5'),('90deb728','6dd330a5'),('ab24fa34',NULL);
/*!40000 ALTER TABLE `Supervisor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `Adoptable_Animals`
--

/*!50001 DROP TABLE IF EXISTS `Adoptable_Animals`*/;
/*!50001 DROP VIEW IF EXISTS `Adoptable_Animals`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`pgarcia`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `Adoptable_Animals` AS select `a`.`ID` AS `ID`,`a`.`Name` AS `Name`,`a`.`Sex` AS `Sex`,`a`.`Breed` AS `Breed`,`a`.`Species` AS `Species`,`Status`.`Temperament` AS `Temperament`,`a`.`Adoption_Fee` AS `Adoption_Fee` from (`Animals_In_Shelter` `a` join `Status` on((`a`.`ID` = `Status`.`Animal_ID`))) where (`Status`.`Adoptable` = 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `Animals_In_Shelter`
--

/*!50001 DROP TABLE IF EXISTS `Animals_In_Shelter`*/;
/*!50001 DROP VIEW IF EXISTS `Animals_In_Shelter`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`pgarcia`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `Animals_In_Shelter` AS select `Animals`.`Name` AS `Name`,`Animals`.`DOB` AS `DOB`,`Animals`.`Sex` AS `Sex`,`Animals`.`Species` AS `Species`,`Animals`.`Breed` AS `Breed`,`Animals`.`Color` AS `Color`,`Animals`.`Pattern` AS `Pattern`,`Animals`.`Altered` AS `Altered`,`Animals`.`Weight` AS `Weight`,`Animals`.`ID` AS `ID`,`Animals`.`Shelter_Section` AS `Shelter_Section`,`Animals`.`Adoption_Fee` AS `Adoption_Fee`,`Animals`.`Euthanized` AS `Euthanized`,`Animals`.`Date_of_Euthanization` AS `Date_of_Euthanization`,`Animals`.`Arrival_Date` AS `Arrival_Date` from `Animals` where ((not(`Animals`.`ID` in (select `Adopted`.`Animal_ID` from `Adopted`))) and isnull(`Animals`.`Date_of_Euthanization`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `Care_Log`
--

/*!50001 DROP TABLE IF EXISTS `Care_Log`*/;
/*!50001 DROP VIEW IF EXISTS `Care_Log`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`pgarcia`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `Care_Log` AS select `Animals`.`Name` AS `Animal`,`Animals`.`ID` AS `Animal_ID`,`Employee`.`firstName` AS `Employee_FName`,`Employee`.`lastName` AS `Employee_lName`,`Employee`.`ID` AS `Employee_ID` from ((`Animals` join `Cares_For` on((`Animals`.`ID` = `Cares_For`.`Animal_ID`))) join `Employee` on((`Cares_For`.`Employee_ID` = `Employee`.`ID`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `Needs_Care`
--

/*!50001 DROP TABLE IF EXISTS `Needs_Care`*/;
/*!50001 DROP VIEW IF EXISTS `Needs_Care`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`pgarcia`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `Needs_Care` AS select `Animals_In_Shelter`.`Name` AS `Name`,`Animals_In_Shelter`.`DOB` AS `DOB`,`Animals_In_Shelter`.`Sex` AS `Sex`,`Animals_In_Shelter`.`Species` AS `Species`,`Animals_In_Shelter`.`Breed` AS `Breed`,`Animals_In_Shelter`.`Color` AS `Color`,`Animals_In_Shelter`.`Pattern` AS `Pattern`,`Animals_In_Shelter`.`Altered` AS `Altered`,`Animals_In_Shelter`.`Weight` AS `Weight`,`Animals_In_Shelter`.`ID` AS `ID`,`Animals_In_Shelter`.`Shelter_Section` AS `Shelter_Section`,`Animals_In_Shelter`.`Adoption_Fee` AS `Adoption_Fee`,`Animals_In_Shelter`.`Euthanized` AS `Euthanized`,`Animals_In_Shelter`.`Date_of_Euthanization` AS `Date_of_Euthanization`,`Animals_In_Shelter`.`Arrival_Date` AS `Arrival_Date` from `Animals_In_Shelter` where (not(`Animals_In_Shelter`.`ID` in (select `Cares_For`.`Animal_ID` from `Cares_For`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-17 14:43:42
