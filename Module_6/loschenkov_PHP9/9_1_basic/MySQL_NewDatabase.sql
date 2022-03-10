-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.37-0ubuntu0.18.04.1 - (Ubuntu)
-- Server OS:                    Linux
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for NewDatabase
CREATE DATABASE IF NOT EXISTS `NewDatabase` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `NewDatabase`;

-- Dumping structure for table NewDatabase.Zakaz
CREATE TABLE IF NOT EXISTS `Zakaz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `fam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `tovar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `col` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Таблица с заказами клиентов';

-- Dumping data for table NewDatabase.Zakaz: ~4 rows (approximately)
/*!40000 ALTER TABLE `Zakaz` DISABLE KEYS */;
INSERT INTO `Zakaz` (`id`, `name`, `fam`, `email`, `tovar`, `col`) VALUES
	(1, 'Дядя', 'Фёдор', 'Theodore@prostokvashino.ru', 'Варенье малиновое', 3),
	(2, 'Кот', 'Матроскин', 'Matros@krusenstern.com', 'Корова Мурка', 1),
	(3, 'Игорь', 'Печкин', 'IgorPechkin@pochta.ru', 'Велосипед', 1),
	(4, 'Пёс', 'Шарик', 'Sharik@prostokvashino.ru', 'Фоторужьё', 1);
/*!40000 ALTER TABLE `Zakaz` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
