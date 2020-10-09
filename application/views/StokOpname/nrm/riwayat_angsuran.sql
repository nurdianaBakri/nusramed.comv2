/*
 Navicat Premium Data Transfer

 Source Server         : SD
 Source Server Type    : MySQL
 Source Server Version : 100413
 Source Host           : 81.16.28.205:3306
 Source Schema         : u612513099_4dmNusr4m3d

 Target Server Type    : MySQL
 Target Server Version : 100413
 File Encoding         : 65001

 Date: 19/06/2020 13:30:20
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for riwayat_angsuran
-- ----------------------------
DROP TABLE IF EXISTS `riwayat_angsuran`;
CREATE TABLE `riwayat_angsuran`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_faktur` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `angsuran` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_angsuran` datetime(0) NULL DEFAULT NULL,
  `id_user_input` int(255) NULL DEFAULT NULL,
  `sisa_angsuran` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lunas` int(1) NULL DEFAULT NULL COMMENT '1=lunas, 0=tidak lunas',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
