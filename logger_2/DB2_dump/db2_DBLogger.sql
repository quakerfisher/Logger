-- phpMyAdmin SQL Dump
-- version 2.6.1
-- http://www.phpmyadmin.net
-- 
-- ����: localhost
-- ����� ��������: ��� 11 2016 �., 14:54
-- ������ �������: 5.0.45
-- ������ PHP: 5.2.4
-- 
-- ��: `bd_DBLogger`
-- 

-- --------------------------------------------------------

-- 
-- ��������� ������� `db2_DBLogger`
-- 

DROP TABLE IF EXISTS `db2_DBLogger`;
CREATE TABLE IF NOT EXISTS `db2_DBLogger` (
  `id` int(11) NOT NULL auto_increment,
  `message` char(200) default NULL,
  `date` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=cp1251 AUTO_INCREMENT=5 ;

-- 
-- ���� ������ ������� `db2_DBLogger`
-- 

INSERT INTO `db2_DBLogger` (`id`, `message`, `date`) VALUES (1, 'TEMP Object\n(\n    [value1:protected] => 14\n    [value2:protected] => FFF!\n)\n', '2016-07-11 14:52:58'),
(2, 'TEMP Object\n(\n    [value1:protected] => 14\n    [value2:protected] => FFF!\n)\n', '2016-07-11 14:52:59'),
(3, 'TEMP Object\n(\n    [value1:protected] => 14\n    [value2:protected] => FFF!\n)\n', '2016-07-11 14:53:01'),
(4, 'TEMP Object\n(\n    [value1:protected] => 14\n    [value2:protected] => FFF!\n)\n', '2016-07-11 14:53:03');
