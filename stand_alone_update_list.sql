/*
Navicat MySQL Data Transfer 
Target Server Type    : MYSQL
Date: 2019-04-12 11:21:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for stand_alone_update_list
-- ----------------------------
DROP TABLE IF EXISTS `stand_alone_update_list`;
CREATE TABLE `stand_alone_update_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) DEFAULT NULL,
  `field` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `order` varchar(255) DEFAULT NULL,
  `act` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of stand_alone_update_list
-- ----------------------------
INSERT INTO `stand_alone_update_list` VALUES ('1', 'table1', 'date', '0', 'DESC', '1');
INSERT INTO `stand_alone_update_list` VALUES ('2', 'table2', 'id', '1', 'ASC', '1');
INSERT INTO `stand_alone_update_list` VALUES ('3', 'table3', 'id', '1', 'DESC', '1');
 

