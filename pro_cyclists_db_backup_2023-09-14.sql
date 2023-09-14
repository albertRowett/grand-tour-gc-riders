# ************************************************************
# Sequel Ace SQL dump
# Version 20050
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 11.0.3-MariaDB-1:11.0.3+maria~ubu2204)
# Database: pro_cyclists
# Generation Time: 2023-09-14 15:25:02 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table nations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nations`;

CREATE TABLE `nations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nation` varchar(999) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `nations` WRITE;
/*!40000 ALTER TABLE `nations` DISABLE KEYS */;

INSERT INTO `nations` (`id`, `nation`)
VALUES
	(1,'Slovenia'),
	(2,'Great Britain'),
	(3,'Portugal'),
	(4,'Denmark'),
	(8,'Spain'),
	(9,'Ecuador'),
	(10,'Colombia'),
	(11,'Italy'),
	(12,'Australia'),
	(13,'Belgium'),
	(14,'Russia'),
	(19,'test');

/*!40000 ALTER TABLE `nations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table riders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `riders`;

CREATE TABLE `riders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(999) NOT NULL,
  `image` varchar(999) NOT NULL,
  `team_id` tinyint(4) NOT NULL,
  `nation_id` tinyint(4) NOT NULL,
  `dob` date NOT NULL,
  `giro_gc` tinyint(4) DEFAULT NULL,
  `tour_gc` tinyint(4) DEFAULT NULL,
  `vuelta_gc` tinyint(4) DEFAULT NULL,
  `giro_stages` tinyint(4) DEFAULT NULL,
  `tour_stages` tinyint(4) DEFAULT NULL,
  `vuelta_stages` tinyint(4) DEFAULT NULL,
  `retired` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `riders` WRITE;
/*!40000 ALTER TABLE `riders` DISABLE KEYS */;

INSERT INTO `riders` (`id`, `name`, `image`, `team_id`, `nation_id`, `dob`, `giro_gc`, `tour_gc`, `vuelta_gc`, `giro_stages`, `tour_stages`, `vuelta_stages`, `retired`)
VALUES
	(33,'Primož Roglič','https://www.procyclingstats.com/images/riders/bp/cc/primoz-roglic-2023.jpg',1,1,'1989-10-29',1,0,3,4,3,12,0),
	(34,'Geraint Thomas','https://www.procyclingstats.com/images/riders/bp/dd/geraint-thomas-2023-n2.png',2,2,'1986-05-25',0,1,0,0,3,0,0),
	(35,'João Almeida','https://www.procyclingstats.com/images/riders/bp/fa/joao-almeida-2023.jpeg',3,3,'1998-08-05',0,0,0,1,0,0,0),
	(36,'Jonas Vingegaard','https://www.procyclingstats.com/images/riders/bp/ea/jonas-vingegaard-rasmussen-2023.jpg',1,4,'1996-12-10',0,2,0,0,3,2,0),
	(37,'Tadej Pogačar','https://www.procyclingstats.com/images/riders/bp/dc/tadej-pogacar-2023.jpeg',3,1,'1998-09-21',0,2,0,0,11,3,0),
	(38,'Adam Yates','https://www.procyclingstats.com/images/riders/bp/df/adam-yates-2023.jpeg',3,2,'1992-08-07',0,0,0,0,1,0,0),
	(39,'t','t',1,1,'2010-10-20',0,0,0,0,0,0,0);

/*!40000 ALTER TABLE `riders` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table teams
# ------------------------------------------------------------

DROP TABLE IF EXISTS `teams`;

CREATE TABLE `teams` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `team` varchar(999) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;

INSERT INTO `teams` (`id`, `team`)
VALUES
	(1,'Jumbo-Visma'),
	(2,'INEOS Grenadiers'),
	(3,'UAE Team Emirates'),
	(9,'Movistar'),
	(10,'EF Education-EasyPost'),
	(11,'Bahrain - Victorious'),
	(12,'BORA - hansgrohe'),
	(13,'Soudal - Quick Step'),
	(14,'Astana Qazaqstan'),
	(15,'Medellín - EPM'),
	(17,'Jayco AlUla'),
	(21,'AG2R Citroën'),
	(22,'test');

/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
