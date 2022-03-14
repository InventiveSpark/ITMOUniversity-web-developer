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


-- Dumping database structure for POSTS
CREATE DATABASE IF NOT EXISTS `POSTS` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `POSTS`;

-- Dumping structure for table POSTS.authors
CREATE TABLE IF NOT EXISTS `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Таблица, содержащая информацию об авторах статей';

-- Dumping data for table POSTS.authors: ~1 rows (approximately)
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` (`id`, `fio`, `age`, `location`, `additional`) VALUES
	(1, 'Мурчалло Постоянни', 55, 'Рим, Италия', 'Журналист');
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;

-- Dumping structure for table POSTS.feedback
CREATE TABLE IF NOT EXISTS `feedback` (
  `id_feedback` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_feedback`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Таблица с данными, полученными через форму обратной связи';

-- Dumping data for table POSTS.feedback: ~0 rows (approximately)
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` (`id_feedback`, `user`, `comment`, `email`) VALUES
	(1, 'Сальвадор Вблизи', 'Восхитительно!\r\nВеликолепно!', 'Salvador@google.es');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;

-- Dumping structure for table POSTS.last_news
CREATE TABLE IF NOT EXISTS `last_news` (
  `id_news` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_author` int(11) DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `postcard` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_news`),
  KEY `FK_last_news_authors` (`id_author`),
  CONSTRAINT `FK_last_news_authors` FOREIGN KEY (`id_author`) REFERENCES `authors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Таблица с последними новостями сайта';

-- Dumping data for table POSTS.last_news: ~5 rows (approximately)
/*!40000 ALTER TABLE `last_news` DISABLE KEYS */;
INSERT INTO `last_news` (`id_news`, `title`, `id_author`, `content`, `postcard`) VALUES
	(1, 'В кафедральном соборе Святых Петра и Павла пройдет концерт авангардной органной музыки', 1, '6 февраля в кафедральном соборе Святых Петра и Павла в Москве пройдет концерт из цикла «Голоса Вселенной: орган XXI века. Классика органного авангарда», проекта фонда Collegium Musicum. Программа Игоря Гольденберга посвящена истокам органного авангарда — времени, когда появлялись масштабные современные органы, которые вдохновляли музыкантов на поиск новых тембровых возможностей.', 'images/organ.jpg'),
	(2, 'В Малом театре состоится премьера спектакля «Кроткая» по повести Федора Достоевского', 1, '9 февраля Государственный академический Малый театр представляет спектакль «Кроткая» по одноименной повести Федора Достоевского. Постановка станет первым опытом сотрудничества коллектива с Зимним международным фестивалем искусств в Москве под руководством Юрия Башмета.', 'images/theater.jpg'),
	(3, 'В Москве, Уфе и Казани пройдет проект «Нуреевские сезоны»', 1, '10 по 27 марта в Москве, Уфе и Казани пройдет Международный культурный проект «Нуреевские сезоны». Проект посвящен известному отечественному артисту балета и хореографу Рудольфу Нурееву, его жизни и творчеству, а также его деятельности по популяризации русского балета за рубежом.', 'images/Rudolf.jpg'),
	(4, '11 марта в России открывается фестиваль «Триумф джаза»', 1, '11 марта Игорь Бутман откроет XXII Международный фестиваль «Триумф джаза». В 2022 году концерты и другие мероприятия будут посвящены 100-летию российского джаза. Фестиваль впервые пройдет в шести городах: в Москве, Санкт-Петербурге, Туле, Твери, Ярославле и Красноярске.', 'images/Igor_Butman.jpg'),
	(5, 'Моника Беллуччи представит моноспектакль о Марии Каллас в Москве и Петербурге', 1, 'В мае в Москве и Санкт-Петербурге состоятся первые в России показы международного проекта «Мария Каллас. Воспоминания в письмах». Моноспектакль Моники Беллуччи от режиссера Тома Вольфа пройдет 27 мая в Александринском театре и 31 мая в Театре им. Е.Б. Вахтангова. Постановку покажут на английском языке с русскими субтитрами.', 'images/Monica_Bellucci.jpg');
/*!40000 ALTER TABLE `last_news` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
