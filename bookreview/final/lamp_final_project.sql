# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.7.21)
# Database: lamp_final_project
# Generation Time: 2018-08-24 22:14:41 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Category`;

CREATE TABLE `Category` (
  `Category_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Category_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Category` WRITE;
/*!40000 ALTER TABLE `Category` DISABLE KEYS */;

INSERT INTO `Category` (`Category_ID`, `CategoryName`)
VALUES
	(1,'For Sale'),
	(2,'Services'),
	(3,'Jobs');

/*!40000 ALTER TABLE `Category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Location
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Location`;

CREATE TABLE `Location` (
  `Location_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Region_ID` int(11) DEFAULT NULL,
  `LocationName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Location_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Location` WRITE;
/*!40000 ALTER TABLE `Location` DISABLE KEYS */;

INSERT INTO `Location` (`Location_ID`, `Region_ID`, `LocationName`)
VALUES
	(1,1,'San Francisco'),
	(2,1,'Oakland'),
	(3,1,'South Bay'),
	(4,2,'Madras'),
	(5,2,'Bombay'),
	(6,2,'Agra'),
	(7,3,'Frankfurt'),
	(8,3,'Berlin'),
	(9,3,'Tess');

/*!40000 ALTER TABLE `Location` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table login
# ------------------------------------------------------------

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `ID` mediumint(9) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table Post
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Post`;

CREATE TABLE `Post` (
  `Post_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) DEFAULT NULL,
  `Price` float DEFAULT NULL,
  `Description` text,
  `Agreement` text,
  `TimeStampe` timestamp NULL DEFAULT NULL,
  `Image_1` binary(1) DEFAULT NULL,
  `Image_2` binary(1) DEFAULT NULL,
  `Image_3` binary(1) DEFAULT NULL,
  `Image_4` binary(1) DEFAULT NULL,
  `subCategoryID` int(11) unsigned NOT NULL,
  `locationID` int(11) unsigned NOT NULL,
  PRIMARY KEY (`Post_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Post` WRITE;
/*!40000 ALTER TABLE `Post` DISABLE KEYS */;

INSERT INTO `Post` (`Post_ID`, `Title`, `Price`, `Description`, `Agreement`, `TimeStampe`, `Image_1`, `Image_2`, `Image_3`, `Image_4`, `subCategoryID`, `locationID`)
VALUES
	(1,'1984',10.59,'This book is in good condition\n','y',NULL,NULL,NULL,NULL,NULL,1,1),
	(2,'Scythe',22.42,'New Book','y',NULL,NULL,NULL,NULL,NULL,1,1),
	(3,'To Kill A Mocking Bird',5.99,'Used paper back','y',NULL,NULL,NULL,NULL,NULL,1,2),
	(4,'Hackintosch',399.99,'Nice working Hackintosch. Lot\'s of memory and fast drives. ','y',NULL,NULL,NULL,NULL,NULL,2,3),
	(5,'iPad',250,'Good condition!','y',NULL,NULL,NULL,NULL,NULL,2,5),
	(8,'JBoss 2nd edition',10.99,'My New book','y',NULL,NULL,NULL,NULL,NULL,1,3),
	(9,'web stuff',1000,'my new book','y',NULL,NULL,NULL,NULL,NULL,2,3),
	(10,'web stuff',1000,'description',NULL,NULL,NULL,NULL,NULL,NULL,2,3),
	(11,'web stuff',1000,'description',NULL,NULL,NULL,NULL,NULL,NULL,2,3),
	(12,'web stuff',1000,'description',NULL,NULL,NULL,NULL,NULL,NULL,2,3),
	(13,'The Last Chance',4.99,'A chance of a life time is foiled. ',NULL,NULL,NULL,NULL,NULL,NULL,1,1),
	(14,'Macbook Pro',300,'2015. Excellent Condition',NULL,NULL,NULL,NULL,NULL,NULL,2,6),
	(15,'iPad',250.99,'iPad 10. Good condition',NULL,NULL,NULL,NULL,NULL,NULL,2,2),
	(16,'mother board',59.99,'Intel MB new',NULL,NULL,NULL,NULL,NULL,NULL,2,6),
	(17,'Vacuum Sweeper',20,'German vacuum ',NULL,NULL,NULL,NULL,NULL,NULL,3,8),
	(18,'Mac Book Pro',499,'',NULL,NULL,NULL,NULL,NULL,NULL,4,4),
	(19,'Magic Mouse',2.99,'The magic of a mouse',NULL,NULL,NULL,NULL,NULL,NULL,1,3),
	(20,'Software Developer',100,'Apple Computer',NULL,NULL,NULL,NULL,NULL,NULL,7,3),
	(21,'Computer Operator',50,'work hard',NULL,NULL,NULL,NULL,NULL,NULL,8,2),
	(22,'Piano Lessons',30,'good instructor',NULL,NULL,NULL,NULL,NULL,NULL,6,9),
	(23,'Madras food bank',50,'deliver food',NULL,NULL,NULL,NULL,NULL,NULL,9,4),
	(24,'Madras food bank',50,'deliver food',NULL,NULL,NULL,NULL,NULL,NULL,9,4),
	(25,'Accountant Needed',50,'Good Job',NULL,NULL,NULL,NULL,NULL,NULL,5,3),
	(26,'Accountant Needed',50,'Good Job',NULL,NULL,NULL,NULL,NULL,NULL,5,3),
	(27,'Accountant Needed',50,'Good Job',NULL,NULL,NULL,NULL,NULL,NULL,5,3);

/*!40000 ALTER TABLE `Post` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Region
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Region`;

CREATE TABLE `Region` (
  `Region_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Region_Name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Region_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Region` WRITE;
/*!40000 ALTER TABLE `Region` DISABLE KEYS */;

INSERT INTO `Region` (`Region_ID`, `Region_Name`)
VALUES
	(1,'USA'),
	(2,'India'),
	(3,'Germany');

/*!40000 ALTER TABLE `Region` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table SubCategory
# ------------------------------------------------------------

DROP TABLE IF EXISTS `SubCategory`;

CREATE TABLE `SubCategory` (
  `SubCategory_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Category_ID` int(11) DEFAULT NULL,
  `SubCategoryName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`SubCategory_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `SubCategory` WRITE;
/*!40000 ALTER TABLE `SubCategory` DISABLE KEYS */;

INSERT INTO `SubCategory` (`SubCategory_ID`, `Category_ID`, `SubCategoryName`)
VALUES
	(1,1,'Books'),
	(2,1,'Electronics'),
	(3,1,'Household'),
	(4,2,'Computers'),
	(5,2,'Financial'),
	(6,2,'Lessions'),
	(7,3,'Full-Time'),
	(8,3,'Part-Time'),
	(9,3,'Volunteering');

/*!40000 ALTER TABLE `SubCategory` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
