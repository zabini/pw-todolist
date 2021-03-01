-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.17 - MySQL Community Server - GPL
-- Server OS:                    Linux
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for todo_list
DROP DATABASE IF EXISTS `todo_list`;
CREATE DATABASE IF NOT EXISTS `todo_list` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `todo_list`;

-- Dumping structure for table todo_list.tasks
DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `done` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `task_user_id` (`user_id`),
  CONSTRAINT `task_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table todo_list.tasks: ~0 rows (approximately)
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;

-- Dumping structure for table todo_list.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table todo_list.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
	(1, 'Teste', 'email@email.com', '$2y$10$FZVWJ0RpIpsE0xIxQIO6W.AjGXsh7UqlMyuxnZkIuAEE/F5EebFUW', '2021-02-28 20:23:22', '2021-02-28 20:23:23'),
	(2, 'Becky DuBuque', 'Rahsaan40@hotmail.com', '$2y$10$FZVWJ0RpIpsE0xIxQIO6W.AjGXsh7UqlMyuxnZkIuAEE/F5EebFUW', '2021-03-01 00:03:45', '2021-03-01 00:03:45'),
	(3, 'Charles Witting', 'Emiliano80@yahoo.com', '$2y$10$FZVWJ0RpIpsE0xIxQIO6W.AjGXsh7UqlMyuxnZkIuAEE/F5EebFUW', '2021-03-01 00:03:46', '2021-03-01 00:03:46'),
	(4, 'Jaime Beatty', 'Savion_Marks@yahoo.com', '$2y$10$FZVWJ0RpIpsE0xIxQIO6W.AjGXsh7UqlMyuxnZkIuAEE/F5EebFUW', '2021-03-01 00:03:50', '2021-03-01 00:03:50'),
	(5, 'Terrance Gaylord', 'Manuela.Luettgen@hotmail.com', '$2y$10$FZVWJ0RpIpsE0xIxQIO6W.AjGXsh7UqlMyuxnZkIuAEE/F5EebFUW', '2021-03-01 00:03:51', '2021-03-01 00:03:51'),
	(6, 'Shirley Koepp', 'Hillary.Schaefer@gmail.com', '$2y$10$FZVWJ0RpIpsE0xIxQIO6W.AjGXsh7UqlMyuxnZkIuAEE/F5EebFUW', '2021-03-01 00:03:52', '2021-03-01 00:03:52'),
	(7, 'Erik Boyer', 'Mikel.Ortiz@hotmail.com', '$2y$10$FZVWJ0RpIpsE0xIxQIO6W.AjGXsh7UqlMyuxnZkIuAEE/F5EebFUW', '2021-03-01 00:03:52', '2021-03-01 00:03:52'),
	(8, 'Timothy Lemke', 'Domenico_Wisozk@hotmail.com', '$2y$10$FZVWJ0RpIpsE0xIxQIO6W.AjGXsh7UqlMyuxnZkIuAEE/F5EebFUW', '2021-03-01 00:05:20', '2021-03-01 00:05:20'),
	(9, 'Christine Kilback MD', 'Jordi36@yahoo.com', '$2y$10$FZVWJ0RpIpsE0xIxQIO6W.AjGXsh7UqlMyuxnZkIuAEE/F5EebFUW', '2021-03-01 00:06:01', '2021-03-01 00:06:01'),
	(10, 'Nadine Rempel V', 'Laurianne.Shields@yahoo.com', '$2y$10$FZVWJ0RpIpsE0xIxQIO6W.AjGXsh7UqlMyuxnZkIuAEE/F5EebFUW', '2021-03-01 00:06:12', '2021-03-01 00:06:12'),
	(11, 'Carlos Haag', 'Carson10@yahoo.com', '$2y$10$FZVWJ0RpIpsE0xIxQIO6W.AjGXsh7UqlMyuxnZkIuAEE/F5EebFUW', '2021-03-01 00:06:48', '2021-03-01 00:06:48'),
	(12, 'Shari Daugherty', 'Tod73@gmail.com', '$2y$10$FZVWJ0RpIpsE0xIxQIO6W.AjGXsh7UqlMyuxnZkIuAEE/F5EebFUW', '2021-03-01 00:07:11', '2021-03-01 00:07:11'),
	(13, 'Damon Lebsack III', 'Amiya_Lesch@hotmail.com', '$2y$10$FZVWJ0RpIpsE0xIxQIO6W.AjGXsh7UqlMyuxnZkIuAEE/F5EebFUW', '2021-03-01 00:07:21', '2021-03-01 00:07:21'),
	(14, 'Myrtle Luettgen', 'Kailee_Robel@gmail.com', '$2y$10$FZVWJ0RpIpsE0xIxQIO6W.AjGXsh7UqlMyuxnZkIuAEE/F5EebFUW', '2021-03-01 00:07:45', '2021-03-01 00:07:45'),
	(15, 'Marion VonRueden', 'Candelario3@gmail.com', '$2y$10$FZVWJ0RpIpsE0xIxQIO6W.AjGXsh7UqlMyuxnZkIuAEE/F5EebFUW', '2021-03-01 00:08:56', '2021-03-01 00:08:56'),
	(16, 'Bernard Grimes', 'Cheyanne94@gmail.com', '$2y$10$FZVWJ0RpIpsE0xIxQIO6W.AjGXsh7UqlMyuxnZkIuAEE/F5EebFUW', '2021-03-01 00:09:17', '2021-03-01 00:09:17'),
	(17, 'Woodrow Runte', 'Henry39@yahoo.com', '$2y$10$FZVWJ0RpIpsE0xIxQIO6W.AjGXsh7UqlMyuxnZkIuAEE/F5EebFUW', '2021-03-01 00:09:17', '2021-03-01 00:09:17');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
