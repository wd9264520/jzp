/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : jzp

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-03-13 10:09:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for district
-- ----------------------------
DROP TABLE IF EXISTS `district`;
CREATE TABLE `district` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `pid` int(10) NOT NULL COMMENT '父ID',
  `name` varchar(50) NOT NULL COMMENT '名字',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='无限分类';

-- ----------------------------
-- Records of district
-- ----------------------------
INSERT INTO `district` VALUES ('3', '0', '1111');
INSERT INTO `district` VALUES ('4', '3', '111xxx');
INSERT INTO `district` VALUES ('5', '0', '2222');
INSERT INTO `district` VALUES ('6', '5', '222xxx');
INSERT INTO `district` VALUES ('8', '0', '3333');
INSERT INTO `district` VALUES ('9', '0', '4444');

-- ----------------------------
-- Table structure for law_photo
-- ----------------------------
DROP TABLE IF EXISTS `law_photo`;
CREATE TABLE `law_photo` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `photo` varchar(100) NOT NULL COMMENT '图片地址',
  `text_id` int(10) NOT NULL COMMENT '文本ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='法律图片';

-- ----------------------------
-- Records of law_photo
-- ----------------------------
INSERT INTO `law_photo` VALUES ('1', 'upload/image/aa6544ceb7018a6340b77aa06746b81.png', '2');
INSERT INTO `law_photo` VALUES ('11', 'upload/image/639044aa6544ceb7018a6340b77aa06746b81.png', '3');
INSERT INTO `law_photo` VALUES ('12', 'upload/image/124691aa6544ceb7018a6340b77aa06746b81.png', '4');
INSERT INTO `law_photo` VALUES ('13', 'upload/image/153860aa6544ceb7018a6340b77aa06746b81.png', '4');

-- ----------------------------
-- Table structure for law_text
-- ----------------------------
DROP TABLE IF EXISTS `law_text`;
CREATE TABLE `law_text` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `title` varchar(50) NOT NULL COMMENT '题目',
  `answer` text NOT NULL COMMENT '答案',
  `advise` text NOT NULL COMMENT '建议',
  `district_id` int(10) NOT NULL COMMENT '分类ID',
  `law_word` varchar(50) NOT NULL COMMENT '法律文书',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='法律文本';

-- ----------------------------
-- Records of law_text
-- ----------------------------
INSERT INTO `law_text` VALUES ('1', '经过了多个角度看', '冬儿康乐及二零宫颈癌俄勒冈', '纳布鲁克喝酒回来看到', '4', 'upload/word/法律后台题目设计.docx');
INSERT INTO `law_text` VALUES ('2', '购房款感到恐惧的都感到恐惧给大家看', '的感觉拉达克该机的价格扩大进口', '宫颈癌对口高考酒店管理快递过来的快捷键', '5', 'upload/word/法律后台题目设计.docx');
INSERT INTO `law_text` VALUES ('3', '大法国大锅饭的风格', '广泛大锅饭大概多少给', '是豆腐干大锅饭大锅饭', '3', 'upload/word/法律后台题目设计.docx');
INSERT INTO `law_text` VALUES ('4', '规划风格化东方化工', '![输入图片说明](http://localhost/law/upload/image/124691aa6544ceb7018a6340b77aa06746b81.png \"在这里输入图片标题\")', '的风格和合法化', '3', 'upload/word/法律后台题目设计.docx');

-- ----------------------------
-- Table structure for law_video
-- ----------------------------
DROP TABLE IF EXISTS `law_video`;
CREATE TABLE `law_video` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `video` varchar(100) NOT NULL COMMENT '视频地址',
  `text_id` int(10) NOT NULL COMMENT '文本ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='法律视频';

-- ----------------------------
-- Records of law_video
-- ----------------------------
INSERT INTO `law_video` VALUES ('1', 'upload/video/6b9ff954f86e0d72d307400dbdc520f1.mp4', '2');
INSERT INTO `law_video` VALUES ('13', 'upload/video/9053526b9ff954f86e0d72d307400dbdc520f1.mp4', '3');
INSERT INTO `law_video` VALUES ('14', 'upload/video/3351896b9ff954f86e0d72d307400dbdc520f1.mp4', '4');
INSERT INTO `law_video` VALUES ('15', 'upload/video/7681886b9ff954f86e0d72d307400dbdc520f1.mp4', '4');

-- ----------------------------
-- Table structure for law_voice
-- ----------------------------
DROP TABLE IF EXISTS `law_voice`;
CREATE TABLE `law_voice` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `voice` varchar(100) NOT NULL COMMENT '声音地址',
  `text_id` int(10) NOT NULL COMMENT '文本ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='法律声音';

-- ----------------------------
-- Records of law_voice
-- ----------------------------
INSERT INTO `law_voice` VALUES ('1', 'upload/voice/MINO,Sangeet - 3D.mp3', '2');
INSERT INTO `law_voice` VALUES ('13', 'upload/voice/873410MINO,Sangeet - 3D.mp3', '3');
INSERT INTO `law_voice` VALUES ('14', 'upload/voice/992666MINO,Sangeet - 3D.mp3', '4');
INSERT INTO `law_voice` VALUES ('15', 'upload/voice/564144MINO,Sangeet - 3D.mp3', '4');

