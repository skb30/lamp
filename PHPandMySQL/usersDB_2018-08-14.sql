# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.7.21)
# Database: usersDB
# Generation Time: 2018-08-14 23:25:56 +0000
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



# Dump of table Location
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Location`;

CREATE TABLE `Location` (
  `Location_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Region_ID` int(11) DEFAULT NULL,
  `LocationName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Location_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



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



# Dump of table Region
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Region`;

CREATE TABLE `Region` (
  `Region_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Region_Name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Region_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table SubCategory
# ------------------------------------------------------------

DROP TABLE IF EXISTS `SubCategory`;

CREATE TABLE `SubCategory` (
  `SubCategory_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Category_ID` int(11) DEFAULT NULL,
  `SubCategoryName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`SubCategory_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
