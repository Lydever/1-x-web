-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2019-11-07 15:24:00
-- 服务器版本： 10.1.37-MariaDB
-- PHP 版本： 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `ee`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin2`
--

CREATE TABLE `admin2` (
  `id` int(4) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin2`
--

INSERT INTO `admin2` (`id`, `username`, `password`, `time`) VALUES
(1, 'admin', 'admin888', '2019-11-02 14:58:02'),
(2, 'web', 'web888', '2019-11-02 14:59:18');

-- --------------------------------------------------------

--
-- 表的结构 `product`
--

CREATE TABLE `product` (
  `id` int(4) NOT NULL,
  `title` varchar(20) NOT NULL,
  `typeNum` int(4) NOT NULL,
  `pric` int(5) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `thumb` varchar(4) NOT NULL,
  `bigImg` char(2) NOT NULL,
  `body` text,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `product`
--

INSERT INTO `product` (`id`, `title`, `typeNum`, `pric`, `description`, `thumb`, `bigImg`, `body`, `time`) VALUES
(1, '回归|90蛋糕', 1, 255, '收起散落在路上的珍贵点滴，每个年代都有属于自己的童年记忆，\r\n70的淡定、80的率性、90的不羁??\r\n思绪总是在不曾提起的故事里静静流淌，掠过往事，找寻简单的快乐。', 'http', 'ht', '详情', '2019-11-02 15:55:19'),
(2, '桃芝|樱桃芝士蛋糕', 3, 366, '有种美好本在人生际遇之处，\r\n那些初次的余香，俨如口中混合着的丝缕酸甜，\r\n就像樱桃和百利甜一样，成了没人遗忘的天生一对。', 'http', 'ht', '详情', '2019-11-02 16:00:22'),
(14, '向往|酸樱桃椰蓉蛋糕', 1, 225, NULL, '', '', NULL, '2019-11-07 22:16:23'),
(15, '简单|蜂蜜蛋糕', 1, 366, NULL, '', '', NULL, '2019-11-07 22:16:45'),
(16, '思念|缤纷乐园蛋糕', 1, 168, NULL, '', '', NULL, '2019-11-07 22:17:06');

-- --------------------------------------------------------

--
-- 替换视图以便查看 `productinfo`
-- （参见下面的实际视图）
--
CREATE TABLE `productinfo` (
`id` int(4)
,`title` varchar(20)
,`thumb` varchar(4)
,`pric` int(5)
,`typename` varchar(20)
);

-- --------------------------------------------------------

--
-- 表的结构 `producttype`
--

CREATE TABLE `producttype` (
  `id` int(4) NOT NULL,
  `typename` varchar(20) NOT NULL,
  `num` int(4) DEFAULT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `producttype`
--

INSERT INTO `producttype` (`id`, `typename`, `num`, `time`) VALUES
(1, '蛋糕', 0, '2019-11-02 15:17:14'),
(2, '下午茶', 0, '2019-11-02 15:17:14'),
(3, '巧克力', 1, '2019-11-02 15:17:14'),
(4, '儿童', 2, '2019-11-02 15:17:14'),
(5, '生日', 0, '2019-11-02 15:18:31'),
(6, '聚会', 0, '2019-11-02 15:18:31'),
(7, '草莓', 1, '2019-11-02 15:18:31'),
(8, '老人', 2, '2019-11-02 15:18:31');

-- --------------------------------------------------------

--
-- 表的结构 `vip`
--

CREATE TABLE `vip` (
  `id` int(4) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 视图结构 `productinfo`
--
DROP TABLE IF EXISTS `productinfo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `productinfo`  AS  select `p`.`id` AS `id`,`p`.`title` AS `title`,`p`.`thumb` AS `thumb`,`p`.`pric` AS `pric`,`t`.`typename` AS `typename` from (`product` `p` join `producttype` `t`) where (`p`.`typeNum` = `t`.`id`) ;

--
-- 转储表的索引
--

--
-- 表的索引 `admin2`
--
ALTER TABLE `admin2`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `vip`
--
ALTER TABLE `vip`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin2`
--
ALTER TABLE `admin2`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `product`
--
ALTER TABLE `product`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 使用表AUTO_INCREMENT `producttype`
--
ALTER TABLE `producttype`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用表AUTO_INCREMENT `vip`
--
ALTER TABLE `vip`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
