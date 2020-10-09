/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100316
 Source Host           : localhost:3306
 Source Schema         : nusarayamedika1

 Target Server Type    : MySQL
 Target Server Version : 100316
 File Encoding         : 65001

 Date: 04/05/2020 01:34:40
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for return_dr_outlet
-- ----------------------------
DROP TABLE IF EXISTS `return_dr_outlet`;
CREATE TABLE `return_dr_outlet`  (
  `id_return` int(255) NOT NULL AUTO_INCREMENT,
  `id_trx` int(255) NULL DEFAULT NULL,
  `jumlah_return` int(255) NULL DEFAULT NULL,
  `tgl_return` datetime(6) NULL DEFAULT NULL,
  `id_user` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alasan_return` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id_return`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of return_dr_outlet
-- ----------------------------
INSERT INTO `return_dr_outlet` VALUES (19, 119, 3, '2020-05-04 00:00:00.000000', '34', '43');

SET FOREIGN_KEY_CHECKS = 1;
