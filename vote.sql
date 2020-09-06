-- --------------------------------------------------------
-- Хост:                         server
-- Версия сервера:               5.5.48 - MySQL Community Server (GPL)
-- Операционная система:         Win32
-- HeidiSQL Версия:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных vote
CREATE DATABASE IF NOT EXISTS `vote` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `vote`;

-- Дамп структуры для таблица vote.izbir_config
CREATE TABLE IF NOT EXISTS `izbir_config` (
  `user` tinytext NOT NULL,
  `pass` tinytext NOT NULL,
  `w_lesson` tinytext NOT NULL,
  `w_question` tinytext NOT NULL,
  `s_lesson` tinytext NOT NULL,
  `s_question` tinytext NOT NULL,
  `start` smallint(6) unsigned NOT NULL,
  `result` smallint(6) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Дамп данных таблицы vote.izbir_config: 1 rows
/*!40000 ALTER TABLE `izbir_config` DISABLE KEYS */;
REPLACE INTO `izbir_config` (`user`, `pass`, `w_lesson`, `w_question`, `s_lesson`, `s_question`, `start`, `result`) VALUES
	('olen', '827d8608574fc54e36ab6b045033abc8', '88', '88', '28', '24', 0, 2);
/*!40000 ALTER TABLE `izbir_config` ENABLE KEYS */;

-- Дамп структуры для таблица vote.izbir_options
CREATE TABLE IF NOT EXISTS `izbir_options` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `field` text NOT NULL,
  `votes` smallint(6) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Дамп данных таблицы vote.izbir_options: 4 rows
/*!40000 ALTER TABLE `izbir_options` DISABLE KEYS */;
REPLACE INTO `izbir_options` (`id`, `field`, `votes`) VALUES
	(1, 'содействовать прохождению в высший орган законодательной власти профессиональных и порядочных людей', 0),
	(2, 'повлиять на решение волнующей меня проблемы', 0),
	(3, 'выполнить гражданский долг', 1),
	(4, 'другое', 0);
/*!40000 ALTER TABLE `izbir_options` ENABLE KEYS */;

-- Дамп структуры для таблица vote.izbir_poll
CREATE TABLE IF NOT EXISTS `izbir_poll` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `lesson` tinytext NOT NULL,
  `question` tinytext NOT NULL,
  `totalvotes` smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Дамп данных таблицы vote.izbir_poll: 1 rows
/*!40000 ALTER TABLE `izbir_poll` DISABLE KEYS */;
REPLACE INTO `izbir_poll` (`id`, `lesson`, `question`, `totalvotes`) VALUES
	(1, 'Азбука молодого избирателя', 'Если я приму участие в выборах, то буду считать наиболее важным для себя:', 1);
/*!40000 ALTER TABLE `izbir_poll` ENABLE KEYS */;

-- Дамп структуры для таблица vote.kremlin_config
CREATE TABLE IF NOT EXISTS `kremlin_config` (
  `user` tinytext NOT NULL,
  `pass` tinytext NOT NULL,
  `w_lesson` tinytext NOT NULL,
  `w_question` tinytext NOT NULL,
  `s_lesson` tinytext NOT NULL,
  `s_question` tinytext NOT NULL,
  `start` smallint(6) unsigned NOT NULL,
  `result` smallint(6) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Дамп данных таблицы vote.kremlin_config: 1 rows
/*!40000 ALTER TABLE `kremlin_config` DISABLE KEYS */;
REPLACE INTO `kremlin_config` (`user`, `pass`, `w_lesson`, `w_question`, `s_lesson`, `s_question`, `start`, `result`) VALUES
	('olen', '827d8608574fc54e36ab6b045033abc8', '88', '88', '28', '24', 0, 11);
/*!40000 ALTER TABLE `kremlin_config` ENABLE KEYS */;

-- Дамп структуры для таблица vote.kremlin_options
CREATE TABLE IF NOT EXISTS `kremlin_options` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `field` text NOT NULL,
  `votes` smallint(6) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы vote.kremlin_options: 6 rows
/*!40000 ALTER TABLE `kremlin_options` DISABLE KEYS */;
REPLACE INTO `kremlin_options` (`id`, `field`, `votes`) VALUES
	(1, 'Резиденция Президента Российской Федерации', 0),
	(2, 'Федеральное Правительство', 0),
	(3, 'Верховный Суд', 1),
	(4, 'Министерство обороны', 0),
	(5, 'Монетный двор', 0),
	(6, 'Все перечисленные ', 0);
/*!40000 ALTER TABLE `kremlin_options` ENABLE KEYS */;

-- Дамп структуры для таблица vote.kremlin_poll
CREATE TABLE IF NOT EXISTS `kremlin_poll` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `lesson` tinytext NOT NULL,
  `question` tinytext NOT NULL,
  `totalvotes` smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы vote.kremlin_poll: 1 rows
/*!40000 ALTER TABLE `kremlin_poll` DISABLE KEYS */;
REPLACE INTO `kremlin_poll` (`id`, `lesson`, `question`, `totalvotes`) VALUES
	(1, 'Мультимедийный урок «История Московского Кремля»', 'Какие государственные органы и учреждения, на ваш взгляд, должны располагаться в столице России', 1);
/*!40000 ALTER TABLE `kremlin_poll` ENABLE KEYS */;

-- Дамп структуры для таблица vote.pravda_config
CREATE TABLE IF NOT EXISTS `pravda_config` (
  `user` tinytext NOT NULL,
  `pass` tinytext NOT NULL,
  `w_lesson` tinytext NOT NULL,
  `w_question` tinytext NOT NULL,
  `s_lesson` tinytext NOT NULL,
  `s_question` tinytext NOT NULL,
  `start` smallint(6) unsigned NOT NULL,
  `result` smallint(6) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Дамп данных таблицы vote.pravda_config: 1 rows
/*!40000 ALTER TABLE `pravda_config` DISABLE KEYS */;
REPLACE INTO `pravda_config` (`user`, `pass`, `w_lesson`, `w_question`, `s_lesson`, `s_question`, `start`, `result`) VALUES
	('olen', '827d8608574fc54e36ab6b045033abc8', '88', '88', '28', '24', 0, 2);
/*!40000 ALTER TABLE `pravda_config` ENABLE KEYS */;

-- Дамп структуры для таблица vote.pravda_options
CREATE TABLE IF NOT EXISTS `pravda_options` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `field` text NOT NULL,
  `votes` smallint(6) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Дамп данных таблицы vote.pravda_options: 3 rows
/*!40000 ALTER TABLE `pravda_options` DISABLE KEYS */;
REPLACE INTO `pravda_options` (`id`, `field`, `votes`) VALUES
	(1, 'да', 0),
	(2, 'нет', 0),
	(3, 'затрудняюсь ответить', 1);
/*!40000 ALTER TABLE `pravda_options` ENABLE KEYS */;

-- Дамп структуры для таблица vote.pravda_poll
CREATE TABLE IF NOT EXISTS `pravda_poll` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `lesson` tinytext NOT NULL,
  `question` tinytext NOT NULL,
  `totalvotes` smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Дамп данных таблицы vote.pravda_poll: 1 rows
/*!40000 ALTER TABLE `pravda_poll` DISABLE KEYS */;
REPLACE INTO `pravda_poll` (`id`, `lesson`, `question`, `totalvotes`) VALUES
	(1, 'Русская Правда – закон Древней Руси', 'Как Вы считаете, есть ли связь между Русской Правдой и современными информационными технологиями?', 1);
/*!40000 ALTER TABLE `pravda_poll` ENABLE KEYS */;

-- Дамп структуры для таблица vote.rus_config
CREATE TABLE IF NOT EXISTS `rus_config` (
  `user` tinytext NOT NULL,
  `pass` tinytext NOT NULL,
  `w_lesson` tinytext NOT NULL,
  `w_question` tinytext NOT NULL,
  `s_lesson` tinytext NOT NULL,
  `s_question` tinytext NOT NULL,
  `start` smallint(6) unsigned NOT NULL,
  `result` smallint(6) unsigned NOT NULL COMMENT 'Счётчик (count)',
  `path_screenshot` tinytext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Дамп данных таблицы vote.rus_config: 1 rows
/*!40000 ALTER TABLE `rus_config` DISABLE KEYS */;
REPLACE INTO `rus_config` (`user`, `pass`, `w_lesson`, `w_question`, `s_lesson`, `s_question`, `start`, `result`, `path_screenshot`) VALUES
	('olen', '827d8608574fc54e36ab6b045033abc8', '88', '88', '28', '24', 0, 80, 'http://qwut.ru/vote/_rus');
/*!40000 ALTER TABLE `rus_config` ENABLE KEYS */;

-- Дамп структуры для таблица vote.rus_options
CREATE TABLE IF NOT EXISTS `rus_options` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `field` text NOT NULL,
  `votes` smallint(6) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы vote.rus_options: 3 rows
/*!40000 ALTER TABLE `rus_options` DISABLE KEYS */;
REPLACE INTO `rus_options` (`id`, `field`, `votes`) VALUES
	(1, 'Да!', 0),
	(2, 'Нет', 1),
	(3, 'Не знаю!', 2);
/*!40000 ALTER TABLE `rus_options` ENABLE KEYS */;

-- Дамп структуры для таблица vote.rus_poll
CREATE TABLE IF NOT EXISTS `rus_poll` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `lesson` tinytext NOT NULL,
  `question` tinytext NOT NULL,
  `totalvotes` smallint(6) unsigned NOT NULL DEFAULT '0',
  `testlink` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы vote.rus_poll: 1 rows
/*!40000 ALTER TABLE `rus_poll` DISABLE KEYS */;
REPLACE INTO `rus_poll` (`id`, `lesson`, `question`, `totalvotes`, `testlink`) VALUES
	(1, 'Образовательная экскурсия', 'Михаил Васильевич Ломоносов создал «Грамматику» на основе:', 3, 'http://olympiada.prlib.ru/Lite.aspx?test=russian');
/*!40000 ALTER TABLE `rus_poll` ENABLE KEYS */;

-- Дамп структуры для таблица vote.zapovedn_config
CREATE TABLE IF NOT EXISTS `zapovedn_config` (
  `user` tinytext NOT NULL,
  `pass` tinytext NOT NULL,
  `w_lesson` tinytext NOT NULL,
  `w_question` tinytext NOT NULL,
  `s_lesson` tinytext NOT NULL,
  `s_question` tinytext NOT NULL,
  `start` smallint(6) unsigned NOT NULL,
  `result` smallint(6) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Дамп данных таблицы vote.zapovedn_config: 1 rows
/*!40000 ALTER TABLE `zapovedn_config` DISABLE KEYS */;
REPLACE INTO `zapovedn_config` (`user`, `pass`, `w_lesson`, `w_question`, `s_lesson`, `s_question`, `start`, `result`) VALUES
	('olen', '827d8608574fc54e36ab6b045033abc8', '88', '88', '28', '24', 0, 2);
/*!40000 ALTER TABLE `zapovedn_config` ENABLE KEYS */;

-- Дамп структуры для таблица vote.zapovedn_options
CREATE TABLE IF NOT EXISTS `zapovedn_options` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `field` text NOT NULL,
  `votes` smallint(6) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Дамп данных таблицы vote.zapovedn_options: 3 rows
/*!40000 ALTER TABLE `zapovedn_options` DISABLE KEYS */;
REPLACE INTO `zapovedn_options` (`id`, `field`, `votes`) VALUES
	(1, 'да', 0),
	(2, 'нет', 0),
	(3, 'затрудняюсь ответить', 1);
/*!40000 ALTER TABLE `zapovedn_options` ENABLE KEYS */;

-- Дамп структуры для таблица vote.zapovedn_poll
CREATE TABLE IF NOT EXISTS `zapovedn_poll` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `lesson` tinytext NOT NULL,
  `question` tinytext NOT NULL,
  `totalvotes` smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Дамп данных таблицы vote.zapovedn_poll: 1 rows
/*!40000 ALTER TABLE `zapovedn_poll` DISABLE KEYS */;
REPLACE INTO `zapovedn_poll` (`id`, `lesson`, `question`, `totalvotes`) VALUES
	(1, 'Урок экологии', 'Посещали ли Вы государственные заповедники?', 1);
/*!40000 ALTER TABLE `zapovedn_poll` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
