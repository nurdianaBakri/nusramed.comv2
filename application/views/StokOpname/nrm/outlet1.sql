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

 Date: 04/06/2020 13:14:20
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for outlet1
-- ----------------------------
DROP TABLE IF EXISTS `outlet1`;
CREATE TABLE `outlet1`  (
  `id_outlet` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_telp` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `npwp` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nm_pemilik` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat_pemilik` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_telp_pemilik` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_ktp_pemilik` varchar(18) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_penanggung_jawab` int(11) NOT NULL,
  `username` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `id_ttk` int(11) NOT NULL,
  `no_izin` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `masa_izin` date NOT NULL,
  `input_date` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `id_kab_kota` int(2) NULL DEFAULT NULL,
  `id_kec` int(2) NULL DEFAULT NULL,
  PRIMARY KEY (`id_outlet`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of outlet1
-- ----------------------------
INSERT INTO `outlet1` VALUES ('OUT-010420-374831165', 'APOTEK SOLIHIN FARMA', 'JL. SOEKARNO HATTA KM. 17 RENSING, SAKRA BARAT, LOMBOK TIMUR\n', '0', '83.465.235.6-915', 'NOVIANA KHAIRANI, S.FAM., APT', 'OTAK KEBON DESA SUKARARA, SAKRA BARAT', '0', '5203195411910002', 37, '', '', 0, 0, '90/503/PM.II/01/2020', '2023-01-07', '2020-04-01 08:11:33', 6, NULL);
INSERT INTO `outlet1` VALUES ('OUT-010420-705526092', 'KLINIK HASANAH', 'JL. PEMBAN AJI, DESA BUNGTIANG, KEC. SAKRA BARAT, LOMBOK TIMUR\n', '0', '73.364.749.9-915', 'NURHASANAH', 'GERISAK SEMANGGETENG, SAKRA BARAT', '0', '5203195107810003', 36, '', '', 0, 0, '2208/503/PM.II.50.A8/07/2017', '2020-07-25', '2020-04-01 06:13:16', 6, NULL);
INSERT INTO `outlet1` VALUES ('OUT-010420-914867598', 'APOTEK HASANAH FARMA', 'JL. RAYA PANCOR KERUAK, LOMBOK TIMUR', '0', '08.419.741.7-915', 'NURHASANAH', 'GERISA SEMANGGELENG, SAKRA BARAT', '0', '5203195107810003', 38, '', '', 0, 0, '445/K.319/YK/III/2017', '2023-03-01', '2020-04-01 08:28:19', 2, NULL);
INSERT INTO `outlet1` VALUES ('OUT-020420-258493809', 'APOTEK HK FARMA', 'JL. RAYA GANTI-KERUAK, DESA GANTI, LOMBOK TENGAH \n', '081907900118', '82.433.779.4-915', 'HENDI KHARISMA, S.FARM., APT', 'MANGGU, PRAYA TIMUR', '081907900118', '5202061606850002', 44, '', '', 0, 0, '445/14/IX/SIA/SDK/2017', '2021-06-15', '2020-04-02 07:45:41', 1, NULL);
INSERT INTO `outlet1` VALUES ('OUT-020420-259047800', 'APOTEK ANJANI', 'JL. RAYA LINGSAR - BATU KUMBUNG, LINGSAR, LOMBOK BARAT\n', '087831149271', '91.170.384.1-914', 'DEWI LUKSRI ANJANIWATI, S.FARM., APT', 'JL. RAYA LINGSAR - BATU KUMBUNG', '087831149271', '5201125101920001', 41, '', '', 0, 0, '49/SIA/LOBAR/VI/2019', '2021-01-11', '2020-04-02 07:17:42', 6, NULL);
INSERT INTO `outlet1` VALUES ('OUT-020420-433198371', 'APOTEK YOGA', '\n                JL. PROF. M. YAMIN, SH, LOMBOK TIMUR\n', '0', '58.351.209.4-915', 'FANNIYAH, SH', 'LOMBOK TIMUR', '0', '0', 40, '', '', 0, 0, '445/K.394/YK/IV/2016', '2021-03-14', '2020-04-02 05:43:52', 2, NULL);
INSERT INTO `outlet1` VALUES ('OUT-020420-559398692', 'APOTEK WAHYU FARMA', 'JL. RAYA KOPANG NO. 10, KAMPUNG PENGOMPAN, KOPANG, LOMBOK TENGAH\n', '087865560473', '14.142.786.4-915', 'WAHYUNI, S.FAR., APT', 'PENGOMPAN DUSUN KOPANG, LOMBOK TENGAH', '087865560473', '5202095310790001', 43, '', '', 0, 32, '445/16/X/SIA/SDK/2017', '2022-10-13', '2020-04-02 07:41:22', 1, NULL);
INSERT INTO `outlet1` VALUES ('OUT-020420-631669262', 'APOTEK KARIN', 'JL. RAYA PENGADANG, PRAYA TENGAH, LOMBOK TENGAH \n', '0', '16.214.871.2-915', 'BAIQ RINA ASNELI APRIANTI, S.FAR., APT', 'DUSUN LENDANG ARA II, KOPANG', '0', '5202095004860006', 42, '', '', 0, 0, '445/5/0/V/SIA/SDK/2017', '2022-04-10', '2020-04-02 07:33:45', 1, NULL);
INSERT INTO `outlet1` VALUES ('OUT-020420-779006385', 'APOTEK KERUAK', 'JL. RAYA PANCOR - KERUAK\n', '0', '14.380.602.4-915', 'GUNAWAN M.A YUDHISTIRA, S.SI., APT', 'JL. DIPONEGORO NO. 11, MAJIDI, SELONG', '082340599915', '5203072409810003', 39, '', '', 0, 0, '445/K.599/YK/VII/2017', '2021-09-24', '2020-04-02 03:21:05', NULL, NULL);
INSERT INTO `outlet1` VALUES ('OUT-020420-800631962', 'APOTEK FAYA FARMA', '\n                JL. BUNG KARNO NO. 51, MATARAM\n', '0', '08.420.749.7-911', 'IVAN ARIESTA DWIFAYA, MM., APT', 'JL. BUNG KARNO NO. 51-F, MATARAM', '0', '5271022603810001', 45, '', '', 0, 0, '506/2781/KES/X/2017', '2021-03-26', '2020-04-02 08:58:20', 8, NULL);
INSERT INTO `outlet1` VALUES ('OUT-030420-108935976', 'APOTEK SAYANG-SAYANG', 'JL. DIPONEGORO NO. 10, SAYANG-SAYANG, CAKRANEGARA \n', '0', '70.918.986.4-911', 'MUHAMMAD SYAUQI, S.KOM', 'JL. HALMAHERA GG. II NO. X, REMBIGA UTARA', '0', '5271051811870001', 46, '', '', 0, 0, '506/1875/KES//VII/2019', '2024-06-21', '2020-04-03 03:59:07', 8, NULL);
INSERT INTO `outlet1` VALUES ('OUT-040420-295886061', 'APOTEK KARTINI', '\n                JL. RAYA LEMBAR-MATARAM, GERUNG, LOMBOK BARAT \n', '0', '45.605.341.2-915', 'I GEDE SANTI MARGIANA, A.Md., Kep', 'RINCUNG, BANYU URIP, GERUNG', '0', '5201012210820002', 47, '', '', 0, 0, '59/SIA/LOBAR/X/2019', '2022-03-20', '2020-04-04 07:17:45', 6, NULL);
INSERT INTO `outlet1` VALUES ('OUT-040520-340693984', 'APOTEK NUSANTARA', 'BAGEK BONTONG, DUSUN SEMAT DESA DANGER, MASBAGIK, LOMBOK TIMUR \n', '0', '55.496.593.9-045', 'NOVIANA NURHARDIANTI, S.FARM., APT', 'KP. RANCA, MASBAGIK UTARA', '0', '5203056311910003', 90, '', '', 0, 0, '445/K.572/YK/VII/2017', '2020-11-23', '2020-05-04 04:24:02', 2, NULL);
INSERT INTO `outlet1` VALUES ('OUT-040520-885065836', 'APOTEK QBI FARMA', 'JL. PEJANGGIK NO. 13, PERUMNAS TAMPAR-AMPAR, JONTLAK, PRAYA TENGAH, LOMBOK TENGAH\n', '0', '83.649.712.3-915', 'FIRDAUS KABIRU MASSEY, S.FARM.,APT', 'JL. PEJANGGIK NO. 13, PERUMNAS TAMPAR-AMPAR', '0', '5202100409950001', 89, '', '', 0, 0, '0002/APOTEK/III/2020/DPMPTSP', '2025-03-20', '2020-05-04 03:33:24', 1, NULL);
INSERT INTO `outlet1` VALUES ('OUT-060420-385418904', 'APOTEK KARUNIA', 'DUSUN REMPEK TIMUR, DESA MONTONG GAMANG, LOMBOK TENGAH \n', '0', '90.246.734.9-915', 'SISWANDHI HADY SAPUTRA, S.FARM., APT', 'KEREMBONG BARAT, LOMBOK TENGAH', '0', '5022071903910002', 48, '', '', 0, 0, '445/09/I/SIA/SDK/2019', '2023-03-19', '2020-04-06 02:23:12', 1, NULL);
INSERT INTO `outlet1` VALUES ('OUT-060420-431758903', 'APOTEK MAGISTRA', 'JL. PROF. M. YAMIN NO. 51, SELONG, LOMBOK TIMUR\n', '0', '05.925.984.6-915', 'DRS. SARHAN, APT', 'MAJIDI, SELONG', '0', '5203073010620001', 50, '', '', 0, 0, '445/K.1617/YK/XI/2016', '2021-11-17', '2020-04-06 09:18:35', 2, NULL);
INSERT INTO `outlet1` VALUES ('OUT-060420-769048862', 'APOTEK SEJAWAT', 'MONTONG COPE DESA PEMATUNG, LOMBOK TIMUR\n', '0', '93.674.815.1-915', 'MUHAMMAD ISNAINI, S.FARM., APT', 'MONTONG COPE, SAKRA BARAT', '0', '5203191206950001', 49, '', '', 0, 0, '4816/503/PM.II/09/2019', '2022-12-31', '2020-04-06 03:11:00', 2, NULL);
INSERT INTO `outlet1` VALUES ('OUT-060520-381112430', 'APOTEK MADINA FARMA', 'JL. ADI SUCIPTO NO. 14, AMPENAN, MATARAM \n', '0', '57.786.137.0-911', 'BAIQ SRI SEPTINA HARYAKIN, S.SI., APT', 'BTN GRIYA ELEN INDAH BLOCK C NO. 3, MATARAM', '0', '5202026709780001', 92, '', '', 0, 0, '506/287/KES/I/2019', '2022-09-27', '2020-05-06 05:24:25', 8, NULL);
INSERT INTO `outlet1` VALUES ('OUT-060520-728277746', 'APOTEK DIAN', '\n                JL. ARIF RAHMAN HAKIM NO. 29 D, MATARAM', '0', '66.298.871.6-911', 'BAIQ DIAN WIRASANDHI, AMD., FARM', 'JL. JATI LUHUR VII K. 49, BTN KEKALIK BARU', '0', '5271035301850002', 91, '', '', 0, 0, '506/2014/KES/VII/2018', '2023-05-01', '2020-05-06 05:06:40', 8, NULL);
INSERT INTO `outlet1` VALUES ('OUT-060520-949693432', 'APOTEK CARISSA', 'JL. PARIWISATA NO. 23, SANDIK, BATU LAYAR, LOMBOK BARAT \n', '0', '08.414.868.3-911', 'RAUHUL AKBAR KURNIAWAN', 'BTN PUNCANG HIJAU JL. KELAPA BLOK O', '0', '5201142105810001', 93, '', '', 0, 0, '63/SIA/LOBAR/XII/2019', '2024-12-14', '2020-05-06 06:08:20', 6, NULL);
INSERT INTO `outlet1` VALUES ('OUT-070420-560463651', 'APOTEK BERLIYAN FARMA', 'SENGKOL, KELURAHAN SENGKOL, PUJUT, LOMBOK TENGAH\n', '0', '93.017.269.7-915', 'SIDEMANS, S.FARM., APT', 'DUSUN MONGGE, SUKADANA, PUJUT', '0', '5202040406900005', 51, '', '', 0, 0, '0001/APOTEK/II/2020/DPMPTSP', '2025-01-19', '2020-04-07 05:53:37', 1, NULL);
INSERT INTO `outlet1` VALUES ('OUT-070420-7451035', 'APOTEK PREMA SANJIWANI', 'JL. NUSA KAMBANGAN NO. 135, DENPASAR BARAT\n', '0', '45.613.694.4-906', 'NI PUTU UDAYANA ANTARI, S.FARM, M.SC., APT', 'BR. KACAGAN, KETEWEL, SUKAWATI, DENPASAR', '0', '5103035405870002', 52, '', '', 0, 0, '44b/61/5766/DB/DPMPTSP/2017', '2022-11-06', '2020-04-07 06:00:33', 6, NULL);
INSERT INTO `outlet1` VALUES ('OUT-080420-293170097', 'APOTEK MARYAM FARMA', 'SELAWANG, PUJUT, LOMBOK TENGAH\n', '0', '91.805.842.1-915', 'ANI MARYAM, S.FARM., APT', 'JAMBIK, PUJUT, LOMBOK TENGAH', '0', '52', 57, '', '', 0, 0, '445/20/VII/SIA/SDK/2019', '2024-01-10', '2020-04-08 09:18:37', 1, NULL);
INSERT INTO `outlet1` VALUES ('OUT-080420-322252329', 'APOTEK PUSPITA', 'JL. ARJANJANG, KERUAK BUHLAWANG BARAT, DESA KERUAK, LOMBOK TIMUR', '0', '90.839.062.8-915', 'TRI PUSPITA YULIANI, M.FARM., APT', 'BUHLAWANG BARAT, DESA KERUAK', '0', '5203015806920004', 53, '', '', 0, 0, '445/K.476/YK/VI/2019', '2021-06-18', '2020-04-08 02:52:56', 6, NULL);
INSERT INTO `outlet1` VALUES ('OUT-080420-453332774', 'APOTEK MITRA KELUARGA', 'JL. GAJAH MADA, JEMPONG, MATARAM\n', '0', '72.819.727.8-911', 'dr. LALU AHMAD SYARIF RHAMDANI AKBAR', 'PERUM PERMATA REMBIGA JL. HALMAHERA NO.17, REMBIGA', '0', '5203062905860002', 56, '', '', 0, 0, '442/005/DPMPTSP/II/2020', '2024-06-24', '2020-04-08 09:00:52', 8, NULL);
INSERT INTO `outlet1` VALUES ('OUT-080420-469048457', 'APOTEK NURUL FARMA', 'JL. KOMPLEKS PERTOKOAN, PASAR PERAMPUAN, LABUAPI, LOMBOK BARAT \r\n', '0', '15.667.807.0-915', 'DYAH HESTI NURUL HUDA, S.FARM., APT', 'BTN PENGSONG INDAH GANG BATUR NO. 2 ', '0', '5201085812800001', 55, '', '', 0, 0, '40/SIA/LOBAR/XI/2018', '2021-12-18', '2020-04-08 08:55:44', 6, NULL);
INSERT INTO `outlet1` VALUES ('OUT-080420-981600952', 'RSIA BHUMI BUNDA', 'JL. BASUKI RAHMAT, PRAYA, LOMBOK TENGAH\n', '0', '35.046.237.0-901', 'YAYASAN TRI GUNA SEJAHTERA', 'JL. BASKI RAHMAT NO. 90, PRAYA', '0', '52', 54, '', '', 0, 0, '445/06/III/SIA/SDK/2018', '2020-10-10', '2020-04-08 02:59:25', 1, NULL);
INSERT INTO `outlet1` VALUES ('OUT-080520-671899651', 'APOTEK LOMBOK', 'LINGKUNGAN BATU BELEK BARAT, KELURAHAN RAKAM, SELONG, LOMBOK TIMUR \n', '0', '89.502.842.915.0', 'SUPRATMAN, SKM,MM', 'LINGKUNGAN BATU BLEK, SELONG', '0', '5203072104750006', 94, '', '', 0, 0, '445/K.142/YK/I/2017', '2021-06-27', '2020-05-08 03:29:03', 6, NULL);
INSERT INTO `outlet1` VALUES ('OUT-090420-535310216', 'APOTEK MI\'RAJUN FARMA II', 'JL. TGKH. M. ZAINUDDIN ABDUL MAJID NO.10, LINGK. MUHAJIRIN, PANCOR, LOMBOK TIMUR\n', '0', '71.303.990.7-911', 'DR. SOFIYATI JAMILA', 'LOMBOK TIMUR', '0', '52', 58, '', '', 0, 0, '445/K.416/YK/V/2019', '2024-01-06', '2020-04-09 02:35:39', 2, NULL);
INSERT INTO `outlet1` VALUES ('OUT-090420-591979946', 'APOTEK ADLIZA ', 'DESA DAREK, PRAYA BARAT, LOMBOK TENGAH', '0', '84.038.512.4-915', 'LELIE AMALIA TUSSHALEHA, S.FARM., APT', 'DUSUN LOLAT, BATUJAI, LOMBOK TENGAH', '0', '5202056302900002', 59, '', '', 0, 0, '0004/APOTEK/IX/2019/DPMPTSP', '2024-02-28', '2020-04-09 03:07:28', 6, NULL);
INSERT INTO `outlet1` VALUES ('OUT-110420-139717249', 'APOTEK SILVIA ', 'JL. YOS SUDARSO, JEMBATAN KEMBAR, LEMBAR LOMBOK BARAT\n', '0', '54.684.421.8-911', 'SILVIA LISTYORINI, S.FARM., APT', 'JL. BATANGHARI VI/17 PERUMNAS', '0', '52711046811900002', 61, '', '', 0, 0, '25/SIA/LOBAR/IV/2018', '2022-11-28', '2020-04-11 05:38:46', 6, NULL);
INSERT INTO `outlet1` VALUES ('OUT-110420-178707997', 'APOTEK AMARYLIS', 'JL. YOS SUDARSO NO 17 AMPENAN, MATARAM', '0', '06.420.506.5-911', 'JEFFRY SUGIANTO', 'JL YOS SUDARSO NO 25A', '0', '5271010711570001', 62, '', '', 0, 0, '506/761/KES/III/2019', '0000-00-00', '2020-04-11 06:28:56', 8, NULL);
INSERT INTO `outlet1` VALUES ('OUT-110420-625690105', 'APOTEK DO\'A IBU', '\n                 JL. TGH ABUDL HAFIZ, DUSUN BANGKET DALAM, KEDIRI LOMBOK BARAT\n', '0', '457688919915000', 'SUHERMAN', 'DUSUN SEDAYU KURIPAN, LOMBOK BARAT', '0', '5201152605920001', 60, '', '', 0, 0, '34/SIA/LOBAR/VIII/2018', '2020-08-29', '2020-04-11 02:13:29', 6, NULL);
INSERT INTO `outlet1` VALUES ('OUT-120320-239024555', 'APOTEK MIRA', 'JL. LALU MESIR NO.2, BABAKAN, MATARAM', '081809577875', '74.525.171.0-911', 'MIRA YESI SATYANINI, S.Farm., Apt', 'JL. PETERNAKAN, SELAGALAS', '081809577875', '5271066503890003', 9, '', '', 0, 0, '506/1695/KES/VI/2019', '2020-03-25', '0000-00-00 00:00:00', 8, NULL);
INSERT INTO `outlet1` VALUES ('OUT-120320-444584496', 'APOTEK GEK', 'JL. BUNG KARNO NO. 35 B, MATARAM', '', '15.506.246.7-915', 'DR. YOSEPH BARATA', 'KARANG SUKUN RT 24, SELONG', '', '0', 7, '', '', 0, 0, '506/907/KES/III/2017', '2021-06-03', '0000-00-00 00:00:00', 8, NULL);
INSERT INTO `outlet1` VALUES ('OUT-120320-667301433', 'APOTEK MANGGALA PRIMA', 'JL. ADI SUCIPTO NO. 18, AMPENAN, MATARAM', '', '836440891911000', 'dr. SRI KARTIKA SARI., Sp. PK', 'NO', '', '0', 10, '', '', 0, 0, '506/337/KES/II/2018', '2022-01-16', '0000-00-00 00:00:00', 8, NULL);
INSERT INTO `outlet1` VALUES ('OUT-120320-802847577', 'APOTEK KOPERLIN', 'JL. MAJAPAHIT NO. 11 A, MATARAM', '0', '017840231911000', 'BAMBANG WALUYANTO', 'NO NAME', '0', '0', 8, '', '', 0, 0, '506/2629/KES/IX/2017', '2021-07-02', '0000-00-00 00:00:00', 8, NULL);
INSERT INTO `outlet1` VALUES ('OUT-120320-970377110', 'APOTEK NIA', 'JL. SALEH SUNGKAR NO. 33, AMPENAN, MATARAM', '087865328600', '084151463911000', 'AMIRA, S.Farm.,Apt', 'LINGK. DENDE SALEH, BINTARO, MATARAM', '087865328600', '5271015706840006', 11, '', '', 0, 0, '506/1490/KES/V/2019', '2021-06-17', '0000-00-00 00:00:00', 8, NULL);
INSERT INTO `outlet1` VALUES ('OUT-120520-4298071', 'APOTEK PEGONDANG', 'JL. SOEKARNO-HATTA, PEGONDANG DESA SAKRA, LOMBOK TIMUR\n', '0', '80.929.949.8-915', 'SITI AMALIA WAHYU PRATIWI, S.FARM., APT', 'KESELET BARAT, SAKRA, LOMBOK TIMUR', '0', '5203024811910003', 95, '', '', 0, 0, '445/K.206/YK/II/2017', '2021-11-08', '2020-05-12 07:28:03', 2, NULL);
INSERT INTO `outlet1` VALUES ('OUT-120520-613939728', 'APOTEK WIJAYA TIRTA', 'JL. DR. WAHIDIN KM. 3, KOMPLEKS  RUKO REMBIGA, MATARAM\n', '0', '70.237.524.7-911', 'PEI TJEN', 'JL. S.SUNGKAR GG. BUNTU, AMPENAN', '0', '5271016510730003', 96, '', '', 0, 0, '506/439/KES/II/2019', '2021-04-16', '2020-05-12 08:07:21', 8, NULL);
INSERT INTO `outlet1` VALUES ('OUT-130320-147909909', 'APOTEK AN-NUR', 'JL. DR. SOETOMO DESA MENDAGI, GERUNG, LOMBOK BARAT', '', '147136600913000', 'NO NAME', '', '', '0', 16, '', '', 0, 0, '23/SIA/LOBAR/II/2018', '2022-10-20', '0000-00-00 00:00:00', 6, NULL);
INSERT INTO `outlet1` VALUES ('OUT-130320-172351021', 'APOTEK LABULIA', 'JL. BY PASS BIL, DESA LABU LIA, LOMBOK TENGAH', '087752426111', '939793980915000', 'AHMAD RAFI\'I', '', '', '0', 21, '', '', 0, 0, '0002/APOTEK/II/2020/DPMPTSP', '2025-02-26', '0000-00-00 00:00:00', 1, NULL);
INSERT INTO `outlet1` VALUES ('OUT-130320-190449173', 'APOTEK SARI FARMA', 'JL. PANJITILAR 124, MATARAM', '081909999500', '345896435543000', 'SARI WIDYASTUTI,S.Si., Apt', 'JL. ASRI III/C-61 BTN DASAR ILHAM SAKINAH MAPAK INDAH, JEMPONG', '081909999500', '5201134907750001', 15, '', '', 0, 0, '506/2730/KES/X/2018', '2021-07-09', '0000-00-00 00:00:00', 8, NULL);
INSERT INTO `outlet1` VALUES ('OUT-130320-325464802', 'APOTEK LENTERA', 'JL. BUNG HATTA 38, MAJELUK, MATARAM', '081353573532', '07.522.728.0-911', 'IKA ANDHYKA, S.Si., M.Farm., Apt', 'JL. BUNG HATTA II/7, MAJELUK', '081353573532', '5271026311740001', 24, '', '', 0, 0, '506/3202/KES/XI/2017', '2021-11-21', '0000-00-00 00:00:00', 8, NULL);
INSERT INTO `outlet1` VALUES ('OUT-130320-445010503', 'APOTEK RINJANI', 'JL. DR. SOETOMO NO. 29, KARANG BARU, MATARAM', '081803694911', '818226243911000', 'NURINA ADANI SUKIAKUSUMA, S.Farm.,Apt', 'JL. TUNJUNG NO. 7B MONJOK TIMUR, MATARAM', '081803694911', '5271056802920001', 13, '', '', 0, 0, '506/1408/KES/IV/2017', '2022-02-28', '0000-00-00 00:00:00', 8, NULL);
INSERT INTO `outlet1` VALUES ('OUT-130320-532263863', 'APOTEK SINAR FARMA', 'JL. RADEN PUGUH, PUTUNG, LOMBOK TENGAH', '087864900194', '90.166.199.1-915', 'AHMAD MANDRA GUNA, S.Farm.,Apt', 'DASAN BARU, SUKARARA', '087864900194', '5202022703910001', 22, '', '', 0, 0, '445/12/III/SIA/SDK/2019', '2021-03-27', '0000-00-00 00:00:00', 1, NULL);
INSERT INTO `outlet1` VALUES ('OUT-130320-539970123', 'APOTEK NATALIA FARMA', 'JL. RAYA SESELA, DUSUN DASAN UTAMA, KOMPLEK PERUM. RUMAH KITA, GUNUNGSARI, LOMBOK BARAT', '', '168511152911000', 'DIANA YANTI NOVITA, S.Farm., Apt', 'JL. DEWI SARTIKA 99 DURIAN NO. 16, MONJOK BARAT', '', '5271056411870001', 19, '', '', 0, 0, '41/SIA/LOBAR/II/2019', '2023-11-24', '0000-00-00 00:00:00', 6, NULL);
INSERT INTO `outlet1` VALUES ('OUT-130320-606086575', 'APOTEK LIA', 'JL. ADI SUCIPTO NO. 41X, MATARAM', '081938710750', '78.072.889.5-911', 'AMALIA SHUFIANA, S.Si., Apt', 'JL. SERAYU RAYA NO. 5, BTN KEKALIK', '081938710750', '5271015107800001', 23, '', '', 0, 0, '506/2547/KES/IX/2019', '2021-07-11', '0000-00-00 00:00:00', 8, NULL);
INSERT INTO `outlet1` VALUES ('OUT-130320-620380022', 'APOTEK SURYA', 'JL. AA. GEDE NGURAH, CAKRANEGARA, MATARAM', '0', '014614358914000', 'EMILIA, SP', 'JL. TAMAN SEJAHTERA NO. 1, PAJERUK, AMPENAN', '0', '5271015905720002', 14, '', '', 0, 0, '442/001/DPMPTSP/II/2020', '2024-08-30', '0000-00-00 00:00:00', 8, NULL);
INSERT INTO `outlet1` VALUES ('OUT-130320-649424759', 'APOTEK DANA FARMA', 'JL. RAYA BONJERUK-SINTUNG, DESA BONJERUK, LOMBOK TENGAH', '081917088780', '458939940915000', 'LALU HIDAYATULLAH', 'KAMPUNG PEDALEMAN, MASBAGIK', '', '5203352309820002', 20, '', '', 0, 0, '445/5/SIA/SDK/2017', '2022-06-15', '0000-00-00 00:00:00', 1, NULL);
INSERT INTO `outlet1` VALUES ('OUT-130320-783769803', 'APOTEK AWET MUDA', 'JL. H.L. ANGGRAT BA, GERUNG, LOMBOK BARAT', '081805919135', '16.567.788.1-915', 'EKA SEPTIANI MS, M.Farm., Apt', 'DUSUN MERCA, DESA SELAT, NARMADA', '081805919135', '5201036109860002', 27, '', '', 0, 0, '28/SIA/LOBAR/IV/2018', '2021-09-21', '0000-00-00 00:00:00', 6, NULL);
INSERT INTO `outlet1` VALUES ('OUT-130320-899910407', 'APOTEK CERIA', 'JL. TGH. IBRAHIM KHOLIDY, BENGKEL, LABUAPI, LOMBOK BARAT', '081917202728', '08.414.875.8-911', 'RAHMAWATI, S.Farm., Apt', 'JL. ASAHAN 1 NO. 08, PERUMNAS', '081917202728', '5271045003820001', 26, '', '', 0, 0, '02/SIA/LOBAR/III/2013', '2021-03-10', '0000-00-00 00:00:00', 6, NULL);
INSERT INTO `outlet1` VALUES ('OUT-130320-905145039', 'APOTEK MISHA 2', 'JL. K.H. AHMAD DAHLAN, PERAMPUAN, LOMBOK BARAT', '0818220126', '821312790915000', 'DODY FRISKAYADI, S.Farm.,Apt', 'BTN RINJANI PERMAI BLOK A NO. 9, PRAYA, LOMBOK TENGAH', '0818220126', '5202012307930004', 18, '', '', 0, 0, '62/SIA/LOBAR/XII/2019', '2022-07-23', '0000-00-00 00:00:00', 6, NULL);
INSERT INTO `outlet1` VALUES ('OUT-130320-935218602', 'APOTEK ERA', 'JL. PARIWISATA, DESA SANDIK, BATU LAYAR, LOMBOK BARAT', '087853522032', '084232701911000', 'ELY DIANIKA RENSPANTY, S.Farm., Apt', 'JL. MADRID RAYA 35 BTN GRAHA ROYAL, GUNUNG SARI', '087853522032', '5201145301870002', 17, '', '', 0, 0, '04/SIA/LOBAR/X/2012', '2021-01-13', '0000-00-00 00:00:00', 6, NULL);
INSERT INTO `outlet1` VALUES ('OUT-130320-951395186', 'APOTEK PARTA FARMA', 'JL. CATURWARGA NO. 50, MATARAM', '081908914900', '01.126.639.2-911', 'I MADE MUDITA', 'JL. BIOLA IV BLOK D.5 PUNIA JAMAQ', '081908914900', '5271050608700001', 25, '', '', 0, 0, '506/1268/KES/IV/2017', '2021-05-04', '0000-00-00 00:00:00', 8, NULL);
INSERT INTO `outlet1` VALUES ('OUT-130420-299974907', 'APOTEK MEGA FARMA', 'JL RAYA RENSING KERUAK, RENSING RAYA, SAKRA BARAT, LOMBOK TIMUR', '0', '', 'MARYANI MEGA SARI', 'SAWO BAT, SAKRA, LOMBOK TIMUR', '0', '5203026802800001', 63, '', '', 0, 33, '445/K.330/YK/III/2016', '2021-02-28', '2020-04-13 04:00:34', 6, NULL);
INSERT INTO `outlet1` VALUES ('OUT-130520-281654503', 'APOTEK MENTARI', 'JL. GATOT SUBROTO NO. 24, GERUNG UTARA, LOMBOK BARAT \n', '0', '0', 'NANDA KURNIAWAN', 'MESANGGOK, GERUNG', '0', '5201010107810158', 97, '', '', 0, 0, '38/SIA/LOBAR/X/2018', '2021-10-02', '2020-05-13 02:41:36', 6, NULL);
INSERT INTO `outlet1` VALUES ('OUT-130520-353944741', 'APOTEK GAYATRI GUNUNG SARI', '\n                 JL. RAYA TANJUNG, DUSUN RENDANG BAJUR, GUNUNGSARI, LOMBOK BARAT\n', '0', '75.719.929.4-914', 'DR. I KETUT MAHAVIRA DIPUTRA', 'JL. AKASIA II 24 KR. JANGKONG', '0', '5271032908910002', 100, '', '', 0, 0, '56/SIA/LOBAR/IX/2019', '2021-04-28', '2020-05-13 03:09:08', 6, NULL);
INSERT INTO `outlet1` VALUES ('OUT-130520-434615742', 'APOTEK HANA FARMA', 'JL. TRUNOJOYO NO. 1A, MIDANG, GUNUNGSARI, LOMBOK BARAT\n', '0', '91.650.316.2-914', 'NABILA ATMA UTAMI, S.FARM., APT', 'JL. KRAKATAU NO. 4, MIDANG, LOMBOK BARAT', '0', '5201095607950001', 98, '', '', 0, 0, '50/SIA/LOBAR/VI/2019', '2024-07-16', '2020-05-13 02:57:26', 6, NULL);
INSERT INTO `outlet1` VALUES ('OUT-130520-4384462', 'APOTEK ALISHA FARMA', 'BAGEK DOPOL, MONTONG TEREP,PRAYA, LOMBOK TENGAH\n', '0', '83.357.423.9-915', 'BAIQ HASANAH', 'BELENCONG, MERTAK TOMBOK, PRAYA', '0', '5202016001630001', 99, '', '', 0, 0, '0002/APOTEK/X/2019/DPMPTSP', '2024-10-09', '2020-05-13 03:03:38', 1, NULL);
INSERT INTO `outlet1` VALUES ('OUT-140420-588131681', 'APOTEK EMBUN FARMA', 'Jl. TGH Moh. Mutawalli, Jerowaru, Kabupaten Lombok Timur, Nusa Tenggara Bar. 83672', '0', '70.570.330.4-915', 'LALU SASMITA', 'KETANGGA, LOMBOK TIMUR', '0', '5203010804840002', 64, '', '', 0, 0, '3869/503/PM.II/10/2019', '2024-09-27', '2020-04-14 15:26:44', 2, NULL);
INSERT INTO `outlet1` VALUES ('OUT-150420-537759610', 'APOTEK AN-NUR II', 'JL. RAYA GERUNG-LEMBAR, DESA GERUNG UTARA, LOMBOK BARAT\n', '0', '08.412.575.6-911', 'IWAN MULIA SEPTERIANSYAH, ST., M.SI', 'JL. PANTAI SENGGIGI NO. 70 GRIYA PAGUTAN INDAH', '0', '5271021209740001', 65, '', '', 0, 0, '54/SIA/LOBAR/VII/2019', '2021-04-04', '2020-04-15 03:01:09', 6, NULL);
INSERT INTO `outlet1` VALUES ('OUT-150520-810427538', 'APOTEK ANGKASA FARMA', 'JL. RAYA EAT SURAK, GERANTUNG, PRAYA TENGAH, LOMBOK TENGAH \n', '0', '55.376.809.4-915', 'MAEMUN', 'GERANTUNG, PRAYA TENGAH', '0', '5202104301620001', 101, '', '', 0, 0, '445/1880/IX/SIA/YANKES/2016', '2020-07-31', '2020-05-15 02:29:00', 1, NULL);
INSERT INTO `outlet1` VALUES ('OUT-150520-895440888', 'APOTEK YAZID', 'SEMPARU III, DESA SEMPARU, KOPANG, LOMBOK TENGAH\n', '0', '92.942.574.2-915', 'MUSTAMIUDDIN, S.FARM. APT', 'GELOGOR, MAPONG, PRAYA', '0', '5202011710890001', 102, '', '', 0, 0, '0004/APOTEK/IV/2020/DPMPTSP', '2025-04-28', '2020-05-15 03:05:26', 1, NULL);
INSERT INTO `outlet1` VALUES ('OUT-160420-28311464', 'APOTEK ALUH FARMA', 'JL. GAJAH MADA NO. 87, LOMBOK TENGAH\n', '0', '15.983.946.3-915', 'ALUH ATIK MARYATI, S.FAR., APT', 'JL. GAJAH MADA NO. 87, LOMBOK TENGAH', '0', '0', 66, '', '', 0, 0, '445/16/IV/SIA/SDK/2017', '2022-10-22', '2020-04-16 02:43:11', 1, NULL);
INSERT INTO `outlet1` VALUES ('OUT-160420-471326352', 'APOTEK BERKAH RAHNAYA', 'JL. TGKH. M. ZAINUDDIN ABDUL MAJID NO. 152, SELONG, LOMBOK TIMUR', '0', '08.414.061.5-914', 'RAHMAT HIDAYAT, ST', 'LOMBOK TIMUR', '0', '0', 67, '', '', 0, 0, '445/K.287/YK/IV/2019', '2023-03-03', '2020-04-16 03:12:40', 2, NULL);
INSERT INTO `outlet1` VALUES ('OUT-160420-928488081', 'APOTEK AR-RAHMAN', 'BATUNYALA, PRAYA TENGAH, LOMBOK TENGAH', '0', '82.017.347.4-915', 'SITI ERLINA WAHYUNINGSIH, S.FARM., APT', 'PEJERUK, DESA GAPURA, PUJUT, LOMBOK TENGAH', '0', '5202016211900001', 68, '', '', 0, 0, '0004/APOTEK/IX/2019/DPMPTSP', '2024-12-17', '2020-04-16 03:32:44', 1, NULL);
INSERT INTO `outlet1` VALUES ('OUT-160520-277259809', 'APOTEK MAULA FARMA', 'JL. RAYA KERU, NARMADA, LOMBOK BARAT \n', '0', '91.783.992.0-915', 'SHAEFUL WATHONI', 'DUSUN KARANG JANGONG, PRINGGARATA, LOMBOK TENGAH', '0', '5202052207890001', 107, '', '', 0, 0, '52/SIA/LOBAR/VII/2019', '2020-12-18', '2020-05-16 01:33:49', 6, NULL);
INSERT INTO `outlet1` VALUES ('OUT-160520-394662975', 'APOTEK HASANUDIN', 'DASAN CERMEN, AIK DAREK, BATUKLIANG, LOMBOK TENGAH \n', '0', '84.229.060.3-915', 'REZA SOFIAN HIDAYAT', 'JL. HOSCOKROAMINOTO, TANJUNG, LABUAN HAJI', '0', '5203052505900007', 106, '', '', 0, 0, '0001/APOTEK/I/2020/DPMPTSP', '2025-01-07', '2020-05-16 01:28:48', 1, NULL);
INSERT INTO `outlet1` VALUES ('OUT-160520-629171521', 'APTEK CINDRA FARMA', 'JL. AHMAD YANI NO. 72, NARMADA, LOMBOK BARAT \n', '0', '05.781.027.7-915', 'DR. CINDRA BUDI KETUT PASEK', 'LEMBUAK, NARMADA', '', '52', 104, '', '', 0, 0, '08/SIA/LOBAR/VII/2017', '2021-09-06', '2020-05-16 01:14:18', 6, NULL);
INSERT INTO `outlet1` VALUES ('OUT-160520-93600337', 'APOTEK HIKMAH', 'JL. KESEJAHTERAAN 1 NO. 1, PERUMNAS, TANJUNG KARANG PERMAI, MATARAM\n', '0', '64.320.440.7-911', 'M. SIDROTULLAH, M.SC., APT', 'JL. KESEJAHTERAAN I/I, PERUMNAS, TANJUNG KARANG PERMAI', '0', '5271040211850001', 103, '', '', 0, 0, '506/3480/KES/XI/2017', '2021-11-02', '2020-05-16 01:09:11', 8, NULL);
INSERT INTO `outlet1` VALUES ('OUT-160520-941728318', 'APOTEK TRIPLE D SURANADI', 'JL. LINTAS SURANADI-SESAOT, DESA SURANADI, NARMADA, LOMBOK BARAT \n', '0', '72.031.479.8-915', 'PUTU DEVA KARI KARDIKA, S.FARM., APT', 'DUSUN MEKAR INDAH, LEMBUAK, NARMADA', '0', '5201031512900001', 105, '', '', 0, 0, '51/SIA/LOBAR/VII/2019', '2024-03-19', '2020-05-16 01:22:29', 6, NULL);
INSERT INTO `outlet1` VALUES ('OUT-180420-821962541', 'INSTALASI FARMASI RSUD PATUT PATUH PATJU', 'JL. H.L ANGGRAT BA NO. 2, GERUNG, LOMBOK BARAT\n', '0', '00.642.651.4-915', 'RSUD PATUT PATUH PATJU', 'JL. H.L ANGGRAT NO. 2, GERUNG, LOMBOK BARAT', '0', '0', 70, '', '', 0, 0, '794A/983/DIKES/2015', '2021-04-04', '2020-04-18 02:39:20', 6, NULL);
INSERT INTO `outlet1` VALUES ('OUT-180420-860046892', 'APOTEK AGISTANI FARMA', 'JL. PARIWISATA, LENDANG BAJUR, GUNUNG SARI, LOMBOK BARAT\n', '0', '47.615.184.0-914', 'FATIA NINGSIH, S.FAR., APT', 'JL. PANTAI SENGGIGI NO. 153, PAGUTAN BARAT', '0', '5271036703830004', 69, '', '', 0, 0, '19/SIA/LOBAR/XI/2017', '2021-03-27', '2020-04-18 02:14:15', 6, NULL);
INSERT INTO `outlet1` VALUES ('OUT-180520-267852962', 'APOTEK AS-SALAMAH', 'NAPUR, DESA KETARA, KECAMATAN PUJUT, LOMBOK TENGAH\n', '0', '90.947.752.3-915.000', 'LALU AHMAD FAHRURROZI, S.FARM., APT', 'NAPUR, KETARA,PUJUT, LOMBOK TENGAH', '0', '5202041006910002', 108, '', '', 0, 0, '0003/APOTEK/XI/2019/DPMPTSP', '2024-11-11', '2020-05-18 02:58:10', 1, NULL);
INSERT INTO `outlet1` VALUES ('OUT-190520-354736924', 'APOTEK PEJANGGIK', 'JL. K.H. AHMAD DAHLAN KEL. MAJIDI, SELONG, LOMBOK TIMUR\n', '0', '79.125.822.1-915.000', 'I NYOMAN MUSTIKA', 'LENDANG BEDURIK, SEKARTEJA', '0', '5203070705740003', 111, '', '', 0, 0, '445/K.2375/YK/XI/2018', '2023-10-23', '2020-05-19 06:23:52', 2, NULL);
INSERT INTO `outlet1` VALUES ('OUT-190520-506595186', 'APOTEK MITRA', 'JL. PRABU RANGKASARI, DASAN CERMEN, MATARAM\n', '0', '66.728.461.6-911.000', 'MELISA MEGA, S.FARM., APT', 'JL. KOPERASI NO. 60, OTAK DESA SELATAN, DAYAN PEKEN, AMPENAN', '0', '5271016804910001', 110, '', '', 0, 0, '506/784/KES/III/2019', '2024-04-26', '2020-05-19 06:06:32', 8, NULL);
INSERT INTO `outlet1` VALUES ('OUT-190520-776220527', 'APOTEK KOTARAJA', '\n                MARANG SELATAN, DESA KOTARAJA, SIKUR, LOMBOK TIMUR \n', '0', '72.162.480.7-911.000', 'DR. LALU ZULHIRSAN', 'JL. SWASEMBADA GG. MILENIUM KEKALIK INDAH, MATARAM', '0', '5271041206880002', 109, '', '', 0, 0, '445/K.2262/YK/X/2018', '2021-09-15', '2020-05-19 02:09:19', 2, NULL);
INSERT INTO `outlet1` VALUES ('OUT-200120-526612105', 'Apotik NIA', '30958358', '530928', '0583209', '5302958', '5320598', '3209482', '3029582', 4, '', '', 1, 0, '', '0000-00-00', '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `outlet1` VALUES ('OUT-210420-630101423', 'APOTEK 99 JAYA', 'JL. RAYA MENINTING-SANDIK NO. 17, SENTELUK, BATU LAYAR, LOMBOK BARAT\n', '0', '46.263.384.3-656', 'SUHENGKI TIAWAN, S.FARM., APT', 'JL. RAYA MENINTING SANDIK NO. 17', '0', '3511111405870001', 71, '', '', 0, 0, '64/SIA/LOBAR/XII/2019', '2022-05-14', '2020-04-21 07:43:53', 6, NULL);
INSERT INTO `outlet1` VALUES ('OUT-210420-898816925', 'PUSKESMAS  MANGKUNG', 'JL. RAYA MANGKUNG, LOMBOK TENGAH', '0', '0', 'AA', 'AA', '0', '0', 72, '', '', 0, 0, 'AA', '2023-06-13', '2020-04-21 08:09:00', 1, NULL);
INSERT INTO `outlet1` VALUES ('OUT-220420-262523974', 'APOTEK BLUE ISLAND II', 'JL. PARIWISATA PANTAI KUTA, KUTA, LOMBOK TENGAH\n', '0', '74.969.098.8-914', 'dr. NASRULLAH', 'DUSUN PEMANGKET, MEKARSARI, LOMBOK BARAT', '0', '5272040107860004', 76, '', '', 0, 0, '445/10/I/SIA/SDK/2019', '2024-02-23', '2020-04-22 05:14:02', 1, NULL);
INSERT INTO `outlet1` VALUES ('OUT-220420-273545619', 'APOTEK FATHIR FARMA', 'JL. RAYA MUJUR - SENGKERANG - GANTI, PRAYA TIMUR, LOMBOK TENGAH\n', '0', '91.747.193.0-915', 'PENI WARISMAN, S.FARM., APT', 'SENGKERANG III PRAYA TIMUR', '0', '5202066608900001', 73, '', '', 0, 0, '0001/APOTEK/IX/2019/DPMPTSP', '2024-08-26', '2020-04-22 01:34:46', 1, NULL);
INSERT INTO `outlet1` VALUES ('OUT-220420-274222618', 'APOTEK AFLAHA', 'JL. TGH. ALKHALIDY KM. 40, KUMBUNG, LOMBOK TENGAH\n', '0', '85.095.341.5-915', 'ANNISA ALPIANI, S.FARM., APT', 'BAGIQ REMPUNG, PUJUT', '0', '6102084912910001', 74, '', '', 0, 0, '445/48/VIII/SIA/SDK/2018', '2020-12-09', '2020-04-22 01:40:57', 1, NULL);
INSERT INTO `outlet1` VALUES ('OUT-220420-463160307', 'APOTEK NURUL AZHAR', 'DESA MONTONG BETOK, KEC. MONTONG GADING, LOMBOK TIMUR \n', '0', '83.327.371.7-915', 'H. LALU HENDRIAWAN MARDIANTARA', 'JL. PRAUBANYAR MONTONG GADING, DUSUN GENJER, LOMBOK TIMUR', '0', '5203030203840003', 79, '', '', 0, 0, '445/K.1964/YK/VII/2018', '2021-01-01', '2020-04-22 06:35:31', 2, NULL);
INSERT INTO `outlet1` VALUES ('OUT-220420-646174656', 'APOTEK CENDANA', 'JL. RARANG-MATARAM, LOMBON TIMUR', '0', '78.064.454.8-915', 'BAIQ ENI HURUSTIAWATI, S.Pd', 'LOMBOK TIMUR', '0', '52', 77, '', '', 0, 0, '445/K.282/YK/VI/2015', '2020-09-04', '2020-04-22 05:35:16', 8, NULL);
INSERT INTO `outlet1` VALUES ('OUT-220420-648998873', 'APOTEK BISMILLAH', 'DUSUN AIK ARE, DESA UBUNG, LOMBOK TENGAH \n', '0', '83.968.660.7-915', 'YAYAN HARDIANSAH, S.KEP., M.KEP', 'LINGKUNGAN LENENG, DESA AMEN, LOMBOK TENGAH', '0', '5202011206910002', 75, '', '', 0, 0, '445/42/VI/SIA/SDK/2018', '2023-05-20', '2020-04-22 02:53:32', 1, NULL);
INSERT INTO `outlet1` VALUES ('OUT-220420-684735824', 'APOTEK NASUHA', 'KARANG DAYE DESA PENUJAK, PRAYA BARAT, LOMBOK TENGAH\n', '0', '73.120.464.0-915', 'MUHAMMAD HENDRAWAN, S.FARM., APT', 'KANGI, PENUJAK, LOMBOK TENGAH', '0', '5202051506910003', 78, '', '', 0, 0, '0006/APOTEK/IX/2019/DPMPTSP', '2024-09-30', '2020-04-22 06:08:47', 6, NULL);
INSERT INTO `outlet1` VALUES ('OUT-230420-562346697', 'APOTEK ADHAM PUYUNG', 'JL. RAYA PRAYA - MATARAM, WAKER PUYUNG, LOMBOK TENGAH\n', '0', '70.527.312.6-915', 'ADE SUKMA HAMDANI', 'JANAPRIA', '0', '5202071804860003', 82, '', '', 0, 0, '445/06/I/SIA/SDK/2018', '2021-10-15', '2020-04-23 03:49:27', 1, NULL);
INSERT INTO `outlet1` VALUES ('OUT-230420-794757584', 'APOTEK SEJAHTERA', 'JL.DIPONEGORO, PRAYA, LOMBOK TENGAH \n', '0', '05.133.050.4-915', 'DR. KURNIA WINATA TAUFIQ', 'JL. BASUKI RACHMAT NO. 15, PRAYA', '0', '5202011205460002', 81, '', '', 0, 0, '445/22/X/SIA/SDK/2017', '2021-03-04', '2020-04-23 03:43:05', 1, NULL);
INSERT INTO `outlet1` VALUES ('OUT-230420-906124865', 'APOTEK BONGKOT SEHAT', 'JL. GN. PENGSONG, DUSUN NYAMARAI, KARANG BONGKOT, LOMBOK BARAT \n', '0', '16.443.232.2-915', 'DADANG PRIYANGGONO', 'JL. TERATAI I BTN REYAN PONDOK INDAH BLOK B NO. 5', '0', '5201081809851001', 80, '', '', 0, 0, '61/SIA/LOBAR/XII/2019', '2024-07-21', '2020-04-23 02:50:29', 6, NULL);
INSERT INTO `outlet1` VALUES ('OUT-240420-293539561', 'APOTEK GEMILANG', 'JL. SURANADI NO. 56 NARMADA, LOMBOK BARAT \n', '0', '08.418.770.7-911', 'BAIQ MAHARANI KUSUMA DEWI', 'JL. MERDEKA XVI/54, PAGESANGAN BARU', '0', '5271026412820005', 83, '', '', 0, 0, '20/SIA/LOBAR/II/2018', '2021-12-24', '2020-04-24 02:43:26', 6, NULL);
INSERT INTO `outlet1` VALUES ('OUT-240420-796375671', 'APOTEK ANUGERAH', 'JL. RAYA PEMEPEK, PRINGGARATA, LOMBOK TENGAH\n', '0', '86.473.339.9-915', 'MARZUKI NYAKMAT', 'PEMEPEK II, PRINGGARATA', '0', '5202082909960001', 84, '', '', 0, 0, '44515/III/SIA/SDK/2019', '2024-03-13', '2020-04-24 04:21:37', 1, NULL);
INSERT INTO `outlet1` VALUES ('OUT-260520-508654332', 'APOTEK TIKA FARMA', 'PERINA LAUQ DESA PERINA, KEC. JONGGAT', '0', '93.925.256.5-915.000', 'YUNISA YUSTIKARINI, S.FARM., APT', 'PERINA LAUQ, DESA PERINA, LOMBOK TENGAH ', '0', '5202025206950002', 112, '', '', 0, 0, '0003/APOTEK/II/2020/DPMPTSP', '2025-02-26', '2020-05-26 07:43:25', 1, NULL);
INSERT INTO `outlet1` VALUES ('OUT-270420-213846472', 'APOTEK ALIFIA', 'JL. PROF. M.YAMIN SH NO. 26 RT.13, PANCOR KEC. SELONG, LOMBOK TIMUR\n', '0', '48.607.146.7-915', 'HJ. SAHRULINA DEWI, ST', 'JL. PROF. M.YAMIN SH NO. 26, PANCOR', '0', '5203074111740004', 85, '', '', 0, 0, '445/K.1518/YK/X/2016', '2022-01-13', '2020-04-27 01:10:06', 2, NULL);
INSERT INTO `outlet1` VALUES ('OUT-270420-264486882', 'APOTEK DIPONEGORO', 'JL. DIPONEGORO KELURAHAN MAJIDI, SELONG, LOMBOK TIMUR\n', '0', '54.341.319.9-915', 'BAIQ KHUWAILIDA KARTIKASARI, S.FARM., APT', 'JL. PROF. M. YAMIN 26, PANCOR', '0', '5203174906880003', 86, '', '', 0, 0, '445/K.1609/YK/XII/2016', '2021-06-09', '2020-04-27 05:31:54', 2, NULL);
INSERT INTO `outlet1` VALUES ('OUT-270420-87844590', 'APOTEK MELLY FARMA', 'JL. SELAPARANG NO. 38A, CAKRANEGARA, MATARAM \n', '0', '06.617.251.1-914', 'MELLY ANGGRAENI TO', 'JL. SELAPARANG NO. 38A, CAKRANEGARA TIMUR', '0', '5201016805610001', 87, '', '', 0, 0, '506/165/KES/I/2019', '2022-09-08', '2020-04-27 06:25:13', 8, NULL);
INSERT INTO `outlet1` VALUES ('OUT-270520-589432416', 'APOTEK AMONG FARMA', 'MUJUR, DESA MUJUR', '0', '14.334.016.4-915.000', 'WIRAGUTENG ETONSU SORENGGANA', 'DESA GAPURA, PUJUT ', '0', '5202041603770002', 113, '', '', 0, 0, '445/511/V/SIA/SDK/2017', '2020-10-06', '2020-05-27 01:46:58', 1, NULL);
INSERT INTO `outlet1` VALUES ('OUT-280520-703164955', 'APOTEK ADHAM JENEVER', 'DESA JANAPRIA, KEC. JANAPRIA, LOMBOK TENGAH', '0', '70.527.312.6-915.000', 'ADE SUKMA HAMDANI', 'JANAPRIA, LOMBOK TENGAH ', '0', '520207180480003', 114, '', '', 0, 0, '445/24/VII/SIA/SDK/2019', '2024-02-18', '2020-05-28 03:06:09', 1, NULL);
INSERT INTO `outlet1` VALUES ('OUT-300420-862929593', 'APOTEK HARUN', 'PEREMPUNG, DESA PONDER KEC. PRAYA BARAT, LOMBOK TENGAH \n', '0', '73.120.464.0-915', 'MUHAMMAD HENDRAWAN, S.FARM., APT', 'KANGI, PENUJAK, PRAYA BARAT', '0', '5202051506910003', 88, '', '', 0, 0, '0005/APOTEK/XI/2019/DPMPTSP', '2024-11-14', '2020-04-30 02:09:39', 6, NULL);
INSERT INTO `outlet1` VALUES ('OUT-300520-543334974', 'APOTEK CATUR WARGA', 'JL. CATUR WARGA NO. 18 B, MATARAM', '0', '08.411.582.3-911.000', 'KEN RONGGO PUTRO, S.FARM., APT ', 'KOMP. PERUM, KEKALIK, JL. MENINTING RAYA NO. 41-43', '0', '52', 115, '', '', 0, 0, '506/2713/KES/X/2017', '2021-06-11', '2020-05-30 02:41:06', 8, NULL);
INSERT INTO `outlet1` VALUES ('outlet-210919-336224', 'APOTEK K24', 'mataram lagi', '09290', '940290', 'Munarsa Aris', 'mataram 2', '94384938', '52010499588', 1, '', '', 0, 0, '', '0000-00-00', '0000-00-00 00:00:00', 8, NULL);

SET FOREIGN_KEY_CHECKS = 1;