-- ----------------------------
-- Table structure for test_address
-- ----------------------------
DROP TABLE IF EXISTS `test_address`;
CREATE TABLE `test_address` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `address` varchar(50) NOT NULL COMMENT '地址',
  `company_id` int(10) NOT NULL COMMENT '公司id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='地址';

-- ----------------------------
-- Records of test_address
-- ----------------------------
INSERT INTO `test_address` VALUES ('1', '深圳', '5');
INSERT INTO `test_address` VALUES ('2', '广州', '5');
INSERT INTO `test_address` VALUES ('3', '111', '11');
INSERT INTO `test_address` VALUES ('4', '2222', '11');
INSERT INTO `test_address` VALUES ('5', '1111', '12');
INSERT INTO `test_address` VALUES ('6', '1111', '14');
INSERT INTO `test_address` VALUES ('7', '', '15');
INSERT INTO `test_address` VALUES ('8', '', '16');
INSERT INTO `test_address` VALUES ('9', '', '17');
INSERT INTO `test_address` VALUES ('10', '', '18');
INSERT INTO `test_address` VALUES ('11', '1111', '19');
INSERT INTO `test_address` VALUES ('12', '22222', '20');
INSERT INTO `test_address` VALUES ('13', '3333', '20');
INSERT INTO `test_address` VALUES ('14', '', '21');
INSERT INTO `test_address` VALUES ('15', '1', '22');

-- ----------------------------
-- Table structure for test_company
-- ----------------------------
DROP TABLE IF EXISTS `test_company`;
CREATE TABLE `test_company` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `title` varchar(50) NOT NULL COMMENT '标题',
  `name` varchar(50) NOT NULL COMMENT '负责人名字',
  `phone` varchar(50) NOT NULL COMMENT '手机号码',
  `times` int(10) NOT NULL COMMENT '每隔几分钟预约一次',
  `number` int(10) NOT NULL COMMENT '已经有多少人预约了',
  `content` text NOT NULL COMMENT '服务内容',
  `address` varchar(1000) NOT NULL COMMENT '地址',
  `service_time` varchar(10000) NOT NULL COMMENT '服务时间',
  `create_time` varchar(50) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='创建';

-- ----------------------------
-- Records of test_company
-- ----------------------------
INSERT INTO `test_company` VALUES ('1', 'aaa', 'fff', 'sss', '0', '0', '不知道', '[\"zzzzz\"]', '[]', '2019-03-05 02:26:28');
INSERT INTO `test_company` VALUES ('2', '口腔医院', 'jzp', '13333333333', '10', '0', '专业', '[\"u6df1u5733\",\"u4e0au6d77\"]', '{\"08:00-12:00\":[\"08:00:00\",\"08:10:00\",\"08:20:00\",\"08:30:00\",\"08:40:00\",\"08:50:00\",\"09:00:00\",\"09:10:00\",\"09:20:00\",\"09:30:00\",\"09:40:00\",\"09:50:00\",\"10:00:00\",\"10:10:00\",\"10:20:00\",\"10:30:00\",\"10:40:00\",\"10:50:00\",\"11:00:00\",\"11:10:00\",\"11:20:00\",\"11:30:00\",\"11:40:00\",\"11:50:00\",\"12:00:00\"],\"14:00-17:00\":[\"14:00:00\",\"14:10:00\",\"14:20:00\",\"14:30:00\",\"14:40:00\",\"14:50:00\",\"15:00:00\",\"15:10:00\",\"15:20:00\",\"15:30:00\",\"15:40:00\",\"15:50:00\",\"16:00:00\",\"16:10:00\",\"16:20:00\",\"16:30:00\",\"16:40:00\",\"16:50:00\",\"17:00:00\"]}', '2019-03-05 15:25:06');
INSERT INTO `test_company` VALUES ('3', '人民医院', 'sz', '13445454545', '10', '0', '深圳的医院', '[\"u6df1u5733\"]', '{\"08:00-09:00\":[\"08:00:00\",\"08:10:00\",\"08:20:00\",\"08:30:00\",\"08:40:00\",\"08:50:00\",\"09:00:00\"]}', '2019-03-05 11:34:31');
INSERT INTO `test_company` VALUES ('4', '人民医院', 'sz', '13445454545', '10', '0', '深圳的医院', '[\"u6df1u5733\"]', '{\"08:00-09:00\":[\"08:00:00\",\"08:10:00\",\"08:20:00\",\"08:30:00\",\"08:40:00\",\"08:50:00\",\"09:00:00\"]}', '2019-03-05 11:51:55');
INSERT INTO `test_company` VALUES ('5', '哈哈我了个去', '饺子皮', '134546565654', '10', '6', '不知道写什么好监督管理的上空经过德国进口的国际快递给估计和大家的风格和大家都感到地回到法国海军的复活节', '[\"u6df1u5733\"]', '{\"07:00-08:00\":[\"07:00:00\",\"07:10:00\",\"07:20:00\",\"07:30:00\",\"07:40:00\",\"07:50:00\",\"08:00:00\"],\"14:00-17:00\":[\"14:00:00\",\"14:10:00\",\"14:20:00\",\"14:30:00\",\"14:40:00\",\"14:50:00\",\"15:00:00\",\"15:10:00\",\"15:20:00\",\"15:30:00\",\"15:40:00\",\"15:50:00\",\"16:00:00\",\"16:10:00\",\"16:20:00\",\"16:30:00\",\"16:40:00\",\"16:50:00\",\"17:00:00\"]}', '2019-03-05 11:53:27');
INSERT INTO `test_company` VALUES ('20', '222', '222', '2222', '222', '0', '222', '', '{\"01:00-02:00\":[\"01:00:00\"],\"03:00-04:00\":[\"03:00:00\"]}', '2019-03-08 15:27:19');
INSERT INTO `test_company` VALUES ('22', '212', '22', '22', '122', '0', '22', '', '{\"01:00-02:00\":[\"01:00:00\"],\"02:00-03:00\":[\"02:00:00\"]}', '2019-03-12 16:28:16');

