-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql306.infinityfree.com
-- Generation Time: Sep 22, 2025 at 09:52 AM
-- Server version: 11.4.7-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_39978713_grand_tour_gc_riders`
--

-- --------------------------------------------------------

--
-- Table structure for table `nations`
--

CREATE TABLE `nations` (
  `id` int(11) UNSIGNED NOT NULL,
  `nation` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nations`
--

INSERT INTO `nations` (`id`, `nation`) VALUES
(1, 'Slovenia'),
(2, 'Colombia'),
(3, 'Great Britain'),
(4, 'Denmark'),
(5, 'Belgium'),
(6, 'Australia'),
(7, 'Spain'),
(8, 'Portugal'),
(9, 'USA'),
(10, 'Ecuador'),
(11, 'Italy'),
(12, 'Netherlands'),
(13, 'France'),
(14, 'Austria'),
(15, 'South Africa'),
(16, 'Russia'),
(17, 'Germany'),
(18, 'Ireland'),
(21, 'Mexico'),
(22, 'Canada'),
(23, 'Norway');

-- --------------------------------------------------------

--
-- Table structure for table `riders`
--

CREATE TABLE `riders` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(999) NOT NULL,
  `image` varchar(999) NOT NULL,
  `team_id` int(4) UNSIGNED NOT NULL,
  `nation_id` int(4) UNSIGNED NOT NULL,
  `dob` date NOT NULL,
  `giro_gc` tinyint(4) UNSIGNED NOT NULL,
  `tour_gc` tinyint(4) UNSIGNED NOT NULL,
  `vuelta_gc` tinyint(4) UNSIGNED NOT NULL,
  `giro_stages` tinyint(4) UNSIGNED NOT NULL,
  `tour_stages` tinyint(4) UNSIGNED NOT NULL,
  `vuelta_stages` tinyint(4) UNSIGNED NOT NULL,
  `retired` tinyint(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riders`
--

INSERT INTO `riders` (`id`, `name`, `image`, `team_id`, `nation_id`, `dob`, `giro_gc`, `tour_gc`, `vuelta_gc`, `giro_stages`, `tour_stages`, `vuelta_stages`, `retired`) VALUES
(1, 'Tadej PogaÄar', 'https://www.procyclingstats.com/images/riders/bp/dc/tadej-pogacar-2025.jpg', 21, 1, '1998-09-21', 1, 4, 0, 6, 21, 3, 0),
(2, 'Daniel Felipe MartÃ­nez', 'https://www.procyclingstats.com/images/riders/bp/df/daniel-felipe-martinez-2025.jpg', 2, 2, '1996-04-25', 0, 0, 0, 0, 1, 0, 0),
(3, 'Geraint Thomas', 'https://www.procyclingstats.com/images/riders/nq/em/geraint-thomas-2025-n2.png', 3, 3, '1986-05-25', 0, 1, 0, 0, 3, 0, 0),
(4, 'Jonas Vingegaard', 'https://www.procyclingstats.com/images/riders/bp/ea/jonas-vingegaard-2025.png', 4, 4, '1996-12-10', 0, 2, 1, 0, 4, 5, 0),
(5, 'Remco Evenepoel', 'https://www.procyclingstats.com/images/riders/bp/aa/remco-evenepoel-2025.jpeg', 5, 5, '2000-01-25', 0, 0, 1, 2, 2, 5, 0),
(6, 'PrimoÅ¾ RogliÄ', 'https://www.procyclingstats.com/images/riders/bp/cc/primoz-roglic-2025.jpg', 2, 1, '1989-10-29', 1, 0, 4, 4, 3, 15, 0),
(7, 'Ben O\'Connor', 'https://www.procyclingstats.com/images/riders/bp/ee/ben-o-connor-2025.jpeg', 10, 6, '1995-11-25', 0, 0, 0, 1, 2, 1, 0),
(8, 'Enric Mas', 'https://www.procyclingstats.com/images/riders/bp/ea/enric-mas-2025.jpg', 7, 7, '1995-01-07', 0, 0, 0, 0, 0, 1, 0),
(9, 'JoÃ£o Almeida', 'https://www.procyclingstats.com/images/riders/bp/fa/joao-almeida-2025.jpg', 21, 8, '1998-08-05', 0, 0, 0, 1, 0, 1, 0),
(10, 'Adam Yates', 'https://www.procyclingstats.com/images/riders/bp/df/adam-yates-2025.jpg', 21, 3, '1992-08-07', 0, 0, 0, 0, 1, 1, 0),
(11, 'Sepp Kuss', 'https://www.procyclingstats.com/images/riders/bp/bf/sepp-kuss-2025.png', 4, 9, '1994-09-13', 0, 0, 1, 0, 1, 2, 0),
(12, 'Jai Hindley', 'https://www.procyclingstats.com/images/riders/bp/aa/jai-hindley-2025.jpg', 2, 6, '1996-05-05', 1, 0, 0, 2, 1, 0, 0),
(13, 'Richard Carapaz', 'https://www.procyclingstats.com/images/riders/bp/aa/richard-carapaz-2025.jpg', 8, 10, '1993-05-29', 1, 0, 0, 4, 1, 3, 0),
(14, 'Mikel Landa', 'https://www.procyclingstats.com/images/riders/bp/bf/mikel-landa-2025.jpeg', 5, 7, '1989-12-13', 0, 0, 0, 3, 0, 1, 0),
(15, 'Juan Ayuso', 'https://www.procyclingstats.com/images/riders/bp/ac/juan-ayuso-pesquera-2025.jpg', 21, 7, '2002-09-16', 0, 0, 0, 1, 0, 2, 0),
(16, 'Egan Bernal', 'https://www.procyclingstats.com/images/riders/rt/em/egan-bernal-2025-n2.png', 3, 2, '1997-01-13', 1, 1, 0, 2, 0, 1, 0),
(17, 'Damiano Caruso', 'https://www.procyclingstats.com/images/riders/bp/fd/damiano-caruso-2025.jpeg', 9, 11, '1987-10-12', 0, 0, 0, 1, 0, 1, 0),
(18, 'Simon Yates', 'https://www.procyclingstats.com/images/riders/bp/bc/simon-yates-2025.png', 4, 3, '1992-08-07', 1, 0, 1, 6, 3, 2, 0),
(19, 'Jack Haig', 'https://www.procyclingstats.com/images/riders/bp/cb/jack-haig-2025.jpeg', 9, 6, '1993-09-06', 0, 0, 0, 0, 0, 0, 0),
(20, 'Tao Geoghegan Hart', 'https://www.procyclingstats.com/images/riders/bp/db/tao-geoghegan-hart-2025.jpeg', 11, 3, '1995-03-30', 1, 0, 0, 2, 0, 0, 0),
(21, 'Wilco Kelderman', 'https://www.procyclingstats.com/images/riders/bp/fe/wilco-kelderman-2025-n2.png', 4, 12, '1991-03-25', 0, 0, 0, 0, 0, 0, 0),
(22, 'Richie Porte', 'https://www.procyclingstats.com/images/riders/bp/ab/richie-porte-2022.jpeg', 3, 6, '1985-01-30', 0, 0, 0, 0, 0, 0, 1),
(23, 'Hugh Carthy', 'https://www.procyclingstats.com/images/riders/bp/be/hugh-carthy-2025.jpg', 8, 3, '1994-07-09', 0, 0, 0, 0, 0, 1, 0),
(24, 'Antonio Tiberi', 'https://www.procyclingstats.com/images/riders/bp/bd/antonio-tiberi-2025.jpeg', 9, 11, '2001-06-24', 0, 0, 0, 0, 0, 0, 0),
(25, 'Thymen Arensman', 'https://www.procyclingstats.com/images/riders/rt/em/thymen-arensman-2025-n2.png', 3, 12, '1999-12-04', 0, 0, 0, 0, 2, 1, 0),
(26, 'Einer Rubio', 'https://www.procyclingstats.com/images/riders/bp/bd/einer-rubio-2025.jpg', 7, 2, '1998-02-22', 0, 0, 0, 1, 0, 0, 0),
(27, 'Romain Bardet', 'https://www.procyclingstats.com/images/riders/bp/fb/romain-bardet-2025.jpeg', 22, 13, '1990-11-09', 0, 0, 0, 0, 4, 1, 1),
(28, 'Michael Storer', 'https://www.procyclingstats.com/images/riders/bp/bf/michael-storer-2025.jpg', 13, 6, '1997-02-28', 0, 0, 0, 0, 0, 2, 0),
(29, 'Nairo Quintana', 'https://www.procyclingstats.com/images/riders/bp/ba/nairo-quintana-2025.jpg', 7, 2, '1990-02-04', 1, 0, 1, 3, 3, 2, 0),
(31, 'Carlos RodrÃ­guez', 'https://www.procyclingstats.com/images/riders/nq/em/carlos-rodriguez-cano-2025-n2.png', 3, 7, '2001-02-02', 0, 0, 0, 0, 1, 0, 0),
(32, 'Matteo Jorgenson', 'https://www.procyclingstats.com/images/riders/bp/df/matteo-jorgenson-2025.png', 4, 9, '1999-07-01', 0, 0, 0, 0, 0, 0, 0),
(33, 'Santiago Buitrago', 'https://www.procyclingstats.com/images/riders/bp/ed/santiago-buitrago-sanchez-2025.jpg', 9, 2, '1999-09-26', 0, 0, 0, 2, 0, 0, 0),
(34, 'Guillaume Martin', 'https://www.procyclingstats.com/images/riders/bp/ae/guillaume-martin-2025.jpeg', 17, 13, '1993-06-09', 0, 0, 0, 0, 0, 0, 0),
(35, 'Giulio Ciccone', 'https://www.procyclingstats.com/images/riders/bp/ac/giulio-ciccone-2025.png', 11, 11, '1994-12-20', 0, 0, 0, 3, 0, 0, 0),
(36, 'Felix Gall', 'https://www.procyclingstats.com/images/riders/bp/fa/felix-gall-2025.jpg', 6, 14, '1998-02-27', 0, 0, 0, 0, 1, 0, 0),
(37, 'Louis Meintjes', 'https://www.procyclingstats.com/images/riders/bp/ca/louis-meintjes-2025.jpg', 16, 15, '1992-02-21', 0, 0, 0, 0, 0, 1, 0),
(38, 'Mattias Skjelmose', 'https://www.procyclingstats.com/images/riders/bp/fb/mattias-skjelmose-jensen-2025.jpeg', 11, 4, '2000-09-26', 0, 0, 0, 0, 0, 0, 0),
(39, 'Aleksandr Vlasov', 'https://www.procyclingstats.com/images/riders/bp/ae/aleksandr-vlasov-2025.jpg', 2, 16, '1996-04-23', 0, 0, 0, 0, 0, 0, 0),
(40, 'David Gaudu', 'https://www.procyclingstats.com/images/riders/bp/df/david-gaudu-2025.jpeg', 17, 13, '1996-10-10', 0, 0, 0, 0, 0, 3, 0),
(41, 'Florian Lipowitz', 'https://www.procyclingstats.com/images/riders/bp/ce/florian-lipowitz-2025.jpg', 2, 17, '2000-09-21', 0, 0, 0, 0, 0, 0, 0),
(42, 'Pavel Sivakov', 'https://www.procyclingstats.com/images/riders/bp/da/pavel-sivakov-2025.jpg', 21, 13, '1997-07-11', 0, 0, 0, 0, 0, 0, 0),
(43, 'Eddie Dunbar', 'https://www.procyclingstats.com/images/riders/bp/da/edward-irl-dunbar-2025.jpeg', 10, 18, '1996-09-01', 0, 0, 0, 0, 0, 2, 0),
(44, 'Vincenzo Nibali', 'https://www.procyclingstats.com/images/riders/bp/ea/vincenzo-nibali-2022.jpeg', 19, 11, '1984-11-14', 2, 1, 1, 7, 6, 0, 1),
(45, 'Alejandro Valverde', 'https://www.procyclingstats.com/images/riders/bp/ee/alejandro-valverde-2022.jpeg', 7, 7, '1980-04-25', 0, 0, 1, 1, 4, 12, 1),
(46, 'Pello Bilbao', 'https://www.procyclingstats.com/images/riders/bp/ff/pello-bilbao-2025.jpeg', 9, 7, '1990-02-25', 0, 0, 0, 2, 1, 0, 0),
(47, 'Ion Izagirre', 'https://www.procyclingstats.com/images/riders/bp/bf/ion-izagirre-2025.jpeg', 15, 7, '1989-02-04', 0, 0, 0, 1, 2, 1, 0),
(48, 'Lennard KÃ¤mna', 'https://www.procyclingstats.com/images/riders/bp/ad/lennard-kamna-2025.jpeg', 11, 17, '1996-09-09', 0, 0, 0, 1, 1, 1, 0),
(49, 'Cian Uijtdebroeks', 'https://www.procyclingstats.com/images/riders/bp/ed/cian-uijtdebroeks-2025.png', 4, 5, '2003-02-28', 0, 0, 0, 0, 0, 0, 0),
(50, 'Marc Soler', 'https://www.procyclingstats.com/images/riders/bp/bd/marc-soler-2025.jpg', 21, 7, '1993-11-22', 0, 0, 0, 0, 0, 4, 0),
(51, 'Jay Vine', 'https://www.procyclingstats.com/images/riders/bp/fa/jay-vine-2025.jpg', 21, 6, '1995-11-16', 0, 0, 0, 0, 0, 4, 0),
(52, 'Brandon McNulty', 'https://www.procyclingstats.com/images/riders/bp/ec/brandon-mcnulty-2025.jpg', 21, 9, '1998-04-02', 0, 0, 0, 1, 0, 1, 0),
(53, 'Chris Froome', 'https://www.procyclingstats.com/images/riders/bp/ba/christopher-froome-2025.jpg', 20, 3, '1985-05-20', 1, 4, 2, 2, 7, 5, 0),
(56, 'Tom Dumoulin', 'https://www.procyclingstats.com/images/riders/bp/bd/tom-dumoulin-2022.jpeg', 23, 12, '1990-11-11', 1, 0, 0, 4, 3, 2, 1),
(57, 'Isaac del Toro', 'https://www.procyclingstats.com/images/riders/bp/ff/isaac-del-toro-2025.jpg', 21, 21, '2003-11-27', 0, 0, 0, 1, 0, 0, 0),
(58, 'Derek Gee', 'https://www.procyclingstats.com/images/riders/bp/bd/derek-gee-2025-n2.jpg', 20, 22, '1997-08-03', 0, 0, 0, 0, 0, 0, 0),
(59, 'Giulio Pellizzari', 'https://www.procyclingstats.com/images/riders/bp/be/giulio-pellizzari-2025.jpg', 2, 11, '2003-11-21', 0, 0, 0, 0, 0, 1, 0),
(60, 'Oscar Onley', 'https://www.procyclingstats.com/images/riders/bp/ee/oscar-onley-2025.jpeg', 22, 3, '2002-10-13', 0, 0, 0, 0, 0, 0, 0),
(61, 'Tobias Halland Johannessen', 'https://www.procyclingstats.com/images/riders/bp/ab/tobias-halland-johannessen-2025.jpg', 24, 23, '1999-08-23', 0, 0, 0, 0, 0, 0, 0),
(62, 'KÃ©vin Vauquelin', 'https://www.procyclingstats.com/images/riders/bp/fe/kevin-vauquelin-2025.jpeg', 25, 13, '2001-04-26', 0, 0, 0, 0, 1, 0, 0),
(63, 'Ben Healy', 'https://www.procyclingstats.com/images/riders/bp/dc/ben-healy-2025.jpg', 8, 18, '2000-09-11', 0, 0, 0, 1, 1, 0, 0),
(64, 'Jordan Jegat', 'https://www.procyclingstats.com/images/riders/bp/bc/jordan-jegat-2025-n2.png', 26, 13, '1999-06-07', 0, 0, 0, 0, 0, 0, 0),
(65, 'Thomas Pidcock', 'https://www.procyclingstats.com/images/riders/bp/ec/thomas-pidcock-2025.jpg', 27, 3, '1999-07-30', 0, 0, 0, 0, 1, 0, 0),
(66, 'Matthew Riccitello', 'https://www.procyclingstats.com/images/riders/bp/ae/matthew-riccitello-2025.jpg', 20, 9, '2002-03-05', 0, 0, 0, 0, 0, 0, 0),
(67, 'Torstein TrÃ¦en', 'https://www.procyclingstats.com/images/riders/bp/ef/torstein-traeen-2025.jpeg', 9, 23, '1995-07-16', 0, 0, 0, 0, 0, 0, 0),
(68, 'Junior Lecerf', 'https://www.procyclingstats.com/images/riders/bp/ab/william-junior-lecerf-2025.jpeg', 5, 5, '2002-10-15', 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) UNSIGNED NOT NULL,
  `team` varchar(999) NOT NULL,
  `active` tinyint(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `team`, `active`) VALUES
(1, 'UAE Emirates', 0),
(2, 'Red Bull - BORA - hansgrohe', 1),
(3, 'INEOS Grenadiers', 1),
(4, 'Visma | Lease a Bike', 1),
(5, 'Soudal Quick-Step', 1),
(6, 'Decathlon AG2R La Mondiale', 1),
(7, 'Movistar', 1),
(8, 'EF Education - EasyPost', 1),
(9, 'Bahrain - Victorious', 1),
(10, 'Jayco AlUla', 1),
(11, 'Lidl - Trek', 1),
(12, 'dsm-firmenich PostNL', 0),
(13, 'Tudor Pro Cycling', 1),
(15, 'Cofidis', 1),
(16, 'IntermarchÃ© - Wanty', 1),
(17, 'Groupama - FDJ', 1),
(19, 'Astana Qazaqstan', 0),
(20, 'Israel - Premier Tech', 1),
(21, 'UAE Emirates - XRG', 1),
(22, 'Picnic PostNL', 1),
(23, 'Jumbo-Visma', 0),
(24, 'Uno-X Mobility', 1),
(25, 'ArkÃ©a - B&B Hotels', 1),
(26, 'TotalEnergies', 1),
(27, 'Q36.5 Pro Cycling', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nations`
--
ALTER TABLE `nations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riders`
--
ALTER TABLE `riders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nations`
--
ALTER TABLE `nations`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `riders`
--
ALTER TABLE `riders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
