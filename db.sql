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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.applicants: ~4 rows (approximately)
/*!40000 ALTER TABLE `applicants` DISABLE KEYS */;
INSERT INTO `applicants` (`id`, `application_id`, `person_id`, `active`, `order`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, 1, 1, '2020-08-14 23:22:24', '2020-08-14 23:22:24'),
	(2, 2, 4, 1, 0, '2020-08-14 23:23:55', '2020-08-14 23:23:55'),
	(3, 3, 8, 1, 1, '2020-08-14 23:54:37', '2020-08-14 23:54:37'),
	(4, 4, 11, 1, 2, '2020-08-17 06:23:53', '2020-08-17 06:23:53');
/*!40000 ALTER TABLE `applicants` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.applications
DROP TABLE IF EXISTS `applications`;
CREATE TABLE IF NOT EXISTS `applications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ip` text NOT NULL,
  `form_id` int(10) unsigned NOT NULL,
  `status_id` int(10) unsigned NOT NULL DEFAULT 0,
  `schedules` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_applications_forms` (`form_id`),
  KEY `FK_applications_status` (`status_id`),
  CONSTRAINT `FK_applications_forms` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`),
  CONSTRAINT `FK_applications_status` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.applications: ~4 rows (approximately)
/*!40000 ALTER TABLE `applications` DISABLE KEYS */;
INSERT INTO `applications` (`id`, `ip`, `form_id`, `status_id`, `schedules`, `created_at`, `updated_at`) VALUES
	(1, 'eyJpdiI6IktURng1ZFB6akdnVStmRFBoNVZ3d2c9PSIsInZhbHVlIjoiNllTcncxWS9veDV5VVVja2NTYVp5bFNTMDVjL2FiUURpQmhiOE9mWHBnND0iLCJtYWMiOiJiZTc2M2JhYmYyNTkwODBhNWY0Zjc5NjQzMTdjMDgyOWY5OGVjNzg4OWJhYzE2Y2ZmN2MzODMzMDE2MDQ5M2UyIn0=', 3, 9, 3, '2020-08-14 23:22:24', '2020-08-17 05:42:06'),
	(2, 'eyJpdiI6Iklic1c1UDBhK0gxaWJTa3RObnlCZXc9PSIsInZhbHVlIjoiNnpDbnUweW1XUlpqcGxpYi9XWHdYQllVZWZMa3VkTGdvSm9kQzJlbTgxQT0iLCJtYWMiOiJkOGI2Y2E4ZDcwMmFiYmVlYzI5NjQ1NGU4NzU0ZTExYTcwYmQ5YWJjZTUwY2Q1MDViMmEzMjIzNjVlNzBiZGNkIn0=', 3, 9, 3, '2020-08-14 23:23:55', '2020-08-17 04:29:41'),
	(3, 'eyJpdiI6IlE4U1g1aERBdmQrUlJxcHJZc1drY3c9PSIsInZhbHVlIjoiaGhlTFhPOU16Y2xGek13dklxeENBS294T0I4eUJHaXF1M2Z2TC8xVHMycz0iLCJtYWMiOiIyYWI5OTdhZmQ0MzljYjk1MTNjNzZlYzE2NWRjNmJiOWFjYzY4NDQyNWZjZmU4NDRhMjhjMzk0N2IxZmE3YjM0In0=', 3, 9, 3, '2020-08-14 23:54:37', '2020-08-17 05:39:18'),
	(4, 'eyJpdiI6ImZnb1NLMXllanRkSmZhWHRad3cvZWc9PSIsInZhbHVlIjoiMTl3MUNOaExIMTcwWXlLWlVKcC9MTHg4eXVoVmVQZ0M2WW4rcmdsMFRDcz0iLCJtYWMiOiJiMjU0MmY4YmM2OTc1NTQ4MWE3ZGRiMmI5OWFiNzZjODY0YWNlZTIxYjk4ZWMyOGEzODk1NjA4ODk3MjQzNDUxIn0=', 3, 9, 3, '2020-08-17 06:23:53', '2020-08-17 06:42:15');
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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.application_documents: ~35 rows (approximately)
/*!40000 ALTER TABLE `application_documents` DISABLE KEYS */;
INSERT INTO `application_documents` (`id`, `application_id`, `file`, `document`, `document_type_id`, `path`, `created_at`, `updated_at`) VALUES
	(1, 1, 'signature', '1_signature_MicrosoftTeams-image (2).png', 5, 'eyJpdiI6InRJMDZ1WU1IS2gva0pzdjdTMjdQTmc9PSIsInZhbHVlIjoicDhvQUlFOHRmTXQxd0Jic0pocmptRy96UlVLUU9tUjZYREphTjk4TFJIbjd6S3M5STJUVmEwSnA4M29KL1NQcnJyQ3ZGZ085NmtZRVgrb1pFTWI3LzBPVnVtcnoxM21RVGNPVzU0VnBjYms9IiwibWFjIjoiZTQyODRiNGMyNzFhMGNhMWYxZGEyNGQ4NWNlM2MwM2Q0NDA2MzU1MzNmZmRmZjdiZWYzZGQ2MjYyZmNhODZkOCJ9', '2020-08-14 23:22:24', '2020-08-14 23:22:24'),
	(2, 1, 'ebc_id_letter', '1_ebc_id_letter_rpTransaction (10).pdf', 1, 'eyJpdiI6InhBQnE2QXp6RDFrZWpNWlFMWnZ6dnc9PSIsInZhbHVlIjoiNityZERMTVVGa0t1WE9zSDd5MGRHM1R0U0JZc3RRUjhYOFZTNnRZZjh4bXdlMGVkUWJIdU10dVhtVWdseHo4cmdRQlI4QnA2ODJyYUxRRVo5VnUreWJJdGI2TStzNGdOQkhoR0xORk5FL2s9IiwibWFjIjoiMGE1NDQ4ZTVjYTRhNTBhODgxNjU1MjgyNzI0NTA4Mzg3ZjliYTMxMDBiODViN2VhY2M5ZThlMzliOWEwNmYzNiJ9', '2020-08-14 23:22:24', '2020-08-14 23:22:24'),
	(3, 1, 'landlord_id_card_front', '1_landlord_id_card_front_114-1146250_mobile-icon-png-cool-mobitrends-1-mobile-devices-icon.png', 7, 'eyJpdiI6Ik52WGYybTU1K2xhSEp0SEUyU2xlL1E9PSIsInZhbHVlIjoiTVZacTA0am45U1NvY25lRXp4eHNTd2ZuTW5GQTFIYnE0aVYrTVgxN0xTSlY5RUUra1VUNUphWVdoL2Y5VGFtT2k4NVNuUlNIUmpUclI3QXFQVXFreVlEZFBOc011cDB0UFVqcS9TQ295RGF6bTh3OHNvbUt2Y3dCVldwclNpbTFUQWFZb0pkbEs5a1hIckp0V2ZUTm1DVkJET1YvTHhRL2NkbHBPTjdKSjRRPSIsIm1hYyI6IjY0MGE2OGZlODNjMDg1OWYwYzhhOTdmNTE4MTVhYTZjMDY2ZjI3MjZmNjA1MGU1Zjc1NDA5YWE5MjQ1YjA5YzMifQ==', '2020-08-14 23:22:24', '2020-08-14 23:22:24'),
	(4, 1, 'landlord_id_card_back', '1_landlord_id_card_back_Three_TT_Butterflies.png', 5, 'eyJpdiI6ImhBenlNbjBEWUtBMEphQ2c5KzBKQ1E9PSIsInZhbHVlIjoiSUFjT01ranlJMFhrZEk5aElZbjZmYUZKMlRpSlM4MisrS0o4MzVGbnVXd3gvSUhhV2J1MXVOcHlObEliVFZWRFNiRTVwUzI4c3hOZS9XL2daK2U0WUFoZXVxVko4cEtvMTNnQXBIaVY0UnM9IiwibWFjIjoiNWRkZGI0OWM4M2RhMDNiMjI0Mjk3MjA5ZGUwZTljNDQyNWJiMGQxMjI3YzExNWQxMjkxODYyYzhlYjhkODcwYyJ9', '2020-08-14 23:22:25', '2020-08-14 23:22:25'),
	(5, 1, 'utility_bill', '1_utility_bill_Advisor_2020-06-22T16_06_09.526Z.pdf', 1, 'eyJpdiI6InkyaGxKajQ4a1BzYzNSTU1iYXpsb2c9PSIsInZhbHVlIjoiR3d6N1VmSldYa2lrYis1ZWVWbDFENXpZNGZBNGZHd0poeStrMTBxOE9tL0FqQ3prMUkrVnh1cFRXdEJ4L1h1b1V4NlBTd2xvQ0hiUXdVVkNyVnJSK2l5VnFxWmxPeXpFRy9TdURlWXZJN0UwSzU5SXpCd09qOHJ1ckdacm9SREYiLCJtYWMiOiI0YjUxMzQzZTI3ZjIyYmI2YmYzY2Q4N2FjNGM4YjBhYzBjZDk4ZDVjNzJlYzYxZmFjMzZkNmQ5YWFlYTA4ZmEwIn0=', '2020-08-14 23:22:25', '2020-08-14 23:22:25'),
	(6, 1, 'rental_agreement', '1_rental_agreement_Advisor_2020-06-22T16_06_09.526Z.pdf', 1, 'eyJpdiI6IiswbjIyODNBRXk5MDFUblpVZHFFS3c9PSIsInZhbHVlIjoiRFNmTCs1OHlQaGNWNFppTnExMzhFMlJPTE5LRVNGYURIN0RqSkN6SDBIWE5VejFYZzdHeDFMLzZjWnMrbmNLcWVGQ1l1Y0poTGJMY3V4a2dGMG5mamtObUU1eW16S09uZ0JlMkFzNGZlS0RtS0J4M1FGL3BmMHFSUmRaVEhXYjIiLCJtYWMiOiIyOTBmMjUxNWFkZWM4MGFmY2NkOTRhOGEwNWQ1OWMwY2MyZGVkN2RkNDk2OWQyMmI4M2IzYWE4MGE1MTA0ZmQ2In0=', '2020-08-14 23:22:25', '2020-08-14 23:22:25'),
	(7, 1, 'rent_receipt', '1_rent_receipt_114-1146250_mobile-icon-png-cool-mobitrends-1-mobile-devices-icon.png', 7, 'eyJpdiI6IjMvdzJtQ3dtWm9IWWFhb2IxU25KUEE9PSIsInZhbHVlIjoiQzl5S3dEZ2ZBamNjb29NZ1ZmTFlKODk2dGRBcU5VSi85QjNiU1ZyQ29BcU5lNW9iOWk0QUt2UDkwSVlkYlQ1ZmorTGlXMDFnUmZseVFuNEFwcFI4ekFMREZpZjdXVGY1M1BnQWNWV2Rhc1h5eHZxNGw3UFZUa0xHanBBRk5rb1BpT3MxTVhFZGdiRXhzRjRQbHoyRmY2OG1KazQwR0RFdzI4aW1QRlo3eFUwPSIsIm1hYyI6IjhjMDUxYzEzYzY0ZTVjMTk5NzA1OTEyYWEyZjViODUyNzgwYmM2OTdhOGMwNDMwNzBkNjJkYzZmNmFjMGQzY2EifQ==', '2020-08-14 23:22:25', '2020-08-14 23:22:25'),
	(8, 2, 'signature', '2_signature_MicrosoftTeams-image (1).png', 5, 'eyJpdiI6IklzYTlXa3Z6b1l5TlBrd0hPMit1SWc9PSIsInZhbHVlIjoiUE9BMjNWNDY3SjB4MlhLNVhOYjA1UmdoUUcxVG0zdldrSmNVWTlyYno1ZXorbHpMMW0rYzc2WExiTGV1b1B1QUwzRWI5NFQrNkNBbkhJUVRNUk5WbTVZNXJIcnJIL3RleFNiSkZmL2dteGc9IiwibWFjIjoiMjRjMDk1MjQ4Yzg5YTQ4YzE0ZDc2OGU0ZGNlZmM2NjNmYTU0YmM2ZGRkZTQ0NWYxZTQ1N2NhYzhiYjg4M2QwNyJ9', '2020-08-14 23:23:55', '2020-08-14 23:23:55'),
	(9, 2, 'lost_id_police_report', '2_lost_id_police_report_IMG-20200426-WA0022.jpeg', 7, 'eyJpdiI6Ikp1YWVFcWg5UlJYMVQ3MExIN1F4VEE9PSIsInZhbHVlIjoiK2txUzhqR1BaZjNWeGFrSTNCR0p3bzU5Y2RDWElMRTZLSkRvNE1jOXpjRzM4N25CUDU3b1AxdjZrZ3JsdzNEdEpzbEIzaDFnTS9WVnBTS1g0UkVhT0VueEdscHZYMnRVVmlwaUx2V3N0L289IiwibWFjIjoiMmNiOGQwNWEyNDU2MGI4MmUyMmQ1YWMyNzRhYzZjZDhhMDAzYjlkMWI2MmQyMzBhN2Q2NzQ3OWY3MWUwZDIxOCJ9', '2020-08-14 23:23:55', '2020-08-14 23:23:55'),
	(10, 1, 'site_evidence_0', '1_site_evidence_0_Three_TT_Butterflies.png', 5, 'eyJpdiI6Ii92MS95Y3U1U2NzQllnNVowZXEzMEE9PSIsInZhbHVlIjoielU3NmJPMVI3b0ZnNkRydEFGdWNIVVVUKzR6OGJ4dDVnb2tpT2xTd04xV1I0enBPc0NBc2pSQXlZdHRGaGZLL1E1Q25HbzVkME1WVzNFQW1jN2diSVVmV2lreVo5aGZuMU5oYWY2bjc4T2lYRWNnSEk5aG9lU2FzdHBWQlFKbCsiLCJtYWMiOiI0YTExZDNiOGY1NTZkYjNmMDk0ZDBlNGM4OTBjMjBhZmYxY2JkM2FhYmJmNjA0N2U0NTI3YWQ3OWI2YTBmZTYxIn0=', '2020-08-14 23:38:23', '2020-08-14 23:38:23'),
	(11, 1, 'site_evidence_1', '1_site_evidence_1_GovPayTT Onboarding.png', 5, 'eyJpdiI6IjRtc2hpZE5Ob3Q4RjNwU2pkTm5WbWc9PSIsInZhbHVlIjoiUUJRRFpxNisrNXlVa2VIZi84YWwwaUZEZEQvWTY4VVYreGlZMzh6eGJqK3F4aElVUWtxQ2YwWDE0Y1hVTlZFS01Ha1Q0QzRsRG1kbUR3b2dTUktKaG1ycGhBQU1KRTIxd0g4MjVkb1RjNk5EOU5ISEl5VmE0Z0NnTlhpS3dhV1oiLCJtYWMiOiJkNzBkMmMxZWYxNjA0NmNhMGQzYTIyNWY4MzUyNmY0MjAzMjE3NGU5OWJiYTc4OTMzYzMyNmEwYjRkNjc1ZjE4In0=', '2020-08-14 23:38:23', '2020-08-14 23:38:23'),
	(12, 2, 'site_evidence_0', '2_site_evidence_0_Self-service Kiosk.jpg', 7, 'eyJpdiI6ImxrUVFlbVlyRnR5bTh2NVEyZnMya0E9PSIsInZhbHVlIjoiOFo1YkF5N29POVNhZEF5bGNoMHZYOWIwamJkcWhac2hmaHJQMlVTWUMrV0o2eG0yY2crckZHcFJ4MUFjMnRWK21UV1NpSmRhcHZmRW1aa2dvYjgvdHNidXpKdGorWXFwSjhlNm1SdjFpR2ZUempLOGFGOWhGM0l5UXc3RXRwbkIiLCJtYWMiOiI5M2VmOTMwYTBhZjQzYmNhOWU3NTUwNGRiZDE0ZGQ3ZWFkNzVkY2EzYzdhNDhiODNiOGRmZGNlOTFiY2FhNjZkIn0=', '2020-08-14 23:45:03', '2020-08-14 23:45:03'),
	(13, 2, 'site_evidence_1', '2_site_evidence_1_Coat_of_arms_of_Trinidad_and_Tobago.svg.png', 5, 'eyJpdiI6IlBDZlRiOTBKd1BRMjJ3bllENFNWS3c9PSIsInZhbHVlIjoic2h2TTJNcDJHT3lGaWRwbTBWY1EwdUk1Y0tlUklGSVhYZTE0c1d2cDlKMjRDa1pXbHIvRnE3V21pbHdxOCtSMFd3dE1XOUJlVEZmT2ZBYzNVeGg1b1RVU2sxbW53L2hVOGFxNnRrMkRta0pZZW9oalUvMkJMS2h2K2YrYi9xRFpzbDFxSFMyLzBqNSs1UGs5VXphdWdRPT0iLCJtYWMiOiIzZDU4ODk5NDJmNWZiMTU1ODA2YzYzY2Q1ZDlhMDk2ZDM4MmRhZjhkYmY0MGMwYWY3Mzk0YWU3NmI4MzM1ZjMyIn0=', '2020-08-14 23:45:03', '2020-08-14 23:45:03'),
	(14, 2, 'site_evidence_2', '2_site_evidence_2_iGovTT-Logo.jpg', 7, 'eyJpdiI6IitQWkNqenNqckY5cWZCWXF5azB3eXc9PSIsInZhbHVlIjoiSFY0enQ1amlmNWdnT1lDTWR0clhOOG40NFkvYVFDOStQZVpidXlTcnBUZzQ1MTB1N0c0Y1c0YmV3b1dUK0hNUC9ZV25EQWRDVUpBVzNkWmNsS1FWd1pKRmNXZnRQbWdyNUg4UTBlWDZxUTA9IiwibWFjIjoiNDQ0MTBmN2UwZGVmZjRiYmMxYTQwNzNiNjkxMmE4MjNmOTVlYTg3YjAzNmQ2NDZhYzA3ZjQ5NjViMjI3N2MyZCJ9', '2020-08-14 23:45:03', '2020-08-14 23:45:03'),
	(15, 3, 'signature', '3_signature_MicrosoftTeams-image (2).png', 5, 'eyJpdiI6InB1SGZPZ2x6OWdzMTFRWEk4ZEFTK3c9PSIsInZhbHVlIjoiMzhVYW9uTi9RWExoYjRXS3QvdGFyWmlvVFpaMU1Xdi81ekFiUXdpU1UxQUt1ektuRHFXcHRQVS9NQnJRa0xUdjUzWHZOeDN0bVhmeS8yZ3VxaFpaTWE2Rzd1L2p2Qi9aS1ZUdkZZNDQxcmM9IiwibWFjIjoiYzdmOWNmMzQ1MjJkM2JhZDBjY2UxY2I1NDE0M2U2OWM3Mjk0M2NjOTVhYjk3ZGMzNzdiMTU4OTBiODhkZTdkYiJ9', '2020-08-14 23:54:37', '2020-08-14 23:54:37'),
	(16, 3, 'lost_id_police_report', '3_lost_id_police_report_rpTransaction (9).pdf', 1, 'eyJpdiI6Iit2VkUvQXpicWw0aE5aTUg0NUFnN2c9PSIsInZhbHVlIjoiRFlBWUFZalVRSFRuT0Y2TXdQM1E1VXdFSjk3Y1c3Zm5IZjJOc3ZMVlNnL0YzVlF3azhaTElPUjQzTDdRU1NPMWZNakJlVnIwaTFPZklvaFRmVVlJMzJ5YzVxN0V4M1FIK3dCSmxWVzNNaVk9IiwibWFjIjoiMzcxYzhkMDVhNDM3NzZiZDBhNTEzMTRlNzEyMTQwMThjMTBmNjRhNjBkY2M2ZWNjNjVkNzliZGQ4Njg4MTIxZSJ9', '2020-08-14 23:54:37', '2020-08-14 23:54:37'),
	(17, 3, 'site_evidence_0', '3_site_evidence_0_003.jpg', 7, 'eyJpdiI6Im9EeEt5MmQwTTh2V2l1WlYzWmw5eUE9PSIsInZhbHVlIjoidStwYU5yWGtqcUx4WU9IZmtjY3JBRWhoSGtzVEdtbHdveDBDUFIvWnFteEJaZnM0d3EvdnY5bE5ZMlhsMWlTZ2ZDVG1ESmo3NHZOQUFtbEhPNjExZlIrK08zQTR3WEpJTmR3ZjdvU2VWaVE9IiwibWFjIjoiZTU3MzUwN2I3Yjk4OWMzMTRmYWVlZWU0YjU2MTgwZjBiYTViNjU4YzExNTc4MTAwM2RjYjBhYzI3MWMwOGI1MCJ9', '2020-08-14 23:59:38', '2020-08-14 23:59:38'),
	(18, 3, 'site_evidence_1', '3_site_evidence_1_govpaytt_1100.png', 5, 'eyJpdiI6ImtheVFsb3k5K25pa0pGajJNZ0pObEE9PSIsInZhbHVlIjoiSGYwa3h2T2V1eDFZcGhDM3JkendYOFVFWmdtbHg0c3QvY29zTEFHd2M3MkJkRXZXZ3hvVWtpSHBpSUZPUCtyQ0dOWUxNdWl6LzdvRzBGRXhPRlVwMmxrTFdVWjB2MnpzMTRBZzRtaFBiZ1FOdVAzR3laazN2cm9GNy9IT0E2dWYiLCJtYWMiOiI1YTU3NWZhMWVhMWRjMjc0MTJhYjFiYjExY2QzNmZlOWQwOThhODFiOTEyYjY1OGJkMjI4ZmM3NGQyNmQyMzFkIn0=', '2020-08-14 23:59:38', '2020-08-14 23:59:38'),
	(19, 3, 'site_evidence_2', '3_site_evidence_2_bg.jpg', 7, 'eyJpdiI6IjA3WkdhOFB6WWV4amNOamMwckRvZkE9PSIsInZhbHVlIjoiZFYrdXRTb1BPcUFFQmw4TlJMSGZYZlprUDF5c3VMWjZRdGgyWHFQek1RTEovSnYwUEFBc2ZEVXFJTkZoSHZzSXZnTTA4ZXlDaFlHREl1czhlNWcxbTlYY2tWbWFtaHFWQnlkbUZ0emNvbGc9IiwibWFjIjoiMGIxYzMyZjBhYzNmMjMwY2FhMDNlNjExOTUwYjZmMjdlOWMzZjBkNTA0Njk1MTRjZDQxN2YyYjI0MDAzZmQ0YyJ9', '2020-08-14 23:59:38', '2020-08-14 23:59:38'),
	(20, 4, 'signature', '4_signature_password policy.jpg', 7, 'eyJpdiI6Iko4VlNRYkJpTmxnLzdlakQyVUxpNWc9PSIsInZhbHVlIjoieFVzVjJWb0hvV29iM2dNLzF1YkdFdkc2ajlHZTd5UEdCUCtLRS9VUzBJc1YrZWNuNUVTek40a3JxU2RQWlUyaFF4T21FTlRNekR2NzFaYUltV3JSRUE9PSIsIm1hYyI6IjZhNzQyMDliZjRiYjUxODE5NzlkNDA3ODMxNDc4NDhhMDFhNTU1ZTlkYzdjMzI4YWYxYmE5Yjk1YWE4YjYzNDYifQ==', '2020-08-17 06:23:53', '2020-08-17 06:23:53'),
	(21, 4, 'lost_id_police_report', '4_lost_id_police_report_SQL Server 2019.JPG', 7, 'eyJpdiI6IlhvT2Y0VDdQeW1DVVRQMEQ4OFQwYUE9PSIsInZhbHVlIjoieHAvMytGUTY3SzJjRytndXJKNlV1dEgyTStOS1lYTzl0QjhJeW1TV1JxSzczRkxBVEE1bnpsajFBQmM3WkZnWHhGdXF4YmltNmF6eHdBVHQzYkNFcG91WWFKSVdhbWZvUDBkaGZzUTllVzQ9IiwibWFjIjoiMTBmOTk3MDkyMDZlMzMxM2RjNzg0ZTMxMjJjZjI0OTUyMWU4YTJiMWNjNjhmYmMzNjNiZDY4ZmQ5MTA3ZjM5NCJ9', '2020-08-17 06:23:53', '2020-08-17 06:23:53'),
	(22, 4, 'landlord_id_card_front', '4_landlord_id_card_front_sao approved_bg.png', 5, 'eyJpdiI6InpJMTZqYjlTUkFEUW5xK3dmcU1sanc9PSIsInZhbHVlIjoiRk5tMm1qVTZKc080OEtrMmdkWjVIdEZhVnhGRkJGMjF2MUR6dE9TY0NXR2U2M2t3cWFocnhrUUF3RzNYT0syek1XWjFKVGlBUUR2aGxndE5jaU8yOEFZWnJoK1lNQzlSajV5VkI3QkU5VDg9IiwibWFjIjoiZGU3OTRmYTQxMGMzMWZmNjc1ZmVkZjVkYzlkNjk0MjYzNGExZGNlYjYxZmZmNTE2MTI1MGYyMzhlNWJhNzBjZSJ9', '2020-08-17 06:23:53', '2020-08-17 06:23:53'),
	(23, 4, 'landlord_id_card_back', '4_landlord_id_card_back_ipo_aps.PNG', 5, 'eyJpdiI6IlNKWlNNZitNek9QV3NkM2RrN0oyOFE9PSIsInZhbHVlIjoiUDd6MDBUVm5MZDJJblBMV2tSZHpROVlYdkE2dWRPRVN5NW9OWlFZT0pVNnhNcEpHQXpNRnhPd2xSTk9EODVxOUhudnN5SXg1bUp1aVVGZVRxZjhRbUErMnBtSVhVRkdmNUx2MWtRc2s4Uk09IiwibWFjIjoiNWZhOGU1NTUzZWFjNGFlYmU3MzkzNWRjMjU0NGM0MTI0NjRhMjIyOTdhOGU2ZjVmMGM3Zjc5ZGU1NjJhYzkyOSJ9', '2020-08-17 06:23:53', '2020-08-17 06:23:53'),
	(24, 4, 'utility_bill', '4_utility_bill_avatar.png', 5, 'eyJpdiI6IllLOGEvckFRZXliT2I4SWRhRVdOYkE9PSIsInZhbHVlIjoiWElyb3Rkam9sajMzVm04VzNBdHFLbUN0M3g1S1IvelQ4ek8xWjhXYzJBY0pjenQ3WWpNc0NVWnRRUEVLMm0zcTBTNWNUMG5UMmhaZzNhZTVYWVV6Y2c9PSIsIm1hYyI6IjlkZTEyMzM5Y2Y3MzgxNjRmODA0OTJiZjJhMTNjMzZkMmU2Yzk4NjEyMzNjMjgyOGViZThiZWE3NWIzOGQ1ZDQifQ==', '2020-08-17 06:23:53', '2020-08-17 06:23:53'),
	(25, 4, 'rental_agreement', '4_rental_agreement_technical-support-icon-flat-design-vector-6775300.jpg', 7, 'eyJpdiI6Ill5eVQzSTlqYzJvUG5RdzdlNEUrZXc9PSIsInZhbHVlIjoiOHZyMmJTeERwYUNzQS85OWtyendDZHFLOWRmS0Q0bUl4cjhkMnJaTGVFUSt4NFI3N0NIS2NlUTI4eFBIOW1Sb2lUSm5vUVJhWStadFBBSzF0V1VwcDNJbnhQaG5YeEpkM0tWdm11dGVWUksrRGkwcGswK09WcFVLQURLV1ZHUHRHblVrWXB5SENveE5PcWtOTHhDakJ3PT0iLCJtYWMiOiJkYzI1NjMwNzNhMDExZDQ4YjgyM2VkZDNmYTA2OWU5NGZiNTNiODE5OWMwOGRhM2VkYjQ5YzQ3ZGZmYTY3YzFkIn0=', '2020-08-17 06:23:53', '2020-08-17 06:23:53'),
	(26, 4, 'rent_receipt', '4_rent_receipt_govpaytt_powered_by_igovtt_800.png', 5, 'eyJpdiI6ImFoaGlCY3JBbFhTaXRjSllGdG55bFE9PSIsInZhbHVlIjoiWmN0L0FsMDBMZWpHd2NBWi9XMkliNzZTU3JJcWh1cE5LNGZSdzRjdkZ1eG8wYnJRRTJBdnVJVWpjRmNjTE94K05zZXB6elQvcVNGejZTbU1mTXFwb0FmR3RobWZSR2FhUW1CMkpQZ0tXVHVldnpBYi92VExTZllzUjd2ZzY0bGMiLCJtYWMiOiJmMGFlMTQ1MzE2YmQzY2Y4MzQ1NTNhMDU2YjliODQ0ZDdmNDBlYjg1YTZhNTYzYzYyMWE4ODhjMTVlNThjNzMwIn0=', '2020-08-17 06:23:53', '2020-08-17 06:23:53'),
	(27, 4, 'school_supplies_relief_quotation_0', '4_school_supplies_relief_quotation_0_architecture.png', 5, 'eyJpdiI6IjFEWDEyYlhuY3YrOWs4S282WTFFVWc9PSIsInZhbHVlIjoicUI2OUpqSWtiWERGRzRFYzE1dzVFSHZBOXBXK2JCMDd4ZmtGZTJ2YWJSR2MyRnJGVzdxZmFEVHhka0NOeUhzY2tBdUQyakN4dlJxZkU4RlVzMjkxSWZzWDFDQ0w2c3Z5a2REWE9rZTFPTGxtVllTa1VmU0JLc05hSTFFZWdrNXc4emFySEZ3VWxJcHQ3YkxzVFVTSTJyYVc3RGRPekxTa2k5WU9Zb2F4QWc0PSIsIm1hYyI6Ijc2YjI5Y2Q3YjY2M2NiOTYxZjE1ZjljYjk1MTc1YWYwZjg1ZDQ5NDM0OTFhYWEyYzA1NmUzZjhkM2QwYmIwY2YifQ==', '2020-08-17 06:23:53', '2020-08-17 06:23:53'),
	(28, 4, 'fire_service_report_0', '4_fire_service_report_0_santa.jpg', 7, 'eyJpdiI6IjI0Tzc5dkw5elViSXUxSFE5Q01LeWc9PSIsInZhbHVlIjoidnBPckk3RTZTaE5YbUhzaDA5c21yeXVOU0pWNFRqYlUvdnZKYUJsa2hMdE9neGhuUlpITGtJMnNkd1hUWXpzVVRrTWdQdUMvNDdTc0lTb1FGdys5RkFnUllQNVBlcjJwNTVzUS85OFhVdjFNNFhlWkdCL2ZiclFnRDhMTStydEUiLCJtYWMiOiI0YjQ4ZjgwMTg4Zjc2YTVlMTI5YmEwOWY4YWUzMGQxY2M4ZDYwMWE4YzE0N2JmNWRiMzc5MDliMTYwMGFmNWVjIn0=', '2020-08-17 06:23:53', '2020-08-17 06:23:53'),
	(29, 4, 'clothing_relief_quotation_0', '4_clothing_relief_quotation_0_govpaytt_screenshot.png', 5, 'eyJpdiI6Ik80bTVqRGpIV0Y4bTducTJiVy9LRkE9PSIsInZhbHVlIjoiQ0pJQ0lJL0x3aGJuZlpEMEZhcWNzdEhIT1BvY1pFMFY0R3dEeVo2d3pLTVZPamJuSFVTR3VUK1Z4WlVxRHROL2FWZjlTQjA0aE5sa1lESWo5ZGIyRjdYM0QzQnBPZ212YVJnejdiWEZ2SnFiSUZvWnRFMC9XQW9QcGJDVEVENU5lM2JsQTN1OHBVK3hXOW5SMG1HRUR3PT0iLCJtYWMiOiI3NjFiM2YxNjZmY2VlZDMzOWQ2NTAzZDc0ZWI2M2Y2MDU4MzdiMjIyNWE3ZGNkYjNlNTk0NDNhNzg2NjYzNDAzIn0=', '2020-08-17 06:23:53', '2020-08-17 06:23:53'),
	(30, 4, 'electrical_damage_0', '4_electrical_damage_0_online-payment-process.png', 5, 'eyJpdiI6ImluVys2c1Y2aTJIMnRkTG1LUzlJUnc9PSIsInZhbHVlIjoiajQ5NFJPdldZdlowc2ZZTFVGL3AxMGwzaGZXWW5DK3B2M1lXdWtuWC8vNkRMUTlwS0pNUk81a3VuenNPTjRjdi9udVRGUVBycEdZWkJnMnB5aHVEckZ5ZEZFUDZDdGVIb3l3bWs5bFUxWU1WYWhwSVU1dGUvNEJ4V1MyRHFUb1B1UlhQdzlDemlFOGJIbUZER0g2UmJnPT0iLCJtYWMiOiJmNjA4MGY1ZTM1ZTY0MjM0NzllYjA0ZjBhYTVlNTM3OGViNTI1MWIwYTY3Mjc2YTAzYmFjZTg5NjVhY2RiYmFiIn0=', '2020-08-17 06:23:53', '2020-08-17 06:23:53'),
	(31, 4, 'plumbing_damage_0', '4_plumbing_damage_0_reversed.png', 5, 'eyJpdiI6Ik5ZSE1QdzYzR2dVWGg1UUhqR3VMdkE9PSIsInZhbHVlIjoiV3hxQnMvUWN3Yy9yTmFiYWFuVG1zQmtOMzVtd3FOelk5NVVKTGlMc3NDOW5yck1IUVRHMCtwL0ZUbE1jZjhCR2RFME5NSzR1cnIxSkUxSzlSODh3ZDJNQUhhK2R6eWMvQlIvWExIVGhkTlk9IiwibWFjIjoiNDAyNWIxMjI3NjgwYjE2NzczZjRhYzY2OGQ2Mzk0ODNhYWYyZjMwNWZjYzVhOTQyNTQwNDM4YTNmYzdlNDkwNiJ9', '2020-08-17 06:23:53', '2020-08-17 06:23:53'),
	(32, 4, 'plumbing_damage_1', '4_plumbing_damage_1_lard.png', 5, 'eyJpdiI6Ik9NSEl3RnFYVEdaUStsaGdRWE5COHc9PSIsInZhbHVlIjoiWk1XdjBxMjRVUXhFV1ZPQ0JCYklSc0VQRUwxayt2UXlXUlVKVE9oUzZ3Nzhrb1RYZXpMVVFUZkZhNFZtejJNeW9YWS8vdEJueHFxTEZFR1pIeHg2T0lLNGgvayt1RGtMT3pPSWgvMGFzOVE9IiwibWFjIjoiOWZmM2Q0YmRmNTU4NDIxNThmODFhYTY4MWNhMTEzZWMyNjlmNjU2YmUxNTg1NWViMTgxOTIwYjAzYTdhNjI1NSJ9', '2020-08-17 06:23:53', '2020-08-17 06:23:53'),
	(33, 4, 'site_evidence_0', '4_site_evidence_0_SMTP.PNG', 5, 'eyJpdiI6IjZiNXNzdVFZLytObStLay84R2tJRkE9PSIsInZhbHVlIjoiMTkwQU1Va3lqT3hIV2toL2ZhU3BvYzQrdVJsclI0SmZwanJqU2R1TTI3ayszUjFZLzBUQ0xESjBLa0RnSUJTWEFnOVF4RC9MVkt0b2dGNzVseTVEdzJIbkFwMVIvbVIzbk9KalVpM0dUVFk9IiwibWFjIjoiMTMyZDIzNjRlMWExYzM0ZWUxOGMxMTM3YzBhYTFlYzk2NWE4YmM1YjMyYjU1ZDEzZjIxMjM3MmI1ZjY4MTllMyJ9', '2020-08-17 06:26:38', '2020-08-17 06:26:38'),
	(34, 4, 'site_evidence_1', '4_site_evidence_1_response.PNG', 5, 'eyJpdiI6IkxSWWhLWFhYOUpVVzZFRml0cFIyQ0E9PSIsInZhbHVlIjoiWW80cFNJTHlBb0NCRkhzdlNlaE04bzFaNHBnalROY0lFTVNoTCtzOGtwQmhsdzM4VS9OU2laSm4zMFZLVEJSc25nRWlHcStWNXA5ZlM1N3JSbFZyeGt4U2RyRmFuRlVsK1RrU3hoWDNWTGM9IiwibWFjIjoiYjQ0MjVjODI2ODc1ZTNiYWEzMGFmMjU2MmQ3NTYyOTU1N2NjN2JhZjI1MWRkZDc1YWU0NWU1YmZmZjE3YmRlNSJ9', '2020-08-17 06:26:38', '2020-08-17 06:26:38'),
	(35, 4, 'site_evidence_2', '4_site_evidence_2_itool.PNG', 5, 'eyJpdiI6IlYxdWhwbUhUVUhRa0llbWRHWjEwbUE9PSIsInZhbHVlIjoiZVJ2ZTIwWTgyckk3OEtTdWJKU1h0Q1h2YXRKMVFZcVU0TUxvQ0FVZENQQyt4OExPWVVVN1RPcEs3S096cmlhUnNEd21MQ0tTTnZ1ZGtJazAzZVQ2RHRBanBScFZxMTNWRnk2UW8yN082ckE9IiwibWFjIjoiNzZiNDA2ZmFmMWY3ZWExNDgwZWRiMTM4MzU5Zjk5MGYzZTgwMDQ2NDg5YjE4YzgxZmE5ZmNiMGYxNjZlOTVhMCJ9', '2020-08-17 06:26:38', '2020-08-17 06:26:38');
