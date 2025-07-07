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

 Date: 27/06/2022 03:07:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(20) CHARACTER SET gbk COLLATE gbk_chinese_ci NOT NULL,
  PRIMARY KEY (`category_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = gbk COLLATE = gbk_chinese_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES (3, 'Entertainment');
INSERT INTO `category` VALUES (4, 'Economics');
INSERT INTO `category` VALUES (5, 'Entertainment');
INSERT INTO `category` VALUES (7, 'reading');
INSERT INTO `category` VALUES (9, 'cooking');
INSERT INTO `category` VALUES (10, 'safdsd');
INSERT INTO `category` VALUES (12, 'reading');

SET FOREIGN_KEY_CHECKS = 1;
