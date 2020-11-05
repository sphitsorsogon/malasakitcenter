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
DROP DATABASE IF EXISTS `malasakitdb`;
CREATE DATABASE IF NOT EXISTS `malasakitdb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `malasakitdb`;

-- Dumping structure for table malasakitdb.budget
CREATE TABLE IF NOT EXISTS `budget` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `amount` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table malasakitdb.budget: ~0 rows (approximately)
DELETE FROM `budget`;
/*!40000 ALTER TABLE `budget` DISABLE KEYS */;
INSERT INTO `budget` (`id`, `amount`) VALUES
	(1, 5005.65);
/*!40000 ALTER TABLE `budget` ENABLE KEYS */;

-- Dumping structure for table malasakitdb.budget_history
CREATE TABLE IF NOT EXISTS `budget_history` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `amount` int(12) unsigned NOT NULL DEFAULT '0',
  `date` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table malasakitdb.budget_history: ~6 rows (approximately)
DELETE FROM `budget_history`;
/*!40000 ALTER TABLE `budget_history` DISABLE KEYS */;
INSERT INTO `budget_history` (`id`, `amount`, `date`) VALUES
	(2, 2000, '2020-11-05'),
	(3, 2000, '2020-11-06'),
	(4, 2000, '2020-11-05'),
	(5, 100, '2020-11-04'),
	(6, 2, '275760-09-12'),
	(7, 555, '2020-11-06');
/*!40000 ALTER TABLE `budget_history` ENABLE KEYS */;

-- Dumping structure for table malasakitdb.listofavailment
CREATE TABLE IF NOT EXISTS `listofavailment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(10) unsigned DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `admissiondate` varchar(50) DEFAULT NULL,
  `amount` varchar(50) DEFAULT NULL,
  `requirements` varchar(255) DEFAULT NULL,
  `purpose` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `firstavailment` varchar(50) DEFAULT NULL,
  `dateofavailment` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_listofavailment_client` (`client_id`),
  CONSTRAINT `FK_listofavailment_client` FOREIGN KEY (`client_id`) REFERENCES `tbl_client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table malasakitdb.listofavailment: ~5 rows (approximately)
DELETE FROM `listofavailment`;
/*!40000 ALTER TABLE `listofavailment` DISABLE KEYS */;
INSERT INTO `listofavailment` (`id`, `client_id`, `user`, `admissiondate`, `amount`, `requirements`, `purpose`, `remarks`, `firstavailment`, `dateofavailment`, `status`) VALUES
	(4, 1, 'Kenneth Solomon', '2020-11-05', '51.35', 'askdjask', 'jaksjdkasjd', 'kjasdkjk', 'jkasjdk', '2020-11-20', 'Complete'),
	(10, 2, 'Kenneth Solomon', '2020-11-05', '900', 'kasjdk', 'kasjdk', 'kasjdk', 'askdjkads', '2020-11-05', ''),
	(14, 4, 'Kenneth Solomon', '2020-11-05', '200', 'VALID ID, MED CERT, DERT INDIGENCY', 'MED ASSISTANCE', 'VALID ID', '', '', ''),
	(16, 1, 'Aldrin Huenda', '2020-11-05', '300', 'VALID ID', 'MED ASSISTANCE', 'COMPLETE', 'MC', '2020-11-06', ''),
	(18, 1, 'Aldrin Huenda', '2020-11-05', '200', '', '', '', '', '2020-11-05', '');
/*!40000 ALTER TABLE `listofavailment` ENABLE KEYS */;

-- Dumping structure for view malasakitdb.remaining_balance
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `remaining_balance` (
	`balance` DOUBLE NULL
) ENGINE=MyISAM;

-- Dumping structure for table malasakitdb.tbl_client
CREATE TABLE IF NOT EXISTS `tbl_client` (
  `id` int(24) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `age` int(12) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `birthdate` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table malasakitdb.tbl_client: ~5 rows (approximately)
DELETE FROM `tbl_client`;
/*!40000 ALTER TABLE `tbl_client` DISABLE KEYS */;
INSERT INTO `tbl_client` (`id`, `fullname`, `age`, `gender`, `address`, `birthdate`) VALUES
	(1, 'Kenneth Lim Solomon', 123, 'Male', 'Seabreeze', '2020-11-20'),
	(2, 'Solomon', 213, 'Male', 'Seabreeze', '2020-11-04'),
	(4, 'Renz Fuedan', 123, 'Female', '123123', '2018-12-31'),
	(5, 'qwkeqke', 123, 'Female', 'qweq', '275760-03-21');
/*!40000 ALTER TABLE `tbl_client` ENABLE KEYS */;

-- Dumping structure for table malasakitdb.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_fullname` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table malasakitdb.user: ~1 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `password`, `user_fullname`) VALUES
	(1, 'admin', 'admin', 'Kenneth Solomon'),
	(2, 'test', 'test', 'Aldrin Huenda');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for view malasakitdb.view_clientinfo
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_clientinfo` (
	`id` INT(10) UNSIGNED NOT NULL,
	`client_id` INT(10) UNSIGNED NULL,
	`user` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`admissiondate` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`amount` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`requirements` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
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
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `remaining_balance` AS SELECT SUM(amount) - (SELECT SUM(amount) FROM listofavailment) AS balance FROM budget_history ;

-- Dumping structure for view malasakitdb.view_clientinfo
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_clientinfo`;
CREATE ALGORITHM=TEMPTABLE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_clientinfo` AS SELECT a.*, b.fullname, b.age, b.gender, b.address, b.birthdate FROM listofavailment a, tbl_client b WHERE a.client_id = b.id ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