/*!40000 ALTER TABLE `application_documents` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.application_grants
DROP TABLE IF EXISTS `application_grants`;
CREATE TABLE IF NOT EXISTS `application_grants` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `application_id` bigint(20) unsigned NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_application_documents_applications` (`application_id`) USING BTREE,
  CONSTRAINT `application_grants_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.application_grants: ~13 rows (approximately)
/*!40000 ALTER TABLE `application_grants` DISABLE KEYS */;
INSERT INTO `application_grants` (`id`, `application_id`, `key`, `value`, `created_at`, `updated_at`) VALUES
	(1, 2, 'emergency_food_card_value', '500', '2020-08-15 00:11:37', '2020-08-15 00:11:37'),
	(2, 2, 'emergency_food_card_period', '3', '2020-08-15 00:11:37', '2020-08-15 00:11:37'),
	(3, 2, 'counselling_services', 'person 1 name (type of counsellor)', '2020-08-15 00:11:37', '2020-08-15 00:11:37'),
	(4, 1, 'emergency_food_card_value', '500', '2020-08-15 00:21:27', '2020-08-15 00:21:27'),
	(5, 1, 'emergency_food_card_period', '3', '2020-08-15 00:21:27', '2020-08-15 00:21:27'),
	(6, 1, 'general_assistance_rent_value', '3399.99', '2020-08-15 00:21:27', '2020-08-15 00:21:27'),
	(7, 1, 'general_assistance_rent_period', '3', '2020-08-15 00:21:27', '2020-08-15 00:21:27'),
	(8, 1, 'general_assistance_rent_month', 'September 2020', '2020-08-15 00:21:27', '2020-08-15 00:21:27'),
	(9, 3, 'emergency_food_card_value', '500', '2020-08-17 05:33:22', '2020-08-17 05:33:22'),
	(10, 3, 'emergency_food_card_period', '3', '2020-08-17 05:33:22', '2020-08-17 05:33:22'),
	(11, 4, 'emergency_food_card_value', '500', '2020-08-17 06:42:15', '2020-08-17 06:42:15'),
	(12, 4, 'emergency_food_card_period', '6', '2020-08-17 06:42:15', '2020-08-17 06:42:15'),
	(13, 4, 'general_assistance_rent_value', '7000', '2020-08-17 06:42:15', '2020-08-17 06:42:15'),
	(14, 4, 'general_assistance_rent_period', '4', '2020-08-17 06:42:15', '2020-08-17 06:42:15'),
	(15, 4, 'general_assistance_rent_month', 'September 2020', '2020-08-17 06:42:15', '2020-08-17 06:42:15');
/*!40000 ALTER TABLE `application_grants` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.application_status_audit: ~31 rows (approximately)
/*!40000 ALTER TABLE `application_status_audit` DISABLE KEYS */;
INSERT INTO `application_status_audit` (`id`, `application_id`, `changed_by`, `status_old`, `status_new`, `details`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 0, 1, '22', '2020-08-14 23:24:28', '2020-08-14 23:24:28'),
	(2, 1, 1, 1, 3, 'we', '2020-08-14 23:24:35', '2020-08-14 23:24:35'),
	(3, 2, 1, 0, 1, 'dee', '2020-08-14 23:24:48', '2020-08-14 23:24:48'),
	(4, 2, 1, 1, 3, 'edrr', '2020-08-14 23:24:54', '2020-08-14 23:24:54'),
	(5, 1, 1, 3, 4, 'fff', '2020-08-14 23:28:56', '2020-08-14 23:28:56'),
	(6, 2, 1, 3, 4, 'rgffe', '2020-08-14 23:34:49', '2020-08-14 23:34:49'),
	(7, 1, 1, 4, 5, 'rrrr', '2020-08-14 23:35:22', '2020-08-14 23:35:22'),
	(8, 2, 1, 4, 5, 'rgyyr', '2020-08-14 23:35:38', '2020-08-14 23:35:38'),
	(9, 1, 1, 5, 6, 'rrttg', '2020-08-14 23:38:23', '2020-08-14 23:38:23'),
	(10, 2, 1, 5, 6, 'tggg', '2020-08-14 23:45:03', '2020-08-14 23:45:03'),
	(11, 1, 1, 6, 7, 'dftt', '2020-08-14 23:45:34', '2020-08-14 23:45:34'),
	(12, 2, 1, 6, 7, 'ffggh', '2020-08-14 23:46:31', '2020-08-14 23:46:31'),
	(13, 1, 1, 7, 8, 'rttyh', '2020-08-14 23:47:17', '2020-08-14 23:47:17'),
	(14, 2, 1, 7, 8, 'edc', '2020-08-14 23:51:01', '2020-08-14 23:51:01'),
	(15, 3, 1, 0, 1, 'rt5', '2020-08-14 23:55:05', '2020-08-14 23:55:05'),
	(16, 3, 1, 1, 3, 'rtyy', '2020-08-14 23:55:14', '2020-08-14 23:55:14'),
	(17, 3, 1, 3, 4, 'ee', '2020-08-14 23:58:10', '2020-08-14 23:58:10'),
	(18, 3, 1, 4, 5, 'errt', '2020-08-14 23:59:09', '2020-08-14 23:59:09'),
	(19, 3, 1, 5, 6, 'errrr', '2020-08-14 23:59:38', '2020-08-14 23:59:38'),
	(20, 2, 1, 8, 9, 'dertt', '2020-08-15 00:11:37', '2020-08-15 00:11:37'),
	(21, 1, 1, 8, 9, 'ertrrre', '2020-08-15 00:21:27', '2020-08-15 00:21:27'),
	(22, 3, 1, 6, 7, 'g', '2020-08-15 00:58:04', '2020-08-15 00:58:04'),
	(23, 3, 1, 7, 8, 'g', '2020-08-15 00:58:22', '2020-08-15 00:58:22'),
	(25, 3, 1, 9, 9, 'ddd', '2020-08-17 05:40:16', '2020-08-17 05:40:16'),
	(26, 4, 1, 0, 1, 'ddf', '2020-08-17 06:24:34', '2020-08-17 06:24:34'),
	(27, 4, 1, 1, 3, 'rffff', '2020-08-17 06:24:44', '2020-08-17 06:24:44'),
	(28, 4, 1, 3, 4, 'ffr', '2020-08-17 06:25:13', '2020-08-17 06:25:13'),
	(29, 4, 1, 4, 5, 'drrtr', '2020-08-17 06:25:40', '2020-08-17 06:25:40'),
	(30, 4, 1, 5, 6, 'deffdd', '2020-08-17 06:26:37', '2020-08-17 06:26:37'),
	(31, 4, 1, 6, 7, 'rrrt', '2020-08-17 06:27:01', '2020-08-17 06:27:01'),
	(32, 4, 1, 7, 8, 'ftrrr', '2020-08-17 06:27:29', '2020-08-17 06:27:29'),
	(34, 4, 1, 8, 9, 'ddd', '2020-08-17 06:42:15', '2020-08-17 06:42:15');
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

-- Dumping data for table msdfs_forms_db.disasters: ~4 rows (approximately)
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

-- Dumping data for table msdfs_forms_db.document_types: ~6 rows (approximately)
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

