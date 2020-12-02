-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for malasakitdb
CREATE DATABASE IF NOT EXISTS `malasakitdb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `malasakitdb`;

-- Dumping structure for table malasakitdb.budget
CREATE TABLE IF NOT EXISTS `budget` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `amount` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table malasakitdb.budget: ~0 rows (approximately)
/*!40000 ALTER TABLE `budget` DISABLE KEYS */;
INSERT INTO `budget` (`id`, `amount`) VALUES
	(1, 969315.2);
/*!40000 ALTER TABLE `budget` ENABLE KEYS */;

-- Dumping structure for table malasakitdb.budget_history
CREATE TABLE IF NOT EXISTS `budget_history` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `amount` int(12) unsigned NOT NULL DEFAULT '0',
  `date` varchar(50) NOT NULL DEFAULT '0',
  `accountable` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table malasakitdb.budget_history: ~0 rows (approximately)
/*!40000 ALTER TABLE `budget_history` DISABLE KEYS */;
INSERT INTO `budget_history` (`id`, `amount`, `date`, `accountable`) VALUES
	(1, 1000000, '2020-12-01', 'Ariane Pearl D. Galicia');
/*!40000 ALTER TABLE `budget_history` ENABLE KEYS */;

-- Dumping structure for table malasakitdb.listofavailment
CREATE TABLE IF NOT EXISTS `listofavailment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(10) unsigned DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `admissiondate` varchar(50) DEFAULT NULL,
  `amount` varchar(50) DEFAULT NULL,
  `purpose` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `firstavailment` varchar(50) DEFAULT NULL,
  `dateofavailment` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT ' ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- Dumping data for table malasakitdb.listofavailment: ~12 rows (approximately)
/*!40000 ALTER TABLE `listofavailment` DISABLE KEYS */;
INSERT INTO `listofavailment` (`id`, `client_id`, `user`, `admissiondate`, `amount`, `purpose`, `remarks`, `firstavailment`, `dateofavailment`, `status`) VALUES
	(1, 1, 'Hazel Martinez Recto', '2020-11-29', '6100.00', 'MEDICAL ASSISTANCE', 'REACH AMOUNT (HAZEL M. RECTO)', 'SOCIAL SERVICE', '2020-12-01', ''),
	(2, 2, 'Sarah Jane F. Novela-Dolot', '2020-12-01', '762', 'MEDICAL ASSISTANCE', 'CERTIFICATE OF INDIGENCY (SJ)', 'SOCIAL SERVICE', '2020-12-01', ''),
	(3, 3, 'Mela Geronilla-Duka', '2020-11-26', '3342.80', 'MEDICINES AND SUPPLIES', 'LACKING RESIDENCE CERT.', 'SOCIAL SERVICE', '2020-12-01', ''),
	(4, 4, 'Rosalle Tereen Maie V. Donor', '2020-11-29', '120', 'MEDICINES', 'CERTIFICATE OF INDIGENCY', 'SOCIAL SERVICE', '2020-12-01', ''),
	(5, 5, 'Ronarie S. Saja', '2020-12-01', '3148.00', 'SUPPLIES', 'CERT. OF INDIGENCY (REACHED AMOUNT)', 'SOCIAL SERVICE', '2020-12-01', ''),
	(6, 6, 'Joshua M. Resurreccion', '2020-11-27', '509', 'MEDICINES', '', 'SOCIAL SERVICE', '2020-12-01', ''),
	(8, 8, 'Jean L. Jacob', '2020-11-30', '000', 'MEDICAL ASSISTANCE', 'CEDULA, CERTIFICATE OF INDIGENCY, (JEAN L. JACOB)', 'SOCIAL SERVICE', '2020-12-02', ''),
	(10, 10, 'Camille Ann G. Fuentes', '2020-11-17', '2510.00', 'MEDICAL ASSISTANCE', 'CERTIFICATE OF INDIGENCY', 'SOCIAL SERVICE', '2020-12-02', ''),
	(12, 7, 'Camille Ann G. Fuentes', '2020-12-02', '2100', 'MEDICINES', 'BARANGAY INDIGENCY (CAMILLE ANN G. FUENTES)', 'SOCIAL SERVICE', '2020-12-02', ''),
	(16, 9, 'Camille Ann G. Fuentes', '2020-12-02', '4253.00', 'MEDICAL ASSISTANCE', 'INDIGENCY/CEDULA(CAMILLE ANN FUENTES)', 'SOCIAL SERVICE', '2020-12-02', ''),
	(17, 11, 'Hazel Martinez Recto', '2020-11-27', '1000', 'MEDICAL ASSISTANCE', 'TO SUBMIT BRGY. INDIGENCY ', 'SOCIAL SERVICE', '2020-12-02', ' '),
	(27, 2, 'Hazel Martinez Recto', '2020-12-01', '210', 'MEDICAL ASSISTANCE', 'COI', '', '2020-12-02', ' ');
