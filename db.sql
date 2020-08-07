-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.4.10-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table msdfs_forms_db.applicants
DROP TABLE IF EXISTS `applicants`;
CREATE TABLE IF NOT EXISTS `applicants` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `application_id` bigint(20) unsigned NOT NULL,
  `person_id` bigint(20) unsigned NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_applicants_applications` (`application_id`),
  KEY `FK_applicants_persons` (`person_id`),
  CONSTRAINT `FK_applicants_applications` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`),
  CONSTRAINT `FK_applicants_persons` FOREIGN KEY (`person_id`) REFERENCES `people` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.applicants: ~3 rows (approximately)
/*!40000 ALTER TABLE `applicants` DISABLE KEYS */;
INSERT INTO `applicants` (`id`, `application_id`, `person_id`, `active`, `order`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 1, 0, '2020-08-06 11:45:01', '2020-08-06 11:45:01'),
	(2, 2, 4, 1, 0, '2020-08-06 11:46:06', '2020-08-06 11:46:06'),
	(3, 3, 5, 1, 0, '2020-08-06 11:47:33', '2020-08-06 11:47:33');
/*!40000 ALTER TABLE `applicants` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.applications
DROP TABLE IF EXISTS `applications`;
CREATE TABLE IF NOT EXISTS `applications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ip` text NOT NULL,
  `form_id` int(10) unsigned NOT NULL,
  `status_id` int(10) unsigned NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_applications_forms` (`form_id`),
  KEY `FK_applications_status` (`status_id`),
  CONSTRAINT `FK_applications_forms` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`),
  CONSTRAINT `FK_applications_status` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.applications: ~3 rows (approximately)
/*!40000 ALTER TABLE `applications` DISABLE KEYS */;
INSERT INTO `applications` (`id`, `ip`, `form_id`, `status_id`, `created_at`, `updated_at`) VALUES
	(1, 'eyJpdiI6ImUvWXBYdEZwUWJqSjlCNkN1YkFhS0E9PSIsInZhbHVlIjoiajZCYWdTdExUV1NTL0ZESHZsTW1BYlpXdFl4VzVTbEpaUzJkZm10eE44bz0iLCJtYWMiOiJmYmM0MjI1MzJkYWIwNzFmZmE2MmNkNzZhYzE3NTBmZGMzMGQ0MTY5Y2U4NWYwODZhNWM0MjNmZDU4NWNiMjUyIn0=', 3, 1, '2020-08-06 11:45:01', '2020-08-06 11:45:01'),
	(2, 'eyJpdiI6InBtS1I2TmNqRHdzd0s1WklvSktNNVE9PSIsInZhbHVlIjoiNVd1N3pLVTZ6QUMrMiswYmJFcGU5aWRsYlZrT3VBSWJEVlZmWmltTkpXdz0iLCJtYWMiOiJkMWM0YTk2ZDE5M2FjZjE5MTAwOGIzYjIyZGNlMmViOTI3YjlkY2U3YjhjYzQ3YjA0ODgwNmI1NWU4MGFlMmY4In0=', 3, 1, '2020-08-06 11:46:05', '2020-08-06 11:46:05'),
	(3, 'eyJpdiI6IlQ1cGxkbmgxRDlLbGZmY3c0S3JnMGc9PSIsInZhbHVlIjoiSnJXRVUvRU84ODJRNFg2RlZqcFpnYUNtYmNmTGJsdTlzQ244ZkZRZURicz0iLCJtYWMiOiJhMjE4NzFiNGEzMjVhZjk4ZWQyZjgxMmQ1NjU2NTUwZmYxOTRlNDFjNjQzNmZhZjEwOTU2MzZlMmFmMWVlN2EyIn0=', 3, 1, '2020-08-06 11:47:33', '2020-08-06 11:47:33');
