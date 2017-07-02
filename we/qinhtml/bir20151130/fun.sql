/*
Navicat MySQL Data Transfer

Source Server         : 腾讯云
Source Server Version : 50524
Source Host           : 203.195.179.183:12613
Source Database       : fun

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2016-01-20 19:11:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for friend_info
-- ----------------------------
DROP TABLE IF EXISTS `friend_info`;
CREATE TABLE `friend_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `v1` varchar(255) DEFAULT NULL,
  `v2` varchar(255) DEFAULT NULL,
  `v3` varchar(255) DEFAULT NULL,
  `v4` varchar(255) DEFAULT NULL,
  `v5` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of friend_info
-- ----------------------------
INSERT INTO `friend_info` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'dasdasda', null, null, '德玛西亚', null, null, null, null, null);
INSERT INTO `friend_info` VALUES ('2', 'admin1', 'e10adc3949ba59abbe56e057f20f883e', 'hello@qq.com', null, null, '德玛西亚1', null, null, null, null, null);
INSERT INTO `friend_info` VALUES ('4', 'admin2', '202cb962ac59075b964b07152d234b70', 'qw@ww', null, null, '德玛西亚2', null, null, null, null, null);
INSERT INTO `friend_info` VALUES ('5', 'admin3', 'e10adc3949ba59abbe56e057f20f883e', 'q@qq', null, null, '德玛西亚3', null, null, null, null, null);
INSERT INTO `friend_info` VALUES ('7', 'lvqinyan', 'b206e95a4384298962649e58dc7b39d4', '520@520', null, null, 'LQY520FY', null, null, null, null, null);
INSERT INTO `friend_info` VALUES ('8', 'fangyue', 'b206e95a4384298962649e58dc7b39d4', '521@521', null, null, 'FY520LQY', null, null, null, null, null);

-- ----------------------------
-- Table structure for fun
-- ----------------------------
DROP TABLE IF EXISTS `fun`;
CREATE TABLE `fun` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` mediumtext,
  `time` datetime DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `v2` varchar(255) DEFAULT NULL,
  `v3` varchar(255) DEFAULT NULL,
  `v4` varchar(255) DEFAULT NULL,
  `v5` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fun
-- ----------------------------
INSERT INTO `fun` VALUES ('4', '旅行', '我是一个爱旅游的人，每年有将近四分之一的时间都在路上。走遍世界周游列国，对我而言并不止于是个梦想而已。我觉得，中国很大，可世界更大。就像你在这个地图上看到的，我 18 岁前就在大半个中国留下了足迹。这个国家就像一台回旋加速器，我环游加速之后就会奔向世界，那时候的我将成为一个新的自己，一种新的元素。', null, 'http://7xnad5.com1.z0.glb.clouddn.com/cat01.jpg', null, null, null, null);
INSERT INTO `fun` VALUES ('5', '哈哈', '啦啦啦阿拉啦啦啦阿拉啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦', null, 'http://7xnad5.com1.z0.glb.clouddn.com/9d82d158ccbf6c81b93c76e9be3eb13533fa40a3.jpg', null, null, null, null);
INSERT INTO `fun` VALUES ('6', '那个，大姐我不是那个意思', '坐公交，上来一位带着婴儿的年轻妈妈，想发扬一下雷锋精神，\r\n可不知道怎么称呼，喊「阿姨」吧，人家挺年轻呢，喊「姐姐」吧，好像也不行。\r\n情急之下，我说：「孩子他妈，来这儿坐吧。」', null, 'http://7xnad5.com1.z0.glb.clouddn.com/9d82d158ccbf6c81b93c76e9be3eb13533fa40a3.jpg', null, null, null, null);

-- ----------------------------
-- Table structure for message
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `formID` int(11) DEFAULT NULL,
  `toID` int(11) DEFAULT NULL,
  `content` longtext,
  `datetime` varchar(100) DEFAULT NULL,
  `otherWatchID` int(11) DEFAULT NULL,
  `formNickName` varchar(255) DEFAULT NULL,
  `toNickName` varchar(255) DEFAULT NULL,
  `v3` varchar(255) DEFAULT NULL,
  `v4` varchar(255) DEFAULT NULL,
  `v5` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of message
-- ----------------------------
INSERT INTO `message` VALUES ('53', '8', '7', '傻瓜，想你了', '1446083243', null, 'FY520LQY', 'LQY520FY', null, null, null);
INSERT INTO `message` VALUES ('54', '8', '7', '今天你没看这个呀？', '1446094195', null, 'FY520LQY', 'LQY520FY', null, null, null);
INSERT INTO `message` VALUES ('55', '8', '7', '都不回我啊？没上这个网站吗？', '1446180036', null, 'FY520LQY', 'LQY520FY', null, null, null);
INSERT INTO `message` VALUES ('56', '8', '7', '呜呜，都不回我啊', '1446391338', null, 'FY520LQY', 'LQY520FY', null, null, null);
INSERT INTO `message` VALUES ('57', '7', '7', '你给我的网名居然是德玛西亚？', '1446452968', null, 'LQY520FY', 'LQY520FY', null, null, null);
INSERT INTO `message` VALUES ('58', '7', '8', '傻逼', '1446452997', null, 'LQY520FY', 'FY520LQY', null, null, null);
INSERT INTO `message` VALUES ('59', '8', '7', '你才傻呢', '1446453196', null, 'FY520LQY', 'LQY520FY', null, null, null);
INSERT INTO `message` VALUES ('60', '7', '8', '傻逼傻逼', '1446454254', null, 'LQY520FY', 'FY520LQY', null, null, null);
INSERT INTO `message` VALUES ('61', '8', '7', '哼，竟说我是傻逼', '1446484039', null, 'FY520LQY', 'LQY520FY', null, null, null);
INSERT INTO `message` VALUES ('62', '8', '7', '不要想太多哦', '1446646447', null, 'FY520LQY', 'LQY520FY', null, null, null);
INSERT INTO `message` VALUES ('64', '8', '7', '都不看这个留言板啊', '1446720652', null, 'FY520LQY', 'LQY520FY', null, null, null);

-- ----------------------------
-- Table structure for session
-- ----------------------------
DROP TABLE IF EXISTS `session`;
CREATE TABLE `session` (
  `sid` char(32) NOT NULL DEFAULT '',
  `utime` int(11) NOT NULL DEFAULT '0',
  `sdata` text,
  `uip` char(15) NOT NULL DEFAULT '',
  `uagent` varchar(200) NOT NULL DEFAULT '',
  KEY `session_sid` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of session
-- ----------------------------
