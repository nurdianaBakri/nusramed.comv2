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

 Date: 18/04/2020 13:10:59
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for stok_opname
-- ----------------------------
DROP TABLE IF EXISTS `stok_opname`;
CREATE TABLE `stok_opname`  (
  `barcode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_batch` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_reg` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_exp` date NULL DEFAULT NULL,
  `sisa_stok` int(255) NULL DEFAULT NULL,
  `stok_real` int(255) NULL DEFAULT NULL,
  `selisih` int(255) NULL DEFAULT NULL,
  `user_input` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal` datetime(6) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
