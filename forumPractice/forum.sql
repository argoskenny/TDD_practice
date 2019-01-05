-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- 主機: localhost:3306
-- 產生時間： 2019 年 01 月 05 日 10:45
-- 伺服器版本: 5.6.35
-- PHP 版本： 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- 資料庫： `forum`
--

-- --------------------------------------------------------

--
-- 資料表結構 `discuse`
--

CREATE TABLE `discuse` (
  `id` int(9) NOT NULL,
  `title` varchar(400) NOT NULL,
  `content` text NOT NULL,
  `updatetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `discuse`
--

INSERT INTO `discuse` (`id`, `title`, `content`, `updatetime`) VALUES
(1, '第一篇留言', '哈囉，世界', 1546527298),
(2, '', '', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `email` varchar(400) NOT NULL,
  `password` varchar(400) NOT NULL,
  `name` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `member`
--

INSERT INTO `member` (`id`, `email`, `password`, `name`) VALUES
(1, 'test@test.comn', 'test', 'test');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `discuse`
--
ALTER TABLE `discuse`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `discuse`
--
ALTER TABLE `discuse`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;