/*!40000 ALTER TABLE `applications` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.application_documents
DROP TABLE IF EXISTS `application_documents`;
CREATE TABLE IF NOT EXISTS `application_documents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `application_id` bigint(20) unsigned NOT NULL,
  `file` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `document_type_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_application_documents_applications` (`application_id`),
  KEY `FK_application_documents_document_types` (`document_type_id`),
  CONSTRAINT `FK_application_documents_applications` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`),
  CONSTRAINT `FK_application_documents_document_types` FOREIGN KEY (`document_type_id`) REFERENCES `document_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.application_documents: ~3 rows (approximately)
/*!40000 ALTER TABLE `application_documents` DISABLE KEYS */;
INSERT INTO `application_documents` (`id`, `application_id`, `file`, `document`, `document_type_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 'signature', '1_Disaster Management System ERD.png', 5, '2020-08-06 11:45:02', NULL),
	(2, 2, 'signature', '2_Critical Incident Form ERD.pdf', 1, '2020-08-06 11:46:06', NULL),
	(3, 3, 'signature', '3_181105_HighLevel.png', 5, '2020-08-06 11:47:33', NULL);
/*!40000 ALTER TABLE `application_documents` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.application_status_audit
DROP TABLE IF EXISTS `application_status_audit`;
CREATE TABLE IF NOT EXISTS `application_status_audit` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `application_id` bigint(20) unsigned NOT NULL,
  `changed_by` bigint(20) unsigned NOT NULL,
  `status_old` int(10) unsigned NOT NULL,
  `status_new` int(10) unsigned NOT NULL,
  `details` text CHARACTER SET latin1 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_application_status_audit_applications` (`application_id`),
  KEY `FK_application_status_audit_users` (`changed_by`),
  KEY `FK_application_status_audit_status` (`status_old`),
  KEY `FK_application_status_audit_status_2` (`status_new`),
  CONSTRAINT `FK_application_status_audit_applications` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`),
  CONSTRAINT `FK_application_status_audit_status` FOREIGN KEY (`status_old`) REFERENCES `status` (`id`),
  CONSTRAINT `FK_application_status_audit_status_2` FOREIGN KEY (`status_new`) REFERENCES `status` (`id`),
  CONSTRAINT `FK_application_status_audit_users` FOREIGN KEY (`changed_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.application_status_audit: ~0 rows (approximately)
/*!40000 ALTER TABLE `application_status_audit` DISABLE KEYS */;
/*!40000 ALTER TABLE `application_status_audit` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.banks
DROP TABLE IF EXISTS `banks`;
CREATE TABLE IF NOT EXISTS `banks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bank` varchar(150) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `country` (`bank`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.banks: ~6 rows (approximately)
/*!40000 ALTER TABLE `banks` DISABLE KEYS */;
INSERT INTO `banks` (`id`, `bank`) VALUES
	(1, 'First Citizens Bank'),
	(6, 'JMMB'),
	(3, 'Republic Bank'),
	(4, 'Royal Bank'),
	(2, 'Scotiabank'),
	(5, 'Unit Trust');
/*!40000 ALTER TABLE `banks` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.citizen_proof
DROP TABLE IF EXISTS `citizen_proof`;
CREATE TABLE IF NOT EXISTS `citizen_proof` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `proof` varchar(150) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `country` (`proof`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.citizen_proof: ~4 rows (approximately)
/*!40000 ALTER TABLE `citizen_proof` DISABLE KEYS */;
INSERT INTO `citizen_proof` (`id`, `proof`) VALUES
	(2, 'Certificate of Immigration Status'),
	(3, 'Certificate of Residence'),
	(1, 'National ID'),
	(4, 'Passport');
/*!40000 ALTER TABLE `citizen_proof` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.communities
DROP TABLE IF EXISTS `communities`;
CREATE TABLE IF NOT EXISTS `communities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `community` varchar(255) NOT NULL,
  `code` int(11) DEFAULT NULL,
  `region_code` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_communities_regions` (`region_code`),
  CONSTRAINT `FK_communities_regions` FOREIGN KEY (`region_code`) REFERENCES `regions` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=521 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.communities: ~520 rows (approximately)
/*!40000 ALTER TABLE `communities` DISABLE KEYS */;
INSERT INTO `communities` (`id`, `community`, `code`, `region_code`) VALUES
	(1, 'Abysinia Village (Oilfield area)', 5301, 11),
	(2, 'Acono Village', 3319, 80),
	(3, 'Agostini Village', 4201, 90),
	(4, 'Agostini Village', 5101, 11),
	(5, 'Alyce Glen', 3119, 60),
	(6, 'Anglais Settlement', 6101, 12),
	(7, 'Apex Oil Field', 8101, 15),
	(8, 'Aranguez', 3211, 70),
	(9, 'Arena', 4202, 90),
	(10, 'Arima Heights/Temple Village', 3402, 80),
	(11, 'Arima Proper', 3001, 30),
	(12, 'Aripero Village', 8301, 15),
	(13, 'Arouca', 3311, 80),
	(14, 'Avocat Village', 8102, 15),
	(15, 'Bagatelle', 3127, 60),
	(16, 'Balandra', 6301, 12),
	(17, 'Balmain', 4401, 90),
	(18, 'Bamboo Grove', 9801, 70),
	(19, 'Bamboo Village', 8401, 15),
	(20, 'Barataria', 3209, 70),
	(21, 'Barrackpore', 9802, 13),
	(22, 'Basse Terre', 7402, 13),
	(23, 'Baster Hall', 4402, 90),
	(24, 'Batchyia Village', 8104, 14),
	(25, 'Bayshore', 3117, 60),
	(26, 'Beach Camp', 8201, 15),
	(27, 'Beau Pres', 3137, 60),
	(28, 'Beetham Estate', 3218, 70),
	(29, 'Bejucal', 9805, 70),
	(30, 'Belmont', 1001, 10),
	(31, 'Ben Lomond', 7502, 13),
	(32, 'Bennet Village', 8202, 15),
	(33, 'Biche', 9817, 11),
	(34, 'Big Yard', 3104, 60),
	(35, 'Blanchisseuse', 9803, 70),
	(36, 'Blue Basin', 3130, 60),
	(37, 'Blue Range', 3141, 60),
	(38, 'Bois Bough', 8402, 15),
	(39, 'Boissiere', 3124, 60),
	(40, 'Bon Air Development', 3312, 80),
	(41, 'Bon Air West Development', 3336, 80),
	(42, 'Bon Jean', 7403, 13),
	(43, 'Bonasse Village', 8403, 15),
	(44, 'Bonne Aventure', 7301, 90),
	(45, 'Borde Narve', 9804, 13),
	(46, 'Brasso Caparo Village', 4101, 90),
	(47, 'Brasso Manuel Junction', 4102, 90),
	(48, 'Brasso Seco Village', 3502, 80),
	(49, 'Brasso Tamana', 4103, 90),
	(50, 'Brasso Venado', 4104, 90),
	(51, 'Brechin Castle', 4403, 90),
	(52, 'Brickfield', 4203, 90),
	(53, 'Brickfield/Navet', 5202, 90),
	(54, 'Brighton', 8302, 15),
	(55, 'Broadway', 2012, 20),
	(56, 'Brooklyn Settlement', 6401, 12),
	(57, 'Broomage', 7504, 13),
	(58, 'Brothers Road', 5203, 90),
	(59, 'Brothers Settlement', 7505, 13),
	(60, 'Bucarro', 4404, 90),
	(61, 'Buen Intento', 7506, 13),
	(62, 'Butler Village', 4204, 90),
	(63, 'Caigual', 6402, 12),
	(64, 'Calcutta Road No. 2', 4105, 90),
	(65, 'Calcutta Settlement No.2', 4406, 90),
	(66, 'California', 4405, 90),
	(67, 'Calvary Hill', 3008, 30),
	(68, 'Cameron Road', 3140, 60),
	(69, 'Canaan Village Palmiste', 7203, 14),
	(70, 'Canaree', 7404, 13),
	(71, 'Cane Farm', 3310, 80),
	(72, 'Canque', 5204, 11),
	(73, 'Cantaro Village', 3220, 70),
	(74, 'Cap De Ville', 9806, 15),
	(75, 'Caparo', 9945, 90),
	(76, 'Carapal', 8203, 15),
	(77, 'Carapichaima', 9906, 90),
	(78, 'Carapo', 3406, 80),
	(79, 'Caratal', 7302, 90),
	(80, 'Carenage', 3101, 60),
	(81, 'Carib Homes', 3003, 30),
	(82, 'Carlsen Field', 4207, 90),
	(83, 'Car-Michael', 6501, 12),
	(84, 'Caroni Village', 3327, 80),
	(85, 'Cascade', 3214, 70),
	(86, 'Caura', 3332, 80),
	(87, 'Cedar Hill', 7204, 13),
	(88, 'Cedar Hill', 7303, 90),
	(89, 'Cedros', 8405, 15),
	(90, 'Centeno', 3342, 80),
	(91, 'Chaguanas Proper', 4016, 40),
	(92, 'Chaguaramas', 3102, 60),
	(93, 'Champ Elysees', 3122, 60),
	(94, 'Champ Fleurs', 9807, 70),
	(95, 'Chandernagore', 4208, 90),
	(96, 'Charlieville', 4019, 40),
	(97, 'Charlo Village', 8105, 14),
	(98, 'Charuma Village', 5103, 11),
	(99, 'Chase Village', 4209, 90),
	(100, 'Chatham', 8406, 15),
	(101, 'Chickland', 4107, 90),
	(102, 'Chin Chin', 4302, 90),
	(103, 'Chinese Village', 8303, 15),
	(104, 'City Proper', 2003, 20),
	(105, 'Claxton Bay', 9907, 90),
	(106, 'Cleaver Road', 3404, 80),
	(107, 'Cleghorn and Mt. Pleasant', 7205, 13),
	(108, 'Clifton Hill', 8012, 50),
	(109, 'Coal Hill', 6602, 12),
	(110, 'Coalmine', 4108, 90),
	(111, 'Cocal Estate/Mayaro', 5104, 11),
	(112, 'Cochrane', 9808, 15),
	(113, 'Cocorite', 1002, 10),
	(114, 'Cocoyea Village', 2017, 20),
	(115, 'Corinth', 7206, 13),
	(116, 'Coromandel', 8407, 15),
	(117, 'Corosal', 7305, 90),
	(118, 'Coryal', 6502, 12),
	(119, 'Coryal Village', 7507, 13),
	(120, 'Couva Central', 4409, 90),
	(121, 'Covigne', 3115, 60),
	(122, 'Cumaca', 6201, 12),
	(123, 'Cumana', 6102, 12),
	(124, 'Cumuto', 6503, 12),
	(125, 'Cunaripo', 9909, 12),
	(126, 'Cunupia', 9809, 40),
	(127, 'Curepe', 3341, 80),
	(128, 'Cushe/Navet', 9911, 11),
	(129, 'D&#39;Abadi', 9942, 80),
	(130, 'Danny Village', 8204, 15),
	(131, 'De Gannes Village', 8106, 15),
	(132, 'Debe Proper', 7207, 14),
	(133, 'Deep Ravine/Clear Water', 5106, 11),
	(134, 'Delhi Settlement', 8107, 15),
	(135, 'Diamond', 4410, 90),
	(136, 'Diamond', 7208, 14),
	(137, 'Diamond Vale', 3114, 60),
	(138, 'Dibe/Belle Vue', 3144, 60),
	(139, 'Diego Martin Proper', 3111, 60),
	(140, 'Dinsley', 3344, 80),
	(141, 'Dinsley/Trincity', 3346, 80),
	(142, 'Dow Village', 4411, 90),
	(143, 'Dow Village', 8108, 15),
	(144, 'Duncan Village', 7209, 14),
	(145, 'Dyers Village', 7508, 13),
	(146, 'East Port of Spain', 1012, 10),
	(147, 'Eastern Quarry', 3206, 70),
	(148, 'Eccles Village', 9810, 13),
	(149, 'Ecclesville', 5107, 11),
	(150, 'Edinburgh 500', 4012, 40),
	(151, 'Edinburgh Gardens', 4013, 40),
	(152, 'Edinburgh Village', 4210, 90),
	(153, 'Egypt Village', 8006, 50),
	(154, 'El Dorado', 3307, 80),
	(155, 'El Socorro', 3207, 70),
	(156, 'El Socorro Extension', 3208, 70),
	(157, 'Ellerslie Park', 1003, 10),
	(158, 'Embacadre', 2013, 20),
	(159, 'Endeavour Village', 4010, 40),
	(160, 'Enterprise', 4001, 40),
	(161, 'Eric Williams Medical Complex', 3347, 80),
	(162, 'Erin Proper', 8206, 15),
	(163, 'Erin/Buenos Ayres', 8205, 15),
	(164, 'Esmeralda', 4005, 40),
	(165, 'Esperance Village', 7210, 14),
	(166, 'Esperanza', 4412, 90),
	(167, 'Fairview', 4109, 90),
	(168, 'Fairways', 3123, 60),
	(169, 'Fanny Village', 8003, 50),
	(170, 'Farnum Village', 7307, 90),
	(171, 'Febeau Village', 3229, 70),
	(172, 'Federation Park', 1004, 10),
	(173, 'Felicity', 4008, 40),
	(174, 'Felicity Hall', 4413, 90),
	(175, 'Fifth Company', 7510, 13),
	(176, 'Fishing Pond', 6403, 12),
	(177, 'Five Rivers', 3335, 80),
	(178, 'Flanagin Town', 4110, 90),
	(179, 'Fonrose Village', 5206, 11),
	(180, 'Forest Reserve', 8306, 15),
	(181, 'Forres Park', 7308, 90),
	(182, 'Fort George', 3121, 60),
	(183, 'Four Roads', 3125, 60),
	(184, 'Four Roads - Tamana', 6604, 12),
	(185, 'Frederick Settlement', 4304, 80),
	(186, 'Freeport', 9913, 90),
	(187, 'Friendship', 4415, 90),
	(188, 'Friendship', 9811, 13),
	(189, 'Fullerton', 8408, 15),
	(190, 'Fyzabad', 8109, 15),
	(191, 'Gasparillo', 7309, 90),
	(192, 'George Village', 7101, 13),
	(193, 'Gheerahoo', 8110, 15),
	(194, 'Glencoe', 3116, 60),
	(195, 'Golconda', 9812, 13),
	(196, 'Gonzales', 1005, 10),
	(197, 'Gonzales (Point Fortin)', 9813, 15),
	(198, 'Goodwood Gardens', 3143, 60),
	(199, 'Gran Couva', 4112, 90),
	(200, 'Gran Curucaye', 3219, 70),
	(201, 'Grand Lagoon', 5302, 11),
	(202, 'Grand Riviere', 6103, 12),
	(203, 'Granville', 8409, 15),
	(204, 'Green Acres', 2019, 20),
	(205, 'Green Hill Village', 3126, 60),
	(206, 'Guaico', 9915, 12),
	(207, 'Guapo Lot 10', 8309, 15),
	(208, 'Guaracara', 7310, 90),
	(209, 'Guatopajaro', 6506, 12),
	(210, 'Guayaguayare', 9916, 11),
	(211, 'Gulf View', 2020, 20),
	(212, 'Haleland Park/Moka', 3142, 60),
	(213, 'Hard Bargain', 7511, 13),
	(214, 'Harmony Hall', 9917, 13),
	(215, 'Harris Village', 8111, 15),
	(216, 'Heights of Guanapo', 3415, 80),
	(217, 'Hermitage', 7311, 90),
	(218, 'Hermitage Village', 7214, 14),
	(219, 'Hindustan', 7102, 13),
	(220, 'Hollywood', 8004, 50),
	(221, 'Homeland Gardens', 4006, 40),
	(222, 'Howsen Village', 6507, 12),
	(223, 'Icacos', 8410, 15),
	(224, 'Iere Village', 9918, 13),
	(225, 'Indian Trail', 9920, 90),
	(226, 'Indian Walk', 9919, 13),
	(227, 'Industrial Estate', 3113, 60),
	(228, 'Jacob Village', 8207, 15),
	(229, 'Jerningham Junction', 4004, 40),
	(230, 'Jordan Village', 7216, 13),
	(231, 'Kandahar', 3334, 80),
	(232, 'Kelly Village', 9921, 80),
	(233, 'Kumar Village', 7515, 13),
	(234, 'L&#39;anse Noir', 6104, 12),
	(235, 'La  Lune', 7405, 13),
	(236, 'La Baja', 3315, 80),
	(237, 'La Brea', 8310, 15),
	(238, 'La Canoa', 3231, 70),
	(239, 'La Florisant', 9943, 80),
	(240, 'La Fortune', 7217, 14),
	(241, 'La Fortune/Pluck', 8112, 15),
	(242, 'La Horquetta', 3418, 80),
	(243, 'La Horquette', 3105, 60),
	(244, 'La Laja', 3407, 80),
	(245, 'La Mango Village', 3320, 80),
	(246, 'La Paille Village', 3326, 80),
	(247, 'La Pastora', 3235, 70),
	(248, 'La Puerta', 3107, 60),
	(249, 'La Resource', 3408, 80),
	(250, 'La Romain', 7218, 14),
	(251, 'La Ruffin', 7406, 13),
	(252, 'La Savanne', 5304, 11),
	(253, 'La Savanne', 7407, 13),
	(254, 'La Seiva', 3139, 60),
	(255, 'La Seiva Village', 3316, 80),
	(256, 'Lady Chancellor', 3201, 70),
	(257, 'Lange Park', 4014, 40),
	(258, 'Lanse Mitan', 3103, 60),
	(259, 'Las Cuevas', 3503, 70),
	(260, 'Las Lomas (Nos. 1 & 2)', 4306, 90),
	(261, 'Laventille', 3212, 70),
	(262, 'Le Platte', 3134, 60),
	(263, 'Lendore Village', 4007, 40),
	(264, 'Lengua Village', 7219, 14),
	(265, 'Lengua Village/Barrackpore', 7516, 13),
	(266, 'Les Efforts East', 2009, 20),
	(267, 'Les Efforts West', 2008, 20),
	(268, 'Libertville', 5207, 11),
	(269, 'Long Circular', 1006, 10),
	(270, 'Longdenville', 9814, 40),
	(271, 'Lopinot Village', 3339, 80),
	(272, 'Lorensotte', 8208, 15),
	(273, 'Los Bojos', 8209, 15),
	(274, 'Los Charos', 8210, 15),
	(275, 'Los Iros/Erin', 8211, 15),
	(276, 'Lothian', 7517, 13),
	(277, 'Lower Hill Side', 2010, 20),
	(278, 'Lower Santa Cruz', 3230, 70),
	(279, 'Macaulay', 7312, 90),
	(280, 'Macoya', 3306, 80),
	(281, 'Madras Settlement', 4307, 90),
	(282, 'Mafeking', 5109, 11),
	(283, 'Mahoe', 6105, 12),
	(284, 'Mainfield', 5402, 11),
	(285, 'Malabar', 3004, 30),
	(286, 'Malgretoute', 9923, 13),
	(287, 'Malick', 3216, 70),
	(288, 'Maloney Gardens', 3343, 80),
	(289, 'Mamoral No. 2', 9924, 90),
	(290, 'Manzanilla', 9925, 12),
	(291, 'Marabella', 2016, 20),
	(292, 'Marac', 7408, 13),
	(293, 'Maracas', 3221, 70),
	(294, 'Maracas Bay', 3239, 70),
	(295, 'Maracas/St. Joseph', 3314, 80),
	(296, 'Maraj Hill', 6607, 12),
	(297, 'Maraj Lands', 2021, 20),
	(298, 'Maraval Proper', 3138, 60),
	(299, 'Marie Road', 3227, 70),
	(300, 'Matelot', 6106, 12),
	(301, 'Matilda', 7518, 13),
	(302, 'Matura', 6302, 12),
	(303, 'Maturita', 9815, 30),
	(304, 'Mausica', 9927, 80),
	(305, 'Mayaro', 5305, 11),
	(306, 'Mayo', 7313, 90),
	(307, 'Mc Bean', 4417, 90),
	(308, 'Melajo', 6202, 12),
	(309, 'Mendez Village', 8113, 14),
	(310, 'Mission', 6107, 12),
	(311, 'Mon Desir', 8114, 15),
	(312, 'Mon Desir/Silver Stream', 8308, 15),
	(313, 'Mon Repos', 2005, 20),
	(314, 'Mon Repos', 3215, 70),
	(315, 'Monkey Town', 7221, 14),
	(316, 'Monte Video', 6108, 12),
	(317, 'Montrose Village', 4018, 40),
	(318, 'Mora Settlement', 5110, 11),
	(319, 'Morin Bay', 6406, 12),
	(320, 'Morne Diablo', 8115, 14),
	(321, 'Moruga Village', 7410, 13),
	(322, 'Morvant', 3213, 70),
	(323, 'Mount D&#39;or', 3237, 70),
	(324, 'Mount Pleasant', 3007, 30),
	(325, 'Mount Pleasant', 4418, 90),
	(326, 'Mount St. Benedict', 3322, 80),
	(327, 'Mt. Hope', 3224, 70),
	(328, 'Mt. Lambert', 3223, 70),
	(329, 'Mundo Nuevo', 3602, 90),
	(330, 'Munroe Settlement', 4002, 40),
	(331, 'Nancoo Village', 4308, 90),
	(332, 'Navet Village', 2007, 20),
	(333, 'Navet Village', 9928, 11),
	(334, 'Never Dirty', 3228, 70),
	(335, 'New Grant', 9929, 13),
	(336, 'New Village', 8002, 50),
	(337, 'Newlands', 8009, 50),
	(338, 'Newtown', 1007, 10),
	(339, 'North Manzanilla', 6407, 12),
	(340, 'North Post', 3131, 60),
	(341, 'O&#39;meara Road', 3002, 30),
	(342, 'Olton Road', 3411, 80),
	(343, 'Orange Valley', 4419, 90),
	(344, 'Oropouche', 6408, 12),
	(345, 'Oropouche', 8116, 15),
	(346, 'Oropuna Village/Piarco', 3330, 80),
	(347, 'Ortoire', 5306, 11),
	(348, 'Ouplay Village', 4420, 90),
	(349, 'Palmiste', 4214, 90),
	(350, 'Palmiste', 7222, 14),
	(351, 'Palmyra', 7223, 13),
	(352, 'Palmyra Village/Mt. Pleasant', 7224, 13),
	(353, 'Palo Seco', 8212, 15),
	(354, 'Paradise', 2011, 20),
	(355, 'Paradise Gardens', 3309, 80),
	(356, 'Paramin', 3135, 60),
	(357, 'Parforce', 7314, 90),
	(358, 'Parry Lands South', 8311, 15),
	(359, 'Pasea Extension', 3304, 80),
	(360, 'Patna Village', 3128, 60),
	(361, 'Penal', 8117, 14),
	(362, 'Penal Quinam Beach Road', 8119, 14),
	(363, 'Penal Rock Road', 8118, 14),
	(364, 'Pepper Village', 4115, 90),
	(365, 'Pepper Village', 8120, 15),
	(366, 'Petersfield', 4015, 40),
	(367, 'Petit Bourg', 3217, 70),
	(368, 'Petit Caf', 7521, 13),
	(369, 'Petit Curucaye', 3236, 70),
	(370, 'Petit Morne', 7225, 13),
	(371, 'Petit Valley', 3133, 60),
	(372, 'PETROTRIN (Point A Pierre)', 7323, 90),
	(373, 'Peytonville', 3410, 80),
	(374, 'Philipines', 7226, 14),
	(375, 'Phoenix Park', 4421, 90),
	(376, 'Picton', 3203, 70),
	(377, 'Picton', 7227, 14),
	(378, 'Pinto Road', 3413, 80),
	(379, 'Piparo', 9816, 13),
	(380, 'Plaisance', 5307, 11),
	(381, 'Plaisance Park', 7316, 90),
	(382, 'Pleasantville', 2006, 20),
	(383, 'Plum Mitan', 6603, 12),
	(384, 'Point Cumana', 3106, 60),
	(385, 'Point D&#39;or', 8312, 15),
	(386, 'Point Fortin Proper', 8010, 50),
	(387, 'Point Ligoure', 8005, 50),
	(388, 'Point Lisas (Industrial Estate)', 4422, 90),
	(389, 'Point Lisas (NHA)', 4423, 90),
	(390, 'Poole', 5209, 11),
	(391, 'Poonah', 7317, 90),
	(392, 'Port of Spain Port Area', 1014, 10),
	(393, 'Port of Spain Proper', 1013, 10),
	(394, 'Powder Magazine', 3109, 60),
	(395, 'Preysal', 4116, 90),
	(396, 'Princes Town Proper', 7523, 13),
	(397, 'Quarry Village', 8121, 15),
	(398, 'Radix', 5308, 11),
	(399, 'Rambert Village', 7228, 14),
	(400, 'Rampanalgas', 6303, 12),
	(401, 'Rancho Quemado', 8213, 15),
	(402, 'Ravine Sable', 4215, 90),
	(403, 'Real Springs', 3324, 80),
	(404, 'Redhill', 3337, 80),
	(405, 'Reform Village', 7524, 13),
	(406, 'Rich Plain', 3112, 60),
	(407, 'Rio Claro', 9931, 11),
	(408, 'River Estate', 3129, 60),
	(409, 'Riversdale', 7318, 90),
	(410, 'Robert Hill/Siparia', 8122, 15),
	(411, 'Robert Village', 7105, 13),
	(412, 'Rochard Road', 8123, 14),
	(413, 'Romain Lands', 3226, 70),
	(414, 'Rousillac', 8314, 15),
	(415, 'Salazar Village', 8316, 15),
	(416, 'Salibya Village', 6304, 12),
	(417, 'Sam Boucaud', 3233, 70),
	(418, 'Samaroo Village', 3412, 80),
	(419, 'San Francique', 9818, 14),
	(420, 'San Juan', 3210, 70),
	(421, 'San Pedro', 9819, 11),
	(422, 'San Raphael/Brazil', 3601, 90),
	(423, 'San Souci', 6109, 12),
	(424, 'Sangre Chiquito', 9932, 12),
	(425, 'Sangre Grande Proper', 9933, 12),
	(426, 'Santa Cruz', 3232, 70),
	(427, 'Santa Flora', 8214, 15),
	(428, 'Santa Margarita', 3321, 80),
	(429, 'Santa Rosa Heights', 3414, 80),
	(430, 'Saut Deau', 3136, 60),
	(431, 'Scott Road Village', 8125, 14),
	(432, 'Sealots', 1008, 10),
	(433, 'Sherwood Park', 3403, 80),
	(434, 'Simeon Road', 3110, 60),
	(435, 'Siparia', 8127, 15),
	(436, 'Sisters Village', 7525, 13),
	(437, 'Sixth Company', 7106, 13),
	(438, 'Sobo Village', 8315, 15),
	(439, 'Soconusco', 3234, 70),
	(440, 'Spring Village', 3318, 80),
	(441, 'Spring Village', 4117, 90),
	(442, 'Spring Village', 4424, 90),
	(443, 'Springland/San Fabian', 7319, 90),
	(444, 'St. Andrew&#39;s Village', 4425, 90),
	(445, 'St. Anns', 3202, 70),
	(446, 'St. Augustine', 3303, 80),
	(447, 'St. Augustine South', 3325, 80),
	(448, 'St. Barbs', 3205, 70),
	(449, 'St. Charles Village', 4009, 40),
	(450, 'St. Charles Village', 7229, 13),
	(451, 'St. Clair', 1009, 10),
	(452, 'St. Clements', 7230, 13),
	(453, 'St. Croix Village', 9820, 13),
	(454, 'St. Helena Village', 9935, 80),
	(455, 'St. James', 1010, 10),
	(456, 'St. John', 8128, 15),
	(457, 'St. John&#39;s Village', 3323, 80),
	(458, 'St. John&#39;s Village', 9821, 13),
	(459, 'St. Joseph', 3301, 80),
	(460, 'St. Joseph Village', 2004, 20),
	(461, 'St. Joseph Village', 5309, 11),
	(462, 'St. Julien', 7527, 13),
	(463, 'St. Lucien Road', 3132, 60),
	(464, 'St. Madeline', 7232, 13),
	(465, 'St. Margaret', 7320, 90),
	(466, 'St. Mary&#39;s Village', 8129, 15),
	(467, 'St. Mary&#39;s Village', 9936, 13),
	(468, 'St. Mary&#39;s Village (Freeport)', 9944, 90),
	(469, 'St. Thomas Village', 4017, 40),
	(470, 'Sudama Village', 8130, 15),
	(471, 'Sum Sum Hill', 7321, 90),
	(472, 'Surrey Village', 3338, 80),
	(473, 'Syne Village', 9823, 14),
	(474, 'Tabaquite', 4118, 90),
	(475, 'Tableland', 7108, 13),
	(476, 'Tacarigua', 3305, 80),
	(477, 'Talparo', 3603, 90),
	(478, 'Tamana', 9937, 12),
	(479, 'Tamana Road', 3604, 90),
	(480, 'Tarouba', 2015, 20),
	(481, 'Techier Village', 8011, 50),
	(482, 'Thick Village', 8132, 15),
	(483, 'Tobago', 1000, 1000),
	(484, 'Toco', 6110, 12),
	(485, 'Todd&#39;s Road', 4217, 90),
	(486, 'Todd&#39;s Station', 9938, 90),
	(487, 'Tompire', 6111, 12),
	(488, 'Tortuga', 9939, 90),
	(489, 'Trincity', 3345, 80),
	(490, 'Tulsa Village', 9822, 14),
	(491, 'Tumpuna Road', 3005, 30),
	(492, 'Tumpuna Road', 3417, 80),
	(493, 'Tunapuna', 3302, 80),
	(494, 'Turure', 6411, 12),
	(495, 'Union Park', 2014, 20),
	(496, 'Union Village', 2001, 20),
	(497, 'Union Village', 5113, 11),
	(498, 'Union Village', 7324, 90),
	(499, 'Upper Belmont', 3204, 70),
	(500, 'Upper St. James', 3145, 60),
	(501, 'Usine St.Madeleine', 7234, 13),
	(502, 'Valencia', 9940, 12),
	(503, 'Valley View', 3317, 80),
	(504, 'Valsay', 9941, 80),
	(505, 'Vance River', 8318, 15),
	(506, 'Vessigny', 8319, 15),
	(507, 'Victoria Gardens', 3118, 60),
	(508, 'Victoria Village', 2018, 20),
	(509, 'Vistabella', 2002, 20),
	(510, 'Waddle Village', 8215, 15),
	(511, 'Wallerfield', 3416, 80),
	(512, 'Warren Village', 4311, 80),
	(513, 'Warren Village', 4427, 90),
	(514, 'Water Hole', 3120, 60),
	(515, 'Waterloo', 4219, 90),
	(516, 'Welcome', 4220, 90),
	(517, 'Wellington', 7235, 14),
	(518, 'West Moorings', 3108, 60),
	(519, 'White Land', 7325, 90),
	(520, 'Woodbrook', 1011, 10);
/*!40000 ALTER TABLE `communities` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.cron_log
DROP TABLE IF EXISTS `cron_log`;
CREATE TABLE IF NOT EXISTS `cron_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `job` varchar(50) CHARACTER SET latin1 NOT NULL,
  `details` text CHARACTER SET latin1 DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.cron_log: ~0 rows (approximately)
/*!40000 ALTER TABLE `cron_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `cron_log` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.dashboard_data
DROP TABLE IF EXISTS `dashboard_data`;
CREATE TABLE IF NOT EXISTS `dashboard_data` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `slug` (`slug`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.dashboard_data: ~0 rows (approximately)
/*!40000 ALTER TABLE `dashboard_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `dashboard_data` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.disasters
DROP TABLE IF EXISTS `disasters`;
CREATE TABLE IF NOT EXISTS `disasters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(150) NOT NULL,
  `disaster` varchar(150) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `country` (`disaster`) USING BTREE,
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.disasters: ~5 rows (approximately)
/*!40000 ALTER TABLE `disasters` DISABLE KEYS */;
INSERT INTO `disasters` (`id`, `slug`, `disaster`) VALUES
	(1, 'flooding', 'Flooding'),
	(2, 'fire', 'Fire'),
	(3, 'land_slide', 'Land Slide'),
	(4, 'earthquake', 'Earthquake'),
	(5, 'other_disaster', 'Other');
/*!40000 ALTER TABLE `disasters` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.document_types
DROP TABLE IF EXISTS `document_types`;
CREATE TABLE IF NOT EXISTS `document_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(150) NOT NULL,
  `mime` varchar(150) NOT NULL,
  `icon` varchar(150) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.document_types: ~7 rows (approximately)
/*!40000 ALTER TABLE `document_types` DISABLE KEYS */;
INSERT INTO `document_types` (`id`, `type`, `mime`, `icon`) VALUES
	(1, 'PDF', 'application/pdf', 'fa-file-pdf-o'),
	(2, 'MS Word Docx', 'application/msword', 'fa-file-word-o'),
	(3, 'MS Word Doc', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'fa-file-word-o'),
	(4, 'Text', 'text/plain', 'fa-file-text-o'),
	(5, 'PNG Image', 'image/png', 'fa-image'),
	(6, 'JPG Image', 'image/jpg', 'fa-image'),
	(7, 'Jpeg Image', 'image/jpeg', 'fa-image');
/*!40000 ALTER TABLE `document_types` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.email_log
DROP TABLE IF EXISTS `email_log`;
CREATE TABLE IF NOT EXISTS `email_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subject` text CHARACTER SET latin1 NOT NULL,
  `details` text CHARACTER SET latin1 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.email_log: ~1 rows (approximately)
/*!40000 ALTER TABLE `email_log` DISABLE KEYS */;
INSERT INTO `email_log` (`id`, `subject`, `details`, `created_at`, `updated_at`) VALUES
	(1, 'eyJpdiI6ImRDQURjYjlFN25oQ0VZMnkwOUZETkE9PSIsInZhbHVlIjoiS3Y5V1Q0ZjFDbVVuaEV3VjQycHgrNmx3bmdtVW9WNzJYL3g0NUIxM0NBZGw0UGw4Nlk4QlVEaUI1OGFzQk4wOCIsIm1hYyI6IjBlMzRkMzcwZDVlNjNiYzcwN2I3NTE2ZTg3MzdlODdlZjlhMzQwY2EyZGZhM2I1YWU1OGRlOTU1MTc1NTlhZWUifQ==', 'eyJpdiI6IjFUbjcrR2kzSGN5bnEzQXhMR0orNFE9PSIsInZhbHVlIjoiVlFMeFlJQkhSTExCdVFNSVpIdGpPUlkzelNNMlF3cHNXbk9XV1RGak96bDArYUY5ZzJPbGZtZVZ1cGQxRk9kSmwwK0RUSktyQ1lBTWJRckhQVEoxNlE9PSIsIm1hYyI6IjI2MTQwNmUwYmZiYmFmMWQ0MTAzNDQ4YzNmZGVlMTMwZmQzMTdlYjY2ZDNhOTUxMWJhNzg4OGVlODA4OTA2NjkifQ==', '2020-08-06 22:13:13', '2020-08-06 22:13:13'),
	(2, 'eyJpdiI6Im0vb0FCZnl0MTh3Y1dXWkMyS2V5V1E9PSIsInZhbHVlIjoiUmxPNEJySWltTW9ETkhub0g4TGJSKzkvWFJmY2FMYzRCeGwwNHJXQlhIK2FCWnYyczU5T0FPRC9Jamcyc0h4cyIsIm1hYyI6IjhjM2UwNWM3ZWMxYWQ2NmY4NjNlZmRlNjVlZWIwZTcxZDdkMWQ4OWZkMzViYWRjOGE3NTg3ZWZkYmE0NWE0MjkifQ==', 'eyJpdiI6ImlKNVNUNHFOak9HQnhEVXB3SzVBSUE9PSIsInZhbHVlIjoiazBsRHJpcHZwSXVuT3Z3ejNBZUxWc2V3MHpMajZIRzR2ZHpXazNpOGRMVUNkN0gxZFhPaTlCSExYZXZiVUdJWkdzcU1payt5eWFIbHUrTXRmOVJNWVE9PSIsIm1hYyI6ImQ0YTAzNmY2NGEyNGIyODNmMTNhMWQ3NmM4OTc4OGY1ZjA2ODI4OTEwODAzM2Q4MTY3NDVjYmIxNzRiNWZlYWUifQ==', '2020-08-07 02:28:59', '2020-08-07 02:28:59'),
	(3, 'eyJpdiI6IlZVeHY0ZmM5c2NINFpYeUNzamNFTEE9PSIsInZhbHVlIjoiY053Y2lsSFVuYXdrWnNQdExXOXRoUVBZRm1vb2ZPM3pVR1VYUFhtRjdHWTNjK2tlT0ZoSDJHbU5LbndKdzRITyIsIm1hYyI6ImJmMTFlNTgzMjU4Yzg4NzJmMTJjMGE5MzZkYjAyMTJjZDYwMzQ3ODExNzQxMTNlMmI1NTUwNmZlNzJjNjRkODUifQ==', 'eyJpdiI6ImkzT1RaTnVQQjlmNjMxV1RXYkVRL0E9PSIsInZhbHVlIjoibTYvc3FER0tFRm81ZnovcW5LTVpjZzhNY2V0SUxJWDJhWmNFSGhLeWNFUjl1Q3lJc2FOU0VlYWF4VEF3OS93ODZ5VWhxVFdtWnZGWFRwTHdqZXlHTFE9PSIsIm1hYyI6IjM3NmE2YjljODA3OTVkYWEyOWU4ODg5NTVkZDYyMmJiMTFkMDliMjI1YjY4ZGE5ODViOTc2MGViY2ExYjc2OTgifQ==', '2020-08-07 02:31:40', '2020-08-07 02:31:41'),
	(4, 'eyJpdiI6IlVBVFRxM0l4MWZyNUN1VmQ0UC9GQUE9PSIsInZhbHVlIjoiSVkrZ05sV0Z3dmR4UFQ0dis2MzF2dDZiTnRWU0UzNGRNQ295bE1CRXJqWnF4YktvRVhQN0E4RVQycXJoZHJ0bCIsIm1hYyI6IjIxODAyZjYyOTUzNzZhYThiM2EwOWJjYjM1MGNkMzVkNTY4ZjRkZGE0MWQwYzBmM2IxNjA1MDQwNDcxOWE3M2YifQ==', 'eyJpdiI6Iml3SDBlZEUxQmtxaDVIZmxBWlYvTmc9PSIsInZhbHVlIjoiQjd6bS9hUGpBbW5IUytaN3dvYzdWWk0rS3NLbHVVeHB1cE5rNTJ6dmNKVk84WTY4d214QWt6N0FDK01PeHMxZ2tnTm5sYjBXeDJuWXhYbG9mL1JKR3c9PSIsIm1hYyI6IjY4N2QzOWVkM2E3NGZjY2RhNzQ2ZDU0MTI5ZDNjOTViMDE5YTZhM2NlODExM2I5YTNmMTAzN2FiZGE1YjAwN2QifQ==', '2020-08-07 02:32:08', '2020-08-07 02:32:09');
/*!40000 ALTER TABLE `email_log` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.employment_list
DROP TABLE IF EXISTS `employment_list`;
CREATE TABLE IF NOT EXISTS `employment_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(150) NOT NULL,
  `item` varchar(150) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.employment_list: ~5 rows (approximately)
/*!40000 ALTER TABLE `employment_list` DISABLE KEYS */;
INSERT INTO `employment_list` (`id`, `slug`, `item`) VALUES
	(1, 'retrenched', 'Retrenched'),
	(2, 'terminated', 'Terminated'),
	(3, 'income_loss', 'Loss of Income'),
	(4, 'income_reduced', 'Income Reduced'),
	(5, 'reduced_income', 'Reduced Income');
/*!40000 ALTER TABLE `employment_list` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.employment_status
DROP TABLE IF EXISTS `employment_status`;
CREATE TABLE IF NOT EXISTS `employment_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(150) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `country` (`status`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.employment_status: ~9 rows (approximately)
/*!40000 ALTER TABLE `employment_status` DISABLE KEYS */;
INSERT INTO `employment_status` (`id`, `status`) VALUES
	(1, 'Employed'),
	(6, 'Other'),
	(4, 'Pensioner'),
	(7, 'Primary Student'),
	(5, 'Retiree'),
	(8, 'Secondary Student'),
	(2, 'Self-Employed'),
	(9, 'Tertiary Student'),
	(3, 'Unemployed');
/*!40000 ALTER TABLE `employment_status` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.error_log
DROP TABLE IF EXISTS `error_log`;
CREATE TABLE IF NOT EXISTS `error_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `action` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `exception` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.error_log: ~0 rows (approximately)
/*!40000 ALTER TABLE `error_log` DISABLE KEYS */;
INSERT INTO `error_log` (`id`, `user`, `ip`, `action`, `exception`, `created_at`, `updated_at`) VALUES
	(1, 'eyJpdiI6IlpKZFQ2eEZXMWdraEw1UjFJN0NOaFE9PSIsInZhbHVlIjoiL2tZVHRwMWhjaU1RalFaNDMxMmY1dz09IiwibWFjIjoiZDk0YTE2NTg5Mzg2ZDhiY2Y2NGU3Yjc5YzgwYmIxZDUzZDExYmQyOTY5MGUyMDFkZjFlMTM5ODg1MWMwZWE4YSJ9', 'eyJpdiI6IjgxUzcvTjVVTC9NSVZXdHpCWXdaN0E9PSIsInZhbHVlIjoiTCswOUI0S0tMRmpzZytMMlVuQnM2NDhWbkdqUGFwdjk2d1VoZ0lYUkQvUT0iLCJtYWMiOiIzMjUwOWExZGY2YzVjZjdiNGIxY2ZiZTc4MWNlNjYwMWJmOGQ3MmU3N2QyNDRiNWYyMjViM2MxZjIwZDY3NTY3In0=', 'eyJpdiI6Ikk4UGlSSjdEaVY0U2p6MUhZb0dMQUE9PSIsInZhbHVlIjoiQ0p0aldiemQ1ZXdob1MrenNWbXQ1T0RCdU9QdHkvUHhTRTlMQ0xucmltM2s3WUFPQzR4bFdrM3ZzK0NEOUdiUG5xMXdBc0FKZ2ZrM1BKRUgra04zcHZJSEllQWh3Ylh6WUV5UGVES1dLQ289IiwibWFjIjoiNTYzM2M2ZWU4MmY3YTdmZmNlOTI0ZmJmYzg5YzlkMTFkZTdhMWE3NGZlYjcwN2FiYTA3M2IwM2EzMzczMjI4MCJ9', 'eyJpdiI6ImFuYlZlYzZMdkdnYUlhYUw1cy8vWkE9PSIsInZhbHVlIjoiWnArdFJ0UFJWVzc2Y1VndlVzUkVvQT09IiwibWFjIjoiOWE0MTJiMDAzNWE3Nzg2NjgyZjU1ZTk3ZDFhYzE1MmFjMzRlNTAyOTYwNmUwZWExNzNmMjIwZjU0ZTEyNmVmNiJ9', '2020-08-07 02:41:06', '2020-08-07 02:41:06'),
	(2, 'eyJpdiI6Ik54SXJuRjVjaHk3c1V5bmlOVWthUFE9PSIsInZhbHVlIjoiRzBCeFVKZEk5b3VMNnd2RlFRUWYvZz09IiwibWFjIjoiZjFlZjRhMDg5NmZjYjA1YzAzZWQwOWY1YjJlNTNlNTVjNDBmOTQwNDM4YmRiMTBmYTc1MTI2ZGY2Yzg1YTk3MCJ9', 'eyJpdiI6Ik9Ja2tDK0NjUG5RMHdibTl1V2kza3c9PSIsInZhbHVlIjoid3JLbVA1Y1dIK1h4eWtlcllNRXVBMzl6U2pybnFGNjd4K3JvRHkzanhEND0iLCJtYWMiOiJlYjM3ZDkyYzU4NzJjZmY3YmI4ZWRiMTcwMWU2ZDdjYmRlYjkwZGMyMGFkYjVmOWU0NGM0ODQ4NjEzZWI3ODcwIn0=', 'eyJpdiI6IlFTR3grWDBUT0FCZWNha25OT1JlOEE9PSIsInZhbHVlIjoieDIxazZEY0FOOGR2ZnQ1MlpnZE1vbndlQ09kMHRDemp2cGdqVVBsMHZaN29BUzRIRUFPQUhkYlFvejZZdE41RyIsIm1hYyI6IjE5OTY4ZTIwOGNiNDJlMTJlOTJlNGRiYTI4Y2VjZTUzYjE5MGE4ZTk1ZWFkMDZlZDBkYThlZDBjMWYyMzQ3YzkifQ==', 'eyJpdiI6Im5YQ09Ca1pkMVBFVXM3M3RlODcxeGc9PSIsInZhbHVlIjoiaHFQVEF3UUVHWE1NNWJ3VDhienFXZz09IiwibWFjIjoiZjcyZTBjNDE4OTVjZTA2OWM4OTI5M2E0MjQzMjRmYTM3NDY0NjEzMWM1Y2E5N2RlYWI2NzNmMDYzZWY5ZTY3NSJ9', '2020-08-07 02:41:08', '2020-08-07 02:41:08'),
	(3, 'eyJpdiI6IjZvUXlXK3o4bXdHdERYRVh4aFI1bEE9PSIsInZhbHVlIjoib1oyQWh0ZFVYUXdFK25uakZsYlpyZz09IiwibWFjIjoiYjViYzE0NjFkMDc2MjNkOWZlZTRjNTI5ZjUwNmI2ZjY5N2RiZTIxMjNlZjRhZjI2OTM5ZjVkZjgxMjI5ODY4NSJ9', 'eyJpdiI6InVmb0ZTYldrSW1pVGRlRGJ6RTc1aEE9PSIsInZhbHVlIjoiN2JqVyt1cUM2MENlZlU5d3B2NXZ0cURqRFZMYVc0S0ZHMml3UVNIVjIrMD0iLCJtYWMiOiI2MGM5NTAxNmExMzA4NzBiYzJjYTg5ZDM4YjY1Y2Q3MDc2YzdkOGFjYWM2MWUzNTdlYzAwODkxOWEwNGVkM2IyIn0=', 'eyJpdiI6IkJYNFhJU3Vwc2t0NGtUR01RVEZPN0E9PSIsInZhbHVlIjoibW9YZmNaTXZOYUEwOTNTSDNhbmFGbllvc01yeHEwRlp0enEyRzBJZVNzNTg2YjI2cmtieERweGgwemFnTnk0UUQ1OU83dmhHc0hrOUZzVEtoNE5uQjZCRTEveG81SEJPQndYTlVBZ24xUlk9IiwibWFjIjoiNjFhNzU1YzA2ODcwYmNjNzNmMTAwYTkyMGE5MGRkNmQ1OWIxZTRjZTQ5ZDkwNTkyMTMzMWU0YzdjYzhjYmNlNiJ9', 'eyJpdiI6ImZNZUV2RnY1eHNsejhrZ2Z3eWdrcUE9PSIsInZhbHVlIjoiU1IvS0tWalNFb2pqTXNqMkt1ZkRkQT09IiwibWFjIjoiMTVmMDIxMGEyMmQ4Y2EzNTVjY2ZhNDJiZDVlZGJjYWY4ZDhlNzE5OWNhOWI4ODAxNDY2NjFhMmRlNTAxYmIwYiJ9', '2020-08-07 02:41:10', '2020-08-07 02:41:10'),
	(4, 'eyJpdiI6InQ5VjJEUVBJN2o0c3ZCM3JHUHFVcnc9PSIsInZhbHVlIjoiSktLdnphQ0M3ZXMwbmlPOUcxQklnUT09IiwibWFjIjoiNjAxOWYzZjYyZTE5MjMzYTNjMWMwYmQyYjhhNmE2OTFiNWUwODg1Y2MzOTc3MWNjZDY2NzMwM2M5ODE1NTk1ZSJ9', 'eyJpdiI6IjF6WUI2a2ZRUk5pSy9WRFBIL25qUWc9PSIsInZhbHVlIjoiY3VwUUgycEFZMmVJV1dnMlc4dGJSN1o3Q2xnL0J0VldlSmd4cS9lTE1oUT0iLCJtYWMiOiJjYjM2MGI4OTExNTVkNzZkNDk0YjU2MTllNWQ1NTljNjdlODBiMWVjYTRkMWRlY2YxYTcyNzUwMWFhNjkyODAxIn0=', 'eyJpdiI6ImZnT2JHTG5VanNlaE1Md3BEdVEwMkE9PSIsInZhbHVlIjoiUy8rZ0cva2VYc09NTFlkQk8ySUxDbGRiK0NjTDE3YXJ2ai9wMWJjTWl6bExRQmhMa1llMFdkTHpqWFd4MkloWGx3MjhlOWZPMzFQcmE3TDBNUm1vQW9YZTI3WFJIcW5qWVZFaGk0QVZYZDhyZ3RvazRIME5xOFYzMFlrem9ja1AiLCJtYWMiOiI5MDFhNDJlYjg5MjE2OTlhMDQ5NDAzYzdhYmY5YzU0NzNhYjU1NTk2YmQ2MjU1M2Q1OTEwYTQ4YWJlZWY2MWE1In0=', 'eyJpdiI6InhVOXNJeUV5M3FNM0JmblViOEVtWWc9PSIsInZhbHVlIjoiR0E4S0VTY2dWMTlZb2swZFZ3WTMvQT09IiwibWFjIjoiOWVkOWJhYjJkYzRkY2E4ZmQzNTA4MjY2MDI3NDRhYjE4MjZiYmI3ZmI2MmNkMzQ4NTcyZmIzMzgxMGY5MjRhOCJ9', '2020-08-07 02:41:10', '2020-08-07 02:41:10'),
	(5, 'eyJpdiI6InlJa0FIQkI3cWhENFdiak03aGlpUlE9PSIsInZhbHVlIjoia1dKbDJubncrdWRPSTdiWUovVXBmUT09IiwibWFjIjoiZWNlZjJiYWJmMGZkZjI2MjllODU3OGUxZWI3MjhjZDU4ZDg3MWNhYzRlM2IyNTY2M2ZjNDQ0MjY4ZWMyMTEwZiJ9', 'eyJpdiI6ImsrdGlJOTVxcVhoSU5EVEdXdkdnN2c9PSIsInZhbHVlIjoiUHZ4UitMdnRPSzdJME1XZDFHbWNJbUVZUUVTVnlaUjF4UVhMeUR4TXNlTT0iLCJtYWMiOiIzY2I5YjUwNDU0NTQ1Y2I1ZjNmMmRkYzIyNWYzMzRmZGFiNmJkOWE3YTNjOGMzMjEzODM2NTZjNWE4MGQzMmU2In0=', 'eyJpdiI6ImRWNW5OWDJ3MkcwYnhCdEFpOGFGRWc9PSIsInZhbHVlIjoiRk9vYXBHNFpzdUU0RzdYYjVBeFg0ZytLWFZIM3VjMXFKaFJJc1V5MW5PY01WYXNXRnQ0QW1HVDFTUVF3dkhOWU9xaHp2d2dsNGhmZHJ5VS9tY29TdThydnh1amYvU2ZLM3JlUWExL1NmaFk9IiwibWFjIjoiM2JmOGNhYjc1YTU0NDExNzg5ZTI5ZWU2MjRlZDU5NTNiYWM5Mzk1YzdiYzU4ZjY1MWQ2YzdlZDIyYTIwOTQ2NyJ9', 'eyJpdiI6ImxhbXlJbGtSYlBaZFdBQ0QzZTVvQUE9PSIsInZhbHVlIjoiMFBTaG5PdCtpemozMkRIZHlzREhzdz09IiwibWFjIjoiODVhYTVmNDViYjQxOWNhMzRiMTM3NzAxMmQyZDQ5NWI2ZmM2ZjZjOWYzOGE0MTJmNzlhODQ1MGMwODlmZTE2ZCJ9', '2020-08-07 02:41:11', '2020-08-07 02:41:11'),
	(6, 'eyJpdiI6ImQwTEF2Rld6MW9ONFNmN2U2OWVod0E9PSIsInZhbHVlIjoicDc4b2RENHhyZDJScnFZUnF6aXp0QT09IiwibWFjIjoiNWQyZGZkZjIwOWNmZDdjYzJlMDQ4MmJkNWExYjY1NzU5MDg0N2EwMjk3NzU3MGIxY2JhOWMzMGI3NDQ1NDhhYiJ9', 'eyJpdiI6IkJyVkNmV3RsUFhQSEYydDJIZkE5ekE9PSIsInZhbHVlIjoidjNhUnBYRFduMnNUcXZOM1ErVnk0Rk9xNXBXKzJMUm4wbHZhS2J1YXFNWT0iLCJtYWMiOiI3YjQ2NWU3MTY2ZDdiZmY1MWM5OTk4YjAyNjNmMzMwNDhiZWFiMDhlOTdhNzk4MWMyMGY3ZmI0MThmZTlkMWNhIn0=', 'eyJpdiI6InZQa0ZpRmNWMGlHaWs2ZWVaZnozL3c9PSIsInZhbHVlIjoiUERSd1NYem44MjhoaGJTZ3NXamF1WGdCNnYxSGRaTzR6cCtlbU4yQ2xvS0Y1M20xNU5RNVQ0cFoxQXVrRTFWT3dFbXNCMVo5RkM5OXFzSjFHdHJvd3B3eGpmYmZRTnlIWm10a1RIbThmTEp0N1NWL3FaWThSWVE2RTQ1WFlCMkQiLCJtYWMiOiJhZDBiNzI1ZDBiOTM2YTdkYTA5MjU3ZDcyZmQ4NWM3NzIyOTBlMGRlZDQyNzk0NjYzMjNkNzUzOTYwYjIyZGZlIn0=', 'eyJpdiI6Im5sUllsZno5YmI5VVlmSFdMOVU1VXc9PSIsInZhbHVlIjoiNUljOTZiSEdlYm85b29CWmZHRGhLUT09IiwibWFjIjoiMDQ3ZjhhMTJlZTVhYTI3NTRlYjFhMzM3NmE0N2M1YjU0ZWViYzdiZWVhZDg5MDlhNGI1Y2E0MWEyNWRlMDdiYiJ9', '2020-08-07 02:41:12', '2020-08-07 02:41:12'),
	(7, 'eyJpdiI6InR4dFJGaEhsQWl6eDZuZmx5SVpmUXc9PSIsInZhbHVlIjoiNStEU0czR3hySFRIbVJLOG5UenlCZz09IiwibWFjIjoiNzZmNjEwMDQ1NzEwNTNhZDNiOTFlMmEyZTczY2NlMjI3YTA1NzUwNzc0ZDhlMjU2ZGRkYzE2MDE2MTRmZjk0YyJ9', 'eyJpdiI6InI4V0pkclRQK0hsZGVNclcxcStyRmc9PSIsInZhbHVlIjoiVjJPbUJXeDNCV0lZQUFoWForR0I1VlFVMzBxUGVaTlIzR2R2WDJhS295RT0iLCJtYWMiOiJhYWMzNDI5NjY3MWEzOGY1NTEyMGY3NjdlNmRiNzNiMmY4NWYzZTJmNjgwMWQyNzJiYmQ3MWFiOTY2YjljYmZkIn0=', 'eyJpdiI6IllVUW5yL0Z6bmhtT2J6aXgzM2haK3c9PSIsInZhbHVlIjoiY1ZSTU8zblVmS0tUTExJUXNvUDFPSGU0QnpRRWhZRzNleGF4aVI0WkF5Qzl1YmNCeWlIbEs3VGZiZnllbWd0Z3FkZU9keFJUTjI3MmdJTEk4WXJvYkdMZ2NIdEhwN1lNZExrMW00T283bjQ9IiwibWFjIjoiMjI2NDdmMDNhODEzYzY5N2RmOWUyMzhlNzMxYzA4NDJkMWZhZTJjNGMxYmJlMWMzNWM3ZWY5YzkzNTk0MTQ2NyJ9', 'eyJpdiI6Ilh0OGpiQ2tFY2psbGQ5SWpxNmRWOFE9PSIsInZhbHVlIjoiMy84cnhxbW12WTFkS1lxdmFtZnpLUT09IiwibWFjIjoiMTRkODkzOWRlOGJmNjc3M2E3OTg2YjI3NjI3NDFmMjI5OTk0MmQ0ZjkyODY4M2QyZGJkNzRhZjVjZTNmY2ViNSJ9', '2020-08-07 02:41:16', '2020-08-07 02:41:16'),
	(8, 'eyJpdiI6Im80bmJvMW14U2ttOXRnWHJNeXl3MXc9PSIsInZhbHVlIjoiTXc1QlpIMkhpTW5DQm9QK2ZwQ21tUT09IiwibWFjIjoiZTliYzcyZTkzYzY5ZjU2ZTI3YTZkMDY2MDE4MWRhNDE0ZjRiN2Q5YTRjYmUxN2Y2OTBjNTVmMGJkNDYxOGI2MiJ9', 'eyJpdiI6InY2eEVMOWNId3JwdG1RZVFQWnc5NlE9PSIsInZhbHVlIjoiaXZIQS9Jcklud1JsWWp5R0dtakNIdE1VcEZ0VnhVTDB4bTN3elFrZWVHRT0iLCJtYWMiOiJkZTJiYzliNzM5NmZlNWRhMTMwYWE5YzA1Mzg5MjIxMWExNWE1Y2U4MjY1NDBjNzcxOWZjYTExNjYyMTgxMjJkIn0=', 'eyJpdiI6IkZqUU9zNEVjNkpNWXlVRjQvVkhRWlE9PSIsInZhbHVlIjoiN1hiOTFBVzlkVVFsZGVMQ2svOVV3VFQ2aWVNdElHc1BJZ1ZZc0ptVEVHL1FsdVByYjYzM0ZqVmxmZW5CVmtVTSIsIm1hYyI6IjE0MGU4ZjM3MjQ3OTViYzdmOWQ0MDE4ZjBkMmVmODJiYzJkYjgxOTM4MzY4ZWJhMDlkMTQ0MzFiMDM4MmYyNzkifQ==', 'eyJpdiI6IlhhMnBNclNaQUpiK3l1Vy91eEZmNUE9PSIsInZhbHVlIjoiRmRzeU5tYTdBbWNqVTk1M1FEK1J2QT09IiwibWFjIjoiOWE4ZjhmNTAwOTk5NDA1M2QxZGYyMzc1NjNjYmE2ZjA1YTA1MjgzYTA2ZWQxZjUwNmFmMzczOTBlMjgzY2E2OCJ9', '2020-08-07 02:41:17', '2020-08-07 02:41:17'),
	(9, 'eyJpdiI6IldxM0QvY1F4WkdobGhwNWRZUksvR2c9PSIsInZhbHVlIjoiVTNCZTFGV2hoamh6S3piUUxvTlpkZz09IiwibWFjIjoiNzI5MzllMmRhMzA1NDk2YjRhMjViYTJmNjZlZTgyYjZjNmY0NDgwOTIxYzY5NmJlMjRlY2I2NGM1NjBkYmU3MiJ9', 'eyJpdiI6IjFYSUgzOVpMTUhDQXZkSU9WK3lqMkE9PSIsInZhbHVlIjoiZlJKT3hVcEY4T0pheWZrRm4yaktNMTVrZU4wZEk1NWFHY29zQm5kR3N4Yz0iLCJtYWMiOiIwYWI4N2I3OTcwODEzYTkwMTA4YzI5ODQ3MjI5YWU5ODk5ZWZlYWYxOTUyMTk0MDdhMDA3MGJiMjM3MTlmMzY1In0=', 'eyJpdiI6IlNob3RVejVwMDQzZ1RNRFNkWG9TSnc9PSIsInZhbHVlIjoiR3Jic0lENHVDOUJMQ2wwUDNEV2x0cllqamhpQ2NxMDN2eTJGQTN3UmgxQkVML3VGaURyUVlYb3h4aE8rOHMyN3Z2NWJxZ3hTeFZIZTVXTUMwak5heXd4MmxhVEpjV2VUUmRyYVJ3eFNVQjQ9IiwibWFjIjoiZjQ4NjYxYzAzNWIxYmI2OTU1ZDNjNWFiMWE3YWRlNTAxMzc0OTM1YWU5ZWU1NzJmNjhhNjBiNTAzNTU3YjgzZCJ9', 'eyJpdiI6ImttOFFxWVNVMkdLMU9WQUt1SytOS3c9PSIsInZhbHVlIjoiV25IcWR5UEFvOFlPalBDamNPRFNwUT09IiwibWFjIjoiM2NkOGExY2ZjMTFlMzI5OWU5MzU0ZWEyOTZhNDEyNWJhNTQ3YTZjZjRlMjI2NDliOWQwNjAzY2EyYWZkNGZhMiJ9', '2020-08-07 02:41:19', '2020-08-07 02:41:19'),
	(10, 'eyJpdiI6ImMyZlRWSkROazlESUE3TE8zeDkzSnc9PSIsInZhbHVlIjoiclhkNEJrNDRVT1VUMTB5bWEzTmtNdz09IiwibWFjIjoiNzRiYjhjNTk3ZGVlNDQzZWU4NTYxZTI3Njg4MTVhYjUwYWU5YTRiMzlmNTM2MTcxODU3ZmRjZWI5Y2RkOTFjNSJ9', 'eyJpdiI6InFZRXRnV2ZyR1JrOFNmR1JTMGN0Q2c9PSIsInZhbHVlIjoiRTlDWEowMFZFY0IrTWhJOGlHUnNVSnpkd0MwNTFIUmp0NnNZamRoSlhDUT0iLCJtYWMiOiIyZTBmYjQ3MjUwZTVmMmE0ZmQzOTNmODdjMTY5NWE0YzFlNzdmYTIxODczMjY2MzBjNWRmOGZjZGE0ZmIxN2ZlIn0=', 'eyJpdiI6Im1FSEpCeHVlTVFMdmRlNERzWWdoU2c9PSIsInZhbHVlIjoicnhvMHZlUm9HQXNDS1JrMnU1ZGZScHFjdGsyUUJxMU5JNEFTdDFHRllPeklhYzJ1amIxOGhiMWdaSTBLc25uUVBiUmZQWlpVZ1JiS1Vwb21DUzdqc1d3L25SSDRva3NEdEg5dVMxTkFmZlQxb0VKZ1RZNnB5czVmeDNmQnhFR0EiLCJtYWMiOiI0NmQ4NmQ1NTZjMWQyYjEyNzgyYTc4ZmU5ZjNlMzVjOWM1ZDJlNzgzOGNmMGU1MmFjMjQ1MDcxZTYyN2ZkZmMyIn0=', 'eyJpdiI6Ik4vazk1Nzc1Vm9OTXMxNjU5SnBSeHc9PSIsInZhbHVlIjoiR3V3M2tRZGxYa2c3d0t2ZXEyUFdlQT09IiwibWFjIjoiOTAyY2QxODEwODcyZWVjODQyNWNhMzBhNzBiNmFkYzY3NGQ4ODAwNTcwMWRhYTYxNjIyOWQ3MTk5OTRkZDBhOSJ9', '2020-08-07 02:41:19', '2020-08-07 02:41:19'),
	(11, 'eyJpdiI6IjBNQXNIRzV3MFRsUTg4bGNxWHlGT3c9PSIsInZhbHVlIjoiaXAxYUJoL3pucTZMWnoranVIS3pBdz09IiwibWFjIjoiYjU4ZmJjZjE0YjI5NGRlZGNiMTM3MDE2YjQ2YjMyMzhiYTQyYjI0ODY0NjUzMzY5OTk4M2IyODc0MmFmZTc0OSJ9', 'eyJpdiI6InZCQktEVStVZ2xaby84cWRFaDVUaUE9PSIsInZhbHVlIjoiS1RmdmJHNEMxd3d2ZlNwV0NmZHV5N1NDZWcyV244WEdJN3hIUnpMcVhObz0iLCJtYWMiOiI2ODM4ZjhhZWJkYmViZjI4OWI0MzE4MDIwYTMwOGJjZjJiMTU3Zjc1YTEwZjdiMTIwMjk5MDQwZWM5MDkwYTQyIn0=', 'eyJpdiI6InBFQzZLR3phd1RqdGRRYmFya09rWVE9PSIsInZhbHVlIjoiSHAzRW0wRVZENzFKU2NVQkJzQ3VLenAycDA1VVJzSjlIWWVWQUFLYVVBUmlRVk4zbjNxRlA0LzEzNFBIRzRvUWswbW5WY0NrZHRvNm5IYm03WGp3c2ZvZS9oZ0taNE1RZGlyeXFYV1dhZ3M9IiwibWFjIjoiMGRjZmE3ZjQxOGYzZWE5YzQwZGE4YzBmNWM2ZTA1YzEwNTgyOGFiZmVhZGMyNGRmNmMwMjBhYTU0MzU1ODA0ZCJ9', 'eyJpdiI6Ik1YQ0szR2ozTjZ3Y1p1MnV1NkNxUlE9PSIsInZhbHVlIjoiWE1ZTEZqVXl3bENEQXkxZWVRU00vdz09IiwibWFjIjoiM2M3MWM1ODE4MDI2MTA2MDUyMDI0MDcxNDYyNjFiYjYyZTljOWZjMzkxYzQ0Yjg1MWI4NTZhMjI0MmQ2YzFiNiJ9', '2020-08-07 02:41:23', '2020-08-07 02:41:23'),
	(12, 'eyJpdiI6IitqVFd4dnJyK0NDaDRSeURSTk1KbWc9PSIsInZhbHVlIjoiVUxLSkFleDd3cnRsNlZlK25QSnY3QT09IiwibWFjIjoiY2YwNDk4OGIwMTUzNmZjYmE2YjliMTczZTI0OGM5Y2Y5YTQyN2UwYzUxNDQ3ZTFmMjIxZjNlZmZhOWQ4YjIyZCJ9', 'eyJpdiI6ImlSV0xTT1FXUTRtU0N0dm0xbGNKZFE9PSIsInZhbHVlIjoiS0p2TVpNWUVYeko1bE1lb2ZxRm5USkRPTW1QMnZ3MVc3Wk5Pd1BkT0VkVT0iLCJtYWMiOiJhNjcxOWU1OGFkOWVjYTA2NDdkN2Q1NzE4NDdkMjllOTZlN2FlYjdhYmE4ZmNiOTgyNDdiNGZkOTFkMmI5NGE2In0=', 'eyJpdiI6IjlEZHp4Y0RUTUZtam9uK1J5Tk8xUlE9PSIsInZhbHVlIjoiT0svYkVlcy9NMmxqSm1xS29XQU00YlhtTG9EQXJPZTZlcXRBY2ZtUTQ2cm82T3k0RW5jdk4yR0JaUGZaMlFIVCIsIm1hYyI6IjQ4Yzk1ODFjOTdkNmVlY2U3YzA5NWViNmFkYTU2ZDlkNDNiNzBmN2YxZTc4ODhkMGYyNTE4Y2ZlY2I4ODgwODIifQ==', 'eyJpdiI6IkdHNk0welB0Z1oxc3NIKzdQZzI5a3c9PSIsInZhbHVlIjoiVnViNmtXZExjbEE3UksrdVFZOW5FUT09IiwibWFjIjoiNmQ1NGJlY2E3ODU0NDUyNmM4MWJmN2VhZTU0NTIzM2Y2YWM0MTZkMDQwMGI5Y2E1MGU0M2RmMzg0MWU3MTRlYiJ9', '2020-08-07 02:41:25', '2020-08-07 02:41:25'),
	(13, 'eyJpdiI6IkVXeWhPVXRsRmJSU2V5Slp5U29CUXc9PSIsInZhbHVlIjoiaVJaL0lpNUYxS1FlSkFEdEJucUplUT09IiwibWFjIjoiYjI0ZDY1MzhiYjcxM2I4NTJhMWZhNDk1YzI3YzkxNzA0Y2Y1ZjQzMmE5YjIzNWQ3Nzc3Mjg2OTI4MzA1MzYyZCJ9', 'eyJpdiI6IlY0NGJNV3dydUsydGI3TWZVUmJwSEE9PSIsInZhbHVlIjoiaEw5bnhDa2w5MnFBVU80STRyN3h3eHowSG5QMXdlR2xGeDVEeHAvYk9EMD0iLCJtYWMiOiI0Y2U0ODA1ZmQ0NzYzZTc0YTM0ODg0OTJkMjkwOGY0NTkzNDIyZjIxNTMwMWViYzllZjU4OWE0NGM4ZDgzMDgwIn0=', 'eyJpdiI6IlY2SmdtQ05aOXlQS2dRQitCWEcvQ0E9PSIsInZhbHVlIjoiQ2t5V2ZRMXhjeDZLNWs0Ykt3WlhtTkhQTWwyOXIzQWk2MklseVlyaDlQMnRMbkhVb01GZmJSblZUdnZYc0sxNE5CNU8raGNyTklIMGJtd3pTTVRWSDZlcHZ5Mk1XLzBFRTBCNTRMakpoMDA9IiwibWFjIjoiMTg2YTY5MDk5ZTM2MjRmOTk1OTIzMThkNTI1NzE5MDJkZDI2N2U5Y2Y3YTJiMjY3M2M2ZWZjNTQ0ZjYyMzdlMiJ9', 'eyJpdiI6IjJhVlZkL2pNSThGcER4alBobVV6UVE9PSIsInZhbHVlIjoiNjBDTkRVRlNwR0VIQ0RmbzhqN0hZUT09IiwibWFjIjoiNDYyMjg4MDI0M2Q3YjM3MTUxZDJmZDZiOWY0NmM3ZGNhNmEwZGNhMjdhM2FjNDNhM2QwNTA0MmU5NzUzMTcyYSJ9', '2020-08-07 02:41:26', '2020-08-07 02:41:26'),
	(14, 'eyJpdiI6ImRWcWxIZHRYMEJOT2N1SGxrTVNycmc9PSIsInZhbHVlIjoidHNETGtkZ093bXVUbERzazJYTU1iQT09IiwibWFjIjoiZWEzZTYxZDMxZTE0NTg4ZGIxMGU3MmMwODMzZjJhYmY1MjcxZjNjZGI5YWZmZGU1NGQ2MTc1OTRmMGJhMDFlNyJ9', 'eyJpdiI6IldEWkNudHgwMDR2L0xzWGI1bkVYOXc9PSIsInZhbHVlIjoiZmUyeG44TzA3d2JMVnJLRlkrM1V3Q1RTVG5LbkxiRUtEWGxESktqWlFyST0iLCJtYWMiOiJmMDBmOTE3ODVlZDU5MTM3Nzk1OWVkM2ZhYmRjNGUwZDNjZWJmNGY1OWZmZmY1MGYxZDdkNmRlOTIyNTQ4ZThmIn0=', 'eyJpdiI6IlVwTHBkbEF1ZWtmaGJIZ0VsT1lyZXc9PSIsInZhbHVlIjoiSFNuRkFBdGNkMFdaZTF5QkFZQW9KWWNoS3diY3BEeDVSdVV1dFcxTkNIcVR6U3N1Ly9qclZaazNiWEpOeThrMFJlemJDeFpia1ZKbUlsUFVja0x6ckJlYUZ3VE1qQTNvYkFUQkxYeUJRZnN4RExNRmhSWDh2SFRyaVg2eUVSZE8iLCJtYWMiOiI5ODI4Mzg0ZTk4MzgxYTA5YmM5M2NmZmI0NzlkNmM5Njg1NTVmYWVlZjVmYTZlZDY0ZmViMDNiYjU3Mjg0MDRkIn0=', 'eyJpdiI6ImdsRjd0SmQxRUJsd0N2dTdLck5VdUE9PSIsInZhbHVlIjoiVDR0WWRucFo0TjBJTW9TaUo3ZU1tZz09IiwibWFjIjoiZWRlNWZjYzU4ZDMyMDFlNTc2ZTU5ZTY5NjIzYzg1NGI2YWQ1MTZiZWE2ZTE4NjA2ZjcwYTY0YTZlNjM2ZTM3YyJ9', '2020-08-07 02:41:27', '2020-08-07 02:41:27'),
	(15, 'eyJpdiI6IklmU2lQeFZ4OVB3QUcxcXZoVXNNREE9PSIsInZhbHVlIjoiaUJhWUFoZE8vODJwZ1oyYWp2TWZ5dz09IiwibWFjIjoiYjU5ZWYxMDBjNjg1YWY4OTQ5N2VjYWYyOTk3ZjA5NGVlYmRkOGM2OWVlZDJlNTZiMDMzNzI0ZjNhYzAzODc1MSJ9', 'eyJpdiI6ImpNYW90anYxYWZaV2Fhd3pyZUtmRmc9PSIsInZhbHVlIjoiWmFBMHdaQVFZanJVem9zWXkvS1B4dmVnNkJCY0xIMnpGMG1FM3VtQkRwQT0iLCJtYWMiOiI3OTBjZGViMGQ4NmY0YjAyYzJjZTc3NGViMjMxMjFmOWEyN2FlMGI3OGE2OGUyNWMzNTExNDM0YWUxMzI1NDBhIn0=', 'eyJpdiI6InhDM0p0WDcycnc1OXVxQ015dW1VNXc9PSIsInZhbHVlIjoiZEdzNEFiSU5oVnBJRFN4Nk53bXZXZ0dPdUdTRzk5NUE3U0IwQ0V1NGtuZ1RJT2pBdnhBSERzemV0eTdnMHQycUdSdjYxdDF0WStubElpMjY2b25BUS9NMzJkNGNlVDV6SzVtNmc4eVE0NG89IiwibWFjIjoiYWQ4ODQzMWFhOTg5ZmY5MDQ4NjgzOTNiOGI2YTVlZjAwYzIwZmI1NTU3NWRkOGY4ZDJjYmMyOTJkMTdmMDg1MCJ9', 'eyJpdiI6Imk1b0gzZ3AxYVJzVm9Vd0RRWUp6Q1E9PSIsInZhbHVlIjoibVlPY2p2NTN4U2JQempYYUp4K1dRUT09IiwibWFjIjoiNjU5NTgwYjZjMTdlNWI5ZjQ0MzZkYmVkNzdhYWIzYTA2ZDEwZGRmMzk3OWFmMzA2YmIxMjQzNDhlYmRjMTE2ZSJ9', '2020-08-07 02:41:37', '2020-08-07 02:41:37'),
	(16, 'eyJpdiI6ImlFd2NGTG85Nnc4bXNFOGR0c0lRUVE9PSIsInZhbHVlIjoiN084OGwwb3Z0ak13QlRNU3JaVURyQT09IiwibWFjIjoiNzdkMDYxYjhkNmE5YTlkYWUyNzUzYzQ5ZTI5NmRlMzY1ZmY0MzRiNmZlZmUzZjQ2YmVjODc5YzQ2NWE2M2VmYSJ9', 'eyJpdiI6IlIybDJYZFBaOUxIN1dsYjc3Z2dMZFE9PSIsInZhbHVlIjoid2RBRFBYWWF6dXhxVVgvSVo5dnVZU1FDVXBHYTlYc2NWMWQ4cFNBdTZCST0iLCJtYWMiOiI1ZmFmY2E0N2U1ODYwZDk2NTg4MmEyNGM4YWI5N2Q3ZWIzMzczOWQ4NWVmYzM5NThkYmM2ZGQ1MjRkNzcwMzhhIn0=', 'eyJpdiI6InIxTVBaYkJHeUlsd1oxTU5mdnNIa1E9PSIsInZhbHVlIjoiVndrdUlDbGpNSkdKTS84cVluTXBpZlNnL3hLKzVlbDY5TTFnS2FpV2FGUlNhaVk4V1hkOEdCT0REM3psN1RXS3ZFUXk4UXdBNDE5eUtJVTdoNXFWOHFXK0ZqNjJ4T1AzenhTNmZkOVVSa0E9IiwibWFjIjoiYWVmMzQxMGI0ZTIwMGYwMDFlMGE5NzI2MDE5MWNkZTM3MjgzNjI0ZGUwODNhZjdmNjJiZTQyY2Q1NDI1YzA5NiJ9', 'eyJpdiI6Im5KeGZZYlcvZnNENFhsZzBPUU5JTVE9PSIsInZhbHVlIjoiZnBuVFduZW1RNzN3bUJXVitKNmkrQT09IiwibWFjIjoiNWE5ZjM3YmQ4ZTJlYmFjYzVjNzRhOWI2ZWY3ODNmZDBhYmJkNTkzNGI1ZDM0ZTQwNmE2MmFiMjFlYTYzMmRjMyJ9', '2020-08-07 02:41:39', '2020-08-07 02:41:39'),
	(17, 'eyJpdiI6IlZ3SzQzdTZDZ2VaeHJRcjlhYnQ0ZHc9PSIsInZhbHVlIjoic3dCbnQ2eE9jN3BqZ2ZvTXJWOTFTZz09IiwibWFjIjoiM2ZmNDRlYWE3NThhMGM0OGQ4M2RlMTAzODgxMmY3Y2U2YTRkYjM4N2JjNGZjNWY1NDlhODhjOTc2NjY4YzExZiJ9', 'eyJpdiI6Imcyby9BNG0rZlFXQ1d1cWYzVGNuekE9PSIsInZhbHVlIjoiL1hmUFA5cGl4azltTVhGYVB5a1I1ZU1TMnpTUE1CVnFkS1N1c3Y0NE16cz0iLCJtYWMiOiI2ZTVlYzA1ODBjYTk2ZTYxYjAxZDEwODY1MTEzZjkxOGZlZjFhMTlmYzUzZTU0MDkwMzJiMDg3NDRkNGFmMDc0In0=', 'eyJpdiI6IkRoWmFiZXI4MEo3NHh4ZXg0cFg2ZGc9PSIsInZhbHVlIjoiME90WkJrZmZmNGJ5RWF6R01pdit6aWdJOEFkZ0l4TERuSHVGbUVBa3VlVzFRSGVTamFGclZmb1V2ODE1NFlwMVlmNXcwSUF5dEIyZEtURW5Nc3hvM25rbk55Qk13L0QvT0dFTHJSa1d2UnpIQml2azZhV1JZZlJ4Uk15dmI5VHQiLCJtYWMiOiI1ODk3MmFkODNhYTM1NTkxOWJiMTI3YjczZWE0NTg4NzQzODFjMzZmZDA4OTI0YmQ2ZTgxYzk2ZjRhOWYwNjJkIn0=', 'eyJpdiI6Ik5FeFlDcVhXbTB5dlBmSnVmTjNZR0E9PSIsInZhbHVlIjoiUElkWll6U2VjYzU3N0JjelBQMFlvQT09IiwibWFjIjoiNTkyY2RlZjU4NGFmNDE0ZTFjNzE3YTBmYTRhZjBlMTQ3Y2Q3YzdiMmNhNDI3ODQ5ZDNmZTY0MWFhOTJhNzlkYSJ9', '2020-08-07 02:41:39', '2020-08-07 02:41:39'),
	(18, 'eyJpdiI6IjQ0QzZoSnpUNktpQnhtQStFRFpobmc9PSIsInZhbHVlIjoieDFveUlVOVNHbVUvZmd3eGdYN2lsZz09IiwibWFjIjoiZmNiZjRlNzM5ZjI2NDU4NmU2YjA4NGRiMmJhZGZmMGIzMjZkNDBhMmE2MjFiZjRlYWM4ODk4ZTFlYTdhYWZmNyJ9', 'eyJpdiI6InZUR2t4cEhaNDFIbCsyYlljZUgwMHc9PSIsInZhbHVlIjoiZnJZQWIwZzZ6UEJ4VUJtWTNOam1vSXVtSW56cXhOVlZ5TnRFYmpUQnYzZz0iLCJtYWMiOiI4YzgxYTMwNDQzMGJiYjY3ZjZkMTMwOWY2YTE3ZTZmZjg2MWQxMzY2Mzg3ZTJkNTFlODI5NmEwMGRmNWRhZjc5In0=', 'eyJpdiI6Ik81NWpKYUlUOVorTERZcDVnb3I2ZWc9PSIsInZhbHVlIjoiMWZpSDZyV2UrSjI1eWNiSVlWSXZsYmd0RXpZM0FqWitjZlQ2QTRUTHE2a1Erek91U0ViSVcvMHpZK21WeVo2MG5kckFkNnlNZ3hsM3NuK2xBQWU3eFkvRityMTFvK2J1R0xRdUxnenpZNzg9IiwibWFjIjoiYjQyMjE4NmM0ZmExNzY2ODYyYzg5MzgxNmE1YmFjMDA0MzY0NGZkYzVkZDk5ZTEyZjBhNzBlYjgxNTljMTA4ZCJ9', 'eyJpdiI6Ikh2VFJzTGdmSlR1TXNZU3NldkRmWXc9PSIsInZhbHVlIjoiaTI4MlAvOWZraXp3bEpNek83ZXVVdz09IiwibWFjIjoiNTZkOTkxMjFhOTk4N2E0YjQxYjMyYjIyZWZmMmRmZjBjZDA1NjQ1MDM4NmUyNzVhMTRjYTI3ZjJiNjAzNmE0ZCJ9', '2020-08-07 02:41:41', '2020-08-07 02:41:41'),
	(19, 'eyJpdiI6ImRpS1AyTmdhNmszSTVFQ00yUkRpQUE9PSIsInZhbHVlIjoiM2NYUTFXUVVMTVd0WHAvYzBYR2tkZz09IiwibWFjIjoiYzQzMzQ4Y2E0MDRjZGJhYmY3MWZkNjk5ZDQ2ODkyZjgzYTAyNTIzNjQ5MmZiZTc1YWJkOGM2ZDExMDIyOWNlYiJ9', 'eyJpdiI6IlVnQ24za2xrRk9HblFpWWlOZWMwVEE9PSIsInZhbHVlIjoiT0VyemQ1KzNUby9zK1hFNnlVSE5kY2wxcGo3UWtFazBMR29CZVJ5dDlPTT0iLCJtYWMiOiIyZDE5NzRlMzNhODMyYmMyNzdlYjJhYmViYzc1YzVmZGViNTU2YzRiZjUwYTkwMDIwYjNkZTU4NTRhNDE4MjRjIn0=', 'eyJpdiI6Ilo2OVQwMU9TTTFubDRwQXFjdE1ubmc9PSIsInZhbHVlIjoiYjF5Y1JDQ3czT0YyTUR5OU41SW9hckFGT1Z1cmVvaUlUTGZkWi9rRm5EWmw3cUtZQ1RqU1pnQ0tLdzNMN3o1VGxjRVA2VWRhT0hDeVVlSFVQZTZGTldUQnQzVXNzQXI0dXhYclIzT2lKNVRUQzdtK0p1ZWo0aytuWWh1SUExNmgiLCJtYWMiOiI3NDYyNDJjM2FlZWZkNzkzOTFkZDkzYjExYjgyOTA1ZDNkNzdiOTE1MzA4OGZmNDZmZWM4MzEyMzVmY2ZhZjA0In0=', 'eyJpdiI6IldzN0ZmSXlkdzU1WkYvdjUyaUI0Z1E9PSIsInZhbHVlIjoieWYybzZHS0w2WjNzOG13a0NzL1dpQT09IiwibWFjIjoiZGZiZGNmMDE0YTNjMWMzZWFlNGJkMWQ4ZmUwYmFhNTYxNDllZmExZWE3NmUyMjkzN2IwMTNmNmEyYTc2MWU3ZCJ9', '2020-08-07 02:41:41', '2020-08-07 02:41:41'),
	(20, 'eyJpdiI6Im5ZUml3UGdEMnZZOEFCd0twaU5KSHc9PSIsInZhbHVlIjoiblFVWmdHYS9GTEltODhGclFQTnJ3Zz09IiwibWFjIjoiNzZiNjM4MTgxZTg5NDhhMWE5ZDhmM2MxYmY3ZWIwMDRiZDNkNWE3YzBmOTQxY2Q2OTViMDc1MDUwOWI3MTM2OCJ9', 'eyJpdiI6IjROM3M0Z3Z2dlVDZG5ML0pxQW9FU3c9PSIsInZhbHVlIjoic0NVRWxpb1ZjSmRhOWNmTmk0dkRNVjdJRlgvQmQ1ZVZKQ21scFFxL1cxST0iLCJtYWMiOiI1ODExNTQyOWNhYTNjZjY2Mjk2Y2JmZDE1NTQ3YjBkODIzYmQ2Yzg4MDVlYjRhZDc4N2JlMjdlYjdiYzRjZTM4In0=', 'eyJpdiI6Imhrb2xkOC9JUDQ2S0Q3S1JpSDArMEE9PSIsInZhbHVlIjoiWTZJNXNidWIrT3ZJcHpqcVFSWERYOUJ2dUFVbENVVklCcW9pWmlBQUlkZDQ1bTRxcDVIL3QrWml6SS80SWdoKyIsIm1hYyI6ImM5Y2Q1MmI0YWUxNjNiM2QyNjljZDRhMGMyZTEzNWMxMDE2NmM1MmNjYWE1YWFiNGIyOWE2ODljNjQzOTZjNzkifQ==', 'eyJpdiI6IndOVEtKTUdmaE1zeStlNUx1Tk9VSXc9PSIsInZhbHVlIjoicGtva0xWa0sxV1pWc1pwazFic0s3TEd3SitYVnVPL0w3YWdROVJRWmtudz0iLCJtYWMiOiJjM2FjMzkzYjg1NmI5YTI4MmY0YjIzZjViNmUyMzRmZWEwMWNmNDU0ZTk5N2NhYzA1ZDliYjMyYzdjNDAwNWM3In0=', '2020-08-07 02:41:45', '2020-08-07 02:41:45'),
	(21, 'eyJpdiI6InQrK3YxUmR0UG15VzR0RllIZWRRa2c9PSIsInZhbHVlIjoiTEQ0RHJwN2pJdTRSSllFVGx5bmdYdz09IiwibWFjIjoiYWRjMTkzMzUxYjczZTY4YTZiYjQ3Y2NhMmRjYzdhYzUxMmVjMWYzNTExZWNmMmNhNzE2Y2IzNDkxZWNlN2NlZCJ9', 'eyJpdiI6IlBuYnE2QUhwcm9XRGYvM3MxaytZZWc9PSIsInZhbHVlIjoidXRIRUFGUnUwcG1uaEhyRkcrNFJtMWNESHFlbVpIYUhuK2MxYkd0cjVmbz0iLCJtYWMiOiI3ZGQzMmU5Yzk3ZGU3ZTI5OTQwM2Y2NDFhNjQyZDBiYmQ1MmYwYzk4YzkzN2JjYzkyNDNmZjc3NTgwMjYwZGUzIn0=', 'eyJpdiI6Im5nM0VLQWZ0N3N4UmtlUkdqeWJYblE9PSIsInZhbHVlIjoiRitwU1lYbXJzd25EOG04VzRJcHE5UW5jaXkrMnhUWm42WXZJU3EyOVMzOHhGcjBjalFHU0dZd1lhMnRqS09PSkpUdFpjUW41RHk2T1ZHN1NCTEdrVjVhZVFyMFB0bjhOamxEZVkyaWNBTlE9IiwibWFjIjoiYmZmMTE0MGMzZGMxMTJmZWFiZWY0M2Y5ZTFjMGY2YzkxNGMxOGNmMTMyNzY1ZTc3NGMxOTdlODUyNWU4M2EzYyJ9', 'eyJpdiI6Inc0ZzFhY0ZOQXVtOEdZQldyb0RLekE9PSIsInZhbHVlIjoiMzhuYm03NHl3MEZ0NzZqN1UzMHlQUT09IiwibWFjIjoiZDY0OTYyMWQxZjg1Zjg0YzE3YjIwZGNkYzJlYWFhNTYwMGFkYTA1MDYyOTZkYmNlM2NkYjhiZjlkNDg0Y2E1OSJ9', '2020-08-07 02:41:50', '2020-08-07 02:41:50'),
	(22, 'eyJpdiI6IlhXVlExeitxbE1Md1pTUUNZeFRETVE9PSIsInZhbHVlIjoieHowbm03TFBVYy9mU3BYdUtKdFBuZz09IiwibWFjIjoiY2NhMDM5NDVkNTFkNzk3NWViNTY5ZmI1YmM2ZGI5NzhhM2FiZTU3NWFkY2U2YTliZDc1NDRiMmI4Mjc2MDFlMCJ9', 'eyJpdiI6Inh6RVdGRG5INHozMWg1cEJuVjhaN2c9PSIsInZhbHVlIjoicmhjQ2drS0t1UFZsSG91MmFvNzRidXMwKytORWFmR21CK1FYa1ZqWkpFWT0iLCJtYWMiOiJmNmJjNzA5OTMwMDNhOGQxMzQzZTE5M2M3ODM4YjRkOWE1MWJmZWJjZjlhYTM5YzRlOTMyZmQ3NjQ3ZDJmM2IwIn0=', 'eyJpdiI6ImExSGVyYnljZXhTRzAvVkc3Y3ltS1E9PSIsInZhbHVlIjoiRU83cG9paG9CM1ZLb2pqTmtzY2VWOTMxMzBhUDBDeDhCbGNPV1R1R1FYam56cjN0aW9ZcyswOWc1MTJKWm5ydWt6Y3lpZGZGbk1qaDl3SWVMcHh2SEdVN0Y1VnU0ZUV1T3VSNmk5TGtvN0E9IiwibWFjIjoiMzI3ZjFlZTExNzIzMTNhNDZmOTYxZWU1NjI2YTdiYTgzMGNhYzZiMzI2Yzc1M2RjNWUzOTQ0NmI4OTI4ODQ2ZCJ9', 'eyJpdiI6IlRXdHJYUXdleDRwY1NsRURaT2t4RlE9PSIsInZhbHVlIjoiK05TRHp3Z1hEUS80Z0JjbUlwcHdzQT09IiwibWFjIjoiZGY3ZmFmYzVhM2JmMzdjNzA2MGEwYTQwOTU1MTQ0YjNjZGMyNjgxM2UxOGEwYTdjMGY5OTk1NzhkN2QzMDgxYiJ9', '2020-08-07 02:41:52', '2020-08-07 02:41:52'),
	(23, 'eyJpdiI6InFaZWJGSzZDRGdMakF3bytTVHBsK1E9PSIsInZhbHVlIjoicmltNmt3bi9wWEF6MjlwR1BpdVlvUT09IiwibWFjIjoiMDgyMTYyNTMxNmQzMDdiZDMyMjljOTNkYWI5YzI0Y2E5YmI1MGIzNzZiODk5OGM4MTI3MzZhZTc1YzhiZjgyMiJ9', 'eyJpdiI6IkpnNVpZVjRHMDRVOUVqZ0ZzaHVUNUE9PSIsInZhbHVlIjoieFIyTEV6R2x3bFpvbDQxenJuRnVxRUt5Y3pVS1l0Z3R2bytHWXByQkRCdz0iLCJtYWMiOiJiMmI2NjA5MjZiNzRhZmFlZDM2ZWI3YmQwOTQzZjhhNzc3MGYxNzdkMzAxZDUzY2IyYWJmMDY2NjMyMjQzOWVmIn0=', 'eyJpdiI6ImR5OUFsVSsxQ3RYcHFxc3Q1MW0wTEE9PSIsInZhbHVlIjoiUUVuVnBHVTZGQkN2ODhjMjdjeWpnUGNiajZVRzMwdUVwUWZCZ2pZZU9PU3B3enQwa2U4dzZBb0RWT0ROY1FnSjErVy9lcXBacDdLR2pubnBwQ1cvTUNYT25Ma3ZrVW80bVErM2dBVzlDODNZSXVaZkhKUFpMMzltdUN1bUpPbzIiLCJtYWMiOiI5NDBlMzc1MjgyZDkyYTc3NTlmMGM3NDNhODczY2Y4NWMzZDRmYWI5ODNjMDFmYzlmODg2ZDgzNmEzMTVkNjU4In0=', 'eyJpdiI6ImhlN0pzelNXWWtNZ284QTZnbDFpRWc9PSIsInZhbHVlIjoiUnllTGNoQXVYWHhoVWhjN1drVDN3Zz09IiwibWFjIjoiNDU5OWFjYjIxZTM0ZDQyNWNlYzdhNDM2MTJlMmI3ZDIyYThhNTNkNDJjNDU4M2I4NjUxMGI5NGIyNDhiOTQ2MyJ9', '2020-08-07 02:41:53', '2020-08-07 02:41:53'),
	(24, 'eyJpdiI6InJyemJ2WVVnMjdabTMzejRXOGlKUUE9PSIsInZhbHVlIjoiaHpPYzNabFc5Wmh5aXg2OE9UUVZYdz09IiwibWFjIjoiNWY1NWI0MWE1NzgzNTM5ZTc4MjI3N2Q2Mzk2NDU3NzBhMGJhMjNkMzA5ZjUyMjRjNjZiNzZlZTkyNzY4MzA1NCJ9', 'eyJpdiI6IjVQSmJobHo4emJRNE55UHNBL0krZGc9PSIsInZhbHVlIjoiWXY1VityM3hvcEREWGs0YTZwNUZhTEZTd2ZRM2tTM1BvdHF2K2VjekZGaz0iLCJtYWMiOiIxMWQxMjRlNzQwMTc4NWIwYWU1ZGJhMDJmZWYwMTUxYWY2ZTlmNzMxOWI2Yjk4MDBiZmM3NWU2Mzk0MDNjYTkwIn0=', 'eyJpdiI6IjRxNkR4d3NLNTBmY3dmSUx3TmhvYnc9PSIsInZhbHVlIjoic2M4T2haNVRYQzU4ellZNW1FRERUWGNBbkovS01NRWNDNXFrS05UR01aaUthZ2wxMWtCMm5LMDhSdUc1NzVxalVib0Y5ejBkYWxtQUJ5V0luMXFtK1paQ1JMVmhnRmlyaGd2OHFGMmhMUkk9IiwibWFjIjoiMTdkYzljMGQyYWQxMDJlNGFiZGNhZGRjOGY5NzZkODFjNzliMmE5YzM0NjdhMGFjYmJmMjAxZWQ2NWNmYjhhMiJ9', 'eyJpdiI6IkZwckFrVmdKcmQxNllrWFk4cVF4cFE9PSIsInZhbHVlIjoiY0t2QWdWMjk2NVFlbTBrM0pGa3lGdz09IiwibWFjIjoiMGViNDc5NzM5YWFmYWYzMGE0OTlkNGI0YmVhZGJhZmUzMTNhMWNmMzdkNGE2ODAyYWJhYmYzNWQyZDQ1N2I1NyJ9', '2020-08-07 02:41:54', '2020-08-07 02:41:54'),
	(25, 'eyJpdiI6ImczbWpXMHNRbHVXQkJ3bWMzbVJDOVE9PSIsInZhbHVlIjoiZFo4dnZ3U2pBM3BIaXBFWlY2VE5zQT09IiwibWFjIjoiZTNhMjBhNWQ3NjkwZGE5MmM4ZmNmODI5MTc3NjA1MDc0ZGZlNjE1NmE1ZDBlNTI3NWI4NThlNGI0MDkzNDQ2NCJ9', 'eyJpdiI6ImNEYUFZOENlTGZYemJwMXhvRDg4b0E9PSIsInZhbHVlIjoiUGhvMTNkTk91eTJCS3JMeFB1TlpmbURMSGRya054bC9EcXR0NXRhYTRvMD0iLCJtYWMiOiIwYTUxNjk2ZjliNzQ5MDk1MmE5Zjk1NjA5MjUxYThiMDMzNmRlOTQ4OGU3MTk4OGM5NjY4YmNjZjE4OWIwOTI1In0=', 'eyJpdiI6IjZxV2JPMVBVcDdYazFoVDBrWkpkcXc9PSIsInZhbHVlIjoiVGZ3V1NRT0dKNTNhZFZJUnZzamc1MENwanNVd1hyeFJVaXJLRitkL1pqcTF6anNwdmxqaW80UHZqTWM1Szk3SHlmYlp3blFCaEUrdnJCNGFmU2hETlVKZDhhNGl0MmFaSEY3NWZrV09OMEU9IiwibWFjIjoiMmJiNDU4OTAxMzhlYTUzMmJlYTVkMTlmMDEzMTUwYTk1ZDQ5MmQyMmZkNTY4YmQ1MzE5OGFjYTdkMzM0N2U1OSJ9', 'eyJpdiI6IitsQ0J2L0J4YUp0U2dsZWtaMUp0YVE9PSIsInZhbHVlIjoiN2pIOVhDWGpUL1BBRVlrdi8xUWt0UT09IiwibWFjIjoiZjYxNWYwZTYwOGY5ZDYwZmM1Nzk3OTE5MzcwYTE5ZTE0ZWI2ZmExZGM2MGU0NjEwZmU4NWMyZmQ4OTczY2Y4OSJ9', '2020-08-07 02:41:54', '2020-08-07 02:41:54'),
	(26, 'eyJpdiI6IlZ5YVZxOHpVRTZ2UXFjejB0QnFHYnc9PSIsInZhbHVlIjoidDZMRFVHc3lINEdGNlJvN2xEWC81QT09IiwibWFjIjoiMjg2ODY2ZDQzOTYwY2E3YWI1MWUwM2ZiMWZjMTVhYTJlZTJmMzNmMDJmMTk5MDc3YTIyMDhkNTYzYTE5M2YzMCJ9', 'eyJpdiI6Iks2bkRiWjFvZ2YrUXhxNjhSc0E5V2c9PSIsInZhbHVlIjoieHArbjZjcnpLOG45NC9rS2duYkxEMUlyWXA5ZmpWQXFCMkErWmR5ZVArbz0iLCJtYWMiOiIzNjBmMjU4YWUxNmYxNmRlZGFhMmU1MjM5OTI2MTI4OThiODBlZGRhYmM1YjQ0YjkwMTNlM2M1N2ZhODcxNjRiIn0=', 'eyJpdiI6InpvVWRZWE9pTExpNWtSdU5XNWVVdXc9PSIsInZhbHVlIjoiMWwvR0pSUllyRWtlUDVqTHhEOStxeGdyN25XdDdBL3l2cURHcWRsQzRrSkZuOGRpanhLczI0eElJb0ZUK2toRGllNUh3N2NvZWdyK3pML09USDRRSU5VWVlhUjFjS1I5WnY1d2lEUGtpdXNzQ1BMcUpRMWZlSXJpNStVeVRERDciLCJtYWMiOiJiYTgxMDYwYTVmYjIzYmE1NzI3OTg0MmU5Mzk3MTYzNmNkZjhmYjlmNTNiMDFhYTVlNDIzMmUzNTZiMWFiZGQ2In0=', 'eyJpdiI6IlQ1eE5pUVJJZytMMXlOa0ZsRVZGcFE9PSIsInZhbHVlIjoiRWM1NEpQRXUrYkdrcTZ1dEJqc09wQT09IiwibWFjIjoiNDgwMDA4ODJhOTA1MmQ1MWIwMjM3MzU5MTgzZjc1YTFkMmY1ODY5MDI5OTZmNTkwNmIxMzM0NjFmZTBmM2NkNiJ9', '2020-08-07 02:41:55', '2020-08-07 02:41:55'),
	(27, 'eyJpdiI6IjhkOHA0MjBzdlJuM2F6ZThDYUhTVlE9PSIsInZhbHVlIjoiVmRvTFg1TnhhczVVYUdvazJLdGk1dz09IiwibWFjIjoiN2M1NTk5NTBmMDY4ZTM3NjJjM2I3NDYzMGIwMTFhNDM3NTkyZDc0MGQxZjI1YzBhNDIzNjg5N2U0NGJkZGUwYyJ9', 'eyJpdiI6IkFMU2x4YWEwZUh1QkMxUGVjbzNWRlE9PSIsInZhbHVlIjoibUllNEQ4K2RyMWRadnROUHhDQVJjL0VYeHZRazMySUVHc09KeURHWTlraz0iLCJtYWMiOiIzOTZiNWQ0ODFkNWZjYmZmZTFjZTM1M2UwOGZmZGQ4MGQyY2FhNzEwODJhYTM2OWJjZjAwZmE5NjFhZWQxYWRmIn0=', 'eyJpdiI6IkZkNUNlNktqaXFFNkplODE2S0VIZ3c9PSIsInZhbHVlIjoiVkRSSTE2R3hQMEhCQ2M5K3J4azFxWVhiVk0wMHlZazY2ZmRXeEJiZThJZUpmTGNiRnRkRS8wYnMrdCtJR1liM0RBOWI1QytZT1R4MUNreGVYamUzaXVDcEF4cWpVYjNYNUtjMS8rTWdRK3c9IiwibWFjIjoiOTAxMGQ0MTQzMzAwNzAzODYyMTBiMzI3OGQ4MjFhNGFkOTJmZGE2OWQ2ZTRlMjg0MDY3OGNmMzkzMTA3MDExZiJ9', 'eyJpdiI6IkpMODZ0Tkg3WHF5bURmRnBwR1NpVnc9PSIsInZhbHVlIjoieXdhbUZtd3ZsTkNpZTh5TVFYMHZ4QT09IiwibWFjIjoiNmEzZTI1YTRhNWE2NTFiMmY3ODA5NGYyZTM1NWI3ZWVkMWYwMDViZGIwMjk1YTQ3MDEwMzkxYzAyMTZhNzk0ZSJ9', '2020-08-07 02:41:56', '2020-08-07 02:41:56'),
	(28, 'eyJpdiI6InVrdStiQit5YzQxYXNNbG5vSmhMSFE9PSIsInZhbHVlIjoiRytQdGlQVWEzUWt5Z3EzNVJadTQvdz09IiwibWFjIjoiMjU1OGRjZmU5NWQ1YjZlMThhMTA1MDM1MzBmMTU5ODc0ODRlZDMxZDQyMzI5ZmY4NTQ4NzY5OWUyYWM3MDBjZSJ9', 'eyJpdiI6ImhLNWFYbUs2Zzd0Y00ySGpYQW4vK1E9PSIsInZhbHVlIjoiNC9MWlpTT1krMlkvT1RDQ2VjZERkUnJXbXJHNjltYkw2S0NmRXZlNnBaOD0iLCJtYWMiOiIwMzg2YjliMGZlMDM5OWIyY2Q3ODlkZjdkNGU2NDJmN2ViZjhjM2U0Y2NjNzkzNTA3NGRkYjRmMTRmZDA0MWY2In0=', 'eyJpdiI6InBYWVdVSmRZU3d0SmRxQ3ZSWDVOc3c9PSIsInZhbHVlIjoic0xvWEtBOWp6N28xUmxzWXE4UWpMZzQzZ2Yram0wakFvN2VRdm5GTjZMSUtIb2hyMHJCWWJVanQ4Unl1dWsydW1wY2xyVnRJMWFCTmhNMHBsbWhla1c5Q2lIOHZhd29aVWJRN3NIc2d2Tkk9IiwibWFjIjoiODA0ZDhkNGY3NWVkNzk3NGRmNTZiMjQyYzgzZmIxN2IxOGMzODNiZTI3Y2ZmNTQ4YzYxNWQ5ZWQ4Mzk0YTI3MiJ9', 'eyJpdiI6IlBLNkV2bU4zWWdpaTcyY3RFak1KTGc9PSIsInZhbHVlIjoiYU55YlcrK09jWU53eTNWQXRENEJSZz09IiwibWFjIjoiZDgxMzdmZTY0NjMwZGVkNzgwYjk2Yzk3YzYyOTk5NmJjNDJjZDMyNWQzNTA4MWRlNzA0MjM1NmVhYTRkZTFmNyJ9', '2020-08-07 02:42:04', '2020-08-07 02:42:04'),
	(29, 'eyJpdiI6Inl1RG9URjQxVmxaOEtUWTVmSlBRenc9PSIsInZhbHVlIjoiVlAzV0dST2hFaGxXbS9TalRtdkl3UT09IiwibWFjIjoiZGY2ODk4YWNkZGUwYTVmMTBhNmVlNzIwOTU4MDMyMzMxYzYwMWY1ZTVjMDhlNGE5OGIwNDBhODgyNTcyMWY0MyJ9', 'eyJpdiI6Ikx3Vkl3TEZ2Wm53MjgreVlqODVFR3c9PSIsInZhbHVlIjoiRFhvM3Awb0IrbEtGS0FHYllmc3Q0MEN4T1NNU29zVWt3M1k3ZG9kVWdROD0iLCJtYWMiOiJiMzRmMzViZDIwNzJjNTU1YmM5YjI4NWQzZmRlOGU1NDBmMjdkMjI2MWZmMjg4NWJhOGIzYzE1MWQ2ZTM4ZDU1In0=', 'eyJpdiI6IitqVzdLakdiaUZORUorRTY1Mm9KdHc9PSIsInZhbHVlIjoiSnM0M2VJenRWTUtKQmoyNE5xUmllemY3TXA5dkt3SlZ5TmhZMGllUGNQeWJvRzNNc3BNRTBPc21BVVhTNWtRdSIsIm1hYyI6IjI2YWFkYTFjNjJmY2Q5MGFkNmVhMGRhOTFkNzZiYmJlZmYyMzRhOTMxYTE0NDA5Y2U2ODI3MjY5YTIzNzg5M2IifQ==', 'eyJpdiI6ImJ5bG5ZSHhkR2RLN014ZlZOSlo1dFE9PSIsInZhbHVlIjoiNXpJTkdUcFk0dU5vMkIyNXdndSthdz09IiwibWFjIjoiNDhkOGNlYTYxMzRhOTUyNTJkM2YxZWFjOWRiODRmM2NiZjRiYTU2NjBlZjcyZTk5MDc5MGQ2YmI0NDNlMDMyMyJ9', '2020-08-07 02:42:05', '2020-08-07 02:42:05'),
	(30, 'eyJpdiI6IkRXVGVyZVVYR1BXNk9LbTdxTVFmeFE9PSIsInZhbHVlIjoiQXFMZXBjcTFzMWkvQlpzSDJYMnpHZz09IiwibWFjIjoiNjNkYjlmNDhhMmM3MmJiYzhjMDNlMzE4NWUxYWJhNzNmYWJjNDA2MWEwMzYyZTRhNmMwOWM5ZDMwMDlhNTBjOCJ9', 'eyJpdiI6IllXeWhNenVGd0hEc242YmVHaFZKS3c9PSIsInZhbHVlIjoiQUlTS2R6ZUtoU1pBakZsQkR3QkZoT1NDQyt4UTAvdXpjRm44ckVnNlRzMD0iLCJtYWMiOiJkYmI3MzBlNGY3YzEyZDExM2Q1OWIzZjI3ZDZhZTY3M2M4YWJkY2MyZTg3NzcxNTY4NjI0ZTI4MjVmYWFkNzI4In0=', 'eyJpdiI6ImdGWTFvSzRmcTVxZ1A4dTYwTzZpYkE9PSIsInZhbHVlIjoiczJJTnNuZzJqcC9jVUZKZFdjNHdNWDZ4Um1XekVhb1d1VGJlNisvcWJjem1aajhtdFFNaE1mMXZLbWFGa1lCR09uRVNRbG5ZSlJ1b1RmK0xzdUVYNG81MU9XZjBtZ1d4Z3VGRDZVNEptelk9IiwibWFjIjoiYzBmM2FjMzZkZDYwNjhhOTNiMmVjZDhmYzFlYmU2NDNjNWUzMWZjNTA3MGYzYmI0YzRlNDdjMDg4YWZmZmRjMSJ9', 'eyJpdiI6Iml6dUQ1Y1lqWk1YVkRGaVR5aGdpTVE9PSIsInZhbHVlIjoibHZjTFU1MnFHYnRGbURCeXdpVlA3Zz09IiwibWFjIjoiOWU4NTAzMWNhMzcxNjIwY2U3MWFjNmQzOGM3ZWRkNGNiOWU1ZTgyM2JhNzJlMDcwMWE5YzlmZWM2NmFiNjgzYSJ9', '2020-08-07 02:42:06', '2020-08-07 02:42:06'),
	(31, 'eyJpdiI6ImlvT3F4NHVOUzcrSm5UUHdWWVdJc2c9PSIsInZhbHVlIjoid0g1UnFGSFRqY05uSm00ZHJYa0JJUT09IiwibWFjIjoiMjJjYjBiMDFlZTAwYzdjM2RiODBjYjA3MTc3NTJjODZlYTQwNDRjYTY1OWU2NzkzODcwMTI1ZmU5MDI2MDhlYiJ9', 'eyJpdiI6IjFCQmNTczN5RnlFYkF4a0V3VkhvaEE9PSIsInZhbHVlIjoiWTJRQnlVNXRucFBocmVyTTcxYmpCcGlmZlZYVVl5dXMxQkRBUUJ2SUxzbz0iLCJtYWMiOiI2OWQ1MWU3MGNjZDU1NWFlYmJlYTMwYzllOWRmYmI5ZjNmMTUyOWMyZTgyNmI1NjA0NGRmMzhmZTQ0NTZhMTUyIn0=', 'eyJpdiI6IkhubmpKSEZ1MExvNmlpNkM3QkVsNFE9PSIsInZhbHVlIjoiVXM4UERXenBwc0Q3cWxJNkNVakFMT0VJZVBndWVRNW9EVVBtUlpveXRpdVNGVEZNQ0oxRHEva0FUWDJRL3dwUUt4MmRicW9LT3VJMW5iMkFua09XdERsb0Z1c2FZMFJnUG5mWHM5SytvVXh0aW04UU5RZ3RHNEEybUk2SDNteUoiLCJtYWMiOiJhYWU1NzkxYjg0NGFlMjY1NTRkMWIzNTBhYjE0ZjMzYTg1MjNmZTA2NTNhNDFlODU5MzhjOTU5ZjVkYjQzNWYwIn0=', 'eyJpdiI6Im9VOVV3b1VMQVFqcEk5N3MvWmFHVlE9PSIsInZhbHVlIjoiQVF2ajllQlJJTzd6bDBsbTFPbmFJdz09IiwibWFjIjoiZjUwOGIyNGUzNmJjZGUxNThiYjE5MDg1YTZkNTE5N2E2YWI3MTE3MzViYjc5N2QzODA3MWVlNTg0MTI2NzU1YyJ9', '2020-08-07 02:42:06', '2020-08-07 02:42:06'),
	(32, 'eyJpdiI6IjZKSVIzZ3ZXVFZJRHFSNUtIeUUrM1E9PSIsInZhbHVlIjoiUWZURkd6Rk00VjJramxYOXE1cForZz09IiwibWFjIjoiZThkMjUxNjQ4ZWM4MTllMTE1MDJmNzNlYTc4NjM0N2I1MDFjMDU2YjQyOGI3YWUyOWNmMmViMTQzNzg0YzFlZSJ9', 'eyJpdiI6IlhOanU4dmhUNU5kVTloMnp6WmdHc1E9PSIsInZhbHVlIjoiT1RIcmdjeWJjSG5WSDBJMEVkeE1McldmaysxKy9RdXNOZVdBaFd5cTR4az0iLCJtYWMiOiI2ZjIyMTU5YWU5NTQ2ZTU4YWMxMTYxNDIwNTg0ZjdhOTNjNzliMTM3ZTM5MTJlNTAwYjQ4YWNkYzIwYjhkNDU3In0=', 'eyJpdiI6InFUVUQwYUZ0UWVRMjh6NHhhdWV4Qnc9PSIsInZhbHVlIjoiUU44QVNKQVFjYzNMZ2pIYzNwOGg1UmtIdWdFdFFqVGF0eVBZeGh2N0QxOTI3RnZKSXFhbmZBVTFZaGJydnU5MmNSSjVqM21mdUt4eWxIOWQ2bXlyUnRONlFZb1ZOL0k2a2JwK1FYNXo2SnM9IiwibWFjIjoiNjc2OTlkNDEyMzMyNTBhMGE0OTEyMGY3ZGEyYzc4MjBkZDdlM2Q4OWIwOTRhNTk1Zjg1MjliNTQ3YzhhNTc0ZiJ9', 'eyJpdiI6Ijc0YjlUYkVZZmtrY1k0MGg2S3o1NVE9PSIsInZhbHVlIjoiLzluVkVVM05ZRE5RMzRMdjZrencwZz09IiwibWFjIjoiODI3YTkxMDZlY2ExMzE4NjMyMDAwODM5YjYzMDJjMzdmNTFlMDFjOThmNDI0MGRhMGY0OTJhY2Y1ZDMxZmExZiJ9', '2020-08-07 02:42:11', '2020-08-07 02:42:11'),
	(33, 'eyJpdiI6IlJYM2lSV2VvMVhYVVhaenJnN1hDSmc9PSIsInZhbHVlIjoiMENrT2lKTHNMekloYk9Bd05rZEZPZz09IiwibWFjIjoiNjEwZDk1Y2UxOTg5OGNhODJmY2YzYTI5ZmY1ZGNjZmNjMjk3ZWViMGVhNzRkNjY1Mjc5MjMxZTg4NDljYjRiYyJ9', 'eyJpdiI6Im9vaFJMSUZhcWowMEZsclRZc0Z2L2c9PSIsInZhbHVlIjoiSWZ1NDBnRm10U2JkTHpkb1BHcDl6cTZKWU9MZC9Kb2lIMklHbCtsVEZYTT0iLCJtYWMiOiIwODExYzkxYTg5NzlkZjRjY2MzNDNjY2RiMDI1NDgxYmY0ZmQ1MDcyMzNhN2UzOGFkZDRiMDU4MzA0NjM3OGM2In0=', 'eyJpdiI6Ik05T1VuZW1QQTZ0aXhRTzViaFRRT2c9PSIsInZhbHVlIjoiVFo3UW4wMGVSbWF3dlZZcWVqZlFoZVBrZzhmQ21td1czUXMxeE1jLzJhc0xBOG9DazZ6MnR1MWx5bTBqQnVWMiIsIm1hYyI6IjVhYmMzODcxZDdkNWVhMjQ1OTk1OTczOTczMjNjNjljYTE0OGFiNzI5YTFlYzBiNTRhZjNlMGM1MGY3MDQ2N2UifQ==', 'eyJpdiI6ImhoUDloOTlYQ2tEeWloalFOZ213VUE9PSIsInZhbHVlIjoiMjJ1VnEwZ2R3cXZseUhOcG5TSnM2QT09IiwibWFjIjoiMzllYTlmYWY5ZjQwODM3ZGMxZjhlNDk2N2NiZWRhMDliZDY4YWM1NTI4MmNiMDI0ZDZhNmQzNGZkMzA0NzI3MiJ9', '2020-08-07 02:42:12', '2020-08-07 02:42:12'),
	(34, 'eyJpdiI6Ijd4eVZpOHVlb2Rkek52OXlML25xY0E9PSIsInZhbHVlIjoiSTc1ZVVzemtkUEE2N1A5VGo3bnV6UT09IiwibWFjIjoiNmU2YWIzODM3YWE1ZGY3ZjVkM2FjOTBhNWVlNDg0NGFmMTg4ZmY0NjhjOWU2MDQ2N2M1YmFiMDFjMGJhYTI3YSJ9', 'eyJpdiI6IjhtN1FwTGtkdEw1eU1YekxsY01EaVE9PSIsInZhbHVlIjoiN1QrSERXbk44ZTh0SW1uRlpDVVNIbm1LeUdpUGQyY1NVb2hGYVkxeDZSMD0iLCJtYWMiOiIxMzE4OGY0YzVjNDE0ZDI0NmJiNTE5MjA4ZDUyZTFhMWFhMDA3MDMxOTQwMmU5Yjc1MTYzNGE4ZDQwNWVkZjQ5In0=', 'eyJpdiI6IkVTU0NPNnd1UTRXdHZGbmJwYkdmZFE9PSIsInZhbHVlIjoiU3BuNjBSeEx5MUQwT1FsVnlOa2g0L1RlWGRMTEMweXJQQTFIdlJZU2dINSthR3ZtRHJRcHBhOVhXR0hwS3pzZlpWaVRENjcxcHZaeXV6cEp1djMzemh3c25tdXdiQ3R6SUk1UWkvWTRNblE9IiwibWFjIjoiMTdmMmYwNGQyZWRlZjNmNDEyNWE0YjIzYmY1NTE0YmI4ODg1MjI1MzQyMzNhMTVmOTAzNDU0ZDAzNDM1ODEwNiJ9', 'eyJpdiI6Ink5WVUrTmZaM05aNjNMT3QzanR6SGc9PSIsInZhbHVlIjoiWjNLV0NiUVVTbVBTZlhKMWhEWkJzdz09IiwibWFjIjoiMjE0MmFjMjU4Yzk3ZTFmMWJhZmRiMDQzMmMxYzgzZjM4MTY2YWNiOGRlMzVjNDM2NWVkZGMwYzQ0NTdiNTJkZiJ9', '2020-08-07 02:42:13', '2020-08-07 02:42:13'),
	(35, 'eyJpdiI6Ikp4b2dTOEFjK2R0cVVSUFdnSE5XK2c9PSIsInZhbHVlIjoiWDFwNDlUeUtxbGI4TnM3RVJSanVzdz09IiwibWFjIjoiYmE3OTRlNmU2YzZhODhiMjQyYmI1MWZlNTk4ZTk0YjI0YWM2MDUwZWIwYWE4MTgyOTA4MTMxMTU3MjZjODUzYSJ9', 'eyJpdiI6IklzMktXL0NOcVhDbFFrdWg3L3ZERmc9PSIsInZhbHVlIjoiZE1qdmVFT24yNWRFelBCNkNlaGtKRXFZS2RSYXVhekltalpXcDUvRVZEaz0iLCJtYWMiOiJmMmFjN2E5NDM0MzBkMzY1ZDc4Mzk4NWExMzViZDk0MjAwNjg2MDExOGVkOTZkOTBkNGU3MDJkODEzOGY1OGIxIn0=', 'eyJpdiI6IjZHM0NDRUpBQXp3dXhCMFZNRERON2c9PSIsInZhbHVlIjoiT3l2bFJ5STVTOWZIMTMzQU90eGdPNFJNNnBuZVBWMUJVaTZtUzF2MjJpcFQxczZzRGh3bGJ1K2FUcWRkVk1oS3pjZXVjdmk3WENWeHcrRFR2VjNNNnU4ems2SUxPUWtHenlacEZRSTRvY2RYRHNxQ3RJOW9aallyMytTbVhVUUsiLCJtYWMiOiI1NzFlODJiYWI0NzJjYWVjZDFiOGQzNWUxZTYwMGM0MmYxYTQzNjQzNjVlM2Q0NzQ3MjIwMzYzMThjNGJjNTg0In0=', 'eyJpdiI6Ik00Q0NHWVYwSC9VaytzUE1oTkdPS2c9PSIsInZhbHVlIjoiaGd3QWxQbEFJazV1cUtyU3hON2JQdz09IiwibWFjIjoiYmQ1ZjJjZmM1OTkxM2NlZmZjYjUzMWUwMTZiNzJlMGVlMzM2MTg2YTI2NWRjMDEzZjZlM2ZmNzJiOWNlNWY1OCJ9', '2020-08-07 02:42:14', '2020-08-07 02:42:14'),
	(36, 'eyJpdiI6InRFRU9obUpORVNKVjFuQ3l2U01nL1E9PSIsInZhbHVlIjoiNE9XR1N6V094QjVNOVdyZGthY2JoQT09IiwibWFjIjoiYzEyZDM5OGVmNDFkNDNjY2YyNDA5YzU2ODBlNDY1ZjRhMjIxYmM1MDJiZjgxMzBhMzM5OTZiMWE5MTg3OGJhNyJ9', 'eyJpdiI6Im5wMVk5ekx3TXg0MG10SGdrNCtiMlE9PSIsInZhbHVlIjoiUzNjV0xrSHdkdk53MlVIVnkvc3o4Z2N3YlVmOHdleWZjeUZjVHQ5UkI3bz0iLCJtYWMiOiIwOGIxZWVhZjU4MmZkYjFkMWE0ZmE3NDQ5MGQ0M2VlMTNkNTljODJkOTU1ZTMxYjZkYjA5MTBmZmRlOThmN2JkIn0=', 'eyJpdiI6IkRxZWJvdkxpMkdvVUJmc09rWE04ZGc9PSIsInZhbHVlIjoicEVlZlVXS2dZZmpoN3Y5aVBtQ0tPbXVVUW1wb2MvOEIvb0t0c1hxRXdrZmtSK3hJOHVNRm9TR0tFV0NYMzJxOFE1bTlNbElJVkovVmVQVm9lK1ZtWVV4cE1Pa2lTeHJodnZtY3JtOWpwWW89IiwibWFjIjoiZTQxZGFlYzdjYzE3N2M3ZDA5YzE2MjAzYTRjMWVjOWIzYzZiOTVkMjBhYzc5ZDM2ZjNlMWYyYzc1OGQ5YTI0NCJ9', 'eyJpdiI6InBBNUpDVXlVSi9McitCRXpyd3dBVUE9PSIsInZhbHVlIjoiUkVHWFZSRWZxLzV4N3MwTmhZbE8rUT09IiwibWFjIjoiNDM0OTgyNzFjYWMwYzg2MGY4MGI3MzA2MTJhNjc3MjI5YTEwMDMwZDg5ODQ1NzBhZjFiZDZkNWIzNmYyMDdiMyJ9', '2020-08-07 02:42:15', '2020-08-07 02:42:15'),
	(37, 'eyJpdiI6InBVLzJHS1ZKdzM1WGJNMUk4b1FsTVE9PSIsInZhbHVlIjoib2l3VzZmRHFBODZUVlFqbklBZ2YrZz09IiwibWFjIjoiNjdkYjE3NGFhYTFkYWRkNGI4MjQ4ZjY4OTQzMjljZDRhNzJmNWM4NjA2ZmY2MjgwMjlhNGEyMzViODBmZDkzZiJ9', 'eyJpdiI6InY3azZENVBXRXlRczdOSUZ3MTNqbHc9PSIsInZhbHVlIjoiZVB3WFgzTnFLU3pzRmFOb3YyR21KVWQwSnVid1JYeVNRWGpBL0tVU2Rkaz0iLCJtYWMiOiJjZjBmMDczZGViMWJiY2RiY2JiY2IxNzdmYTc5OTZkMmRiNTQ1YzRiNTA5MTUwNTg0YzZlYjgwMTEwZjdhNjhmIn0=', 'eyJpdiI6IjNlM3B3TXhjNzVPMGtKNk5xZHBHMXc9PSIsInZhbHVlIjoiY0dZeGN0MWQ5RzBoRmcxS1pPa3VVSnlFNXRCQ1l6bXRuV1VBMVgvRW5QYjJqS2FCQUFvQnI1aE1WdW5xcjM4MTcxdGRDKzRjL1BYS0FRbXhRRHgrZlJHOTB0OEpJZFREbXgyV3BpN3JrVm1CTFRDY0x6VkJZN0pSc3BOeHB1aFYiLCJtYWMiOiIyZDNjNThhNGMzOGQzODRiMzljYjExMGYxOWU0ZjJmYzdkOWFlZjc2YWNmNzU5NDJkNGEyMmYyYTc2ZjAyZWVmIn0=', 'eyJpdiI6IitQYWxXbzlPaUt4WW1ZQUJIYytmRkE9PSIsInZhbHVlIjoid2ROM2M5dERIZXZabitBL0NrRHBoUT09IiwibWFjIjoiMmIzMmFkMzEyYWQwYTgzZjRhM2ZhMDlmMGQ3NzYxNTY3NjIwOTFiZmNjYmNiNWYyZTU4NGY5YzdkNmFiMzU0MCJ9', '2020-08-07 02:42:16', '2020-08-07 02:42:16'),
	(38, 'eyJpdiI6Ik5kYTAyQnFla2FFNzhqTDB0cVNkcUE9PSIsInZhbHVlIjoialVKelBUVk9OV3FFdDQ2NXFEY1QrZz09IiwibWFjIjoiODZmOGU3OTFkN2MwNmJiNzBmMTlhZDNkMjEzMjExNDBiNjI0ZTdhMTZmNTIyMGVjNjU0YzYxNDM5ZTU0YTY2MSJ9', 'eyJpdiI6Ijd6N1JkVXBlbmhBVCtFcDBNN1BiQnc9PSIsInZhbHVlIjoia3d4SGZTUVROT0doYWJmVENLNjY5TDZtWjBtL0ZLMmdidFZPZ3VsZUt4UT0iLCJtYWMiOiJjYzc4ODUyNTQxZjkwMzRiYzI3MTlhNjUzNzRkNmYwODQ5Njk2ZWIyOTA5YzQyYzAzY2JkZjdlYTY4MDdhZGU1In0=', 'eyJpdiI6IlpsazB5bWxMcDQ1OHRzRlZWU2NkQmc9PSIsInZhbHVlIjoiQm5KVzc1T2I3NmMyN3l2c3ZWMkI1ekNwTjYrS2JXUUpPMUZBU3kyT3lMSi9Od2JibGRXcHg3OFUwcEpLbEhkN0dmczl6L0EvK2hycmUra3ZiQnJvTVFmeEFHWk9CeHp5ZUh1MG5uS0pHcmc9IiwibWFjIjoiODJjZWFlZGQyODViNjJkYWU4YjJkM2U5NWM0YTg3MTEwNTc2ZDhiNTdjMmU1MTU3NzIxOWI3ZWJkNDliM2Y5MCJ9', 'eyJpdiI6ImJzY3JadVQ3ejljaHo4T0Z2QXRqT3c9PSIsInZhbHVlIjoiY0MvOG1UbzhqWVpweXpUaHRaWXlzdz09IiwibWFjIjoiYWYzZGUwYWQ1Zjg0OGNmZTM0ZTg2OTg0MzJhY2UxMzVmZDA4NTJhMmQzY2VhYWUxNzAxNjc3MjJiMTNiYzRhOSJ9', '2020-08-07 02:42:40', '2020-08-07 02:42:40'),
	(39, 'eyJpdiI6InJHYlRlNGhmN0hlWXFZcjhZVHFzNEE9PSIsInZhbHVlIjoiVW5rWkNYK3YzZEVMVXFaUDRKaHpTdz09IiwibWFjIjoiZDBhNWQ2YjI2Zjg3MGFlYTBhM2M4MGMxYjhjNmU1MDI2YmQwYTNlOTU5Njk3YzI3YzU2MDc3NzkxYjcwYmU0MiJ9', 'eyJpdiI6IjhyZytFTldkbERYemhCR1V0K0tNZnc9PSIsInZhbHVlIjoia1o1cEV2MmNVdW1OV1Y3cTNLY3hWUWU3UjJQZjZUUFM0cGRxbGtYNnRtWT0iLCJtYWMiOiIzOGRmYWQwYWEyNTNiNDU1YjM3MmY1NGVlN2M5ZGZlYmU4NTExYzA2YzUzMWQ4NThjZjliYzBkZmIyNzE1ZTUzIn0=', 'eyJpdiI6ImtxblFFcjdBOEcyd0MwV0ZrMkxMenc9PSIsInZhbHVlIjoiNzE3U2l5N3hlRkd4QUFsSFBvbWRybkoyUytrcTJKcGpCT3cxY0pBT1gvd0pmTXg5RDNTTUV6T3pLVFRvQ3ZFYmhFTS9lOUxCUXhtM0JyYW1ZS2plTGNFcGFVc2VpZWNueld3WmpOWDM5bkk9IiwibWFjIjoiNDgyZjdlMDgyNmYxZjlkNmFhMTRhZTU2MmE2YmFjMTg0NjYyZGQ4NjVjZTVkZDc0YTI1Nzc2NDk1YzliOTMzNSJ9', 'eyJpdiI6InVjUlgxd3A5VDJnS3ZiSGtLZUd1WkE9PSIsInZhbHVlIjoiY2ZnbzFuRlpDaytyUkFHUG95ZW1lUT09IiwibWFjIjoiMjExZWIzMmQzMWEzZjE0OWUzMWQ1MDljNWY1ZjAwMGNmYzUwMjliNzRhYmM5NWQyMGIxNmEzZWZkOGVkNTE5ZSJ9', '2020-08-07 02:42:42', '2020-08-07 02:42:42'),
	(40, 'eyJpdiI6IlZDcmkzaEgzeW5KL3NzRTRxaDUyY1E9PSIsInZhbHVlIjoiTVZtcDV5cjB5dmdWVG9GRmJUcUFqZz09IiwibWFjIjoiNjMyZjQ5NzUyMTVhZGU4YWVhZDcxNWRiNDliYzJiNjFkM2JjMTk2MzY1ZjNmNzkxMzg3YzA1NDQyYTM4MDJjYyJ9', 'eyJpdiI6InUyaDJ6bDJhU2JLcVk2MlR3RzBNN1E9PSIsInZhbHVlIjoicWlFSkFtZjJmVWlJNHU0dVNtQkVsSXlmbVNtaTNpTjFPdzMxeVZiY016MD0iLCJtYWMiOiI4ZTk5OGM1Yzk3YWU1NjkwZTBmZTU4YzI3OGM1NWI0NmU5Njg4MTg5Njg0ZGU4YmUyMzZkMjY3NjEyNzg0NTgwIn0=', 'eyJpdiI6Imp3ZkQyT1hrSWc4SUNxTXBoQ0EvZGc9PSIsInZhbHVlIjoiM3BSOHEya3lkVDVLTG5jUFN0b0U0M0lmK05BRGxtOEpReHdWODB4MEtYc3Bqc2RnQXQrZXBsSjd2alN6SWhQeG5QMTZJZkplODR5OFdIVklBczNaSlpuV2NmSnlzcXg0VlFmalowWUNoQU9nMWN3QUF6ZHBOUDR5UGFRVThQS0IiLCJtYWMiOiIyMGRhMGU3YWI2Y2U2NThkZTZjZmNjYjhlMmI0OGNmOTUzZDUxMzBjM2JhMmJmM2VlOTEzZWFlNWMxZjQyZWJmIn0=', 'eyJpdiI6ImVXdVlpNHhPQ1R1SWdDVjZscHd1Y3c9PSIsInZhbHVlIjoiK1FVVEJ0N3JQZVRYcXNDYloxUk4yQT09IiwibWFjIjoiMDQ0MGI4NDgwY2VlZTc0ODQyZjMwNTc4ZDg5ZWUwMGJjODllMzAzODIzNGRmNjU5MTEyNTgxMGU1NzExZjk3ZCJ9', '2020-08-07 02:42:43', '2020-08-07 02:42:43'),
	(41, 'eyJpdiI6IkcxZ21Cd2RRUm54Q0kydWltMURNTFE9PSIsInZhbHVlIjoiRU9xcFd4Y3FURVNmcGVtL3pzVVpsdz09IiwibWFjIjoiODM4OTVjYjQwZGQyZDFjMDM3Y2I4ZTIwNGIxNWExNzFmYzEyOTY3YjllYzJiMWJhOWFmMWYxNTQwZjlkZjViYyJ9', 'eyJpdiI6Im1QbDhHWk5lSElFamVLZ0tOY1Y1dmc9PSIsInZhbHVlIjoibVpBUUF6cTB0TUZjKzYwQ0k0QWFITExDWmFLSExQcjk0QStRYUFsUlBkVT0iLCJtYWMiOiJiY2I3YjIwZmYyNzNlNmYwNjI1N2M1NWFkODJlM2U2OGQwZDhiNzg2OWI2YWJhYTkxNjVjM2NkZGM4YWM3NTk1In0=', 'eyJpdiI6Iks2bFRBNFNKTDcvWEZJMGpsN28vd0E9PSIsInZhbHVlIjoiL3FJbktRQnhOeTV2am9KUlJCQWNEQjBESzVRWmpiQllxanJXZ3JtMWJBWDhycFNnU1FiV0VhVjE0YTZaWGxCdHpWa25ESGRiOUxFaUUxb0ZVL1MydHJDZDhHQTNIR0NPY0JsbmJ3SnNWTVE9IiwibWFjIjoiOGRmZTFjMDlhNjI4OTFiYmJmMjg0YTdjZjE4NTQyOTg2MGUyODI3YmJmMWIzZmVjOTllMTIwNDUzZTMxZGIxNSJ9', 'eyJpdiI6IjFORW9oSHZSQXRXYVAzU010Z0lOQVE9PSIsInZhbHVlIjoieDl4QW5MSUdIcCt4YlpGUXMxR3dvZz09IiwibWFjIjoiOWI4NGU3ZjBlNDY1OGYyOTBlZDI5ODA0NTNkMjliZmI0YWY2ZDA5YmQ3ZmQzOWNiYjg5ZmY3NDI5NWZlNmE2MyJ9', '2020-08-07 02:42:43', '2020-08-07 02:42:43'),
	(42, 'eyJpdiI6InFpeVV1aXkxL1A5RHVUeWZNWVFYWmc9PSIsInZhbHVlIjoiYjBybi9naTlXMnJvaysrVXVrYWkxQT09IiwibWFjIjoiNGJkN2ViOGJhZDFjMmVhOTUwNmM0MTIyNjhkZWEzYmQ2NGY4MWI5YWE0YzIwMjZmYTA5YWNiZGU5MTAxYmZjYSJ9', 'eyJpdiI6InlPaVFhaWM0Q0U1VFZYdjFVNkFHZ3c9PSIsInZhbHVlIjoiN0Y0NGdQbjl2M2hreDloTWErRVdqcjc4eW9PN293bkZkSXJFczJ1RVN6az0iLCJtYWMiOiIwOGQ1MjEzMTVlMGY5MTdlMmZmMjNlZGNiZWYxMGIyNThiMDg1ODc2MzRjNzYyMGZmNTQwY2M5YWVjMTBmZDA1In0=', 'eyJpdiI6IjY2aGh2SG93SXhacVFMS2xZam1reHc9PSIsInZhbHVlIjoibW5JWk9WeUtFU2wrRHZtT21QR2NtbW1ZUGdPeGl4eUNyWlRBczd2MGJveUlNUklzZnlxQ3NRVVVlNGl4WHBMblE0a3lZa2NYWStDWXNuRG5NdzZtVWRqeDBoTnRCMUhmNXViTTlnVGdya1E9IiwibWFjIjoiM2YxODhlOTJkOWQwYmI0M2IyZDJhYTE2YTIyYzNhZjk0YzcyMjE3NDRhYTJjM2NhMjkyNzk0MzEyZjMxM2VlNSJ9', 'eyJpdiI6IjkyZmxBUnRZNlhTZ1NiK3VRSEJOclE9PSIsInZhbHVlIjoiTWg1dzRhcVUxUjVyTEgyYnhYRnNPZz09IiwibWFjIjoiNGVlY2FkYTAyYzhmZjRmNzBkNWMzYjdjZjdiYzJhMTk4MjIxZjE1MTkxODRiMzgzZGNjOWIxODE2OWM1NjhhMyJ9', '2020-08-07 02:42:44', '2020-08-07 02:42:44'),
	(43, 'eyJpdiI6IlJGN0dFU3U0ZVcyNTZuZTlYdUErMFE9PSIsInZhbHVlIjoieXEzdW43enJIRFdoZWRXb21IbEdPQT09IiwibWFjIjoiYzI1YmIwYjk1MmJiZmFkM2Q5OWNlMWE3YmYxNTQ4MWRkMGE3OWM0ODNkZTEyNmU4Y2E1ZjM3ZmQ2Nzc5MWJlYiJ9', 'eyJpdiI6IkZXdUNmWkZxR2E4czhGNldIYlpwYWc9PSIsInZhbHVlIjoiRk1OM1Uyd09mZU92cjZ2YytUZDN5c0syQzFxRGlLRzN2RTJIcjhaejF5WT0iLCJtYWMiOiIyYWQ0ZjVmZmQyYTdiOGM4OTRjNTcxNmI1YTk0MWRmMmU5MDY4NTlmZDlhYzU2MDM3NGRmODllZjRkMTNlNWRiIn0=', 'eyJpdiI6ImsvV094dzlRMDVIRTM0U1ozZytHMWc9PSIsInZhbHVlIjoiKzhCRnlqQk1idVVDUUUwZUNybkNoSlFCU3Y5NCtYQWNmKzJnQ1lCRkprYWJ3UVU4clBjTkJPd1VyT1VnTXhGSmh3cFhpcSs3RkE5cXIxZXdXakFwQ2dPTzVoYXVjVEVpVHJvSjVLbk5DdTMwSVdtWVRwVlZmRVdVMUQxUmtQVkciLCJtYWMiOiI1YjRlODU0MDRhYzhkZmE1OTYwMjhkYzI2MjM3OWMzNTcxNDBlNDNhMTY2NDRkOTMwMjAzOGJlZWE0NzhlMzllIn0=', 'eyJpdiI6IjJRZWFOa2M4cHRjM1RXeFgwOGp2WVE9PSIsInZhbHVlIjoiV1VKdCtqR1BWZFRBd0lNbTZwNEY1UT09IiwibWFjIjoiMWNkOTYzNDc5NTdhNGJjZWMyZmI2MmI4Zjc4OWIyYzE0ZGRmOTEwYTMxNThiYzM4NTdhOWZiZDA2MWYyM2M0ZCJ9', '2020-08-07 02:42:45', '2020-08-07 02:42:45'),
	(44, 'eyJpdiI6IkRoTUkrYUU3eExjK1VRLzVTOWk2VWc9PSIsInZhbHVlIjoiSHlNL3BLYnI0N25rZU5vN3ZZdDRWUT09IiwibWFjIjoiNDI3NjMyMjNlNmI0Nzg4ZDYwMTEzMjBhYjVkMDg3MzI4MjYyNWQ4ODYyZGRmMjAxZWI2NTFkNzJhYzM5NmVlYyJ9', 'eyJpdiI6InNpK240cm90N0FJajdZT0p6eUdXTUE9PSIsInZhbHVlIjoiV1lOVnVxOEcybXVsU3pIQ3dVWFdRbkZTT2xqTkord3FKSXlpVjdaWGI4RT0iLCJtYWMiOiI4Yzc5NWFjNDI4ZTNiYzljNDNhYzg1ZDlkYzUyZDFhMGMwMGMzZDRlYjRkOTBmNzVjM2EwZDE4YTU3NTMyYWQzIn0=', 'eyJpdiI6IlJmbXluZEw4b3orNjVjSzNIVFFuU0E9PSIsInZhbHVlIjoiRTZ4MGpGazZBTEZqajhtOTJZZkJLQWVYbXQxcU9CdS92ZEZXMi9lZ0hTb1ZkRUI5NjNWam1JR1BYK0ZELzFSRXpVTmVta0N5aVpRZEROaW1lcWxIVGg3aWtvNCtNYjg3QytGRFVLd2d0bmc9IiwibWFjIjoiYzVhMWIzODZkMGI1ZTJmOWNjZDU5NWVhNjcyNjA1ZWRhNmVlMTgxODgxYmRmZWJiZWE2ZTBiMzVmMjc4NGFmZSJ9', 'eyJpdiI6IitodXJ2cXRxUzJabGNDdVkrMTg0eWc9PSIsInZhbHVlIjoiSTVtRFZ6N1JsNzI1VXBLck9UbXozUT09IiwibWFjIjoiNDFiYzVkOTc1YWIwOTM4M2RlODUwY2ZlYjUwMjcwNjAxMmNmZjFhZGI3ODgyNTMwNmQ0N2RiZTg5M2QyOTA0MCJ9', '2020-08-07 02:42:45', '2020-08-07 02:42:45');
/*!40000 ALTER TABLE `error_log` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table msdfs_forms_db.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.forms
DROP TABLE IF EXISTS `forms`;
CREATE TABLE IF NOT EXISTS `forms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `form` varchar(150) NOT NULL,
  `slug` varchar(50) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.forms: ~3 rows (approximately)
/*!40000 ALTER TABLE `forms` DISABLE KEYS */;
INSERT INTO `forms` (`id`, `form`, `slug`) VALUES
	(1, 'Form A - Employer/ Employee', 'form_a'),
	(2, 'Form B - Self Employed', 'form_b'),
	(3, 'Critical Incident Form', 'critical_incident');
/*!40000 ALTER TABLE `forms` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.form_a
DROP TABLE IF EXISTS `form_a`;
CREATE TABLE IF NOT EXISTS `form_a` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `application_id` bigint(20) unsigned NOT NULL,
  `first_name` text NOT NULL,
  `surname` text NOT NULL,
  `passport` varchar(50) NOT NULL,
  `gender` char(1) NOT NULL,
  `dob` date NOT NULL,
  `nationality` int(10) unsigned NOT NULL,
  `immigration_status` int(10) unsigned NOT NULL DEFAULT 1,
  `medical_issues` varchar(1) DEFAULT NULL,
  `medical_issues_remarks` text DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.form_a: ~0 rows (approximately)
/*!40000 ALTER TABLE `form_a` DISABLE KEYS */;
/*!40000 ALTER TABLE `form_a` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.form_b
DROP TABLE IF EXISTS `form_b`;
CREATE TABLE IF NOT EXISTS `form_b` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `application_id` bigint(20) unsigned NOT NULL,
  `first_name` text NOT NULL,
  `surname` text NOT NULL,
  `passport` varchar(50) NOT NULL,
  `gender` char(1) NOT NULL,
  `dob` date NOT NULL,
  `nationality` int(10) unsigned NOT NULL,
  `immigration_status` int(10) unsigned NOT NULL DEFAULT 1,
  `medical_issues` varchar(1) DEFAULT NULL,
  `medical_issues_remarks` text DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.form_b: ~0 rows (approximately)
/*!40000 ALTER TABLE `form_b` DISABLE KEYS */;
/*!40000 ALTER TABLE `form_b` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.form_ci_items_lost
DROP TABLE IF EXISTS `form_ci_items_lost`;
CREATE TABLE IF NOT EXISTS `form_ci_items_lost` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `form_critical_incident_id` bigint(20) unsigned NOT NULL,
  `item_id` int(10) unsigned NOT NULL,
  `cost` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_form_ci_items_lost_form_critical_incident` (`form_critical_incident_id`),
  KEY `FK_form_ci_items_lost_items_lost_or_damaged` (`item_id`),
  CONSTRAINT `FK_form_ci_items_lost_form_critical_incident` FOREIGN KEY (`form_critical_incident_id`) REFERENCES `form_critical_incident` (`id`),
  CONSTRAINT `FK_form_ci_items_lost_items_lost_or_damaged` FOREIGN KEY (`item_id`) REFERENCES `items_lost_or_damaged` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.form_ci_items_lost: ~14 rows (approximately)
/*!40000 ALTER TABLE `form_ci_items_lost` DISABLE KEYS */;
INSERT INTO `form_ci_items_lost` (`id`, `form_critical_incident_id`, `item_id`, `cost`) VALUES
	(1, 1, 1, NULL),
	(2, 1, 3, NULL),
	(3, 1, 7, NULL),
	(4, 1, 8, NULL),
	(5, 1, 9, NULL),
	(6, 2, 1, NULL),
	(7, 2, 4, NULL),
	(8, 2, 5, NULL),
	(9, 2, 7, NULL),
	(10, 2, 8, NULL),
	(11, 2, 12, NULL),
	(12, 3, 4, NULL),
	(13, 3, 6, NULL),
	(14, 3, 9, NULL);
/*!40000 ALTER TABLE `form_ci_items_lost` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.form_critical_incident
DROP TABLE IF EXISTS `form_critical_incident`;
CREATE TABLE IF NOT EXISTS `form_critical_incident` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `application_id` bigint(20) unsigned NOT NULL,
  `disaster_id` int(10) unsigned NOT NULL,
  `disaster_other` text DEFAULT NULL,
  `housing_damage` varchar(1) DEFAULT NULL,
  `housing_repairs` text DEFAULT NULL,
  `insured` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_form_critical_incident_applications` (`application_id`),
  KEY `FK_form_critical_incident_disasters` (`disaster_id`),
  CONSTRAINT `FK_form_critical_incident_applications` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`),
  CONSTRAINT `FK_form_critical_incident_disasters` FOREIGN KEY (`disaster_id`) REFERENCES `disasters` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.form_critical_incident: ~3 rows (approximately)
/*!40000 ALTER TABLE `form_critical_incident` DISABLE KEYS */;
INSERT INTO `form_critical_incident` (`id`, `application_id`, `disaster_id`, `disaster_other`, `housing_damage`, `housing_repairs`, `insured`) VALUES
	(1, 1, 2, 'eyJpdiI6Imp2MGtNMFNYNUlRWUcwd004ay9EdkE9PSIsInZhbHVlIjoid0ZMUWY3dVZlem5YV2hRQmZyL1FBdz09IiwibWFjIjoiZjNiZTg0YjJiMmYzZjI4MjZkNThkYjY3YTE0M2FjNWYwNTRjYjUzN2M0NDhlNmQ0ZmEzNjMwMDNlZmM3YjUwOSJ9', 'N', 'eyJpdiI6Im96bjJyZjM0M2pjZmxaREtMYXNHWVE9PSIsInZhbHVlIjoiS0hnbW1ZOEpMeEp6SFdlWUJtNjl3UT09IiwibWFjIjoiNTNiZWQyMzY4ODZkMDk4YTdjNWE2OTU5ZTdiOTQyMmI3Mzc4MTIxZWViMmYzMzRjZmM3OTNhYzljZGQyYzc4OCJ9', NULL),
	(2, 2, 1, 'eyJpdiI6IlVxNVIxa08yeWJGcTRJQWRERmdySnc9PSIsInZhbHVlIjoiUkkvbmxZT045K2ZjZlFYaDBiTjE5Zz09IiwibWFjIjoiYTBhZmRjZDY5ZjUxYzg0MDcyNjgzODhiMjVmNmVjMDZkMzRmNTBjNDlhNTgwZmIxOGEyMDFkOTUwNGYwOGVhOSJ9', 'N', 'eyJpdiI6Im8xUEQzWkdRYm5zVVZXSll3V2dobkE9PSIsInZhbHVlIjoiUng3MlFsTDd5aUVhMHRHWnJuVEs0UT09IiwibWFjIjoiZjkzMmM3NmI5OWRmNWM4Y2E3OWFjYmY3MWUxNTljMmY3YmFiNjdkZjM1NGI5MDdjYzUzNWM4YTkzMTI0YzY2YSJ9', NULL),
	(3, 3, 3, 'eyJpdiI6IlQzK0JaWDRZQzNNTTU5bk13Q1RicHc9PSIsInZhbHVlIjoiZnZ5Uzg0MU9aK3AvcHhISUMzRitTZz09IiwibWFjIjoiZDA5NWRiZTY5OGE2YzI3MzVhNzY5MjdkZGFiODYxYWE2MGNjMDVhNTk4YjM1ZDVlNzYzM2Y2NTRhNDgyMDgyZiJ9', 'Y', 'eyJpdiI6ImxwZXpFQjEyNHVsUlY4ejUvOWRzYkE9PSIsInZhbHVlIjoiSjJ0akZtanlHOE9IZCtOUmVVNkptTlhqcE42SXFkY0thYmJyZFdwVHFBdWJOcWVTejNTdEdZbHUvd2ZCRFNaTWp2Z0FjQWR2QkFWVkFFUld2ZnFFRDA5Rms2VlBORElLZEttdHRHMHlvNFZVMzNrZVpPS0lpYkhEakUwQzAxMlpXRStsWHNTb3BCRmpmUmkyV2YyMHhRPT0iLCJtYWMiOiIzOTI3Mjk5ODAxZmY0NTg5NzczODU2OTIzMjdmYjk2NGUyYjU4ZjdiNzM2YjEzYTk2MzViNmEzN2IyMjI1MGJiIn0=', 'Y');
/*!40000 ALTER TABLE `form_critical_incident` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.households
DROP TABLE IF EXISTS `households`;
CREATE TABLE IF NOT EXISTS `households` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `housing_type_id` int(10) unsigned NOT NULL,
  `address1` text NOT NULL,
  `address2` text DEFAULT NULL,
  `community_id` int(10) unsigned NOT NULL,
  `total_income_id` int(10) unsigned NOT NULL DEFAULT 1,
  `active` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_households_housing_types` (`housing_type_id`),
  KEY `FK_households_communities` (`community_id`),
  KEY `FK_households_total_income` (`total_income_id`),
  CONSTRAINT `FK_households_communities` FOREIGN KEY (`community_id`) REFERENCES `communities` (`id`),
  CONSTRAINT `FK_households_housing_types` FOREIGN KEY (`housing_type_id`) REFERENCES `housing_types` (`id`),
  CONSTRAINT `FK_households_total_income` FOREIGN KEY (`total_income_id`) REFERENCES `total_income` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.households: ~3 rows (approximately)
/*!40000 ALTER TABLE `households` DISABLE KEYS */;
INSERT INTO `households` (`id`, `housing_type_id`, `address1`, `address2`, `community_id`, `total_income_id`, `active`, `created_at`, `updated_at`) VALUES
	(1, 1, 'eyJpdiI6IlRHcUg0TERndEpKSm1WSG1Va1phcmc9PSIsInZhbHVlIjoid3VramVORzJudENLd1MvdmhNSG9pNkp4QlhwOVZaYk5MSzROMjFhZWJTNzhicUIxMUZQbnA5RlN2aGhmeEloSUJRTFVSNmVBODBWbFFyM2ZYUzZSSmdmTFlsN084a2ZzNlUyK3pHYzFFc0tjekJDbHcyc1I0Zlp1N3lST2h5QkMiLCJtYWMiOiI3MWI1ODAxNjM1MTc5NTE3YjIxZDNlMDVhNTNmM2ZlMWM4ZGY0ZDZkOTk3NmJmNzU1Mzk0M2M3ODVkMzE1YWJlIn0=', NULL, 273, 1, 1, '2020-08-06 11:45:01', NULL),
	(2, 3, 'eyJpdiI6IktsTWpwZ0drZnhEQ0RJcFhzVTIxenc9PSIsInZhbHVlIjoiYlhjd2oxREcxTSs3RjR4RHpwajJQTWY5eVc3NEYySlhhSTFNWW5UWTU2Zis4cU1iWlFiRFFYaTZnNVNaVm9YU0ZDc3IrcERiaThKWFUyRVo4ckRXMFFOS3h4VDJkbHByMjhydEZEMnRhSnZ4SnpBQkFIbTIxWWE1RUc5WFFoNE1NZEJqZ0xtZWhIUGxFTGNmOFVLYW5vcFY3UjdkQTN1MkdPUjBPQXVCZlRJPSIsIm1hYyI6ImYyYmNlMjhlOTM1ZTVmMDE3NmQxNGNmMWVmNjczZTA5NGYyZGY4M2M1Njk5ZGFmMDQyZmQzMjZlOGUxMjc5ZTcifQ==', NULL, 435, 1, 1, '2020-08-06 11:46:06', NULL),
	(3, 3, 'eyJpdiI6IlFQbzMrUUlPeGFiamtCcGUvWHAwU1E9PSIsInZhbHVlIjoiS1A1a3JFQVBTWVgxSWhIQ2NqaUJCa3FHV2dxakdoZmxHLzFTNkNEK3JTMzBDRkF0SitZZ2lmeUNkaHdBQWlUQiIsIm1hYyI6IjAxYTVhODkxYjRmMzBkOTZiNDllYTcwMzkyMDNiOWI0NDExMGJiOTMzNWNlNTI1M2IwNWY0NDU1ZDYyNzE1ZGYifQ==', NULL, 407, 1, 1, '2020-08-06 11:47:33', NULL);
/*!40000 ALTER TABLE `households` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.housing_types
DROP TABLE IF EXISTS `housing_types`;
CREATE TABLE IF NOT EXISTS `housing_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(150) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `country` (`type`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.housing_types: ~4 rows (approximately)
/*!40000 ALTER TABLE `housing_types` DISABLE KEYS */;
INSERT INTO `housing_types` (`id`, `type`) VALUES
	(3, 'Free Lodging'),
	(2, 'Owner'),
	(4, 'Renter/Tenant'),
	(1, 'Squatter');
/*!40000 ALTER TABLE `housing_types` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.id_states
DROP TABLE IF EXISTS `id_states`;
CREATE TABLE IF NOT EXISTS `id_states` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_state` varchar(150) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `country` (`id_state`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.id_states: ~3 rows (approximately)
/*!40000 ALTER TABLE `id_states` DISABLE KEYS */;
INSERT INTO `id_states` (`id`, `id_state`) VALUES
	(2, 'Currently lost but have police report'),
	(1, 'Have identification card'),
	(3, 'Possess an EBC letter');
/*!40000 ALTER TABLE `id_states` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.insurers
DROP TABLE IF EXISTS `insurers`;
CREATE TABLE IF NOT EXISTS `insurers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `form_critical_incident_id` bigint(20) unsigned NOT NULL,
  `insurer_name` text NOT NULL,
  `insurer_address` text NOT NULL,
  `insurer_contact` text DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_insurers_form_critical_incident` (`form_critical_incident_id`),
  CONSTRAINT `FK_insurers_form_critical_incident` FOREIGN KEY (`form_critical_incident_id`) REFERENCES `form_critical_incident` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.insurers: ~1 rows (approximately)
/*!40000 ALTER TABLE `insurers` DISABLE KEYS */;
INSERT INTO `insurers` (`id`, `form_critical_incident_id`, `insurer_name`, `insurer_address`, `insurer_contact`) VALUES
	(1, 3, 'eyJpdiI6ImdlOU0vcm5uOFFPWEoyQjNPclNvMUE9PSIsInZhbHVlIjoiUWpVWjdlNmgvUEdTNmVKREpVUG1SNVcwMmJwZUVJMkpyUnp1aHUyNFZRRT0iLCJtYWMiOiIyZGUxYzA4MTMwMTlmMjI0NTEyNmM4YjdkY2UyZGI0Mzc2OTFjMzc3ODFhOGQ2YWExMmQzOTM0MTU5NjllNWMyIn0=', 'eyJpdiI6Im0xcUttajk2VHR4a1Yyai9seENOVGc9PSIsInZhbHVlIjoiY2pUVXBON1RITHQxMzRCZFBlaXkwV2k2N2c3SWo5QjVySjBlNGYyclMyMmE0SlFySXpvczVuc1p5czkwSnVxV3ROdndBM1JkZWx4d3NCYU9IWWhPSzlKZzlLbFVmd3o1T290QWJrRGdPa3M9IiwibWFjIjoiOGFjZjBhNWJkZTY5ODlmNmZlOGQyODkyMjVhYTQ1ZmQ3NDMwMTFkMzBjNDI4MGRlNGIyNzY1OGJmZGE5NTNmZCJ9', 'eyJpdiI6IjA4SjZhc0ROSk1hU244U1lGMkpJT2c9PSIsInZhbHVlIjoiWXBrWFNrZzZBbnFNbS9qdkdiOVJLREhOMzc1R3BlK2NocmdKZWZjRzZYMFZpSmtqTXRXeURpSFJqazhSTUxZSCIsIm1hYyI6ImVjZDVmYTljZmI1ZGNkZjg1NWI1MDFkY2RlOTFkMjNiMTI2ZGRlYmIwZjczNTc2ZTVkNjllNzBlMTZiM2E2OGIifQ==');
/*!40000 ALTER TABLE `insurers` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.items_lost_or_damaged
DROP TABLE IF EXISTS `items_lost_or_damaged`;
CREATE TABLE IF NOT EXISTS `items_lost_or_damaged` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(150) NOT NULL,
  `item` varchar(150) NOT NULL,
  `max_value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.items_lost_or_damaged: ~12 rows (approximately)
/*!40000 ALTER TABLE `items_lost_or_damaged` DISABLE KEYS */;
INSERT INTO `items_lost_or_damaged` (`id`, `slug`, `item`, `max_value`) VALUES
	(1, 'stove', 'Stove', 2500),
	(2, 'refrigerator', 'Refrigerator', 4000),
	(3, 'washing_machine', 'Washing Machine', 3500),
	(4, 'bed_mattress', 'Bed & Mattress', 2000),
	(5, 'wardrobe', 'Wardrobe', 3000),
	(6, 'chest_of_drawers', 'Chest of Draws', 2000),
	(7, 'living_room_set', 'Living Room Set', 3500),
	(8, 'dining_room_set', 'Dining Room Set', 3500),
	(9, 'kitchen_cupboards', 'Kitchen Cupboards', 2000),
	(10, 'school_supplies_primary', 'School Supplies (Primary)', 700),
	(11, 'school_supplies_secondary', 'School Supplies (Secondary)', 1000),
	(12, 'clothing', 'Clothing', NULL);
/*!40000 ALTER TABLE `items_lost_or_damaged` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.jobs
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_reserved_reserved_at_index` (`queue`,`reserved`,`reserved_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table msdfs_forms_db.jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.job_titles
DROP TABLE IF EXISTS `job_titles`;
CREATE TABLE IF NOT EXISTS `job_titles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `label` varchar(150) DEFAULT NULL,
  `help` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.job_titles: ~18 rows (approximately)
/*!40000 ALTER TABLE `job_titles` DISABLE KEYS */;
INSERT INTO `job_titles` (`id`, `title`, `label`, `help`) VALUES
	(1, 'Minister of Religion', NULL, NULL),
	(2, 'Managing Director, Director or Manager', NULL, NULL),
	(3, 'Professionals (University Graduates)', 'Qualification', 'Qualification'),
	(4, 'Member of Parliament', NULL, NULL),
	(5, 'Mayor', NULL, NULL),
	(6, 'Borough or County Councilor', NULL, NULL),
	(7, 'Notary Public', NULL, NULL),
	(8, 'Justice of the Peace', NULL, NULL),
	(9, 'Commissioner of Affidavits', NULL, NULL),
	(10, 'Senior Public Servants Range 30+', 'Range', 'Range'),
	(11, 'Police Officer Corporal+', 'Regimental Number', 'Regimental Number'),
	(12, 'Prison Officer II +', 'Regimental Number', 'Regimental Number'),
	(13, 'Fire Sub-Officer +', 'Regimental Number', 'Regimental Number'),
	(14, 'Member of Defense Force Corporal/Leading Seaman+', 'Regimental Number', 'Regimental Number'),
	(15, 'School Principal', NULL, NULL),
	(16, 'Vice-Principal', NULL, NULL),
	(17, 'Lecturer', NULL, NULL),
	(18, 'Graduate Teacher I +', NULL, NULL);
/*!40000 ALTER TABLE `job_titles` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.marital_status
DROP TABLE IF EXISTS `marital_status`;
CREATE TABLE IF NOT EXISTS `marital_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(150) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `country` (`status`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.marital_status: ~6 rows (approximately)
/*!40000 ALTER TABLE `marital_status` DISABLE KEYS */;
INSERT INTO `marital_status` (`id`, `status`) VALUES
	(3, 'Common-Law'),
	(2, 'Married'),
	(6, 'Other'),
	(4, 'Separated'),
	(1, 'Single'),
	(5, 'Widow');
/*!40000 ALTER TABLE `marital_status` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table msdfs_forms_db.migrations: ~2 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table msdfs_forms_db.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.people
DROP TABLE IF EXISTS `people`;
CREATE TABLE IF NOT EXISTS `people` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` text NOT NULL,
  `surname` text NOT NULL,
  `othername` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `gender` char(1) NOT NULL,
  `dob` date NOT NULL,
  `marital_status_id` int(10) unsigned DEFAULT NULL,
  `marital_status_other` text DEFAULT NULL,
  `national_id` bigint(20) DEFAULT NULL,
  `national_id_state_id` int(10) unsigned DEFAULT NULL,
  `drivers_permit` text DEFAULT NULL,
  `passport` text DEFAULT NULL,
  `employment_status_id` int(10) unsigned NOT NULL,
  `employment_status_other` text DEFAULT NULL,
  `primary_mobile_contact` text DEFAULT NULL,
  `secondary_mobile_contact` text DEFAULT NULL,
  `land_line_telephone_contact` text DEFAULT NULL,
  `income_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_persons_id_states` (`national_id_state_id`),
  KEY `FK_persons_employment_status` (`employment_status_id`),
  KEY `FK_persons_total_income` (`income_id`),
  KEY `FK_persons_marital_status` (`marital_status_id`),
  CONSTRAINT `FK_persons_employment_status` FOREIGN KEY (`employment_status_id`) REFERENCES `employment_status` (`id`),
  CONSTRAINT `FK_persons_id_states` FOREIGN KEY (`national_id_state_id`) REFERENCES `id_states` (`id`),
  CONSTRAINT `FK_persons_marital_status` FOREIGN KEY (`marital_status_id`) REFERENCES `marital_status` (`id`),
  CONSTRAINT `FK_persons_total_income` FOREIGN KEY (`income_id`) REFERENCES `total_income` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.people: ~6 rows (approximately)
/*!40000 ALTER TABLE `people` DISABLE KEYS */;
INSERT INTO `people` (`id`, `first_name`, `surname`, `othername`, `email`, `gender`, `dob`, `marital_status_id`, `marital_status_other`, `national_id`, `national_id_state_id`, `drivers_permit`, `passport`, `employment_status_id`, `employment_status_other`, `primary_mobile_contact`, `secondary_mobile_contact`, `land_line_telephone_contact`, `income_id`, `created_at`, `updated_at`) VALUES
	(1, 'eyJpdiI6InhubzJBc1hLaFMvZDVLRVdza0hEd2c9PSIsInZhbHVlIjoiMC9KZXNjMkxDdnR6MGphU2h3ZTEwQT09IiwibWFjIjoiOGI5ZDM3NjZiNGVlMzFiYjRhOWY4OWFjZjliZTQ4ZTA5MTI1ZGQ2YjE3N2YxYmNkYjE1ZDZjMDExMTZhMmZmNiJ9', 'eyJpdiI6Im43Q3dySUk3TDVwd0hOb2M3TVJCUXc9PSIsInZhbHVlIjoiNjRHZlpnYWhjR1pDbVkyV1hZVlZwUT09IiwibWFjIjoiYTc1M2VlYTlmMWM4NTJiNjUzZTJmNTA5MmM4MDY1ODQ3ODZiNTJkZmJhMDlhNDM3NzA4YjYyMzczYzEwYzJiMiJ9', 'eyJpdiI6IjJ4cEl5c1VCMlZnellNQm5CaVJkT1E9PSIsInZhbHVlIjoidU9WTHV0c2tWdmFBWUhSSndjOFBVdz09IiwibWFjIjoiNTAwZmUxYmQ4MzkyZWNlZTdmNzY0YTQ4MWYwZjI2ZTllYTg3MzUyYjJiOTgxODQ3ODYwN2FmM2RhYzZjYWY2NCJ9', 'eyJpdiI6IjlPY0VHNzJOSERHTVMxZjJoZ0dmWWc9PSIsInZhbHVlIjoiNkdFbFI1b3NlZkgrUUgyTTl1UTFBVHBQdGd3Z2UzSXl3ak9IYjZWUkROWHJ5VEhhZHIxMUFXS1pnR3V5WjZGRiIsIm1hYyI6ImFjM2MyMTFkM2VlOWEzZThiOGJiZDM0NzA4NGY1NTA3MTIwODM1ZGFkZjRiOWZlMTQ3YjZhZmQxZDRlZThhNGUifQ==', 'M', '1989-01-02', 3, 'eyJpdiI6Ii94YmhNZUFqMnhESEs1allzSVRtcFE9PSIsInZhbHVlIjoib1hpMGI3d3kvWGhUZThnZmt6aTFvdz09IiwibWFjIjoiMzY3ODI3MWMzNDc3ODFlZTlkODczNjlhMWE0MmYxMGU1NjBkYjI2MzQyYmFkMTZhZDhiNTNlNmMzZGUxZTlhZSJ9', 59733333333, 3, 'eyJpdiI6Ik50U2U3M0lYZmNvQjhTZHJiekZkZHc9PSIsInZhbHVlIjoiYmJ0L1d6QWRkV0J4d29TMGk4REo1QT09IiwibWFjIjoiYjUyYWE1NTU0NGFmNGM4OTM1ZGQxN2EzMjkxNzhiODI1NDMzZjNlMDZjYTcyNjQzNTgyZWEyNzE0NGFmMzJiYyJ9', 'eyJpdiI6IjhobXIvSXl3SWV2UUREQnJWRDhwQlE9PSIsInZhbHVlIjoiVlhwakl6dlhiZEtlUU9hajMraFhTQT09IiwibWFjIjoiNWJkNjk2NDlkOWUxMWVjNDcwOGEzOTQ0ODBjOWVjNjllNGFkYjQwNjJkNjM3ZmYxMzM0NmQ2ZTFiN2IyOWYzNyJ9', 5, 'eyJpdiI6Ik94cW5LUG93L2R5NXZHd1oyV3JFd1E9PSIsInZhbHVlIjoiN0YxVHFaa3BBVHd1d0dNKzV0ZEc3QT09IiwibWFjIjoiNGQ0YWViODYyMTZhMjYzN2U0YmVhZTViOGZlZTk2OGY1MmVmM2Y0NTdhYWY0OThkZGEyNmU2YWU4YjFkMWNiOSJ9', 'eyJpdiI6ImRXY012WCt0SWptQjMwZFZDVlFiSHc9PSIsInZhbHVlIjoiSGpFa1EyaUhlaDdrSk80bS9sejFHb1FFTTYvVEh0QjQxTWVMbE5pT2lJbz0iLCJtYWMiOiJkMTE1ZDRmYmQ3NzUwMmQxMWYxMmEwMzliMTg2MzczMTZjYmExZTBhMDAwMTU0MzY4YzlhY2VlZjVlMDE5ZTc4In0=', 'eyJpdiI6IkpQSnRpVE94VVp1SkdnUWFXa1YwTFE9PSIsInZhbHVlIjoiQ3F2ZU8reXlQUElCM1FPTnBJcnJZMCt3RkU5bi9JRk9Dc3FpdnRsQ3VQTT0iLCJtYWMiOiIyZDVjYTlkMTQ4ZDA2ZTc1MzQyOGMzOGVmNTk1MmUxMTU1MWVkMWUxN2RkNDk3NTYzY2JlY2IyM2E3YWE2NjFhIn0=', 'eyJpdiI6ImNYWWlOc3RabjlUMmVQVGRUcitXbFE9PSIsInZhbHVlIjoiUzBqUUgrZytsMWRTUTd6Umd0TGg1OUxLMFMvWGVSczhyT3QybEo5aGdCcz0iLCJtYWMiOiI4ZWQwNmIyMzg1M2VhMjFkNWFlMzdmZWEwY2EyNzI4ZWFjY2VmYmI0MWNlMzZhZTFkNjhkMDczODY1M2QyMjA5In0=', NULL, '2020-08-06 11:45:01', '2020-08-06 11:45:01'),
	(2, 'eyJpdiI6IjhURjNSTFZDTXhJeVN4SHN6eHZnT3c9PSIsInZhbHVlIjoiaHRFaDMwMG9UdXNaZTErWGhETFN0QT09IiwibWFjIjoiOWRjYTU1MzUwMTA1N2RjOTY5MmI5N2E0MGMwY2E4ZGU3MTg3MWNlODhhZTBiZDc2YzRjODdkZjllZmQxZjk3OSJ9', 'eyJpdiI6InQ4WldEQmFvWEZyZERvM2VGWXVjbVE9PSIsInZhbHVlIjoicmpBMCtNeUwyZGd6M2Z0YWF0eUxtQT09IiwibWFjIjoiNDY0YzM1N2IzZDkyMDQyOWJkYmU0ZmUyZWFlZDQxOTBmYWFhNmJjZjA2NGVhOTg3MDk0NjMwZTQxNWQ2MWMzMyJ9', 'eyJpdiI6IkQ1TDlWMWFYaTc2bDBiMitOVFZHSnc9PSIsInZhbHVlIjoicnExakMrQUoyWmRUc29TQXFqV3dudz09IiwibWFjIjoiNDhiZmI0MjgxOTM3NzdjZjU5N2U5OGM2NzM4MGRmYTQwYzVlNzQxY2U0MWRlY2I4MzNhZmZiM2RiNTkzOThmYiJ9', 'eyJpdiI6InVmQU9VN0piQVQ2NEdzRVpza1BaY0E9PSIsInZhbHVlIjoic01NaWNWUUp2NTM0MisxczNjY3dYdz09IiwibWFjIjoiZjhlODkzY2E2YTI5ZGZmODEwNjQxY2Q3MmU5ZWJhYTRjMTU2NDYxMTc5OTQ2YTQzMTlmMWE5ZDk2NmUyMDEzNSJ9', 'F', '2000-02-15', NULL, 'eyJpdiI6IkxHT0N5bHc5Q0ZmTUJzVmNlVkYySFE9PSIsInZhbHVlIjoidVUyaGsxK0o5L3NhMklEd09kN3B0Zz09IiwibWFjIjoiYWU1MGY0NTNlZmU2M2VjYTFjNmQxNDc0MzU5Mzk2YzgxMGZhNzQ1MDgxNzc3YzczM2NkYzYzOTZjZjg5NzdjMCJ9', 77744444444, NULL, NULL, NULL, 2, 'eyJpdiI6Im5VR2hlbS9naUNoMFFMTldvaDlCK1E9PSIsInZhbHVlIjoieWlpdXRLaTBONlRtVFQ3aWZva2UvQT09IiwibWFjIjoiMzA2MTZjMzIwNmU1ZTFjZDYzMGJjMzA5OTZhN2U1ZDkzM2IzYjY2NzhlOTNhMTY5ODI4NzQyNjRlZDJmNzY5NCJ9', 'eyJpdiI6IjVSZ0hSVkVjd3IzWWVBYmNZUjFuM0E9PSIsInZhbHVlIjoiWXNyK05Ebld3ZVZGNXNoZG1uZmpJUT09IiwibWFjIjoiOGIwN2UzNmJkZmRjZTk1MDUyMGU4YjFiNDcxMjEzMjFkYzk3YWUwNzQyN2Q4MWM2ZjNkOTYzZWY5MmIzMDMyNyJ9', 'eyJpdiI6InBFVlk0SVNYTXFDSCtQcGR4SE03bWc9PSIsInZhbHVlIjoic0t3VXV5a1RCOHlWemRnbHZjbGRsZz09IiwibWFjIjoiNWI2YjI3ZDdkYzczOTMzMjhjMDYzMWY1MDM0ODhmYmQ2OGE3OTZhZjczYmI4MGM1OWI5MGY0NmRkYTg1YTNhNSJ9', 'eyJpdiI6ImNsWDNwOEFnVTVjNUlWcGlTOFE2b1E9PSIsInZhbHVlIjoiR01VRk9JZVJ1bzRlMk1pYTdmQnNHdz09IiwibWFjIjoiZjE1ZmFkNGJiNzU0YTEyZWU5ZGJlOTM5Zjg2NzNiYTZmZTRhYmQ0NDJlMjAxYjBiMjYwOGNkYjcyYmFmZjdjZSJ9', NULL, '2020-08-06 11:45:01', '2020-08-06 11:45:01'),
	(3, 'eyJpdiI6Ikd2bjk3NzlwQXFDd1JqVXdKRUhUNXc9PSIsInZhbHVlIjoiMkV3ZmhhVnltUC8xQ2Z4eDJ6dlZ0dz09IiwibWFjIjoiMDM3OWM4YjYyYzE5ZjA0MWZhNjgyYzdmNmJmMTc1YmNiYWY0NzNjY2UwNDRjMzNhYTA3YWUzZGM1MDBlZDljNiJ9', 'eyJpdiI6IkVYanBNa0VwdTF1OHliVVhxZEM4UGc9PSIsInZhbHVlIjoiMU5Fa1Jlb0tKa29Zd3ViaXZNN3o3dz09IiwibWFjIjoiNjk3ODBjZmEyNzRmYjQxYzQ5MDdlMGQ3MTdlNzZjYWRiNmM5OGMyYzMzMzdlOGQ0MTU3ZjFiYzM2YzZkOWJiMyJ9', 'eyJpdiI6ImtlM2dmVDVpZEliQXJBUkhyUTV2R1E9PSIsInZhbHVlIjoiTTlPdWNic0lDWEV1UVJ2MDJ1akp0Zz09IiwibWFjIjoiMmZkOTk2MDRhZWMzY2E5NTExZTAzOTk3OTk0MGM4MDc3NzgxYTYwN2ZlMWQ4Zjk2ODI2OWM2NmFlNjlhMDE5YSJ9', 'eyJpdiI6InRsSlFUeTc4Q202WjYwZVE0WkVVT3c9PSIsInZhbHVlIjoiVjJqbG5YYlU1ckFERGd1akV5Q0xFdz09IiwibWFjIjoiNDFkMzJlNTIxMWZiNTdkNGNmZmI2NmExYzRjM2NjM2YxZWNmMWZjYTgyMWEwMzdmMzhiZmFkZmM3ZTY3ZDI1NSJ9', 'F', '2000-02-15', NULL, 'eyJpdiI6InNSZFUzUUFSTFJsRXA3SVdBQ1pGM1E9PSIsInZhbHVlIjoiZ3M1R05ZZTE1eWZqMVVmeFFYci8zUT09IiwibWFjIjoiOGFkMWIxMDMxOGU1ZjMxNjE1YzQ3ZGRiODc0ZmY1YmRhNThlMjQ0M2Q5ZTZiMjIwYWM1MmU3ZmFkZGZjNDkxYyJ9', 38022222222, NULL, NULL, NULL, 9, 'eyJpdiI6IlAwRWdzNjlvTElaaElxa2dRdW9QUWc9PSIsInZhbHVlIjoiazR5cTZlY1AxSWhjOXhsY0tLMVEwUT09IiwibWFjIjoiNTkwZTQ5ZmYxYjI0YWMyYWM4NTBhODNjZTRmMWZmZWRjYzRlM2RlNTNhZWJkMjFmYjJiNzEwNjQ1ODIyNTliZCJ9', 'eyJpdiI6ImRnU290U0tIWlZxZ2NxRitzQm1SVFE9PSIsInZhbHVlIjoidCtDcWtvR0RnTnl4dHo4Y1dXdzFCQT09IiwibWFjIjoiMjlmM2YwNzJhMTc4ZWY4MDFiMGYxZGQ2M2YwMDk4YjE4NWMwZGRhZjk4OTU4NjkyOGU4MGY0MzI5OGE2NmUwMCJ9', 'eyJpdiI6IjZJa2Q2ckRhb1lTQnovNXMybWd1Vnc9PSIsInZhbHVlIjoiUVl2QTM2eng5SDdDaVkzMTlPL3lBUT09IiwibWFjIjoiNGUzMzZlYzE2ODBkOTMyMjkwMmVlNjU1YTVmOTQ2NmY4YjY1MjE5ZGNhMzA0YzliZDMwYjk4NjkyNjk1ZTRiOCJ9', 'eyJpdiI6InJEZFFtTTlNODBZcmlwcmtyYUVXNWc9PSIsInZhbHVlIjoiNGYySVRVdFAvMEJqL1Yya1ltbEpVQT09IiwibWFjIjoiMWUzNTUxYzdmZTA5MTJiZTAyYjY0NGIyZTQ4MmU3ZWUyMTA3MDg0OGRhNjcxNDJmZDUzNmYzMDIzNWJkNzFmNSJ9', NULL, '2020-08-06 11:45:01', '2020-08-06 11:45:01'),
	(4, 'eyJpdiI6IklXV0NYa2NZV1M1QWZZMDJVbnF1RWc9PSIsInZhbHVlIjoidUxZeThqWTNCSjlHVUdOR1NnbjFLdz09IiwibWFjIjoiYzJlNmM0MDNhOGFjZTRlN2UzYTU3YTg2NGU3ZjcwY2I0Nzc0ZWFiOTczYzRiNTVlMTEwZjlhNWM2NjE0NGJkMiJ9', 'eyJpdiI6ImcydVBjVU9saGhFVkM2Wll4cXRSdFE9PSIsInZhbHVlIjoiQ0Jwd01kcCs4elpSc1NzelMrbSs2Zz09IiwibWFjIjoiZTIyMTMyMzNmNzI4NzQ0YjUyNmUzYjA0ODg3OTA3NWVkYzlkNDU3MzBmNTZlYzNlOTVjNjc2YmQ3YWEzY2E2YyJ9', 'eyJpdiI6Ikk2NnUrSllzaGJ4UEROR3RFd1JGK3c9PSIsInZhbHVlIjoiaFVYZUNIRFVQWUt3eTVybUMxclM0dz09IiwibWFjIjoiZGYwNzEyYTAyM2NhZDYyNzBkMjI3Yzc5NTllMGY3NTk4MjMzNzkzZTlkY2NjNmIxNTZmMWUxMWUxZTZiYzk5MSJ9', 'eyJpdiI6ImgzVUtTdFdPWTh4TDhGenBkWkFOYkE9PSIsInZhbHVlIjoibCtpdFRHREVNSG1NVFZ1UXlPN3hDT0xkeGZsL2Y3STBuUnd2bllxVE9CQT0iLCJtYWMiOiIyMzFlZmRiZDNkMDc4M2M5NDI0Y2JiMmU3ZDRjMTFjNGE3NWYxZjg5ZDM3NzVkZGU5YzgzMTFiNjhhODcxNTc5In0=', 'F', '1989-01-16', 2, 'eyJpdiI6ImtzUjZVVHRCWWxZS2FjeFJTK1gxZ1E9PSIsInZhbHVlIjoiZVkrU0VkTkRQSHVSWWd1dDRXemtiQT09IiwibWFjIjoiY2E4ZjhiMzQzMzkyM2QyZGNhODdlZThmYTRjZTg3YTljYWYyNmE4ZDI4MjJlZTAwNTFlNzQyZjk4YzdkYjhlMyJ9', 75622222222, 3, 'eyJpdiI6Im5wQ2NIaTVzdzhCa09FTUlJSnZIWnc9PSIsInZhbHVlIjoiSmJvbGd1aUhGRDVwTWdXUTE2Qzc2Zz09IiwibWFjIjoiMmVkZjdiOTE2ZDliMGIzYzIyNzA2OGY5YWEyNWE2NGFjZWExN2ZhZTZhMWIxODcwZjdhYTU5N2RiMDhmZTI0NyJ9', 'eyJpdiI6IkJjOTdUMWYwK053Tnl5Z0sxeGFZL0E9PSIsInZhbHVlIjoiQm1JU0dqWldMNE52QWI5OWNYVU5FQT09IiwibWFjIjoiZjRkOGJmNzdiYTgxOTk5OTFjN2Q4MmE2MGRjNDIwODY5NTU4ZGE4YTdhN2Y3MzdiMDBmZTQzYWVjMzRlNWU0MyJ9', 4, 'eyJpdiI6Ii96ZkptWXV6WU9Da08vOGxieXFiVEE9PSIsInZhbHVlIjoiSDlyVUxkUVEybHRoZWpVakFLNHJEQT09IiwibWFjIjoiZmU3NDYxMzI3OGZkMjJmOGNjOGMyNTMxZWNkY2I5NGQxODU5ZGU4ZmMzMzk1YmEzMmVmYmZjZjQ1NTM4MzE3YyJ9', 'eyJpdiI6InJYMWdYY2NGUUc2TmhvNmlpZWVKRVE9PSIsInZhbHVlIjoiWHhnS1ZIOFloaHR3WlVEaEF3SWxJcS94Q20wakdoY05DM3I2OTg1bUF2WT0iLCJtYWMiOiIxMGZmMzY1MDFhMjdmOTAwODBjYzFiODVhNGM4NDkxMjc5MzE5Mzg1NzQxYTJlY2RkNWFjYjFhNWQzNTM1ZDExIn0=', 'eyJpdiI6Im1JdEgwdDFrdXYrTG80Uk1CRHlXMEE9PSIsInZhbHVlIjoiRlo5amdnSHFybkRsYXlZOXNHamc3Tk5CUlpXcGlSZ3B0WGlMeGt2dVFIYz0iLCJtYWMiOiJmZTFjNGY3ZTRhZGQyMGE1Y2Q2NzgxOGRiNjc2NDI5YTlkNGI3NzQ5YWU3YzViZjIyOTkyYmJkNGMxMTk5YTEyIn0=', 'eyJpdiI6ImlvbVZFQTJGUC9JcGdQdjZpSHk3Nmc9PSIsInZhbHVlIjoiNk44VXMwVjc0eTBRZERzS01WUDJqcTZYbDNPVU81NlNzdFhPeFNlZFUrUT0iLCJtYWMiOiIwMTlhOThkMWE4NWNjY2JlZmRhZjEyNzExZDQwYmY2NTMwM2M1NjJiMzM3MGM3ODdkZWQ4NTE1ODZiMmJlZDNiIn0=', NULL, '2020-08-06 11:46:06', '2020-08-06 11:46:06'),
	(5, 'eyJpdiI6ImFKaHFDcml3RFVrbFM2dFVwRnRPa2c9PSIsInZhbHVlIjoiNFhsb2lxVjYvbytxWmI1dURUdHhGZz09IiwibWFjIjoiMDExYjU3ZGFmNzBiNTM1OTVlMWUwZjYzZmRiOWNiZjQ5YWY5MzhhNzIwNTdiNjEzNjhiNWNkYmI5YjJhYzcyMSJ9', 'eyJpdiI6ImZPeFRpZnpUZ2NvNHl2dTcxc0VqQlE9PSIsInZhbHVlIjoidGdLRW1PSnkvNjhabE9mZXpOUnZGUT09IiwibWFjIjoiZGE4ZWM0YTAwNWJlODM0MDczNWQzYjg3ZWQxZjA0YjZlNjExOTM1MzRkZjg2NTJkOGY4MzFjMDE0M2IzNThiMSJ9', 'eyJpdiI6IkU0UVkzZVFmOFE2Y2NsQnRHeXRKNUE9PSIsInZhbHVlIjoiQk14TGRXcDg5SDZxdEtDOVFVREdoZz09IiwibWFjIjoiMDNhMmRiNDg4MWZkY2I0YjBkOGVjZTdhNjUyNDg3MjNmZjY2ZjAyODNkOGMzMzA0NjM1ZDI1NjkyOGZjYzg2NSJ9', 'eyJpdiI6IldXOUoyVjcrZVJkUnpsNVRSRkYzb0E9PSIsInZhbHVlIjoibEFRc00vNGhMK1ZHS2ZiWklmM0NGZjJDNEdRRkxsbEdWVDVHckwvNFZVMD0iLCJtYWMiOiI5N2UyM2UzMDZjOGU0MTY1OTRkN2UzYzcyMzY3MGIxMTcxNWI2M2QzMWRlZmJkYzAwZmM1NThlOTg4MzUxMWZmIn0=', 'M', '2000-02-08', 6, 'eyJpdiI6Im5kVkw0Zm9WYm1mQkY2amMrdHRDSEE9PSIsInZhbHVlIjoiSG9vbEthVHFzVlJkVFJna0NtTTlDZz09IiwibWFjIjoiZDIzYzM1NjBkNGNkYjgyNTZkZjE4YjZiN2MyMDQxMWYzZjZkNDY1MTIwNWNkZDJhZTExZjgwNmQyMDM4YjMyOCJ9', 26322222222, 2, 'eyJpdiI6Ikp1U2VvNlp1V08yNmlER2VQMkNpU1E9PSIsInZhbHVlIjoiRXZjVDdRbkwzUnhOWlhiV1IzeWFXdz09IiwibWFjIjoiNjIwMWZkMDY1OGRiMDY5ZmE1YzJlN2FkZWQ5NjYyYTUxZDcyMzlkZTlmYWNhMTRhMDgyNmJiZmQwOWRjYTJjOCJ9', 'eyJpdiI6IkJFUlkrM05IbDdyeHpWYnhiTERjY3c9PSIsInZhbHVlIjoiTXJ2MFpmM3JjSXFHNWdQYURZa2dCdz09IiwibWFjIjoiMWViMTk2ZjJmYzI1MGYyMTliODQ2ZmU3ODY3ZmNlNGRiMDgzNTM1MjFkYjRlNDQ2Y2VmMWJlYjMwZDMwOThkMCJ9', 9, 'eyJpdiI6Ink5aldvL2p0anVrb2s2a2VseHV2M3c9PSIsInZhbHVlIjoiYjErZkl3RW43enVubnhUVnZMbHlRZz09IiwibWFjIjoiMDgzNzljOWE5ZDY4ZmY4MzkwYWYwMWJiZjU3NDJkNGZkMGQwOGFlNDNmODU4YzQ3Yzk0OTdlZWVmM2RlYjM3NSJ9', 'eyJpdiI6InhkZThKR1E4dzhmamRhOE5OVTRaY2c9PSIsInZhbHVlIjoiTkRBVDM2UEdPTlFsd3NuRi9JMWd2c0w0cURMODg5M1p1c0lGSmFtdnN5VT0iLCJtYWMiOiI2ODg3NjhiMDFkZjFhYTVkYWRjZWM3MjAzMWY5NjgzNWQxM2MwMDllNDJkMmFkZGJkNjg4MWJkNzc1NDQ2NjdiIn0=', 'eyJpdiI6InFqZUlOemhzeGpDNVNwdnFsTDJ4K1E9PSIsInZhbHVlIjoieG5aVkxFci9oSW9ER205WXIrckNvZWdGQjBQVTNNQnFRMXMweWw4RWpDST0iLCJtYWMiOiJkYWQyYmFjNDNlNDgzMmU1MTRkYTUzM2NlYWRmNTk4M2U4OWI1MTdiMDgwZmY4MThmNDQ0ZWE0ZTEyNmJiZTkyIn0=', 'eyJpdiI6IkdLQm9SZXdhaXpJMWgvK21rZUtmeUE9PSIsInZhbHVlIjoieCtxS0dtT0N5c0Z5c3B1UjlsSDF3T2VuWmhiODV1Yng2VnBWeGh1WGlWST0iLCJtYWMiOiIyYjIwMzJlNWFkYWY0MWEyYzQ4NjRkNGVhYTU4NzcxMjZlZjM1NGNhMWUzM2EwMzJmMzVhZWMyM2Y1MzM1NmZlIn0=', NULL, '2020-08-06 11:47:33', '2020-08-06 11:47:33'),
	(6, 'eyJpdiI6Ii9OSDgyYlpJQVdiL2RQU2xOTHk0L3c9PSIsInZhbHVlIjoiNU9ESVRIR2RBdkF5Nk1rSDVKbjBEdz09IiwibWFjIjoiOWRmNDA2YmYwMjgyNmZkMDJiOWVmNmZjYWE5MzBmMTczOTQyY2UwOGFjMzQ3Y2EyOTAzMDliNDRmNGI4MDVhNSJ9', 'eyJpdiI6Imc5bWFWWTF5L0l5NHVCeVhzRmJFRXc9PSIsInZhbHVlIjoiS24rVm9jWktBU3phdkVVR1pvaE1TUT09IiwibWFjIjoiNDEyZDMyNjExMjQwMTdkZThlNmU0YTFhMWE2NTBhNjExMDFkYmRhYzBlYjY1ZWYwNTVmYzg4OWI0ZTYxNDI2MSJ9', 'eyJpdiI6Iktibkszck9VM05yOXBNaG05cGloamc9PSIsInZhbHVlIjoiQlhYRjJMdVQxK3BGU0ZFbVdIN1VwQT09IiwibWFjIjoiNjc5YTQxY2YxMWI1ZmQyNWNlYTMzYWFmOGI5OWFiZWY4MzE2MzA4NTRhNTI5Njk1NTE0NjFkZWZlNTAyNTlmNSJ9', 'eyJpdiI6IitTRUppTTJhTW5ZZ08yTmxqd2JMVnc9PSIsInZhbHVlIjoieWtwbzk3R3V6bHdlVHFJN3NISU1GZz09IiwibWFjIjoiYzEzZGJhNTI1YzBjZmI3MmUzZTk0OGM5ZjQxZmM0ODFlYmRkNDVmZTQ4Yjg5ZjI1NDJlYzNiNWQ1ZjZkNmY4NyJ9', 'F', '1989-01-09', NULL, 'eyJpdiI6IktrZFZibWc1cXVsMlR2by9QRGtBalE9PSIsInZhbHVlIjoidTdZeXJyckdwTUlTckZ1bk56SVpjUT09IiwibWFjIjoiNGI0OWZmZmYzMzRmMjNiNmQ0Y2I4NGZlYThmOWUwM2EyZjI5YTkxNWEzNWFlMmRkYWJmY2JiNzU5YTA1Mjg4NSJ9', 21322222222, NULL, NULL, NULL, 6, 'eyJpdiI6ImU5YlpFdkV2UVQzQVp5RTRoTUx1dGc9PSIsInZhbHVlIjoia3ZNNXJOeUdONzZDODc1aVhkTkhEUT09IiwibWFjIjoiYzUxNGQzZjVkNmRlMDQyZWE0MzA4ZTMxMjc3ZGIyOGZkYmRjOGI3NWE4MWEyZWZmODVmNTFmOTczOTRkMTQ0ZCJ9', 'eyJpdiI6ImppZzJVaDBPVUFaSmE2YmJENjRpUEE9PSIsInZhbHVlIjoiZDA3WDhxQ21vUGlIRnJuVkttVEVIZz09IiwibWFjIjoiZjY2OWEzNzFhOTU3NTdlZWU1MzJhNWViMmNkZDc5NGM1ZDYzNzQyYmY1M2U4YWFlYTg0NGY1NGI1ODhmODhiNSJ9', 'eyJpdiI6IjF6QUZsdmpxRVQyTDgxREJ0QndWeWc9PSIsInZhbHVlIjoidTh4cW1ueTN5VU01ZHdQeGdpdVQ2Zz09IiwibWFjIjoiNThiMTljYjdjNjBmY2U4ZmIzZTQ3YWExMWRmMDg1MTA2N2U4MGVmMDNiNDc0OGFkZTZlMjZjZjFhODg3YWVhNiJ9', 'eyJpdiI6InlkRkh5S0pZQktMTkk4S1N5bEgxa2c9PSIsInZhbHVlIjoieTRTV3R4OGdKV0lBa09NN3FuZk9iQT09IiwibWFjIjoiYmY0ZThlYzk4ZTFlZDQ4MmVkMTQ4MTQ1ZDUxN2I1ODFjZDdhN2YyZjAxZDk1ZjAwNWUwOTBlOTA0ZGU3NzkwYiJ9', NULL, '2020-08-06 11:47:33', '2020-08-06 11:47:33');
/*!40000 ALTER TABLE `people` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.person_household
DROP TABLE IF EXISTS `person_household`;
CREATE TABLE IF NOT EXISTS `person_household` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `person_id` bigint(20) unsigned NOT NULL,
  `household_id` bigint(20) unsigned NOT NULL,
  `relationship_id` int(10) unsigned DEFAULT NULL,
  `relationship_other` varchar(150) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_person_household_persons` (`person_id`),
  KEY `FK_person_household_households` (`household_id`),
  KEY `FK_person_household_relationships` (`relationship_id`),
  CONSTRAINT `FK_person_household_households` FOREIGN KEY (`household_id`) REFERENCES `households` (`id`),
  CONSTRAINT `FK_person_household_persons` FOREIGN KEY (`person_id`) REFERENCES `people` (`id`),
  CONSTRAINT `FK_person_household_relationships` FOREIGN KEY (`relationship_id`) REFERENCES `relationships` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.person_household: ~6 rows (approximately)
/*!40000 ALTER TABLE `person_household` DISABLE KEYS */;
INSERT INTO `person_household` (`id`, `person_id`, `household_id`, `relationship_id`, `relationship_other`, `active`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 0, NULL, 1, '2020-08-06 11:45:01', '2020-08-06 11:45:01'),
	(2, 2, 1, 4, NULL, 1, '2020-08-06 11:45:01', '2020-08-06 11:45:01'),
	(3, 3, 1, 5, NULL, 1, '2020-08-06 11:45:01', '2020-08-06 11:45:01'),
	(4, 4, 2, 0, NULL, 1, '2020-08-06 11:46:06', '2020-08-06 11:46:06'),
	(5, 5, 3, 0, NULL, 1, '2020-08-06 11:47:33', '2020-08-06 11:47:33'),
	(6, 6, 3, 1, NULL, 1, '2020-08-06 11:47:33', '2020-08-06 11:47:33');
/*!40000 ALTER TABLE `person_household` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.regions
DROP TABLE IF EXISTS `regions`;
CREATE TABLE IF NOT EXISTS `regions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `region` varchar(150) NOT NULL,
  `code` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `country` (`region`) USING BTREE,
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.regions: ~22 rows (approximately)
/*!40000 ALTER TABLE `regions` DISABLE KEYS */;
INSERT INTO `regions` (`id`, `region`, `code`) VALUES
	(1, 'Tobago', 1000),
	(2, 'City of Port of Spain', 10),
	(3, 'Mayaro/Rio Claro', 11),
	(4, 'Sangre Grande', 12),
	(5, 'Princes Town', 13),
	(6, 'Penal/Debe', 14),
	(7, 'Siparia', 15),
	(8, 'City of San Fernando', 20),
	(9, 'Borough of Arima', 30),
	(10, 'Borough of Chaguanas', 40),
	(11, 'Borough of Point Fortin', 50),
	(12, 'Diego Martin', 60),
	(13, 'San Juan/Laventille', 70),
	(14, 'Tunapuna/Piarco', 80),
	(15, 'Couva/Tabaquite/Talparo', 90),
	(16, 'Parish of St. George', 91),
	(17, 'Parish of St. Mary', 92),
	(18, 'Parish of St. Andrew', 93),
	(19, 'Parish of St. Patrick', 94),
	(20, 'Parish of St. David', 95),
	(21, 'Parish of St. Paul', 96),
	(22, 'Parish of St. John', 97);
/*!40000 ALTER TABLE `regions` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.relationships
DROP TABLE IF EXISTS `relationships`;
CREATE TABLE IF NOT EXISTS `relationships` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `relationship` varchar(150) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `country` (`relationship`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.relationships: ~10 rows (approximately)
/*!40000 ALTER TABLE `relationships` DISABLE KEYS */;
INSERT INTO `relationships` (`id`, `relationship`, `description`) VALUES
	(0, 'Applicant', NULL),
	(1, 'Spouse', NULL),
	(2, 'Child', NULL),
	(3, 'Sibling', NULL),
	(4, 'Parent', NULL),
	(5, 'Grandparent', NULL),
	(6, 'Grandchild', NULL),
	(7, 'Relative', NULL),
	(8, 'Relative by Law', NULL),
	(9, 'Other', NULL);
/*!40000 ALTER TABLE `relationships` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.roles: ~6 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `role`, `slug`, `description`) VALUES
	(1, 'Administrator', 'admin', NULL),
	(2, 'Intake Officer', 'intake_officer', NULL),
	(3, 'Registration Clerk', 'registration_clerk', NULL),
	(4, 'Welfare Officer I', 'welfare_officer_1', NULL),
	(5, 'Welfare Officer II', 'welfare_officer_2', NULL),
	(6, 'Schedule Clerk', 'schedule_clerk', NULL),
	(7, 'Supervisor', 'supervisor', NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.scotia_branches
DROP TABLE IF EXISTS `scotia_branches`;
CREATE TABLE IF NOT EXISTS `scotia_branches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bank` varchar(150) NOT NULL,
  `transit_code` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `country` (`bank`) USING BTREE,
  UNIQUE KEY `transit_code` (`transit_code`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.scotia_branches: ~23 rows (approximately)
/*!40000 ALTER TABLE `scotia_branches` DISABLE KEYS */;
INSERT INTO `scotia_branches` (`id`, `bank`, `transit_code`) VALUES
	(1, 'Chaguanas', 60525),
	(2, 'Cipero & Rushworth', 81745),
	(3, 'Couva', 30395),
	(4, 'Cunupia', 76885),
	(5, 'Marabella', 61705),
	(6, 'Penal', 46375),
	(7, 'Price Plaza', 59345),
	(8, 'Princes Town', 40485),
	(9, 'Rio Claro', 62885),
	(10, 'San Fernando', 60285),
	(11, 'Siparia', 54635),
	(12, 'Arima', 90415),
	(13, 'Diego Martin', 74625),
	(14, 'Lowlands', 12005),
	(15, 'Maraval', 95315),
	(16, 'Park & Pembroke', 10405),
	(17, 'Port of Spain', 90035),
	(18, 'San Juan', 40725),
	(19, 'Sangre Grande', 70615),
	(20, 'Scarborough', 21105),
	(21, 'Scotia Centre', 74815),
	(22, 'Trincity', 18275),
	(23, 'Tunapuna', 42135);
/*!40000 ALTER TABLE `scotia_branches` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.status
DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(150) NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.status: ~11 rows (approximately)
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` (`id`, `status`, `description`) VALUES
	(1, 'Active', NULL),
	(2, 'Forwarded', NULL),
	(3, 'Logged', NULL),
	(4, 'Pending', NULL),
	(5, 'Updated', NULL),
	(6, 'Recommended', NULL),
	(7, 'Under Review', NULL),
	(8, 'Approved', NULL),
	(9, 'Sent For Payment', NULL),
	(10, 'On Hold', NULL),
	(11, 'Rejected', NULL);
/*!40000 ALTER TABLE `status` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.total_income
DROP TABLE IF EXISTS `total_income`;
CREATE TABLE IF NOT EXISTS `total_income` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `income` varchar(150) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `country` (`income`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.total_income: ~4 rows (approximately)
/*!40000 ALTER TABLE `total_income` DISABLE KEYS */;
INSERT INTO `total_income` (`id`, `income`) VALUES
	(2, '$12,000 - $20,000'),
	(3, '$20,000-$50,000'),
	(4, 'Greater than $50,000'),
	(1, 'Less than $12,000');
/*!40000 ALTER TABLE `total_income` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(10) unsigned DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_online` datetime DEFAULT NULL,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `FK_users_users` (`created_by`),
  KEY `FK_users_roles` (`role_id`),
  CONSTRAINT `FK_users_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `FK_users_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table msdfs_forms_db.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `first_name`, `surname`, `role_id`, `email`, `email_verified_at`, `active`, `password`, `remember_token`, `last_online`, `created_by`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', NULL, 1, 'admin@email.com', NULL, 1, '$2y$10$aRBnMbZm1ld51AkoRYKd4uACqpoNXSaVYPjq74o94WAhb9fGDnaFm', NULL, '2020-08-07 02:41:49', NULL, '2020-05-02 04:29:15', '2020-08-07 02:41:49'),
	(2, 'Morgan', 'Merritt', 2, 'xebubodyg@mailinator.com', NULL, 1, '$2y$10$QnAKGQFoMMSzWUZ.NL2atuXDKsCSjxE8gRDDt1IMOucFu7wTgJcFq', NULL, NULL, 1, '2020-08-06 22:02:35', '2020-08-07 02:31:40'),
	(3, 'Social', 'Admin', 1, 'admin@social.gov.tt', NULL, 1, '$2y$10$eYk3SMODJZZcGQXE6HK1Y.f5WsaGVlnAPu.q/lOaETHPKK5NqgnGG', NULL, NULL, 1, '2020-08-07 02:25:15', '2020-08-07 02:33:25');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.user_audit
DROP TABLE IF EXISTS `user_audit`;
CREATE TABLE IF NOT EXISTS `user_audit` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `changed_by` bigint(20) unsigned NOT NULL,
  `attribute` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `old` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `new` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_feedback_status_audit_users` (`changed_by`) USING BTREE,
  KEY `FK_user_audit_users` (`user_id`),
  CONSTRAINT `FK_user_audit_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `user_audit_ibfk_2` FOREIGN KEY (`changed_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.user_audit: ~3 rows (approximately)
/*!40000 ALTER TABLE `user_audit` DISABLE KEYS */;
INSERT INTO `user_audit` (`id`, `user_id`, `changed_by`, `attribute`, `old`, `new`, `created_at`, `updated_at`) VALUES
	(1, 2, 1, 'role_id', '5', '2', '2020-08-06 22:07:18', '2020-08-06 22:07:18'),
	(2, 2, 1, 'password', '-', 'password reset', '2020-08-06 22:09:31', '2020-08-06 22:09:31'),
	(3, 2, 1, 'password', '-', 'password reset', '2020-08-06 22:13:13', '2020-08-06 22:13:13'),
	(4, 3, 1, 'password', '-', 'password reset', '2020-08-07 02:28:59', '2020-08-07 02:28:59'),
	(5, 2, 1, 'password', '-', 'password reset', '2020-08-07 02:31:40', '2020-08-07 02:31:40'),
	(6, 3, 1, 'password', '-', 'password reset', '2020-08-07 02:32:08', '2020-08-07 02:32:08');
/*!40000 ALTER TABLE `user_audit` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.user_logs
DROP TABLE IF EXISTS `user_logs`;
CREATE TABLE IF NOT EXISTS `user_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `ip` varchar(150) NOT NULL,
  `action` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_ip_logs_users` (`user_id`) USING BTREE,
  CONSTRAINT `FK_user_logs_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.user_logs: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_logs` DISABLE KEYS */;
INSERT INTO `user_logs` (`id`, `user_id`, `ip`, `action`, `created_at`, `updated_at`) VALUES
	(1, 3, '127.0.0.1', 'Logout', '2020-08-07 02:41:45', '2020-08-07 02:41:45'),
	(2, 1, '127.0.0.1', 'Login', '2020-08-07 02:41:49', '2020-08-07 02:41:49');
/*!40000 ALTER TABLE `user_logs` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
