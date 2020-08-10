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
	(1, 1, 2, 1, 1, '2020-08-08 03:04:00', '2020-08-08 03:04:00'),
	(2, 2, 5, 1, 1, '2020-08-08 16:26:32', '2020-08-08 16:26:32'),
	(3, 3, 7, 1, 1, '2020-08-08 18:15:31', '2020-08-08 18:15:31');
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
	(1, 'eyJpdiI6IllKTjBwTktTekt1UFZFYjRtQ1ZvOFE9PSIsInZhbHVlIjoiZHdXSXRuTzJVTmVnOXlCdDVXQUV6ZXFTS0IxUlpZdEt5NTIza2FLcGVKTT0iLCJtYWMiOiIyYjc0MjgwOWZiNDFmNTQxOTRhZjc3OTFlNmU1ODBlMDBiMDVkMjAyYjRkZWEwODAwMjViMGM1MzA1MTMyYTY0In0=', 3, 0, '2020-08-08 03:04:00', '2020-08-10 00:39:47'),
	(2, 'eyJpdiI6IkFYL2dyeXR3WlZxUUU1MFdHc2krWXc9PSIsInZhbHVlIjoidnBQckw4ZlRLQ2hsWFMxV2laRUQ2bERrL0x1YzJKR2ZYRDdiS01GWTc4ND0iLCJtYWMiOiI4M2U2ZTY0YjQ1YTMwMjQ3Yjk1YjEwMzhlNzZlYWFjZDc5ODYzZGJkYzEzMDZhYjhlZjUxYTRjMWJhM2RlZGY2In0=', 3, 0, '2020-08-08 16:26:32', '2020-08-09 05:07:20'),
	(3, 'eyJpdiI6IjZSUEVKUy9YOUIwbUxianVpL2VMQWc9PSIsInZhbHVlIjoiSEcwSGRCcGtVMjVic2VtUTdVZEVXK3VuOVBwVWx0Q252Tmh6NEdqbUNwYz0iLCJtYWMiOiJjN2IwZThhY2U0ZTgwMTBmMzAzM2JlNTQ2MmQzY2MyNWFiZmM4MWIyMTdkOWZkNjU5YjFjZWU3MWU2MTNiNDdhIn0=', 3, 0, '2020-08-08 18:15:31', '2020-08-09 23:06:11');
/*!40000 ALTER TABLE `applications` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.application_documents
DROP TABLE IF EXISTS `application_documents`;
CREATE TABLE IF NOT EXISTS `application_documents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `application_id` bigint(20) unsigned NOT NULL,
  `file` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `document_type_id` int(10) unsigned DEFAULT NULL,
  `path` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_application_documents_applications` (`application_id`),
  KEY `FK_application_documents_document_types` (`document_type_id`),
  CONSTRAINT `FK_application_documents_applications` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`),
  CONSTRAINT `FK_application_documents_document_types` FOREIGN KEY (`document_type_id`) REFERENCES `document_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.application_documents: ~36 rows (approximately)
/*!40000 ALTER TABLE `application_documents` DISABLE KEYS */;
INSERT INTO `application_documents` (`id`, `application_id`, `file`, `document`, `document_type_id`, `path`, `created_at`, `updated_at`) VALUES
	(1, 1, 'signature', '1_signature_demonutslaravel.pdf', 1, 'eyJpdiI6ImVrOVFsUDhVcHoyUU1ncmY5SEwyNmc9PSIsInZhbHVlIjoiRDI0VFh5UHR4UHYwbTJaMXp6dXVDUEozbXBUeE1GUnhFQzRwb2tPSmttMWZQY2xIanZjMGE0WjFlSzFVaTh0d0RwY1c3UXAzQzBVNG5mN3JJTjJJQkE9PSIsIm1hYyI6IjhjMTg3N2JlYzA4OTAxOGI3ZThkMWQ2ZmYyNjU1MDJkZjRkZDBmMjAzY2MxMzZlYjEyYzUyMGRiMzgzODg5YTcifQ==', '2020-08-08 03:04:00', NULL),
	(2, 1, 'id_card_front', '1_id_card_front_avatar.png', 5, 'eyJpdiI6IkVFSHJkaFAwUlBaNHV6Slk0TEpnK0E9PSIsInZhbHVlIjoienUybnZYODcwbFJhMjNWU3Y5ZnhhZ1ZYeFhXaFhpZnhiSUxISEx2aStMYngxZitEUGhHT3pJTG13SEdZVlJENjhnTzdRcW5VRS9SYnlZRnhNclA5MGc9PSIsIm1hYyI6ImNiYzQ2Zjg4NDQ1MTI1NWM0MTlhOTkyOGU5M2YyNDc4NGVjMGQ3NTQyYjliNDkxYWU2M2QzMTE1NDg5ZTIyOWUifQ==', '2020-08-08 03:04:00', NULL),
	(3, 1, 'id_card_back', '1_id_card_back_govpaytt_powered_by_igovtt_white_800.png', 5, 'eyJpdiI6IjE0M1hOQkVRcjMya2lWZGNZUEx3d0E9PSIsInZhbHVlIjoieXBQZURWMCtpK2ROeE05b0xLVXozWWgzemdqN3ZPaGMvcWVtMFhUblVFcE8zU1RZQzBrQjk5UGgxNmdldElEWDB0SkIxTnlKaVZlODVMM3RzWmlobWFIVVl1cXp2Tnl6MWE0aEhOMnhxaXFhNUc2ZVB2L1BvTFZ2SmNBOWk3RVoiLCJtYWMiOiJiYjkzMTk3YTVjNDBiZDIyY2VjYTkyODFiNTEzZTUyM2UwNDAxZGM5OGIxMTU0NGU3ZDM1NDczNTg0MDI0Y2ZlIn0=', '2020-08-08 03:04:00', NULL),
	(8, 1, 'housing_relief_quotation_0', '1_housing_relief_quotation_0_igovtt_powered.png', 5, 'eyJpdiI6IkhtWEFzcHdEbHVkekxodXZ5N0pOTVE9PSIsInZhbHVlIjoiQjVDUXBjUGVZTFRQNVdKMkxzMkNVRjVtUzdHS3FlQkEyYXVrZkhqelJoRFRWZzk2ZXVpbm90VGpUbVAwWGtIY3k4aHNINFZTdDBhV0pBVWFGREFBdjluMkEyT1RhZE5mZ09KQUZJTldORGkzYm5BMGF3cEtxNk40SlFVeEhHUDdWai9rQTN1RGJyT2lrSG5PM0lOWWJnPT0iLCJtYWMiOiI4YmY2NWYyOTFhMmU3MzUxY2U5OWUzN2ZmNjM5NGM3Y2QxNzJlNWZmNWNkNDljNjNlMjc5ZjA4Y2I2NjZlNzAzIn0=', '2020-08-08 03:04:00', NULL),
	(9, 1, 'housing_relief_quotation_1', '1_housing_relief_quotation_1_technical-support-icon-flat-design-vector-6775300.jpg', 7, 'eyJpdiI6IjRiaWlYTkVIeU1kbEpRNmw1T0hVVHc9PSIsInZhbHVlIjoibGhNbjdHeXNKRDlKWUhLcXlqdUM2bmU1TVBaTWx6a1NFZGhDRlZPQjcvL3h4WEVQS2ptdWF5WkU2YXVsWW1jR0gzT1NWbWRyK3FQNzRqVjQyaG1rTk15dm14K2VRcnpHOXBYYVduaDBvWVQ3dlhXcys5QWFLL3NabjE0UFRnbjhad0M4bDRKRkNxTmIxNWRQUWh3K3lmRjJtd3ArblBRbzViNnlWdXRkZkRaR0FKSDZ1QjR1cmlPb3J4dVprMzJhIiwibWFjIjoiNDEyZjY4ZGM3ZGFiNjczZTA2ZDNkYmE1ODNlODU3NGFkNWE2ZmJlOTdiZTQyMjAwYTUxYjVjN2E2MTk0ZDRiOCJ9', '2020-08-08 03:04:00', NULL),
	(10, 1, 'housing_relief_quotation_2', '1_housing_relief_quotation_2_first-citizens.jpg', 7, 'eyJpdiI6IlpnZU8reS94bTI2WWIvdklkKzNyS2c9PSIsInZhbHVlIjoiK1ozVi9JUGUrTVBhZVNrU3N6VmdUd2dVUjFHbWRaS1d5Z0QwcmZJclVTdUx2VjUzcDh3b3g3S2xSVmNZRmJITlM5d0ZxdkRyTEs2V2FCUmd5MUJjc3g0UmtpekFWVmFOQldwS3RlTTBKcFJSajVRZjVLUkRHNWVlVVZlbFVCVW93em5VSlM3QmtEMmVXdGY3RG5jSUlnPT0iLCJtYWMiOiI5NjBlZDBhMTE3YTc1NjVlZjI2MDE5YTVhZWVhNzFmMDQxOTdjZDEyYzhhYjFmN2M3Y2I0NzAwZjYwNTZkM2U3In0=', '2020-08-08 03:04:00', NULL),
	(11, 1, 'electrical_damage_0', '1_electrical_damage_0_ipo_aps.PNG', 5, 'eyJpdiI6IlA3SW8rRHNjU1dJNGgwRzZScGxUTGc9PSIsInZhbHVlIjoiMnlDaHZiU1E1ZVdIcXp2TzBlc1ZoK09QNGpWckEvTS9TYkQyTGQzTzB6Q3lNOHdXa0QvM3A3VytqcWZ1UnZmL29WV1NFczMvZ2VvdVJTMUp0RStrTzdEUUdDTktjdTJVeFV4ajQ3QXdTWTNRcldIVlI3MmZaVmx6VENZUVJqTGQiLCJtYWMiOiI2MGJlODAzYzhjOGI5MGY4MjJhMDE0ZjM2NWQ4MTFlNmM2OTgyY2JiY2NiZjQxODI0ODBjMzQ3NDBhZmRkYzU2In0=', '2020-08-08 03:04:00', NULL),
	(12, 1, 'electrical_damage_1', '1_electrical_damage_1_sao approved_bg.png', 5, 'eyJpdiI6IlRjeGN6S1BSalNOemN6Rk04MU8xaWc9PSIsInZhbHVlIjoiQ2NEZjc2Y3ZiQ2crTkVUK3c4RUdqaFowdlAzNGREc0hRU3FnNmpYUWVxck9Ob054VmFrR0NycHBvRUlwSVRlcnd0azUyYm8rZXBtcWNjdExrYkZOTXlSMmk1amovejRNY2tweVBwbFd1TVN3Ylh0YjhyYUJmbi9sQnljMmNMaWkiLCJtYWMiOiIxNzQ3OTJhZmI0ZjFjYzI2NWI4ZTBiM2I4NThhOWJmOGMyMmI0MGI2ODZkZjhlYjdmYTdmOWRmYTVhMGE3NWU4In0=', '2020-08-08 03:04:00', NULL),
	(13, 2, 'signature', '2_signature_password policy.jpg', 7, 'eyJpdiI6ImE0UFEvSE5LWkF2WTJYTWs1ajlMU0E9PSIsInZhbHVlIjoiaXhZcUd6UVZZYkJocWZrRlNQcGlKN0FWTlREMGUvb05Ya0xXcnAyQi9XaVY2SGYrVVBaY2VkellIR0RUZ3ZkUE5XMkxybDk2UzZJMjU0TCtpaHBZblE9PSIsIm1hYyI6IjEzOTYwYjljYjFjNDY4ZTM4YjM0YTkwZWQ5NTlkOTc1OWVmNzQzOGMxNDI5YmUxOTcwNjdhNWI0YjhlNGM5ODQifQ==', '2020-08-08 16:26:32', NULL),
	(14, 2, 'lost_id_police_report', '2_lost_id_police_report_first-citizens.jpg', 7, 'eyJpdiI6InRJREduMWEwanZXeVNjek1nZWI3ckE9PSIsInZhbHVlIjoiSXBBV2paTmEyYWVsU0VRL3ZUOXB3Y1owamJSb3NRTi9QZ0JxRFVQNFEwdzczWVRMcDFHU2NiVkpPSDZ4cXlsdVI3M3pzVjlES21pRlRJekZacTlJZUp5eHlQMzBJM0x2dmZ4UjZOckIzeDg9IiwibWFjIjoiOTFkODIzMWRiNWYxNDk0NzA2YWZhMDk1ODRlNjcwODA4MzIzYTY2OTg2YjUyMWY4ZmUyYTlmOWQ2YzM0YmZjNyJ9', '2020-08-08 16:26:32', NULL),
	(15, 2, 'landlord_id_card_front', '2_landlord_id_card_front_technical-support-icon-flat-design-vector-6775300.jpg', 7, 'eyJpdiI6IkYrbkc0cmZmcTRjeFZ3c1BOM2gzK3c9PSIsInZhbHVlIjoiWUdVVjF1a0dKL1p4VjhCM2pBb3UwTElQWHVRanN5RHN4NTk4Mm1JRjBEd0RmcDNOdzFkRTBPWTVXREpGUU9zbTBOYmg4UnVHRlk5cFA0dU9uQVNpZ2lXRHFWYUk2NXdWOGk5aXRDSXE2Q0ZYajJmazZvZk5FbG1kWUJBTzNnelExeTJ5L2N3SU52aVpWRFdia2VZaXp3PT0iLCJtYWMiOiJiNjQ3NjMxYzY1YjE3MTRhOGZjMjY1MDg2MWUyNWRlM2I4NmQwNTgzZGM1YWQxYmNiNWEwNThlNDA2ZTE3Zjc3In0=', '2020-08-08 16:26:32', NULL),
	(16, 2, 'landlord_id_card_back', '2_landlord_id_card_back_igovtt_powered.png', 5, 'eyJpdiI6InBCU3N2dWErejlpSkJaZ2Q5NTBmaXc9PSIsInZhbHVlIjoiM3ljUlV4d2l3WGNMWm5zd1Y1elBHT3pLM2p2K2R1cGlQYkU5MXgyMWoyS280b0cxYWV6eCt5SE0zU29ZSTZjR0N2VitCelB5ZExiT05oSmtPMFRqQzJDbGhMU2MrcC9OOVRMUzFLL3pPVVE9IiwibWFjIjoiMTJjYTI0YWJmOTlmYjA0ZWMzYTJlOTA0YzNlYTg1MmUzYTY4MmUwZDNkM2M5NjE3NWVlZmJkY2Y0YzdkM2IwZiJ9', '2020-08-08 16:26:32', NULL),
	(17, 2, 'utility_bill', '2_utility_bill_etender - govpaytt.png', 5, 'eyJpdiI6ImJxNnpTQWp4R0I5UC9DTlF2Tm5ob3c9PSIsInZhbHVlIjoiZUZpQ09kWjhBOWp2NzdqbVVsVHM5SkpsZUhoUW9xNEpuK0UvL0s4S1RMWWVMc2g3VzR2VWdsTlpITWlaY3FLT1BmTUdscTdvbnhiNS9SVzVwRVQvcE1yQ1IxR2hob0JKajl6UkFraHZ6aEE9IiwibWFjIjoiYzFiZjA0YzFkNGM1NTliOWVmYWY5NWVlMzVjMGZlYmRjZWY1NjUwNDUyYzRjMjdlMGVmOTA4MmRiMzIyMDgwZiJ9', '2020-08-08 16:26:32', NULL),
	(18, 2, 'rental_agreement', '2_rental_agreement_etender.png', 5, 'eyJpdiI6ImxpV0oyUXRkZVlLUGwvUlE4N09QWUE9PSIsInZhbHVlIjoiZ1gwbUR1eWc5THB2ZzdnVmp4M1hNVy9nQkVtZFI0WWhYSkc0K1BmdzVXZ1cvQWdkaC9YZGdpSDZtRjE4NG5Edkl4cjJkams1aVZXWEpCRGJyZGE4VFE9PSIsIm1hYyI6ImUxMzk0ZGYyOTcxNmJhNmExNTFiZGM2YjIyMmJjNTJlZTRjNjYxYmMzYTRlMzU2ZmYxZTE0OGUxZmNjYWM4ZGQifQ==', '2020-08-08 16:26:32', NULL),
	(19, 2, 'rent_receipt', '2_rent_receipt_sao approved.png', 5, 'eyJpdiI6IlhGV2QvMU93MWpvUDBKcGkvV1cvS2c9PSIsInZhbHVlIjoiSmF6UDdRWUlzYXFEblJSRTNFSHNiYkU1UDdPTGdFQ0k5S1YvcXBnWEY5SEQxc1NZQy9RZ1BON1lqbllvaTRHVnBNMzN6dUg0RlRidHMzUC8wR1FNdXc9PSIsIm1hYyI6ImIwNzE4NzgxZTIyNDBhNjk0OGU0YWYzN2JlOWZiNDdhYjA5ZjE4MTZmN2U2MzY4ODM1NGJmODc3NjgzMDVlOWUifQ==', '2020-08-08 16:26:32', NULL),
	(20, 2, 'housing_relief_quotation_0', '2_housing_relief_quotation_0_govpay login page.PNG', 5, 'eyJpdiI6ImNiZ2hOSWlCTkhlakJWaW9laC9xMlE9PSIsInZhbHVlIjoiZjNTSDZRWG9Id3dLVExJaWZRMlg1RUVFT1dOeklERVRBanFUWFBGR1R5YzdLOVZsYUh4c29UcHlNcmdWZm5ka2xDSXBnN2UxbFh5TUx6QlhMay9rUXVDNm5scjZSTXV6SnZFWXRVb3VwMWZOa05NKzlRL3dWcHhKRlZmNm1oRUZSY1cvbHdDVFJxMDB1ZEVxWjlzbXBRPT0iLCJtYWMiOiI4Yzc1YzIwYmVmMmM2YmMyZWRlNDZjMzMyMmZhZTQ0MzIzMTY2OTRjY2EyNjQ3N2RlYjUzODQzYzZiYThhOGJkIn0=', '2020-08-08 16:26:32', NULL),
	(21, 2, 'water_marks_0', '2_water_marks_0_first-citizens.jpg', 7, 'eyJpdiI6IldmaVFtWlJOVHdldytvME85RTZRdGc9PSIsInZhbHVlIjoiNlY1S0tmVXpFcFFMRUFQckd0aVg3eEo5U0thOE1wQlFqN20raFJUUU5JRzFzVFF0U2hGMXNiSWJNTWhpWll4ekNjY3ZDTHgrMlJCUEVsRC9TUENMMEZ6dTdxOVFENm9tL25oWWtWa3dkNms9IiwibWFjIjoiODVkNjZmYTI1NGQyMzYyYjUwMGFhZWNlOTFiYmQ1YzE3YzliNTQyMTI2OWUzN2NiMDAxMDA5NTc3NzQ0OTY4MiJ9', '2020-08-08 16:26:32', NULL),
	(22, 2, 'water_marks_1', '2_water_marks_1_technical-support-icon-flat-design-vector-6775300.jpg', 7, 'eyJpdiI6Ill5YkYxdWF3Zy9TNTBZVSs0N2ZYU1E9PSIsInZhbHVlIjoiQ3ZDRVB3YUZmYkJ0MjJZSTVmcHZjekNGWHZsSlBRVlRTQkVvMTJ5VzZOeURweUNYQzdJNGhnZVBuSXY1a3pxN05lL1Vjc0NrUEErTUdyRGJpTmlCU0RoeVcwL3BEUE5zNjBSTlJOYUx5VXVta2drL2VRSGZXZ2Q1Skc2TEkzdHFUU2RabnF6ZytYc1dnN2k3Qi83VlRKR0tFblhjZ2c1YVE4M1EvZ1Q3MHhjPSIsIm1hYyI6IjBhMTllNzdjZWI3ZTdhMmVjNzFlOWRlYTdhZjMwZTQxZWFkODEwOTUyZjljMGFkODAyY2JiODhkMTVhNTRiZDEifQ==', '2020-08-08 16:26:32', NULL),
	(23, 2, 'structural_damage_0', '2_structural_damage_0_govchat.png', 5, 'eyJpdiI6IjltSFRNUTJxZitqb0M2UC9MbnRyeWc9PSIsInZhbHVlIjoiUFcxWW1aNmR2YW1sekxHcDFRNWxuUEsrNkg1cldNOXZaWDk3eXIrdHFhaFJOMzRvZWMwQ2F6cDU0RjMwbU9UNWRIbWdKUHdycENHci81R1BMVVNuZXRDdlRGWCs1ZHJWOGJ4Z21LMGhwdUJpL2F5MjNqeUZOWVBEbWpIMUlQTnIiLCJtYWMiOiI5M2RmNDY3MGZiNGI0MWRkMTU5YTRiMWU5MzcyODY3ZWQ0ZWUzZGE3Y2ExMjZmODk5N2Q5YTYwODcwY2RhZGQ1In0=', '2020-08-08 16:26:32', NULL),
	(24, 2, 'structural_damage_1', '2_structural_damage_1_govpay login page.PNG', 5, 'eyJpdiI6ImlrekdvenFHOVpORkpWTEFsL29sK3c9PSIsInZhbHVlIjoiOHYrWE40cVdreC82d1Zyb2RIOGZYK1cyVkFtSllkMjYraUlwWG1wam9aZi9VK3FaLzA1dzRwbkZmQ3RrbithSk1uekl3bis0bHd2RFlWQmRWMkJNckxJbjdhaHdJRGNURFVRbUQ1dm4waHNEVHNObk9xV1o5SUZINENoeksrU1oiLCJtYWMiOiI4Y2E5YzI0ZTI3NjVmN2VlMmQ2YWQ1NjljZmI0Y2ZmMDdkY2RmYzk4OGJiMGM2MTc2MWZjNTM4ZTg4Mjg0NDMzIn0=', '2020-08-08 16:26:32', NULL),
	(25, 2, 'electrical_damage_0', '2_electrical_damage_0_trans report.jpg', 7, 'eyJpdiI6Imp0T2dNMUtSYUNLYVVGQ0RjZU1aZ0E9PSIsInZhbHVlIjoiNjRsa3JzYmdUQStiajJMaG1hT1l0VlQ4bW1QeWVqclF0Ukt5TGRWQ2lxTFJabTRibElpc3p4Yld2S1NMUmRuOExoVWpKVnZERnFhSXBwcDA2Z2RBRXhaNEIwSlpOdURRSW16aDVWeWVvOEVVZTBGV0Fzd3VYcllmZjdLbDZyMTYiLCJtYWMiOiIwZGViY2Y3ZWUzYWFlY2VhM2Y3Njg4ZjQ5ZDlmN2ZjZGI4MTMzM2Q0N2M2MTBiYzllYzBlNWEzMzU5MzY0NjdiIn0=', '2020-08-08 16:26:32', NULL),
	(26, 2, 'electrical_damage_1', '2_electrical_damage_1_govpaytt_screenshot.png', 5, 'eyJpdiI6IjZXNEVWclBoUWM3Y1pxOFZpUzVhTVE9PSIsInZhbHVlIjoibDNPdnFHM0xjeXFsU1o5Ui84SUN6eHdYUXc5NHBsLzZIS2ZVc1lDTDhUVkpPMnJCUjIvd0RkcG1OT1psQ1NQWXZJdU96ckE1WFg5WXVPL1FMRU1RdW90MGk2Tk1KTGNwNXlUSWJwc09vdmphRHFWdVFoVVR4dUp6cDQyVUhscVgiLCJtYWMiOiJiYTJlNjVjMjczYzMyYjg5Yzk0OTY5ZTM0OWI2MDZhNWMwOTk5NGU5ODFkOTU1ZDA0NTc0ZjI2NTBkNjJjMDE4In0=', '2020-08-08 16:26:32', NULL),
	(27, 2, 'plumbing_damage_0', '2_plumbing_damage_0_etender.png', 5, 'eyJpdiI6InYreFNVbmFpOEFaclpzY1Z4MnJUYlE9PSIsInZhbHVlIjoidTRubjEwTHRvS3h3QkZLN2pKYmJ5ZVJKMnBLWXFXU3lwWnROb1M4WlU0anUxRFlKV1ZiQklQalp0MWhMZVpQVUw1TGkvdzFXMTZEZ01TUlhMejNLOEsreW5FdnloZmFOeXRsWFJoTlJ6U009IiwibWFjIjoiNjcxMWUwZDE0ZWI1OGY4MzczZWY4OTZmNmJiYmYzMTcyM2ZjMjIzMjg5OGZlNDRjZTMyZTRmMjE2Y2JmMmMzOCJ9', '2020-08-08 16:26:32', NULL),
	(28, 2, 'plumbing_damage_1', '2_plumbing_damage_1_etender - govpaytt.png', 5, 'eyJpdiI6ImVYNVJ0Mi9QY2NiZ2pTZzQ5Q1JncUE9PSIsInZhbHVlIjoiZ2phVko5bFdGR3lZOFdaZUZFaWw4bDlFWHd3dURvaVhrYWxzMUtOT1RBbzh2WlNobkdQWXErT2htRktsR1NGY045MnRHdU5VNm1PNUtSRHJWd2U5WndjUFVHK0dlOTB6Mm14YTg4djgxU09xOXdxMnhSdU5NdWVwOWMrVzdMU0EiLCJtYWMiOiI5YzdlYjdhMWYwZTVhNTdiMzMyODIyOWMwMTY3NDRlZmMwZWRiM2I3YjE0MTFkM2ZkY2ZiZmE0NzAxZDhjYWFhIn0=', '2020-08-08 16:26:33', NULL),
	(29, 3, 'signature', '3_signature_password policy.jpg', 7, 'eyJpdiI6IlhFVUdlOHRIeEZHWjJGclJKREs5aWc9PSIsInZhbHVlIjoiUE1taE9QUVk5UFBDR3MySER3NEVxVm8rR1N1b09SZXFMYjhwcEp3OGFKVkdtc3ViclZLLzEzVXFPekFKVmZuTjgyQnZxYXpjdjRNSjE3Snd5aU1vanc9PSIsIm1hYyI6IjA3NDVmYTMwZTg5MGFiOTVkMTE4Yjk3N2JmYzNkYjI4ZWUzNThjY2M1NzlmMjA4YWQ2ZjM3YjUwNmNkM2NmNTAifQ==', '2020-08-08 18:15:31', NULL),
	(30, 3, 'ebc_id_letter', '3_ebc_id_letter_rpTransaction (9).pdf', 1, 'eyJpdiI6Ilo1WjNLemJCOU96NFM0VmdxanI2SkE9PSIsInZhbHVlIjoiZnpQTE9HY3ViVU9La3E0a0J0NU1PQldqOG0raWZRcnRiS2xsZE9RaDZpR3pkNXc2R1BUM2NPY2FUSzdTL3ZOQVVuRzVyNkNQRWtGQlJGNHZtQTZaUithYXN5a3NEMkRodVdCVERmeHRaRWs9IiwibWFjIjoiOWZmNjc5MmE1M2ZhMTYzZjBhNGU0N2Q5ZWRmYjc4ZDQyYWNlN2VlOTMyZjU0Mzc2MzQyMWRhYWFhYjY1MWQwYyJ9', '2020-08-08 18:15:31', NULL),
	(31, 3, 'housing_relief_quotation_0', '3_housing_relief_quotation_0_SQL Server 2019.JPG', 7, 'eyJpdiI6IlRVZGltYlh5a01JQzVSb1F2dUdUN1E9PSIsInZhbHVlIjoibk9HZ1h6U1JrcW1sN2syeENRa05WWmhDVjMyMmtHcDdDTmVYOElzc2trcVpjSzE0VEx2MUdyYk1MbFRMaTArUEk4OTZKOGROSmF5MTNhZWpWbXRLK0NSVHY1eEpzSFlRUG5sd0I1QTg5RjZFenQyR1JhRklrVkxjT3Y3cE1COHplbDhCa0lvakhpbXN3K0JaWjNQMUJBPT0iLCJtYWMiOiI5OGQ2Yzc3MGNjMTYyMWE3N2I1Y2IzNzZmNjQ0YjA1YjJiNzlhZjFkNjFlNTUxYWMyZTZkOWQzOTg4YTE4MGUwIn0=', '2020-08-08 18:15:31', NULL),
	(32, 3, 'school_supplies_relief_quotation_0', '3_school_supplies_relief_quotation_0_rpTransaction (9).pdf', 1, 'eyJpdiI6IjlIcVJqQ0lCRTVLWVVib1hNQkNEK0E9PSIsInZhbHVlIjoiT1I1UGE3NTNjN1Jwc1ZqMlBCMFJKWVhDdzFsVktFb1dyOUR6bzJ4UFdmeW1ZZFhIRVpTT250UFpWa1kxdFdVN1p5QXV3dnpGbDdDek5lRk8rN1lKUHJxMUpIUjhzMUpDajB1M2FDWXE3bzk4cXFXZ3BvTnZzM1RCV1BIYk0ybGIwYW5WQ1dtOGJEbzhmb3lUc3l2dGJITm1Nc3VsL0tLZitwSm1MMEN4akxNPSIsIm1hYyI6IjFjOGNlOGE3ZDIyY2U2YTdjMDg4ZjcxODY5ZDQxY2QxNWM4YTA2OWQ3NTJlOWM3Y2I2MmFlYTQ3OTYzNzQ0ZTcifQ==', '2020-08-08 18:15:31', NULL),
	(33, 3, 'structural_damage_0', '3_structural_damage_0_first-citizens.jpg', 7, 'eyJpdiI6IlRQc01RWlJZR1RvN0JCQjFUcXZidWc9PSIsInZhbHVlIjoiT3B6bXZPT2gxUGhNWmI1ZTE3VjFheXNwek9lZENaSHVGZkFVUG0vd2FWcGo2bUY4R1BqeVZ1T2F1VEJIRlBubHJuM2FZWFZJNEhob3I4TnZRTVIvL2tTNWw5Ym5zT0xvVE9QTzF0aEZiTWkyU2lHNjBJZERrL1cxdStiVU50RVUiLCJtYWMiOiI1NDNhYWQ2NzAxYjVlNGQ0MmQxOGNhZDQ5ZWExYjJiNGZiYWI1NTczZmUwODk2OWZiMmEwOWI3NGY1MjM1Nzg3In0=', '2020-08-08 18:15:31', NULL),
	(34, 3, 'structural_damage_1', '3_structural_damage_1_technical-support-icon-flat-design-vector-6775300.jpg', 7, 'eyJpdiI6IkFDVkEzbFhaNG55YjFMSm1QTTJGWXc9PSIsInZhbHVlIjoiYUxDYzZvUHJVRWo4SDhYQ2M4SVNobGc0OVYwV1BXd05KVkVXMDUyMmRtRnhUL1JsNThWejZLQVlvUGswNjdNenZGVjVqcWlWNHNWOTBCSnF6cmVxUzVsTFg2VlZOUU1NbFdBd2hJdFFud2xRVUJrcTVOWUIva3YrempCZFZhMlpjTHU1UHhQN0p4YWFoUjIvUTNkU0hDZ055U0lrWWIvcGNnT29UV1NiVXNNPSIsIm1hYyI6Ijc3ZTNjNWJkZjk0ZGE4YTA5MzBjMDU0ZWZjNjk4Y2E5YTNkMjliMDljOTkxMTc5MjVkNjk2ZDgxZTNmNzYxOTIifQ==', '2020-08-08 18:15:31', NULL),
	(35, 3, 'electrical_damage_0', '3_electrical_damage_0_govpaytt_1100 (2).png', 5, 'eyJpdiI6ImUvTUxtUFhmcDZDN0ZZdWtVU0EvSVE9PSIsInZhbHVlIjoiRGtRQ3B0MjZhTjYzb0M1dVI4S3NqbVV0cDFycWkzQ1hScmJac0VNMnpDSkVIL29YYjdVRTNlaWhmTTFienZIT0RpQTFTWE94b3Nsc2FiemNSenZ0QkZheVphVUdpMUlmTjNpTHNwUnk1aWtObVNJb1drNmNuWnpCcVMvUGVBT1ciLCJtYWMiOiI1MWQ2NDFhY2Q4Yjk2MWZjOWNjNGNlMzNkZGJmNzI2ODNiNjEzYTcwYzdmODYzYWNiODYxYjVlYjUyNTc2Yzg5In0=', '2020-08-08 18:15:31', NULL),
	(36, 3, 'electrical_damage_1', '3_electrical_damage_1_govpay login page.PNG', 5, 'eyJpdiI6IkFiT1dmbEJQRDBraDBJMEg1ZjlGWmc9PSIsInZhbHVlIjoicUFOTXBJTEU5anVWSWJvYVVGZktQRnVHME4vcjdpdnBsZnR5U0FTbXd4a0l5NW16T3phR3YzbFp3bHdBalphNGdUVmZvUmtCS1ZQc1ZHMms5UVRyNmdTMm82Q0ZLV0tnNUtacTQ1a3U0VVcvUXlCeHdDaXhXSk1xM2JRQ3kwT2siLCJtYWMiOiJlYWQ1M2FiNjY0ZTcxYjFiZDBiZTEzOTQzNGYwMjAwMzBhN2M5Y2I2NGZkZjE3NWI3OGMwYjRlODdmM2ZhMjY5In0=', '2020-08-08 18:15:31', NULL),
	(37, 3, 'electrical_damage_2', '3_electrical_damage_2_govchat.png', 5, 'eyJpdiI6IkpzUVRlWkxKS3cxVWtTVGprYmt3NkE9PSIsInZhbHVlIjoiRkV5T2tLcFlCeGdvVnlHemlyQWhXeHBnbG9DZXBrZ0dLY2EwaWZBc2E5V2JrNVRHOTlEWEt5bVJuOFAzOXllTUp5L2NmR1p3TWJIbys1a1JHRlU0NnBya0EzRitkTVprcFk4WGxjMVJyVGl3cG9iOEREZVBuYU41YkZ4NnphVTUiLCJtYWMiOiI4NDYwZjg4MGM5OWM0NWMyYWU1MWFjZWU4NDYyMDljYWI3MTZhNjQ4MjhkNGRiMjBjNjEzNjQ1NDJkYWY2NGM2In0=', '2020-08-08 18:15:31', NULL),
	(38, 3, 'plumbing_damage_0', '3_plumbing_damage_0_sao approved_bg.png', 5, 'eyJpdiI6Ik5KdTZLVmFnWkdFYzd6OVpTc1F6VHc9PSIsInZhbHVlIjoiQURQaXFkT2k1UWhwMXlHbkNlZzdmejRjdDhlbXBMSDR4OEFtNjlNMzJlcWRvY0RjdFNiQnRZYUlQcklvM25VY3JYNzZVR2VBekh1ZXNHMFN0eURXU3krU1ByWWZ6UWg1VUh1Y1diR1hqQWtvbHd2c3JUcXMxdmNOaDdTemNIUDciLCJtYWMiOiIzNzhiZDNmMmMyOTgzMjJiYjRiMWE2MzBjOWZjM2RhZDg2YmQ3MjRjZmVjYzcxNTNhNDA1MDkyNmNjMjdiMmMxIn0=', '2020-08-08 18:15:31', NULL),
	(39, 3, 'plumbing_damage_1', '3_plumbing_damage_1_ipo_aps.PNG', 5, 'eyJpdiI6ImNady83WEEwR0hUc0JwQWR3QkRWZ2c9PSIsInZhbHVlIjoiTXZjQ2wyOGF1QnFnZzkzREsxVjRIT2E0YjdSOGdmcWNmMTFSdDBYZWF3OXJTZko2MHNwUktqRTgwMUd1aFBHM3RVQmVUTzZmK0drK1N5dTRxK2EvSE9kYkZ4NXptTVFpa29mVkhkdXZGWDQ9IiwibWFjIjoiYTYzNjQ2MmE2ZTNkNWYwNWZlZWE5MmVjNTJhOWQ2ZTcyODRkOTRkYjM1MjcyMWRkNDI4OGIyNGZlNzFiODU2NCJ9', '2020-08-08 18:15:31', NULL),
	(40, 3, 'plumbing_damage_2', '3_plumbing_damage_2_SQL Server 2019.JPG', 7, 'eyJpdiI6IjVpTnltdUZDMllqeDUyYW5ITFpvOHc9PSIsInZhbHVlIjoiWE03VytweFpHVlJ6ZlhrQURKcUZlQUZZRTR5SGVpZHAwakNIa1hyR0g0VlN3YTZ6OExiNjIwbU1ZbW13OEVwamV0NlAvMnY1VlFQeEk0eEJWNVhMMlQ4R0NPMHRpTGphZldKZnhEeXdvb3kxRjJkaWV2bXVHV0NmQ0FDZVIxNkEiLCJtYWMiOiJjM2MyNDE1YWU2YTI4NDMyMWIwMjkwYzZmMDUxMTdjOTg5ODExMDljZDdjN2RhZWY4YTM1YzQ2YjM2YzdhODE4In0=', '2020-08-08 18:15:31', NULL);
