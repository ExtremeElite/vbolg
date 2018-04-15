/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : vblog

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-02-14 15:35:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(10) NOT NULL DEFAULT '' COMMENT '登陆名',
  `nick_name` varchar(20) NOT NULL DEFAULT '' COMMENT '昵称',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '管理员状态0:不允许登陆;1：允许登陆',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  `last_time` int(11) NOT NULL DEFAULT '0' COMMENT '最后一次登陆时间',
  `ip` varchar(15) NOT NULL DEFAULT '' COMMENT '最后一次登陆地址',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uname` (`uname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------

-- ----------------------------
-- Table structure for `article`
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` char(10) NOT NULL DEFAULT '' COMMENT '随机字符串',
  `cid` int(2) NOT NULL DEFAULT '0' COMMENT '文章分类',
  `admin_id` int(11) NOT NULL DEFAULT '0' COMMENT '作者id',
  `keywords` varchar(32) NOT NULL DEFAULT '',
  `header_img` varchar(255) NOT NULL DEFAULT '' COMMENT '封面图英文,分割',
  `description` varchar(255) NOT NULL DEFAULT '',
  `title` varchar(32) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `faker_views` int(11) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '文章状态0:未发布;1：已发布',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article
-- ----------------------------

-- ----------------------------
-- Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `uid` varchar(20) NOT NULL DEFAULT '' COMMENT '文章英文名',
  `pid` int(2) NOT NULL DEFAULT '0',
  `keywords` varchar(32) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `header_img` varchar(255) NOT NULL DEFAULT '' COMMENT '封面图英文,',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------

-- ----------------------------
-- Table structure for `comments`
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) NOT NULL DEFAULT '0' COMMENT '文章id',
  `author_id` int(11) NOT NULL DEFAULT '0' COMMENT '评论者id',
  `postion` int(2) NOT NULL DEFAULT '0' COMMENT '评论位置：评论状态为已发布的情况下才有效0：普通位置发布时间先后；1:评论置顶',
  `content` varchar(128) NOT NULL DEFAULT '' COMMENT '评论内容',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '评论状态0:未发布;1：已发布',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `aid` (`aid`),
  KEY `author_id` (`author_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comments
-- ----------------------------

-- ----------------------------
-- Table structure for `postion`
-- ----------------------------
DROP TABLE IF EXISTS `postion`;
CREATE TABLE `postion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) NOT NULL DEFAULT '0' COMMENT '文章id',
  `postion` int(2) NOT NULL DEFAULT '0' COMMENT '文章状态为已发布的情况下才有效0：普通位置发布时间先后；1:文章首页置顶；-1：文章频道置顶；2:文章首页轮播',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `aid` (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of postion
-- ----------------------------

-- ----------------------------
-- Table structure for `tags`
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(20) NOT NULL DEFAULT '' COMMENT '随机字符串唯一',
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '标签中文名',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '评论状态0:未发布;1：已发布',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tags
-- ----------------------------

-- ----------------------------
-- Table structure for `tags_link`
-- ----------------------------
DROP TABLE IF EXISTS `tags_link`;
CREATE TABLE `tags_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `t_uid` varchar(20) NOT NULL DEFAULT '' COMMENT '标签英文别名',
  `aid` int(11) NOT NULL DEFAULT '0' COMMENT '文章id',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `t_uid` (`t_uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tags_link
-- ----------------------------
