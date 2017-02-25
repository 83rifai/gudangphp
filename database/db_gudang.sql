/*
Navicat MySQL Data Transfer

Source Server         : LOCALHOST
Source Server Version : 50534
Source Host           : localhost:3306
Source Database       : gudang

Target Server Type    : MYSQL
Target Server Version : 50534
File Encoding         : 65001

Date: 2017-02-25 17:59:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for barang
-- ----------------------------
DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang` (
`id`  varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`id_satuan`  varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`id_jenis`  int(25) NULL DEFAULT NULL ,
`nm_jenis`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`id_warna`  int(25) NULL DEFAULT NULL ,
`nm_warna`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`id_merk`  int(25) NULL DEFAULT NULL ,
`nm_merk`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`jml_stok`  int(25) NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of barang
-- ----------------------------
BEGIN;
INSERT INTO `barang` VALUES ('HA1.M1.M1.S1.S1.K1', 'S1.S1.K1', '0', 'HVS_A4', '0', 'Merah', '0', 'Merah', '0'), ('HA1.P1.N1.S3.S2.K2', 'S3.S2.K2', '0', 'HVS_A4', '0', 'Putih', '0', 'Putih', '8'), ('HA1.P1.N1.S3.S2.K3', 'S3.S2.K3', '0', 'HVS_A4', '0', 'Putih', '0', 'Putih', '2');
COMMIT;

-- ----------------------------
-- Table structure for besar
-- ----------------------------
DROP TABLE IF EXISTS `besar`;
CREATE TABLE `besar` (
`id`  varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`nama`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`jumlah`  int(15) NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of besar
-- ----------------------------
BEGIN;
INSERT INTO `besar` VALUES ('S1', 'Satuan Besar', '1'), ('S2', 'dus', '1'), ('S3', 'box', '1');
COMMIT;

-- ----------------------------
-- Table structure for jenis
-- ----------------------------
DROP TABLE IF EXISTS `jenis`;
CREATE TABLE `jenis` (
`id`  varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`nm_jenis`  varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of jenis
-- ----------------------------
BEGIN;
INSERT INTO `jenis` VALUES ('HA1', 'HVS_A4'), ('J1', 'Jenis 1'), ('P1', 'Pulpen');
COMMIT;

-- ----------------------------
-- Table structure for kecil
-- ----------------------------
DROP TABLE IF EXISTS `kecil`;
CREATE TABLE `kecil` (
`id`  varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`nama`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`jumlah`  int(15) NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of kecil
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for konversi_satuan
-- ----------------------------
DROP TABLE IF EXISTS `konversi_satuan`;
CREATE TABLE `konversi_satuan` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`parent`  int(11) NULL DEFAULT NULL ,
`satuan_terbesar`  int(11) NULL DEFAULT 0 ,
`satuan_terkecil`  int(11) NULL DEFAULT NULL ,
`jumlah`  int(11) NULL DEFAULT 1 ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=4

;

-- ----------------------------
-- Records of konversi_satuan
-- ----------------------------
BEGIN;
INSERT INTO `konversi_satuan` VALUES ('1', '0', '0', '1', '1'), ('2', '1', '1', '2', '4'), ('3', '2', '2', '3', '500');
COMMIT;

-- ----------------------------
-- Table structure for master_produk
-- ----------------------------
DROP TABLE IF EXISTS `master_produk`;
CREATE TABLE `master_produk` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`nama`  varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`merk_id`  int(11) NULL DEFAULT NULL ,
`satuan_id`  int(11) NULL DEFAULT NULL ,
`warna`  varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`stock`  int(11) NULL DEFAULT NULL ,
`konversi_satuan_id`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of master_produk
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for master_satuan
-- ----------------------------
DROP TABLE IF EXISTS `master_satuan`;
CREATE TABLE `master_satuan` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`nama`  varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=6

;

-- ----------------------------
-- Records of master_satuan
-- ----------------------------
BEGIN;
INSERT INTO `master_satuan` VALUES ('1', 'DUS'), ('2', 'BOX'), ('3', 'RIM'), ('4', 'LEMBAR'), ('5', 'PIECES');
COMMIT;

-- ----------------------------
-- Table structure for merk
-- ----------------------------
DROP TABLE IF EXISTS `merk`;
CREATE TABLE `merk` (
`id`  varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`nm_merk`  varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of merk
-- ----------------------------
BEGIN;
INSERT INTO `merk` VALUES ('M1', 'Merk 1'), ('N1', 'Natural'), ('P1', 'Pilot');
COMMIT;

-- ----------------------------
-- Table structure for pelanggan
-- ----------------------------
DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan` (
`id`  int(25) NOT NULL ,
`nm_pelanggan`  varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`almt_pelanggan`  varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`no_telp`  int(25) NOT NULL ,
`email`  varchar(35) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of pelanggan
-- ----------------------------
BEGIN;
INSERT INTO `pelanggan` VALUES ('1', 'PT Axibis', 'Jl. Kanggotan No 2 Jebres Surakarta', '2147483647', 'fatoni.work@gmail.com'), ('2', 'candra', 'cilegon', '123456', 'vgvgvgvgu7'), ('3', 'aaaa', 'aaaaa', '1235', 'asdfg'), ('4', 'asasa', 'asasa', '123456', 'gdgdgd');
COMMIT;

-- ----------------------------
-- Table structure for satuan
-- ----------------------------
DROP TABLE IF EXISTS `satuan`;
CREATE TABLE `satuan` (
`id_satuan`  varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`st_besar`  varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`st_sedang`  varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`st_kecil`  varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`id_satuan`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of satuan
-- ----------------------------
BEGIN;
INSERT INTO `satuan` VALUES ('S1.S1.K1', 'S1', 'S1', 'K1'), ('S3.S2.K2', 'S3', 'S2', 'K2'), ('S3.S2.K3', 'S3', 'S2', 'K3');
COMMIT;

-- ----------------------------
-- Table structure for satuan_besar
-- ----------------------------
DROP TABLE IF EXISTS `satuan_besar`;
CREATE TABLE `satuan_besar` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`nama`  varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`jumlah`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of satuan_besar
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for satuan_kecil
-- ----------------------------
DROP TABLE IF EXISTS `satuan_kecil`;
CREATE TABLE `satuan_kecil` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`nama`  varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`jumlah`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of satuan_kecil
-- ----------------------------
BEGIN;
INSERT INTO `satuan_kecil` VALUES ('1', 'RIM', '500');
COMMIT;

-- ----------------------------
-- Table structure for satuan_sedang
-- ----------------------------
DROP TABLE IF EXISTS `satuan_sedang`;
CREATE TABLE `satuan_sedang` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`nama`  varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`jumlah`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of satuan_sedang
-- ----------------------------
BEGIN;
INSERT INTO `satuan_sedang` VALUES ('1', 'DUS', '1');
COMMIT;

-- ----------------------------
-- Table structure for sedang
-- ----------------------------
DROP TABLE IF EXISTS `sedang`;
CREATE TABLE `sedang` (
`id`  varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`nama`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`jumlah`  int(15) NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of sedang
-- ----------------------------
BEGIN;
INSERT INTO `sedang` VALUES ('S1', 'Satuan Sedang', '10'), ('S2', 'box', '1');
COMMIT;

-- ----------------------------
-- Table structure for suplier
-- ----------------------------
DROP TABLE IF EXISTS `suplier`;
CREATE TABLE `suplier` (
`id`  int(25) NOT NULL ,
`nm_suplier`  varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`almt_suplier`  varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`no_telp`  int(25) NOT NULL ,
`email`  varchar(35) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of suplier
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for td_brg_keluar
-- ----------------------------
DROP TABLE IF EXISTS `td_brg_keluar`;
CREATE TABLE `td_brg_keluar` (
`kd_tr`  varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`id`  varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`kd_barang`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`satuan`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`kd_satuan`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`jumlah`  int(20) NULL DEFAULT NULL ,
`jml_konversi`  int(20) NULL DEFAULT NULL 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of td_brg_keluar
-- ----------------------------
BEGIN;
INSERT INTO `td_brg_keluar` VALUES ('BM-1602170011', 'BM-160217001', 'HA1.P1.N1.S3.S2.K2', 'rim', 'K2', '2', '2'), ('BM-2402170021', 'BM-240217002', 'HA1.P1.N1.S3.S2.K3', 'rim', 'K3', '1', '1'), ('BM-2402170021', 'BM-240217002', 'HA1.P1.N1.S3.S2.K2', 'rim', 'K2', '1', '1');
COMMIT;

-- ----------------------------
-- Table structure for td_brg_masuk
-- ----------------------------
DROP TABLE IF EXISTS `td_brg_masuk`;
CREATE TABLE `td_brg_masuk` (
`kd_tr`  varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`id`  varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`kd_barang`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`satuan`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`kd_satuan`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`jumlah`  int(20) NULL DEFAULT NULL ,
`jml_konversi`  int(20) NULL DEFAULT NULL 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of td_brg_masuk
-- ----------------------------
BEGIN;
INSERT INTO `td_brg_masuk` VALUES ('BM-1602170011', 'BM-160217001', 'HA1.P1.N1.S3.S2.K2', 'box', 'S2', '1', '5'), ('BM-1602170021', 'BM-160217002', 'HA1.P1.N1.S3.S2.K2', 'rim', 'K2', '5', '5'), ('BM-1602170031', 'BM-160217003', 'HA1.P1.N1.S3.S2.K2', 'rim', 'K2', '1', '1'), ('BM-2402170041', 'BM-240217004', 'HA1.P1.N1.S3.S2.K3', 'rim', 'K3', '3', '3');
COMMIT;

-- ----------------------------
-- Table structure for tr_brg_keluar
-- ----------------------------
DROP TABLE IF EXISTS `tr_brg_keluar`;
CREATE TABLE `tr_brg_keluar` (
`id`  varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`tgl_keluar`  date NULL DEFAULT NULL ,
`no`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`no_po`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`id_pelanggan`  varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of tr_brg_keluar
-- ----------------------------
BEGIN;
INSERT INTO `tr_brg_keluar` VALUES ('BM-160217001', '2017-02-16', '1abc', '1234', '2'), ('BM-240217002', '2017-02-24', '12345', '123456', '2');
COMMIT;

-- ----------------------------
-- Table structure for tr_brg_masuk
-- ----------------------------
DROP TABLE IF EXISTS `tr_brg_masuk`;
CREATE TABLE `tr_brg_masuk` (
`id`  varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`tgl_masuk`  date NULL DEFAULT NULL ,
`no`  int(20) NULL DEFAULT NULL ,
`id_suplier`  varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of tr_brg_masuk
-- ----------------------------
BEGIN;
INSERT INTO `tr_brg_masuk` VALUES ('BM-160217001', '2017-02-16', '1', ''), ('BM-160217002', '2017-02-16', '2', ''), ('BM-160217003', '2017-02-16', '3', ''), ('BM-240217004', '2017-02-24', '4', '');
COMMIT;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
`id`  int(5) NOT NULL ,
`username`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`password`  varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`level`  varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`foto`  varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of user
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', ''), ('3', 'aa', '4124bc0a9335c27f086f24ba207a4912', 'user', '');
COMMIT;

-- ----------------------------
-- Table structure for warna
-- ----------------------------
DROP TABLE IF EXISTS `warna`;
CREATE TABLE `warna` (
`id`  varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`nm_warna`  varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of warna
-- ----------------------------
BEGIN;
INSERT INTO `warna` VALUES ('M1', 'Merah'), ('P1', 'Putih'), ('W1', 'Warna 1');
COMMIT;

-- ----------------------------
-- Function structure for getSatuan
-- ----------------------------
DROP FUNCTION IF EXISTS `getSatuan`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `getSatuan`(ID int(11)) RETURNS varchar(150) CHARSET latin1
BEGIN
	DECLARE _result VARCHAR(150);

	SELECT master_satuan.nama INTO _result FROM master_satuan WHERE master_satuan.id = ID;

	RETURN IFNULL(_result,0);
END
;;
DELIMITER ;

-- ----------------------------
-- Auto increment value for konversi_satuan
-- ----------------------------
ALTER TABLE `konversi_satuan` AUTO_INCREMENT=4;

-- ----------------------------
-- Auto increment value for master_produk
-- ----------------------------
ALTER TABLE `master_produk` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for master_satuan
-- ----------------------------
ALTER TABLE `master_satuan` AUTO_INCREMENT=6;

-- ----------------------------
-- Auto increment value for satuan_besar
-- ----------------------------
ALTER TABLE `satuan_besar` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for satuan_kecil
-- ----------------------------
ALTER TABLE `satuan_kecil` AUTO_INCREMENT=2;

-- ----------------------------
-- Auto increment value for satuan_sedang
-- ----------------------------
ALTER TABLE `satuan_sedang` AUTO_INCREMENT=2;
