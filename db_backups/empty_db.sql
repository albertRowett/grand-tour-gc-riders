# ************************************************************
# Sequel Ace SQL dump
# Version 20075
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 11.3.2-MariaDB-1:11.3.2+maria~ubu2204)
# Database: grand_tour_gc_riders
# Generation Time: 2025-01-16 08:35:54 +0000
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



# Dump of table riders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `riders`;

CREATE TABLE `riders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(999) NOT NULL,
  `image` varchar(999) NOT NULL,
  `team_id` int(4) unsigned NOT NULL,
  `nation_id` int(4) unsigned NOT NULL,
  `dob` date NOT NULL,
  `giro_gc` tinyint(4) unsigned NOT NULL,
  `tour_gc` tinyint(4) unsigned NOT NULL,
  `vuelta_gc` tinyint(4) unsigned NOT NULL,
  `giro_stages` tinyint(4) unsigned NOT NULL,
  `tour_stages` tinyint(4) unsigned NOT NULL,
  `vuelta_stages` tinyint(4) unsigned NOT NULL,
  `retired` tinyint(4) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



# Dump of table teams
# ------------------------------------------------------------

DROP TABLE IF EXISTS `teams`;

CREATE TABLE `teams` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `team` varchar(999) NOT NULL,
  `active` tinyint(4) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
