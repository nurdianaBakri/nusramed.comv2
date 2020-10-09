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

 Date: 04/06/2020 13:11:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for kab_kota
-- ----------------------------
DROP TABLE IF EXISTS `kab_kota`;
CREATE TABLE `kab_kota`  (
  `id_kab_kota` int(255) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kab_kota`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kab_kota
-- ----------------------------
INSERT INTO `kab_kota` VALUES (1, 'Lombok Tengah');
INSERT INTO `kab_kota` VALUES (2, 'Lombok Timur');
INSERT INTO `kab_kota` VALUES (3, 'Sumbawa');
INSERT INTO `kab_kota` VALUES (4, 'Dompu');
INSERT INTO `kab_kota` VALUES (6, 'Sumbawa Barat');
INSERT INTO `kab_kota` VALUES (7, 'Lombok Utara');
INSERT INTO `kab_kota` VALUES (8, 'Kota Mataram');
INSERT INTO `kab_kota` VALUES (9, 'Kota Bima');
INSERT INTO `kab_kota` VALUES (10, 'Kabupaten Bima');

-- ----------------------------
-- Table structure for kecamatan
-- ----------------------------
DROP TABLE IF EXISTS `kecamatan`;
CREATE TABLE `kecamatan`  (
  `id_kab_kota` int(255) NOT NULL,
  `id_kec` int(255) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kec`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 64 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kecamatan
-- ----------------------------
INSERT INTO `kecamatan` VALUES (10, 1, 'Kecamatan Tambora');
INSERT INTO `kecamatan` VALUES (10, 2, 'Kecamatan Donggo');
INSERT INTO `kecamatan` VALUES (10, 3, 'Kecamatan Soromandi');
INSERT INTO `kecamatan` VALUES (10, 4, 'Kecamatan Mada Pangga');
INSERT INTO `kecamatan` VALUES (10, 5, 'Kecamatan Bolo');
INSERT INTO `kecamatan` VALUES (10, 6, 'Kecamatan Parado');
INSERT INTO `kecamatan` VALUES (10, 7, 'Kecamatan Monta');
INSERT INTO `kecamatan` VALUES (10, 8, 'Kecamatan Woha');
INSERT INTO `kecamatan` VALUES (10, 9, 'Kecamatan Palibelo');
INSERT INTO `kecamatan` VALUES (10, 10, 'Kecamatan Belo');
INSERT INTO `kecamatan` VALUES (10, 11, 'Kecamatan Langgudu');
INSERT INTO `kecamatan` VALUES (10, 12, 'Kecamatan Lambitu');
INSERT INTO `kecamatan` VALUES (10, 13, 'Kecamatan Wawo');
INSERT INTO `kecamatan` VALUES (10, 14, 'Kecamatan Lambu');
INSERT INTO `kecamatan` VALUES (10, 15, 'Kecamatan Sape');
INSERT INTO `kecamatan` VALUES (10, 16, 'Kecamatan Ambalawi');
INSERT INTO `kecamatan` VALUES (10, 17, 'Kecamatan Wera');
INSERT INTO `kecamatan` VALUES (1, 18, 'Kecamatan Gunungsari');
INSERT INTO `kecamatan` VALUES (1, 19, 'Kecamatan Lingsar');
INSERT INTO `kecamatan` VALUES (1, 20, 'Kecamatan Narmada');
INSERT INTO `kecamatan` VALUES (1, 21, 'Kecamatan Kediri');
INSERT INTO `kecamatan` VALUES (1, 22, 'Kecamatan Labuapi');
INSERT INTO `kecamatan` VALUES (1, 23, 'Kecamatan Kuripan');
INSERT INTO `kecamatan` VALUES (1, 24, 'Kecamatan Gerung');
INSERT INTO `kecamatan` VALUES (1, 25, 'Kecamatan Lembar');
INSERT INTO `kecamatan` VALUES (1, 26, 'Kecamatan Sekotong');
INSERT INTO `kecamatan` VALUES (2, 27, ' Praya Barat Daya');
INSERT INTO `kecamatan` VALUES (2, 28, ' Pujut');
INSERT INTO `kecamatan` VALUES (2, 29, ' Praya Timur');
INSERT INTO `kecamatan` VALUES (2, 30, ' Janapria');
INSERT INTO `kecamatan` VALUES (2, 31, ' Kopang');
INSERT INTO `kecamatan` VALUES (2, 32, ' Praya');
INSERT INTO `kecamatan` VALUES (2, 33, ' Praya Tengah');
INSERT INTO `kecamatan` VALUES (2, 34, ' Jonggat');
INSERT INTO `kecamatan` VALUES (2, 35, 'Pringgarata');
INSERT INTO `kecamatan` VALUES (2, 36, 'Batukliang');
INSERT INTO `kecamatan` VALUES (2, 37, 'Batukliang Utara');
INSERT INTO `kecamatan` VALUES (3, 38, 'Kecamatan Jerowaru');
INSERT INTO `kecamatan` VALUES (3, 39, 'Kecamatan Keruak');
INSERT INTO `kecamatan` VALUES (3, 40, 'Kecamatan Labuhan Haji');
INSERT INTO `kecamatan` VALUES (3, 41, 'Kecamatan Masbagik');
INSERT INTO `kecamatan` VALUES (3, 42, 'Kecamatan Montong Gading');
INSERT INTO `kecamatan` VALUES (3, 43, 'Kecamatan Pringgabaya');
INSERT INTO `kecamatan` VALUES (3, 44, 'Kecamatan Pringgasela');
INSERT INTO `kecamatan` VALUES (3, 45, 'Kecamatan Sakra');
INSERT INTO `kecamatan` VALUES (3, 46, 'Kecamatan Sakra Barat');
INSERT INTO `kecamatan` VALUES (3, 47, 'Kecamatan Sakra Timur');
INSERT INTO `kecamatan` VALUES (3, 48, 'Kecamatan Sambalia / Sambelia ');
INSERT INTO `kecamatan` VALUES (3, 49, 'Kecamatan Selong');
INSERT INTO `kecamatan` VALUES (3, 50, 'Kecamatan Sembalun');
INSERT INTO `kecamatan` VALUES (3, 51, 'Kecamatan Sikur');
INSERT INTO `kecamatan` VALUES (3, 52, 'Kecamatan Suela / Suwela ');
INSERT INTO `kecamatan` VALUES (3, 53, 'Kecamatan Sukamulia');
INSERT INTO `kecamatan` VALUES (3, 54, 'Kecamatan Suralaga');
INSERT INTO `kecamatan` VALUES (3, 55, 'Kecamatan Terara');
INSERT INTO `kecamatan` VALUES (3, 56, 'Kecamatan Wanasaba');
INSERT INTO `kecamatan` VALUES (8, 57, 'Kecamatan Ampenan');
INSERT INTO `kecamatan` VALUES (8, 58, 'Kecamatan Cakranegara');
INSERT INTO `kecamatan` VALUES (8, 59, 'Kecamatan Mataram');
INSERT INTO `kecamatan` VALUES (8, 60, 'Kecamatan Sandubaya / Sandujaya');
INSERT INTO `kecamatan` VALUES (8, 61, 'Kecamatan Sekarbela');
INSERT INTO `kecamatan` VALUES (8, 62, 'Kecamatan Selaparang / Selaprang');

SET FOREIGN_KEY_CHECKS = 1;
