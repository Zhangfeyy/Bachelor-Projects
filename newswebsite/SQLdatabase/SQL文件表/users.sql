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

 Date: 27/06/2022 03:08:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(20) CHARACTER SET gbk COLLATE gbk_chinese_ci NOT NULL,
  `password` char(32) CHARACTER SET gbk COLLATE gbk_chinese_ci NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = gbk COLLATE = gbk_chinese_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'aaa', 'c3284d0f94606de1fd2af172aba15bf3');
INSERT INTO `users` VALUES (6, '', 'd41d8cd98f00b204e9800998ecf8427e');
INSERT INTO `users` VALUES (7, 'admin', '38c55423e123aca445982dfd897a552d');

SET FOREIGN_KEY_CHECKS = 1;
