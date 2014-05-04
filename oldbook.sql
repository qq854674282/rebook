/*
MySQL Data Transfer
Source Host: localhost
Source Database: oldbook
Target Host: localhost
Target Database: oldbook
Date: 2014/4/29 21:41:41
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for academy
-- ----------------------------
DROP TABLE IF EXISTS `academy`;
CREATE TABLE `academy` (
  `academy_id` int(11) NOT NULL auto_increment,
  `academy_name` varchar(255) default '',
  PRIMARY KEY  (`academy_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for activity
-- ----------------------------
DROP TABLE IF EXISTS `activity`;
CREATE TABLE `activity` (
  `activity_id` int(11) NOT NULL auto_increment,
  `activity_url` varchar(255) default NULL,
  `activity_image` varchar(255) default NULL,
  `order` int(11) default '99',
  `add_time` int(11) default '0',
  PRIMARY KEY  (`activity_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for big_picture
-- ----------------------------
DROP TABLE IF EXISTS `big_picture`;
CREATE TABLE `big_picture` (
  `image_id` int(11) NOT NULL auto_increment,
  `image_url` varchar(255) default NULL,
  `image_title` varchar(255) default '',
  `image_desc` varchar(255) default '',
  `image_order` int(11) default '10',
  PRIMARY KEY  (`image_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for book
-- ----------------------------
DROP TABLE IF EXISTS `book`;
CREATE TABLE `book` (
  `book_id` int(11) NOT NULL auto_increment,
  `book_name` varchar(255) default '',
  `book_image` varchar(255) default NULL,
  `user_id` int(11) default '0',
  `book_desc` text,
  `book_price` float(11,2) default NULL,
  `author` varchar(255) default '',
  `version` varchar(255) default NULL,
  `publisher` varchar(255) default '',
  `zone` int(11) default '0',
  `send_type` int(11) default '0',
  `academy_id` int(11) default '0',
  `major_id` int(11) default '0',
  `grade` int(11) default '0',
  `class_id` int(11) default '0',
  `sale` int(11) default '0',
  `recommend` int(11) default '0',
  `add_time` int(11) default '0',
  PRIMARY KEY  (`book_id`),
  KEY `user_id` (`user_id`),
  KEY `book_name` (`book_name`),
  KEY `class_id` (`class_id`),
  KEY `add_time` (`add_time`),
  KEY `academy_id` (`academy_id`),
  KEY `major_id` (`major_id`),
  KEY `grade` (`grade`),
  KEY `recommend` (`recommend`),
  KEY `sale` (`sale`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for class
-- ----------------------------
DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `class_id` int(11) NOT NULL auto_increment,
  `class_name` varchar(255) default NULL,
  PRIMARY KEY  (`class_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for column
-- ----------------------------
DROP TABLE IF EXISTS `column`;
CREATE TABLE `column` (
  `column_id` int(11) NOT NULL auto_increment,
  `column_name` varchar(255) default NULL,
  PRIMARY KEY  (`column_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gallery
-- ----------------------------
DROP TABLE IF EXISTS `gallery`;
CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL auto_increment,
  `image_url` varchar(255) default '',
  `image_desc` varchar(255) default '',
  PRIMARY KEY  (`gallery_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for major
-- ----------------------------
DROP TABLE IF EXISTS `major`;
CREATE TABLE `major` (
  `major_id` int(11) NOT NULL auto_increment,
  `major_name` varchar(255) default '',
  `academy_id` int(11) default '0',
  PRIMARY KEY  (`major_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `order_id` int(11) NOT NULL auto_increment,
  `buyer_id` int(11) default NULL,
  `seller_id` int(11) default NULL,
  `book_id` int(11) default '0',
  `num` int(11) default '0',
  `status` int(11) default '0',
  `time` int(11) default '0',
  PRIMARY KEY  (`order_id`),
  KEY `buyer_id` (`buyer_id`),
  KEY `seller_id` (`seller_id`),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL auto_increment,
  `user_name` varchar(255) default '',
  `email` varchar(255) default '',
  `phone` varchar(255) default '',
  `address` varchar(255) default '',
  `password` varchar(255) default '',
  `sell_num` int(11) default '0' COMMENT '售出数量',
  `buy_num` int(11) default '0' COMMENT '购买数量',
  `register_time` int(11) default '0',
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `academy` VALUES ('1', '理学院/数学学院');
INSERT INTO `academy` VALUES ('2', '电信学院/软件学院');
INSERT INTO `academy` VALUES ('3', '经金学院/管理学院');
INSERT INTO `academy` VALUES ('4', '外国语学院');
INSERT INTO `academy` VALUES ('5', '机械学院');
INSERT INTO `academy` VALUES ('6', '电气学院');
INSERT INTO `academy` VALUES ('7', '能动学院');
INSERT INTO `academy` VALUES ('8', '人文学院');
INSERT INTO `academy` VALUES ('9', '材料学院');
INSERT INTO `academy` VALUES ('10', '人居学院');
INSERT INTO `academy` VALUES ('11', '生命学院');
INSERT INTO `academy` VALUES ('12', '航天学院');
INSERT INTO `academy` VALUES ('13', '化工学院');
INSERT INTO `academy` VALUES ('14', '医学院');
INSERT INTO `academy` VALUES ('15', '法学院');
INSERT INTO `big_picture` VALUES ('1', 'images/big_pictures/big1.jpg', 'First Thumbnail label', 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', '1');
INSERT INTO `big_picture` VALUES ('2', 'images/big_pictures/big2.jpg', 'Second Thumbnail label', 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', '2');
INSERT INTO `big_picture` VALUES ('3', 'images/big_pictures/big3.jpg', 'Third Thumbnail label', 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', '3');
INSERT INTO `book` VALUES ('4', '图书1', 'images/book_images/book1.jpg', '1', '图书描述', '11.00', '作者', '版本1', '出版社', '1', '2', '6', '15', '0', '0', '1', '1', '1397527841');
INSERT INTO `book` VALUES ('5', '图书2', 'images/book_images/book2.jpg', '1', '描述', '12.00', '作者', '版本1', '出版社', '2', '1', '6', '15', '0', '0', '1', '1', '1398528050');
INSERT INTO `book` VALUES ('6', '图书3', 'images/book_images/book3.jpg', '1', '描述', '13.00', '作者', '版本1', '出版社', '1', '2', '6', '15', '0', '0', '1', '1', '1398528255');
INSERT INTO `book` VALUES ('7', '图书4', 'images/book_images/book4.jpg', '1', '描述', '14.00', '作者', '版本1', '出版社', '2', '1', '6', '15', '0', '0', '1', '1', '1398528277');
INSERT INTO `book` VALUES ('8', '图书5', 'images/book_images/book5.jpg', '1', '描述', '15.00', '作者', '版本1', '出版社', '1', '2', '6', '15', '0', '0', '1', '1', '1398528786');
INSERT INTO `book` VALUES ('9', '新书1', 'images/book_images/1398587648.jpg', '1', '图书描述', '20.00', '作者', '版本1', '出版社', '2', '2', '2', '4', '0', '0', '1', '1', '1398587648');
INSERT INTO `book` VALUES ('10', '新书2', 'images/book_images/1398588077.jpg', '1', '描述', '9.00', '作者', '第一版', '出版社', '2', '1', '2', '6', '0', '0', '1', '1', '1398588077');
INSERT INTO `class` VALUES ('1', '数学');
INSERT INTO `class` VALUES ('2', '英语');
INSERT INTO `class` VALUES ('3', '政治');
INSERT INTO `class` VALUES ('4', '物理');
INSERT INTO `class` VALUES ('5', '化学');
INSERT INTO `class` VALUES ('6', '体育');
INSERT INTO `major` VALUES ('1', '应用物理', '1');
INSERT INTO `major` VALUES ('2', '应用数学', '1');
INSERT INTO `major` VALUES ('3', '电子科学与技术', '2');
INSERT INTO `major` VALUES ('4', '计算机科学与技术', '2');
INSERT INTO `major` VALUES ('5', '微电子', '2');
INSERT INTO `major` VALUES ('6', '自动化', '2');
INSERT INTO `major` VALUES ('7', '管理科学与工程', '3');
INSERT INTO `major` VALUES ('8', '金融学', '3');
INSERT INTO `major` VALUES ('9', '工商管理', '3');
INSERT INTO `major` VALUES ('10', '法语', '4');
INSERT INTO `major` VALUES ('11', '德语', '4');
INSERT INTO `major` VALUES ('12', '机械工程及自动化', '5');
INSERT INTO `major` VALUES ('13', '车辆工程', '5');
INSERT INTO `major` VALUES ('14', '电气工程及自动化', '6');
INSERT INTO `major` VALUES ('15', '电测控', '6');
INSERT INTO `major` VALUES ('16', '核工程', '7');
INSERT INTO `major` VALUES ('17', '装备', '7');
INSERT INTO `major` VALUES ('18', '汉语言文学', '8');
INSERT INTO `major` VALUES ('19', '材料科学与工程', '9');
INSERT INTO `major` VALUES ('20', '建筑学', '10');
INSERT INTO `major` VALUES ('21', '医电', '11');
INSERT INTO `major` VALUES ('22', '生基', '11');
INSERT INTO `major` VALUES ('23', '飞行器设计', '12');
INSERT INTO `major` VALUES ('24', '飞行器动力', '12');
INSERT INTO `major` VALUES ('25', '化工', '13');
INSERT INTO `major` VALUES ('26', '临床医学', '14');
INSERT INTO `major` VALUES ('27', '口腔', '14');
INSERT INTO `major` VALUES ('28', '法学', '15');
INSERT INTO `major` VALUES ('29', '新闻传媒', '8');
INSERT INTO `user` VALUES ('1', '会飞的鱼', '970418975@qq.com', '15129664060', '陕西西安', '', '5', '0', '0');
