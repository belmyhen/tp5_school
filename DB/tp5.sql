-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生日期: 2020 年 09 月 25 日 10:25
-- 伺服器版本: 5.6.12-log
-- PHP 版本: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `tp5`
--
CREATE DATABASE IF NOT EXISTS `tp5` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `tp5`;

-- --------------------------------------------------------

--
-- 表的結構 `yunzhi_course`
--

CREATE TABLE IF NOT EXISTS `yunzhi_course` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL DEFAULT '',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 轉存資料表中的資料 `yunzhi_course`
--

INSERT INTO `yunzhi_course` (`id`, `name`, `create_time`, `update_time`) VALUES
(1, 'thinkphp5入门实例', 0, 1600941859),
(2, 'angularjs入门实例', 0, 0),
(8, 'admin', 1600941998, 1600941998);

-- --------------------------------------------------------

--
-- 表的結構 `yunzhi_klass`
--

CREATE TABLE IF NOT EXISTS `yunzhi_klass` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL DEFAULT '' COMMENT '名称',
  `teacher_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '教师ID',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- 轉存資料表中的資料 `yunzhi_klass`
--

INSERT INTO `yunzhi_klass` (`id`, `name`, `teacher_id`, `create_time`, `update_time`) VALUES
(1, '实验1班', 1, 0, 1466493790),
(2, '实验2班', 2, 0, 0),
(3, '实验3班', 1, 0, 0),
(4, '实验4班', 2, 0, 0),
(27, 'admin', 1, 1601027027, 1601027027);

-- --------------------------------------------------------

--
-- 表的結構 `yunzhi_klass_course`
--

CREATE TABLE IF NOT EXISTS `yunzhi_klass_course` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `klass_id` int(11) unsigned NOT NULL,
  `course_id` int(11) unsigned NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- 轉存資料表中的資料 `yunzhi_klass_course`
--

INSERT INTO `yunzhi_klass_course` (`id`, `klass_id`, `course_id`, `create_time`, `update_time`) VALUES
(2, 1, 2, 0, 0),
(4, 2, 2, 0, 0),
(6, 4, 2, 0, 0),
(8, 6, 2, 0, 0),
(9, 1, 3, 0, 0),
(10, 2, 3, 0, 0),
(13, 1, 7, 2020, 1600935915),
(14, 2, 7, 2020, 1600935915),
(15, 3, 7, 2020, 1600935915),
(16, 4, 7, 2020, 1600935915),
(35, 1, 8, 0, 0),
(34, 2, 4, 0, 0),
(33, 1, 4, 0, 0),
(32, 3, 1, 0, 0),
(31, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- 表的結構 `yunzhi_student`
--

CREATE TABLE IF NOT EXISTS `yunzhi_student` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL DEFAULT '' COMMENT '姓名',
  `num` varchar(40) NOT NULL DEFAULT '',
  `sex` tinyint(2) NOT NULL DEFAULT '0',
  `klass_id` int(11) NOT NULL DEFAULT '0',
  `email` varchar(40) NOT NULL DEFAULT '',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 轉存資料表中的資料 `yunzhi_student`
--

INSERT INTO `yunzhi_student` (`id`, `name`, `num`, `sex`, `klass_id`, `email`, `create_time`, `update_time`) VALUES
(1, '徐琳杰', '111', 0, 1, 'xulinjie@yunzhiclub.com', 0, 1600916409),
(2, '魏静云', '112', 1, 2, 'weijingyun@yunzhiclub.com', 0, 0),
(3, '刘茜', '113', 0, 2, 'liuxi@yunzhiclub.com', 0, 0),
(4, '李甜', '114', 1, 1, 'litian@yunzhiclub.com', 0, 0),
(5, '李翠彬', '115', 1, 3, 'licuibin@yunzhiclub.com', 0, 1600916162),
(6, '孔瑞平', '116', 0, 4, 'kongruiping@yunzhiclub.com', 0, 1600916179);

-- --------------------------------------------------------

--
-- 表的結構 `yunzhi_teacher`
--

CREATE TABLE IF NOT EXISTS `yunzhi_teacher` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT '' COMMENT '姓名',
  `sex` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0男，1女',
  `username` varchar(16) NOT NULL COMMENT '用户名',
  `email` varchar(30) DEFAULT '' COMMENT '邮箱',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 轉存資料表中的資料 `yunzhi_teacher`
--

INSERT INTO `yunzhi_teacher` (`id`, `name`, `sex`, `username`, `email`, `create_time`, `update_time`, `password`) VALUES
(1, '张三', 0, 'zhangsan', 'zhangsan@mail.com', 123123, 123213, 'adcd7048512e64b48da55b027577886ee5a36350'),
(2, '李四', 0, 'lisi', 'lisi@yunzhi.club', 123213, 1232, 'adcd7048512e64b48da55b027577886ee5a36350'),
(5, 'test1', 0, 'test1', 'test@test.com', 1600318359, 1600318359, 'adcd7048512e64b48da55b027577886ee5a36350'),
(6, 'test2', 0, 'test2', 'test@test.com', 1600318555, 1600318555, 'adcd7048512e64b48da55b027577886ee5a36350'),
(7, 'test1', 0, 'test', 'test@test.com', 1600333722, 1600333722, 'adcd7048512e64b48da55b027577886ee5a36350');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
