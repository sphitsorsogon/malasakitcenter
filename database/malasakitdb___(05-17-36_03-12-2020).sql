SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
--
-- Database: `malasakitdb`
--




CREATE TABLE `budget` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `amount` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


INSERT INTO budget VALUES
("1","970325.2");




CREATE TABLE `budget_history` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `amount` int(12) unsigned NOT NULL DEFAULT '0',
  `date` varchar(50) NOT NULL DEFAULT '0',
  `accountable` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


INSERT INTO budget_history VALUES
("1","1000000","2020-12-01","Ariane Pearl D. Galicia");




CREATE TABLE `listofavailment` (
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;


INSERT INTO listofavailment VALUES
("1","1","Mela Geronilla-Duka","2020-11-29","6100.00","MEDICAL ASSISTANCE","REACH AMOUNT (HAZEL M. RECTO)","SOCIAL SERVICE","2020-12-01",""),
("2","2","Mela Geronilla-Duka","2020-12-01","762","MEDICAL ASSISTANCE","CERTIFICATE OF INDIGENCY (SJ)","SOCIAL SERVICE","2020-12-01",""),
("3","3","Mela Geronilla-Duka","2020-11-26","3342.80","MEDICINES AND SUPPLIES","LACKING RESIDENCE CERT.","SOCIAL SERVICE","2020-12-01",""),
("4","4","Mela Geronilla-Duka","2020-11-29","120","MEDICINES","CERTIFICATE OF INDIGENCY","SOCIAL SERVICE","2020-12-01",""),
("5","5","Mela Geronilla-Duka","2020-12-01","3148.00","SUPPLIES","CERT. OF INDIGENCY (REACHED AMOUNT)","SOCIAL SERVICE","2020-12-01",""),
("6","6","Mela Geronilla-Duka","2020-11-27","509","MEDICINES","","SOCIAL SERVICE","2020-12-01",""),
("8","8","Mela Geronilla-Duka","2020-11-30","000","MEDICAL ASSISTANCE","CEDULA, CERTIFICATE OF INDIGENCY, (JEAN L. JACOB)","SOCIAL SERVICE","2020-12-02",""),
("10","10","Mela Geronilla-Duka","2020-11-17","2510.00","MEDICAL ASSISTANCE","CERTIFICATE OF INDIGENCY","SOCIAL SERVICE","2020-12-02",""),
("12","7","Mela Geronilla-Duka","2020-12-02","2100","MEDICINES","","SOCIAL SERVICE","2020-12-02",""),
("16","9","Mela Geronilla-Duka","2020-12-02","4253.00","MEDICAL ASSISTANCE","INDIGENCY/CEDULA(CAMILLE ANN FUENTES)","SOCIAL SERVICE","2020-12-02",""),
("17","11","Mela Geronilla-Duka","2020-11-27","1000","MEDICAL ASSISTANCE","TO SUBMIT BRGY. INDIGENCY ","SOCIAL SERVICE","2020-12-02"," "),
("27","2","Hazel Martinez Recto","2020-12-01","210","MEDICAL ASSISTANCE","COI","","2020-12-02"," "),
("28","12","Mela Geronilla-Duka","2020-11-27","1500","MEDICAL ASSISTANCE","TO SUBMIT BRGY. INDIGENCY ","","2020-12-02"," "),
("29","13","Jean L. Jacob","2020-12-27","3400","LABORATORY","COMPLETEBVREQUIREMENTS","SOCIAL SERVICE","2020-12-03"," "),
("30","2","Jean L. Jacob","2020-12-01","720","LABORATORY","COMPLETE REQUIREMENTS","SOCIAL SERVICE","2020-12-03"," ");




CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(50) NOT NULL,
  `action` varchar(255) NOT NULL,
  `user` varchar(50) NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;


INSERT INTO logs VALUES
("1","12-02-2020 02:53am","Logged in","Admin"),
("2","12-02-2020 02:56am","Logged out","Admin"),
("3","12-02-2020 02:59am","Logged in","Camille Ann G. Fuentes"),
("4","12-02-2020 03:00am","Logged out","Camille Ann G. Fuentes"),
("5","12-02-2020 03:03am","Logged in","Admin"),
("6","12-02-2020 03:04am","Logged in","Admin"),
("7","12-02-2020 03:22am","Logged out","Sarah Jane F. Novela-Dolot"),
("8","12-02-2020 03:37am","Logged out","Jean L. Jacob"),
("9","12-02-2020 03:42am","Logged in","Hazel Martinez Recto"),
("10","12-02-2020 03:45am","Logged in","Camille Ann G. Fuentes"),
("11","12-02-2020 04:41am","Logged in","Jean L. Jacob"),
("12","12-02-2020 04:42am","Change data of Availment with ID 8 from Remarks CEDULA, CERTIFICATE OF INDIGENCY (JEAN L. JACOB) to CEDULA, CERTIFICATE OF INDIGENCY, MEDICAL ABSTRACT (JEAN L. JACOB), ","Jean L. Jacob"),
("13","12-02-2020 04:42am","Change data of Availment with ID 8 from Remarks CEDULA, CERTIFICATE OF INDIGENCY, MEDICAL ABSTRACT (JEAN L. JACOB) to CEDULA, CERTIFICATE OF INDIGENCY, (JEAN L. JACOB), ","Jean L. Jacob"),
("14","12-02-2020 04:44am","Logged out","Jean L. Jacob"),
("15","12-02-2020 12:58pm","Logged in","Admin"),
("16","12-02-2020 12:58pm","Logged out","Admin"),
("17","12-02-2020 01:46pm","Add new Patient GABAD, JAYSON  BELO with Client GABAD, ESTRELLA","Hazel Martinez Recto"),
("18","12-02-2020 02:36pm","Logged in","Sarah Jane F. Novela-Dolot"),
("19","12-02-2020 02:47pm","Add new Availment for patient AGUIRRE, CONSOLACION SICAD with ID 2 amounting to 210","Hazel Martinez Recto"),
("20","12-02-2020 02:48pm","Add new Availment for patient AGUIRRE, CONSOLACION SICAD with ID 2 amounting to 210","Hazel Martinez Recto"),
("21","12-02-2020 02:56pm","Add new Patient LAGCO, ALVIN JOSEPH GREGORIO with Client LAGCO, MARK JASON GREGORIO","Hazel Martinez Recto"),
("22","12-02-2020 03:01pm","Add new Availment for patient LAGCO, ALVIN JOSEPH GREGORIO with ID 12 amounting to 1500","Hazel Martinez Recto"),
("23","12-02-2020 03:02pm","Logged in","Joan J. Espinola"),
("24","12-02-2020 03:02pm","Logged out","Joan J. Espinola"),
("25","12-02-2020 03:02pm","Logged in","Joan J. Espinola"),
("26","12-02-2020 03:08pm","Change data of Patient with ID 1 from Patient Name LIWANAG, ANTONIO ACUIN to LIWANAG, ANTONIO JR ACUIN, ","Joan J. Espinola"),
("27","12-02-2020 03:09pm","Change data of Patient with ID 1 from Patient Status  to Discharged, ","Joan J. Espinola"),
("28","12-02-2020 04:20pm","Logged out","Sarah Jane F. Novela-Dolot"),
("29","12-02-2020 04:23pm","Logged in","Mela Geronilla-Duka"),
("30","12-02-2020 04:38pm","Logged in","Joan J. Espinola"),
("31","12-02-2020 08:36pm","Logged in","Mela Geronilla-Duka"),
("32","12-02-2020 08:36pm","Change data of Patient with ID 3 ","Mela Geronilla-Duka"),
("33","12-02-2020 08:40pm","Change data of Patient with ID 3 from Client Name ABIER,RENE to BALENGASA, ROWENA BERJUEGA, from Requirements MEDICAL CERTIFICATE, CERTIFICATE OF INDIGENCY to  CERTIFICATE OF INDIGENCY/RESIDENCE CERTIFICATE, ","Mela Geronilla-Duka"),
("34","12-02-2020 08:44pm","Change data of Patient with ID 3 from Requirements  CERTIFICATE OF INDIGENCY/RESIDENCE CERTIFICATE to  MEDICAL CERTIFICATE, ","Mela Geronilla-Duka"),
("35","12-02-2020 08:45pm","Logged in","Joshua M. Resurreccion"),
("36","12-02-2020 08:46pm","Change data of Patient with ID 6 ","Joshua M. Resurreccion"),
("37","12-02-2020 08:46pm","Change data of Patient with ID 6 from Requirements  to medical abstract, valid id, certificate of indigency, ","Joshua M. Resurreccion"),
("38","12-02-2020 10:11pm","Logged out","Joshua M. Resurreccion"),
("39","12-03-2020 02:03am","Logged in","Ma. Christine N. Mirandilla"),
("40","12-03-2020 06:58am","Logged in","Jean L. Jacob"),
("41","12-03-2020 07:09am","Logged in","Janela Joven Hainto"),
("42","12-03-2020 07:20am","Logged out","Ma. Christine N. Mirandilla"),
("43","12-03-2020 08:16am","Logged out","Jean L. Jacob"),
("44","12-03-2020 08:16am","Logged in","Ma. Trina B. Mirabueno"),
("45","12-03-2020 08:16am","Logged out","Ma. Trina B. Mirabueno"),
("46","12-03-2020 08:16am","Logged in","Jean L. Jacob"),
("47","12-03-2020 09:47am","Logged in","Joan J. Espinola"),
("48","12-03-2020 10:44am","Logged in","Jean L. Jacob"),
("49","12-03-2020 11:05am","Logged out","Janela Joven Hainto"),
("50","12-03-2020 11:12am","Logged out","Joan J. Espinola"),
("51","12-03-2020 11:12am","Logged in","Joan J. Espinola"),
("52","12-03-2020 11:38am","Change data of Patient with ID 7 from Patient Status  to Discharged, ","Joan J. Espinola"),
("53","12-03-2020 11:40am","Change data of Patient with ID 7 from Requirements MEDICAL ABSTRACT, CEDULA to MEDICAL ABSTRACT, CEDULA,CERTICICATE OF INDIGENCY, ","Joan J. Espinola"),
("54","12-03-2020 11:40am","Change data of Availment with ID 12 from Remarks BARANGAY INDIGENCY (CAMILLE ANN G. FUENTES) to , ","Joan J. Espinola"),
("55","12-03-2020 11:40am","Update Admission Date of Patient with ID 7 to 2020-12-02","Joan J. Espinola"),
("56","12-03-2020 11:44am","Add new Patient BAITAN, TERESITA DICEN with Client BAITAN, TRINIDAD DICEN","Jean L. Jacob"),
("57","12-03-2020 11:45am","Update Admission Date of Patient with ID 18 to 2020-12-27","Jean L. Jacob"),
("58","12-03-2020 11:45am","Add new Availment for patient BAITAN, TERESITA DICEN with ID 13 amounting to 3400","Jean L. Jacob"),
("59","12-03-2020 11:55am","Change data of Availment with ID 1 ","Mela Geronilla-Duka"),
("60","12-03-2020 11:55am","Update Availment Date of Patient with Availment ID: 1 to SOCIAL SERVICE","Mela Geronilla-Duka"),
("61","12-03-2020 11:55am","Change data of Availment with ID 2 ","Mela Geronilla-Duka"),
("62","12-03-2020 11:55am","Update Availment Date of Patient with Availment ID: 2 to SOCIAL SERVICE","Mela Geronilla-Duka"),
("63","12-03-2020 11:55am","Change data of Availment with ID 3 ","Mela Geronilla-Duka"),
("64","12-03-2020 11:55am","Update Availment Date of Patient with Availment ID: 3 to SOCIAL SERVICE","Mela Geronilla-Duka"),
("65","12-03-2020 11:56am","Change data of Availment with ID 4 ","Mela Geronilla-Duka"),
("66","12-03-2020 11:56am","Update Availment Date of Patient with Availment ID: 4 to SOCIAL SERVICE","Mela Geronilla-Duka"),
("67","12-03-2020 11:56am","Change data of Availment with ID 5 ","Mela Geronilla-Duka"),
("68","12-03-2020 11:56am","Update Availment Date of Patient with Availment ID: 5 to SOCIAL SERVICE","Mela Geronilla-Duka"),
("69","12-03-2020 11:56am","Change data of Availment with ID 6 ","Mela Geronilla-Duka"),
("70","12-03-2020 11:56am","Update Availment Date of Patient with Availment ID: 6 to SOCIAL SERVICE","Mela Geronilla-Duka"),
("71","12-03-2020 11:56am","Change data of Availment with ID 12 ","Mela Geronilla-Duka"),
("72","12-03-2020 11:56am","Update Availment Date of Patient with Availment ID: 12 to SOCIAL SERVICE","Mela Geronilla-Duka"),
("73","12-03-2020 11:56am","Change data of Availment with ID 8 ","Mela Geronilla-Duka"),
("74","12-03-2020 11:56am","Update Availment Date of Patient with Availment ID: 8 to SOCIAL SERVICE","Mela Geronilla-Duka"),
("75","12-03-2020 11:56am","Change data of Patient with ID 9 ","Mela Geronilla-Duka"),
("76","12-03-2020 11:56am","Change data of Availment with ID 16 ","Mela Geronilla-Duka"),
("77","12-03-2020 11:56am","Update Availment Date of Patient with Availment ID: 16 to SOCIAL SERVICE","Mela Geronilla-Duka"),
("78","12-03-2020 11:57am","Change data of Availment with ID 10 ","Mela Geronilla-Duka"),
("79","12-03-2020 11:57am","Update Availment Date of Patient with Availment ID: 10 to SOCIAL SERVICE","Mela Geronilla-Duka"),
("80","12-03-2020 11:57am","Change data of Availment with ID 17 ","Mela Geronilla-Duka"),
("81","12-03-2020 11:57am","Update Availment Date of Patient with Availment ID: 17 to SOCIAL SERVICE","Mela Geronilla-Duka"),
("82","12-03-2020 11:57am","Change data of Availment with ID 28 ","Mela Geronilla-Duka"),
("83","12-03-2020 11:57am","Update Availment Date of Patient with Availment ID: 28 to ","Mela Geronilla-Duka"),
("84","12-03-2020 11:57am","Change data of Availment with ID 29 ","Mela Geronilla-Duka"),
("85","12-03-2020 11:57am","Update Availment Date of Patient with Availment ID: 29 to SOCIAL SERVICE","Mela Geronilla-Duka"),
("86","12-03-2020 11:59am","Change data of Availment with ID 29 ","Mela Geronilla-Duka"),
("87","12-03-2020 11:59am","Update Availment Date of Patient with Availment ID: 29 to SOCIAL SERVICE","Mela Geronilla-Duka"),
("88","12-03-2020 12:00pm","Update Admission Date of Patient with ID 18 to 2020-12-01","Jean L. Jacob"),
("89","12-03-2020 12:00pm","Add new Availment for patient AGUIRRE, CONSOLACION SICAD with ID 2 amounting to 720","Jean L. Jacob"),
("90","12-03-2020 12:01pm","Change data of Availment with ID 29 from Date of Availment  to 2020-12-03, ","Jean L. Jacob"),
("91","12-03-2020 12:01pm","Update Availment Date of Patient with Availment ID: 29 to SOCIAL SERVICE","Jean L. Jacob"),
("92","12-03-2020 12:04pm","Logged out","Mela Geronilla-Duka"),
("93","12-03-2020 12:09pm","Logged in","Camille Ann G. Fuentes"),
("94","12-03-2020 12:10pm","Add new Patient VARGAS, NATIVIDAD FURISCAL with Client VARGAS, JUDY ANN SALVADOR","Camille Ann G. Fuentes"),
("95","12-03-2020 12:18pm","Logged out","Jean L. Jacob"),
("96","12-03-2020 12:25pm","Logged out","Camille Ann G. Fuentes"),
("97","12-03-2020 12:26pm","Logged in","Ma. Trina B. Mirabueno"),
("98","12-03-2020 12:28pm","Logged out","Ma. Trina B. Mirabueno"),
("99","12-03-2020 12:31pm","Logged in","Jean L. Jacob"),
("100","12-03-2020 12:50pm","Logged in","Jean L. Jacob");
INSERT INTO logs VALUES
("101","12-03-2020 01:17pm","Logged in","Admin");




CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `remaining_balance` AS select (sum(`budget_history`.`amount`) - ifnull((select sum(`listofavailment`.`amount`) from `listofavailment`),0)) AS `balance` from `budget_history`;


INSERT INTO remaining_balance VALUES
("970325.2");




CREATE TABLE `tbl_client` (
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
  `last_availment` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;


INSERT INTO tbl_client VALUES
("1","LIWANAG, ANTONIO JR ACUIN","LIWANAG, CATHERINE ACUIN","29","Male","2020-11-29","BURABOD (POB.), SORSOGON CITY, SORSOGON","1991-10-21","VALID ID,MEDICAL CERTIFICATE, CERTIFICATE OF INDIGENCY","Discharged","Hazel Martinez Recto","2020-12-01"),
("2","AGUIRRE, CONSOLACION SICAD","AGUIRRE, MARICEL SICAD","72","Female","2020-12-01","BUENAVISTA, SORSOGON CITY","1948-12-05","MEDICAL ABSTRACT, VALID ID","","Sarah Jane F. Novela-Dolot","2020-12-01"),
("3","BERJUEGA, RENAN AVILA","BALENGASA, ROWENA BERJUEGA","31","Male","2020-11-26","PANGPANG,SORSOGON CITY","1989-08-23"," MEDICAL CERTIFICATE","","Mela Geronilla-Duka","2020-12-01"),
("4","GAURINO, JEANNY GALVE","GAURINO, JAMES FULO","35","Female","2020-11-29","SAN VICENTE, BULUSAN, SORSOGON","1985-06-28","VALID ID, MEDICAL ABSTRACT","","Rosalle Tereen Maie V. Donor","2020-12-01"),
("5","ERVAS, KRISTINE JOY LAZARTE","ERVAS, RAFAEL FERRERAS JR.","26","Female","2020-12-01","PANGANIBAN, GUBAT SORSOGON ","1994-03-02","VALID ID, MEDICAL CERTIFICATE","","Ronarie S. Saja","2020-12-01"),
("6","ESCARCHA, RUBEN","DE VERA, JENNIFER","43","Female","2020-11-27","Carriedo, Gubat, Sorsogon","1977-10-10","medical abstract, valid id, certificate of indigency","","Joshua M. Resurreccion","2020-12-01"),
("7","BATAS, PATRICIA ELLA MAY","ESPARRAGO, RENZ ESCANDOR","19","Male","2020-12-02","BAGACAY, GUBAT, SORSOGON","2001-01-02","MEDICAL ABSTRACT, CEDULA,CERTICICATE OF INDIGENCY","Discharged","Camille Ann G. Fuentes","2020-12-02"),
("8","MARCHAN, JERWIN ASUNCION","PRIETO, REGENNE LAGAJINO","29","Male","2020-11-30","BUHATAN, SORSOGON CITY, SORSOGON","1991-09-12","CERTIFICATE OF INDIGENCY, MEDICAL ABSTRACT, CEDULA","","Jean L. Jacob","2020-12-02"),
("9","MANAHAN, BELINDA ","DELIN, MARCO GABITO","30","","2020-12-02","SAN PEDRO, IROSIN, SORSOGON","1990-04-20","VALID ID, MEDICAL CERTIFICATE, ","","Camille Ann G. Fuentes","2020-12-02"),
("10","ESPEÃ‘O, ROSIE ESTRABILLA","ESPEÃ‘O, ROSIE ESTRABILLA","46","Female","2020-11-17","BURGOS, CASIGURAN, SORSOGON","1974-04-01","VALID ID, MEDICAL ABSTRACT","","Camille Ann G. Fuentes","2020-12-02"),
("11","GABAD, JAYSON  BELO","GABAD, ESTRELLA","39","","2020-11-27","POBLACION III, STA. MAGDALENA, SORSOGON","1981-02-11","VALID ID, MEDICAL CERTIFICATE, ","","Hazel Martinez Recto","2020-12-02"),
("12","LAGCO, ALVIN JOSEPH GREGORIO","LAGCO, MARK JASON GREGORIO","26","","2020-11-27","GUINLAJON, SORSOGON CITY, SORSOGON","1997-01-08","VALID ID, MEDICAL CERTIFICATE, ","","Hazel Martinez Recto","2020-12-02"),
("13","BAITAN, TERESITA DICEN","BAITAN, TRINIDAD DICEN","58","Female","2020-12-27","SAMPALOC, SORSOGON CITY, SORSOGON","1962-12-09","VALID ID, MEDICAL CERTIFICAT, CERTIFICATE OF INDIGENCY","","Jean L. Jacob","2020-12-03"),
("14","VARGAS, NATIVIDAD FURISCAL","VARGAS, JUDY ANN SALVADOR","21","","","P-5 COCOK-CABITAN, BULAN, SORSOGON","2020-12-01","VALID ID, MEDICAL CERTIFICATE, CERTIFICATE OF INDIGENCY","","Camille Ann G. Fuentes","");




CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_fullname` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;


INSERT INTO user VALUES
("1","admin","admin","Admin"),
("2","jrpana","joerand","Jose Randy S. Pana"),
("3","sjndolot","0214s","Sarah Jane F. Novela-Dolot"),
("4","jjhainto","jj11","Janela Joven Hainto"),
("5","hrecto","Hazel28@","Hazel Martinez Recto"),
("6","mtmirabueno","031999","Ma. Trina B. Mirabueno"),
("7","mduka","alem","Mela Geronilla-Duka"),
("8","icsalomon","june1998","Ivy Collin J. Salomon"),
("9","fmmaquinana","iwmcvin","Flora M. Maquiñana"),
("10","mcmirandilla","122597","Ma. Christine N. Mirandilla"),
("11","arianegalicia","galicia3028","Ariane Pearl D. Galicia"),
("12","jepino","041697","Jessica E. Epino"),
("13","bimbsgoingo","throughtheyears","Maria Criselda D. Goingo"),
("14","monette","*963.","Monette L. Merciales"),
("15","mcdaplin","1208","Maria Conception"),
("16","eals","0329","Rosalle Tereen Maie V. Donor"),
("17","rona","*1423","Ronarie S. Saja"),
("18","jjacob","*1437","Jean L. Jacob"),
("19","cafuentes","15784268953","Camille Ann G. Fuentes"),
("20","josh","qwerty","Joshua M. Resurreccion"),
("21","summer","082713","Joan J. Espinola");




CREATE ALGORITHM=TEMPTABLE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_clientinfo` AS select `a`.`id` AS `id`,`a`.`client_id` AS `client_id`,`a`.`user` AS `user`,`a`.`admissiondate` AS `admissiondate`,`a`.`amount` AS `amount`,`a`.`purpose` AS `purpose`,`a`.`remarks` AS `remarks`,`a`.`firstavailment` AS `firstavailment`,`a`.`dateofavailment` AS `dateofavailment`,`a`.`status` AS `status`,`b`.`fullname` AS `fullname`,`b`.`age` AS `age`,`b`.`gender` AS `gender`,`b`.`address` AS `address`,`b`.`birthdate` AS `birthdate` from (`listofavailment` `a` join `tbl_client` `b`) where (`a`.`client_id` = `b`.`id`);


INSERT INTO view_clientinfo VALUES
("1","1","Mela Geronilla-Duka","2020-11-29","6100.00","MEDICAL ASSISTANCE","REACH AMOUNT (HAZEL M. RECTO)","SOCIAL SERVICE","2020-12-01","","LIWANAG, ANTONIO JR ACUIN","29","Male","BURABOD (POB.), SORSOGON CITY, SORSOGON","1991-10-21"),
("2","2","Mela Geronilla-Duka","2020-12-01","762","MEDICAL ASSISTANCE","CERTIFICATE OF INDIGENCY (SJ)","SOCIAL SERVICE","2020-12-01","","AGUIRRE, CONSOLACION SICAD","72","Female","BUENAVISTA, SORSOGON CITY","1948-12-05"),
("3","3","Mela Geronilla-Duka","2020-11-26","3342.80","MEDICINES AND SUPPLIES","LACKING RESIDENCE CERT.","SOCIAL SERVICE","2020-12-01","","BERJUEGA, RENAN AVILA","31","Male","PANGPANG,SORSOGON CITY","1989-08-23"),
("4","4","Mela Geronilla-Duka","2020-11-29","120","MEDICINES","CERTIFICATE OF INDIGENCY","SOCIAL SERVICE","2020-12-01","","GAURINO, JEANNY GALVE","35","Female","SAN VICENTE, BULUSAN, SORSOGON","1985-06-28"),
("5","5","Mela Geronilla-Duka","2020-12-01","3148.00","SUPPLIES","CERT. OF INDIGENCY (REACHED AMOUNT)","SOCIAL SERVICE","2020-12-01","","ERVAS, KRISTINE JOY LAZARTE","26","Female","PANGANIBAN, GUBAT SORSOGON ","1994-03-02"),
("6","6","Mela Geronilla-Duka","2020-11-27","509","MEDICINES","","SOCIAL SERVICE","2020-12-01","","ESCARCHA, RUBEN","43","Female","Carriedo, Gubat, Sorsogon","1977-10-10"),
("8","8","Mela Geronilla-Duka","2020-11-30","000","MEDICAL ASSISTANCE","CEDULA, CERTIFICATE OF INDIGENCY, (JEAN L. JACOB)","SOCIAL SERVICE","2020-12-02","","MARCHAN, JERWIN ASUNCION","29","Male","BUHATAN, SORSOGON CITY, SORSOGON","1991-09-12"),
("10","10","Mela Geronilla-Duka","2020-11-17","2510.00","MEDICAL ASSISTANCE","CERTIFICATE OF INDIGENCY","SOCIAL SERVICE","2020-12-02","","ESPEÃ‘O, ROSIE ESTRABILLA","46","Female","BURGOS, CASIGURAN, SORSOGON","1974-04-01"),
("12","7","Mela Geronilla-Duka","2020-12-02","2100","MEDICINES","","SOCIAL SERVICE","2020-12-02","","BATAS, PATRICIA ELLA MAY","19","Male","BAGACAY, GUBAT, SORSOGON","2001-01-02"),
("16","9","Mela Geronilla-Duka","2020-12-02","4253.00","MEDICAL ASSISTANCE","INDIGENCY/CEDULA(CAMILLE ANN FUENTES)","SOCIAL SERVICE","2020-12-02","","MANAHAN, BELINDA ","30","","SAN PEDRO, IROSIN, SORSOGON","1990-04-20"),
("17","11","Mela Geronilla-Duka","2020-11-27","1000","MEDICAL ASSISTANCE","TO SUBMIT BRGY. INDIGENCY ","SOCIAL SERVICE","2020-12-02"," ","GABAD, JAYSON  BELO","39","","POBLACION III, STA. MAGDALENA, SORSOGON","1981-02-11"),
("27","2","Hazel Martinez Recto","2020-12-01","210","MEDICAL ASSISTANCE","COI","","2020-12-02"," ","AGUIRRE, CONSOLACION SICAD","72","Female","BUENAVISTA, SORSOGON CITY","1948-12-05"),
("28","12","Mela Geronilla-Duka","2020-11-27","1500","MEDICAL ASSISTANCE","TO SUBMIT BRGY. INDIGENCY ","","2020-12-02"," ","LAGCO, ALVIN JOSEPH GREGORIO","26","","GUINLAJON, SORSOGON CITY, SORSOGON","1997-01-08"),
("29","13","Jean L. Jacob","2020-12-27","3400","LABORATORY","COMPLETEBVREQUIREMENTS","SOCIAL SERVICE","2020-12-03"," ","BAITAN, TERESITA DICEN","58","Female","SAMPALOC, SORSOGON CITY, SORSOGON","1962-12-09"),
("30","2","Jean L. Jacob","2020-12-01","720","LABORATORY","COMPLETE REQUIREMENTS","SOCIAL SERVICE","2020-12-03"," ","AGUIRRE, CONSOLACION SICAD","72","Female","BUENAVISTA, SORSOGON CITY","1948-12-05");




/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;