/*!40000 ALTER TABLE `listofavailment` ENABLE KEYS */;

-- Dumping structure for table malasakitdb.logs
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(50) NOT NULL,
  `action` varchar(255) NOT NULL,
  `user` varchar(50) NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table malasakitdb.logs: ~20 rows (approximately)
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` (`id`, `date`, `action`, `user`) VALUES
	(1, '12-02-2020 02:53am', 'Logged in', 'Admin'),
	(2, '12-02-2020 02:56am', 'Logged out', 'Admin'),
	(3, '12-02-2020 02:59am', 'Logged in', 'Camille Ann G. Fuentes'),
	(4, '12-02-2020 03:00am', 'Logged out', 'Camille Ann G. Fuentes'),
	(5, '12-02-2020 03:03am', 'Logged in', 'Admin'),
	(6, '12-02-2020 03:04am', 'Logged in', 'Admin'),
	(7, '12-02-2020 03:22am', 'Logged out', 'Sarah Jane F. Novela-Dolot'),
	(8, '12-02-2020 03:37am', 'Logged out', 'Jean L. Jacob'),
	(9, '12-02-2020 03:42am', 'Logged in', 'Hazel Martinez Recto'),
	(10, '12-02-2020 03:45am', 'Logged in', 'Camille Ann G. Fuentes'),
	(11, '12-02-2020 04:41am', 'Logged in', 'Jean L. Jacob'),
	(12, '12-02-2020 04:42am', 'Change data of Availment with ID 8 from Remarks CEDULA, CERTIFICATE OF INDIGENCY (JEAN L. JACOB) to CEDULA, CERTIFICATE OF INDIGENCY, MEDICAL ABSTRACT (JEAN L. JACOB), ', 'Jean L. Jacob'),
	(13, '12-02-2020 04:42am', 'Change data of Availment with ID 8 from Remarks CEDULA, CERTIFICATE OF INDIGENCY, MEDICAL ABSTRACT (JEAN L. JACOB) to CEDULA, CERTIFICATE OF INDIGENCY, (JEAN L. JACOB), ', 'Jean L. Jacob'),
	(14, '12-02-2020 04:44am', 'Logged out', 'Jean L. Jacob'),
	(15, '12-02-2020 12:58pm', 'Logged in', 'Admin'),
	(16, '12-02-2020 12:58pm', 'Logged out', 'Admin'),
	(17, '12-02-2020 01:46pm', 'Add new Patient GABAD, JAYSON  BELO with Client GABAD, ESTRELLA', 'Hazel Martinez Recto'),
	(18, '12-02-2020 02:36pm', 'Logged in', 'Sarah Jane F. Novela-Dolot'),
	(19, '12-02-2020 02:47pm', 'Add new Availment for patient AGUIRRE, CONSOLACION SICAD with ID 2 amounting to 210', 'Hazel Martinez Recto'),
	(20, '12-02-2020 02:48pm', 'Add new Availment for patient AGUIRRE, CONSOLACION SICAD with ID 2 amounting to 210', 'Hazel Martinez Recto');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;

-- Dumping structure for view malasakitdb.remaining_balance
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `remaining_balance` (
	`balance` DOUBLE NULL
) ENGINE=MyISAM;

-- Dumping structure for table malasakitdb.tbl_client
CREATE TABLE IF NOT EXISTS `tbl_client` (
  `id` int(24) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `fullname_client` varchar(255) NOT NULL,
  `age` int(12) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `client_admission` varchar(50) DEFAULT NULL,
  `address` varchar(50) NOT NULL,
  `birthdate` varchar(50) NOT NULL,
  `requirements` varchar(255) NOT NULL,
  `patient_status` varchar(50) DEFAULT NULL,
  `accountable` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table malasakitdb.tbl_client: ~9 rows (approximately)
/*!40000 ALTER TABLE `tbl_client` DISABLE KEYS */;
INSERT INTO `tbl_client` (`id`, `fullname`, `fullname_client`, `age`, `gender`, `client_admission`, `address`, `birthdate`, `requirements`, `patient_status`, `accountable`) VALUES
	(1, 'LIWANAG, ANTONIO ACUIN', 'LIWANAG, CATHERINE ACUIN', 29, 'Male', '2020-11-29', 'BURABOD (POB.), SORSOGON CITY, SORSOGON', '1991-10-21', 'VALID ID,MEDICAL CERTIFICATE, CERTIFICATE OF INDIGENCY', '', 'Hazel Martinez Recto'),
	(2, 'AGUIRRE, CONSOLACION SICAD', 'AGUIRRE, MARICEL SICAD', 72, 'Female', '2020-12-01', 'BUENAVISTA, SORSOGON CITY', '1948-12-05', 'MEDICAL ABSTRACT, VALID ID', '', 'Sarah Jane F. Novela-Dolot'),
	(3, 'BERJUEGA, RENAN AVILA', 'ABIER,RENE', 31, 'Male', '2020-11-26', 'PANGPANG,SORSOGON CITY', '1989-08-23', 'MEDICAL CERTIFICATE, CERTIFICATE OF INDIGENCY', NULL, 'Mela Geronilla-Duka'),
	(4, 'GAURINO, JEANNY GALVE', 'GAURINO, JAMES FULO', 35, 'Female', '2020-11-29', 'SAN VICENTE, BULUSAN, SORSOGON', '1985-06-28', 'VALID ID, MEDICAL ABSTRACT', NULL, 'Rosalle Tereen Maie V. Donor'),
	(5, 'ERVAS, KRISTINE JOY LAZARTE', 'ERVAS, RAFAEL FERRERAS JR.', 26, 'Female', '2020-12-01', 'PANGANIBAN, GUBAT SORSOGON ', '1994-03-02', 'VALID ID, MEDICAL CERTIFICATE', NULL, 'Ronarie S. Saja'),
	(6, 'ESCARCHA, RUBEN', 'DE VERA, JENNIFER', 43, 'Female', '2020-11-27', 'Carriedo, Gubat, Sorsogon', '1977-10-10', '', NULL, 'Joshua M. Resurreccion'),
	(7, 'BATAS, PATRICIA ELLA MAY', 'ESPARRAGO, RENZ ESCANDOR', 19, 'Male', '2020-12-02', 'BAGACAY, GUBAT, SORSOGON', '2001-01-02', 'MEDICAL ABSTRACT, CEDULA', '', 'Camille Ann G. Fuentes'),
	(8, 'MARCHAN, JERWIN ASUNCION', 'PRIETO, REGENNE LAGAJINO', 29, 'Male', '2020-11-30', 'BUHATAN, SORSOGON CITY, SORSOGON', '1991-09-12', 'CERTIFICATE OF INDIGENCY, MEDICAL ABSTRACT, CEDULA', '', 'Jean L. Jacob'),
	(9, 'MANAHAN, BELINDA ', 'DELIN, MARCO GABITO', 30, '', '2020-12-02', 'SAN PEDRO, IROSIN, SORSOGON', '1990-04-20', 'VALID ID, MEDICAL CERTIFICATE, ', NULL, 'Camille Ann G. Fuentes'),
	(10, 'ESPEÃ‘O, ROSIE ESTRABILLA', 'ESPEÃ‘O, ROSIE ESTRABILLA', 46, 'Female', '2020-11-17', 'BURGOS, CASIGURAN, SORSOGON', '1974-04-01', 'VALID ID, MEDICAL ABSTRACT', '', 'Camille Ann G. Fuentes'),
	(11, 'GABAD, JAYSON  BELO', 'GABAD, ESTRELLA', 39, '', NULL, 'POBLACION III, STA. MAGDALENA, SORSOGON', '1981-02-11', 'VALID ID, MEDICAL CERTIFICATE, ', NULL, 'Hazel Martinez Recto');
/*!40000 ALTER TABLE `tbl_client` ENABLE KEYS */;

-- Dumping structure for table malasakitdb.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_fullname` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table malasakitdb.user: ~19 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `password`, `user_fullname`) VALUES
	(1, 'admin', 'admin', 'Admin'),
	(2, 'jrpana', 'joerand', 'Jose Randy S. Pana'),
	(3, 'sjndolot', '0214s', 'Sarah Jane F. Novela-Dolot'),
	(4, 'jjhainto', 'jj11', 'Janela Joven Hainto'),
	(5, 'hrecto', 'Hazel28@', 'Hazel Martinez Recto'),
	(6, '031999', 'mtmirabueno', 'Ma. Trina B. Mirabueno'),
	(7, 'mduka', 'alem', 'Mela Geronilla-Duka'),
	(8, 'icsalomon', 'june1998', 'Ivy Collin J. Salomon'),
	(9, 'fmmaquinana', 'iwmcvin', 'Flora M. Maquiñana'),
	(10, 'mcmirandilla', '122597', 'Ma. Christine N. Mirandilla'),
	(11, 'arianegalicia', 'galicia3028', 'Ariane Pearl D. Galicia'),
	(12, 'jepino', '041697', 'Jessica E. Epino'),
	(13, 'bimbsgoingo', 'throughtheyears', 'Maria Criselda D. Goingo'),
	(14, 'monette', '*963.', 'Monette L. Merciales'),
	(15, 'mcdaplin', '1208', 'Maria Conception'),
	(16, 'eals', '0329', 'Rosalle Tereen Maie V. Donor'),
	(17, 'rona', '*1423', 'Ronarie S. Saja'),
	(18, 'jjacob', '*1437', 'Jean L. Jacob'),
	(19, 'cafuentes', '15784268953', 'Camille Ann G. Fuentes'),
	(20, 'josh', 'qwerty', 'Joshua M. Resurreccion');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for view malasakitdb.view_clientinfo
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_clientinfo` (
	`id` INT(10) UNSIGNED NOT NULL,
	`client_id` INT(10) UNSIGNED NULL,
	`user` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`admissiondate` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`amount` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`purpose` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`remarks` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`firstavailment` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`dateofavailment` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`status` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`fullname` VARCHAR(255) NOT NULL COLLATE 'latin1_swedish_ci',
	`age` INT(12) NOT NULL,
	`gender` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`address` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`birthdate` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view malasakitdb.remaining_balance
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `remaining_balance`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `remaining_balance` AS SELECT SUM(amount) - IFNULL((SELECT SUM(amount) FROM listofavailment), 0) AS balance FROM budget_history ;

-- Dumping structure for view malasakitdb.view_clientinfo
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_clientinfo`;
CREATE ALGORITHM=TEMPTABLE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_clientinfo` AS SELECT a.*, b.fullname, b.age, b.gender, b.address, b.birthdate FROM listofavailment a, tbl_client b WHERE a.client_id = b.id ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
