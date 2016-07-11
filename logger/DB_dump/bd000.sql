-- phpMyAdmin SQL Dump
-- version 2.6.1
-- http://www.phpmyadmin.net
-- 
-- Хост: localhost
-- Время создания: Июл 10 2016 г., 21:30
-- Версия сервера: 5.0.45
-- Версия PHP: 5.2.4
-- 
-- БД: `bd000`
-- 

-- --------------------------------------------------------

-- 
-- Структура таблицы `db0`
-- 

DROP TABLE IF EXISTS `db0`;
CREATE TABLE IF NOT EXISTS `db0` (
  `id` int(11) NOT NULL auto_increment,
  `message` char(200) default NULL,
  `date` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=cp1251 AUTO_INCREMENT=4 ;

-- 
-- Дамп данных таблицы `db0`
-- 

INSERT INTO `db0` (`id`, `message`, `date`) VALUES (1, 'TEMP Object\n(\n    [value1:protected] => 0\n    [value2:protected] => 00000!\n)\n\n', '2016-07-10 20:30:57'),
(2, 'TEMP Object\n(\n    [value1:protected] => 0\n    [value2:protected] => 00000!\n)\n\n', '2016-07-10 21:22:27'),
(3, 'TEMP Object\n(\n    [value1:protected] => 0\n    [value2:protected] => 00000!\n)\n\n', '2016-07-10 21:23:13');

-- --------------------------------------------------------

-- 
-- Структура таблицы `db5`
-- 

DROP TABLE IF EXISTS `db5`;
CREATE TABLE IF NOT EXISTS `db5` (
  `id` int(11) NOT NULL auto_increment,
  `message` char(200) default NULL,
  `date` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=cp1251 AUTO_INCREMENT=4 ;

-- 
-- Дамп данных таблицы `db5`
-- 

INSERT INTO `db5` (`id`, `message`, `date`) VALUES (1, 'TEMP Object\n(\n    [value1:protected] => 17\n    [value2:protected] => CCD!\n)\n\n', '2016-07-10 20:26:18'),
(2, 'TEMP Object\n(\n    [value1:protected] => 17\n    [value2:protected] => CCD!\n)\n\n', '2016-07-10 20:26:35'),
(3, 'TEMP Object\n(\n    [value1:protected] => 19\n    [value2:protected] => COOOD!\n)\n\n', '2016-07-10 20:28:34');

-- --------------------------------------------------------

-- 
-- Структура таблицы `db6`
-- 

DROP TABLE IF EXISTS `db6`;
CREATE TABLE IF NOT EXISTS `db6` (
  `id` int(11) NOT NULL auto_increment,
  `message` char(200) default NULL,
  `date` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=cp1251 AUTO_INCREMENT=3 ;

-- 
-- Дамп данных таблицы `db6`
-- 

INSERT INTO `db6` (`id`, `message`, `date`) VALUES (1, 'TEMP Object\n(\n    [value1:protected] => 19\n    [value2:protected] => C!!!D!\n)\n\n', '2016-07-10 20:29:24'),
(2, 'TEMP Object\n(\n    [value1:protected] => 19000\n    [value2:protected] => C!o!o!D!\n)\n\n', '2016-07-10 20:30:05');
