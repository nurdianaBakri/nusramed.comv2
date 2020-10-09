/*
 Navicat Premium Data Transfer

 Source Server         : nusarayamedika
 Source Server Type    : MySQL
 Source Server Version : 100231
 Source Host           : 81.16.28.205:3306
 Source Schema         : u612513099_4dmNusr4m3d

 Target Server Type    : MySQL
 Target Server Version : 100231
 File Encoding         : 65001

 Date: 15/05/2020 01:15:50
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for master_detail_obat
-- ----------------------------
DROP TABLE IF EXISTS `master_detail_obat`;
CREATE TABLE `master_detail_obat`  (
  `id_master_detail` int(11) NOT NULL AUTO_INCREMENT,
  `no_faktur` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'NULL',
  `kd_suplier` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kode_pembayaran` int(11) NOT NULL,
  `tgl_jatuh_tempo` datetime(0) NOT NULL,
  `ppn` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_faktur` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_master_detail`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 64 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_detail_obat
-- ----------------------------
INSERT INTO `master_detail_obat` VALUES (1, '000-2004-062516', 'P-1819', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (2, '00009409', 'spr-300420', 100, '2020-05-30 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (3, '0002004062290', 'P-1819', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (4, '0002004062293', 'P-1819', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (5, '0002004062515', 'P-1819', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (6, '0002004062517', 'P-1819', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (7, '0204', 'spr-020420', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (8, '020520', 'spr-020420', 100, '0000-00-00 00:00:00', '10', '2020-05-04');
INSERT INTO `master_detail_obat` VALUES (9, '0304', 'spr-020420', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (10, '0404', 'spr-020420', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (11, '0604', 'spr-020420', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (12, '1707/ISPA/IV/2020', 'P-1511', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (13, '2026061004018', 'P-0631', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (14, '2026061004019', 'P-0631', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (15, '2026061004876', 'P-1842', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (16, '210420', 'spr-020420', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (17, 'PB247031', 'P-4663', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (18, 'PB247589', 'P-0502', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (19, 'PB247941', 'P-0502', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (20, 'PB667570', 'P-0502', 200, '2020-05-30 00:00:00', '10', '2020-05-06');
INSERT INTO `master_detail_obat` VALUES (21, 'PB668015', 'P-0502', 200, '2020-06-05 00:00:00', '10', '2020-05-08');
INSERT INTO `master_detail_obat` VALUES (22, 'PB668240', 'P-0502', 200, '2020-06-08 00:00:00', '10', '2020-05-12');
INSERT INTO `master_detail_obat` VALUES (23, 'PB668366', 'P-0502', 100, '0000-00-00 00:00:00', '10', '2020-05-14');
INSERT INTO `master_detail_obat` VALUES (24, 'PB668367', 'P-0502', 200, '2020-06-10 00:00:00', '10', '2020-05-14');
INSERT INTO `master_detail_obat` VALUES (25, 'S-PNG-002725', 'P-5166', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (26, 'S-PNG-002726', 'P-5166', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (27, 'S-PNG-002728', 'P-5166', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (28, 'S-PNG-002729', 'P-5166', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (29, 'S-PNG-002744', 'P-5166', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (30, 'S-PNG-002922', 'P-5166', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (31, 'S-PNG-003003', 'P-5166', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (32, 'S-PNG-003004', 'P-5166', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (33, 'S-PNG-003122', 'P-5166', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (34, 'S-PNG-003123', 'P-5166', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (35, 'S-PNG-003133', 'P-5166', 200, '2020-05-07 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (36, 'S-PNG-003142', 'P-5166', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (37, 'S-PNG-003151', 'P-5166', 200, '2020-05-08 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (38, 'S-PNG-003194', 'P-5166', 200, '2020-05-09 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (39, 'S-PNG-003195', 'P-5166', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (40, 'S-PNG-003196', 'P-5166', 200, '2020-05-09 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (41, 'S-PNG-003240', 'P-5166', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (42, 'S-PNG-003241', 'P-5166', 200, '2020-05-13 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (43, 'S-PNG-003318', 'P-5166', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (44, 'S-PNG-003319', 'P-5166', 200, '2020-05-15 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (45, 'S-PNG-003326', 'P-5166', 100, '2020-05-15 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (46, 'S-PNG-003557', 'P-5166', 100, '0000-00-00 00:00:00', '10', '2020-05-04');
INSERT INTO `master_detail_obat` VALUES (47, 'S-PNG-003679', 'P-5166', 100, '0000-00-00 00:00:00', '10', '2020-05-04');
INSERT INTO `master_detail_obat` VALUES (48, 'S-PNG-003699', 'P-5166', 100, '0000-00-00 00:00:00', '10', '2020-05-04');
INSERT INTO `master_detail_obat` VALUES (49, 'S-PNG-003700', 'P-5166', 200, '2020-05-30 00:00:00', '10', '2020-05-04');
INSERT INTO `master_detail_obat` VALUES (50, 'SI 12144577', 'P-0159', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (51, 'SI 12144729', 'P-0159', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (52, 'SI 12151164', 'P-0159', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (53, 'SI 12153681', 'P-0159', 100, '0000-00-00 00:00:00', '10', NULL);
INSERT INTO `master_detail_obat` VALUES (54, 'SI12164519', 'P-0159', 100, '0000-00-00 00:00:00', '10', '2020-05-14');

SET FOREIGN_KEY_CHECKS = 1;
