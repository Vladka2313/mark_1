-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.5.23 - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных crosswords
CREATE DATABASE IF NOT EXISTS `vorwahlsettingsettingsetting` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `vorwahl`;


-- Дамп структуры для таблица crosswords.setting
CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `value` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы crosswords.setting: 2 rows
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` (`id`, `name`, `value`) VALUES
	(1, 'question-tag', '[question] - crossword puzzles with [amount]'),
	(2, 'answer-tag', '[answer] - crossword puzzle Answer with [amount]');
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
