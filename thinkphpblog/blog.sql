-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-02-25 07:58:54
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- 表的结构 `tp_admin`
--

CREATE TABLE `tp_admin` (
  `id` mediumint(9) NOT NULL,
  `username` varchar(30) NOT NULL COMMENT '管理员名称',
  `password` char(32) NOT NULL COMMENT '管理员密码'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_admin`
--

INSERT INTO `tp_admin` (`id`, `username`, `password`) VALUES
(2, 'admin', 'e10adc3949ba59abbe56e057f20f883e'),
(27, 'admin123', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- 表的结构 `tp_article`
--

CREATE TABLE `tp_article` (
  `id` mediumint(9) NOT NULL COMMENT '文章id',
  `title` varchar(60) NOT NULL COMMENT '文章标题',
  `author` varchar(30) NOT NULL COMMENT '文章作者',
  `desc` varchar(255) NOT NULL COMMENT '文章简介',
  `keywords` varchar(255) NOT NULL COMMENT '文章关键词',
  `content` text NOT NULL COMMENT '文章内容',
  `pic` varchar(100) DEFAULT NULL COMMENT '缩略图',
  `click` int(10) NOT NULL DEFAULT '0' COMMENT '点击数',
  `state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:不推荐 1：推荐',
  `time` int(10) NOT NULL COMMENT '发布时间',
  `cateid` mediumint(9) NOT NULL COMMENT '所属栏目'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_article`
--

INSERT INTO `tp_article` (`id`, `title`, `author`, `desc`, `keywords`, `content`, `pic`, `click`, `state`, `time`, `cateid`) VALUES
(9, '睡觉', 'admin', '睡觉，一般是指人类睡眠，是人类不可缺少的一种生理现象', '睡觉,吃饭', '<p><span style="color: rgb(51, 51, 51); font-family: arial, 宋体, sans-serif; font-size: 14px; text-indent: 28px; background-color: rgb(255, 255, 255);">人的一生中，睡眠占了近1/3的时间，它的质量好坏与人体健康与否有密切关系，由此可见睡眠对每一个人是多么重要。从某种意义上说，睡眠的质量决定着生活的质量。可是一个人为什么要睡眠？这个问题一直是科学家想要彻底解决的问题</span><img src="/ueditor/php/upload/image/20180225/1519543647585748.jpg" title="1519543647585748.jpg" alt="1.jpg"/></p>', '/uploads/20180225\\932a9a5442ecbd0aae9e9b210c2c798a.jpg', 0, 1, 1519543733, 11),
(8, '吃饭', 'admin', '在中国及世界的大部分国家，吃是一种文化，民以食为天', '吃饭', '<p>亦作“吃饭”。泛指<a target="_blank" href="https://baike.baidu.com/item/%E7%94%9F%E6%B4%BB" style="color: rgb(19, 110, 194); text-decoration-line: none;">生活</a>或生存。</p><p>清<a target="_blank" href="https://baike.baidu.com/item/%E8%A2%81%E6%9E%9A" style="color: rgb(19, 110, 194); text-decoration-line: none;">袁枚</a>《随园诗话》卷二：“<a target="_blank" href="https://baike.baidu.com/item/%E8%8B%8F%E5%B7%9E" style="color: rgb(19, 110, 194); text-decoration-line: none;">苏州</a>薛皆三进士有句云：“人生只有修行好，天下无如喫饭难。”瞿秋白《饿乡纪程》三：“各人问题的背后，都有世界经济现象映着。” 在<a target="_blank" href="https://baike.baidu.com/item/%E6%AF%9B%E6%B3%BD%E4%B8%9C" style="color: rgb(19, 110, 194); text-decoration-line: none;">毛泽东</a>《<a target="_blank" href="https://baike.baidu.com/item/%E5%8F%8D%E5%AF%B9%E5%85%9A%E5%85%AB%E8%82%A1" style="color: rgb(19, 110, 194); text-decoration-line: none;">反对党八股</a>》里面有这样一句：“共产党不靠吓人吃饭，而是靠<a target="_blank" href="https://baike.baidu.com/item/%E9%A9%AC%E5%85%8B%E6%80%9D%E5%88%97%E5%AE%81%E4%B8%BB%E4%B9%89" style="color: rgb(19, 110, 194); text-decoration-line: none;">马克思列宁主义</a>的真理吃饭，靠实事求是吃饭，靠<a target="_blank" href="https://baike.baidu.com/item/%E7%A7%91%E5%AD%A6/10406" data-lemmaid="10406" style="color: rgb(19, 110, 194); text-decoration-line: none;">科学</a>吃饭。”<span style="font-size: 10.5px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em; margin-left: 2px; color: rgb(51, 102, 204); cursor: default; padding: 0px 2px;">[1]</span><a style="color: rgb(19, 110, 194); position: relative; top: -50px; font-size: 0px; line-height: 0;" name="ref_[1]_8372690"></a>&nbsp;</p><p>吃饭并不只是吃<a target="_blank" href="https://baike.baidu.com/item/%E7%B1%B3%E9%A5%AD" style="color: rgb(19, 110, 194); text-decoration-line: none;">米饭</a>，吃<a target="_blank" href="https://baike.baidu.com/item/%E9%A6%92%E5%A4%B4" style="color: rgb(19, 110, 194); text-decoration-line: none;">馒头</a>、<a target="_blank" href="https://baike.baidu.com/item/%E9%9D%A2%E6%9D%A1" style="color: rgb(19, 110, 194); text-decoration-line: none;">面条</a>等等都能说是吃饭。还指生存。</p><p><img src="/ueditor/php/upload/image/20180225/1519543491787567.jpg" title="1519543491787567.jpg" alt="mmexport1519541566912.jpg"/></p>', '/uploads/20180225\\bc18fb73a9e8cce86f0c019c354f5797.jpg', 1, 1, 1519543493, 10),
(10, '111', '2222', 'sss', '112,11', '<p>sssss</p>', NULL, 0, 1, 1519543917, 2),
(11, 'PHP', 'admin123', 'PHP（外文名:PHP: Hypertext Preprocessor，中文名：“超文本预处理器”）是一种通用开源脚本语言', 'PHP', '<p><span style="color: rgb(204, 0, 0); font-family: arial; font-size: 13px; background-color: rgb(255, 255, 255);">PHP</span><span style="color: rgb(51, 51, 51); font-family: arial; font-size: 13px; background-color: rgb(255, 255, 255);">（外文名:</span><span style="color: rgb(204, 0, 0); font-family: arial; font-size: 13px; background-color: rgb(255, 255, 255);">PHP</span><span style="color: rgb(51, 51, 51); font-family: arial; font-size: 13px; background-color: rgb(255, 255, 255);">: Hypertext Preprocessor，中文名：“超文本预处理器”）是一种通用开源脚本语言</span></p>', '/uploads/20180225\\ab73e931b8b8281c2f07343c1a20ef36.jpg', 0, 0, 1519545456, 13);

-- --------------------------------------------------------

--
-- 表的结构 `tp_cate`
--

CREATE TABLE `tp_cate` (
  `id` mediumint(9) NOT NULL COMMENT '栏目id',
  `catename` varchar(30) NOT NULL COMMENT '栏目名称'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_cate`
--

INSERT INTO `tp_cate` (`id`, `catename`) VALUES
(2, '健身'),
(13, 'PHP'),
(12, '美食'),
(11, '睡觉'),
(10, '吃饭');

-- --------------------------------------------------------

--
-- 表的结构 `tp_links`
--

CREATE TABLE `tp_links` (
  `id` mediumint(9) NOT NULL COMMENT '链接id',
  `title` varchar(30) NOT NULL COMMENT '链接标题',
  `url` varchar(60) NOT NULL COMMENT '链接地址',
  `desc` varchar(255) NOT NULL COMMENT '链接说明'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_links`
--

INSERT INTO `tp_links` (`id`, `title`, `url`, `desc`) VALUES
(3, '搜狗', 'https://www.sogou.com/', '搜狗搜索'),
(4, '百度', 'https://www.baidu.com/', '百度一下，你就知道');

-- --------------------------------------------------------

--
-- 表的结构 `tp_tags`
--

CREATE TABLE `tp_tags` (
  `id` mediumint(9) NOT NULL COMMENT 'tag标签id',
  `tagname` varchar(30) NOT NULL COMMENT 'tag标签名称'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_tags`
--

INSERT INTO `tp_tags` (`id`, `tagname`) VALUES
(7, '睡觉'),
(6, 'lol'),
(5, '啊啊');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tp_admin`
--
ALTER TABLE `tp_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_article`
--
ALTER TABLE `tp_article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_cate`
--
ALTER TABLE `tp_cate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_links`
--
ALTER TABLE `tp_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_tags`
--
ALTER TABLE `tp_tags`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `tp_admin`
--
ALTER TABLE `tp_admin`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- 使用表AUTO_INCREMENT `tp_article`
--
ALTER TABLE `tp_article`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '文章id', AUTO_INCREMENT=12;
--
-- 使用表AUTO_INCREMENT `tp_cate`
--
ALTER TABLE `tp_cate`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '栏目id', AUTO_INCREMENT=14;
--
-- 使用表AUTO_INCREMENT `tp_links`
--
ALTER TABLE `tp_links`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '链接id', AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `tp_tags`
--
ALTER TABLE `tp_tags`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT 'tag标签id', AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