-- Dumping data for table msdfs_forms_db.employment_list: ~4 rows (approximately)
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
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.error_log: ~55 rows (approximately)
/*!40000 ALTER TABLE `error_log` DISABLE KEYS */;
INSERT INTO `error_log` (`id`, `user`, `ip`, `action`, `exception`, `created_at`, `updated_at`) VALUES
	(1, 'eyJpdiI6IlBlQm9YVjVOdjV2V21hT2ZoSlJldHc9PSIsInZhbHVlIjoibXQwMnJsTGxSRTFvR3ZMZUZYYmRXUT09IiwibWFjIjoiMGQyMDAxYTg1NjUyNTBmNmRmMGQ5ODNiOGMzZjUzODAyM2FiZDdlYjVhYTQwNGNjMzAwMWQ4NThkMjg3NzgzNiJ9', 'eyJpdiI6IjRrNjBjRy9OMzRRS08rUWNrdisyZVE9PSIsInZhbHVlIjoiMld0R3dmeXQvZ1Z0R3pxeUpKY0ZFeVVqNVNmWWpxNkFzU29mQVZSRkNhQT0iLCJtYWMiOiJlMWNmZWZkMjc0NDVjNzI5YzlkZjQxMzI5MjAyNGU0MmViZmZjZmI5NTEzNWRhZjg2OTNlNWEzZWQzOGY4NjNmIn0=', 'eyJpdiI6IldEU3RVMW9XbWY4UnRRL1RjQVhIdXc9PSIsInZhbHVlIjoiNGNmaGowQVREb1MvQXMwajVTMnM5eVRZZGc1SjgvdTM2NEFWU0FiQmVDbUJCanlDUFdYakNCMWlLT09JaVRRUWRPYjJOR0FvZjJ1R2RvVEVRN3RmcXc9PSIsIm1hYyI6ImQxMWI3ZTE1YzM3ODViOGFmNDg5Yzk2ZjNlNmY1ZWY3ZGQ5OGU4OGI4MDFjZjYzYjQyNGI2MjlkZWNiODk2ZDMifQ==', 'eyJpdiI6IjNrMFp4T3lFbnZUNXdRd2ZjYTlncGc9PSIsInZhbHVlIjoicEVhYllsN3g0eVFSRklNM3RzTEp0U0tGbjFKdVR6aXlGdktWb0xPWTk0az0iLCJtYWMiOiIxZmI0NzM5NDZiYjQ4YjZlNjZhNmY2OTY4Mzc1YjhiNTI5MTVlNjQ3MGYxNDgzNDhiMTEyMjIzNDA4ZmM2ODFlIn0=', '2020-08-14 23:19:21', '2020-08-14 23:19:21'),
	(2, 'eyJpdiI6ImNLUk82STI1a3BGbHo0TkcvTU4va0E9PSIsInZhbHVlIjoiVnZabVowTW9Wa1lvWk5hQk5mb3orQT09IiwibWFjIjoiZWJlMmVhNDFmMzg4OWM5NjY0NjVkOTI2M2ZhOWYwZjlhYTAzNDQxM2M1N2E5MDRiNmMwYTYwNDA5ZTE5YTJkMSJ9', 'eyJpdiI6IkRDZ3AvUVYrRUw3eS84dXZ1c0dTWUE9PSIsInZhbHVlIjoiT0tIYWk2Z0ZtbFJtc3NtV3FmaXM1MjFrcEtkQWs3RDd3M2lMYmluZXJJYz0iLCJtYWMiOiI2MmRlMzI2OWFiOTllNzdhODY0ZDI1ZGU5NzNlOTBhNWUzOWNhNzE4NmU2MTk5NzI5YWI3NjhhMGJiZDM0NmZhIn0=', 'eyJpdiI6IktMbDJ0dUdMcWFLRU5nSERlTGM5U2c9PSIsInZhbHVlIjoiMThXcFQ3MjVsUFR4bGVRWE9uZE12MVNEb3BYTm9ZRk1FSS9tSXBLVjJOYUNnemR5TEc3UVNMR0ZHZFlSMHpROFQ4UnpTajFUazdCQkdPMm1jcmpwUGc9PSIsIm1hYyI6IjBkZTBkMmU3Y2NlYjc2NzJhOGQxMjdlY2ZkOGQ3YWUwZDk4OTYxNWNhODEyYjg0OGMzMDJiYWRkODUxNmFiOTEifQ==', 'eyJpdiI6IlV6NjFhaUltT3J2U2tEd3pNb0pxaXc9PSIsInZhbHVlIjoid05yazVnWXM2bDN2UTV4bVZoYTVab2JSQ2VTZThTZTF0b0czdmdGSnB2WmxHYVhQYSszVEtUelpLUWQ3YUFOMzZOaEx6eWVXVGx4UWNySzlZdzFiS0tVT05XTWZJNmVVZmJUVTVPbTVtcUM1NW0rVGw0enA4ZXN2NUNtVU40K2ciLCJtYWMiOiIwNDYzMmJhYTIzMDU1N2YwZWQ0MDM1ODFkYjhkYmRiMTA0ZmIyODUzNzEyZmI4NDAwZWEzNDU0YTQ1NTJmYTJmIn0=', '2020-08-14 23:25:20', '2020-08-14 23:25:20'),
	(3, 'eyJpdiI6IjlGQjRQZldhSXVEdFhZRkpwVDRXOGc9PSIsInZhbHVlIjoibVZVTEJHN3FvRktnUDJWZnZtZHVvQT09IiwibWFjIjoiNDg5YTY5NTdmODhjYzYwZWRkOWMyOTUxODc3MmJkM2MyZWE3ZWQ0OGZkNTZmNmViNGE4M2U0MDI4ZGQyMTk2OCJ9', 'eyJpdiI6IjUvUVk2cmtmOG5PQ3FleFJYZTZ4NkE9PSIsInZhbHVlIjoiUFZXcDc0ZnQ3WlhtNDkrK29BVGpBUUxBNVVNZlRUcGlYMlhRWWVxZUxORT0iLCJtYWMiOiI5Yjg3NGExNDlmMjgzNzdkZmRkNzllOWYyMzkyZGM5N2IwZGNmN2RmMTgzMTdjODA2ZTI1MzVkOTU0NjYyZmVhIn0=', 'eyJpdiI6Ikphd2tRdXo4bkw0TXl3VTJMUVpaT0E9PSIsInZhbHVlIjoiNk1ONnBaM3lBMHo2UCtFR1lWWWU2Mk02REw0cnBVaHRKQkJlSVk4WS9lRlVhSFZWNW5PVDFTRm50VWJoOGFrNitVSEU0cGsvYjgwczFSOG1nbU50eGc9PSIsIm1hYyI6IjRhY2Q2NzNhOGNiMTExZmRlZThiOGQ0MzI4OWRkM2JmZWZkMTNjNTU3MTJmN2Q1MTYyYTdhYzM2NzIyYjA5YjEifQ==', 'eyJpdiI6IlhwamxzdzNoaUl3eFFhaWYzOFRKZnc9PSIsInZhbHVlIjoiVGM1NDg3cUV2Zm9RNmVrNVRoazEzbG92U1crWkRWTS9qa0dNcGppOXR6KzhRUDlFaXFzQXdMdGJOR29oaDlZeThES3ord1hFUnNIZ3A2bkRCVzJRcFVjNVVMcEphS0V3cERHT29JaHUrYjJvcWRiSCtKclBaM0xRVVFTS0gvRHMiLCJtYWMiOiJjNThhOTM1MjNjYTRiN2UwMDdiMjEwNjNkYzU3OTUxMjVjNmUyNmNlZGQzOGJlZDQ2NjQxYmU2MmRjNzEzODA1In0=', '2020-08-14 23:29:28', '2020-08-14 23:29:28'),
	(4, 'eyJpdiI6IkdMUktsOVJ6cVdlTWlSQ0U3UHFrZ1E9PSIsInZhbHVlIjoiOGY0elFZanlOTnd0WG9SY0lVZ0Q3aG5YWWxLZWZHZXYwbDY2RENTZExadz0iLCJtYWMiOiIzNjMzZjRmYjk2MTY4YTg5NGY4MmMyNTY0ZDhhMGUwOTRhMGJlZTE2OTdkYzBhNWEzNTc3YjFkNmI5Zjc0ZDQ4In0=', 'eyJpdiI6Ik5CZVdjUHpMMzFtSFdESy9TcXI4V0E9PSIsInZhbHVlIjoiTGt6VDRYeGQ5dUlMSm9QTzlKOVR3dXc5bCtIVTVrbVNaQ043VkFNalhhVT0iLCJtYWMiOiJhOTg1N2Q1ODMwZWRiMzQ4MjA4YmU0MGU3OTllMWUzYjU1OTM4YmI0NTRhYTAxMGM3OGQyNzYzYWUwY2Q1ZTI0In0=', 'eyJpdiI6InNCTDE5ako2WkcyS3YwL1FUc2tiVUE9PSIsInZhbHVlIjoiZ0FaNjhvQnlJVE51VzlvaDFTS2p3L2xaNmova3FGaGRYMW9RRkhNZnAzSTUrRWtVZ3NPUFdRWXlNZEl5WVlCcStYOGxmd3J2aHlMdWtCVnd5MnNiaXc9PSIsIm1hYyI6IjgzOTU0Yzk5ZTIxMWIzYjQxNTg5ODcyNzQ4ZjFlN2NmNTkwZGFlMmMyZWMxOTZjZDM0YTc2MmNmZjVhYTZhNTAifQ==', 'eyJpdiI6InJGU2xaUU94VXFvcCtKYWhvby9mT0E9PSIsInZhbHVlIjoiNFo2cWF2U01pSkFIdVZ6OWxhdDQ5Q083RUgyQ0NWdDZkYmtLbFRYS09NYjJJMmdSVG5pd2pINUVvbHgvbEw0bXRqKzBPZ1pIZy9LSTNranNIRG56WE5rYjJtZDBvUG5TSm0yN0hFdTBOVGQ4dmxHMkdraDhVYngrMTB3QWRKb0ZRUko1MTM1OWFnWFRBWTVhejhxejROVUxpTlhiVElyVmR3Rzh1SkplZXR3PSIsIm1hYyI6IjBiMWEzMzliMzIyMDhkNDMzYmZmN2ZiZDcxMzMwMzdmZDUwY2JiNDIxNjMzMDJjNGVhMWQ2YzkxYzFlYTkzNmMifQ==', '2020-08-15 00:22:11', '2020-08-15 00:22:11'),
	(5, 'eyJpdiI6IkdoWjFWZHhpNFZ1YVdoRUpLb0dRTFE9PSIsInZhbHVlIjoiYUY5cldkY0hlSnQ3MXFxNFZMdy9jS2V2bXZQMmFhQmlkdjlQRTc0OFd4MD0iLCJtYWMiOiI0NzdkNjYzYTU0NDE4NzIzMzg3YTJkMmUyNmI0ZTQwZDcxZDllZmM5YzA3YTExNThmOGEzMmFkNTAyNDc0YTFlIn0=', 'eyJpdiI6IkY2RGtjVUltS2tFUnRtUFAyakpqVkE9PSIsInZhbHVlIjoiQkZiWUZ6M2hzQWhQdDdTcThnaytnc0JOV0g2dFJxcExvSDV6eWdkck5ZYz0iLCJtYWMiOiJlMThkNDhhZDc1ZjQ2MGFmNTQ5YzZhNDliYzg5MjhmNmIxM2MwMDUxN2IwYzc3YTExZmUzODYwZDVkM2Q5MWMwIn0=', 'eyJpdiI6InRlMisxSG9jUk9LVDV2c0xSVWYxRkE9PSIsInZhbHVlIjoiZUJlQytOMi8ydnBCMEQ2YXkzcTBpNlUyemRWc3hyTStrVHJRalhoT1JhdmIxY1JMTWNCM242d0dnbXd4ZnlYOVZRZEkxK056cDkrUFFVZWhaRGZBK1E9PSIsIm1hYyI6IjdhODgyZjA5NjcxMzFkZmMyOTVkNTQ0NjEzODA4YzFkYWZlMDg4MDkyN2NkNjI2NjdhOWZkN2FhZWEyMGMyYzEifQ==', 'eyJpdiI6IlU2YnlNci9xSkNvZjhDemFDTFNLbGc9PSIsInZhbHVlIjoiTEEwM2pNUWU4VXM3cjlxMzZPejBJQjh3RFBBOWJMMUVQVlZjZm1mY0VsWWN4dEpkUTVVenFNQnB4bHhCalEyMFFvT0hEUklBc3pVMzZJNENjYllXNmZ4UzBwYVNJUnZRTzFIc0hTYzRxQ2FTVW1JQU9Zdy9KL0tTOWR4M0hPS3hSNTFuZmpVSWFBV1FMcHY4N3N5SXREakZSMFVmZy9lYTlObGJ3R3RVRGx3PSIsIm1hYyI6ImIwZjVmMTdkY2VkMmVhNmUzYzYwNmUwNzgzYjU4MjRlZWEzNmYwOTkxYmZmMjcwYmExYzg5OWNmODc2YWUxNTgifQ==', '2020-08-15 00:22:12', '2020-08-15 00:22:12'),
	(6, 'eyJpdiI6IkdTOVlIN0JhVmR2VDFYdldGMjIyZ2c9PSIsInZhbHVlIjoiMWJmOWtjM3grOEI0ZG5GbXRDOVM3aGw5RUJlNGZaYUtNUWxtWDBkQWhTOD0iLCJtYWMiOiJiMjE2ZDJiYzkxYmFkMWYyYjkyMzk4ZDI4ZDlhZTMxZWQwYmZlNDk5OWEyZDg3MDVhMjcyNDMxMzNiYTgyZDE2In0=', 'eyJpdiI6ImdOSnhkbnNZaWlnZXJFUTBZVjhUWFE9PSIsInZhbHVlIjoiQjE0ZzliNHFneThISG9aeXp0NTlHV3RZWFpnVDJmNzEzSy84bVZVYzloYz0iLCJtYWMiOiI4MWI1ZDRjNTZjM2U0ZjZmMTJmZTQzMGIzMGNhMzZhMzQzODc3Yjc2OTJmMjliOTg4ZDMyMzgwZjQzODZlMDA1In0=', 'eyJpdiI6InliMUplNFAwK1dxWjN5U0FpWlZsanc9PSIsInZhbHVlIjoidFdsMUtWYm5VRnAvYmVqM3dQbi83U2ZVTis3QlJFZDZkR0lReHVGWnNPOW53eVpvWVRjOWZHbXQrMHdtUm5sbTJkc0VJbVJNQTdxWmhHaFNWZkdtWnc9PSIsIm1hYyI6IjIzYmFjNGFiOGZhODk0M2U2NmMyYThkYTdmZDJhZWJkMTUzN2ZlZDI0OGJlYjcwYzZiMWU4MDRmZTIwMjY2MzAifQ==', 'eyJpdiI6IitTUmVLN2k1T1NIVGFEejNvdWVQenc9PSIsInZhbHVlIjoiNEZlTHNpMEJCTlZNQlNOTGYyU011R0dGZnF4Myt5cjRQQ295c2dJdEVIK3ZveVJuR29LL2tETjlqQ3JQSXBKbHJXVXFuVTkrSDEwS1B4LzhXZkFKODY1WU4rZW9QbjdrUDEvS3JsV3ljaUwwNW9mNTVYcTlhc21VakhIUTRhd3BjYXhiNytxRWo2QUpIYnh1bThDM251ZWdxeHpVMWlrWi9PTm9vUUxkV20renRGWWEvSzdJTFU2UXVmYUVNaDl6IiwibWFjIjoiZTQ5MzlmYjk0YzA2MWFmZGI4ODkxZmIzMWM2NGQxMjkxMjQ3ZDQzYjkwYWM5NTJiYTRlMWMxOWE1OTE0NTUxZCJ9', '2020-08-15 01:06:34', '2020-08-15 01:06:34'),
	(7, 'eyJpdiI6ImNLSURQRUpOZjB1S0tpTEt6cFhrQXc9PSIsInZhbHVlIjoiOTRidXlVTFdVUmZ5NGQ4Q29MM3YxZkRkZ0tTWHo1VzJsay96ZW5aWjgrVT0iLCJtYWMiOiJhMDEwNDY3ZmE1ZTIyZGQ3MTU3MWJlNzA1NTZkMjg3OGI0OTgwMDVmMWZhNDJiNTgwMzJiNTYwZTg2MzJjODU5In0=', 'eyJpdiI6IndpcnIzNUdmeTNJbjQrRkloNTFSNGc9PSIsInZhbHVlIjoiTDV0NmwveldqanZKUTRVTDQyZUdRL0Y1OTIzTjBOZVg0SytsYXdFZ3lEZz0iLCJtYWMiOiJlOGE2ODA1MDAyY2Q5NmE0YzJjM2ExODdjYzE2MjU5ZjcyNjcwMDdmZWVjZWUwODFhZDNlZDZhNWJjMzZmMDVjIn0=', 'eyJpdiI6ImQ4UW9aMVBOOFRFSk5TRXFGeXdEY3c9PSIsInZhbHVlIjoiUFQ0ZXZYYlRpSmZQS1pDRWFKSVp6K0diTHRLR0wxeDJCSUNBc3FmWUwvcEE3UHg0bDdYWkZlMDk4dnM3TWdVU21TMXNSbW16K2FFSHFkU3YvRHZlT1E9PSIsIm1hYyI6ImM1YjcyM2U4ZGUwMmFiNThlOTZkMjNmODQ3M2IyOTkzMjYzMDI0YjAwZjg4ZDlmMjZlMjI2NjE4MDhiZTVlYjYifQ==', 'eyJpdiI6InpjdlhuekdOMzVhRE4rUEI2QjVRakE9PSIsInZhbHVlIjoiZUZxR0hwNjE3a1U3S3dSQTB1alVobEhqSzhQWGp3RnJsZ0VNQWovTTJpK1FTMkJHRUV2TEpkbWpOYm5hSmJFenpzUkZnbFFYV0tWZTlkV1FwZWFHb3NVRHJhUkVtdWQvMWVLcDB0ZmpWME00S3cwMk0yRWUyOHRST3hwazlNUU1namU3Zm42ZUFlOHliZExrYlFUWFBLT2dNUTQxeEJSY09MLzNmRVByTlNaQllTczM0ckNrQjVKc1hMZ3M2eGNDIiwibWFjIjoiYjJkOTkzNjdkMjg3MzgzYmEyMDk3Zjc3MTY0ODYxNzljM2YxOWY4ZWQyZGU1ZDIwMDBmMGM0YTM5YjdiNmZhNCJ9', '2020-08-15 01:06:38', '2020-08-15 01:06:38'),
	(8, 'eyJpdiI6IkZXb2VEQWJjdERScXpDMk1rM2RZZGc9PSIsInZhbHVlIjoiM3VxdEQ1S0w0WVlzQ0NrUXl5OWlJdk1xZXNwdkV2V3RkOFZSLzRsWXVIND0iLCJtYWMiOiI2YzNlYTc1OWY5Nzg5NGYwZjk1NzUyYjdmZmRhNjVjMWVlMGI4YWY1OTJhNjNiZTVkZTkyYzFiMmU0ZjY5ZDEyIn0=', 'eyJpdiI6InAxZ2JmVFU4MldsQWJQbmhsaVZUcXc9PSIsInZhbHVlIjoiQkxLdEI5R20vWWpFMEp0cGVSaXVpZzRRVEthaTF0eW84UXVaQkdmbnZoTT0iLCJtYWMiOiI2NTU4OGIwOTk3OGM3OTU1NTUwZjdiMzFiMTU1MmIxM2EwMDNhZWRiZDA4MGFjZGE4MjE3ZTc3NzFjY2JmN2E2In0=', 'eyJpdiI6IklMV0w4WnpERTNHVGh5WE9mc1NLTUE9PSIsInZhbHVlIjoiKy9kRXdVZWtEdjNiRzJ5MVA4WXdHenlEWXY2RkR1T1RpYmxlUWo1NVRpTTVpRDE5YnhMSjdPTzN5eUZPT1JZVnhVRGlxeEMzTm9WbUVNVHZEYlg1SHc9PSIsIm1hYyI6IjJlZDY0ZjNmZjM2ZjQxODA3YmE5YzY4NzExMjk1Y2ZkYTQ3ZDU4YjlmYTliZWY4NDZjNWQ5NjFkNTU3ODliOGIifQ==', 'eyJpdiI6IlowYXQ3enFuV3VVMndUYmlvcWpXTnc9PSIsInZhbHVlIjoib0M3elFKZktDNGlnK05nZ1pDd3FpLzVVNnoydVZvMFVDRVNWSEl6clBTcjZIL1FHbEtOcmV5cmM3aGhjQlh1TEZDcklUOUZVL1RsN29VeStuM2V5UmtPaks0Q090bUMwUkVvRElaeXBvRXFyOTFCdHloNlk1UjU3T2s3eE9mNlhOTnprWXZxT0ZaeU1wOWluOGd2eVlxZURnRlpNNE4zam1ZckNHbnoxN0VXdDZiR29lYktMam91dHo4aDlCZkdrZmt3V0VHSTV3NUs5bGpROUFBZGFFdz09IiwibWFjIjoiNDA4NDJiZjdmOWFlYWE2ZmE4MWZlMzNiMTg1MDE0NGEwOGNhNjk4ODBhZjFiZjhiYWVmNzRlZjJkYjEwMGNiZSJ9', '2020-08-15 01:07:12', '2020-08-15 01:07:12'),
	(9, 'eyJpdiI6InA2UU85S21PMW5Ea1RkckFCT1NMdlE9PSIsInZhbHVlIjoiUUFwMXE4bEZLeTFkNWptYUxxWmYzc1Ayc25ZQ3VRQXBOSjFXK3R1MnR0ST0iLCJtYWMiOiI2ZDFjNjQ3NjIzMjAwNzFjMTYzOGVkZGQ0YjhjMTJkMGIwN2Q1MGI1NGMzNzc3ODg5NzAwNmQ5ZWYwMzFjMjZhIn0=', 'eyJpdiI6IlJRTTA0WDlXdTMwWmZXY2J5eG5oL3c9PSIsInZhbHVlIjoiRFdEd0gwUmwyU2hxdlZiMFI3NklCbXh5R2dGQXJad05tV2FPZ3hxYVU2ND0iLCJtYWMiOiIwYWYyYjI0MDMxOGYyYjRjY2NhNWNhMDY1Y2FkNjNmYTViNzI4ZWM2ZTFjZTkxNjM4OWQwNWU0NTQ3ZDNlM2U4In0=', 'eyJpdiI6Im9FeDlSSHo2RHhOVnlYWVc2Z1FkSWc9PSIsInZhbHVlIjoiSWtxdlk0NUdZNmpwWHIwMDRTWDRzTDRqM3FUY2VLQXVhL2U2QStZcHBTWGFhZ2diWUJNWFlWeXVKZFFacUFkMVBvTVoweWhjdFo5a2daWEYweFpMM0E9PSIsIm1hYyI6IjIzYjEzN2Q2NzRkMjk3NjU2MjZlMTBlMWQxMGUzN2UwNTEyYTJhZjE2Y2VhNDkyMzEwMGQ1YzVmN2ZiN2Y2MzEifQ==', 'eyJpdiI6IjNDbU1oUEtKZVJhUHhRY0hVbWlHSGc9PSIsInZhbHVlIjoiaTVsNGZCTnN1dzJnZXdDTXN0eVhZL1grOGh1ZGtrWHluNmJYbDdPVVZ2NXVZQzYwMndrdEg0SVl6V2ZRYWorVzZNcU5iY1BrQlFuTll6ek5aVU5TejRHQjdFaHVWRXFvVzhuVTRMWmtKc2RZS3ZKUjZlNXRiMmZXTmFhTmJXMVJTYkhSVzBjdzJMbFF1YWhkSEdKNzgzMGUxMnpHcXVzdzFybERuRmk4YWhScU1XZUVZUlBvNHNuRktPbmZ6K3NWY1M0L1ZyK3YwN0M5bTRNRXRsbVFuamN0RUIzZnY5M1pzSjFMZXdGaUxQNUc4YklEWGw5aE9ZSjRrKzRTSEZEay9oQktaYlExQ1AyNDMzaWw3QlhQV0toZDlxeEI2QnN0OVJGRVFZbDV2UmxIMHF1V3ErQjBtVEltOVBpY2VrdHJXOHVtend5YWViNVFpUGpiRytHc0VJM2xFdkVDKy9rQzZhb3N1N1NKTVgvc3lQYXlheFBhai9PVmZLWGpEV1h4ZTZHeUdncnRRV05yeXNMNlM2MGZJZz09IiwibWFjIjoiNjYzZjcwYjQ0YmVlNGI1YjUyZTQ2NDNkMjlmZGVkOGRjM2MyNDQ1NzU3M2FiYTM3NjU5YTdlMzVmZGQ4NGFlYSJ9', '2020-08-15 01:35:12', '2020-08-15 01:35:12'),
	(10, 'eyJpdiI6ImtabUxrVmwrTll5akY2SU01cFVLanc9PSIsInZhbHVlIjoiVmxVOHNZVEpoQnljRVRTdGkwdVVXR25qaERWdGxmNUpQN1d1QjNFejJQRT0iLCJtYWMiOiIxNjRmNmExMzZlMjEwYjAzMmRhYjczYjM3YTAyOTdkNDdiMDNkNzU1NWRmM2U5OWQxZWNkNmRmODI2NTFmZjQ1In0=', 'eyJpdiI6IjhqaU5ER2pFY2M0cGdDWUJBR2k4VXc9PSIsInZhbHVlIjoiZW5NQVBkMDVGQ0NabUVCSnJGcEozVVFPSXk2OGFiczdFb21VeTFjdldUdz0iLCJtYWMiOiI4MzI0ZDVmYjBkZDYyY2M0ZDk0N2NhMGI1ODczODRjYWIwMWYwOGY5NTVkZmVkZTYwN2JjMjkzMzY5ODIxOTc3In0=', 'eyJpdiI6ImFIMzIvMTNZajJsYlU5aCtHT2hhRXc9PSIsInZhbHVlIjoiZTc1MnBWWWJ1R0VNbDN6RGNtZmE3NmRhMmxZblJGOUwyN3ZoaElFbHV1eGpoOEFqQUpCVUN2a0pDQzJKODNYTzRISkIreXpna3hSNnRIR3BaK2FhZFE9PSIsIm1hYyI6ImVhYzM4YzAzNTRjZWQyMjIwZjkyOWU5NGVhMjQ5Njg3ZjQ1ZTk0Nzk1NTk2ZWY0MzNlYWIzYmMwYTM5MDFhMDgifQ==', 'eyJpdiI6Imk1WXhieWZkaXhleTI1VFdYekRiN0E9PSIsInZhbHVlIjoiczk2MG5iSjRQY2QzcWREQTNXTWlmQW1BVFcwMmdPVjlxdVBwV2w5UEVuallZMU9xYzdFelVxSzJhNnk0R0dEMVRiSEdobTExSTZxVkp1QWxFZExGdE5BSXVtV3V3T1I0UnM4S0FRVHJoaHJIalR3S3l6SnpxU2JUdlBnNGQ4T0U0d2FoTjlmVEhoekxNdEpBMlRqY3Q4UnRhNlI4eEN3ay92WlNIR3Jrd0EyL2J3c2RDZ1ZLZ3UwZ1pUQlhhWXh4RVZqSSttNjJ3OExuUWthbm5LUFRQRFppZ1o5cnE1THdaMlErY0RzMzN1bz0iLCJtYWMiOiI5MmE2ZTFjZWVjMTZkODAxYjdkYWM3YWJhYWIzYmQ4MGVlNDNjNTRlMjZiNzJlM2UyNjhlNTMxMTNjOTcxYjI0In0=', '2020-08-15 01:45:23', '2020-08-15 01:45:23'),
	(11, 'eyJpdiI6Imtzd1dmODQ0THk2YVlYMTNWSDNjTFE9PSIsInZhbHVlIjoiT3ZmOWd1QzJNaXk1YWxKRSsvbjl5c3Eyc00wZzYrbGxzVWZSN1o2NTBJTT0iLCJtYWMiOiJkZDBiODBlYjM5ZjI5Njg2ODBlZGQ3ZjVjOTM1MWIzN2MzOTc3NTY3ZGIxYmYwMGYyZTIyZTUwNDE5MDBkMGFjIn0=', 'eyJpdiI6Ikd1NG1RQzYyaC9ya1c5cEVGY1picFE9PSIsInZhbHVlIjoidGdXVTZ1VFVkcmEwTk1NOE0xNzcvM0MyRVZ0emdlVCtPZE0yckRVdndaOD0iLCJtYWMiOiJkNWJiYWM5ZjhhODQzZTFhYmZmZmNhNTdlMTUyN2JhYTMxNjliYWRiZThhMGM5YzMzMjZhZjU4OWI5NWE4MDU4In0=', 'eyJpdiI6IkVleHd5c0pTNC9sS1NTZWtmWXhZalE9PSIsInZhbHVlIjoib2FoRVhaVTI0aU4wdmFkY1BIaVZkZlNFbTA5MTRtK0R2T09IUk5LRlNhY3lwQ3pnMzQyWkNBV3VGOWlVREpVdFdDbVBFcnIvTms3SHZDTXpTRzJBblE9PSIsIm1hYyI6IjhkZmZlNmU0YWJmMTBmY2JiNTQ5MGE4MGNiZDBiNjEwYmUzY2JkMTc4NzQyZGQwOGI4YWU3OWQ4YmFjZjMxYzgifQ==', 'eyJpdiI6IlJUNU9CMHpZODc3cXorYjI1YmluSHc9PSIsInZhbHVlIjoiUFp1cEtTcEFHYU10eWk5aE9SNHNnU3h6UDc0SngrYVJjVjdodStQR28rbGs2UjdXWThIdjlvd1o0cGhuOVVYT2pFYXNydjVjcXFLcENLb2VwRjRhNmUySFI3bTFsRlFlUHRPWXF2T21yZEgxL3Z6azkzZzB5d2N3aytBWVcrL0lFVmZZQkFNK05pdy9iVGI0ZzJPTkREaFEyL0REYUlGM29zY2QzOEVJWE1kYzljNkkyWXBMMzZEYnVlK0NWWjBMY3FuSkhhTnFFNUkzQmk0cTBLaXhzZzluRHdkZlpSMW5rRFc4NjdaOEhTWT0iLCJtYWMiOiIxYTE3NGI5MmRjMjhiM2IwZTQ4NDUxNDQyZjJkMTc1NDNmNmQwYjg5NjY5NmU2MjVlMzY0ODhkZWRmZGQ2MGM1In0=', '2020-08-15 01:45:43', '2020-08-15 01:45:43'),
	(12, 'eyJpdiI6IlRBL0ZOY0xTcExQNEVZQmpRd09IMmc9PSIsInZhbHVlIjoiMDRqeDZSMWZpbDltY3A5SG5uT1RaM0RheTFMK0pIeHZNL0U4V0U1K1JjYz0iLCJtYWMiOiIwZjBjMjg1OGI0NDczMWY2NTUzNGJhY2E1ZjhkMDg2MzQxZjNkZTgzMTJhYmZkNDBkMGJlYzM0MTllNThhNjhmIn0=', 'eyJpdiI6IkFMbytRN2tnOUd0TlhLYnRSeVJhN1E9PSIsInZhbHVlIjoiRlY0ckJPbWtSWEhveG9lOStvWjlWMHp2c21SWEZaUXA0c0pGekVITzNRbz0iLCJtYWMiOiJhMjhlNjcwMTk5OWY5NjQ4ZTkxYzdlZmM4YTkzYzBiNDU4NjE2YWZlOTI3MTIzODdjNTJiZDI1MWQxZjBiODI4In0=', 'eyJpdiI6Ik44aUIxWmtsdTd2bkJnR2VwV3NTc1E9PSIsInZhbHVlIjoibWdidTl6eVdhZTRJMGpFVXVLelN3d0xsK1IrZWJnNUpVcmhYYTlwMHpOeVhhQmZGUGwzdDFwT0x5SklzanAweGM4b2FLNTRmb2lKclhNWkZnSWNEUEE9PSIsIm1hYyI6ImVlYmM0NmI4MGZkMmZhMTVlYWJiNWQ1NGY2ZWQ4MDllYjlkZmMxNTdkNDZhMGYzY2E0ZTczZGFiZjgxZTUxYzAifQ==', 'eyJpdiI6IjBnZlgzdUs2Ynl3YUZaYmZscnJDSHc9PSIsInZhbHVlIjoiKzRueDRnSEQwMDRkRi9pUFh1czc4QmVXVnlxNVFaRWtPQXVnazBNaVVWT0hsdzlRak8rclV6Yitueldud09SV24yQUc4M2Y1RjZwM3hzK0cvZ2F2MHlpM0plcVdhbmFTUEZOdnFzTGt6OUhtTGswei9KeUJjNFM4YjdPRy9vK2wra2FYckVJOHNpZTFTUGYxN01vSktiQ3orQUt5MUFEK0ZDUDVkQTZYR3ZJOFM5KzlaQ2ppYlBKSWlvN0Q0bkdrSDF0eTYzNEdpMTIvUlNONGZaT1Y5MlNhRXZHSms4TkVsSjhFYnZ1RlZDZz0iLCJtYWMiOiIxMTNjZTg4ODYxN2U0NWM4M2RmNjQyZjA4ODcyMmIxZjI2ZWU5OWEyMThjNmRhZGM3MzNiNDUyZWI1N2M2MTFkIn0=', '2020-08-15 01:49:39', '2020-08-15 01:49:39'),
	(13, 'eyJpdiI6ImdUSVVtVTlJYXVWTytlWk9iNS9oMnc9PSIsInZhbHVlIjoiaHlnczZ3Q1dTc2VuQllCMk44UFlFT2J5SjVaZytkWWJESWhwa1ZyU1MxWT0iLCJtYWMiOiJmZThkY2JjZGEzZTkzNzg4MjllMDMxNjkwZDg3NzUyNGJiZGFkNDVkYjRkMzRmNmIwNmRiNGI2MjIwNGZjNjZjIn0=', 'eyJpdiI6Imxvd0RMTjBYc04yUGdHdmRoZ1M0WEE9PSIsInZhbHVlIjoiV21aVnk5aDVPdktQNDdWbndVUkt3SE9YR2hQQkZpMXo2Z0dESklNbWU4bz0iLCJtYWMiOiIzMjM1MTk3NWI4YzRiMWE4N2QyZTBiNDZmNTU0OWI3OWMxZGExNDZkNzYwODRhMTgyYjBjZGRhZGMyMWUzYjE0In0=', 'eyJpdiI6InVKenpUcFZabVZRenpVZ3lXSVdaOGc9PSIsInZhbHVlIjoiS09iQk0vRnhOSWY1cTdMeWlhZ01VNW9MRFRNKzJRQzVlUGZQT0VTeFpDNVRrVUYrcHRFbWd3Vjlabkp2NVJxUmlBbllNMG5NU1FqQjFxeWRRVmlMSnc9PSIsIm1hYyI6ImY2YTExODhmNzhkOWUwZmU3OTliMGM4YTBiMmI3OGFkMTE3ZWIzOTVmYjdhMDUzZTA2MmVmOGZiZTVlZmFjYWIifQ==', 'eyJpdiI6IjlwSllUdjlTbG9MZk0xK3M0eENWSXc9PSIsInZhbHVlIjoiVitLYldaOXdFbjRTOG4rYi9ETUpWU3Z3VjM5Yi9idHRxa25qRkhpU2xtNk5IZ0srK3N5bFAvVUZWY1VJVDc3aHRiRVQrR2tnSWp6MTQxcE9laEtNVHh2Sjk5R2hCOFc0Z29oaFJTWFV4UG5XbEM0S3NiakZlYlJtMktKKzVrWHhTVUpiRlBpTmhmUGZkTWZXb3VjRVVyQkl1cEZ6c1BDWnBZcWx6OVBjVlJLcG40RFQ0YlArUEdhcGhrREFsNDgrUkZlRzYvN1A2NHkvejJlNEU0amUwSkRucXFRZlpMek0veXN4ZXp0WE9Zcz0iLCJtYWMiOiJjYTUxNjM3YjFkMDg0ZTk5NDk5NTRjYjU3MGIyOTY4NzJhODFhYjc0YzhjNjE1OGNkNTZkZmNjZGFmOTQ3NzMxIn0=', '2020-08-15 01:50:17', '2020-08-15 01:50:17'),
	(14, 'eyJpdiI6ImMvS2RNcWxNeVVlVmFoMEdrVE5LRnc9PSIsInZhbHVlIjoic3ZwMDgyVjV2RlQ0TEJWSUhTZ2doVUdRYnI0QmlmMVhJS29hcXdSaHNtbz0iLCJtYWMiOiI1YTBiNmVmMWQzM2QxZmMwZWIwZTQ4ZDAwNjRiZDcyZmMwZGMwYjc2ZWI0OGIxMWU0MTRiNjc2OGMwMzhmZTQ4In0=', 'eyJpdiI6ImFZT1gzZjEzNW5yY25BTHdMdlh4Nmc9PSIsInZhbHVlIjoibkJpL1ZjTzMrZGJQdmFKR0d5ZlNadXJXeFNhMWZhNU5pZFJwUDhzRXlWcz0iLCJtYWMiOiI4ZWIzZTA1NzRhYTZjN2NlMWNjMjU0OTA0ZjJiODdjNzEwYWJkZDllZDQ3NWY0MjcwMzJmZjUxMWUzMjgzN2Q1In0=', 'eyJpdiI6ImV1L21hSlh2STFwS2wxS1FXNCtTbVE9PSIsInZhbHVlIjoiYlh0aEVKQzRCdC9oNk5LOVlncW1kaW15L3RjZ21vR1FYY1FIaTFiQnJjNjk3WHA1aTBIRzlRRW8rcis1bmpRbUdqc0tpdUFYSC9DckNSMGxXVjgzTEE9PSIsIm1hYyI6ImRkNzI0YWMxZjAyMTFlYzNiMzY2Yzk0ZTQyZmJjNDAyNGE0YjgyMDQ1ZDdhMDBlMzRkNGNhOGY2NDk0ZWZkZTUifQ==', 'eyJpdiI6ImJKREVlK3NyQU1RYkttV3RXUmlFdnc9PSIsInZhbHVlIjoiS3E5MkRNWUxOejlWS1VhRVcxcmxOTHhXVndkT0VyTWcxS3lxQlRDMERHdTN1Z3NPTkwzUHQ5aWhOSjZPYlJhbDAraUVYYnIvVGcxVzZrQ293ejZOdUkrUVNkWStRb2RsQk9wZVNpbE8vaHhjZzJHTkcweXM5TGdIclJNYmtvNWxacVZZRlNsQUcxaDNlQnNZNm0wWS8yV3J6N1lGTDExeVVHbjFsblN3d1BNWWxxQ1h3SEtpbG9RWHlYWnhUdG5MIiwibWFjIjoiNDlhMWZhMzQwYmQ1YjQzZmE3YWViODNjODIwMmNkZjA4ZGM3MDkyNTJjYWY0Nzc2NzNlYjVlZDFjMTJmZGNhOCJ9', '2020-08-15 02:31:02', '2020-08-15 02:31:02'),
	(15, 'eyJpdiI6IlBnQzFFcnBKcHhSUytNbmdmeFZRQmc9PSIsInZhbHVlIjoiOE42R1d6aGswLzh6RHlxUUREaFhZeEgvV09FbnVscjF2NVNHbUhGN3kwTT0iLCJtYWMiOiIzY2IyZjgzZjVkMGFhOTYxMWNjMGQzY2U2NzMzMDMxYTQzOWU5YmYyY2M1OTI5YzE4MWYyYTljMDc1ZmZiNDA1In0=', 'eyJpdiI6ImJiTkVEQkY2cUlHSVRaaEE4UVdEN3c9PSIsInZhbHVlIjoiUG5Wa2ZKK0g3TFJxVzdkT1dSM2p5cXZ5UE1maEV0ZDEydldneExPeGRwUT0iLCJtYWMiOiI0YjFiMzAyMTA0MDFiYjczMDUxYmRkYTFjYTFmYzA5MDJmNjIyODFiNTVhNmIyNzczZjFhODNmNDQ1ZjE0N2JhIn0=', 'eyJpdiI6Inhaa2xSU3R4RWN6bVJkUDliQWtVUWc9PSIsInZhbHVlIjoibWN4cGlCUENyQUhpM1dNNlkwek51cVhJaDhQVGMzaDg0N3MwSEtINmFpS2JzZW1hb0szNE1nOTZCaFZQbjE2bVZkZ043OWZ6am1aNThxVitpbU44Qnc9PSIsIm1hYyI6ImI5ZTQ3Yzk0ODE5YzQ3MDIyZDY5NzQ4MzNhYzg3YjVlYzZjMTZiN2I0YzQxMzRiMThmMGQ1ZDhmNTE4MWY1OGQifQ==', 'eyJpdiI6Im14TkdsM0NQK2VrU3NsZTJSSDdZN3c9PSIsInZhbHVlIjoiWmZudG1TY2ZobTN3U1VlTFBTOEk1WFlGY0ZJb3pUOEJqVTIzN3FxVEFlemIveDgrZXFjUHZJM0hQak5pcndOWW5FZjFJVXV5QUw1c2NHQUNXMmlRTmZuelNiZnlad3UyYTdSanhmbHdxYWFWdVNYRnZZTzJKWEJWUlVRcHIvZjJaMzd0OGhMQXVuUGJJbUEycGpZQnNkdXdxaENnSkZ4aTI2dE0yKzVrSE1OVGo2UmRkdFk5K29CNTdBNnlwY3VTIiwibWFjIjoiNGViNDc2YjUxMGUwM2I1NDRkMmIyYTNlYzdjNzliMThkYjA0ZTEyYzc4YzI5MmU2N2EwZWExOGExOTQ3NWQ1YSJ9', '2020-08-15 02:31:05', '2020-08-15 02:31:05'),
	(16, 'eyJpdiI6ImJPOFZGWmZBYW1aUGRWb2EyNm9HU2c9PSIsInZhbHVlIjoieU45K1QxaXhuamdMR0xsSUdkK3Rkdz09IiwibWFjIjoiZDgwYTY2NDZkYjUxNjI0OGJjMWYyZjIyYzA0M2FhZWNjYTBiZmRmNzcyMTM5MzFkZWNhMjg1NjVmODk5YTcwNiJ9', 'eyJpdiI6ImN5TmlpQ3h4eUc0UkxnaGxodzJmTVE9PSIsInZhbHVlIjoiZ2pibzV3dklLQ3M3ZzhnVDBKalVCZDBNNVJCUEI2a1J5U1plTkxFVXQ3cz0iLCJtYWMiOiIwZDk2YWYyNDdmM2UyZDk1YmQ3ZmEzMTM5NTIzZDY1MWVmMThkODAzYzExNmNhMzAyYWRlZTQ3ZTFhZjMwMjM0In0=', 'eyJpdiI6ImFBN0NqN2hEY25VbTQ4YTdIRzFvUmc9PSIsInZhbHVlIjoiYVZrMjR1NkJkTnY2MFdTYUl1enp1Wkt6cU1Ua09icElHUUdtNWRMQUNWOWtRREV5MWJUVTBpZVpSVEplcWxSdEFGdDcxbklRWFNKRTVCRGsyY0NENVE9PSIsIm1hYyI6ImU0YTA1MGE3MjM1YmY2YzcxNTVjMTM2YTQ5OWNmZTM2ODlhYjhkNDNlOGI3MTAyNmNjNmQ4MTU2NjM1NzVmNjYifQ==', 'eyJpdiI6IlRaVEtaRHNNTko3WnQ2MHUwNU0wOHc9PSIsInZhbHVlIjoiMzRnOXpZb0JYY0d6TzJrMWJUM2lZYjdBL2JCalp3U3YzaGR2eCtTbkpFZz0iLCJtYWMiOiI0YWZmMjJjMTdhY2MyMzcxMGUxMDk2ZjMwYWIzMGQ2NDA3NmI0ZGIxOTYyY2Q3NDkxYzA5NGQ0NjRhMjk2Y2NmIn0=', '2020-08-15 18:22:40', '2020-08-15 18:22:40'),
	(17, 'eyJpdiI6InVYdmMwVGZGemFiR0xBbDJST1lLK2c9PSIsInZhbHVlIjoiUW1pU0Fia3RUTzlWY3BIQy9NU1JyQT09IiwibWFjIjoiYTg4MmYxMmYwYTkwNzUzY2YxM2NlZWJiMmRiNDc4ZDRmNTMxNDNmMzllY2UyMTE2NzhmZTE1NGE4Yjg2OWY3NCJ9', 'eyJpdiI6ImppeUFtcVpwV2o3Zy9PWXJYNEdMWVE9PSIsInZhbHVlIjoiV3pIMDZpVitEaHdPcmxpMzc1VzZnRUd3eCtDOUFZTHB4Tlc4MUV3VXZXND0iLCJtYWMiOiIyODcxNDVkMDg2NWNhNjEzOGE5ZTlhYjRkMTk5MDAxMjY5NDhmMTRkNWUwZmYxYzRmZTc2MGRmZWI5ZGExNDM0In0=', 'eyJpdiI6InRuZGh5VTZPQmFvOVhRQnNKd21rOFE9PSIsInZhbHVlIjoiS3pIcnJobWw5M3FJV3VDNmFITitWTGJQRkhyUG9xZzhNVHNlQUJQRHl0U1VxWVk0WWpvVmIxbzBEdzl6TVZGZTVpd3BlbmZ2a2NtcWx1aEdtRHk2NUE9PSIsIm1hYyI6ImI1YmU2YTg3ZjJmYjZiZjAwZmRlY2M1NGUxMzk4OGE4YWFkYjViMzhmYWVkOTNkYmE5ZjcxZDhmNWI1ODM1NDMifQ==', 'eyJpdiI6IkxFeHpTS3lGaXo3WnM4QUFkNUNndGc9PSIsInZhbHVlIjoiNmUxeklYRHcrWUozVmkwdFVzUjdKUTZSc0EyRisyRXR3eXhtRDIyZURFaz0iLCJtYWMiOiJlMjYxMTc1NWU3ZGQ5YzVlMDI2NWUxYzlkODEyNjdiODBmODlmY2NiNDc5ODcwYWM4NzY4OWY0ODRkNGM5MWQwIn0=', '2020-08-16 10:52:20', '2020-08-16 10:52:20'),
	(18, 'eyJpdiI6ImFDTzhTcTVxY2Z1cjRvSVY2aVhiY1E9PSIsInZhbHVlIjoiSzIvbGNEYTJRQlIvTjM3OTYzODJpU09Ra3FZdjQ5NkhSWEpZK2VKK2ZKbz0iLCJtYWMiOiJmZGY5ZTI4ZWM3OTVjYmJhOTFhOWMxN2ZlMmEwZTkzYWQyZTk4MzU4MTAxYzUzM2UwZGYwNjE1YzdiMmVjOTJjIn0=', 'eyJpdiI6IkQ0cEEyNktTUHFHOTFXb3ZLdVZjK1E9PSIsInZhbHVlIjoiQzdsbkxONHZWTDJueUZYTHgvQTc1OFJBRjhwaEVQWXFkVzFzSExJLzhxWT0iLCJtYWMiOiJiMTdhMmIwNDZiNzBhMTBiN2Y5ZTkxOWEwMmM2MzQ1NDEzN2RlYTM2NmUwOTAxNGIxNGU2OThkNTM3M2Q3NTkwIn0=', 'eyJpdiI6Im9QVzlDSERxanpRRHdua1pZTzBjQ3c9PSIsInZhbHVlIjoiaXVvY2VGaDRpZHlUU2YvT1Z5YTNQaWdia2hCZW1PSldHb1kzTnR2bUVTaWp3R0ZBektVem16YzBxSDRjSE1qQUkzNDV6QlJKbDZORE5ZU2Yrb3NjT0E9PSIsIm1hYyI6Ijg0YzU1NTY5MjBkNmIyNDIzZGJhNDIyNDhhNTViNjMzZTE1ODJiY2FjZjU1ZmZjNDFkYzBmNDY5NmViNzhiZmQifQ==', 'eyJpdiI6IlFBcVIxRi9nUm00S3FOMWhpUnlLdFE9PSIsInZhbHVlIjoiZGRNOEVmVHozRFp2OCt3c0xES0lSekw4ZEJEOVVwdFlsSU1UK3FuV3FmND0iLCJtYWMiOiI3ZDJiZmFjZGUxNGExMTE2MWM0ODA3ODZkNTJhODI3MmEwODNjZWYzZjNjMTNiNTVlYTFlNTY0ZmYwODg5NTU2In0=', '2020-08-16 10:52:52', '2020-08-16 10:52:52'),
	(19, 'eyJpdiI6Ik52L3EzLzltem4yK0J3NlQ4aFlQeFE9PSIsInZhbHVlIjoicEU5TjBsYWQxQUtCRkx6d1lPMk16WGRzUzdWV0s0T2l3eFM0TURGOEJKMD0iLCJtYWMiOiI5MGZkZTAzZDM1NTFiMjEyZTcxODE0ZTc5ZmJhNDczMzk5MGNiMTUzNDA5OWRjODg0YjcxOTE2MWE2ZGUzMmQzIn0=', 'eyJpdiI6IlRORWhtbTFsVlduaEw3V0dFcW54VFE9PSIsInZhbHVlIjoidERoZ0Q4SWtTcFBza1YvQ1YxWGFzZVZOWUlYY3YxVmo1djVPaWxkMEQ0Yz0iLCJtYWMiOiIxYjA3NTIzNzU0MTAwOWVlZWZmMmYwYTU2ZmQ3NmUxN2U1NjZkMmZhZjhkYTA5YzFkNzM0MmExNmM1NmY3OGIzIn0=', 'eyJpdiI6InJPMDZFZ2E5enQvNFB2ZmRnQkh1a3c9PSIsInZhbHVlIjoibDZVNXpyb0ZwY3RTdlVEYW4rbkxwNVFBZUtKckt4aUlCWk0wUDQzbmxUc1FLdmtsanhqbldwdHNheUYrcElFQ1h6aFc0NmJlZUlobjlVYjQyd1hqK3c9PSIsIm1hYyI6IjFmYTA2MTdhNTllMGFkYTRlNjViNDM0YzNkMjJmN2VmMzcyYjZjM2NjOTA4MzExMjEyNTcwOGFjZTMyMmJlM2IifQ==', 'eyJpdiI6ImdDaEE2Qi9WRWlrNlBxciswVkk0cEE9PSIsInZhbHVlIjoiSzc4RWU2Ri9jRHh5c2lQZyt2MHMwUEU2SzZkaFNodERlaXZQazRJR1lkQT0iLCJtYWMiOiIzNjhkYWQ1MGEyMDE1OWU1OWQ4NzhhY2NhZWE2MGUxOWUzYTQ5MTcyOTU3ODU1Yjk4MzU0MzUxNDczOTY2YjQ1In0=', '2020-08-16 10:52:59', '2020-08-16 10:52:59'),
	(20, 'eyJpdiI6InRkM3pSb0RzM0VyZmV5SW85Rlo1S1E9PSIsInZhbHVlIjoiS2dFRG9RbDh2RlJWdjcxeEJwNU1kNGFWbytqQkE4OUJMNmFPZnlrdFZSND0iLCJtYWMiOiI3MWU2NTk3MTI5NmU5Njk4NmUxZTkwMWZhMDU1MDkyOGRkY2QxMTJiNjczYzZlMGFmMDU4ODNlOWIwMWE3MTFjIn0=', 'eyJpdiI6IjZLc0RlZlJZYWZ2amY1NFhPRkthY0E9PSIsInZhbHVlIjoieVUwOXZZYllLQ0YyYVIyWVhzYkZyaHpZWWVsZ2loQlBhNWZKNXRYSTNPMD0iLCJtYWMiOiI4YzMyMzQwMjhjNzE1MTkzZDMxZjdmMjUwZjMzODk4YTkzOTRkNTE4N2E0N2Q4MTdhMTI3MGNlMGU4YjE2YTE3In0=', 'eyJpdiI6Ik5ZK080TS9xWmZKVGo5TnZjaExwckE9PSIsInZhbHVlIjoiRHlzcWppa21IK29GOFlFYlV5K05VOWZIS09VSjU5YVJDRUR1VzgyblZWZ2xPa2hWNmoxRUdZZ2ZzYS9ZdXZjVnljR1A5elFOK2laVzdDRG5MV2Fpb2c9PSIsIm1hYyI6IjQ3MjRmMDYzMGM5OTMyMTZmOWZiMzJhZjQwNDRlN2M5YmI4NTI5YTZkNGY0YTkxNGJjMWZhZDY4OTQzMmNmODkifQ==', 'eyJpdiI6IjFiSzUxbnhwMFd1K2NJWEdrSUlsU0E9PSIsInZhbHVlIjoibDk4R0Z3SUI1Y1JkZGJ6bWpQa3RILzdKajQ4L2xxekExbmZaUWRNUlBYUVQweTIzMU5JdUkzVG9HNGVPbkJqa0ZFZVBubGlSTnF1NXdoWlF2azR6UDJ2MkhyNGc3K3drOVQ2eG9oWXI2OW0rOHBWcHZXUkczVW1UNll3aktKckZ1WGFwQTMrYk1IR1h1V2drdlcvQmV5aFBoUGNxWHYxM2NFMnJsR3N2U1VTYU84dWY2a0ZKcFdzN24zdHRLd3JRRXh1RGE3ZFJpV1ZtS0FMbFozZ3FjMWtzaTJhb3ZKS0hmMWNHdkpyT0U0WT0iLCJtYWMiOiI2ZWJmMDNmZGYxZjIwMjM0MDAyYWFmYWVmMGYyMWQ3MWVjYzFiMjUxNDM4Y2Y3YWFmNWY5NDg2NWY1Y2ExNDRlIn0=', '2020-08-16 12:27:39', '2020-08-16 12:27:39'),
	(21, 'eyJpdiI6IndZN2liWDZIS3Q0T01jV0lRbVdGalE9PSIsInZhbHVlIjoiMXJYbEtnZmFOMVc1cDNmcGJqLy9XNVVLRkdPSjZwUDg3bEpOYlpMcG5UYz0iLCJtYWMiOiI1ZWE5OTJkYTgxYWVkYWU1NDNkNjQ2YjJlNTZlNjlmMTgzMzc4ZmJmMDlkMzQ5NjYyZWZlMDAxMTM1ZjkxMjAxIn0=', 'eyJpdiI6InQ1RnFCVDA2dm1FSFIwcFU4Y2owa0E9PSIsInZhbHVlIjoiUXR3bzhuOFFRSkRFRmFMSnVnYkpPWGhWVUJnUmdiQm03WG5xMFUrc1ZLRT0iLCJtYWMiOiJjMzhlYzAxOWI4NDY5ZmQyMzlmNDJmMDkyY2M0YzY0NzczYTk5ZWM3MzcwNjUxZGFmZWY1ZTAyMzEzODQxNDU4In0=', 'eyJpdiI6Ii9qQmZjMHdDVGxmVVFncWdpYStldmc9PSIsInZhbHVlIjoicHU5RXpqUkpTZzF4ZGRBL1BoOWpsNS80eU1vRDFSM0dIOEtvMHB5T2ZNNlVLZHAyMkI3SlRhcGxTNW92dHhrdkc3alQ2UXR0K2ZvSVFKa0JxL2o5QVE9PSIsIm1hYyI6ImQ4YmYxYWRmNDliMzQwMmNmYTFiYjc4NThiY2IyYjdjY2E3M2E1MzdlZDE1OTBiOTBjZDc4ZTM5MDA5ODc3MDgifQ==', 'eyJpdiI6InMzWkFucHozMVptRFo2NUNXbUtGOWc9PSIsInZhbHVlIjoiL1JhUGovV3JmdUVNSzRMTzJqcEhvRkZWK0s0VUU2TTgyLzQ2U0ZFMjBRMTBEWXNnb0I0ZUsyRXFrb3dQU2x6Yjh4RXE3TWNaVGRQSWJjNENmUGZLQ3pYTW8zQ2xCblN3OVFSU1Erbk5ZS2tMMXdMekpZS0U4cWw0U2Z6QjRQZE1IQWErRUlsaTNvUlQ2TVRTOHdQVXRYRU9HelVxTHhiZW16NGJERkgvNzB5VkJPTmJ0V0RYSi9LOG1vZjRqZXpYeUthbzZxaDFrR2UxT2k4TW1uMzlHK1puWEhScnlFcGdQV3YyckZtUTNxbz0iLCJtYWMiOiJlNGVlYjY0ZTMxMmIxOTRjODE2ZmQyMDJiODg3MDEyZmVkZjMyZTU3ODEyMWVmNTcwYjhlYjI4NmRiNTI1NDQzIn0=', '2020-08-16 12:27:55', '2020-08-16 12:27:55'),
	(22, 'eyJpdiI6InpxZkV4ZzJnV1g3SVRZM1F6TzFSZ3c9PSIsInZhbHVlIjoiWHRNVC92a21NNTBkYWhRaUFrN1YwL2R1dVJxcjhjUkFzbEdwMGFzTTU2ST0iLCJtYWMiOiI1MGY4NTU5ODlmOTU4MDhjMGVkM2M1Y2ZhYjM3ZjVmMmJjMTgzYWJiNTAxMzg4ZWUwZmNmNzgyNTE0MmM5ZTQ5In0=', 'eyJpdiI6InN1NzN6dFc0VEFaLzhQVTFDVXhVRWc9PSIsInZhbHVlIjoiNzZhak1hQkV1NjlLVi91MzhONXBWV1A0T2tBNHY4SmNIK1VVUk5iOUFDMD0iLCJtYWMiOiIyYTc3YjUxNDNjN2E5MzA3OGI5Nzk0MmNjM2NmY2E1NDA1NDlkZDRjNTRhZGI2OWU3NDljY2JiYjI5NTBmMDBjIn0=', 'eyJpdiI6Im9KVjh4NHdmdzRFOCtuMWZFbzhpRVE9PSIsInZhbHVlIjoiZTlreFFyV0J1cEhqdlBtZDBlM0U0d2JnQ2hkdmx0L2g3dDI0TEtRRXhYQWFoQ0lXWHpMZzZyZWhsNnlKRXVPd1lhQW5ETWFwQTZBeVZvN0Z0dnhqa2c9PSIsIm1hYyI6IjhhZjNhYTg0NjI1ZGQ2ZDNlYjVlNzdkOGM5NWFmZGQyNzZiN2M4ZGY1MmQ1ZDkzMTBmMDQ3MDZhM2Y1NTAzOWEifQ==', 'eyJpdiI6IlY5UVFKUy9vbGFwQks2VTJGUjlMeGc9PSIsInZhbHVlIjoia1JuSkZaMEVoS0IrcndkQzNrejdxdmpGa1NSUnJMWGJWNDArZFZxQW5XZDg4d2prZStJcTJ0dnVhMy8wK3grWlJUR2hBemJJWGpuTGlDZDhZRytORkhFM2dHSi9RdjVnMkxOcnFOSm9ZTFZwb0NYYmlhdzZJTXQ2UzB6WTh2SEg1cGF3Z1U5bDl6S3pNck93Z3lsb09nOWQ1bGpXOXdCVUFxbllyM0pMRXNZPSIsIm1hYyI6IjViZmJlNDc4MWY2ODRmZDQ3OTM0ODJkZmU3ZGM2Mjc5ZDc0Y2ZhMzVkNmJmODNlZjI5YTczZDE3ZDNjYjhhZTUifQ==', '2020-08-16 13:53:43', '2020-08-16 13:53:43'),
	(23, 'eyJpdiI6Ik9LajdZWTNFSXV1cy9INWtCT0ZHRFE9PSIsInZhbHVlIjoiamtCaFVOTXV1cHZHYWg3WFRhSUdHbzlRUXJYSnk2aUNnQURTUDFiSmNlcz0iLCJtYWMiOiJiYjk1NmQ3NjcwMDhkOWU4MjMxNzc1MmI3YjYzZGE3YWUzMmJmOWNlM2EzYjk3OWI4OWRiNTYwMzgzNzcyMjExIn0=', 'eyJpdiI6Imh2dEFQd2pUUXhPem4xT21mTDk3dUE9PSIsInZhbHVlIjoiWTN1VTV3WG4zMkdFU2lFSmV0Z3VJUEhreXlCNVlRcmtjUG1xeFg0TUdVOD0iLCJtYWMiOiI1NjFkMmYzY2RjMmU3MWRiYWE1ZjhlNWI3YjUwOTFiNWZjMTQ1YTU3Mjc1ZWE1YzQxN2I5ZTcxYWZjY2ZmOWVjIn0=', 'eyJpdiI6IjhsOFZKVTU5eklTOVhzNjZrKzdUNEE9PSIsInZhbHVlIjoiK2F3SUtnZ0VMTmJjUi9QejBLY29lVldJazZ4NmZRaGtqNGpnZmtuUEVRUjdDTEkyUUZWUUFZTk1vdHVoZWpzcUtNZGQ3T3czVE9QVWhCWEtqdXRDbXc9PSIsIm1hYyI6IjNiZmRiODFiOWE0ZDk4YjA3N2Q3NTQ0M2UzNThmM2UwYjRmYTlmNWNjZTI0M2Q3NDA0OTg2MTA4NmVkZjEzOWUifQ==', 'eyJpdiI6Ikw5c2FISFNTcHBGbFJZSngvaFlnekE9PSIsInZhbHVlIjoiWDRUU3Z6WUs2QXJEREErbElOVGFvTkR3TUF0WU9DVVhTdUJKNFlxZ3hxUks1RjNBdlZDQmZRdEhpUFpvSnBvZHNtb2xYWFczUU1IWWtxeXZPRytJWjlkSEYrUWovRVcybWxLV0RtOHVaUzNQZURqQlhuMzY5T2pXZ3ZObC81Wk9aREFYMXZ0RURKTi9WTzJzalZ0RkF5TkY2a2pzdDMvcEdRSk9MY25meCswY283Y1lLMzZQcENkcC92VXJCRldOdkNreFI5YUhBYlRQMnRKMHBKRzFjZz09IiwibWFjIjoiNzk5ZTAzNGY1YjA4OWYyMTQ2MTRhYWE3M2UyOWQ3YjYyODBjMDNhNWMyMzk2MDVmNGVjYzBiNTJiOGJmY2VkNiJ9', '2020-08-16 14:17:28', '2020-08-16 14:17:28'),
	(24, 'eyJpdiI6Ilo4dGErc2l0OFBJUHU1SVZDVjBWQkE9PSIsInZhbHVlIjoiM29NcUwrSE85UkUyZ1VFd2kybXJpK1pTTU1UaUwzVXNla3A3QXQ2SW5DTT0iLCJtYWMiOiIwMTA5NTdjZTQwNTRlNGFlYjQwNWFjNDM2NTZjMjEzYWYyY2EyZDVhNTU4NTZmMjJlMjBhMGJhZjdkODhiZmUwIn0=', 'eyJpdiI6IjlOZ2lBNTVvQXpQV0V6ejVXNWlqdUE9PSIsInZhbHVlIjoic0UyUDVlYkkybEViZ2RMUzBCOWJLN1BwZGdiQm43QmxBY3J4c1N1QmR5ND0iLCJtYWMiOiI5MzhlZjVmMWI2YzRlZmFiOWJlM2RhMDk1MjBkNjZlMGVlYmIyMzE5YmRiYTI0ZjQ3Njk3Zjc2NjM3ZWZiODY2In0=', 'eyJpdiI6IkxJOHVXYWJueiszVWlKd0hFK2JyWXc9PSIsInZhbHVlIjoiR0FGbE1LYXBGa0JyUEdxOFR6dEVLeXRKNHFGTnpWQmN3MXlHUTg5eHRPbVV5a2dnV0k1d0FXZDk0U2hWRDhpMmlRYWtBNzBuZkxVR211am94Ry9NSEE9PSIsIm1hYyI6Ijg0NDdlMGQ3NTdjNmI0ZWNhZmFhOGVjYTMwM2QzZTMwNjY5ZjEyYjk3ODdkMGRhN2JmYjYwZjE3ZWZiNjE5MzYifQ==', 'eyJpdiI6Im9mYUMzbStwNUxEZm0zMWVucGlMenc9PSIsInZhbHVlIjoiSHJVaVpUZms3MktlM0dsb3EwajF3dzhFNmxJYURRNjByN1JrK25ENWVKLzZXMnFTUGVuS3BvTXlJWEhhTnZFLyt4a1RxRzBIYWRhaU9SVy9XazVDeW5WelBZVDB3Vk41UE4zd0xSUmFadWs9IiwibWFjIjoiZDQ0NDdkOTQzMWEyYWNiZGM3NWUzYTEwOWMzMGUzZWQwMzY3NTc1YjNiODNjODU0NmE0ZGQxN2FiNTI5ZTNiYyJ9', '2020-08-16 21:03:17', '2020-08-16 21:03:17'),
	(25, 'eyJpdiI6Ink5c0FhdHlFUU1aOEZZbEMva2owSEE9PSIsInZhbHVlIjoiekZxc2duTThJMFpEZmZ1V3pXN1ZIOERHZ2xXdFV5QmxSVHBBd2hSb0c0dz0iLCJtYWMiOiIxNTE5NjQ1MDlkY2RhYWRmNDNhZTZmNzY4NTlhNGVhNTliMWQyOThkY2Q2YjRkZDhlOWExYmYxNDg3ZTc5NGM2In0=', 'eyJpdiI6InhYb2JSM0diZWFacU5jajlYSk81Nnc9PSIsInZhbHVlIjoiakpCZGZ5QkpzdzNUN2xVVFJybFUwRDFCY1VuVC9UOHIzdVpQWkt3SmwwUT0iLCJtYWMiOiI1OTEyMDJlMGU3NDViNzM5ODY5MjYzZTRmZmVmODQxZGQ3YTljMDY4NTJkOGNlNmE2MmU4NTc4NWJmYTZiZDIyIn0=', 'eyJpdiI6Ikg2cEo0Ti9BaUc4anZ0WEVsMC9qRWc9PSIsInZhbHVlIjoiQjVQY0EwM0lyc1ZwclFFY0JHaE9DcHlSVEVjVzc5cElzdmd0VW5kR2xrMzJ4R0lZVmdLcVFvaXVNZ1RHOXB4SlhFck5RMWVnMjVzNGNJNEU0aG5WZkE9PSIsIm1hYyI6IjY5YWI1Yzc1YzUwNmIzNjViYTQzOWI5NTI2YWEwMmNkM2QyOTkzY2I0NTA1NTQxMWQxYmY4YTc1YmEyMWI1ODgifQ==', 'eyJpdiI6IlhhMGN5dmNSRUlNNjJyZnQ3cUU0bmc9PSIsInZhbHVlIjoiamNyQmhHMW5Bb3kvOUpTZWtZSHVGRDR4TEdqWUY3aFQvV0VUNEltbkQ5d0VmMGxNTVlRNGtOdzlid2lvVU5TZkpCVjFsQ2tIZTNTSXBDcjc2M2k5a3l3Y01PK2p2eXozOER6MVM4dG5xcm89IiwibWFjIjoiNWE0YTdkMGJmMDY4YzliODU1MTRkNTI5YjU0NjVjY2I2NmRlNzJkMGFhOGI3YzgwZDcwOGRmZTYzNWYzZTFmOCJ9', '2020-08-16 21:04:02', '2020-08-16 21:04:02'),
	(26, 'eyJpdiI6IjVWTTd5THdYQTVKeXBPR0l1TzdybkE9PSIsInZhbHVlIjoiU3VoSUpGdEwvMkt6V0IvbFY1SGZwTHJuSUVsNFVlbjZJZFBiK2xtcXZ1cz0iLCJtYWMiOiI2MGE3NGZlZTA2MjJmMjQ2ODc4NGVlMDgwNmU2MTNmNThjZjhhZWY4NWI5MzNmMjBjMmRjNmM5NDgxYjRmMTIzIn0=', 'eyJpdiI6IndOeG9SaTRnR1NPVWI3ZkFKdGFheFE9PSIsInZhbHVlIjoiY0xmMkxlekNMWTVDUUF2dFBXdWpRQmdpays4cFNveXBJL04wTk9JbWhPZz0iLCJtYWMiOiJmZWI1NTYwNTJiOTVhYTAzNGM0YTdmNzY2YzU3ZDYxM2VjNGQwM2MwZTgzYzJlYmI4N2MzMGJjZjllZmI5N2IxIn0=', 'eyJpdiI6IkkrZ0lUZk80bTkyWXBQOHhQb0djZlE9PSIsInZhbHVlIjoiV2RWRDF0V0xHZVBBRWZacTZ0WUc2YzRhS2s0U2JxZnlnOWZmMWtqS0ljZ0hqYTk1WmovV1ZIQ210VGlCNjBEd2lyeDc5VXA0Rit5YTh2UDdyRVpCRUE9PSIsIm1hYyI6ImIzNTQ5MzZlMTkyNGZmZGEwODZhOGQ4NTA4NDJhOTRjMzQxMTFkMWJiZDhhOTRlYTk1NDZiNGQ2MDE5Zjc1MDcifQ==', 'eyJpdiI6IlFFMm5CQktjV3Nvc2l1U1FiWnBxalE9PSIsInZhbHVlIjoiazZWN2JFWVEwd0VFdXZvMGtvOUNUNDhESWcxVWhqWlUrMlpwQ2pUSGhZSU5zbUZqT01mRkFRT2NWVDlJN0IzTElxTHpUbFRsa1g0UlZQNk9GTHFJeThwemR6VVoxVjJrUDVCT1hWeTBoY3M9IiwibWFjIjoiMzIyMDk4YjJhYTZlNGE0ZTYzMTA0M2FjNjU4OWQ4ZTEzNGQ4ZDU5NTEyNmNmNTY5OWI0MzRkNGY4NWQxZDIzYSJ9', '2020-08-16 21:04:55', '2020-08-16 21:04:55'),
	(27, 'eyJpdiI6Im9Sa1QzTXlGZmVEdVU5aGZKajhjMUE9PSIsInZhbHVlIjoiTmxwNUNzdlp3RzIvaTExaTJxQWpTdm9JWVQrMlNvUE93S0tWVi9QZ3Nscz0iLCJtYWMiOiJhYzIyOTM3NzI0ZmM3ZDhkZmQ3MzkwYjZkMzg4Njg1MGJjZjE4NDNmMTJjNjNhZWU1OWJkNmQ5OWQyMGQ2ZGQxIn0=', 'eyJpdiI6IjlPdnFjNGtlUnVnRzJMS3o3TmRzQ1E9PSIsInZhbHVlIjoialo0ZDhPbmNIbkpaWUVyUW1UNzgyMUl0Nm9BRDNhNzZzSVhoekh2OFVOdz0iLCJtYWMiOiJkMDE4MWViM2ZkOTNjZWEwOGNkNTFhN2YyNTMxZDRkOTczNDQzMDZmMGUxM2VjNGRhMTVhNTBlNDZiNTc3ZGU4In0=', 'eyJpdiI6IjJkYXljVFluU0Q2cnltVUdRNUtQL1E9PSIsInZhbHVlIjoiTEIvS2Robk1XVXVXQy9STTJWN3ZCdDE1UWFlTUpKNmhXUUtkYUs5Qk40dHF3bFB6VDdsWjBFdSthc0R5NWR1T2NES3l0bUlmV0xqci8rbFppQ0h6TUE9PSIsIm1hYyI6ImJkOTRjNWE4ZDM4MGIyODU2M2NhMDdmMDQwZjdjOWM3ODZhNTVjNTA5YTEwNDUxYjA2ZjcyYmIxZjJjMzc0ZDgifQ==', 'eyJpdiI6IlpaQStwZ1J1VHVWelRyQVB2and5Umc9PSIsInZhbHVlIjoieSs4cmhJMTVWeWlxUGY3eUE5dHlWTzBNSHZZcFNQSExMS09lYmtEMkFYYW9xOERSZFluTkpCY1hGWVc1VW8wemVGTlliOEhhcVFsTU9HNFlDR3JJaHZyKzY2ZlNOYmRyd09Rek52QitXRkk9IiwibWFjIjoiYTE4ZDM3MDU4ZDI4NzU2ZDc3ZWJhOGU1MTU5NTE1YWJjM2IwNzA1OThhMTQwYTY2NDE1M2EwZWFmY2NhODM2OSJ9', '2020-08-16 21:06:55', '2020-08-16 21:06:55'),
	(28, 'eyJpdiI6ImNDeWNQdHFGRUZ2NjIzajJoZDJMZVE9PSIsInZhbHVlIjoiaFJSSmVOOHRrazdaZlgvUDU4Ui9DMXJiV3R6cmdRWWFkMzNZanFGNGZoRT0iLCJtYWMiOiJjNWEzYTUzMmUyZDgyNWU1NzVhMWMyODVhZDdjMmQ3NzkxNjRjYTZlYjQ4NDExMTJlN2NlY2RkOWQ0MjBiMzhiIn0=', 'eyJpdiI6IlA4Z09wNHFRUEZIRnN3UzRSd1JVbkE9PSIsInZhbHVlIjoiMEVMSVY3V0puWkwrdTUzUndNNFNBeC9rVVVUMjIxOEhkenpjaS94WU9JND0iLCJtYWMiOiIxYTZhZTEwN2I5MzU2ZThhZTQ5ZjBmODBlNmFjZTgxNTFlYmFhNjYwZDg3MzdhYjNjYTJjNGQ4OWI3NTU1YTExIn0=', 'eyJpdiI6IkwvRXhwS2RkZFVWckRockdBYmRhMXc9PSIsInZhbHVlIjoiYlJ1Y2IvK3QvMDFjaW1JTTc2TVBqNHpIalFtVFVWc2R5OXowRTJhT2hqVkZDTDU1WWk0OGR4R2pMbFh1T1NrZ1N6dEZjdU5yb2xrSkhCam51K2tUVWc9PSIsIm1hYyI6IjlkYjE0NDBhM2YyMjUzZDA1MzVmNmIwNDQ2ZWNhYTU3NmU0NGMxNGYxN2RkNzE3NTkyNjY0NGNmNWI0MjMxOWEifQ==', 'eyJpdiI6IkowMVZhUnowcnh6a3A0blZzUWd5eFE9PSIsInZhbHVlIjoiSFZaeE5uelJMc2o2Y29RRk41b0VqWUVXM0MrUkNkQmNwQkRUdk5IUUowaDF2b2IrdGhsUUxFazUyWFdOVkFMb0FMeGdNMS84YzdHNVZPTE1ESG45NkVjRWY2aENGaW9vMVVBcW1uSjNjamVBaFRGbEU2SGxDaUorNXpKUjhMeXJqRGJaMWMzeS9OV0d0M1JWNHhuNTJReGRuQ0JUSkY5aWg4c0lVM2x2WTl3djJLaGU1dTU2VThkV1NwekU2cG9yR0RVc0xkY1pQMy9CY1BFd2JHMUFDNmZEK0w1NWg4WVNMemIwc1MvT0JzVWc2Umk3SnpHbVdvaUp0QjVtS2ZYNkZFbUYycEtIRi84SkthbGZpS3dCZjJKTUFvaWkyMklhN2RxdHQ4TVRVQnlkWkw5dXBQZTREYklUWnVOM05HMWtOODFicWV1cmtIQWJZUWphWWR0bEJlcnNDb29YREFWek9aYVhtMkJaaEdQYUlqMnJucWJjWVlBS2hMTDhOK2F1dXI2ckhZWjJ2OXRiek9SdUh2QlYwMEJ5ZVUwTUhQMzg3dnVjamFhSjBQL0lGazNGYzZwbUY0TmhjeVRVOXdFV3RhY3pOekk3SDdPZ2EwWGdRcGF5NXdSYlB1YytOOWpmcnQwYmVucEVmN2N3dHlyRldoQ1ZxZVljYUE2S1M1RDJrSms3R2ErV3JCblZuZFhNeG5wK0lCOG1OeFNrS2xnSlJ0RFlTc3I3T0haTHdjNUdVMkZZR01xWmlZUTZsckVoSHM4djlKRTllN05VQ1lacFBOVmpVTlFHRjJLRVpDOFlPZzgxaE5kUmVRMDMrMklkQXRXU3R1czJQVm9IclpoM2tTRjdBeFRmTDM1Y0NTUEJFeWNPSEhmYjhtQ3libjBGb011aGpmVElHWGp4MkpXazE3bmlUeFJQSlBod3NnRVRISGJ3Y1ZyL3A0WGxMT3lzMVFsTWMvZkc3dElabW1PZG1CYWc0ODJxcDVxbTJRejZMUXVFaCtRYmJROVpXWlk2cHpYbFllT2VPc2hFT1JXNlUzN1czREVBaVlHRnpnZUpZNHlMeWd4U3FENit1WWVsRGl6dTQvYk9SZ0pNRUpvYkQ1Z2pNTFc0VGJVUXJuUGZ0YVUraCtPZllmK1BZNTFjMUw5bUc4a0d4dWIxWTJVM09OUVBJdVlBYlJsUCtJM2h0UVRHUVkydmgvS0ZJczJnZTZCTXNoSndUNHZPbjlqeDBiTjdWYXNFSURhekxPOEx0dTJCRDlGNys2c1JPeDJpS3o5dkV1RUZJN05jL0lGT1hqQTJTZ3AyN2FrV0dpZ0daUEZDVWRZZys1SDd2Mmk4QllUMnYzTzh6V0t4djRQcHQzU1RCcnNpMnpjYlU0R0c2dDlad0dERjBqZis0VTFhT01ueXZ4VWkrU0FDQlpoZDArcTRQdStGMmc4WXFNbUhCcWU4Vk13UXhya2d1Y05YN2lDaFMzaWo3Y1Q3THVNcTRmdzFMeHIwb3ZWaktFQWJESlU1N0ZhbjdDcnoreE55UXpseGJCLzNISk1nbThZVGE0R1JYMjlEZG1JNVh0WDlEd1AzNUtWdWMrSUFOOHNYVE9QQWJreUJMQWJEcU1DVGZ0THF4WUNjbmYzQlFCUUhKSEV2aU1zMkZ3aVczbHJXYVlJQ0duQnBhWjN5Wktnc0ZJVktRNFJ0bTVLNHBlV3VEUzJNekdHT2pBenpVcWtZRUlyd2tNK050dUFSREVMMVN0azdUWnZZUlVacGpWTW9YOWNaY0I1QjczQXRrZ3A3a01NNnRTaWduN2YzSC9CbTZ6b2lFNGZwcW9YMGNkNVNjTnNHR01QZlJ1cTl0ckVHL3FCcWVjd2RHSjNUT1FteEc0ZnNzTFpyUVZ1dzFOTGpWWFpHYXlwY0xSckhGVTF6dU0xMHJxNGgvaWZKWWE5MElmMjNHN0JkbXBpV3d2UTYxQVNOdEpoMC9nb0RPTmZYSDNtRGtteHpQcUpaSUNwUkNlT2t5ZWl0QXJjOHVyYkt3b2RuS2hGWjdzT012NWx2MkE3bXFGUGwrUmVBSngxRnFRV0c2K2UvTWZKYzU2T1RKaGkzSkJhTkpITzl0Z0JGRDRReDgxakVVR1QwTnovUGoyYXVlcWFoazh0cGtDcDI0YmcvcGFqUVRHU2hNdGVvcVZkOWNnd1M2MjdkK3AzL2dwZkN5ZzVkbmtFT2JjbFcyWjBsZThodkZVaWFxekorTVp0Z2hpTGhQMUZrVzF1SjQ3ZzVsd0dCRHZuSm1xTkpoSkhhUytNTVZUT1pDRTRnNU1OTFVkbldlSkduVjE1UUUwRUF5WFpjNTduT3ZqM2pBMEg3cWFJQkVkR1BjVVhCSUsrMExKWSsvbmdaV2NzMzVpVVEzY1pvV0hiZVFVMnF1aUN0aDVRNTU4bkxjbGdGTjRPcWhJdm5lQTMvZ0plclo3T0EzU1lVNU5XUXZxYzcxc0ZhOXF1QnNZSEpuYXJEOTEvYWxCYUY5ZGxXMVArcGNVTVZxTXMzZWlvTUNtSVV5eCtXd2Z0Y291ZjRCZm9jbHNBT25PU29yM09HZ1IvbTlEVTFhNCtvaFhTem9KQ1UvZy9UMmVOWFUvMD0iLCJtYWMiOiJkODQwOTE2ODJhMThkODY1ZDc0ZWRhMjk2NzNmMWQxMDQ5YWJjODhkNDVjZTk3M2EyOWM1ZTc4ZjRiODcxZjIyIn0=', '2020-08-16 21:31:48', '2020-08-16 21:31:48'),
	(29, 'eyJpdiI6IjY0anAwQVVoV25MN1dMMmpoSHE0bkE9PSIsInZhbHVlIjoieHRWQ2Zud3pldjF3ajloNkowQlBqT2hHNWRvTkJ4Z0ovTFpOQ3gwVFBwcz0iLCJtYWMiOiJjNDBiZDMwMTQ3ODNmNTYzZGQzNTEzYzc4NmZjODk1MWFhMmJjOTc1NmZkZTRlZGQxNjk2YjQzMDdkMDVmZjQxIn0=', 'eyJpdiI6IlRsbUJKVkJadFJoNFlRWlZjcGZBM2c9PSIsInZhbHVlIjoiS1RnVlg1OHRWSzFhYzdJODAwdUczZkdBYjQ3T1FNMXNPTE1VZTU2MHNndz0iLCJtYWMiOiI5M2U5OTFhNjhhZGQ1OTcxZWM1OTk2OTA0MGE3NjU4Y2ExMTc4NWM5M2UxOTgxZjdjODI0MDhiZDBjNDFiYjE4In0=', 'eyJpdiI6InZ1UGtDYTFNSUVMOU5QbDRwWUovSVE9PSIsInZhbHVlIjoiRisvOExjMFY4UmtIN0JjZGpVTTE1bXZiREh0ZWxDTXdNajVId1ZkVlREOS9rMUxvbHovNXpmcHJBQ1p5UU9MYi9UKzNRbjExeXBUOHE1SDRhZGxPa3c9PSIsIm1hYyI6IjAxZmQyMmJmMzRhYTNjYjAxZDkyNmFhMzczNGVkNDE1YzcyNTY5ZWU0MzAwOGFkMjgyYWEyYzFmN2IxMzlmZTIifQ==', 'eyJpdiI6IkxCZkltWHJyQzZYeTBaRlRQSVFvb1E9PSIsInZhbHVlIjoiNytoOGNBb3Bac2RTQnRyNUxaQ3RQWlhZQnZ2dXlZN0tqSEd6OWliTlE3eDJTTk5ZUk54a1luM2REdzF4VVp0THowUE9KN0VtM1VMZ1lvUzRqQ0Q0akE9PSIsIm1hYyI6Ijk4NmEyZTFkNzg3NzBhYzA1OTI1NzhlODQ1NDRhZmEyODZkMDZmOWNmMjhjOGJiODUzYjNkNWE1YzY4NGExMGIifQ==', '2020-08-16 21:35:23', '2020-08-16 21:35:23'),
	(30, 'eyJpdiI6IjliS21LSUtJTktRcGR1WWNWUHc0T3c9PSIsInZhbHVlIjoiQzVYc1J6Ym5WQ0p2N3JseEh1RlNlbE5SMVFudHU5cjJpUXJYaGhNY1loVT0iLCJtYWMiOiI3YWVmNWYxOGU5MDVjY2UzZjQ5N2MzYTIzYmNmOGZiZTYxYjg4MWVlODdmYzEzYjZjOWNhZWYxMmU3MWZiODVhIn0=', 'eyJpdiI6IlFJSE1zQk5CWXFTYnovMXphNktvRlE9PSIsInZhbHVlIjoiNUx6RjRjMDFvVlpFUFpjdmxmS3RJa1BPWWMxWEhrWTg5eHZHQUhKZytCUT0iLCJtYWMiOiJlYjM5MzRlZDMzZDU2M2U3NzBjYTU3YzczODQyYTM5YzczMTJjNjVjZjMwNmUwNGM5NWQ2MTZkOThkYmQyOWUxIn0=', 'eyJpdiI6Ikgra1FrRzlPZlk3UnNOWW9ibHBKWnc9PSIsInZhbHVlIjoieWtib1U0R2NRZlFwOGpQZ2c2R0k1MW04YWtCTk9XTHhMaDhuT1graks4dWNQMGUrRmNQR1BxRHcrU1Y0NGMxNXd1aFZDZUpsejFLV0hnWWFxcm5JTHc9PSIsIm1hYyI6ImNjMDFkNzllN2I0ZDhhZGYwYjhhNGYyYTU0NTIwMWUwMGExNDA2Y2I2MWVmM2Q3MzEzY2UyMmE5ZjllNTJlZDUifQ==', 'eyJpdiI6IjExVUE1M3dmV2RzUnFiVzNsRSt1RlE9PSIsInZhbHVlIjoibHlMTU51ZmtxSzlYVzhLV0lENEhPMTdLcWJtVUMzL2FhT0swaXk3NVNSWUtLQ2djUFZCbS9SRVNxQm9ZMHg1TzdGMWc0dC9xMituTXNWcnY3UHBqNVE9PSIsIm1hYyI6ImZkZjRhMDRiOGFjZTg0ZDRmYjZjMDVlMzczYWQxYjU3N2ZlMGMwNTAzMmNmZmYwMjY5NmI3MGZiZTJmMDEwZWEifQ==', '2020-08-16 21:37:01', '2020-08-16 21:37:01'),
	(31, 'eyJpdiI6IlZVVFBURlc4MzlWMU1QaGZwZkl1MGc9PSIsInZhbHVlIjoiMmFKdGxJUU5WZkduWE03TkRCWjNQVFBSMC94Qmx0bEx5N214akY3YytsVT0iLCJtYWMiOiJhYWFkZmVkMDUzM2Y1ODFmOWQwZDdjZGZmMzE2YTM5MTk3NmNmMDZhMGQxYjA2ZjEyNWRmNDcxNGU0MzMzOTljIn0=', 'eyJpdiI6ImdmQ3gzdHQ5NTA1OW1PaEVxSWQvSkE9PSIsInZhbHVlIjoiVmdiQWlxVWZJNDY0RUZGRVdsNHR4RGlFR3lId1JMVlhIRzFwakl0Q0dkdz0iLCJtYWMiOiI0MjE4ZmU5MDFkNTRjZjNmMzRmMjc2NWJmZjZlYmZiNGNmMGE2N2VhMDU2OTY0NzBmYzRkMjU2MThjNDk1Zjc3In0=', 'eyJpdiI6IlZVNkJuZDRPVWg2S2I4Uk5JbHhGU1E9PSIsInZhbHVlIjoiRzRSblQ0akovYXZpVDh4NWNJeFBhaTJSSlN5RkYwaS9YTWpFTE81bll6K0JlcElsSm42U09jQkhMUm9CazErY3BIbHEvY29vRERVVU43eXIyV1VDblE9PSIsIm1hYyI6IjA4MzljMjliYTgyOWViZjRhNWQ5ZGJkZDRlYjYzNGYwYTY2Y2U0NTg3YTRjY2Y2MDYwYThjMjRiNzNhYjYwZGUifQ==', 'eyJpdiI6IlY2Y3VzanA2MzZuM0xYTWJQVGdxbFE9PSIsInZhbHVlIjoidU1GNTR6RkhmbTRKZFZqR0pMbkdOa2RRRlFudnRUUkQvYjFyQlFhOFQyNmtYU3dhZC9ZYWxZc2xlTmRwV1RrQiIsIm1hYyI6IjE5NjQ1ZmQyYWNiODg4NmNlNGEyYjVkYTdjYmM1N2IwMmEwOTQ4NDBkN2ViMmVmYmFmMWJhNTE3Y2FlMjczMGQifQ==', '2020-08-16 21:39:08', '2020-08-16 21:39:08'),
	(32, 'eyJpdiI6IlZxVkdybEIyRm5LVThmS0Jxb081VWc9PSIsInZhbHVlIjoiZ25TWGVPWUh1VFZySXJSUjVqYkx1K01xcWMxUDk0SGN1U2xhTUNtMHIzcz0iLCJtYWMiOiIwZGRiOTUwZTdmM2M2OGU3MTcyNmY0ODJiZWUzMGU0YzA3ZjNiM2M4MmI5YzlkM2M2OWQ2MGMyMjVkMzE5MjYwIn0=', 'eyJpdiI6InlQeDRvZGpDVGFVQm9NWDdENGE2U3c9PSIsInZhbHVlIjoiZDZzUE9MSFQySVlkVmRFSXRUbzVWTU9kanN5S0JrbFBqazh2R0thb05hbz0iLCJtYWMiOiJiNTU2MzdmYmJiMzFlYTZjZWVlMjNmNmQyY2I0NGU5Y2ZlYjUwZjc4NzAyNjBhMmU4ZWRjNGVjZjJlNTA3ZmNkIn0=', 'eyJpdiI6IlB6VzVHT1MwYUt1M3FYa2VUdFVKeGc9PSIsInZhbHVlIjoiQmx3dktKeks1NjhDenpUZTZNQksrL3RIZnQ4bTVLNWd4VDJMYTU5Y1dKNU1lTzdZM1AwZ1NWWXBUa2dLcU13S3gxRGFJU3RCcC9oSTJQRUtnbUZMVUE9PSIsIm1hYyI6ImViYjkyMTllMDQ4NDYxZjA2YjM3N2QwODllNjI3ZWJlZGI0N2QxODIxYTUxNjRlNmM2OGJmOGMxMTYwNTkxNTkifQ==', 'eyJpdiI6IldCMEdMRUFhL3pDMTBnRnRQRVJkamc9PSIsInZhbHVlIjoiYUtiOWZvcE81eHA4Tm43YmtSak5FR2pIYWJsT1k3elk5NnVGYlRpWlNnK3grOUtadDR3dVFqdzBsZ1lNemxEVSs5eVJhSWdpZFp6YmFoNmFCWlFYUW1CaE9MVm0wditjWXpWck42aTVKNmFPdnRTSWs2YlQrSGI4dVVTK0tqU2o3dWFIbFA2NVUvRWpQeUl2OXJ1RnZQMTF3dnRFY2Y2QUlRNEJDWFgxYmJyRFgwYVNrY3FzaWh6NytxTjZYM1lpRXBOeDFpRVJIMVBEY1NIMXZqeWtKUT09IiwibWFjIjoiYmFlY2ZmYmFkMTgzNjY4OTc4MTJhY2Y1ZmU2MWIzZmZjMjQ2NjViMzAxMDg0ZTA1ZTliYTU3ODY4MzlmNDgyZiJ9', '2020-08-16 21:46:07', '2020-08-16 21:46:07'),
	(33, 'eyJpdiI6ImdVcVc5emYzZ1dET0pDbFRSSWYyc2c9PSIsInZhbHVlIjoielBsdGIrMVdaWGhnL3YweUJ6V2x2Qi9scERnTlo5aGd0cWMxYi9TSHRoND0iLCJtYWMiOiI2MDM4ZDRjMmMwYThkODMwOTc4ZTVlMzYzNjEyYWEwZjc5ZWNiNDA0OWU4OWJkMzNmYzVlYjQ2NDc4YTI3OTg5In0=', 'eyJpdiI6IkdhTXZmaENJbjBnSzRIOFY0UmlSMVE9PSIsInZhbHVlIjoiUVUvb1p0Q0JaaENqMjR3djM2QlhjUlNvaHp4dkEwTkFnZFgrT3cvT1lGMD0iLCJtYWMiOiI5N2ZkMDliOTRkM2YwYjZmNGVmOWQ0MGEwYjdlYmViY2Q1YzA1NGVjNTc2MTRiMTYxODgyZmRmODhiZDk0YmZhIn0=', 'eyJpdiI6ImhRL0RhTGNONWxOdmlyRThmZXNEaWc9PSIsInZhbHVlIjoicUNOYVVNa21QdVlqb3ZsTmJqcVpjQVB0WWh6MHNYWnNHbW9vUlYvTkhKWEt5VGh1dUxValprUHRDWVU5ZEp3VkQvMUE1TXdSc2dTdWhybG9VbzZVSXc9PSIsIm1hYyI6IjEyYTQ5MTcyMjQ5YTFkOGI4MGE2OTQ3MWZhZTBhNTMzZGZiY2FiM2UzZDFkN2JmZjI2ZWFmNmY5ZTcxNjQwZTIifQ==', 'eyJpdiI6ImNxR01mcUlYNFJMOFg2TkkvYlJBclE9PSIsInZhbHVlIjoiSHpERU1DRXNZTHRydXhDVEFldHRpY3cvSDFGTHhqQmRBMWZtNjNSVjVrcjhiN1ZXZk9rTnRQVit0YTFHSWZuOEJJbnlMZVlHSlpjbkZjY01RNGR0LzRxWi91ZEpWbCtTTmhQZlRzRlZUOVZ2US9rUVdGVXFLZEdGWXc5VFRMRG9IOEI3TExjL0tkZkM1ZGF6eEpFL09oc0tLZHd4aVMzVU9zdHBsUi9zNkJNPSIsIm1hYyI6IjA3NjkzZjM3YmY3M2MyZDQzZmNlMGVjODg0Y2EyOTQ4ZGRlMWY4YTBhN2UxYjNkODljYjQ5NzJkNjRiNDdhMDQifQ==', '2020-08-16 21:52:46', '2020-08-16 21:52:46'),
	(34, 'eyJpdiI6Im5aSHM3OWdrZGNYRnF6bkRQRUlMSGc9PSIsInZhbHVlIjoiL3REb1UzMFVBbVdQcVBvQlNCbHEzQ1hGUHNyZU9WcjEvOVIvOFZJVVI4ND0iLCJtYWMiOiIzZThkNDAzNDQxNTkxN2Y1MWIyYTIzODU2OGUxYzJjN2FmMmY4NjMzN2ExYjgxNDlkMmRiMzJkMDIxYjUxZWNkIn0=', 'eyJpdiI6Im1OTVJObGZDTXJlR1Fya2JVaEV0eUE9PSIsInZhbHVlIjoiZHVIb1RMdjdxdDNwQ05hcFlGM2NkNzN1cXAvN0dkRXFCYTdicFZMMVYrYz0iLCJtYWMiOiJiM2U5YWI1MDdhNjZlY2ViMWE3YWMyYjljZDZhODdjYmY2N2UwNWU3NzFlZWM2MTVlYTY0NzAwYTZhYTI4ZTZiIn0=', 'eyJpdiI6Ink3c3VYOGF0SDN5ZFZLWjlXMVl5M1E9PSIsInZhbHVlIjoiczg2TDdQV2RTcWhJaklXRTg0RHkrci9rNUtxMVBlc21PbTVMSHZoN2xucUljaGJ2TWxTNkkxYVNzN0poTGxiNzZrOVBUdzIwb3h1dFI2ZjN0cHVRUkE9PSIsIm1hYyI6ImZlMjgwMDZkYmQyNWNjNzgyYzc3MGNmM2NjNjQzYTQ2OTQ3Yzk0M2FkMDAzOTA1ZTc1MDE3OThhNjI1Mzc3MjgifQ==', 'eyJpdiI6ImtEeWVCaWxvMGpoSlZSYUdyNko3TXc9PSIsInZhbHVlIjoiQ2Zsc3dWd1NLWTdRYkNIMDdWa3JEMEY3eGV0cjBhNDY3TUlrV0F1L2lsOEg0UW1LMDNwWWtFSEpHbTRqSjhXaHBBZnFSSGpNSEJKYTFqaHZId2tNdEN1OWovNDZoem9sbGRHSzNwQlM2Q3BaOUZkN3dtSmZXdXVmbkIwTEpwMk1QVlc4bDBQc0JBU2NiMmMxN2RVS2N4WElDdXF1Q1BxU3Q0YWV5Tm5vd1U0PSIsIm1hYyI6IjFhMWJhODRhNWQ1YTY2ZDkwODhlODQ3ODhiNWU3MmE0ZDJmNWM1NDBmNjM5NmZjNDRjMWU3YTM5ZTkzMTIzMjYifQ==', '2020-08-16 21:56:43', '2020-08-16 21:56:43'),
	(35, 'eyJpdiI6Im9mMENkVk1heGZ1VkU0Zi91am5kZVE9PSIsInZhbHVlIjoiK2drc3NPY3VEZmlkRXpVbTk3bTl1Y3JJQ1Y3ZUc0RC9ZUXdSUWJGeHVSST0iLCJtYWMiOiIxZWUyMTEyOGVlM2I1Nzk3NGU3ZTllYWJjN2UzYTQ1NDM0NWIwNjYzMDUyYmM5OTgzZTUxZDY3ZDE1ZDc1YjJjIn0=', 'eyJpdiI6ImF6QmFmVWtnYUI2RHY5Zm1ESlVOR3c9PSIsInZhbHVlIjoiTjNJaGlEOU5QVUFLaTVWR2JDK3ViTGZBMHp2elBvdHZtdURsZWRhNnZnVT0iLCJtYWMiOiIxZGY4MWI0OGQ2NWNmNGQ5NTNlNTdhODNhMjU3ZjcwMzM1OGNhMGNjYmNjM2ZkOWMxY2U4Y2JlMzQxYmFlMGI4In0=', 'eyJpdiI6IjJwOVNNaG0rSGRrYUlYQmlKdEptQnc9PSIsInZhbHVlIjoiUWwxR3h5WFFCdHh5VWdKSHM4b2pkNmlRREtXMWMwREprR010SHpwSGN2ZHdDaEFGZTczVTQ1c0NkUVJFZlV5cnZpb1YzMlBQSWlRcFBBd3F4QnV0cFE9PSIsIm1hYyI6IjczNTAyOWViMjBjOTc5NjIxNmE4Y2YyOTJhNWQ5NTg2ZGUzY2ZiYjFkZTRjZjdkZTQ0YzVhODkyNTAxZTcyODEifQ==', 'eyJpdiI6ImZKMmRqajdvV2NHVUNQNlZSYmJCRXc9PSIsInZhbHVlIjoiTXZPdS9lRnRPRXJxcnZmZlhVaVlPMXVRNWFvaDlETURxVHhDRDduZCs4d0o5eEI3bWJuVm9sMjJVSWUyb0JHWlZRazdoTjE5STgrQjdlWno2enVmaGtvYW9DbVR6UEZnSmdJLzBpWU9IN2FJWStaMmtIY0NsM2x6MEpGSEhTdGhHVjdnV215OGFjMDlZZCt6Mm9ML1QvbUZKQWtNRHZ4enFjamJyeVBaYXE0PSIsIm1hYyI6IjkwNjQ1YWNjMjdmZTQyNWZiMjRlNWY0ZDNmMTAzNWFiMmZjZTUyZjZmNzUyNjJkNjNjYjMzODMzMzgxY2NmOGQifQ==', '2020-08-16 21:57:14', '2020-08-16 21:57:14'),
	(36, 'eyJpdiI6IlMzS0xWOHptSUdvVlpOSHFHMjhidXc9PSIsInZhbHVlIjoiRzVvSWFhUXphZHpXZmdNTWFDN0xqUDBWeERWa1FUS3ppUVdiQytCZkNTYz0iLCJtYWMiOiIyMjU1YmNmMGI3NDI0MWFjYTY5MGFmMjQyNTkwYjJjYjdkOWE5NDAwM2Q4MTYxZmY1ZGE0ODQ0YjUwYTYwOGFlIn0=', 'eyJpdiI6InZuY1dkWVYrNTZRbHhmYmVjcnZLZFE9PSIsInZhbHVlIjoiUDVqcndwalA3czVmODE2NWxpVUpkcUxtRU9sUGlJeExWZCtBVE1ydCs1OD0iLCJtYWMiOiIzNzUzNjk5ZjI4ODU3ZDYwN2IzNDQ3NjdhYjM4NjUyOGJmODA5MTZjYmUzOGEzOTVjOGYyYzVjZGM2M2JiMjMwIn0=', 'eyJpdiI6IlpuN1lzODd3V216TWFGU21TYUFOVEE9PSIsInZhbHVlIjoia0pBTk5BZmlJYlY0Z1cvYld6cXRPaE13cVVhNS9pQUVmU2NHTnc4a01kR2Nqd29zUGErc1JQVXg4aUt2YjZzMzNMTVk5M3Z4Ykt1MHpNeDBuakRQVnc9PSIsIm1hYyI6IjM3MTU5NWMyODI5N2NlOTIzYWU4ODJmZDQwYTRjYjBiODZkYzZhMmI4MzAwZmQ2MzVjZGRmMjA2MWNjNTYyNjIifQ==', 'eyJpdiI6IlQvODZCNUNoSWdpTmlIemdLUDBDY2c9PSIsInZhbHVlIjoiM1BnaWREZU4vb3hRT09sc0dSZmora1c2MFo0bVN4VFNkSWFZdW84ZWRKOG1RS1lOWDhFL0djZWpCR2FWTE1xVzhFbGYrRkNPcVZ4WWhZUXZiemZoenYxWUpOUU92RG8zeG9EVy8vMnNjcGNFTUNxUFBETXp2T3J1VkhYdjU1Mk11aXUvVTJJUTJZZmluMXFjUVM2bThpSlNacnhiOEFkU3VuMDhzK2F0SzhZPSIsIm1hYyI6IjJjYWQzZTUyZDk5OTJhODUyMjZjZmY5N2YyZWY4ZGE5NTU1NWQ2MDhiNzRhYmJmODgwNDdiMjVmZjYwNmUzZWEifQ==', '2020-08-16 21:59:40', '2020-08-16 21:59:40'),
	(37, 'eyJpdiI6ImtXSXc1eTc4VXU3RDZPM0dFUjViNVE9PSIsInZhbHVlIjoiTGpnRWJmY2pZMnNhck1wMnR1SVNCZVcwQXgxQWtyYTlQY3dwdG1NQmVDYz0iLCJtYWMiOiJlZDBkMDA3OTYzZjY5OTQ4ZTZkODNjMTY5N2IzNzIzYzZiZTEyOGI4YmQ5OTAyNGVjZjAwOTA5ZjRkODA4NDdkIn0=', 'eyJpdiI6IjRua2lvM01sdTR6Rmo2VGIvZkU3eGc9PSIsInZhbHVlIjoiRjhCZlFYdUVxWkJJWmFiVWY0K3J5V3dBbk5telk1WVVJY2tIMUZVbEY1UT0iLCJtYWMiOiI0YmZlNjNiYjQyNmQxNzFlNjg2N2FhMjcyZjMyYWExN2E2MTc4YzU4ZGM0NDM4OWRlMmQxY2M1ODNiNDI1YmQzIn0=', 'eyJpdiI6IlZ4WmZEZXcxYlBDUUdaYmJXRFI5MFE9PSIsInZhbHVlIjoiM05obnNBeVNvbTh0cnFjMW1odG1mbGRzWkpxc2kzcW1DV0QzWVlMRWFnWWRONmZKeHAzT2pNdTJuYzNTcUVBQVNvMmZ0dmd5YnVaTExGbVBTN1RpbFE9PSIsIm1hYyI6ImJlNWEzYzM1MGEzODUwNmYxOGZjZmNlMGJmZjg3ODA5ZjM3ZmE0Yjk3ZjJiYWQyNGNmNDlmOTVkYjZmM2Q2M2IifQ==', 'eyJpdiI6InRScmgrRE9nLzVRTlhCSEE5SjdvaEE9PSIsInZhbHVlIjoieC84YkJva2p0Z0V3eVd5T2ZTbUJYbVZGazBUbURzWi8vRVNkRlUvNDdzTT0iLCJtYWMiOiI2YWJkYTcxZWExOTc3OTI0ODhiNTVkY2FlOWY5NDlhOTdmNTY3NjJkNDk4NmRhZTBiNjdmYTdkMDUzODM1MDM2In0=', '2020-08-16 22:11:23', '2020-08-16 22:11:23'),
	(38, 'eyJpdiI6Ijl5ZDZXcUJVQVB3UGkxYmRreGtEWXc9PSIsInZhbHVlIjoic0N6ZjJKcEJxRDg2eEZkNUxrbWdvTkpqUFg2YWErL0JtWUk2TmVFTG9lMD0iLCJtYWMiOiI3NWNhNDYwODliM2Q2ZjM0OTdjYzNhMTYyYjZjNTg1MDk4MDE3YmM5Yzg4N2RjNWI4ZjRhYzc3NWViNmE1YzAyIn0=', 'eyJpdiI6IlNDcEx3QW9ob2VaSTdzNmpGdnNTN0E9PSIsInZhbHVlIjoiTlgvSnZOOElQQU1LdDhOK0hsM1RsdVZWcHJRWmE2VUo1TTVOM0piaVh6MD0iLCJtYWMiOiI2YzI1Mzk0ZTllNjQ4NDNkMjlhY2Q2ODc2YmVlNDVjY2Q4MmQ5NTgzMzIzNDc1MDc4ZjIxZTI3ZTRjOTc2OGMwIn0=', 'eyJpdiI6IjFoaE1BYTYyamlMcUVFMnNoRTdzdVE9PSIsInZhbHVlIjoiblFJdkZVSEc3bXorKzg3amlJYm5qc1dkUiswR3NXaHFta1J0eXpZdWxEUDlvMU5mNE51RTBQOTZVRjFGS2pweWx1SHFwMjNkQXQvd01XUDNZOEhsOFE9PSIsIm1hYyI6ImY4NWNjZjIxNTAyMTExOTljMGEyNTJhYjFiMzY5ZTY1YWU0YzA2OWZkZTAyYmQwNTg4NTgxZTNjMTBkNmQ1MTQifQ==', 'eyJpdiI6InpDT1Z2SE9QajBKWU82L2FENHZqWFE9PSIsInZhbHVlIjoiaW1pNzNTS1o4NlVzWmZwWFBsT3BITURkRzNSQmY2S3pucWhyM1h1UEduY0lyZ1AxaHoxNWxmN0tpRmh5UnRHNnVsRGRjTWlndFRZN0Z5bWZFVW5ycWJGZUY3WnQrU1d5ZWlhSUEza2tPOXRsbFdKL1lBcjFHOVBKWHRUMmRQTzVpVXBBUEN6MGdpb3g4dzJ3TXZSWGVqQ3ArVnAzVFhSRFpmYTIrZFM1UnRCNGFBMEd4VVBhYXQ3d3l3MUJIbittZGtOcTV4UVNmODJ4akU2VUw0dnkxVFI2L3h1VkxCN1h0RWNYODJsUWdjVUxxa2JtSlk2R3E0UDJUR1UweU1ubkJxcGdGaUlkZ1owOVh0Um5ac3dDN2dkekNGcGhOY0J0cHNDVkNVYUw3S1lSc0laYXR2SUhJSkk1L1FocERHV2t3Yy9XTmpoeU1YNmZ1K3dnQkxPSVVnPT0iLCJtYWMiOiIzNmFlM2Y5NTgwZTNmY2Q5ZmQwODJiNWYwYTM4MGM3ZTcxNTcxMjk0OGRiMjg4ZTRlMDE4MjVhNTNhMzMxOTc3In0=', '2020-08-16 22:24:04', '2020-08-16 22:24:04'),
	(39, 'eyJpdiI6Ik9DZ1J3MjFHd2JVSGxtbFZ2MU1VVXc9PSIsInZhbHVlIjoiM0kwbXlhbUlpV0Uwd21Gc0NNRGgvYTdGWEU1R0xXNEN3OVU2V2JKNTdtcz0iLCJtYWMiOiJmNjI3OTU2ZWQxNjM0NjBjN2I2MmQ2ZWFjZjg0YzI4MThlYWE0OWE2YmNkY2QyMmEyNjFmZGI4NWZjOWUyOThlIn0=', 'eyJpdiI6IlBKKzRDYi9qUmxnRDFWZ0ZWK2pGNmc9PSIsInZhbHVlIjoiTkxwc3pBcm5WS09maDd6NW1RbmtyTlJobW5pbUJwSVJTcmZvSjhydzRKRT0iLCJtYWMiOiJlNTNjODg2OGUwMjk2MmM0N2Q0MzA1ZTliNWYwN2M2NGJhNDk4ZTFhMmY0ZmNjODU1MTg5YTdiYzk2YTcxMjg2In0=', 'eyJpdiI6Im8xZ1JUYnBJLzBmWWRrTUUxSEVnQmc9PSIsInZhbHVlIjoiY3VkSHpsZU5OMGdBZHNPU0ZPdnBtYzVOSmJRRzg1NVozM2VkMFBXa21iNTlva3NYZ01iaW5ueXh1dDJiWE5PK3hmN29QRVpRd1d2MmNlWnc1MnIyNUE9PSIsIm1hYyI6ImRjMTE3MzcyMGZmMzQwZTEyODFjMDA3Y2YwZDQwODFmNTM0M2Q4M2YwZDcxYmE0MmM1YjM5OWZlODU3ZGU1ZjEifQ==', 'eyJpdiI6IncwVENOeWNIWTdUa0hWQ2pSUHU4OEE9PSIsInZhbHVlIjoidnFpZzhnd0gvcGovN3pEK2gyVUNjTFJpUUpiajI2d0kraHRSdTBBUlo2U1dmdlZpQjYvVnhzUDc0bGlZYVcrMWZkZWV4RXIwVzJDNFJBenhKbzBaOFR2amtqa1BOQStqcTZ0ZjNSbnNlRjZWMnhYSmJqQ1BmRnI4dXlxSWdkL0QvRjFkS0o5SS9EVFlkSER2dnJySzBNYTBtRzBJQkZRSG56NGkrSHA0WjVBRkRjY2x3anZNbGp1VWt5UmxiVHd6Qmt2SDhRZTgvZEgrdFM3dmphNVcvNTZlcWwrcmhHZzJ0aWlIQWlrZTF6Tkc2TGdIVXZuWGtqWU5lWWxCanhZR0ZlcmZGeVhES2RmUW5BdmN0ZXdGREtWQlAvOFFIMTZ4aTBaRFpBNG15MUtmZ0pzYkovRDdSb3k2R3BhUVl1d0hwWjR5VzVqalhUT3VaRWJqSEx1czdnPT0iLCJtYWMiOiI3OGQ2MjlmNmM1ZGUxNjAzNGRhNzFlMGQ4ZGIwZGJhMzI2NDRmNThjZWYzODNlMTE5MzZiNTg5NTczNGVmMzQwIn0=', '2020-08-16 22:24:16', '2020-08-16 22:24:16'),
	(40, 'eyJpdiI6IjhFaHZES1RybHhSNm13cUpsM2plUHc9PSIsInZhbHVlIjoiN1Voa1ZiNmxkQjFOckhXaFVwYXh0RmY0VUZxWVQrMXoxRk9mNmhHaTJGOD0iLCJtYWMiOiJlMGVhZTkzNGEwNGY2YTdkN2U5Yjg4ODY0ODRkNDk2MzAwNmI5ZjNlMjY1Nzg5MDc3MGYxNTI3NDI2MDU4OTkwIn0=', 'eyJpdiI6Ims4N216NnVtMDdtaVRKc3RFWDJuWlE9PSIsInZhbHVlIjoic0lFT0FseFhhZWtKdzJFVDF0L1ZwekRsOG9iWDZKWmNUUzBQT1pzYlhhST0iLCJtYWMiOiI3MWY0OTY4YTUyZjdjYWEzZDFlNzdhZDg3ZmRjOGZmYmVjMjVlY2MxNWY3YzFjMmFhNTY5Mjc4YjcyNzYzZDU3In0=', 'eyJpdiI6IjNCSmpyVlB1alcrZlhOQTZmOGtneVE9PSIsInZhbHVlIjoieFhmTjB2dE8vN04yT2dqNFZWOTlRZk9Ja21Vb3BNN3hGWlVHcWJhTmFxRG5qa2g2VS9oa3V6b2NMc25MWnZpYnc3aE5mSlNWNmxBVGtwVHQvRGEycXc9PSIsIm1hYyI6ImNiZTlkMmM0MjEwNDQ0YzAwYjY0YmZlOTQyYjU4NWY1YTQwMTJkODVlOTc5OGU2MDk5NmU5NGQ3MDZiZDY3N2UifQ==', 'eyJpdiI6Ik9kMklNM3RFeUhubWJ2OWFpVm4vOUE9PSIsInZhbHVlIjoiQTFwQTNRV0orNzJzZytBTTBZR2dBRHlmVVFRcGo2ZHJ2NGJqMXBDTkVlbHJCaDNxY2I0VjdqMDl4UFAxclJtRkJjTk1ibVZWYVpNcWF4Y2M4bVNiakdrbnNUN2I0eHRmUkVXcEMrS1NNY1RkREJYM3NLd20zOWF0QnRUZ2dMKzdXWEZON3hKdDl6NzVGUkplSVlaWjBkZVZQd1h1YlRjb2h0OHpDTnBQazM3ZW9UQnNyUmpFYnYyV0IzNDBYTzRteDByaE1hSkJwRGxUVlZrR2FSNTNERW5HRHU2bmJPbDhDNGhCd0NSemNBaHA5MzJib2c2TU1PSFRMNVNySFcwa01ud3cwQUJQZkQ1NDdQenAvZ0ZaNnRDVllkVmlJb1VYSGxuYURMZ2F1YVdqbzJha0dkTk11MXFXUE9id3RtUnZKbnd3R2xLMXNETTRpTm5vRlBCcHZRPT0iLCJtYWMiOiIwNmJhYzhjYTZmOGNhNWQxZTBjZTA4NjE2NWU1YTMyMjdmMTA5YTk0Y2JjZjBlMjMzMDRmNjhkZmY2MGU3N2I4In0=', '2020-08-16 22:24:45', '2020-08-16 22:24:45'),
	(41, 'eyJpdiI6Ii9sc1FNdU9CNmFkVTZ6WjFHQW9SbFE9PSIsInZhbHVlIjoiSm5oSEc1TTZyd1pSeE1BbDh3STVNcWhKcjZ0ckxhaThPdi9VaU81OGNkdz0iLCJtYWMiOiI2ZWNlYmUxNjIzMTBjYjhkZjRiODc3NGIzZjg4MWY2NTk2ZDAzZWVjNDU4Yjk4NmRhZWZlMTYyMmVjYWYwZDY3In0=', 'eyJpdiI6IkxpM3BGS3FBQ21zZHlDZ3ZtNkpEOFE9PSIsInZhbHVlIjoiMUVkaE1JWDZPdmIzemtJd2k5RU9tcklLbkYxLzBMa095NUNVUkNvN1V4dz0iLCJtYWMiOiIzZjVkYzU0ODNlNTYyYTVkMzk2ZjVmOGEwNmFiYmJhMWZmMGViMWVkOTIxZmI0NWUwNWM1MmJhNjRkODFhNTg5In0=', 'eyJpdiI6IlcraTBndFZFRzkwVVZKbUh2L3U0WUE9PSIsInZhbHVlIjoiRzdPcytDVUIrSSs1czd4TEFmd1M4MkxtL0YwU0dBSVQzaGZybkVzenk1bE94eW1HUUd1TU5MdERPYTdiTzJVaDFnR09Vc24zZ211ZXlZY3RaajNvSVE9PSIsIm1hYyI6IjFhMjUyYmMxODhjYzA2ZDUyNTc5NzRjZTU4ODIwNTY1YWVhZDVmNGJlOGJlNzNkZmUwNmFkMDFhMzYyMDRkMDgifQ==', 'eyJpdiI6IlJDYkxNTEZtMFpWWExpNlVNN20zbUE9PSIsInZhbHVlIjoiWXMyM2NNMXBJZGZVVldZNDZVeDhZeEdVR1l3SFZOK3hPTE1WcjVSUjZXVVF3Mm1JMWpTTEVTcFFCdG1STU9xZ0RST2R0bUJGdWUvbjVQS2xFMEpmalc2L1AwV3JFdlVxc3YvZHRIaFJud094MGdtNnF3RVI1V3lrNUJBaDZyb2FQYWdUZk1YNGFQcnBXNDE5clFlQXB5VWZUc3FPZGtOSjNuNytDQWFWLy9zUElRRUxTYXpQRFIvV21wU2FKMktZOTU2Q1dSbm1XL0FkZDQ0cVJ2ZGUxUT09IiwibWFjIjoiOTcwNzc0NzQ1ODQyYjdlYzM4MzA0MmYxOTIzNGI0ZGU2OWNhNzQ0YmNjN2NhZjI5ZTk1ODY3ZGExNDg5M2ZmYiJ9', '2020-08-16 23:12:29', '2020-08-16 23:12:29'),
	(42, 'eyJpdiI6ImFYOERhTzlnTS90cEFlT1dPZXNrM0E9PSIsInZhbHVlIjoiNGRUUW0xNHpwMDdUWFJSdmVKL2gzWXhoUEtMdVk5dGpaUUtVd0w1STU4dz0iLCJtYWMiOiI0ZDU3ZDVmZmE3ZjY0YWQyNjhjYWQ3OTc2Yjk0NTVjM2RhYTJjYjViNmQ4ZDc0ZGZlMDk3M2Q5MWJkMTc5ZTliIn0=', 'eyJpdiI6IlovREIzMlpCdzBhMGZXdG4vTDFjOGc9PSIsInZhbHVlIjoiQ0w1bWVvcDYxb0lIV1c3RGFrQWlsWWg2VzhQdm4zQytwVldvU0g5eGVpQT0iLCJtYWMiOiJiMGM2NGFmZjMxNGJlMjViMGEwYzQ0YzdlZDNkYWMwODdiMDI2ODdlODY5MGQ5ZWMyNzM0MDE0NWIxODNmYjYwIn0=', 'eyJpdiI6Ijkxc3dBT2lVaVhqWHd5eUp2TGZ1Qnc9PSIsInZhbHVlIjoidmQvcWo5WTF3c240c0wrMUVSK1dsQ2laR29RQllLUlFQb1RvUStQWHN5M0hkRTJnSE5rK2lDbzZXOWJMOHNnUUxFdkRkOVhXSzZPV0ExV2JYR05RQkE9PSIsIm1hYyI6ImFiMGE0Y2ExNmE2NGNlYTU3ZTY2MWNlYWEyZTY0NDc2ZmQxZjVjMzA5MjM0OWY3YjlkMWFkZGUzYzY0MGVlZGUifQ==', 'eyJpdiI6Ikx5bldZMTNGMVBJaW9RZHVMT2UxbHc9PSIsInZhbHVlIjoiUFlBbGM3QlRiYi9GM2xTcFFEd0Q0aWdxMGtiQXlPOHJ2MllSbElCQlUrdnlaSzIyR2h3aUpqSEhCVkhheVJrd2NiNlFtaEdqM0dacFo1eXJ2VCtHdENxVDltUXFwNDVHcGxCemVpekFzVXBLWU4wMTRrOUlWbE9ZdFo4Ynl5Q2dabFl4RGpsWHlTaEk3QVFuOUtHUWY5WVFKRnBTSWhBdXpUNklHUmkxVTh5NHUzQUk0elFJcUxoc2t0bVdpcHdmIiwibWFjIjoiZGJkMWY0ZWRmNDllZjUzYTBlYTBjYTAyMTg4MDg4MGUzMTRlNjIwOGQ5YmEyNGVkMTFiYWQwOGM5YzQ4YWE4YiJ9', '2020-08-16 23:23:38', '2020-08-16 23:23:38'),
	(43, 'eyJpdiI6ImFacUxhK0dFSGJwUHpLZnhqMHNKcGc9PSIsInZhbHVlIjoiOFZjYlBscG5NMXRhM3lXL0UzcVh5UU1BMlhRRjdROFI4T0M0VXVBeHhPdz0iLCJtYWMiOiI4ZDBhYWQxY2UwMjI4M2FkMDZiZmJkMzY0M2MzNmExMTY2MjViNWNlNjJiYzgxMGM3YzFhNGNiNGU5ZGNjNmYwIn0=', 'eyJpdiI6IkRVV01kSitycSt2OTZtd2prWUpBbWc9PSIsInZhbHVlIjoiSVZMUmFZbmZyMHNsbE15K2JvNDhndThBNVpROE56OE9RaU1uOVJHVHY0RT0iLCJtYWMiOiJjMzBjZmFiMTFmNTg1MjQ5ZGM0NmNkM2QxZjgxZTk5ZmZmMThhMjUwMTNiYjQ2NWNjZGE0MDk1ZjViOGQ1NDgwIn0=', 'eyJpdiI6IitBMDZ5ZDRNbTA3MVl5d0dhYmViaHc9PSIsInZhbHVlIjoiLzZvQmJQL0g5OGgrN1dCZ1pKRmRlWUpHbWZMbGVNWHBBMmZqVmRLajlMd0swTnlySks5N2w3UDFYbFlmWjMzTncrdytuYXJKckdKTVN5NkNab0lUY3c9PSIsIm1hYyI6Ijc2ZjYyYjgxMTM0MWY0ZjBiMjQ3YjhhYjAyYWQwYTZiMWQzYzkwNzJkOGY4ZjgwMDU1NGY1NDkzZWZmZjkzMDYifQ==', 'eyJpdiI6ImRQOUxMYUtNYWcyb3dJNHlYaWdOcGc9PSIsInZhbHVlIjoiWEdTZmJiK0F0RTJDMEJjZ3VFdVdCZWF3RmRFcjlva21GaGhIdUFldENYSkxsZDZHa3B5NHV6MVcyUG9NOEVkMkZwdTJqOUd1WFZKMm8xdHc3ejA1SlA5TGJwclBmdW54QUlIMk00QVM0bkZqNzQ4aFVWTDlCdHVVQnVWN0JDZWxvT1Jxc3Z3YktYM1J1Sjl1S1NOMHlyUFcwSWR2c2E4eDQ5Wk1IOU5xMm5HSmpLSEVrZWxFZHdJTndMRW1JY0xsTUxyTXFZZGlIM3VLdU53YTN3RDl6R0JWT1pYVyt2RzdnditzM2ZpUUNyWnFtcVVGMmRpelhGRlIreTNDaE1Id0h1SGNCL0N0T0FJR29jYldYZjFKS0V0TmllY1prZ0lNTnBmMlVkTUhyb1JTSnVBR1NVTUlmZWwxWnVMVVpKanl2YnYrY0s1YjRGbkgrQjBSRVRabVFUSkRRaDhDOFZDZ3R0M1FIRnVYQW1CYjE1T1grZWRZRUZIMWRCWnE5VERraUNsY0ZsMGYzT1lhMExQakthUVUvQ3JkQXlxaTZLanNoS3pjYm14eUpacUdyRnl1WW5iWmtwUXU0YkJhRUkzUU1JVDVUQ3Jtc3FzNHlheGRRZHNYdGc9PSIsIm1hYyI6ImUyYTNhNmYzNGRjYzVlODdjMWJkMGYxYWVhZjVmMzAyMTM4ZDc2MWE5ZWM1OWM3NDFkMDVkYjFiNzRjNjgwMjQifQ==', '2020-08-16 23:44:12', '2020-08-16 23:44:12'),
	(44, 'eyJpdiI6Ik5hRWFRbkpVcW13R0FEMlFPeFJGK2c9PSIsInZhbHVlIjoiNGNoTGswWFRkcXJNV250NWNmK0FpdXN3SmhMaFJIUi82OENBM3JxN2NSTT0iLCJtYWMiOiIwY2E1M2RlZDYzYzkzNGFkNGYxM2ZmYWJhZWRjNzk1NGYzOWE3ZTczMTM3Y2IxZmJkYWVkN2ZiODg3MDhhOTI2In0=', 'eyJpdiI6Ik94SVJRTzlaUDRKelhMVENSZkwyWUE9PSIsInZhbHVlIjoiSnFWaHdqUjZaem1zVmRkMUtwL1daTTFYeFJyQllJdWRIYUpoeTF5dWFQTT0iLCJtYWMiOiIyMzAxMDA4ZjkzMGU2NTNlMzU1NWM0M2Q0MWNmNGVlY2ZmNTQ5YzIxMmIwNjg4YzI5MzQ1NzM5OTRmNzgyZTA0In0=', 'eyJpdiI6Inc1enljaTBCcFMxcjZ1THdpNUVEUXc9PSIsInZhbHVlIjoiNVAxaUlIMldTTXpYdE40YXdYTEFQcnF3KzRkY1ZMODlyK0RObmhkOWdSQitwbzVqNFhCR29PbFNKTFBSZ0pSa3A4N0V3VW1pVnpVejVWTnRNS2tRU3c9PSIsIm1hYyI6IjJiZmRiZGY1NTMxYmE4ZmNmNTFhMjYxYmRlNjg1ZTYwYWUyMzRmZjhhMmQyM2QxZWNlYmRjZTllYWQ5ZmM0Y2YifQ==', 'eyJpdiI6Im1IYVE0U1VCRmZ5c2ZjVzg5ekltRUE9PSIsInZhbHVlIjoiNWZseDh5NE40djZCZW85SWRUMlVqamR3WE0wdmxlZGJILzllZXFPaTl3SzhjWnIwZDBYSEhNbE0vY2lWbitJdzNvRzFSTitJK3M3RjFHY3AzbUxZVi95aVpoNjZ0NDArQ2h4cE9SZkhNNS82QmVMZDh3UjJ0bVVNMWZrUi9rSERlSFVIOUo4UWNJVURtd3pmWGNFa1RZYzhHUGdNUTFEc2VVOWhJMTNKTGhEVTZ0YjNnNEx3UjBteEw2WXpNMktGeFoxMW5lMWFXVDJxY2pjOVFQZzVMZz09IiwibWFjIjoiNjZmMzgwOGU5ZmQxODBjZDliOWM0MDFiMTkwMTBlOGU1MzdjZGUyZjYzODg1OGJlNWNmNTVhZDZjYzVhM2Y1OCJ9', '2020-08-16 23:44:52', '2020-08-16 23:44:52'),
	(45, 'eyJpdiI6Iis1Y1MrS1VWWmFxNGdFNTBEOWx6Tmc9PSIsInZhbHVlIjoiU3E0bE0xSjhaTzJvakZRdzJodSthREZhd3NFb25vSUh6YjE0T2xrOFhBQT0iLCJtYWMiOiI4OTFhODcyZmI2YzBmNWU3NGM1MTk3OWNkNWU4YjlhNjIyZjhjMTAyOGM3ZTMzODZhOGI3MTViZjg5MjkyZTJkIn0=', 'eyJpdiI6IkpYcDFRQU02SjQ4SStaRHNyYWF2R1E9PSIsInZhbHVlIjoiV09iam9raVQrTWEvZTJwNVlTRHFrUHF4L2xmamVKNnFNdnU3N0NZcFp5az0iLCJtYWMiOiJiODE2MjE5NGQwMDE5NDIwZjk4NjUyZGFmYzFkMzQ1ZDg0NWQ0ODMwZGJmOWQ5ZGIyZWRhMWYxZTA3OTE1ZGFkIn0=', 'eyJpdiI6ImJpUG8ySWxiZFk1MWwvd1VmWEFJSlE9PSIsInZhbHVlIjoidXh3Nmk2ZFFZSi9WdkhlSTY4a2VIS3VTQzJUUUlGejRKYVFhcHIxOWFQM3BZQnlkMHgvYjhYNmc0cW1XQ1RaRDZvMEt6cTlFbENid3l3a1g1b2lxUEd5a2Rzc1lZcjE2U3ZxczIwWWh0OGM9IiwibWFjIjoiNzAzYmIwNTQ2NDU0MmE5ZmJlMDBkN2QzNGExNjE3YjllNmZmNThiMTMwMGY1ZWZkY2E0YTQyNmMzNmMzMjY5YyJ9', 'eyJpdiI6ImFmYUM1cm1oZEJQQWtwbkFENXNjVEE9PSIsInZhbHVlIjoiUG5XWHdMd0dRNWMyNEhNMVF4MkxhcjlOQjdUSndVN0hyVzJjOW9yN0dNRmtGQ2JSQU5xWXRHTnJ6WTBVYTRwM01UVGFZMTVPZ2Z1aTF2djE2VHdsb3c9PSIsIm1hYyI6IjE4NDFiNDZlNzJlNjVjN2JjMDRjNTJjODYyNTYyZjI1OTNjMzA1MTUwOGQxNDYyODVlZmVmZmVlMGVjNzQyYjMifQ==', '2020-08-17 01:43:21', '2020-08-17 01:43:21'),
	(46, 'eyJpdiI6ImtGajNLYWFEd0d0TU9BQ0dPSTMwNnc9PSIsInZhbHVlIjoieTNsZnB5VUVFa0doVEpzTDJmUTUrZkRlTHdWSUZ5aTlaUm1CNG50RDR4cz0iLCJtYWMiOiIwNjRkMDI2Yjc5MGEwYzFkNmFjYWU1YzNmOTE5YzIzYjI0YTYyNGRhYTBmYzBjNThkMDNhMWEwNmY0NDdhMDAzIn0=', 'eyJpdiI6IlJ0SXlWSFZ2ZFBPWmY0M2xZbFUxTHc9PSIsInZhbHVlIjoieEdOeTR4dlpZZS9XdHRmM0pDU1hLNFhWV3QybXlEYXVJZFlBMU9Ra3RKbz0iLCJtYWMiOiI4YmQxM2YyMTFmNzI1MTczMjI2NTMyZDllNjNkNmM0YjhjODNhMDAyNjNkZDk1OTVkY2YwMjEzYjY3NmQxNTdjIn0=', 'eyJpdiI6Ik9hancyejNHKzBHTmV3UVEvV0RPdnc9PSIsInZhbHVlIjoiSXJEaVRwcnFaWWYreGg4WXlNVmJqMFhQbmN2Yi9rZ2dicUhHWmRQYitMdEZtWGZ4TERIZ0hMNlNqaXRSb1dmaDV0Mk1OSUtMVG9ydWsyelROR09mR1lhSVg0eWVkajhnOGVrb0YrZlE1dWM9IiwibWFjIjoiNDQ4M2RhM2RhOGQwY2I5NTRhMjNlNGIzN2ZjZjkzNjU3NjliMmEyMGYzM2M5Y2E1ZWZlZDE4MDIyM2Q3NWI0YyJ9', 'eyJpdiI6Ilp6cFdxTm8xVWp5QUlTdDE3eENuZHc9PSIsInZhbHVlIjoiK2dIQWxyR2IwbTgzdXMwaTlhQ1puT0FCdnJqckppWTZvVC9lUDFLdVBvK1NWTjE0ektjYzhwbXdOTnorWWRuciIsIm1hYyI6ImY3OWM0YWRjYmMyYWY4YjhiZGI2MWU2NDZlMDM4NTU1YzgyMDIyMmYyOGJlYTIxN2ZlODIxMjgyZmFkMWNhMzcifQ==', '2020-08-17 01:56:55', '2020-08-17 01:56:55'),
	(47, 'eyJpdiI6Ijc4dGtQQy92U0MxMjBKL1ZDR3FhV1E9PSIsInZhbHVlIjoiNXdHcnlyNEYyTVRuVk1MWXpTTU5KN1FyNWYveEs1UVF3MXhhajdRaHhrOD0iLCJtYWMiOiJkZmE0MTAwZmUxNmU0N2MzNjlmN2I3NDY0MTIzNTRiYjA5ZTdhNjE0OTdiMzQxYmNhMGRlYzU4ODIyMmMzYzk5In0=', 'eyJpdiI6ImZlSHIzTEtaMFNxOUhMT3dUTlNUNUE9PSIsInZhbHVlIjoiUmtXOUVGSVZpaE9Cemo0REU1d0xXQTFHbVh3N3N4T2NmNENiMnVPZ25lWT0iLCJtYWMiOiI5MzdkZGQ2Y2YwNmViNTEyYWFkMDJmNGQ1YmZjNzBhYjA4YTAxYTljNjE5YzhhOWIxMzVlNDAwNzc2Nzg5YzliIn0=', 'eyJpdiI6IlBvN2tTMVdIbThFRkJUSTIyMS9WVFE9PSIsInZhbHVlIjoibDVxY0dyaGl3OUdPMk9EbmEvMGtlbS9rdkNSNjdsOE1IOEtnT0N3a1ZiR0gybHp3UXM2Zmt3RnVUT0VTQWRZQm1pS1NEVE9oSlE4SEVpR2ZiLzVmS2c9PSIsIm1hYyI6IjdiMDQwOTc5MDI4ZjdiMzllZWE3YjUwODI5NWUyOTgyY2U4NTEwNDE2OTc3ZWE1ZmJmYjI2NzQ5MzYzYTMyMzkifQ==', 'eyJpdiI6InQ5OWRTUDkreXVWQjNCRmgycExBRmc9PSIsInZhbHVlIjoiUjBlVXNpaEY3RHZ3ck4xazNiTG5EY0pxUlVpblJGTi83WlE0YWtaZ3dMaC9hQTBSZW4yNTRxZm1TMmJpc0REbWFHeUozZHk4UmxzS1dnZTVoUU1qdHpsTWFtVWdBc2RoUm4wbmx1UWhQanpmcmJhTTB4bGsxUkt5Q2IvUTJxcFpsa3BscEk0S1dya1ptbjFXZHp6aFF6Z3ZkYm5nQ1lPVnpJWVdwYWFqOTRxai95djRtRGcxMEtOZmhPK2xuMzU4SzVqV1M5SzNOWk5GZUhTMmxKd0doUHdyb2haeVdaS0I0UWN1Q0hQQjZJWGsyeHd0eDk5Zi90M2V0enJuWG8vSGZOZ05hOStVM3RjUk9KOTY4cWlVY05PMkZOK1plZFkxSUF1SmJBNXozZEZ3MFNCR3ErNGdUcVU0S2pLQko2QzlGKzhCRnBTM3BXODlISGVzbVhCUVdPL2tUYjJ5clN2cExhSHV2bGhsZTI1Y0k2dkZuOFNRZjg5K3RsSktZQWJzd0xLZG9ORS9rK3hCR0lRVWliN1crbVZSTXFENmVuR0RrZnYvaVZhL2VwaUk4UmkzVUNPeTFaUkdaRlg1d3JYOXJBanhPTGxUcjMweEdwd21wUzBtRmtNUXR4V3RyZko4SG8xcm54emNlL28rR09rL0FlaWNaVFVYN2Fyc2VwWHF6Zkc2T3FhVE82QnZ4K2xXR2FzUktTT0k5c3RqQkpQc0NwNmhyMnFFY29lNFpYT242a1BhWDZBNzVsaXRXOGhKRGNSS0NUeTB1bVFDUDRYWWIvMm8vWjc3WVp5OFA0MEpRQWFHdjZqQ201TT0iLCJtYWMiOiJkY2VjNDgzMjNlYzc2N2ZiMzIxYzM3YmZjOWU4NmFlODRjMThmODFhNmQxYzBlMGYzNGYwN2M2NDNjYmVmNjZkIn0=', '2020-08-17 02:17:52', '2020-08-17 02:17:52'),
	(48, 'eyJpdiI6Ikh4d2JyMU1kY2d4eDB4bm51RDQ1VFE9PSIsInZhbHVlIjoiL0xpTVRmNWZORXJoVVBSbWtPenBOTGVQNC9tT1BZZnU1K1RmL25PeHEzTT0iLCJtYWMiOiIxMzAyOGUwODFhNzRkNDQyODMxYTVkMDY3ZWQxZDM5NGYxODJhOTNlNzVmOGE4ZWI1YTk2ZTA0NjYzYmFjYmM4In0=', 'eyJpdiI6ImE3UFROYTRNcTR3Mjd2eHB0Ukk4NEE9PSIsInZhbHVlIjoibTk2cGtZOFhVVWJqcWFUdTMrQ2Z3U3ZxMVhoWnhocUJRU0lnQ0xRSUtVQT0iLCJtYWMiOiI3YzhjMGRiZDUwZWUzNGU1ZTBiODJiZGY5ZmZiNjg3Y2Y1Mzg1MTA0N2IyOTIyMWRmMzE2N2JjZTczZjQwNzBmIn0=', 'eyJpdiI6IkpqOVdFa1NSeGZwejhSQlBNNFdYU1E9PSIsInZhbHVlIjoiaUNoaHhZK2xtQ3JpdXhVd0hQWktwOCtGVkMxZ0lac254YlpXOTVrME80NHVDdVZudXVzWXIwVVpHTFIxYzlkQ0gydU16T3BiazhnMmJvWm1ESDVQNnc9PSIsIm1hYyI6IjAwYmM4MzA5OTUxNWYzY2Q0ODUzYzcxMTU4ZTZkZjhjNTNhOTQ2ZjRiMWJiMmRjYzg4NDBkMmQ0MGJlODdkMmIifQ==', 'eyJpdiI6ImRTOGYwWk1QVzVhd2dsck8rd1ZYcEE9PSIsInZhbHVlIjoiVmxydklZN0VmdlBQZ0FxaEtjOGh2alBBOURla2JBN05XWXk0ODA4K2RyckxaM1dvSTJSWXlucTQwbmNhMitqRFBtUnBWajAxS0ZkdG1iajlFbmJONUZHNlY0Z05UMksxNnJzREJPbDM1MkRmT1BjaU9OdXEzQVJNUzE5OXBOeVlCT3pXVlp1UWl0TlE1TlVJYkxVSjkwS2J1eXYvbmM2Q0VidDJUdkpFdmpyeUh3RzVKa1VvK3BuNHlQR3FzVlpZNUFUOEhaVXh3dG1xaEZWMWZlY2hDd1ZiQUlSMlZYQjZTZHZhVDhtTVZFbmNIbzdpYyt5bStmYjFIaWZVN3FOK3dvdlVFdnV1ZFhjZzRHdUZiNG1TcTd5K1hkaUZXQnE4alRDcmhFSmR1d0NnK0JwZXZRQjZSbnRNckFNMW01aXU2Tnp0U2s3RngzSzgrR2VVekNjM2pBPT0iLCJtYWMiOiJhYmNjYjgwY2U1YTYwZmRmY2NjYWRmZWJmY2ViMmRkYmJmYjk3NjM3ZDdkZDIyODhlZmU4NjJhMGQzYjMyMWEwIn0=', '2020-08-17 03:58:37', '2020-08-17 03:58:37'),
	(49, 'eyJpdiI6IndBMVk3Q2RpMnFrc1gyRndWM0QrdUE9PSIsInZhbHVlIjoidll4ZEZFVlJBdTFEOE1tZW82UWpsUmFrOU5qQjZ3NFRyU1lBVURqb0kycz0iLCJtYWMiOiI4NjU1ZGJiZDY5NWJlMDVjZTc1MjQwNzUwM2FlMWFiY2VlNmJjNDk4YWU3YTViMWEzNWJiYWUyN2U4MTI1M2ZiIn0=', 'eyJpdiI6Im9LbHcwY3FMdHFacVhtZVJuSmNUQ2c9PSIsInZhbHVlIjoidVlIVWZLSGcvTlNZYnZHWFhLZEpvY01ndzlUaFEzS0ZNZWI3dEE0UHUyMD0iLCJtYWMiOiIwM2IzODE2Y2ZkODExYzA1MTc3NWUwZTJjYWNkNmRlOTBlODZkY2ZjZTc5MjhkM2U3OGVkNGUwNWU3ZWRjMGIzIn0=', 'eyJpdiI6InlTd3FPK1VwWUpxM2s4a2FWWkhJbVE9PSIsInZhbHVlIjoidkl6empwc3I5VGZHUDd2aHpXNlY2bjMzcXFxd0l3R1NYMkxyVlN3aTNOV0c2K0JtTjdKK2dseXJWVGdGRnMydGQ2elZpNlRIaW9JWjVqSkFCbnBTalE9PSIsIm1hYyI6IjMxNjBkYzdlNjUyYjllZTRmMzA2ZGFkYTllYWJjODM2YWM1OTQwOWExODdjNGYyOTM2NDkwZmI1NTY1MTc0NTkifQ==', 'eyJpdiI6InJ0QlFJSVMzazA5cmNIWk9IeVlkYVE9PSIsInZhbHVlIjoiMGt6YjZieEFZMTVRN0Rmd1EvaWNUdFhJdW92N3ZvRjJSU0hqMVlaaVlkUU51SDMrcno0a0JMQUZDR0JvMmV2WTA4YklCMXY2RFk0aklud3NLMUs2QWdjVDBSYXJJakhZWGxkeVVkM2ZBcWYxaFIrbUJGSnMweWpkblhldldPRTVEQkFhSnRIc0NWblJtOUk3RVloREJDa1djK0l3U0VPMDBwdVdFZFVMU0xtbFJLRldGWUlHdmdiYmprZHM4Nk5VZ012SkMxWU56Q0Vvdm5yUXNhMFBJc0JCNlZ4dEQxb1FZRDIzdEN3RUNzWFE0K0xoT3MrdmQwTE9HTVpYcUQ2bkNxbnNOVWFBVjE0M2laeTNyVUxFY3RlVk9tZFg0ZGh5RVowR2dKZG84UzRNSmU4QTI4Y3ZlZXdiZ25nRi9Sc2hsQUwvZndtbUUxdWZNNldiTTI1L3pRPT0iLCJtYWMiOiIwZGMzYzM2ZjM5YTA4MDlkYzM5ZGJlOGYwOGZlNDg5OTU3YTg1Yjg5YjQ0NDYxMDgxNDIzMTI4OGE2NTQwODVmIn0=', '2020-08-17 04:00:19', '2020-08-17 04:00:19'),
	(50, 'eyJpdiI6Imw5UlFCc0d6ejMxT3ZBclF1UkNYbWc9PSIsInZhbHVlIjoic1h3cm5EY0htWmt4RFBzaVdpUzYyaGRVSTBzZi9hRzZtNFZNYWt0R24wcz0iLCJtYWMiOiIwZjNhYWFmMjZjMmVkNjNlMGRjZjMxNWZmOTc3ZmI0YmQxOGUxZWUwY2Y2MDZiMmEwMWZhY2ZhN2Q5ZDQxZjNiIn0=', 'eyJpdiI6IllNd0RJMkprakhZTXJEUDRVSFM4dmc9PSIsInZhbHVlIjoiM2JDSStjTjdPMTNGTE1nYytMNkVDOTNIaWpIbTdEa1pYY1A0U0Q1dGtrUT0iLCJtYWMiOiI3ZTQyNTI5YzA2NWNhZTRiYTAxNDY1ZjY1ZGE2MjBjY2MyZDE5YTE5NTg4MDU3MzM2MDg5MDI0NmQ1M2ZhNWI5In0=', 'eyJpdiI6Imhyd09wQmV4QzUxNEhPZjdJTDduNmc9PSIsInZhbHVlIjoiRTd6dDZrRElHNHlma0lXNnBUdjR1MldBUTJ3SzNhay9CR0ZjVjV2NzFkK3dXS2RWMDI2TER5SExIMVdrc1JTb1ZKUUZCTHZOZFd6bDU2RUJ3Mkk0Q2c9PSIsIm1hYyI6IjA4NWRjNTBhNzc4NjY4NGRjOGU0YTQyMjk2MWRkYWZlMDYzZTY5M2E4OGVhZDAwZGY3NzlhMGI1ZTdhYTc0MjYifQ==', 'eyJpdiI6InNjQjNHSUkwY1oyWWdnUnhNSGRMbVE9PSIsInZhbHVlIjoiSEJzR0ZYSjZiMzFJTW5NMXpHbmExT2JCbnBCdG5SaHpTdDVtYVRFRXJweWx4b1Fja2hDVTJYVVpMb0FUSjF1Z0tUQUlLZXJ5OXNoM3VRclRWcTZqZk9xclBhM2pIeWx5ZDNMVE1yU0NJQUZjUXBVaUkySXRPeitQL0ZscmlPcVIyNlZ0cWRycGZSRCtsMmZRekNjUjBEYjhIUzNsditzM2ExWUVtbWVMZldrPSIsIm1hYyI6IjZhM2VhZWE5ZTE5MTZkNmVmZGNiOWI5N2JiOTg3ZDc3MzQ2MDlkZTA1NWYxMmJmNWJjZDg3OGQ3ZjY3MWYxYTcifQ==', '2020-08-17 04:46:23', '2020-08-17 04:46:23'),
	(51, 'eyJpdiI6IjNIdVZSR0lIR3huYnNDbzFScmJJNWc9PSIsInZhbHVlIjoiNzVFRkgwTWMyTE1CMmwxQTFudnpFQT09IiwibWFjIjoiMGNkNjlkYjM2MjVjODQ3MWI2NGVjMDMzNDJlMTNiNzVmZjdkYjczZWE4MWI2MDZkYzk3MDdkMTg5MDNmYzIzNiJ9', 'eyJpdiI6IkJreEpiRTJldm9FYVNuT2ZVMGwzbVE9PSIsInZhbHVlIjoiSnFHczRGVnNvY2x0QVd1VUo2by8xT0w4TEFabFdwcm5PV2czSDBqTlJKOD0iLCJtYWMiOiIwZmI0MTY4MjUxYTk3YmRiZjMyYzc2NDQ1NzcwZDc1Y2ZmZDcxNzUxNjdkN2EyZTE1ZmRlYzI3MjI0NTk4N2YwIn0=', 'eyJpdiI6IklvT2ZidUttbXlVekEyK1ZuUmxWUUE9PSIsInZhbHVlIjoiMjFtdjF4OHRldHN2NGtoRHdiOFRCZHg5RC9XdENwSHBuNlkzdkE3V2d4R0ZsYmZ5RlpIN1M2ZGJsWmlJR1lsUFBPekRlS3dmL3Vybm9zRHlnTUFUTHc9PSIsIm1hYyI6ImJhZDY5NjI1Y2M2ODRjOWZiZDQ2ZDA4M2UwOWEwYzhjYjNkMTY0ZWFiYzhlMmU4OWJhYTNlNTk2ZmVmYzM4ZWUifQ==', 'eyJpdiI6Inhzc1NqOUdUVmpJZGZIeWM2TVREU1E9PSIsInZhbHVlIjoib3dLeXJpNCtDU09hcnltVGxucjE1NG53RjR4OVdNZGtVV1VoUkdQTllMWGRERml1aE40OHYrZUFiZXliMTdJQVhEazh5NkYyOS9uSkdlbVA0bUFhWlUrcVBDOHc3OE93NFI5TzdlUnlua0V0SktMV1g3R0w2RnZPSzdnbXhTVVYiLCJtYWMiOiJlNTJmZDEyNTQxMDA3ZDQ3NzE5MGM2MDRhZmJjMzY2NTQ2OTlhMDc3NDVlZGE2OWM5ZjFjNzMwZTk1NTcxOWExIn0=', '2020-08-17 04:46:24', '2020-08-17 04:46:24'),
	(52, 'eyJpdiI6IjR6bUZ3emhZQzBRVWpQbGRyNDh3emc9PSIsInZhbHVlIjoicmNoUXpwa2ExV2oxRFIxZnAzSy9vZVlxQUJhaUdncVZnSExXVmwyUkF6VT0iLCJtYWMiOiIwZTZhNzc1NDFhMDUxYzMyNzFlMzcwZTdkNzg4ZGExMzU2NDEzMmY4NTQ0ZjNhYWI3ZDQ5OTVjNTRkNGQ5YWVjIn0=', 'eyJpdiI6IlBxTEJVdCs3QXBlWUpQUk93bmhhenc9PSIsInZhbHVlIjoiUUQ2MnRwS3JDVUppUS9NZkkyaEg1OTJNK1ZXc0JiRVNhVjA2L2I1K3Zvcz0iLCJtYWMiOiI0OThiOTEwMzhhZjA4OTE4M2M5NDIwZGU2MjhiMzk5MDJmMWMwMTk1YzMwMDM3ODc5OTRjM2Q2MzMzNzgzMjc0In0=', 'eyJpdiI6IjA0bm5ocExoZllWK21ycnh1djZFa2c9PSIsInZhbHVlIjoiRjczWGxaaGdxemcrb2pCbERaaVNvQVNIN1JJd3lyL3BsQlU0VVYzYkVONTBsQ0FTRzArS3c5UmQ3ZkNuaFVwQVlNbnI2RWNwRjBZNUlNMDIzVzh1U3c9PSIsIm1hYyI6IjY1ZWFhZmYyMjA0ZGMzMGFjNjRjZGJmNzI1OGNhY2FjYmM2NWY0ZmJiN2M5MjQ1YzZiMDE4ODA1N2Q5MGJlZjAifQ==', 'eyJpdiI6IjAyZWV2WUhUdlViVmlFNEExb3p3cnc9PSIsInZhbHVlIjoiczk5QVlnbGo5M3lRQmlrcWJDRktaN0xiYjZHTGpQdUJTTVRTNzBjRmVaN3hYcDBFb0tiSUV3RTRsdkZjTU56UmZxNUhUM3ZNaUZHblNGWklmVjVkdVFnL0tVM3p5UzdrTU9XMlczbWdkeHNSdUJ0a1c0ZGdVYk5EM2JHSHBKaGhBeHhxTXE1blc3dGd2Tk5QUWIyK1JRK2tSMU5pd3VjYTJyQmZNSmhZcmVlZnJldXExTzJVbkxESHBFWHVIeDRhL1ZlaUdPZzFkSk9qV1lKZW1oVW1IeVFNVDFWVmN5L0dvZ3ZIclNFQXJRbnVLUURKY2dQNzR5UlQ2R3A1bXlZdiIsIm1hYyI6Ijg2ZDlhMGRhMWM1NmFmOWM4MDA4NWU1OGRhYjM4NDg0MDA5MWM0NTU3ZTQwZTViY2Q1ZjQyYTE4ZTk1OGQ0YTQifQ==', '2020-08-17 04:48:24', '2020-08-17 04:48:24'),
	(53, 'eyJpdiI6IkI1ZFBFbDJVaVJ4ZkN5OFJzRUs5R0E9PSIsInZhbHVlIjoiKy9TWG1PZVhFTEs0TlRSOFdBS25zWXM5bWVwZXlUSE5xMXlmaHFTQkFKaz0iLCJtYWMiOiI2YjcyYzg3Y2FlN2UzZWIyMGZiNmZiNzcwYTBhM2JiMjIzZGY1NjMyNmRiMjIzNGU3NTFlMjcxYmE2ZjZiYmE0In0=', 'eyJpdiI6IkY2RVFIRVNqaVJmZFAxQUg0K2M1a2c9PSIsInZhbHVlIjoiUVQ0Nlc3UlozeStKcEJnR1AxOENpSXEwRGNzMTRCaEFhS1hrQ0xjd25vcz0iLCJtYWMiOiJhMDYzY2VkODE2ZWY1YWJiYmY4OWFiYTUyMGM2NmU3ZjlmODQwMGEyYjIxNWUzZmUwYmQ4ZjVjZmExYTA4MDU4In0=', 'eyJpdiI6IlJVbTFvNTU4aTV4RGx2Z21QTkltOFE9PSIsInZhbHVlIjoiQVdUa1ZPZ2Vsb0lOTm9DMmlCWm51a3FueUpsZ0J6UVovd1RCQVQwVnRMNlVIRmRpaFo4emJ5Y0l6c0l2WXlsbndSYlF6ZW90UDBGN09QaVdadFptaWc9PSIsIm1hYyI6ImJiN2Q2YTE1ZmY1ZDE1ZDBlZWVkOWQ2OTU4ZjYwMTE3ZDYwNDc5YjgzZDQxZWVhYzU5ZGNiNDE3ODkwMjExNjgifQ==', 'eyJpdiI6ImFiTjVkd0lDaU9zSDZWNEVqYTQzQ3c9PSIsInZhbHVlIjoiRHhRNXUzT29jVXFkd3ptZVR0RmowVCs2ZWRZdzVOekJyYzM3VjNNT0RXSitrY2ltSDUwZWxKODU3SnY5djlsUzhzbXZCUzJRVUdpR2s2VmFMUU9nNHl6MkxJSmZxSTU5VXRSeHpydDE3am5jUFJQNkRPMWROd0k5UDY1VmNsMjU1WWRBcHRueGF4bFhIcmxMMk0rNWcvVzJJamhtR2NqMzVPL2lxZXFuNU9jbFkzQU00bDZrUmd2MldENVVzWGNYV3FlVWsrYmZFVFczK1JkYUlaTHgwV21XZDY1K1QvUUVaQWprcCtKOG5aeXpEWThiUDhhTHEvNllMOXpYdGdhNCIsIm1hYyI6IjU3MWU5NDEzMTk1MjcyYjUwYjUzZDYwNWMyMWRlMjk2ZDg1Mjc0Njc4MDExZjgzMGUwYmQ1NzkwZjY0NzFiNWYifQ==', '2020-08-17 04:48:25', '2020-08-17 04:48:25'),
	(54, 'eyJpdiI6InFaOVpUYTNBR3VQemhSaURPNXFLVUE9PSIsInZhbHVlIjoiUUd3SWplSlo2OUZacGQzTFhkZlBZRzM4Q3U5Z3huVUI1NHBmZ3M3UUVYdz0iLCJtYWMiOiI2MjE5NzVjNWU1ZmZlYWI2ZDQ4NmE0Njg3NmZiMDU4ZmY3YjgyN2E2NDJhMjMxMmVkYWE1OTZiNDI2MGVjY2ZhIn0=', 'eyJpdiI6IkxYRjdieEJkYWxRRGN3M09kQzd5NGc9PSIsInZhbHVlIjoiQXQydVZDeG1MbGZqS3I4Y3loWmNGYjQ1a250cVk3UlBpY2pUbytCTC93cz0iLCJtYWMiOiI5MzZlMmYxMmQ0ODY5NDI1MzJmYjdiZTgxNDU4NzI1MjFlMzljY2YyMWVjMmY3OGMyZDE4ZjI3MDkyY2Y0ODlmIn0=', 'eyJpdiI6IjZkYWdMaHB3eUl3aGxEYU9EUXdIYnc9PSIsInZhbHVlIjoiNVFiSEhOQzRpSFpvM2lSeWZSYXZJL0JxV2poeGUxWlJxZEdUMWNNNWhwWmN4ZC9XSGFxZTdURWx1OTB4VUdtZkNhU0cvL0lpM1JCdjF0RnNiYjJNaGc9PSIsIm1hYyI6ImZhZTNiNDMxMDYyZDkzOWQ2NzViYjM1MmVjZmMxNDg1MDYzOTY4Y2E4YTAyZjRiYjMyOGM2MTFhNzFlZDg2ZmUifQ==', 'eyJpdiI6IlEyc2xXMFM4ZGcrc2NXRitmTDhaK0E9PSIsInZhbHVlIjoiOFJVVmxMdy83cy9mQ3NTd21NNXVBZHk1ZTgwZWpxWjNjWVdYNkdWLzh2amY0Ylk4RkVlTFZxd1Fxcm1XK3Y1VGE3MEVscEttWUgyNG82TDNaeWw4R2VyUklmcTdyZlcwalR0TURPNXd6em1kMTRSdnlOMGpYQmVIUUlTZGdsT3dUNDFRMGdDQzZjUjF0S3B4VGhCeGxEYlVOeVlPbnMvSFVTY3R0cEFYenIwZ3NwMkt1LzhyeUh1ZjV6V0M0WmV2RlNYU2lQc2dJKzVHcE4xSkR2ek92TnJPZ0x0TU1DSk14YStRZTdxMXB6L3RSN0x4QjRUTHpuczRKcEppSDF0OSIsIm1hYyI6IjkyNWRhOWVmNTcyZTIwYWUwNTdmY2U3MDIyMGMwYzNjNjUzODVkYTE5NTEzMDI0ZDI3ZTkzM2U4YzA4MDYwMWYifQ==', '2020-08-17 04:50:57', '2020-08-17 04:50:57'),
	(55, 'eyJpdiI6InVVU0lmSmZrOW9FRjJwL1h4WFpJVlE9PSIsInZhbHVlIjoiK1ZUaktjNDBQb290S0ltRGh0SllzS2tOSlNVTXUvQ2twZTlUcEorWlV6bz0iLCJtYWMiOiJiOTFkMzZiMWQ3MTU3ZWU4ZDYwMTU2YTM5MzU1YWExNjIxMmJlMzE2MTc0OTA4Mjg5MTgyOTZlMTVjNzUwNjM3In0=', 'eyJpdiI6Ik1PaVNJSVg0OG91KzdHYjBYNE8zSnc9PSIsInZhbHVlIjoiTkYvUlV1YUpGdEF5OUgvQUMzUFYvak8zeVZPNkpFN1VRVitLMFNuMVhCRT0iLCJtYWMiOiJkNTUzNDRkMmE0M2IwYjg1YTYxNThlMTllNzMxNTAzMDAwN2NlNGQwMjEyOGYwNGU4NWVhNTE4OGE4MzFkZTI5In0=', 'eyJpdiI6InRxSkk5anpvMzZheWlUbHpUZUtKSFE9PSIsInZhbHVlIjoiU3NYRVpzM09GMUdFUFhoeVM5clZQYUp5RGdObG1jUkVoVGdlZG9paUxwVUhwQ2NGcTJIaGkwRGU0a3pmbEdGc1RMeGcyRGJIdFU4RkpTSkgyaXpldmc9PSIsIm1hYyI6IjZhMGNmOTE4ODkxODc0ZTgxZWZjYWE3YTBmMGQyMzEwZWEwNzA2MDViMmYxMTUyZDFkZTE0ZTViMzU1ODQ3OTYifQ==', 'eyJpdiI6IkpwbTBiVDcwNEc3a3l5dDVEVFlIRGc9PSIsInZhbHVlIjoiU1VCWXovK3E0QmJFL0tqeE40VTFKaVB2bmFramVBT0Mxb2VKb1RQbUlPRlNuZ0toWkd5WVRHQTM1SDRySzZ0cGZiVEZRMElWTHZFUEdWUHVuRmxOc2hTeERVWmVWZ1lneW9VRW1velJ2WTdTc3E3QmlNcmxMNzQrMHBlYk15cWFJRkdrMjloRFVUbXBSVWxNajZmQjg3SHJkTEE0eWhhVUF3VnhxOWNlZjJyNUpyWXJ3bmR2RFE2TURabFFpVXNMeGhXSHc1RVRPK21CS2psSnRSTENtTWpjWUtwTWdiYnI1Y2lPa0lmUHliZ2JtVXZFUDNZdjljeEpKdFJ6L0l4MyIsIm1hYyI6ImQ3N2IxYjQxY2MyOWE0MTFhODZmNzkxYjhmOTllNjBjOGY1M2RkNDEwOGZkZmQxMTFhMjhjM2ZjN2YyZDg0M2EifQ==', '2020-08-17 04:50:59', '2020-08-17 04:50:59'),
	(56, 'eyJpdiI6IkJpM2hSaWhEQWhTdzN2REhJS1BuQWc9PSIsInZhbHVlIjoiVnBUU1NQTmEzT0kxL3RaczEyZjZZMzVVWUorbng2d25NekxpRkdhQkNlMD0iLCJtYWMiOiJjNGQ3ODJkOTM5NGJjOGIzOTNjNGU5MzFlMmM3YmM4MmRjYzlmZmE1NTFjZTdkOWNjN2E3ZWYyNGU5M2Y3NTY2In0=', 'eyJpdiI6Ii9KeGsyc085c09lanRKMEwzTnhWWlE9PSIsInZhbHVlIjoiWkpOU0R6cnpDak5mYXZhRVZUTS9mc2grMFZVYkdQcnd5azlhWDE1L2kwMD0iLCJtYWMiOiJiYWM0OGYyMzUyOTQzZmI0OGMxM2I1MmJlMTYwMGIyNmM0OTdkNWQ0ZDUwYjJjZWU0M2Q1NjMxM2Y0MjVhMjUyIn0=', 'eyJpdiI6IlVBVHNCVFUvN0QyK1NuTGJ3Mk5zQWc9PSIsInZhbHVlIjoieVhGTjNnVExrVHJKakI3YWlGUnRiNDBENXpzMXNTKzZZNDkyTWRNRTlrdHhBM0xEaEZUYUZOUEtndVNMb2JkKzV4Vy9rOW9CTEIxYWhZTm11UWpwTVE9PSIsIm1hYyI6ImRmMjg2MzI2NGI1N2MzNWRhODU0N2Q2OGQzYTYzMGViZjc5ZTZmZTcyM2MyNzM1ZWE1YTk5NGU4NzgyMTEyNjAifQ==', 'eyJpdiI6ImFyQzhVRFFJOFA5UHFKRHFULzNuRlE9PSIsInZhbHVlIjoiclJxVTA0RnpYTTE0VDk0UlFxcGlZQkowVEw3akZSc0o5WE9RYkxCSGRhOWE0RXRxSTZHeDVmTk5HTDlLUGFibDFpWTAwc3ByUVl4cUMyZWdSWmJNNFlBbFRRL0tFMWpxVEdsbDM3Rkx5RjQ9IiwibWFjIjoiZDFjZDViOGI5YTM5ZWFjMDlhZTAxYWQ1YWYzYTYyZDIwNzA0YjEwNmM3YjAyYjAzYzAwYmIzMzcyMTE2Mjc5MCJ9', '2020-08-17 06:35:07', '2020-08-17 06:35:07'),
	(57, 'eyJpdiI6ImkxWXZQRCs4WVRHNCtVbkU5RWM2eWc9PSIsInZhbHVlIjoiOHY2MEdIWm9zKzVJMEdwTE9nakg2VjNmd2RwRmRwcWxVRjhRTnV6Mm0vRT0iLCJtYWMiOiJjYmEwNDc0N2VmNzdiNGMzYjRkZjMyZGMwZjlkZjdjNDA0ODJhNzkzNzUzZDA0YTA0ZDkzNTBmNWE1MzQ2OTAxIn0=', 'eyJpdiI6IlRTMlZmYkJyTEtIMGlDTklETFlRQkE9PSIsInZhbHVlIjoiRW1QckZMU3FxSi9aZjRmMGllUWFaQ3Y4UkJETkQ0K2dNRkFuTUhQME04QT0iLCJtYWMiOiI0Yjg2NTFiY2E1ZWU0NGI4MGI1OWE2YjEwMDZmOGQwYTMyNDY2MDk3OTY1M2QzNzdkN2Q0M2FiZmYwYjVhODEzIn0=', 'eyJpdiI6Ik9BeFpTSllsaHN2RGNyZ1I4SW5IekE9PSIsInZhbHVlIjoiekZ3c3pEUGdTa0JmSmo4SFg4d0c1Uk1RRTlSbmc2YmppN1dQMm9VamdaRjArM0hyTUpxK2hBS1cxTUpFdmI0Yjk3VjR5clJFb2pVK242MTllWm1hMFE9PSIsIm1hYyI6ImZlZjhkMGYwNjEyYTI4MGFkNzc2ZjVkNWE1NTUzYmU1NmYzODljNDQxMGQ3MzlmODczZTQ0MTJiOWJhNzRjYmQifQ==', 'eyJpdiI6IlpPM2ZXa081UHJkMTc3Q3JaaWVpYnc9PSIsInZhbHVlIjoiR20xNTI2cGMxdXYzbmNqaTVsZHBzRXUvNDlKZjhZajR1TXdKdmp2WWYvNDNjSUdpWVlWYlhaNEp4UGJFd0p5WC9VY0ViT29ndkJTcnp1RXdxSStNSXVhamhoZEtrbm5PcTVYMFRmdGlWbEU9IiwibWFjIjoiMTVlNzZkM2ExNzE4ODk0MzQ4NGRlZjY3MDhjZWI0ZDFkN2UzMTNiMDE2ZWE4ZTM4NDM0Nzk5MTY2YzZhZGY0MiJ9', '2020-08-17 06:36:14', '2020-08-17 06:36:14'),
	(58, 'eyJpdiI6Imo0YjlJY0tXeXBSV0c3Snc0NU94R0E9PSIsInZhbHVlIjoiVHR3V29CRFlnUXVzQXVhNW4wWklSMnN6MUlpL1Q0NDJYY3cxQXNpa1k5WT0iLCJtYWMiOiIxYzliOTg5YTZhZDZjOWI1ZWJlMjc0ODFjNmZiM2E0NGMzZWJkNWZlNzMwNGQ3ZWUzODY3NWViZTVjZTBjZGYyIn0=', 'eyJpdiI6IjJNVGtPYmhXeFd5Nk1OZ2pmVUFtUVE9PSIsInZhbHVlIjoiZ3Q3ZU10Z1FTZmQxOHE1c1JOK3cyUHZIYWZ3WTF6TXhuUkxQK1VVc296dz0iLCJtYWMiOiJhNzFkMmJhMDNhOGYwZmFhNDFhMDk1ZmUxYTRmM2NmZDBkYzZjMDQ5NDNhMGRhZTAxZjdjMDExNTdhZTY4NDliIn0=', 'eyJpdiI6IjBEeGpPTWE0cXpudDB0NlRHMHJjSmc9PSIsInZhbHVlIjoiQ2JLMHVpSnVka1FHTTIzOE5xTkFZQ0JNWDNHSys2N3BBS0p1aVRQK21WamhlQmJoYk9NUkZBNjB5b09EcWY4RkplVEg5SU5Sb2JXT3ltZWdyNFVmc2c9PSIsIm1hYyI6IjA2ZDRiMGI5NjU2ZWEwMzQ3MzdjMmY4NzViMDQyMjEyYzdlYjU3ZDBkNzc5MTk5MDcxMDcwMDJiMjMxNGU4ZjAifQ==', 'eyJpdiI6Imp4b0hLaE1PZzdyUmp1M1FKTjEzc0E9PSIsInZhbHVlIjoiSVhzY2hEWVlOdHBPdmFhVk4xV0JvVE8xaDNxY0tyMzlFWE1CYXpYdm1XSm96ZWR4NkM1TnFuRVg3N2djdmZTZFhXZkFJQXdrOHl5S3djTnpmUWwzMzRnbnp3SE9XTjFlSzBvbUJtYkxEK2c9IiwibWFjIjoiNTcwOWQ0NTMzMmE1NjYwNzMwMTVlMGY1MTFlNTZkM2QyNmRkYjkyYjAxYzExNzg2NmQxODQ5OTg2YTM4ODY2MCJ9', '2020-08-17 06:36:28', '2020-08-17 06:36:28'),
	(59, 'eyJpdiI6ImpVRGQ2My9DUEYwQzh0MGRkeDhCL2c9PSIsInZhbHVlIjoiaHpSTFUwYkFtTW9Ka3ZtclZ0TG4xMTBlMjNUQWI1a2VIckx0MWNzR2swdz0iLCJtYWMiOiJhNjExYWMwYzk4MjUyOTRlYTU3NmNhYzRkMDI3NWU1YTc1NjE2MDYwYTFkY2IzY2NmMDNiMjg3NmEwNDQ0MDRhIn0=', 'eyJpdiI6Im9zK0k5UEZFUjJEdlgzTk9ZaVlpdlE9PSIsInZhbHVlIjoiOS95Qm5YRU8vK1Y5OVBzRjloVkpFeVMxUWhCUVZJSnUwNG8wVjc2azUraz0iLCJtYWMiOiI1MDk0ZTQ2NjhiZTdiNzUwYWEwYjM1OWVlMWU1NTRmYjJjODIwYzY1YzZkZjI1NTIxNmUyYTJjYTNkODEzNzM0In0=', 'eyJpdiI6IjY5KytNTlZsZkFHSEZJWmJrMDVzUHc9PSIsInZhbHVlIjoiczRHT2UyT1h0eFNFOXIyWS9JM0hWY3RMeTBOMG44QjN0MlVMNUNhMG5POWRNSisvdGVGejhNT1E0SUNyQ1NqNGg5amRrR2JkVXZMNlZLaXlCcjBQTUE9PSIsIm1hYyI6IjZlY2RiMDg2NjVmNmFjNDdjODNjZGRiNzQ3NWZlMzJkNDI0NjE0MDY3ZjEyMDAwZDNmMmE0NTBkMTljNDQwYjIifQ==', 'eyJpdiI6IllCZTRjZVlSRlhoRWlpeE9oTEhkR3c9PSIsInZhbHVlIjoiZDRnZGlOdXNTZFFKVXlHRjVvbC9QcXRXVldIVk1JSFpmdEl5VE5VMzBYd0Nscmk0c25PdFkrTWpxVDc2OFdZNlZIOGo3MCtxVFZ4MTBCVUQ4SXVtMFlSK0Z0RDFqd0R0aXpERUxNVmpYN2c9IiwibWFjIjoiZjk5ZWJmY2JjMDhjMTlkZGUyODc5YzIyY2ZmYzgwY2VhMDFkNjRhYTI0MWY4MTIwZDNiOTllNzEyZmExZDllOSJ9', '2020-08-17 06:36:41', '2020-08-17 06:36:41'),
	(60, 'eyJpdiI6IklPMncxdWI1SkF3RVEwTHpEcUlkT3c9PSIsInZhbHVlIjoiZGUwS1l0RjFvUjd2dEdGRnZqZDRoRjAzbkgxMHM4b084VzdnTFZtVUtJRT0iLCJtYWMiOiJkMjJlOWYyMWQ1YjM1NTljMDUzMmNiYzkzODA4YTY3NGZlOWE1YzY2NTc3NDRiNmM2MGIzMTgxN2UyNjU0NTFkIn0=', 'eyJpdiI6ImxFVXVwdGxPVlo3SmJSTkd1dHhua2c9PSIsInZhbHVlIjoieXloajNmMlNzV1dlMStqZXFqQXpRNGcrbDNrdmJTSE9KMUdXcUhlemp3WT0iLCJtYWMiOiI3ZDMxYWIyZjU1NWI2NGY5NzI0Mzk1NzlhODhmMmJkYjdkYzMyOGE4YmFkZGQ4YmM5NjNlOTM3OGRmOTQ3ZjZlIn0=', 'eyJpdiI6IlBkVzFZbGR0OUlwSEY4WWNpR09VRVE9PSIsInZhbHVlIjoiSDc3ZkcvNXExMkRWMXRQeXc4UkpjbDdDK2ZRaVhVUTN0TlJVWWM5alppZ2g5UHlzdjlDUzdwbjdHa2VkS0MrWUYrdUpCSGp0N2FESWx6N0w2cm16NUE9PSIsIm1hYyI6IjYyNzU2MWQ5ZDI0MWRjMTNmMjQ0ZmFhMDkyOWY0M2RjODBjNTQ4ZjAwZGU4YzNlZDg5YTQ1NDZkNmZlMzBiZDQifQ==', 'eyJpdiI6ImpCck1oT21TZk9WOERpOGNXRnhuaHc9PSIsInZhbHVlIjoiTmJscld6dmE4aW1SODV5OURWaXhHaEc0cGViZDNWZkwwem5pVnFjN3E3SEhveklqci9JWGxqdytsTElockRhbFpkVGNkV3JPZVl3aFY4aUdFNXowVWhvSkg5Z0M1S3FiY3hGanExV1N2SFU9IiwibWFjIjoiNzA5YjZkNmFmNmJhZGM1ZjczNjRhYTVlNjY2YTIwNDg4YTQ2NzUzYzk5Y2U3ZWM4ZDY5NWRhZjYzZGQ1ZTVkMSJ9', '2020-08-17 06:37:38', '2020-08-17 06:37:38');
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

