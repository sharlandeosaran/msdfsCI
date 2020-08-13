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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.applicants: ~0 rows (approximately)
/*!40000 ALTER TABLE `applicants` DISABLE KEYS */;
INSERT INTO `applicants` (`id`, `application_id`, `person_id`, `active`, `order`, `created_at`, `updated_at`) VALUES
	(1, 1, 16, 1, 2, '2020-08-12 11:39:34', '2020-08-12 11:39:34'),
	(2, 2, 17, 1, 0, '2020-08-12 20:29:37', '2020-08-12 20:29:37');
/*!40000 ALTER TABLE `applicants` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.applications
DROP TABLE IF EXISTS `applications`;
CREATE TABLE IF NOT EXISTS `applications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ip` text NOT NULL,
  `form_id` int(10) unsigned NOT NULL,
  `status_id` int(10) unsigned NOT NULL DEFAULT 0,
  `scheduled` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_applications_forms` (`form_id`),
  KEY `FK_applications_status` (`status_id`),
  CONSTRAINT `FK_applications_forms` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`),
  CONSTRAINT `FK_applications_status` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.applications: ~1 rows (approximately)
/*!40000 ALTER TABLE `applications` DISABLE KEYS */;
INSERT INTO `applications` (`id`, `ip`, `form_id`, `status_id`, `scheduled`, `created_at`, `updated_at`) VALUES
	(1, 'eyJpdiI6ImpxYzdWajVWN0dKUFFBcUVuVURqR1E9PSIsInZhbHVlIjoiZi9YTHVKM05WWGZpOEx2UXZrVmlVWmg2V3Q5dy9wT3VwaFl6Mmg3dGpsST0iLCJtYWMiOiIzYzVmNmE0MWMzNjA2OTMyZTNmY2NiNGJlYjM4MGI2N2RmNzgzYzhhYjdjNzAxY2RlODUzZDU2NGY3Nzg3ODY5In0=', 3, 10, 1, '2020-08-12 11:39:33', '2020-08-12 21:06:35'),
	(2, 'eyJpdiI6Imh4VFBlTk1Jb1ZEcXNpUXZnVXltRXc9PSIsInZhbHVlIjoianZZRzJCWC95Y2J2OGYxcVd6SFNKMENwM2xhTWlPeDN1c3ZEQmsxdDJKOD0iLCJtYWMiOiJjNjA5OWJjYmQzZjgxZTU5NzEyZGYzYzFmZTdjOTNiY2JmODQ4YjQ4NmVjNDI3OTUxYTI4ZTNjY2ZlYmE2OGUzIn0=', 3, 10, 1, '2020-08-12 20:29:37', '2020-08-12 21:06:35');
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.application_documents: ~21 rows (approximately)
/*!40000 ALTER TABLE `application_documents` DISABLE KEYS */;
INSERT INTO `application_documents` (`id`, `application_id`, `file`, `document`, `document_type_id`, `path`, `created_at`, `updated_at`) VALUES
	(1, 1, 'signature', '1_signature_password policy.jpg', 7, 'eyJpdiI6IlVuVXJiaUs4R1Y4aVByeFFYdk94MXc9PSIsInZhbHVlIjoiVFljOHVmZlkzdHJyVjVYV3owd1dhQWFyM0JSOEtIM2NCMm00M0w2Tnd3c2FUY3pseHk2YUZXRktqbTc0TUdRb25OVnNlbjF3d3hhRXVRd2dtU1ZJTFE9PSIsIm1hYyI6IjdmMWNmZDNlOTJmN2VjYTZjZmFlMmI4ZTEwYmRhNjY4ZTg4NmRiYWYyYTg3OGE4YjUxZGY1MjNmMTgwYmE5YTUifQ==', '2020-08-12 11:39:34', NULL),
	(2, 1, 'id_card_front', '1_id_card_front_SQL Server 2019.JPG', 7, 'eyJpdiI6IlIra0NUTjFXZDNDU3B2MHZjV2lpUXc9PSIsInZhbHVlIjoiL2pEaUIxS3BvcjZaMWNoME92NzYxSjhPUWlnU0s0RmowdTd2UmZMam5yVE1FcldrbjhRS3VvRkc1dFlKaEtFbVFvdURlaHVzRFc3bys5emN6aWIxN2YvUndlN1pLdWNiMWNoT3ZBRm5vd1U9IiwibWFjIjoiYzdhOGU4YTgyY2U5ZTYwZWE3YzYwYzNiMDQ5MmNlMTMyODFmYzYzMGRlNmZhZDcxNWRmMmYzZjlmNDZkNTFlNiJ9', '2020-08-12 11:39:34', NULL),
	(3, 1, 'id_card_back', '1_id_card_back_sao approved_bg.png', 5, 'eyJpdiI6Ii92RXpzNlpjNVhqK1VXdm9JOTF6eWc9PSIsInZhbHVlIjoiU1N4VEg4VjdsbEZhOG9NN0Z5b0F6aEc4OEVGSmxOVVZrUGY4N1NrNGFUc3JwZmFKR1QyVGhWZTFYUHhFblFoS2RaRVcwN1U4NFY0cUM1Ulg3QU9kQzkxZll1QkxwRGY3czNjb2tZZU9hcWM9IiwibWFjIjoiOWYzYTE5Y2Q1OGU4ZTU4MDEzMzM0YjBiMDZkYTY1NTE3NjBjMmE2NjJjMTI4NGMyMzNlYzAzZmY0NTc2MGJkMCJ9', '2020-08-12 11:39:34', NULL),
	(4, 1, 'housing_relief_quotation_0', '1_housing_relief_quotation_0_SQL Server 2019.JPG', 7, 'eyJpdiI6ImttZ0Q1cExOVC9GUSszOEZVT24xWnc9PSIsInZhbHVlIjoiM3hicU9aM2F6ZGJBY2Z2dXMyUWhsNU5yeUFTbDNSUmhVRmNDNWx2NnNFZHVJQjA0aTRSOElZTitJamVFUHNpczZ5UDhkNXpqRWc1RnkrNE5wR1ppaDJaUXJkWTdkb1hwa3JwYmVNM1JLMWtDWTIvZ3RlbzZoRTgxWS9TNm9XVzZJYVZXWklKeDhta3Z2bm41b0JiMTF3PT0iLCJtYWMiOiJjNWVhOTIzODk3ODc5MmI5NDNhODIwYzc4Yjk3ZTBmMjUzMmE3NjE1Y2JlZjQ2Njg2MDBlN2FmNmQ4YjRmNzQ1In0=', '2020-08-12 11:39:34', NULL),
	(5, 1, 'housing_relief_quotation_1', '1_housing_relief_quotation_1_password policy.jpg', 7, 'eyJpdiI6IjMzRURBV2lVZFVDZXhlTGlFckVsNmc9PSIsInZhbHVlIjoicmtxOG1ja0NuQlUvTEc4THVUQTc5R0FEK2pYRlVVQ1YvbDdEb0t3NVNPSVU4b3FhODVkVFExdW9INDFGUWZrTk5mczIyNUp2RENaajF2ZnJjTE5uSG5Udm5za0FrWUEyNG5QVUJweE9YditaSTVTQjNHa0x2SGk1LzJaQmFsVFFIa1hXdUJmNHBBcFk1L0VjTmZqaWhRPT0iLCJtYWMiOiI3YzFjMzE4M2E0ZGQwMzQ5YmQ3YTI0YWUzOTAwMDkwMWNiMGQ2MDNhYzA3NWRiYzc4ZTc2NTkzMjhhNzdjZmY3In0=', '2020-08-12 11:39:34', NULL),
	(6, 1, 'school_supplies_relief_quotation_0', '1_school_supplies_relief_quotation_0_SQL Server 2019.JPG', 7, 'eyJpdiI6Im9BckwyVTFlMGVlN0NqVnBrZlJGRXc9PSIsInZhbHVlIjoieTB2SFpOM1VHWUJiYWlmNUJJelR3bUE4T1FsWXZMSG9UeWlsQWxVKzd2L3haS2hOSnY5TGt3YlV6UndoTGRZd2dlWSs1V1A1bzd6RGpJTERNNXY2NjdDdlZmOUwydlcyQzZsbFdFSjZjcndvZ3FpdXFYRzJ2em1LcGVXK0ZHQ0FtS1d1Yk1xWU9LU3dwYmpXUXN6TnRqNitWRnFNQmdZVFBHVFdjWlZKOHdzPSIsIm1hYyI6IjVlYTRjYjdhZGYyNzAxNmM1NGUwZDkxNmQxYjI3ZDkwY2ZmMTYwMGNhNmU2ODlhNjczMDg4ZTcwMmZkMjdjY2MifQ==', '2020-08-12 11:39:34', NULL),
	(7, 1, 'school_supplies_relief_quotation_1', '1_school_supplies_relief_quotation_1_password policy.jpg', 7, 'eyJpdiI6IjZHNTFNK21UYkZuNllTQXk1bEJCS1E9PSIsInZhbHVlIjoiYXhjaFRVeEVlRFE5LzljZzZCNEduZlpuTUlMTGdXbnp1MHNCQXZRRkcxSnBEY0xubWJjRVpnVGYxY2hIRVVhWkRDbXdFdVcwaHdyR1pWY1V2ejhYV1JDbVV2c0h4ZUxGbE9yanRDRFRsUHhmclNwWjkyUTliWVJMc2FCeWd5ZFVkQ0IyZms2NkIwSENtbGQ3ejVLTFVZOCtoOVFINkZjWG5IcFI0b2NCQUVBPSIsIm1hYyI6Ijc2NzdjOWI1ZWUwMmE2NWI4NjRjNTA0M2EyNGY1OWM2MDk2OWJkNGE0MmQ5Y2Q0MjBhZDUxOWMzZmNkOWFmYTAifQ==', '2020-08-12 11:39:34', NULL),
	(8, 1, 'fire_service_report_0', '1_fire_service_report_0_SQL Server 2019.JPG', 7, 'eyJpdiI6InQrZ2htV3pMWmw3TzBzajhac1I4SXc9PSIsInZhbHVlIjoiWTB6UDlXdi9WR2U0eTRYK1RTZXZUWkFKclVXODkwNno3djM3VzdjOUNMVTV0Y2JWTVNpWHlSNnhHV3hFQTZ5Q2MyN3Z6QWVnR1d5WnNjMTZyZzB6YzcxUXlpYnFGeWdSK2VSVzNRcVFad3RvWVJEZ3lwK1lkbGZPS01nTE1hWGsiLCJtYWMiOiIxNjA4NjMwNzliNDZlNGVjMTM0NDg2ZDZkNGVlOTEzNzc5NTZjMTNkZmU2NWRlYTgzZDk3MGU3NmE0NjZiYjc4In0=', '2020-08-12 11:39:34', NULL),
	(9, 1, 'fire_service_report_1', '1_fire_service_report_1_password policy.jpg', 7, 'eyJpdiI6IlFuMWlWRlEwTnZwMDVRRHozWmF0eUE9PSIsInZhbHVlIjoibkMwaEhhQmk4bURBV3VkQjhQNUJVUVNNbERLVitFU1BoSlBJZUoyU0hjdVNCczJpK2hxanhHQ1g1cExZdUR4NFg3OUhjcTFNeDM0eGt6alUzYytGR0RaVUg2M1pMUlk1ZGE4RE5LWWVMSGFkSkx2cHVkeFB6UWxNUVhyZ1kxMVQiLCJtYWMiOiI1YWJiZmZjOTg3Mzk3MDJjMmE0MWExYjM1YWQ4OWI0ZDZjNDM3ODFkNjUxN2E5YTZhNjkwNTg3YjY5ZjYxMzljIn0=', '2020-08-12 11:39:34', NULL),
	(10, 1, 'clothing_relief_quotation_0', '1_clothing_relief_quotation_0_SQL Server 2019.JPG', 7, 'eyJpdiI6IjlqN3JJV3UzYXphT3lPNlJ6QnBmM1E9PSIsInZhbHVlIjoibWo4M1R5UVdtU3pBanlMRFE3cUxBTWFYQ0dHOVZaUGkrUU01WlBnc29XT016SjVUOGtqL1lJNTR1R0JtWW9JSUowSVpPOHcxdk02ZHBob3dLZTNRWlVHNWFYajl1d09qK2dPTlZPbmk1SldSeEVkZVpib2dtMUJvZlJ1ZlJUL1doZVhjTWRmejRDTzExcTRYTS8rVGF3PT0iLCJtYWMiOiJmYTIwMzZkMWRjNzNiNzhlMmFlMjQzODU2OTNkNWJiYzM2ODQ3MTQ2NTY0ODVhMzJmNTNlYzZjMTQwODhlMTU5In0=', '2020-08-12 11:39:34', NULL),
	(11, 1, 'clothing_relief_quotation_1', '1_clothing_relief_quotation_1_password policy.jpg', 7, 'eyJpdiI6IjJhVnZXZW5waWRUMFN0MDM4cnFGRWc9PSIsInZhbHVlIjoiTjJhcHp2REhSWWZqcFZhK0FiZENWRE0vY21xTFNZQkVEUXlFa3FyeHB5bXlucmxhVWpQUEZUSW5XNUY1SWIrNHhHVUR6Y1NYU3F0UFNUbUVnYWpRdndxR2lnaHVIbUJEMXBRTHNLeC9vakRlc0tDTlpJZjN4cHo5dDM3T2JvY0dFeGpaVVhKV1g4MnlOQVhxUy9pczRBPT0iLCJtYWMiOiJmYjU1MGQ3OWJiMGM2MDZiMzAyMGVmNTNjYzc2Y2NmMDU1NTM0NTcyNDNmZjBmODZmYzhjMjJmMTlmYTQ0YWQ4In0=', '2020-08-12 11:39:34', NULL),
	(12, 1, 'structural_damage_0', '1_structural_damage_0_sao approved_bg.png', 5, 'eyJpdiI6InRqZWx1NnZmL2lZaDZycEkvS04wYVE9PSIsInZhbHVlIjoiTFR2VE4rTTdtT2VBdHZ0cVBnSlZudDRMay9xcDlmV0gvZEMzdTVUaWhTcmoySGQ4SUlTdG9IOC9BcjNadmZuaFdsaHJaU1gyOUpuaFVLdWtRQjhPOEdINm4wQXdIMEtiVHpaVDFkcmZYYmVETXVoRjRMMHZKWDNHcXdqWFhNUWIiLCJtYWMiOiJhZjgwZjVlMmUyN2MxNmMxMjU0NmExOTVlZTVmNDJkMTY4MzYyYzg0Y2M5ZjU4YTFmMDVkOGM3MjhmOTVjZGRiIn0=', '2020-08-12 11:39:34', NULL),
	(13, 1, 'structural_damage_1', '1_structural_damage_1_ipo_aps.PNG', 5, 'eyJpdiI6ImRabGpjQmxGSjMzUHpjQ1VwRjBWTkE9PSIsInZhbHVlIjoiTjdUTmZKa1BiaVdQOGxvUURqRzhDeklZanE1Y0xVMmE2ZlJydTlPRmcycDE2WEgyZ3dRWVErZ2VjMGdvTisvWmFpajQyeVBqeGQxZmZObmhHTHhRdEF6YjUvNFBVUXgyamwvUXB6Z3VqN0ZZeitlZ0ZqSHhjbWREUHJGZ1YzVTIiLCJtYWMiOiJmYTg4MzY4ZGEzNGM2MjgyMTRlZGNlZDBhMmY2N2RkM2EyODg5OWI4YjkyMmM4ZmViZDU3MTc5ZDM1ODhlMjYwIn0=', '2020-08-12 11:39:34', NULL),
	(14, 1, 'electrical_damage_0', '1_electrical_damage_0_sao approved_bg.png', 5, 'eyJpdiI6ImsyeGFHb0M0dWNvRU1ZQldSeE8yWHc9PSIsInZhbHVlIjoiZnI4bGE1SVVkUVFJa2llZXRwMHNjRmhPTVdFbzZXTzVLaFhoSE5KU1NxeDdxdzFGWktCMFBRTnZxaHg0U3hUU0FzbjhwSG9Dd0xHeUNtY2JKd1NuK3l0R2ZtTXplaTlhQW9zbWl3YjhxOHM0bUpQT2t3RW13eDdiOG1DVCtGNjQiLCJtYWMiOiJkNjNhYzZjYjcyODQzMzA3NTg0MjEwZmExNTcxMmU3YmRjZmVkNzVmYTQwOGJhZDk3YzRjZTliYjNlY2U2MzNhIn0=', '2020-08-12 11:39:34', NULL),
	(15, 1, 'electrical_damage_1', '1_electrical_damage_1_ipo_aps.PNG', 5, 'eyJpdiI6IkFpMVJxN2Mvb3Z2V0RVK2JxWnFRcnc9PSIsInZhbHVlIjoiQXNKaVN2djkvSHNiSTlPVVZBZlRlOTZxNHpWMWFKWjBaVUNpUWpYT1FzMzAvaHNxTW1BejdTQlQwNjBHL0VoTGVGTG5nWG91V3l6UDJQa1B4MzBJQlF6WEEvMjU0TG5GU2Z0VlEvQVJZVENvYktOc0lES0lNcHcrZUtkV1BKVGIiLCJtYWMiOiJlNzFmNWZiZjY0YzRlNTZmZDlmNzlkMjZkOTQxNGJjODU1OTEyYTFmNTM4NzBlMzI0YTgwMmE1ODU2ZjA2M2IzIn0=', '2020-08-12 11:39:34', NULL),
	(16, 1, 'plumbing_damage_0', '1_plumbing_damage_0_sao approved_bg.png', 5, 'eyJpdiI6InRPekV1cUN0Wk03NWJrQzg4TmdqQ3c9PSIsInZhbHVlIjoieEVMSFpqazZLandDaGdDenRxNkp0OE9lZjl5SWJaUk9kQ3BEWlZPeE1WZ2VndFpRWHRkdDIvbllsNEc1b2I3bDY0cXZTSHM4bnlaOUNpUlliL2JNc3V1QnJMRXBKU2trUEFxUUVKei9uTmJIVlNGQXJzUS91Sk1lclErdTB0aXIiLCJtYWMiOiJhM2NiYTY5M2RhNjM5OGY1MDNhMzA1MjFhZmM4OTQzOTA0M2JhNzMwN2I2MTk2Nzg0MThmM2QzYjljYThlZjJjIn0=', '2020-08-12 11:39:34', NULL),
	(17, 1, 'plumbing_damage_1', '1_plumbing_damage_1_ipo_aps.PNG', 5, 'eyJpdiI6ImZQa1NUeXpCeU5ySnZGamVwb05HZlE9PSIsInZhbHVlIjoiQ01vQ0tJdTdJZndUYTFMNG1ET0ZXSjI1dHF1OWJLb0V0OHEwbFpDQU8wblJYWDhyd2JBRHlZNFowTXp1NVF1dVdTcHVxeExzaExWWnN6bTBBYUxnQzUvelpNNDh6V2FtYTNvdlNITkRaNDA9IiwibWFjIjoiNDkwYThhOTJmMDJkOTllZDFkYTRhMWVkNDdlOTQzMTNiNWIyZjg4ZTk0YWExMTFhMmUyOTFkNTRkZTg4ZGUyMCJ9', '2020-08-12 11:39:34', NULL),
	(18, 1, 'site_evidence_0', '1_site_evidence_0_IPO E-Payments.jpg', 7, 'eyJpdiI6InpXbVlockI5VnB0c2FFUGd0TmlRYWc9PSIsInZhbHVlIjoid2sySTVWWGlmbSttTHBMWmF0RFI4NlQ1S1hpcExKem9zZUhhNHNVQWs0U3ZtdG1HckFPZ3lvb3VRSU11RVFLdCtvYndyZjRGUGIrNFkyRWdScXZrOENLM1pzWGpSYTdZVmJiUUdEUG1qQUpDdHFXbFlwSHhEVi9kVllNeVJaVTYiLCJtYWMiOiJiMmI0ZmJmYzcwNWFkODIxZDc4ODM4OThjNGFmMzBlNTIzOTA5YTdlZmM4NDcxMWRjN2YzZjg2ZjdmMzZkYWM4In0=', '2020-08-12 11:52:02', NULL),
	(19, 1, 'site_evidence_1', '1_site_evidence_1_ipo_aps.PNG', 5, 'eyJpdiI6IlQ3YW01ZEFMZUdEVFB0eWpNY2t6clE9PSIsInZhbHVlIjoiLzBMeXJhb2dJNlN3V2NYVHRkOUlWYjN3V3VpZUZ1VVhDcDdvMS9BTVA1bkQxVjg5QjcweEZlSngzdVVpQ0dKUTN1MmdXWFhZMURpanZsU1pWR0Y5S3ROQ1hzcFJSc0dlS1dXVldnSGxLLzA9IiwibWFjIjoiN2RiMWU4YTVhMzU5ZTFiNWIwYTk3MjhlODA5ZGZjZGQwOGRiN2Y2MjA1NzkyNjdmMzVhZjJkYzk5M2UyNjA1ZSJ9', '2020-08-12 11:52:02', NULL),
	(20, 1, 'site_evidence_2', '1_site_evidence_2_ISEMS approach.png', 5, 'eyJpdiI6ImhobEQrTVRWS2hScS81T3dzMmZESGc9PSIsInZhbHVlIjoiaUxvbzk0Sk5GTDJzTWloRE56T2lXRkJSWE0waTEwZzJWdkdzTHhRd2xQQUtwQVhyckRsQ0piaTl4cUhQVTdYOVBFT2V5a09DL2dyN2cyMzJEbG5hckw4WGhRYkNRY0hLb0FyWHNib1NxMFlMc1NRTERUUGdySlRXNm9iTlJFODYiLCJtYWMiOiIzMzdjZTJjYTFmNDI2NjVlMmMzYTMzZDg5MDhmZWFiMTQ4NzJkYzQwMjkxNTc4MGYxYjEyZDEzMTU3NDU3YjdkIn0=', '2020-08-12 11:52:02', NULL),
	(21, 1, 'site_evidence_0', '1_site_evidence_0_architecture.png', 5, 'eyJpdiI6IkM4dm5UYlcyMnZXWUxMejJxQ1lhU1E9PSIsInZhbHVlIjoiKzBiOXB4emVpTzFCRTkzZmM0aTNMaDQ0c3pWZ2d5QXg1UmlPa25EWHRra1lodFYrVU5HckhJZk9vQkRMOWpEREhKQWx2cXZHVHVOVmZvTWFZZGJhN2VGODJkRU9ZdGllK3lEUFBORUdRSlU9IiwibWFjIjoiNTBiM2VmYWExMGE5YjFlZDU3MmI5MDM0MTBjYzdjMmQzYjEwMGI4MDY4ZTJiYzMxMTM0OWU1NDQ0MjkxY2ViMCJ9', '2020-08-12 12:20:50', NULL),
	(22, 1, 'site_evidence_1', '1_site_evidence_1_avatar.png', 5, 'eyJpdiI6Im0zRlVSUnJjcmZmL0pyWmE0WWhHR2c9PSIsInZhbHVlIjoidmgyU2RBMVk3OWFIT2pVaFo5N1pyZks5S1NOYUpkWExLVWROR0owY2FtM1lWOENlQUlsNzdNT1FUOHpaYTd0eHQxRjd0WUV3Vlpaa3UyV082dTZndmN5MVpFdFhWQmJOcEZaSDVoMVM1ZDQ9IiwibWFjIjoiYTQ4ODU0NjFhMTU3NGRmZDg2OWM1ZWE3MGQ5MTE5MmExMmY4M2FlNzVkMDJiZjlhNzBjYTdjYzhhMDgzZWU0ZiJ9', '2020-08-12 12:20:50', NULL),
	(23, 1, 'site_evidence_2', '1_site_evidence_2_bg.jpg', 7, 'eyJpdiI6Ik9ETHMyV1VKcEdSTTIxYVVZMlUwbmc9PSIsInZhbHVlIjoiMUJIeDY1elRMdThPeTVaeDdTeGQyS1JwSU9FSm5EKzlPSUprZWNrd00xM3ZUYnJ6VGdRYU94U0g3aHl1eEliWFVZUFROZTRHRDBGOWhXRFo4em5OQkpmaC94S29MaEx6K1orZXZnVFExUnc9IiwibWFjIjoiOTZiMDZkOGM4OWE1MmU0MGMyOWNjODdkNjBhZjc4NDQ1NjczMTk4YWYwMDU2ZWQyMjc0NDc5NjkzMWQ2ODQ4ZSJ9', '2020-08-12 12:20:50', NULL),
	(24, 2, 'signature', '2_signature_trans report.jpg', 7, 'eyJpdiI6IlpwN25iL0tleG8vMHZ1MlFUVUk0d0E9PSIsInZhbHVlIjoiS0hHWmZOTjZPcS9rMXNIVWhkMWp4V1ovb0tiUEs1bDYzc0E0NkpDaVB0LzkrdkxGZGoyYzhVQ1NpQmZuYXN1bHRPOWlnYXN6aitlQ3JjYmZqc29UZGc9PSIsIm1hYyI6Ijk2MjA1NjBjZjY5YWI5NmVhNzNiYzA4Yjk0OThiNDkxZTg0NDAyYmM3MzZjNzljMjllNzg3YzZhYzA5MWU2MjUifQ==', '2020-08-12 20:29:37', NULL),
	(25, 2, 'lost_id_police_report', '2_lost_id_police_report_govpaytt_screenshot.png', 5, 'eyJpdiI6IkZDSFN1TnVPd1IxU2lxdW5MMW9CMUE9PSIsInZhbHVlIjoiY0UrbG9tZUovdUQvTmpneVBkL0xYckxNalYvTmpOVWlRbnZhVTBZQmQ3T2llT0ZITFAzcm44TW43eHNvL2lGUk5HUkpyRXAxWDdidXZ4Z2dybGRhRUtZVVJ1V3NOM3UwWURmSUN5dTN4cms9IiwibWFjIjoiMTM1MTQ4MzQwYWE3YjE0ZWYwMWM0ODNiOTQ1M2VlM2ViZDE5MWVmMjk4YzcyMGUxODYzY2NmNmFjZDQ2NWE1OCJ9', '2020-08-12 20:29:37', NULL),
	(26, 2, 'fire_service_report_0', '2_fire_service_report_0_IPO E-Payments.jpg', 7, 'eyJpdiI6ImdPNGtjQThMbnEzZXBBWDN3Zzk1bmc9PSIsInZhbHVlIjoicHNxZlY3K0xneTJmTXRXQmx2VzNVd1JQOW5wMmUxMllrQStkc3hxUUFEU0JxNGU2VDR3V0RTVU5IRXVCam11OGRSYytLakkzUkROVUQzOWV1YThxUWd5dURRU2FtU1ZPSlBsVERpUkZMdW44NTZHYStBUXI2dnNDTDFmanJiMXgiLCJtYWMiOiJiMmJiYzJmMjkzNGJmNzJhZDc3NzdjNDU2MjdjZWQ3M2RiZjVlYmJlNjE1Mzg0YzliMGNmODRiYTkxYjA0YTNlIn0=', '2020-08-12 20:29:37', NULL),
	(27, 2, 'electrical_damage_0', '2_electrical_damage_0_Visa_Logo.png', 5, 'eyJpdiI6IlZ3RVJlSGFveGZKTXp0RFJPVTEzb0E9PSIsInZhbHVlIjoiTGJqdk03NFVONTJPRVkrK00zRXVDSE9VTHBvcXVqK3ArVkFFMmFEclNlNmkvZEN2ODFCTDdVdDlJck9nOVVCQnhWbEp5N1h3QktiSlV5OVdiUnZPVS8rSG5PSVQrNXI2eG5ybU9GaVNwMnFaMmxXTjRaUzRpT3BrU1pIR1ZUeGoiLCJtYWMiOiIzZTFkZGU4NDYzOWQwZDI5OTNjZDI1ZGJlNTVkMDdmMDExNzQ4MDkzMmE5NTI3NmZhMjkzOWE1NzM1YWUyZjA3In0=', '2020-08-12 20:29:37', NULL),
	(28, 2, 'plumbing_damage_0', '2_plumbing_damage_0_rgd_header.png', 5, 'eyJpdiI6IlZ0cjh5czlRUFNjNTA4U1IyK1AxMnc9PSIsInZhbHVlIjoiaDUxaldTNEVFVDBPRU52MmYyY0dtQm9DNEYwMHg0QXdWbk5yandQYWxIQzd3aWRnMW04MkZDMWFPb0E2WFQ5WXZ4LzFVYTNlWi8wZjg4Qi9RaDFDSEk2OE5HaEVPWHpYMGtibjZzWFp0Y1VEL0FUS0s1VWNuTzNaclhEWjQyVVoiLCJtYWMiOiI3NWI0MDZlNzk1NTlmNTYxOGFjMDk1N2RiMWU5NjdmYWFjOGVlZjNjYTEyMDdjYjIzMzBkMmVkNzVmYmRkZWJmIn0=', '2020-08-12 20:29:37', NULL),
	(29, 2, 'plumbing_damage_1', '2_plumbing_damage_1_RGD Logo.jpg', 7, 'eyJpdiI6IjdaN2pDdkZMdGtWMGhleFNBaUpiQ1E9PSIsInZhbHVlIjoiU3dJUWw5bEhxZzk0c1dIb1NEL3RuS2NNN1hDZTNpTm0vblVZaVd0T3hjSlhNMzBoU2JQMFJvWUJ6Nkp2RjVOTndVSURzakJHWWVhT2VLVnRINW9aV3NKV1p0SzIrbWpZKzV0bk1NbEJHa289IiwibWFjIjoiYWUxYmYwM2YwNGUxM2M5ZDZjMDRmNDNkYjhhYmZjZThkNWQzZWIwZDlhN2U5MThiMWY5NmJkYzkyYmFjYjkzZSJ9', '2020-08-12 20:29:37', NULL),
	(30, 2, 'site_evidence_0', '2_site_evidence_0_GovPayTT Onboarding.png', 5, 'eyJpdiI6IlBBVlJ3VEkyVHRadlpNWWE5MTZlbmc9PSIsInZhbHVlIjoibmljQWRnb2MwTnNlN29Ob0FsMzY4ZWpRc3dYejlYYUtlckRCdnlXVStLSHI2L1VEbDRRM1p3cnRUeWc2UVFrOVZ3cVcyOUR2UDI5YjRPVzBBL2tKZ01pcnFxUDRrMmdFMzNVUHN3d2xtMldNWnRoZWJxU1BlRFZqc2d5RDMvNzIiLCJtYWMiOiIwZDVjMGM0NGU0Y2U1MjkyMmU5MDNjNDRhYmMyNWJiZWM5MDMyODc4ZDEzZmE1ZWQ2YjkwNDBiNDIxNmIyMzY5In0=', '2020-08-12 20:33:45', NULL),
	(31, 2, 'site_evidence_1', '2_site_evidence_1_govpaytt_1100.png', 5, 'eyJpdiI6InoveTFxRUNCVXU5cVQ1Q04vM2xmSUE9PSIsInZhbHVlIjoiZmorVzBrWFRibUJrNVJIZERIUnoxVzRFa3loYjNlbDdJNzNQL3pyY3NHRmhhbFU4VFNMZlRmZmtqWk5aY1JualcwV2ErUG1UMlBUQlBEYksyQjBlemNxcFcySmdXWTRiUEFDbmlveHlLb1ZmN0JvamlVRndXYkE3LzloTkJjS1IiLCJtYWMiOiI1MzM1ZDM3ZTgwZGIwNDAwMGU1MzcyOTY2NTk0MjRhODIzMzVmNWUyMmI3NGFmYjNmMjJhYzI3MmMwNWRkMDI1In0=', '2020-08-12 20:33:45', NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.application_status_audit: ~8 rows (approximately)
/*!40000 ALTER TABLE `application_status_audit` DISABLE KEYS */;
INSERT INTO `application_status_audit` (`id`, `application_id`, `changed_by`, `status_old`, `status_new`, `details`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 0, 1, 'yes', '2020-08-12 11:41:32', '2020-08-12 11:41:32'),
	(2, 1, 1, 1, 3, 'go', '2020-08-12 11:41:44', '2020-08-12 11:41:44'),
	(3, 1, 1, 3, 4, 'rr', '2020-08-12 11:42:20', '2020-08-12 11:42:20'),
	(4, 1, 1, 4, 5, 'going on site', '2020-08-12 11:47:17', '2020-08-12 11:47:17'),
	(7, 1, 1, 5, 6, 'truth', '2020-08-12 12:20:44', '2020-08-12 12:20:44'),
	(8, 1, 1, 6, 7, 'yes', '2020-08-12 12:22:22', '2020-08-12 12:22:22'),
	(9, 1, 1, 7, 8, 'yes', '2020-08-12 12:26:06', '2020-08-12 12:26:06'),
	(10, 1, 1, 5, 6, 'dddd', '2020-08-12 13:58:01', '2020-08-12 13:58:01'),
	(11, 1, 1, 6, 7, 'ddd', '2020-08-12 14:01:08', '2020-08-12 14:01:08'),
	(12, 1, 1, 7, 8, 'ddd', '2020-08-12 14:01:35', '2020-08-12 14:01:35'),
	(13, 1, 1, 8, 9, 'try', '2020-08-12 20:07:02', '2020-08-12 20:07:02'),
	(14, 2, 1, 0, 1, 'frr', '2020-08-12 20:30:19', '2020-08-12 20:30:19'),
	(15, 2, 1, 1, 3, 'rff', '2020-08-12 20:30:26', '2020-08-12 20:30:26'),
	(16, 2, 1, 3, 4, 'ggg', '2020-08-12 20:31:02', '2020-08-12 20:31:02'),
	(17, 2, 1, 4, 5, 'rff', '2020-08-12 20:31:19', '2020-08-12 20:31:19'),
	(18, 2, 1, 5, 6, 'erede', '2020-08-12 20:33:45', '2020-08-12 20:33:45'),
	(19, 2, 1, 6, 7, 'rrff', '2020-08-12 20:34:03', '2020-08-12 20:34:03'),
	(20, 2, 1, 7, 8, 'rff', '2020-08-12 20:34:21', '2020-08-12 20:34:21'),
	(21, 2, 1, 8, 9, 'ffrrrde', '2020-08-12 20:35:00', '2020-08-12 20:35:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.error_log: ~3 rows (approximately)
/*!40000 ALTER TABLE `error_log` DISABLE KEYS */;
INSERT INTO `error_log` (`id`, `user`, `ip`, `action`, `exception`, `created_at`, `updated_at`) VALUES
	(1, 'eyJpdiI6IlhoL2piRGV4cDg2L1BiRytjY0Z3WkE9PSIsInZhbHVlIjoiYmJjTVFwc0FPTWI0aHliWU5PU09ZQT09IiwibWFjIjoiZjNjNjBlNWY2MjU4Y2UxZDkwOGIzOTk1MWI3YzUwZjI1ZDc1NGQ0MTAxZDMxOTk3NjM4NWJjNDQ0NThjOTRhYiJ9', 'eyJpdiI6IlM0ZHdxcURPUXZZeWc2ZGZTNzBtM0E9PSIsInZhbHVlIjoiK2hmdytTY2ZRYjVSNi82U0grWmlYeUV4cFBJcWJmN3ZNc2diR1ZZRE5sOD0iLCJtYWMiOiIzZmIzYmZmZDhiYTY0OWVkNmZjYzAyYWYwZDZmODlhMmE1MDIwZmJlZWY2YzU2NDkxODU0Y2Q0NWYxZTE4NGMwIn0=', 'eyJpdiI6ImFGcGlkTjJ2SWdqUGdEa3lyRVV2TEE9PSIsInZhbHVlIjoiOTgvMENqUmpsOTE1MEMvbmVrenRwdk5GYmtSSFJpY2pzMU5wdXJXd1VjQmd2QkhYZGpSbkZQMU1xK3BQNHptd2IrWitnbFVoZ09Gc0w2QVZJcGVlc1E9PSIsIm1hYyI6Ijg5ZjdjZjg3ZDMzYzFjMWQ2ODg4MWYzNWMzYmQ0NDRiMDllMWE3Y2IxYTg5YzE2MWE2YmRkZDNhZTQwZTg2ZTEifQ==', 'eyJpdiI6IkQzeCtDZk5DSEJoMjFDTGdrOU8yWnc9PSIsInZhbHVlIjoiaTczVjZtcjFuZ2JTOHdnbEVGWTN1ZnVDVXk1Sm9VWmtXb0tGUk5rVzduaz0iLCJtYWMiOiJmOTJjYzQ5YmZiZWJlMTUxMTE2YTA1YzMxMDUyZDRlMzliYzJlMTc0NWQzMDQxNGM5ZmQ3OTA1ZGNmYTY4MDdkIn0=', '2020-08-12 11:34:05', '2020-08-12 11:34:05'),
	(2, 'eyJpdiI6Im9Hb1JIVXY0S0dJTlczL3FpK0cyL3c9PSIsInZhbHVlIjoiT0lhT0c0UzJCQ3k0cHNrVlJyT1lFS2d5ZVRORHQ0blJaQnY2K0RNLzg3TT0iLCJtYWMiOiJmMmIzOTcyNzlhZTBjMjk0NjI0Y2QxM2FiNjA4NzVmNzcxMWFkZjc2NTg3YjM2MmIxMTM3OTU0MmI3NTU2MjYwIn0=', 'eyJpdiI6IjdUMGJ3a1liTUhXSVVYbEZYcHFTZ0E9PSIsInZhbHVlIjoiNG1LQU5ESGxpSmcwYXNzQjVrcUtBUG1PYlNoZEZNWi9MUGx6UEdvR0RXOD0iLCJtYWMiOiI2NTA3OWU4ZmUwNjBlZDcwOTU5YTZhMTZiMjJjZTcxNzQ2MTc3ZDZlODliMDQzZTJmNWU1NmU5ZWM4YmVlNWJmIn0=', 'eyJpdiI6IlcwcjNhRkVpc1oyc1NZanZaUjBQeXc9PSIsInZhbHVlIjoiZWJGL3BmWDdrc3hhdWRqVWs2MEZkeDhteGJrMXpZY0lBaEZJRlp4WHRwTFdkWUh4MWtNcWZnUFNpbTl1bXhGLzRka0RtbG9SRHFQcmdNdkFkWGVpK2c9PSIsIm1hYyI6ImQ3YzU5YTIyZDJlMjgyY2I5NWFhOThkYTdlNWE0ZTBiNzM2ZTllZGRiYTRmYzMwNmI4OTMzNTE1OGRjZDUxZGUifQ==', 'eyJpdiI6Inp6VHhQK3RmMDA3VnFUL2Q2dFFzbEE9PSIsInZhbHVlIjoiQ3ZoL1UxZEhYeE9sTzlYeDFIZGNxclpuOVpQVUlEYzZBWG4xd3J4c2x2Tk91TVBoV3BqNDVlZkF4RFlkV1dxamphRzd0MXFxaFJ1eUs5cTA0cDNoUFE9PSIsIm1hYyI6IjUzMzZkOTE1YjAzMzJjN2JhNDhmZjhiNDk0ZDY2ZTkxMWU0NDRmYzQ1MGQzODI4NmNjN2QzNWYwZmM4NzA3YjkifQ==', '2020-08-12 11:48:25', '2020-08-12 11:48:25'),
	(3, 'eyJpdiI6IjROZjJiMkNoNlpQQ3RRVkVpajAyZ3c9PSIsInZhbHVlIjoiZ3l2bkpQbXVtNHE0UnZLcUN5SVVjZjJQZG5SOEJqTzNtZHcxVzFyMVNPbz0iLCJtYWMiOiJjNWNhMjZhMDFiMmQwNTUxMjZkYTVkZTJiNTFlNjA1MjlmYTViYTE5Y2NhMzlmOTJjYjBlY2U4NjhkN2IzYWM1In0=', 'eyJpdiI6Ild5MGlKQUMzT3ZUOEpRRWN1enFUZGc9PSIsInZhbHVlIjoiT2pLeWp3eUVmSHpzRHkrdlJFREpoZjFqR2xXaDhvYWppYk1obWVsNVh6ST0iLCJtYWMiOiI3ZDJjNGRlNWRmYTE0YzEwYjk3NDM1OGVhM2IwMzg4Y2NhOWYyMzg2YmQ0OTI4MmFkNzc5MzllZjg3NjU1MDI0In0=', 'eyJpdiI6IkRKVVJqa2pQNmxZV0dwbmhKWEhBV1E9PSIsInZhbHVlIjoiK1N0OXh0TlpnS2FnZE1heVl6a0FML2VONEtwVElPRXdzUXErTjhFdHpqZmdjRjNNeEZhdGJvN2ROWThuQWhIWkU2SDV1WG5ON3hSdFgvNWk2QWRGcnc9PSIsIm1hYyI6IjUzNDE5Zjg1ZTIzNTk2M2E3ODU0YzFmNzk0MTlkZGExNWE3YjI2OTI0ZTVkZmM4OGUwYWYyMmYwZTUzZjgxNjgifQ==', 'eyJpdiI6ImJCV2wxak5IeWRjYk4zTjJ3R3hSS3c9PSIsInZhbHVlIjoiUGhtMitmYXVjZ1JnTjFuRldBeXZ5THgwUWVKRFl1NWZsU0NYcUtVQk9wQkpydVBhZ1JhdlpGMUtpNDVpbDA2dEROR3hMdzh4QkhmNmJ0dGRVYng4L1VzTVBsOFpvek4rRVUxSWJQTWduR2EyV09MV1JQOTBReC81dEYzeFJiQnIrR2NhV3phN2lkR0pBRzdzK3Azd2h4YWxwMG5kQU1vY24yWm5jbGcwQXh5REF1QVhHTTRTU2U4SjB5RUora2wyUzl3a1NnMExucTREeGZzOHI5OWVmRlh5Z2h3clhJZ3VjTVo0MWpvS0JDaz0iLCJtYWMiOiI1ODNlOTQxYzRiYTRkZjUxNzEzNTNmYzM0MDNmMzgyOGUwMzM0ZjYzYTYwNzAzZmMzMGEwMzk1ZDAwODZkZDAxIn0=', '2020-08-12 14:45:00', '2020-08-12 14:45:00'),
	(4, 'eyJpdiI6ImV2anJDcjhNM3B5Zk4wWVYvcE9FTEE9PSIsInZhbHVlIjoiUGhjMVdQY2Q3VVcveTRMdUpEUFg3Zz09IiwibWFjIjoiMTUzNzEzNGUxOTEwNTJkNGU0ZDhkOTVkMGMzNjc1NjYyMzE1YjY3NmI3NDkxNDExNGZlOTI5NDMyNGY1MWZiMiJ9', 'eyJpdiI6IklaWjk4U3hKd0duWEx2d2IwQUd4U2c9PSIsInZhbHVlIjoiZ3c1Sm8wYWhTQ0hvQ1praG1iSFV4ZWJjYTlGS1NIY1cvVDBNMG1jQnN2MD0iLCJtYWMiOiJlMzcxOTQzYzNiNjEzMTkwMWM1Njg1M2M5MTE2NjEzYTJhOTk1NjliZWI5ZDU3M2Y5M2JhYzNhZGYyNTQwZTIxIn0=', 'eyJpdiI6IlVMWlMrdXRZaWVCdkh5TVhxUENKaHc9PSIsInZhbHVlIjoiZCthTXp2Z3lhRmlFb0pEeFpkTFhSemc3TjVHaTMzWGFGNzJoYnFqNFdMVStpZ2JhMy90T3l1eWxlNUZiaFNONSIsIm1hYyI6ImViNWY3ODFiM2UwNDhkZjJhNDVkMDAxOTU5MzcwYjU2NTAyNTJjMWRkNTZlOWJlN2Q2MjRjOWJkZDNhODUzYzgifQ==', 'eyJpdiI6IlBmSW8rcVQwUUR6RlhVRmZqVS8xeGc9PSIsInZhbHVlIjoiUlNUNDZjempQS0RydmlIV0ZwcXB3endPSXJkV1pNYlljRWV0U2lqYysyUT0iLCJtYWMiOiJmZTJiNzZjMDhkN2I4ZGJhYTEwNTZmZjg1MTEyZmQ4NGYwYzY4ZWUyYzg1NmQyOWI4ZjExNDUyY2UyYjNjYmY0In0=', '2020-08-12 19:04:03', '2020-08-12 19:04:03'),
	(5, 'eyJpdiI6IjJQU0cvMlFQeVR5OFhaSjVxZEJDd2c9PSIsInZhbHVlIjoiYWd5ZmVHeXRISytmYmZTU0dyWEQ1K2hxVEh0UzVtZEYyQjdxWHduaE1Daz0iLCJtYWMiOiIyOGZmMDM5NGYzZGZmMWY2NjdmZjg1ZWQ3NTk3YjhjZDdmZDMxM2JkMjdjOTI2YTA4MDg4MTFhNGRlZmJiZTNkIn0=', 'eyJpdiI6Im1CMzhJcnFPVnRhWnpibXhZbE5FRFE9PSIsInZhbHVlIjoiNTdJN3dSMlNKWUFWVzB1VWhHRk4rbFJLaUNOSVlkZWEwRVROdUppRzdNYz0iLCJtYWMiOiI2ZjRlODg1MWQwZDMyNjI3OTBhNGQ1ODI3OGU5M2Y3NTliYTVjNWMxYThiNDdiMThiMjNlZWU0NzNjZWE3MTg4In0=', 'eyJpdiI6InZjZ0plZFJQSVI5VkZRU2Y0a0xTUkE9PSIsInZhbHVlIjoiWU5PeFJ1Y05xKy9oR1B3VHVhbG13R1pGY3lHR2VOU2R1M0x5MUxPY1VvZ3c0WlBUYTZwcU5XYXRRdGRJZmw5ZVg2M2JvNG50Sk9FN2VzQmY3UGZOT2c9PSIsIm1hYyI6ImVkODJjMzA1N2FhYTFlNWE2OWE1NjM5YmI1NjZkM2E1YmY2ZGE4ZGZlNWQ2MDNhNTk4ZDEwOTVhMzZmNzZkNjkifQ==', 'eyJpdiI6ImN1SEd1Mm5zOElnVDVQOGxVc200Qmc9PSIsInZhbHVlIjoiZ1NrOTRGVlB6TWkvbzRCbkxIQ1Z6aGhYRjB2NkVzZVBDQUtnelg5NjRmYUtIRnhtN2JHSXpIMlNraVFYRXpGdzFidkFxem9QanlpdnFaRGszL2hYd28rZUNrQkFsMmpKejIwT1RWQmJTOEdMeXd3WktPR1NkM0tpc2pVTW5haWhkM1BEejZIRVFhM2ZQdjFZOVE5cC9aL1p3c3c3SUFWWkpHdEFoeXRvdkxhQTErakdNWllKNnRwYVY0NlY1SHRmWEJjcWdqNDV1eXYzVHNmM0VOQUdQUnplYlNGMGUwZ3lzN2JjMFd1NkVPU3RuZTZZOW54M200MkhMTkZhWnpHViIsIm1hYyI6ImFiM2I2NGRmMThkMDdmYWU5ODdmZGJjYjRiYzJiYzI0NWZlNDNmZmNiMDNmMWNmYWVjNmM4MWZjNzhkOTA1ZDAifQ==', '2020-08-12 19:35:28', '2020-08-12 19:35:28'),
	(6, 'eyJpdiI6Ik44OG9QYklhNzFDMHVQTGxYU1VRNHc9PSIsInZhbHVlIjoiQVU4VVkwNUEwM2J6Q0krbHI3T0ZIZWFmTzI3U05zRnJqc04vK05LNis4Yz0iLCJtYWMiOiIwYzBlMmY5MmFmYjBkMTBjNzZlNWY5OTU4OTcyZWUyZTZjYTE3NDY2MGYxMjdkZGY2NDU0YmJmZDIzYWRhMTcwIn0=', 'eyJpdiI6InJRY0JjQkV0Z2VCb3pjYVdsUnNtVEE9PSIsInZhbHVlIjoiRGtZblRWRG9ENFlwWmtBazh1WlNYMUw4RkxQOHhpUGZhZ3kzUm1aRkdMYz0iLCJtYWMiOiJmMzFmODhmMjNhN2JjMGZlMDczMjA4MWIwNjU2NTY2ZThlODk3NTFjYWJhMDlkMzcwOGE0MmUyMjRjNjY2YjI4In0=', 'eyJpdiI6ImE5WGZTbWdyT1hXUUFFY3F5NzJKaXc9PSIsInZhbHVlIjoiMWxwK0xVZ2J0RGpTZkppenpoT2k3MU5rNHJDd0hBVVpJNGE5YVJIVFdXUTVuL1ZNM2FiamxVNTZrMGp5TERsQWdJNmhqREZDd0o1Z3ZweGpVSDBsZGc9PSIsIm1hYyI6Ijk5YTU1MzFlNDk2YmIwZjdmYjJiNzhiNDc0ZmRkNWEwMzczMGM2NGU4ODBiZTU1Mjg2ZjE5M2YzMzYwYjQwZDEifQ==', 'eyJpdiI6IjN5dmtGMkNzUnBmclhTRWE1YkhpUkE9PSIsInZhbHVlIjoiU0FPN2FuTTUySEZZdXgvUWVPdGRTenBMUUNIVDUwTkViWlRvVmc3WHRoUU5Dd0xCa1lwallsRjR4MlNVSEZxMyIsIm1hYyI6ImM3MWM4OWM0NTIzNGMwZTUwZGU5MTgxNTUwMzUwOWU0NmI4YTE5ZGFmZjAxZTU1YjUwY2Y1ZGE5ZmVjZmFmNmEifQ==', '2020-08-12 21:06:35', '2020-08-12 21:06:35'),
	(7, 'eyJpdiI6IlIxcEt5c3lwYnp0NUpub2JLcGNHNGc9PSIsInZhbHVlIjoiY1FOSCtvSEh4a0ZSdUJUSml0aCtVUFRCVStvSC82SDFONnJqZHVoelZrdz0iLCJtYWMiOiI0OTZkZTdkOTYxYWI4ZWFiMTNmZGFiNTIzNTFhNjRiMWY5NTQ1MDUwNDgxODRlMjMxMDMwNmE0MGMyNTcyMmExIn0=', 'eyJpdiI6InFLVGJZeFJPQ05ESlFoZm9DdlM4cEE9PSIsInZhbHVlIjoiajdMSEhpSm41SzZpdnFxSXlxSmpZVWZzU1l1VkVVSGg0NUFra0Fxbk9FRT0iLCJtYWMiOiJlMDZiZWFjNjA1NjQ3MWI3MGFmYWY2ZTFhYmM5ODg4NWFkYWUxNjM3YWE3MGUyNzNkNDFhMWQ0NDNlMDE3ZmYxIn0=', 'eyJpdiI6IkpqWEp1blNmOFhST2lVcStFaml3N0E9PSIsInZhbHVlIjoiUXlKeHg3cVpaWWtQRWJNYVdqLzRsZGNKZFJBT01yU0RUWnVaRXYwRWs4c1JUZDNyOWZJOG5rK2lsK3h1M0o0b2FnbU5pR0J2MU5mVEJ2d01ZQUN1Vnc9PSIsIm1hYyI6IjhmNDg2MTE3ZGNhMzM4MDg0NjZmMzU3ZTI0Y2VhMmFhM2VjMjBmZGVlY2JkNzRjNGJiNjZiM2YwOGM0MGMzYTAifQ==', 'eyJpdiI6IjN6WERaV0FDZzRIRG1ob0VkT21WTmc9PSIsInZhbHVlIjoibmJKRlErVjBJSngrV3RycGswRVhZYkZJUTNOMVZFRWJpdHJiY1pEbnVjS3F6c05POUN6UDJXNllQOTlndzh4dCIsIm1hYyI6IjkyNDA0NDNiNTAwNGMyMDA5YzhhMTA5NWMwOTA0Y2E3YzNkNTU2MzdhZjk0YzUwZDU1ZWIxMTBmNjcwNDAxOWMifQ==', '2020-08-12 21:06:36', '2020-08-12 21:06:36'),
	(8, 'eyJpdiI6Ijg1bytoM1IwdjlhU3V0V2dOZjQyWGc9PSIsInZhbHVlIjoiN01qQmtEdi85N1MyWFlvelpZVzlIM2N0TGpyN2l0YmpqWWxpS21FRWNEWT0iLCJtYWMiOiJhY2VlZDg0NjA5NGVhNjVhZDk1OWVhYjdhYzYyZjcyNGVkNTExMDk1MDNiZjQ4NTllZDI2OGRmYWIzY2FlNTliIn0=', 'eyJpdiI6Ik8rVzd3VUhDT3dydUg1Qi9KU0xOUXc9PSIsInZhbHVlIjoiZE1taHdXSzROWFUweWVGOFBPd2lUUUUvN1ZML1FIdlJLOUJKSmRNZkpWbz0iLCJtYWMiOiI3NGJiNjZiMzI0ODFiM2Q0OTdlMTU3NjQzOGZiYmIzOGU0YjllNGY4MGM0OTE3YzVjMzg3NDE1MGMxOTNkODZhIn0=', 'eyJpdiI6Im5tVmcwckk5M3B0YkxsRmFQTm9mb1E9PSIsInZhbHVlIjoibTQvM2VsT0lZRlZ1Zkg2TVpGcDlVTUx1NTNNc3V5R0Fva09oOEZvK05jL3Zha3Z2KzhraUkxRVFBRTFaYS93Ukl4cGRCdWpFU1ZjN0s0NGFseVJUbkE9PSIsIm1hYyI6ImNlN2M0ZDgyYTZkZDg4YWYzYjI3OTdkZjMzYzUyZmVjODJlM2YyNjY5YTBlNWViNTU0NGFhZTlhNzVhZjZlMjAifQ==', 'eyJpdiI6InBFUFRqRzdHZ2tyVjA0VXdQclk3VUE9PSIsInZhbHVlIjoicUJlblJ3RnlLWU4reE81clp0bXc0ZjJlV0MxdDVGWXNRV3NGblQzdjhBOEdHSDVCQTJkUk1KYnlVK0o0YTIrV0Nyb3NEWGVIcUxVbkh2czVEcmZlZm5ycS83Wmc0V25sQTVCZGlQK3lGa2gvamdpaDBZR28weDBBajczVjVqSjRvNFNsSTUzTmh4OW91WklKZWZRL1NRek1wdWZSL1l3c2p6SWFTUDVqT2JCOWo1eEljUTBwdEcxZ1RmeUZCVTdXWVpFam1pa0I0NStnVFdSRXNwV1FqUT09IiwibWFjIjoiNzBiNmNlNDNkODkzNTEyNzllZjM2ZWJmZGM3Mjk0YzdiMmM3ZTc3YjM4MDQyOWMyNTQ0NTA3OGJjZWJlNDJjNSJ9', '2020-08-12 21:26:57', '2020-08-12 21:26:57'),
	(9, 'eyJpdiI6IjFhTm54NFBzbHFvRFZBWWxPZWtnV2c9PSIsInZhbHVlIjoiaFVZVFhFWlp1Rm5JZlN5ditzVkdsc0FvdEVEakh1bFl1K3hZTzB5TXdoVT0iLCJtYWMiOiJkZTZmNmY0MzA0YTJiZWE3YjE5NDdlZWM5MmE0YTA0ZDY4MDcyZDVlYzZhN2Q1OTkxNGRkMTg0YzgwMTk3N2JjIn0=', 'eyJpdiI6IldaS2d0SnBmeGNScVE5azRuN3Z2UHc9PSIsInZhbHVlIjoicnpyT1AwMW5NNGlpbkRYWko3REJhMnpIMmdOWHRwYy85ZnE3d1hGd0JUbz0iLCJtYWMiOiJlZjkwNGIyYzc4ZjMwNGZmZDJkNTNiYmJmYjQ2NWU1Y2JmNDRlYzk2ODZmYmU2MWZkNWI0ZWRiNjAxODIyMTNmIn0=', 'eyJpdiI6InJ1aGoyVnJNTVlNWmZXOGxvL3Fpd0E9PSIsInZhbHVlIjoiM3FBOVBKK2lxVitSYm53UWdHcm5oYm9ONGVBenp1KzNRVHdGSzNsVmtiVDZ6bFc3S1VzZ2wvd2gzOWlzZ1JPZngwZklFWmlZWWJSZ2czZjVQWWQxaWc9PSIsIm1hYyI6ImNlZmYyMzQ3MzY0ZjNjYWE0NGU4OWI5MWY4MWQ5NDI1MDA3ODdmMGZhZDA0ODBjNDcwZDYxMTI3MjYzYzdhZWMifQ==', 'eyJpdiI6InR5VkloYjdlaWtseFEzZjA5RklqaUE9PSIsInZhbHVlIjoiai83QSszbSswd3l2YmVCNHNOS2RzbFdvaUN2L3Y3aUlBbU5WUmUvOXZ0RXF5WVd6Ukg5MXZrczAyYWRhdTIvaWFOU1F1NzM2WUhPM24yM1RFVFFTbTBHMGlWa2dETFZPdi9YY1ovQzlqWG9rMmxQamY1UXY5RGM5Mm9rVVJob3l0emxlWmw1UWFXMWplWDlOUWJBbk5ZZFd2Rkk0Z0tKMXVFelVxcmY4bnF5OGNORWY0TFJyckZ2VzErakllSWttIiwibWFjIjoiNjE3MmUxYzMyYWQ5ZTA5ZDI3ZGEwZWE4MGI1YmU0MmFhOWI0MWUyYjY3Mzk1MmZhZGMwYjYzMjI3NTQ2MjFhYyJ9', '2020-08-12 21:28:26', '2020-08-12 21:28:26');
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
  `cost` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_form_ci_items_lost_form_critical_incident` (`form_critical_incident_id`),
  KEY `FK_form_ci_items_lost_items_lost_or_damaged` (`item_id`),
  CONSTRAINT `FK_form_ci_items_lost_form_critical_incident` FOREIGN KEY (`form_critical_incident_id`) REFERENCES `form_critical_incident` (`id`),
  CONSTRAINT `FK_form_ci_items_lost_items_lost_or_damaged` FOREIGN KEY (`item_id`) REFERENCES `items_lost_or_damaged` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.form_ci_items_lost: ~5 rows (approximately)
/*!40000 ALTER TABLE `form_ci_items_lost` DISABLE KEYS */;
INSERT INTO `form_ci_items_lost` (`id`, `form_critical_incident_id`, `item_id`, `recommended`, `approved`, `cost`) VALUES
	(1, 1, 3, 1, 1, 3500),
	(2, 1, 8, 1, 1, 3500),
	(3, 1, 10, 1, 1, 700),
	(4, 1, 11, 1, 1, 1000),
	(5, 1, 12, 1, 0, NULL),
	(6, 2, 3, 1, 1, 3500),
	(7, 2, 4, 1, 1, 2000),
	(8, 2, 7, 1, 1, 3500),
	(9, 2, 9, 1, 1, 2000);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.form_critical_incident: ~0 rows (approximately)
/*!40000 ALTER TABLE `form_critical_incident` DISABLE KEYS */;
INSERT INTO `form_critical_incident` (`id`, `application_id`, `disaster_id`, `disaster_other`, `housing_damage`, `housing_repairs`, `insured`, `reference_number`) VALUES
	(1, 1, 2, 'eyJpdiI6IkwvZjl5QVZaYzdid2Jpa0RlYjBlSWc9PSIsInZhbHVlIjoiVlB2dGtzbHk5MzlFTFRiRUZURk95Zz09IiwibWFjIjoiYzIxODgwMGMxOGE2MjZjNTc5NjFkZWVjNmE2NDQ1ZDU4Yzk5MTQwZjk4ZmUxYzk2OGE4MjRmMzlmMjVmYmUzZSJ9', 'Y', 'eyJpdiI6IlZQNzZkNXhZWmJid3d0L0oxUHlmSWc9PSIsInZhbHVlIjoiamRMa3haNit5cE52UkJvaGVrV3lsb1BtNmxMU28zNjVNMHVVT0JvTDNQK09vdkFMOUVseWdBZmhTaUtKcE1JcS9WWGM1REk1U3lUaFV2VDJOaE9VMFBLejNhU2RwSWdYSHBNUEl6MGxvS2JabndmNUFRTjJKMFJKUmkvc0dpajZSVENmV1dyU1FOVmFpK3ZhbTFMQ2ZRPT0iLCJtYWMiOiI1NWZiZWExMTNmN2VmYjIwNDMwZWMzNjQ1M2RkNGJiZjk5MDIwOWU4MjIyNzBjODllYzUyNTZmYTdiZWQwOGJlIn0=', 'N', '001/2020'),
	(2, 2, 2, 'eyJpdiI6IjFGMUoveVoxd0Zna2RpcmV0K2dFUHc9PSIsInZhbHVlIjoic21sV0MyYk9aMW53LzVoTWx0UkpFQT09IiwibWFjIjoiMDBlMTU5NjU0YTI3YjQ1NTUxYTM0NjIxNDliOTIwMTllYzY5YmNjODU0YTE1ZTM4OGNmZTc1MTg1YzYwN2I0NCJ9', 'N', 'eyJpdiI6IlpQRWEzYlVlazc2M2VtaUxEeEMwRFE9PSIsInZhbHVlIjoiK2hSRVBKakZVa3FGcm14SWtSNWsydz09IiwibWFjIjoiMWYxMmQ3NTFhYTZlNGRlMGQzMmZmNWI2NTk3OThiN2YwMmY4NjYxYmYzYTYyYjZlZDJlNGM2OTI0ZTQwYTFhYSJ9', NULL, '002/2020');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.households: ~0 rows (approximately)
/*!40000 ALTER TABLE `households` DISABLE KEYS */;
INSERT INTO `households` (`id`, `housing_type_id`, `address1`, `address2`, `community_id`, `total_income_id`, `active`, `created_at`, `updated_at`) VALUES
	(1, 3, 'eyJpdiI6Ik9FNjZMOFlVbUhQQkI5Nit2MzFGaFE9PSIsInZhbHVlIjoiRlh6TVF3RnlMd20rSXIzemVYOTJRcUV6eDlHQWhmL01JUVp6Yk5mWEpSeDZKVXZZb3JTS0VkYmlFQjBmYnNNanZKSUVReC9IMkpUTmU1TFp4L2ZPcW5XclVXdE54ZVp5a3M0VWtCU3lRTUwxK2JxMDFuN2RYOFFzckRZZUIydWZXZTgxUmZYREFtWGZ4SWZ1ZUNZcG1KclBVYVZvVWF6YVNuV0FjU3RJTHBSU3RqTEpjRlVZejltS3I3WUhEdHZXIiwibWFjIjoiYzc0ZWEzMjRmMTNmMzM5YzBkNGVmMjQzMGMyZTEwZjFkMjE5ZmRlZDA3YTIwOTA1ZWM0NTliOWM3N2ZhNTViYyJ9', NULL, 191, 3, 1, '2020-08-12 11:39:34', NULL),
	(2, 1, 'eyJpdiI6InRYaUdwbmZnVFBUU29iVndWYXhrN2c9PSIsInZhbHVlIjoiOGQ2R2NrSDdkc3k3b2RaZkFJYTlYd2xKSUxvc2lpdXRZTC80eEdUQkJzSEJ3OTVrTGZvMXpWUDRZTlFDQzBhTjJLbnhOQzdyRnBmVzhLRU9HYVJYSFo5dHhkZmVDdkVLVnpTVktsVk9STU1xYUdlZE9FTWNzUjlxakh3YWJ6by9tQWF4WnV4VTlUSFRrNnJKbmxaTHZVRXFVeTN0NHlINHVHNDhNbnFESTRvPSIsIm1hYyI6IjliZjQ1MTMzYzM4MTQ4ZWMxZjkzMDcxNjFhODcyNWNjMzNkZTc4YzFjMThiZmQ3MzVlNDQ3NzYxYjdjMWUzYmMifQ==', NULL, 235, 1, 1, '2020-08-12 20:29:37', NULL);
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.insurers: ~0 rows (approximately)
/*!40000 ALTER TABLE `insurers` DISABLE KEYS */;
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
	(12, 'clothing', 'Clothing', 1000);
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.landlords: ~0 rows (approximately)
/*!40000 ALTER TABLE `landlords` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.people: ~15 rows (approximately)
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
	(9, 'eyJpdiI6InFaTHhQSDdCNlJPNElBaUQ3V3VScXc9PSIsInZhbHVlIjoiaHdqMmo3eDZWQVZkbFNDeWtZdG1PZz09IiwibWFjIjoiZTZjNzFiZWUyN2U2ZTA2N2FlOGQyZmQxNzFiOGU1MzdkYzUwNWFlNGFjZGM5ODg0MWJiYmI1NjBhOGY4NTE0NCJ9', 'eyJpdiI6IkF3c2ExUXA0eTdYdUwreDJ0Q1ZqcFE9PSIsInZhbHVlIjoiRmdlTTl1ZDZ1T1ZLRTNCVGpHZU9Tdz09IiwibWFjIjoiNGZhOTliZjVlMDYxNzQzNmRhMzM5NGYwYmMxNzljOGUwYzYwYjY1MzdiYmNhMTZiZTBjY2Y1NDQ1ODU5NTVhNyJ9', 'eyJpdiI6IlVqNGhQb1RJL0JhQm1KOWZpbjBiUHc9PSIsInZhbHVlIjoibGZ2RC85MTFsbTlNcWtxNTJqWThBQT09IiwibWFjIjoiNjY3Njk2N2JhMGVkM2NhMjQwYTE2ZTAzOTMwMjMzZjcwZTM5ODg0NjI0MjNkNmJkM2EwM2U0MGM1MjY0MDNhZSJ9', NULL, 'F', '2008-06-11', NULL, NULL, 48022222222, NULL, NULL, NULL, 3, 'eyJpdiI6ImJ6Y0dBUHRJcE5RcWQvdTZtbDJaZ2c9PSIsInZhbHVlIjoiOHgveEFpa1U2Q2F1emRQcHFvaVBlUT09IiwibWFjIjoiNTRlOWIzYjZmZTk5Yzc2ZmE3YmQ0ZDQ0ZThiNmQ3MzU4ZTA2NGRjMjk0MDNiNWIzMjJhM2U4ZDcyYjQwN2QzMiJ9', 'eyJpdiI6IktrazBta3p5SU5SZHVoakY3b2hNbUE9PSIsInZhbHVlIjoiYlc0OTVpQ1E1eldoRlVBUzNaSmJlUT09IiwibWFjIjoiNGIzYjRjYzFjYjY0Y2FiNTY4ZjZiNjY3ZmU3YWNlZmRhNTA1MzE3NjJjYmVlMjcxNTNmMGNiOTdmYWZhYjhkNyJ9', 'eyJpdiI6InlVNndaZ3dwdnpScDV1ejU4Tms1aFE9PSIsInZhbHVlIjoic1V3ZFNUMitnZGdiL1hVb251a1VCQT09IiwibWFjIjoiNDZjZjdlZjkyMWVhNTc4YzI5ZmEzZTRlOTIwZTVmNGRhYzc0YTEwNjRjNmRiYmYzMDUzMDA0NDJiZjQyOGFjNyJ9', 'eyJpdiI6IjQxOGtvbmd0TXNjbHU0bTdibTI4TkE9PSIsInZhbHVlIjoiVWhqNTlHdjRhNE0vVTJoMU5GYXBSZz09IiwibWFjIjoiMWM1YjA0MGQyZjUzODE0MTczODdlMTk5ZDQzZTA5MGY4NTYxM2EzMTRkODU1ZDNlNjU5NzgwYjUwMjQwYzkyZCJ9', NULL, '2020-08-08 18:15:31', '2020-08-08 18:15:31'),
	(10, 'eyJpdiI6Ikg0OEVWd0trSTIxTTBZRy95U2xKa1E9PSIsInZhbHVlIjoibGxpQUZ5SjNXVnVSRVkwVWN2MVpDQT09IiwibWFjIjoiNjg1ZjdlNmEyYmE2MTI0Nzc4YzA5YWI2ZDIzZjI5NzllZDM0OWM0MjFiMTYxMDM2NzEzYWE3YTc4ZTc4ZmM1MyJ9', 'eyJpdiI6Ikw5Tm1VVUR0M0YyZ01zdUo2SGtIRHc9PSIsInZhbHVlIjoiU1NNOHFRT3R6cXlwamZSSC9TR1VzQT09IiwibWFjIjoiM2YxNzI5ZDMxYmMxYzE3YjhmZGY4OWVkZTg0NDQ0YWMwNTE2MWIwYjlkMTEwZDI4MDNlODlmZmZlMTcyZTAyZiJ9', NULL, NULL, 'F', '1989-01-02', NULL, NULL, 44444444444, NULL, NULL, NULL, 7, 'eyJpdiI6Ik04b0FtL1gvUGNFODhYVEYxRlNRUGc9PSIsInZhbHVlIjoieHIxaDZiU3RkQ2lwajF1bnFGa2pwdz09IiwibWFjIjoiYTQzOGE0NzZhMWE4MDAzYTgzYzVlMTk1ZGQ4YWU4M2Y2Yzc3ZjBkNTI0NzY0MTEyMDFkMzVlODEwYWY3ZWQ3YiJ9', 'eyJpdiI6Ims3VnB3a1Nsb2tTU3ZxMHVtMnlyQ2c9PSIsInZhbHVlIjoiaHAxK3Q0MU00SEd3VTB3NW41YVZIQT09IiwibWFjIjoiZmQ0NzNkMWJhMDhiMzc0Mjk4NGYxYjQzMjJmODViZDQ5OGZiYzMzMTQ4NDI2Mjk0NTAxNmY2ZjM3NWQ0ODQzYSJ9', 'eyJpdiI6IjdwRGxaczhGUC9ZSjJIOUdVaFBuOFE9PSIsInZhbHVlIjoiSGJreHZTelgvU21ydEZoRDdyQkcwUT09IiwibWFjIjoiOWRlMWMyMzgxYzZhNTgzNzdlOTEyYTE3NjEzMTk3M2EwNzBhYTMzMWYyYWM2YjQ3ZjQyOGM0MTkxZGNkMjYxZSJ9', 'eyJpdiI6IjdmVTErMFZJcXh1TEh6RXJ0NnVXV2c9PSIsInZhbHVlIjoiNWgzZFlXb2R1TEJoRDhDOXl1S2pLUT09IiwibWFjIjoiMTc3MzY3NjkwY2M3ZjE4YWM3MjZiNGJjYmIxMjNiYTAzYzYyNjc0Mjc3OGRjYWExOTI0YmExMjU3NGExYjUwMSJ9', NULL, '2020-08-10 13:46:56', '2020-08-10 13:46:56'),
	(11, 'eyJpdiI6IlRtMVhncXBseUErelYza0dpaGtWd0E9PSIsInZhbHVlIjoielRwODJhRjcyQ2dUcTFSVHNFOERJQT09IiwibWFjIjoiMmVmZGYyY2FjZDAyNDQyMjNjYWRkNDMwYjRmMWFjZjhlYTJiMjdkNGQ3N2Q3ZGVlOTZiNmUzMGFiYWIxZjVhMCJ9', 'eyJpdiI6IjUxYjN3YUw5QjVQcFlBdk0vdGNGK0E9PSIsInZhbHVlIjoiUVJHSjBWS0RrSFRaSUsrYlJrREhLUT09IiwibWFjIjoiNzNkYTdlZjVmMjdiNTNlMjU3MThjYmE2ZWU1YWNlMmRhNmQ5MjMxZmE4ZDc0YTFlOTk0MzJjYzI4YWNjOTcyYiJ9', NULL, NULL, 'F', '1989-01-09', NULL, NULL, 55333333333, NULL, NULL, NULL, 6, 'eyJpdiI6IjBKN3BpYm1mZHpwMEJtNzZWbWY5V0E9PSIsInZhbHVlIjoidVFUb3hzLzNYc3VuRzFlcVUzKzdpaGRLbDhoQVBPOWR4dFJEbk9vVHQ5VT0iLCJtYWMiOiIyYjVhY2RmZDM5NGQ3ZWExOTc1MDUyYWMyY2I1YWMwZDNkMmRhZmYyYTRjMzgxMmE1ODdlYzFjZGNkNmMwNTgyIn0=', 'eyJpdiI6IlBkZ2JjUlU2Q0t2VElvV3Yvb0IwMGc9PSIsInZhbHVlIjoiaDg1OUFCNWlyZ3BMelhlWmlVRU5Edz09IiwibWFjIjoiYzQ5YmFlZWQzOTQwY2YxYWNmZTE5ZDUwM2Y0M2UwN2UzYjk0MjdkYTJjNTc3ZTJmZjcwZGFhNTM0OTkyYTQ4YyJ9', 'eyJpdiI6IkVUcjhQZGtRczRMT2FtRTJDL3oya1E9PSIsInZhbHVlIjoiUmg0Rit1Mm4rT0dQV2pPWkhmQTYrdz09IiwibWFjIjoiNzQ3ZDdiNjM3OWUzNmM2Nzk1ZGYyN2M1MWFjZGMzNGRhOTMwN2UwYWIzNzIxMGFjY2NjYmY4NTIzYjI4YWFmZSJ9', 'eyJpdiI6Im93aWx2RVdOSnZSaEE4RU0raW1SekE9PSIsInZhbHVlIjoic04zNFlUQ0tFNTVBZGdpMVg2Smhmdz09IiwibWFjIjoiNjg3YzZlOGY4ZGFmMjNkMWZiZTg3MmY2ODE1MzM5N2Q1Nzg0YTkxMTNhMGI5M2ExY2NiYWE1OWY3NTgzZjg0ZSJ9', NULL, '2020-08-10 13:46:56', '2020-08-10 13:46:56'),
	(12, 'eyJpdiI6Ing3aG53RnJCNXdxb2xLRlFSam54eWc9PSIsInZhbHVlIjoicG1WTDI0WDFJQ1FOZVBJdFl4QS9nQT09IiwibWFjIjoiZDIwMTAxOWMwMzM0NjliZGY5YThjMjQ1NmVjMDdkYzZjYTc4NDI5YzljNTBmNmQ0M2VhN2RiNDYwNjRiNGFkNyJ9', 'eyJpdiI6IlgwcGJWRGlrSHZYSEM0RjhEU281RFE9PSIsInZhbHVlIjoiZjlQNUdWUk0raEFnVXVvZktXQWttQT09IiwibWFjIjoiNGMwYmRlN2E5NjFmY2JhMmJiMjU2NmQ4Y2I1NTljZDE4MmVlOGM3ZjZkZTdjNWNmZWM0NTkxNzI1OWM1Yjk2MyJ9', 'eyJpdiI6Ilhqd3JiNG1qazdiTkJuNmR5Zm52TlE9PSIsInZhbHVlIjoiQnk1YytoSnRvZXkrZG5QMEZaL1RDQT09IiwibWFjIjoiZGQ1ZDEzYTNhYjUwZDRmYzQ4ZDljZTNhZjM0NTc1YjhjMDc0NGU3MzdhYThjMWMzN2NhYzE4MDc3ZTE3Y2QxYyJ9', 'eyJpdiI6ImFLWFI1dTVhVU45NitidnJiU09oZXc9PSIsInZhbHVlIjoiUythaGNHOXNRSG5Vemo5bkVUN05selJPNUZvWDRJVkNzZ2RQT1dqVks4RT0iLCJtYWMiOiJiYjQ4OTU4NDdkMjA0YWRjZmViZDk0NGY1NjM2NmEwNWNkMjVlNDk0NzMxNzM5M2MwZjc4ZDRmYWE1OTU2ZDViIn0=', 'M', '1989-01-17', 2, NULL, 53855555555, 1, 'eyJpdiI6IlJIYkpsQjZpS3YvS2lGSTJnYXlkeUE9PSIsInZhbHVlIjoic1haZ3IzZ2FCRVZKcHlOekk0TWFLZz09IiwibWFjIjoiNTVhNGE0ZGYzNmQwMjU0N2NiOTNiZDBjM2U5NzUxZDU3MmM1ODMxYmU5ZTkyODA4MTZjMzc4ZjgzZjU5ZDA0MCJ9', 'eyJpdiI6IkZ6VlYrUjNOd1dLSGtmVHRpZUZZcUE9PSIsInZhbHVlIjoiUENTNE1xdTFUVXpQV21jNzZVcFZ0QT09IiwibWFjIjoiM2YyNjI5ZmE3OTVlYWE2NGU5MzRmMjBiNjJiMDJkZDY3YTE1YzZiM2YzZTdhZjkyZDliZjY0NTFhNTg1ZDk4MyJ9', 1, 'eyJpdiI6IkhJaUgzOUtPS3J2ZGFBYmRHQXQwZ2c9PSIsInZhbHVlIjoiMmwvaUlUOFFPZGd1YVJXeUtWMVRJQT09IiwibWFjIjoiYmYxYmUwODE5ODE2NzBkNWUxYjA2OWVjZWQzNzNhY2E1NmY1NDdhNmE2YjM5Njg1MjIxNDZlMWU4MmU3N2IxZCJ9', 'eyJpdiI6IlJ3dmVMMFlOaWtDWlJEdm1CUjZvS3c9PSIsInZhbHVlIjoia1o5RFlJMFp2L2lwYTRsM3RhMEJvZXd5YjV0RXNnTUJNclp0LzN0dnhacz0iLCJtYWMiOiJiYWQ0ZTJjNWYwOWY2Y2E5ZjBmMWNjNjE2OGU0MGNiMGQ2MzQzNmZiY2VjMmE1ZTc4ZmVlNzJmYWJiMjIwOTQ3In0=', 'eyJpdiI6IkVjaEtrV3dFM1pINzF6S3BKeE1INHc9PSIsInZhbHVlIjoiNFBvdUZjV1dCVnFpaGREYmpkMzhNK01GaGUvTTE4VllhYTFidlRqNmh3Yz0iLCJtYWMiOiI0YmMxZjZkNWYxMmJjMjc1NWRlYTM0YTgzZTc2YTE4YmQzZDQ0MGY5YjNkMzZkZDg5OGE4OGQyMDlhODMwOWVjIn0=', 'eyJpdiI6ImRZUVRQY2dna1NrSm1jbldIUm90aEE9PSIsInZhbHVlIjoiM2pnU1VDWndCdjZwc1dXaFNURTRsMWhpRG02SkpmSEtPZUorb0ZUMjNidz0iLCJtYWMiOiJjN2QyYzMyMzc3ZDVhN2E3NDYzOWU0MzM5YWYyM2U0OTNhN2U0OGQ0NWNlNjMyMjZhNzBkZmYyMTBlZTg0NDdkIn0=', NULL, '2020-08-10 13:46:56', '2020-08-10 13:46:56'),
	(13, 'eyJpdiI6ImV2V251dlJCTjkwR2ZpbXM5Y1JDVnc9PSIsInZhbHVlIjoiZng1dEpuVGI4UVk5cyt0emxTWWJVUT09IiwibWFjIjoiNTE3YmEwY2E3ZDFiN2MxZjBkYjU1NzIxMTJiMmUzZTBiMzhkYWI0NDQ5MWMxOGQyODZjN2Y5NDBlODg2Y2M3YiJ9', 'eyJpdiI6IncyTndqQWZjdTAvTkJwV0IwQWlRS0E9PSIsInZhbHVlIjoiTVlMQ2RGSGxrRFBmNDYremJpZkt2Zz09IiwibWFjIjoiMzU3MWNmZWI1ZWMyMTBlZGQyZjI3OTg2ZmJlNWQ5YjhhOWI1YjRhOWQ2YzMwYWE3NzBjMzRkNzM1NmFiMWYzMiJ9', 'eyJpdiI6IjZGeFhPSlV4RnorNTE2QTMwVE1kbUE9PSIsInZhbHVlIjoiaHVpOGdrYXROQ3lYY2tWMGRjbVRxUT09IiwibWFjIjoiZDNmNmQzZWU5Y2ZhOTE1YTY3NjVmZDUwMTAwZWRkMDY2MzJjZjYwZGVmNmE5NDI1MDBjYjQ2MDlkMTNkOTA2YSJ9', 'eyJpdiI6IjF1c2FmaDcvVC9KZDVxazFCSzlvOWc9PSIsInZhbHVlIjoid1c4WVFSN3F4b3c1R2lUL21sZHFDeURjTERaQVZqMllocm5ERlNGNmRyRGNIenNnbHhmYll3UnQyL2UvRGJ2aiIsIm1hYyI6ImM4OGVlYjU5N2M1MjYzMTliMGIwYzk4ODViZTQ1Mzc1NmM1YTZkZTVmY2FlY2U5MGRjZGMwMTAxNWM4MDUyNmIifQ==', 'F', '1989-01-02', 4, NULL, 79033333333, 3, 'eyJpdiI6IlhlNitKdHpUTTJ1QUtVazA3VG1QNlE9PSIsInZhbHVlIjoiVC9tUGZXSnJuKzVOWWxSTkxYUU56QT09IiwibWFjIjoiMDBlMTkxYjgwZTFmNzQyNDYxOGVhMmE1ZGI3ZWY2MzkxMDQ4Mjk1YjNjYzJmMjMzYWM0ZjFjZDgwMmMyMTk3ZSJ9', 'eyJpdiI6IlByQnlxUENMZHZZMjdTM1hLQUQ1M2c9PSIsInZhbHVlIjoibERjUVFMR3pBQW5CdEdreGFFQ0RHUT09IiwibWFjIjoiZTI3OTIxZDEzY2M5MzgxM2Y5ZDRmNDU4NDJlZmNiZjFkMjRiODZmOTc3N2FiMGU2NDcyMjc5MzkwMjhjNDE3MSJ9', 3, 'eyJpdiI6IksvSW9YVVk2RGJ5NkVBaVB1T2FzT2c9PSIsInZhbHVlIjoiRDA1SEhmNEM2eGMxeTBScVVUVGxhZz09IiwibWFjIjoiN2VhZWFiN2NlOGNiYTRlZmRiMTUzNGUzZTc0MmZkMGFmZTZmOGE5OWI2N2Q5MTRkYjhhNzdmMDFjM2ZlOWUyZiJ9', 'eyJpdiI6IjV3Ym42Zzg4RW1GV25nWXlJbkNwU2c9PSIsInZhbHVlIjoienQ2U21SSWRqNHVRejRFbWZBZFJSckxocUNRL2J0ZFFzZGIvZFQ5Sm5KMD0iLCJtYWMiOiIzYmNiM2VkMGRlMGZjYzhmMTlmMDNhNzRmMTJjZTE5ZmE3NWQyY2IxZGEwMmZlODE4NWE5NDNhZGFkYTJkYmM4In0=', 'eyJpdiI6ImZ5TTExb292TEJERmpLV3lVV2QvVnc9PSIsInZhbHVlIjoiUnloeXhmUy9xdTlXRXBLR0d3OThmdDFCcjR5YnZqMzdhM1M2bFNyOUFEOD0iLCJtYWMiOiI1ZTZkNjA3OWU1ZTMyYzAyYzVhN2MwMDMxNmFiZDRhZmZhNTk4OTcyZTc5YzJjNDI0OWJkNjZmYjRlYzhmYTVhIn0=', 'eyJpdiI6IkJERVpHMm5lOXYxcWNrRUc5T3RYL2c9PSIsInZhbHVlIjoiVlBxbEJ0ckVocWJxeStCT2xCZ1FVbkhWWFRaZkpPdHZ6VHUvSzJIYzgraz0iLCJtYWMiOiI3M2RiNmI4YWYxYzY5MjRkMmUxMWZjNGI2NmRkNDJlNjg3YTBmOTRhNTNhMDVlOTI2ZWVkM2RhYTM2OWI3MzBkIn0=', NULL, '2020-08-11 12:44:47', '2020-08-11 12:44:47'),
	(14, 'eyJpdiI6InNsaFFCZnVHQzYxem1iOWQ5Y0hHYWc9PSIsInZhbHVlIjoiQkl3UGhrMDFKdUIwdmR5cFlYeFluQT09IiwibWFjIjoiMGVhMTM0MTA1ZjJhNTFhMTQ0YzUyMWY3N2RmYzhiYTVkMmJiNjc1ZjdhNDM3ZDQxZGQzOWZjNDM2ZDk3NTE4MiJ9', 'eyJpdiI6IkNqL2U2bjFGYjdZQk1OS1hTK1FhMGc9PSIsInZhbHVlIjoiaWpXekdYV0hOcEY5YXhCc0UxdkIvQT09IiwibWFjIjoiZTM3MGQ1MzkzYWZmYTg2MDFkYmU4MjY4ZmIxMzE0ZGYzMTQ4NTA0MDRkZmQ2NWJjMWRiODY0MDFmNDgxZjMyNyJ9', NULL, NULL, 'F', '1989-06-06', NULL, NULL, 94422222222, NULL, NULL, NULL, 7, 'eyJpdiI6IkVPTGRxbWcrUkYvanJGTU5xWGw5NEE9PSIsInZhbHVlIjoiMkdzbE1CaTFaUmh5NVBlNkZaRVJBdz09IiwibWFjIjoiMWMyNTIyMDlmYWE5Nzc5OGUxMzI1NjRhODdjYzA5NDljNTM0YmZhYzY1MTAyMDI1ZGJhYjZlMTYyZjAyNGZjMCJ9', 'eyJpdiI6ImNLN2NlU0NEc0Y3eFBxdmJZZXZiaVE9PSIsInZhbHVlIjoibEE2Mm5CV25lQllyNXd3aFhUTDZEZz09IiwibWFjIjoiZDNkOWZmYTc3OWJkM2YzNTU3NmUwYjE1OGI0MWY3MWMxY2UwMjc2MWYxOGUwZjNiNjM0ZTc0MTEyZTAzMGQzMyJ9', 'eyJpdiI6IlY2b3dQbTZ4bW9EY0VmT3hENElDTXc9PSIsInZhbHVlIjoid3EwdUZZSDBYaWtBOFU3NjYwaUdYdz09IiwibWFjIjoiZWM4NTYwMzVkZjgzMWU3YThhMDUyZDRkOTQ5NWRmZTI1YWI5M2ZjMDNhOWI1MDEzMjFiMzU2Y2ZmMzA5ODU0ZiJ9', 'eyJpdiI6IjVNNjdGamh5UWVjc0h4b0VmR25aZGc9PSIsInZhbHVlIjoibUlSOCs5V3hSVzhBR2dkaU0yc1lkUT09IiwibWFjIjoiYzIzNWRiY2U0NDM1MTVkZWRjZTdmM2MwZjljMDMxYjFmMjk5Y2U5MTQ5MGZmMjgzYjI1ZTg0YjNjMzIyM2Y5NiJ9', NULL, '2020-08-12 11:39:34', '2020-08-12 11:39:34'),
	(15, 'eyJpdiI6IkxKOTNzL2Y1cU5sd3FOTXdaZU1GcUE9PSIsInZhbHVlIjoieEQxT0RVRzFEZitvSHdyeTVjbXEyZz09IiwibWFjIjoiZjU1MWM3MTQ0MWUwMDIwMGUzNzQ0YzZiYjgxOTNjMTUxZDIyODZkODI5OTRhOTBiY2YxNmZiMjNiN2NlNzBhNCJ9', 'eyJpdiI6ImNDZTE0MUFlcU9GT3VYTXZQOTdFRlE9PSIsInZhbHVlIjoienpRU2c4Z0J2dFBXMWhKUmFwVjBKUT09IiwibWFjIjoiZTU2ZDM5ZWFkMjM2NTdiNjU4YjM2Mjc4NDk0OTJkMGRmOWUwY2NiZGY3Y2E4YWExZGZkMWM4ZmE1MTQ2YTgwZiJ9', NULL, NULL, 'M', '1989-06-14', NULL, NULL, 40922222222, NULL, NULL, NULL, 8, 'eyJpdiI6IlQ5ako1UzRsZFIrNll5U2hOUHJna3c9PSIsInZhbHVlIjoidGxGVWM5dkF1MEV3MzYwbHdMckUvZz09IiwibWFjIjoiYzUzNDZjYWEzMzNiMmQ2ZWYxMjhjMjU3ZTBmNDcyOGQzZThmODVkZjVkOTEzYzM4NDQ5MzUxYzU2MTZlZWRhNSJ9', 'eyJpdiI6ImdkK2pENjJOTFpwOWlDVXRwUXlYcHc9PSIsInZhbHVlIjoiRWZDWnZnaFdDMkx1NHJFaTJ6Y3g0UT09IiwibWFjIjoiYWRhNjNlYTc0ZDBlYTdmNTMxYjcxYzRmNzFmNjEzNzk2MTEzOTY3ZDA4OGJiYTEwZjIzZDYwYjc1NWEyNzA1NiJ9', 'eyJpdiI6IjcwME9RbklHS1oySmdCZkc0NmRtTnc9PSIsInZhbHVlIjoicmY4NEhPRjA2MFRjT05jbWZBMXcrZz09IiwibWFjIjoiODIxYzM1ZjcxZGE5MTU3MDdmMzY4ODYyMzAwY2ViZTJhODJiNTkwOTYxMDk1NjUwYjY0ZjJjNjAwZjM4NDViZCJ9', 'eyJpdiI6IlM4dGJHQzg0TDUzYVNseXZqSVo3d3c9PSIsInZhbHVlIjoiOG5oZmEyN3FYRFd3UUNkZ2VzbHB6QT09IiwibWFjIjoiNjQzY2MzYjJkNTk1Mjc5ZTlkYzc4NDJmZTQ4MjMxZmEwMGU4ZTJiZWJjMDc4YjQxZDM2MDVmOGI1NzE4ZmJlMCJ9', NULL, '2020-08-12 11:39:34', '2020-08-12 11:39:34'),
	(16, 'eyJpdiI6ImpNS1NVeW81Y1RubVV3TE15V1o4dFE9PSIsInZhbHVlIjoiendEYy9wcGFLUnhkQ3RMMCtpVC9rUT09IiwibWFjIjoiMGYzYzgwYTA0NjFjM2JmYTVhYWViNmI2MTdhNTUxOGRkNDZlN2RmZTZhYzc4NDA5MTk3NTM2ZWJkMTBjZDBlZCJ9', 'eyJpdiI6ImphQmVGQ1RObmpGYmxzUkZLMEVOMFE9PSIsInZhbHVlIjoiaCtVRUg2bDZKcCtMOEhET3dVemx3QT09IiwibWFjIjoiY2RkYzEwNjY5ZjZkODIyNzQ3ZTIwODBhOGYwOTcyNmJiODBmNjAwNGQyZmFiNWVlMDk4YWU4OGFhZTIyMzFmMSJ9', 'eyJpdiI6IlVIOWJNdGZSWno0VlVFLzh4RFJNOVE9PSIsInZhbHVlIjoiN0Z4dGRyc3BJWE9XMzJRbkdRMVlTdz09IiwibWFjIjoiNTc2MTg0OGYyZTVjMTdiMWI4YmU0NjE5ZTY5OGQ3NTU5OWQyYTQxOWZiMDA4OTFjMzZhYWE4NjNhZmI3ZGFiYiJ9', 'eyJpdiI6IitzcWpYZTlGOVcyQmdjYjVKYVd0b1E9PSIsInZhbHVlIjoiRmQ5N2ErRVhwN1NuajgvZ3hCQ0YwbnUrQWNsb09PMlY4Z2ZJYVkyMG9KST0iLCJtYWMiOiJjZjk5MjRmZjRiNWMwNmE1NTExZGQ2ZWU5OTJhOWRiZGI2MjAzMjk5NWU0YzczOTAzZTc5OGQ4YzFkOThiMzkwIn0=', 'M', '1988-12-26', 3, NULL, 23411111111, 1, 'eyJpdiI6ImJiT2lzTWM5dmY4Z1Jjd2NDS3VyZEE9PSIsInZhbHVlIjoiaStlWXlYaWpoT0RWbUhwL2tZVEgrdz09IiwibWFjIjoiZWQ1ZjkyOGM4ZWU3NGQ4Nzc2ZGQzYmNkYjY3ZmZjOThkNWJkZWUyYmE5NGMyN2ZmNzE1NjQ5NmMyNjNjMjIzYiJ9', 'eyJpdiI6IkhtMWRuK2lVdjdHZ09qZndHUEs0d1E9PSIsInZhbHVlIjoiaDV6dWgwUkVpU1F2MEtyZHlzTVgvQT09IiwibWFjIjoiZjA3MmY4MmQyMjZlMzMyNThlNzRiN2U2N2YyMzA5Y2RmODYyNWU3OWRmOTA4NzczODgyMzM4YTg2ZTYxMjRmYiJ9', 1, 'eyJpdiI6Ikt4K1NuTW1kS0R2eE9SZEpvN2pJd0E9PSIsInZhbHVlIjoiQlRjU3hFR3RxNnlweFJ0cXBsLzNNdz09IiwibWFjIjoiMWJiZjljOTk4MzFhYThhYWEwZDRiZThkNDU2Mjc1YjExMzJlN2M3YjgzNDllNDFkYzg3NjAxNzc1YWQwYzE3MSJ9', 'eyJpdiI6ImZMVVRVYUE2TTluY09kU01xTWZSeFE9PSIsInZhbHVlIjoiTUxTRzlRSk5CSW9OVHg0MExNbTRDT0RSTlFEb1dXT1NIemVYSGluOFNNcz0iLCJtYWMiOiIyMWVkOWI3NTA1YmY5ODk5ZjkwOTk5MTljYThkZDQ0MzdjOWE2NjVkNGYzMTZlNWY4Njc3MDMzYjg5N2Q1YjE5In0=', 'eyJpdiI6ImJVY2dhSkVBOCt6bW9IcHlDbU9sckE9PSIsInZhbHVlIjoiVk9tOG10NDZnZWp5K2VWdmtLUlJTbStpU0pNS2dmdjdLOUl1cjJ1cGV4az0iLCJtYWMiOiJkMDA1ODQwYTcyZWMyZTY0NGQwMTk1MTc5OWY4YWFjZWQ2YzQ0M2JiNGQzNDg1NWJhMzEyMWViOTRlYTU2NGFmIn0=', 'eyJpdiI6InArRXg4eHA2eldvcnYzUUxpVDIra3c9PSIsInZhbHVlIjoiSzBFZFRadWRaTGwwOFVuR0xOTHBUU1pLeDFQOVEzZ2FOaGhjbDZqejBvWT0iLCJtYWMiOiI1ZjlkYThiZGYwNDc3Y2NmZmQ1NzZkZjY1OTc2ZGE5NDM4Y2Q3ODA5NWJlMzgxOWYxNGI0MjgwM2FlYzg0MDRhIn0=', NULL, '2020-08-12 11:39:34', '2020-08-12 11:39:34'),
	(17, 'eyJpdiI6IitNN3pLYzRIaEdsa2pIREtML2ZFT0E9PSIsInZhbHVlIjoiZ1NOSUwwZGtQeTdqSWpQUDhhajBhdz09IiwibWFjIjoiZWY4ODNmNjAzZDc3ZjQ4NWQwZGFkNzlkODNmNDk1OTdmMzA4MjQyYTYyZTM5ODM4Nzg2N2E3MzAyNTVhODE4YiJ9', 'eyJpdiI6IndnWTFwSEZNLzRuWk9XMklJenUycWc9PSIsInZhbHVlIjoiaWZMWHpzdWRId2h3WXRvdlY3NUp5Zz09IiwibWFjIjoiOGJmZjEzNjIyZTJkZDdmNzc4MGFkZTE3ZDQ5ZjhhNWM2Y2ZlNmM0OTMwODJmMDVmYzE4NWRjZjVmNTFmYzg3ZSJ9', 'eyJpdiI6IlVEeUhXbUpiNmNQRVRySWZZMDBhOFE9PSIsInZhbHVlIjoiL0xUa2xwZm1iTXNjOW5adHcxUTdQQT09IiwibWFjIjoiMmYxNWFlODQ3ZDIyNWEyZDUzY2Y0OTc3NzRjZjZhMGU5NzRiZmU5NDE2Zjk1NWU5NzQyZTJkNDljMDQzMzNkMSJ9', 'eyJpdiI6ImU4cXl0b1lCdjdKS3VEZDN0U2NJMVE9PSIsInZhbHVlIjoiWmZuVVJCczZBeGUzZ2lJY1A5WjBETzRNd2JTTXNGcUtGTmJzbVlGTE42cjQvNjdyV2RnM3BRaEUzRHlIZEYxRSIsIm1hYyI6IjRlMGY1NjcxMjZhODk1YWFiNzljYWI3MDVhNjczM2M0YTU3Y2NhMTQ0ZjcxZTU3YmM5NWI0MGM3MzcxYmZkM2EifQ==', 'M', '2000-02-08', 1, NULL, 46822222222, 2, 'eyJpdiI6Ii9iZ3NsRXpmTWxFVktHTXpENVNCemc9PSIsInZhbHVlIjoia21hbjdlRG5KQmIydGVyaTRkbSt6QT09IiwibWFjIjoiZmFhZGYzNWJkMTBlYzczOTg1OGEyYTQyMGQwZDI0ZTRhZjlhZTRiZGYxNDU1ODViNzIwOGQ4MmVlMTZiNzJjMyJ9', 'eyJpdiI6IlI1eElrV1VGRUFkWlBJQkpqaElYZWc9PSIsInZhbHVlIjoiTVZyUlNWSGRaQUFBYlhZc0pnemFlUT09IiwibWFjIjoiZTQxZWE2NDhmYjM4NzYwM2IxNjRlMzc4N2YwM2FhY2NhOWY2YzA2MDY3ZTFiZTI3YjQyNDNmYmM5NzU2MzA0MiJ9', 3, 'eyJpdiI6IjU0NVlyUkhJSFBuYkp3SENWZ2JFMlE9PSIsInZhbHVlIjoiQlkxUWF1NGVyUHM4dFpjdFhJdGdLZz09IiwibWFjIjoiZDVmN2RmYzZkN2QzODU0NDI5YmE3ODYxMjIyNmM3YzQ3MTRhMjEyYTBkMWUzNWFhNDhmMjllNzNjYzdmNWJlOCJ9', 'eyJpdiI6Im5UUlgyT0JHR1Q2cjdPNzNyUlBxTXc9PSIsInZhbHVlIjoicXBUQjMzaGhnV3A2T0NPWkhqLzg1RHhSd1hocXBZSHptcUJZT2x5MnlVUT0iLCJtYWMiOiIxZjkzMDc0ODJiMjg3ZTczYzdmNGJmN2ZlNWI1NGY0ZjI2ZjY0NmJhYzNjNmMzODE5YjRiY2RmMzU5NzBkMmZlIn0=', 'eyJpdiI6IkJjcXp6YkpORWtxMFh6RkMwQVA4eFE9PSIsInZhbHVlIjoiM0JESk56Sjh1b2ZJNk9vNzJ5UnpJKysxU2V4VTZkU2JVN09OdmZHaEt6ST0iLCJtYWMiOiIwNTU4NjI4YThkNGMxYTQzN2Y0NGQ5ZTU1ZWZhMzc4YjU5MWRkYzA1ZTJmZTBjODA1MTliZjMzMWVmMmMwMjE3In0=', 'eyJpdiI6ImlMOG12OW5IWUphUzdhejlMUjN5RHc9PSIsInZhbHVlIjoiVlFqWkNFREs5WEYxOFllaXZiN1NTdCt3TGNzbVd3dXhyNEZ5bVp1aWtTbz0iLCJtYWMiOiIyY2ZlNGZhMTM1ZTY4ZTkyZmIyYWJlZTkzODhiNGE0YzMyNDA3Mjk5MWQwOTAzMDdlYzRjOWVkODhkMTBiYmQ2In0=', NULL, '2020-08-12 20:29:37', '2020-08-12 20:29:37');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.person_household: ~3 rows (approximately)
/*!40000 ALTER TABLE `person_household` DISABLE KEYS */;
INSERT INTO `person_household` (`id`, `person_id`, `household_id`, `relationship_id`, `relationship_other`, `active`, `confirm`, `created_at`, `updated_at`) VALUES
	(1, 14, 1, 2, NULL, 1, 1, '2020-08-12 11:39:34', '2020-08-12 13:58:01'),
	(2, 15, 1, 2, NULL, 1, 0, '2020-08-12 11:39:34', '2020-08-12 13:55:49'),
	(3, 16, 1, 0, NULL, 1, 1, '2020-08-12 11:39:34', '2020-08-12 13:58:01'),
	(4, 17, 2, 0, NULL, 1, 1, '2020-08-12 20:29:37', '2020-08-12 20:33:45');
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_schedules_users` (`created_by`),
  CONSTRAINT `FK_schedules_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.schedules: ~0 rows (approximately)
/*!40000 ALTER TABLE `schedules` DISABLE KEYS */;
INSERT INTO `schedules` (`id`, `created_by`, `created_at`, `updated_at`) VALUES
	(6, 1, '2020-08-12 21:06:35', '2020-08-12 21:06:35');
/*!40000 ALTER TABLE `schedules` ENABLE KEYS */;

-- Dumping structure for table msdfs_forms_db.schedule_applications
DROP TABLE IF EXISTS `schedule_applications`;
CREATE TABLE IF NOT EXISTS `schedule_applications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `schedule_id` bigint(20) unsigned NOT NULL,
  `application_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_schedule_applications_schedules` (`schedule_id`),
  KEY `FK_schedule_applications_applications` (`application_id`),
  CONSTRAINT `FK_schedule_applications_applications` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`),
  CONSTRAINT `FK_schedule_applications_schedules` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table msdfs_forms_db.schedule_applications: ~0 rows (approximately)
/*!40000 ALTER TABLE `schedule_applications` DISABLE KEYS */;
INSERT INTO `schedule_applications` (`id`, `schedule_id`, `application_id`) VALUES
	(27, 6, 1),
	(28, 6, 2);
/*!40000 ALTER TABLE `schedule_applications` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table msdfs_forms_db.users: ~22 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `first_name`, `surname`, `role_id`, `email`, `email_verified_at`, `active`, `password`, `remember_token`, `last_online`, `created_by`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'User', 6, 'admin@email.com', NULL, 1, '$2y$10$aRBnMbZm1ld51AkoRYKd4uACqpoNXSaVYPjq74o94WAhb9fGDnaFm', NULL, '2020-08-12 19:04:07', NULL, '2020-05-02 04:29:15', '2020-08-12 19:04:07'),
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
	(22, 'sharlan', 'schedule', 6, 'sharlanschedule@social.gov.tt', NULL, 1, '$2y$10$Y.4p13tIdm3tlyFMUWZgi.UL5C3Q3unvMzjxjhbvCxb613lfPeeEy', NULL, '2020-08-10 13:33:10', 3, '2020-08-10 13:27:49', '2020-08-10 13:33:10');
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

-- Dumping data for table msdfs_forms_db.user_logs: ~1 rows (approximately)
/*!40000 ALTER TABLE `user_logs` DISABLE KEYS */;
INSERT INTO `user_logs` (`id`, `user_id`, `ip`, `action`, `created_at`, `updated_at`) VALUES
	(1, 1, '127.0.0.1', 'Login', '2020-08-12 11:35:24', '2020-08-12 11:35:24'),
	(2, 1, '127.0.0.1', 'Login', '2020-08-12 19:04:07', '2020-08-12 19:04:07');
/*!40000 ALTER TABLE `user_logs` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