/*!40000 ALTER TABLE `application_documents` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.application_status_audit
DROP TABLE IF EXISTS `application_status_audit`;
CREATE TABLE IF NOT EXISTS `application_status_audit` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `application_id` bigint(20) unsigned NOT NULL,
  `changed_by` bigint(20) unsigned NOT NULL,
  `status_old` int(10) unsigned NOT NULL,
  `status_new` int(10) unsigned NOT NULL,
  `details` text CHARACTER SET latin1 DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.email_log: ~0 rows (approximately)
/*!40000 ALTER TABLE `email_log` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.error_log: ~13 rows (approximately)
/*!40000 ALTER TABLE `error_log` DISABLE KEYS */;
INSERT INTO `error_log` (`id`, `user`, `ip`, `action`, `exception`, `created_at`, `updated_at`) VALUES
	(1, 'eyJpdiI6InJMQ3o5RjNveVRPOVU4MDN5UjBVR2c9PSIsInZhbHVlIjoiSkFFaEwvTXRQQ2txeHBGQWxrZFlRQT09IiwibWFjIjoiNGVlODhlYzU1MDM4MGEyYmMzYmQ4YTg1ODM0N2MxZjhmN2ZlNDI2ZGFkMjM1ZjY2OTEyZWEzMjIyY2NlNDQwOCJ9', 'eyJpdiI6IjRQYlFRcHlmMjBiVTcwaGgyWjI2eFE9PSIsInZhbHVlIjoiVTF1OHdXeG9TamdBWFM4ZHZiOXpWbEJ6ZHFUVk9Kb0IwRTJoMlg5cmFMZz0iLCJtYWMiOiIwMTQ1ZTE3OWJiOWMwZjUzZDRjNzNmZDYwOGQwOTY0ZDVjMWM2OTg2Njc2ZTE1YzcyMmQ5NGRiYTk4NWM1Yzc3In0=', 'eyJpdiI6Ind2QU1vWldyTmhTOGRkUFJZSVpSZ1E9PSIsInZhbHVlIjoiMEM4ZGthYTdFbGRKUE5OdnY1Y3VMQmJsTU1RNHcxVUVCc1FWWlR0OFdkcWNOL2ZZMGN1NlJhTzl5eEpMaWZnY3pzdyswOVdFVDNlMmF5ak12NFM3S2c9PSIsIm1hYyI6ImU1ZGMxZjEyNWIzNzYxNzI3M2E3NzJlZTU2NWEyMDM1NjRjNWJlZTljYjE0MWRmMTljNWY5ZGY3NmViZjVhMDgifQ==', 'eyJpdiI6IjlQUGpHUi9nc2t4UWJRS2lOVExKU1E9PSIsInZhbHVlIjoiSTdOeUtXSTczK01TUnJpVVp4WENtZGpPSTZleTJlNDk4bVIvVDdCRUNWV2d3V2JOY0xORjZ1dEZ2THFyZjhCWnR4Y29sTm5nbitPaVp5Nktjek93NGxyY29TT3FHcmQ1R2UyT0tpdkg0aGpRL3ozY2tqcjNWRTVXSlJYV29KeGxVUGNnMjRJUTNYaW91UkJEbVdIVEFYVW9PTnpVSnNIMkIxSC9JWklDYi9CT3FqakVlcmZNOGhtOHVpYW9BZHhZVUlTRGw4OTFXaEtyeXlmODVZdzFYQT09IiwibWFjIjoiNjQ2YzIwZmYyZjEwZWZjMTI5NzdhOGI3NmU1NjkwZmU3MDIxY2Y0Y2Y1YzMyMzAzY2U4NjQ4YWFjNWVjZWE0MyJ9', '2020-08-09 04:48:32', '2020-08-09 04:48:32'),
	(2, 'eyJpdiI6InE3TzZNSExsWGlpOFhWUUFnK2xxMlE9PSIsInZhbHVlIjoia0V6ek1rdmJqVlRTSFpPTy8yUXVUZz09IiwibWFjIjoiNjdmYThkM2I2ODI1M2I1ZDE2YjlhMDFhYjkxMzgyOTY2NDA4ODZmNGY4YjY3MmFhMjBiZDUwZGI0ZTIzODM0OCJ9', 'eyJpdiI6IkRoVGV0Nm1HNTFkL3RJRkpkZXhUc2c9PSIsInZhbHVlIjoieERMdGFweE01UzJDVmRhOUxsU2RoeHFWTkQ3dG5vWitFNUFlQmJnVHhWZz0iLCJtYWMiOiJlYWViOWFhZWJlZTJmYmViYjQyNjVjZDIwMDc2NTg3ZGMxMTU4Njg5NGZkNDhkYzQxODI3MWFkMThiNjQ1MTVmIn0=', 'eyJpdiI6ImVJTkxBT2RZbGZOaUxmZ08zNGdNTHc9PSIsInZhbHVlIjoiOU9YQThzc3N5S1V0VHpPc0FWSFQ3NWdzUURYREd3empZK0trZVp2NEhBNE5oSE94aTNDa0pKRklJTzhKS0hwQVE1cFBpOG9NZ09QN2xDM3h3TWhpcUE9PSIsIm1hYyI6ImUzZGZlM2I4MjExZTk1MGMxYjJlMjBjMTdkNmJkYjg1NzdhOTQ4NDc4NzEzMmIwYzE4YjBmM2IzZjAwMjQ3NTAifQ==', 'eyJpdiI6IjBZdThjRWJ3MDhoOFltOS8xRGxMaVE9PSIsInZhbHVlIjoiempPNTVqM3puTVpxeTV1bG4zRzZ3Wmg0b2JSRDVYdzBrVS9jbWZjeE1IST0iLCJtYWMiOiIyZDA5MmE4YTJmZjM2NGRhNmUzNDhmNWFlOTk0MjU0MjMzNmMyZjc5YjFiMDFhNzJlNDMyM2U5YmQ1YTI0NDVlIn0=', '2020-08-09 16:49:41', '2020-08-09 16:49:41'),
	(3, 'eyJpdiI6IjhNNy9vTFlHMFVaNE9rejN4K251b1E9PSIsInZhbHVlIjoiMkpEb1ZhMmMvVFBIRjBVdUVBdzd2Zz09IiwibWFjIjoiMzU2N2QwYzY3ZTIxYTYwMDdlZDMxZmQzYjA2NTUyODFmNjFjZjg0NzQ2NDJjYTRiY2UwZTJkM2RkMTk1NDEzYiJ9', 'eyJpdiI6IkdiK0pZNkRyT2RYb3QvUlBCYjBnRkE9PSIsInZhbHVlIjoid2poV1BybVVqbXdDYStoc1BLUFRrQXA1NkdnNnhpbXJ4WFlYS2g0cVJKbz0iLCJtYWMiOiJjYTNiOTk3YjJkOGQzMGJlZWUzNDlkMGNjYzdkNTBjYzZlNDRiNzQxYzQyMjk3Y2RiMDdiNDBmZjE0YTA0ODAzIn0=', 'eyJpdiI6IlU0TElMR2pXYzM3azhRM20yVnN4Y1E9PSIsInZhbHVlIjoiSktyM3NpZzhuM3JkTjZlcXFUUjFSclBEVUNlQkc5ajZaZmNyZytGRWd2WkdlUTEyWk5LMHBRSHFiMzk3WjFoTTcyTDh6bzRnd01Ickd2V0hac3JkeWc9PSIsIm1hYyI6ImQ4NTc2NTRjNTE0MzZkZTJiZDVhNmIzMWEyNmVkYzRiZjU3ZTI1YjgwNDQyODZiMzFhNGRlZDdjNzZlZjQwNzIifQ==', 'eyJpdiI6ImZodURuVVJNV3FnamNnVEh5c1M5VUE9PSIsInZhbHVlIjoiMnJ6L2VaK1pDYlF0S2pkYWZBaW9HeTdBM25ObytZWXdsaVF0VnFJZzBDcz0iLCJtYWMiOiJkMjhhMTg3YzhhN2M4MzE3NjdiNWJiZWYyMTU5MjU2N2QxZGY4ZWQ1N2MxMDE5ZGI1ZjNiYTgyOTBhMmRiNTEyIn0=', '2020-08-09 18:06:23', '2020-08-09 18:06:23'),
	(4, 'eyJpdiI6Ijg4VU9WeGRST3JqSVkxcmdVRCtQcUE9PSIsInZhbHVlIjoibFRaUlJYd0hwcmdVdG1UZGM4TlBLUT09IiwibWFjIjoiNTMwYjc0MDhlZDMxZTJlMjdhMzk4YzYzMGI5ODc5M2M5ZDMwNzJmNTBiZWM1YWVlZjNmMDkzMjcxOTEyNmU4MyJ9', 'eyJpdiI6IjVzdDUza2dxNm5Zc0d1L2VHMjdiL1E9PSIsInZhbHVlIjoiSWJVdGxVdDIyK0xWbTlQbW9HRVdrY1l4Y0tZaXBRbGZmZ3BCVkJ2V1hUQT0iLCJtYWMiOiI4MTRmYjY0YTI1YTA0MmY0ODU0OTgxY2ZjM2Q5NTYzMzMzYmI1MDI2ZTRiMjE1MDBjZjkyN2Y1ZTk0MGJkNDlmIn0=', 'eyJpdiI6InJHNmZueTNqczVvb2pqbWEvQzZBbmc9PSIsInZhbHVlIjoiTTQ2dG9YRmNmZVBKZlpCaENySzkwbllDelVPNlNtTFh2RkJjdGF2QnpNb3RlVHl5d0M4aUYyN3JqOGNsUktkeVhka3M4OHpiM0llU3QrQXJtUWxoakE9PSIsIm1hYyI6IjE5MzIxZTM5MTc4MTE1NzE0M2FlMzE1MTI4ODZmMWIyYjUxNDU4Njk3ODA3ZGJmMTUzZTMzZjAzNGFiNjQzNzEifQ==', 'eyJpdiI6ImgyOWVEdzFPUzBxNEtlRTVmbFlTbnc9PSIsInZhbHVlIjoibWNaV21tVytHQk82a3NaMnNhRGs5emtEaEtheW5EZ1hzSXBOTjFDNXBZMkoxc0RZa3RtU295cm1yNlFKdjE4b0w5TEIzSXExMDZHbm9VS2x2Z1oyaGNWUEpVWkNqQlR6bkhpRXQ5TTJhZ1JxZEYxUFhqejNwcEhKNjNwQks5NUIwSm03YnZ6TnppMk1VWEdubUowVnNFVlBXeWVUZm9Nb0xzdm5SYVJaNHN3VkNuNHRZOWdQT1cwMTNVRk9DZ0tmWExwNGRYR3BRWXhCZGRlaTJ0WHk2UE5CUHFCbVUxL0tGZk1PaVVGTGx0eTliclhaS21WSnJSbndDNlJIdE9ScFEwUzE3QlV6VDBvOU9zSi9vSTA3YldqMlEwZFBCbndoSm90UmxQNGFaTThMcjc5bGdsZzRud3dhQ3VqMCtPVWNaQXdWVDdhQmQxTGtNMzVwMmRGSWhKWmJ4RGwyL3dnRmlPdjFuRGg5cnlwZ3RlT044cE9XZlptdW5meGFvd0VVM0NuOWxYOTIwWWpMUFBub1BPSTZhMCtDSkZhc0tZamlDeU1rL3lpRDlzV0g2aURucDRUM2w4Z1p0VENESWVSYkRKTjZya0ZOckdIcC83eFQ2VU8rSThiOUM4NnZ4QWhhWmhzUDF6TE83MTBWeEtzRzFkR3Iwb2VSRVBkV0V6dDVTNVRjSnFuOFAvZ3RqOU96YSsrc1oxc3plUTBDQkNpWmZDeEd4amd3YnVCREtYUE5yVUUzRDllSml3YzBvbVF4RzU2MWMwWjNFSVNFSXVYdk1qVDFKU1hGUmljK2gzMWhYTk1PTnNCQjdKYk1XNjc1cEFsV2p6V0oxU28zcTlPR3R3SXgxancwbVYvTElBUGdUc1k4dDhMRDhHODFDeW5MaWNzTE0xYnNWNnYrelh0Ny84U0NYamRLTFFkMVVJdkt4aTZpVWYvVHliR3QvQ1hCeFhGY0JBPT0iLCJtYWMiOiJiY2Q2ODk5NzY1ZTFmYmRmMTc3NWU0MTU2OWRiZjQzMmM3Njc3MjhhNTI3ZTY4MDUwYzdjNmZjYzg4NzhiMWExIn0=', '2020-08-09 18:16:37', '2020-08-09 18:16:37'),
	(5, 'eyJpdiI6ImpUS3RoLzBpMUkzN0ZTZFZIWEFkS3c9PSIsInZhbHVlIjoielY3QjNsdEl2TENEN0pLUS9RaFFTQT09IiwibWFjIjoiZmI5OWNjMGIyM2MzMWY4Y2QxYmUwMTMzYjliNGVlODM3Y2U4ZWViNjM3ODQ0OWFjZGQ5OWZmYTBmN2JjMzM5ZSJ9', 'eyJpdiI6IkZ3bkJidHp2YzAxaDd2Z0hMS0JuTmc9PSIsInZhbHVlIjoiMC9iVVNBRTVJcm5uUTBVOENaSkdrdWJoYmtlYkNKdmQwcUdjbkJwZTFjZz0iLCJtYWMiOiI5MDU3NDcwOWZmZjc2NWNmNmQ5NmQ0YjM1MjZiN2M0NGMzNmY0MTkwZGU5MTZlYjBjODE2OWZlY2Y5MTc3MTNkIn0=', 'eyJpdiI6IlFCQmVEOWVETCtqd1NpelFoVGpOR2c9PSIsInZhbHVlIjoieUc5dkNQRnVxK2ZLS29kS00rY0h0QWxuVVp5cmFRZXFwYWZ1WVVBNVNPWjJzVGNOQmpLZXV5dGJWMk5TTmJZYVF5UnAwK3dHVWpYd0ppSEhKNTBUd0E9PSIsIm1hYyI6IjBkN2E2MjdiN2JjMzhmMGU3NWQ1ZWVjMjlkOTQzYzM4YjkzMTkwYjc2NDM3MDFkZDE1ZThiNGYzYWFjODE1MDcifQ==', 'eyJpdiI6IkgveG80L1IxQmUzMm05dEtTUko4M0E9PSIsInZhbHVlIjoiYWlTaTJERVhKaWFLeVlXMlFtRzNBTmF5RE5IeGExenNtdWN0UHZNYTRteEF4QnhQWnFFTkcwL01CanBZcWZaSy9FS0U3cjE5aHgyZVI4TkkvSStxTksyNHZMWnRnWGtXczhha1BSQlIxVVlYVEk3YjV6QVVTZUhnY1d1bzBaMm9JNlVGbDNSOWRqZTBYdVZCdEZGdFpwUUhkZHVHUmRxSFFKaFQ5SHY5c3ZqZ3Q3M0hiRFkwY2VobWp3OVdIdFVZZFdPZ3hGNXFQQ3RaVXZrVjVoVmtaTm92c2ppRVBuckE3Y2NEQ3dWY3BEdGNQaWNXN2JxNGorYURTamgzR0VsQWhXaEVldzA4ckdSS0NDdlc1WEhLUnF3OTliYWZ6MjU2dGpiMFE5eWFNeG95MlFKam5aUGtNTlhWbnJiTDFCSXVDTEg0Tm9QOEkrcFlWQU1NRVBMZnZ6UTFZd2hub1B5cW5xT3dFQjV1bVZoblJHc2d1b29IalhjWHlvbnZ3WVZzY3F3VjY2K2xacU0zUkU1MzBablZSNHZ4UWZjN3pDUzJyOWJabkRJTWt3YVh4cTR1LzhPaEV3bFVLZUc3Q1I5OXNpZlYzNEFxMGZ6YnJMUGc5YXY4RGwzT2taOXM4RmZGWFI4dm42eDNNT2JtWmpSM005QnFqbWE1Sy9mRkpMQTg2clNuVVlkRHB4TVQ4RStLNXM2L2N5WUo4aDBWZlZZZ0NMeUZ0WmpoR2U1aWluYTNteWJFdmluWW5zRmY0MHB0UmJZK3k5V25wKzh3VERpMTQvRWdLZzdyTFRIZnY3SjFBYUpScllZdlljWlR5ODl0MFZQTjczbFBiV0MwODEvNWRhc28zTS9LSzVrb0lyVldZZ0tnTCtKY21XZWZ3aHB0OENOZVpFUFR5OVRVcVgzbWdmRWk5RDJSYW1pVCtmVklIejJvbk85cUhlZ21iSnVoN2htUVU4U3M1K0ZqSkxXNngySUVyYk8vdVpBR0tHYzZ6RXR4UjAvSmRoNlhoY0YzVXBSK0ZjYTNrcVhFTWNMNVpqbTBmSWRsVHJ2dHlaT2xGdXlJb3BiSjZhWT0iLCJtYWMiOiJiY2ZmNjZjYmEzZDEyZjQzOTVhNDU4MzBlN2VmODg3MGFmOWFhNGU0Njc5MDA2NDFiMDFjODkxN2ZjY2VjMTE3In0=', '2020-08-09 18:19:46', '2020-08-09 18:19:46'),
	(6, 'eyJpdiI6IkQycElnOWtNYXhSREFIY3l3UXVBbGc9PSIsInZhbHVlIjoiOENndEtPcndqTzlLeTM3cUx0Y0Fsdz09IiwibWFjIjoiNTY4ZDU2YjA3MWM4NTBhNWI0ODE0ZTUzNDUzMzIzNTRhODhjOTkyZjg5Y2I0MjdkNDVmODlmNzVlYzZlNzEwNiJ9', 'eyJpdiI6IjlJZmxEcHhrSVZsakhhM1FaRHRjdkE9PSIsInZhbHVlIjoiLzFBeTlGc3BnUHliUzNUQlVqKzkzbXpXS0ZiYlVBU1d4QllkbjJWRXBybz0iLCJtYWMiOiIzZWZkNDQ5ZDcwMTJlODU1NDM5NDQxMWIwY2FlN2Q0YzExMGUzY2FhNmYxMDY1ZjBkOWVlMjFmYTZkMjI0MzRmIn0=', 'eyJpdiI6Ikw1MXVuOUZNcStPdVhJZUUvcGMwSXc9PSIsInZhbHVlIjoieFlsSERhTXh0YTlwMFlMbmw3cHppQ1FOWHpMTzVKOUNLN2ZhVlZXMjkwSE9Dbjg1MjYwUjZpVTJMOE1NNVlCRlJPV004U1drcHczRkxHYURrcm9ZREE9PSIsIm1hYyI6IjAwZDg3MzkyYTViNDUzYTExNWRjMTAwYjcwM2NjZjI5MGYyOGZhZTRiMTUwY2Q0ZGNmZjhkZTQzZDhiNDVmYTkifQ==', 'eyJpdiI6IkxPcTVXdXA2Q2Frakc2d1lxdXFRZmc9PSIsInZhbHVlIjoiOEJNSTNKdU5zcVQ1WktJbkdkcEtEemNQT3MyVWRHa28zZG51N2M5b1hFZkdmRlQ4bkFQa1pSL0RZVXRnMnNOK1dnS3dXOS9VRyt3b2JOMGRzYmJCajRTanhTK0lkUDNyZWVvMXJGYkdCeEk2c2hQQmVCak5CU2phRlJvczc2aTR6b2E1YVpjaEJHRjJlUTRvVktQbWJhNm00eGxVYXRzU2E4QjkzL1FxVkhocEY4K1kvbU9FS0FRYU04ZU4yQk1ZUkpiZG45eWlTRndLQk9Sc0p5c1hUV2dwaUQ0QmhBMWNnSE9GNkozM29aNXNSblF3Nk9BUGlrS2Z6dHVicEN0Rmg5RGdrYzJpamhpMjg5RVNPOEdtejFySzhXZjdZd08wUnI0UDZjbno2ZEtpUmw5MGVwRU0xWEdPamVhQWJMYk9CV0MwVHBHdHJlRWgxWE9zR0pUTjVLM0ZscjgybTZHM3FmQzIxTDVhR0F5Y3ZPTGRLSmNhTkhwd1JYOXI0RHJtN2l4eWhhbXQ1YlEwaG02enRuTDE3QWI2ZXlqbXZMdTk1Rk8yaHpybk9OZHdUQVJnV0dzMDA4OUxrKzB6N0pXRUlKWTFCWjRoVjRvZnhxUE9oMG8yc1ZUQjZ3anhzNmNaTzVlVmdEQkxud1gwMUdTS0xhY0YyRG1aeEVFazJPczF2dHgveDc4dk42eUx4dE0wSXpZU3gxY2RmU3pmbEtHbmpmQlR6R3kwb2RsSWYrak1mR1FzV2FMREZFZVd2Y0thSUs0bjV3Uk5VUjZSdmlCMGVKQ3FtcDhrVHQyeWNJM0tZRU1QSXJpS1g0MXlOVWFSdGJFbEp0dm9HdkVUWFpRZFphZHg5SmVJZDR1ZzlHSVcvLzIyM1JNak9lZW9aU3FWOTE2dEdpb2V0NEZobnZMQWFGd2M1cXd0UFFqOXhObS9ud2xOaEd0MGpCWUVrY0RldkZMRGJTOHdhMzJSL0wrZGQrZkRwU1FMWGsxbVZJaWs3U3hjSGtQcGlpekZRRC91bjR6MnVUS1cySEs2Uk9DeTV2ZjdYSzRBcHFucVErSlI2NVdjeVZXcTdHND0iLCJtYWMiOiI0NWQ5MzQwYmI0ZjY2NDMzMDMwM2M5MGViYmQ1ZTZlMGJmZmQ2YTk3YzE4ZDU0ODQwYWMyZjFmNjhlZDZkMjg0In0=', '2020-08-09 18:20:17', '2020-08-09 18:20:17'),
	(7, 'eyJpdiI6Ijk3OGorVmV4Tkg1M3F6Wm44dHJsY1E9PSIsInZhbHVlIjoiN0F4RVNnOVR2b3pobElDcExnZXdtQT09IiwibWFjIjoiYjhhMjM0ZWM2ZGQzMmZjNGNjMThkM2Y1YzcxZDRlODMwNDQ4OGU4NzQzMzk4MDk0Njc4MzcwYTM0MmVmZDJhOSJ9', 'eyJpdiI6IktDQXdYQlVPaVM2bWROUzFnNjd4N3c9PSIsInZhbHVlIjoiOEFPT3RFWCtKcW9TUXFpM1gzTDBhMEd6R3JPb1MxYldRbFR1SlBQZXFYND0iLCJtYWMiOiI0NzJmNTQwMmEwMDU0YWIxNTM4MmZjMDQ4OTYxMzgxMmQwYTM0ZTdmYzQwYmViZjRlODgwOGI2ZmNiMTZkZDY2In0=', 'eyJpdiI6IkYveUlaRCtQSk9HM1pJSVJsMDBqckE9PSIsInZhbHVlIjoiWldNY0RuTzladVZFcWVzK2lyeC81QmRNUU5Pa3hGZXYrN0tOeW1iM3Z1akhhWGhHUmVqWnR3UDIrUnlTeko3OWFsTGJ5aEhydWNPTldBWXpZYWxRK2c9PSIsIm1hYyI6IjgwZGJmMDBmOWQyMTMyY2I5MWFlNjJhYmE0ZjM4MzlkOWJlNmY1N2Q3NDNhYjYwNmNkYWI4Y2ViYjk1NjFmNzIifQ==', 'eyJpdiI6Ii93TzhSNzFrRy82bG9Ka2xwWkJSUXc9PSIsInZhbHVlIjoiSzcxMGhzNTd2ek1qcjViZEs2aDM4Y29DWFdPeVN3MWxrMXVsY0NyTUZJSlk0QXJCU2tTNXgrSmdCZysxait1WVA5bUY2dWllTkNzdmhiUnV1b2tob011TmpJN0RKVHJQaFhybHo2ZUJnWUNlMGFydXdaV0FoNFNWMVBoa1pQV1dZc3FVR3FUVGM0d3JnUGcrMTJjSnQzVXVpV0hmSWwvV2FFSlZsS0Y4WjZHY3NERHZVSWs4QllkL3J2c2p1V0NJcTAwcnZLakVMNlhUZEVrcFZvRzBaU0xHbFFvamZRK2x5dFpWRjllK1lMeDEyeHpQcmJ6Wmk0bFhuNUc4eXNndTFqWHRRNzN1UUZHNkZ4RCttS0Q2aCt3Y25hdkxycUtnME01RzE1NSt3N0tnWXV4VnFvNTNBSEVqYklpamVXbWpGZHFBaUdyeEJ2N3RidzYrLzVXZGtaZFo5dngxNEQwZFg2NFQ1ZDBMSU52Z284WGZxaENSdUozZXVVeVpmaEFzRkwzVHVISGZSUS9pWWFEZVB3ZTRmd1h6cWhJV0RLU3Q3SWZCSWJxTEoza0N4OGMrTnU4ZVYrZ08zOVkweEQ0VHRtendhY0YvbWhsSFA4NEc0VzY3YzFkelRuSVgvRzBueVIwa3pDdFArN3h3WDIxTUlmMFV2andsZ2xkZWs3UnBJMDg5MTNaWmhPL0E0UGE0Y0U2ckoyK3JPOEdyZUVSK29WZllsYXJGOTV3RVc5YVRXOFVNV0xRRnE5a0tsT25YMEpaQ1NyY1VpT3JJdVN0aGt1T2Q4Tkw5NnBaeVBnN2JNSnBqVjIzbWZyU2ltUitLeUpjRXl5KytIVWNJZ2U2RmZXR1BzRncwMWFKR3lwYlJ4Q0xRZU9KblFzTUpXaUl2VWM3S2crU2loSE5KU2VMbHJFOVN0YTVaTnNVM2R0MytoWUZ4YWxDd3o3UUpZK1VTOUhnUHBSd3VzL0QyRjRJUW9iNk0yNDRJVFhseXNleTdCNEk0Qm5acW5ubGFKS1A5R1U2dngzMFZ3V3ROK05nQk9oV3ZncUNmcnlDQ0pKc2dyWU9pb3JzNnhQbz0iLCJtYWMiOiI4ZGQ1ZWM5ODQ1M2UyYTQ3OWE5YjY1MmE2YzQ0Yjg1Yzc5NDQ3NmVmMmE2ZDUwNDIyZDA2NGI5OTRlY2M2OTlmIn0=', '2020-08-09 18:23:05', '2020-08-09 18:23:05'),
	(8, 'eyJpdiI6IjdSVlV4eWZ1VGkwbXRucUIyRTFFOHc9PSIsInZhbHVlIjoicnRHOCtDUm05c0hsai9ZWWlmbXVxUT09IiwibWFjIjoiZThjOTYwYTYyNzI5MWExNGQxNWY3M2I3OTI0ZTg4OTc3MjQyMDg3OGNkNjI2MDhjNzYxY2MyYzE4M2M0NDE2ZSJ9', 'eyJpdiI6IkJ5SXU5aHBqRk1kTEh6SmladytDaHc9PSIsInZhbHVlIjoiMVJVRHhPRkNHTCtRZ21pTS91YXVKdnNSWjFoQVZnMVgxbjQ0ODlEOFpVTT0iLCJtYWMiOiI4Yjg2ZWZhMjA5ZTk2M2RlMGU5ZDAzZjNmYjA1NWM3ZjQzOTdiMmYxZDllZDk2MjUyNzEzZTc3Zjc5ZmUyNjIyIn0=', 'eyJpdiI6ImE5U1FCWjIzODJPa2FxZjZ0a0lGZEE9PSIsInZhbHVlIjoiQlNZdGIrejBrUFFDSXRCa0QwcjlZMEZ1RjJRYUlVTVphajFGajFyUFhMcnpRdXJRTC9lUnIvdEgzL29NaWJlKytDd2dxUXY5dHNpcVU2dW1KV0pQZlE9PSIsIm1hYyI6IjI4YzdjYTRiZGMxMDQ0YjcxMGEyM2UzNjkxZDUwODMyMjU4NzgxNTY3YmYyZTc0MjBhNGM2N2FhYmY5OGFmMzkifQ==', 'eyJpdiI6IlVIUnQ0S25pODFNVVpseXlScmdESVE9PSIsInZhbHVlIjoiVGluMXVvM1AzbVVZeUpIaVNBNzhjY0xRcWVuVTVmSVowV3JydFRFL0xTTDFXQnRNemZtRzlHcGFPSm9Bamk3QlorSjhFOUZhV2FzelR2Q05pNmhmbTVkYjBuSHA0T0ZoZEhmY1c0VndSOEZxODlJQ1dGQnlsNk5VOWF4UWdYMGhyaWVUL2NoeUhydS9QUHI3TklNa1RiUkxPS2EwMVUyZyt5b3lNRGdNMTFjWXpKNHNIRzVoNmNZa0JqVHJpd1RKLzFiNUFLbEFscjY5c0RxUFNuUEpNZGZyYWZJWmdKb3JndGtNMWMzVWJZYWpUYVdOREdMbDRhZ0Q2QlJMVTZSZTgvRnY5Q0JyMWlieUo3dDVHVWkyMGFCQ3lrbFdPRnA5czlBWHF4ZDNDWEYyOForUjZUMktnVmJVejhwV1ZHRXZBM3FxcHJ1bGl3V3FydG8wUGp3cnM3a2xLcWpHMDNoUlhpcjJJdm5teE8rZkZwUlNiV0JURFUzWGp1L1B3WlY2ZXdTTG5FQVYxWTJYTTRTQmFXYjhqcFdqZGZjRHRrQjB0VG81cWVPaE9WVE9RTGJwR01oTFBIY0RyVVRXNnRIa1p1RXhCUThLZGtJbUpYbDU0RnhJKzlEY3pRRC9RQmhjVkNaMWF3YnRNc1dBeFdneUYxN1JkZDFHV2NYM0l1WXMwcUM4d1pDaWExcExNdWJQWTY4Tk1qRk1jNzc2V3Rnb1pLVlkzendFbFNoVUdMNTVFNC84YXByaE4yQk1QZE1aY2NWRnJQdThWTFBMU1ZIRWx0UXdSa2R0ZG94M2JlSkdpYjNGV2xEd1NFL0h2RkU0N3AyRXB2LzRFRlhrWVk5U0xRTU9CaFFIejhHZ20zcUFRWnpqY0lwbm5GelpuYnEyN2hnRUhJSDg4Z0lSRzk2Z3JNUFZKblVTU25STTlJQVhxbkR1R0kvWWFwcFBiY1g5eExVRVFPeVFxNW1VYW5qaUNMS21WcUQ4WnlDSW1Hb3FIM004ZG81b1J3KzdIbTcvNjlYVVFpamxZVUhUM1hjdzUvdlh3cDBjT1RmZ3hlczVWYXMybWVMamNnSE9XVFlpWS9mMHRxRzVZV09DblYza1FiSXcwZVVTblIxemlpcDFySFNoaU9YdVdYaWpWZUNWNzIrdFNPT2dZdFRrUXNKUEFrY1MvNnlJZnNORlVaRVc2WnZGTWVYS3BwZThUNmtyWmhKMmN3WFhkdDVnVWpUYUlmT0VyWXZwcHRoVmMxR0tzUm83V054dTRpRThvZWN0ODV6STJpNllTUnZ2NGVMdHNYWHdKK0haRjl3emVTbm42dUM1UTZmZTVPK1R4cCtUNE1ITkpWNVA5RG1HMVNpU21NeVhUNHZzYWRsR0VqQmRNVkxGYkh6U3FQWVN2YnZHbUZKL0FGajRWSy9SZXdsa05MTFJwdWJqZkg3OUJzNDUvNWxPbi9GZmVLczFWU21mbFdCK1U0blh4RU9peFdJdU10TytEVkdtSnphL1hPTkNCU1FVM0dyVU9kajVmZTRjblc3S05PR2hnR1FuUnFVa1M5YlNva2s5MHJsNVpxS3J6M2haUlJHZXRaZ3NqdnhtOW5mL3ZPcE1YRkcyNGxsSnVleTI1L0VvWEE5YzA2Zi9RTmJuSVYwcjM1eC9kZUFTMU1Ca0Erc0R1Q09sSTZlK1BDMi9BMU9ETjRNb1FuRlE2ancxREdESkZKeDZLeStFcWNrL0xLcUZVQk9EMURtTXR2Qm1kdWg5K3BXekF0S3JIbHVGaWw4ZDdUNVhjOEdScUU2dGVReXpVekpYWGRIdVJtUGx6R3hYaE9GbE9DR1lQTEY0MTQ4OElNaXJiNmIweStyeVM3bm5TUmNOQXNXZ3oyd0VIOEpIWU1xYStEUjNvWGJRQzN5M0NpOTNieUlseG9EV3RCYm4ramJTN3lmOUdTUEQ5d0ptYmY0b0JsdWs3Y0lqR2JCY2N0eFp1eG80bHA0a2FwWEx4U3NhbXBTTm9GRmtVRVBicGxDUHZpSEJ4ZXprQTZ3UlZ1OXAwQjhKM2UrOG1xTmR2TVBWclNlSjM2WFpDZUp5L1RlVEtiOURlbk4vTWlMY2phNUNkMjBBNG5IbjJXQ213QnBEWFVBbHRuejdTZk1PK0VxOEd4d215bTB5eDVJWnpZaW9DZDFzN3QyM0ZaNUphZWVtVzRNYS8vbWFQYWNXbWhQQnNqekJTdGFXbXNmS3Q5akR1c01EZUJFam9jMnpBUFczd2x6NDR1Nkxmbm53Qk82d04vSE1LbTcrLzNLQXZObUJIRjYwMGViRGVNOHZadTg5RUZPZG1NSmY5RHBJVFViSjZpejE3amNhWEFPTFlnNjF3WC9MRGdSTnZUUXVSUGRsNTdtemVXM09MUnlpb1hjdVliRjNSQWJ1bGpXYi8vZnFLa2FhUmlxeXYwdlE2bEVJTWJGMlpDcWtaaDg4bWJJK29keEY4OURtMm9uYnI3c3c0aXNtdDFweHozTzNQVzh1NzdsRFk1UzBwNDlLbUJ3UXI1dHNhQW1sZ2FCc1RuaWFRVUx5ZTBBWFFoenFqYzVOb3d4UU1icHJPVVIxTk9CTnAvd1Q4aHNPakdnQkRSNTB2dmpBNUc4c05POCtyREhOemNtelJPTCtyc2Q1L0VXVlN2Y01qYlZmWHJSSExTN3J1b3BmVWpjWVp5bGFCR1l4NExSMlZNSllhdVdZWXF4RzZxWS9ENnZDelNiL3VoOGxFa3RvdGhvVlFZWlRZNHFZMW5Wcmxqb0RWQ1pzZXdiRUdESHp3UmgrVTg2QVRVZXkyU2xNRDhNYVhFbk1iK25vVFp3MVc2TUs2TVRNNVNNVjUyV2VRVkYvcStSdjdqZ3hVUThhUDREUitGc0VjMjVKMXBnQnprQWJocUZiOS96VzRqdmU3YjVjZ1hja0Y5T050NHArejhESDNDVzB0THlRN0xQcHhwb2tQNGhtOGlIZlJIMUt6bDB5SUp1cGZnUkg3bHJsZ3BZNGpDSnRaVU5PbllhWjNzaXJxdXdCYktoV2xubENLVGpXb3JQbzVxWit1eTJ3TVU4dHFqVTdZNzRqcGNvRHYxUExLbkdlRU5VeDhuNGZGNXpBem16Zzc4WnNPWmpPZDFXS0hHdzVYMTZNMnRRQ3loVUg5Qzdadm1MM05RbEdWTnM2UWdUSWoySHhBWi9lNGVDbVdvbzQyQVY2NTZncEdPOG1DeHhyZkxWdTJENXdWL0l0Z3ozVmxhcVpXYWVLcUhGV3dnPT0iLCJtYWMiOiJmY2RkODExNTkwM2UzNWMxZWM4Y2Y2NjdmMDBhN2IxYTNkMGExYTI1MzkyZWM2MDdmZGUxZjU5NjFkNTE1MDgwIn0=', '2020-08-09 18:34:38', '2020-08-09 18:34:38'),
	(9, 'eyJpdiI6IjRxdERJYVFVUWQ5aVMzM0o1djk5UGc9PSIsInZhbHVlIjoiU0FZY1ZmWk0rejRzeFhXdzJNRUZJZz09IiwibWFjIjoiZGYwNjk0Mzk4ZDg5ODdlZjZmYWE1ZmFhODE0MTkwYzlkODRiYjk4MTZmM2ExZTdiOGZmNjMzMWY1ODRiYTAyNiJ9', 'eyJpdiI6IkpBVmV3T3A5ODVrYmp6WE9mYTQvVnc9PSIsInZhbHVlIjoiSzhZRDlNcE5SaVhaWnl4emFIYUlyMjVISGhHSVFFeWdna29MVGZYZ2k3UT0iLCJtYWMiOiJhZjA1ZTU2YTI1MGZlNDMzN2E5MWEwMjFjMWFhNzQxOTkzZWRhZWMwYmRiMWQ1YmNkMGQ3NzFhNTM3OWRiNmU2In0=', 'eyJpdiI6IjUvcklkdVo0TEpyOGp0S0t0R1EwVWc9PSIsInZhbHVlIjoiVzh5WVVVS3MyVGlTNG1kOE1qdStzRlUzcVlrREE1Yk15VlowQkdKK0JQYmxyNDV1YzQ5Vkg2aVRxb1Z6blkyZXI2SzBzdVAvRWk2YzBZS2s1d2hKNWc9PSIsIm1hYyI6ImMyOTc0MDY2MTFjM2IzODNjNjk1ZDAyNWZkMWRjMmVmMDA4YjY5OWQxNWJkNjcxODUwNjZiOGNmMmY2ZTBiNmMifQ==', 'eyJpdiI6IjdTeGN3U2IxNXJLSUpJYkgvVWcyQVE9PSIsInZhbHVlIjoiSTBxNzUwSUpoUGZLeGdJRDFCNC9scVhZSTdlU3RjaEh0S2FxWm5WWmdiWHBQcGtZR1hJTzFObE1MMklDVUt5QWxidVJ5U2NKYU5XWEJ4TnRWZFpTWWx2K00vMkRpWml1N1pPZUJSUVRvVDFxU0NUTWptVmVscExRc3VwRFVROGVITTJzN3RQWWkxaWZCd05Yd3BMZmIrUGc2WWJYWFhVdFVFM2EvR212OVMrK3B1QytyNS90QmRTdWthU25rTnJIUWJMazY0aVFKT1hCb3BRQTM4emh4eCtKbmtBUjVlbzB1OUFaVDlFMFBuY014OWdhL3VKNmtBT2ZCMGo1OS84b1lCcCtqbjNrb21idHFPQmNPQS82RUNZRDdNOGRyQnN0blBaUFY1WnBBZXRyRlc3b1V3SXFUaDRFdEZpV3ZVdzdDZkN5LzZaS0hXRUlsa1ByZkVobHdEcysrZk44c1lrNXVva1RQRjVoVDZPeGRpWjNMaXExRHV4N1orS3h1TkRSSHQrdmxJYXBtV2ZESVUwR0hzRkZ3by9IN2hVMDlRMEFETHUya0FGQjdycUcrS3V0OTFQNnBoZS9rSEV6dFNoWW1nL0F4MHZJb0xQdC8rc2RETFJ2R2RKRnlLQ0NlTjJMa2phcER1QTk1NCtpc1hjYW1OSGVUWU9OMEFUUU5BdWJ4VVlXNjRNMUZadEd5WGxNTnFLSFdlZXdCZk1tVDJibGRRaFdpQ3lJMHB4Zmd2bzRtSDVVeVZNUHNacG1WM3ArV2FidWViQ3E1ZVJMd21HUktZNXc4MDRyNThZL1NXbkhBWDJmcjJsNllaYjN0Q0txVVZTSHJrN2ZBWEZSdksrSHVzQ1lwWis1SXRNK20yejU4TXJoOHoxLzdWbGRaL1hZYzNRQ0VEVTNCWEFLN3R6M2VXTFk0SXFqNTBIc0RwbWxnakFaa3Vsc1lXais0NDBaQWx5SmQwMGs0cVBZcklUWXVjRkhJZkZSeDJZWW9FUXRDYkNYVHhvU3pHUU9GSVlydzZMcWlPcDVVd3dENnZ0NlovNHAyejRRNHlNcEU1cnpETUV6enhBQzkzSE5ldXdKQ0lQR0l6NWlqK3h3dG5TdllTMmFLMFJpNzhIQSt6dFZXbk1odndJb0VGeXBjSDIxVjFXbmp5YkZoRXI1SDFaanpPdFc1S0pVK01rOFpVV2hhL2VLYWJ1MUlHRFFERTdyU2ZIVkxTa0FHV0ZCZU5FeFBtQWxMZ3lxeGY1RzMwWXpUbnFKSHQvUmVmRm5MVTdDb2pZUnA2di90dmVmOEZOd0cvdFhMWU90OVAvYmE2VXFOS0h6eG5GN3JKcVp1TThURUwxVG9ZRlFLd3IwWkp2VmtjQmlDcmJheWM5eFA4RVJXclVOWVNOMDZ5TGdWS0d4WTA2OWlod0RkRVRrc015MDN0V0dCT0RMSzdsamVqTkpua1BBRkJXSkFlNGRBRmRpTnhIajFLcUtkVjBNNXpWRS9uK1lTcm1aMEpOTTc0NEdZSXBDQXExODBKaC9hMzNUTjh4UWlwRHhUMFFTckUweFhvcmJZdFJ0bjNid1luRnplQzhNQ21wb3gxS0ZTVWxLdjJZcE1ZWmphUEtCY1gwa29zTDE5VlN4SU1RaGY2QlFFQm9xZWY2SmkrMzBQMitNOWRtSkQ4ZWV5MlhHS2Rma1YyOElxanRXY1JZWmlpTEFodkplbHdnSDFtV0xYcjZEaXpVOVRheUZYOGZuK2lCTzQxSndUa3FYS0htRWM2UHlXV1c1cE9nTkxCWVlITzZUaXkxTGpmTUMzcHQzQ2k4SndhT3VhNXVPb0w2K093U0IyYVlJY0FYNkNIYlI2T3p4MjdKUXlCRzRjUGpWQUZ0bUJIcjd0ZFdoVUNjdGIra3I2MU90SXdWR3JNQ2ZDbGRWUDl2NGxXbTlBNXVNMUc3eGZuaVMzR3VqVVpoNi9jQ0ZMYmgrZW9GY0c0K2QwcGhtTHRrSDZTL2twZWh0bnROVWoyNTE4MytyU1lyS3lWZWFFZmZEQng5N1hnWnpWa29pYnBNM3F1NjZURlNtSXh2SmlpNHc0dGlLUURsYkY5VmxPOTFNT1FwSFV5Vkd5ZEpKcno1M2xISnZweEhmVW1Fa0I3QktKV3BnWXRXeEIyQkRGQVIrUTVBL0MycC9aN2w1bkZhaG1BRFVJaEEvd0d2RUVReWFRdDhtajNrQmlaTGJIanBGdnRyaUZhUjZFcDlzTFdzRzJBaEdzdHIxeTI1bUZlVVZERGp1MkJKUjNLRWRmaWZ0MVc4ZitDRmlQRWZsdktEdWY4Tk1nTS8zT0J4RDduUFc2LytNTXVzeUVoM2Y1UEJOeURkWHQ3MkZ2RElxR2lUSUJEM2V5dHFFVUJwZlE2VE0wOVJCRjRUY091N0ZuKy9oNDQ2b1d4bEhBdnRub1hyK3hnUHY4NTFSME9uc0VvMmxLaUNWQVgraTFnazk3ekkzSVhRRWxyUlJWd3RJcXpNOSttRVdSZzBTRGltM1JFNHhUUlV5MnhvUHZlOTNyeFZmNFlIalFaNXhoVmRuZE1LMEJhSlFhR1EyR0o0azFadG9ZVkpjOFJDUnBBa2JzYU9GejR0N0tJZ093Qi9DRWpXQVJvUUdhaFdFVXJETlJjUU53a2RGYXpsdEc2ZzRXRXNsdFhhcW9Dc0dsbFYrMmVWMUVnQzIzbGxpTW5kTWs1K2VIbzdqM2tQVm84aHNsMGhzbmhkdXZuczA0WHVJNld0eHRieUVPK3VQK09ac1JBc1IzT21LUXpVT0xYbHRvd1E1WkV5YlhWbGJ0QUdMaUs3dDdRY1ZiRWdDdVU4Wm1JVmIxckFkR3VUUWQxVVZWcWQwOUJlUVFLbkoxSFVHc2k0MkhOdnM1a29nSXNEdzZvanp5S3pXbCtZVDUvdHZCc1NkaHM0NDcwb2hiV1pNQzhyS2tmV2tkdEF3MkV3ekdmTysrOVZvRDJYUXJUamFVMDh0Z3I5Mitxb2gxVG5qUFFCUFl4VTJZbU0zMVE5SHI1bXRxTGVlbk9RemRmS2dOdFZhWHY3eXRUU1pPMXdIZzVWOW1CbHdUdG5hR25YNFFoUXlGdVYvS2pveGhhbWRuYUluMjJEbWpMdG9rZVZFRFNJNFBjVXB3WitIM2tuWm41L1Z4OFZkTEN0eGwwclBMYlAxQjJEMlM4OTdGZDFoeUlLREFXdUdPU3lWa0hiY0FROVltUnAyVVlCU3RKYlV0ZXBkSkFoYTdOVUpYbmJIVExPcnl3PT0iLCJtYWMiOiI5YWVhNDhkMDIwNTQ4M2Q5YWU5M2Q4YTdjOGNkMjg5OTEyMTk2ZDVlMzg5YzQxMzg2MzdkZWJiZTk4ZDJmOGViIn0=', '2020-08-09 18:35:10', '2020-08-09 18:35:10'),
	(10, 'eyJpdiI6InBCRnk4L0tvM08vWDVkSmVMMTRXekE9PSIsInZhbHVlIjoiTGF6aG1IcmV2eksvYVcvRzdBNmRtdz09IiwibWFjIjoiNjY4MDQwY2ZmYzllOGE4OWMwZGFiMjQzMzk1NDI4N2FlOTM2N2FmYTY3ZTQzOWE3YWU0Mjg2YTE2ZDJhMzkwYiJ9', 'eyJpdiI6IjF6c2ZxM0RlWVNpbm5kY0pvUzZVbkE9PSIsInZhbHVlIjoiejRoemdPRENSbHl4NmhJbjg3ckxqQldteXVvbVI3Z25iamg3RUJuYWNTZz0iLCJtYWMiOiJlMDdhMTRiNTljMjZkNzFjYzQ0ZjliZDg4ZDdlMzVlOTY2MWI3ZGIzNGZkYjhlZGM2YmNkYmI2YThjNDFlZTU5In0=', 'eyJpdiI6IkRnZXl6U1g2ZEE5TGE1S2JqcncwOHc9PSIsInZhbHVlIjoiVm4wcDdjRXdLak9oNVpLNzNyeFZvTU4yNFRMNGd6RmFIWXJ2eHozTEJra0hLcHhIbHhQTDI4d1FhZ1VPYXkvczRVOGlVVThXM1lReDlMdk1za2hpR0E9PSIsIm1hYyI6ImUxNjM0NTY3NmNkNGNlYzE4OTRmM2U4Y2IwZDFlOTg1YThlOGFmMmVmOGIzZDgwN2QxNGViMDI0MmZmM2QwYmMifQ==', 'eyJpdiI6Im5Bdk5JTXFmWkFudWNwWU13a3ZsYWc9PSIsInZhbHVlIjoiT1dnWUZMUUJHVm9ndjVUVWp3cGVQU0ZlbTl3NkJrcjgrRHRPY0hkVENXWjVMaU1aV3YrcWVXbmZSVUhDSVJTVnprNGg1MHlzelF2TWlzN3RNc3RrZXhKVVN2NnFHMGR6cmdPZis2Q2p2MHFLWmJSSWp2T1Q2Um8xOFVzcEpId3BiTDlZOGZFeE43MWo1RW5ZNmxlaWk0SC9HYWhIck14bnlzVml6RW9sMGxTVmFHQ0szSzlKdjNUa0xOdjg1UUJkY2ZGRnlMbzU0QUpvVzM0dXkxRHhXMTlYc205eDZiQm1vYmJQdXAzVnNMc2VoTGNxeFVMVVp3TGc4UHpiMDVENEl5TVRHd25nMTYrK2VNc1E0UGd2TWNjZEQwSGUvenlSenhmWkhzdXFFOHdqb21UZ3M0eUZ5SGExNGd3Zk9MUDkxOVpqd3ppOU91RnVvUkJMTldYSWZkWW5WcmlmaFJSaFdtb1Mya1gzWGxEQlBWYVFEdXV5Z0l5RFdmUDFieDg3T1VGcTE3T210cHpDQ0xEZXJvVkhnRndhbzYwQlBOTTBpRFh3WTBOV21JMTA0MXZNK2p6QnVPb29yNG1ZSGxCUlpZUUgyLy9mRG80OUcvNCtxT3JEYjNWV0JJRmE1eFFYNnN6dDR4Q3lRL1NoVGVDbDFlVmVNdW0xMWV6U0FMdVV5MThaZmpMU3ZqSWI0WE82Y2tOK2NsUTlUOGlJSW94cS8yYW5BaG1wZDJKa05tYmRzcndvTG1iMzlHOUhlVG12Y3VkZUgyb1JsYTB6UjdQRUIzQ3QwcEhkZVcxWFYyUTFqWWRpSmVDNDBpUllRalc2V3NmQ3IyS2V6QkxTZUMzZldTVzk5MUphM29RSGF0SC9HZnhNQU5HV0IwbG4yU1Zidml2bEdlNTVqT0dlNDR2YU9xeXBlMElHbWZ0UmVLbUc5VzBodkMvOGVkQTdSbGlsUldGMlVYTUZ2WmR2c0J5Ynd6QVhmMlo4ZCthQ0cyOExLNDNjZlgwYzlLSFBBUGVSWVhTenJ6WE50RTZVbjFpMlNnZVJBUDY3Q3VlazdyTjhSSWMxSm9uRWlNRFZ1KzJaZUR3STFEVElxdTJVTGZ4Qms0NEFjT3hFbzl5aXUyZTNWRk03c2RORnVwd2JQVmdjZ21RVlFtSkQrRGFIWTZ0eU9kS00yanJxenFLL3lLNldsYzRhK3A3STdhUElrZVdQSEdkS3IwMHVneE1NTzcvdlg3QW1sd2xTak13emc0dFBZVmh5SEJxRVZ0Rm0xam42Sko1aDlqb0E1SVNUakt6N2JvM2gxVERIc1VER1E5NWRQMm1KYlZEd2Z6bmNLRWxiWFlydWx1YzlNa0h2TmNqQkpnNm5EUWpLZTRkenAxdDU1a2hCdkFVRU5ZaE1QTW9XRE5xT1lsTkZraW9rT0hQV0JZYlA4SnZNSm4rclVlZXovcjNzWHVUNk9mN1ZRUU1vVWRZckxvQTZjN3hBOGM3eUQrMFgxNzd0RC9DekZqNVYxUm1VTXBiVG52cnRWcDRnODZRZ2FRRnZNUVhJK0Q3SWw1S3NWVzliNDBNMU83Z1dLY2ltcjg5YVZKUlJ6YnpQTU9VUGFWRkl1KzQ5b0w0Zmtlb2U3V3hWT0xpSWpYQXJMTEpJR1JvZGdxa2xaZ0tGYkxyYXVkamFIejROSDErWlhWcCs4amhXdHp5a1BmVW8rc2tPRnlhbjExRWJiNTMwdXZ5N3lHbVVCR2F4T3N2OERwcmdBUDQ1Qjc2RUdKdEtEblZOTGs2S2xQVndzek1uWVVoOFQ1bVl5Y1dDNFJDeHN3NHMzK0hQU2xBdFhmYkswUWIzamtWbWRLbnJyTkZBZTJVMEQyQ1kvWTFTTmx4TERMVTFBL25CYlplekZsM0p2Wm1FRHZodTFpVFJ5MTFpMVhudDNvdDM1YlJpMzNtQjB4bEV6TmhKRWtNblUzZmJlR0xsMDdweXF1Mms4RnhHazdrUHFUQkJmWDJsOVlKTnJpMkN0QXZPRkxUQkF5Y0pTWWh4THR4UmhBYTRxQ3ArWGVUejg1d2FoVkFoWFhBR3o4Um9OWWluN3VLWENpOHdWakgzZC82OVkyL2NLL2ZySzhUUTdFU2ZLNDlKZWFKTHVxWlRuVW54ZXAzVHFCUjJaQjBZTlFpRk5hOEpvdnFQTWlHems2a1hLMTdMWTBhNlBJSnBDR2JsTWFTWmcvYk82OXRkR3VoaUVYbWIwdisyREl1K2U0ODczdXk2SW5BTlU5eHkxRGdTcDM3WTl2TjhlTVlTVlg2cGNpQTI0KzBMQS9uMTFjOUJ1dzFNd0RIbUN5dlJReHNDUkp2bmpqTXJOSUZ1SThuUWE2U1FrcDZZeVJSQTRJdmVyenlkaS9oZUxPeFFWR01IZ0U3NE1pSG9tVjdGdzJ4TVM5M3E3STlQUzdjMWNDc2QzSWs0U3lnUFczTGR2Y1MrcjdydytTajhwc1ZrM3Jla0dzUEVKNmRBZVpJbThzMmJQb1Foa3dQanBuNzlqM24zeGJWRU00VEVtbXVBVTRrSG5YUTFFRmtOcXFRNnA3UWJRUVhCVHM2R29zOGpMSHl2a3lpMFdhSXdVK1lxTXRSbFpCQzlXME96Wmo3OGFFb0grM3crSzAvT1lIWW84Zk1CR1AxU0dsU05lbnZPSkQwWDRkWlVvSE8zTzZ3aXliRW9iTTZpSGFlOVQrWW1DYmFhK3hObE5jUWNpOGVSMTdtaUcwdzc1S3oyOVRBTEFhM2xVYWR3enlaNlhBR1BkYzNFQVUzdmhDMUFRTmV4TEgyZjNCRlFJYjAxdm9aOUY1a0FuTCtOQS9MeHdIZHZLZE4yZkw4U2NoWjZrM0tqUXBoNTcwK0xxQU5VUTBIUUpONURydGY5QjRBQmdpdWpOT2VNam01cEhKVFNwNXBMcTFRbGxya2ttMU1uaUVIcEhtdzQ0My9HVkNwQzZDVG0vQ2lHc3hOaDd6TXd3VnB4QjFaUzdhK1dVYlQvZU5EZjVKRUZsWHpsSlgxNW4zMDRBSDE2ejNxZmdQRVFIVFJGUTV6enBFZnUxblZuU054UU1kUWE5b3g0c0dyLzM1Q2xSa0JONkhLcEhZdzNiUUpUMDNJV2FCTXhteGhmZUg5VTBvYWE4c1FnZWhtaWh0YjYyd1pLWG9TbEd2U2ozbUludGg2ZHBZVWRRTkt2V0pLNC9WclRzN3psSHd1bmhLUEdSaDVRdFJMa042OGRWL2lubjAvaDIwL3RraHVzM3hXamZnPT0iLCJtYWMiOiJiMzc2M2ZjMzNjNTdhNjllYTE2ZWM4MDQ2M2RjN2ViYmM2NjA1MGY0ZjYyMjk1ZDU1ZTMwMzdjOWU3NDFkMTI0In0=', '2020-08-09 18:35:23', '2020-08-09 18:35:23'),
	(11, 'eyJpdiI6InFFMkNCWmxtdTBWTVVRczlRQkdUZlE9PSIsInZhbHVlIjoiWktBRE1ZS3QwMDZNMHQwZHdLbHR2QT09IiwibWFjIjoiOTNmZWYyN2U3MTRjNWQ1YzZiYTVhYmIyNGUzNjg2YWI5ZWJmNzk1YzUyNTc4Y2YxZjgyYzIwODI3NWQ3ZmI3NCJ9', 'eyJpdiI6ImVBUmt5N1QvWVppWjRSSFpueEdKUEE9PSIsInZhbHVlIjoiUThjd3NreEF2KzdDMjFtdGkxczRqcUJYMlo5eEV6TjJOaG1mc1daYnZndz0iLCJtYWMiOiJmYmMxM2JhZDNiYTk2NzE0NWM5N2U0YjZlNmUyOWZhNDAzZTQyODJhZGQwOGVkYzkxNTAzMGQ0NTFhOWFhOTRkIn0=', 'eyJpdiI6IldxTTN5MzZaYUh5WHFvUkRCa2gySHc9PSIsInZhbHVlIjoiZWhGVFlRQ2Z6UldpcU9pTUJoenRCSE1Wb2tYSXdzVDlPaTlLSWRXNG5XbFNmb2srQzNjWHNQVDdOcUFsNnBsMlJhU3JIejJkaUdyMG5CdEpmOFl2NlE9PSIsIm1hYyI6ImI3MjBiNmI1NTJjYTg3YzYwZjMwZDBhYzgxZDYyODU1MmRhYTg5NTQ3YTliYjkyZDM5OTI1ZjAzYzA4MzYwODEifQ==', 'eyJpdiI6Ii9hQUN3aXpYa1ozaDlSbnE2SDQvdmc9PSIsInZhbHVlIjoiTjI4cHRKTzNGZEYxTmxPQmpSTGZtT08zOXZkaDcvaXlvdGxPNDE0cjRFVXo5Ym5uY21lMVVCN2hSQXFoWlVHZ1IrMEZ1amVtMEJvQUNNZ0RPdTREZ21OSjNTaXBQcWloQ2JoSzdBSUtyY1JVRnlyRW9wTTRHT1JJaTBwYzdFSWJXcVVzemp3ZGNQYzgvc0RiYXZDRi9NSDlLMExJampoTm15RDB4bm41VWdrPSIsIm1hYyI6ImNhZjBhZDBhZDQ5NzkxNDhiNDY3ZjY2YTkzYjlmNzUyODA0MjdhMTgyZjZjNTdlNDdkMTQzZDliYjIzYzJkYTkifQ==', '2020-08-09 18:41:09', '2020-08-09 18:41:09'),
	(12, 'eyJpdiI6ImxQdkNoSjVmMjlBdnhubGoxM056cEE9PSIsInZhbHVlIjoidUhnTEVqWmpkb29pSkhTaEh3K0Y2QT09IiwibWFjIjoiYzc4NGE3ZWYwODNjOGIwMGI2MDNmMzdiMTM2Y2JiNjgxNjA3M2IyMTUwMzAyMTgxOTZiZTg0YTk1OTBlNTlhZiJ9', 'eyJpdiI6IkQ5TDhMaCt2OWJLQTIxZFA3TFYwWnc9PSIsInZhbHVlIjoia0hlV1FCVmFKcTA5WUFrdGtGcERCc0ppYmtTaTBzSE81SlBwNEVNdWdIND0iLCJtYWMiOiIxNTZkYTBlZTg2OTIwYjNjZWNhYzkyNDk3ZTFjYTE4NTQ0MmE0ZGExZTI0MDMxOGJhNDM3MTM2MDVhMWFiMWQ2In0=', 'eyJpdiI6Im9sQlNQUFVGU21qQk9BR2lNMERYeFE9PSIsInZhbHVlIjoiNFBLTUlXRGtHZFBMVjdPNFVEQjM1eFdTb1MzUDlPMU5scmUzTDFML3M1REx4YUN3VXlzT2VIZzJHQUpKVTQwVmloNENRQUZxcFoxSkczM1RocDA0YXc9PSIsIm1hYyI6IjNhMTdmZmI4NzNlNDc5NTNhY2Y4MzliMWMzNTMwYWI4ZjI3ZDJjZTlmZGZmMDZhM2U1NDZhZGUwMDNkMmMxN2YifQ==', 'eyJpdiI6ImZIOTh6OUJGSmNycFdtaG03Nnd0alE9PSIsInZhbHVlIjoic0kwcGFreG1PVkRwR1lBUUpmZjYvajdpUm9TcnNJRjQzMmVadXVXTHRyQ1M1NEVMbTE3bkNyVldmeE5OY24xYVNmK2xNZ2ZMQzUvbVoyUGNLcExVbjlzWjNGWlVSYnVLYmlBNXlKS1ZpUzFWTS9KTnpuUEFOWUF0YXhGWGV5bHpyWWpBcVIrK0o3ZGxiVjFxRzJOcjBkcm5NSjk4VFc0L2dpRzJmRUdCWW0wPSIsIm1hYyI6IjcxM2Q3MzUyNGNkODIxYTAwYTA1NzhkMGM5NjU1YjJiMzRhMTVjNjM5ZmU2OTEzZjhkNGUzMjdkMzc2MzU2NzQifQ==', '2020-08-09 18:41:10', '2020-08-09 18:41:10'),
	(13, 'eyJpdiI6IlVZRTJ4SVlsakc3YXQ0WGQrbTM1dnc9PSIsInZhbHVlIjoiU01aY0NwTUtXbzlUZHFGMHF1YWc2UT09IiwibWFjIjoiZGFhMDQzYWVjOGVjZjE0YzNkNjkxYzc3OTUzZjRiYTI1OTFkYmY3NzRiNjFkZGM5YjhhYWNkZWY0YmQ5NzcxZiJ9', 'eyJpdiI6IlhUNU1hRDNpZFkzS0k4Qi80TldsUmc9PSIsInZhbHVlIjoidXdkSi9jUjNsbDJDbVhOUTRYMURyZ3h2M1dNTE9ybmh0bFZvaUdiY3dQUT0iLCJtYWMiOiJkODRiZDcwNTBiZmQxY2JiMzJlYzFkN2Q2ZDI2MjI5M2NkYjUwYmViNzU3MjRmMTIxYmU5YTMxZTAzYzAxZDBiIn0=', 'eyJpdiI6Ijh6R3lLM3FQdmhlYzFPaGM1Rmd3UkE9PSIsInZhbHVlIjoiOUFvQVVIdmxRMjVITTk0U2ovVUlSbmg1aFgwNDJndVUyV1djdGkvSitGbHNsSlpXaGtFWjhWUFk5UFZlQ3BZSXJvWUdGTjVLSVU1WVA3SnNPdHFkNFE9PSIsIm1hYyI6IjBlMDMzMDMzMTUyYTc3NDc3MDIzNWU3YWM3ZGEwYTM1Y2QwM2Q2M2Y3ZjI3YWZlMGRiZGU1MGI5YmE2MjU5ZjQifQ==', 'eyJpdiI6ImF0Y3VjREZKVjZ0eXBSUTZNcmJDY2c9PSIsInZhbHVlIjoiS2xQSUI3ckhUMkQyRjBuSlNwelpwNE9WZkliejAwMTN4aXpJRWh2VkdJZ1k4Y1gxcVVDdW5Gdk00RGtjVW9QVVo2b1o2ZEMxdk9TdUV2SldCYk93ZHJ6OGNNSEpNWWtMZVJwcjV1bGgrTUtjQXpYaXduNnJOU3FzS0FBOW1FcnRCcE9KMlRqay9ReGw2bHVqZDBzRllLeFJoOEVFQUJQMUJNdk5OT0V2STUvOGhhUmd3RWdFMVpQaHhrM2xZbDlhRE9vTEk3ZVVROWFRSlA4QXRYNEVwMzBBVEMwUjJXNnhrUlJ2TkFsRVRPdz0iLCJtYWMiOiIwMzE0ZjFlNmY1Njg3N2I5MzM2MDNmOGRmNzNmNTdiYmRmNWJkNGUxYWY5YjUxODcxZDE4MjgxN2RjZDRjMjNjIn0=', '2020-08-10 00:16:00', '2020-08-10 00:16:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.form_ci_items_lost: ~17 rows (approximately)
/*!40000 ALTER TABLE `form_ci_items_lost` DISABLE KEYS */;
INSERT INTO `form_ci_items_lost` (`id`, `form_critical_incident_id`, `item_id`, `cost`) VALUES
	(1, 1, 2, NULL),
	(2, 1, 3, NULL),
	(3, 1, 4, NULL),
	(4, 1, 6, NULL),
	(5, 1, 8, NULL),
	(6, 1, 12, NULL),
	(7, 2, 1, NULL),
	(8, 2, 4, NULL),
	(9, 2, 9, NULL),
	(10, 2, 12, NULL),
	(11, 3, 2, NULL),
	(12, 3, 4, NULL),
	(13, 3, 6, NULL),
	(14, 3, 7, NULL),
	(15, 3, 8, NULL),
	(16, 3, 9, NULL),
	(17, 3, 10, NULL);
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
  `reference_number` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_form_critical_incident_applications` (`application_id`),
  KEY `FK_form_critical_incident_disasters` (`disaster_id`),
  CONSTRAINT `FK_form_critical_incident_applications` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`),
  CONSTRAINT `FK_form_critical_incident_disasters` FOREIGN KEY (`disaster_id`) REFERENCES `disasters` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.form_critical_incident: ~3 rows (approximately)