-- Dumping data for table msdfs_forms_db.forms: ~2 rows (approximately)
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
  `recommended` int(1) NOT NULL DEFAULT 0,
  `approved` int(1) NOT NULL DEFAULT 0,
  `cost` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_form_ci_items_lost_form_critical_incident` (`form_critical_incident_id`),
  KEY `FK_form_ci_items_lost_items_lost_or_damaged` (`item_id`),
  CONSTRAINT `FK_form_ci_items_lost_form_critical_incident` FOREIGN KEY (`form_critical_incident_id`) REFERENCES `form_critical_incident` (`id`),
  CONSTRAINT `FK_form_ci_items_lost_items_lost_or_damaged` FOREIGN KEY (`item_id`) REFERENCES `items_lost_or_damaged` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.form_ci_items_lost: ~23 rows (approximately)
/*!40000 ALTER TABLE `form_ci_items_lost` DISABLE KEYS */;
INSERT INTO `form_ci_items_lost` (`id`, `form_critical_incident_id`, `item_id`, `recommended`, `approved`, `cost`) VALUES
	(1, 1, 3, 1, 1, 3500.00),
	(2, 1, 5, 1, 1, 3000.00),
	(3, 1, 6, 1, 1, 1999.00),
	(4, 1, 10, 1, 1, 700.00),
	(5, 2, 1, 1, 1, 2300.00),
	(6, 2, 2, 1, 1, 2500.00),
	(7, 2, 4, 1, 1, 2000.00),
	(8, 2, 6, 1, 1, 2000.00),
	(9, 2, 7, 1, 1, 2000.00),
	(10, 2, 11, 1, 1, 1000.00),
	(11, 2, 12, 1, 1, 2000.00),
	(12, 3, 1, 1, 1, 2000.00),
	(13, 3, 2, 1, 1, 4000.00),
	(14, 3, 4, 1, 1, 2000.00),
	(15, 3, 5, 1, 1, 3000.00),
	(16, 3, 6, 1, 1, 2000.00),
	(17, 3, 9, 1, 1, 2000.00),
	(18, 3, 10, 1, 1, 700.00),
	(19, 3, 12, 1, 1, 2000.00),
	(20, 4, 4, 1, 1, 2000.00),
	(21, 4, 8, 1, 1, 3500.00),
	(22, 4, 11, 1, 1, 1000.00),
	(23, 4, 12, 1, 1, 3000.00);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.form_critical_incident: ~4 rows (approximately)
/*!40000 ALTER TABLE `form_critical_incident` DISABLE KEYS */;
INSERT INTO `form_critical_incident` (`id`, `application_id`, `disaster_id`, `disaster_other`, `housing_damage`, `housing_repairs`, `insured`, `reference_number`) VALUES
	(1, 1, 4, NULL, 'Y', 'eyJpdiI6Ing4elFZelpHQnpMR21YRWNTcXg0MGc9PSIsInZhbHVlIjoiUHNMR3FjV0tXd0RhajBqS0ZnTGh4NE9VR00zSTdEbVhaRTVVK2xpQ3E5cUQ1UmFhdlpROENsSVBFK3FPR1hKTjlJcXd2aFUyK1EvZ3A3ZDY4Tm5OU0pFZXRGdG5CK0tZZThLaTVoSmFxTDVuYU1DdXZOdE90Y25tUWlwOE50WkkzcU5hN0ZLMTZGWW5GczBZcS93a1ZMK0RTZFF2M2hOcHNjOTh0a2xVV1FzMUFHNmhhLzVGVzVXdFZRdklzZWJKIiwibWFjIjoiN2FmNTdkYjQ1OWJiZjJiMTVlZmY2Mjk4ODdmZGU0ZWVkNTI3ZTRhMzM0YjI2ZWQ4NzY5MTVhN2MwYTE2ZjBkNiJ9', 'Y', '001/2020'),
	(2, 2, 5, NULL, 'Y', 'eyJpdiI6IjdHSkxsekhBTys2Z0VvTXB1RXVnbXc9PSIsInZhbHVlIjoiWDV6SkNHWEVFd2ZtT3JTRC82V09JN0d2YmVKMkJMalRScEU2V25ST2g0REkwVGdFMFY1Z2k4ZjRCV0gzdnBrdzlrVkU4c3pqSWtEZVlOeDluZmlSb3pXMlE0R0JYYmUxQzE4dTI0SXhkNnZZZ2doL3B4N2JrU01Yd09rQ3hBU0MiLCJtYWMiOiJkZmJiYzI5M2ViYmIyY2ViYzcyNmUwMDE1ZGUyNThjMTBjNmVjZTI4MzJiZTBhMzBkYTgwMDZmYTcwYjMxYmViIn0=', 'N', '002/2020'),
	(3, 3, 1, NULL, 'N', 'eyJpdiI6ImRsTUZXcnhkZ0lpM2g0MThVTUZqa1E9PSIsInZhbHVlIjoiend3dW12VWtFdUtsWnA2OFZnSjZ1UT09IiwibWFjIjoiODIwYzliYzNkMTc2MTcxNGI3MzY3OTVmMDkwNjk2ZTM4NjlmODM4ZmMyMGZiYjA5MjQ5ZmQ3Y2UzYWI4ZjdjNyJ9', NULL, '003/2020'),
	(4, 4, 2, NULL, 'N', 'eyJpdiI6ImZiVC9zaUd5RTN2MmVjeW9PWC9ZckE9PSIsInZhbHVlIjoidjIzeUJBekd3dmJwcHNEU0YxNTFpQT09IiwibWFjIjoiNjFiMTU4OWM1ODVmMjdjOTNlMzQwZjdjZTJkNDU1OTc4ZDk4YmI3ZDQyYjhlNGJmYzZmY2RiZTgxOGM3YzEzNCJ9', NULL, '005/2020');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.households: ~4 rows (approximately)
/*!40000 ALTER TABLE `households` DISABLE KEYS */;
INSERT INTO `households` (`id`, `housing_type_id`, `address1`, `address2`, `community_id`, `total_income_id`, `active`, `created_at`, `updated_at`) VALUES
	(1, 4, 'eyJpdiI6IkovckRaK1RPVjFxbHd2T0M5TDlqNGc9PSIsInZhbHVlIjoiZ0VqMVFWSEhnblZvaW1oQm9XMkN2ZlE0WThBTExMSUtBNUMzMFlDa3Eyc2VuRkIrS3pCWEZ2d2FEcld4Y2djZ05GRHZ5dzZhcEdITlBDbGxSbmhxR0J6YTZxbnU0dlZxN0F2a05oSjR3TlpXMzN4YkF4T1J4TXV0YlhQLy9vaGwyUmVuOGxLdUtxVmc5SDhnZGVja2lqUUlleGUzbHVQanhHTDFhM2tocVl5RVB3LzJDQTdIRlhQOXIvdW1rL0lGIiwibWFjIjoiMzhmMjkyYzYzNmY2MzdhYzMwNWNjMmZkMGVjMzk4NTAyZTRiYTk3MjU3Zjg3ZDRkYjJhODU2YTc3MjY2ODA3MyJ9', NULL, 516, 4, 1, '2020-08-14 23:22:24', NULL),
	(2, 2, 'eyJpdiI6InRtR052aUZzY1ltR25RTWNnb2doK2c9PSIsInZhbHVlIjoiK3Jmc1NBQkEwdEtVdHlZTlRYd0ZRS2pSanR0RlNvUXJNRkdkdUU2Z1VlcHNhRlJBSUtreXRieDlNdWpGcTcrUlZpRmR6NzJDVFpDd3B5NDhVbnhQVmZzUWlMTDVFTXM3MjVvNTlHVzdzb3NSc0UvUFV3YVIxZDJEa3RkaGdVK0thQzQwcGtQcFBLdXpMWTJ2WlJ2eitoOEJTNHB5VHNWV2krUjkvR3NHbzBvQ3hUaFFOTk1mU0F1eEtEVjZkMlJXIiwibWFjIjoiZDU5Y2U2MWVjNTU4M2U3MDZiNTdjYzVjOGFhYmJiZDk2Y2Q4MTdiZWZlMDA3OTEzODU5ZWQyYzEwNTY1MjlmMCJ9', NULL, 102, 2, 1, '2020-08-14 23:23:55', NULL),
	(3, 1, 'eyJpdiI6Ik1MMHZtZnpESCtyd09PMUZOdXVVOUE9PSIsInZhbHVlIjoicFY0Q2NRbjBlOWNzRWVGSGdVMzNheDJZbXloSFlFS3F2YUs0QjdjMmRnWnR0b0c3L0hBRmt6NDR4Y3FTcGx3eDBlQXBqMStFdk13Tm9pM3ppckk5RnNyYzZ6L2tsdHlRRnVHYlhHSythckZrT1UyRzBOR3ZCcUgyWFN1cUEvN3NLbFlySldLQmNBT1htY3JYQ0VkNUk4UncwTmJSaUdFOUROdHhhcVlMbGE0PSIsIm1hYyI6ImVmN2E5ZjYwZjIxMjMyMDdmN2M2ZGFiMDNkYzFiMGI4M2E5NGU2YWFhYzdiNjVlZjJjZjhjOGNmNWMwOTYxYzEifQ==', NULL, 155, 1, 1, '2020-08-14 23:54:37', NULL),
	(4, 4, 'eyJpdiI6ImMrOXlXcHUzeWVoWGpjbjlGaU82MkE9PSIsInZhbHVlIjoibjNST2FWSUdCOHZuMzhTbDdqZWNPY0t6cXJUcy9FTVgwVHZYcTExdjhKK0tUbkFBSnJXc2ZlM0FHNk9MNzNQUTBsMFBvbVdyeXZNM2VDQ0hGN21qc0M4V0Z0Zmtqb2MvQmZZc2pjc3B1WkZMQzNSb00rdVFWTFZpZ042Tlc5VVEiLCJtYWMiOiJiMDA0NmVjYTEzNmIwMjY4ZjM1NmMwZTZkZjhmZTAzNjM3OGYzMGJmMWIxZjhlNzI3ZDkwMGFlZmNiNGNlZDQ0In0=', NULL, 296, 1, 1, '2020-08-17 06:23:53', NULL);
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
	(1, 1, 'eyJpdiI6IkNWSXV1WW9oWGI1c2lacjNqWWl5QUE9PSIsInZhbHVlIjoiUERpSFVQOXJMNmtuaURxclJWc2dLaHNWbnJrMm9wRDFVYi90NGFWZ0ttVT0iLCJtYWMiOiJlMWNmZTQ2ZWE2NDAzN2EwYWM4ZDkzNGQzNzkzY2IyZGUwZTVhYjYyNjRmNDkxYjFhOTM5YjQ2Y2U1Y2E5NmVhIn0=', 'eyJpdiI6IlQ2ZVRHNEZyVzcxbXVPZHkwc3BLQVE9PSIsInZhbHVlIjoiT1BVNUR4T1lMcm1QcGlLVXoxSXVSSXhJZGhLN1haZEZzeTlZVGh2Unh0ckF5YVVUcWpEYzJtdjh3cXdwY25iZTJkRk1lbkNPeUM3Ryt1eUVjUWc0TUw0MTkrQzBZaHZaTGxRVkN5eGJ1MjQ9IiwibWFjIjoiODU1YTU5NGFiZDFjYWY4NmJkZmIxZDgwMWFlZDFkZDVhN2QwZjU4ZmQ5ZjJmNTE1YjliMzk4MWQ4NmY5MGY4NiJ9', 'eyJpdiI6InNLemE5UXUvSlMrN0tzZ2YrYWNuRWc9PSIsInZhbHVlIjoiT2dzQzhVYSt0cFlPOUU0TTFnSnBIWFlXTmVRNFdVamYreGxnM1RGUW1UTWFMeDBPcVp3M2orTDBLQ2dvRktKcElFZmVsTmRsL29rTGFSckg0a3ZGeEE9PSIsIm1hYyI6ImQzMTAzNTliMmQ4OWQ3NDgxNjc4Y2VmYjE5MmY2N2FiY2E2OTlmN2I3OTg2ODdmMzhjOTA4OTA3MTMyOTJkYzEifQ==');
/*!40000 ALTER TABLE `insurers` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.items_lost_or_damaged
DROP TABLE IF EXISTS `items_lost_or_damaged`;
CREATE TABLE IF NOT EXISTS `items_lost_or_damaged` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(150) NOT NULL,
  `item` varchar(150) NOT NULL,
  `max_value` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.items_lost_or_damaged: ~12 rows (approximately)
/*!40000 ALTER TABLE `items_lost_or_damaged` DISABLE KEYS */;
INSERT INTO `items_lost_or_damaged` (`id`, `slug`, `item`, `max_value`) VALUES
	(1, 'stove', 'Stove', 2500.00),
	(2, 'refrigerator', 'Refrigerator', 4000.00),
	(3, 'washing_machine', 'Washing Machine', 3500.00),
	(4, 'bed_mattress', 'Bed & Mattress', 2000.00),
	(5, 'wardrobe', 'Wardrobe', 3000.00),
	(6, 'chest_of_drawers', 'Chest of Draws', 2000.00),
	(7, 'living_room_set', 'Living Room Set', 3500.00),
	(8, 'dining_room_set', 'Dining Room Set', 3500.00),
	(9, 'kitchen_cupboards', 'Kitchen Cupboards', 2000.00),
	(10, 'school_supplies_primary', 'School Supplies (Primary)', 700.00),
	(11, 'school_supplies_secondary', 'School Supplies (Secondary)', 1000.00),
	(12, 'clothing', 'Clothing', 1000.00);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.landlords: ~2 rows (approximately)
/*!40000 ALTER TABLE `landlords` DISABLE KEYS */;
INSERT INTO `landlords` (`id`, `household_id`, `first_name`, `surname`, `contact`, `rental_amount`, `active`, `created_at`, `updated_at`) VALUES
	(1, 1, 'eyJpdiI6Ino1N0kvcEM5Q2c5eVVtTHFXYk9qMHc9PSIsInZhbHVlIjoiRnhGYXhQeW5BcVBkb013eHhMSHdhUT09IiwibWFjIjoiNTc1ODEwOGU1ZmYwMWU0M2NmZTM2NGU3ZjQ0YTY5YzFlNzA5NjU0NDEyZDk2Y2YwZTdmNDY2Mzk3ZjBmZDUwZCJ9', 'eyJpdiI6IkFVWis1MG9OMnZqYnRYbVR3NzdkTXc9PSIsInZhbHVlIjoiek9ydE9PUkdjWk84YjlLMW1XOEIvUT09IiwibWFjIjoiYmM2Y2Y3YWI4YTc3NDExZjIwM2MwYTA1Mzc4YzI1YzM4MzU1ZjQ2NWIyZDBhY2NlOThkYTU4MmQwNjA3ZDA0ZSJ9', 'eyJpdiI6IlZLYU5DSUExM0NBYldCTTQzcjF2NXc9PSIsInZhbHVlIjoiNm1oTmwrMnhNVlZCbmN4Zk4vMmRyUT09IiwibWFjIjoiZDE2Y2ViYjY0NjVjY2FjOTE2NWZkNmNkNzEyYWVlZjNhYTcyYjk0M2VlNGNiOGYzMDFhOTFiYzNhYmM2YWViZiJ9', 3399.99, 1, '2020-08-14 23:22:24', '2020-08-14 23:22:24'),
	(2, 4, 'eyJpdiI6IkRoSzRIN0o5dlVhVGF4K2NmVGJNb0E9PSIsInZhbHVlIjoiV2ZMbkpDRVI1UVc2bk10c204Y25Ndz09IiwibWFjIjoiOWQwYzZkNDY3NTg1ZWQ3NTk3Mjg0MDk2MWM0NjczNzJmZTcyMjAwYTEwYTFjNjA2Y2FjYmZjNWM4MzkxNTY1ZiJ9', 'eyJpdiI6IkdHMmIyYS94WGNMVmdOa1o1bEs0Qmc9PSIsInZhbHVlIjoiaEtjQmlDQ3FDK2Y4aDdEOGZCUGpSQT09IiwibWFjIjoiNjMyNjUyOThjZDZkZWZjYmIxOTM4ZWNmNmEyYzAxNjY1ZmMxNDVmZTcwMTExZmFkMzlhZTFkMDg4YjljMGU0MiJ9', 'eyJpdiI6InB1aVhGcG13N1F0TlF6b3VHNDd5OGc9PSIsInZhbHVlIjoiVzJsazZUeVQ4eXdaQXcxOWtTUk9NTVQrWmRKd28wd3B5RnY0eVdyN25LND0iLCJtYWMiOiJmNjAxZTNkYTFkOTM4Zjc3NDAwNGIwMWRmZmVkNDYzODBjM2VlZWM2MjA5OTY2YTYwN2MyMDk2NDliMGZhNTljIn0=', 43.00, 1, '2020-08-17 06:23:53', '2020-08-17 06:23:53');
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.people: ~11 rows (approximately)
/*!40000 ALTER TABLE `people` DISABLE KEYS */;
INSERT INTO `people` (`id`, `first_name`, `surname`, `othername`, `email`, `gender`, `dob`, `marital_status_id`, `marital_status_other`, `national_id`, `national_id_state_id`, `drivers_permit`, `passport`, `employment_status_id`, `employment_status_other`, `primary_mobile_contact`, `secondary_mobile_contact`, `land_line_telephone_contact`, `income_id`, `created_at`, `updated_at`) VALUES
	(1, 'eyJpdiI6IkpvTTRMR2VSRmpFRHA0QkFpQ3NjS0E9PSIsInZhbHVlIjoiSi83NXp1QjBuK3dtWXJDdjNnT1NrQT09IiwibWFjIjoiOTlmMzRkOWE0MWQyMGZjOWQ4Y2RmZWIxMjdjNjYxMWRiNDUwZWRlZTA0OWEyMjUyNDdlYzU3OTVmMmJhMTkwNyJ9', 'eyJpdiI6ImUvWTJLWGkxeGxDdjlCTC9WZXo2L1E9PSIsInZhbHVlIjoiVm81RjBFeUNYVHhqZFV1a2tFUE1zUT09IiwibWFjIjoiYzU0NmVmYzYxZWZlYTRjMDY0MGM0ZmY2ZDYzNzg1NWE4MWExOWI2YTc2MGZkYTMwZGNkNDU2YThmZDE3NDExYSJ9', NULL, NULL, 'F', '1989-01-18', NULL, NULL, 45433333333, NULL, NULL, NULL, 7, 'eyJpdiI6Ik80cFpZRExCNzBLUmlrTDNleTF4WlE9PSIsInZhbHVlIjoiWHZsNmxESnUvVTluM2JHbWVZQXUyQT09IiwibWFjIjoiZjY4NzQ3MWZjYjQ5YWMwZjQzNDU1ZjRlNGViMmNkMGM5YTJlZGQxNzk0NGQ5MmYwM2QxNjdjNDkwNTUzMzJlNiJ9', 'eyJpdiI6InVYU2xUcXY1NjFxZU9WVjNiak1UVnc9PSIsInZhbHVlIjoiNHIxVkhvYURBY3gxVDZDcXJvWWVDZz09IiwibWFjIjoiZTQzMWMyYTA0N2VmNDcwMDE0NmQxOWViYTc4YmJlN2E0OWUzYTZkOTFhNjk1NDExYTQ3MTQ2YzljNjE2NjBmZCJ9', 'eyJpdiI6ImEzcThpSXJsSzZmY0Vxb0lJOTRSMFE9PSIsInZhbHVlIjoiTnRNb05XK0tUMUsveE1PRkszVnhoZz09IiwibWFjIjoiYzYyNjJkNzkwNmE0OTA1MGEyMjJkZTBmMWU0YTg0OTY2YzEwZmUzZmVjZmE4YzBhODNjMzllYThjOTgwYWJjNyJ9', 'eyJpdiI6ImtIeEtoTzJ1eitKcENDQlUxRWYzWkE9PSIsInZhbHVlIjoiTGpWK1pDU2tYV0w4TFB6OGI0T2cwUT09IiwibWFjIjoiY2IxN2U2MTdmMDJhYzMzYzJkMTJjMTU4Y2Q1ZTZmYmNhOWFhMzhhZDEzMmJjZDc1ZTFhNThiYzQzNzRhZDczNyJ9', NULL, '2020-08-14 23:22:24', '2020-08-14 23:22:24'),
	(2, 'eyJpdiI6Im5Lc21zNXpSSjkwckxac0R3T01ydEE9PSIsInZhbHVlIjoiQUlhQzkzZTdoQVlmaXlMYTNoUTBzQT09IiwibWFjIjoiZTZmMWZlZDM5OWYxZGY5NGMzYTFmODQ1YzhkYzA3YjZiZWIwYmRjY2U5NzRlNzgxOGNiMjQ3MGFiNmY0MDFiNiJ9', 'eyJpdiI6IlVxRlYvUmdDSnhSN3gvZXRhVHMyRVE9PSIsInZhbHVlIjoiSDA5Y2wzc1BBRkVrTFNPT3IvaC83RVJ0eXRlNk9OQjhzeDFwNVlRRUZOWT0iLCJtYWMiOiI2ZjA2MGQ0MmU2NzQ1NzA1YTI3YmM5NmNkMDRjNzc0M2FlMDJjNjc1ZmE1MDM0ZDcxN2FmMjgxOTc1MzM0NmZmIn0=', 'eyJpdiI6Ing3Q2xGT3ZKSko5d3VYT1pGNWIzQUE9PSIsInZhbHVlIjoiUFpYTEt4WGZlSTFsSWJiUmVBaXJUZz09IiwibWFjIjoiOTU2NDQ2YTM1M2JiODAwNDBkNzVkMzUwNTE1YjRiYTY0MjgyNzljM2NkNzA2MWI4ZDVlNDk4MTI5ZjUzZDdiZiJ9', 'eyJpdiI6IjdHVkc5YUZSQmU5eUNjNkxnWEVIVnc9PSIsInZhbHVlIjoiNml4WmNoaE9ic2JReThVZmpZSitFZ3RVR2RzUmhqOFR3ZytFYllVaFkzcz0iLCJtYWMiOiJlZGI4MWJjNGFlM2EzMjQ5NDIzZjQxZTk4MTVmY2QzZjY1YjM5ZmEzMDZiMWU3NGU5MDZlOTU5OTJiMWFjZjllIn0=', 'M', '1989-01-02', 6, NULL, 54733333333, 3, 'eyJpdiI6ImFGbUdaRElvVDdVZUJiN09UY25US2c9PSIsInZhbHVlIjoiaFR0WTdoaGZmNU02a0wvRTg0bGpLUT09IiwibWFjIjoiNWNkZWU2NWJmNDIwZjcwMTBjZGRhYTljYWNiMmFlOGEzM2UwZjljNzU4MDhkYjI2ZTFhZmVhNTk4NmNlOTk5YSJ9', 'eyJpdiI6IlZ6RGV4MnptL2ZpQUJTa2dEKzF6Wnc9PSIsInZhbHVlIjoiNVd5Rko1QmlhVTIrOGx0eElrc0U3dz09IiwibWFjIjoiYmRmMGFmMjIwMmQ3ZjkzNjAwM2Q3ZGIxMTIzYzZjN2FkMWM1NDMwOGRmYTlkNmVmOWUxMGJiMTdiNDYxZGUyMSJ9', 2, 'eyJpdiI6IlBKY1l2M2tKekFwVUp5dDBseUQ5Rnc9PSIsInZhbHVlIjoicTdKa2JiTGNzY0hCUTllMDhQN3JCdz09IiwibWFjIjoiZGI0MjM4MjY3ZTI2NjZmMTNmMTg5MjY2MDNkZTM2YWIzNTNhOTA0ZmYyNzE0ODJkNTdlMjdkNjQ1NTE3ZTk4YSJ9', 'eyJpdiI6Ijd5NWJteFFxeEJIb3djM2RiV241b1E9PSIsInZhbHVlIjoibzdUM0NldUp4a0JSU3N1aXdYY2V1VVppVExvQjRuL3VVSU81eWYrUnVzND0iLCJtYWMiOiJjMTYzMjFiZTE3M2Y1OWU2ZTcxNzhhZjJmZDNhOGQ5ZmUwOThjYjg1ZTE0ZDEwY2Y3Yjg0YTBjMDQ3NDE5MTM1In0=', 'eyJpdiI6IkRma2x0dnpRUFJwTU9iSUNCeHdoenc9PSIsInZhbHVlIjoibHBKYmpKQ2IzZ3diRkZnT0JOOGQybk1ZYXk1VGZKTzkwanAvbmJXZWlMcz0iLCJtYWMiOiIyZjJiZDMyMDNkZDcyNjVjNDlhNTc4MGJiMGY2YjZkZWIxOWZlYjFhYzI3MTQ1NzNkOGJiNmE0MzE3YjBjM2Y3In0=', 'eyJpdiI6ImRUdS93SkdZZG5ONkpVbkJaQWlxNUE9PSIsInZhbHVlIjoiMHhhZkpJNndHcm5hNDMvWmtmRmJvUHM2akpiZnltcVBPTGxFcVpkR1M1RT0iLCJtYWMiOiJjNDM0NDc0NWQ1NTM5NDlmYjY1NWQ0MjlkYjExZmU4YTE5YTcxYmFmOWVhNWY3NTBmZDJlZDIxMTcwM2E2YmMyIn0=', NULL, '2020-08-14 23:22:24', '2020-08-14 23:22:24'),
	(3, 'eyJpdiI6ImRDeGpITEdqK2hmeWRaMFJpUUtDN0E9PSIsInZhbHVlIjoiazgxa3N1bHAwSzcwbW9nRm0rdlFkdz09IiwibWFjIjoiMWJhMTFkZGMyZTQyZjIwZWQxZjdkMGNmNTUxYmY3YmFlOGNkODFlNGQ1MDgyZmUyMWQyMzU1NDllNWRkOTg4MCJ9', 'eyJpdiI6Inp0RGM3WW83TFd4dkQ1QVE5bGdEZkE9PSIsInZhbHVlIjoiRFBUdFcvd05hQTRWSEFoOGZLbjgzUT09IiwibWFjIjoiMGI0MzMzMjU4ZDQxZjNlZGVlNTI2ZmE5NTY4MjQzNDhkZmVlOTYxZTYzMjkzN2JmNmZmODJhY2VlZTFjZTVkYyJ9', NULL, NULL, 'M', '2000-02-07', NULL, NULL, 95833333333, NULL, NULL, NULL, 2, 'eyJpdiI6IjRiY3MxQU9ORnBBVjhKeWNmay90ZWc9PSIsInZhbHVlIjoiQzhxSytCVFhPSVFkS3RDOTZZUmJQdz09IiwibWFjIjoiYmI2NzYxOTliMmEyM2U5ZTkwODUwY2U1M2Q4MGFmNzcxMmQzZjUxN2U1NzZhOTc5NGFmNjM4Yzc4NTI0ODU4MSJ9', 'eyJpdiI6IkNFZ2tubWRWY242QklPSFp1OTB0bGc9PSIsInZhbHVlIjoidFYrSE1lMExLZHVOUXdmeFVNRHJNdz09IiwibWFjIjoiZDA3MjA3NDU5ZTFhNmQyMzhiOWI5NTJlMGE5N2JkOGIzZGJiNTYxYjRiN2QzMjExMTMwOGFjNjUxNjMzYWIxZCJ9', 'eyJpdiI6Iis3KzdVd3ZqMndFOHkyYk9jQ1BEVkE9PSIsInZhbHVlIjoiUzl0YXhpZmVTTStrUEhEdC9wMVFsZz09IiwibWFjIjoiMzFjZWM1YTI5OWFkZTc2MTU5NjkzMjU3MTUzYjQzMmZiMzE5M2YzOGY4Mzc2MTUzNzY0OGQ2MGExOGI5MjMzYSJ9', 'eyJpdiI6ImhOeExxKzl2eUpZTTB6WUhJZW1Da1E9PSIsInZhbHVlIjoiaFFaYVRDSjBOdmgwZ1B0WnNJTCtmQT09IiwibWFjIjoiYTliNjlhNTE0NDIzODU1YTEyYmUwMzlmYmRkMWQ3NzFjYWQ0MDRjM2IyMDA1NzVmZDg4ZDk1YTUzNTJjMjZjYyJ9', NULL, '2020-08-14 23:22:24', '2020-08-14 23:22:24'),
	(4, 'eyJpdiI6IkptZWRDK3ZUVCtVTVpMZk9XVlpmdXc9PSIsInZhbHVlIjoiRjE1WlBiT0MyY0NzMytwZ3JLcnVZQT09IiwibWFjIjoiOGMwYmI0MzJmYWIyMTA1NjA1MjdkZmIwMTU5ZDhkNjdhZjY5MDM1NjBhMGY5YmMwZmE4NGIzNjFiYzQ1N2NlMyJ9', 'eyJpdiI6Ii8yeDlOamhIcnpnSnVWRVRDQVRnK0E9PSIsInZhbHVlIjoiNzdUWkYxL29iUndLSVR4OHl5eHIrdz09IiwibWFjIjoiYzBiZDU1MDQxOGEyMDgxZjM3M2QwNjFmNjU3NTAwOWEwMmQ2ZmNiZjBlNWQ3NGFiMzFlNmZiMmYxZmI1MDA4NyJ9', 'eyJpdiI6IkZIYlMzVW5EeE1PYjZxaVFaN09oZWc9PSIsInZhbHVlIjoiRzJEY0xuUDY1Wlk1TTZJNjQxS1pZQT09IiwibWFjIjoiNzVjNWRmN2M3Y2ExYjJhODRlYjgwNjVkNTQzN2VkNjRiY2U4N2IzMmY0OWQxMDk2YzA3YjllZTgyMjY4OWY0ZiJ9', 'eyJpdiI6InpGRTBqR0czZGxXZ3BwM3ZCWlRKZkE9PSIsInZhbHVlIjoiaTJHeXg4U2treERyU3dkKzYyL1RmRWN5cTd6Z1g3bUgyVjVkNWt6UU82cz0iLCJtYWMiOiJiYjRiMWNhNDRlNDU4NTg3NWFhYzE1YjZhYTM0NTgyYTE5ZGY0NGEwMTY1MjA4MWRjODEzYjIzZjUxNWFlN2JjIn0=', 'F', '1989-01-17', 4, NULL, 71422222222, 2, 'eyJpdiI6ImRrcmNpVnRwSmNZSyt3WTAxb2tPY2c9PSIsInZhbHVlIjoiYVVsSVMwRHFRMEJzYjFOTkdvMUg0QT09IiwibWFjIjoiM2VmN2ZkMjliNzcxMDUwZjFiZjBmMzdjZmNkMmNmYzhkMWI1MGRlYjZkN2VjMWRjM2ZkZTg4NGFmYmY3Y2IxNyJ9', 'eyJpdiI6Ik44akFrQWtXalBEK2ZCNGdRTU53cWc9PSIsInZhbHVlIjoiclIzUmovcC8zR3ZRRnNyV2lraXZlQT09IiwibWFjIjoiZDhmNGY4MTUzZjU0N2MxMjMzY2QzZjExM2E2NzBjYWUxZDVmMjk1ZTYzY2FjMWUwN2NkNTg4YmExMGE0YjlkZiJ9', 4, 'eyJpdiI6InFTS1hVd2Y2QmR3YllKUStpaVlUdGc9PSIsInZhbHVlIjoiZEJFS2ovRVYrWHBWVjRYeDU0Ymo3Zz09IiwibWFjIjoiZDc4ZTY5Nzg1MjcwODBlMjM1Y2U1ZjYxZjA2NGYzZDdhN2ZlZTRlNmY3ZDQ3YTNkNWIwNGI4NDFhYzhkZGRkNCJ9', 'eyJpdiI6IklhWitwZUFYZERRWnpBaDFPU29hL2c9PSIsInZhbHVlIjoib1FHeGhmVzVEVU9LemRFSkxpQk1KYzdjNlNlMStYcmVtcXdnZ2FmR29QOD0iLCJtYWMiOiIyYmE1OWQ0NGQ2NDM1MzJkM2ZjNGVhNzk0MWU0NGM5YjM3ZGUwNDA5MWNkZDEzZDRkODA5MTIxNDQ5NzEyN2ExIn0=', 'eyJpdiI6IitTY2lwOGoySytxU2Q2OWRhUVZTc3c9PSIsInZhbHVlIjoiQTFXcDBta2xDRTg4cVB1L2c5dlcvR1Y1d2JSZjhZZnJjZEpCOHN3VWpyYz0iLCJtYWMiOiJhOGY4NmY0YjAyZTNjNTFkNjM1NTg3NTU2ODhlNDFjYjBlNmI0NTlhZDZlMjk1NzFlNzJiYTRjODgwYWQ0YTU0In0=', 'eyJpdiI6IlptYlhSTUQ2dWtIRCszVTE5cVQ2Wnc9PSIsInZhbHVlIjoiaXB4R0ZyQjhiU3U5NWRRSXdsQTFEQWpoNWs3K3JXNTJDamNRekluTWI2VT0iLCJtYWMiOiJkOTM0ZGRkYWM5NjA2OTUzMmVjY2FlNDc5MGJlYjA3MjhjNGEzOWNjZjA0MzUxZWYxODI5NjhkZDRkYTJmNDIzIn0=', NULL, '2020-08-14 23:23:55', '2020-08-14 23:23:55'),
	(5, 'eyJpdiI6InU0aU9EY2YxOEpRZWUwMjMySnhsblE9PSIsInZhbHVlIjoiQTVoRUVOMmZMSG9sV2xoN09MNHo3Zz09IiwibWFjIjoiNmYxOTViNjI3MmEyMWRkMDBhMGQ0YWFhYzk1NzM1MDA2ZDRlODA5NmI0NTUzYWI1YWNmOTI0ZDg2NTM3YjRkYSJ9', 'eyJpdiI6IjBYNXhlRWZCQkhYWU1lY09hVEpZYmc9PSIsInZhbHVlIjoic0pLVlllQlNVKzMvUHRjUVNZQloxQT09IiwibWFjIjoiZDQxZjEyYjUyNTk2NjM0Yjg4MDI1ZTNiM2ViMGQ1MzM1ZDM1ZTIyMmYwNWI4NTYyZWNkYzIzYTc3ZTVlNzhlMCJ9', NULL, NULL, 'M', '2000-02-15', NULL, NULL, 69722222222, NULL, NULL, NULL, 1, 'eyJpdiI6Ik5TcUwrUHBPaVJCNWpJdDMxTEtvK0E9PSIsInZhbHVlIjoiZ0VPK05KMSt0UU5POEZ3amN6SFBQQT09IiwibWFjIjoiNTFjMzUxZjZkNjJmNGI3NjEwMzYwMGYyNTIyMjIxMmRiZGY2NjI3ODg0M2E2MGI5OTdmYTEzMGQ5MGU0MTMzOCJ9', 'eyJpdiI6IjBic2RXK1dKME5JSURVUUlRNGxjdnc9PSIsInZhbHVlIjoiOG5vSllzSUd6UXVXT1Y5a2g4YStPZz09IiwibWFjIjoiN2E0NzI4YzZjNzc2MDI4Njg0Y2JmY2NkOWZmZTk5YmVmMDkzYTU1YzczMTYzYWJlNDhiNTBkOWUyYTc2OTIwMCJ9', 'eyJpdiI6Im9ZZjQ5RDF1SmlYeG9WLzlmWTJ0R2c9PSIsInZhbHVlIjoiM2JlVlVNUUF1UFI1clVjSUxDellMZz09IiwibWFjIjoiMWVjMDRjNTcxNjU3MmEyM2U0N2EyODA4YjY0YzU2ZGE0ZTQ0MjQxOGJkZTEzN2IzYjcwZmJiODkzYmE5NmIwYiJ9', 'eyJpdiI6IklHOFdVR3dySENoWk94MVROcDdoWlE9PSIsInZhbHVlIjoibU41elV0eURwUVNsNEczMkxUVTlNUT09IiwibWFjIjoiMTQ2MzgyN2Q2ZDBhODVkODA1MWQ2MDk1NjgyZjdmZTEzNzQ3Zjg0ZjU1ZTQ5NzY1Njk5ZTQ3NDQ5ZGRjZjkzNyJ9', NULL, '2020-08-14 23:23:55', '2020-08-14 23:23:55'),
	(6, 'eyJpdiI6ImFGc0xsMWZQWDdpd2xPcHFmTDVVNmc9PSIsInZhbHVlIjoibHFuVmdCNS9FRXV2KzBhWW1CaGNLQT09IiwibWFjIjoiODU5YTYxMmVmM2ZiYmQxNGZlYjJkMzgyOWYwMGE5ZDViYTRhMjE5ZTg2MjEwMzE3NTgxZDZmOWNiMjc3YzE4ZiJ9', 'eyJpdiI6IituSFhlY2VVdC9abDdZamI5dHM0SGc9PSIsInZhbHVlIjoibUhsZjJTODJPT2x1NHZOcHUvZ2U0dz09IiwibWFjIjoiYmM2NDJiN2YzNWNlOGUzYjQ2MmMyODllMjdjMDAwOGE0YWVjMzY5MTQ5N2ZhMDQ3YTU5OGJmN2YwOTkxOTQ2NyJ9', NULL, NULL, 'M', '2000-06-20', NULL, NULL, 75922222222, NULL, NULL, NULL, 8, 'eyJpdiI6ImF6VElOTmlxcnBER0ZjcURzN1U3dGc9PSIsInZhbHVlIjoidzRSY0FYcHR2VjRnS0IzRkVtaUl4UT09IiwibWFjIjoiZDkzZjlkMzljODU4ZTRkNWJjYjYzMGI0NWVkNjc1NGY1NTQxODgxNTJmMmI4NjFmZDE0YjUyZTNkYTNlOGUzMCJ9', 'eyJpdiI6Ink3U2dZL2EyeG5uU25KSGZVb24zdWc9PSIsInZhbHVlIjoiVGJ6U2k3S3BzOTE2bThvSW9pT29Odz09IiwibWFjIjoiYjJjODAxOWFiYTFjYmNkNmJhNjZiYTAyMDZkMWFhM2U1MzJlMWIyOWRjZjRmZWY3YTYzM2MzM2I0Y2JhM2Q0OCJ9', 'eyJpdiI6InpBUFdiUmtXczI0QmIyMDdGNVN3b3c9PSIsInZhbHVlIjoicnFvelhDNkNpZjBESVMySm5KMXBCdz09IiwibWFjIjoiYTU3ZmFjNzBjNTgyNmRlMTQ4MTg4MDllMDA1MzE4ZDY3MzA1MDEyNGM0MTUwMzcwNWJmYWQ5ZWRhMzE1ODNiYyJ9', 'eyJpdiI6IlhmZXZRTXZWWEV5ZjNhU0NiNWlid2c9PSIsInZhbHVlIjoiUS9mVGZXa1lCVHJOWnh3MjZPODdhUT09IiwibWFjIjoiMTgwNTZhZWQwZjY3YzA0M2EwYWY2YjRlNzI0OTA0NzA2N2RlZDg0YTFiMTA3NzMwNjI4NzBhNzZjMjFkYWZkZiJ9', NULL, '2020-08-14 23:23:55', '2020-08-14 23:23:55'),
	(7, 'eyJpdiI6IkJxR2tocFl0bnN2RWc5QTlnc0pvZlE9PSIsInZhbHVlIjoiWnZkR0NWRXQwRmZvaHVCZ281ZUFSZz09IiwibWFjIjoiNDg0YjEyNmI1YWRlNGUzOTY3Zjk2MzVhOWRjZmMxYTAzZDVmMzFlMmViNDE1ZTJiNDRjODEyYjM5YzdiZWNiOCJ9', 'eyJpdiI6InZqeUtpSDI4d2x5RzIybjF1czcxZ0E9PSIsInZhbHVlIjoiMTlGNngyR2VlWVlQRStMdnFIakJxdz09IiwibWFjIjoiY2QzYjZkZDBhZDE5YWY1MTZkNmE0OGQyYjMwYTBjNmU5ZmY4MTZhNjYzYzM2ZTYyZDUxMTA2NWM2YTFlODE5OCJ9', NULL, NULL, 'F', '2011-03-16', NULL, NULL, NULL, NULL, NULL, NULL, 7, 'eyJpdiI6InFzN0hGU3RnUWhZMXVtVVBlNUNJZHc9PSIsInZhbHVlIjoiVnorY3k3bUZlWmNsSitDT2tDeEpYZz09IiwibWFjIjoiODMxODIyZDMyYjdkOGNjOGUxZWE5NWVlMGU0MWJlNzNlNjE4NTYzNTE3NjkyMDc4NWVmZmE3M2JmOTJiYTA2MCJ9', 'eyJpdiI6IjRmN3ZTZHBpM1BjanNmLytOMkpubEE9PSIsInZhbHVlIjoiVDhIZTloSW92aXhSd0RCT0VSRmRTdz09IiwibWFjIjoiY2MwMGNkZGMyMmJkOTlhYThkYmM3NGM4ZDMwM2M0ZDBkYWQxMjE4NTc1N2I0MmViZjYyZmVlNTY0NDczNjU2OCJ9', 'eyJpdiI6InpneGpWV2VIZlFWbU1VNERiNTE2RVE9PSIsInZhbHVlIjoiQ3NWRW9Hekh5b3M3eUNZbXVxY3pmdz09IiwibWFjIjoiMWNkZGIwNzA0ZTI0MjRmMjMxMzM0MDllMDA3NzRlOTM2YmNiNjJiNGVlNjAzNThkMTc4NjQ4NGMwNzUxZmMxMiJ9', 'eyJpdiI6IlNXUFNTeFNzdjd3S0lUSGRJNUt2NWc9PSIsInZhbHVlIjoiU1htd09NYWdWZTBxL0htK1VtTmptQT09IiwibWFjIjoiYWUwZWI4NTI4NTdlMjRiYmVlNGQwYjFlOGNmZjcwNjIyN2I1OTg2MzlmNTA0NWNiMDQzOTgzMzM5MmVlZmEzZSJ9', NULL, '2020-08-14 23:54:37', '2020-08-14 23:54:37'),
	(8, 'eyJpdiI6IllGNEJjb0N0VmZ3Q0h2NDVUZVBMVGc9PSIsInZhbHVlIjoiNjU5b1B5QVl5eDU0bGpteGd4Qi9ydz09IiwibWFjIjoiZjA2NjY5MzA1OTVkN2RjZWM0MGY0MmQyNThiYWM2MDNlZDM3ZDFlNmMzYTJhNGQ3OTI2OGRjZmM2Yzc5YTRhNiJ9', 'eyJpdiI6IkRGQXQwNTd1K3JmU3ZwTDAxKzMyMHc9PSIsInZhbHVlIjoiYkg1b1FyVzh6NmJON2VRRWl3bUpmQT09IiwibWFjIjoiYmJmMTA4ODA3NGFhYWIxMmE1YWQzZGYyZWU5MDJmYzgyMzFmMDMyYWFkNTJmZDI3ZTJhNTRlMGM1NDY1OThiYSJ9', 'eyJpdiI6IjJZM2VDSVdPaTU0VWRFamZpMXpkNHc9PSIsInZhbHVlIjoiZFUrNWtrM3lqQlpKSVVHTkRodmdaUT09IiwibWFjIjoiZDVjMDQxNTdkYWE4YjBlMzU0NDI0MzM1MjViNWU4NzI4MDVmMTU5OTZkMDFmNGQzM2RiNDEyZDk5NTViMmZlZCJ9', 'eyJpdiI6IlpQS2F5bkh2V3dNNFkyTVJYVXJicVE9PSIsInZhbHVlIjoiMDljU0FDRy9uMFZBSHRjbVNsMEw3ekhDSzBWRmhXaHk5SjArbjNGaEliNC8zMjJ5RkxkR294OXo1M09BQUtTcCIsIm1hYyI6IjM5Y2E0OWZhYTM1Yjg4YmIxYjM0ZjE4NTYxN2EzZWEyYmJkNmQ4MjEzN2QwOTU1NzBjOTQwYjdmNTFkZGEzNTYifQ==', 'F', '2000-02-15', 6, NULL, 74422222222, 2, 'eyJpdiI6IktIRTIvZ3hXNEdrc0czRHE2eXp4RlE9PSIsInZhbHVlIjoiaTBZU2hkY1hMRnBlODR2U3Y4UERZdz09IiwibWFjIjoiZmYzNzQyNDA0ZmIzYWM1OTI0ZTAwMzk3ZWEzNDJjOTE1ZWRkMGI3ZTllMTNhOWI4ZjI0YTE3MDUxOTUxMGYzMiJ9', 'eyJpdiI6IjB1MkY1a2d6ZFU0b1dkQWdjZ2Z2eWc9PSIsInZhbHVlIjoiTW9jdE56WDMzc2Q3WXE0MHRHdE1HUT09IiwibWFjIjoiMGU0NjE4YmM5ZDc5OTNkM2M0MmNmMmJjYTljMjlkOWFlOTA1OTk2NjdhNzE3ZWQ3ZjdjNjZmZmJmNTFkZjJkMSJ9', 1, 'eyJpdiI6IjE0aEVZaHU5czVxcG1HNjVnNUJEc2c9PSIsInZhbHVlIjoicjdmdkkyS1B1cCtmL2dpYXVUU0VEdz09IiwibWFjIjoiMGQzMGE3MjM3OTNkMzdmNmEzZGY5ZjM5MGZhZDU4OGY5YzQwOTFiYWU2ZmIyMjIwNjU5OTVkNTFjM2I5Y2E5NSJ9', 'eyJpdiI6ImgyS3FpbkNzSWNTTTcrWUN6NDU1Qmc9PSIsInZhbHVlIjoiaHd3eUtrcTVPcUdlWGUwWXF3cWFxL2w3UlFrdDc4K2hhTDZRcWhYSjZ6RT0iLCJtYWMiOiIyYjliYmYzY2EwYTRmYzBjZDRlZjMxMTAwMjdlMzNiNmRmMWY3ZmJjZWE1N2M2MjBiNWM0M2E4YmUwNWU5YWE5In0=', 'eyJpdiI6IkZhMGdkRS9ZczFQUGN5cnI4b1RtclE9PSIsInZhbHVlIjoiZWhoZzRKaHpmWHIyMzIzWnJwaHZBcGJtenZNZ2ptR2sxYkM0OGV4T1ZTRT0iLCJtYWMiOiI0YjZiYzcyZjQ1NGJlOTc4OGE2NTM4YmYzZDVhZGM4YTkwZTk3MjMyNjgyMTdlYjgxMDBjZjQxMDk2ZDZhYjMyIn0=', 'eyJpdiI6Im4rL1BQNE9uQnBvQnd2cVdmZWtXbUE9PSIsInZhbHVlIjoiazFHR3dzSjBMQUNNYWpiQnMvYlpRbndZZTRDUXphUmZGL2Q2b0haVkRvdz0iLCJtYWMiOiI1YzFjNmM0NDVhM2M1NWEwMTRlYmIwZmFkYjEzZWJkZjk5YzZjZmZlYzlhZTQzNGY1ZjhkYmRlZTBkMzg0ZWQ0In0=', NULL, '2020-08-14 23:54:37', '2020-08-14 23:54:37'),
	(9, 'eyJpdiI6Imh4UUJ0QmRUNDJaREt3Z0xGM2dVUVE9PSIsInZhbHVlIjoiNnJtNzdENW9wMzd4c0NlZUt6VHoyUT09IiwibWFjIjoiNmNkN2ZiMmE4ZWIzNGUyZTU4Mzc3ZmZmZTA3MjY2NTYyYTViNDQyNGY2OTExMjU5ZjgzMzNhOWNjNDAzMmU2MyJ9', 'eyJpdiI6IjJnMWpZSHRmRGlsR3QvSFZENi85clE9PSIsInZhbHVlIjoiL1ZoL3R3K29PM1ZQZ1BacFp0RlFpQT09IiwibWFjIjoiOGQyMTgzMjM4Y2QxMDMxY2U5OTNlZWViZWM1ODdlYmJjNzg5ZDAyZjkzNTJiZjVmOThjOTY2MDljZDRiOTk4NSJ9', NULL, NULL, 'M', '1989-06-06', NULL, NULL, 29522222222, NULL, NULL, NULL, 1, 'eyJpdiI6IlBsSjRnQWJzK0IxUGJQdzZzNlJpWFE9PSIsInZhbHVlIjoiUmNMd2JMaldJamVQRGVLMTJlR3haZz09IiwibWFjIjoiY2I5NWNiMWViMzc4NDkyNTE4OWNmMWZkMDBmZDRkMmJiZTNkYTM3NjhjOTNlNjNhYjg4MGRkMmM5ZjNiMzFiYSJ9', 'eyJpdiI6InhPWC9GUjlUYmxlMmhQR25uTEtFeUE9PSIsInZhbHVlIjoiWCtrUVNtUW5SdEpJUFR2cmE5aTdCUT09IiwibWFjIjoiYmM1MmQ3ZDJkMjYyNTQ3NTFmNWM0YzVkMjRlZWVlN2JhMTNlODY4MTRlZTE5M2EyYzY3NTViMDkxZmQyNWNlMCJ9', 'eyJpdiI6IkI3UWNWMnlXWDhXeXNjaU9wYmF5NHc9PSIsInZhbHVlIjoiS2pkRWorU3VBZWgzYjhxdzVsdVhWZz09IiwibWFjIjoiZjlmNjg0M2NkM2JhNjY1YzUxN2YxN2RkODA3NmZiZGIwZjJhMDA5ZGEwZmI5ODQ2NTYxZDVjOGNlMjY2YjRjMCJ9', 'eyJpdiI6InhCcVQ4VzFsRFhvSWZvd29FbFU5cnc9PSIsInZhbHVlIjoick94OEpuWFh5dlJoc2FqM3FyZXQ1QT09IiwibWFjIjoiYzgxMDQwOWExMWNlNjc3NjhkYzE5ZmU2MjVmNTkwMTYzMTgwYjI0N2VhOTRhMmNhMDZlYzA0ZjZiZmIxOWQ3ZCJ9', NULL, '2020-08-17 06:23:53', '2020-08-17 06:23:53'),
	(10, 'eyJpdiI6ImVVVWRGWmgwRHVTNTRUNW5HOUwrM2c9PSIsInZhbHVlIjoiOWt0dDhDZ2U3ZmRWVFVncjNuT2xaUT09IiwibWFjIjoiOWRkNjZmN2E3ZGQyNmNkZDQwN2JkZWZhODBiMGQxNGYyNWRmNTk2ZThmMjUzNTVmZTVlNDM4NzZhYWJhOGVhYiJ9', 'eyJpdiI6IkgxTUFyZmhMcUNrUU5HUFh3cmRhTlE9PSIsInZhbHVlIjoiY3V4QndLVCtRckdaMmxxVVRXdWlpUT09IiwibWFjIjoiNzAyOWNmZGMyOTZkZmY0NjM1MGE0MzVmM2ExNzQwYzUyZWU3ZGQ4ZGVjM2NkNDM3MmViNWJjYzE2YTRkNjk3NCJ9', NULL, NULL, 'M', '2000-06-14', NULL, NULL, 73422222222, NULL, NULL, NULL, 8, 'eyJpdiI6ImZnZDlwb0lBTnFWbVJoU2FBTW9LWlE9PSIsInZhbHVlIjoiRCtuR0tkY3hqdXhDWmk5elpsYXhCdz09IiwibWFjIjoiODVkNWM0ODkxMzBlMGM5ZDJlMDMzZGE3MGI1NGM1ZTI2Nzg3YThlZjE2MWNhMGYxY2RlNjRlNDNiMjdlOGUwOCJ9', 'eyJpdiI6ImhjdUJLT1BLbmQyWFc0V09ZUmFqdFE9PSIsInZhbHVlIjoiVS9OUGxSUTZvU3BaMUtVTCt1NDA1dz09IiwibWFjIjoiZjEzMzcyZDYwODUwY2VhNGZiYWMzZjAxNzU1Y2Q0NTBkNzlmYzQwNzM0Mjg3YTk2NzE0Y2M4YmI5NjE2MzAyNiJ9', 'eyJpdiI6ImJ0TEoydHlnL2ZQQ3J3VnR5K0dseGc9PSIsInZhbHVlIjoib0tpTVRQSytXcUxlUWtKR1paaHBFQT09IiwibWFjIjoiY2I3M2NjM2E4ZjIwNzFmZjNjZDM5NmU2MWMwYTlmYmEyZjdiNzlkNTE3ZjRiYTA0ZjEzMDRhYzdhMWU2M2ViYSJ9', 'eyJpdiI6IitoMUpPRnlkY0xwL2tVWVFYQmplRlE9PSIsInZhbHVlIjoiRDZEbkswOHhNQWlxQlZ2VnZqWTdqQT09IiwibWFjIjoiMjRjNGUzNDIxMzE0OWNjN2Y1MDExMjIxOWRlM2NhMDRhMzBmMDYyZjc1ZWUyNGZlMGM4MmRiNTRiMjg3YzRjNSJ9', NULL, '2020-08-17 06:23:53', '2020-08-17 06:23:53'),
	(11, 'eyJpdiI6InUwZmttVy9IdXVTbG51aXBXTDQ1a3c9PSIsInZhbHVlIjoiSURmVW9KRVJaUHpPeXdXR1gvYUxsdz09IiwibWFjIjoiMDQ4ZDkwMTk1MTg3ZGQzZjcxODE0NWFhOGZiYzE5Y2VhMmYyOGMzNTY5ZWE4ZjJkODU5ZTRjN2RmYjI0Yjc4YiJ9', 'eyJpdiI6Imk3YTBoZkpVVHpEVzhpeVhpaVFGQ3c9PSIsInZhbHVlIjoiUGVCSGdONTMxcXVOai9GQlF3bkZEZz09IiwibWFjIjoiOTNlZDcwYWY0ZGRlZWY3NGU4NDQ0MjhiYTE1ZWJiZjdiZWJjZDdiMjk1OGIyYjE3ZTRmYTBlYmZiZDQzZGFlMSJ9', 'eyJpdiI6IndvcnBLZnNMWTBISC9nd2p5NVc1TXc9PSIsInZhbHVlIjoicjUyUUVGTnhCSUVET2ZXR3hYcVErUT09IiwibWFjIjoiMzM3ZGZhM2E4MGJlYmJhOTYxOTA1ZDI3YmNkZGFhMmY5ZDVjNTRjMDdjMmM1OWM3MmU3MDFjMjJjMGI0YmUyNiJ9', 'eyJpdiI6IkI3ZGNUN0pva3N4Z3p1WWxEUndEbXc9PSIsInZhbHVlIjoiRllFdWhLSUdtUEQreTJObzkwclZNOE5uV3VXdjVsblhIdmRsNHNXMWJDdmVUTTg0R2NSb00xdGdRWXh3TEFldyIsIm1hYyI6IjA0OTE2NTY4M2RjYTJkNWNiNDdmMTQ1YzQ1MDMxYjc4MDRlOWZiMWJlNjEzYTMzOGRlNjFhNTI3ZTJhY2I1NDEifQ==', 'M', '1989-01-02', 1, NULL, 46022222222, 2, 'eyJpdiI6IkhQY0wrTzdmejByaEJsZ2UxRDE0eEE9PSIsInZhbHVlIjoiaWxGbXltUyttYkllNjlUZW9WNFZUZ2xuUTIxMUFoTFBVM2MzaEJJNFJsQnJvalhJM1VaVEJrOFdGRzNSZVRZUyIsIm1hYyI6ImJiNzJiYmY1MmQwNmUzZWQyMGM2ODVlODFlNTNjNjE4YTJkZmNkNDNhZTVlNzQ3ZWZmYjBiN2NhN2NlZjZlYWYifQ==', 'eyJpdiI6IjJlNjdqTGtuUGNxWGo4Ny9xbGFyTlE9PSIsInZhbHVlIjoiZ0crR1Q0OFpqdFR4NjUxNHl2L3RXdz09IiwibWFjIjoiZjhkNDcwMzExZDU0NDNkYmNlNWQxMzU4MGYzNDk5N2E2NDE1ZWE5MzVjOThmOGEzMTQyOTQ5MzQ2YmU4ZTAzNSJ9', 5, 'eyJpdiI6IkJ2MnE0ZjRSaXhZM0Y0cHZ5czhnT2c9PSIsInZhbHVlIjoieTZUVUxGVThJRlRGQldqcTlyQ2tZZz09IiwibWFjIjoiMTgzY2EyNTBkYTAyOThlNDg1ODNkN2MzZTkyOGI4YzQ3NjFiZjcwODk2ZjVlNjAxMWVkOGY1ZTVlYzExYzdiYSJ9', 'eyJpdiI6ImJjU1VwYmhtSVFQTUJtUythT044MUE9PSIsInZhbHVlIjoiclF5SzFoRDNhT21YZ3NQUTVuREJFdVY5dnFCeHNraW4wVE1HeGgxRGlUVT0iLCJtYWMiOiIxOGQ4ZWMxZjYxYmI3ZjRiYzNmMzVhNGUyYzhhNDljNzdjYjAwY2Q2MzMzYjVkNzdhZDhiMDVjMDM4ZDg2OWNiIn0=', 'eyJpdiI6ImxNZGJ3MjBsN3FSVERyVjhucFozREE9PSIsInZhbHVlIjoiTmU2OEMwZ2c4Vi9rVERvSmhuVDZuQklUMEJYQ2x0bWtoMUpOT1hVWnU1OD0iLCJtYWMiOiIxMTBhNDRlODcwODViMTc4OTdjYTA5ZTkwMmQ5ZWYwNWRkNjMzNzU1MzM5ZDUwM2ZmMzdiYWE1YjhmZjg0OWIxIn0=', 'eyJpdiI6InVyYVprU05qaUt5eXFlaDZUazdKWkE9PSIsInZhbHVlIjoiK1EyZGRMcWxRcUlxdmxjWmM1eG01WFBnNHBaQjZBUkpTeDB2WDRHTVhSbz0iLCJtYWMiOiI5M2YxMjg0ZDlkMTBiZDU4Yjc5M2JlZDRhYTA3NTlkZDBiMmYwOTA1NzIxNTRkYTczNGE4Zjk4ZTNiMDA0YmEwIn0=', NULL, '2020-08-17 06:23:53', '2020-08-17 06:23:53');
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
  `confirm` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_person_household_persons` (`person_id`),
  KEY `FK_person_household_households` (`household_id`),
  KEY `FK_person_household_relationships` (`relationship_id`),
  CONSTRAINT `FK_person_household_households` FOREIGN KEY (`household_id`) REFERENCES `households` (`id`),
  CONSTRAINT `FK_person_household_persons` FOREIGN KEY (`person_id`) REFERENCES `people` (`id`),
  CONSTRAINT `FK_person_household_relationships` FOREIGN KEY (`relationship_id`) REFERENCES `relationships` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.person_household: ~11 rows (approximately)
