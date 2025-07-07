/*
 Navicat Premium Data Transfer

 Source Server         : Communi
 Source Server Type    : MySQL
 Source Server Version : 80018
 Source Host           : localhost:3308
 Source Schema         : news

 Target Server Type    : MySQL
 Target Server Version : 80018
 File Encoding         : 65001

 Date: 27/06/2022 03:08:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news`  (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `category_id` int(11) NULL DEFAULT NULL,
  `title` char(100) CHARACTER SET gbk COLLATE gbk_chinese_ci NULL DEFAULT NULL,
  `content` text CHARACTER SET gbk COLLATE gbk_chinese_ci NULL,
  `publish_time` datetime NULL DEFAULT NULL,
  `clicked` int(11) NULL DEFAULT NULL,
  `attachment` char(100) CHARACTER SET gbk COLLATE gbk_chinese_ci NULL DEFAULT NULL,
  PRIMARY KEY (`news_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  INDEX `category_id`(`category_id`) USING BTREE,
  CONSTRAINT `news_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `news_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = gbk COLLATE = gbk_chinese_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES (2, NULL, NULL, '', NULL, NULL, NULL, NULL);
INSERT INTO `news` VALUES (7, 1, NULL, '', NULL, NULL, NULL, NULL);
INSERT INTO `news` VALUES (8, 1, 5, '', NULL, NULL, NULL, NULL);
INSERT INTO `news` VALUES (9, 1, 4, 'dddd', 'ddddd', '2022-06-25 08:34:53', 4, '');
INSERT INTO `news` VALUES (10, 1, 4, 'fgff', 'ffbggnn', '2022-06-25 08:36:35', 59, '');

SET FOREIGN_KEY_CHECKS = 1;
