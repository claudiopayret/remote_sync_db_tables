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
INSERT INTO `stand_alone_update_list` VALUES ('1', 'fsj_acymailing_urlclick', 'date', '0', 'DESC', '1');
INSERT INTO `stand_alone_update_list` VALUES ('2', 'k2_items_acymailin_relation', 'id', '1', 'DESC', '1');
INSERT INTO `stand_alone_update_list` VALUES ('3', 'fsj_k2_items', 'id', '1', 'DESC', '1');
INSERT INTO `stand_alone_update_list` VALUES ('4', 'fsj_k2_categories', 'id', '1', 'DESC', '1');
INSERT INTO `stand_alone_update_list` VALUES ('5', 'fsj_k2_tags', 'id', '1', 'DESC', '1');
INSERT INTO `stand_alone_update_list` VALUES ('6', 'fsj_k2_tags_xref', 'id', '1', 'DESC', '1');