/*!40000 ALTER TABLE `person_household` DISABLE KEYS */;
INSERT INTO `person_household` (`id`, `person_id`, `household_id`, `relationship_id`, `relationship_other`, `active`, `confirm`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 2, NULL, 1, 0, '2020-08-14 23:22:24', '2020-08-14 23:38:23'),
	(2, 2, 1, 0, NULL, 1, 1, '2020-08-14 23:22:24', '2020-08-14 23:38:23'),
	(3, 3, 1, 7, NULL, 1, 1, '2020-08-14 23:22:24', '2020-08-14 23:38:23'),
	(4, 4, 2, 0, NULL, 1, 1, '2020-08-14 23:23:55', '2020-08-14 23:45:03'),
	(5, 5, 2, 1, NULL, 1, 1, '2020-08-14 23:23:55', '2020-08-14 23:45:03'),
	(6, 6, 2, 2, NULL, 1, 1, '2020-08-14 23:23:55', '2020-08-14 23:45:03'),
	(7, 7, 3, 2, NULL, 1, 1, '2020-08-14 23:54:37', '2020-08-14 23:59:38'),
	(8, 8, 3, 0, NULL, 1, 1, '2020-08-14 23:54:37', '2020-08-14 23:59:38'),
	(9, 9, 4, 1, NULL, 1, 1, '2020-08-17 06:23:53', '2020-08-17 06:26:37'),
	(10, 10, 4, 2, NULL, 1, 1, '2020-08-17 06:23:53', '2020-08-17 06:26:37'),
	(11, 11, 4, 0, NULL, 1, 1, '2020-08-17 06:23:53', '2020-08-17 06:26:37');
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