-- ----------------------------
-- Table structure for test_date
-- ----------------------------
DROP TABLE IF EXISTS `test_date`;
CREATE TABLE `test_date` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `service_date` varchar(50) NOT NULL COMMENT '服务日期',
  `company_id` int(10) NOT NULL COMMENT '公司id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COMMENT='创建';

-- ----------------------------
-- Records of test_date
-- ----------------------------
INSERT INTO `test_date` VALUES ('1', '2019-03-05', '4');
INSERT INTO `test_date` VALUES ('4', '2019-03-06', '6');
INSERT INTO `test_date` VALUES ('5', '2019-03-06', '7');
INSERT INTO `test_date` VALUES ('6', '2019-03-06', '8');
INSERT INTO `test_date` VALUES ('7', '2019-03-06', '9');
INSERT INTO `test_date` VALUES ('8', '2019-03-07', '11');
INSERT INTO `test_date` VALUES ('13', '2019-03-07', '12');
INSERT INTO `test_date` VALUES ('14', '', '14');
INSERT INTO `test_date` VALUES ('15', '', '15');
INSERT INTO `test_date` VALUES ('16', '', '16');
INSERT INTO `test_date` VALUES ('17', '', '17');
INSERT INTO `test_date` VALUES ('18', '', '18');
INSERT INTO `test_date` VALUES ('19', '2019-03-08', '19');
INSERT INTO `test_date` VALUES ('20', '2019-03-08', '20');
INSERT INTO `test_date` VALUES ('21', '2019-03-09', '20');
INSERT INTO `test_date` VALUES ('24', '2019-03-06', '5');
INSERT INTO `test_date` VALUES ('25', '2019-03-07', '5');
INSERT INTO `test_date` VALUES ('26', '', '21');
INSERT INTO `test_date` VALUES ('28', '2019-03-12', '22');
INSERT INTO `test_date` VALUES ('29', '2019-03-13', '22');

-- ----------------------------
-- Table structure for test_user
-- ----------------------------
DROP TABLE IF EXISTS `test_user`;
CREATE TABLE `test_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `phone` varchar(50) NOT NULL COMMENT '手机号码',
  `remark` varchar(255) NOT NULL COMMENT '备注',
  `subscribe_time` varchar(50) NOT NULL COMMENT '预约时间',
  `company_id` int(10) NOT NULL COMMENT '服务id',
  `create_time` varchar(50) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='用户';

-- ----------------------------
-- Records of test_user
-- ----------------------------
INSERT INTO `test_user` VALUES ('3', '110', '警察叔叔', '2019-03-05', '2', '2019-03-05 08:40:26');
INSERT INTO `test_user` VALUES ('4', '110', '警察叔叔', '2019-03-05', '2', '2019-03-05 08:40:33');
INSERT INTO `test_user` VALUES ('9', '100', '谢谢', '2019-03-07', '5', '2019-03-06 14:32:55');
INSERT INTO `test_user` VALUES ('10', '100', '谢谢', '2019-03-07', '5', '2019-03-06 14:33:03');
INSERT INTO `test_user` VALUES ('11', '5234552345', 'dfgdfgdsgdg', '2019-03-06 07:00:00', '5', '2019-03-06 20:25:13');
INSERT INTO `test_user` VALUES ('12', '5234552345', 'dfgdfgdsgdg', '2019-03-06 07:00:00', '5', '2019-03-06 20:25:25');
INSERT INTO `test_user` VALUES ('13', '7545747', 'hfhgfhfhg', '2019-03-07 07:00:00', '5', '2019-03-06 20:27:44');
INSERT INTO `test_user` VALUES ('14', '64664', 'gffgsgf', '2019-03-07 07:00:00', '5', '2019-03-07 10:09:45');
