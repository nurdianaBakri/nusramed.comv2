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

 Date: 20/04/2020 02:02:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for log_activity_2
-- ----------------------------
DROP TABLE IF EXISTS `log_activity_2`;
CREATE TABLE `log_activity_2`  (
  `id_log` int(255) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_log` timestamp(6) NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id_log`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 44 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of log_activity_2
-- ----------------------------
INSERT INTO `log_activity_2` VALUES (25, 'diana@gmail.com', '2020-04-19 10:04:18.000000', 'Proses login pengguna meggunakan email diana@gmail.com gagal, username dan password salah !');
INSERT INTO `log_activity_2` VALUES (26, 'diana@gmail.com', '2020-04-19 10:04:07.000000', 'Proses login pengguna meggunakan username diana@gmail.com gagal, username dan password salah !');
INSERT INTO `log_activity_2` VALUES (27, 'diana@gmail.com', '2020-04-19 10:04:33.000000', 'Proses login pengguna meggunakan username diana@gmail.com gagal, username dan password salah !');
INSERT INTO `log_activity_2` VALUES (28, 'diana@gmail.com', '2020-04-19 10:04:40.000000', 'Proses login pengguna meggunakan username diana@gmail.com gagal, username dan password salah !');
INSERT INTO `log_activity_2` VALUES (29, 'dianaNUR550@gmail.com', '2020-04-19 10:04:56.000000', 'Proses login pengguna meggunakan username dianaNUR550@gmail.com gagal, username dan password salah !');
INSERT INTO `log_activity_2` VALUES (30, 'diana@gmail.com', '2020-04-19 10:04:12.000000', 'Proses login pengguna meggunakan username diana@gmail.com gagal, username dan password salah !');
INSERT INTO `log_activity_2` VALUES (31, 'diana@gmail.com', '2020-04-19 03:04:45.000000', 'Proses login pengguna meggunakan username diana@gmail.com gagal, username dan password salah !');
INSERT INTO `log_activity_2` VALUES (32, 'diana@gmail.com', '2020-04-19 10:04:13.000000', 'Proses login pengguna meggunakan username diana@gmail.com gagal, username dan password salah !');
INSERT INTO `log_activity_2` VALUES (33, 'diana@gmail.com', '2020-04-19 10:04:20.000000', 'Proses login pengguna meggunakan username diana@gmail.com gagal, username dan password salah !');
INSERT INTO `log_activity_2` VALUES (34, 'diana@gmail.com', '2020-04-19 10:04:59.000000', 'Proses login pengguna meggunakan username diana@gmail.com gagal, username dan password salah !');
INSERT INTO `log_activity_2` VALUES (35, 'diana@gmail.com', '2020-04-19 10:04:00.000000', 'Proses login pengguna meggunakan username diana@gmail.com gagal, username dan password salah !');
INSERT INTO `log_activity_2` VALUES (36, 'dianaNUR550@gmail.com', '2020-04-19 10:04:41.000000', 'Proses login pengguna meggunakan username dianaNUR550@gmail.com gagal, username dan password salah !');
INSERT INTO `log_activity_2` VALUES (37, 'diana@gmail.com', '2020-04-19 22:04:06.000000', 'Proses login pengguna meggunakan username diana@gmail.com gagal, username dan password salah !');
INSERT INTO `log_activity_2` VALUES (38, 'diana@gmail.com', '2020-04-19 22:04:06.000000', 'Proses login pengguna meggunakan username diana@gmail.com gagal, username dan password salah !');
INSERT INTO `log_activity_2` VALUES (39, 'diana@gmail.com', '2020-04-19 22:04:29.000000', 'Proses login pengguna meggunakan username diana@gmail.com gagal, username dan password salah !');
INSERT INTO `log_activity_2` VALUES (40, '34', '2020-04-19 22:04:37.000000', 'Proses login berhasil');
INSERT INTO `log_activity_2` VALUES (41, '34', '2020-04-19 23:04:46.000000', 'Proses Stok opname OXYCAN GREEN berhasil');
INSERT INTO `log_activity_2` VALUES (42, '34', '2020-04-19 23:04:25.000000', 'Proses Stok opname OXYCAN GREEN (No Batch : 001003H, No Reg : DTL1843200189A1) berhasil');
INSERT INTO `log_activity_2` VALUES (43, '34', '2020-04-19 23:04:25.000000', 'Proses Stok opname WIROS (No Batch : 002098, No Reg : DKL9110901801B1) berhasil');

SET FOREIGN_KEY_CHECKS = 1;