-- Dumping data for table msdfs_forms_db.role_permissions: ~10 rows (approximately)
/*!40000 ALTER TABLE `role_permissions` DISABLE KEYS */;
INSERT INTO `role_permissions` (`role_id`, `status_id`, `description`, `created_at`, `updated_at`) VALUES
	(2, 1, NULL, '2020-08-09 23:05:16', NULL),
	(2, 2, NULL, '2020-08-09 00:50:03', NULL),
	(2, 3, NULL, '2020-08-09 00:41:38', NULL),
	(3, 4, NULL, '2020-08-09 00:42:07', NULL),
	(4, 5, NULL, '2020-08-09 00:44:00', NULL),
	(4, 6, NULL, '2020-08-09 00:53:41', NULL),
	(5, 7, NULL, '2020-08-09 00:44:34', NULL),
	(7, 8, NULL, '2020-08-09 00:46:54', NULL),
	(7, 9, NULL, '2020-08-09 00:47:33', NULL),
	(7, 11, NULL, '2020-08-09 00:47:16', NULL);
/*!40000 ALTER TABLE `role_permissions` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.schedules
DROP TABLE IF EXISTS `schedules`;
CREATE TABLE IF NOT EXISTS `schedules` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_by` bigint(20) unsigned NOT NULL,
  `type_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_schedules_users` (`created_by`),
  KEY `FK_schedules_schedule_types` (`type_id`),
  CONSTRAINT `FK_schedules_schedule_types` FOREIGN KEY (`type_id`) REFERENCES `schedule_types` (`id`),
  CONSTRAINT `FK_schedules_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.schedules: ~0 rows (approximately)
/*!40000 ALTER TABLE `schedules` DISABLE KEYS */;
/*!40000 ALTER TABLE `schedules` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.schedule_applications
DROP TABLE IF EXISTS `schedule_applications`;
CREATE TABLE IF NOT EXISTS `schedule_applications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `schedule_id` bigint(20) unsigned NOT NULL,
  `application_id` bigint(20) unsigned NOT NULL,
  `number` int(11) DEFAULT NULL,
  `reference_number` varchar(50) NOT NULL,
  `applicant_name` text NOT NULL,
  `id_card` bigint(20) NOT NULL,
  `address` text NOT NULL,
  `vat` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `supplier` text DEFAULT NULL,
  `invoice` text NOT NULL,
  `contact` text NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_schedule_applications_schedules` (`schedule_id`),
  KEY `FK_schedule_applications_applications` (`application_id`),
  CONSTRAINT `FK_schedule_applications_applications` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`),
  CONSTRAINT `FK_schedule_applications_schedules` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.schedule_applications: ~1 rows (approximately)
/*!40000 ALTER TABLE `schedule_applications` DISABLE KEYS */;
/*!40000 ALTER TABLE `schedule_applications` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.schedule_items
DROP TABLE IF EXISTS `schedule_items`;
CREATE TABLE IF NOT EXISTS `schedule_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `schedule_application_id` bigint(20) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `item` text NOT NULL,
  `cost` decimal(10,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_schedule_items_schedule_applications` (`schedule_application_id`),
  CONSTRAINT `FK_schedule_items_schedule_applications` FOREIGN KEY (`schedule_application_id`) REFERENCES `schedule_applications` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.schedule_items: ~0 rows (approximately)
/*!40000 ALTER TABLE `schedule_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `schedule_items` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.schedule_rent
DROP TABLE IF EXISTS `schedule_rent`;
CREATE TABLE IF NOT EXISTS `schedule_rent` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `schedule_application_id` bigint(20) unsigned NOT NULL,
  `landlord` text NOT NULL,
  `item` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `start_date` date NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_schedule_items_schedule_applications` (`schedule_application_id`) USING BTREE,
  CONSTRAINT `schedule_rent_ibfk_1` FOREIGN KEY (`schedule_application_id`) REFERENCES `schedule_applications` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.schedule_rent: ~0 rows (approximately)
/*!40000 ALTER TABLE `schedule_rent` DISABLE KEYS */;
/*!40000 ALTER TABLE `schedule_rent` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.schedule_types
DROP TABLE IF EXISTS `schedule_types`;
CREATE TABLE IF NOT EXISTS `schedule_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(150) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `country` (`type`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.schedule_types: ~4 rows (approximately)
/*!40000 ALTER TABLE `schedule_types` DISABLE KEYS */;
INSERT INTO `schedule_types` (`id`, `type`) VALUES
	(3, 'Clothing Approved Schedule'),
	(2, 'Household Approved Schedule'),
	(1, 'Rental Assistance Approved Schedule'),
	(4, 'School Supplies Approved Schedule');