/*!40000 ALTER TABLE `form_critical_incident` DISABLE KEYS */;
INSERT INTO `form_critical_incident` (`id`, `application_id`, `disaster_id`, `disaster_other`, `housing_damage`, `housing_repairs`, `insured`, `reference_number`) VALUES
	(1, 1, 4, 'eyJpdiI6IjAvZlNMK1RQZXhxWnVEclJncTFraWc9PSIsInZhbHVlIjoiV2tkb2FXZEh6V1JZY2MrK3lDOExEZz09IiwibWFjIjoiZTA5ZmIzMmI1ZGMzYTBiNTE1MzRjNGJmYjFlZjViMjBiZjQzMjAzOGFmNDU3YzgyYjNhYzA5MjAyM2JkZjUxYSJ9', 'Y', 'eyJpdiI6IkcvYmc4RGhNRVJwSDdxSzVtMnpPanc9PSIsInZhbHVlIjoibGptcW1RdEhhSjQ2OHFZQmJqTWJOdmNSWUZMbzF4bHR2bDV2Q0ZNSU1ocDJOT3M2eU1tUnFSRUkydHR6dk9pUFZvMko3UEJnUG9ZQmtMOTBIOGxESHZ5TUwrR2MvVkQzUTVJQk90TWxGRVA4eEJoWnhWK3VlVkVOaFJXZ2hRSU84Mmc5L3g3L3hmVjc0VjZvTlNLUU13PT0iLCJtYWMiOiI2ZDBjOGI4NWFlM2E1NDYzMTAyM2IxYzc4ZGJkNjk4OWZjNjkwYjZkZDI1MmM0NjA3NTZjYzBlMTY2NTJiN2RkIn0=', 'Y', '001/2020'),
	(2, 2, 1, 'eyJpdiI6Imd5T3E1TFFzbUhQcm9ISDNOVmN4NGc9PSIsInZhbHVlIjoiYXBWSXdsNUdiUFRGZXp2R2VxVXJtdz09IiwibWFjIjoiNGM2NDBiOTJjZTFhNjI1YjVhNGYyN2MyMzFhN2FmNmQyMGY3MzI5MmJiMjg3MDJjNDY4ODIwNjZjNDEyMjNkZCJ9', 'Y', 'eyJpdiI6IjdNdEpRbUU4NGx0dUxxdGp1Q0d3RVE9PSIsInZhbHVlIjoiVldGK3BXcHI2RWF4RmpBQW9SWnNuNDVhbll2MktTQzNxR1ZibS9xZlJTYU5peXh2OGZaNXhheVZiQ0ZQd0hVNmdSODR5SEtUS2ZMNE1aNUQ0UkNiZEZiYnVCM2ppTHFSSytXOXhmbVBkYkpYaFVHQnhlNVlhKzNSYjB1TDZoaXEiLCJtYWMiOiJjZDU0ZjE4YmExZTcyZjZmYWI3NDJhYzY5ZTdlMWMyMDg4ZDRlY2NhMDE2ZmExOTNmNTNkZDY1NWUyMTAwOWFlIn0=', 'Y', '002/2020'),
	(3, 3, 4, 'eyJpdiI6IldrTEdCOHFXY2VhOFNMb1JnVUt6cFE9PSIsInZhbHVlIjoiQVVvazhibTJyQSttaTU5czdBdzNidz09IiwibWFjIjoiNmM0OGRmMjA1NDkyMGQ1OGZkMWNiMzI4YjRjYTRhMzNhOGI1OGYyMzdhMmJhNjE1YjVhMDBkZWM0YzVlODE4ZSJ9', 'Y', 'eyJpdiI6Ijh5QmhwQ2t4K3NhWGFhN0FpQzNXS0E9PSIsInZhbHVlIjoiZmdkUDRYMDB1eG1sUGZkdkduV1NGYjJpZkdha3ppeXV2QmM1OERnVStjY09YVGdNSDZFR2o3VU9tZXVHQVZvcjFYSHRpbDR0Rk1RdHRNL0F1dWhIWDErOE91T2IwR3VCeHBranovSDVIdTVvbFBNOFpNRU5ra0xvWXNEWlJNQVY0T3ZuR2ZEVXAraXRKb0IrSGhUU0tnPT0iLCJtYWMiOiIwZjQwYjNkZjg4NTc0YjYzM2NiYjgzZTQ0MDNmMGYwNWFiYzA1NDRiNDY3MzYyYTcxYmY2ZTQ3OWI5YjM5ZTQzIn0=', NULL, '003/2020');
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
	(1, 2, 'eyJpdiI6IjBaL053VnZuemNYMjhHbnk2bFYvOWc9PSIsInZhbHVlIjoiaGJyZFhMVHZlOHFENnpSNzNwdkl1VDVwREJLVzEzc29Ia0ZCTE1Qc1p3bE9iZzF1VktISmp2bHNkY01MNm94QmYxbEJ4eGJNTU96M3g4Yk5PaWx6cS9ZTjV4WGQ0NHUrb0ZaUjBoR3d3VC9kcFkyWkxrKzJKb2tVNVZVWk0wQTllRkpWVitYK1B3MnRKN3loM3QvYXFUdXFYVE90WEpva2NBQ0RkV1JCQm5IVk9VenpFWi9tMG94TWhOdXo3UnNPIiwibWFjIjoiMzBkNDU4MWNjZWRmZmQ2YWQyNDllNWNjMDUzMDg5ZjIyYTg2ZmI0NGNkMGYwNmQ4NThlMzNkZWNhMjZiY2FlMSJ9', NULL, 518, 1, 1, '2020-08-08 03:04:00', NULL),
	(2, 4, 'eyJpdiI6ImFXUzJlcnR2VHJGaWtpbTlTVnZFRkE9PSIsInZhbHVlIjoidEVoOWRsOVdLRzU0ekVGdXduNy9RV0VBMTVxRWxTZmhRb0tqcFNRYU53MHBBOWJlNU1pdEN0WjMxREpvbytGUjhwUkZCNUZneThJTHhPR0wwbnhxWkNubnArWHp6WWI0blJyWVJVOUZxbjQ3SVdSMDdHTXVoZ21la1IrdENHMloiLCJtYWMiOiJjYTg1MTVjNjQ3YWI4MWZmMTRkYzljNGNmZjkzZTY0ZTM1ZDE4ZWU4Nzk2ZGMyNjE4NzhmOTlkOTJhM2UyZGQxIn0=', NULL, 227, 4, 1, '2020-08-08 16:26:32', NULL),
	(3, 1, 'eyJpdiI6InliSDVvRjVvRXFMTmhyMUVzK0Z3a1E9PSIsInZhbHVlIjoibUMxU25qN1ZuNGJLMkNzd0dHUHU0QXU2U3FkdGJrK1BxOWxUZ2tjbnZDVDI0dkhHNHJqcEQyMG5FWWpmdmRUbzNPdi9OQ0lQYlR4MzNmODJoc3AwVDIxaWlvd1lUTGNkK1hHYUJyV3EyeEU9IiwibWFjIjoiMWUxMTNmMzc3MTA3N2IyNmU2YmNkNThhMTg0ZGNlMTkyMmFmZmNlMzg4OGFlNDY2NjcxYTEzN2QxMGVkMDEwNCJ9', NULL, 53, 4, 1, '2020-08-08 18:15:31', NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.insurers: ~2 rows (approximately)
/*!40000 ALTER TABLE `insurers` DISABLE KEYS */;
INSERT INTO `insurers` (`id`, `form_critical_incident_id`, `insurer_name`, `insurer_address`, `insurer_contact`) VALUES
	(1, 1, 'eyJpdiI6IjF5SnA5ZG9IZWl1TUUrMklhTGVrYUE9PSIsInZhbHVlIjoia25WV1ViOVhxRURoUmJRNG42ZE5aelJEdng2YkhvMG0xZ00weEplVG9qYz0iLCJtYWMiOiJmMTJlMDkzMTk1NDRlZTBjODU2MWJkYWJhMzdjOWVkMzliYmM3NDgzNjVmOTdjMmQ5NTM2MGYzOGU3OGE1OWQ0In0=', 'eyJpdiI6InNzY2NMYjdOTFZZN2I0bUcvQlh0aUE9PSIsInZhbHVlIjoib1lLWEV3ejgrTHJaMTFEakF6K2VUbGIvNEtyRHdXNE13bEhNbnRZb29lUTgwdWJyck9DSU1SQ0tUZkFDVHRkV3h5Um83K3hIdStyUVBIMjg4b1FGM2c9PSIsIm1hYyI6ImJlNTRiZGRhNTcxYWYwYTQwNGMzNGNmYWNhMmQ0ZmI4ZjE4YzAxMmE3YTM0NTUwYWE2M2Y1NTRiODA5NWY3YzQifQ==', 'eyJpdiI6InY4bUhONEJGYWVBaWIrYmlkd0JXUXc9PSIsInZhbHVlIjoia052aCt5UzNjT2I1WUlTVFk5dVhEUzNPY3Q2L2czZC9YNmlFb2FTbVdDQU1nczNpYWFwTDZxdXhscjBkTkRSUHdMTHdQYVRuRkRGa3ZlUUw5alJoSm1OT1pFdE5YRnJKc2NkYXN2UEZzTDFrYlpwbnZCMWJPT2VkNHhMSWhuYTRGQm84VTYxS015MEVCSC9NMWZPZW5ZeDF2V0hvZDFibUlIOVpKbThMeTc3Z09yakE2LzAycEdzbzhTVFBoMDlvIiwibWFjIjoiMGU5ODdlNmRjNDZhOTM4YjFlYjFlMjc4YWM2MjY3NjdkZmMxMjgzODFhNGFhM2U3MGYwMmJhZGU5YWFjYmRkNCJ9'),
	(2, 2, 'eyJpdiI6InZXRS84MUw1REdpd2FYaklZTVpsWmc9PSIsInZhbHVlIjoiL2t3ejdvVzlrTGJqNHdIdU13MStYVTFEMTdiK3M1WEowdGdvYVJQdytSUT0iLCJtYWMiOiI3Nzc1NWI0YmVkZjYxN2NlZmYxNTJmNjg1MzczNmVhMmIzNjg3MjJiMjU3YmZlOGRiMmU2OWY5MDIyMzUwZGMxIn0=', 'eyJpdiI6ImlmcG9GSTgzSURCcW9FUzBPS3cwTWc9PSIsInZhbHVlIjoiejlCbWp1eUYrZUxSNlYvNXpubWNuN0E5eG5KZUxTaVF1RkRsZHNraGR4dmpjMThYODRmSkRZMHZ4Q3ZaNUhVUTZ1ZEd1bXZvWFZLejl0QlJhaHFTWm9VMUk0WmpDWFhmNU5MeHExcnA3aW5reUNORFY3c0xEWnBraHc1MnQzT2d4VWZBaktyeWJMbHhTd1RrUXRZRFY5c3FXT1Vjd3RKaGFFbHhkcEdOQmZBPSIsIm1hYyI6IjRjMDMyMzEzMDg2NTBhY2EzNGMwOTkxODExYTEyOTc3ZDljOTMyZjMyZWUwNDliNmRhMzI5N2U3NmE1OTJjYzUifQ==', 'eyJpdiI6IkFpQk5ndGJ4MUcxaVk2WFBXdHBrRVE9PSIsInZhbHVlIjoiZkZyVlhmUnZ3aC9MRFJobXUzV1VaTHA2WnZUSFpOWDJEV3l4R1dqSkovUnhpMmdtVnVwOENRbVdPZ3AvcUlCRSIsIm1hYyI6IjlhNTZlMDE2NzYyMzBmZDA1Mjg1MTZmNjEyODBlYTI2NTc4MzYzOTUyM2Y3ZjNmOTYwMWZiNWQ2OTE4ZDM5ZGYifQ==');
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

-- Dumping data for table msdfs_forms_db.items_lost_or_damaged: ~11 rows (approximately)
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

-- Dumping structure for table msdfs_forms_db.landlords
DROP TABLE IF EXISTS `landlords`;
CREATE TABLE IF NOT EXISTS `landlords` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `household_id` bigint(20) unsigned NOT NULL,
  `first_name` text NOT NULL,
  `surname` text NOT NULL,
  `contact` text NOT NULL,
  `rental_amount` double(10,2) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_landlords_households` (`household_id`),
  CONSTRAINT `FK_landlords_households` FOREIGN KEY (`household_id`) REFERENCES `households` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.landlords: ~1 rows (approximately)
/*!40000 ALTER TABLE `landlords` DISABLE KEYS */;
INSERT INTO `landlords` (`id`, `household_id`, `first_name`, `surname`, `contact`, `rental_amount`, `active`, `created_at`, `updated_at`) VALUES
	(1, 2, 'eyJpdiI6IjIySk1nVUlHdU82czhSOXpvY2ZJR3c9PSIsInZhbHVlIjoiTW83QVg1dTZKS3IvUmpoTytrckJkdz09IiwibWFjIjoiMGY4NmEwNzMwYWRhZmJiNTk4NjFhMzhlMjZiZmQyZWE2NGIzMzkyNjNmMzc5MDQyZWE2ZjFlNDdmN2I2MTNmMCJ9', 'eyJpdiI6ImZVZnlnUnY3a2w0Z0VNOGlCeEw5UkE9PSIsInZhbHVlIjoiSS8zdjZTaHhTbVpDOExlVEVZeFBtZz09IiwibWFjIjoiODBmMTc3NTBiYzNiNmVlYjdmODdmNjI4ZmU1ZDlmZTdiMjVlZDU4YmI2MmZiMTZlZWJjMDlmY2JjNzhmZDg3ZCJ9', 'eyJpdiI6ImdGdXlLREJqS2U4Um11WWNkSFpiZmc9PSIsInZhbHVlIjoiVEpycllRUG01aHF5V2M0NW9obU1yQT09IiwibWFjIjoiNDgwMTRiMDA0Nzk0OWE1NjBhYWVlNjY1YTdkY2IwZjFjZDE5MjkwYTBlOWE0OGFlYWExM2RiZmY5MjRiODc0NCJ9', 3343.99, 1, '2020-08-08 16:26:32', '2020-08-08 16:26:32');
/*!40000 ALTER TABLE `landlords` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.people: ~9 rows (approximately)
/*!40000 ALTER TABLE `people` DISABLE KEYS */;
INSERT INTO `people` (`id`, `first_name`, `surname`, `othername`, `email`, `gender`, `dob`, `marital_status_id`, `marital_status_other`, `national_id`, `national_id_state_id`, `drivers_permit`, `passport`, `employment_status_id`, `employment_status_other`, `primary_mobile_contact`, `secondary_mobile_contact`, `land_line_telephone_contact`, `income_id`, `created_at`, `updated_at`) VALUES
	(1, 'eyJpdiI6IjZ4RXB2L3pYNCtZYndlRUwrZURSd2c9PSIsInZhbHVlIjoiOWFNOUg1Y0tuUUE1S2hTM2JqN29vZz09IiwibWFjIjoiMDVjYzFkMzQyOWJjZmM1MDVjMjlmZDFhODg1YThmOGU3MDU3NzVkMTU2OGU3ZWZiOTdkY2VmODFiMWJmNjFlNyJ9', 'eyJpdiI6InR1cVExaHpRMmZCOGxacjhMWmczd1E9PSIsInZhbHVlIjoiZFFXcmNBaGJxT2lwQ3FrSmgrTHJrUT09IiwibWFjIjoiYzM3NTAzYTEyOTRkYzhkMGY4YzA4YTUzYzc5YTY5ZDU5YzFmZTFjZjY3ODI1NzVkMTEwMWM1ZWQyNjUwYjgyYSJ9', 'eyJpdiI6ImFucll5YXIyS042NWFRSzU2ejEyRlE9PSIsInZhbHVlIjoiOVVKa3pQU05yNlgreWt3VHpIK09hQT09IiwibWFjIjoiYmE3OTMyY2Y4MDRlYTc1ZjJmNDJmYjg2MThlOTFjMjZjYTJmNjE2NTkxMjgwMmEwNzA4NTFkZDE5OTIyOGJjZiJ9', NULL, 'F', '2000-06-14', NULL, NULL, 43533333333, NULL, NULL, NULL, 1, 'eyJpdiI6Ims4V29xRUtGRTFDMWNuL09FclQyV0E9PSIsInZhbHVlIjoiVGZ1TS96WlpzbXJOZnk3eE5VOERlQT09IiwibWFjIjoiY2I0ZmQ1MDRhNjBiOGFhN2Q0MGI2ZWEzZjc3OTZiYzFhMjdhYmUxZmJjYzMwYjc3MDE3NDAxMmFhMjg3MjYwMSJ9', 'eyJpdiI6IjY0TkdaVU9ldGpYNkpjNU1mSWpTdlE9PSIsInZhbHVlIjoic3cwSFl0VmRPOTkyOFlRZmZQTHRUUT09IiwibWFjIjoiYjM5MzE1NDBmMWNkZDc3ZTc4YWIyM2EyZWFjNzMxNmIzYTViYThiYWI4MmM2OTM1NGNkMWJkNzkzMjcyMzA4NiJ9', 'eyJpdiI6InROVENUUGdaVUdweEJCM0dReVVJOGc9PSIsInZhbHVlIjoiU1YvNzNpR2kraXBJVWFkaDBwQUhRQT09IiwibWFjIjoiMDYyNTlhZjNhYTBkNGQzMTAyYzJlYmJiZjA3YWNkYjUxYzBjNzZhNjI1MjkwODg3OTZlMTc4NmZkYTVlZDIyMSJ9', 'eyJpdiI6IjM3cmV5S1lnNW1MZVVrbTQ5M21jUHc9PSIsInZhbHVlIjoiSnFkUWlmVFpTNE9NdzhQb2JMUHVWQT09IiwibWFjIjoiYmM4ZTgyOGY1YWIwMjNkMDc2OTFlY2MxM2UzODhiYTE0ZmVmNzdmZWUyOGFhZTZhOGIxZTQyZGZmNDExNTI1ZSJ9', NULL, '2020-08-08 03:04:00', '2020-08-08 03:04:00'),
	(2, 'eyJpdiI6ImpZYjNUR3VZRDdTa21HaE1tWU44enc9PSIsInZhbHVlIjoiQjRpREtvdVNKRkt2dWJIMzFFbTRLZz09IiwibWFjIjoiZmYwNDZhZDMwYWYzNTg0OWQ5NzkzNjBjZjBiNDMyNzQ0MTg4NWExOTlmZThhYjU5ZWJjMWIyOWY2ZmFmNTgyZSJ9', 'eyJpdiI6ImNobitqVWVBNERSRGpyYlV6UVd5MlE9PSIsInZhbHVlIjoiUitNMHBGczlFL1gvYlV2cTVIc0t1US9KZERkTm9KbGdqd1JOMlZNZ2pGcz0iLCJtYWMiOiIzMWQ2MzQ5MTE0ZWJjMDEzMjQ0MDI4MWQwYWRmZTQ4ZTZjYWFmNDY2ZmQ2Y2I0ZmE1NDYwMjcxMDUyYmEzZDI1In0=', 'eyJpdiI6Imt0VHVhUU0rSmcwcTMzVUE3Zmp5MEE9PSIsInZhbHVlIjoiUitMd0xkZDFVRWVQTU9PczRYSVRpdz09IiwibWFjIjoiMTZlOWIzZmJjMTAxMTc5NzQwYjMyZjBiMDEzMTRhMjg4ZGQwNjE0NzFhMTE4YzdlMDIxNzM2MDE1MTU1MzVhNiJ9', 'eyJpdiI6Ik9vM1l5Z0FSZ0VkQndpVHoxTWhVc0E9PSIsInZhbHVlIjoiSzRscUR0MjVQS2tSTmVVY1RMa2FDYThMVDlvaTZTYnVOMkd3b1o1V0xIND0iLCJtYWMiOiI5ODRiODc4YmEzODdmYWFmNGRjOWIyNjkxODU1M2I0ZGFiZjIzZDBkMzVhNDg0Mzg2OTQ0MDU5YTIwNTAwYzQ2In0=', 'M', '2000-02-08', 4, NULL, 64233333333, 3, 'eyJpdiI6InFMbFM2MGozTUVvUFFTYWMzL1Bvc2c9PSIsInZhbHVlIjoiL1lBOXNla0pMWG1QK2tWem1FK1pPZz09IiwibWFjIjoiZTg5YTcyODAwZjBiMjkwZjIwZTg2NjNiOWNiNTdmYjcyN2M3ZTU2NmI3NzQxZWRlNTI0NmU4ZjcyOTM0YWEwOCJ9', 'eyJpdiI6IkhhdmRVK3pSblB5MnFFb1BPWnNlNHc9PSIsInZhbHVlIjoibDFjenlUTWphM2UraGw2cjh1Sm5QUT09IiwibWFjIjoiNmI1MDVmNjY0ZjI2M2ZiZjNjYzEwNDgxZWZjODZlYmM0MmYwMjg5N2Y2ZTA0MDM3NWQyZGE5Mzk2ZjVmNGFlZSJ9', 1, 'eyJpdiI6IlRwVWVZLzNJNzQ1V0Z6aEk3empnQUE9PSIsInZhbHVlIjoiWlRLaWlLMXhnbkczR1U5YWJ0L05KZz09IiwibWFjIjoiYmJiOWY3MGQzYjk2NzVmZTllZWI1Y2I1ZTQ4YmUyZWMyY2UzYzI0MTdmMjUxYjdlOTdkYTEwOWVmOTg1MTdjMyJ9', 'eyJpdiI6IkpCeHg4eVlWaGRtOUNsQWxBalNQZXc9PSIsInZhbHVlIjoiTEhlaUV6OUVGakY5enA1NTFKdWVMeWsrT0RmZmwrbEQ5QVZXZzhvT0Uzbz0iLCJtYWMiOiI4YjdlNTNlYzU0YjA0YjM1NTk2ZmJkZWNlZTdhZmFiOGE1MzJiZGU0M2NmMmRiZjYyN2RlYTkxMWRkNDBmOGFkIn0=', 'eyJpdiI6Ik4vZzlDMkhkclFmK3M3WCtDNGxUbHc9PSIsInZhbHVlIjoiQnZiN0EyRzZZY2JNUFFTK1FGd0praUJVZHNtUUJLWmtSWk9IRGFHKzg4QT0iLCJtYWMiOiJhODRkYzIxNWY3MDkyOWNlZDkyZDI4ZmY5ZGU5Mzc1MDFmYThkMzhiODQyMjlmMWZiN2ZhOWQwMDVlNjRhZjZmIn0=', 'eyJpdiI6IlBJQUV1MVB0ZzZjTXZKL2ZkK0xTb2c9PSIsInZhbHVlIjoiMnYzdzRGbjBzYWNmT0dESVJWZERRTi9wNUxjTkpaVXBhYytUM1FlTDFkTT0iLCJtYWMiOiJjZTA0MTgxYzRlMjdhNDAyYjEyNTZmNTA3MDQ2M2FiYjcxZDQwNTE4ZjVhMDAwZDg5Y2RmOTUwZjMyZjM0ZTJmIn0=', NULL, '2020-08-08 03:04:00', '2020-08-08 03:04:00'),
	(3, 'eyJpdiI6ImhzSWx2SFdEbmNnNDhVNjRJaDMydnc9PSIsInZhbHVlIjoiM3BsMCtUNDFDd2R4ZDRudnZ0c3ZVdz09IiwibWFjIjoiOTg5ZTg4YjQ3ODIzZGJlMWJjNTlhNGNiNThkYWQ2MjE3MjM1YWIxZGFhNzcyYjE1MDkyYzYwMGM5ZTcyYWM4ZiJ9', 'eyJpdiI6IkQxZkJsdEs3WU5SbWNGbVRqUFkrT2c9PSIsInZhbHVlIjoiUG9Qa3RndGFDdmxaaC94M1ladmJudz09IiwibWFjIjoiMTViYTIzOWNmMmUxNDAzMGViOGY3MjVmMGY0ODE1NWVkYzIxNjZkMTkxNDA5MTg4OWUxOGNkNmZjMjI2NDMxMCJ9', 'eyJpdiI6Ik90d3l4dXFmU1hua0lIbUl4dFRvNXc9PSIsInZhbHVlIjoiY25IaEpBNWduSjZBaWNrNlo4QmtqQT09IiwibWFjIjoiYTljN2U0ZDRkMmU3ZGY2MWIwMjU4OGU3MDA0MGRiYWEwMThlMTYyYWZhNjBmMGQ5MDhlMzkzOTAyOTk2YzMzZCJ9', NULL, 'F', '2000-06-20', NULL, NULL, 29433333333, NULL, NULL, NULL, 4, 'eyJpdiI6IlFRKzFXdEZtYkh0SXlmR1A2cWRxdUE9PSIsInZhbHVlIjoiMU5ab3BVUnFKOUV0R1ZoQmdXUmFjdz09IiwibWFjIjoiNzhhYzM4N2Q5M2QwMWQ3NmNlMDVmZmMyOTY3MTJjYWM1ZTMyNjA1NmMyYmUyOTdhM2RkMzM4NGY1N2YxMmVjZSJ9', 'eyJpdiI6Ik1nS1JmMVhMdW9VOHZLYnRtK3VLYWc9PSIsInZhbHVlIjoicUVUZGtDZnQ0M05OeVVyZ3NDczFDQT09IiwibWFjIjoiZjA4NTQwYzZiMjM2MDgxN2MyZGM4ZWFkM2U3MjU3MDlhZWE1NDdmOWY5ZGY5MWZmNWFkYWFjMzJkNWZhOGU5ZiJ9', 'eyJpdiI6InBUQjcwNFRmWHE4enJRMnJQcEY1UFE9PSIsInZhbHVlIjoiV2JiK3ZMSzByRGYyVTV2UXg0SDJTUT09IiwibWFjIjoiN2Q2ZWRhYTMyZDA1ODYwNTM5YTRjNzIzZGQ3MDNiYmM3MTYzYjIxMDA1MDU4MjZmNDJmYTFlZmQ2YmI5NGE0ZCJ9', 'eyJpdiI6IndKSkFyRm9jUFBTM2MvNkZWdU5ITEE9PSIsInZhbHVlIjoiRmgxNTZ6eGZYeFN0VURkbUE0OHQ0UT09IiwibWFjIjoiZmJkMzgwM2YyNTBlNDlhMWFhOTI1OGE0OTc3NjcwOWJiMjc0Y2YzYmQ1MTM0MTFiOGVjMTVmYjk5NzkwNjU1YiJ9', NULL, '2020-08-08 03:04:00', '2020-08-08 03:04:00'),
	(4, 'eyJpdiI6IjFLUDFxMmdjTWFOcXJuN2VsSG5LSUE9PSIsInZhbHVlIjoiYlRPdU9OSktKM3FQYmxPdHArdC9wQT09IiwibWFjIjoiMzE4YzdmZmM4YTg3YjBkZjMxNjA1YzE3MjU5NzMzZDFlNTdhZGEzMGMyOGMwYzA1NTRhNGFmMDliOTY0YzUwMSJ9', 'eyJpdiI6ImtralpRekJZUyt1UHVXTm1waHhzUEE9PSIsInZhbHVlIjoiT0tCVndyTGZSRkMxVDcwZUJ1Q1MrUT09IiwibWFjIjoiMjFjYjE3NDUyOTBmMDU3ODE1YjA5MjRkMzdhMzliZWE2OGQ5NzYxMjg2YWNmYzVlNGY3NDQ0Yzg1YTgzOWY5MiJ9', 'eyJpdiI6Ilo3TCtkV1hWQlpDWEtkbzFkZFJlSEE9PSIsInZhbHVlIjoiUkp3OGcwN0FFbmp4c0VhR1B5cVUzUT09IiwibWFjIjoiNGYwM2Q5NmU5N2IzNjU2ODNjYWQ1ZDhlOWE3ZDkwMzMxMzAwM2IzZDJjMmIzZWVmZGEzZjY3YzYwMGFjZmMwNSJ9', NULL, 'M', '1989-05-15', NULL, NULL, 81844444444, NULL, NULL, NULL, 9, 'eyJpdiI6IitZQXZzWkRVNGx0U3BTZ1F0bFBDS0E9PSIsInZhbHVlIjoiNzcvSTdqYWg1bnhFOE1uMTNzRFFKZz09IiwibWFjIjoiYmQ0ZThlYzNmOTU1Nzc2NTU4NTg3NjQ1ZGFkM2Q1MWY1ZmRlYTVjMTEwNDlhYTMwNTk2NDE5NTYxOGUyYTQzMiJ9', 'eyJpdiI6IkNGUkZtWktLa0R2YjB4aXFqSWxtMmc9PSIsInZhbHVlIjoidEUrbkFMUGFVUnBSZHIyRlY4dFV2dz09IiwibWFjIjoiYTc4OTRmMDg0ZjBjMDA2ZDQ1YjgwMjM3M2ZkMGIwYjBkYTZmYTUxODViNWRmMjZjMzc3MzY4YWQwMjdkYWViYSJ9', 'eyJpdiI6IlhxbkNOVFJzcFJsNjc5N0dvNTh0L1E9PSIsInZhbHVlIjoiK0l1dDRvUnhsNmZpc3dIOW0rUmRWUT09IiwibWFjIjoiNDNjYTJlZjExYTc2MzVlNjY3NTRiN2FiZjlkNjI1YjI0ODg3Mzc2ODRmYTMyNDZlNTZhODdkMWFjMzUxZTcyZSJ9', 'eyJpdiI6InJTbWhjQTQ4MTVuNVRsWGg0WS9XS2c9PSIsInZhbHVlIjoiem01TDVsRjRpbUZNczVRQ3lCc0pPQT09IiwibWFjIjoiNDZkNjc0Y2QzOGY3ZWU4MzA3OGQ1YjEwYjJkMzQxYTY4ZDIyM2Q3YzgzYWNhMTNlMzU3ZTQ4ODhmYWZiNmNlNiJ9', NULL, '2020-08-08 16:26:32', '2020-08-08 16:26:32'),
	(5, 'eyJpdiI6IjZoMmI0MC9IUytTUW9yQ2FVeVpIS0E9PSIsInZhbHVlIjoieDVtbExkMlBJWUNpK2xpZGdLYzJ0QT09IiwibWFjIjoiODFkYjY0ODA2YjExN2YyMjVjMTNiNWYwMjc5NGM0ZGMzYjRlYmU5MmQzMTM0MDQ3MDczMmVhMjBjNjg5NDJjMiJ9', 'eyJpdiI6IkpySDdEejNLNE84YlR5cmhCNDZLZ2c9PSIsInZhbHVlIjoia3h2ZDhmVU4yRDl0L0NGODlRN20xeHRhZjRyYVBPVVNSSzJVVnRTRGtNUT0iLCJtYWMiOiI0Njg3M2U1ZDY5ZTczY2NiNTZmZjY4YjJhMWU1NTE3ZDg1ZWM4OTI2ODRmNTQ5YzIxNDA2YTA1MDRlYTZjOTVjIn0=', 'eyJpdiI6ImthTFphTDhmUlN5VnBRRzE2WDRtbXc9PSIsInZhbHVlIjoicXJleVJ2Zmc5dGpNbHk4MDk0dTRjQT09IiwibWFjIjoiNGM1NWM0NmNkNjA2M2I3MWRhNTNmOTBhOTVhN2Y2NGIxMDQ1ZTU2Yjk4YjRmYjM3NzQ2MWRjODQwZTZkYThmMCJ9', 'eyJpdiI6ImYxUDMwMzFlR0thbVRVRnlJZUJqL1E9PSIsInZhbHVlIjoiYUg5VS83ZENtYnhnRHFQMWpHQzhzNEd4UUh0Ymg2QS9RbDdCKzdaSXR4QT0iLCJtYWMiOiIyZmFkYTQ3ZmMxZTY3Nzc4MTllMjQ1NzJhNTk1YzMzNTQ1MDA5ODE5ZmE0Y2ZiMDA5MDU2NjI5OTdjYmE0YTk2In0=', 'M', '1989-01-16', 5, NULL, 32444444444, 2, 'eyJpdiI6IjVBd0s2eEpZQTJsZTZwMkE0cUFTSFE9PSIsInZhbHVlIjoiNldoU1RKaTZNZjRhd00rMlFOdUhrUT09IiwibWFjIjoiMGY1MGVjNDliNTZiOWJkNTlmODNjMjlhNzQ5YmJlMTQzNGQ2Mjc5ZWU5N2I0NTVhYThjYTcyYmIxZjUzYTg5MyJ9', 'eyJpdiI6IkdsanVuUW5lVTBYeG1hNnJ4ang5dHc9PSIsInZhbHVlIjoibnJCdHJSdlBIaVdTdzdjVC9wVmVDdz09IiwibWFjIjoiMDUwNTNjYWFiZGM1NDkwNDE5ZmEwZjM4ZTM5OWRmOWVhNTY5MmVkODFiMDU0M2JjYjI4MzRhNDVhZjZjNmQzMiJ9', 8, 'eyJpdiI6IjN0aWxZcWViOFB6M3hkR0JPRGJrOEE9PSIsInZhbHVlIjoiWFZ6R3BySW9mWERFeDZ6Vnh1bkxMQT09IiwibWFjIjoiYjFkNWQ5NDEwMzQwZjQ3MDg3YWUxMzQ4ZWJiZTVmOWVkMjYxMDdkNTQ5ZTYxYzE2YmJjYWU3M2Y4YzhiNjJmNiJ9', 'eyJpdiI6IlJBRDFkeGFtcG5NdC9SR053THFHdGc9PSIsInZhbHVlIjoiSitBd21jZTBDOWhzUWVJVGZIUzVpVGowV1NqWno2WVE5QWREYVl6UWM4VT0iLCJtYWMiOiJjOTU2NDJmNmNjNjhlYmI2ZjJhYTdhOTkwYjI4ZmZjMDZiM2E5Y2EwZjkzYmYwMzE2MjQxYjI5Njk1NzMyMzkzIn0=', 'eyJpdiI6IkZlN2ZBQXQ0QmhaS0xWQ0ZNazJqNUE9PSIsInZhbHVlIjoibXNPMERRNUNNWGVyQ3dIYXBCUXRwN0RKdXBuMXJsYzFheVh6ek44SkVEQT0iLCJtYWMiOiIxZThlNjNhM2NmN2E1NmQ2NGNlMjUyZWIzMDk0YTZkYTEyZDZiMWI3NGExMTQ3OWVmYzY2M2ZhMDkxMDJjNWY2In0=', 'eyJpdiI6IjIxRHgwSS9CbVdabHBqTDl0bVF4Y0E9PSIsInZhbHVlIjoiL1h1M1ovMGE2bWo5WUNyYjMvZW9VUkFvTDdDb21oQkltU0k3ZFFOR3JvZz0iLCJtYWMiOiIzYzUwMTg3MTIzN2I5NjA5MTFlYjMwMzFmZjU5MWRjYzgyNWVjNjUxMDMxYWJhZGQ2OTliODNkYjQ5NjliMjI5In0=', NULL, '2020-08-08 16:26:32', '2020-08-08 16:26:32'),
	(6, 'eyJpdiI6ImNrZ1dwRXpoaVpjZGJPRzFXQVAwT3c9PSIsInZhbHVlIjoiTWdyT21BYjB4UDdHM0lTcWlzOUpOUT09IiwibWFjIjoiYjMyYzBmN2Y1ZTkxMmM1ZjlhMWYyMGE5ZDdhMmNkY2E3OTg2ZTk3YjQxOGFhMTc5YmIwMTU2ZTEwNDdkZmZjNiJ9', 'eyJpdiI6IlZ3KzUzZEU1ZnIzTlowUnh0RThrSHc9PSIsInZhbHVlIjoiUjJMNUU2TzEvdmhITExJL3N0MVF3Zz09IiwibWFjIjoiOTQxOGQ5ZjIwZmEyZTFjYzk0YWVkMGI2M2I4NzZlNGZhMjk3NjM4YTk1MDMwZmI3YTllMDIzMGViODA5N2M1YiJ9', 'eyJpdiI6InZKT1pYWWgzK0ZVOWo3YVZ0UWhGNWc9PSIsInZhbHVlIjoia3lvNkJNcHlRTjFnYU1ocVFOanpoQT09IiwibWFjIjoiNzI1M2I4YjgwNzU3OTFmNjc4MGEwNjkzZGRkYzU5MzY0MTA5NjAyNzg1MjUwODY5ZTJkYjE1N2Q4OGRhNWYxMiJ9', NULL, 'F', '2000-02-23', NULL, NULL, 90522222222, NULL, NULL, NULL, 7, 'eyJpdiI6InJrN0t4c3NyakpFQ1RaSGdKU3V6Qnc9PSIsInZhbHVlIjoiNXY3U243Vm8wbkhlUmM1Y3lMbFVkQT09IiwibWFjIjoiNWEyNzUxYWYyNWI1ZTY0ZmU0ZTRjYTllN2I3YjhlNDAzZmI3NjlhZmU3ZDMxMDAyYjhjMDZkNTE2MTkxYjA5YSJ9', 'eyJpdiI6Ilc4RnZVTmo3UXNIYi85N1ZuT2tzT3c9PSIsInZhbHVlIjoiQXhIeUhEY1dnQ3BCcyttaFIvV3NlUT09IiwibWFjIjoiMDc4MGUyNWZkNzhiNzc5YzYyYTJkZTkyNDgyYWZmNWM1OTIwNWY1NWVhNjUzNzBhMDJkNDg2YmE0NTZkN2NmZCJ9', 'eyJpdiI6IjEvdi9BZ0MwTEdVTUhIL2wydjhWOEE9PSIsInZhbHVlIjoiMVkvYmRLMlVRa2Z5Lzh6RGQzemM0dz09IiwibWFjIjoiNjFlYjJiZmE2NThkNjIzOWQzODg2Y2FhZGI5Mzk3ZjQxNjI2ZDQxN2QwYmZkOWJjOTNkZmM3YjM5MzYxNDZjMCJ9', 'eyJpdiI6Imk5YVF2ajhteGpiUUN2ZlMzTkt3bEE9PSIsInZhbHVlIjoib01Dc3BFQ0Npd0twSUNoTXJCYk5rZz09IiwibWFjIjoiNTQwMGU2ZTQ1NGFkNzZmMmNiYWViNmQwNTE4MmFhYTg4MDZkMzAwY2E1ZjI2MDc5MjlhNGU4ZmI2ZDYxZDAxNSJ9', NULL, '2020-08-08 18:15:31', '2020-08-08 18:15:31'),
	(7, 'eyJpdiI6Ijc2RStmQmxtVWxrQmZrUE1oK1ZwNGc9PSIsInZhbHVlIjoidjJiYlB5dCtvTFJ2ZG9ENldzVDRPZz09IiwibWFjIjoiYWE4ZTI5ZDM1ODZiMzEzNDczZDM4OWQ5ZjZhMWY2ZDllMTY4YjY0YjVkZmVmMmRlZWRhNTIzZGM3OWVlOGI4ZSJ9', 'eyJpdiI6Im1kR2ZIUjYrb1FSREdxa0x2eXNCQmc9PSIsInZhbHVlIjoiUGNqaVlzbDNhUkdtek4vbm9vZGFsUT09IiwibWFjIjoiY2E4OTg2MWVmMmQwNzBiMTE1ZjA5NTQwZjBmMmI2YjMzN2Q4NGI1ZTdlYjkxMDcxNTI1ZWY4MjhlODM5M2Y0YSJ9', 'eyJpdiI6IlZaT3c5N1F4Z3RxK0dOVlNlQm9xNUE9PSIsInZhbHVlIjoiVVpYV3BpYzRIaytWVzBSd1NxWU1OZz09IiwibWFjIjoiYWYxNDVjOGFiYjU1ZWI2MjNjMzQ5YmZmOGEyNmY3OTRlOThjNTIwZDAxY2RlOWEyM2Q0MGU4OTFjNWYyYTJhZiJ9', 'eyJpdiI6Im9EUE1iVFJWZ0hWUEd2R3dJbWt0TGc9PSIsInZhbHVlIjoiNHFiUkpZR3ByeWo4aDI5N3dITCtCcHZGUk9ZVWJURVNITml6R2lPSUFROD0iLCJtYWMiOiI5YzE1YzJhMGRjODI0MjhhNzZiZDI4ODgzODMxNWM4YTQ3Nzk4ZmNmZjQyNzcwNThlNGQ4ZDQzOWQ3MTcyZGJiIn0=', 'M', '1989-01-02', 1, NULL, 99422222222, 3, 'eyJpdiI6IlNnUzdPNFVETDJLOS9KK1VnSUY4UWc9PSIsInZhbHVlIjoiZWdiZ1FmOHlhMnFLbEExTGI3cWdrZz09IiwibWFjIjoiNjVlMjVjZGIzNGQ4MDU5YjU2OGQ5ODYxNjVkNGQyOGQ2ZDY4YTU1ZGUxNWRmMDIzNzNlNjBiYzRkNmRlNmZlYSJ9', 'eyJpdiI6InN2UHpSelp1akNnR0pZU2VmdmRlb3c9PSIsInZhbHVlIjoiZ0U2SnVyVm91QjZMUmw0WUdUbkd5dz09IiwibWFjIjoiMmM0Y2Y4MzI4OTA2Mjg3YTgzMzBhODBhOGE5N2ZjOGZhOGFhYzM2ZDNkYTMxNGNmZWNlMmI4NmE5ZWNlNDkwZCJ9', 8, 'eyJpdiI6InczeCtKeDd2dUd6WjdZMW1NdmROelE9PSIsInZhbHVlIjoiSlo3YTZwUHE2SFd5bi9reVd5c0tlQT09IiwibWFjIjoiMGMwMmZkZjQ4NmJmNDE0NDY5NWYyYjYzNTU5MTc1NmU2NDA2YjdhY2M1YmIxNGU1YWFlZWViODc2MDNkMDU3MCJ9', 'eyJpdiI6IlBxWUpOUDJwVVdjQUpFVzZUdTZCVGc9PSIsInZhbHVlIjoiVlp4QWoyNkgzL0hoY01vRFNjc25xemRvYzBrSTZtSDJTdExVZzFDelRqaz0iLCJtYWMiOiIzNmY3OTg0NDBkZTMyNzBkMDFkN2ZmNTEzODdjNjIxZjA1N2ZlZjhjZDYwNDQ0ZGQyZDAwOWM2NzA5ZTNiYTIwIn0=', 'eyJpdiI6ImtyWFlYT3Z6a3gxSUx1ZURaTld4Mnc9PSIsInZhbHVlIjoiZVJmeUxxa2VMaEdwRFdvYTRod1dJMnBrU2RXWEx0YXh0em55Zk5vQlVzaz0iLCJtYWMiOiIyN2VkNDM2ODNmNGM3ODA3OTMyZTRlMTIxNjY4ODc5M2ViZDdiYmRlOTRkMzc0Y2VhMTgzODlhYjY4NDBlZDIzIn0=', 'eyJpdiI6InVTZkgyM2RLZWpsT3YzQXdab05lMkE9PSIsInZhbHVlIjoiNjNUdHNoOXgwZlpGci9tU1lWa1FLaVFLdkVhVVlDcXBCZXZRRmhiYW9sRT0iLCJtYWMiOiIzYzNjZTk0YTdlMzQ0MjI2OGI1YmI5MzA2NmVjOTNmMWQ2MTkzOGJhOTI5M2FkMTJkZWNkZDg0ZjUxYWUyZjAyIn0=', NULL, '2020-08-08 18:15:31', '2020-08-08 18:15:31'),
	(8, 'eyJpdiI6ImZ5a2M1VUpiRXpQSGlZaVg4c25yUUE9PSIsInZhbHVlIjoiNnB1MHhNa3d0Um9jRFppK25ad0Fpdz09IiwibWFjIjoiOGU2YzNlNzEzYzgwNGQ5ZDAwNWVjZDcxYzJkM2I0MjliOWIzNDQ0ZmYzYTJkMjRmMThkY2UyYjU1MGRkMjhiMiJ9', 'eyJpdiI6IjVwS0dCL1dacmt4MXUzTG1WOXdyK0E9PSIsInZhbHVlIjoiWmJXcWJBNzVJbUI0ZHEyUFBhNWxZQT09IiwibWFjIjoiN2FkZDFhMzQyOTVhM2NlODU1OWRlNmM4YTk1OGQ2M2Y1N2NkZjcyYWJiMDViZDYzMDM5ZjI4ZmUzMGNlNjkwYSJ9', 'eyJpdiI6IjFkUW5jWkVQSEZSNENoWFdUZkRIY3c9PSIsInZhbHVlIjoiWUNIWmQ1S3FPWGRUUHFzV0ljSmxKdz09IiwibWFjIjoiYTVlNjk4MDliYWU4N2FlZGFkOTJkZWZiMmYyYmZiNjJlZTFmOGVjMzJjODMxMzc5YzQ2ZDYxZjRlMzYzNDI3YSJ9', NULL, 'F', '2000-06-13', NULL, NULL, 87422222222, NULL, NULL, NULL, 5, 'eyJpdiI6Im9jTzgxb2xGS0t6UHBxbVdHOFVibEE9PSIsInZhbHVlIjoiSkQ0dG1BOE1rR2RPMlFvT21ENU4wZz09IiwibWFjIjoiZTIxYzJmMmRhODEzNzM3YTgyMzg2MDkwMmMzMDM4MTQ3YTZlMjBlYTBlMThhOTBiM2I2N2IwNDBlMzgwOTllMCJ9', 'eyJpdiI6ImtUa1htemVuTEovcWdqVUlKM01pNUE9PSIsInZhbHVlIjoiSHFjVWlrWDFEcjVvSzFjWUJqdFFCUT09IiwibWFjIjoiMzlhMjE1MjAyOTUwZTBkMmVkNWVkYmM4NWZjYzJhOWQ0NzRlYjQ4MzgyNmZiYjQzYzQwZjJjMDhiMDBjOTg5MSJ9', 'eyJpdiI6IlhhYzJGZVZvZVoyT1lldWxNdTNlRUE9PSIsInZhbHVlIjoiQVVCK0xuRHMwWWNtMjNuU2VBWHVHUT09IiwibWFjIjoiNmJhMmZjMTE3NDY4NTUyMjNiN2VmMWZjMDhmNGFjNmNmMWZhODBkZGM3OTI1OGI3ODE5NGFjOWU1YmE0ZTJkMiJ9', 'eyJpdiI6Im9JNERrZzFncjN2WlA1LzEzcEF3MUE9PSIsInZhbHVlIjoiZnROTDRiYkY4NElxekUyalZCQ1dNQT09IiwibWFjIjoiNTJlYjNlZTdiMTEzZGYzNDJiNjQ2Zjk1YTZiYTVmNjM2MDk5MWVmZDQ2YjI1Mzg5MzIyNzQ3ZWY4ODhmOTUxNiJ9', NULL, '2020-08-08 18:15:31', '2020-08-08 18:15:31'),
	(9, 'eyJpdiI6InFaTHhQSDdCNlJPNElBaUQ3V3VScXc9PSIsInZhbHVlIjoiaHdqMmo3eDZWQVZkbFNDeWtZdG1PZz09IiwibWFjIjoiZTZjNzFiZWUyN2U2ZTA2N2FlOGQyZmQxNzFiOGU1MzdkYzUwNWFlNGFjZGM5ODg0MWJiYmI1NjBhOGY4NTE0NCJ9', 'eyJpdiI6IkF3c2ExUXA0eTdYdUwreDJ0Q1ZqcFE9PSIsInZhbHVlIjoiRmdlTTl1ZDZ1T1ZLRTNCVGpHZU9Tdz09IiwibWFjIjoiNGZhOTliZjVlMDYxNzQzNmRhMzM5NGYwYmMxNzljOGUwYzYwYjY1MzdiYmNhMTZiZTBjY2Y1NDQ1ODU5NTVhNyJ9', 'eyJpdiI6IlVqNGhQb1RJL0JhQm1KOWZpbjBiUHc9PSIsInZhbHVlIjoibGZ2RC85MTFsbTlNcWtxNTJqWThBQT09IiwibWFjIjoiNjY3Njk2N2JhMGVkM2NhMjQwYTE2ZTAzOTMwMjMzZjcwZTM5ODg0NjI0MjNkNmJkM2EwM2U0MGM1MjY0MDNhZSJ9', NULL, 'F', '2008-06-11', NULL, NULL, 48022222222, NULL, NULL, NULL, 3, 'eyJpdiI6ImJ6Y0dBUHRJcE5RcWQvdTZtbDJaZ2c9PSIsInZhbHVlIjoiOHgveEFpa1U2Q2F1emRQcHFvaVBlUT09IiwibWFjIjoiNTRlOWIzYjZmZTk5Yzc2ZmE3YmQ0ZDQ0ZThiNmQ3MzU4ZTA2NGRjMjk0MDNiNWIzMjJhM2U4ZDcyYjQwN2QzMiJ9', 'eyJpdiI6IktrazBta3p5SU5SZHVoakY3b2hNbUE9PSIsInZhbHVlIjoiYlc0OTVpQ1E1eldoRlVBUzNaSmJlUT09IiwibWFjIjoiNGIzYjRjYzFjYjY0Y2FiNTY4ZjZiNjY3ZmU3YWNlZmRhNTA1MzE3NjJjYmVlMjcxNTNmMGNiOTdmYWZhYjhkNyJ9', 'eyJpdiI6InlVNndaZ3dwdnpScDV1ejU4Tms1aFE9PSIsInZhbHVlIjoic1V3ZFNUMitnZGdiL1hVb251a1VCQT09IiwibWFjIjoiNDZjZjdlZjkyMWVhNTc4YzI5ZmEzZTRlOTIwZTVmNGRhYzc0YTEwNjRjNmRiYmYzMDUzMDA0NDJiZjQyOGFjNyJ9', 'eyJpdiI6IjQxOGtvbmd0TXNjbHU0bTdibTI4TkE9PSIsInZhbHVlIjoiVWhqNTlHdjRhNE0vVTJoMU5GYXBSZz09IiwibWFjIjoiMWM1YjA0MGQyZjUzODE0MTczODdlMTk5ZDQzZTA5MGY4NTYxM2EzMTRkODU1ZDNlNjU5NzgwYjUwMjQwYzkyZCJ9', NULL, '2020-08-08 18:15:31', '2020-08-08 18:15:31');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.person_household: ~9 rows (approximately)
/*!40000 ALTER TABLE `person_household` DISABLE KEYS */;
INSERT INTO `person_household` (`id`, `person_id`, `household_id`, `relationship_id`, `relationship_other`, `active`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 2, NULL, 1, '2020-08-08 03:04:00', '2020-08-08 03:04:00'),
	(2, 2, 1, 0, NULL, 1, '2020-08-08 03:04:00', '2020-08-08 03:04:00'),
	(3, 3, 1, 6, NULL, 1, '2020-08-08 03:04:00', '2020-08-08 03:04:00'),
	(4, 4, 2, 4, NULL, 1, '2020-08-08 16:26:32', '2020-08-08 16:26:32'),
	(5, 5, 2, 0, NULL, 1, '2020-08-08 16:26:32', '2020-08-08 16:26:32'),
	(6, 6, 3, 3, NULL, 1, '2020-08-08 18:15:31', '2020-08-08 18:15:31'),
	(7, 7, 3, 0, NULL, 1, '2020-08-08 18:15:31', '2020-08-08 18:15:31'),
	(8, 8, 3, 7, NULL, 1, '2020-08-08 18:15:31', '2020-08-08 18:15:31'),
	(9, 9, 3, 5, NULL, 1, '2020-08-08 18:15:31', '2020-08-08 18:15:31');
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
	(7, 'Supervisor II', 'supervisor', NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.role_permissions
DROP TABLE IF EXISTS `role_permissions`;
CREATE TABLE IF NOT EXISTS `role_permissions` (
  `role_id` int(10) unsigned NOT NULL,
  `status_id` int(10) unsigned NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`role_id`,`status_id`),
  KEY `FK_status_permissions_status` (`status_id`),
  CONSTRAINT `FK_status_permissions_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `FK_status_permissions_status` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.role_permissions: ~11 rows (approximately)
/*!40000 ALTER TABLE `role_permissions` DISABLE KEYS */;
INSERT INTO `role_permissions` (`role_id`, `status_id`, `description`, `created_at`, `updated_at`) VALUES
	(2, 1, NULL, '2020-08-09 23:05:16', NULL),
	(2, 2, NULL, '2020-08-09 00:50:03', NULL),
	(2, 3, NULL, '2020-08-09 00:41:38', NULL),
	(3, 4, NULL, '2020-08-09 00:42:07', NULL),
	(4, 5, NULL, '2020-08-09 00:44:00', NULL),
	(4, 6, NULL, '2020-08-09 00:53:41', NULL),
	(5, 7, NULL, '2020-08-09 00:44:34', NULL),
	(6, 10, NULL, '2020-08-09 00:48:32', NULL),
	(7, 8, NULL, '2020-08-09 00:46:54', NULL),
	(7, 9, NULL, '2020-08-09 00:47:33', NULL),
	(7, 11, NULL, '2020-08-09 00:47:16', NULL);
/*!40000 ALTER TABLE `role_permissions` ENABLE KEYS */;

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
  `button` varchar(150) DEFAULT NULL,
  `step` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.status: ~12 rows (approximately)
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` (`id`, `status`, `button`, `step`) VALUES
	(0, 'Inactive', 'deactivate', 0),
	(1, 'Active', 'activate', 1),
	(2, 'On Hold', 'on hold', 1),
	(3, 'Forwarded', 'forward', 2),
	(4, 'Logged', 'log', 2),
	(5, 'Pending', 'pending', 2),
	(6, 'Updated', 'update', 3),
	(7, 'Recommended', 'recommend', 3),
	(8, 'Under Review', 'review', 3),
	(9, 'Approved', 'approve', 4),
	(10, 'Sent For Payment', 'payment', 4),
	(11, 'Rejected', 'reject', 4);
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

-- Dumping data for table msdfs_forms_db.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `first_name`, `surname`, `role_id`, `email`, `email_verified_at`, `active`, `password`, `remember_token`, `last_online`, `created_by`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', NULL, 1, 'admin@email.com', NULL, 1, '$2y$10$aRBnMbZm1ld51AkoRYKd4uACqpoNXSaVYPjq74o94WAhb9fGDnaFm', NULL, '2020-08-09 16:49:48', NULL, '2020-05-02 04:29:15', '2020-08-09 16:49:48'),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.user_audit: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_audit` DISABLE KEYS */;
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

-- Dumping data for table msdfs_forms_db.user_logs: ~2 rows (approximately)
/*!40000 ALTER TABLE `user_logs` DISABLE KEYS */;
INSERT INTO `user_logs` (`id`, `user_id`, `ip`, `action`, `created_at`, `updated_at`) VALUES
	(1, 1, '127.0.0.1', 'Login', '2020-08-08 14:53:52', '2020-08-08 14:53:52'),
	(2, 1, '127.0.0.1', 'Login', '2020-08-09 16:49:48', '2020-08-09 16:49:48');
/*!40000 ALTER TABLE `user_logs` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