/*!40000 ALTER TABLE `schedule_types` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.status: ~13 rows (approximately)
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` (`id`, `status`, `button`, `step`) VALUES
	(0, 'Inactive', 'deactivate', 0),
	(1, 'Active', 'activate', 1),
	(2, 'On Hold', 'on hold', 1),
	(3, 'Forwarded', 'forward', 2),
	(4, 'Logged', 'log', 2),
	(5, 'Pending', 'pending', 2),
	(6, 'Updated', 'update', 3),
	(7, 'Submitted For Approval', 'submit for approval', 3),
	(8, 'Under Review', 'review', 3),
	(9, 'Approved', 'approve', 4),
	(10, 'Sent For Payment', 'payment', 4),
	(11, 'Rejected', 'reject', 4),
	(12, 'Restored', 'restore', 3);
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table msdfs_forms_db.users: ~23 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `first_name`, `surname`, `role_id`, `email`, `email_verified_at`, `active`, `password`, `remember_token`, `last_online`, `created_by`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'User', 7, 'admin@email.com', NULL, 1, '$2y$10$aRBnMbZm1ld51AkoRYKd4uACqpoNXSaVYPjq74o94WAhb9fGDnaFm', NULL, '2020-08-16 10:52:24', NULL, '2020-05-02 04:29:15', '2020-08-16 10:52:24'),
	(2, 'Morgan', 'Merritt', 2, 'xebubodyg@mailinator.com', NULL, 1, '$2y$10$QnAKGQFoMMSzWUZ.NL2atuXDKsCSjxE8gRDDt1IMOucFu7wTgJcFq', NULL, NULL, 1, '2020-08-06 22:02:35', '2020-08-07 02:31:40'),
	(3, 'Social', 'Admin', 1, 'admin@social.gov.tt', NULL, 1, '$2y$10$eYk3SMODJZZcGQXE6HK1Y.f5WsaGVlnAPu.q/lOaETHPKK5NqgnGG', NULL, NULL, 1, '2020-08-07 02:25:15', '2020-08-07 02:33:25'),
	(4, 'SAO', 'Test', 1, 'sao@gov.tt', NULL, 1, '$2y$10$Tgr0XoTcEGrZG.y5LPr4oe3Tu18iNl9QOwQBJn.Xox5l10TPwZefO', NULL, '2020-08-10 14:35:18', 1, '2020-08-10 10:13:01', '2020-08-10 14:35:18'),
	(5, 'John', 'IntakeOfficer', 2, 'intakeofficer@covidformstt.com', NULL, 1, '$2y$10$3xOOzGsjxcF8tINO7ANkr.UzxNh.9pmkNKdl6crrXGi8WCs4tLRVC', NULL, '2020-08-10 12:29:27', 4, '2020-08-10 12:01:11', '2020-08-10 12:29:27'),
	(6, 'Intake', 'Test', 2, 'intaketest@gov.tt', NULL, 1, '$2y$10$ItGMN.jWEWJRQ.cQ4.9Q8.yhBF5HZLxWaWfWh3hbKw2kMYFkJRsB2', NULL, '2020-08-10 13:51:41', 4, '2020-08-10 12:02:06', '2020-08-10 13:51:41'),
	(7, 'Registration Clerk', 'Tester', 3, 'clerkuser@gov.tt', NULL, 1, '$2y$10$lTWLGHA1ka7QFlvc/I0mfO4BsndvUog37fvC.zhK9BbZrxdsSMpW.', NULL, '2020-08-10 12:42:25', 4, '2020-08-10 12:04:36', '2020-08-10 12:43:04'),
	(8, 'Welfare', 'Officer 1', 4, 'officer1@gov.tt', NULL, 1, '$2y$10$5h2SG/Xx8nL1EcygRUOjYOwsd/wnfjVvCWEH31qzVv0BJgHmi/VSC', NULL, '2020-08-10 12:47:10', 4, '2020-08-10 12:07:50', '2020-08-10 12:47:34'),
	(9, 'Welfare', 'Officer 2', 5, 'officer2@gov.tt', NULL, 1, '$2y$10$/4kLrwD6Al9b/DKfV6ajl.vGuNvuyc8bfcecyAvkewmo2vkDskPTK', NULL, '2020-08-10 12:49:41', 4, '2020-08-10 12:13:38', '2020-08-10 12:49:58'),
	(10, 'Schedule', 'Clerk', 6, 'schclerk@gov.tt', NULL, 1, '$2y$10$TyUXuVuqhQSnAKtY3jMYPeVQw6ScC9XZEaU8lzXKL7xwaTDmyKIpW', NULL, NULL, 4, '2020-08-10 12:15:18', '2020-08-10 12:15:18'),
	(11, 'John', 'Registration', 3, 'registration@covidformstt.com', NULL, 1, '$2y$10$fFfUOXoI8Vjep8tw163atuqD/nojjUZZHKUNeGV/04.EfmYGL47ly', NULL, '2020-08-10 12:55:20', 4, '2020-08-10 12:15:45', '2020-08-10 12:55:20'),
	(12, 'Supervisor', '2', 7, 'super2@gov.tt', NULL, 1, '$2y$10$GOhCF98gqgrn0ytynTYCX.2XT/3Wtl6Um7TAqMnd2iVps8Z6wx7eu', NULL, '2020-08-10 12:52:24', 4, '2020-08-10 12:16:16', '2020-08-10 12:52:57'),
	(13, 'John', 'WelOf1', 4, 'welfareofficer1@covidformstt.com', NULL, 1, '$2y$10$ItBHwIgk8kfcGO.zz9tyfuAzDR3wyVK9xB/9lybYUF76v2vy6onbi', NULL, '2020-08-10 12:56:58', 4, '2020-08-10 12:18:27', '2020-08-10 12:56:58'),
	(14, 'John', 'WelOf2', 5, 'welfareofficer2@covidformstt.com', NULL, 1, '$2y$10$VDi3PohsCWzC7TRlGRurkeMbKK6AJYiPzQbSPTNoaiHPl0bxiNNBG', NULL, '2020-08-10 12:59:03', 4, '2020-08-10 12:19:24', '2020-08-10 12:59:03'),
	(15, 'John', 'ScheduleClerk', 6, 'scheduleclerk@covidformstt.com', NULL, 1, '$2y$10$EWvgAQANEVB5Kj0G0.8bhOQROnbxbETR7NY/ZKZRU4fHMBKDefRa.', NULL, '2020-08-10 13:04:02', 4, '2020-08-10 12:20:39', '2020-08-10 13:04:02'),
	(16, 'John', 'Supervisor', 7, 'supervisor@covidformstt.com', NULL, 1, '$2y$10$4Om/qv.1pWmlQIi3x4hwG.9zFbailyGlivjXjDHaO4C7AxYE6yt0a', NULL, '2020-08-10 13:00:37', 4, '2020-08-10 12:22:00', '2020-08-10 13:00:37'),
	(17, 'Sharlan', 'Intake Officer', 2, 'sharlanintake@social.gov.tt', NULL, 1, '$2y$10$Mh3BpUSehYgLBdcJRk1Uw.TLIDWzILSgBz50S/EJbYycfURRI5sf2', NULL, '2020-08-10 13:51:08', 3, '2020-08-10 12:48:59', '2020-08-10 13:51:08'),
	(18, 'Sharlan', 'Registration', 3, 'sharlanregistration@social.gov.tt', NULL, 1, '$2y$10$2tiNROXm5IVPvMWEmmT/3eclKJvVIH7thNBFEx6ZSHFO9Er/oPzdu', NULL, '2020-08-10 13:24:01', 3, '2020-08-10 13:22:42', '2020-08-10 13:24:01'),
	(19, 'sharlan', 'welfare1', 4, 'sharlanwelfare1@social.gov.tt', NULL, 1, '$2y$10$IxXv5vSqAPSAMoXQ/Eok7.6vONeZesN17Zf0mOIYCis3HCFfPRvRm', NULL, '2020-08-10 13:28:03', 3, '2020-08-10 13:26:34', '2020-08-10 13:28:03'),
	(20, 'sharlan', 'welfare2', 5, 'sharlanwelfare2@social.gov.tt', NULL, 1, '$2y$10$3ca0NLzI61NzP4/To4pu7.1jieOOGpJ5Ybm5A9eZpn3TpvcttgGiO', NULL, '2020-08-10 13:30:33', 3, '2020-08-10 13:27:02', '2020-08-10 13:30:33'),
	(21, 'sharlan', 'supervisorII', 7, 'sharlansupervisorII@social.gov.tt', NULL, 1, '$2y$10$MEwksBYLUh.r7bJhDB01Q.awO1LMpAcLdupB03bBI3QR5CtmMSj4y', NULL, '2020-08-10 13:31:46', 3, '2020-08-10 13:27:28', '2020-08-10 13:31:46'),
	(22, 'sharlan', 'schedule', 6, 'sharlanschedule@social.gov.tt', NULL, 1, '$2y$10$Y.4p13tIdm3tlyFMUWZgi.UL5C3Q3unvMzjxjhbvCxb613lfPeeEy', NULL, '2020-08-10 13:33:10', 3, '2020-08-10 13:27:49', '2020-08-10 13:33:10'),
	(23, 'supervisor', 'Local  Board', 7, 'supervisor@social.gov.tt', NULL, 1, '$2y$10$sqEwRNJhcGoiqyYpsvCS7eNWdM3W1t4pUwJG5hquHo9JFpmH05hS2', NULL, '2020-08-14 15:39:34', 3, '2020-08-14 15:34:38', '2020-08-14 15:39:34');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.user_logs: ~3 rows (approximately)
/*!40000 ALTER TABLE `user_logs` DISABLE KEYS */;
INSERT INTO `user_logs` (`id`, `user_id`, `ip`, `action`, `created_at`, `updated_at`) VALUES
	(1, 1, '127.0.0.1', 'Login', '2020-08-14 23:19:24', '2020-08-14 23:19:24'),
	(2, 1, '127.0.0.1', 'Login', '2020-08-15 18:22:43', '2020-08-15 18:22:43'),
	(3, 1, '127.0.0.1', 'Login', '2020-08-16 10:52:24', '2020-08-16 10:52:24');
/*!40000 ALTER TABLE `user_logs` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
